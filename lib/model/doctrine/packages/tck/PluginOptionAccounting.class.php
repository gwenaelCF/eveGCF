<?php

/**
 * PluginOptionAccounting
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    e-venement
 * @subpackage model
 * @author     Baptiste SIMON <baptiste.simon AT e-glop.net>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class PluginOptionAccounting extends BaseOptionAccounting
{
  public function getIndexesPrefix()
  {
    return strtolower(get_class($this));
  }
}
