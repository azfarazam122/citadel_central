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
                    <div class="text-center mt-5">
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
            <div class="col-md-4">
                <img width="300px" src="images/homeImages/img3.png" alt="">
                <p class="text-center mt-4" style="color: var(--lightTextColor);">Making life easier and
                    keeping you engaged with
                    your finances</p>
            </div>
            <div class="col-md-4">
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
            <div class="col-md-6"><img width="100%" src="images/homeImages/img7.jpeg" alt=""></div>
            <div class="col-md-6 text-right"><img width="80%" src="images/homeImages/img8.png" alt=""></div>
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
                <h1 class="mt-5">Become Mortgage Free <p class="text-right" style="color: var(--mainColor)">
                        Sooner Today! </p>
                </h1>
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
                        single account so that every dollar you earned automatically went towards paying down your debt?</p>
                    <p class="mt-3" style="color: var(--lightTextColor);">That’s exactly what the All in One
                        Mortgage Solution provides!
                        It brings your mortgage, savings, and income together to help you</p>
                </div>
                <div class="mt-5 text-center">
                    <button type="button" class="btn homeButtons ">
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
                <h1 class="">Your Home Journey Find Your New Home Today
                    <p class="text-left" style="color: var(--mainColor)">
                        & Earn .5% Cash Reward </p>
                </h1>
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
                <h1 class="mt-5">Your
                    <span style="color: var(--mainColor)">
                        Mortgage App
                    </span>
                </h1>
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
                    <button type="button" class="btn homeButtons ">
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
            <h1>Our Partners</h1>
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
            <h1>Our Lender Partners</h1>
            <hr class="ml-auto mr-auto" width="230px"
                style="opacity: 1;color: var(--mainColor);height: 3px;border-radius: 10px">
        </div>
        <div class="row">
            <div class="col-md-2"><img class="p-4" width="100%"
                    src="images/homeImages/lendersPartnersImages/img1.png" alt="" srcset="">
            </div>
            <div class="col-md-2"><img class="p-4" width="100%"
                    src="images/homeImages/lendersPartnersImages/img2.png" alt="" srcset="">
            </div>
            <div class="col-md-2"><img class="p-4" width="100%"
                    src="images/homeImages/lendersPartnersImages/img3.jpeg" alt="" srcset="">
            </div>
            <div class="col-md-2"><img class="mt-3 p-4" width="100%"
                    src="images/homeImages/lendersPartnersImages/img4.png" alt="" srcset="">
            </div>
            <div class="col-md-2"><img class=" p-4" width="100%"
                    src="images/homeImages/lendersPartnersImages/img5.png" alt="" srcset="">
            </div>
            <div class="col-md-2"><img class="mt-2 p-4" width="100%"
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

                    <div class="col-md-3 ">
                        <div class="card" style="background: var(--mainColor); width: 17rem;">
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
                        <div class="card" style="background: var(--mainColor); width: 17rem;">
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
                        <div class="card" style="background: var(--mainColor); width: 17rem;">
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
                        <div class="card" style="background: var(--mainColor); width: 17rem;">
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

    <section class="mt-5 container">
        <hr>
        <div class="text-center">
            <p class="display-4">
                <span style="color: var(--mainColor);">Your Journey </span> Products
            </p>
        </div>
        <div>
            <div class="container mx-auto mt-4">
                <div class="row">

                    <div class="col-md-3 ">
                        <div class="card" style=" width: 17rem;">
                            <div class="card-body text-center">

                                <img width="100%" src="images/homeImages/journeyProductsImages/img1.jpeg" alt="">
                                <hr width="80px" class="ml-auto mr-auto"
                                    style="height: 2px; border-radius: 10px; color: black;opacity: 1;">
                                <h5 style="color: black" class="card-subtitle mt-4  mb-5">Discover Citadel Mortgages</h5>
                                <p style="color: black" class="text-center ">Forget The Traditional Mortgage Way and
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
                        <div class="card" style=" width: 17rem;">
                            <div class="card-body text-center">
                                <img width="100%" src="images/homeImages/journeyProductsImages/img2.jpeg" alt="">
                                <hr width="80px" class="ml-auto mr-auto"
                                    style="height: 2px; border-radius: 10px; color: black;opacity: 1;">
                                <h5 style="color: black" class="card-subtitle mt-4  mb-4">A Mortgage Designed with the
                                    Entrepreneur in Mind!</h5>
                                <p style="color: black" class="text-center ">Wouldn't it be nice to have a Mortgage that
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
                        <div class="card" style=" width: 17rem;">
                            <div class="card-body text-center">

                                <img width="100%" src="images/homeImages/journeyProductsImages/img3.jpeg" alt="">
                                <hr width="80px" class="ml-auto mr-auto"
                                    style="height: 2px; border-radius: 10px; color: black;opacity: 1;">
                                <h5 style="color: black" class="card-subtitle mt-1  mb-1">Get Your Home Equity Working For
                                    You</h5>
                                <p style="color: black" class="text-center ">Get information on accessing your homes
                                    equity to help you enjoy your retirement to the fullest while staying in your home</p>
                                <button type="button" class="btn-block btn mt-3 p-2 homeButtons bg-dark">
                                    Download Now
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 ">
                        <div class="card" style=" width: 17rem;">
                            <div class="card-body text-center">
                                <img width="100%" src="images/homeImages/journeyProductsImages/img4.jpeg" alt="">
                                <hr width="80px" class="ml-auto mr-auto"
                                    style="height: 2px; border-radius: 10px; color: black;opacity: 1;">
                                <h5 style="color: black" class="card-subtitle mt-1  mb-1">Ensure You Get The Best Rate &
                                    Terms For Your Mortgage Renewal</h5>
                                <p style="color: black" class="text-center ">Don’t be in a rush to sign your renewal,
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



    <section class="mb-5"></section>
@endsection


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/js/bootstrap.min.js"
        integrity="sha512-UR25UO94eTnCVwjbXozyeVd6ZqpaAE9naiEUBK/A+QDbfSTQFhPGj5lOR6d8tsgbBk84Ggb5A3EkjsOgPRPcKA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
