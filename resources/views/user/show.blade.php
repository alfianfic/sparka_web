@extends('layout.main')

@section('content')
<style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-image: url('bgweb13.png');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed;
      color: #0B3D91;
    }

    .overlay {
      background-color: rgba(193, 40, 40, 0.03);
      min-height: 100vh;
      display: flex;
      flex-direction: row;
    }

    .left-panel, .right-panel {
      padding: 2rem;
    }

    .left-panel {
      width: 30%;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 2rem;
    }

    .card-person {
      background-color: #ffffff;
      border-radius: 10px;
      padding: 1rem;
      width: 100%;
      max-width: 220px;
      text-align: center;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .card-person:hover {
      transform: translateY(-4px);
    }

    .card-person img {
      width: 100px;
      height: auto;
      border-radius: 10px;
      margin-bottom: 0.5rem;
    }

    .card-person p {
      font-weight: 600;
      font-size: 1rem;
      margin: 0;
    }

    .right-panel {
      width: 70%;
    }

    .header-card {
      background-color: #ffffff;
      padding: 1rem 1.5rem;
      border-radius: 10px;
      margin-bottom: 1.5rem;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
      text-align: center;
    }

    .section-title {
      font-weight: 600;
      font-size: 1.5rem;
      margin: 0;
    }

    .info-box {
      background-color: #ffffff;
      border-radius: 10px;
      padding: 1rem 1.5rem;
      margin-bottom: 1.5rem;
      display: flex;
      flex-wrap: wrap;
      gap: 2rem;
      font-size: 1rem;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .info-box:hover {
      transform: translateY(-4px);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .info-box div {
      flex: 1;
      min-width: 180px;
      font-weight: 600;
    }

    .data-section {
      display: flex;
      flex-direction: column;
      gap: 1rem;
    }

    .data-item {
      background-color: #ffffff;
      border-radius: 10px;
      padding: 1rem;
      width: 96%;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .data-item:hover {
      transform: scale(1.03);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.25);
    }

    .data-item label {
      display: block;
      font-weight: 600;
      margin-bottom: 0.3rem;
    }

    .data-value {
      background-color: #0B3D91;
      color: #ffffff;
      font-weight: 600;
      padding: 0.75rem 1rem;
      border-radius: 8px;
      width: 96%;
      display: block;
      text-align: center;
      transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .data-value:hover {
      background-color: #0d47a1;
      transform: scale(1.02);
    }

    .status-box, .notif-box {
      background-color: #ffffff;
      border-radius: 10px;
      padding: 1rem 1.5rem;
      margin-top: 1rem;
      font-weight: 600;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .status-box:hover, .notif-box:hover {
      transform: translateY(-4px);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    @media (max-width: 768px) {
      .overlay {
        flex-direction: column;
      }

      .left-panel, .right-panel {
        width: 100%;
      }
    }
  </style>

  <div class="overlay">
    

    <div class="right-panel">
      <div class="header-card">
        <div class="section-title">DATA KESEHATAN PASIEN </div>
      </div>

      <div class="info-box">
        <div>Nama : {{$user->name}}</div>
        <div></div>
        <div>Usia: {{$user->age}}</div>
        <div>Tinggi badan: {{$user->height}} cm</div>
        <div>Gender: {{$user->gender}}</div>
        <div>Berat badan: {{$user->weight}} kg</div>
      </div>

      <div class="data-section">
        <div class="data-item">
          <label>FEV1</label>
          <div class="data-value">{{$user->FEV1}} lt/m</div>
        </div>
        <div class="data-item">
          <label>FVC</label>
          <div class="data-value">{{$user->FVC}} lt/m</div>
        </div>
        <div class="data-item">
          <label>Kadar CO</label>
          <div class="data-value">{{$user->CO}} ppm</div>
        </div>
        <div class="data-item">
          <label>FEV/FVC</label>
          <div class="data-value">81,25%</div>
        </div>
      </div>

      <div class="status-box">
        Status PPOK: {{$user->status}}
      </div>
      <div class="notif-box">
        Notifikasi: Tingkatkan kesehatan paru anda!
      </div>
    </div>
  </div>
@endsection