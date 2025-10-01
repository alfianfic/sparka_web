@extends('layout.main')

@section('content')

<div class="col-12">
    <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">History</h6>
            </div>
        </div>
        <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
                <a href="{{ route('history.create') }}" class="btn btn-md btn-success mb-3">Add History</a>

                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">CO</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">FEV1</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                FVC</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Name</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Date</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Status</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($history as $history)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{ $history->CO }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs text-secondary mb-0">{{ $history->FEV1 }}</p>
                                
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $history->FVC }} </p>
                                
                            </td>
                            <td class="align-middle text-center">
                                <p class="text-xs font-weight-bold mb-0">{{ $history->user->name }} </p>
                                
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{$history->Date}}</span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{$history->Status}}</span>
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
</style>
@endsection
