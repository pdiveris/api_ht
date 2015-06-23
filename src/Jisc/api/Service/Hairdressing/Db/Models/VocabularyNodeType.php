<?php
/**
 * HT API Vocabulary
 *
 * Drupal 6.x Vocabulary
 *
 * A Taxonomy-related module.
 * The basic "out of the box" functionality is to provide a listing of vocabulary's taxonomy terms at taxonomy/vid.
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
 * Class VocabularyNodeType
 * Look up table
 * VocabularyNodeType table as defined in Drupal 6.x
 * @author Petros Diveris
 *
 */
class VocabularyNodeType extends \Jisc\api\Service\Hairdressing\Db\JiscDbModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected static $table = 'vocabulary_node_types';

    /**
     * The PK is not id but tid
     *
     * @var string $primaryKey
     */
    protected static $primaryKey = 'vid';

    /**
     * Version id
     *
     * @var int $vid
     */
    public $vid = 0;

    /**
     * Type (e.g. step)
     *
     * @var string $type
     */
    public $type = '';

    /**
     * Constructor. Check base class for use of attributes.
     * @see JiscDbModel
     *
     * @param array $attributes
     */
    public function __construct($attributes = array())
    {
        parent::__construct($attributes);
    }

}
