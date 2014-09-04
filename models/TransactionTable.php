<?php
/**
 * Source of transactions, can read data.csv directly for simplicity sake,
 * should behave like a database (read only)
 *
 */
require_once("Util.php");

class TransactionTable
{
    const _READ_MODE_ = 'r'; //Change here the mode to open the CSV file.
    const _ERROR_STRUCTURE_FILE_ = "Your CSV file is malformed!\n";
    const _ERROR_FILE_OPEN_ = "Cannot open: ";

    public function __construct()
    {
        $this->transaction = array(NULL);
        $this->merchantId = NULL;
    }

    /**
     * @param $filename
     * @return array
     */
    public function getCsvFile($filename)
    {
        $content = array();

        if(file_exists($filename))
        {
            $size = filesize($filename);

            if($size != 0)
            {
                $csv = fopen($filename, self::_READ_MODE_);
                $util = new Util();
                $delimiter = $util->getCsvDelimiter($csv);
                $util->setCsvDelimiter($delimiter);

                if($delimiter == NULL)
                {
                    echo(self::_ERROR_STRUCTURE_FILE_);
                    return FALSE;
                }
                else
                {
                    while($data = fgetcsv($csv, $size, $delimiter))
                    {
                        array_push($content, $data);
                    };
                }
            }
        }
        else
        {
            echo(self::_ERROR_FILE_OPEN_ . $filename . "\n");
            return FALSE;
        }
        return $content;
    }

    /**
     * @return mixed
     */
    public function getCsvData()
    {
        return $this->merchants;
    }

    /**
     * @return null
     */
    public function getMerchantId()
    {
        return $this->merchantId;
    }

    /**
     * @param $data
     */
    public function setCsvFile($data)
    {
        $content = array();
        foreach($data as $key)
        {
            array_push($content, $key);
            $this->transaction = $content;
        }
    }

    /**
     * @param $merchantId
     */
    public function setMerchantId($merchantId)
    {
        $this->merchantId = $merchantId;
    }
}