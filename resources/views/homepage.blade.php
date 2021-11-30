@extends('layouts.app')

@section('custom-css')
    <link rel="stylesheet" href="{{asset('css/homepage.css')}}">
@endsection

@section('content')

<div class="section-1 d-flex align-items-center">
    <div class="white-bg"></div>
    <div class="container">
        <div class="row justify-content-around">
            <div class="col-5 left-section">
                <div class="text-content d-flex flex-column ">
                    <span class="title-1">Booking</span>
                    <span class="title-2">Facility</span>
                    <span class="sub">
                        Discover a better way 
                        to schedule facilities.
                    </span>
                </div>
                <div class="black-line-welcome-section">

                </div>

            </div>
            <div class="col-5">

            </div>
        </div>
    </div>
</div>
<div class="section-2">
    <div class="container text-center py-5">
        <span>“ Our passion is to manage the real-world complexities 
                of space-scheduling problems. ”</span>
    </div>
</div>

<div class="section-3 py-5 d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <img class="w-100"src="https://images.unsplash.com/photo-1638228626087-e7cc19d2ff9d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
            </div>
            <div class="col-6">
                <h1>About Us</h1>
                <p>
                    In 2021, we started building “Booking.” by 
                    focusing all our efforts on building the 
                    easiest,  most user-friendly, customizable 
                    space-booking facility available.
                </p>
                <p>A product we would use and one that 
                    would cater to a wide range of user types.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-js')
<script>
    const headerStyle = document.querySelector("nav");
    const landingSection = document.querySelector(".section-1");
    
    const landingOptions = {
        rootMargin: "-220px 0px 0px 0px"
    };

    const landingObserver = new IntersectionObserver (function(
        entries,
        landingObserver
    ) {
        entries.forEach(entry => {
            if(entry.isIntersecting){
                console.log("entry.target");
                headerStyle.classList.add("ournavbar-scrolled");
            }
            else{
                headerStyle.classList.remove("ournavbar-scrolled");
            }
        })
    }, landingOptions);

    landingObserver.observe(landingSection);
</script>
@endsection
