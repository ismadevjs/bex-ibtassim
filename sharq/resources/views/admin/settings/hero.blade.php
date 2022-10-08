@extends('layouts.admin.master')

@section('content')

    


    <form action="{{route('settings.heroStore')}}" method="POST" enctype="multipart/form-data">
        @csrf
           <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                       Hero Settings
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <label for="">Heading :</label>
                            <input class="form-control" type="text" name="heading" value="{{$hero->heading}}" placeholder="..." required>
                        </div>
                    
                        <div class="mb-4">
                            <label for="">Sub heading :</label>
                            <input class="form-control" type="text" name="sub" value="{{$hero->sub}}" placeholder="..." >
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
                        Feature image
                    </div>
                    <div class="card-body">
                       <div class="mb-4">
                            <input type="file" class="form-control" id='hero-img' name="hero" accept="image/*">
                       </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                        Feature image
                    </div>
                    <div class="card-body">
                       <div class="mb-4" align="center">
                            <img src="/storage/heroimg/{{$hero->hero}}" class="rounded" width="250" height="250"   alt="">
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
    const pond = FilePond.create(document.querySelector("#hero-img"));
  
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