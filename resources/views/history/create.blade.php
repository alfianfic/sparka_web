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
                                        <option value="Aman">
                                            Aman
                                        </option>
                                        <option value="Gejala PPOK Ringan">
                                            Gejala PPOK Ringan
                                        </option>
                                </select>

                                @error('Status   ')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>                        

                           
                            <button type="submit" class="btn btn-md btn-primary me-3">SAVE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>

 @endsection
