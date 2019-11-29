<?php
namespace Loss\Glpairs\Domain\Model;

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
class Pairs extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
	
	/**
	 * Red back of the card
	 */
	const C_INT_BACKIMAGE_RED = 0;
	
	/**
	 * Blue back of the card
	 */
	const C_INT_BACKIMAGE_BLUE = 1;
	
	/**
	 * Mixed back of the card
	 */
	const C_INT_BACKIMAGE_MIXED = 2;
	
	/**
	 * Imagename of the red backside
	 */
	const C_STR_BACKIMAGE_RED = 'card_back_red.jpg';
	
	/**
	 * Imagename of the blue backside
	 */
	const C_STR_BACKIMAGE_BLUE = 'card_back_blue.jpg';
	
	/**
	 * Name of the pairs game
	 *
	 * @TYPO3\CMS\Extbase\Annotation\Validate("String")
	 * @var string
	 */
	protected $name;

	/**
	 * Type of the pairs game
	 *
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var int
	 */
	protected $type;

	/**
	 * Flag if split mode is activated
	 *
	 * @var boolean
	 */
	protected $splitmode;
	
	/**
	 * The number of The number of cards in one row
	 *
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var int
	 */
	protected $width;

	/**
	 * The number of The number of cards in one row
	 *
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var int
	 */
	protected $cardheight;

	/**
	 * The number of The number of cards in one row
	 *
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var int
	 */
	protected $cardwidth;

	/**
	 * The default border width of the pairs game.
	 *
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var int
	 */
	protected $bordersize;
	
	/**
	 * The fontsize of the textcard.
	 * 
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var integer
	 */
	protected $fontsize;
	
	/**
	 * all pairs that belong to this game
	 *
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Collection", options={"elementType: \Loss\Glpairs\Domain\Model\Pair"})
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Loss\Glpairs\Domain\Model\Pair>
	 */
	protected $hasPairs;
	
	/**
	 * The string points language dependend set.
	 * 
	 * @var string
	 */
	protected $strI18nPoints;
	
	/**
	 * The width of the pair with the widest width of all pairs.
	 * 
	 * @var integer
	 */
	protected $intMaxPairWidth;
	
	/**
	 * The width of the pair with the heighest height of all pairs.
	 * 
	 * @var integer
	 */
	protected $intMaxPairHeight;
	
	/**
	 * Plus points for correct choice
	 * 
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var integer
	 */
	protected $pluspoints;
	
	/**
	 * penalty points for wrong choice
	 * 
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var integer
	 */
	protected $minuspoints;
	
	/**
	 * The image of the backside
	 * See Constants of Pairs::C_INT_BACKIMAGE_*
	 * 
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var integer
	 */
	protected $backimage;
	
	
	/**
	 * The delay for the automatic turn back of the cards
	 * 
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var integer
	 */
	protected $turnbackdelay;
	
	/**
	 * Delay for the hint to click on the screen
	 * 
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var integer
	 */
	protected $hintdelay;
	
	/**
	 * Duration for the turn of the cards
	 * 
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var integer
	 */
	protected $turnduration;
	
	/**
	 * Duration for the move to the card stack
	 * 
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var integer
	 */
	protected $stackduration;
	
	/**
	 * Flag if test mode is activated
	 *
	 * @var boolean
	 */
	protected $testmode;
	
	/**
	 * Delay between every card turn in the test mode.
	 *
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var integer
	 */
	protected $testmodeturndelay;
	
	/**
	 * The height of the final information.
	 * 
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var integer
	 */
	protected $finaltextheight = 0;
	
	/**
	 * The width of the final information.
	 * 
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var integer
	 */
	protected $finaltextwidth = 0;
	
	/**
	 * The height of the images of the final information.
	 * 
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var integer
	 */
	protected $finalpicheight = 0;
	
	/**
	 * The width of the images of the final information.
	 * 
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var integer
	 */
	protected $finalpicwidth = 0;
	
	/**
	 * The max. number of cards for one game.
	 * 
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var integer
	 */
	protected $maxcards = 0;
	
	/**
	 * __construct
	 *
	 * @return Pairs
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
		$this->intMaxPairHeight = 0;
		$this->intMaxPairWidth = 0;
	}

	/**
	 * Initializes all ObjectStorage properties.
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		/**
		 * Do not modify this method!
		 * It will be rewritten on each save in the extension builder
		 * You may modify the constructor of this class instead
		 */
		$this->hasPairs = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Returns the name
	 *
	 * @return string $name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets the name
	 *
	 * @param string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Returns the type
	 *
	 * @return int $type
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * Sets the type
	 *
	 * @param int $type
	 * @return void
	 */
	public function setType($type) {
		$this->type = $type;
	}

	/**
	* Returns the splitmode
	*
	* @return boolean $splitmode
	*/
	public function getSplitmode(){
		return $this->splitmode;
	}
	
	/**
	* Sets the splitmode
	*
	* @param boolean $splitmode
	* @return void
	*/
	public function setSplitmode($splitmode){
		$this->splitmode = $splitmode;
	}
	
	/**
	 * Returns the width
	 *
	 * @return int $width
	 */
	public function getWidth() {
		return $this->width;
	}

	/**
	 * Sets the width
	 *
	 * @param int $width
	 * @return void
	 */
	public function setWidth($width) {
		$this->width = $width;
	}
	
	/**
	* Returns the cardheight
	*
	* @return int $cardheight
	*/
	public function getCardheight(){
		return $this->cardheight;
	}
	
	/**
	* Sets the cardheight
	*
	* @param int $cardheight
	* @return void
	*/
	public function setCardheight($cardheight){
		$this->cardheight = $cardheight;
	}
	
	/**
	* Returns the cardwidth
	*
	* @return int $cardwidth
	*/
	public function getCardwidth(){
		return $this->cardwidth;
	}
	
	/**
	* Sets the cardwidth
	*
	* @param int $cardwidth
	* @return void
	*/
	public function setCardwidth($cardwidth){
		$this->cardwidth = $cardwidth;
	}
	
	/**
	* Returns the borderSize
	*
	* @return int $borderSize
	*/
	public function getBorderSize(){
		return $this->bordersize;
	}
	
	/**
	* Sets the borderSize
	*
	* @param int $borderSize
	* @return void
	*/
	public function setBorderSize($borderSize){
		$this->bordersize = $borderSize;
	}
	
	/**
	 * Adds a Pair
	 *
	 * @param \Loss\Glpairs\Domain\Model\Pair $hasPair
	 * @return void
	 */
	public function addHasPair(\Loss\Glpairs\Domain\Model\Pair $hasPair) {
		$this->hasPairs->attach($hasPair);
	}

	/**
	 * Removes a Pair
	 *
	 * @param \Loss\Glpairs\Domain\Model\Pair $hasPairToRemove The Pair to be removed
	 * @return void
	 */
	public function removeHasPair(\Loss\Glpairs\Domain\Model\Pair $hasPairToRemove) {
		$this->hasPairs->detach($hasPairToRemove);
	}

	/**
	 * Returns the hasPairs
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Loss\Glpairs\Domain\Model\Pair> $hasPairs
	 */
	public function getHasPairs() {
		return $this->hasPairs;
	}

	/**
	 * Sets the hasPairs
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Loss\Glpairs\Domain\Model\Pair> $hasPairs
	 * @return void
	 */
	public function setHasPairs(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $hasPairs) {
		$this->hasPairs = $hasPairs;
	}
	
	/**
	* Returns the strI18nPoints
	*
	* @return string $strI18nPoints
	*/
	public function getStrI18nPoints(){
		return $this->strI18nPoints;
	}
	
	/**
	* Sets the strI18nPoints
	*
	* @param string $strI18nPoints
	* @return void
	*/
	public function setStrI18nPoints($strI18nPoints){
		$this->strI18nPoints = $strI18nPoints;
	}
	
	/**
	* Returns the fontsize
	*
	* @return integer $fontsize
	*/
	public function getFontsize(){
		return $this->fontsize;
	}
	
	/**
	* Sets the fontsize
	*
	* @param integer $fontsize
	* @return void
	*/
	public function setFontsize($fontsize){
		$this->fontsize = $fontsize;
	}
	
	/**
	* Returns the intMaxPairWidth plus a certain buffer
	*
	* @return integer $intMaxPairWidth
	*/
	public function getMaxPairWidth(){
		return $this->intMaxPairWidth + 20;
	}
	
	/**
	* Sets the intMaxPairWidth
	*
	* @param integer $intMaxPairWidth
	* @return void
	*/
	public function setMaxPairWidth($intMaxPairWidth){
		if ($this->intMaxPairWidth < $intMaxPairWidth) {
			$this->intMaxPairWidth = $intMaxPairWidth;
		}
	}
	
	/**
	* Returns the intMaxPairHeight plus a certain buffer
	*
	* @return integer $intMaxPairHeight
	*/
	public function getMaxPairHeight(){
		return $this->intMaxPairHeight + 20;
	}
	
	/**
	* Sets the intMaxPairHeight
	*
	* @param integer $intMaxPairHeight
	* @return void
	*/
	public function setMaxPairHeight($intMaxPairHeight){
		if ($this->intMaxPairHeight < $intMaxPairHeight) {
			$this->intMaxPairHeight = $intMaxPairHeight;
		}
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
	* Returns the backimage
	*
	* @return integer $backimage
	*/
	public function getBackimage(){
		return $this->backimage;
	}
	
	/**
	* Sets the backimage
	*
	* @param integer $backimage
	* @return void
	*/
	public function setBackimage($i_intBackimage){
		$this->backimage = $i_intBackimage;
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
	* Returns the finaltextwidth
	*
	* @return integer $finaltextwidth
	*/
	public function getfinaltextwidth(){
		return $this->finaltextwidth;
	}
	
	/**
	* Sets the finaltextwidth
	*
	* @param integer $finaltextwidth
	* @return void
	*/
	public function setfinaltextwidth($finaltextwidth){
		$this->finaltextwidth = $finaltextwidth;
	}
	
	/**
	* Returns the finaltextheight
	*
	* @return integer $finaltextheight
	*/
	public function getfinaltextheight(){
		return $this->finaltextheight;
	}
	
	/**
	* Sets the finaltextheight
	*
	* @param integer $finaltextheight
	* @return void
	*/
	public function setfinaltextheight($finaltextheight){
		$this->finaltextheight = $finaltextheight;
	}
	
	/**
	* Returns the finalpicwidth
	*
	* @return integer $finalpicwidth
	*/
	public function getfinalpicwidth(){
		return $this->finalpicwidth;
	}
	
	/**
	* Sets the finalpicwidth
	*
	* @param integer $finalpicwidth
	* @return void
	*/
	public function setfinalpicwidth($finalpicwidth){
		$this->finalpicwidth = $finalpicwidth;
	}
	
	/**
	* Returns the finalpicheight
	*
	* @return integer $finalpicheight
	*/
	public function getfinalpicheight(){
		return $this->finalpicheight;
	}
	
	/**
	* Sets the finalpicheight
	*
	* @param integer $finalpicheight
	* @return void
	*/
	public function setfinalpicheight($finalpicheight){
		$this->finalpicheight = $finalpicheight;
	}
	
	/**
	* Returns the maxcards
	*
	* @return integer $maxcards
	*/
	public function getmaxcards(){
		return $this->maxcards;
	}
	
	/**
	* Sets the maxcards
	*
	* @param integer $maxcards
	* @return void
	*/
	public function setmaxcards($maxcards){
		$this->maxcards = $maxcards;
	}
}
?>