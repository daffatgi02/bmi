<?php

namespace App\Charts;

use App\Models\Dbulan;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class DetailChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($danaks_id): \ArielMejiaDev\LarapexCharts\lineChart
    {
        $tgl_periksa = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        $data_bb_anak = [];
        // $data_bb_anak = []; // Data berat badan anak per bulan
        for ($i = 1; $i <= 12; $i++) {
            // Ambil data berdasarkan bulan, tahun saat ini, dan danaks_id dari URL
            $berat_badan_anak = Dbulan::whereMonth('created_at', $i)
                ->whereYear('created_at', date('Y'))
                ->whereNotNull('bb_anak') // Pastikan data bb_anak tidak null
                ->where('danaks_id', $danaks_id) // Filter by danaks_id
                ->pluck('bb_anak') // Ambil nilai berat badan anak
                ->toArray(); // Ubah ke dalam array

            // Jika tidak ada nilai yang ditemukan, masukkan nilai default ke dalam $data_bb_anak
            if (empty($berat_badan_anak)) {
                $data_bb_anak[] = 0; // Nilai default jika tidak ada data ditemukan
            } else {
                $data_bb_anak = array_merge($data_bb_anak, $berat_badan_anak);
            }
        }
        // dd($data_bb_anak);
        return $this->chart->lineChart()
            ->setTitle('Data ' . date('Y') . '.')
            ->setSubtitle('Data Berat Badan Anak Semua Posyandu.')
            ->addData('Berat Badan (KG)', $data_bb_anak)
            ->setColors(['#2EB086'])
            ->setXAxis($tgl_periksa)
            ->setMarkers(['#FF5722', '#E040FB'], 6, 8)
            ->setGrid('#3F51B5', 0.01);
    }
}
