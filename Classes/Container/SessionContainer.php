<?php
declare(strict_types=1);

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
	protected array $m_arrExtIdMapping = [];
	
	/**
	 * Array with the mapping from the uID to the external ID
	 * First Index: 	The uID of the Pair
	 * Value:	array with 2 dimensions (see constants with prefix c_strArrIdExtId):
	 * 		  extID1: 	The extID1 of the pair
	 * 		  extID2: 	The extID2 of the pair
	 * @var array
	*/
	protected array $m_arrUidMapping = [];
	
	
	/**
	 * Mode of the pairs game. See Constants with the prefix c_intPairsType*
	 * @var int
	 */
	protected int $m_intPairsType = 0;
	
	/**
	 * If True, then the game is in splitmode. If False all cards are displayed together.
	 * @var bool
	 */
	protected bool $m_blnSplitMode = false;
	
	/**
	 * Array with all localized strings for the frontend dialogs
	 */
	protected array $m_arrI18n = [];
	
	/**
	 * The number of pairs in the game.
	 */
	protected int $m_intPairsCount = 0;
	
	/**
	 * Plus points for correct choice
	 *
	 * @var int
	 */
	protected int $pluspoints = 0;
	
	/**
	 * penalty points for wrong choice
	 *
	 * @var int
	 */
	protected int $minuspoints = 0;
	
	/**
	 * The delay for the automatic turn back of the cards
	 *
	 * @var int
	 */
	protected int $turnbackdelay = 0;
	
	/**
	 * Delay for the hint to click on the screen
	 *
	 * @var int
	 */
	protected int $hintdelay = 0;
	
	/**
	 * Duration for the turn of the cards
	 *
	 * @var int
	 */
	protected int $turnduration = 0;
	
	/**
	 * Duration for the move to the card stack
	 *
	 * @var int
	 */
	protected int $stackduration = 0;
	
	/**
	 * Flag if test mode is activated.
	 * 
	 * @var bool
	 */
	protected bool $testmode = false;
		
	/**
	 * Delay between every card turn in the test mode.
	 * 
	 * @var int
	 */
	protected int $testmodeturndelay = 0;
	
	/**
	 * Array with the final information.
	 *	Index: The uID of the Pair
	 *	Value: Array(
	 *					isActive => True if the final information is activated
	 *					content => HTML content with the final information
	 *			)
	 * @var array 
	 */
	protected array $m_arrFinalInformation = [];
	
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
	public function setm_arrExtIdMapping(array $m_arrExtIdMapping): void {
		$this->m_arrExtIdMapping = $m_arrExtIdMapping;
	}
	
	/**
	* Returns the m_arrExtIdMapping
	* The Array with the mapping from external ID to the uID
	*
	* @return array $m_arrExtIdMapping
	*/
	public function getm_arrExtIdMapping(): array {
		return $this->m_arrExtIdMapping;
	}
	
	/**
	* Sets the m_arrUidMapping
	* The Array with the mapping from the uID to the external ID.
	*
	* @param array $m_arrUidMapping
	* @return void
	*/
	public function setm_arrUidMapping(array $m_arrUidMapping): void {
		$this->m_arrUidMapping = $m_arrUidMapping;
	}
	
	/**
	* Returns the m_arrUidMapping
	* The Array with the mapping from the uID to the external ID	
	*
	* @return array $m_arrUidMapping
	*/
	public function getm_arrUidMapping(): array {
		return $this->m_arrUidMapping;
	}
	
	/**
	* Sets the m_intPairsType
	* Mode of the pairs game. See Constants with the prefix PairsController::c_intPairsType*
	*
	* @param int $i_intPairsType
	* @return void
	*/
	public function setm_intPairsType(int $i_intPairsType): void {
		$this->m_intPairsType = $i_intPairsType;
	}
	
	/**
	* Returns the m_intPairsType
	* Mode of the pairs game. See Constants with the prefix PairsController::c_intPairsType*
	*
	* @return int $m_intPairsType
	*/
	public function getm_intPairsType(): int {
		return $this->m_intPairsType;
	}
	
	/**
	* Sets the m_blnSplitMode
	*
	* @param bool $i_blnSplitMode
	* @return void
	*/
	public function setm_blnSplitMode(bool $i_blnSplitMode): void {
		$this->m_blnSplitMode = $i_blnSplitMode;
	}
	
	/**
	* Returns the m_blnSplitMode
	*
	* @return bool $m_blnSplitMode
	*/
	public function getm_blnSplitMode(): bool {
		return $this->m_blnSplitMode;
	}
	
	/**
	* Sets the m_arrI18n
	*
	* @param array $i_arrI18n
	* @return void
	*/
	public function setm_arrI18n(array $i_arrI18n): void {
		$this->m_arrI18n = $i_arrI18n;
	}
	
	/**
	* Returns the m_arrI18n
	*
	* @return array $m_arrI18n
	*/
	public function getm_arrI18n(): array {
		return $this->m_arrI18n;
	}
	
	/**
	* Sets the m_intPairsCount
	*
	* @param int $i_intPairsCount
	* @return void
	*/
	public function setm_intPairsCount(int $i_intPairsCount): void {
		$this->m_intPairsCount = $i_intPairsCount;
	}
	
	/**
	* Returns the m_intPairsCount
	*
	* @return int $m_intPairsCount
	*/
	public function getm_intPairsCount(): int {
		return $this->m_intPairsCount;
	}

	/**
	* Returns the pluspoints
	*
	* @return int $pluspoints
	*/
	public function getPluspoints(): int {
		return $this->pluspoints;
	}
	
	/**
	* Sets the pluspoints
	*
	* @param int $i_intPpluspoints
	* @return void
	*/
	public function setPluspoints(int $i_intPpluspoints): void {
		$this->pluspoints = $i_intPpluspoints;
	}
	
	/**
	* Returns the minuspoints
	*
	* @return int $minuspoints
	*/
	public function getMinuspoints(): int {
		return $this->minuspoints;
	}
	
	/**
	* Sets the minuspoints
	*
	* @param int $i_intMinuspoints
	* @return void
	*/
	public function setMinuspoints(int $i_intMinuspoints): void {
		$this->minuspoints = $i_intMinuspoints;
	}
	
	/**
	* Returns the turnbackdelay
	*
	* @return int $turnbackdelay
	*/
	public function getTurnbackdelay(): int {
		return $this->turnbackdelay;
	}
	
	/**
	* Sets the turnbackdelay
	*
	* @param int $i_intTurnbackdelay
	* @return void
	*/
	public function setTurnbackdelay(int $i_intTurnbackdelay): void {
		$this->turnbackdelay = $i_intTurnbackdelay;
	}
	
	/**
	* Returns the hintdelay
	*
	* @return int $hintdelay
	*/
	public function getHintdelay(): int {
		return $this->hintdelay;
	}
	
	/**
	* Sets the hintdelay
	*
	* @param int $i_intHintdelay
	* @return void
	*/
	public function setHintdelay(int $i_intHintdelay): void {
		$this->hintdelay = $i_intHintdelay;
	}
	
	/**
	* Returns the turnduration
	*
	* @return int $turnduration
	*/
	public function getTurnduration(): int {
		return $this->turnduration;
	}
	
	/**
	* Sets the turnduration
	*
	* @param int $i_intTurnduration
	* @return void
	*/
	public function setTurnduration(int $i_intTurnduration): void {
		$this->turnduration = $i_intTurnduration;
	}
	
	/**
	* Returns the stackduration
	*
	* @return int $stackduration
	*/
	public function getStackduration(): int {
		return $this->stackduration;
	}
	
	/**
	* Sets the stackduration
	*
	* @param int $i_intStackduration
	* @return void
	*/
	public function setStackduration(int $i_intStackduration): void {
		$this->stackduration = $i_intStackduration;
	}
	
	/**
	* Returns the testmode
	*
	* @return bool $testmode
	*/
	public function getTestmode(): bool {
		return $this->testmode;
	}
	
	/**
	* Sets the testmode
	*
	* @param bool $i_blnTestmode
	* @return void
	*/
	public function setTestmode(bool $i_blnTestmode): void {
		$this->testmode = $i_blnTestmode;
	}
	
	/**
	* Returns the testmodeturndelay
	*
	* @return int $testmodeturndelay
	*/
	public function getTestModeTurnDelay(): int {
		return $this->testmodeturndelay;
	}
	
	/**
	* Sets the testmodeturndelay
	*
	* @param int $i_intTestModeTurnDelay
	* @return void
	*/
	public function setTestModeTurnDelay(int $i_intTestModeTurnDelay): void {
		$this->testmodeturndelay = $i_intTestModeTurnDelay;
	}
	
	/**
	* Returns the m_arrFinalInformation
	*
	* @return array $m_arrFinalInformation
	*/
	public function getFinalInformation(): array {
		return $this->m_arrFinalInformation;
	}
	
	/**
	* Sets the m_arrFinalInformation
	*
	* @param array $i_arrFinalInformation
	* @return void
	*/
	public function setFinalInformation(array $i_arrFinalInformation): void {
		$this->m_arrFinalInformation = $i_arrFinalInformation;
	}
}

?>