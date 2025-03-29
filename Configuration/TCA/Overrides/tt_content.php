<?php
declare(strict_types=1);
defined('TYPO3') or die();

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

// register frontend plugin pairs
ExtensionUtility::registerPlugin(
    'glpairs',
    'pairs',
    'LLL:EXT:glpairs/Resources/Private/Language/locallang.xlf:plugin_name'
);

// insert flexform for plugin pairs
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['glpairs_pairs'] = 'recursive,select_key,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['glpairs_pairs'] = 'pi_flexform';
ExtensionManagementUtility::addPiFlexFormValue(
    'glpairs_pairs', 
    'FILE:EXT:glpairs/Configuration/FlexForms/Pairs.xml'
);
