<?php

/**
 * FamilialSituationTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class FamilialSituationTable extends PluginFamilialSituationTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object FamilialSituationTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('FamilialSituation');
    }
}