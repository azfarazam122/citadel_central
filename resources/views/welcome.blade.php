@extends('layouts.app')
@section('libraries')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css"
        integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- BLADE TEMPLATE PHP --}}
    @php
    // $user = Auth::user();
    $url = $_SERVER['REQUEST_URI'];
    if ($url == '/agent/home' || $url == '/agent/home/') {
        $user = App\Models\User::where('email', 'Tristan.kirk@citadelmortgages.ca')->get();
        $agentData = App\Models\Agent::where('user_id', $user[0]->id)->get();
        $adminData = App\Models\Admin::where('id', $agentData[0]->admin_id)->get();
    } else {
        $email = explode('/', $url);
        $email = $email[count($email) - 1];

        $user = App\Models\User::where('email', $email)->get();
        if (count($user) > 0) {
            $agentData = App\Models\Agent::where('user_id', $user[0]->id)->get();
            $adminData = App\Models\Admin::where('id', $agentData[0]->admin_id)->get();
        }
    }

    @endphp

    <style>
        :root {
            --primary-color: <?php echo $adminData[0]->primary_color; ?>;
            --secondary-color:  <?php echo $adminData[0]->secondary_color; ?>;
            --tertiary-color:  <?php echo $adminData[0]->tertiary_color; ?>;
            --primary-text-color: <?php echo $adminData[0]->primary_text_color; ?>;
            --secondary-text-color:  <?php echo $adminData[0]->secondary_text_color; ?>;
            --tertiary-text-color:  <?php echo $adminData[0]->tertiary_text_color; ?>;
            --fourth-text-color:  <?php echo $adminData[0]->fourth_text_color; ?>;
            --lightTextColor: #707b89;
            --white-color: #fff;
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
            color: var(--secondary-text-color) ;
            font-size: 18px;
            padding: 17px;
            background: var(--primary-color);
        }

        .homeButtons:hover {
            background: var(--secondary-color) !important;
            color: var(--fourth-text-color) !important;
        }



    </style>
@endsection

