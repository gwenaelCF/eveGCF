<?php

/**
 * PluginAuthentication
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    e-venement
 * @subpackage model
 * @author     Baptiste SIMON <baptiste.simon AT e-glop.net>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class PluginAuthentication extends BaseAuthentication
{
  public function preInsert($event)
  {
    parent::preInsert($event);
    try {
      $this->server = @exec('/bin/hostname');
    } catch ( Exception $e ) {
      error_log('Authentication: associating the `hostname` with the current connexion');
    }
  }
}