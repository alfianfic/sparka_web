@extends('layout.main')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

<div class="col-12">
    <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">History</h6>
            </div>
        </div>
        <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
                <a href="{{ route('history.create') }}" class="btn btn-md btn-success mb-3">ADD History</a>

                <table id="history-table" class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">CO</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">FEV1</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                FVC</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Name</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Date</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Status</th>

                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var table = $('#history-table').DataTable({
            processing: false,
            serverSide: false, // Ubah ke true jika ingin server-side processing
            ajax: {
                url: '/history/data/{{ $id }}', // Ganti dengan URL endpoint Anda
                type: 'GET',
                dataSrc: '' // Jika data langsung array, kosongkan dataSrc
            },
            columns: [
                { data: 'CO' },
                { data: 'FEV1' },
                { data: 'FVC' },
                { data: 'user.name' }, // Mengambil nama dari relasi user
                { data: 'Date' },
                { data: 'Status' }
            ]
        });

        // Refresh tabel setiap 10 detik
        setInterval(function() {
            table.ajax.reload(null, false); // Reload tanpa reset paging
        }, 1000);
    });
</script>


@endsection
