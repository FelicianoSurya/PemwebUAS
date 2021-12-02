@extends('layouts.app')

@section('custom-css')
    <link rel="stylesheet" href="{{asset('css/homepage.css')}}">
@endsection

@section('content')

<div class="section-1 d-flex align-items-lg-center align-items-end" id="landing-page">
    <div class="white-bg"></div>
    <div class="container">
        <div class="row justify-content-start align-items-end">
            <div class="col-lg-5 col-12 left-section">
                <div class="text-content d-flex flex-column justify-content-center align-items-lg-start align-items-center">
                    <div class="d-flex flex-lg-column flex-row  justify-content-center">
                        <span class="title-1 p-lg-0 p-2">Booking</span>
                        <span class="title-2 p-lg-0 p-2">Facility</span>
                    </div>
                    
                    <span class="sub">
                        Discover a better way 
                        to schedule facilities.
                    </span>
                </div>
                <div class="black-line-welcome-section mx-auto">

                </div>

            </div>
        </div>
    </div>
</div>
<div class="section-2">
    <div class="container  py-5">
        <span class="">“ Our passion is to manage the real-world complexities 
                of space-scheduling problems. ”</span>
    </div>
</div>

<div class="section-3 py-5 d-flex align-items-center" id="aboutus">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 py-3 col-6 d-flex  align-items-center">
                <img class="w-100" src="{{asset('images/landingpage/section-3.png')}}" alt="">
            </div>
            <div class="col-lg-6 col-12 text-lg-left d-flex flex-column justify-content-around container">
                <h1 class="text-lg-left">About Us</h1>
                <p class="text-lg-left">
                    In 2021, we started building “Booking.” by 
                    focusing all our efforts on building the 
                    easiest,  most user-friendly, customizable 
                    space-booking facility available.
                </p>
                <p class="text-lg-left">A product we would use and one that 
                    would cater to a wide range of user types.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="section-4 py-5">
    <div class="container">
        <div class="section-4-header text-center pb-4">
        The benefits of using <br>BookCourts.
        </div>
        <div class="row justify-content-sm-between justify-content-center">
            <div class=" col-lg-3 col-sm-4 col-8  d-flex text-center flex-column  align-items-center">
                <img class="w-100 pb-3" src="{{asset('images/landingpage/folder.png')}}" alt="">
                <h3>Untangle space usage</h3>
                <p>Solve your space management problems forever by taking your booking processes online</p>
            </div>
            <div class="w-100 d-sm-none d-block"></div>
            <div class="col-lg-3 col-sm-4 col-8  d-flex text-center flex-column  align-items-center">
                <img class="w-100 pb-3" src="{{asset('images/landingpage/money.png')}}" alt="">
                <h3>Reduce administration</h3>
                <p>Save time and money by automating previously time-consuming space management tasks.</p>
            </div>
            <div class="w-100 d-sm-none d-block"></div>
            <div class="col-lg-3 col-sm-4 col-8  d-flex text-center flex-column  align-items-center">
                <img class="w-100 pb-3" src="{{asset('images/landingpage/setting.png')}}" alt="">
                <h3>Implement quickly</h3>
                <p>Getting up and running is easier than you think. Start seeing results in minutes.</p>
            </div>
        </div>
    </div>
</div>

<div class="section-5 py-5">
    <div class="container">
        <div class="section-5-header text-center pb-4">
        Let's Get Started
        </div>
        <div class="row justify-content-center">
            <div class="col-3 d-flex justify-content-md-end justify-content-center "><a href="{{ route('login') }}"><button class="btn btn-light">Login</button></a></div>
            <div class="w-100 d-sm-none d-block"></div>
            <div class="col-1 d-flex justify-content-center align-items-center content-text-or">or</div>
            <div class="w-100 d-sm-none d-block"></div>
            <div class="col-3 d-flex justify-content-md-start justify-content-center text-left"><a href="{{ route('register') }}"><button class="btn btn-light">Register</button></a></div>
        </div>
    </div>
</div>

<div class="section-6 py-5" id="team">
    <div class="container">
        <div class="section-6-header text-center pb-4">
        Our Team
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-sm-6 col-8 p-2">
                <div class="ourteam-card text-center">
                    <h3>Feliciano</h3>
                    <p class="m-0">( 000 000 43255 )</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-8 p-2">
                <div class="ourteam-card text-center">
                    <h3>Fernando</h3>
                    <p class="m-0">( 000 000 43088 )</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-8 p-2">
                <div class="ourteam-card text-center">
                    <h3>Dea</h3>
                    <p class="m-0">( 000 000 42550 )</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-8 p-2">
                <div class="ourteam-card text-center">
                    <h3>Lifosmin</h3>
                    <p class="m-0">( 000 000 45574 )</p>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('custom-js')
<script>
    const headerStyle = document.querySelector("nav");
    const landingSection = document.querySelector("#landing-page");
    
    const landingOptions = {
        rootMargin: "-120px 0px 0px 0px"
    };

    const landingObserver = new IntersectionObserver (function(
        entries,
        landingObserver
    ) {
        entries.forEach(entry => {
            if(entry.isIntersecting){
                console.log("entry.target");
                headerStyle.classList.add("ournavbar-scrolled");
                headerStyle.classList.remove("navbar-dark");
                headerStyle.classList.add("navbar-light");
            }
            else{
                headerStyle.classList.remove("ournavbar-scrolled");
                headerStyle.classList.remove("navbar-light");
                headerStyle.classList.add("navbar-dark");
            }
        })
    }, landingOptions);

    landingObserver.observe(landingSection);
</script>
@endsection
