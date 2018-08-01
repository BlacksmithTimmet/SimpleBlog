<?php

namespace Pluswerk\Simpleblog\Domain\Repository;

/***
 *
 * This file is part of the "Simple Blog Extension" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018 Frank Berdel
 *
 ***/

/**
 * The repository for Blogs
 */
class BlogRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    public function findSearchWord($search, $words = array('Tick', 'Trick', 'Track')){
        $query = $this->createQuery();
        $query->matching(
            $query->logicalOr(
                $query->logicalAnd(
                    $query->like('title', '%'.$search),
                    $query->equals('description', '')
                ),
                $query->logicalAnd(
                    $query->equals('title', 'Typo3'),
                    $query->like('description', '%ist toll%')
                ),
                $query->in('title', $words)
            )

        );
        return $query->execute();
//        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($result);
    }
}
