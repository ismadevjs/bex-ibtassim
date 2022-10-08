@extends('layouts.admin.master')

@section('content')

    

<div class="card">
    <div class="card-header  bg-dark text-white d-flex justify-content-between align-items-center">
      <h4>categories : </h4>

        <button class="btn btn-success" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#add_user">+ Add categories</button>
                    
  
    </div>

    <div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add new category</h5>
              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
        
                @csrf
                

                <div class="mt-4">
                  <label for="">Filiers</label>
                  <select class="form-control" name="filier_id"  required>
                    <option value="-">-</option>
                      @foreach ($filiers as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                      @endforeach
                  </select>
              </div>


                <div class="mt-4">
                    <label for="">Name</label>
                    <input class="form-control" type="text" placeholder="..." name="name" required>
                </div>
                <div class="mt-4">
                  <label for="">icon</label>
                  <input class="form-control icon" type="file" placeholder="..." name="icon">
                </div>
                <div class="mt-4">
                    <label for="">slug</label>
                    <input class="form-control" type="text" placeholder="..." name="slug">
                </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success" type="button" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-dark" type="submit">Save changes</button>
          </div>
        </form>
        </div>
      </div>
    </div>

    
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>filiers</th>
                        <th>icon</th>
                        <th>title</th>
                        <th>slug</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($categories as $amn)
                        
                    <tr>
                        <td>{{$amn->id}}</td>
                        
                        <td>@if ($amn->filiers != null)
                          {{ $amn->filiers->name }}
                        @endif</td>
                        <td>
                          <img src="/storage/icon/{{ $amn->icon }}" height="100" width="100" class="rounded-cirle" alt="">
                        </td>
                        <td>{{$amn->name}}</td>
                        <td>{{$amn->slug}}</td>
                        <td>
                            
                            <button class="btn btn-xs btn-primary"  data-bs-toggle="modal" data-original-title="test" data-bs-target="#edit-{{$amn->id}}"><i class="lni lni-pencil"></i></button>
                           
                            <button class="btn btn-xs btn-danger" data-bs-toggle="modal" data-original-title="test" data-bs-target="#delete-{{$amn->id}}"><i class="lni lni-close"></i></button>

                        </td>

                        {{-- this model for update --}}


                        <div class="modal fade" id="edit-{{$amn->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update category {{$amn->name}}</h5>
                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                              <form action="{{route('categories.update')}}" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                              
                                      @csrf

                                      <div class="mt-4">
                                        <label for="">Filiers</label>
                                        <select class="form-control" name="filier_id"  required>
                                          <option value="-">-</option>
                                            @foreach ($filiers as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                      
                                      <div class="mt-4">
                                          <label for="">Name</label>
                                          <input class="form-control" type="text" placeholder="..." name="name" value="{{$amn->name}}" required>
                                      </div>
                                    
                                      <div class="mt-4">
                                          <label for="">icon</label>
                                          <input class="form-control" type="file" placeholder="..." name="icon" >
                                      </div>
                                      <div class="mt-4">
                                          <label for="">slug</label>
                                          <input class="form-control" type="text" placeholder="..." value="{{$amn->slug}}" readonly name="slug">
                                      </div>
                                </div>
                                <div class="modal-footer">
                                  <button class="btn btn-success" type="button" data-bs-dismiss="modal">Close</button>
                                  <button class="btn btn-dark" type="submit">Save changes</button>
                                </div>
                              </form>
                              </div>
                            </div>
                          </div>

                        {{-- this is for delete --}}
                        <div class="modal fade" id="delete-{{$amn->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit user <span class="badge bg-dark">{{$amn->name}}</span></h5>
                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                              <form action="{{route('categories.delete')}}" method="POST">
                                @csrf
                                <input type="hidden" value="{{$amn->id}}" name="id">
                                <input type="hidden" value="{{$amn->name}}" name="name">
                                <h2 class="text text-center mt-4"> <span class="badge bg-danger">Are you sure?</span></h2>
    
                                <div class="modal-footer">
                                  <button class="btn btn-success" type="button" data-bs-dismiss="modal">No</button>
                                  <button class="btn btn-danger" type="submit">Delete</button>
                                </div>
                              </form>
                              </div>
                            </div>
                          </div>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        {{ $categories->links('pagination::bootstrap-4') }}

    </div>
</div>


@push('scripts')

<script src="{{asset('assets/js/filepond.js')}}"></script>

<script>

    // Create a FilePond instance
    const pond = FilePond.create(document.querySelector('.icon'));
    
  
   

    FilePond.setOptions({
        server : {
            url : "{{route('upload')}}",
            headers: {
                'X-CSRF-TOKEN' : '{{csrf_token()}}'
            }
        }
    })

  </script>
@endpush

@endsection

