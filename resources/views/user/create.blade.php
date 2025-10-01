@extends('layout.main')

@section('content')

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama">
                            
                                <!-- error message untuk title -->
                                @error('name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">E-mail</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Masukkan E-mail">
                            
                                <!-- error message untuk title -->
                                @error('email')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Age</label>
                                <input type="text" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" placeholder="Masukkan Usia">
                            
                                <!-- error message untuk title -->
                                @error('age')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>      
                          <div class="form-group mb-3">
                            <label class="font-weight-bold">Gender</label>
                            <select class="form-control @error('gender') is-invalid @enderror" name="gender">
                                <option value="" disabled selected>Pilih Jenis Kelamin
                                    <style>
                                        
                                    </style>
                                </option>
                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Height (cm)</label>
                                <input type="text" class="form-control @error('height') is-invalid @enderror" name="height" value="{{ old('height') }}" placeholder="Hanya tulis angka">
                            
                                <!-- error message untuk title -->
                                @error('height')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>         
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Weight (kg)</label>
                                <input type="text" class="form-control @error('weight') is-invalid @enderror" name="weight" value="{{ old('weight') }}" placeholder="Hanya tulis angka">
                            
                                <!-- error message untuk title -->
                                @error('weight')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>   
                            <!-- <div class="form-group mb-3">
                                <label class="font-weight-bold">password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Isi Kolom"> -->
                            
                                <!-- error messpassword untuk title -->
                                @error('password')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            <!-- </div>               -->
                            <button type="submit" class="btn save">SAVE</button>
                            <button type="reset" class="btn reset">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>

<style>
      body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #013064, #ff7f7e);
    background-attachment: fixed;
    color: #0B3D91;
  }
    .reset {
        background-color: #ff7f7e !important;
        border-color: #ff7f7e !important;
        color: white !important;
        font-weight: bold;
    }
    .save {
        background-color: #013064 !important; 
        border-color: #013064 !important;
        color: white !important;
        font-weight: bold;
    }

    input.form-control,
    select.form-control,
    textarea.form-control {
        background-color: #f0f0f0 !important;  
        border-color: #ddd !important;
        color: #001a4d !important;
        padding: 10px !important;
    }

    input.form-control.filled,
    select.form-control.filled,
    textarea.form-control.filled {
        background-color: #e9f1ff !important; 
        border-color: #c1d4ff !important;
    }

    input.form-control:focus,
    select.form-control:focus,
    textarea.form-control:focus {
        border-color: #80aaff !important;
        box-shadow: none !important;
    }

</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const fields = document.querySelectorAll(".form-control");

        function checkFilled(field) {
            if (field.value.trim() !== "") {
                field.classList.add("filled");
            } else {
                field.classList.remove("filled");
            }
        }

        // Saat load halaman, cek jika ada old() dari Laravel
        fields.forEach(checkFilled);

        // Saat ada input dari user
        fields.forEach(field => {
            field.addEventListener("input", () => checkFilled(field));
        });

        // Saat tombol reset ditekan
        document.querySelector("form").addEventListener("reset", () => {
            setTimeout(() => {
                fields.forEach(field => field.classList.remove("filled"));
            }, 0);
        });
    });
</script>


 @endsection
