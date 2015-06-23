<?php
/**
 * Jorum API Context
 *
 * DataCollection
 *
 * Holds a list of Items
 *
 * @package      HT_Api
 * @subpackage   Service
 * @category     API
 * @version      0.9.0
 * @author       Petros Diveris <petros.diveris@jisc.ac.uk>
 */
namespace Jisc\api\Service;

/**
 *
 * Created by PhpStorm.
 * User: pedro
 * Date: 25/04/2014
 * Time: 14:59
 *
 */
class DataCollection extends \Jisc\api\Collection
{
  /**
   * Context object
   * @var \Jisc\api\Service\Context
   */
  protected $context;

  /**
   * Items array
   * @var array
   */
  protected $items = array();

  /**
   * Constructor
   *
   * @param array $items
   * @param mixed $context
   */
  public function __construct(array $items = array(), $context = null)
  {
    parent::__construct($items);
    /**
     * $context can be either an array or a \Jisc\api\Service\Context
     * If it's an array then it needs converting....
     */
    if (is_array($context)) {
      $context = new \Jisc\api\Service\Context($context);
    }
    $this->setContext($context);
  }

  /**
   * Get context
   * @return \Jisc\api\Service\Context
   */
  public function getContext()
  {
    return $this->context;
  }

  /**
   * Set context
   * @param \Jisc\api\Service\Context $context
   * @return \Jisc\api\Service\Context
   */
  public function setContext(\Jisc\api\Service\Context $context)
  {
    return $this->context = $context;
  }

  /**
   * Set items
   * @param array $items
   */
  public function setItems($items = array())
  {
    $this->items = $items;
  }

  /**
   * Get items
   * @return array
   */
  public function getItems()
  {
    return $this->items;
  }

  /**
   * findByIdOrHandle
   * @param string $id
   * @return \Jisc\api\Service\Collection | \Jisc\api\Service\Hairdressing\Item
   */
  public function findByIdOrHandle($id = '')
  {
    foreach ($this->items as $i => $object) {
      if ($object->getId() == $id || $object->getHandle() == $id) {
        return $object;
      }
    }
  }


}