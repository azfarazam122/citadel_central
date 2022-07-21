@extends('layouts.app')
@section('libraries')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    {{-- BLADE TEMPLATE PHP --}}
    @php
    $url = $_SERVER['REQUEST_URI'];
    if ($url == '/agent/rates' || $url == '/agent/rates/') {
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

    $rates = App\Models\Rate::all();

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


    {{-- ________________________________________________________ --}}
    {{-- <h1> {{ count($rates) }} </h1> --}}

    {{-- ____________________________ --}}
    @isset($agentData)
        @if (count($agentData) > 0)
            <div class="container ms-auto me-auto">
                <div class="row secondaryTextColor">
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
                            <a href={{ $agentData[0]->apply_now_link }} target="blank" type="button" name=""
                                id="" style="border: 1px solid var(--primary-color); border-radius:18px"
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
    {{-- ____________________________ --}}
    <div class="allContent">
        <section class="container ml-auto mr-auto mt-5 mb-5 ">
            <img width="100%" src="../../images/ratesImages/img1.png" alt="" srcset="">
        </section>

        <section class=" text-center">
            <div>
                <img width="90%" src="../../images/ratesImages/img2.png" alt="" srcset="">
            </div>
            <div class=" my-3 text-center secondaryTextColor">
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
                    <h1 class="ms-auto me-auto fw-bold w-75 secondaryTextColor">
                        CITADEL MORTGAGES IS HELPING CANADIANS BECOME MORTGAGE AND DEBT-FREE FASTER– EXPERIENCE THE
                        DIFFERENCE
                        TODAY!
                    </h1>
                </div>
                <div class="lead px-5 secondaryTextColor">
                    <p>It is easier for you to buy a new home if you have the information to guide you through the process!
                        Download this eBook now and get the information you need to make this process as easy as possible!
                    </p>
                </div>
                <div class="my-5">
                    <button class="btn homeButtons">DOWNLOAD YOUR FREE COPY NOW</button>
                </div>
            </div>
        </section>

        <section>
            <div class="container ms-auto me-auto">
                <div class="col w-75 ms-auto me-auto secondaryTextColor">
                    <h1 class="fw-bold">BEST MORTGAGE RATES WITH CITADEL MORTGAGES GET APPROVED TODAY</h1>
                    <p class="lead">
                        Citadel Mortgages has some of the lowest rates due to our transparent process and honest approach.
                        Citadel Mortgages will help you understand how the lowest rates impact your mortgage and also that
                        it is
                        not always about the rate when you want to become mortgage-free sooner while financing your new home
                        or
                        existing home.
                        <br>
                        <br>
                        Our All In One Mortgage Solution Program allows you to tackle your debts and mortgage the right way
                        by
                        reducing your interest on all and becoming debt and mortgage-free sooner!
                        <br>
                        <br>
                        See the Difference for Yourself, Get Approved Today!
                    </p>
                    <div class="text-center">
                        <img class="ms-auto me-auto" width="40%" src="../../images/ratesImages/img4.gif" alt=""
                            srcset="">
                    </div>
                </div>
                <div class="my-5 text-center">
                    <button class="btn homeButtons">CLOSE YOUR MORTGAGE WITH US AND RECEIVE A COMPLIMENTARY HOTEL STAY FOR
                        YOUR NEXT VACATION.</button>
                </div>
            </div>
        </section>

        <section class="container my-5  text-center">
            <div>
                <h1 class="my-5 fw-bold secondaryTextColor">OUR TRUSTED LENDER PARTNERS</h1>
            </div>
            <div class="single-item">
                <div> <img src="../../images/ratesImages/carousel/img1.png" class="d-block w-75 ms-auto me-auto"
                        alt="...">
                </div>
                <div> <img src="../../images/ratesImages/carousel/img2.png" class="d-block w-75 ms-auto me-auto"
                        alt="...">
                </div>
                <div> <img src="../../images/ratesImages/carousel/img3.png" class="d-block w-75 ms-auto me-auto"
                        alt="...">
                </div>
                <div> <img src="../../images/ratesImages/carousel/img4.png" class="d-block w-75 ms-auto me-auto"
                        alt="...">
                </div>
                <div> <img src="../../images/ratesImages/carousel/img5.png" class="d-block w-75 ms-auto me-auto"
                        alt="...">
                </div>
                <div> <img src="../../images/ratesImages/carousel/img6.png" class="d-block w-75 ms-auto me-auto"
                        alt="...">
                </div>
                <div> <img src="../../images/ratesImages/carousel/img7.png" class="d-block w-75 ms-auto me-auto"
                        alt="...">
                </div>
                <div> <img src="../../images/ratesImages/carousel/img8.png" class="d-block w-75 ms-auto me-auto"
                        alt="...">
                </div>
                <div> <img src="../../images/ratesImages/carousel/img9.png" class="d-block w-75 ms-auto me-auto"
                        alt="...">
                </div>
                <div> <img src="../../images/ratesImages/carousel/img10.png" class="d-block w-75 ms-auto me-auto"
                        alt="...">
                </div>
                <div> <img src="../../images/ratesImages/carousel/img11.png" class="d-block w-75 ms-auto me-auto"
                        alt="...">
                </div>
                <div> <img src="../../images/ratesImages/carousel/img12.png" class="d-block w-75 ms-auto me-auto"
                        alt="...">
                </div>
                <div> <img src="../../images/ratesImages/carousel/img13.png" class="d-block w-75 ms-auto me-auto"
                        alt="...">
                </div>
                <div> <img src="../../images/ratesImages/carousel/img14.png" class="d-block w-75 ms-auto me-auto"
                        alt="...">
                </div>
                <div> <img src="../../images/ratesImages/carousel/img15.png" class="d-block w-75 ms-auto me-auto"
                        alt="...">
                </div>
                <div> <img src="../../images/ratesImages/carousel/img16.png" class="d-block w-75 ms-auto me-auto"
                        alt="...">
                </div>
                <div> <img src="../../images/ratesImages/carousel/img17.png" class="d-block w-75 ms-auto me-auto"
                        alt="...">
                </div>
            </div>
        </section>


        <section class="container my-5  text-center">
            <div>
                <h1 class="w-75 mt-5 fw-bold ms-auto me-auto secondaryTextColor">CITADEL MORTGAGES CHANGING THE WAY
                    MORTGAGES
                    ARE DONE!</h1>
            </div>
            <div>
                <a
                    href="https://borrowell.com/free-credit-score?gspk=dHJpc3Rhbmtpcms4ODA5&gsxid=9LxfvFjxWNmc&utm_campaign=growsumo&utm_content=tristankirk8809&utm_source=referral">
                    <img src="../../images/ratesImages/carousel/img18.png" class="d-block w-50 ms-auto me-auto"
                        alt="...">
                </a>
            </div>
            <div>
                <h1 class="w-75 mt-5 fw-bold ms-auto me-auto secondaryTextColor">BEST MORTGAGE RATES</h1>
            </div>
            <div class="row">
                <div class="col secondaryTextColor">
                    <table class="ratesTable w-100">
                        <thead>
                            <tr>
                                <th class="lead" scope="col">Term - High Ratio Purchase Rates ( Up to 95% LTV)</th>
                                <th class="lead" scope="col">Rate</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < count($rates); $i++)
                                <tr>
                                    <th>{{ $rates[$i]->name }} </th>
                                    <td>{{ number_format($rates[$i]->rate, 2) }} %</td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>

                    <table class="ms-auto me-auto my-5 ratesTable w-50 ">
                        <thead>
                            <tr>
                                <th class="lead" scope="col">Line Of Credit( HELOC )</th>
                                <td>{{ $rates[10]->rate }}</td>
                            </tr>
                        </thead>
                    </table>

                    <table class="ratesTable w-100">
                        <legend class="">REFINANCE ( UP TO 80% LTV)</legend>
                        <thead>
                            <tr>
                                <th class="lead" scope="col">Variable Rate</th>
                                <th class="lead" scope="col">2.50%</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>{{ $rates[2]->name }} </th>
                                <td>{{ number_format($rates[2]->rate, 2) }}%</td>
                            </tr>
                        </tbody>
                    </table>


                    <table class="ratesTable w-100">
                        <legend class="">PURCHASE ( UPTO 80% LTV)</legend>
                        <thead>
                            <tr>
                                <th class="lead" scope="col">Variable Rate</th>
                                <th class="lead" scope="col">2.20%</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>{{ $rates[1]->name }} </th>
                                <td>{{ number_format($rates[1]->rate, 2) }}%</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="mt-5 mb-1">
                        <a target="blank" href="https://drive.google.com/file/d/1fSiyMIF6nSyi9HfOCtUP30_IXtATHCSx/view">
                            <button class="btn homeButtons">
                                WHAT YOU NEED TO KNOW ABOUT GETTING THE LOWEST <i
                                    class="fa-solid fa-circle-arrow-down"></i>
                                RATES
                            </button>
                        </a>
                    </div>
                    <div>
                        <a target="blank"
                            href="https://borrowell.com/free-credit-score?gspk=dHJpc3Rhbmtpcms4ODA5&gsxid=9LxfvFjxWNmc&utm_campaign=growsumo&utm_content=tristankirk8809&utm_source=referral">
                            <img src="../../images/ratesImages/carousel/img18.png" class="d-block w-100 ms-auto me-auto"
                                alt="...">
                        </a>
                    </div>
                    <div class="mt-3 w-75">
                        <a href="https://api.leadconnectorhq.com/widget/survey/RMsaXDyVPDugQIKojmqf">
                            <img src="../../images/ratesImages/img5.png" class="d-block w-100 ms-auto me-auto"
                                alt="...">
                        </a>
                        <a target="blank" href="https://api.leadconnectorhq.com/widget/survey/RMsaXDyVPDugQIKojmqf">
                            <button class="mt-1 w-100 btn homeButtons">
                                Apply Now For Your New Mortgage! <i class="fa-solid fa-circle-arrow-down"></i>
                            </button>
                        </a>
                        <a href="https://api.leadconnectorhq.com/widget/survey/RMsaXDyVPDugQIKojmqf">
                            <img src="../../images/ratesImages/img6.png" class="d-block mt-1 w-100 ms-auto me-auto"
                                alt="...">
                        </a>
                    </div>
                </div>
                <div class="col secondaryTextColor">
                    <div class="ms-1 mt-3">
                        <iframe width="450" height="300" src="https://www.youtube.com/embed/NvWCQ-kLNvE"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                        </iframe>

                    </div>
                    <div style="width: 450px" class="ms-1 ms-auto me-auto">
                        <a target="blank" href="https://api.leadconnectorhq.com/widget/survey/RMsaXDyVPDugQIKojmqf">
                            <button class="mt-1 btn homeButtons">
                                CLOSE YOUR MORTGAGE WITH US AND RECEIVE A COMPLIMENTARY HOTEL STAY FOR YOUR NEXT VACATION.
                            </button>
                        </a>
                        <p class="lead text-start mt-2">
                            “Instant Approval, Conditional Approval, Pre-Approval” – Borrower subject to credit and
                            underwriting
                            approval. Not all borrowers will be approved for conventional financing or equity financing, or
                            mortgage rates shown here. Receipt of the borrower’s application does not represent an approval
                            for
                            financing or interest rate guarantee. Restrictions may apply; Annual APR is subject to approval
                            and
                            underwriting, APR includes all fees and rates calculated on a yearly term. APR varies. Contact
                            us
                            for current rates or more information on a specific product. OAC* Mortgage rates constantly
                            change;
                            please contact us for proper approval.
                        </p>
                        <a target="blank" href="https://api.leadconnectorhq.com/widget/survey/RMsaXDyVPDugQIKojmqf">
                            <button class="mt-1 btn homeButtons">
                                Find Your Home Value Now
                            </button>
                        </a>
                        <a target="blank" href="https://api.leadconnectorhq.com/widget/survey/RMsaXDyVPDugQIKojmqf">
                            <button class="mt-1 btn homeButtons">
                                Book Your Time To Talk To Us Now
                            </button>
                        </a>

                    </div>
                    <div class="m-1">
                        {{-- ____________ --}}
                        <p>
                            <button class="btn mt-3 btn-dark w-100" type="button" data-bs-toggle="collapse"
                                style="font-size: 17px" data-bs-target="#mortgageRatesCollapsableContent"
                                aria-expanded="false" aria-controls="mortgageRatesCollapsableContent">
                                Mortgage Rates <i class="ms-3 fa-solid fa-caret-down"></i>
                            </button>

                        </p>
                        <div class="collapse" id="mortgageRatesCollapsableContent">
                            <div class="card card-body lead">
                                When mortgage rates change, it can happen quite quickly. So when it comes to mortgage,
                                timing is
                                everything. Be sure to secure your mortgage rate while rates are favorable to get the best
                                deal
                                possible. Also, if you are looking to buy a home or you are thinking about changing from
                                your
                                current lender, you’ll want to do your research before you make any final decisions as the
                                mortgage rate is just as important as the terms of your mortgage. The wrong terms for your
                                mortgage could cost you thousands in extra fee or break fees!
                                <br>
                                <br>
                                Remember, all mortgages aren’t created equal, so it’s important to compare mortgage rates
                                and
                                with a mortgage broker or mortgage agent that you trust. The terms and conditions of
                                mortgages
                                vary, as do the interest rates. A mortgage should be set up to match your needs as much as
                                possible. At Citadel Mortgages, we want to equip you with the knowledge you need to make the
                                best decision for you and your family.
                            </div>
                        </div>
                        {{-- ____________ --}}

                        <div>
                            <hr>
                            <p class="lead">
                                SEE THE DIFFERENCE FOR YOURSELF, GET APPROVED TODAY!
                            </p>
                            <div>
                                <a target="blank"
                                    href="https://api.leadconnectorhq.com/widget/survey/RMsaXDyVPDugQIKojmqf">
                                    <button class="mt-1 w-100 btn homeButtons">
                                        Apply Now For Your New Mortgage! <i class="fa-solid fa-circle-arrow-down"></i>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <section class="container my-5  text-center">
            <div>
                <h1 class="mt-5 text-center fw-bold secondaryTextColor">WHICH MORTGAGE IS RIGHT FOR YOU?</h1>
            </div>
            <div class="my-5 row">
                <div class="col secondaryTextColor">
                    <div>
                        <p>
                            <button class="btn mt-3 btn-dark w-100" type="button" data-bs-toggle="collapse"
                                style="font-size: 17px" data-bs-target="#whatIsOpenMortgageCollapsableContent"
                                aria-expanded="false" aria-controls="whatIsOpenMortgageCollapsableContent">
                                What is an Open Mortgage? <i class="ms-3 fa-solid fa-caret-down"></i>
                            </button>

                        </p>
                        <div class="collapse" id="whatIsOpenMortgageCollapsableContent">
                            <div class="card card-body lead">
                                An “open-term mortgage” is an appealing option to those who plan on paying off their
                                mortgage
                                sooner rather than later. This type of mortgage can be repaid fully or partially at any time
                                without prepayment interest fees. If you want to convert them to another term, you can do so
                                at
                                anytime again without prepayment interest fees. The interest rates for open mortgages tend
                                to be
                                higher than those of closed mortgages because they have such flexibility and options for you
                                as
                                a client. Keep in mind these types of mortgages may have other fees involved as well, so it
                                is
                                best to talk to one of our mortgage agents to ensure you understand all the terms!

                            </div>
                        </div>
                    </div>
                    <div>
                        <p>
                            <button class="btn mt-3 btn-dark w-100" type="button" data-bs-toggle="collapse"
                                style="font-size: 17px" data-bs-target="#whatIsClosedMortgageCollapsableContent"
                                aria-expanded="false" aria-controls="whatIsClosedMortgageCollapsableContent">
                                What is a Closed Mortgage? <i class="ms-3 fa-solid fa-caret-down"></i>
                            </button>

                        </p>
                        <div class="collapse" id="whatIsClosedMortgageCollapsableContent">
                            <div class="card card-body lead">
                                A “closed-term mortgage” is the most common choice for people who aren’t planning to pay off
                                their mortgage in the near future. The interest rates for closed term mortgages tend to be
                                lower
                                than that of open mortgages. With closed term mortgages, you’re able to save on interest
                                costs,
                                and hopefully, this will help you to pay your mortgage back faster. Fixed or variable
                                options
                                are available for closed term mortgages, but there’s a restriction on the principal amount
                                that
                                you can pay towards our mortgage each year.
                                <br>
                                <br>
                                If you want to renegotiate your rate, you will need to pay a prepayment charge. Also, you
                                will
                                need to pay this prepayment charge, if you wish to pay off the balance of your mortgage
                                before
                                the end of the term or if you want to prepay more money than your mortgage will allow you
                                to.
                                <br>
                                <br>
                                Also there are some closed mortgages that you are not allowed to pay off the mortgage at all
                                until end of term which can make it hard to do refinancing in the future, again these are
                                common
                                terms that can cost thousand of dollars in the future and it is best to ask one of our
                                mortgage
                                agents to assist you in obtaining your mortgage so we can explain all the terms to ensure a
                                smooth mortgage transaction.
                            </div>
                        </div>
                    </div>
                    <div>
                        <p>
                            <button class="btn mt-3 btn-dark w-100" type="button" data-bs-toggle="collapse"
                                style="font-size: 17px" data-bs-target="#prepaymentChargesCollapsableContent"
                                aria-expanded="false" aria-controls="prepaymentChargesCollapsableContent">
                                Prepayment Charges <i class="ms-3 fa-solid fa-caret-down"></i>
                            </button>

                        </p>
                        <div class="collapse" id="prepaymentChargesCollapsableContent">
                            <div class="card card-body lead">
                                With prepayment charges, you have the flexibility to increase your monthly payments or to
                                pay
                                the whole thing off. Contact our team of mortgage agents to find out more about your
                                prepayment
                                options.

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/500w9fp4Meg"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>

            <div class="mt-5">
                <h1 class="text-center fw-bold secondaryTextColor">COMPARISON: <span class="primaryTextColor"> VARIABLE
                    </span> VS <span class="primaryTextColor"> FIXED </span> MORTGAGE RATES </h1>
            </div>
            <div class="row mt-4 secondaryTextColor">
                <div class="col">
                    <div class="m-1">
                        <h2 class="text-center ">FIXED MORTGAGE RATES</h2>
                        <p class="lead text-start">
                            More than 50% of Canadians have fixed mortgage rates, which means the monthly payment stays the
                            same
                            over the full term. You are protected against fluctuating interest rates so that it can set up,
                            and
                            you
                            don’t have to worry about it. This may be the best option for you if you want stability, but we
                            have
                            to
                            look at your complete financial picture to ensure this.
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="m-1">
                        <h2 class="text-center ">VARIABLE MORTGAGE RATES</h2>
                        <p class="lead text-start">
                            With a variable mortgage, your rates are typically lower, but they will vary over the term. Your
                            payments will be based on market behavior, and this will affect how much you are paying. The
                            amount
                            you
                            are paying will change over time but can also reduce the amount of interest you pay over your
                            mortgage
                            term or even help you pay off your mortgage faster.
                        </p>
                    </div>
                </div>
            </div>

            <div class="mt-5 secondaryTextColor">
                <h1 class="text-center fw-bold">WHAT WE OFFER</h1>
                <p class="lead text-center">
                    At Citadel Mortgages, our knowledgeable mortgage agents can provide you with our best mortgage rates
                    that
                    fit your mortgage needs.
                    <br>
                    <br>
                    See the Difference for Yourself, Get Approved Today!
                </p>
                <a target="blank" href="https://api.leadconnectorhq.com/widget/survey/RMsaXDyVPDugQIKojmqf">
                    <button class="mt-1 btn homeButtons text-uppercase">
                        Discover Citadel Mortgages
                    </button>
                </a>
                <br>
                <a target="blank" href="https://api.leadconnectorhq.com/widget/survey/RMsaXDyVPDugQIKojmqf">
                    <button class="mt-5 btn homeButtons">
                        CLOSE YOUR MORTGAGE WITH US AND RECEIVE A COMPLIMENTARY HOTEL STAY FOR YOUR NEXT VACATION.
                    </button>
                </a>
                <div class="my-5">
                    <h1 class="text-center fw-bold">YOUR JOURNEY PRODUCTS</h1>
                    <a target="blank" href="https://app.canadianmortgageapp.com/app/citadelmortgages">
                        <img src="../../images/ratesImages/img7.png" class="d-block mt-1 w-75 ms-auto me-auto"
                            alt="...">
                    </a>
                </div>
            </div>
        </section>

        <section class="container text-center" style="margin-top: 10%">
            <div class="mt-5 secondaryTextColor">
                <h1 class="fw-bold mt-5">BEST MORTGAGE RATES</h1>
                <h1 class="fw-bold mt-1">WHAT MORTGAGE RATE IS BEST FOR ME</h1>
            </div>
            <div class="secondaryTextColor">
                <div class="card-group">
                    <div style="border: 1px solid black" class="card m-2">
                        <div class="card-body">
                            <h3 class="card-title">FIXED RATE MORTGAGES</h3>
                            <P class="lead">
                                <i class="fa-solid fa-check"></i> Get a locked in, competitive rate.
                            </P>
                            <p class="lead">Ideal if you want protection against interest rate increases or have a
                                fixed payment over the term of your mortgage..</p>
                            <div>
                                <h3>5 YEAR FIXED HIGH RATIO RATE <br> ( UP TO 95% LTV)</h3>
                                <h1>3.79%</h1>
                                <hr>
                                <h3>5 YEAR FIXED REFINANCED RATE <br> ( UP TO 80% LTV)</h3>
                                <h1>4.24%</h1>
                            </div>
                        </div>

                    </div>
                    <div style="border: 1px solid black" class="card m-2">
                        <div class="card-body">
                            <h3 class="card-title">VARIABLE-RATE MORTGAGES</h3>
                            <P class="lead">
                                <i class="fa-solid fa-check"></i> Get a lower rate that changes with the market.
                            </P>
                            <p class="lead">Ideal if you want to save money if interest rates go down.</p>
                            <div class="mt-5">
                                <h3>5 YEAR VARIABLE HIGH RATIO <br> ( UP TO 95% LTV)</h3>
                                <h1>1.95%</h1>
                                <hr>
                                <h3>5 YEAR VARIABLE REFINANCED <br> ( UP TO 80% LTV)</h3>
                                <h1>2.20%</h1>
                            </div>
                        </div>

                    </div>
                    <div style="border: 1px solid black" class="card m-2">
                        <div class="card-body">
                            <h3 class="card-title">CITADEL ALL IN ONE MORTGAGE SOLUTION</h3>
                            <P class="lead">
                                <i class="fa-solid fa-check"></i>
                                Learn How to become mortgage free 7-8 years sooner today!
                            </P>
                            <p class="lead">Combine a mortgage with a home equity line of credit to pay your mortgage
                                off faster, while having a readvacable line of credit to use in the future!</p>
                            <div>
                                <h3>5 YEAR FIXED RATE </h3>
                                <h1>3.69%</h1>
                                <hr>
                                <h3>HELOC RATE </h3>
                                <h1>3.30%</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <a target="blank" href="https://citadelmortgages.ca/best-mortgage-rates/">
                        <button class="mt-5 btn homeButtons">
                            SEE ALL OUR MORTGAGE RATES
                        </button>
                    </a>
                </div>
                <div class="col text-center">
                    <a target="blank" href="https://api.leadconnectorhq.com/widget/survey/RMsaXDyVPDugQIKojmqf">
                        <button class="mt-5 btn homeButtons">
                            TALK TO A CITADEL MORTGAGE AGENT APPLY NOW
                        </button>
                    </a>
                </div>
            </div>
            <p class="lead fw-bold mt-5 secondaryTextColor">
                Receive up to 1,000 Air Miles Reward Miles
                <br>
                Receive up to $2,500 cash back
                <br>
                *Some conditions apply, mortgage must close.
            </p>
            <a target="blank"
                href="https://borrowell.com/free-credit-score?gspk=dHJpc3Rhbmtpcms4ODA5&gsxid=159N0GT3T9Ru&utm_campaign=growsumo&utm_content=tristankirk8809&utm_source=referral">
                <img src="../../images/ratesImages/img8.png" class="d-block mt-4 w-50 ms-auto me-auto" alt="...">
            </a>
        </section>


        <section class="container text-center" style="margin-top: 10%">
            <div class="secondaryTextColor">
                <h1 class="fw-bold text-center">NEW MORTGAGE RULES FAQ</h1>
                <p class="lead">Even if you have 15 to 20% of the property value for down payment, it may not be
                    enough to qualify for a loan, under the new rules, from a traditional lender such as a bank. As of
                    January
                    1, 2018, new regulations were put in place, which makes it harder for first-time home-buyers and even
                    experienced home-buyers to secure the mortgage loan they need.</p>
            </div>
            {{-- FAQ COLLAPSABLE CONTENT --}}
            <div class="w-75 ms-auto me-auto secondaryTextColor">
                <div>
                    <p>
                        <button class="btn mt-3 btn-dark w-100" type="button" data-bs-toggle="collapse"
                            style="font-size: 17px" data-bs-target="#FAQ_1_CollapsableContent" aria-expanded="false"
                            aria-controls="FAQ_1_CollapsableContent">
                            How does this affect the mortgage client with a down payment/equity of 20% or more? <i
                                class="ms-3 fa-solid fa-caret-down"></i>
                        </button>

                    </p>
                    <div class="collapse" id="FAQ_1_CollapsableContent">
                        <div class="card card-body lead">
                            The most significant impact will be on the amount for which the home buyer/owner will be able to
                            qualify. Previously, the home buyer/owner qualified at the contract rate offered by the lender.
                            While
                            the actual mortgage payment will still be paid at the contract rate, a higher calculation will
                            be
                            used
                            for qualification purposes.
                        </div>
                    </div>
                </div>
                <div>
                    <p>
                        <button class="btn mt-3 btn-dark w-100" type="button" data-bs-toggle="collapse"
                            style="font-size: 17px" data-bs-target="#FAQ_2_CollapsableContent" aria-expanded="false"
                            aria-controls="FAQ_2_CollapsableContent">
                            Do I still have the option to refinance my home with these new mortgage rules? <i
                                class="ms-3 fa-solid fa-caret-down"></i>
                        </button>

                    </p>
                    <div class="collapse" id="FAQ_2_CollapsableContent">
                        <div class="card card-body lead">
                            Yes, home owners will still have the ability to refinance up to 80% of the value of their
                            property.
                            You
                            will have to pass the same stress test, which is the higher of the Bank of Canada five-year
                            benchmark
                            rate OR the contract rate from the lender plus 2%
                        </div>
                    </div>
                </div>
                <div>
                    <p>
                        <button class="btn mt-3 btn-dark w-100" type="button" data-bs-toggle="collapse"
                            style="font-size: 17px" data-bs-target="#FAQ_3_CollapsableContent" aria-expanded="false"
                            aria-controls="FAQ_3_CollapsableContent">
                            What happens to the bundle mortgages some of the lenders offered ? <i
                                class="ms-3 fa-solid fa-caret-down"></i>
                        </button>

                    </p>
                    <div class="collapse" id="FAQ_3_CollapsableContent">
                        <div class="card card-body lead">
                            Mortgage lenders (excluding credit unions and private lenders) are prohibited from arranging
                            with
                            another lender: a mortgage, or a combination of a mortgage and other lending products, in any
                            form
                            that
                            circumvents the institution’s maximum LTV ratio or other limits in its residential mortgage
                            underwriting
                            policy, or any requirements established by law. This is often referred to as “bundling” or
                            “bundle
                            partnership.”
                        </div>
                    </div>
                </div>
                <div>
                    <p>
                        <button class="btn mt-3 btn-dark w-100" type="button" data-bs-toggle="collapse"
                            style="font-size: 17px" data-bs-target="#FAQ_4_CollapsableContent" aria-expanded="false"
                            aria-controls="FAQ_4_CollapsableContent">
                            What does this mean? <i class="ms-3 fa-solid fa-caret-down"></i>
                        </button>

                    </p>
                    <div class="collapse" id="FAQ_4_CollapsableContent">
                        <div class="card card-body lead">
                            For example, a client applies for a mortgage with an 80% LTV, and the lender can only approve
                            65%.
                            The
                            lender then partners with a second lender for the additional 15%. The original lender then
                            “bundles”
                            the
                            15% LTV mortgage with the initial 65% mortgage to form the complete 80% LTV loan. This is no
                            longer
                            permitted as per OSFI.
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div>
                <a target="blank" href="https://api.leadconnectorhq.com/widget/survey/RMsaXDyVPDugQIKojmqf">
                    <button class="mt-3 btn homeButtons">
                        GET APPROVED TODAY <i class="fa-solid fa-circle-arrow-down"></i>
                    </button>
                </a>
            </div>

            <div class="w-75 ms-auto me-auto">
                <a target="blank" href="https://api.leadconnectorhq.com/widget/survey/RMsaXDyVPDugQIKojmqf">
                    <button style="background: var(--tertiary-color);" class="mt-3 btn homeButtons secondaryTextColor">
                        CITADEL MORTGAGES NOW OFFERS AIR MILES® REWARD MILES. GET UP TO 1,000 MILES ON EVERY MORTGAGE THAT
                        CLOSES WITH CITADEL MORTGAGES. <i class="fa-solid fa-circle-arrow-down"></i>
                    </button>
                </a>
            </div>

        </section>

        <section class="text-center mt-5" style="background: var(--tertiary-color)">
            <div class="container secondaryTextColor">
                <div class="pt-3">
                    <h1 class="fw-bold  ">LET'S GET STARTED</h1>
                </div>
                <div class="row container mt-5">
                    <div class="col">
                        <div>
                            <a target="blank" href="https://tawk.to/chat/59a441f5b6e907673de0a1a0/default">
                                <i aria-hidden="true" style="font-size: 50px;color: var(--primary-color);"
                                    class="fab fa-rocketchat"></i>
                            </a>
                            <h3 class="mt-3 ">Chat Live With Us Now</h3>
                        </div>
                    </div>
                    <div class="col">
                        <div>
                            <a target="blank" href="https://tawk.to/chat/59a441f5b6e907673de0a1a0/default">
                                <i aria-hidden="true" style="font-size: 50px;color: var(--primary-color);"
                                    class="fas fa-mobile-alt"></i>
                            </a>
                            <h3 class="mt-3 fw-bold">Request a call</h3>
                        </div>
                    </div>
                    <div class="col">
                        <div>
                            <a target="blank" href="https://tawk.to/chat/59a441f5b6e907673de0a1a0/default">
                                <i aria-hidden="true" style="font-size: 50px;color: var(--primary-color);"
                                    class="far fa-building"></i>
                            </a>
                            <h3 class="mt-3 fw-bold">Find a Mortgage Agent</h3>
                        </div>
                    </div>
                </div>
                <div class="my-5  pb-5">
                    <p style="text-align: center;">Call us:
                        <a href="tel:18665258622">1-866-600-8762 .</a>
                        |
                        <a href="https://citadel-mortgages.mtg-app.com/signup?refId=27a13cdd-df6c-40d6-b26e-2294630b5081"
                            target="blank">
                            <span> Start your mortgage journey apply now</span>
                        </a>
                    </p>
                </div>
            </div>
        </section>

        <section class="container mt-5">
            <div class="row">
                <div class="col">
                    <a target="blank" href="https://citadelmortgages.ca/air-miles/">
                        <img src="../../images/ratesImages/img9.png" class="d-block mt-1 w-100 me-2" alt="...">
                    </a>
                </div>

                <div class="col">
                    <a target="blank" href="http://yourhomejourney.ca/">
                        <img src="../../images/ratesImages/img10.png" class="d-block mt-1 w-100 ms-2" alt="...">
                    </a>
                </div>
            </div>
        </section>

        <section class="text-center mt-5" style="background: var(--tertiary-color)">
            <div class="container secondaryTextColor">
                <div class="pt-3">
                    <h1 class="fw-bold  ">FIND OUT HOW MUCH HOME YOU CAN AFFORD</h1>
                </div>
                <div class="row container mt-5">
                    <div class="col">
                        <div>
                            <a target="blank"
                                href="https://yourmortgagecalculators.ca/calculators/mortgagefreesooner.php">
                                <i aria-hidden="true" style="font-size: 70px;color: var(--primary-color);"
                                    class="fas fa-calculator"></i>
                            </a>
                            <div>
                                <a target="blank"
                                    href="https://yourmortgagecalculators.ca/calculators/mortgagefreesooner.php">
                                    <button class="mt-3 p-2 btn homeButtons" style="background: #c6c6c7 ;color: black;">
                                        BECOME MORTGAGE FREE SOONER <i class="fa-solid ms-2 fa-angle-right"></i>
                                    </button>
                                </a>
                            </div>
                            <p class="mt-3">See how you can save and become mortgage free sooner</p>
                        </div>
                    </div>
                    <div class="col">
                        <div>
                            <a target="blank" href="https://yourmortgagecalculators.ca/calculators/">
                                <i aria-hidden="true" style="font-size: 70px;color: var(--primary-color);"
                                    class="fas fa-calculator"></i>
                            </a>
                            <div>
                                <a target="blank" href="https://yourmortgagecalculators.ca/calculators/">
                                    <button class="mt-3 p-2 btn homeButtons" style="background: #c6c6c7 ;color: black;">
                                        MORTGAGE PAYMENT CALCULATOR <i class="fa-solid ms-2 fa-angle-right"></i>
                                    </button>
                                </a>
                            </div>
                            <p class="mt-3">Calculate how much you’d spend each month to buy a home or renew or
                                refinance your mortgage.</p>
                        </div>
                    </div>
                    <div class="col">
                        <div>
                            <a target="blank" href="https://yfj.wealthdesk.com.au/my/home">
                                <i aria-hidden="true" style="font-size: 70px;color: var(--primary-color);"
                                    class="far fa-money-bill-alt"></i>
                            </a>
                            <div>
                                <a target="blank" href="https://yfj.wealthdesk.com.au/my/home">
                                    <button class="mt-3 p-2 btn homeButtons" style="background: #c6c6c7 ;color: black;">
                                        3. YOUR FINANCIAL JOURNEY <i class="fa-solid ms-2 fa-angle-right"></i>
                                    </button>
                                </a>
                            </div>
                            <p class="mt-3">
                                Start thinking about how much you spend each month, create a budget, and start saving up for
                                your home.
                            </p>
                        </div>
                    </div>
                </div>
                <div class=" pb-4">

                </div>
            </div>
        </section>



        <section class="text-center mt-5" style="background: var(--tertiary-color)">
            <div class="container py-5">
                <div>
                    <h1 class="fw-bold secondaryTextColor">
                        OUR PARTNERS
                    </h1>
                </div>
                <div class="row ">
                    <div class="col m-1">
                        <a target="blank" href="https://www.airmiles.ca/en/offers/partners/citadel_mortgages.html">
                            <img src="../../images/ratesImages/img11.png" class="d-block mt-4 w-50 ms-auto me-auto"
                                alt="...">
                        </a>
                    </div>
                    <div class="col m-1">
                        <a target="blank" href="https://www.airmiles.ca/en/offers/partners/citadel_mortgages.html">
                            <img src="../../images/ratesImages/img12.png" class="d-block w-100 ms-auto me-auto"
                                alt="...">
                        </a>
                    </div>
                    <div class="col m-1">
                        <a target="blank" href="https://www.airmiles.ca/en/offers/partners/citadel_mortgages.html">
                            <img src="../../images/ratesImages/img13.png" class="d-block mt-4 w-100 ms-auto me-auto"
                                alt="...">
                        </a>
                    </div>
                    <div class="col m-1">
                        <a target="blank" href="https://www.airmiles.ca/en/offers/partners/citadel_mortgages.html">
                            <img src="../../images/ratesImages/img14.png" class="d-block mt-4 w-100 ms-auto me-auto"
                                alt="...">
                        </a>
                    </div>
                    <div class="col m-1">
                        <a target="blank" href="https://www.airmiles.ca/en/offers/partners/citadel_mortgages.html">
                            <img src="../../images/ratesImages/img15.png" class="d-block mt-4 w-100 ms-auto me-auto"
                                alt="...">
                        </a>
                    </div>
                </div>
                <div class="row ">
                    <div class="col m-1">
                        <a target="blank" href="https://www.airmiles.ca/en/offers/partners/citadel_mortgages.html">
                            <img src="../../images/ratesImages/img16.png" class="d-block mt-4 w-100 ms-auto me-auto"
                                alt="...">
                        </a>
                    </div>
                    <div class="col m-1">
                        <a target="blank" href="https://www.airmiles.ca/en/offers/partners/citadel_mortgages.html">
                            <img src="../../images/ratesImages/img17.png" class="d-block  w-100 ms-auto me-auto"
                                alt="...">
                        </a>
                    </div>
                    <div class="col m-1">
                        <a target="blank" href="https://www.airmiles.ca/en/offers/partners/citadel_mortgages.html">
                            <img src="../../images/ratesImages/img18.png" class="d-block mt-4 w-75 ms-auto me-auto"
                                alt="...">
                        </a>
                    </div>
                    <div class="col m-1">
                        <a target="blank" href="https://www.airmiles.ca/en/offers/partners/citadel_mortgages.html">
                            <img src="../../images/ratesImages/img19.png" class="d-block mt-4 w-75 ms-auto me-auto"
                                alt="...">
                        </a>
                    </div>
                    <div class="col m-1">
                        <a target="blank" href="https://www.airmiles.ca/en/offers/partners/citadel_mortgages.html">
                            <img src="../../images/ratesImages/img20.png" class="d-block mt-4 w-100 ms-auto me-auto"
                                alt="...">
                        </a>
                    </div>
                </div>
            </div>

        </section>

        <section class="text-center mt-5" style="background: var(--tertiary-color)">
            <div class="container py-5">
                <div>
                    <p class="display-5 fw-bold secondaryTextColor">
                        OUR AWARDS
                    </p>
                </div>
                <div class=" m-1">
                    <a target="blank" href="https://www.airmiles.ca/en/offers/partners/citadel_mortgages.html">
                        <img src="../../images/ratesImages/img2.png" class="d-block mt-4 w-100 ms-auto me-auto"
                            alt="...">
                    </a>
                </div>
            </div>
        </section>
    </div>

    <footer class="mt-5 p-5" style="background: var(--secondary-color)">
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
