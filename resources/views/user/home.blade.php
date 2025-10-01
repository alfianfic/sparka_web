`@extends('layout.main')

@section('content')
    <div class="container col-12">
        @auth
        <div class="header">
            <h1>Data Pasien</h1>
            <img src="{{asset('gambar/gambardokter.png')}}" alt="Dokter">
        </div>

        <div class="cards">
            @foreach ($users as $user)

            <div class="card">
                <h2>{{ $user->name }}</h2>
                <p>Usia :  {{ $user->age }}</p>
                <p>Gender :  {{ $user->gender }}</p>
                <a class="detail-link" href="/users/{{$user->id}}">Detail Pasien →</a>
            </div>
            @endforeach
        </div>
        @endauth
        @guest
        <div style="height:50px"></div>
        <div class="header">
            <h1>Selamat Datang</h1>
            <img src="{{asset('gambar/gambardokter.png')}}" alt="Dokter">
        </div>
        <div style="height:50px"></div>
        <!-- <div class="header"> -->
        <div>
             <div class="form-group mb-3">
            @guest
                <form action="/login" method="POST">
                    @csrf
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <label for="email" style="font-weight: bold; color: black; ">Email</label>
                    <div align='center'>
                        <input type="text" value="{{ old('email') }}" placeholder="Masukkan E-Mail" class="form-control @error('email') is-invalid @enderror" name="email" id="email" style="width:97%; border: solid 1pt black; margin-bottom:10pt; padding: 10px; background: white;">
                        <!-- error message untuk title -->
                                    @error('email')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                    </div>
                    <label for="password" style="font-weight: bold; color: black;">Password</label>
                    <div align='center'>
                        <!-- error message untuk title -->
                                    @error('password')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                        <input type="password" value="{{ old('password') }}" placeholder="Masukkan Password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" style="width:97%; border: solid 1pt black; margin-bottom:10pt;padding: 10px; background: white;">
                    </div>
                    <div align='center'>
                        <button type="submit" class="btn btn-custom btn-login">Login</button>
                    </div>
                </form>
            @endguest
            
      </div>
    </div>
        </div>
        @endguest
        <div style="height:70px"></div>
        <div style="">
            @auth
                <form action="/logout" method="POST">
                    @csrf
                    <div align='center'>
                        <p class="font-weight-bold">Login as {{Auth::user()->name}}</p>
                        <button type="submit" class="btn btn-custom btn-logout">Logout</button>
                    </div>
                </form>
            @endauth
        </div>

    </div>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        .btn-custom:hover {
            background: linear-gradient(135deg, #357ABD, #2C5AA0); /* lebih gelap pas hover */
            transform: scale(1.05);
        }
        
        .btn-logout {
            background: linear-gradient(135deg, #dc3545, #c82333); 
            font-color: white;
        }

        .btn-login {
            background: linear-gradient(135deg, #0250a8ff, #013064);
        }

        body {
            background: linear-gradient(135deg, #013064, #ff7f7e);
            background-attachment: fixed;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            color: #0B3D91;
            min-height: 100vh;
            animation: fadeIn 1.2s ease-in;
        }
 
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .container {
            /* max-width: 1000px; */
            margin: auto;
            padding: 2rem;
            background: url('gambar/bgweb12.png') no-repeat center center fixed;
            background-size: cover;

        }

        .header {
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            backdrop-filter: blur(8px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease, border 0.3s ease;
            animation: fadeInUp 0.8s ease forwards;
            opacity: 0;
            border: 2px solid transparent;
        }

        @keyframes slideInTop {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header h1 {
            font-size: 2.2rem;
            margin: 0;
            color: #032559;
        }
        
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .card {
            background-color: #ffffff;
            color: #032559;
            padding: 1.5rem;
            border-radius: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease, border 0.3s ease;
            animation: fadeInUp 0.8s ease forwards;
            opacity: 0;
            border: 2px solid transparent;
        }

        .card:nth-child(1) {
            animation-delay: 0.2s;
        }

        .card:nth-child(2) {
            animation-delay: 0.4s;
        }

        .card:nth-child(3) {
            animation-delay: 0.6s;
        }

        .card:nth-child(4) {
            animation-delay: 0.8s;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.35);
            border: 2px solid #007bff;
        }

        .card h2 {
            margin-top: 0;
            font-size: 1.5rem;
        }

        .card p {
            margin: 0.5rem 0;
            font-size: 1rem;
            color: #333;
        }

        .detail-link {
            display: inline-block;
            margin-top: 1rem;
            color: #032559;
            text-decoration: none;
            font-weight: 600;
            transition: transform 0.2s ease, color 0.2s ease;
        }

        .detail-link:hover {
            transform: scale(1.05);
            color: #0d47a1;
            text-decoration: underline;
        }

        img {
            max-height: 120px;
            transition: transform 0.3s ease;
        }

        img:hover {
            transform: scale(1.05);
        }
    </style>
@endsection
