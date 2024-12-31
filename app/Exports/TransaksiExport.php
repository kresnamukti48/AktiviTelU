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

class TransaksiExport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize, WithStrictNullComparison
{
    public $collection;

    protected $rowNumber = 0;
    protected $totalHargaSum = 0;
    protected $sumAdded = false;

    public function __construct($collection)
    {
        $this->collection = $collection;
        $this->totalHargaSum = $this->calculateTotalHargaSum();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->collection;
    }

    /**
     * @var Ticket
     */
    public function map($transaksi): array
    {
        $row = [
            ++$this->rowNumber,
            $transaksi->user->name,
            $transaksi->tiket->event->nama_event,
            $transaksi->jumlah_tiket,
            $transaksi->total_harga,
            $transaksi->status,
            $transaksi->tanggal_checkout,
        ];

        if (!$this->sumAdded) {
            $row[] = $this->totalHargaSum;
            $this->sumAdded = true;
        } else {
            $row[] = '';
        }

        return $row;
    }

    public function headings(): array
    {
        return [
            '#',
            'Nama User',
            'Nama Event',
            'Jumlah Ticket',
            'Total Harga',
            'Status',
            'Tanggal Checkout',
            'Total Harga Sum',
        ];
    }


    protected function calculateTotalHargaSum()
    {
        return $this->collection->sum('total_harga');
    }
}