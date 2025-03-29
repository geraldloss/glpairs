<?php
if (!defined('TYPO3')) {
    die('Do not access the file ext_localconf.php directly.');
}


// configure the plugin
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Glpairs',
	'Pairs',
	[
	    \Loss\Glpairs\Controller\PairsController::class  => 'list,ajaxBasicData',	
    ],
	// non-cacheable actions
	[
	    \Loss\Glpairs\Controller\PairsController::class => 'list',
    ],
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
	
);


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