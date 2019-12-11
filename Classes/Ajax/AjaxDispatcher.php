<?php
namespace Loss\Glpairs\Ajax;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use Loss\Glpairs\Controller\PairsController;

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
	 * @return	object() The JSON object with the data for the ajax request.
	 */
	public function handleAjaxRequest() {
		
		// the output of the ajax request
		$arrOutput = array();
		
		// retrieve the Ajax data
		$arrOutput = $this->getAjaxBasicData( );
		
		// return the JSON encoded content
		return json_encode($arrOutput);
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
	protected  function getAjaxBasicData() {
	    // array with the ajax response
	    $l_arrAjaxResponse = array();
	    // UniqueId of the Pairs Game
	    $l_strUniquId = array();
	    // the Session data container
	    /* @var $l_objSessionContainer \Loss\Glpairs\Container\SessionContainer */
	    $l_objSessionContainer = NULL;
	    
	    // get the UniqeID from the GET/POST
	    $l_strUniquId = $this->getRequestArgumentsFromGetPost( )['actionArguments']['i_strUniquId'];
	    
	    /* @var \TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController $GLOBALS['TSFE'] */
	    // restore the static array with all pairs data from the session
	    PairsController::$arrPairsData = $GLOBALS['TSFE']->fe_user->getKey('ses',
	        PairsController::c_strSessionIdPairsData . '_' . $l_strUniquId);
	    
	    // get the session data container
	    $l_objSessionContainer = PairsController::$arrPairsData[$l_strUniquId];
	    
	    $l_arrAjaxResponse = array(
	        PairsController::c_strArrAjaxUniqueID 	=> $l_strUniquId,
	        PairsController::c_strArrAjaxResult	=> array(
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
	        )
	    );
	    
	    // return the array with the mapping data for the pairs game
	    return $l_arrAjaxResponse;
	}
	    
	/**
	 * Set the request array from the getPost array
	 */
	protected function getRequestArgumentsFromGetPost() {
		// the returning array
		$arrArguments = array();
		
		$validArguments = array('controllerName','actionName','actionArguments');
		foreach($validArguments as $argument) {
			if(GeneralUtility::_GP($argument)) $arrArguments[$argument] = GeneralUtility::_GP($argument);
		}
		
		return $arrArguments;
	}	
}
