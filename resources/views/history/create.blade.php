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
                        <form action="{{ route('history.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">CO</label>
                                <input type="text" class="form-control @error('CO') is-invalid @enderror" name="CO" value="{{ old('CO') }}" placeholder="Isi Kolom">
                            
                                <!-- error message untuk title -->
                                @error('CO')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">FEV1</label>
                                <input type="text" class="form-control @error('FEV1') is-invalid @enderror" name="FEV1" value="{{ old('FEV1') }}" placeholder="Isi Kolom">
                            
                                <!-- error message untuk title -->
                                @error('FEV1')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>      
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">FVC</label>
                                <input type="text" class="form-control @error('FVC') is-invalid @enderror" name="FVC" value="{{ old('FVC') }}" placeholder="Isi Kolom">
                            
                                <!-- error message untuk title -->
                                @error('FVC')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>         
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Name</label>
                                <select name="user_id" class="form-control @error('user_id') is-invalid @enderror">
                                    <option value="">-- Pilih User --</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('user_id')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
     
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">date</label>
                                <input type="date" class="form-control @error('date') is-invalid @enderror" name="Date" value="{{ old('date') }}" placeholder="Isi Kolom">
                            
                                <!-- error message untuk title -->
                                @error('date')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>    
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Status</label>
                                <select name="Status" class="form-control @error('Status     ') is-invalid @enderror">
                                    <option value="">-- Pilih Status --</option>
                                        <option value="Normal">
                                            Normal
                                        </option>
                                        <option value="Gejala Sesak Nafas">
                                            Gejala Sesak Nafas
                                        </option>
                                         </option>
                                        <option value="Sesak Nafas Ringan">
                                            Sesak Nafas Ringan
                                        </option>
                                         </option>
                                        <option value="Gejala PPOK Ringan">
                                            Gejala PPOK Ringan
                                        </option>
                                         </option>
                                        <option value="Dugaan PPOK">
                                            Dugaan PPOK
                                        </option>
                                </select>

                                @error('Status   ')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
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
