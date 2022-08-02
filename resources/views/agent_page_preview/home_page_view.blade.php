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
        $masterSettingData = App\Models\MasterSetting::all();
        $agentData = App\Models\Agent::where('id', $masterSettingData[0]->default_agent_id)->get();
        $adminData = App\Models\Admin::where('id', $masterSettingData[0]->default_admin_id)->get();
        $user = App\Models\User::where('id', $agentData[0]->user_id)->get();
        // dd($masterSettingData[0]);
        // dd($agentData[0]->user_id);
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
                            <a href={{ $agentData[0]->apply_now_link }} target="blank" type="button" name=""
                                id="" style="border: 1px solid var(--primary-color); border-radius:18px"
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
    {!! $agentHomePageData !!}
    {{-- {{ $agentHomePageData }} --}}
    @include('layouts.footer')

@endsection


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/js/bootstrap.min.js"
        integrity="sha512-UR25UO94eTnCVwjbXozyeVd6ZqpaAE9naiEUBK/A+QDbfSTQFhPGj5lOR6d8tsgbBk84Ggb5A3EkjsOgPRPcKA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            console.log("ready!");
        });
    </script>
@endsection
