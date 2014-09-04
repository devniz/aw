<?php
/**
 * Created by PhpStorm.
 * User: Nizar Bousebsi
 * Date: 04/09/2014
 * Time: 10:06
 */

class MerchantTest extends PHPUnit_Framework_Test
{
    public function testCanBeNegated()
    {
        $transaction = new TransactionTable();
        $merchant = new Merchant($transaction);
        $merchantid = 1;
        $data = '../data.csv';

        $merchant->getTransactions();
    }
}