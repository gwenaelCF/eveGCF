<?php

/**
 * AuthenticationTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class AuthenticationTable extends PluginAuthenticationTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object AuthenticationTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Authentication');
    }
}