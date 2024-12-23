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

class KegiatanUkmExport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize, WithStrictNullComparison, WithColumnFormatting
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
     * @var KegiatanUkm
     */
    public function map($kegiatan): array
    {
        return [
            ++$this->rowNumber,
            $kegiatan->nama_kegiatan,
            $kegiatan->tanggal_kegiatan,
            $kegiatan->lokasi_kegiatan,
            $kegiatan->deskripsi_kegiatan,
            $kegiatan->ukm->nama_ukm,
            Date::dateTimeToExcel($kegiatan->created_at),
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Nama Kegiatan',
            'Tanggal Kegiatan',
            'Lokasi Kegiatan',
            'Deskripsi Kegiatan',
            'Nama UKM',
            'Tanggal Dibuat',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'G' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }
}