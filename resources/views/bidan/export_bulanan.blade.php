<table>
    <thead>
        <tr>
            <th>No</th>
            <th>NIK</th>
            <th>nama_anak</th>
            <th>tgl_lahir</th>
            <th>umur_tahun</th>
            <th>umur_bulan</th>
            <th>jenis_kelamin</th>
            <th>nama_ortu</th>
            <th>nik_ortu</th>
            <th>hp_ortu</th>
            <th>PKM</th>
            <th>KEL</th>
            <th>POSY</th>
            <th>RT</th>
            <th>RW</th>
            <th>ALAMAT</th>
            <th>TANGGALUKUR</th>
            <th>TINGGI</th>
            <th>CARAUKUR</th>
            <th>BERAT</th>
            <th>LILA</th>
            <th>vita</th>
            <th>lingkar_kepala</th>
            <th>asi_bulan_1</th>
            <th>asi_bulan_2</th>
            <th>asi_bulan_3</th>
            <th>asi_bulan_4</th>
            <th>asi_bulan_5</th>
            <th>asi_bulan_6</th>
            <th>pemberian_ke</th>
            <th>sumber_pmt</th>
            <th>pemberian_pusat</th>
            <th>tahun_produksi</th>
            <th>pemberian_daerah</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dbulans as $index => $dbulan)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>&nbsp;{{ $dbulan->danaks->nik_anak }}</td>
                <td >{{ $dbulan->danaks->nama_anak }}</td>
                <td>{{ $dbulan->danaks->tanggal_lahir }}</td>
                <td>{{ $dbulan->umur_tahun }}</td>
                <td>{{ $dbulan->umur_bulan }}</td>
                <td>{{ $dbulan->danaks->jk }}</td>
                <td>{{ $dbulan->danaks->nama_ortu }}</td>
                <td >&nbsp;{{ $dbulan->danaks->nik_ortu }}</td>
                <td>&nbsp;{{ $dbulan->danaks->hp_ortu }}</td>
                <td>{{ $dbulan->danaks->dposyandu->pkm }}</td>
                <td>{{ $dbulan->danaks->dposyandu->kel }}</td>
                <td>{{ $dbulan->danaks->dposyandu->nama_posyandu }}</td>
                <td>{{ $dbulan->danaks->dposyandu->rt }}</td>
                <td>{{ $dbulan->danaks->dposyandu->rw }}</td>
                <td>{{ $dbulan->danaks->dposyandu->lokasi_posyandu }}</td>
                <td>{{ $dbulan->created_at->format('Y-m-d') }}</td>
                <td>{{ $dbulan->tb_anak }}</td>
                <td>-</td>
                <td>{{ $dbulan->bb_anak }}</td>
                <td>{{ $dbulan->ll_anak }}</td>
                <td></td>
                <td>{{ $dbulan->lk_anak }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
