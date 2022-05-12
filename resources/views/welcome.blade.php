@extends('layouts.app')
@section('libraries')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css"
        integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        :root {
            --mainColor: #dbac28;
            --lightTextColor: #707b89;
        }

        .row>* {
            width: auto !important;
            padding-right: 0px !important;
            padding-left: 0px !important;
        }

        @media screen and (max-width: 1120px) {
            .backgroundStyle {
                display: none;
            }
        }

        .homeButtons {
            color: white;
            font-size: 18px;
            padding: 17px;
            background: var(--mainColor);
        }

        .homeButtons:hover {
            background: black !important;
            color: white !important;
        }

    </style>
@endsection

@section('content')
    {{-- ____________________________ --}}
    <section class="m-5">
        <img width="100%" src="images/homeImages/img1.png" alt="" srcset="">
    </section>
    {{-- ____________________________ --}}

    <section class="container text-center">
        <div class="row text-center">
            <div class="col-md-6 mt-5">
                <div class="col-md-8">
                    <h1 class="mt-5">GET APPROVED &amp; REWARDED TODAY!</h1>
                    <h3 class="mt-3">Now Offering AIR MILES<sup>@</sup> Reward Miles </h3>
                    <p class="text-center mt-5" style="color: var(--lightTextColor);">Citadel Mortgages now Offers AIR MILES®
                        Reward Miles. Get up to 1,000 MILES on
                        every mortgage!</p>
                    <div class="text-center mt-5 mb-4">
                        <button type="button" class="btn homeButtons">
                            Learn How To Collect Your Miles Today
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-6"><img width="100%" src="images/homeImages/img2.png" alt="" srcset=""></div>
        </div>
    </section>

    {{-- ____________________________ --}}
    <section class="container">
        <hr>
        <div class="row">
            <div class="col-md-4 text-center">
                <img width="300px" src="images/homeImages/img3.png" alt="">
                <p class="text-center mt-4" style="color: var(--lightTextColor);">Making life easier and
                    keeping you engaged with
                    your finances</p>
            </div>
            <div class="col-md-4 text-center" style="width: 100% !important;">
                <img width="300px" src="images/homeImages/img4.jpeg" alt="">
                <p class="text-center" style="color: var(--lightTextColor);">
                    Get Pre Qualified for a Mortgage in 60 Seconds
                </p>
            </div>
            <div class="col-md-4">
                <div class="col-md-6">
                    <img width="300px" src="images/homeImages/img5.jpeg" alt="">
                    <p class="text-center" style="color: var(--lightTextColor);">
                        Search for your new home and get a Cash Reward!
                    </p>
                </div>
                <div class="col-md-6">
                    <img width="300px" src="images/homeImages/img6.png" alt="">
                    <p class="text-center" style="color: var(--lightTextColor);">
                        Click to use our All In One Mortgage Calculator for your needs
                    </p>
                </div>
            </div>

        </div>
    </section>

    {{-- ____________________________ --}}
    <section class="container mt-5" style="background: var(--mainColor);">
        <div class="text-center col-md-9 ml-auto mr-auto">
            <h1 class="pt-5 pl-5 pr-5 pb-3" style="color: white;">Get Pre Qualified in 60 Seconds
                Today
            </h1>
            <p style="color: white;font-size: 18px">
                In just 60 seconds, our Mortgage Pre-Qualification tool will let you know how much you can expect to borrow
                and give you a realistic value of home to qualify for
            </p>
        </div>
        <div class="row m-1">
            <div class="col-md-6"><img width="100%" style="margin-top: 10%" src="images/homeImages/img7.jpeg" alt="">
            </div>
            <div class="col-md-6 text-right"><img width="100%" src="images/homeImages/img8.png" alt=""></div>
        </div>
        <div>

        </div>
    </section>

    {{-- ____________________________ --}}
    <section class="mt-5 container">
        <hr>
        <div class="row">
            <div class="col-md-6">
                <img width="100%" src="images/homeImages/img9.png" alt="" srcset="">
            </div>
            <div class="col-md-6">
                <p class="mt-5 display-4">Become Mortgage Free
                <p class="text-left display-4" style="color: var(--mainColor)">
                    Sooner Today! </p>
                </p>
                <hr class="mt-5"
                    style="width: 15%;height: 4px;opacity: 1;border-radius: 10px; color: var(--mainColor);">
                <div class="col-md-8 mt-5">
                    <p style="font-size: 20px;">
                        <span>-</span> Simplify your everyday banking
                        <br> <span>-</span> Save thousands in interest
                        <br> <span>-</span> Be debt-free years sooner
                        <br> <span>-</span> Enjoy financial Flexibility
                    </p>
                </div>
                <div>
                    <p class="mt-5" style="color: var(--lightTextColor);">What if your deposits and your borrowing
                        were combined into a
                        single account so that every dollar you earned automatically went towards paying l your debt?</p>
                    <p class="mt-3" style="color: var(--lightTextColor);">That’s exactly what the All in One
                        Mortgage Solution provides!
                        It brings your mortgage, savings, and income together to help you</p>
                </div>
                <div class="mt-5 text-center">
                    <button type="button" class="btn homeButtons m-3">
                        Calculate How You Can Be Mortgage-Free Sooner!
                    </button>
                </div>
            </div>
    </section>

    {{-- ____________________________ --}}
    <section class="mt-5 container">
        <hr>
        <div class="row">
            <div class="col-md-6">
                <img width="100%" src="images/homeImages/img10.jpeg" alt="">
                <p class="display-4">Your Home Journey Find Your New Home Today
                    <span class="text-left display-4" style="color: var(--mainColor)">
                        & Earn .5% Cash Reward </span>
                </p>
                <hr class="mt-5"
                    style="width: 15%;height: 4px;opacity: 1;border-radius: 10px; color: var(--mainColor);">
                <div>
                    <p class="mt-2" style="color: var(--lightTextColor);">We care about your home buying journey,
                        let us help you make it a better experience with Your Home Journey!
                        Search for your new home in the palm of your hand and get a Cash Reward!
                    </p>
                </div>
                <div class="mt-5 text-center">
                    <button type="button" class="btn homeButtons ">
                        Ready, Set, Start Your Home Journey
                    </button>
                </div>
            </div>
            <div class="col-md-6">
                <img width="100%" style="position: relative; top: 20%" src="images/homeImages/img11.png" alt="" srcset="">
            </div>
    </section>

    {{-- ____________________________ --}}
    <section class="mt-5 container">
        <hr>
        <div class="row">
            <div class="col-md-6">
                <img width="100%" src="images/homeImages/img13.png" alt="" srcset="">
            </div>
            <div class="col-md-6">
                <img width="100%" src="images/homeImages/img12.jpeg" alt="">
                <p class="mt-5 display-4">Your
                    <span class="display-4" style="color: var(--mainColor)">
                        Mortgage App
                    </span>
                </p>
                <hr class=""
                    style="width: 15%;height: 4px;opacity: 1;border-radius: 10px; color: var(--mainColor);">

                <div>
                    <p class="col-md-8 mt-5 ml-auto mr-auto" style="color: var(--lightTextColor);">
                        Calculate your total cost of owning a home
                        Estimate the minimum down payment you need
                        Calculate the maximum Mortgage you can borrow
                        Stress test your mortgage
                        Compare your options side by side
                        & More!
                    </p>
                </div>
                <div class="mt-5 text-center">
                    <button type="button" class="btn homeButtons m-3">
                        Calculate How You Can Be Mortgage-Free Sooner!
                    </button>
                </div>
            </div>
        </div>
    </section>

    {{-- ____________________________ --}}
    <section class="mt-5 container">
        <hr>
        <div class="text-center">
            <p class="display-6">Our Partners</p>
            <hr class="ml-auto mr-auto" width="230px"
                style="opacity: 1;color: var(--mainColor);height: 3px;border-radius: 10px">
        </div>
        <div class="row">
            <div class="col-md-3  "><img class="p-5" width="100%"
                    src="images/homeImages/partnersImages/img1.png" alt="" srcset="">
            </div>
            <div class="col-md-3  "><img class="p-5" width="100%"
                    src="images/homeImages/partnersImages/img2.png" alt="" srcset="">
            </div>
            <div class="col-md-3  "><img class="mt-5 p-5" width="100%"
                    src="images/homeImages/partnersImages/img3.jpeg" alt="" srcset="">
            </div>
            <div class="col-md-3  "><img class="mt-3 p-5" width="100%"
                    src="images/homeImages/partnersImages/img4.png" alt="" srcset="">
            </div>
        </div>
    </section>

    {{-- ____________________________ --}}
    <section class="mt-5 container">
        <hr>
        <div class="text-center">
            <p class="display-6">Our Lender Partners</p>
            <hr class="ml-auto mr-auto" width="230px"
                style="opacity: 1;color: var(--mainColor);height: 3px;border-radius: 10px">
        </div>
        <div class="row">
            <div class="col-md-2 ml-auto mr-auto"><img class="p-4" width="100%"
                    src="images/homeImages/lendersPartnersImages/img1.png" alt="" srcset="">
            </div>
            <div class="col-md-2 ml-auto mr-auto"><img class="p-4" width="100%"
                    src="images/homeImages/lendersPartnersImages/img2.png" alt="" srcset="">
            </div>
            <div class="col-md-2 ml-auto mr-auto"><img class="p-4" width="100%"
                    src="images/homeImages/lendersPartnersImages/img3.jpeg" alt="" srcset="">
            </div>
            <div class="col-md-2 ml-auto mr-auto"><img class="mt-3 p-4" width="100%"
                    src="images/homeImages/lendersPartnersImages/img4.png" alt="" srcset="">
            </div>
            <div class="col-md-2 ml-auto mr-auto"><img class=" p-4" width="100%"
                    src="images/homeImages/lendersPartnersImages/img5.png" alt="" srcset="">
            </div>
            <div class="col-md-2 ml-auto mr-auto"><img class="mt-2 p-4" width="100%"
                    src="images/homeImages/lendersPartnersImages/img6.png" alt="" srcset="">
            </div>
        </div>
    </section>

    <section class="mt-5 container">
        <hr>
        <div class="text-center">
            <p class="display-4">
                <span style="color: var(--mainColor);">Mortgage</span> Journey Solutions
            </p>
        </div>
        <div>
            <div class="container mx-auto mt-4">
                <div class="row">

                    <div class="col-md-3">
                        <div class="card m-1" style="background: var(--mainColor); ">
                            <div class="card-body text-center">
                                <h4 class="mt-4" style="font-weight: bold">OVERVIEW</h4>
                                <hr width="80px" class="ml-auto mr-auto"
                                    style="height: 2px; border-radius: 10px; color: white;opacity: 1;">
                                <h5 style="color: white" class="card-subtitle mt-4  mb-5">Discover Citadel Mortgages</h5>
                                <p style="color: white" class="text-center ">Forget The Traditional Mortgage Way and
                                    Learn How We Are
                                    Changing
                                    The Way Mortgages Are Done!</p>
                                <button type="button" class="btn-block btn mt-3 p-2 homeButtons bg-dark">
                                    Download Now
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 ">
                        <div class="card m-1" style="background: var(--mainColor); ">
                            <div class="card-body text-center">
                                <h4 class="mt-4" style="font-weight: bold">SELF EMPLOYED</h4>
                                <hr width="80px" class="ml-auto mr-auto"
                                    style="height: 2px; border-radius: 10px; color: white;opacity: 1;">
                                <h5 style="color: white" class="card-subtitle mt-4  mb-4">A Mortgage Designed with the
                                    Entrepreneur in Mind!</h5>
                                <p style="color: white" class="text-center ">Wouldn't it be nice to have a Mortgage that
                                    made sense for you?
                                </p>

                                <button type="button" style="margin-top: 40px"
                                    class="btn-block btn  p-2 homeButtons bg-dark">
                                    Download Now
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 ">
                        <div class="card m-1" style="background: var(--mainColor); ">
                            <div class="card-body text-center">
                                <h4 class="mt-4" style="font-weight: bold">REVERSE MORTGAGE</h4>
                                <hr width="80px" class="ml-auto mr-auto"
                                    style="height: 2px; border-radius: 10px; color: white;opacity: 1;">
                                <h5 style="color: white" class="card-subtitle mt-1  mb-1">Get Your Home Equity Working For
                                    You</h5>
                                <p style="color: white" class="text-center ">Get information on accessing your homes
                                    equity to help you enjoy your retirement to the fullest while staying in your home</p>
                                <button type="button" class="btn-block btn mt-3 p-2 homeButtons bg-dark">
                                    Download Now
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 ">
                        <div class="card m-1" style="background: var(--mainColor); ">
                            <div class="card-body text-center">
                                <h4 class="mt-4" style="font-weight: bold">REFINANCING
                                    INSIDER TIPS
                                </h4>
                                <hr width="80px" class="ml-auto mr-auto"
                                    style="height: 2px; border-radius: 10px; color: white;opacity: 1;">
                                <h5 style="color: white" class="card-subtitle mt-1  mb-1">Ensure You Get The Best Rate &
                                    Terms For Your Mortgage Renewal</h5>
                                <p style="color: white" class="text-center ">Don’t be in a rush to sign your renewal,
                                    This can save you thousands of dollars upon your renewal</p>
                                <button type="button" class="btn-block btn mt-3 p-2 homeButtons bg-dark">
                                    Download Now
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="mt-5 mb-5 container">
        <hr>
        <div class="text-center">
            <p class="display-4">
                <span style="color: var(--mainColor);">Your Journey </span> Products
            </p>
        </div>
        <div>
            <div class="container mx-auto mt-4">
                <div class="row">

                    <div class="col-md-4 ">
                        <div class="" style=" width: 22rem;">
                            <div class="card-body text-center">

                                <img width="100%" src="images/homeImages/journeyProductsImages/img1.jpeg" alt="">
                                <hr width="80px" class="ml-auto mr-auto"
                                    style="height: 2px; border-radius: 10px; color: black;opacity: 1;">
                                <h5 style="color: black" class="card-subtitle mt-4  mb-5">High Interest Personal & Business
                                    Banking Accounts</h5>
                                <p style="color: black" class="text-center ">Open a high-interest Account for your
                                    everyday banking needs. You’ll enjoy great features, plenty of flexibility -- and an
                                    exceptional rate on all your money!</p>
                                <button type="button" class="btn-block btn mt-3 p-2 homeButtons bg-dark">
                                    Apply Now
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 ">
                        <div class="" style=" width: 22rem;">
                            <div class="card-body text-center">
                                <img width="100%" src="images/homeImages/journeyProductsImages/img2.jpeg" alt="">
                                <hr width="80px" class="ml-auto mr-auto"
                                    style="height: 2px; border-radius: 10px; color: black;opacity: 1;">
                                <h5 style="color: black" class="card-subtitle mt-4  mb-4">Better Mortgage Insurance</h5>
                                <p style="color: black" class="text-center mb-5">Coverage stays, no matter where you bank
                                    Fully underwritten at time of application, no surprise at time of claim
                                </p>

                                <button type="button" style="margin-top: 40px"
                                    class="btn-block btn mt-5  p-2 homeButtons bg-dark">
                                    Apply Now
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 ">
                        <div class="" style=" width: 22rem;">
                            <div class="card-body text-center">

                                <img width="100%" src="images/homeImages/journeyProductsImages/img3.jpeg" alt="">
                                <hr width="80px" class="ml-auto mr-auto"
                                    style="height: 2px; border-radius: 10px; color: black;opacity: 1;">
                                <h5 style="color: black" class="card-subtitle mt-1  mb-1">Credit Cards</h5>
                                <p style="color: black" class="text-center ">Choose from six rewarding options to match
                                    your lifestyle, wants and needs!</p>
                                <button type="button" class="btn-block btn mt-3 p-2 homeButtons bg-dark">
                                    Apply Now
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 ">
                        <div class="" style=" width: 22rem;">
                            <div class="card-body text-center">
                                <img width="100%" src="images/homeImages/journeyProductsImages/img4.jpeg" alt="">
                                <hr width="80px" class="ml-auto mr-auto"
                                    style="height: 2px; border-radius: 10px; color: black;opacity: 1;">
                                <h5 style="color: black" class="card-subtitle mt-1  mb-1">Money Transfers Made Simple</h5>
                                <p style="color: black" class="text-center ">Access fast and secure global money
                                    transfers at competitive rates</p>
                                <button type="button" class="btn-block btn mt-3 p-2 homeButtons bg-dark">
                                    Apply Now
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="" style=" width: 22rem;">
                            <div class="card-body text-center">
                                <img width="100%" src="images/homeImages/journeyProductsImages/img5.jpeg" alt="">
                                <hr width="80px" class="ml-auto mr-auto"
                                    style="height: 2px; border-radius: 10px; color: black;opacity: 1;">
                                <h5 style="color: black" class="card-subtitle mt-5  mb-4">Personal Loans Made Simple</h5>
                                <p style="color: black" class="text-center ">Get Multiple Loan Offers in Seconds</p>
                                <button type="button" class="btn-block btn mt-3 p-2 homeButtons bg-dark">
                                    Apply Now
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="" style="width: 22rem;">
                            <div class="card-body text-center">
                                <img width="100%" src="images/homeImages/journeyProductsImages/img6.jpeg" alt="">
                                <hr width="80px" class="ml-auto mr-auto"
                                    style="height: 2px; border-radius: 10px; color: black;opacity: 1;">
                                <h5 style="color: black" class="card-subtitle mt-5  mb-1">Travel Insurance</h5>
                                <p style="color: black" class="text-center ">Make sure You and your Family are protected
                                    on your next Get Away</p>
                                <button type="button" class="btn-block btn mt-3 p-2 homeButtons bg-dark">
                                    Apply Now
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>



    <section class="mt-5 mb-5 container">
        <hr>
        <div class="text-center">
            <p class="display-4">
                <span style="color: var(--mainColor);">Citadel </span> Mortgages Programs
            </p>
        </div>
        <div class="mt-5">
            <div class="container mx-auto mt-4">
                <div class="row">

                    <div class="col-md-4 ">
                        <div class="card" style=" width: 22rem; border-radius: 10px;">
                            <div class="card-body text-center">

                                <img width="100%" src="images/homeImages/mortgagesProgramsImages/img1.jpeg" alt="">
                                <hr width="80px" class="ml-auto mr-auto"
                                    style="height: 2px; border-radius: 10px; color: black;opacity: 1;">
                                <h5 style="color: black" class="card-subtitle mt-4  mb-5">EXCLUSIVE CITADEL WORLD ELITE
                                    REWARDS CARD</h5>
                                <p style="color: black" class="text-center ">Welcome to the family, a gift from our
                                    family to yours. The Citadel Word Elite Rewards Card is an exclusive member-only rewards
                                    program, unlike anything ever seen in the mortgage industry.</p>
                                <button type="button" class="btn-block btn mt-3 p-2 homeButtons bg-dark">
                                    Apply Now
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 ">
                        <div class="card" style=" width: 22rem; border-radius: 10px;">
                            <div class="card-body text-center">
                                <img width="100%" src="images/homeImages/mortgagesProgramsImages/img2.jpeg" alt="">
                                <hr width="80px" class="ml-auto mr-auto"
                                    style="height: 2px; border-radius: 10px; color: black;opacity: 1;">
                                <h5 style="color: black" class="card-subtitle mt-4  mb-4">CAREER TRANSITION PROGRAM</h5>
                                <p style="color: black" class="text-center mt-5 ">HELPING BORROWERS GET BACK ON TRACK
                                    Sometimes job loss can happen without warning. The Citadel Mortgages Career Transition
                                    Program is here to support you through this difficult time
                                </p>

                                <button type="button" style="margin-top: 40px"
                                    class="btn-block btn   p-2 homeButtons bg-dark">
                                    Apply Now
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 ">
                        <div class="card" style=" width: 22rem; border-radius: 10px;">
                            <div class="card-body text-center">

                                <img width="100%" src="images/homeImages/mortgagesProgramsImages/img3.jpeg" alt="">
                                <hr width="80px" class="ml-auto mr-auto"
                                    style="height: 2px; border-radius: 10px; color: black;opacity: 1;">
                                <h5 style="color: black" class="card-subtitle mt-1  mb-1">The Citadel Mortgage Social
                                    Awareness Program</h5>
                                <p style="color: black" class="text-center mt-4">Citadel Mortgages believes in supporting
                                    our
                                    community and the people that need our support. That is why once your mortgage closes we
                                    will make a donation to a charity or foundation on your behalf of your choice and plant
                                    a tree that you name!</p>
                                <button type="button" class="btn-block btn mt-3 p-2 homeButtons bg-dark">
                                    Apply Now
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <footer class="mt-5 p-5" style="background: black">
        <img width="100%" src="images/homeImages/footerImages/img1.jpeg" alt="">
        <div class="container mx-auto mt-4">

            <div class="row">
                {{-- <div class="col-md-4 ">
                    <p class="display-4" style="color: white;text-align: left">Services</p>
                    <ul style="text-align: left;font-size: 17px;color: white;list-style: none">
                        <li class="mt-2">
                            <a style="color: white" href="/">Contact Us</a>
                        </li>
                        <li class="mt-4">
                            <a style="color: white" href="/">About Us</a>
                        </li>
                        <li class="mt-4">
                            <a style="color: white" href="/register">Register</a>
                        </li>
                        <li class="mt-4">
                            <a style="color: white" href="/">Home</a>
                        </li>
                        <li class="mt-4">
                            <a style="color: white" href="/login">Login</a>
                        </li>

                        <li class="mt-4">
                            <a style="color: white" href="/">Rates</a>
                        </li>

                    </ul>
                </div> --}}


                <div class="col-md-5 ">
                    <p class="display-4" style="color: white;text-align: center">Offices</p>
                    <p style="color: var(--lightTextColor);text-align: left">Copyright © 2020 Citadel Mortgages Lic #
                        12993
                    </p>
                    <p style="color: var(--lightTextColor)">
                        - Head Office – 150 King Street West 2nd Floor Suite 335, Toronto, ON M5H 1J9
                        <br>
                        - Alberta Office – 421 7th Avenue S.W., 30th Floor, Calgary, Alberta, T2P 4K9
                        <br>
                        - Nova Scotia Office – 1701 Hollis Street, Suite 800 Halifax, NS B3J 3M8
                        <br>
                        - Saskatchewan Office – 2010 – 11th Avenue 7th Floor Regina Saskatchewan S4P0J3
                        <br>
                        - Newfoundland Office – 1 Church Hill – Suite 201-522 St. John’s Newfoundland A1C 3Z7
                        <br>
                        - New Brunswick Office – 500 St George Street, Moncton NB, E1C 1Y3


                    </p>
                </div>

                <div class="col-md-2"></div>

                <div class="col-md-5 ">
                    <p class="display-4" style="color: white;text-align: center">Information</p>

                    <small style="color: var(--lightTextColor);text-align: center">
                        Citadel Mortgages is licensed in the following: Ontario FSRA 12993 – Saskatchewan FCAA 509446, Nova
                        Scotia 2021-3000010– Alberta, PEI, Nunavut, Newfoundland 21-07-CI083-1. New Brunswick 210031130,
                        British Columbia X301267
                        <br>
                        All rights reserved
                        <br>
                        “Instant Approval, Conditional Approval, Pre-Approval” – Borrower subject to credit and underwriting
                        approval. Not all borrowers will be approved for conventional financing or equity financing. Receipt
                        of borrower’s application does not represent an approval for financing or interest rate guarantee.
                        Restrictions may apply, Annual APR is subject to approval and underwriting, APR includes all fees
                        and rate which is calculated on a yearly term. APR varies contact us for current rates or more
                        information on a specific product. OAC*
                        <br>
                        ®™ Trademarks of AM Royalties Limited Partnership used under license by LoyaltyOne, Co. and Citadel
                        Mortgages


                    </small>
                </div>

            </div>

        </div>
    </footer>
@endsection


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/js/bootstrap.min.js"
        integrity="sha512-UR25UO94eTnCVwjbXozyeVd6ZqpaAE9naiEUBK/A+QDbfSTQFhPGj5lOR6d8tsgbBk84Ggb5A3EkjsOgPRPcKA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
