.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../../Includes.txt


.. _ts-plugin-tx-glpairs:

plugin.tx_glpairs
=================

.. only:: html

	.. contents::
		:local:
		:depth: 1

Properties
^^^^^^^^^^

.. container:: ts-properties

    ===================================================== ===================================================================== ======================= ==================
    Property                                              Data type                                                             :ref:`t3tsref:stdwrap`  Default
    ===================================================== ===================================================================== ======================= ==================
    view.templateRootPath_                                :ref:`t3tsref:data-type-string`                                       yes                     EXT:glpairs/Resources/Private/Templates/
    view.partialRootPath_                                 :ref:`t3tsref:data-type-string`                                       yes                     EXT:glpairs/Resources/Private/Partials/
    view.layoutRootPath_                                  :ref:`t3tsref:data-type-string`                                       yes                     EXT:glpairs/Resources/Private/Layouts/
    libraries.inlcudeJQuery_                              :ref:`t3tsref:data-type-boolean`                                      yes                     1
    libraries.includeBootstrapJs_                         :ref:`t3tsref:data-type-boolean`                                      yes                     1
    libraries.includeBootstrapCss_                        :ref:`t3tsref:data-type-boolean`                                      yes                     1
    cssFile_                                              :ref:`t3tsref:data-type-string`                                       yes                     EXT:glpairs/Resources/Public/css/glpairs.css
    ===================================================== ===================================================================== ======================= ==================

	
Property details
^^^^^^^^^^^^^^^^

.. only:: html

	.. contents::
		:local:
		:depth: 1


.. _ts-plugin-tx-glpairs-view.templateRootPath:

view.templateRootPath
"""""""""""""""""""""

:typoscript:`plugin.tx_glpairs.view.templateRootPath =` :ref:`t3tsref:data-type-string`

Path to the fluid templates. If you want to change them. Copy first the original templates in your own directory
and then point with this parameter to this new directory.


.. _ts-plugin-tx-glpairs-view.partialRootPath:

view.partialRootPath
""""""""""""""""""""

:typoscript:`plugin.tx_glpairs.view.partialRootPath =` :ref:`t3tsref:data-type-string`

Path to the fluid partials. If you want to change them. Copy first the original partials in your own directory
and then point with this parameter to this new directory.


.. _ts-plugin-tx-glpairs-view.layoutRootPath:

view.layoutRootPath
"""""""""""""""""""

:typoscript:`plugin.tx_glpairs.view.layoutRootPath =` :ref:`t3tsref:data-type-string`

Path to the fluid templates. If you want to change them. Copy first the original tamplates in your own directory
and then point with this parameter to this new directory.


.. _ts-plugin-tx-glpairs-libraries.inlcudeJQuery:

libraries.inlcudeJQuery
"""""""""""""""""""""""

:typoscript:`plugin.tx_glpairs.libraries.inlcudeJQuery =` :ref:`t3tsref:data-type-boolean`

Activate this flag, if you want to inlcude the jQuery 3.6 library shipped with this extension. If you have your own 
jQuery library included in your homepage, you can deactivate this flag. Keep in mind, that you use always jQuery 3.6.
Pobably it works with other versins, but it is only tested with jQery 3.6.


.. _ts-plugin-tx-glpairs-libraries.includeBootstrapJs:


libraries.includeBootstrapJs
""""""""""""""""""""""""""""

.. _bootstrap_lib_config:

:typoscript:`plugin.tx_glpairs.libraries.includeBootstrapJs =` :ref:`t3tsref:data-type-boolean`

Activate this flag, if you want to inlcude the Bootstrap 5.1 library shipped with this extension. If you have your own 
Bootstrap library included in your homepage, you can deactivate this flag. Keep in mind, that you should use Bootstrap 5.1. 
with the bundle, so you have the modal component included. It could work with other versons, but is only tested with 
version 5.1. Keep an eye on the final information. The modal dialog is made with Bootstrap.


.. _ts-plugin-tx-glpairs-libraries.includeBootstrapCss:

libraries.includeBootstrapCss
"""""""""""""""""""""""""""""

:typoscript:`plugin.tx_glpairs.libraries.includeBootstrapCss =` :ref:`t3tsref:data-type-boolean`

Activate this flag, if you want to inlcude the Bootstrap CSS content file shipped with this extension. If you have your own 
Bootstrap library with CSS file included in your homepage, you can deactivate this flag. Keep in mind, that you use always 
Bootstrap 5.1. Other versions may not work.


.. _ts-plugin-tx-glpairs-cssFile:

cssFile
"""""""

:typoscript:`plugin.tx_glpairs.cssFile =` :ref:`t3tsref:data-type-string`

Path to the CSS content file for glpairs. If you want to edit this file. Copy this file in your own directory and
change this parameter to this directory. Then you can change the file in this new directory.


