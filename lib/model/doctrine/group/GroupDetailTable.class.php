<?php

/**
 * GroupDetailTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class GroupDetailTable extends PluginGroupDetailTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object GroupDetailTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('GroupDetail');
    }
}