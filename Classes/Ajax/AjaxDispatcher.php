<?php
namespace Loss\Glpairs\Ajax;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\Utility\EidUtility;
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
	 * Extbase Object Manager
	 * 
	 * @var \TYPO3\CMS\Extbase\Object\ObjectManager
	 */
	protected $objectManager;

	/**
	 * The name of the controller which will be used for the request.
	 * 
	 * @var string
	 */
	protected $controllerName;
	
	/**
	 * The action of the controller which will be called for the request.
	 * 
	 * @var string
	 */
	protected $actionName;
	
	/**
	 * The arguments for the called action.
	 * 
	 * @var array
	 */
	protected $actionArguments = array();
	
	
	/**
	 * Handle the ajax request and call finally a given controller with its action.
	 * 
	 * @return	object() The JSON object with the data for the ajax request.
	 */
	public function handleAjaxRequest() {
		
		// the output of the ajax request
		$arrOutput = array();
		
		// read the arguments like controller, action etc from the POST variables
		// and set it in the global attributes 'controllerName', 'actionName' and 'actionArguments'
		$this->initCallArguments();
		
		// call the controller action
		$arrOutput = $this->dispatchControllerAction();
		
		// return the JSON encoded content
		return json_encode($arrOutput);
	}
	
	/**
	 * Builds an extbase context and returns the response of the controller action.
	 *
	 * return array()	Response of the controller action.
	 */
	protected function dispatchControllerAction() {
		
		// the response object
		/* @var $response \TYPO3\CMS\Extbase\Mvc\Web\Response */
		$response = NULL;
		// the request object
		/* @var $request \TYPO3\CMS\Extbase\Mvc\Web\Request */
		$request = NULL;
		// the bootstra class
		/* @var $bootstrap \TYPO3\CMS\Extbase\Core\Bootstrap */
		$bootstrap = NULL;
		// the dispatcher for the extbaste request
		/* @var $dispatcher \TYPO3\CMS\Extbase\Mvc\Dispatcher */
		$dispatcher = NULL;
		// the configuration
		$configuration = array();
		
		$configuration['extensionName'] = PairsController::c_strExtensionName;
		$configuration['pluginName'] = PairsController::c_strPluginName;
		$configuration['vendorName'] = PairsController::c_strVendor;
		
		$bootstrap = GeneralUtility::makeInstance('TYPO3\CMS\Extbase\Core\Bootstrap');
		$bootstrap->initialize($configuration);
	
		$this->objectManager = GeneralUtility::makeInstance('TYPO3\CMS\Extbase\Object\ObjectManager');
		
		// build the request object with the requested controller and action name
		$request = $this->buildRequest();
		$response = $this->objectManager->get('TYPO3\CMS\Extbase\Mvc\Web\Response');
	
		$dispatcher =  $this->objectManager->get('TYPO3\CMS\Extbase\Mvc\Dispatcher');
		
		// call the desired action in the controller
		$dispatcher->dispatch($request, $response);
	
		$response->sendHeaders();
		
		// retrieve the export values from the called action 
		return $request->getArgument('e_objAjaxResponse');
	}
	
	/**
	 * Build a request object with the requested controller and action name
	 *
	 * @return \TYPO3\CMS\Extbase\Mvc\Web\Request $request
	 */
	protected function buildRequest() {
		/* @var $request \TYPO3\CMS\Extbase\Mvc\Web\Request */
		$request = $this->objectManager->get('TYPO3\CMS\Extbase\Mvc\Web\Request');
		$request->setControllerVendorName(PairsController::c_strVendor);
		$request->setControllerExtensionName(PairsController::c_strExtensionName);
		$request->setPluginName(PairsController::c_strPluginName);
		$request->setControllerName($this->controllerName);
		$request->setControllerActionName($this->actionName);
		$request->setArguments($this->actionArguments);
	
		return $request;
	}
	
	/**
	 * Prepare the call arguments
	 * 
	 */
	protected function initCallArguments() {
		// the requested arguments
		$arrReqArguments = array();
		
		// get the argument request from the POST or GET
		$request = GeneralUtility::_GP('request');
		
		// if there was the request argument
		if ($request) {
			// extract all data from the JSON encoding
			$arrReqArguments = $this->getRequestArgumentsFromJSON($request);
		
		// or all arguments ar given in extra arguments
		} else {
			$arrReqArguments = $this->getRequestArgumentsFromGetPost();
		}
	
		$this->controllerName = $arrReqArguments['controllerName'];
		$this->actionName = $arrReqArguments['actionName'];
		$this->actionArguments = $arrReqArguments['actionArguments'];
	
		if (!is_array($this->actionArguments)) $this->actionArguments = array();
	}

	
	/**
	 * Set the request array from JSON
	 *
	 * @param string $request	
	 * @return array 			All the arguments
	 */
	protected function getRequestArgumentsFromJSON($request) {
		// the returning array
		$arrArguments = array();
		
		$requestArray = json_decode($request, true);
		if(is_array($requestArray)) {
			$arrArguments = GeneralUtility::array_merge_recursive_overrule($arrArguments, $requestArray);
		}
		
		return $arrArguments;
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
