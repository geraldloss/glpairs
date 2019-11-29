.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../../Includes.txt


.. _configuration-the-javascript-logic:

The Javascript logic
--------------------

In the whole logic of the javascript frontend is located in the object GlPairs. We are using
additional libraries like jQuery and Bootstrap. In the beginning it is retrieving all necessary data
with an ajax call to the AjaxDispatcher.

::

    var strGetParams = jQuery.param({    controllerName : 'Pairs',
                            actionName      : 'ajaxBasicData',
                            actionArguments : { i_strUniquId :     m_strPairsId }
                        });

It is calling the ajaxBasicData action in the Pairs action controller
*PairsController->ajaxBasicDataAction()*.

After it has all data it controls all the animations of the cards and the points of the game.
