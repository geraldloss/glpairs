<?php
namespace Loss\Glpairs\ViewHelpers;

use TYPO3Fluid;

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
 * Example
 * {namespace glpairs=Loss\Glpairs\ViewHelpers}
 * <glpairs:uid/>
 * 
 * @author Gerald Loß
 * @package Loss
 * @subpackage glpairs
 *
 */
class UidViewHelper extends \TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper {
    /**
	 * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
	 */
	protected $configurationManager;

	/**
	 * Inject Configuration Manager
	 *
	 * @param \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface $configurationManager
	 */
	public function injectConfigurationManager(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface $configurationManager)
	{
	    $this->configurationManager = $configurationManager;
	}
	
	/**
	 * Set uid of the content element
	 *
	 * @return int $uid The uid of the content element
	 */
	public function render() {
		
		// The content object, where this extension is embedded
		/* @var $l_obj_cObj \TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer */
		$l_obj_cObj = NULL;
		// the returning uid
		$l_int_uid = 0;

		// read the content object
		$l_obj_cObj = $this->configurationManager->getContentObject();
		
		if (isset($l_obj_cObj->data['uid'])) {
			// read the uid of the content object
			$l_int_uid = $l_obj_cObj->data['uid'];
		} else {
			// workaround if no unique id is found
			$l_int_uid = -1;
		}
		// return the uid
		return $l_int_uid;
	}
}
?>
