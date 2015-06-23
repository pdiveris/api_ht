<?php
/**
 * Uni test 10
 */
namespace Jisc\api\XmlSerialization\Tests;

/**
 * Class Sample10_Granny
 * @package Jisc\api\XmlSerialization\Tests
 */
class Sample10_Granny
{

    /**
     * private
     * @XmlElement
     */
    private $private;

    /**
     * protected
     * @XmlElement
     */
    protected $protected;

    /**
     * public
     * @XmlElement
     */
    public $public;

    /**
     * setPrivate
     * @param $private
     */
    public function setPrivate($private)
    {
        $this->private = $private;
    }

    /**
     * setProtected
     * @param $protected
     */
    public function setProtected($protected)
    {
        $this->protected = $protected;
    }

    /**
     * setPublic
     * @param $public
     */
    public function setPublic($public)
    {
        $this->public = $public;
    }


}

/**
 * Class Sample10_Parent
 * @package Jisc\api\XmlSerialization\Tests
 */
class Sample10_Parent extends Sample10_Granny
{

}

/**
 * Class Sample10
 * @package Jisc\api\XmlSerialization\Tests
 */
class Sample10 extends Sample10_Parent
{

}
