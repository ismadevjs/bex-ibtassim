@extends('layouts.admin.master')

@section('content')


<div class="card">
    <div class="card-header  bg-dark text-white d-flex justify-content-between align-items-center">
      <h4>Click Generate Button to generate your token : </h4>

        {{-- <button class="btn btn-success" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#add_user"></button> --}}
                    
  
    </div>


    <div class="card-body">

        <form action="{{ route('api.token') }}" method="POST">
            @csrf
            <div class="mb-4">
                <input type="text" class="form-control" placeholder="your token ..." value="{{ $api->token }}" readonly>
               
            </div>
            <div class="mb-4">
                <button class="btn btn-success">Generate</button>
            </div>
        </form>

    </div>


    </div>
</div>

@endsection