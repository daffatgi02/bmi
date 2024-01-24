@extends('layouts.app')

<style>
    @keyframes popIn {
        0% {
            opacity: 0;
            transform: scale(0.8);
        }

        100% {
            opacity: 1;
            transform: scale(1);
        }
    }

    .pop-in {
        animation: popIn 0.8s ease-out;
    }
</style>

@section('content')
    <div class="loadku d-none">
        <div class="loading-overlay">
            <div class="spinner-container">
                <div class="spinner-border text-success" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <label>Loading</label>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <form action="{{ route('kaders.index') }}" method="get" id="filterForm">
            @csrf
            <div class="row">
                <p class="fs-3 fw-bold mb-4 text-center">
                    Silahkan Pilih Posyandu
                </p>
                <div class="d-flex justify-content-end mb-4">
                    <button type="submit" class="btn ms-3" id="btn-tambah">
                        Selanjutnya <i class="bi bi-chevron-right"></i>
                    </button>
                </div>
                @foreach ($dposyandu as $posyandu)
                    <div class="col-md-3 col-6 p-3 text-center">
                        <button type="button" class="btn btn_pposyandu fw-bold p-3 pop-in w-100"
                            onclick="fillInput('{{ $posyandu->id }}', '{{ $posyandu->nama_posyandu }}')">
                            <i class="bi bi-hospital fs-4 me-2"></i>
                            {{ $posyandu->nama_posyandu }}
                        </button>
                    </div>
                @endforeach

            </div>

            <div class="d-flex flex-row mt-5 pt-5">
                <input class="form-control d-none" type="text" placeholder="id_posyandu" name="id_posyandu"
                    id="id_posyandu" aria-label="id_posyandu">
                <input class="form-control d-none" type="text" placeholder="nama_posyandu" name="nama_posyandu"
                    id="nama_posyandu" aria-label="nama_posyandu">

            </div>
        </form>


        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header bg-warning">
                    <strong class="me-auto">Info</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body bg-white">
                    Silahkan Pilih Posyandu Terlebih Dahulu
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const filterForm = document.getElementById('filterForm');
            const idPosyanduInput = document.getElementById('id_posyandu');
            const namaPosyanduInput = document.getElementById('nama_posyandu');
            const submitButton = document.getElementById('btn-tambah');
            const loadkuDiv = document.querySelector('.loadku');
            const toast = new bootstrap.Toast(document.getElementById('liveToast'));

            submitButton.addEventListener('click', function(event) {
                // Check if id_posyandu and nama_posyandu inputs are filled
                if (!idPosyanduInput.value || !namaPosyanduInput.value) {
                    // If not, prevent form submission
                    event.preventDefault();
                    // Show the toast
                    toast.show();
                } else {
                    // If inputs are filled, show the loading overlay for 2 seconds
                    loadkuDiv.classList.remove('d-none');
                    loadkuDiv.classList.add('d-block');

                    setTimeout(function() {
                        // After 2 seconds, submit the form
                        filterForm.submit();
                    }, 2000);
                }
            });
        });

        function fillInput(id, nama) {
            // Remove "active" class from all buttons with class "btn_pposyandu"
            var buttons = document.querySelectorAll('.btn_pposyandu');
            buttons.forEach(function(button) {
                button.classList.remove('active');
            });

            // Fill the id_posyandu and nama_posyandu inputs with the selected values
            document.getElementById('id_posyandu').value = id;
            document.getElementById('nama_posyandu').value = nama;

            // Add "active" class to the clicked button
            event.currentTarget.classList.add('active');
        }
    </script>
@endsection
