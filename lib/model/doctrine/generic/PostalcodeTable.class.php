<?php

/**
 * PostalcodeTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class PostalcodeTable extends PluginPostalcodeTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object PostalcodeTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Postalcode');
    }
}