<?php
/**
 * HT API PrevNextNode
 *
 * Drupal 6.x NodeType
 *
 * Wizard kind of navigation from node to node (back and forth)
 *
 * @package      API
 * @subpackage   Service
 * @category     API
 * @version      1.0.0
 * @author       Petros Diveris <petros.diveris@jisc.ac.uk>
 *
 */
namespace Jisc\api\Service\Hairdressing\Db\Models;

/**
 * Class PrevNextNode
 * This models the previous_next_node wizzardy type of relation table as defined in Drupal 6.x
 * @version      1.0.0
 * @author Petros Diveris
 *
 */
class PrevNextNode extends \Jisc\api\Service\Hairdressing\Db\JiscDbModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected static $table = 'prev_next_node';

    /**
     * The PK nid (node id)
     *
     * @var string $primaryKey
     */
    protected static $primaryKey = 'nid';

    /**
     * Previous Node id
     * @var int $prev_nid
     */
    public $prev_nid = 0;

    /**
     * next Node id
     * @var int $next_nid ;
     */
    public $next_nid = 0;

    /**
     * Time it changed
     * @var int DATETIME $changed
     */
    public $changed = 0;

    /**
     * Constructor. Check base class for use of attributes.
     * @see JiscDbModel
     * @param array $attributes
     */
    public function __construct($attributes = array())
    {
        parent::__construct($attributes);
    }

}
