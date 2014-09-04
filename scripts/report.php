<?php
include_once("../models/TransactionTable.php");
include_once("../models/Merchant.php");
include_once("../models/CurrencyWebservice.php");
include_once("../models/CurrencyConverter.php");
include_once("../models/PriceParser.php");

const _CURRENCY_ = "GBP"; //You can switch the exchange currency here. {GBP/USD/EUR}.
const _REPORT_ = "+Transaction number ";
const _TOTAL_ = "->The merchant iD number ";
const _ERROR_EMPTY_FILE_ = "ERROR: File should not be empty!\n";
CONST _CMD_USAGE_ = "+USAGE: php report.php data.csv merchantiD.\n";

//TODO print formatted report

//Retrieve the args command line.
if(count($argv) != 3)
{
    echo(_CMD_USAGE_);
    return FALSE;
}
else
{
    $pathToCSV = $argv[1];
    $merchantID = $argv[2];

    $transaction = new TransactionTable();
    $data = $transaction->getCsvFile($pathToCSV);

    if($data != FALSE)
    {
        $transaction->setCsvFile($data);
        $content = $transaction->getCsvData();
        $transaction->setMerchantId($merchantID);

        $merchant = new Merchant($transaction);
        $report = $merchant->getTransactions();

        $exchange = new CurrencyWebservice();
        $rate = $exchange->getExchangeRate(_CURRENCY_);
        $exchange->setExchangeRate($rate);
        $converter = new CurrencyConverter($exchange);
        $parser = new PriceParser();

        foreach($report as $key => $input)
        {
            $price = $parser->getPriceFromArray($input);
            $currency = $parser->getPriceCurrency($price);
            $converter->setPriceCurrency($currency);
            $cleanprice = $parser->getPriceWithoutCurrency($price);
            $report = $converter->convert($cleanprice);

            if($report != NULL)
            {
                echo _REPORT_  . $key  . ': ' . $report . ' GBP' . "\n";
            }
        }
        echo _TOTAL_ . $merchantID . ' have a total transaction of: ' . $key .  "\n";
    }
}