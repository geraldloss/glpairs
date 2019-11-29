<?php

// register frontend plugin pi1
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'glpairs',
    'Pi1',
    'A Pairs game for the frontend with many posibilities for configuration'
);

// insert flexform for plugin pi1
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['glpairs_pi1'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    'glpairs_pi1', 
    'FILE:EXT:glpairs/Configuration/FlexForms/Pairs.xml'
);
