<?php

/**
 * PluginRawAccounting
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    symfony
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class PluginRawAccounting extends BaseRawAccounting
{
  public function getIndexesPrefix()
  {
    return strtolower(get_class($this));
  }
}
