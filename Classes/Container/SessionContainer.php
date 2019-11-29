<?php
namespace Loss\Glpairs\Container;

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
 * @package glpairs
 * 
 * Container Clas which stores all data for the session.
 */
class SessionContainer {
	
	// ***************************************************************************************
	// The attributes	
	// ***************************************************************************************
	
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
	 * Mode of the pairs game. See Constants with the prefix c_strPairsType*
	 * @var string
	 */
	protected $m_intPairsType = '';
	
	/**
	 * If True, then the game is in splitmode. If False all cards are displayed together.
	 * @var boolean
	 */
	protected $m_blnSplitMode = false;
	
	/**
	 * Array with all localized strings for the frontend dialogs
	 */
	protected $m_arrI18n = array();
	
	/**
	 * The number of pairs in the game.
	 */
	protected $m_intPairsCount = 0;
	
	/**
	 * Plus points for correct choice
	 *
	 * @var integer
	 */
	protected $pluspoints;
	
	/**
	 * penalty points for wrong choice
	 *
	 * @var integer
	 */
	protected $minuspoints;
	
	/**
	 * The delay for the automatic turn back of the cards
	 *
	 * @var integer
	 */
	protected $turnbackdelay;
	
	/**
	 * Delay for the hint to click on the screen
	 *
	 * @var integer
	 */
	protected $hintdelay;
	
	/**
	 * Duration for the turn of the cards
	 *
	 * @var integer
	 */
	protected $turnduration;
	
	/**
	 * Duration for the move to the card stack
	 *
	 * @var integer
	 */
	protected $stackduration;
	
	/**
	 * Flag if test mode is activated.
	 * 
	 * @var boolean
	 */
	protected $testmode;
		
	/**
	 * Delay between every card turn in the test mode.
	 * 
	 * @var integer
	 */
	protected $testmodeturndelay;
	
	/**
	 * Array with the final information.
	 *	Index: The uID of the Pair
	 *	Value: Array(
	 *					isActive => True if the final information is activated
	 *					content => HTML content with the final information
	 *			)
	 * @var array 
	 */
	protected $m_arrFinalInformation = array();
	
	/**
	 * __construct
	 *
	 * @return SessionContainer
	 */
	public function __construct() {

	}
	
	
	// ***************************************************************************************
	// Setter and getter methods	
	// ***************************************************************************************
	
	/**
	* Sets the Array with the mapping from external ID to the uID
	*
	* @param array $m_arrExtIdMapping
	* @return void
	*/
	public function setm_arrExtIdMapping($m_arrExtIdMapping){
		$this->m_arrExtIdMapping = $m_arrExtIdMapping;
	}
	
	/**
	* Returns the m_arrExtIdMapping
	* The Array with the mapping from external ID to the uID
	*
	* @return array $m_arrExtIdMapping
	*/
	public function getm_arrExtIdMapping(){
		return $this->m_arrExtIdMapping;
	}
	
	/**
	* Sets the m_arrUidMapping
	* The Array with the mapping from the uID to the external ID.
	*
	* @param array $m_arrUidMapping
	* @return void
	*/
	public function setm_arrUidMapping($m_arrUidMapping){
		$this->m_arrUidMapping = $m_arrUidMapping;
	}
	
	/**
	* Returns the m_arrUidMapping
	* The Array with the mapping from the uID to the external ID	
	*
	* @return array $m_arrUidMapping
	*/
	public function getm_arrUidMapping(){
		return $this->m_arrUidMapping;
	}
	
	/**
	* Sets the m_strPairsType
	* Mode of the pairs game. See Constants with the prefix PairsController::c_intPairsType*
	*
	* @param integer $i_strPairsType
	* @return void
	*/
	public function setm_intPairsType($i_intPairsType){
		$this->m_intPairsType = $i_intPairsType;
	}
	
	/**
	* Returns the m_strPairsType
	* Mode of the pairs game. See Constants with the prefix PairsController::c_intPairsType*
	*
	* @return integer $m_strPairsType
	*/
	public function getm_intPairsType(){
		return $this->m_intPairsType;
	}
	
	/**
	* Sets the m_blnSplitMode
	*
	* @param boolean $m_blnSplitMode
	* @return void
	*/
	public function setm_blnSplitMode($i_blnSplitMode){
		$this->m_blnSplitMode = $i_blnSplitMode;
	}
	
	/**
	* Returns the m_blnSplitMode
	*
	* @return boolean $m_blnSplitMode
	*/
	public function getm_blnSplitMode(){
		return $this->m_blnSplitMode;
	}
	
