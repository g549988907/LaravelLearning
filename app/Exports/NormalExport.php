<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\School;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class NormalExport implements FromArray, ShouldAutoSize
{
    private $array;

    public function __construct($array)
    {
        $this->array = $array;
    }

    public function array(): array
    {
        return $this->array;
    }

}
