<?php
namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AllUsersExport implements  FromQuery, WithHeadings
{
    public function headings(): array
    {
        // TODO: Implement headings() method.
    }

    public function query()
    {
        // TODO: Implement query() method.
    }
}