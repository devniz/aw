<?php
//This function set the delimiter of the CSV file, in case of it's different to a semicolon.

class Util
{
    const _NUM_ = 10;

    public function __construct()
    {
        $this->delimiter = NULL;
    }

    /**
     * @param $csv
     * @return null|string
     */
    public function getCsvDelimiter($csv)
    {
        $content = fgets($csv);
        $c = $content[self::_NUM_];

        switch($c)
        {
            case ';':
                $delimiter = ';';
            break;

            case ',':
                $delimiter = ',';
            break;

            case '|':
                $delimiter = '|';
            break;

            case '*':
                $delimiter = '*';

            default:
                $delimiter = NULL;
            break;
        }
        return $delimiter;
    }

    /**
     * @param $delimiter
     */
    public function setCsvDelimiter($delimiter)
    {
        $this->delimiter = $delimiter;
    }
};