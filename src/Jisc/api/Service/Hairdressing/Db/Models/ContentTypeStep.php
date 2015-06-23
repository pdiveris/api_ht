<?php
/**
 * HT API ContentTypeStep
 *
 * Drupal 6.x ContentTypeStep
 *
 * This model deals with the Drupal 6.x Custom Step type (for Guides)
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
 * Class ContentTypeStep
 *
 * Steps, probably not required
 *
 * IMPORTANT
 *
 * Extra fields table as defined Drupal 6.x
 * @author Petros Diveris
 *
 */
class ContentTypeStep extends \Jisc\api\Service\Hairdressing\Db\JiscDbModel
{
    /**
     * The database table used by the model.
     * @var string
     */
    protected static $table = 'content_type_step';

    /**
     * The PK
     *
     * @var string $primaryKey
     */
    protected static $primaryKey = 'vid';

    /**
     * Version id
     * @var int $vid
     */
    public $vid = 0;

    /**
     * Node id
     * @var int $nid
     */
    public $nid = 0;

    /**
     * Step value
     * @var int $field_step_value
     */
    public $field_step_value = 0;

    /**
     * field_stepimage_fid
     * @var int $field_stepimage_fid
     */
    public $field_stepimage_fid = 0;

    /**
     * field_stepimage_list
     * @var int $field_stepimage_list
     */
    public $field_stepimage_list = 0;

    /**
     * field_stepimage_data
     * @var string $field_stepimage_data
     */
    public $field_stepimage_data = '';

    /**
     * Constructor. Check base class for use of attributes.
     * @see JiscDbModel
     *
     * @param array $attributes
     */

    /**
     * Constructor. Check base class
     * @param array $attributes
     */
    public function __construct($attributes = array())
    {
        parent::__construct($attributes);
    }

}
