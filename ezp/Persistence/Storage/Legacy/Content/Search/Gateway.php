<?php
/**
 * File containing the Content Search Gateway class
 *
 * @copyright Copyright (C) 1999-2012 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace ezp\Persistence\Storage\Legacy\Content\Search;

use ezp\Persistence\Content,
    ezp\Persistence\Content\Query\Criterion;

/**
 * The Content Search Gateway provides the implementation for one database to
 * retrieve the desired content objects.
 */
abstract class Gateway
{
    /**
     * Returns a list of object satisfying the $criterion.
     *
     * @param Criterion $criterion
     * @param int $offset
     * @param int|null $limit
     * @param \ezp\Persistence\Content\Query\SortClause[] $sort
     * @param string[] $translations
     * @return mixed[][]
     */
    abstract public function find( Criterion $criterion, $offset = 0, $limit = null, array $sort = null, array $translations = null );
}

