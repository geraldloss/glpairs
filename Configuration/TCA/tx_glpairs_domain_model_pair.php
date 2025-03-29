<?php
if (!defined('TYPO3')) {
    die('Do not access the file tx_glpairs_domain_model_pair.php directly.');
}


$tx_glpairs_domain_model_pair = [
    'ctrl' => [
        'title'	=> 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair',
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'dividers2tabs' => TRUE,
        'origUid' => 't3_origuid',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'type' => 'type',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'name,fal_image1,fal_image2,description,use_description,',
        'iconfile' => 'EXT:glpairs/Resources/Public/Icons/tx_glpairs_domain_model_pair.gif'
    ],
    'types' => [
        '0' => [
            'showitem' => '
                sys_language_uid, l10n_parent, l10n_diffsource, hidden, --palette--;;1,
                type, name, bordersize, finaltextactive,
                finaltextheight, finaltextwidth, finalpicheight, finalpicwidth, finaltext,
                --div--;LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.tabimage1,
                fal_image1, height1, width1,
                --div--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:be_users.tabs.access,
                starttime, endtime
            ',
        ],
        '1' => [
            'showitem' => '
                sys_language_uid, l10n_parent, l10n_diffsource, hidden, --palette--;;1,
                type, name, bordersize, finaltextactive,
                finaltextheight, finaltextwidth, finalpicheight, finalpicwidth, finaltext,
                --div--;LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.tabimage1,
                fal_image1, height1, width1,
                --div--;LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.tabimage2,
                fal_image2, height2, width2,
                --div--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:be_users.tabs.access,
                starttime, endtime
            ',
        ],
        '2' => [
            'showitem' => '
                sys_language_uid, l10n_parent, l10n_diffsource, hidden, --palette--;;1,
                type, name, bordersize, finaltextactive,
                finaltextheight, finaltextwidth, finalpicheight, finalpicwidth, finaltext,
                --div--;LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.tabtext1,
                description1, fontsize1, textheight1, textwidth1,
                --div--;LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.tabimage1,
                fal_image1, height1, width1,
                --div--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:be_users.tabs.access,
                starttime, endtime
            ',
        ],
        '3' => [
            'showitem' => '
                sys_language_uid, l10n_parent, l10n_diffsource, hidden, --palette--;;1,
                type, name, bordersize, finaltextactive,
                finaltextheight, finaltextwidth, finalpicheight, finalpicwidth, finaltext,
                --div--;LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.tabtext1,
                description1, fontsize1, textheight1, textwidth1,
                --div--;LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.tabtext2,
                description2, fontsize2, textheight2, textwidth2,
                --div--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:be_users.tabs.access,
                starttime, endtime
            ',
        ],
    ],
	'palettes' => [
		'1' => ['showitem' => '']
	],
	'columns' => [
	    'sys_language_uid' => [
	        'exclude' => 1,
	        'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
	        'config' => [
	            'type' => 'language',
	        ],
	    ],
	    'l10n_parent' => [
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
			'config' => [
				'type' => 'select',
				'items' => [
					[
						'label' => '',
						'value' => 0
					],
				],
				'foreign_table' => 'tx_glpairs_domain_model_pair',
				'foreign_table_where' => 'AND tx_glpairs_domain_model_pair.pid=###CURRENT_PID### AND tx_glpairs_domain_model_pair.sys_language_uid IN (-1,0)',
				'renderType' => 'selectSingle',
			],
		],
		'l10n_diffsource' => [
			'config' => [
				'type' => 'passthrough',
			],
		],
		't3ver_label' => [
			'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.versionLabel',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			]
		],
		'hidden' => [
			'exclude' => 1,
			'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
			'config' => [
				'type' => 'check',
			],
		],
		'starttime' => [
			'exclude' => 1,
			'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
			'config' => [
				'type' => 'datetime',
				'default' => 0,
			    'behaviour' => [
			        'allowLanguageSynchronization' => true
			    ],
			],
		],
		'endtime' => [
			'exclude' => 1,
			'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
			'config' => [
				'type' => 'datetime',
				'default' => 0,
			    'behaviour' => [
			        'allowLanguageSynchronization' => true
			    ],
			],
		],
		'type' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.type',
				'config' => [
					'type' => 'select',
				    'items' => 	[
				    				[
				    					'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model.type.same',
				    					'value' => 0
				    				],
				    				[
				    					'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model.type.2pics',
				    					'value' => 1
				    				],
				    				[
				    					'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model.type.text',
				    					'value' => 2
				    				],
				    				[
				    					'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model.type.textonly',
				    					'value' => 3
				    				]
				    ],
					'size' => 1,
					'maxitems' => 1,
					'required' => true,
					'default' => 0,
					'renderType' => 'selectSingle',
			    ],
		],
		'name' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.name',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'required' => true,
				'trim' => true
			],
		],
	    'fal_image1' => [
	        'exclude' => 0,
	        'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.image1',
	        'config' => [
	            'type' => 'file',
	            'maxitems' => 1,
	            'allowed' => 'common-image-types'
	        ],
	    ],
	    // legacy field should never displayed
	    'image1' => [
	        'exclude' => 0,
	        'displayCond' => 'FIELD:uid:<:0',
	        'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.image1',
	        'config' => [
	            'type' => 'input',
	            'size' => 30,
	            'required' => true,
	            'trim' => true,
	            'default' => ''
	        ],
	    ],
	    'height1' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.height1',
			'config' => [
				'type' => 'number',
				'size' => 4,
			],
		],
		'width1' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.width1',
			'config' => [
				'type' => 'number',
				'size' => 4,
			],
		], 
	    'fal_image2' => [
	        'exclude' => 0,
	        'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.image1',
	        'config' => [
	            'type' => 'file',
	            'maxitems' => 1,
	            'allowed' => 'common-image-types'
	        ],
	    ],
	    // legacy field should never displayed
	    'image2' => [
	        'exclude' => 0,
	        'displayCond' => 'FIELD:uid:<:0',
	        'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.image1',
	        'config' => [
	            'type' => 'input',
	            'size' => 30,
	            'required' => true,
	            'trim' => true,
	            'default' => ''
	        ],
	    ],
	    'height2' => [
				'exclude' => 0,
				'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.height2',
				'config' => [
						'type' => 'number',
						'size' => 4,
                        'default' => 0
				],
		],
		'width2' => [
				'exclude' => 0,
				'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.width2',
				'config' => [
					'type' => 'number',
					'size' => 4,
				    'default' => 0
				],
		],
		'bordersize' => [
				'exclude' => 0,
				'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.bordersize',
				'config' => [
					'type' => 'number',
					'size' => 4,
				    'default' => 0
				],
		],
		'description1' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.description',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'required' => true,
				'trim' => true
			],
		],
		'fontsize1' => [
				'exclude' => 0,
				'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.fontsize',
				'config' => [
					'type' => 'number',
					'size' => 4,
				    'default' => 0
				],
		],

		'textheight1' => [
				'exclude' => 0,
				'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.textheight',
				'config' => [
					'type' => 'number',
					'size' => 4,
				    'default' => 0
				],
		],
		'textwidth1' => [
				'exclude' => 0,
				'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.textwidth',
				'config' => [
					'type' => 'number',
					'size' => 4,
				    'default' => 0
				],
		],
		'description2' => [
				'exclude' => 0,
				'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.description',
				'config' => [
						'type' => 'input',
						'size' => 30,
						'required' => true,
						'trim' => true
				],
		],
		'fontsize2' => [
				'exclude' => 0,
				'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.fontsize',
				'config' => [
					'type' => 'number',
					'size' => 4,
				    'default' => 0
				],
		],
		'textheight2' => [
				'exclude' => 0,
				'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.textheight',
				'config' => [
					'type' => 'number',
					'size' => 4,
				    'default' => 0
				],
		],
		'textwidth2' => [
				'exclude' => 0,
				'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.textwidth',
				'config' => [
					'type' => 'number',
					'size' => 4,
				    'default' => 0
				],
		],
		'finaltextactive' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.finaltextactive',
				'config' => [
						'type' => 'check',
				],
                'displayCond' => 'FIELD:type:IN:0,1,2,3'
		],
		'finaltext' => [
				'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.finaltext',
				'config' => [
					'type' => 'text',
				    'enableRichtext' => true,
					'cols' => '80',
					'rows' => '15',
				]
		],
		'finaltextwidth' => [
				'exclude' => 0,
				'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.finaltextwidth',
				'config' => [
					'type' => 'number',
					'size' => 4,
				    'default' => 0
				],
		],
		'finaltextheight' => [
				'exclude' => 0,
				'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.finaltextheight',
				'config' => [
					'type' => 'number',
					'size' => 4,
				    'default' => 0
				],
		],
		'finalpicwidth' => [
				'exclude' => 0,
				'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.finalpic_width',
				'config' => [
					'type' => 'number',
					'size' => 4,
				    'default' => 0
				],
		],
		'finalpicheight' => [
				'exclude' => 0,
				'label' => 'LLL:EXT:glpairs/Resources/Private/Language/locallang_db.xlf:tx_glpairs_domain_model_pair.finalpic_height',
				'config' => [
					'type' => 'number',
					'size' => 4,
				    'default' => 0
				],
		]
	]
];

return $tx_glpairs_domain_model_pair;
?>