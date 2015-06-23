<?php
/**
 * HT API NodeRevision
 *
 * Drupal 6.x NodeRevision
 *
 * Revisions (and log)
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
 * Class NodeRevision
 *
 * This models the node_revisions table as defined in Drupal 6.x
 * @author Petros Diveris
 *
 */
class NodeRevision extends  \Jisc\api\Service\Hairdressing\Db\JiscDbModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected static $table = 'node_revisions';

    /**
     * The PK is not id but vid
     *
     * @var string $primaryKey
     */
    protected static $primaryKey = 'vid';

    /**
     * Relation to node.nid
     *
     * @public int $nid;
     */
    public $nid = 0;

    /**
     * Relaiton to users.uid
     * @var int $uid
     */
    public $uid = 0;

    /**
     * Title
     *
     * @var string $title
     */
    public $title = '';

    /**
     * Body
     *
     * @var string $body
     */
    public $body = '';

    /**
     * Teaser
     *
     * @var string $teaser = '';
     */
    public $teaser = '';

    /**
     * Log entry (e.g. "kenny replaced <em>images/slides</em> with <em>/drupal/images/slides</em> via Scanner Search and Replace module.")
     *
     * @var string $log
     */
    public $log = '';

    /**
     * Datetime timestamp
     *
     * @var int $timestamp
     */
    public $timestamp = 0;

    /**
     * Int link to filter_formats
     * 1=>Filtered HTML, 2=>Full HTML, 3=>PHP Code etc/
     *
     * @var string $format
     */
    public $format = '';

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
