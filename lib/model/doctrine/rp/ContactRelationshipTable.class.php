<?php

/**
 * ContactRelationshipTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ContactRelationshipTable extends PluginContactRelationshipTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object ContactRelationshipTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ContactRelationship');
    }
}