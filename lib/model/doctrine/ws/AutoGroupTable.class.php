<?php

/**
 * AutoGroupTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class AutoGroupTable extends PluginAutoGroupTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object AutoGroupTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('AutoGroup');
    }
}