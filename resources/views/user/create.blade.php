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

                        <!-- NAME -->
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama">
                        
                            @error('name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- EMAIL -->
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">E-mail</label>
                            <input type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   name="email" 
                                   id="email"
                                   value="{{ old('email') }}" 
                                   placeholder="Masukkan E-mail" 
                                   required>

                            @error('email')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror

                            <!-- real-time error -->
                            <div id="email-error" class="alert alert-danger mt-2" style="display:none;">
                                Format e-mail tidak valid. Gunakan format seperti xyz1@gmail.com
                            </div>
                        </div>

                        <!-- AGE -->
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Age</label>
                            <input type="text" class="form-control @error('age') is-invalid @enderror" name="age" id="age" value="{{ old('age') }}" placeholder="Masukkan Usia">
                        
                            @error('age')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div id="age-error" class="alert alert-danger mt-2" style="display:none;">
                                Usia harus berupa angka.
                            </div>
                        </div>      

                        <!-- GENDER -->
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Gender</label>
                            <select class="form-control @error('gender') is-invalid @enderror" name="gender">
                                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- HEIGHT -->
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Height (cm)</label>
                            <input type="text" class="form-control @error('height') is-invalid @enderror" name="height" id="height" value="{{ old('height') }}" placeholder="Hanya tulis angka">
                        
                            @error('height')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div id="height-error" class="alert alert-danger mt-2" style="display:none;">
                                Tinggi harus berupa angka.
                            </div>
                        </div>         

                        <!-- WEIGHT -->
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Weight (kg)</label>
                            <input type="text" class="form-control @error('weight') is-invalid @enderror" name="weight" id="weight" value="{{ old('weight') }}" placeholder="Hanya tulis angka">
                        
                            @error('weight')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div id="weight-error" class="alert alert-danger mt-2" style="display:none;">
                                Berat harus berupa angka.
                            </div>
                        </div>   

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

    fields.forEach(checkFilled);
    fields.forEach(field => {
        field.addEventListener("input", () => checkFilled(field));
    });

    document.querySelector("form").addEventListener("reset", () => {
        setTimeout(() => {
            fields.forEach(field => field.classList.remove("filled"));
            document.getElementById("email-error").style.display = 'none';
            document.getElementById("age-error").style.display = 'none';
            document.getElementById("height-error").style.display = 'none';
            document.getElementById("weight-error").style.display = 'none';
        }, 0);
    });

    // =============================
    // VALIDASI REAL-TIME
    // =============================
    const emailInput = document.getElementById('email');
    const emailError = document.getElementById('email-error');

    const ageInput = document.getElementById('age');
    const ageError = document.getElementById('age-error');

    const heightInput = document.getElementById('height');
    const heightError = document.getElementById('height-error');

    const weightInput = document.getElementById('weight');
    const weightError = document.getElementById('weight-error');

    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

    function validateNumeric(value) {
        return /^[0-9]+$/.test(value);
    }

    emailInput.addEventListener('input', function() {
        if (emailInput.value.trim() === '') {
            emailError.style.display = 'none';
            emailInput.classList.remove('is-invalid');
        } else if (!validateEmail(emailInput.value)) {
            emailError.style.display = 'block';
            emailInput.classList.add('is-invalid');
        } else {
            emailError.style.display = 'none';
            emailInput.classList.remove('is-invalid');
        }
    });

    ageInput.addEventListener('input', function() {
        if (ageInput.value.trim() === '' || validateNumeric(ageInput.value)) {
            ageError.style.display = 'none';
            ageInput.classList.remove('is-invalid');
        } else {
            ageError.style.display = 'block';
            ageInput.classList.add('is-invalid');
        }
    });

    heightInput.addEventListener('input', function() {
        if (heightInput.value.trim() === '' || validateNumeric(heightInput.value)) {
            heightError.style.display = 'none';
            heightInput.classList.remove('is-invalid');
        } else {
            heightError.style.display = 'block';
            heightInput.classList.add('is-invalid');
        }
    });

    weightInput.addEventListener('input', function() {
        if (weightInput.value.trim() === '' || validateNumeric(weightInput.value)) {
            weightError.style.display = 'none';
            weightInput.classList.remove('is-invalid');
        } else {
            weightError.style.display = 'block';
            weightInput.classList.add('is-invalid');
        }
    });

});
</script>

@endsection
