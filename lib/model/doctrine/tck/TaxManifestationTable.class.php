<?php

/**
 * TaxManifestationTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class TaxManifestationTable extends PluginTaxManifestationTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object TaxManifestationTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('TaxManifestation');
    }
}