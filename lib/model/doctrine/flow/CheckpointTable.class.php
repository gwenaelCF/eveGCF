<?php

/**
 * CheckpointTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class CheckpointTable extends PluginCheckpointTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object CheckpointTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Checkpoint');
    }
}