@extends('layouts.frontend.master')

@section('content')
    @include('frontend.components.header')
    
        @include('frontend.components.search')

        <div section class="tour-one">
            <div class="container">
                <div class="block-title text-center">
                    <p>Featured tours</p>
                    <h3>Most Popular Tours</h3>
                </div><!-- /.block-title -->
                <div class="row">


                  
                        
                        @include('frontend.components.cards', ['items' => $rentals])

                   


                            
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.tour-one -->


    @include('frontend.components.footer')
@endsection