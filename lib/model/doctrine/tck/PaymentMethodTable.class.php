<?php

/**
 * PaymentMethodTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class PaymentMethodTable extends PluginPaymentMethodTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object PaymentMethodTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PaymentMethod');
    }
}