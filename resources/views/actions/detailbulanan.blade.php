@extends('layouts.appnav')

@section('content')
    @include('layouts.navbar')
    <section class="home-section mb-5">
        <div class="container mt-3 pt-3">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10">
                    {!! $chart->container() !!}
                </div>
                <div class="col-12 mt-4 mb-5">
                    <table class="table table-striped table-hover table-bordered datatable shadow" id="example"
                        style="width: 100%">
                        <thead>
                            <tr>
                                <th id="th" class="text-center">Nama</th>
                                <th id="th" class="text-center">Umur Periksa</th>
                                <th id="th" class="text-center">Berat Badan</th>
                                <th id="th" class="text-center">Tinggi Badan</th>
                                <th id="th" class="text-center">Lingkar Lengan</th>
                                <th id="th" class="text-center">Lingkar Kepala</th>
                                <th id="th" class="text-center">Status</th>
                                <th id="th" class="text-center">Tanggal Periksa</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($dbulanans as $data)
                                <tr>
                                    <td>{{ $data->danaks->nama_anak }}</td>
                                    <td class="text-center">{{ $data->umur_periksa }}</td>
                                    <td class="text-center">{{ $data->bb_anak }}</td>
                                    <td class="text-center">{{ $data->tb_anak }}</td>
                                    <td class="text-center">{{ $data->ll_anak }}</td>
                                    <td class="text-center">{{ $data->lk_anak }}</td>
                                    <td class="text-center fw-bold"
                                        style="color: {{ $data->st_anak === 'Gizi Baik' ? 'green' : 'red' }}">
                                        {{ $data->st_anak }}
                                    </td>
                                    <td class="text-center">{{ $data->created_at->format('Y-m-d') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ $chart->cdn() }}"></script>
    {{ $chart->script() }}
    <script>
        new DataTable('#example', {
            responsive: true,
            lengthChange: false, // Menghilangkan opsi page length
            paging: false, // Menghilangkan paging (halaman)
            searching: false,
            pageLength: -1 // Menghilangkan kotak pencarian
        });
    </script>
@endsection
