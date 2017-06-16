<?php

/**
 * BoughtProductTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class BoughtProductTable extends PluginBoughtProductTable
{
  /**
   * Returns an instance of this class.
   *
   * @return object BoughtProductTable
   */
  public static function getInstance()
  {
    return Doctrine_Core::getTable('BoughtProduct');
  }

  public function createQueryOrdered($alias = 'bp')
  {
    return $this->createQuery($alias)
      ->andWhere("$alias.integrated_at IS NULL")
      ->leftJoin("$alias.Transaction {$alias}t")
      ->leftJoin("{$alias}t.Order {$alias}o")
      ->andWhere("{$alias}o.id IS NOT NULL")
      ->andWhere("$alias.integrated_at IS NULL")
      ->andWhere("$alias.destocked = ?", false)
    ;
  }
}