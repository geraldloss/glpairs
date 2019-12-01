<?php
namespace Loss\Glpairs\Domain\Model;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\PathUtility;
use Loss\Glpairs\Controller\PairsController;
use Loss\Glpairs\Domain\Model\Pairs;

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
class Pair extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * Path where all the images of the pairs are located.
	 * @var string
	 */
	const C_STR_IMAGE_PATH = 'uploads/tx_glpairs/';
	
	
	/**
	 * Default image is image1
	 * @var string
	 */
	const C_STR_DEFAULT_IMAGE1 = 'image1';
	
	/**
	 * Default image is image2
	 * @var string
	 */
	const C_STR_DEFAULT_IMAGE2 = 'image2';

	/**
	 * Default description is description1 for a text card 
	 * @var string
	 */
	const C_STR_DEFAULT_TEXT1 = 'text1';
	
	/**
	 * Default description is description2 for a text card 
	 * @var string
	 */
	const C_STR_DEFAULT_TEXT2 = 'text2';
	
	/**
	 * The type of this card is an image card.
	 * @var string
	 */
	const C_STR_CARD_TYPE_IMAGE = 'image';
	
	/**
	 * The type of this card is an text card.
	 * @var string
	 */
	const C_STR_CARD_TYPE_TEXT = 'text';
	
	/**
	 * Partial for imagecards.
	 * @var string
	 */
	const C_STR_PARTIAL_IMAGE = 'tableImage';
	
	/**
	 * Partial for textcards.
	 * @var string
	 */
	const C_STR_PARTIAL_TEXT = 'tableText';
	
	/**
	 * Partial for empty cards.
	 * @var string
	 */
	const C_STR_PARTIAL_EMPTY = 'empty';
	
	/**
	 * The default height for text only cards
	 * @var integer
	 */
	const C_INT_DEFAULT_HEIGHT = 100;
	
	/**
	 * The default width for text only cards
	 * @var integer
	 */
	const C_INT_DEFAULT_WIDTH = 80;
	
	/**
	 * The fileadmin path of Typo3
	 * @var string
	 */
	const C_STR_FILEADMIN_PATH = '/fileadmin';
	
	/**
	 * Name of the pair
	 *
	 * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
	 * @var string
	 */
	protected $name;

	/**
	 * First image
	 *
	 * @var string
	 */
	protected $image1;

	/**
	 * First Fal Image
	 *
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Collection", options={"elementType: \TYPO3\CMS\Extbase\Domain\Model\FileReference"})
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
	 */
	protected $falImage1;
	
	/**
	 * Height of image1
	 *
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var int
	 */
	protected $height1;

	/**
	 * Width of image1
	 *
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var int
	 */
	protected $width1;

	/**
	 * Second Image
	 *
	 * @var string
	 */
	protected $image2;

	/**
	 * Second Fal Image
	 *
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Collection", options={"elementType: \TYPO3\CMS\Extbase\Domain\Model\FileReference"})
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
	 */
	protected $falImage2;
	
	
	/**
	 * Height of image2
	 *
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var int
	 */
	protected $height2;

	/**
	 * Width of image2
	 *
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var int
	 */
	protected $width2;

	/**
	 * Description of the image 1
	 *
	 * @TYPO3\CMS\Extbase\Annotation\Validate("String")
	 * @var string
	 */
	protected $description1;

	/**
	 * Description of the image 2
	 *
	 * @TYPO3\CMS\Extbase\Annotation\Validate("String")
	 * @var string
	 */
	protected $description2;
	
	/**
	 * 1 if this is the first card of the pair or 2 if this is the second card.
	 * 
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var integer
	 */
	protected $intCardNumber = 0;
	
	/**
	 * The default images setting.
	 *
	 * @TYPO3\CMS\Extbase\Annotation\Validate("String")
	 * @var string
	 */
	protected $strSettingsDefaultImage = "";
	
	/**
	 * The default text description settings.
	 *
	 * @TYPO3\CMS\Extbase\Annotation\Validate("String")
	 * @var string
	 */
	protected $strSettingsDefaultText = "";
	
	/**
	 * Height of the text card
	 *
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var int
	 */
	protected $textheight1;

	/**
	 * Width of the text card
	 *
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var int
	 */
	protected $textwidth1;
	
	/**
	 * The fontsize of the descriptiontext
	 *
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var int
	 */
	protected $fontsize2;
	
	/**
	 * Height of the text card
	 *
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var int
	 */
	protected $textheight2;

	/**
	 * Width of the text card
	 *
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var int
	 */
	protected $textwidth2;
	
	/**
	 * The fontsize of the descriptiontext
	 *
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var int
	 */
	protected $fontsize1;
	
	/**
	 * Flag if this is an empty pair.
	 * 
	 * @var boolean
	 */
	protected $empty = false;
	
	/**
	 * The bordersize of the pair.
	 * 
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var int
	 */
	protected $bordersize;
	
	/**
	 * The parent pairs game of the pair.
	 *
	 * @TYPO3\CMS\Extbase\Annotation\Validate("GenericObject")
	 * @var \Loss\Glpairs\Domain\Model\Pairs
	 */
	protected $parentPairs = Null;

	
	/**
	 * The first internal ID of the pair.
	 * Every pairs has 2 external IDs. This ID staying for
	 * the both cards wich belong in the game together. This IDs will be used into the pairs
	 * game and are readable. An hidden array can bring this both ID together to the 
	 * uID of the pair itself, so that the pragramm can proof if the cards belong thogether. 
	 * @var int
	 */
	protected $intExternalId1 = 0;
	
	/**
	 * The second internal ID of the pair.
	 * Every pairs has 2 external IDs. This ID staying for
	 * the both cards wich belong in the game together. This IDs will be used into the pairs
	 * game and are readable. An hidden array can bring this both ID together to the 
	 * uID of the pair itself, so that the pragramm can proof if the cards belong thogether. 
	 * 
	 * @var int
	 */
	protected $intExternalId2 = 0;
	
	
	/**
	 * The type of this card, weather this card is a image card or a text card.
	 *  
	 * @var string
	 */
	protected $strCardType = '';
	
	/**
	 * The default partial for this pair. Depending if the card is a textcard or an imagecard.
	 * 
	 * @var string
	 */
	protected $strDefaultPartial = '';
	
	/**
	 * Flag for the final information. If true the final information is activated.
	 * 
	 * @var boolean
	 */
	protected $finaltextactive = false;
	
	/**
	 * Content of the final information, if it is activated.
	 * 
	 * @TYPO3\CMS\Extbase\Annotation\Validate("String")
	 * @var string
	 */
	protected $finaltext = '';
	
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
	 * The height of the image of the final information.
	 * 
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var integer
	 */
	protected $finalpicheight = 0;
	
	/**
	 * The width of the image of the final information.
	 * 
	 * @TYPO3\CMS\Extbase\Annotation\Validate("Integer")
	 * @var integer
	 */
	protected $finalpicwidth = 0;
	
	/**
	 * __construct
	 *
	 * @return Pair
	 */
	public function __construct() {
		// in the beginning is the default image always image1
		$this->strSettingsDefaultImage = self::C_STR_DEFAULT_IMAGE1;
		// in the beginning is the default text card is always description1
		$this->strSettingsDefaultText = self::C_STR_DEFAULT_TEXT1;
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
	 * Returns the image1
	 *
	 * @return string $image1
	 */
	public function getImage1() {
		return pair::C_STR_IMAGE_PATH . $this->image1;
	}

	/**
	 * Sets the image1
	 *
	 * @param string $image1
	 * @return void
	 */
	public function setImage1($image1) {
		$this->image1 = $image1;
	}

	/**
	 * Returns the height1
	 *
	 * @return int $height1
	 */
	public function getHeight1() {
		return $this->height1;
	}

	/**
	 * Sets the height1
	 *
	 * @param int $height1
	 * @return void
	 */
	public function setHeight1($height1) {
		$this->height1 = $height1;
	}

	/**
	 * Returns the width1
	 *
	 * @return int $width1
	 */
	public function getWidth1() {
		return $this->width1;
	}

	/**
	 * Sets the width1
	 *
	 * @param int $width1
	 * @return void
	 */
	public function setWidth1($width1) {
		$this->width1 = $width1;
	}

	/**
	 * Returns the image2
	 *
	 * @return string $image2
	 */
	public function getImage2() {
		return pair::C_STR_IMAGE_PATH . $this->image2;
	}

	/**
	 * Sets the image2
	 *
	 * @param string $image2
	 * @return void
	 */
	public function setImage2($image2) {
		$this->image2 = $image2;
	}

	/**
	 * Returns the height2
	 *
	 * @return int $height2
	 */
	public function getHeight2() {
		return $this->height2;
	}

	/**
	 * Sets the height2
	 *
	 * @param int $height2
	 * @return void
	 */
	public function setHeight2($height2) {
		$this->height2 = $height2;
	}

	/**
	 * Returns the width2
	 *
	 * @return int $width2
	 */
	public function getWidth2() {
		return $this->width2;
	}

	/**
	 * Sets the width2
	 *
	 * @param int $width2
	 * @return void
	 */
	public function setWidth2($width2) {
		$this->width2 = $width2;
	}

	/**
	 * Returns the description
	 *
	 * @return string $description1
	 */
	public function getDescription1() {
		return $this->description1;
	}

	/**
	 * Sets the description
	 *
	 * @param string $description1
	 * @return void
	 */
	public function setDescription1($description1) {
		$this->description1 = $description1;
	}

	/**
	 * Returns the description
	 *
	 * @return string $description2
	 */
	public function getDescription2() {
		return $this->description2;
	}

	/**
	 * Sets the description
	 *
	 * @param string $description2
	 * @return void
	 */
	public function setDescription2($description2) {
		$this->description2 = $description2;
	}

	/**
	* Sets the strSettingsDefaultImage
	*
	* @param string $strSettingsDefaultImage
	* @return void
	*/
	public function setSettingsDefaultImage($i_strSettingsDefaultImage){
		$this->strSettingsDefaultImage = $i_strSettingsDefaultImage;
	}
	
	/**
	* Returns the strSettingsDefaultImage
	*
	* @return string $strSettingsDefaultImage
	*/
	public function getSettingsDefaultImage(){
		return $this->strSettingsDefaultImage;
	}

	/**
	* Sets the strSettingsDefaultText
	*
	* @param string $strSettingsDefaultText
	* @return void
	*/
	public function setSettingsDefaultText($strSettingsDefaultText){
		$this->strSettingsDefaultText = $strSettingsDefaultText;
	}
	
	/**
	* Returns the strSettingsDefaultText
	*
	* @return string $strSettingsDefaultText
	*/
	public function getSettingsDefaultText(){
		return $this->strSettingsDefaultText;
	}
	
	/**
	* Returns the default image
	*
	* @return string
	*/
	public function getDefaultImage(){
		// depending of the setting of the default image
		switch ($this->strSettingsDefaultImage) {
		    case Pair::C_STR_DEFAULT_IMAGE1:
		        return $this->getFalImage1Path();
		    	break;
		    
		    case Pair::C_STR_DEFAULT_IMAGE2:
		        return $this->getFalImage2Path();
		    	break;
		    
		    default:
		        return "";
		    break;
		}
	}

	/**
	 * Returns the default description
	 *
	 * @return string
	 */
	public function getDefaultDescription(){
		// depending of the setting of the default image
		switch ($this->strSettingsDefaultText) {
			case Pair::C_STR_DEFAULT_TEXT1:
				return $this->getDescription1();
				break;
	
			case Pair::C_STR_DEFAULT_TEXT2:
				return $this->getDescription2();
				break;
	
			default:
				return "";
				break;
		}
	}
	
	/**
	* Returns the DefaultExternalID
	*
	* @return int $DefaultExternalID
	*/
	public function getDefaultExternalID(){
		
		// if we got a defaultImage1 or defaultText1
		if ($this->intCardNumber == 1) {
		    return $this->intExternalId1;

		// if we got a defaultImage2 or defaultText2
		} elseif ($this->intCardNumber == 2) {
			return $this->intExternalId2;
		
		// if unknown
		} else {
			return -1;
		}
	}
	
	/**
	* Returns the DefaultHeight in combination with the overall 
	* settings of the parent pairs game
	*
	* @return int $DefaultHeight
	*/
	public function getDefaultHeight(){
		
		// the dimensions of the default image
		$l_arrImageSize = array();
		// the image path
		$l_strImagePath = '';
		
		// if this is an empty pair
		if ($this->isEmpty()) {
		    return 0;
		
		// if there is no given value for the height
		} elseif (	$this->getDefaultHeightInternal() == 0 
				&& 	$this->getParentPairs()->getCardheight() == 0) {
		    
			// if default image is set
			if ($this->getDefaultImage() != '') {
				$l_strImagePath = $this->getDefaultImage(); 
			
			// image1 is set
			} elseif ($this->getFalImage1Path() != '') {
			    $l_strImagePath = $this->getFalImage1Path();
				
			// image2 is set
			} elseif ($this->getFalImage2Path() != '') {
			    $l_strImagePath = $this->getFalImage2Path();
			
			// if there is no image at all
			} else {
				// this must be a text only card
				// we return a default size for it
				return self::C_INT_DEFAULT_HEIGHT;
			}
			
			// return the actual image height of the file itself
			$l_arrImageSize = getimagesize(GeneralUtility::getFileAbsFileName($l_strImagePath));
			return $l_arrImageSize[1];
				    
		// if the default height is not set in this pair
	    } elseif ($this->getDefaultHeightInternal() == 0) {
			// choose the default card heigth of this pairs game
		    return $this->getParentPairs()->getCardheight();
		
	    } else {
			// return the individual height of this pair
			return $this->getDefaultHeightInternal();
		}
	}
	
	/**
	* returns the default hight with the formatted css syntax
	*
	* @return int $DefaultHeight
	*/
	public function getDefaultHeightTxt(){
		return ('height: ' . $this->getDefaultHeight() . 'px;');
	}
	
	/**
	* Returns the DefaultHeight plus the borderwith 
	*
	* @return int $DefaultHeightMax
	*/
	public function getDefaultHeightMax(){
		// the returning DefaultHeightMax
		$l_intDefaultHeightMax = 0;
		
		if ($this->getDefaultHeight() > 0) {
		    $l_intDefaultHeightMax = $this->getDefaultHeight() + (2 * $this->getBordersize());
		} 
		
		return $l_intDefaultHeightMax;
	}
	
	/**
	* returns the default hight max with the formatted css syntax
	*
	* @return int $DefaultHeight
	*/
	public function getDefaultHeightMaxTxt(){
		return ('height: ' . $this->getDefaultHeightMax() . 'px;');
	}
	
	/**
	* Returns the DefaultHeight minus the borderwith 
	*
	* @return int $DefaultHeightMin
	*/
	public function getDefaultHeightMin(){
		// the returning DefaultHeightMin
		$l_intDefaultHeightMin = 0;
		
		if ($this->getDefaultHeight() > 0) {
		    //$l_intDefaultHeightMin = $this->getDefaultHeight() - (2 * $this->getBordersize());
			$l_intDefaultHeightMin = $this->getDefaultHeight() - $this->getBordersize();
		} 
		return $l_intDefaultHeightMin;
	}
	
	/**
	* returns the default hight min with the formatted css syntax
	*
	* @return int $DefaultHeight
	*/
	public function getDefaultHeightMinTxt(){
		return ('height: ' . $this->getDefaultHeightMin() . 'px;');
	}
	
	/**
	* Returns the DefaultWidth in combination with the overall 
	* settings of the parent pairs game
	*
	* @return int $DefaultWidth
	*/
	public function getDefaultWidth(){
	
		// the dimensions of the default image
		$l_arrImageSize = array();
		// the image path
		$l_strImagePath = '';
		
		// if this is an empty pair
		if ($this->isEmpty()) {
		    return 0;
		
		// if there is no given value for the width
		} elseif (	$this->getDefaultWidthInternal() == 0 
				&& 	$this->getParentPairs()->getCardwidth() == 0) {
		    
			// if default image is set
			if ($this->getDefaultImage() != '') {
				$l_strImagePath = $this->getDefaultImage(); 
			
			// image1 is set
			} elseif ($this->getFalImage1Path() != '') {
			    $l_strImagePath = $this->getFalImage1Path();
				
			// image2 is set
			} elseif ($this->getFalImage2Path() != '') {
			    $l_strImagePath = $this->getFalImage2Path();
			
			// if there is no image at all
			} else {
				// this must be a text only card
				// we return a default size for it
				return self::C_INT_DEFAULT_WIDTH;
			}
			
			// return the actual image width of the file itself
			$l_arrImageSize = getimagesize(GeneralUtility::getFileAbsFileName($l_strImagePath));
			return $l_arrImageSize[0];
				    
		    // if the default height is not set in this pair
		} elseif ($this->getDefaultWidthInternal() == 0) {
			// choose the default card heigth of this pairs game
		    return $this->getParentPairs()->getCardwidth();
		
		} else {
			// return the individual height of this pair
			return $this->getDefaultWidthInternal();
		}
	}
	
	/**
	* returns the default width with the formatted css syntax
	*
	* @return int 
	*/
	public function getDefaultWidthTxt(){
		return ('width: ' . $this->getDefaultWidth() . 'px;');
	}
	
	/**
	* Returns the DefaultWidth plus the borderwith 
	*
	* @return int $DefaultWidthMax
	*/
	public function getDefaultWidthMax(){
		// the returning DefaultWidthMax
		$l_intDefaultHeightMax = 0;
		
		if ($this->getDefaultWidth() > 0) {
		    $l_intDefaultHeightMax = $this->getDefaultWidth() + (2 * $this->getBordersize());
		} 
		return $l_intDefaultHeightMax;
	}
	
	/**
	* returns the default width max with the formatted css syntax
	*
	* @return int 
	*/
	public function getDefaultWidthMaxTxt(){
		return ('width: ' . $this->getDefaultWidthMax() . 'px;');
	}
	
	/**
	* Returns the DefaultWidth minus the borderwith 
	*
	* @return int $DefaultWidthMin
	*/
	public function getDefaultWidthMin(){
			// the returning DefaultWidthMin
		$l_intDefaultHeightMin = 0;
		
		if ($this->getDefaultWidth() > 0) {
		    $l_intDefaultHeightMin = $this->getDefaultWidth() - (2 * $this->getBordersize());
		} 
		
		return $l_intDefaultHeightMin;
	}
	
	/**
	* returns the default width with min the formatted css syntax
	*
	* @return int 
	*/
	public function getDefaultWidthMinTxt(){
		return ('width: ' . $this->getDefaultWidthMin() . 'px;');
	}
	
	
	/**
	 * Returns the default fontsize.
	 * 
	 * @return integer
	 */
	public function getDefaultFontsize() {
		
		if ($this->isEmpty()) {
		    return 0;
		}
		// if there is no fontsize set in this pair 
		elseif ($this->getDefaultFontsizeInternal() == 0) {
			// return the overall fontsize of the pairs game
			return $this->getParentPairs()->getFontsize();
		}
		// if the fontsize in this pair is set
		else {
			// return this value
			return $this->getDefaultFontsizeInternal();
		}
	}
	
	/**
	* Sets the textwidth1
	*
	* @param int $textwidth1
	* @return void
	*/
	public function setTextwidth1($textwidth1){
		$this->textwidth1 = $textwidth1;
	}
	
	/**
	* Returns the textwidth1
	*
	* @return int $textwidth1
	*/
	public function getTextwidth1(){
		return $this->textwidth1;
	}
	
	/**
	* Sets the textheight1
	*
	* @param int $textheight1
	* @return void
	*/
	public function setTextheight1($textheight1){
		$this->textheight1 = $textheight1;
	}
	
	/**
	* Returns the textheight1
	*
	* @return int $textheight1
	*/
	public function getTextheight1(){
		return $this->textheight1;
	}
	
	/**
	* Sets the fontsize1
	*
	* @param int $fontsize1
	* @return void
	*/
	public function setFontsize1($fontsize1){
		$this->fontsize1 = $fontsize1;
	}
	
	/**
	* Returns the fontsize1
	*
	* @return int $fontsize1
	*/
	public function getFontsize1(){
		return $this->fontsize1;
	}

	
	/**
	* Sets the textwidth2
	*
	* @param int $textwidth2
	* @return void
	*/
	public function setTextwidth2($textwidth2){
		$this->textwidth2 = $textwidth2;
	}
	
	/**
	* Returns the textwidth2
	*
	* @return int $textwidth2
	*/
	public function getTextwidth2(){
		return $this->textwidth2;
	}
	
	/**
	* Sets the textheight2
	*
	* @param int $textheight2
	* @return void
	*/
	public function setTextheight2($textheight2){
		$this->textheight2 = $textheight2;
	}
	
	/**
	* Returns the textheight2
	*
	* @return int $textheight2
	*/
	public function getTextheight2(){
		return $this->textheight2;
	}
	
	/**
	* Sets the fontsize2
	*
	* @param int $fontsize2
	* @return void
	*/
	public function setFontsize2($fontsize2){
		$this->fontsize2 = $fontsize2;
	}
	
	/**
	* Returns the fontsize2
	*
	* @return int $fontsize2
	*/
	public function getFontsize2(){
		return $this->fontsize2;
	}

	
	/**
	* Sets the empty
	*
	* @param boolean $i_blnEmpty
	* @return void
	*/
	public function setEmpty($i_blnEmpty){
		$this->empty = $i_blnEmpty;
	}
	
	/**
	* Returns the m_blnEmpty
	*
	* @return boolean $empty
	*/
	public function isEmpty(){
		return $this->empty;
	}
	
	/**
	* Sets the bordersize
	*
	* @param int $bordersize
	* @return void
	*/
	public function setBordersize($bordersize){
		$this->bordersize = $bordersize;
	}
	
	/**
	* Returns the bordersize
	*
	* @return int $bordersize
	*/
	public function getBordersize(){
		
			// if this is an empty pair
		if ($this->isEmpty()) {
		    return 0;

 		// if the border width is not overruled here
	  	} elseif ($this->bordersize == 0) {
			// return the default border width
		    return $this->getParentPairs()->getBorderSize();
		} else {
			// return the individual border width
			return $this->bordersize;
		}
	}
	
	/**
	* Sets the parentPairs
	*
	* @param \Loss\Glpairs\Domain\Model\Pairs $parentPairs
	* @return void
	*/
	public function setParentPairs($parentPairs){
		$this->parentPairs = $parentPairs;
	}
	
	/**
	* Returns the parentPairs
	*
	* @return \Loss\Glpairs\Domain\Model\Pairs $parentPairs
	*/
	public function getParentPairs(){
		return $this->parentPairs;
	}
	
	/**
	* Returns the internal path where all images of the pairs layout are located.
	*
	* @return string $internalImgPath
	*/
	public function getInternalImgPath(){
	    return PathUtility::getAbsoluteWebPath(GeneralUtility::getFileAbsFileName(
	        'EXT:' . PairsController::c_strExtensionName . '/Resources/Public/images/' ));
	}
	
	/**
	* Sets the intExternalId1
	*
	* @param int $intExternalId1
	* @return void
	*/
	public function setintExternalId1($intExternalId1){
		$this->intExternalId1 = $intExternalId1;
	}
	
	/**
	* Returns the intExternalId1
	*
	* @return int $intExternalId1
	*/
	public function getintExternalId1(){
		return $this->intExternalId1;
	}

	/**
	* Sets the intExternalId2
	*
	* @param int $intExternalId2
	* @return void
	*/
	public function setintExternalId2($intExternalId2){
		$this->intExternalId2 = $intExternalId2;
	}
	
	/**
	* Returns the intExternalId2
	*
	* @return int $intExternalId2
	*/
	public function getintExternalId2(){
		return $this->intExternalId2;
	}
	
	/**
	* Sets the strCardType
	*
	* @param string $strCardType
	* @return void
	*/
	public function setCardType($strCardType){
		$this->strCardType = $strCardType;
	}
	
	/**
	* Returns the strCardType
	*
	* @return string $strCardType
	*/
	public function getCardType(){
		return $this->strCardType;
	}
	
	/**
	* Sets the strDefaultPartial
	*
	* @param string $i_strDefaultPartial
	* @return void
	*/
	public function setDefaultPartial($i_strDefaultPartial){
		$this->strDefaultPartial = $i_strDefaultPartial;
	}
	
	/**
	* Returns the strDefaultPartial
	*
	* @return string $strDefaultPartial
	*/
	public function getDefaultPartial(){
		// if this is an empty card
		if ($this->empty) {
			return self::C_STR_PARTIAL_EMPTY;
		
		// if this is an imagecard
		} elseif ($this->strCardType == self::C_STR_CARD_TYPE_IMAGE) {
		    return self::C_STR_PARTIAL_IMAGE;
		    
		// if this is an textcard
		} elseif ( $this->strCardType == self::C_STR_CARD_TYPE_TEXT ) {
			return self::C_STR_PARTIAL_TEXT;
			
		// if unknown
		} else {
			return '';
		}
	}
	
	/**
	* Sets the intCardNumber
	*
	* @param integer $intCardNumber
	* @return void
	*/
	public function setCardNumber($intCardNumber){
		$this->intCardNumber = $intCardNumber;
	}
	
	/**
	* Returns the intCardNumber
	*
	* @return integer $intCardNumber
	*/
	public function getCardNumber(){
		return $this->intCardNumber;
	}
	
	/**
	 * Revalidate all Defaultparameters. This method should called after a default parameter has changed. 
	 * 
	 * @return void
	 */
	public function revalidate() {
		$this->parentPairs->setMaxPairHeight($this->getDefaultHeightMax());
		$this->parentPairs->setMaxPairWidth($this->getDefaultWidthMax());
	}
	
	/**
	 * Returns the name of the image for the backside of the card
	 * 
	 * @return string The Name of the image for the backside of the card
	 */
	public function getDefaultBackImage() {
		
		// if this should be a red back
		if ($this->parentPairs->getBackimage() == Pairs::C_INT_BACKIMAGE_RED) {
		    return Pairs::C_STR_BACKIMAGE_RED;
		    
		// if this should be a blue image
		} else if ($this->parentPairs->getBackimage() == Pairs::C_INT_BACKIMAGE_BLUE) {
		    return Pairs::C_STR_BACKIMAGE_BLUE;
		
		// if this should be mixed images
		} else if ($this->parentPairs->getBackimage() == Pairs::C_INT_BACKIMAGE_MIXED) {
		    
			// for the first card
			if ($this->getCardNumber()== 1) {
				// the red backside
			    return Pairs::C_STR_BACKIMAGE_RED;
			    
			// for the second card
			} else if ($this->getCardNumber() == 2){
				// the blue backside
			    return Pairs::C_STR_BACKIMAGE_BLUE;
			
			// fall back, should never happen
			} else {
				return Pairs::C_STR_BACKIMAGE_RED;
			}
		
		// fall back for older updated versions with empty backimage value
		} else {
			return Pairs::C_STR_BACKIMAGE_RED;
		}
	}	
	
	/**
	* Returns the blnfinaltextactive
	*
	* @return boolean $blnfinaltextactive
	*/
	public function getfinaltextactive(){
		return $this->finaltextactive;
	}
	
	
	/**
	* Sets the blnfinaltextactive
	*
	* @param boolean $blnfinaltextactive
	* @return void
	*/
	public function setfinaltextactive($i_blnfinaltextactive){
		$this->finaltextactive = $i_blnfinaltextactive;
	}
	
	/**
	* Returns the strFinalText
	*
	* @return string $strFinalText
	*/
	public function getFinalText(){
		return $this->finaltext;
	}
	
	/**
	* Sets the strFinalText
	*
	* @param string $strFinalText
	* @return void
	*/
	public function setFinalText($i_strFinalText){
		$this->finaltext = $i_strFinalText;
	}
	
	/**
	* Returns the finaltextwidth
	*
	* @return integer $finaltextwidth
	*/
	public function getfinaltextwidth(){
		if ($this->finaltextwidth != 0) {
			return $this->finaltextwidth;
		} elseif ($this->parentPairs->getfinaltextwidth() != 0) {
			return $this->parentPairs->getfinaltextwidth();
		} else {
			return $this->finaltextwidth;
		}
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
		if ($this->finaltextheight != 0) {
			return $this->finaltextheight;
		} elseif ($this->parentPairs->getfinaltextheight() != 0) {
			return $this->parentPairs->getfinaltextheight();
		} else {
			return $this->finaltextheight;
		}
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
		if ($this->finalpicwidth != 0) {
			return $this->finalpicwidth;
		} elseif ($this->parentPairs->getfinalpicwidth() != 0){
			return$this->parentPairs->getfinalpicwidth();
		} else { 
			return $this->finalpicwidth;
		}
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
		if ($this->finalpicheight != 0) {
			return $this->finalpicheight;
		} elseif ($this->parentPairs->getfinalpicheight() != 0){
			return$this->parentPairs->getfinalpicheight();
		} else { 
			return $this->finalpicheight;
		}
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
	
	// **********************************************************************************************
	// Protected methods part
	// **********************************************************************************************
	
	
	/**
	 * Returns the internal default fontsize in this pair without considering the overall
	 * fontsize of the pairs game.
	 *
	 * @return integer
	 */
	protected function getDefaultFontsizeInternal() {
		// depending of the setting of the default image
		switch ($this->strSettingsDefaultText) {
			case Pair::C_STR_DEFAULT_TEXT1:
				return $this->getFontsize1();
				break;
	
			case Pair::C_STR_DEFAULT_TEXT2:
				return $this->getFontsize2();
				break;
			
			default:
				return 0;
				break;
		}
	
	}
	
	/**
	 * Returns the internal DefaultHeight of this pair
	 *
	 * @return int $DefaultHeight
	 */
	protected function getDefaultHeightInternal(){
	
		// depending of the card type
		switch ($this->strCardType) {
			// if this card is an image card
			case self::C_STR_CARD_TYPE_IMAGE:
	
				// depending of the setting of the default image
				switch ($this->strSettingsDefaultImage) {
					case Pair::C_STR_DEFAULT_IMAGE1:
						return $this->getHeight1();
						break;
						 
					case Pair::C_STR_DEFAULT_IMAGE2:
						return $this->getHeight2();
						break;
						 
					default:
						return "";
						break;
				}
				break;
	
				// if this card is an text card
			case self::C_STR_CARD_TYPE_TEXT:
				// depending of the setting of the default text description
				switch ($this->strSettingsDefaultText) {
					case Pair::C_STR_DEFAULT_TEXT1:
						return $this->getTextheight1();
						break;
	
					case Pair::C_STR_DEFAULT_TEXT2:
						return $this->getTextheight2();
						break;
	
					default:
						return "";
						break;
				}
				break;
	
			default:
				return "";
				break;
		}
	}
	
	/**
	 * Returns the internal DefaultWidth of this pair
	 *
	 * @return int $DefaultWidth
	 */
	protected function getDefaultWidthInternal(){
	
		// depending of the card type
		switch ($this->strCardType) {
			// if this card is an image card
			case self::C_STR_CARD_TYPE_IMAGE:
					
				// depending of the setting of the default image
				switch ($this->strSettingsDefaultImage) {
					case Pair::C_STR_DEFAULT_IMAGE1:
						return $this->getWidth1();
						break;
	
					case Pair::C_STR_DEFAULT_IMAGE2:
						return $this->getWidth2();
						break;
	
					default:
						return "";
						break;
				}
				break;
	
				// if this card is an text card
			case self::C_STR_CARD_TYPE_TEXT:
				// depending of the setting of the default text description
				switch ($this->strSettingsDefaultText) {
					case Pair::C_STR_DEFAULT_TEXT1:
						return $this->getTextwidth1();
						break;
	
					case Pair::C_STR_DEFAULT_TEXT2:
						return $this->getTextwidth2();
						break;
	
					default:
						return "";
						break;
				}
				break;
	
			default:
				return "";
				break;
		}
	}

	/**
	 * Get the Fal Image 1
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
	 */
	public function getFalImage1()
	{
	    return $this->falImage1;
	}
	
	/**
	 * Set Fal Image 1
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $falMedia
	 */
	public function setFalImage1(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $falImage1)
	{
	    $this->falImag1 = $falImage1;
	}
	
	/**
	 * Get the Fal Image 2
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
	 */
	public function getFalImage2()
	{
	    
	    return $this->falImage2;
	}
	
	/**
	 * Set Fal Image 2
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $falMedia
	 */
	public function setFalImage2(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $falImage2)
	{
	    $this->falImag2 = $falImage2;
	}
	
	/**
	 * Get the server path to Image 1 over File Abstract Layer (FAL)
	 *  
     * @return string
	 */
	public function getFalImage1Path(){
	    
	    // if no image is defined
	    if ($this->getFalImage1()->current() === Null) {
	        // no image path is returned
	        return '';
	    }
	    
	    // get the path of the image
	    $imagePath = Pair::C_STR_FILEADMIN_PATH .
	    $this->getFalImage1()
	    ->current()
	    ->getOriginalResource()
	    ->getIdentifier();
	    
	    // return the path without leading slash 
	    return ltrim($imagePath, '/');
	}

	/**
	 * Get the server path to Image 2 over File Abstract Layer (FAL)
	 * 
     * @return string
	 */
	public function getFalImage2Path(){
	    
	    // if no image is defined
	    if ($this->getFalImage2()->current() === Null) {
	        // no image path is returned
	        return '';
	    }
	    
	    // get the path of the image
	    $imagePath = Pair::C_STR_FILEADMIN_PATH .
                	    $this->getFalImage2()
                      	     ->current()
                    	     ->getOriginalResource()
                    	     ->getIdentifier();
	    
	    // return the path without leading slash
	    return ltrim($imagePath, '/');
	}
}
?>