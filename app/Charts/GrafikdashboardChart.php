<?php

namespace App\Charts;

use App\Models\Dbulan;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class GrafikdashboardChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\barChart
    {
        $tgl_periksa = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        $jmlh_data1 = []; // Gizi Baik per bulan
        $jmlh_data2 = []; // Gizi Buruk per bulan

        foreach ($tgl_periksa as $index => $bulan) {
            // Ambil data berdasarkan bulan, tahun saat ini, dan posyandu yang dipilih
            $total_gizi_baik = Dbulan::whereMonth('created_at', $index + 1)
                ->whereYear('created_at', date('Y'))
                ->where('st_anak', 'Gizi Baik')
                // ->whereHas('danaks.dposyandu', function ($query) use ($selectedPosyandu) {
                //     $query->where('nama_posyandu', $selectedPosyandu);
                // })
                ->count();

            $total_gizi_buruk = Dbulan::whereMonth('created_at', $index + 1)
                ->whereYear('created_at', date('Y'))
                ->where('st_anak', 'Gizi Buruk')
                // ->whereHas('danaks.dposyandu', function ($query) use ($selectedPosyandu) {
                //     $query->where('nama_posyandu', $selectedPosyandu);
                // })
                ->count();

            $jmlh_data1[] = $total_gizi_baik;
            $jmlh_data2[] = $total_gizi_buruk;
        }

        return $this->chart->barChart()
            ->setTitle('Data Gizi Baik dan Gizi Buruk di ' . date('Y') . '.')
            ->setSubtitle('Pada Posyandu Kabupaten Mojokerto')
            ->addData('Gizi Baik', $jmlh_data1)
            ->addData('Gizi Buruk', $jmlh_data2)
            ->setColors(['#2EB086', '#FF6464'])
            ->setXAxis($tgl_periksa)
            ->setGrid('#3F51B5', 0.01);
        // ->setMarkers(['#FF6464', '#2EB086'], 6, 8);
    }
}
