<?php

class Merchant
{
    /**
     * @param $transaction
     */
    public function __construct($transaction)
    {
        $this->transaction = $transaction;
        $this->result = array(NULL);
    }

    /**
     * @return array
     */
    public function getTransactions()
    {
        $merchantId = $this->transaction->merchantId;
        $transaction = $this->transaction->transaction;

        //Check if it's a right merchantId.
        if(!is_numeric($merchantId))
        {
            echo 'Wrong merchant iD!';
        }
        else
        {
            foreach($transaction as $transaction)
            {
               if(in_array($merchantId, $transaction))
               {
                   array_push($this->result, $transaction);
               }
            }
        }
        return $this->result;
    }
}