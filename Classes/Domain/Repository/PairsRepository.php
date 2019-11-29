<?php
namespace Loss\Glpairs\Domain\Repository;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Gerald Loß 
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 *
 *
 * @package glpairs
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class PairsRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
	
	/**
	 * Retreive the pairs data from the database by the given name.
	 * 
	 * @param 	int	$i_strPairId 				    ID of the pairs game
	 * @return	\Loss\Glpairs\Domain\Model\Pairs	The pairs game data model.
	 */
    public function getPairByName($i_strPairId) {
		// The query object
		/* @var $l_objQuery  \TYPO3\CMS\Extbase\Persistence\QueryInterface */
		$l_objQuery = null;
		
		// Object with the result of the query with the pairs game
		/* @var $l_objPairs  \TYPO3\CMS\Extbase\Persistence\Generic\QueryResult */
		$l_objQueryPairs = NULL;
		
		// the returning pairs game data model
		/* @var $l_objPairsData \Loss\Glpairs\Domain\Model\Pairs */
		$l_objRetPairsData = NULL;

		/* @var $l_objResult \TYPO3\CMS\Extbase\Persistence\QueryResultInterface */
		$l_objResult = NULL;
		
		$l_objQuery = $this->createQuery();
		// dont take the data only from one single sys-folder
		// we like to get the pairs data from alle pages where pairs extists
		$l_objQuery->getQuerySettings()->setRespectStoragePage(FALSE);
		
		// get only one entry, the entry with the pid of the requested pairs game
		$l_objResult = $l_objQuery->matching($l_objQuery->equals('uid', $i_strPairId))->execute();
		$l_objRetPairsData = $l_objResult->getFirst();
		
		
//		$l_objRetPairsData = $l_objQuery->matching($l_objQuery->equals('uid', $i_strPairId)
//		                                          )->execute()->getFirst();
		
		
/*		$l_objQuery->matching($l_objQuery->equals('uid', $i_strPairId));
 		$l_objQueryPairs = $l_objQuery->execute();
 		$l_objRetPairsData = $l_objQueryPairs->getFirst();
*/

 		// set the parent to the pairs and return it
 		return $this->setParent2Pair($l_objRetPairsData);
	}
	
	/**
	 * Set to all pairs of a pairs game the parent pairs game.
	 * 
	 * @param \Loss\Glpairs\Domain\Model\Pairs $i_objPairsGame Object Storage with the pairs
	 * @return  \Loss\Glpairs\Domain\Model\Pairs Pairs game with the pairs connected to their parent pairs game.
	 */
	private function setParent2Pair($i_objPairsGame) {
		
		// the object storage with pairs
		/* @var $l_objPairStorage \TYPO3\CMS\Extbase\Persistence\ObjectStorage */
		$l_objPairStorage = $this->objectManager->get('TYPO3\CMS\Extbase\Persistence\ObjectStorage');
		
		// a pair of cards
		/* @var $l_objPair  \Loss\Glpairs\Domain\Model\Pair */
		$l_objPair = NULL;
		
		// set the parent for each pair
		foreach ($i_objPairsGame->getHasPairs() as $l_objPair) {
			$l_objPair->setParentPairs($i_objPairsGame);
			$l_objPairStorage->attach($l_objPair);
		}
		
		// set the new object storage with the pairs back to the pairs game
		$i_objPairsGame->setHasPairs($l_objPairStorage);
		// return it
		return $i_objPairsGame; 
	}
}
?>