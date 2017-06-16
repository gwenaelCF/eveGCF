<?php

/**
 * ProfessionalTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ProfessionalTable extends PluginProfessionalTable
{
  public function createQuery($alias = 'p')
   {
    $o  = $alias != 'o'  ? 'o'  : 'o1';
    $c  = $alias != 'c'  ? 'c'  : 'c1';
    $t  = $alias != 't'  ? 't'  : 't1';
    $gp = $alias != 'gp' ? 'gp' : 'gp';
    $gpu= $alias != 'gpu'? 'gpu': 'gpu';
    
    $query = parent::createQuery($alias)
        ->leftJoin("$alias.Organism $o")
        ->leftJoin("$alias.ProfessionalType $t")
        ->leftJoin("$alias.Contact $c")
        ->orderBy("$c.name, $c.firstname, $o.name, $alias.name, $t.name");

    if ( sfContext::hasInstance() && ($sf_user = sfContext::getInstance()->getUser()) && $sf_user->getId() )
    if ( in_array(sfConfig::get('project_internals_pr_scope', 'none'), array('permissive', 'restrictive')) )
    {
      $query
        ->leftJoin("$alias.Groups $gp")
        ->leftJoin("$gp.User $gpu")
      ;
      switch ( sfConfig::get('project_internals_pr_scope', 'none') ) {
      case 'restrictive':
        $query->andWhere("$gpu.id = ?", $sf_user->getId());
        break;
      case 'permissive':
        $query->andWhere("$gpu.id = ? OR $gp.id IS NULL", array($sf_user->getId(), $sf_user->getId()));
        break;
      }
    }

    return $query;
  }
  
  public function doSelectOnlyGrp(Doctrine_Query $q)
  {
    $a = $q->getRootAlias();
    $o = $a != 'o' ? 'o' : 'o1';
    $c = $a != 'c' ? 'c' : 'c1';
    $t = $a != 't' ? 't' : 't1';
    $gce = $a != 'gce' ? 'gce' : 'gce1';
    
    $q->leftJoin("$a.ContactEntries $gce")
      ->andWhere('gce.id IS NOT NULL')
      ->select("$a.*, $t.*, $c.*, $gce.*");
    
    // limitating to user's MetaEvents
    if ( !sfContext::hasInstance() )
      return $q;
    
    $prepare = array();
    foreach ( array_keys(sfContext::getInstance()->getUser()->getMetaEventsCredentials()) as $id )
      $prepare[] = '?';
    
    return $q
      ->leftJoin('gce.Transaction gt')
      ->leftJoin('gt.Translinked gtt')
      ->andWhere('gtt.id IS NULL')
      ->leftJoin('gce.Entry ge')
      ->leftJoin('ge.Event gevent')
      ->andWhereIn('gevent.meta_event_id', array_keys(sfContext::getInstance()->getUser()->getMetaEventsCredentials()))
      ->leftJoin('ge.ManifestationEntries gme')
      ->leftJoin('gme.Manifestation m')
      ->leftJoin('m.Event e WITH e.meta_event_id IN ('.implode(',', array_keys(sfContext::getInstance()->getUser()->getMetaEventsCredentials())).')')
      ->leftJoin("$a.Groups g")
      ->leftJoin('g.Picture pic')
      ->leftJoin('gce.Entries gee ON gee.accepted = TRUE AND gee.contact_entry_id = gce.id')
      ->leftJoin('gee.ManifestationEntry gmee')
      ->leftJoin('gmee.Manifestation eem')
      ->leftJoin('g.User u')
      /* has to be reported into the action to avoid counting errors
      ->select("$a.*, c.*, o.*, g.id, g.name, g.display_everywhere, g.sf_guard_user_id, pic.id, pic.name, pic.content")
      ->addSelect('count(DISTINCT eem.event_id) as nb_events, count(DISTINCT eem.id) as nb_manifestations')
      ->groupBy("$a.id, c.id, c.name, c.firstname, o.id, o.name, t.name, g.id, g.name, u.id, pic.id, pic.name, pic.content, g.display_everywhere, g.sf_guard_user_id")
      */
    ;
  }

    /**
     * Returns an instance of this class.
     *
     * @return object ProfessionalTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Professional');
    }
}