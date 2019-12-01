<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$tx_glpairs_domain_model_pair = array(
    'ctrl' => array(
        'title'	=> 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair',
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'dividers2tabs' => TRUE,
        'origUid' => 't3_origuid',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'type' => 'type',
        'enablecolumns' => array(
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ),
        'searchFields' => 'name,fal_image1,fal_image2,description,use_description,',
        'iconfile' => 'EXT:glpairs/Resources/Public/Icons/tx_glpairs_domain_model_pair.gif'
    ),
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, fal_image1, fal_image2, description, use_description',
	),
	'types' => array(
	    '0' => array(  'showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, --palette--;;1, type, name, bordersize, finaltextactive, 
									--div--;LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.tabimage1,fal_image1, height1, width1, 
									--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,starttime, endtime',
									'subtype_value_field' => 'finaltextactive',
									'subtypes_addlist' => array( '1' => 'finaltextheight, finaltextwidth, finalpicheight, finalpicwidth, finaltext' )
												),
	    '1' => array(  'showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, --palette--;;1, type, name, bordersize, finaltextactive,
									--div--;LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.tabimage1, fal_image1, height1, width1, 
									--div--;LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.tabimage2, fal_image2, height2, width2, 
									--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,starttime, endtime',
                        	        'subtype_value_field' => 'finaltextactive',
                        	        'subtypes_addlist' => array( '1' => 'finaltextheight, finaltextwidth, finalpicheight, finalpicwidth, finaltext' )
	    ),
	    '2' => array(  'showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, --palette--;;1, type, name, bordersize, finaltextactive,
									--div--;LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.tabtext1, description1, fontsize1, textheight1, textwidth1,
									--div--;LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.tabimage1, fal_image1, height1, width1, 
									--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,starttime, endtime',
                        	        'subtype_value_field' => 'finaltextactive',
                        	        'subtypes_addlist' => array( '1' => 'finaltextheight, finaltextwidth, finalpicheight, finalpicwidth, finaltext' )
	    ),
	    '3' => array(  'showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, --palette--;;1, type, name, bordersize, finaltextactive,
									--div--;LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.tabtext1, description1, fontsize1, textheight1, textwidth1,
									--div--;LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.tabtext2, description2, fontsize2, textheight2, textwidth2,
									--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,starttime, endtime',
                        	        'subtype_value_field' => 'finaltextactive',
                        	        'subtypes_addlist' => array( '1' => 'finaltextheight, finaltextwidth, finalpicheight, finalpicwidth, finaltext' )
	    )
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.default_value', 0)
				),
				'renderType' => 'selectSingle',
			    'default' => 0
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_glpairs_domain_model_pair',
				'foreign_table_where' => 'AND tx_glpairs_domain_model_pair.pid=###CURRENT_PID### AND tx_glpairs_domain_model_pair.sys_language_uid IN (-1,0)',
				'renderType' => 'selectSingle',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'eval' => 'datetime,int',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			    'behaviour' => array(
			        'allowLanguageSynchronization' => TRUE
			    ),
			    'renderType' => 'inputDateTime',
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'eval' => 'datetime,int',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			    'behaviour' => array(
			        'allowLanguageSynchronization' => TRUE
			    ),
			    'renderType' => 'inputDateTime',
			),
		),
		'type' => Array (
				'exclude' => 1,
				'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.type',
				'config' => Array (
					'type' => 'select',
				    'items' => 	array( 
				    				array( 	'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model.type.same', 0 ),
				    				array(	'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model.type.2pics', 1 ),
				    				array(	'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model.type.text', 2 ),
				    				array(	'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model.type.textonly', 3 )
				    ),
					'size' => 1,
					'maxitems' => 1,
					'eval' => 'required',
					'default' => 0,
					'renderType' => 'selectSingle',
			    ),
		),
		'name' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
	    'fal_image1' => array(
	        'exclude' => 0,
	        'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.image1',
	        'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
	            'fal_image1',
	            array(
	                'maxitems' => 1,
	            ),
	            $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
	        ),
	    ),
	    // legacy field should never displayed
	    'image1' => array(
	        'exclude' => 0,
	        'displayCond' => 'FIELD:uid:<:0',
	        'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.image1',
	        'config' => array(
	            'type' => 'input',
	            'size' => 30,
	            'eval' => 'trim,required',
	            'default' => ''
	        ),
	    ),
	    'height1' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.height1',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			),
		),
		'width1' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.width1',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			),
		), 
	    'fal_image2' => array(
	        'exclude' => 0,
	        'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.image1',
	        'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
	            'fal_image1',
	            array(
	                'maxitems' => 1,
	            ),
	            $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
	            ),
	    ),
	    // legacy field should never displayed
	    'image2' => array(
	        'exclude' => 0,
	        'displayCond' => 'FIELD:uid:<:0',
	        'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.image1',
	        'config' => array(
	            'type' => 'input',
	            'size' => 30,
	            'eval' => 'trim,required',
	            'default' => ''
	        ),
	    ),
	    'height2' => array(
				'exclude' => 0,
				'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.height2',
				'config' => array(
						'type' => 'input',
						'size' => 4,
						'eval' => 'int',
                        'default' => 0
				),
		),
		'width2' => array(
				'exclude' => 0,
				'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.width2',
				'config' => array(
					'type' => 'input',
					'size' => 4,
				    'eval' => 'int',
				    'default' => 0
				),
		),
		'bordersize' => array(
				'exclude' => 0,
				'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.bordersize',
				'config' => array(
					'type' => 'input',
					'size' => 4,
				    'eval' => 'int',
				    'default' => 0
				),
		),
		'description1' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.description',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'fontsize1' => array(
				'exclude' => 0,
				'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.fontsize',
				'config' => array(
					'type' => 'input',
					'size' => 4,
				    'eval' => 'int',
				    'default' => 0
				),
		),

		'textheight1' => array(
				'exclude' => 0,
				'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.textheight',
				'config' => array(
					'type' => 'input',
					'size' => 4,
				    'eval' => 'int',
				    'default' => 0
				),
		),
		'textwidth1' => array(
				'exclude' => 0,
				'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.textwidth',
				'config' => array(
					'type' => 'input',
					'size' => 4,
				    'eval' => 'int',
				    'default' => 0
				),
		),
		'description2' => array(
				'exclude' => 0,
				'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.description',
				'config' => array(
						'type' => 'input',
						'size' => 30,
						'eval' => 'trim,required'
				),
		),
		'fontsize2' => array(
				'exclude' => 0,
				'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.fontsize',
				'config' => array(
					'type' => 'input',
					'size' => 4,
				    'eval' => 'int',
				    'default' => 0
				),
		),
		'textheight2' => array(
				'exclude' => 0,
				'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.textheight',
				'config' => array(
					'type' => 'input',
					'size' => 4,
				    'eval' => 'int',
				    'default' => 0
				),
		),
		'textwidth2' => array(
				'exclude' => 0,
				'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.textwidth',
				'config' => array(
					'type' => 'input',
					'size' => 4,
				    'eval' => 'int',
				    'default' => 0
				),
		),
		'finaltextactive' => array(
				'exclude' => 1,
				'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.finaltextactive',
				'config' => array(
						'type' => 'check',
				),
		        'onChange' => 'reload',
		),
		'finaltext' => array(
				'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.finaltext',
				'config' => array(
					'type' => 'text',
				    'enableRichtext' => true,
					'cols' => '80',
					'rows' => '15',
				)
		),
		'finaltextwidth' => array(
				'exclude' => 0,
				'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.finaltextwidth',
				'config' => array(
					'type' => 'input',
					'size' => 4,
				    'eval' => 'int',
				    'default' => 0
				),
		),
		'finaltextheight' => array(
				'exclude' => 0,
				'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.finaltextheight',
				'config' => array(
					'type' => 'input',
					'size' => 4,
				    'eval' => 'int',
				    'default' => 0
				),
		),
		'finalpicwidth' => array(
				'exclude' => 0,
				'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.finalpic_width',
				'config' => array(
					'type' => 'input',
					'size' => 4,
				    'eval' => 'int',
				    'default' => 0
				),
		),
		'finalpicheight' => array(
				'exclude' => 0,
				'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.finalpic_height',
				'config' => array(
					'type' => 'input',
					'size' => 4,
				    'eval' => 'int',
				    'default' => 0
				),
		)
	)
);

return $tx_glpairs_domain_model_pair;
?>