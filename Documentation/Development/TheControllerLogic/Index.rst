.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../../Includes.txt


.. _configuration-the-controller-logic:

The Controller logic
--------------------

The main logic for this extension is in the controller class PairsController. With its action
listAction() it builds the whole pairs game and send it to the frontend with the standard extbase
logic.

The database model is one Pair and many Pairs with an 1 to n conjunction. The pairs stores all the
data for the both cards like the image, the individual size or a description. The pair class stores
the parameters for the whole game like the pairs which belongs to the game, the overall size of the
cards and a name.

The Method listAction() retrieves the Pair and the Pairs from the database via the PairsRepository
class. Now it is creating with the template List.html the HTML-Frontend. In this frontend is the
javascript logic included.
