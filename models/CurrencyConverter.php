<?php

/**
 * Uses CurrencyWebservice
 *
 */
class CurrencyConverter
{
    const _GBP_CURRENCY_ = 1;
    const _USD_CURRENCY_ = 1.64;
    const _EUR_CURRENCY_ = 1.25;

    /**
     * @param $exchange
     */
    public function __construct($exchange)
    {
        $this->exchange = $exchange;
        $this->currency = NULL;
    }

    /**
     * @param $amount
     * @return float|null
     */
    public function convert($amount)
    {
        $currency = $this->getPriceCurrency();

        switch($currency)
        {
            case 'GBP':
                $total = ($amount / self::_GBP_CURRENCY_);
            break;

            case 'USD':
                $total = ($amount / self::_USD_CURRENCY_);
            break;

            case 'EUR':
                $total = ($amount / self::_EUR_CURRENCY_);
            break;

            default:
                $total = NULL;
            break;
        }
        return $total;
    }

    /**
     * @return null
     */
    public function getPriceCurrency()
    {
        return $this->currency;
    }

    /**
     * @param $currency
     */
    public function setPriceCurrency($currency)
    {
        $this->currency = $currency;
    }
}