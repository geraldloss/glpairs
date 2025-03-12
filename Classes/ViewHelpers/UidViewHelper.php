<?php
declare(strict_types=1);

namespace Loss\Glpairs\ViewHelpers;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

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
class UidViewHelper extends AbstractViewHelper {
    
    /**
     * Initialize arguments
     */
    public function initializeArguments(): void
    {
        parent::initializeArguments();
    }

    /**
     * @var ContentObjectRenderer
     */
    protected ContentObjectRenderer $contentObjectRenderer;

    /**
     * @param ContentObjectRenderer $contentObjectRenderer
     */
    public function injectContentObjectRenderer(ContentObjectRenderer $contentObjectRenderer): void
    {
        $this->contentObjectRenderer = $contentObjectRenderer;
    }

    /**
     * Set uid of the content element
     *
     * @return int $uid The uid of the content element
     */
    public function render(): int {
        // get ID for current content element
        if (isset($GLOBALS['TSFE']->cObj->data['uid'])) {
            return (int)$GLOBALS['TSFE']->cObj->data['uid'];
        }

        // Wenn keine UID gefunden wurde
        return -1;
    }
}
?>