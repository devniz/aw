<?php
/**
 * Created by PhpStorm.
 * User: Nizar Bousebsi
 * Date: 03/09/2014
 * Time: 18:55
 */

class PriceParser
{
    const _GBP_SYMBOL_ = 'GBP';
    const _USD_SYMBOL_ = 'USD';
    const _EUR_SYMBOL_ = 'EUR';

    /**
     * @param $prices
     * @return array
     */
    public function getPriceFromArray($prices)
    {
        if($prices != NULL)
        {
            $chunk = array_slice($prices, 2);
            $price = implode($chunk);
        }
        return $price;
    }

    /**
     * @param $price
     * @return mixed
     */
    public function getPriceWithoutCurrency($price)
    {
        if(strstr($price, '£'))
        {
            $value = str_replace('£', '', $price);
        }

        else if(strstr($price, '$'))
        {
            $value = str_replace('$', '', $price);
        }

        else if(strstr($price, '€'))
        {
            $value = str_replace('€', '', $price);

        }
        return($value);
    }

    /**
     * @param $price
     * @return string
     */
    public function getPriceCurrency($price)
    {
        if($price != NULL)
        {
            if(strstr($price, '£'))
            {
                return self::_GBP_SYMBOL_;
            }

            else if (strstr($price, '$'))
            {
                return self::_USD_SYMBOL_;
            }

            else if(strstr($price, '€'))
            {
                return self::_EUR_SYMBOL_;
            }
        }
    }
};