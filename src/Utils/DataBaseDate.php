<?php

namespace App\Utils;

class DataBaseDate
{
    public static function getCurrentDate(): string
    {
        return date("Y-m-d H:i:s");
    }
}

?>