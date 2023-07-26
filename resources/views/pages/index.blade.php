<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Laravel Portfolio</title>

        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.icon" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href=" {{asset('css/styles.css')}} " rel="stylesheet" />

        <style>
            .card1{
                transition: 0.3s;
            }
            .card1:hover{

                background-color: bisque;
                box-shadow: 10px 10px;
                border-radius: 10px;
            }

            ._image{
                opacity: 0.7;
                transition: 0.3s;
            }

            ._image:hover{
                opacity: 1;;
            }
        </style>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><img src="assets/img/navbar-logo.svg" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#team">Team</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead" style="background-image: url(<?php echo $main->bc_img; ?>);" >
            <div class="container">
                <div class="masthead-subheading">{{ $main->sub_title }}</div>
                <div class="masthead-heading text-uppercase">
                    <h2> <i>{{ $main->title }}</i></h2>

                </div>

                <a class="btn btn-primary btn-xl text-uppercase" href="{{ url($main->resume) }}">Resume</a>
            </div>
        </header>

        <!-- Services-->

        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Services</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
                <div class="row text-center">
                    @if (count($services)> 0)
                        @foreach ($services as $service)

                        <div class="col-md-4 text-center card1 p-3 ">

                            <span class="fa-stack fa-4x">
                                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                <i class="<?php echo $service->icon  ?>  fa-stack-1x fa-inverse"></i>
                            </span>
                            <h5 class="my-3" > {{$service->title}} </h5>
                            <p class="text-muted">{{$service->description}}</p>

                        </div>
                        @endforeach

                    @endif



                </div>
            </div>
        </section>



        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Portfolio</h2>
                    <h3 class="section-subheading text-muted">Hey Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
                <div class="row">
                    @if (count($portfolio)>0)
                        @foreach ($portfolio as $port)
                            <div class="col-lg-4 col-sm-6 mb-4">

                                    <div class="portfolio-item">
                                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal<?php echo $port->id ?>">
                                            <div class="portfolio-hover">
                                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                            </div>
                                            <img style="width: 100%; height: 200px" class="img-fluid" src=" {{ url('public/img/'.$port->small_img) }} " alt="..." />
                                        </a>
                                    <div class="portfolio-caption">
                                        <div class="portfolio-caption-heading">{{ $port->client}}</div>
                                        <div class="portfolio-caption-subheading text-muted">{{ $port->category}}</div>
                                    </div>

                                </div>
                            </div>
                    @endforeach

                    @endif

               </div>
            </div>
        </section>



        <!-- About-->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">About</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
                <ul class="timeline">
                    @if (count($abouts)> 0 )

                        @foreach ($abouts as $about )
                        <li>
                            <div class="timeline-image"><img class="rounded-circle img-fluid" " src="{{ url('public/img/'.$about->image) }} " alt="..." /></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>{{ $about->title }}</h4>
                                    <h4 class="subheading"> {{ $about->sub_title }} </h4>
                                </div>
                                <div class="timeline-body"><p class="text-muted">{{ $about->description}}</div>
                            </div>
                        </li>
                        @endforeach

                    @endif

                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>
                                Be Part
                                <br />
                                Of Our
                                <br />
                                Story!
                            </h4>
                        </div>
                    </li>
                </ul>
            </div>
        </section>



        <!-- Team-->
        <section class="page-section bg-light" id="team">
            <div class="container ">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
                <div class="row p-3">
                   @if (count($teams) > 0)

                   @foreach ($teams as $team)
                        <div class="col-lg-4">
                            <div class="team-member">
                                <img class="mx-auto _image rounded-circle" src="{{ url('public/img/'.$team->image) }}" alt="..." />
                                <h4>{{ $team->name }}</h4>
                                <p class="text-muted">{{ $team->position }}</p>
                                <a class="btn btn-success btn-social mx-2" href="#!" aria-label="Parveen Anand Twitter Profile"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-danger btn-social mx-2" href="#!" aria-label="Parveen Anand Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-info btn-social mx-2" href="#!" aria-label="Parveen Anand LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                   @endforeach

                   @endif


                </div>
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p></div>
                </div>
            </div>
        </section>
        <!-- Clients-->
        <div class="py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/microsoft.svg" alt="..." aria-label="Microsoft Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/google.svg" alt="..." aria-label="Google Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/facebook.svg" alt="..." aria-label="Facebook Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/ibm.svg" alt="..." aria-label="IBM Logo" /></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Contact Us</h2>
                    <h3 class="section-subheading text-light">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>

                @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif

            <form method="POST" action=" {{route('contact.store') }} " id="contactUSForm">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <input type="text" name="name" class="form-control p-2" placeholder="Name" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Email:</strong>
                            <input type="text" name="email" class="form-control p-2" placeholder="Email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Phone:</strong>
                            <input type="text" name="phone" class="form-control p-2" placeholder="Phone" value="{{ old('phone') }}">
                            @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Subject:</strong>
                            <input type="text" name="subject" class="form-control p-2" placeholder="Subject" value="{{ old('subject') }}">
                            @if ($errors->has('subject'))
                                <span class="text-danger">{{ $errors->first('subject') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Message:</strong>
                            <textarea name="message" rows="3" class="form-control p-2">{{ old('message') }}</textarea>
                            @if ($errors->has('message'))
                                <span class="text-danger">{{ $errors->first('message') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group text-center">
                    <button class="btn btn-success btn-submit mt-4 ">Submit</button>
                </div>
            </form>
            </div>
        </section>



        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2023</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Portfolio Modals-->
        <!-- Portfolio item 1 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal<?php echo $port->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">{{ $port->title }}</h2>
                                    <p class="item-intro text-muted"> {{ $port->sub_title }} </p>
                                    <img class="img-fluid d-block mx-auto" src=" {{ url('public/img/'.$port->big_img) }} " alt="..." />
                                    <p>{{ $port->description }}</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Date:</strong>
                                            {{ $port->created_at->toDateString()}}
                                        </li>
                                        <li>
                                            <strong>Client:</strong>
                                            {{ $port->client }}
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            {{ $port->category }}
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>






        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src=" {{ asset('js/scripts.js') }}"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
