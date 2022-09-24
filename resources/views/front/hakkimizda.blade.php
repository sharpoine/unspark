@extends('front.layouts.app')
@section('content')
    <section class="page-title bg-cover" data-background="{{asset('frontDist/images/backgrounds/page-title.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="display-1 text-white font-weight-bold font-primary">About Agen</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- /page-title -->


    <!-- team -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto text-center">
                    <h2>Our Team</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
                    <div class="section-border"></div>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-3 col-sm-6">
                    <div class="card hover-shadow">
                        <img src="images/team/member-1.jpg" alt="team-member" class="card-img-top">
                        <div class="card-body text-center position-relative zindex-1">
                            <h4><a class="text-dark" href="team-single.html">Sara Adams</a></h4>
                            <i>Designer</i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card hover-shadow">
                        <img src="images/team/member-2.jpg" alt="team-member" class="card-img-top">
                        <div class="card-body text-center position-relative zindex-1">
                            <h4><a class="text-dark" href="team-single.html">Tom Bills</a></h4>
                            <i>Developer</i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card hover-shadow">
                        <img src="images/team/member-3.jpg" alt="team-member" class="card-img-top">
                        <div class="card-body text-center position-relative zindex-1">
                            <h4><a class="text-dark" href="team-single.html">Anna Walle</a></h4>
                            <i>Manager</i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card hover-shadow">
                        <img src="images/team/member-4.jpg" alt="team-member" class="card-img-top">
                        <div class="card-body text-center">
                            <h4>Devid Json</h4>
                            <i>CEO</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /team -->

    <!-- testimonial-slider -->
    <section class="section bg-secondary">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="text-white mb-5">Our Client Testimonails</h2>
                </div>
            </div>
            <div class="row bg-contain" data-background="images/banner/brush.png">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div id="slider" class="ui-card-slider bg-contain">
                        <div class="slide">
                            <div class="card text-center">
                                <div class="card-body px-5 py-4">
                                    <img src="images/testimonial/user-1.jpg" alt="user-1"
                                        class="img-fluid rounded-circle mb-4">
                                    <h4 class="text-secondary">Mellissa Christine</h4>
                                    <p>“Great work I got a lot more than what I ordered, they are very legítimas and catchy.
                                        I went for one
                                        of them for my brand but is always better to have more options.”</p>
                                </div>
                            </div>
                        </div>
                        <div class="slide">
                            <div class="card text-center">
                                <div class="card-body px-5 py-4">
                                    <img src="images/testimonial/user-1.jpg" alt="user-1"
                                        class="img-fluid rounded-circle mb-4">
                                    <h4 class="text-secondary">Mellissa Christine</h4>
                                    <p>“Great work I got a lot more than what I ordered, they are very legítimas and catchy.
                                        I went for one
                                        of them for my brand but is always better to have more options.”</p>
                                </div>
                            </div>
                        </div>
                        <div class="slide">
                            <div class="card text-center">
                                <div class="card-body px-5 py-4">
                                    <img src="images/testimonial/user-1.jpg" alt="user-1"
                                        class="img-fluid rounded-circle mb-4">
                                    <h4 class="text-secondary">Mellissa Christine</h4>
                                    <p>“Great work I got a lot more than what I ordered, they are very legítimas and catchy.
                                        I went for one
                                        of them for my brand but is always better to have more options.”</p>
                                </div>
                            </div>
                        </div>
                        <div class="slide">
                            <div class="card text-center">
                                <div class="card-body px-5 py-4">
                                    <img src="images/testimonial/user-1.jpg" alt="user-1"
                                        class="img-fluid rounded-circle mb-4">
                                    <h4 class="text-secondary">Mellissa Christine</h4>
                                    <p>“Great work I got a lot more than what I ordered, they are very legítimas and catchy.
                                        I went for one
                                        of them for my brand but is always better to have more options.”</p>
                                </div>
                            </div>
                        </div>
                        <div class="slide">
                            <div class="card text-center">
                                <div class="card-body px-5 py-4">
                                    <img src="images/testimonial/user-1.jpg" alt="user-1"
                                        class="img-fluid rounded-circle mb-4">
                                    <h4 class="text-secondary">Mellissa Christine</h4>
                                    <p>“Great work I got a lot more than what I ordered, they are very legítimas and catchy.
                                        I went for one
                                        of them for my brand but is always better to have more options.”</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /testimonial-slider -->

    <!-- call to action -->
    <section class="section">
        <div class="container section-sm overlay-secondary-half bg-cover" data-background="images/backgrounds/cta-bg.jpg">
            <div class="row">
                <div class="col-lg-8 offset-lg-1">
                    <h2 class="text-gradient-primary">Let's Start With Us!</h2>
                    <p class="h4 font-weight-bold text-white mb-4">Lorem ipsum dolor sit amet, magna habemus ius ad</p>
                    <a href="contact.html" class="btn btn-lg btn-primary">Let’s talk</a>
                </div>
            </div>
        </div>
    </section>


@endsection
