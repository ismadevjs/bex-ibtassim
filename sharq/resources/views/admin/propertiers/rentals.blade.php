@extends('layouts.admin.master')

@section('content')

    

<div class="card">
    <div class="card-header bg-primary d-flex justify-content-between align-items-center">
        <h4>Rentals : </h4>
        <a href="{{route('rentals.add')}}" class="btn btn-success">+ Add Rental</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>title</th>
                        <th>Amenities</th>
                        <th>Suitability</th>
                        <th>Rental Types</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rentals as $rental)
                    <tr>
                        <td>{{$rental->id}}</td>
                        <td>{{$rental->name}}</td>
                        <td>
                            <ul>
                            @foreach (json_decode($rental->amenities) as $amn)
                              @foreach ($amenities as $am)
                                    @if ($amn == $am->id)
                                        
                                            <li class="badge bg-dark">{{$am->name}}</li>
                                        
                                    @endif
                                @endforeach
                            @endforeach
                        </ul>
                        </td>
                        <td>
                            <ul>
                                @foreach (json_decode($rental->suitabilities) as $amn)
                                  @foreach ($suitabilities as $am)
                                        @if ($amn == $am->id)
                                            
                                                <li class="badge bg-primary">{{$am->name}}</li>
                                            
                                        @endif
                                    @endforeach
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <ul>
                                @foreach (json_decode($rental->rentalsType) as $amn)
                                  @foreach ($rentalsType as $am)
                                        @if ($amn == $am->id)
                                            
                                                <li class="badge bg-info">{{$am->name}}</li>
                                            
                                        @endif
                                    @endforeach
                                @endforeach
                            </ul>

                        </td>
                        <td>{{$rental->created_at}}</td>
                        <td>
                            <a href="{{route('rentals.edit', ['val' => $rental->id])}}" class="btn btn-xs btn-primary"><i class="lni lni-pencil"></i></a>
                           
                            <button class="btn btn-xs btn-danger" data-bs-toggle="modal" data-original-title="test" data-bs-target="#delete-{{$rental->id}}"><i class="lni lni-close"></i></button>
                       
                            {{-- this is for delete --}}
                        <div class="modal fade" id="delete-{{$rental->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit user <span class="badge bg-dark">{{$rental->name}}</span></h5>
                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                              <form action="{{route('rentals.delete')}}" method="POST">
                                @csrf
                                <input type="hidden" value="{{$rental->id}}" name="id">
                                <input type="hidden" value="{{$rental->name}}" name="name">
                                <h2 class="text text-center mt-4"> <span class="badge bg-danger">Are you sure?</span></h2>
    
                                <div class="modal-footer">
                                  <button class="btn btn-success" type="button" data-bs-dismiss="modal">No</button>
                                  <button class="btn btn-danger" type="submit">Delete</button>
                                </div>
                              </form>
                              </div>
                            </div>
                          </div>
                       
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $rentals->links() }}

    </div>
</div>


@endsection