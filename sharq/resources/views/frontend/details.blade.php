@extends('layouts.frontend.master')

@section('content')
    @include('frontend.components.header')
    <div class="tour-details__header" style="background-image: url(/storage/featured_image/{{$product->featured_image}}); width: 100%; height:200px;">
        <div class="container">
            <div class="tour-details__gallery-links">
                <a href="#"><i class="fab fa-youtube"></i></a>
                <a href="#"><i class="fa fa-heart"></i></a>
            </div><!-- /.tour-details__gallery-links -->
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="index.html">Home</a></li>
                <li><span>Tours</span></li>
            </ul><!-- /.thm-breadcrumb -->
        </div><!-- /.container -->
    </div><!-- /.tour-details__header -->
    <section class="tour-two tour-list tour-details-two">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="tour-details__content">
                        <div class="tour-two__top">
                            <div class="tour-two__top-left">
                                <h3>{{$product->name}}</h3>
                                <div class="tour-one__stars">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star inactive"></i> 2 Reviews
                                </div><!-- /.tour-one__stars -->

                            </div><!-- /.tour-two__top-left -->
                            <div class="tour-two__right">
                                <p> {{currency($product->price)}} </p>
                            </div><!-- /.tour-two__right -->
                        </div><!-- /.tour-two__top -->
                        <ul class="tour-one__meta list-unstyled">
                            <li><a href="tour-details.html"><i class="far fa-clock"></i> {{$product->adults}} </a></li>
                            <li><a href="tour-details.html"><i class="far fa-user-circle"></i> {{$product->bed}} </a></li>
                            <li><a href="tour-details.html"><i class="far fa-bookmark"></i> {{$product->bath}} </a></li>
                            <li><a href="tour-details.html"><i class="far fa-map"></i> {{$product->location}}</a></li>
                        </ul><!-- /.tour-one__meta -->
                        <h3 class="tour-details__title">Details</h3>
                        <div class="tour-details">
                            {!! $product->description !!}
                        </div>
                    

                          <h3 class="tour-details__subtitle">Suitabilities / Amenities</h3>

                          <div class="row mb-4">
                            <div class="col-md-6">
                                <ul class="tour-details__list list-unstyled">
                                    @foreach ($suitabilities as $suit)
                                        <li>
                                            <i class="fa fa-check"></i>
                                            
                                                    {{$suit->name}}
                                            
                                        </li>
                                    @endforeach
                                </ul><!-- /.tour-details__list -->
                            </div><!-- /.col-md-6 -->
                            <div class="col-md-6">
                                <ul class="tour-details__list unavailable list-unstyled">
                                    @foreach ($amenities as $amn)
                                        <li>
                                            <i class="fa fa-info"></i>
                                        
                                                {{$amn->name}}
                                        
                                        </li>
                                    @endforeach
                                </ul><!-- /.tour-details__list -->
                            </div><!-- /.col-md-6 -->
                        </div><!-- /.row -->

                        <h3 class="tour-details__subtitle"> Rental Types </h3>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <ul class="tour-details__list list-unstyled">
                                    @foreach ($rentalsType as $rnt)
                                        <li>
                                            <i class="fa fa-arrows"></i>
                                            
                                                    {{$rnt->name}}
                                            
                                        </li>
                                    @endforeach
                                </ul><!-- /.tour-details__list -->
                            </div><!-- /.col-md-6 -->
                        </div><!-- /.row -->

                        
                        <h3 class="tour-details__title">Reviews Scores</h3><!-- /.tour-details__title -->
                        <div class="tour-details__review-score">
                            <div class="tour-details__review-score-ave">
                                <div class="my-auto">
                                    <h3>7.0</h3>
                                    <p><i class="fa fa-star"></i> Super</p>
                                </div><!-- /.my-auto -->
                            </div><!-- /.tour-details__review-score-ave -->
                            <div class="tour-details__review-score__content">
                                <div class="tour-details__review-score__bar">
                                    <div class="tour-details__review-score__bar-top">
                                        <h3>Services</h3>
                                        <p>50%</p>

                                    </div><!-- /.tour-details__review-score__bar-top -->
                                    <div class="tour-details__review-score__bar-line">
                                        <span class="wow slideInLeft" data-wow-duration="1500ms" style="width: 50%;"></span>
                                    </div><!-- /.tour-details__review-score__bar-line -->
                                </div><!-- /.tour-details__review-score__bar -->
                                <div class="tour-details__review-score__bar">
                                    <div class="tour-details__review-score__bar-top">
                                        <h3>Comfort</h3>
                                        <p>87%</p>

                                    </div><!-- /.tour-details__review-score__bar-top -->
                                    <div class="tour-details__review-score__bar-line">
                                        <span class="wow slideInLeft" data-wow-duration="1500ms" style="width: 87%;"></span>
                                    </div><!-- /.tour-details__review-score__bar-line -->
                                </div><!-- /.tour-details__review-score__bar -->
                                <div class="tour-details__review-score__bar">
                                    <div class="tour-details__review-score__bar-top">
                                        <h3>Hospitality</h3>
                                        <p>63%</p>

                                    </div><!-- /.tour-details__review-score__bar-top -->
                                    <div class="tour-details__review-score__bar-line">
                                        <span class="wow slideInLeft" data-wow-duration="1500ms" style="width: 63%;"></span>
                                    </div><!-- /.tour-details__review-score__bar-line -->
                                </div><!-- /.tour-details__review-score__bar -->
                                <div class="tour-details__review-score__bar">
                                    <div class="tour-details__review-score__bar-top">
                                        <h3>Food</h3>
                                        <p>34%</p>

                                    </div><!-- /.tour-details__review-score__bar-top -->
                                    <div class="tour-details__review-score__bar-line">
                                        <span class="wow slideInLeft" data-wow-duration="1500ms" style="width: 34%;"></span>
                                    </div><!-- /.tour-details__review-score__bar-line -->
                                </div><!-- /.tour-details__review-score__bar -->
                                <div class="tour-details__review-score__bar">
                                    <div class="tour-details__review-score__bar-top">
                                        <h3>Location</h3>
                                        <p>22%</p>

                                    </div><!-- /.tour-details__review-score__bar-top -->
                                    <div class="tour-details__review-score__bar-line">
                                        <span class="wow slideInLeft" data-wow-duration="1500ms" style="width: 22%;"></span>
                                    </div><!-- /.tour-details__review-score__bar-line -->
                                </div><!-- /.tour-details__review-score__bar -->
                                <div class="tour-details__review-score__bar">
                                    <div class="tour-details__review-score__bar-top">
                                        <h3>Rating</h3>
                                        <p>70%</p>

                                    </div><!-- /.tour-details__review-score__bar-top -->
                                    <div class="tour-details__review-score__bar-line">
                                        <span class="wow slideInLeft" data-wow-duration="1500ms" style="width: 70%;"></span>
                                    </div><!-- /.tour-details__review-score__bar-line -->
                                </div><!-- /.tour-details__review-score__bar -->
                            </div><!-- /.tour-details__review-score__content -->
                        </div><!-- /.tour-details__review-score -->

                        <div class="tour-details__review-comment">
                            <div class="tour-details__review-comment-single">
                                <div class="tour-details__review-comment-top">
                                    <img src="assets/images/tour/tour-review-1-1.jpg" alt="">
                                    <h3>Mike Hardson</h3>
                                    <p>06 Dec, 2019</p>
                                </div><!-- /.tour-details__review-comment-top -->
                                <div class="tour-details__review-comment-content">
                                    <h3>Fun Was To Discover This</h3>
                                    <p>Lorem ipsum is simply free text used by copytyping refreshing. Neque porro est qui
                                        dolorem ipsum quia quaed inventore veritatis et quasi architecto beatae vitae dicta
                                        sunt explicabo var lla sed sit amet finibus eros.</p>
                                </div><!-- /.tour-details__review-comment-content -->
                                <div class="tour-details__review-form-stars">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p><span>Services</span> <i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star "></i><i class="fa fa-star "></i><i class="fa fa-star "></i></p>
                                            <p><span>Comfort</span> <i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star "></i><i class="fa fa-star "></i><i class="fa fa-star "></i></p>
                                        </div><!-- /.col-md-4 -->
                                        <div class="col-md-4">
                                            <p><span>Services</span> <i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star "></i><i class="fa fa-star "></i><i class="fa fa-star "></i></p>
                                            <p><span>Comfort</span> <i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star "></i><i class="fa fa-star "></i><i class="fa fa-star "></i></p>
                                        </div><!-- /.col-md-4 -->
                                        <div class="col-md-4">
                                            <p><span>Services</span> <i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star "></i><i class="fa fa-star "></i><i class="fa fa-star "></i></p>
                                            <p><span>Comfort</span> <i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star "></i><i class="fa fa-star "></i><i class="fa fa-star "></i></p>
                                        </div><!-- /.col-md-4 -->
                                    </div><!-- /.row -->
                                </div><!-- /.tour-details__review-form-stars -->
                            </div><!-- /.tour-details__review-comment-single -->
                            <div class="tour-details__review-comment-single">
                                <div class="tour-details__review-comment-top">
                                    <img src="assets/images/tour/tour-review-1-2.jpg" alt="">
                                    <h3>Christine Eve</h3>
                                    <p>06 Dec, 2019</p>
                                </div><!-- /.tour-details__review-comment-top -->
                                <div class="tour-details__review-comment-content">
                                    <h3>Fun Was To Discover This</h3>
                                    <p>Lorem ipsum is simply free text used by copytyping refreshing. Neque porro est qui
                                        dolorem ipsum quia quaed inventore veritatis et quasi architecto beatae vitae dicta
                                        sunt explicabo var lla sed sit amet finibus eros.</p>
                                </div><!-- /.tour-details__review-comment-content -->
                                <div class="tour-details__review-form-stars">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p><span>Services</span> <i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star "></i><i class="fa fa-star "></i><i class="fa fa-star "></i></p>
                                            <p><span>Comfort</span> <i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star "></i><i class="fa fa-star "></i><i class="fa fa-star "></i></p>
                                        </div><!-- /.col-md-4 -->
                                        <div class="col-md-4">
                                            <p><span>Services</span> <i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star "></i><i class="fa fa-star "></i><i class="fa fa-star "></i></p>
                                            <p><span>Comfort</span> <i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star "></i><i class="fa fa-star "></i><i class="fa fa-star "></i></p>
                                        </div><!-- /.col-md-4 -->
                                        <div class="col-md-4">
                                            <p><span>Services</span> <i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star "></i><i class="fa fa-star "></i><i class="fa fa-star "></i></p>
                                            <p><span>Comfort</span> <i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star "></i><i class="fa fa-star "></i><i class="fa fa-star "></i></p>
                                        </div><!-- /.col-md-4 -->
                                    </div><!-- /.row -->
                                </div><!-- /.tour-details__review-form-stars -->
                            </div><!-- /.tour-details__review-comment-single -->
                        </div><!-- /.tour-details__review-comment -->

                        <h3 class="tour-details__title">Write a Review</h3><!-- /.tour-details__title -->
                        <div class="tour-details__review-form">
                            <div class="tour-details__review-form-stars">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p><span>Services</span> <i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star "></i><i class="fa fa-star "></i><i class="fa fa-star "></i></p>
                                        <p><span>Comfort</span> <i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star "></i><i class="fa fa-star "></i><i class="fa fa-star "></i></p>
                                    </div><!-- /.col-md-4 -->
                                    <div class="col-md-4">
                                        <p><span>Services</span> <i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star "></i><i class="fa fa-star "></i><i class="fa fa-star "></i></p>
                                        <p><span>Comfort</span> <i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star "></i><i class="fa fa-star "></i><i class="fa fa-star "></i></p>
                                    </div><!-- /.col-md-4 -->
                                    <div class="col-md-4">
                                        <p><span>Services</span> <i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star "></i><i class="fa fa-star "></i><i class="fa fa-star "></i></p>
                                        <p><span>Comfort</span> <i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star "></i><i class="fa fa-star "></i><i class="fa fa-star "></i></p>
                                    </div><!-- /.col-md-4 -->
                                </div><!-- /.row -->
                            </div><!-- /.tour-details__review-form-stars -->
                            <form action="inc/sendemail.php" class="contact-one__form">
                                <div class="row low-gutters">
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input type="text" name="name" placeholder="Your Name">
                                        </div><!-- /.input-group -->
                                    </div><!-- /.col-md-6 -->
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input type="text" name="email" placeholder="Email Address">
                                        </div><!-- /.input-group -->
                                    </div><!-- /.col-md-6 -->
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="text" name="subject" placeholder="Review Title">
                                        </div><!-- /.input-group -->
                                    </div><!-- /.col-md-12 -->
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <textarea name="message" placeholder="Write Message"></textarea>
                                        </div><!-- /.input-group -->
                                    </div><!-- /.col-md-12 -->
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <button type="submit" class="thm-btn contact-one__btn">Submit a review</button>
                                            <!-- /.thm-btn contact-one__btn -->
                                        </div><!-- /.input-group -->
                                    </div><!-- /.col-md-12 -->
                                </div><!-- /.row low-gutters -->
                            </form>
                        </div><!-- /.tour-details__review-form -->
                    </div><!-- /.tour-details__content -->

                </div><!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <div class="tour-sidebar">
                        <div class="tour-sidebar__search tour-sidebar__single">
                            <h3>Book This Tour</h3>
                            <form action="#" class="tour-sidebar__search-form">
                                <div class="input-group">
                                    <input type="text" placeholder="Your Name">
                                </div><!-- /.input-group -->
                                <div class="input-group">
                                    <input type="text" placeholder="Email Address">
                                </div><!-- /.input-group -->
                                <div class="input-group">
                                    <input type="text" placeholder="Phone">
                                </div><!-- /.input-group -->
                                <div class="input-group">
                                    <input type="text" data-provide="datepicker" placeholder="dd/mm/yy">
                                </div><!-- /.input-group -->
                                <div class="input-group">
                                    <select class="selectpicker">
                                        <option value="Tickets">Tickets</option>
                                        <option value="Children">Children</option>
                                        <option value="Adult">Adult</option>
                                    </select>
                                </div><!-- /.input-group -->
                                <div class="input-group">
                                    <textarea placeholder="Message"></textarea>
                                </div><!-- /.input-group -->
                                <div class="input-group">
                                    <button type="submit" class="thm-btn">Book Now</button>
                                </div><!-- /.input-group -->
                            </form>
                        </div><!-- /.tour-sidebar__search -->
                        <div class="offer-sidebar wow fadeInUp" data-wow-duration="1500ms" style="background-image: url(assets/images/backgrounds/offer-sidebar-bg.jpg);">
                            <h3><span class="offer-sidebar__price">20%</span><!-- /.offer-sidebar__price --> Off <br>
                                On <span>Paris <br>
                                    Tour</span></h3>
                        </div><!-- /.offer-sidebar -->
                    </div><!-- /.tour-sidebar -->
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.tour-two -->

    @include('frontend.components.footer')
@endsection