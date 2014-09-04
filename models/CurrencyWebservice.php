<?php

/**
 * Dummy web service returning random exchange rates
 *
 */
class CurrencyWebservice
{
    const _GBP_CURRENCY_ = 1;
    const _USD_CURRENCY_ = 1.64;
    const _EUR_CURRENCY_ = 1.25;

    public function __construct()
    {
        $this->rate = NULL;
    }

    /**
     * @todo return random value here for basic currencies like GBP USD EUR (simulates real API)
     *
     */
    public function getExchangeRate($currency)
    {
        switch($currency)
        {
            case 'GBP':
                return self::_GBP_CURRENCY_;
                break;

            case 'USD':
                return self::_USD_CURRENCY_;
                break;

            case 'EUR':
                return self::_EUR_CURRENCY_;
                break;

            default:
                echo 'Unknow currency!' . "\n";
                break;
        }
    }

    /**
     * @param $rate
     */
    public function setExchangeRate($rate)
    {
        $this->rate = $rate;
    }
}