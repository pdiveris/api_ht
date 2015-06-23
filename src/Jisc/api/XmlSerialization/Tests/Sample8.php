<?php
/**
 *  Unit test 8
 *
 */
namespace Jisc\api\XmlSerialization\Tests;

/**
 * Class Sample8
 * @package Jisc\api\XmlSerialization\Tests
 */
class Sample8
{

    /**
     * element
     * @XmlElement
     * @XmlElement(bool, element-bool)
     */
    public $element = "xyz";

    /**
     * attr
     * @XmlAttribute(int)
     */
    public $attr = 5;

}
