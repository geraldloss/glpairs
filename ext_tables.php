<?php
if (!defined('TYPO3_MODE'))	die ('Access denied.');

// load CSH for flexform
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
    'tt_content.pi_flexform.glpairs_pi1.list', 
    'EXT:glpairs/Resources/Private/Language/locallang_csh_flexForm.xlf'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
    'tx_glpairs_domain_model_pair', 
    'EXT:glpairs/Resources/Private/Language/locallang_csh_tx_glpairs_domain_model_pair.xlf'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_glpairs_domain_model_pair');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
    'tx_glpairs_domain_model_pairs', 
    'EXT:glpairs/Resources/Private/Language/locallang_csh_tx_glpairs_domain_model_pairs.xlf'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_glpairs_domain_model_pairs');
