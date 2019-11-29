#
# Table structure for table 'tx_glpairs_domain_model_pair'
#
CREATE TABLE tx_glpairs_domain_model_pair (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	
	type tinyint(4) DEFAULT '0' NOT NULL,
	name varchar(255) DEFAULT '' NOT NULL,
	image1 text NOT NULL,
	fal_image1 int(11) unsigned DEFAULT '0' NOT NULL,
	height1 int(11) DEFAULT '0' NOT NULL,
	width1 int(11) DEFAULT '0' NOT NULL,
	image2 text NOT NULL,
	fal_image2 int(11) unsigned DEFAULT '0' NOT NULL,
	height2 int(11) DEFAULT '0' NOT NULL,
	width2 int(11) DEFAULT '0' NOT NULL,
	bordersize int(11) DEFAULT '0' NOT NULL,
	description1 varchar(255) DEFAULT '' NOT NULL,
	fontsize1 int(11) DEFAULT '0' NOT NULL,
	textheight1 int(11) DEFAULT '0' NOT NULL,
	textwidth1 int(11) DEFAULT '0' NOT NULL,
	description2 varchar(255) DEFAULT '' NOT NULL,
	fontsize2 int(11) DEFAULT '0' NOT NULL,
	textheight2 int(11) DEFAULT '0' NOT NULL,
	textwidth2 int(11) DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,
	finaltextactive tinyint(4) unsigned DEFAULT '0' NOT NULL,
	finaltext mediumtext,
	finaltextwidth int(11) DEFAULT '0' NOT NULL,
	finaltextheight int(11) DEFAULT '0' NOT NULL,
	finalpicheight int(11) DEFAULT '0' NOT NULL,
	finalpicwidth int(11) DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	t3_origuid int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_glpairs_domain_model_pairs'
#
CREATE TABLE tx_glpairs_domain_model_pairs (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	name varchar(255) DEFAULT '' NOT NULL,
	type int(11) DEFAULT '0' NOT NULL,
	splitmode tinyint(4) unsigned DEFAULT '0' NOT NULL,
	width int(11) DEFAULT '0' NOT NULL,
	cardheight int(11) DEFAULT '0' NOT NULL,
	cardwidth int(11) DEFAULT '0' NOT NULL,
	bordersize int(11) DEFAULT '0' NOT NULL,
	fontsize int(11) DEFAULT '0' NOT NULL,
	pluspoints int(11) DEFAULT '0' NOT NULL,
	minuspoints int(11) DEFAULT '0' NOT NULL,
	backimage int(11) DEFAULT '0' NOT NULL,
 	turnbackdelay int(11) DEFAULT '0' NOT NULL,	
 	hintdelay int(11) DEFAULT '0' NOT NULL,	
 	turnduration int(11) DEFAULT '0' NOT NULL,	
 	stackduration int(11) DEFAULT '0' NOT NULL,
 	testmode tinyint(4) unsigned DEFAULT '0' NOT NULL,	
 	testmodeturndelay int(11) DEFAULT '100' NOT NULL,	
	finaltextwidth int(11) DEFAULT '0' NOT NULL,
	finaltextheight int(11) DEFAULT '0' NOT NULL,
	finalpicheight int(11) DEFAULT '0' NOT NULL,
	finalpicwidth int(11) DEFAULT '0' NOT NULL,
	maxcards int(11) DEFAULT '0' NOT NULL,
	has_pairs int(11) unsigned DEFAULT '0' NOT NULL,
	
	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	t3_origuid int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_glpairs_pairs_pair_mm'
#
CREATE TABLE tx_glpairs_pairs_pair_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);