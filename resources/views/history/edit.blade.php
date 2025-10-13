@extends('layout.main')

@section('content')

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" placeholder="Isi Kolom">
                            
                                <!-- error message untuk title -->
                                @error('name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" placeholder="Isi Kolom">
                            
                                <!-- error message untuk title -->
                                @error('email')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">age</label>
                                <input type="text" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age',$user->age) }}" placeholder="Isi Kolom">
                            
                                <!-- error message untuk title -->
                                @error('age')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>      
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">weight</label>
                                <input type="text" class="form-control @error('weight') is-invalid @enderror" name="weight" value="{{ old('weight',$user->weight) }}" placeholder="Isi Kolom">
                            
                                <!-- error message untuk title -->
                                @error('weight')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>         
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">height</label>
                                <input type="text" class="form-control @error('height') is-invalid @enderror" name="height" value="{{ old('height', $user->height) }}" placeholder="Isi Kolom">
                            
                                <!-- error message untuk title -->
                                @error('height')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>           

                            <button type="submit" class="btn btn-md btn-primary me-3">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
