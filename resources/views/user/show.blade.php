@extends('layout.main')

@section('content')
<style>
  body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #013064, #ff7f7e);
    background-attachment: fixed;
    color: #0B3D91;
  }

  .container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    padding: 2rem;
  }

  .card {
    background-color: #CBDCEB;
    border-radius: 16px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    width: 90%;
    max-width: 1000px;
    display: flex;
    flex-direction: row;
    gap: 2rem;
    padding: 2rem;
  }

  .left, .right {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 1rem;
  }

  .title {
    font-size: 1.5rem;
    font-weight: 700;
    text-align: center;
    margin-bottom: 1rem;
  }

  .info-box, .data-box, .status-box, .notif-box {
    background-color: #f9f9f9;
    border-radius: 12px;
    padding: 1rem;
    font-weight: 600;
    transition: 0.3s;
    max-width: 600px
  }

  .info-box:hover, .data-box:hover, .status-box:hover, .notif-box:hover {
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
    transform: scale(1.01);
  }

  .data-item label {
    font-weight: 600;
    margin-bottom: 0.25rem;
    display: block;
  }

  .data-value {
    background-color: #0B3D91;
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 8px;
    text-align: center;
  }

  .btn-history {
    text-decoration: none;
    background-color: #4CAF50;
    color: white;
    padding: 0.6rem 1.2rem;
    border-radius: 8px;
    text-align: center;
    font-weight: 600;
    margin-bottom: 1rem;
    transition: 0.3s;
  }

  .btn-history:hover {
    background-color: #45a049;
  }

  .font-color {
            /*color: #013064;*/
            font-weight: bold;
  }

  .info-box table td {
    padding: 3px 6px;
  }

  .font-footer{
    color: #f9f9f9;
  }
    .font-footer:hover {
      color: #ffffff !important;
  }
  @media (max-width: 768px) {
    .card {
      flex-direction: column;
    }
  }
</style>

<div class="container">
  <div class="card">
    <div class="left">
      <div class="title">Data Pasien</div>
      <a href="{{ route('history.show', $user->id) }}" class="btn-history">Lihat Riwayat</a>

      <div class="info-box ; font-color">
    <table style="width:100%; line-height: 1.8;">
        <tr>
            <td><strong>Nama</strong></td>
            <td>: {{$user->name}}</td>
        </tr>
        <tr>
            <td><strong>Usia</strong></td>
            <td>: {{$user->age}}</td>
        </tr>
        <tr>
            <td><strong>Tinggi Badan</strong></td>
            <td>: {{$user->height}} cm</td>
        </tr>
        <tr>
            <td><strong>Berat Badan</strong></td>
            <td>: {{$user->weight}} kg</td>
        </tr>
        <tr>
            <td><strong>Gender</strong></td>
            <td>: {{$user->gender}}</td>
        </tr>
        <tr>
            <td><strong>Email</strong></td>
            <td>: {{$user->email}}</td>
        </tr>
    </table>
</div>
      <div class="status-box ; font-color">
          Status PPOK : 
          <span style="color: {{ $user->status > 1 ? 'red' : 'green' }}">
              {{ $user->status }}
          </span>
      </div>

      <div class="notif-box ; font-color">
        Notifikasi:   
          @if($user->status == 1)
            Kondisi Paru-paru Baik, Jagalah Kesehatan Paru Anda!
          @elseif($user->status == 2)
            Gejala sesak nafas ringan — Kondisi kurang sehat, segera periksa ke dokter spesialis paru-paru.
          @elseif($user->status == 3)
            Sesak nafas ringan — Kondisi kurang sehat, segera periksa ke dokter spesialis paru-paru.
          @elseif($user->status == 4)
            Sesak nafas PPOK — Kondisi tidak sehat dan masuk kategori dugaan PPOK. Segera periksa ke dokter!
          @elseif($user->status == 5)
            Sesak nafas kronis — Kondisi berat, segera periksa ke dokter spesialis paru-paru!
          @else
            Data status tidak diketahui.
          @endif
      </div>
    </div>

    <div class="right">
      <div class="title">Data Pemeriksaan</div>
      <div class="data-box">
        <div class="data-item">
          <label>FEV1</label>
          <div class="data-value" id="FEV1">{{$user->FEV1}} lt/m</div>
        </div>
        <div class="data-item">
          <label>FVC</label>
          <div class="data-value" id="FVC"> {{$user->FVC}} lt/m</div>
        </div>
        <div class="data-item">
          <label>Kadar CO</label>
          <div class="data-value" id="CO">{{$user->CO}} ppm</div>
        </div>
        <div class="data-item">
          <label>FEV1/FVC</label>
          <div class="data-value" id="FEV1FVC">
            @if ($user->FVC > 0)
              {{ number_format(($user->FEV1 / $user->FVC) * 100, 2) }}%
            @else
              -
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  function fetchData() {
    $.ajax({
      url: '/user/user-data/{{$user->id}}',
      method: 'GET',
      success: function(data) {
        $('#FEV1').text(data.FEV1 + ' lt/m');
        $('#FVC').text(data.FVC + ' lt/m');
        $('#CO').text(data.CO + ' ppm');
        $('#FEV1FVC').text(data.FEV1_FVC + '%');
      },
      error: function() {
        console.error('Gagal mengambil data');
      }
    });
  }

  // Jalankan setiap 2 detik
  setInterval(fetchData, 1000);
  console.log(CO);
  // Jalankan pertama kali saat halaman dimuat
  // $(document).ready(fetchData);
</script>

@endsection
