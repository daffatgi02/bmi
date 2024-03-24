<?php

namespace App\Exports;

use App\Models\Dbulan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;



class DbulanExport implements ShouldAutoSize, WithStyles, FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */

    use Exportable;
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
        ];
    }

    private $posyandu;

    public function __construct($posyandu)
    {
        $this->posyandu = $posyandu;
    }

    public function view(): View
    {
        // Ambil bulan saat ini
        // $currentMonth = now()->format('m');

        $dbulans = Dbulan::where('nama_posyandu', $this->posyandu)
            // ->whereMonth('created_at', $currentMonth)
            ->get();

        return view('bidan.export_bulanan', [
            'dbulans' => $dbulans
        ]);
    }
}
