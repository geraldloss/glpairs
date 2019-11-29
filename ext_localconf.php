<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

// configure the plugin
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Loss.glpairs',
	'Pi1',
	array(
		'Pairs' => 'list,ajaxBasicData',
		
	),
	// non-cacheable actions
	array(
		'Pairs' => 'list',
		
	)
);

// register new content element wizard
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('
    <INCLUDE_TYPOSCRIPT: source="FILE:EXT:glpairs/Configuration/TSconfig/ContentElementWizard.txt">
');

if (class_exists('TYPO3\\CMS\\Core\\Imaging\\IconRegistry')) {
    // Initiate
    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
    $iconRegistry->registerIcon(
        'glpairs-ext-icon',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        [
            'source' => 'EXT:glpairs/Resources/Public/Icons/ext_icon.svg',
        ]
        );
}