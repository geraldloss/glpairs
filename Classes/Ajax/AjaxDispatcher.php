<?php
declare(strict_types=1);

namespace Loss\Glpairs\Ajax;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use Loss\Glpairs\Controller\PairsController;
use Psr\Http\Message\ServerRequestInterface;

/***************************************************************
 *  Copyright notice
*
*  (c) 2014 Gerald Loß
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 3 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * Dispatcher for the Ajax request over the eID mechanism. 
 * Based on the ideas of the ajax dispatcher in the pt_extbase extension.
 * Thanks to Daniel Lienert and Michael Knoll.
 * 
 * We need over GET or POST the following arguments
 * controllerName 	- The name of the controller
 * actionName		- The name of the action which should be called
 * actionArguments	- The arguments which are send to the action
 * 
 * Alternative we need only one parameter 'request' from the GET or POST 
 * which is an JSON object which contains the same three parameters 
 * 
 * @package glpairs
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
*
*/
class AjaxDispatcher {
	
	/**
	 * Handle the ajax request and call finally a given controller with its action.
	 * 
	 * @param ServerRequestInterface $request
	 * @return	object() The JSON object with the data for the ajax request.
	 */
	public function handleAjaxRequest(ServerRequestInterface $request): string {
		
		// the output of the ajax request
		$arrOutput = [];
		
		// retrieve the Ajax data
		$arrOutput = $this->getAjaxBasicData( $request );
		
		// return the JSON encoded content
		return json_encode($arrOutput, JSON_THROW_ON_ERROR);
	}

	/**
	 * Returns the basic data from the ajax request
	 *
	 * @param string $i_strUniquId	The unique ID of the pairs game.
	 * @return array				Array with the both external ID Mapping arrays
	 * 		arrExtIdMap:	Array with Mapping from external ID to uID
	 * 		arrUidMap:		Array with Mapping from uID to external ID
	 * See also the constants with the prefix c_strArrPairsData*
	 */
	protected function getAjaxBasicData(ServerRequestInterface $request): array {
	    // array with the ajax response
	    $l_arrAjaxResponse = [];
	    // UniqueId of the Pairs Game
	    $l_strUniquId = [];
	    // the Session data container
	    /* @var $l_objSessionContainer \Loss\Glpairs\Container\SessionContainer */
	    $l_objSessionContainer = null;
	    
	    // get the UniqeID from the GET/POST
	    $l_strUniquId = (string) $this->getRequestArgumentsFromGetPost( $request )['actionArguments']['i_strUniquId'];
	    
	    // restore the static array with all pairs data from the session
		/** @var \TYPO3\CMS\Frontend\Authentication\FrontendUserAuthentication $frontendUser */
		$frontendUser = $request->getAttribute('frontend.user');
		PairsController::$arrPairsData = $frontendUser->getKey('ses',
	        PairsController::c_strSessionIdPairsData . '_' . $l_strUniquId);
	    
	    // get the session data container
	    $l_objSessionContainer = PairsController::$arrPairsData[$l_strUniquId];
	    
	    $l_objSessionContainer = $this->fixSessionObject($l_objSessionContainer);
	    
	    $l_arrAjaxResponse = [
	        PairsController::c_strArrAjaxUniqueID 	=> $l_strUniquId,
	        PairsController::c_strArrAjaxResult	=> [
	            PairsController::c_strArrPairsDataExtId 	=> $l_objSessionContainer->getm_arrExtIdMapping(),
	            PairsController::c_strArrPairsDataUid		=> $l_objSessionContainer->getm_arrUidMapping(),
	            PairsController::c_strArrPairsPairsType	=> $l_objSessionContainer->getm_intPairsType(),
	            PairsController::c_strArrPairsSplitMode	=> $l_objSessionContainer->getm_blnSplitMode(),
	            PairsController::c_strArrPairsI18n			=> $l_objSessionContainer->getm_arrI18n(),
	            PairsController::c_strArrPairsPairscount	=> $l_objSessionContainer->getm_intPairsCount(),
	            PairsController::c_strArrPairsPluspoints	=> $l_objSessionContainer->getPluspoints(),
	            PairsController::c_strArrPairsMinuspoints	=> $l_objSessionContainer->getMinuspoints(),
	            PairsController::c_strArrPairsTurnbackdelay =>	$l_objSessionContainer->getTurnbackdelay(),
	            PairsController::c_strArrPairsHintdelay	=> $l_objSessionContainer->getHintdelay(),
	            PairsController::c_strArrPairsTurnduration	=> $l_objSessionContainer->getTurnduration(),
	            PairsController::c_strArrPairsStackduration => $l_objSessionContainer->getStackduration(),
	            PairsController::c_strArrPairsTestmode		=> $l_objSessionContainer->getTestmode(),
	            PairsController::c_strArrPairsTestmodeTurnDelay => $l_objSessionContainer->getTestModeTurnDelay(),
	            PairsController::c_strArrPairsFinalInformation => $l_objSessionContainer->getFinalInformation()
	        ]
	    ];
	    
	    // return the array with the mapping data for the pairs game
	    return $l_arrAjaxResponse;
	}
	    
	/**
	 * Set the request array from the getPost array
	 */
	protected function getRequestArgumentsFromGetPost(ServerRequestInterface $request): array {
		// the returning array
		$arrArguments = [];
		
		$validArguments = ['controllerName','actionName','actionArguments'];
		foreach($validArguments as $argument) {
			$arrArguments[$argument] = $this->extractValueFromPost($request, $argument);
		}
		
		return $arrArguments;
	}
	
	/**
	 * Korrigiert Objekte aus der Session die beim deserialisieren ein __PHP_Incomplete_Class Objekt werden
	 * @param object $i_objObject
	 * @return object
	 */
	protected function fixSessionObject(&$i_objObject): object {
	    
	    if (is_object ($i_objObject) && get_class($i_objObject) == '__PHP_Incomplete_Class')
	        return ($i_objObject = unserialize(serialize($i_objObject)));
	        
	        return $i_objObject;
	}

	/**
	 * Extracts a specific value from the POST parameters of the request.
	 *
	 * @param ServerRequestInterface $request
	 * @param string $argument The name of the argument to extract from the POST parameters.
	 * @return mixed The extracted value from the POST parameters.
	 */
	protected function extractValueFromPost(ServerRequestInterface $request, string $argument): mixed {
		return $request->getParsedBody()[$argument] ?? $request->getQueryParams()[$argument] ?? null;
	}
}
