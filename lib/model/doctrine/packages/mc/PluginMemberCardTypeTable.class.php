<?php

/**
 * PluginMemberCardTypeTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class PluginMemberCardTypeTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object PluginMemberCardTypeTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PluginMemberCardType');
    }

  // Optimization for domain restrictions
  public function getRelation($alias, $recursive = true)
  {
    $rel = parent::getRelation($alias, $recursive);
    try { $rel = liDoctrineRelationAssociationUsers::create($rel); }
    catch ( liEvenementException $e ) { }
    return $rel;
  }
}
