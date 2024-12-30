<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class UserExport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize, WithStrictNullComparison, WithColumnFormatting
{
    public $collection;

    protected $rowNumber = 0;

    public function __construct($collection)
    {
        $this->collection = $collection;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->collection;
    }

    /**
     * @var User
     */
    public function map($user): array
    {
        return [
            ++$this->rowNumber,
            $user->name,
            $user->no_telepon,
            $user->jenis_kelamin,
            $user->email,
            Date::dateTimeToExcel($user->created_at),
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Nama User',
            'Nomor Telepon',
            'Jenis Kelamin',
            'Email',
            'Tanggal Dibuat',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'F' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }
}