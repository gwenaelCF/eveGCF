<?php

/**
 * CacheTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class CacheTable extends PluginCacheTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object CacheTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Cache');
    }
}