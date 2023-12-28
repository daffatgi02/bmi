<?php

namespace App\Exports;

use App\Models\Dbulan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Cell\DataType;



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

    public function view(): View
    {
        return view('bidan.export_bulanan', [
            'dbulans' => Dbulan::all()
        ]);
    }


}
