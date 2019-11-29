.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../../Includes.txt


.. _administration-installation:

Installation
------------

For the installation just go into the Extension Manager download the extensions glpairs and install
it.

In the following we need acces to the css and javascript files of the extensions. If your extension
folder is not accessible by default then provide access at least to the following folder.

::

    typo3conf/ext/glpairs/Resources/Public/

With apache put the following lines in your Virtual Host declaration.

::

    <Location typo3conf/ext/glpairs/Resources/Public/>
    allow from all
    </Location>

You need to check in your install tool or in your localconf.php or your AdditionalConfiguration.php
(Typo3 6.x) the parameter [SYS][setDBinit]. There you need the following configuration.

::

    SET NAMES utf8 COLLATE utf8_unicode_ci;
    SET SESSION character_set_server=utf8;

**Attention!** Don't use this parameter in your [SYS][setDBinit]

::

    SET CHARACTER SET utf8;

This can destroy your session especially if you use umlauts in your pairs game.

For further informations see http://wiki.typo3.org/UTF-8_support.
