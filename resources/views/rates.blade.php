@extends('layouts.app')
@section('libraries')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
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

        .ratesTable thead tr :nth-child(1),
        .ratesTable tbody tr :nth-child(1) {
            text-align: left;
        }

        .ratesTable thead tr :nth-child(2),
        .ratesTable tbody tr :nth-child(2) {
            text-align: Right;
        }

    </style>
@endsection

@section('content')
    {{-- BLADE TEMPLATE PHP --}}
    @php
    $url = $_SERVER['REQUEST_URI'];
    if ($url == '/agent/rates' || $url == '/agent/rates/') {
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

    $rates = App\Models\Rate::all();

    @endphp

    {{-- ________________________________________________________ --}}
    <h1> {{ count($rates) }} </h1>

    {{-- ____________________________ --}}
    @isset($agentData)
        @if (count($agentData) > 0)
            <div class="container ms-auto me-auto">
                <div class="row">
                    <div class="col text-center">
                        {{-- <h1>{{ app('request')->input('name') }}</h1> --}}
                        <p>{{ $agentData[0]->full_name }}</p>
                        <p>Mortgage Agent {{ $agentData[0]->license_no }}</p>
                    </div>
                    <div class="col text-center">
                        <p> <span><i class="fa-solid fa-envelope"></i></span> {{ $user[0]->email }}</p>
                    </div>
                    <div class="col text-center">
                        <p> <span><i class="fa-solid fa-phone"></i></span> {{ $agentData[0]->phone }}</p>
                    </div>
                    <div class="col text-end">
                        <a target="blank" class="me-3" href={{ $agentData[0]->facebook_link }}><i
                                style="font-size: 30px; color: #3B579D;" class="fa-brands fa-facebook"></i></a>
                        <a target="blank" class="me-3" href={{ $agentData[0]->linkedin_link }}><i
                                style="font-size: 30px; color: #1D8CB5" class="fa-brands fa-linkedin"></i>
                        </a>
                        <a target="blank" class="me-3" href={{ $agentData[0]->instagram_link }}><i
                                style="font-size: 30px; color: #DF1438;" class="fa-brands fa-instagram"></i></a>
                        <a target="blank" class="me-3" href={{ $agentData[0]->twitter_link }}><i
                                style="font-size: 30px;color: #5DA9DD;" class="fa-brands fa-twitter"></i></a>

                        <div>
                            <a href={{ $agentData[0]->apply_now_link }} target="blank" type="button" name="" id=""
                                style="border: 1px solid var(--primary-color); border-radius:18px"
                                class="customButtonWithLinks m-3 col-md-7 btn btn-lg ">
                                Apply Now
                            </a>
                            <a></a>
                        </div>

                    </div>
                </div>
            </div>
        @endif
    @endisset
    <section class="container ml-auto mr-auto mt-5 mb-5 ">
        <img width="100%" src="../../images/ratesImages/img1.png" alt="" srcset="">
    </section>
    {{-- ____________________________ --}}
    <section class=" text-center">
        <div>
            <img width="90%" src="../../images/ratesImages/img2.png" alt="" srcset="">
        </div>
        <div class=" my-3 text-center">
            <h1>Featured On </h1>
        </div>
        <div class="row container ms-auto me-auto">
            <div class="col">
                <img width="90%" src="../../images/ratesImages/img3_1.png" alt="" srcset="">
            </div>
            <div class="col">
                <img width="90%" src="../../images/ratesImages/img3_2.png" alt="" srcset="">

            </div>
            <div class="col">
                <img width="90%" src="../../images/ratesImages/img3_3.png" alt="" srcset="">

            </div>
            <div class="col">
                <img width="90%" src="../../images/ratesImages/img3_4.png" alt="" srcset="">

            </div>
        </div>

        <div class="col my-5 container ms-auto me-auto">
            <div class="text-center">
                <h1 class="ms-auto me-auto fw-bold w-75">
                    CITADEL MORTGAGES IS HELPING CANADIANS BECOME MORTGAGE AND DEBT-FREE FASTER– EXPERIENCE THE DIFFERENCE
                    TODAY!
                </h1>
            </div>
            <div class="lead px-5 ">
                <p>It is easier for you to buy a new home if you have the information to guide you through the process!
                    Download this eBook now and get the information you need to make this process as easy as possible!</p>
            </div>
            <div class="my-5">
                <button class="btn homeButtons">DOWNLOAD YOUR FREE COPY NOW</button>
            </div>
        </div>
    </section>


    {{-- ____________________________ --}}
    <section>
        <div class="container ms-auto me-auto">
            <div class="col w-75 ms-auto me-auto">
                <h1 class="fw-bold">BEST MORTGAGE RATES WITH CITADEL MORTGAGES GET APPROVED TODAY</h1>
                <p class="lead">
                    Citadel Mortgages has some of the lowest rates due to our transparent process and honest approach.
                    Citadel Mortgages will help you understand how the lowest rates impact your mortgage and also that it is
                    not always about the rate when you want to become mortgage-free sooner while financing your new home or
                    existing home.
                    <br>
                    <br>
                    Our All In One Mortgage Solution Program allows you to tackle your debts and mortgage the right way by
                    reducing your interest on all and becoming debt and mortgage-free sooner!
                    <br>
                    <br>
                    See the Difference for Yourself, Get Approved Today!
                </p>
                <div class="text-center">
                    <img class="ms-auto me-auto" width="40%" src="../../images/ratesImages/img4.gif" alt="" srcset="">
                </div>
            </div>
            <div class="my-5 text-center">
                <button class="btn homeButtons">CLOSE YOUR MORTGAGE WITH US AND RECEIVE A COMPLIMENTARY HOTEL STAY FOR
                    YOUR NEXT VACATION.</button>
            </div>
        </div>
    </section>

    {{-- ____________________________ --}}
    <section class="container my-5  text-center">
        <div>
            <h1 class="my-5 fw-bold">OUR TRUSTED LENDER PARTNERS</h1>
        </div>
        <div class="single-item">
            <div> <img src="../../images/ratesImages/carousel/img1.png" class="d-block w-75 ms-auto me-auto" alt="...">
            </div>
            <div> <img src="../../images/ratesImages/carousel/img2.png" class="d-block w-75 ms-auto me-auto" alt="...">
            </div>
            <div> <img src="../../images/ratesImages/carousel/img3.png" class="d-block w-75 ms-auto me-auto" alt="...">
            </div>
            <div> <img src="../../images/ratesImages/carousel/img4.png" class="d-block w-75 ms-auto me-auto" alt="...">
            </div>
            <div> <img src="../../images/ratesImages/carousel/img5.png" class="d-block w-75 ms-auto me-auto" alt="...">
            </div>
            <div> <img src="../../images/ratesImages/carousel/img6.png" class="d-block w-75 ms-auto me-auto" alt="...">
            </div>
            <div> <img src="../../images/ratesImages/carousel/img7.png" class="d-block w-75 ms-auto me-auto" alt="...">
            </div>
            <div> <img src="../../images/ratesImages/carousel/img8.png" class="d-block w-75 ms-auto me-auto" alt="...">
            </div>
            <div> <img src="../../images/ratesImages/carousel/img9.png" class="d-block w-75 ms-auto me-auto" alt="...">
            </div>
            <div> <img src="../../images/ratesImages/carousel/img10.png" class="d-block w-75 ms-auto me-auto" alt="...">
            </div>
            <div> <img src="../../images/ratesImages/carousel/img11.png" class="d-block w-75 ms-auto me-auto" alt="...">
            </div>
            <div> <img src="../../images/ratesImages/carousel/img12.png" class="d-block w-75 ms-auto me-auto" alt="...">
            </div>
            <div> <img src="../../images/ratesImages/carousel/img13.png" class="d-block w-75 ms-auto me-auto" alt="...">
            </div>
            <div> <img src="../../images/ratesImages/carousel/img14.png" class="d-block w-75 ms-auto me-auto" alt="...">
            </div>
            <div> <img src="../../images/ratesImages/carousel/img15.png" class="d-block w-75 ms-auto me-auto" alt="...">
            </div>
            <div> <img src="../../images/ratesImages/carousel/img16.png" class="d-block w-75 ms-auto me-auto" alt="...">
            </div>
            <div> <img src="../../images/ratesImages/carousel/img17.png" class="d-block w-75 ms-auto me-auto" alt="...">
            </div>
        </div>
    </section>


    {{-- ____________________________ --}}
    <section class="container my-5  text-center">
        <div>
            <h1 class="w-75 mt-5 fw-bold ms-auto me-auto">CITADEL MORTGAGES CHANGING THE WAY MORTGAGES ARE DONE!</h1>
        </div>
        <div>
            <a
                href="https://borrowell.com/free-credit-score?gspk=dHJpc3Rhbmtpcms4ODA5&gsxid=9LxfvFjxWNmc&utm_campaign=growsumo&utm_content=tristankirk8809&utm_source=referral">
                <img src="../../images/ratesImages/carousel/img18.png" class="d-block w-50 ms-auto me-auto" alt="...">
            </a>
        </div>
        <div>
            <h1 class="w-75 mt-5 fw-bold ms-auto me-auto">BEST MORTGAGE RATES</h1>
        </div>
        <div>
            {{-- count($rates) --}}
            <table class="ratesTable w-50">
                <thead>
                    <tr>
                        <th scope="col">Term - High Ratio Purchase Rates ( Up to 95% LTV)</th>
                        <th scope="col">Rate</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < count($rates); $i++)
                        <tr>
                            <th>{{ $rates[$i]->name }}</th>
                            <td>{{ $rates[$i]->rate }}</td>
                        </tr>
                    @endfor


                </tbody>
            </table>
        </div>
    </section>






    <footer class="mt-5 p-5" style="background: black">
        <img width="100%" src="../../images/homeImages/footerImages/img1.jpeg" alt="">
        <div class="container mx-auto mt-4">

            <div class="row">
                <div class="col">
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

                {{-- <div class="col-md-2"></div> --}}

                <div class="col">
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
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $(document).ready(function() {
            // single-item
            $('.single-item').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 500,
                arrows: false,
            });
        });
    </script>
@endsection
