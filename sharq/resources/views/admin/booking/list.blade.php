@extends('layouts.admin.master')

@section('content')

    

<div class="card">
    <div class="card-header">
        <button class="btn btn-success">+ Add Rental</button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>customer</th>
                        <th>rental name</th>
                        <th>Check-in/Check-out	</th>
                        <th>price</th>
                        <th>order date </th>
                        <th>status</th>
                        <th>Actions</th>
                        <th>exports</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>id</th>
                        <th>customer</th>
                        <th>rental name</th>
                        <th>Check-in/Check-out	</th>
                        <th>price</th>
                        <th>order date </th>
                        <th>status</th>
                        <th>Actions</th>
                        <th>exports</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection