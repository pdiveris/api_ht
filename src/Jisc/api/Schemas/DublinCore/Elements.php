<?php
/**
 * Jisc API
 *
 * DublinCore
 *
 * Dublin Core Elements
 *
 * @package Api
 * @category     API
 * @author       Petros Diveris <petros.diveris@jisc.ac.uk>
 *
 * Will eventually become part of the  classification term translation engine
 *
 */

namespace Jisc\api\Schemas\DublinCore;

/**
 * Class Elements
 *
 * @version 1.0
 * @specification 1.1
 * @author Petros Diveris
 * @copyright Jisc, 2015
 *
 * <xs:element name="any" type="SimpleLiteral" abstract="true"/>
 *
 */
class Elements
{
    /**
     * @var $title
     * substitutionGroup="any"
     */
    public $title;

    /**
     * @var $creator
     * substitutionGroup="any"
     */
    public $creator;

    /**
     * @var $subject
     * substitutionGroup="any"
     */
    public $subject;

    /**
     * @var $description
     * substitutionGroup="any"
     */
    public $description;

    /**
     * @var $publisher
     * substitutionGroup="any"
     */
    public $publisher;

    /**
     * @var $contributor
     * substitutionGroup="any"
     */
    public $contributor;

    /**
     * @var $date
     * substitutionGroup="any"
     */
    public $date;

    /**
     * @var $type
     * substitutionGroup="any"
     */
    public $type;

    /**
     * @var $format
     * substitutionGroup="any"
     */
    public $format;

    /**
     * @var $identifier
     * substitutionGroup="any"
     */
    public $identifier;

    /**
     * @var $source
     * substitutionGroup="any"
     */
    public $source;

    /**
     * @var $language
     * substitutionGroup="any"
     */
    public $language;

    /**
     * @var $relation
     * substitutionGroup="any"
     */
    public $relation;

    /**
     * @var $coverage
     * substitutionGroup="any"
     */
    public $coverage;

    /**
     * @var $rights
     * substitutionGroup="any"
     */
    public $rights;


}