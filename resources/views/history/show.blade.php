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
                <a href="{{ route('history.create') }}" class="btn btn-md btn-success mb-3">Add History</a>

                <table id="history-table" class="table align-items-center mb-0 box">
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
 <footer class="footer py-4  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-lg-start font-footer">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with
                  <!-- <i class="fa fa-heart"></i> by -->
                <a href="https://www.creative-tim.com" class="font-weight-bold ; font-footer" target="_blank">SparkA Tim</a>
                | Your Breath Our Priority.
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link font-footer" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link font-footer " target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/blog" class="nav-link font-footer " target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 font-footer" target="_blank">License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>


<style>
    body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #013064, #ff7f7e);
    background-attachment: fixed;
    color: #0B3D91;
  }

   .font-footer{
    color: #f9f9f9;
    font-weight: bold;
  }

  .box{
    max-width: 1200px;
  }

.dataTables_filter {
    padding-right: 30px !important; 
}

.dataTables_filter input {
    padding: 6px 12px;
    border-radius: 6px;
    border: 1px solid #ccc;
}

  
</style>
@endsection
