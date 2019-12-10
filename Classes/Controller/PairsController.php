<?php
namespace Loss\Glpairs\Controller;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Service\CacheService;
use Loss\Glpairs\Domain\Model\Pair;
use Loss\Glpairs\ViewHelpers\UidViewHelper;
use Loss\Glpairs\Container\SessionContainer;


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
 *
 *
 * @package glpairs
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class PairsController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
	
	//*****************************************************************************
	// The constants of this class
	//*****************************************************************************
	
	/**
	 * The vendor of this extension
	 * @var \string
	 */
	const c_strVendor = 'loss';
	
	/**
	 * The name of this extension
	 * @var \string
	 */
	const c_strExtensionName = 'glpairs';
	
	/**
	 * The Plugin Name
	 * @var \string
	 */
	const c_strPluginName = 'pi1';
	
	/**
	 * Pairstype for the same picture for every pair.
	 * @var \integer
	 */
	const c_intPairsTypeSamePic = 0;
	
	/**
	 * Pairstype for two similair pictures for every pair.
	 * @var \integer
	 */
	const c_intPairsType2Pic = 1;
	
	/**
	 * Pairstype for a picture with text description for every pair.
	 * @var \integer
	 */
	const c_intPairsTypePicText = 2;
	
	/**
	 * Pairstype for text only for every pair.
	 * @var \integer
	 */
	const c_intPairsTypeTextOnly = 3;
	
	/**
	 * Suffix for Pairstype for the same picture of every pair.
	 * @var \string
	 */
	const c_strPairsTypeSamePic = 'SamePic';
	
	/**
	 * Suffix for Pairstype for the two similair pictures of every pair.
	 * @var \string
	 */
	const c_strPairsType2Pic = '2Pic';

	/**
	 * Suffix for Pairstype with a picture with text description for every pair
	 * @var \string
	 */
	const c_strPairsTypePicText = 'PicText';
	
	/**
	 * Suffix for Pairstype with a picture with text description for every pair
	 * @var \string
	 */
	const c_strPairsTypeTextOnly = 'TextOnly';
	
	/**
	 * The upper arrea of the pairs game in split mode.
	 */
	const c_strPairsAreaUpper = 'upper';
	
	/**
	 * The lower arrea of the pairs game in split mode.
	 */
	const c_strPairsAreaLower = 'lower';
	
	/**
	 * The name of the Identifier of the Mapping array for external ID 1
	 * @var \string
	 */
	const c_strArrIdExtId1 = 'extID1';
	
	/**
	 * The name of the Identifier of the Mapping array for external ID 2
	 * @var \string
	 */
	const c_strArrIdExtId2 = 'extID2';
	
	/**
	 * The ID for the session key for storing the static array $arrPairsData
	 * @see $arrPairsData
	 * @var string
	 */
	const c_strSessionIdPairsData = 'glpairs_pairsdata';
	
	
	/**
	 * The identifier in the array with the ajax response for the unique ID
	 * @var unknown
	 */
	const c_strArrAjaxUniqueID = 'strUniqueId';
	
	/**
	 * The identifier in the array with the ajax response for the actual result
	 * @var unknown
	 */
	const c_strArrAjaxResult = 'result';
	
	/**
	 * Name for the identifier for external IDs of the array $arrPairsData
	 * @see $arrPairsData
	 * @var string
	 */
	const c_strArrPairsDataExtId = 'arrExtIdMap';
	
	/**
	 * Name for the identifier for uIDs of the array $arrPairsData
	 * @see $arrPairsData
	 * @var string
	 */
	const c_strArrPairsDataUid = 'arrUidMap';
		
	/**
	 * Name for the identifier for the pairs type
	 * @var string
	 */
	const c_strArrPairsPairsType = 'pairsType';
	
	/**
	 * Name for the identifier for the splitmode
	 * @var string
	 */
	const c_strArrPairsSplitMode = 'splitmode';
	
	/**
	 * Name for the identifier for the internationalized strings in the frontend
	 * @var string
	 */
	const c_strArrPairsI18n = 'i18n';
	
	/**
	 * Name for the identifier for the number of pairs in the game
	 * @var string
	 */
	const c_strArrPairsPairscount = 'pairscount';

	/**
	 * Name for the identifier for the pluspoints
	 * @var string
	 */
	const c_strArrPairsPluspoints = 'pluspoints';

	/**
	 * Name for the identifier for the minuspoints
	 * @var string
	 */
	const c_strArrPairsMinuspoints = 'minuspoints';
	
	/**
	 * Name for the identifier for the turnbackdelay
	 * @var string
	 */
	const c_strArrPairsTurnbackdelay = 'turnbackdelay';
	
	/**
	 * Name for the identifier for the hintdelay
	 * @var string
	 */
	const c_strArrPairsHintdelay = 'hintdelay';
	
	/**
	 * Name for the identifier for the turnduration
	 * @var string
	 */
	const c_strArrPairsTurnduration = 'turnduration';
	
	/**
	 * Name for the identifier for the stackduration
	 * @var string
	 */
	const c_strArrPairsStackduration = 'stackduration';
	
	/**
	 * Name for the identifier for the testmode
	 * @var string
	 */
	const c_strArrPairsTestmode = 'testmode';
	
	/**
	 * Name for the identifier for the testmodeturndelay
	 * @var string
	 */
	const c_strArrPairsTestmodeTurnDelay = 'testmodeturndelay';
	
	/**
	 * Name for the identifier for the final information array
	 * @var array
	 */
	const c_strArrPairsFinalInformation = 'finalinformation';
	
	/**
	 * CardNumber for the first card in the pair
	 */
	const c_strCardNumberFirst = 'first';
		
	/**
	 * CardNumber for the second card in the pair
	 */
	const c_strCardNumberSecond = 'second';
		
	/**
	 * CardNumber for the both cards in the pair
	 */
	const c_strCardNumberAll = 'all';
		
	//*****************************************************************************
	// The static members of this class
	//*****************************************************************************
	
	/**
	 * A static array with the several pairs data stored with the uniqueID as Key
	 * First value:		uniqueID of the pairs game
	 * Second value:	Array(
	 * 			arrExtIdMap	: Array with the external ID mapping @see $m_arrExtIdMapping
	 * 			arrUidMap	: Array with the uID mapping @see $m_arrUidMapping
	 * 		)
	 *
	 * See also the constants with the prefix c_strArrPairsData* for the name of the identifiers.
	 *
	 * @see $c_strArrPairsDataExtId
	 * @see $c_strArrPairsDataUid
	 * @var array
	 */
	public static $arrPairsData = array();
	
	
	//*****************************************************************************
	// The member attributes of this class
	//*****************************************************************************
	
	
	/**
	 * m_objPairsRepository
	 *
	 * @var \Loss\Glpairs\Domain\Repository\PairsRepository
	 */
	protected $m_objPairsRepository;
	

    /**
     * Array with the mapping from external ID to the uID
     * First Index: 	The external ID of the Pair
     * Value:			The uID of the Pair
     * @var array
     */
    protected $m_arrExtIdMapping = array();
	     
    /**
     * Array with the mapping from the uID to the external ID 
     * First Index: 	The uID of the Pair
     * Value:	array with 2 dimensions (see constants with prefix c_strArrIdExtId):
     * 		  extID1: 	The extID1 of the pair
     * 		  extID2: 	The extID2 of the pair
     * @var array
     */
    protected $m_arrUidMapping = array();
	     

    /**
     * Inject a Pairs repository to enable DI
     *
     * @param \Loss\Glpairs\Domain\Repository\PairsRepository $pairsRepository
     */
    public function injectPairsRepository(\Loss\Glpairs\Domain\Repository\PairsRepository $pairsRepository)
    {
        $this->m_objPairsRepository = $pairsRepository;
    }
    
    /**
	 * All actions which we need to perform before avery other action
	 * @see \TYPO3\CMS\Extbase\Mvc\Controller\ActionController::initializeAction()
	 */
	protected function initializeAction() {
		
		// the init javascript content
		$l_strJsInit = '';
		
		$this->response->addAdditionalHeaderData('<!-- Start of include files for glpairs ' . $this->getPairsUniqueId() . ' -->');
		
		// set the init javascript content
		$l_strJsInit = 
			'<script type="text/javascript">
			
				// Store the ID ' . $this->getPairsUniqueId() . ' of the glpairs extension globaly 
				if (arrGlpairsIds == null) {
					
					var arrGlpairsIds = new Array("' . $this->getPairsUniqueId() . '");
				} else {
					arrGlpairsIds.push( "' . $this->getPairsUniqueId() . '" );
				}
			</script>';
		$this->response->addAdditionalHeaderData($l_strJsInit);

		$this->response->addAdditionalHeaderData('<!-- End of include files for glpairs ' . $this->getPairsUniqueId() . ' -->');
	} 
	
	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		
		// the Session container object
		/* @var $l_objSessionContainer \Loss\Glpairs\Container\SessionContainer */
		$l_objSessionContainer = NULL;
		
		// Structured ObjectStorage of the pairs for the view
		/* @var $l_objPairsStorage \TYPO3\CMS\Extbase\Persistence\ObjectStorage */
		$l_objPairsStorage = $this->objectManager->get('TYPO3\CMS\Extbase\Persistence\ObjectStorage');
		
		/* @var $l_objPairsData \Loss\Glpairs\Domain\Model\Pairs */
		$l_objPairsData = NULL;
		
		// cache service object
		/* @var $l_bojCacheService \TYPO3\CMS\Extbase\Service\CacheService */
		$l_objCacheService = NULL;
		
		// disable caching for this action, the paramter in the ext_localconf.php for the method
		// ExtensionUtility::configurePlugin() is not enough
		$l_objCacheService = $this->objectManager->get('TYPO3\CMS\Extbase\Service\CacheService');
		$l_objCacheService->clearPageCache( intval($GLOBALS['TSFE']->id));
		
		// retreive the pairs game from the database
		$l_objPairsData = $this->m_objPairsRepository->getPairByName($this->settings['pairsgame']);
		
		// if the limit of max. cards in one game is activated
		if ($l_objPairsData->getmaxcards() > 0) {
			// limit the number of cards for one game
			$l_objPairsData->setHasPairs($this->randomizeObjectStorage( $l_objPairsData->getHasPairs(), 
																 		$l_objPairsData->getmaxcards()));
		}
		
		// set the external IDs
		$this->setExternalIds($l_objPairsData);
		
		// dependent of the pairs type prepair the input data of the view 
		switch ($l_objPairsData->getType()) {
		    
			// ********************************************************************************************************
			// if we have the pairs type Picture To Text
			case PairsController::c_intPairsTypePicText:
		    	
		    	// if we are in splitmode
		    	if ($l_objPairsData->getSplitmode() == true) {
			    	// assign first the upper pairs with the image cards
			    	$l_objPairsStorage = $this->getStructuredPairs($l_objPairsData, Pair::C_STR_CARD_TYPE_IMAGE, 1, 
			    												   self::c_strCardNumberFirst);
			    	$this->view->assign('upperPairs', $l_objPairsStorage);
			    	// then with a different order the text pairs
			    	$l_objPairsStorage = $this->getStructuredPairs($l_objPairsData, Pair::C_STR_CARD_TYPE_TEXT, 1, 
			    												   self::c_strCardNumberSecond);
			    	$this->view->assign('lowerPairs', $l_objPairsStorage);
		    	} 

		    	// if we are not in splitmode
		    	else {
		    		// assign only the upper part with all cards
		    		$l_objPairsStorage = $this->getStructuredPairs(
		    											$l_objPairsData, Pair::C_STR_CARD_TYPE_IMAGE, 1,
    													self::c_strCardNumberAll, Pair::C_STR_CARD_TYPE_TEXT, 1);
		    		$this->view->assign('upperPairs', $l_objPairsStorage);
		    		
		    	}
		    	break;
		    	 
			// ********************************************************************************************************
		    // if we have the pairs type 2 different but similar pictures 
			case PairsController::c_intPairsType2Pic:
				// if we are in splitmode
				if ($l_objPairsData->getSplitmode() == true) {
					// assign first the upper pairs with the image cards
					$l_objPairsStorage = $this->getStructuredPairs($l_objPairsData, Pair::C_STR_CARD_TYPE_IMAGE, 1, 
			    												   self::c_strCardNumberFirst);
					$this->view->assign('upperPairs', $l_objPairsStorage);
					// then with a different order the text pairs
					$l_objPairsStorage = $this->getStructuredPairs($l_objPairsData, Pair::C_STR_CARD_TYPE_IMAGE, 2, 
			    												   self::c_strCardNumberSecond);
					$this->view->assign('lowerPairs', $l_objPairsStorage);
		    	} 

		    	// if we are not in splitmode
		    	else {
		    		// assign only the upper part with all cards
		    		$l_objPairsStorage = $this->getStructuredPairs(
		    				$l_objPairsData, Pair::C_STR_CARD_TYPE_IMAGE, 1,
		    				self::c_strCardNumberAll, Pair::C_STR_CARD_TYPE_IMAGE, 2);
		    		$this->view->assign('upperPairs', $l_objPairsStorage);
		    		
		    	}
				break;

			// ********************************************************************************************************
			// if we have the pairs type 2 pictures but both the same picture
			case self::c_intPairsTypeSamePic:
				// if we are in splitmode
				if ($l_objPairsData->getSplitmode() == true) {
					// assign first the upper pairs with the image cards
					$l_objPairsStorage = $this->getStructuredPairs($l_objPairsData, Pair::C_STR_CARD_TYPE_IMAGE, 1, 
			    												   self::c_strCardNumberFirst);
					$this->view->assign('upperPairs', $l_objPairsStorage);
					// then with a different order the text pairs
					$l_objPairsStorage = $this->getStructuredPairs($l_objPairsData, Pair::C_STR_CARD_TYPE_IMAGE, 1, 
			    												   self::c_strCardNumberSecond);
					$this->view->assign('lowerPairs', $l_objPairsStorage);
		    	} 

		    	// if we are not in splitmode
		    	else {
		    		// assign only the upper part with all cards
		    		$l_objPairsStorage = $this->getStructuredPairs(
		    				$l_objPairsData, Pair::C_STR_CARD_TYPE_IMAGE, 1,
		    				self::c_strCardNumberAll, Pair::C_STR_CARD_TYPE_IMAGE, 1);
		    		$this->view->assign('upperPairs', $l_objPairsStorage);
		    		
		    	}
				break;
				
		    
			// ********************************************************************************************************
			// if we have the pairs type two text cards with for instance a german and a english word
			case self::c_intPairsTypeTextOnly:
				// if we are in splitmode
				if ($l_objPairsData->getSplitmode() == true) {
					// assign first the upper pairs with the image cards
					$l_objPairsStorage = $this->getStructuredPairs($l_objPairsData, Pair::C_STR_CARD_TYPE_TEXT, 1, 
			    												   self::c_strCardNumberFirst);
					$this->view->assign('upperPairs', $l_objPairsStorage);
					// then with a different order the text pairs
					$l_objPairsStorage = $this->getStructuredPairs($l_objPairsData, Pair::C_STR_CARD_TYPE_TEXT, 2, 
			    												   self::c_strCardNumberSecond);
					$this->view->assign('lowerPairs', $l_objPairsStorage);
		    	} 

		    	// if we are not in splitmode
		    	else {
		    		// assign only the upper part with all cards
		    		$l_objPairsStorage = $this->getStructuredPairs(
		    				$l_objPairsData, Pair::C_STR_CARD_TYPE_TEXT, 1,
		    				self::c_strCardNumberAll, Pair::C_STR_CARD_TYPE_TEXT, 2);
		    		$this->view->assign('upperPairs', $l_objPairsStorage);
		    		
		    	}
				break;
			
		    default:
		        throw new \Loss\Glpairs\Exceptions\Exception('Unknown pairs type \'' . 
		        											 $l_objPairsData->getType() . 
		        											 '\' for the pairs game with the uID\'' . 
		        											 $l_objPairsData->getUid() . 
		        											 '\' and the name \'' . 
		        											 $l_objPairsData->getName() . '\'');
		    break;
		}
		
		// assign the pairs object with the overall data for the pairs game
		$this->view->assign('pairsGame', $l_objPairsData);
		
		// create the session container
		$l_objSessionContainer = $this->objectManager->get('Loss\Glpairs\Container\SessionContainer');
		
		// set the data
		$l_objSessionContainer->setm_arrExtIdMapping($this->m_arrExtIdMapping);
		$l_objSessionContainer->setm_arrUidMapping($this->m_arrUidMapping);
		$l_objSessionContainer->setm_intPairsType($l_objPairsData->getType());
		$l_objSessionContainer->setm_blnSplitMode($l_objPairsData->getSplitmode());
		$l_objSessionContainer->setm_arrI18n($this->getI18nFrontendValues());
		$l_objSessionContainer->setm_intPairsCount($l_objPairsData->getHasPairs()->count());
		$l_objSessionContainer->setPluspoints($l_objPairsData->getPluspoints());
		$l_objSessionContainer->setMinuspoints($l_objPairsData->getMinuspoints());
		$l_objSessionContainer->setTurnbackdelay($l_objPairsData->getTurnbackdelay());
		$l_objSessionContainer->setHintdelay($l_objPairsData->getHintdelay());
		$l_objSessionContainer->setTurnduration($l_objPairsData->getTurnduration());
		$l_objSessionContainer->setStackduration($l_objPairsData->getStackduration());
		$l_objSessionContainer->setTestmode($l_objPairsData->getTestmode());
		$l_objSessionContainer->setTestModeTurnDelay($l_objPairsData->getTestModeTurnDelay());
		$l_objSessionContainer->setFinalInformation($this->getFinalInformationArray($l_objPairsData->getHasPairs()));
		
		// fill the static array for the session storage
		self::$arrPairsData[$this->getPairsUniqueId()] = $l_objSessionContainer;

		// store this data for later access in the ajax sessions
		$GLOBALS['TSFE']->fe_user->setAndSaveSessionData(
								self::c_strSessionIdPairsData . '_' . $this->getPairsUniqueId(), 
								self::$arrPairsData);
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
	public function ajaxBasicDataAction($i_strUniquId) {
		
		// array with the ajax response
		$l_arrAjaxResponse = array();
		// the Session data container
		/* @var $l_objSessionContainer \Loss\Glpairs\Container\SessionContainer */
		$l_objSessionContainer = NULL;
		
		/* @var \TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController $GLOBALS['TSFE'] */ 
		// restore the static array with all pairs data from the session
		self::$arrPairsData = $GLOBALS['TSFE']->fe_user->getKey('ses', 
														self::c_strSessionIdPairsData . '_' . $i_strUniquId);
		
		// get the session data container
		$l_objSessionContainer = self::$arrPairsData[$i_strUniquId];
		
		$l_arrAjaxResponse = array(
			self::c_strArrAjaxUniqueID 	=> $i_strUniquId,
			self::c_strArrAjaxResult	=> array( 
				self::c_strArrPairsDataExtId 	=> $l_objSessionContainer->getm_arrExtIdMapping(),
			 	self::c_strArrPairsDataUid		=> $l_objSessionContainer->getm_arrUidMapping(),
				self::c_strArrPairsPairsType	=> $l_objSessionContainer->getm_intPairsType(),
				self::c_strArrPairsSplitMode	=> $l_objSessionContainer->getm_blnSplitMode(),
				self::c_strArrPairsI18n			=> $l_objSessionContainer->getm_arrI18n(),
				self::c_strArrPairsPairscount	=> $l_objSessionContainer->getm_intPairsCount(),
				self::c_strArrPairsPluspoints	=> $l_objSessionContainer->getPluspoints(),
				self::c_strArrPairsMinuspoints	=> $l_objSessionContainer->getMinuspoints(),
				self::c_strArrPairsTurnbackdelay =>	$l_objSessionContainer->getTurnbackdelay(),
				self::c_strArrPairsHintdelay	=> $l_objSessionContainer->getHintdelay(),
				self::c_strArrPairsTurnduration	=> $l_objSessionContainer->getTurnduration(),
				self::c_strArrPairsStackduration => $l_objSessionContainer->getStackduration(),
				self::c_strArrPairsTestmode		=> $l_objSessionContainer->getTestmode(),
				self::c_strArrPairsTestmodeTurnDelay => $l_objSessionContainer->getTestModeTurnDelay(),
				self::c_strArrPairsFinalInformation => $l_objSessionContainer->getFinalInformation()
			)
		);
		
		// return the array with the mapping data for the pairs game
		$this->request->setArgument('e_objAjaxResponse', $l_arrAjaxResponse);
	}
	

	/**
	 * Sort an ObjectStorage in an randomized order
	 * 
	 * @param 	\TYPO3\CMS\Extbase\Persistence\ObjectStorage 	$i_objObjectStorage
	 * @param 	integer 										$i_intMaxCards Max. number which is given back. 
	 * 																		   If 0 then all obejcts are returned.
	 * @return 	\TYPO3\CMS\Extbase\Persistence\ObjectStorage
	 */
	protected function randomizeObjectStorage($i_objObjectStorage, $i_intMaxCards = 0){
		// the returning ObjectStorage
		/* @var $l_objObjectStorage  \TYPO3\CMS\Extbase\Persistence\ObjectStorage */
		$l_objObjectStorage = $this->objectManager->get('TYPO3\CMS\Extbase\Persistence\ObjectStorage'); 
		// buffer array for the sorting
		$l_arrSort = array();
		// sorting key
		$l_intKey = 0;
		// counter
		$l_intCounter = 0;
		
		foreach ($i_objObjectStorage as $l_objObject) {
			$l_intKey = rand(1, getrandmax());
			
			// if the key is already in use
			if ($this->existKeyOfArray($l_intKey, $l_arrSort)) {
				// looking for the next free key
			    $l_intKey = $this->getNextFreeKey($l_intKey, $l_arrSort);
			}
			
			// set the object into the array with the new key 
			$l_arrSort[$l_intKey] = $l_objObject;
		}
		
		// give the objects the new sort order
		ksort($l_arrSort);
		
		// go through the array
		foreach ($l_arrSort as $l_objObject) {
			$l_intCounter += 1;
			
			// if the max number of cards is not 0
			// and if the current number is bigger then the max. number
			if ($i_intMaxCards != 0 && $i_intMaxCards < $l_intCounter) {
			    break;
			}
			
		    $l_objObjectStorage->attach($l_objObject);
		}
		
		// return the new sorted ObjectStorage
		return $l_objObjectStorage;
	}
	
	/**
	 * Check if the given key is already used in array
	 * 
	 * @param int 	    $i_key
	 * @param array  	$i_arrArray
	 * @return boolean
	 */
	protected function existKeyOfArray($i_intKey, $i_arrArray) {
		if (isset($i_arrArray[$i_intKey])) {
		    return true;
		}
		else {
		    return false;
		}
	}
	
	/**
	 * Search for the next key
	 * 
	 * @param 	int 	    $i_intKey
	 * @param 	array 		$i_arrArray
	 * @return 	int
	 */
	protected function getNextFreeKey($i_intKey, $i_arrArray) {
		// the free key
		$l_intKey = 0;
		
		// if all positions of the array are set
		if (count($i_arrArray) >= getrandmax()) {
		    throw new \Loss\Glpairs\Exceptions\Exception('Unable to get a new key. To many postitions (' . 
		    											 getrandmax() .
														 ') are already set in the array. You have to many pairs in this game.');
		}
		
		$l_intKey = $i_intKey;
		
		// add 1 to the key
		$l_intKey = $this->addIntValue($l_intKey);
		
		while (isset($i_arrArray[$l_intKey])) {
			// add 1 to the key
			$l_intKey = $this->addIntValue($l_intKey);
		}
		
		return $l_intKey;
	}
	
	/**
	 * Add 1 to an value with overflow protection
	 * 
	 * @param 	int	       $i_intValue
	 * @return 	int
	 */
	protected function addIntValue($i_intValue) {
		
		$l_intValue = $i_intValue;
		
		// if the largest possible value is reached
		if ($i_intValue >= getrandmax()) {
			$l_intValue = 0;
		}
		else {
		    $l_intValue++;
		}
		
		return $l_intValue;
	}
	
	/**
	 * Returns a special structured ObjectStorage for the pairs.
	 * Imlicit all pairs are formatted with the settings for the default image or description.
	 * For every Row is a own ObjectStorage and in this ObjectStoage reside the pairs
	 * 
	 * @param 	\Loss\Glpairs\Domain\Model\Pairs	$i_objPairs
	 * @param	string								$i_strCardType1 The Type of the card for the first requested area 
	 * 															  	See constant with the prefix Pair::C_STR_CARD_TYPE*.
	 * @param	integer								$i_intDefault1	The default image or description 1 is for image1 or 
	 * 																description1 and 2 is for image2 or description2
	 * @param	string								$i_strCardNumber The number of the cards in the pair. The first,
	 * 																 the second or both cards ar posible. See the 
	 * 																 constants of PairsController::c_strCardNumber*
	 * @param	string								$i_strCardType2	If we like to get all card pairs we need to define 
	 * 																the card type for the second card here see description
	 * 																of parameter $i_intDefault1 
	 * @param	integer								$i_intDefault2	If we like to get all card pairs we need to define
	 * 																the default image or description for the second card
	 * 																here. See the descrition of parameter $i_intDefault1
	 * @return 	\TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Persistence\ObjectStorage>
	 */
	protected function getStructuredPairs($i_objPairs, $i_strCardType1, $i_intDefault1, 
											  $i_strCardNumber,  $i_strCardType2 = '', $i_intDefault2 = 0 ) {
		
		// the raw ObjectStorage with the pairs
		/* @var $l_objRawPairsObjectStorage \TYPO3\CMS\Extbase\Persistence\ObjectStorage */ 
		$l_objRawPairsObjectStorage = NULL;
		
		// a temporary ObjectStorage for the scond cards if we need all card pairs
		/* @var $l_objRawPairsObjectStorage2 \TYPO3\CMS\Extbase\Persistence\ObjectStorage */ 
		$l_objRawPairsObjectStorage2 = NULL;
		
		// the randomized ObjectStorage with the pairs
		/* @var $l_objRandomObjectStorage \TYPO3\CMS\Extbase\Persistence\ObjectStorage */ 
		$l_objRandomObjectStorage = NULL;
		
		// The ObjectStorage for one row
		/* @var $l_objRowStorage \TYPO3\CMS\Extbase\Persistence\ObjectStorage */
		$l_objRowStorage = NULL;
		
		// the first pair of cards
		/* @var $l_objPair1 \Loss\Glpairs\Domain\Model\Pair */
		$l_objPair1 = NULL;
		
		// the second pair of cards
		/* @var $l_objPair2 \Loss\Glpairs\Domain\Model\Pair */
		$l_objPair2 = NULL;
		
		// the CardNumber of the pair
		$l_intCardNumber = 0;
		
		// first get the raw pairs
		$l_objRawPairsObjectStorage = $i_objPairs->getHasPairs();
		
		// if this is for the second card
		if ($i_strCardNumber == self::c_strCardNumberSecond) {
		    $l_intCardNumber = 2;
		}
		// for both or only for the first card it is here always the first
		else {
		    $l_intCardNumber = 1;
		}
		
		// set the pair to image with default image1
		$l_objRawPairsObjectStorage = $this->setPairDefaultParameter($l_objRawPairsObjectStorage, 
																   	 $i_strCardType1, 
																   	 $i_intDefault1,
																	 $l_intCardNumber);
		// if we need all card pairs
		if ($i_strCardNumber == self::c_strCardNumberAll) {
			// get the pairs for a second time
		    $l_objRawPairsObjectStorage2 = $i_objPairs->getHasPairs();
		    // format them with the settings of the second cards
		    $l_objRawPairsObjectStorage2 = $this->setPairDefaultParameter($l_objRawPairsObjectStorage2,
																    	  $i_strCardType2,
																    	  $i_intDefault2,
																		  2);
		    // if we are not in test mode
		    if (!$i_objPairs->getTestmode()) {
    		    // go through every pair from the second cards
			    foreach ($l_objRawPairsObjectStorage2 as $l_objPair2) {
			    	// attach all this cards to the main raw pairs ObjectStorage
			    	$l_objRawPairsObjectStorage->attach($l_objPair2);
			    }
		    }
		}
		
		// if we are not in testmode
		if (!$i_objPairs->getTestmode()) {
			// get the pairs in a randomized order
			$l_objRandomObjectStorage = $this->randomizeObjectStorage($l_objRawPairsObjectStorage);
		}
		
		// if we are in test mode and no split mode 
		elseif ($i_strCardNumber == self::c_strCardNumberAll){
			// create a new object storage
			$l_objRandomObjectStorage = $this->objectManager->get('TYPO3\CMS\Extbase\Persistence\ObjectStorage');
			
			foreach ($l_objRawPairsObjectStorage as $l_objPair1) {
				// attach the first card
				$l_objRandomObjectStorage->attach($l_objPair1);
				
				// lokking for the second card
				$l_objPair2 = $this->searchPairFromObjStorage($l_objPair1->getUid(), 
															  $l_objRawPairsObjectStorage2);
				
				// attach the second card directly after the first card of the pair
				$l_objRandomObjectStorage->attach($l_objPair2);
			}
		}
		
		// in test mode and in split mode
		else {
			// give the pairs without randomisation
			$l_objRandomObjectStorage = $l_objRawPairsObjectStorage;
		}
		
		// set all pairs into a ObjectStorage structured into rows
		$l_objRowStorage = $this->structurePairsIntoRows($i_objPairs, $l_objRandomObjectStorage);
		
		// return the ObjectStorage
		return  $l_objRowStorage;
	}
	
	/**
	 * Create ObjectStorage with pairs structured into rows. 
	 * @param \Loss\Glpairs\Domain\Model\Pairs				$i_objPairs			The pairs game
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage 	$i_objObjectStorage	The object storage with all the pairs.
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage						A ObjectStorage with all the pairs structured into rows.
	 */
	protected function structurePairsIntoRows($i_objPairs, $i_objObjectStorage) {

		// The returning ObjectStorage 
		/* @var $l_objRetObjectStorage \TYPO3\CMS\Extbase\Persistence\ObjectStorage */
		$l_objRetObjectStorage = $this->objectManager->get('TYPO3\CMS\Extbase\Persistence\ObjectStorage');

		// The ObjectStorage for one row
		/* @var $l_objRowStorage \TYPO3\CMS\Extbase\Persistence\ObjectStorage */
		$l_objRowStorage = NULL;
		
		// a pair of cards
		/* @var $l_objPair \Loss\Glpairs\Domain\Model\Pair */
		$l_objPair = NULL;
		
		// Key of the pair
		$l_intKey = 0;
		
		// go through all pairs
		foreach ($i_objObjectStorage as $l_objPair) {
			
			// if this is the first pair
			if ($l_intKey == 0) {
			    $l_objRowStorage = $this->objectManager->get('TYPO3\CMS\Extbase\Persistence\ObjectStorage');
			}
			
			// if width of the game is set
			// and if we need to begin a new row
			elseif ( $i_objPairs->getWidth() != 0 && $l_intKey % $i_objPairs->getWidth() == 0) {
				// attach the row to the storage
			    $l_objRetObjectStorage->attach($l_objRowStorage);
			    // create a new row
			    $l_objRowStorage = $this->objectManager->get('TYPO3\CMS\Extbase\Persistence\ObjectStorage');
			}
			
			// attach pair to the row
			$l_objRowStorage->attach($l_objPair);
			
			$l_intKey++;
		}
		
		// if width of the game is set
		// and if the last row is not already full
		while ($i_objPairs->getWidth() != 0 && $l_objRowStorage->count() < $i_objPairs->getWidth()) {
		    // create an empty pair
		    $l_objPair = $this->objectManager->get('Loss\Glpairs\Domain\Model\Pair');
		    $l_objPair->setEmpty(true);
		    $l_objRowStorage->attach($l_objPair);
		}
		
		// attach the last row
		$l_objRetObjectStorage->attach($l_objRowStorage);
		
		return $l_objRetObjectStorage;
	}
	
	/**
	 * Set of the Pairs in the ObjectStorage the CardType an the default image or default description.
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $i_objObjectStorage	The ObjectStorage with the pairs.
	 * @param string 	$i_strCardType	The card type text or image see constants with the prefix Pair::C_STR_CARD_TYPE_* 
	 * @param integer 	$i_intDefault	1 if the default is image1 or description1 or 2 if default is image2 or description2.
	 * @param integer	$i_intCardNumber 1 For the first and 2 for the second card in the pair. 
	 */
	protected function setPairDefaultParameter($i_objObjectStorage, $i_strCardType, $i_intDefault, $i_intCardNumber) {
		// a pair of cards
		/* @var $l_objPair \Loss\Glpairs\Domain\Model\Pair */
		$l_objPair = NULL;

		// a cloned pair of cards
		/* @var $l_objPair \Loss\Glpairs\Domain\Model\Pair */
		$l_objClonePair = NULL;
		
		// The returning ObjectStorage
		/* @var $l_objRetStorage \TYPO3\CMS\Extbase\Persistence\ObjectStorage */
		$l_objRetStorage = $this->objectManager->get('TYPO3\CMS\Extbase\Persistence\ObjectStorage');
		
		
		foreach ($i_objObjectStorage as $l_objPair) {

			// clone the object, otherwise we can not change the settings for the second card
			$l_objClonePair = clone $l_objPair;
				
			// set CardType and CardNumber
			$l_objClonePair->setCardType($i_strCardType);
			$l_objClonePair->setCardNumber($i_intCardNumber);
			
			// if card type is image
			if ($i_strCardType == Pair::C_STR_CARD_TYPE_IMAGE) {
				// if default is image1
			    if ($i_intDefault == 1) {
			    	$l_objClonePair->setSettingsDefaultImage(pair::C_STR_DEFAULT_IMAGE1);
			    } 
				// if default is image2
			    elseif ($i_intDefault == 2) {
			    	$l_objClonePair->setSettingsDefaultImage(pair::C_STR_DEFAULT_IMAGE2);
				}
			} 
			
			// if card type is text
			elseif ($i_strCardType == Pair::C_STR_CARD_TYPE_TEXT) {
			    // if default is desciption1
				if ($i_intDefault == 1) {
			    	$l_objClonePair->setSettingsDefaultText(pair::C_STR_DEFAULT_TEXT1);
			    } 
			    // if default is desciption2
			    elseif ($i_intDefault == 2) {
			    	$l_objClonePair->setSettingsDefaultText(pair::C_STR_DEFAULT_TEXT2);
				}
			}
			
			// revalidate the default parameters
			$l_objClonePair->revalidate();
			
			// attach it into the returning ObjectStorage
			$l_objRetStorage->attach($l_objClonePair);
		}
		
		// return the ObjectStorage again
		return $l_objRetStorage;
	}
	
	/**
	 * Set the external IDs for the pairs. Every pairs has 2 external IDs. This ID staying for
	 * the both cards wich belong in the game together. This IDs will be used into the pairs
	 * game and are readable. An hidden array can bring this both ID together to the 
	 * uID of the pair itself, so that the pragramm can proof if the cards belong thogether.
	 * While setting the external IDs the both mapping arrays for the external IDs are build
	 * up as well.
	 *
	 * @param 	\Loss\Glpairs\Domain\Model\Pairs			$i_objPairs	The pairs game with all the pairs included.
	 * @return 	\Loss\Glpairs\Domain\Model\Pairs						The updated pairs game with the interal IDs
	 */
	protected function setExternalIds($i_objPairs) {
		
		// all the pairs of this pairs game
		/* @var $l_objPairObjectStorage \TYPO3\CMS\Extbase\Persistence\ObjectStorage */
		$l_objPairObjectStorage = NULL;
		
		// a pair of cards
		/* @var $l_objPair  \Loss\Glpairs\Domain\Model\Pair */
		$l_objPair = NULL;
		
		// first initialize the arrays with the external ID mapping
		$this->m_arrExtIdMapping = array();
		$this->m_arrUidMapping = array();
		
		
		// get all the pairs from the pairs game
		$l_objPairObjectStorage = $i_objPairs->getHasPairs();
		
		// go through every pair
		foreach ($l_objPairObjectStorage as $l_objPair) {
			// set the first external ID
			$l_objPair->setintExternalId1($this->getRandomExtId($this->m_arrExtIdMapping));
			// set the external ID Mapping
			$this->m_arrExtIdMapping[$l_objPair->getintExternalId1()] = $l_objPair->getUid();
			// set the second external ID
			$l_objPair->setintExternalId2($this->getRandomExtId($this->m_arrExtIdMapping));
			// set the external ID Mapping
			$this->m_arrExtIdMapping[$l_objPair->getintExternalId2()] = $l_objPair->getUid();
			
			// set the UID Mapping
			$this->m_arrUidMapping[$l_objPair->getUid()] = array(
						PairsController::c_strArrIdExtId1 => $l_objPair->getintExternalId1(),
						PairsController::c_strArrIdExtId2 => $l_objPair->getintExternalId2()	
					);
		}
	}
	
	
	/**
	 * Returns a unique random number for the external ID
	 * 
	 * @param array $i_arrExtIdMapping	All the current used external IDs 
	 * 								    for a check the the external ID is unique
	 * @return int					    The external ID
	 */
	protected function getRandomExtId($i_arrExtIdMapping) {
		// the new external IDy
		$l_intExtId = 0;
		
		// if all positions of the array are set
		if (count($i_arrExtIdMapping) >= getrandmax()) {
			throw new \Loss\Glpairs\Exceptions\Exception('Unable to get a new external ID. We have already ' .
														 getrandmax() .
														 ' defined. You have to many pairs in this game.');
		}
		
		$l_intExtId = rand(1, getrandmax());
		
		// while the external ID is already in use
		While ($this->existKeyOfArray($l_intExtId, $i_arrExtIdMapping)){
			
			// looking for the next free external ID
			if ($l_intExtId >= getrandmax()) {
			    $l_intExtId = 1;
			} else {
				$l_intExtId++;
			}
		}
		
		// return the new external ID
		return $l_intExtId;
	}
	
	/**
	 * Returns the unique ID of the pairs game.
	 * 
	 * @return string	The unique ID.
	 */
	protected function getPairsUniqueId() {
		// the returning unique ID
		$l_strUniqueID = '';
		
		$l_strUniqueID = $this->configurationManager->getContentObject()->data['uid'] . '_' . 
						 $this->settings['pairsgame'];
		
		return  $l_strUniqueID;
	}
	
	/**
	 * Check if a special value already exists in the additional header data
	 * @param 	array 	$i_arrAdditionalHeaderData	The array with all additional header datas
	 * @param 	string 	$i_strValue					The value vor which we should search
	 * @return	boolean								True if we have found the value 
	 */
	protected function existAdditionalHeaderData($i_arrAdditionalHeaderData, $i_strValue) {
		// one line in the header data
		$l_strHeaderLine = '';
		// the returning value
		$l_blnReturn = FALSE;
		
		// go through every line of the additional header data
		foreach ($i_arrAdditionalHeaderData as $l_strHeaderLine) {
			if (strpos($l_strHeaderLine, $i_strValue) == TRUE) {
				$l_blnReturn = TRUE;
			    break 1;
			}
		}
		
		// return the result
		return $l_blnReturn;
	}
	
	/**
	 * Returns a array with all strings for the frontend dialogs in the given language
	 * @return	array	Array with all internationalisation strings in the given language 
	 */
	protected function getI18nFrontendValues() {
		// the returnung array with the I18N values
		$l_arrI18nValues = array();

		$l_arrI18nValues = array(
				'errorWrongCardClickedUpper' => LocalizationUtility::translate('frontend_wrongCardClickedUpper', self::c_strExtensionName),
				'errorWrongCardClickedLower' => LocalizationUtility::translate('frontend_wrongCardClickedLower', self::c_strExtensionName),
				'gameFinished' => 			    LocalizationUtility::translate('frontend_gameFinished', self::c_strExtensionName),
				'clickHint' =>				    LocalizationUtility::translate('frontend_clickHint', self::c_strExtensionName),
				'testmode' =>				  	LocalizationUtility::translate('frontend_testmode', self::c_strExtensionName)
			);
		
		return $l_arrI18nValues;
	}
	
	/**
	 * Gets the pair with the given uID from the object storage.
	 * @param int $i_intUid
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $i_objObjectStorage
	 * @return \Loss\Glpairs\Domain\Model\Pair
	 */
	protected function searchPairFromObjStorage($i_intUid, $i_objObjectStorage) {
		// the current pair in the loop
		/* @var $l_objPair \Loss\Glpairs\Domain\Model\Pair */
		$l_objPair = NULL; 
		
		// go through all pairs in the object storage
		foreach ($i_objObjectStorage as $l_objPair) {
			if ($l_objPair->getUid() == $i_intUid) {
			    break;
			}
		}
		
		return $l_objPair;
	}
	
	/**
	 * Fill the final information array
	 *
	 * @param 	\TYPO3\CMS\Extbase\Persistence\ObjectStorage 	$i_objObjectStorage
	 * @return 	array 	Array with the data for the final informations of the pairs
	 * 					Index: The uID of the Pair
	 * 					Value: Array(
	 * 						  isActive => True if the final information is activated
	 * 						  content  => HTML content with the final information
	 * 						  width    => The width of the window with the final information
	 * 						  height   => The height of the window with the final information
	 *  					)
	 */
	protected function getFinalInformationArray($i_objPairs){
		// the current pair in the loop
		/* @var $l_objPair \Loss\Glpairs\Domain\Model\Pair */
		$l_objPair = NULL; 
		// the returning array
		$l_arrReturn = array();
		// array with the final informations
		$l_arrFIData = array();
		// the content of the final information
		$l_strFIContent = '';
	
		foreach ($i_objPairs as $l_objPair) {
			
			if ($l_objPair->getfinaltextactive()) {
			    $l_strFIContent = $l_objPair->getFinalText();
			} else {
				$l_strFIContent = '';
			}
			
			// build the content array
			$l_arrFIData = array(
					'isActive'  => $l_objPair->getfinaltextactive(),
					'content'   => $l_strFIContent,
					'width'	    => $l_objPair->getfinaltextwidth(),
					'height'    => $l_objPair->getfinaltextheight(),
					'picwidth'  => $l_objPair->getfinalpicwidth(),
					'picheight' => $l_objPair->getfinalpicheight()
				);
			
			// fill the returning array
			$l_arrReturn[$l_objPair->getUid()] = $l_arrFIData;
		}
		
		// return the array
		return $l_arrReturn;
	}
}
?>