<?php

/**
 * ProductLinkTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ProductLinkTable extends PluginProductLinkTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object ProductLinkTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ProductLink');
    }
}