@section('content')


    {{-- ________________________________________________________ --}}
    {{-- <h1> {{ $user }} </h1> --}}

    {{-- ____________________________ --}}
    @isset($agentData)
        @if (count($agentData) > 0)
            <div class="ms-5">
                <div class=" ms-5 row secondaryTextColor">
                    <div class="col-md-3 text-center">
                        {{-- <h1>{{ app('request')->input('name') }}</h1> --}}
                        <p>{{ $agentData[0]->full_name }}</p>
                        <p>Mortgage Agent {{ $agentData[0]->license_no }}</p>
                    </div>
                    <div class="col-md-3">
                        <p> <span><i class="fa-solid fa-envelope"></i></span> {{ $user[0]->email }}</p>
                    </div>
                    <div class="col-md-3">
                        <p> <span><i class="fa-solid fa-phone"></i></span> {{ $agentData[0]->phone }}</p>
                    </div>
                    <div class="col-md-3">
                        <a target="blank" class="mr-3" href={{ $agentData[0]->facebook_link }}><i
                                style="font-size: 30px; color: #3B579D;" class="fa-brands fa-facebook"></i></a>
                        <a target="blank" class="mr-3" href={{ $agentData[0]->linkedin_link }}><i
                                style="font-size: 30px; color: #1D8CB5" class="fa-brands fa-linkedin"></i>
                        </a>
                        <a target="blank" class="mr-3" href={{ $agentData[0]->instagram_link }}><i
                                style="font-size: 30px; color: #DF1438;" class="fa-brands fa-instagram"></i></a>
                        <a target="blank" class="mr-3" href={{ $agentData[0]->twitter_link }}><i
                                style="font-size: 30px;color: #5DA9DD;" class="fa-brands fa-twitter"></i></a>

                        <div>
                            <a href={{ $agentData[0]->apply_now_link }} target="blank" type="button" name="" id=""
                                style="border: 1px solid var(--primary-color); border-radius:18px"
                                class="customButtonWithLinks btn mt-3 btn-lg secondaryTextColor">
                                Apply Now
                            </a>
                            <a></a>
                        </div>

                    </div>
                </div>
            </div>
        @endif
    @endisset


    <section class="m-5">
        <img width="100%" src="../../images/homeImages/img1.png" alt="" srcset="">
    </section>
    {{-- ____________________________ --}}


    <section class="container text-center">
        <div class="row text-center">
            <div class="col-md-6 mt-5 secondaryTextColor">
                <div class="col-md-8">
                    <h1 class="mt-5">GET APPROVED &amp; REWARDED TODAY!</h1>
                    <h3 class="mt-3">Now Offering AIR MILES<sup>@</sup> Reward Miles </h3>
                    <p class="text-center mt-5 tertiaryTextColor">Citadel Mortgages now Offers AIR
                        MILES®
                        Reward Miles. Get up to 1,000 MILES on
                        every mortgage!</p>
                    <div class="text-center mt-5 mb-4">
                        <a href={{ $agentData[0]->how_to_collect_your_miles_today_link }} target="_blank"
                            rel="noopener noreferrer">
                            <button type="button" class="btn homeButtons">
                                Learn How To Collect Your Miles Today
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6"><img width="100%" src="../../images/homeImages/img2.png" alt="" srcset=""></div>
        </div>
    </section>

    {{-- ____________________________ --}}
    <section class="container">
        <hr>
        <div class="row">
            <div class="col-md-4 text-center">
                <a href={{ $agentData[0]->your_financial_journey_link }} target="_blank" rel="noopener noreferrer">
                    <img width="300px" src="../../images/homeImages/img3.png" alt="">
                </a>
                <p class="text-center mt-4 tertiaryTextColor" >Making life easier and
                    keeping you engaged with
                    your finances</p>
            </div>
            <div class="col-md-4 text-center" style="width: 100% !important;">
                <a href={{ $agentData[0]->mortgage_prequalification_link }} target="_blank" rel="noopener noreferrer">
                    <img width="300px" src="../../images/homeImages/img4.jpeg" alt="">
                </a>
                <p class="text-center tertiaryTextColor" >
                    Get Pre Qualified for a Mortgage in 60 Seconds
                </p>
            </div>
            <div class="col-md-4">
                <div class="col-md-6">
                    <a href={{ $agentData[0]->your_home_journey_link }} target="_blank" rel="noopener noreferrer">
                        <img width="300px" src="../../images/homeImages/img5.jpeg" alt="">
                    </a>
                    <p class="text-center tertiaryTextColor">
                        Search for your new home and get a Cash Reward!
                    </p>
                </div>
                <div class="col-md-6">
                    <a href={{ $agentData[0]->your_mortgage_calculators_link }} target="_blank"
                        rel="noopener noreferrer">
                        <img width="300px" src="../../images/homeImages/img6.png" alt="">
                    </a>
                    <p class="text-center tertiaryTextColor" >
                        Click to use our All In One Mortgage Calculator for your needs
                    </p>
                </div>
            </div>

        </div>
    </section>

    {{-- ____________________________ --}}
    <section class="container mt-5" style="background: var(--primary-color);">
        <div class="text-center col-md-9 ml-auto mr-auto fourthTextColor">
            <h1 class="pt-5 pl-5 pr-5 pb-3 " >Get Pre Qualified in 60 Seconds
                Today
            </h1>
            <p style="font-size: 18px">
                In just 60 seconds, our Mortgage Pre-Qualification tool will let you know how much you can expect to borrow
                and give you a realistic value of home to qualify for
            </p>
        </div>
        <div class="mt-3 text-center ">
            <a href={{ $agentData[0]->get_prequalified_now_link }} target="_blank" rel="noopener noreferrer">
                <button type="button" class="btn homeButtons m-3 btn-light border-2">
                    Get Pre Qualified Now
                </button>
            </a>
        </div>
        <div class="row m-1">
            <div class="col-md-6"><img width="100%" style="margin-top: 10%" src="../../images/homeImages/img7.jpeg"
                    alt="">
            </div>
            <div class="col-md-6 text-right"><img width="100%" src="../../images/homeImages/img8.png" alt=""></div>
        </div>
        <div>

        </div>
    </section>

    {{-- ____________________________ --}}
    <section class="mt-5 container">
        <hr>
        <div class="row ms-1">
            <div class="col-md-6">
                <img width="100%" src="../../images/homeImages/img9.png" alt="" srcset="">
            </div>
            <div class="col-md-6">
                <p class="mt-5 display-4 secondaryTextColor">Become Mortgage Free
                <p class="text-left display-4 primaryTextColor">
                    Sooner Today! </p>
                </p>
                <hr class="mt-5 primaryTextColor"
                    style="width: 15%;height: 4px;opacity: 1;border-radius: 10px; ">
                <div class="col-md-8 mt-5 secondaryTextColor">
                    <p style="font-size: 20px;">
                        <span>-</span> Simplify your everyday banking
                        <br> <span>-</span> Save thousands in interest
                        <br> <span>-</span> Be debt-free years sooner
                        <br> <span>-</span> Enjoy financial Flexibility
                    </p>
                </div>
                <div class="tertiaryTextColor">
                    <p class="mt-5">What if your deposits and your borrowing
                        were combined into a
                        single account so that every dollar you earned automatically went towards paying l your debt?</p>
                    <p class="mt-3">That’s exactly what the All in One
                        Mortgage Solution provides!
                        It brings your mortgage, savings, and income together to help you</p>
                </div>
                <div class="mt-5 text-center">
                    <a href={{ $agentData[0]->calculate_how_you_can_be_mortgagefreesooner_link }} target="_blank"
                        rel="noopener noreferrer">
                        <button type="button" class="btn homeButtons m-3">
                            Calculate How You Can Be Mortgage-Free Sooner!
                        </button>
                    </a>
                </div>
            </div>
    </section>

    {{-- ____________________________ --}}
    <section class="mt-5 container">
        <hr>
        <div class="row  ms-1">
            <div class="col-md-6">
                <img width="100%" src="../../images/homeImages/img10.jpeg" alt="">
                <p class="display-4 secondaryTextColor" >Your Home Journey Find Your New Home Today
                    <span class="text-left display-4 primaryTextColor">
                        & Earn .5% Cash Reward </span>
                </p>
                <hr class="mt-5"
                    style="width: 15%;height: 4px;opacity: 1;border-radius: 10px; color: var(--primary-color);">
                <div>
                    <p class="mt-2 tertiaryTextColor">We care about your home buying journey,
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
                <img width="100%" style="position: relative; top: 20%" src="../../images/homeImages/img11.png" alt=""
                    srcset="">
            </div>
    </section>

    {{-- ____________________________ --}}
    <section class="mt-5 container">
        <hr>
        <div class="row  ms-1">
            <div class="col-md-6">
                <img width="100%" src="../../images/homeImages/img13.png" alt="" srcset="">
            </div>
            <div class="col-md-6">
                <img width="100%" src="../../images/homeImages/img12.jpeg" alt="">
                <p class="mt-5 display-4 secondaryTextColor">Your
                    <span class="display-4 primaryTextColor" >
                        Mortgage App
                    </span>
                </p>
                <hr class=""
                    style="width: 15%;height: 4px;opacity: 1;border-radius: 10px; color: var(--primary-color);">

                <div>
                    <p class="col-md-8 mt-5 ml-auto mr-auto tertiaryTextColor">
                        Calculate your total cost of owning a home
                        Estimate the minimum down payment you need
                        Calculate the maximum Mortgage you can borrow
                        Stress test your mortgage
                        Compare your options side by side
                        & More!
                    </p>
                </div>
                <div class="mt-5 text-center">
                    <a href={{ $agentData[0]->calculate_how_you_can_be_mortgagefreesooner_link }} target="_blank"
                        rel="noopener noreferrer">
                        <button type="button" class="btn homeButtons m-3">
                            Download Now
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ____________________________ --}}
    <section class="mt-5 container">
        <hr>
        <div class="text-center">
            <p class="display-6 secondaryTextColor">Our Partners</p>
            <hr class="ml-auto mr-auto" width="230px"
                style="opacity: 1;color: var(--primary-color);height: 3px;border-radius: 10px">
        </div>
        <div class="row">
            <div class="col-md-3  "><img class="p-5" width="100%"
                    src="../../images/homeImages/partnersImages/img1.png" alt="" srcset="">
            </div>
            <div class="col-md-3  "><img class="p-5" width="100%"
                    src="../../images/homeImages/partnersImages/img2.png" alt="" srcset="">
            </div>
            <div class="col-md-3  "><img class="mt-5 p-5" width="100%"
                    src="../../images/homeImages/partnersImages/img3.jpeg" alt="" srcset="">
            </div>
            <div class="col-md-3  "><img class="mt-3 p-5" width="100%"
                    src="../../images/homeImages/partnersImages/img4.png" alt="" srcset="">
            </div>
        </div>
    </section>

    {{-- ____________________________ --}}
    <section class="mt-5 container">
        <hr>
        <div class="text-center">
            <p class="display-6 secondaryTextColor">Our Lender Partners</p>
            <hr class="ml-auto mr-auto" width="230px"
                style="opacity: 1;color: var(--primary-color);height: 3px;border-radius: 10px">
        </div>
        <div class="row">
            <div class="col-md-2 ml-auto mr-auto"><img class="p-4" width="100%"
                    src="../../images/homeImages/lendersPartnersImages/img1.png" alt="" srcset="">
            </div>
            <div class="col-md-2 ml-auto mr-auto"><img class="p-4" width="100%"
                    src="../../images/homeImages/lendersPartnersImages/img2.png" alt="" srcset="">
            </div>
            <div class="col-md-2 ml-auto mr-auto"><img class="p-4" width="100%"
                    src="../../images/homeImages/lendersPartnersImages/img3.jpeg" alt="" srcset="">
            </div>
            <div class="col-md-2 ml-auto mr-auto"><img class="mt-3 p-4" width="100%"
                    src="../../images/homeImages/lendersPartnersImages/img4.png" alt="" srcset="">
            </div>
            <div class="col-md-2 ml-auto mr-auto"><img class=" p-4" width="100%"
                    src="../../images/homeImages/lendersPartnersImages/img5.png" alt="" srcset="">
            </div>
            <div class="col-md-2 ml-auto mr-auto"><img class="mt-2 p-4" width="100%"
                    src="../../images/homeImages/lendersPartnersImages/img6.png" alt="" srcset="">
            </div>
        </div>
    </section>

    <section class="mt-5 container">
        <hr>
        <div class="text-center">
            <p class="display-4 secondaryTextColor">
                <span class="primaryTextColor">Mortgage</span> Journey Solutions
            </p>
        </div>
        <div>
            <div class="container mx-auto mt-4">
                <div class="row">

                    <div class="col-md-3">
                        <div class="card m-1" style="background: var(--primary-color); ">
                            <div class="card-body text-center">
                                <h4 class="mt-4 secondaryTextColor" style="font-weight: bold">OVERVIEW</h4>
                                <hr width="80px" class="ml-auto mr-auto fourthTextColor"
                                    style="height: 2px; border-radius: 10px;opacity: 1;">
                                <h5  class="card-subtitle mt-4 fourthTextColor mb-5">Discover Citadel Mortgages</h5>
                                <p  class="text-center fourthTextColor">Forget The Traditional Mortgage Way and
                                    Learn How We Are
                                    Changing
                                    The Way Mortgages Are Done!</p>
                                <button type="button" class="btn-block btn mt-3 p-2 homeButtons fourthTextColor customButtonWithLinks" style="background: var(--secondary-text-color);">
                                    Download Now
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 ">
                        <div class="card m-1" style="background: var(--primary-color); ">
                            <div class="card-body text-center">
                                <h4 class="mt-4 secondaryTextColor" style="font-weight: bold">SELF EMPLOYED</h4>
                                <hr width="80px" class="ml-auto mr-auto fourthTextColor"
                                    style="height: 2px; border-radius: 10px;opacity: 1;">
                                <h5  class="fourthTextColor card-subtitle mt-4  mb-4">A Mortgage Designed with the
                                    Entrepreneur in Mind!</h5>
                                <p  class="fourthTextColor text-center ">Wouldn't it be nice to have a Mortgage that
                                    made sense for you?
                                </p>

                                <button type="button" style="margin-top: 40px; background: var(--secondary-text-color);"
                                    class="btn-block btn  p-2 homeButtons fourthTextColor customButtonWithLinks">
                                    Download Now
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 ">
                        <div class="card m-1" style="background: var(--primary-color); ">
                            <div class="card-body text-center">
                                <h4 class="mt-4 secondaryTextColor" style="font-weight: bold">REVERSE MORTGAGE</h4>
                                <hr width="80px" class="ml-auto mr-auto fourthTextColor"
                                    style="height: 2px; border-radius: 10px; opacity: 1;">
                                <h5  class="fourthTextColor card-subtitle mt-1  mb-1">Get Your Home Equity Working For
                                    You</h5>
                                <p  class="fourthTextColor text-center ">Get information on accessing your homes
                                    equity to help you enjoy your retirement to the fullest while staying in your home</p>
                                <button type="button" class="btn-block btn mt-3 p-2 homeButtons  fourthTextColor customButtonWithLinks" style="background: var(--secondary-text-color);">
                                    Download Now
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 ">
                        <div class="card m-1" style="background: var(--primary-color); ">
                            <div class="card-body text-center">
                                <h4 class="mt-4 secondaryTextColor" style="font-weight: bold">REFINANCING
                                    INSIDER TIPS
                                </h4>
                                <hr width="80px" class="ml-auto mr-auto fourthTextColor"
                                    style="height: 2px; border-radius: 10px;opacity: 1;">
                                <h5  class="card-subtitle mt-1 fourthTextColor mb-1">Ensure You Get The Best Rate &
                                    Terms For Your Mortgage Renewal</h5>
                                <p  class="text-center fourthTextColor">Don’t be in a rush to sign your renewal,
                                    This can save you thousands of dollars upon your renewal</p>
                                <button type="button" class="btn-block btn mt-3 p-2 homeButtons  fourthTextColor customButtonWithLinks" style="background: var(--secondary-text-color);">
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
            <p class="display-4 secondaryTextColor">
                <span class="primaryTextColor" >Your Journey </span> Products
            </p>
        </div>
        <div>
            <div class="container mx-auto mt-4">
                <div class="row">

                    <div class="col-md-4 ">
                        <div class="" style=" width: 22rem;">
                            <div class="card-body text-center">

                                <img width="100%" src="../../images/homeImages/journeyProductsImages/img1.jpeg" alt="">
                                <hr width="80px" class="ml-auto mr-auto secondaryTextColor"
                                    style="height: 2px; border-radius: 10px;opacity: 1;">
                                <h5  class="secondaryTextColor card-subtitle mt-4  mb-5">High Interest Personal & Business
                                    Banking Accounts</h5>
                                <p  class="secondaryTextColor text-center ">Open a high-interest Account for your
                                    everyday banking needs. You’ll enjoy great features, plenty of flexibility -- and an
                                    exceptional rate on all your money!</p>
                                <button type="button" class="btn-block btn mt-3 p-2 homeButtons">
                                    Apply Now
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 ">
                        <div class="" style=" width: 22rem;">
                            <div class="card-body text-center">
                                <img width="100%" src="../../images/homeImages/journeyProductsImages/img2.jpeg" alt="">
                                <hr width="80px" class="ml-auto mr-auto secondaryTextColor"
                                    style="height: 2px; border-radius: 10px; opacity: 1;">
                                <h5  class="secondaryTextColor card-subtitle mt-4  mb-4">Better Mortgage Insurance</h5>
                                <p  class="secondaryTextColor text-center mb-5">Coverage stays, no matter where you bank
                                    Fully underwritten at time of application, no surprise at time of claim
                                </p>

                                <button type="button" style="margin-top: 40px"
                                    class="btn-block btn mt-5  p-2 homeButtons">
                                    Apply Now
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 ">
                        <div class="" style=" width: 22rem;">
                            <div class="card-body text-center">

                                <img width="100%" src="../../images/homeImages/journeyProductsImages/img3.jpeg" alt="">
                                <hr width="80px" class="ml-auto mr-auto secondaryTextColor"
                                    style="height: 2px; border-radius: 10px;opacity: 1;">
                                <h5  class="secondaryTextColor card-subtitle mt-1  mb-1">Credit Cards</h5>
                                <p  class="secondaryTextColor text-center ">Choose from six rewarding options to match
                                    your lifestyle, wants and needs!</p>
                                <button type="button" class="btn-block btn mt-3 p-2 homeButtons ">
                                    Apply Now
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 ">
                        <div class="" style=" width: 22rem;">
                            <div class="card-body text-center">
                                <img width="100%" src="../../images/homeImages/journeyProductsImages/img4.jpeg" alt="">
                                <hr width="80px" class="ml-auto mr-auto secondaryTextColor"
                                    style="height: 2px; border-radius: 10px;opacity: 1;">
                                <h5  class="secondaryTextColor card-subtitle mt-1  mb-1">Money Transfers Made Simple</h5>
                                <p  class="secondaryTextColor text-center ">Access fast and secure global money
                                    transfers at competitive rates</p>
                                <button type="button" class="btn-block btn mt-3 p-2 homeButtons ">
                                    Apply Now
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="" style=" width: 22rem;">
                            <div class="card-body text-center">
                                <img width="100%" src="../../images/homeImages/journeyProductsImages/img5.jpeg" alt="">
                                <hr width="80px" class="ml-auto mr-auto secondaryTextColor"
                                    style="height: 2px; border-radius: 10px;opacity: 1;">
                                <h5  class="secondaryTextColor card-subtitle mt-5  mb-4">Personal Loans Made Simple</h5>
                                <p  class="secondaryTextColor text-center ">Get Multiple Loan Offers in Seconds</p>
                                <button type="button" class="btn-block btn mt-3 p-2 homeButtons ">
                                    Apply Now
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="" style="width: 22rem;">
                            <div class="card-body text-center">
                                <img width="100%" src="../../images/homeImages/journeyProductsImages/img6.jpeg" alt="">
                                <hr width="80px" class="ml-auto mr-auto secondaryTextColor"
                                    style="height: 2px; border-radius: 10px;opacity: 1;">
                                <h5  class="secondaryTextColor card-subtitle mt-5  mb-1">Travel Insurance</h5>
                                <p  class="secondaryTextColor text-center ">Make sure You and your Family are protected
                                    on your next Get Away</p>
                                <button type="button" class="btn-block btn mt-3 p-2 homeButtons ">
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
            <p class="display-4 secondaryTextColor">
                <span class="primaryTextColor" >Citadel </span> Mortgages Programs
            </p>
        </div>
        <div class="mt-5">
            <div class="container mx-auto mt-4">
                <div class="row">

                    <div class="col-md-4 ">
                        <div class="card" style=" width: 22rem; border-radius: 10px;">
                            <div class="card-body text-center">

                                <img width="100%" src="../../images/homeImages/mortgagesProgramsImages/img1.jpeg" alt="">
                                <hr width="80px" class="ml-auto mr-auto secondaryTextColor"
                                    style="height: 2px; border-radius: 10px;opacity: 1;">
                                <h5  class="secondaryTextColor card-subtitle mt-4  mb-5">EXCLUSIVE CITADEL WORLD ELITE
                                    REWARDS CARD</h5>
                                <p  class="secondaryTextColor text-center ">Welcome to the family, a gift from our
                                    family to yours. The Citadel Word Elite Rewards Card is an exclusive member-only rewards
                                    program, unlike anything ever seen in the mortgage industry.</p>
                                <button type="button" class="btn-block btn mt-3 p-2 homeButtons ">
                                    Apply Now
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 ">
                        <div class="card" style=" width: 22rem; border-radius: 10px;">
                            <div class="card-body text-center">
                                <img width="100%" src="../../images/homeImages/mortgagesProgramsImages/img2.jpeg" alt="">
                                <hr width="80px" class="ml-auto mr-auto secondaryTextColor"
                                    style="height: 2px; border-radius: 10px;opacity: 1;">
                                <h5  class="secondaryTextColor card-subtitle mt-4  mb-4">CAREER TRANSITION PROGRAM</h5>
                                <p  class="secondaryTextColor text-center mt-5 ">HELPING BORROWERS GET BACK ON TRACK
                                    Sometimes job loss can happen without warning. The Citadel Mortgages Career Transition
                                    Program is here to support you through this difficult time
                                </p>

                                <button type="button" style="margin-top: 40px"
                                    class="btn-block btn p-2 homeButtons">
                                    Apply Now
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 ">
                        <div class="card" style=" width: 22rem; border-radius: 10px;">
                            <div class="card-body text-center">

                                <img width="100%" src="../../images/homeImages/mortgagesProgramsImages/img3.jpeg" alt="">
                                <hr width="80px" class="ml-auto mr-auto secondaryTextColor"
                                    style="height: 2px; border-radius: 10px; opacity: 1;">
                                <h5 class="secondaryTextColor card-subtitle mt-1  mb-1">The Citadel Mortgage Social
                                    Awareness Program</h5>
                                <p class="secondaryTextColor text-center mt-4">Citadel Mortgages believes in supporting
                                    our
                                    community and the people that need our support. That is why once your mortgage closes we
                                    will make a donation to a charity or foundation on your behalf of your choice and plant
                                    a tree that you name!</p>
                                <button type="button" class="btn-block btn mt-3 p-2 homeButtons">
                                    Apply Now
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

     @include('layouts.footer')

@endsection


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/js/bootstrap.min.js"
        integrity="sha512-UR25UO94eTnCVwjbXozyeVd6ZqpaAE9naiEUBK/A+QDbfSTQFhPGj5lOR6d8tsgbBk84Ggb5A3EkjsOgPRPcKA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
