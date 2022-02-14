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

If you are using composer you can install the extension with the following command.

::

    composer require geraldloss/glpairs

In the following we need acces to the css and javascript files of the extensions. If your extension
folder is not accessible by default then provide access at least to the following folder.

::

    typo3conf/ext/glpairs/Resources/Public/

With apache put the following lines in your Virtual Host declaration.

::

    <Location typo3conf/ext/glpairs/Resources/Public/>
		Require all granted
    </Location>

