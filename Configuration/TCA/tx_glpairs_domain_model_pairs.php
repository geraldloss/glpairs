<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$tx_glpairs_domain_model_pairs = array(
    'ctrl' => array(
        'title'	=> 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pairs',
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
        'searchFields' => 'name,type,width,has_pairs,',
        'iconfile' => 'EXT:glpairs/Resources/Public/Icons/tx_glpairs_domain_model_pairs.gif'
	),
	'types' => array(
	    '0' => array(  'showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, --palette--;;1, type, name, splitmode, width, bordersize, cardheight, cardwidth, pluspoints, minuspoints, backimage, maxcards, has_pairs, 
									--div--;LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model.tabfinalinfo, finaltextwidth, finaltextheight, finalpicwidth, finalpicheight,
									--div--;LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model.tabadvanced, turnbackdelay, hintdelay, turnduration, stackduration, testmodeturndelay, testmode,
									--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,starttime, endtime'
				),
	    '1' => array(  'showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, --palette--;;1, type, name, splitmode, width, bordersize, cardheight, cardwidth, pluspoints, minuspoints, backimage, maxcards, has_pairs,
									--div--;LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model.tabfinalinfo, finaltextwidth, finaltextheight, finalpicwidth, finalpicheight,
									--div--;LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model.tabadvanced, turnbackdelay, hintdelay, turnduration, stackduration, testmodeturndelay, testmode,
									--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,starttime, endtime'
				),
	    '2' => array(  'showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, --palette--;;1, type, name, splitmode, width, bordersize, cardheight, cardwidth, fontsize, pluspoints, minuspoints, backimage, maxcards, has_pairs,
									--div--;LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model.tabfinalinfo, finaltextwidth, finaltextheight, finalpicwidth, finalpicheight,
									--div--;LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model.tabadvanced, turnbackdelay, hintdelay, turnduration, stackduration, testmodeturndelay, testmode,
									--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,starttime, endtime',
									'subtype_value_field' => 'finaltext_active'
				),
	    '3' => array( 'showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, --palette--;;1, type, name, splitmode, width, bordersize, cardheight, cardwidth, fontsize, pluspoints, minuspoints, backimage, maxcards, has_pairs,
									--div--;LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model.tabfinalinfo, finaltextwidth, finaltextheight, finalpicwidth, finalpicheight,
									--div--;LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model.tabadvanced, turnbackdelay, hintdelay, turnduration, stackduration, testmodeturndelay, testmode,
									--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,starttime, endtime'
				),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
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
			'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_glpairs_domain_model_pairs',
				'foreign_table_where' => 'AND tx_glpairs_domain_model_pairs.pid=###CURRENT_PID### AND tx_glpairs_domain_model_pairs.sys_language_uid IN (-1,0)',
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
		'name' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pairs.name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'type' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pairs.type',
			'config' => array(
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
		'splitmode' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pairs.splitmode',
			'config' => array(
				'type' => 'check',
			),
		),
		'width' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pairs.width',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int,required',
				'default' => 5,
				'range' => array(
							  'lower' => 1,
							  'upper' => 9999
							)
			),
		),
		'bordersize' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pairs.bordersize',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'num,required',
				'default' => 3,
				'range' => array(
							  'lower' => 0,
							  'upper' => 9999
							)
			),
		),
		'cardheight' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pairs.cardheight',
			'config' => array(
				'type' => 'input',
				'size' => 4,
			    'eval' => 'int',
			    'default' => 0
			),
		),
		'cardwidth' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pairs.cardwidth',
			'config' => array(
				'type' => 'input',
				'size' => 4,
			    'eval' => 'int',
			    'default' => 0
			),
		), 
		'fontsize' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pairs.fontsize',
			'config' => array(
				'type' => 'input',
				'size' => 4,
			    'eval' => 'int',
			    'default' => 0
			),
		), 
		'pluspoints' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pairs.pluspoints',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'num,required',
				'default' => 5,
				'range' => array(
							  'lower' => 0,
							  'upper' => 9999
							)
			),
		),
		'minuspoints' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pairs.minuspoints',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'num,required',
				'default' => 1,
				'range' => array(
							  'lower' => 0,
							  'upper' => 9999
							)
			),
		),
		'backimage' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pairs.backimage',
			'config' => array(
				'type' => 'select',
			    'items' => 	array( 
			    				array( 	'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pairs.backimage.red', 0 ),
			    				array(	'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pairs.backimage.blue', 1 ),
			    				array(	'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pairs.backimage.mixed', 2 )
			    			),
				'size' => 1,
				'maxitems' => 1,
				'eval' => 'required',
				'default' => 0,
				'renderType' => 'selectSingle',
			),
		),
		'turnbackdelay' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pairs.turnbackdelay',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'num,required',
				'default' => 20000,
				'range' => array(
							  'lower' => 0,
							  'upper' => 999999
							)
			),
		),
		'hintdelay' => array(
				'exclude' => 0,
				'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pairs.hintdelay',
				'config' => array(
						'type' => 'input',
						'size' => 4,
						'eval' => 'num,required',
						'default' => 10000,
						'range' => array(
								'lower' => 0,
								'upper' => 999999
						)
				),
		),
		'turnduration' => array(
				'exclude' => 0,
				'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pairs.turnduration',
				'config' => array(
						'type' => 'input',
						'size' => 4,
						'eval' => 'int,required',
						'default' => 500,
						'range' => array(
								'lower' => 0,
								'upper' => 999999
						)
				),
		),
		'stackduration' => array(
				'exclude' => 0,
				'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pairs.stackduration',
				'config' => array(
						'type' => 'input',
						'size' => 4,
						'eval' => 'int,required',
						'default' => 500,
						'range' => array(
								'lower' => 0,
								'upper' => 999999
						)
				),
		),
		'testmodeturndelay' => array(
				'exclude' => 0,
				'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pairs.testmodeturndelay',
				'config' => array(
						'type' => 'input',
						'size' => 4,
						'eval' => 'int,required',
						'default' => 100,
						'range' => array(
								'lower' => 0,
								'upper' => 999999
						)
				),
		),
		'testmode' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pairs.testmode',
			'config' => array(
				'type' => 'check',
			),
		),
		'maxcards' => array(
				'exclude' => 0,
				'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pairs.maxcards',
				'config' => array(
						'type' => 'input',
						'size' => 4,
						'eval' => 'int',
						'default' => 500,
						'range' => array(
								'lower' => 0,
								'upper' => 999999
						)
				),
		),
		'has_pairs' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pairs.has_pairs',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_glpairs_domain_model_pair',
				'foreign_table_where' => 'AND {#tx_glpairs_domain_model_pair}.{#type}=###REC_FIELD_type###',
				'MM' => 'tx_glpairs_pairs_pair_mm',
				'size' => 10,
				'autoSizeMax' => 30,
				'maxitems' => 9999,
				'minitems' => 0,
				'multiple' => 0,
				'renderType' => 'selectMultipleSideBySide',
			    'default' => 0
			),
		),
		'finaltextwidth' => array(
				'exclude' => 0,
				'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pairs.finaltextwidth',
				'config' => array(
					'type' => 'input',
					'size' => 4,
				    'eval' => 'int',
				    'default' => 0
				),
		),
		'finaltextheight' => array(
				'exclude' => 0,
				'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pairs.finaltextheight',
				'config' => array(
					'type' => 'input',
					'size' => 4,
				    'eval' => 'int',
				    'default' => 0
				),
		),
		'finalpicwidth' => array(
				'exclude' => 0,
				'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pairs.finalpic_width',
				'config' => array(
					'type' => 'input',
					'size' => 4,
				    'eval' => 'int',
				    'default' => 0
				),
		),
		'finalpicheight' => array(
				'exclude' => 0,
				'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pairs.finalpic_height',
				'config' => array(
					'type' => 'input',
					'size' => 4,
				    'eval' => 'int',
				    'default' => 0
				),
		),
				
	),
);

return $tx_glpairs_domain_model_pairs;
?>