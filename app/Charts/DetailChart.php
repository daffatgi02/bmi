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

    public function build(
        $jk,
        $umur_tahun,
        $umur_bulan,
        $bb_anak
    ): \ArielMejiaDev\LarapexCharts\lineChart {

        $kali_ut = array_map(fn ($value) => $value * 12, $umur_tahun);
        $ut = $kali_ut;
        $ub = $umur_bulan;
        $bb = $bb_anak;
        $jmlh_u = array_map(function ($ut_value, $ub_value) {
            return $ut_value + $ub_value;
        }, $ut, $ub);

        // Cek Jumlah data

        $tu = $jmlh_u;

        $umur = [];

        for ($i = 0; $i <= 60; $i++) {
            if ($i % 10 == 0 || $i == 60) {
                $umur[] = $i;
            } else {
                $umur[] = '*';
            }
        }
        // dd($umur);

        $scatterPoints = [];

        foreach ($tu as $index => $value) {
            $scatterPoints[$value] = $bb[$index] ?? null;
        }

        // Inisialisasi nilai default untuk indeks yang tidak ada di $tu
        for ($i = 0; $i <= 60; $i++) {
            if (!isset($scatterPoints[$i])) {
                $scatterPoints[$i] = null;
            }
        }

        ksort($scatterPoints);


        // dd($tu, $bb, $scatterPoints,);
        // dd(array_keys($jmlh_u));
        // dd($tu);
        // dd($umur);
        // dd($scatterPoints);

        // Laki
        $lkondisi1 = [
            2.1, 2.9, 3.8, 4.4, 4.9, 5.3, 5.7, 5.9, 6.2, 6.4, 6.6, 6.8, 6.9, 7.1, 7.2, 7.4, 7.5,
            7.7, 7.8, 8, 8.1, 8.2, 8.4, 8.5, 8.6, 8.8, 8.9, 9, 9.1, 9.2, 9.4, 9.5, 9.6, 9.7, 9.8,
            9.9, 10, 10.1, 10.2, 10.3, 10.4, 10.5, 10.6, 10.7, 10.8, 10.9, 11, 11.1, 11.2, 11.3, 11.4,
            11.5, 11.6, 11.7, 11.8, 11.9, 12, 12.1, 12.2, 12.3, 12.4
        ];
        $lkondisi2 = [
            2.5, 3.4, 4.3, 5, 5.6, 6, 6.4, 6.7, 6.9, 7.1, 7.4, 7.6, 7.7, 7.9, 8.1, 8.3, 8.4, 8.6,
            8.8, 8.9, 9.1, 9.2, 9.4, 9.5, 9.7, 9.8, 10, 10.1, 10.2, 10.4, 10.5, 10.7, 10.8, 10.9,
            11, 11.2, 11.3, 11.4, 11.5, 11.6, 11.8, 11.9, 12, 12.1, 12.2, 12.4, 12.5, 12.6, 12.7,
            12.8, 12.9, 13.1, 13.2, 13.3, 13.4, 13.5, 13.6, 13.7, 13.8, 14, 14.1
        ];
        $lkondisi3 = [
            3.3, 4.5, 5.6, 6.4, 7, 7.5, 7.9, 8.3, 8.6, 8.9, 9.2, 9.4, 9.6, 9.9, 10.1, 10.3, 10.5, 10.7,
            10.9, 11.1, 11.3, 11.5, 11.8, 12, 12.2, 12.4, 12.5, 12.7, 12.9, 13.1, 13.3, 13.5, 13.7,
            13.8, 14, 14.2, 14.3, 14.5, 14.7, 14.8, 15, 15.2, 15.3, 15.5, 15.7, 15.8, 16, 16.2,
            16.3, 16.5, 16.7, 16.8, 17, 17.2, 17.3, 17.5, 17.7, 17.8, 18, 18.2, 18.3
        ];
        $lkondisi4 = [
            4.4, 5.8, 7.1, 8, 8.7, 9.3, 9.8, 10.3, 10.7, 11, 11.4, 11.7, 12, 12.3, 12.6, 12.8, 13.1,
            13.4, 13.7, 13.9, 14.2, 14.5, 14.7, 15, 15.3, 15.5, 15.8, 16.1, 16.3, 16.6, 16.9, 17.1,
            17.4, 17.6, 17.8, 18.1, 18.3, 18.6, 18.8, 19, 19.3, 19.5, 19.7, 20, 20.2, 20.5, 20.7,
            20.9, 21.2, 21.4, 21.7, 21.9, 22.2, 22.4, 22.7, 22.9, 23.2, 23.4, 23.7, 23.9, 24.2
        ];
        $lkondisi5 = [
            5, 6.6, 8, 9, 9.7, 10.4, 10.9, 11.4, 11.9, 12.3, 12.7, 13, 13.3, 13.7, 14, 14.3, 14.6,
            14.9, 15.3, 15.6, 15.9, 16.2, 16.5, 16.8, 17.1, 17.5, 17.8, 18.1, 18.4, 18.7, 19, 19.3,
            19.6, 19.9, 20.2, 20.4, 20.7, 21, 21.3, 21.6, 21.9, 22.1, 22.4, 22.7, 23, 23.3, 23.6,
            23.9, 24.2, 24.5, 24.8, 25.1, 25.4, 25.7, 26, 26.3, 26.6, 26.9, 27.2, 27.6, 27.9
        ];

        // Perempuan
        $pkondisi1 = [
            2, 2.7, 3.4, 4, 4.4, 4.8, 5.1, 5.3, 5.6, 5.8, 5.9, 6.1, 6.3, 6.4, 6.6, 6.7, 6.9, 7, 7.2,
            7.3, 7.5, 7.6, 7.8, 7.9, 8.1, 8.2, 8.4, 8.5, 8.6, 8.8, 8.9, 9, 9.1, 9.3, 9.4, 9.5, 9.6, 9.7,
            9.8, 9.9, 10.1, 10.2, 10.3, 10.4, 10.5, 10.6, 10.7, 10.8, 10.9, 11, 11.1, 11.2, 11.3, 11.4,
            11.5, 11.6, 11.7, 11.8, 11.9, 12, 12.1
        ];
        $pkondisi2 = [
            2.4, 3.2, 3.9, 4.5, 5, 5.4, 5.7, 6, 6.3, 6.5, 6.7, 6.9, 7, 7.2, 7.4, 7.6, 7.7, 7.9, 8.1, 8.2,
            8.4, 8.6, 8.7, 8.9, 9, 9.2, 9.4, 9.5, 9.7, 9.8, 10, 10.1, 10.3, 10.4, 10.5, 10.7, 10.8, 10.9,
            11.1, 11.2, 11.3, 11.5, 11.6, 11.7, 11.8, 12, 12.1, 12.2, 12.3, 12.4, 12.6, 12.7, 12.8, 12.9,
            13, 13.2, 13.3, 13.4, 13.5, 13.6, 13.7
        ];
        $pkondisi3 = [
            3.2, 4.2, 5.1, 5.8, 6.4, 6.9, 7.3, 7.6, 7.9, 8.2, 8.5, 8.7, 8.9, 9.2, 9.4, 9.6, 9.8, 10, 10.2,
            10.4, 10.6, 10.9, 11.1, 11.3, 11.5, 11.7, 11.9, 12.1, 12.3, 12.5, 12.7, 12.9, 13.1, 13.3, 13.5,
            13.7, 13.9, 14, 14.2, 14.4, 14.6, 14.8, 15, 15.2, 15.3, 15.5, 15.7, 15.9, 16.1, 16.3, 16.4, 16.6,
            16.8, 17, 17.2, 17.3, 17.5, 17.7, 17.9, 18, 18.2
        ];
        $pkondisi4 = [
            4.2, 5.5, 6.6, 7.5, 8.2, 8.8, 9.3, 9.8, 10.2, 10.5, 10.9, 11.2, 11.5, 11.8, 12.1, 12.4, 12.6,
            12.9, 13.2, 13.5, 13.7, 14, 14.3, 14.6, 14.8, 15.1, 15.4, 15.7, 16, 16.2, 16.5, 16.8, 17.1,
            17.3, 17.6, 17.9, 18.1, 18.4, 18.7, 19, 19.2, 19.5, 19.8, 20.1, 20.4, 20.7, 20.9, 21.2, 21.5,
            21.8, 22.1, 22.4, 22.6, 22.9, 23.2, 23.5, 23.8, 24.1, 24.4, 24.6, 24.9
        ];
        $pkondisi5 = [
            4.8, 6.2, 7.5, 8.5, 9.3, 10, 10.6, 11.1, 11.6, 12, 12.4, 12.8, 13.1, 13.5, 13.8, 14.1, 14.5,
            14.8, 15.1, 15.4, 15.7, 16, 16.4, 16.7, 17, 17.3, 17.7, 18, 18.3, 18.7, 19, 19.3, 19.6, 20,
            20.3, 20.6, 20.9, 21.3, 21.6, 22, 22.3, 22.7, 23, 23.4, 23.7, 24.1, 24.5, 24.8, 25.2, 25.5,
            25.9, 26.3, 26.6, 27, 27.4, 27.7, 28.1, 28.5, 28.8, 29.2, 29.5
        ];

        // dd($data_bb_anak);
        if ($jk == 'P') {
            return $this->chart->lineChart()
                ->setTitle('Data ' . date('Y') . '.')
                ->setSubtitle('Data Berat Badan Terhadap Umur (Bulan).')
                ->addData('-3 SD', $pkondisi1)
                ->addData('-2 SD', $pkondisi2)
                ->addData('-0 SD', $pkondisi3)
                ->addData('2 SD', $pkondisi4)
                ->addData('3 SD', $pkondisi5)
                ->addData('Kondisi', $scatterPoints)
                ->setColors(['rgba(58, 59, 62, 0.4)', 'rgba(4, 9, 143, 0.4)', 'rgba(65, 224, 160, 0.4)', 'rgba(255, 148, 45, 0.4)', 'rgba(251, 78, 50, 0.4)', 'rgba(0, 0, 0, 0.8)'])
                ->setXAxis($umur);
        } elseif ($jk == 'L') {
            return $this->chart->lineChart()
                ->setTitle('Data ' . date('Y') . '.')
                ->setSubtitle('Data Berat Badan Terhadap Umur (Bulan).')
                ->addData('-3 SD', $lkondisi1)
                ->addData('-2 SD', $lkondisi2)
                ->addData('-0 SD', $lkondisi3)
                ->addData('2 SD', $lkondisi4)
                ->addData('3 SD', $lkondisi5)
                ->addData('Kondisi', $scatterPoints)
                ->setColors(['rgba(58, 59, 62, 0.4)', 'rgba(4, 9, 143, 0.4)', 'rgba(65, 224, 160, 0.4)', 'rgba(255, 148, 45, 0.4)', 'rgba(251, 78, 50, 0.4)', 'rgba(0, 0, 0, 0.8)'])
                ->setXAxis($umur);
        } else {
            // Handle jika 'jk' tidak sama dengan 'P' atau 'L'
            // Misalnya, bisa mengembalikan chart default atau memberikan pesan error.
        }
    }
}
