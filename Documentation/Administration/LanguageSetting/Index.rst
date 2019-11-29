.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../../Includes.txt


.. _administration-language-setting:

Language setting
----------------

The language labels of the frontend are still in the file
*typo3conf\\ext\\glpairs\\Resources\\Private\\Language\\locallang.xml*. All other language files are already
stored in the newer XLIFF format. Only in this old fashioned format you are able to overrule the frontend
labels for your own installation in typoscript.

.. tip::
  Don't edit the file *locallang.xml* directly for any changes. After every update of this extension,
  this file will be overwritten.

If you like to change the language setting permanently you have to do this with typoscript in your
template configuration. All available labels you can find in the file locallang.xml.

.. figure:: ../../Images/image-42.jpg
   :alt: Setup of language settings with typoscript
