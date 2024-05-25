@extends('layouts.appnav')


@section('content')
    @include('layouts.navbaradmin')
    <section class="home-section mb-5">
        <div class="content">
            <div class="container mt-3 pt-3">
                <h1 class="fw-bold h mb-4">Data Akun </h1>
                <table class="table table-striped table-hover table-bordered datatable shadow" id="tabelakun"
                    style="width: 100%">
                    <thead class="fw-bold">
                        <tr>
                            <th id="th" class="text-center">Nama</th>
                            <th id="th" class="text-center">NIK</th>
                            <th id="th" class="text-center">Jenis Akun</th>
                            <th id="th" class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr data-id="{{ $user->id }}">
                                <th>
                                    <span class="fw-normal">{{ $user->name }}</span>
                                </th>
                                <th>
                                    <span class="fw-normal">{{ $user->nik }}</span>
                                </th>
                                <th>
                                    <span class="fw-normal">{{ $user->level }}</span>
                                </th>
                                <th>
                                    <select class="form-select form-select-sm user-status"
                                        aria-label="Small select example">
                                        <option value="Aktif" class="text-success fw-bold"
                                            {{ $user->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="Belum Aktif" class="text-danger fw-bold"
                                            {{ $user->status == 'Belum Aktif' ? 'selected' : '' }}>Belum Aktif</option>
                                    </select>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script type="module">
        $(document).ready(function() {
            new DataTable('#tabelakun', {
                responsive: true
            });
            $('.form-select').change(function() {
                var status = $(this).val();
                var userId = $(this).closest('tr').data('id');

                $.ajax({
                    url: '{{ route('admin.updateStatus') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: userId,
                        status: status
                    },
                    success: function(response) {
                        Swal.fire({
                            title: 'Berhasil!',
                            text: 'Status Memperbaharui',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });
                    },
                    error: function(response) {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Failed to update status',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            var selects = document.querySelectorAll('.user-status');
            selects.forEach(function(select) {
                setSelectColor(select);
                select.addEventListener('change', function() {
                    setSelectColor(select);
                });
            });

            function setSelectColor(select) {
                select.classList.add('fw-bold');
                if (select.value === 'Aktif') {
                    select.classList.add('text-success');
                    select.classList.remove('text-danger');
                } else if (select.value === 'Belum Aktif') {
                    select.classList.add('text-danger');
                    select.classList.remove('text-success');
                }
            }
        });
    </script>
@endpush
