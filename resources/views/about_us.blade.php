@extends('layouts.app')
@section('libraries')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css"
        integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
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
            background: var(--primary-color);
        }

        .homeButtons:hover {
            background: black !important;
            color: white !important;
        }

    </style>
@endsection

@section('content')
    {{-- BLADE TEMPLATE PHP --}}
    @php
    $url = $_SERVER['REQUEST_URI'];
    if ($url == '/agent/about' || $url == '/agent/about/') {
        $user = App\Models\User::where('email', 'Tristan.kirk@citadelmortgages.ca')->get();
        $agentData = App\Models\Agent::where('user_id', $user[0]->id)->get();
    } else {
        $email = explode('/', $url);
        $email = $email[count($email) - 1];

        $user = App\Models\User::where('email', $email)->get();
        if (count($user) > 0) {
            $agentData = App\Models\Agent::where('user_id', $user[0]->id)->get();
        }
    }

    @endphp

    {{-- ________________________________________________________ --}}
    {{-- <h1> {{ $user }} </h1> --}}

    {{-- ____________________________ --}}
    @isset($agentData)
        @if (count($agentData) > 0)
            <div class="ms-5">
                <div class=" ms-5 row">
                    <div class="col-md-3 text-center">
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
                                class="customButtonWithLinks btn mt-3 btn-lg ">
                                Apply Now
                            </a>
                            <a></a>
                        </div>

                    </div>
                </div>
            </div>
        @endif
    @endisset

    {{-- ____________________________ --}}
    <section class="m-5 ">
        <div class="row">
            <div class="col-md-4">
                <img width="100%" src="../../images/aboutImages/img1_1.png">
            </div>
            <div class="col-md-4 mt-1">
                <h3 class="display-4 mt-5 text-center">
                    About {{ $agentData[0]->full_name }}
                </h3>
                <hr class="mt-3 ms-auto me-auto"
                    style="width: 80%; height: 4px; opacity: 1; border-radius: 10px; color: var(--primary-color);">
                <div>
                    <div>
                        <div>
                            <p class="mt-5 text-center" style="font-size: 20px">
                                <a href='/agent/home'>Home</a>
                                <strong>&gt;</strong> About
                                Me
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <img width="80%" src="../../images/aboutImages/img1_2.png">
            </div>
        </div>

    </section>



    {{-- ____________________________ --}}
    <section class="mt-5 container">
        <hr>
        <div class="row">
            <div class="col-md-6">
                <p class="mt-5 display-4">I'm Here To Help You
                <p class="text-left display-4" style="color: var(--primary-color)">
                    Achieve Mortgage Freedom </p>
                </p>
                <hr class="mt-1"
                    style="width: 15%;height: 4px;opacity: 1;border-radius: 10px; color: var(--primary-color);">
                <div>
                    <p class="mt-3" style="color: var(--lightTextColor);">Kristin will take the time to understand
                        your specific needs and work with you to determine the best solution for YOU</p>
                </div>
                <div class="mt-5 text-center">
                    <img width="80%" src="../../images/aboutImages/img2.png" alt="" srcset="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="col mt-5">
                    <img width="100%" src="../../images/aboutImages/img3.png" alt="" srcset="">
                    <img width="100%" src="../../images/aboutImages/img4.png" alt="" srcset="">
                </div>
            </div>
    </section>

    {{-- ____________________________ --}}
    <section class="mt-5 container">
        <hr>
        <div class="row">
            <div class="col-md-6">
                <p class="text-left display-4" style="color: var(--primary-color);">
                    Bio </p>
                <p></p>
                <hr class="mt-5"
                    style="width: 15%; height: 4px; opacity: 1; border-radius: 10px; color: var(--primary-color);">
                <div>
                    <p class="mt-5" style="">Whether purchasing your first home,
                        renewing your mortgage or using the equity in your home to consolidate higher-interest debt.If you
                        are looking for a mortgage agent that is passionate about helping their clients, is committed
                        to going the extra mile to provide you with the best possible service and experience and is not
                        afraid to think ‘outside the box’ to get things done, look no further
                    <p class="mt-3" style=""> {{ $agentData[0]->full_name }} will
                        treat you with
                        professionalism and respect and will make sure your needs come first. She is also full of life and
                        has a great sense of humor, which makes working with her fun, as well as productive</p>
                </div>
                <div class="col-md-8 mt-5">
                    <p style="font-size: 20px;">
                        <span>-</span> Residential Mortgages
                        <br> <span>-</span> Home Equity Line of Credit's
                        <br> <span>-</span> First-Time Home Buyers
                        <br> <span>-</span> Refinancing
                        <br> <span>-</span> Debt Consolidation
                        <br> <span>-</span> Private Mortgages
                        <br> <span>-</span> Rental Property Financing
                        <br> <span>-</span> Reverse Mortgages
                        <br> <span>-</span> Commercial Mortgages
                    </p>
                </div>
                <div class="mt-2 text-center"><a href={{ $agentData[0]->bio_apply_now_link }} target="_blank"
                        rel="noopener noreferrer"><button type="button" class="w-50 btn homeButtons m-3">
                            Apply Now
                        </button></a></div>
            </div>
            <div class="col-md-6"><img width="100%" src="../../images/homeImages/img9.png" alt="" srcset=""></div>

        </div>
    </section>


    {{-- ____________________________ --}}
    <section class="mt-5 mb-5 container">
        <hr>
        <div class="mt-5">
            <div class="container mx-auto mt-4">
                <div class="row">

                    <div class="col-md-4 ">
                        <div class="card h-100 " style=" width: 22rem; border-radius: 10px;">
                            <div class="card-body text-center">
                                <hr width="80px" class="ml-auto mr-auto"
                                    style="height: 2px; border-radius: 10px; color: black;opacity: 1;">

                                <p style="color: #707b89;line-height: 30px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                font-size: 17px;"
                                    class="text-center mt-5">
                                    Citadel
                                    Mortgages is
                                    one
                                    of
                                    the
                                    largest
                                    full-service Mortgage Brokerages with professional Mortgage Agents & Mortgage Brokers
                                    servicing all of GTA, Toronto, Ontario, Alberta, Saskatchewan, PEI, Newfoundland, New
                                    Brunswick, Nova Scotia, and British Columbia, Canada.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 ">
                        <div class="card h-100 " style=" width: 22rem; border-radius: 10px;">
                            <div class="card-body text-center">
                                <hr width="80px" class="ml-auto mr-auto"
                                    style="height: 2px; border-radius: 10px; color: black;opacity: 1;">
                                <p style="color: #707b89;line-height: 30px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        font-size: 17px;"
                                    class="text-center  mt-5 ">
                                    HELPING
                                    BORROWERS
                                    GET
                                    BACK
                                    ON
                                    TRACK
                                    Sometimes job loss can happen without warning. The Citadel Mortgages Career Transition
                                    Program is here to support you through this difficult time
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 ">
                        <div class="card h-100 " style="width: 22rem; border-radius: 10px;">
                            <div class="card-body text-center">
                                <hr width="80px" class="ml-auto mr-auto"
                                    style="height: 2px; border-radius: 10px; color: black;opacity: 1;">

                                <p style="color: #707b89;line-height: 30px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                font-size: 17px;"
                                    class="text-center mb-5  mt-5">
                                    Citadel
                                    Mortgages
                                    believes
                                    in
                                    supporting
                                    our
                                    community and the people that need our support. That is why once your mortgage closes we
                                    will make a donation to a charity or foundation on your behalf of your choice and plant
                                    a tree that you name!</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- ____________________________ --}}
    <section class="mt-5 container">
        <hr>
        <div>
            <img src="../../images/aboutImages/img6.png" width="100%" alt="" srcset="">
        </div>
        <div class="mt-2 text-center">
            <a href={{ $agentData[0]->about_us_apply_now_link }} target="_blank" rel="noopener noreferrer">
                <button type="button" class="w-50 btn homeButtons m-3">
                    Apply Now
                </button>
            </a>
        </div>
    </section>

    {{-- ____________________________ --}}
    <section style="background-image: url('../../images/aboutImages/img7.png');width: 100%" class="mt-5">
        <div class="container mx-auto my-5 ">
            <div class="text-center display-4" style="font-weight: 700;padding-top: 17%;">
                Why People Choose Us
            </div>
            <div class="row " style="margin-bottom: 15%;margin-top: 5%">
                <div class="col-md-3 my-5 text-center">
                    <img style="filter: grayscale(100%)" width="50%" src="../../images/aboutImages/img7_1.png" alt=""
                        srcset="">
                    <p class="display-6 text-center" style="font-weight: 500;color: white; ">1000+</p>
                    <span style="font-size: 20px;font-weight: 600;color: white;">Satisfied Customers</span>
                </div>
                <div class="col-md-3 my-5 text-center">
                    <img style="filter: grayscale(100%)" width="50%" src="../../images/aboutImages/img7_2.png" alt=""
                        srcset="">
                    <p class="display-6 text-center" style="font-weight: 500;color: white; "><i
                            class="fa-solid fa-star"></i></p>
                    <span style="font-size: 20px;font-weight: 600;color: white;">5 Star Google Reviews</span>
                </div>
                <div class="col-md-3 my-5 text-center">
                    <img style="filter: grayscale(100%)" width="50%" src="../../images/aboutImages/img7_3.png" alt=""
                        srcset="">
                    <p class="display-6 text-center" style="font-weight: 500;color: white; ">97%</p>
                    <span style="font-size: 20px;font-weight: 600;color: white;">Customer Rating</span>
                </div>
                <div class="col-md-3 my-5 text-center">
                    <img style="filter: grayscale(100%)" width="50%" src="../../images/aboutImages/img7_4.png" alt=""
                        srcset="">
                    <p class="display-6 text-center" style="font-weight: 500;color: white; ">100%</p>
                    <span style="font-size: 20px;font-weight: 600;color: white;">We Get Results</span>
                </div>
            </div>
            <div class="row">
            </div>

        </div>
    </section>

    {{-- ____________________________ --}}
    <section class="mt-5 ">
        <hr>
        <div class="row container ml-auto mr-auto">
            <div class="col-md-6 ml-auto mr-auto">
                <img src="../../images/aboutImages/img8.png" width="100%" alt="" srcset="">
            </div>

        </div>
    </section>

    {{-- ____________________________ --}}
    <footer class="mt-5 p-5" style="background: black">
        <img width="100%" src="../../images/homeImages/footerImages/img1.jpeg" alt="">
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
