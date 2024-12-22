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

class MemberExport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize, WithStrictNullComparison, WithColumnFormatting
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
     * @var Member
     */
    public function map($member): array
    {
        return [
            ++$this->rowNumber,
            $member->user->name,
            $member->nim,
            $member->jurusan,
            $member->angkatan,
            $member->ukm->nama_ukm,
            $member->role_member,
            Date::dateTimeToExcel($member->created_at),
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Nama Member',
            'NIM',
            'Jurusan',
            'Angkatan',
            'UKM',
            'Jabatan',
            'Tanggal Masuk',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'H' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }
}