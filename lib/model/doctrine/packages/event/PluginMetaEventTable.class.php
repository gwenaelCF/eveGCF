<?php

/**
 * PluginMetaEventTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class PluginMetaEventTable extends Doctrine_Table
{
    public function createQuery($alias = 'me')
    {
      $q = parent::createQuery($alias);

      if ( !sfContext::hasInstance() || !sfContext::getInstance()->getActionName() )
        $q->leftJoin("$alias.Translation translation");
      elseif (!( sfContext::hasInstance()
         && sfContext::getInstance()->getActionName()
         && in_array(sfContext::getInstance()->getActionName(), array('edit', 'update'))
      ))
      {
        $culture = sfContext::hasInstance() ? sfContext::getInstance()->getUser()->getCulture() : 'fr';
        $q->leftJoin("$alias.Translation translation WITH translation.lang = '$culture'");
      }
      else
        $q->leftJoin("$alias.Translation translation");

      return $q;
    }

    /**
     * Returns an instance of this class.
     *
     * @return object PluginMetaEventTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PluginMetaEvent');
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