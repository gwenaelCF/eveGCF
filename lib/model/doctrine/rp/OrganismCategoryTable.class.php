<?php

/**
 * OrganismCategoryTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class OrganismCategoryTable extends PluginOrganismCategoryTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object OrganismCategoryTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('OrganismCategory');
    }
}