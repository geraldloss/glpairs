<?php
if (!defined('TYPO3')) {
    die('Do not access the file ext_localconf.php directly.');
}


// configure the plugin
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Glpairs',
	'Pi1',
	array(
	    \Loss\Glpairs\Controller\PairsController::class  => 'list,ajaxBasicData',
		
	),
	// non-cacheable actions
	array(
	    \Loss\Glpairs\Controller\PairsController::class => 'list',
		
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