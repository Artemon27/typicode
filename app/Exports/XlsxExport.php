<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;

class XlsxExport implements FromArray
{
    private $body;

    public function __construct($array)
    {
        $this->body = $array;

    }
    public function array(): array
    {
        return $this->body;
    }
}
