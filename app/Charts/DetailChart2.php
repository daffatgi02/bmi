<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class DetailChart2
{
    protected $chart2;

    public function __construct(LarapexChart $chart2)
    {
        $this->chart2 = $chart2;
    }

    public function build(
        $jk,
        $umur_tahun,
        $umur_bulan,
        $tb_anak
    ): \ArielMejiaDev\LarapexCharts\lineChart {

        $kali_ut = array_map(fn ($value) => $value * 12, $umur_tahun);
        $ut = $kali_ut;
        $ub = $umur_bulan;
        $tb = $tb_anak;
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

        $scatterPoints = [];

        foreach ($tu as $index => $value) {
            $scatterPoints[$value] = $tb[$index] ?? null;
        }

        // Inisialisasi nilai default untuk indeks yang tidak ada di $tu
        for ($i = 0; $i <= 60; $i++) {
            if (!isset($scatterPoints[$i])) {
                $scatterPoints[$i] = null;
            }
        }

        ksort($scatterPoints);


        // dd($tu, $tb, $scatterPoints,);
        // dd(array_keys($jmlh_u));
        // dd($tu);
        // dd($umur);

        // Laki
        $lkondisi1 = [
            44.2, 48.9, 52.4, 55.3, 57.6, 59.6, 61.2, 62.7, 64, 65.2, 66.4, 67.6, 68.6, 69.6,
            70.6, 71.6, 72.5, 73.3, 74.2, 75, 75.8, 76.5, 77.2, 78, 78.7, 78.6, 79.3, 79.9, 80.5,
            81.1, 81.7, 82.3, 82.8, 83.4, 83.9, 84.4, 85, 85.5, 86, 86.5, 87, 87.5, 88, 88.4, 88.9,
            89.4, 89.8, 90.3, 90.7, 91.2, 91.6, 92.1, 92.5, 93, 93.4, 93.9, 94.3, 94.7, 95.2, 95.6, 96.1
        ];
        $lkondisi2 = [
            46.1, 50.8, 54.4, 57.3, 59.7, 61.7, 63.3, 64.8, 66.2, 67.5, 68.7, 69.9, 71, 72.1, 73.1,
            74.1, 75, 76, 76.9, 77.7, 78.6, 79.4, 80.2, 81, 81.7, 81.7, 82.5, 83.1, 83.8, 84.5, 85.1,
            85.7, 86.4, 86.9, 87.5, 88.1, 88.7, 89.2, 89.8, 90.3, 90.9, 91.4, 91.9, 92.4, 93, 93.5,
            94, 94.4, 94.9, 95.4, 95.9, 96.4, 96.9, 97.4, 97.8, 98.3, 98.8, 99.3, 99.7, 100.2, 100.7
        ];
        $lkondisi3 = [
            49.9, 54.7, 58.4, 61.4, 63.9, 65.9, 67.6, 69.2, 70.6, 72, 73.3, 74.5, 75.7, 76.9, 78, 79.1,
            80.2, 81.2, 82.3, 83.2, 84.2, 85.1, 86, 86.9, 87.8, 88, 88.8, 89.6, 90.4, 91.2, 91.9, 92.7,
            93.4, 94.1, 94.8, 95.4, 96.1, 96.7, 97.4, 98, 98.6, 99.2, 99.9, 100.4, 101, 101.6, 102.2,
            102.8, 103.3, 103.9, 104.4, 105, 105.6, 106.1, 106.7, 107.2, 107.8, 108.3, 108.9, 109.4, 110
        ];
        $lkondisi4 = [
            53.7, 58.6, 62.4, 65.5, 68, 70.1, 71.9, 73.5, 75, 76.5, 77.9, 79.2, 80.5, 81.8, 83, 84.2,
            85.4, 86.5, 87.7, 88.8, 89.8, 90.9, 91.9, 92.9, 93.9, 94.2, 95.2, 96.1, 97, 97.9, 98.7,
            99.6, 100.4, 101.2, 102, 102.7, 103.5, 104.2, 105, 105.7, 106.4, 107.1, 107.8, 108.5, 109.1,
            109.8, 110.4, 111.1, 111.7, 112.4, 113, 113.6, 114.2, 114.9, 115.5, 116.1, 116.7, 117.4, 118, 118.6, 119.2
        ];
        $lkondisi5 = [
            55.6, 60.6, 64.4, 67.6, 70.1, 72.2, 74, 75.7, 77.2, 78.7, 80.1, 81.5, 82.9, 84.2, 85.5,
            86.7, 88, 89.2, 90.4, 91.5, 92.6, 93.8, 94.9, 95.9, 97, 97.3, 98.3, 99.3, 100.3, 101.2,
            102.1, 103, 103.9, 104.8, 105.6, 106.4, 107.2, 108, 108.8, 109.5, 110.3, 111, 111.7,
            112.5, 113.2, 113.9, 114.6, 115.2, 115.9, 116.6, 117.3, 117.9, 118.6, 119.2, 119.9,
            120.6, 121.2, 121.9, 122.6, 123.2, 123.9
        ];

        // Perempuan
        $pkondisi1 = [
            43.6, 47.8, 51, 53.5, 55.6, 57.4, 58.9, 60.3, 61.7, 62.9, 64.1, 65.2, 66.3, 67.3,
            68.3, 69.3, 70.2, 71.1, 72, 72.8, 73.7, 74.5, 75.2, 76, 76.7, 76.8, 77.5, 78.1,
            78.8, 79.5, 80.1, 80.7, 81.3, 81.9, 82.5, 83.1, 83.6, 84.2, 84.7, 85.3, 85.8,
            86.3, 86.8, 87.4, 87.9, 88.4, 88.9, 89.3, 89.8, 90.3, 90.7, 91.2, 91.7, 92.1,
            92.6, 93, 93.4, 93.9, 94.3, 94.7, 95.2
        ];
        $pkondisi2 = [
            45.4, 49.8, 53, 55.6, 57.8, 59.6, 61.2, 62.7, 64, 65.3, 66.5, 67.7, 68.9, 70,
            71, 72, 73, 74, 74.9, 75.8, 76.7, 77.5, 78.4, 79.2, 80, 80, 80.8, 81.5, 82.2,
            82.9, 83.6, 84.3, 84.9, 85.6, 86.2, 86.8, 87.4, 88, 88.6, 89.2, 89.8, 90.4,
            90.9, 91.5, 92, 92.5, 93.1, 93.6, 94.1, 94.6, 95.1, 95.6, 96.1, 96.6, 97.1,
            97.6, 98.1, 98.5, 99, 99.5, 99.9
        ];
        $pkondisi3 = [
            49.1, 53.7, 57.1, 59.8, 62.1, 64, 65.7, 67.3, 68.7, 70.1, 71.5, 72.8, 74, 75.2, 76.4,
            77.5, 78.6, 79.7, 80.7, 81.7, 82.7, 83.7, 84.6, 85.5, 86.4, 86.6, 87.4, 88.3, 89.1,
            89.9, 90.7, 91.4, 92.2, 92.9, 93.6, 94.4, 95.1, 95.7, 96.4, 97.1, 97.7, 98.4, 99,
            99.7, 100.3, 100.9, 101.5, 102.1, 102.7, 103.3, 103.9, 104.5, 105, 105.6, 106.2,
            106.7, 107.3, 107.8, 108.4, 108.9, 109.4
        ];
        $pkondisi4 = [
            52.9, 57.6, 61.1, 64, 66.4, 68.5, 70.3, 71.9, 73.5, 75, 76.4, 77.8, 79.2, 80.5, 81.7, 83,
            84.2, 85.4, 86.5, 87.6, 88.7, 89.8, 90.8, 91.9, 92.9, 93.1, 94.1, 95, 96, 96.9, 97.7, 98.6,
            99.4, 100.3, 101.1, 101.9, 102.7, 103.4, 104.2, 105, 105.7, 106.4, 107.2, 107.9, 108.6,
            109.3, 110, 110.7, 111.3, 112, 112.7, 113.3, 114, 114.6, 115.2, 115.9, 116.5, 117.1,
            117.7, 118.3, 118.9
        ];
        $pkondisi5 = [
            54.7, 59.5, 63.2, 66.1, 68.6, 70.7, 72.5, 74.2, 75.8, 77.4, 78.9, 80.3, 81.7,
            83.1, 84.4, 85.7, 87, 88.2, 89.4, 90.6, 91.7, 92.9, 94, 95, 96.1, 96.4, 97.4,
            98.4, 99.4, 100.3, 101.3, 102.2, 103.1, 103.9, 104.8, 105.6, 106.5, 107.3, 108.1,
            108.9, 109.7, 110.5, 111.2, 112, 112.7, 113.5, 114.2, 114.9, 115.7, 116.4, 117.1,
            117.7, 118.4, 119.1, 119.8, 120.4, 121.1, 121.8, 122.4, 123.1, 123.7
        ];

        // dd($data_tb_anak);
        // dd($scatterPoints);


        if ($jk == 'P') {
            return $this->chart2->lineChart()
                ->setTitle('Data ' . date('Y') . '.')
                ->setSubtitle('Data Panjang/Tinggi Badan Terhadap Umur (Bulan).')
                ->addData('-3 SD', $pkondisi1)
                ->addData('-2 SD', $pkondisi2)
                ->addData('-0 SD', $pkondisi3)
                ->addData('2 SD', $pkondisi4)
                ->addData('3 SD', $pkondisi5)
                ->addData('Kondisi', $scatterPoints)
                ->setColors(['rgba(58, 59, 62, 0.4)', 'rgba(4, 9, 143, 0.4)', 'rgba(65, 224, 160, 0.4)', 'rgba(255, 148, 45, 0.4)', 'rgba(251, 78, 50, 0.4)', 'rgba(0, 0, 0, 0.8)'])
                ->setXAxis($umur);
        } elseif ($jk == 'L') {
            return $this->chart2->lineChart()
                ->setTitle('Data ' . date('Y') . '.')
                ->setSubtitle('Data Panjang/Tinggi Badan Terhadap Umur (Bulan).')
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
