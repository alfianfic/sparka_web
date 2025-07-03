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
                                <label class="font-weight-bold">gender</label>
                                <input type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender',$user->gender) }}" placeholder="Isi Kolom">

                                <!-- error messgender untuk title -->
                                @error('gender')
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
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">CO</label>
                                <input type="text" class="form-control @error('CO') is-invalid @enderror" name="CO" value="{{ old('CO',$user->CO) }}" placeholder="Isi Kolom">

                                <!-- error message untuk title -->
                                @error('CO')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">FEV1</label>
                                <input type="text" class="form-control @error('FEV1') is-invalid @enderror" name="FEV1" value="{{ old('FEV1',$user->FEV1) }}" placeholder="Isi Kolom">

                                <!-- error message untuk title -->
                                @error('FEV1')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">FEV1_max</label>
                                <input type="text" class="form-control @error('FEV1_max') is-invalid @enderror" name="FEV1_max" value="{{ old('FEV1_max',$user->FEV1_max) }}" placeholder="Isi Kolom">

                                <!-- error message untuk title -->
                                @error('FEV1_max')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">FVC</label>
                                <input type="text" class="form-control @error('FVC') is-invalid @enderror" name="FVC" value="{{ old('FVC',$user->FVC) }}" placeholder="Isi Kolom">

                                <!-- error messFVC untuk title -->
                                @error('FVC')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">FVC_max</label>
                                <input type="text" class="form-control @error('FVC_max') is-invalid @enderror" name="FVC_max" value="{{ old('FVC_max',$user->FVC_max) }}" placeholder="Isi Kolom">

                                <!-- error message untuk title -->
                                @error('FVC_max')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">status</label>
                                <input type="number" class="form-control @error('status') is-invalid @enderror" name="status" value="{{ old('status',$user->status) }}" placeholder="Isi Kolom">

                                <!-- error messstatus untuk title -->
                                @error('status')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">password</label>
                                <input type="text" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Isi Kolom">

                                <!-- error messpassword untuk title -->
                                @error('password')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">id_finger</label>
                                <input type="number" class="form-control @error('id_finger') is-invalid @enderror" name="id_finger"                                 
                                value="{{isset($user->fingerprint) ? old('status',$user->fingerprint->id_fingerprint) : ''}}" 
                                placeholder="Isi Kolom">

                                <!-- error messpassword untuk title -->
                                @error('id_finger')
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