	/**
	* Sets the m_arrI18n
	*
	* @param array $m_arrI18n
	* @return void
	*/
	public function setm_arrI18n($i_arrI18n){
		$this->m_arrI18n = $i_arrI18n;
	}
	
	/**
	* Returns the m_arrI18n
	*
	* @return array $m_arrI18n
	*/
	public function getm_arrI18n(){
		return $this->m_arrI18n;
	}
	
	/**
	* Sets the m_intPairsCount
	*
	* @param integer $m_intPairsCount
	* @return void
	*/
	public function setm_intPairsCount($i_intPairsCount){
		$this->m_intPairsCount = $i_intPairsCount;
	}
	
	/**
	* Returns the m_intPairsCount
	*
	* @return integer $m_intPairsCount
	*/
	public function getm_intPairsCount(){
		return $this->m_intPairsCount;
	}

	/**
	* Returns the pluspoints
	*
	* @return integer $pluspoints
	*/
	public function getPluspoints(){
		return $this->pluspoints;
	}
	
	/**
	* Sets the pluspoints
	*
	* @param integer $pluspoints
	* @return void
	*/
	public function setPluspoints($i_intPpluspoints){
		$this->pluspoints = $i_intPpluspoints;
	}
	
	/**
	* Returns the minuspoints
	*
	* @return integer $minuspoints
	*/
	public function getMinuspoints(){
		return $this->minuspoints;
	}
	
	/**
	* Sets the minuspoints
	*
	* @param integer $minuspoints
	* @return void
	*/
	public function setMinuspoints($i_intMinuspoints){
		$this->minuspoints = $i_intMinuspoints;
	}
	
	/**
	* Returns the turnbackdelay
	*
	* @return integer $turnbackdelay
	*/
	public function getTurnbackdelay(){
		return $this->turnbackdelay;
	}
	
	/**
	* Sets the turnbackdelay
	*
	* @param integer $turnbackdelay
	* @return void
	*/
	public function setTurnbackdelay($i_intTurnbackdelay){
		$this->turnbackdelay = $i_intTurnbackdelay;
	}
	
	/**
	* Returns the hintdelay
	*
	* @return integer $hintdelay
	*/
	public function getHintdelay(){
		return $this->hintdelay;
	}
	
	/**
	* Sets the hintdelay
	*
	* @param integer $hintdelay
	* @return void
	*/
	public function setHintdelay($i_intHintdelay){
		$this->hintdelay = $i_intHintdelay;
	}
	
	/**
	* Returns the turnduration
	*
	* @return integer $turnduration
	*/
	public function getTurnduration(){
		return $this->turnduration;
	}
	
	/**
	* Sets the turnduration
	*
	* @param integer $turnduration
	* @return void
	*/
	public function setTurnduration($i_intTurnduration){
		$this->turnduration = $i_intTurnduration;
	}
	
	/**
	* Returns the stackduration
	*
	* @return integer $stackduration
	*/
	public function getStackduration(){
		return $this->stackduration;
	}
	
	/**
	* Sets the stackduration
	*
	* @param integer $stackduration
	* @return void
	*/
	public function setStackduration($i_intStackduration){
		$this->stackduration = $i_intStackduration;
	}
	
	/**
	* Returns the testmode
	*
	* @return boolean $testmode
	*/
	public function getTestmode(){
		return $this->testmode;
	}
	
	/**
	* Sets the testmode
	*
	* @param boolean $testmode
	* @return void
	*/
	public function setTestmode($i_blnTestmode){
		$this->testmode = $i_blnTestmode;
	}
	
	/**
	* Returns the testmodeturndelay
	*
	* @return integer $testmodeturndelay
	*/
	public function getTestModeTurnDelay(){
		return $this->testmodeturndelay;
	}
	
	/**
	* Sets the testmodeturndelay
	*
	* @param integer $testmodeturndelay
	* @return void
	*/
	public function setTestModeTurnDelay($i_intTestModeTurnDelay){
		$this->testmodeturndelay = $i_intTestModeTurnDelay;
	}
	
	/**
	* Returns the m_arrFinalInformation
	*
	* @return array $m_arrFinalInformation
	*/
	public function getFinalInformation(){
		return $this->m_arrFinalInformation;
	}
	
	/**
	* Sets the m_arrFinalInformation
	*
	* @param array $i_arrFinalInformation
	* @return void
	*/
	public function setFinalInformation($i_arrFinalInformation){
		$this->m_arrFinalInformation = $i_arrFinalInformation;
	}
}

?>