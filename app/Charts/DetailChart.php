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

    public function build($danaks_id): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $tgl_periksa = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        $jmlh_data1 = []; // Gizi Baik per bulan
        $jmlh_data2 = []; // Gizi Buruk per bulan

        foreach ($tgl_periksa as $index => $bulan) {
            // Ambil data berdasarkan bulan, tahun saat ini, dan danaks_id dari URL
            $total_gizi_baik = Dbulan::whereMonth('created_at', $index + 1)
                ->whereYear('created_at', date('Y'))
                ->where('st_anak', 'Gizi Baik')
                ->where('danaks_id', $danaks_id) // Filter by danaks_id
                ->count();

            $total_gizi_buruk = Dbulan::whereMonth('created_at', $index + 1)
                ->whereYear('created_at', date('Y'))
                ->where('st_anak', 'Gizi Buruk')
                ->where('danaks_id', $danaks_id) // Filter by danaks_id
                ->count();

            $jmlh_data1[] = $total_gizi_baik;
            $jmlh_data2[] = $total_gizi_buruk;
        }

        return $this->chart->lineChart()
            ->setTitle('Data ' . date('Y') . '.')
            ->setSubtitle('Gizi Baik dan Gizi Buruk Semua Posyandu.')
            ->addData('Gizi Baik', $jmlh_data1)
            ->addData('Gizi Buruk', $jmlh_data2)
            ->setColors(['#2EB086', '#FF6464'])
            ->setXAxis($tgl_periksa);
    }
}
