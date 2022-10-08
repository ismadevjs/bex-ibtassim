@extends('layouts.admin.master')

@section('content')

    


    <form action="{{route('rentals.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
           <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                       Add new Rental
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <label for="">Name :</label>
                            <input class="form-control" type="text" name="name" placeholder="..." required>
                        </div>
                        <div class="mb-4">
                            <label for="">Description :</label>
                            <textarea id="editor1" cols="30" rows="10" class="form-control" type="text" name="description" placeholder="..."></textarea>
                        </div>
                        <div class="row">
                            <div class="mb-4 col-6">
                                <label for="">Price :</label>
                                <input class="form-control" type="text" name="price" placeholder="..." required>
                            </div>
                            <div class="mb-4 col-6">
                                <label for="">Max People :</label>
                                <input class="form-control" type="text" name="adults" placeholder="..." required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-4 col-6">
                                <label for="">Max children :</label>
                                <input class="form-control" type="text" name="children" placeholder="..." required>
                            </div>
                            <div class="mb-4 col-6">
                                <label for="">No. Bed :</label>
                                <input class="form-control" type="text" name="bed" placeholder="..." required>
                            </div>
                        </div>

                        
                        <div class="row">
                            <div class="mb-4 col-6">
                                <label for="">No. Bath :</label>
                                <input class="form-control" type="text" name="bath" placeholder="..." required>
                            </div>
                            <div class="mb-4 col-6">
                                <label for="">Rooms :</label>
                                <input class="form-control" type="text" name="rooms" placeholder="..." required>
                            </div>
                        </div>
                      
                        <div class="mb-4">
                            <label for="">Rental Video <span class="badge bg-warning">Youtube URL</span> :</label>
                            <input class="form-control" type="text" name="video" placeholder="...">
                        </div>


                        <div class="mb-4">
                            <label for="">Rental location :</label>
                            <input class="form-control" type="text" name="location" placeholder="..." required>
                        </div>


                        <div class="mb-4 form-check">
                            <input class="form-check-input" type="checkbox" name="featured">
                            <label class="form-check-label" for="flexCheckDefault">
                                Featured
                              </label>
                        </div>

                      
                    <div class="col-12">
                        <div class="mb-4">
                            <button class="btn btn-dark" type="reset">Reset</button>
                            <button class="btn btn-success" type="button" onclick="submit()">Save</button>
                        </div>
                    </div>
     
                        
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                        Amenities
                    </div>
                    <div class="card-body">
                        @foreach ($amenities as $amn)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{$amn->id}}" name="amenities[]" required>
                            <label class="form-check-label" for="flexCheckDefault">
                                {{$amn->name}}
                              </label>
                            </div>
                            @endforeach
                    </div>
                </div>
                <div class="card">
                    <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                        Suitabilities
                    </div>
                    <div class="card-body">
                        @foreach ($suitabilities as $suit)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{$suit->id}}" name="suitabilities[]" required>
                            <label class="form-check-label" for="flexCheckDefault">
                                {{$suit->name}}
                              </label>
                            </div>
                            @endforeach
                    </div>
                </div>
                <div class="card">
                    <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                        Rental Types
                    </div>
                    <div class="card-body">
                        @foreach ($rentalstype as $ren)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{$ren->id}}" name="rentalsType[]" required>
                            <label class="form-check-label" for="flexCheckDefault">
                                {{$ren->name}}
                              </label>
                            </div>
                            @endforeach
                    </div>
                </div>
                

                <div class="card">
                    <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                        Feature image
                    </div>
                    <div class="card-body">
                       <div class="mb-4">
                            <input type="file" class="form-control" id='featured_image' name="featured_image" accept="image/*">
                       </div>
                    </div>
                </div>

           

                <div class="card">
                    <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                        Gallery
                    </div>
                    <div class="card-body">
                       <div class="mb-4">
                            <input type="file" class="form-control" id="gallery" name="gallery" multiple accept="image/*">
                       </div>
                    </div>
                </div>
                

            </div>
           
        </div>

</form>


@endsection

@push('scripts')

<script src="{{asset('assets/js/filepond.js')}}"></script>

<script>

    // Create a FilePond instance
    const pond = FilePond.create(document.querySelector("#featured_image"));
  
    FilePond.setOptions({
        server : {
            url : "{{route('upload')}}",
            headers: {
                'X-CSRF-TOKEN' : '{{csrf_token()}}'
            }
        }
    })

    const pond1 = FilePond.create(document.querySelector("#gallery"));
  
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