<?php

/**
 * PluginYOB
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    e-venement
 * @subpackage model
 * @author     Baptiste SIMON <baptiste.simon AT e-glop.net>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class PluginYOB extends BaseYOB
{
  public function save(Doctrine_Connection $con = NULL)
  {
    if ( !$this->year && !$this->name || !$this->contact_id )
      return;
    parent::save($con);
  }
}
