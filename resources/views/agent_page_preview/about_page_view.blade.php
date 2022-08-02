@extends('layouts.app')
@section('libraries')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css"
        integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @php
    $url = $_SERVER['REQUEST_URI'];
    if ($url == '/agent/about' || $url == '/agent/about/') {
        $masterSettingData = App\Models\MasterSetting::all();
        $agentData = App\Models\Agent::where('id', $masterSettingData[0]->default_agent_id)->get();
        $adminData = App\Models\Admin::where('id', $masterSettingData[0]->default_admin_id)->get();
        $user = App\Models\User::where('id', $agentData[0]->user_id)->get();
    } else {
        $email = explode('/', $url);
        $email = $email[count($email) - 1];

        $user = App\Models\User::where('email', $email)->get();
        if (count($user) > 0) {
            $agentData = App\Models\Agent::where('user_id', $user[0]->id)->get();
            if (count($agentData) > 0) {
                $adminData = App\Models\Admin::where('id', $agentData[0]->admin_id)->get();
            } else {
                $masterSettingData = App\Models\MasterSetting::all();
                $agentData = App\Models\Agent::where('id', $masterSettingData[0]->default_agent_id)->get();
                $adminData = App\Models\Admin::where('id', $masterSettingData[0]->default_admin_id)->get();
                $user = App\Models\User::where('id', $agentData[0]->user_id)->get();
            }
        } else {
            $masterSettingData = App\Models\MasterSetting::all();
            $agentData = App\Models\Agent::where('id', $masterSettingData[0]->default_agent_id)->get();
            $adminData = App\Models\Admin::where('id', $masterSettingData[0]->default_admin_id)->get();
            $user = App\Models\User::where('id', $agentData[0]->user_id)->get();
        }
    }
    @endphp

    <style>
        :root {
            --primary-color: <?php echo $adminData[0]->primary_color; ?>;
            --secondary-color: <?php echo $adminData[0]->secondary_color; ?>;
            --tertiary-color: <?php echo $adminData[0]->tertiary_color; ?>;
            --primary-text-color: <?php echo $adminData[0]->primary_text_color; ?>;
            --secondary-text-color: <?php echo $adminData[0]->secondary_text_color; ?>;
            --tertiary-text-color: <?php echo $adminData[0]->tertiary_text_color; ?>;
            --fourth-text-color: <?php echo $adminData[0]->fourth_text_color; ?>;
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
            color: var(--secondary-text-color);
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
    {{-- BLADE TEMPLATE PHP --}}


    {{-- ________________________________________________________ --}}
    {{-- <h1> {{ $user }} </h1> --}}

    {{-- ____________________________ --}}
    @isset($agentData)
        @if (count($agentData) > 0)
            <div class="ms-5">
                <div class=" ms-5 row secondaryTextColor">
                    <div class="col-md-2 text-center">
                        <p>{{ $agentData[0]->full_name }}</p>
                        <p>Mortgage Agent {{ $agentData[0]->license_no }}</p>
                    </div>
                    <div class="col-md-2">
                        <p> <span><i class="fa-solid fa-envelope"></i></span> {{ $user[0]->email }}</p>
                    </div>
                    <div class="col-md-3 text-center">
                        <p> <img id="showSelectedImage" name="showSelectedImage"
                                src="../../images/profile_pic/{{ $user[0]->email }}/{{ $agentData[0]->profile_pic }}"
                                width="200">
                        </p>
                    </div>
                    <div class="col-md-2 text-end">
                        <p> <span><i class="fa-solid fa-phone"></i></span> {{ $agentData[0]->phone }}</p>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-2">
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
                            <a href={{ $agentData[0]->apply_now_link }} target="blank" type="button" name=""
                                id="" style="border: 1px solid var(--primary-color); border-radius:18px"
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
    <section class="m-5 ">
        <div class="row">
            <div class="col-md-4">
                <img width="100%" src="../../../../images/aboutImages/img1_1.png">
            </div>
            <div class="col-md-4 mt-1">
                <h3 class="display-4 mt-5 text-center secondaryTextColor">
                    About {{ $agentData[0]->full_name }}
                </h3>
                <hr class="mt-3 ms-auto me-auto primaryTextColor"
                    style="width: 80%; height: 4px; opacity: 1; border-radius: 10px;">
                <div>
                    <div>
                        <div>
                            <p class="mt-5 text-center secondaryTextColor" style="font-size: 20px">
                                <a href='/agent/home'>Home</a>
                                <strong>&gt;</strong> About
                                Me
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <img width="80%" src="../../../../images/aboutImages/img1_2.png">
            </div>
        </div>

    </section>

    {!! $agentAboutPageData !!}
    {{-- <div class="allContent">
        <section class="mt-5 container">
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <p class="mt-5 display-4 secondaryTextColor">I'm Here To Help You
                    <p class="text-left display-4 primaryTextColor">
                        Achieve Mortgage Freedom </p>
                    </p>
                    <hr class="mt-1"
                        style="width: 15%;height: 4px;opacity: 1;border-radius: 10px; color: var(--primary-color);">
                    <div>
                        <p class="mt-3 tertiaryTextColor">Kristin will take the time to understand
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

        <section class="mt-5 container">
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <p class="text-left display-4 primaryTextColor">
                        Bio </p>
                    <p></p>
                    <hr class="mt-5 primaryTextColor" style="width: 15%; height: 4px; opacity: 1; border-radius: 10px; ">
                    <div class="secondaryTextColor">
                        <p class="mt-5" style="">Whether purchasing your first home,
                            renewing your mortgage or using the equity in your home to consolidate higher-interest debt.If
                            you
                            are looking for a mortgage agent that is passionate about helping their clients, is committed
                            to going the extra mile to provide you with the best possible service and experience and is not
                            afraid to think ‘outside the box’ to get things done, look no further
                        <p class="mt-3" style=""> {{ $agentData[0]->full_name }} will
                            treat you with
                            professionalism and respect and will make sure your needs come first. She is also full of life
                            and
                            has a great sense of humor, which makes working with her fun, as well as productive</p>
                    </div>
                    <div class="col-md-8 mt-5 secondaryTextColor">
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
                <div class="col-md-6"><img width="100%" src="../../images/homeImages/img9.png" alt=""
                        srcset="">
                </div>

            </div>
        </section>

        <section class="mt-5 mb-5 container">
            <hr>
            <div class="mt-5">
                <div class="container mx-auto mt-4">
                    <div class="row">

                        <div class="col-md-4 ">
                            <div class="card h-100 " style=" width: 22rem; border-radius: 10px;">
                                <div class="card-body text-center">
                                    <hr width="80px" class="ml-auto mr-auto secondaryTextColor"
                                        style="height: 2px; border-radius: 10px;opacity: 1;">

                                    <p style="line-height: 30px;font-size: 17px;"
                                        class="text-center mt-5 tertiaryTextColor">
                                        Citadel
                                        Mortgages is
                                        one
                                        of
                                        the
                                        largest
                                        full-service Mortgage Brokerages with professional Mortgage Agents & Mortgage
                                        Brokers
                                        servicing all of GTA, Toronto, Ontario, Alberta, Saskatchewan, PEI, Newfoundland,
                                        New
                                        Brunswick, Nova Scotia, and British Columbia, Canada.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 ">
                            <div class="card h-100 " style=" width: 22rem; border-radius: 10px;">
                                <div class="card-body text-center">
                                    <hr width="80px" class="ml-auto mr-auto secondaryTextColor"
                                        style="height: 2px; border-radius: 10px;opacity: 1;">
                                    <p style="line-height: 30px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        font-size: 17px;"
                                        class="text-center  mt-5 tertiaryTextColor">
                                        HELPING
                                        BORROWERS
                                        GET
                                        BACK
                                        ON
                                        TRACK
                                        Sometimes job loss can happen without warning. The Citadel Mortgages Career
                                        Transition
                                        Program is here to support you through this difficult time
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 ">
                            <div class="card h-100 " style="width: 22rem; border-radius: 10px;">
                                <div class="card-body text-center">
                                    <hr width="80px" class="ml-auto mr-auto secondaryTextColor"
                                        style="height: 2px; border-radius: 10px;opacity: 1;">

                                    <p style="line-height: 30px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                font-size: 17px;"
                                        class="text-center mb-5  mt-5 tertiaryTextColor">
                                        Citadel
                                        Mortgages
                                        believes
                                        in
                                        supporting
                                        our
                                        community and the people that need our support. That is why once your mortgage
                                        closes we
                                        will make a donation to a charity or foundation on your behalf of your choice and
                                        plant
                                        a tree that you name!</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

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

        <section style="background-image: url('../../images/aboutImages/img7.png');width: 100%" class="mt-5">
            <div class="container mx-auto my-5 ">
                <div class="text-center display-4 secondaryTextColor" style="font-weight: 700;padding-top: 17%;">
                    Why People Choose Us
                </div>
                <div class="row " style="margin-bottom: 15%;margin-top: 5%">
                    <div class="col-md-3 my-5 text-center">
                        <img style="filter: grayscale(100%)" width="50%" src="../../images/aboutImages/img7_1.png"
                            alt="" srcset="">
                        <p class="display-6 text-center fourthTextColor" style="font-weight: 500; ">1000+</p>
                        <span class="fourthTextColor" style="font-size: 20px;font-weight: 600;">Satisfied Customers</span>
                    </div>
                    <div class="col-md-3 my-5 text-center">
                        <img style="filter: grayscale(100%)" width="50%" src="../../images/aboutImages/img7_2.png"
                            alt="" srcset="">
                        <p class="display-6 text-center fourthTextColor" style="font-weight: 500; "><i
                                class="fa-solid fa-star"></i></p>
                        <span class="fourthTextColor" style="font-size: 20px;font-weight: 600;">5 Star Google
                            Reviews</span>
                    </div>
                    <div class="col-md-3 my-5 text-center">
                        <img style="filter: grayscale(100%)" width="50%" src="../../images/aboutImages/img7_3.png"
                            alt="" srcset="">
                        <p class="display-6 text-center fourthTextColor" style="font-weight: 500; ">97%</p>
                        <span class="fourthTextColor" style="font-size: 20px;font-weight: 600;">Customer Rating</span>
                    </div>
                    <div class="col-md-3 my-5 text-center">
                        <img style="filter: grayscale(100%)" width="50%" src="../../images/aboutImages/img7_4.png"
                            alt="" srcset="">
                        <p class="display-6 text-center fourthTextColor" style="font-weight: 500; ">100%</p>
                        <span class="fourthTextColor" style="font-size: 20px;font-weight: 600;">We Get Results</span>
                    </div>
                </div>
                <div class="row">
                </div>

            </div>
        </section>

        <section class="mt-5 ">
            <hr>
            <div class="row container ml-auto mr-auto">
                <div class="col-md-6 ml-auto mr-auto">
                    <img src="../../images/aboutImages/img8.png" width="100%" alt="" srcset="">
                </div>

            </div>
        </section>
    </div> --}}
    @include('layouts.footer')
    {{-- ____________________________ --}}

@endsection


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/js/bootstrap.min.js"
        integrity="sha512-UR25UO94eTnCVwjbXozyeVd6ZqpaAE9naiEUBK/A+QDbfSTQFhPGj5lOR6d8tsgbBk84Ggb5A3EkjsOgPRPcKA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
