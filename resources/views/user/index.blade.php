@extends('layout.main')

@section('content')

<div class="col-12">
    <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">List Pasien</h6>
            </div>
        </div>
        <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
                <a href="{{ route('users.create') }}" class="btn btn-md btn-success mb-3">Add User</a>

                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">List Pasien</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Gender /
                                Age</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Tinggi & Berat Badan</th>
                            <th class="text-secondary opacity-7"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
                                        <p class="text-xs text-secondary mb-0">{{ $user->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $user->age }} th</p>
                                <p class="text-xs font-weight-bold mb-0">{{ $user->gender }}</p>
                            </td>
                            <td class="align-middle text-center">
                                <p class="text-xs font-weight-bold mb-0">{{ $user->height }} cm</p>
                                <p class="text-xs font-weight-bold mb-0">{{ $user->weight }} kg</p>
                            </td>
                            
                           <td class="align-middle">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('users.destroy', $user->id) }}" method="POST">
                                @csrf
                                
                                <a href="{{ route('users.show', $user->id) }}" class="action-link btn-primary" data-toggle="tooltip">Show</a>
                                <span>|</span>
                                
                                <a href="{{ route('users.edit', $user->id) }}" class="action-link btn-primary" data-toggle="tooltip">Edit</a>
                                <span>|</span>
                                
                                <a href="history/{{ $user->id }}" class="action-link" data-toggle="tooltip">Riwayat</a>
                                <span>|</span>

                                @method('DELETE')
                                <button type="submit" class="btn-custom-hapus" data-toggle="tooltip">Hapus</button>
                            </form>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
td .action-link {
    font-size: 12px;
    font-weight: 500;
    padding: 2px 6px;
    border-radius: 4px;
    display: inline-block;
    vertical-align: middle;
    text-decoration: none;
}


td .action-link.btn-primary {
    background-color: #013064;
    color: white;
    font-weight: bold
}

/* Gaya tombol hapus */
.btn-custom-hapus {
    background: linear-gradient(135deg, #dc3545, #c82333); 
    color: white;
    border: none;
    padding: 2px 6px;
    border-radius: 4px;
    font-size: 12px;
    font-weight: 500;
    line-height: 1.2;
    display: inline-block;
    vertical-align: middle;
    cursor: pointer;
    font-weight: bold;
}

</style>
@endsection
