<?php

namespace App\Http\Controllers;

use App\Charts\DetailChart;
use App\Models\Danak;
use App\Models\Dbulan;

class ExportpdfController extends Controller
{
    public function exportpdf(string $danaks_id, DetailChart $chart)
    {
        // ELOQUENT
        $title = "E-KMS Anak";
        $dbulanans = Dbulan::where('danaks_id', $danaks_id)->orderBy('created_at', 'asc')->get();
        $danaks = Danak::all();

        return view(
            'bidan.export_pdf',
            compact('dbulanans', 'title', 'danaks'),
            ['chart' => $chart->build($danaks_id)]
        );
    }
}
