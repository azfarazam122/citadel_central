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
    {{-- ____________________________ --}}

    <section class="container ml-auto mr-auto mt-5 mb-5 ">
        <img width="100%" src="../../images/ratesImages/img1.png" alt="" srcset="">
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
@endsection
