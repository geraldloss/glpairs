<?php
declare(strict_types=1);

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
	 * Custom image at the back of the cards
	 */
	const C_INT_BACKIMAGE_CUSTOM_IMAGE = 3;
	
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
	protected string $name;

	/**
	 * Type of the pairs game
	 *
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var int
	 */
	protected int $type;

	/**
	 * Flag if split mode is activated
	 *
	 * @var bool
	 */
	protected bool $splitmode;
	
	/**
	 * The number of The number of cards in one row
	 *
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var int
	 */
	protected int $width;

	/**
	 * The number of The number of cards in one row
	 *
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var int
	 */
	protected int $cardheight;

	/**
	 * The number of The number of cards in one row
	 *
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var int
	 */
	protected int $cardwidth;

	/**
	 * The default border width of the pairs game.
	 *
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var int
	 */
	protected int $bordersize;
	
	/**
	 * The fontsize of the textcard.
	 * 
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var int
	 */
	protected int $fontsize;
	
	/**
	 * all pairs that belong to this game
	 *
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Collection", options={"elementType: \Loss\Glpairs\Domain\Model\Pair"})
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Loss\Glpairs\Domain\Model\Pair>
	 */
	protected \TYPO3\CMS\Extbase\Persistence\ObjectStorage $hasPairs;
	
	/**
	 * The string points language dependend set.
	 * 
	 * @var string
	 */
	protected string $strI18nPoints;
	
	/**
	 * The width of the pair with the widest width of all pairs.
	 * 
	 * @var int
	 */
	protected int $intMaxPairWidth = 0;
	
	/**
	 * The width of the pair with the heighest height of all pairs.
	 * 
	 * @var int
	 */
	protected int $intMaxPairHeight = 0;
	
	/**
	 * Plus points for correct choice
	 * 
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var int
	 */
	protected int $pluspoints;
	
	/**
	 * penalty points for wrong choice
	 * 
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var int
	 */
	protected int $minuspoints;
	
	/**
	 * The image of the backside
	 * See Constants of Pairs::C_INT_BACKIMAGE_*
	 * 
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var int
	 */
	protected int $backimage;
	
	
	/**
	 * The custom image number 1 of the backside
	 *
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Collection", options={"elementType: \TYPO3\CMS\Extbase\Domain\Model\FileReference"})
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
	 */
	protected \TYPO3\CMS\Extbase\Persistence\ObjectStorage $customBackimage1;
	
	
	/**
	 * The custom image number 2 of the backside
	 *
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Collection", options={"elementType: \TYPO3\CMS\Extbase\Domain\Model\FileReference"})
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
	 */
	protected \TYPO3\CMS\Extbase\Persistence\ObjectStorage $customBackimage2;
	
	/**
	 * The delay for the automatic turn back of the cards
	 * 
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var int
	 */
	protected int $turnbackdelay;
	
	/**
	 * Delay for the hint to click on the screen
	 * 
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var int
	 */
	protected int $hintdelay;
	
	/**
	 * Duration for the turn of the cards
	 * 
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var int
	 */
	protected int $turnduration;
	
	/**
	 * Duration for the move to the card stack
	 * 
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var int
	 */
	protected int $stackduration;
	
	/**
	 * Flag if test mode is activated
	 *
	 * @var bool
	 */
	protected bool $testmode;
	
	/**
	 * Delay between every card turn in the test mode.
	 *
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var int
	 */
	protected int $testmodeturndelay;
	
	/**
	 * The height of the final information.
	 * 
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var int
	 */
	protected int $finaltextheight = 0;
	
	/**
	 * The width of the final information.
	 * 
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var int
	 */
	protected int $finaltextwidth = 0;
	
	/**
	 * The height of the images of the final information.
	 * 
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var int
	 */
	protected int $finalpicheight = 0;
	
	/**
	 * The width of the images of the final information.
	 * 
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var int
	 */
	protected int $finalpicwidth = 0;
	
	/**
	 * The max. number of cards for one game.
	 * 
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var int
	 */
	protected int $maxcards = 0;
	
	/**
	 * __construct
	 *
	 * @return Pairs
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all ObjectStorage properties.
	 *
	 * @return void
	 */
	protected function initStorageObjects(): void {
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
	public function getName(): string {
		return $this->name;
	}

	/**
	 * Sets the name
	 *
	 * @param string $name
	 * @return void
	 */
	public function setName(string $name): void {
		$this->name = $name;
	}

	/**
	 * Returns the type
	 *
	 * @return int $type
	 */
	public function getType(): int {
		return $this->type;
	}

	/**
	 * Sets the type
	 *
	 * @param int $type
	 * @return void
	 */
	public function setType(int $type): void {
		$this->type = $type;
	}

	/**
	* Returns the splitmode
	*
	* @return bool $splitmode
	*/
	public function getSplitmode(): bool {
		return $this->splitmode;
	}
	
	/**
	* Sets the splitmode
	*
	* @param bool $splitmode
	* @return void
	*/
	public function setSplitmode(bool $splitmode): void {
		$this->splitmode = $splitmode;
	}
	
	/**
	 * Returns the width
	 *
	 * @return int $width
	 */
	public function getWidth(): int {
		return $this->width;
	}

	/**
	 * Sets the width
	 *
	 * @param int $width
	 * @return void
	 */
	public function setWidth(int $width): void {
		$this->width = $width;
	}
	
	/**
	* Returns the cardheight
	*
	* @return int $cardheight
	*/
	public function getCardheight(): int {
		return $this->cardheight;
	}
	
	/**
	* Sets the cardheight
	*
	* @param int $cardheight
	* @return void
	*/
	public function setCardheight(int $cardheight): void {
		$this->cardheight = $cardheight;
	}
	
	/**
	* Returns the cardwidth
	*
	* @return int $cardwidth
	*/
	public function getCardwidth(): int {
		return $this->cardwidth;
	}
	
	/**
	* Sets the cardwidth
	*
	* @param int $cardwidth
	* @return void
	*/
	public function setCardwidth(int $cardwidth): void {
		$this->cardwidth = $cardwidth;
	}
	
	/**
	* Returns the borderSize
	*
	* @return int $borderSize
	*/
	public function getBorderSize(): int {
		return $this->bordersize;
	}
	
	/**
	* Sets the borderSize
	*
	* @param int $borderSize
	* @return void
	*/
	public function setBorderSize(int $borderSize): void {
		$this->bordersize = $borderSize;
	}
	
	/**
	 * Adds a Pair
	 *
	 * @param \Loss\Glpairs\Domain\Model\Pair $hasPair
	 * @return void
	 */
	public function addHasPair(\Loss\Glpairs\Domain\Model\Pair $hasPair): void {
		$this->hasPairs->attach($hasPair);
	}

	/**
	 * Removes a Pair
	 *
	 * @param \Loss\Glpairs\Domain\Model\Pair $hasPairToRemove The Pair to be removed
	 * @return void
	 */
	public function removeHasPair(\Loss\Glpairs\Domain\Model\Pair $hasPairToRemove): void {
		$this->hasPairs->detach($hasPairToRemove);
	}

	/**
	 * Returns the hasPairs
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Loss\Glpairs\Domain\Model\Pair> $hasPairs
	 */
	public function getHasPairs(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage {
		return $this->hasPairs;
	}

	/**
	 * Sets the hasPairs
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Loss\Glpairs\Domain\Model\Pair> $hasPairs
	 * @return void
	 */
	public function setHasPairs(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $hasPairs): void {
		$this->hasPairs = $hasPairs;
	}
	
	/**
	* Returns the strI18nPoints
	*
	* @return string $strI18nPoints
	*/
	public function getStrI18nPoints(): string {
		return $this->strI18nPoints;
	}
	
	/**
	* Sets the strI18nPoints
	*
	* @param string $strI18nPoints
	* @return void
	*/
	public function setStrI18nPoints(string $strI18nPoints): void {
		$this->strI18nPoints = $strI18nPoints;
	}
	
	/**
	* Returns the fontsize
	*
	* @return int $fontsize
	*/
	public function getFontsize(): int {
		return $this->fontsize;
	}
	
	/**
	* Sets the fontsize
	*
	* @param int $fontsize
	* @return void
	*/
	public function setFontsize(int $fontsize): void {
		$this->fontsize = $fontsize;
	}
	
	/**
	* Returns the intMaxPairWidth plus a certain buffer
	*
	* @return int $intMaxPairWidth
	*/
	public function getMaxPairWidth(): int {
		return $this->intMaxPairWidth + 20;
	}
	
	/**
	* Sets the intMaxPairWidth
	*
	* @param int $intMaxPairWidth
	* @return void
	*/
	public function setMaxPairWidth(int $intMaxPairWidth): void {
		if ($this->intMaxPairWidth < $intMaxPairWidth) {
			$this->intMaxPairWidth = $intMaxPairWidth;
		}
	}
	
	/**
	* Returns the intMaxPairHeight plus a certain buffer
	*
	* @return int $intMaxPairHeight
	*/
	public function getMaxPairHeight(): int {
		return $this->intMaxPairHeight + 20;
	}
	
	/**
	* Sets the intMaxPairHeight
	*
	* @param int $intMaxPairHeight
	* @return void
	*/
	public function setMaxPairHeight(int $intMaxPairHeight): void {
		if ($this->intMaxPairHeight < $intMaxPairHeight) {
			$this->intMaxPairHeight = $intMaxPairHeight;
		}
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
	* @param int $pluspoints
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
	* @param int $minuspoints
	* @return void
	*/
	public function setMinuspoints(int $i_intMinuspoints): void {
		$this->minuspoints = $i_intMinuspoints;
	}
	
	/**
	* Returns the backimage
	*
	* @return int $backimage
	*/
	public function getBackimage(): int {
		return $this->backimage;
	}
	
	/**
	* Sets the backimage
	*
	* @param int $backimage
	* @return void
	*/
	public function setBackimage(int $i_intBackimage): void {
		$this->backimage = $i_intBackimage;
	}
	
	/**
	 * Get custom image number one for the backside
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
	 */
	public function getCustomBackimage1(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage {
	    
	    return $this->customBackimage1;
	}
	
	/**
	 * Set custom image number one for the backside
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $customBackimage1
	 */
	public function setCustomBackimage1(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $customBackimage1): void {
	    $this->customBackimage1 = $customBackimage1;
	}
	
	/**
	 * Get the server path of custom backside Image 1 over File Abstract Layer (FAL)
	 *
	 * @return string
	 */
	public function getCustomBackimage1Path(): string {
	    
	    // if no image is defined
	    if ($this->getCustomBackimage1()->current() === Null) {
	        // no image path is returned
	        return '';
	    }
	    
	    // get the path of the image
	    $imagePath = Pair::C_STR_FILEADMIN_PATH .
	    $this->getCustomBackimage1()
	    ->current()
	    ->getOriginalResource()
	    ->getIdentifier();
	    
	    // return the path without leading slash
	    return ltrim($imagePath, '/');
	}
	
	/**
	 * Get custom image number two for the backside
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
	 */
	public function getCustomBackimage2(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage {
	    
	    return $this->customBackimage2;
	}
	
	/**
	 * Set custom image number one for the backside
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $customBackimage2
	 */
	public function setCustomBackimage2(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $customBackimage2): void {
	    $this->customBackimage2 = $customBackimage2;
	}
	
	/**
	 * Get the server path of custom backside Image 2 over File Abstract Layer (FAL)
	 *
	 * @return string
	 */
	public function getCustomBackimage2Path(): string {
	    
	    // if no image is defined
	    if ($this->getCustomBackimage2()->current() === Null) {
	        // no image path is returned
	        return '';
	    }
	    
	    // get the path of the image
	    $imagePath = Pair::C_STR_FILEADMIN_PATH .
	    $this->getCustomBackimage2()
	    ->current()
	    ->getOriginalResource()
	    ->getIdentifier();
	    
	    // return the path without leading slash
	    return ltrim($imagePath, '/');
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
	* @param int $turnbackdelay
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
	* @param int $hintdelay
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
	* @param int $turnduration
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
	* @param int $stackduration
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
	* @param bool $testmode
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
	* @param int $testmodeturndelay
	* @return void
	*/
	public function setTestModeTurnDelay(int $i_intTestModeTurnDelay): void {
		$this->testmodeturndelay = $i_intTestModeTurnDelay;
	}

	/**
	* Returns the finaltextwidth
	*
	* @return int $finaltextwidth
	*/
	public function getfinaltextwidth(): int {
		return $this->finaltextwidth;
	}
	
	/**
	* Sets the finaltextwidth
	*
	* @param int $finaltextwidth
	* @return void
	*/
	public function setfinaltextwidth(int $finaltextwidth): void {
		$this->finaltextwidth = $finaltextwidth;
	}
	
	/**
	* Returns the finaltextheight
	*
	* @return int $finaltextheight
	*/
	public function getfinaltextheight(): int {
		return $this->finaltextheight;
	}
	
	/**
	* Sets the finaltextheight
	*
	* @param int $finaltextheight
	* @return void
	*/
	public function setfinaltextheight(int $finaltextheight): void {
		$this->finaltextheight = $finaltextheight;
	}
	
	/**
	* Returns the finalpicwidth
	*
	* @return int $finalpicwidth
	*/
	public function getfinalpicwidth(): int {
		return $this->finalpicwidth;
	}
	
	/**
	* Sets the finalpicwidth
	*
	* @param int $finalpicwidth
	* @return void
	*/
	public function setfinalpicwidth(int $finalpicwidth): void {
		$this->finalpicwidth = $finalpicwidth;
	}
	
	/**
	* Returns the finalpicheight
	*
	* @return int $finalpicheight
	*/
	public function getfinalpicheight(): int {
		return $this->finalpicheight;
	}
	
	/**
	* Sets the finalpicheight
	*
	* @param int $finalpicheight
	* @return void
	*/
	public function setfinalpicheight(int $finalpicheight): void {
		$this->finalpicheight = $finalpicheight;
	}
	
	/**
	* Returns the maxcards
	*
	* @return int $maxcards
	*/
	public function getmaxcards(): int {
		return $this->maxcards;
	}
	
	/**
	* Sets the maxcards
	*
	* @param int $maxcards
	* @return void
	*/
	public function setmaxcards(int $maxcards): void {
		$this->maxcards = $maxcards;
	}
}
?>