@extends('layouts.app')


@section('libraries')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css"
        integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g=="
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
    </style>
@endsection

@php
$url = $_SERVER['REQUEST_URI'];
if ($url == '/register' || $url == '/register/') {
    $masterSettingData = App\Models\MasterSetting::all();
    $adminData = App\Models\Admin::where('id', $masterSettingData[0]->default_admin_id)->get();
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
            $adminData = App\Models\Admin::where('id', $masterSettingData[0]->default_admin_id)->get();
        }
    } else {
        $masterSettingData = App\Models\MasterSetting::all();
        $adminData = App\Models\Admin::where('id', $masterSettingData[0]->default_admin_id)->get();
    }
}
@endphp
@section('content')
    <div class="backgroundStyle"
        style="border-bottom: 125vh solid #dbac28;border-left: 100vw solid transparent;                                                                                                                                                                                                                                                                  position: absolute; z-index: -1;">
    </div>
    {{-- ____________________________ --}}
    <div class="container text-center pl-5 pb-5 pr-5 bg-white"
        style="width: 100%;border-radius: 7px;    background: #ebe9e9 !important;">
        <div class="p-3" style="background: black;color: white; margin-left: -50px;margin-right: -50px">
            <p class="display-5 text-capitalize">Register now on the back office</p>
        </div>
        <div class="row mt-5" style="justify-content: center;">
            <div class="col-md-3 text-right">
                <h4>I am a</h4>
            </div>
            <div class="col-md-9 row">
                <div class="col-md-3" style="display: none;">
                    <button type="button" onclick="displayFieldsOfButton('homeBuyerBtn_RegForm')" name=""
                        id="homeBuyerBtn_RegForm" style="border-right:1px solid;" class="btn btn-light w-100">
                        Homebuyer
                    </button>
                </div>
                <div class="col-md-5">
                    <button type="button" onclick="displayFieldsOfButton('realStateAgentBtn_RegForm')" name=""
                        id="realStateAgentBtn_RegForm" style="border-right:1px solid; border-bottom:2px solid #dbac28;"
                        class="btn btn-light w-100">
                        Real Estate Agent
                    </button>
                </div>
                <div class="col-md-5">
                    <button type="button" onclick="displayFieldsOfButton('mortgageProfessionalBtn_RegForm')" name=""
                        id="mortgageProfessionalBtn_RegForm" style="border-right:1px solid;" class="btn btn-light w-100">
                        Mortgage Professional
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-11 mt-5 ml-auto mr-auto">

            {{-- ____________________________________________ --}}
            {{-- <form id="homeBuyerForm" style="display: none" method="POST" action="{{ route('register') }}">
                @csrf
                <input type="hidden" name="formNumber" value="1">
                <div class="text-left form-group">
                    <label for="firstName">{{ __('First Name') }}</label>
                    <input type="text" class="form-control @error('firstName') is-invalid @enderror"
                        value="{{ old('firstName') }}" required autocomplete="firstName" autofocus name="firstName"
                        id="firstName" placeholder="">
                    @error('firstName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="text-left form-group">
                    <label for="lastName">{{ __('Last Name') }}</label>
                    <input type="text" class="form-control @error('lastName') is-invalid @enderror"
                        value="{{ old('lastName') }}" required autocomplete="lastName" name="lastName" id="lastName"
                        placeholder="">
                    @error('lastName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group text-left">
                    <label for="province">{{ __('Province') }}</label>
                    <select id="province" name="province" class="form-control @error('province') is-invalid @enderror"
                        value="{{ old('province') }}" required>
                        <option>Alberta</option>
                        <option>British Columbia</option>
                        <option>Manitoba</option>
                        <option>New Brunswick</option>
                        <option>Newfoundland and Labrador</option>
                        <option>Northwest Territories</option>
                        <option>Nova Scotia</option>
                        <option>Nunavut</option>
                        <option>Ontario</option>
                        <option>Prince Edward Island</option>
                        <option>Quebec</option>
                        <option>Saskatchewan</option>
                        <option>Yukon</option>
                    </select>
                    @error('province')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>



                <div class="text-left form-group">
                    <label for="email">{{ __('Email') }} </label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}" required name="email" id="email" placeholder="">
                    @error('province')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="text-left" style="margin-top: -10px">
                    <small class="text-left">We do not share email address’ with any third-party
                        vendors. To learn more, please read our <a href="/privacy_policy" target="_blank"
                            class="link signup-link">Privacy
                            Policy.</a>
                    </small>
                </div>
                <div class="text-left form-group mt-4">
                    <label for="password">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" required
                        name="password" id="password" placeholder="">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="text-left row validation-list-row">
                    <div class="col">
                        <ul class="validation-list">
                            <li class="">8 characters minimum</li>
                            <li class="">One lowercase character</li>
                            <li class="">One uppercase character</li>
                        </ul>
                    </div>
                    <div class="col">
                        <ul class="validation-list">
                            <li class="">One number</li>
                            <li class="">One special character</li>
                        </ul>
                    </div>
                </div>

                <div class="text-left form-group mt-2">
                    <label for="confirmPassword">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required autocomplete="new-password" placeholder="Enter Confirm Password" />
                </div>

                <div class="form-group mt-5">
                    <button style="border: 1px solid #d5d1d1" type="submit" class="btn btn-dark btn-block">
                        {{ __('Sign Up Now') }}
                    </button>
                </div>
                <div class="text-left" style="margin-top: -10px">
                    <small>
                        By clicking the "Sign up" button, you are creating a
                        Your Broker Journey account, and you agree to Your Broker Journey
                        <a href="/terms_conditions" target="_blank" class="link signup-link">Terms of Use
                        </a> and
                        <a href="/privacy_policy" target="_blank" class="link signup-link">Privacy
                            Policy
                        </a>.
                    </small>
                </div>
            </form> --}}

            <form id="realStateAgentForm">
                @csrf
                <div id="errorBox" class="h5 text-capitalize text-center py-3"
                    style="display: none; color: red;border: 1px solid black;text-align: center;border-radius: 5px;">
                </div>
                <input type="hidden" name="formNumber" value="2">
                <input type="hidden" name="registerPage_url" value="{{ $_SERVER['REQUEST_URI'] }}" />
                <div class="text-left form-group">
                    <label for="firstName">{{ __('First Name') }}</label>
                    <input type="text" class="form-control @error('firstName') is-invalid @enderror"
                        value="{{ old('firstName') }}" autocomplete="firstName" autofocus name="firstName" id="firstName"
                        placeholder="">
                    @error('firstName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="text-left form-group">
                    <label for="lastName">{{ __('Last Name') }}</label>
                    <input type="text" class="form-control @error('lastName') is-invalid @enderror"
                        value="{{ old('lastName') }}" autocomplete="lastName" name="lastName" id="lastName"
                        placeholder="">
                    @error('lastName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group text-left">
                    <label for="province">{{ __('Province') }}</label>
                    <select id="province" name="province" class="form-control @error('province') is-invalid @enderror"
                        value="{{ old('province') }}">
                        <option>Alberta</option>
                        <option>British Columbia</option>
                        <option>Manitoba</option>
                        <option>New Brunswick</option>
                        <option>Newfoundland and Labrador</option>
                        <option>Northwest Territories</option>
                        <option>Nova Scotia</option>
                        <option>Nunavut</option>
                        <option>Ontario</option>
                        <option>Prince Edward Island</option>
                        <option>Quebec</option>
                        <option>Saskatchewan</option>
                        <option>Yukon</option>
                    </select>
                    @error('province')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- __________________________ --}}

                <div class="text-left form-group">
                    <label>{{ __('Select From Below Options') }}</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" onchange="checkCompanyNameRadioBtn_RS()"
                            name="selectRadioForCompayName_RS" id="compayNameFromAdmin_RS" checked>
                        <label class="form-check-label" for="compayNameFromAdmin_RS">
                            Admin Company
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" onchange="checkCompanyNameRadioBtn_RS()"
                            name="selectRadioForCompayName_RS" id="compayNameCustom_RS">
                        <label class="form-check-label" for="compayNameCustom_RS">
                            Custom Company
                        </label>
                    </div>
                </div>

                <div class="text-left form-group">
                    <div id="adminCompany_RS">
                        <input type="text" readonly
                            class="form-control @error('company_name_admin__RS') is-invalid @enderror"
                            value="{{ $adminData[0]->company_name }}" autocomplete="company_name_admin__RS"
                            name="company_name_admin__RS" id="company_name_admin__RS" placeholder="">
                        @error('company_name_admin__RS')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div id="customCompany_RS" style="display: none;">
                        <input type="text" class="form-control @error('company_name_custom_RS') is-invalid @enderror"
                            value="" autocomplete="company_name_custom_RS" name="company_name_custom_RS"
                            id="company_name_custom_RS" placeholder="">
                        @error('company_name_custom_RS')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="text-left form-group">
                    <label for="broker_house">{{ __('Broker House') }}</label>
                    <input type="text" class="form-control @error('broker_house') is-invalid @enderror"
                        autocomplete="broker_house" name="broker_house" id="broker_house" placeholder="">
                    @error('broker_house')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>




                <div class="text-left form-group">
                    <label for="email">{{ __('Email') }} </label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}" name="email" id="email" placeholder="">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="text-left" style="margin-top: -10px">
                    <small class="text-left">We do not share email address’ with any third-party
                        vendors. To learn more, please read our <a href="/privacy_policy" target="_blank"
                            class="link signup-link">Privacy
                            Policy.</a>
                    </small>
                </div>
                <div class="text-left form-group mt-4">
                    <label for="password">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                        id="password" placeholder="">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="text-left row validation-list-row">
                    <div class="col">
                        <ul class="validation-list">
                            <li class="">8 characters minimum</li>
                            <li class="">One lowercase character</li>
                            <li class="">One uppercase character</li>
                        </ul>
                    </div>
                    <div class="col">
                        <ul class="validation-list">
                            <li class="">One number</li>
                            <li class="">One special character</li>
                        </ul>
                    </div>
                </div>

                <div class="text-left form-group mt-2">
                    <label for="confirmPassword">{{ __('Confirm Password') }}</label>
                    <input id="confirmPassword" type="password" class="form-control" name="confirmPassword"
                        autocomplete="confirmPassword" placeholder="Enter Confirm Password" />
                    @error('confirmPassword')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-5">
                    <button style="border: 1px solid #d5d1d1" type="button" onclick="registerAgent_RS()"
                        class="btn btn-dark btn-block">
                        {{ __('Sign Up Now') }}
                    </button>
                </div>
                <div class="text-left" style="margin-top: -10px">
                    <small>
                        By clicking the "Sign up" button, you are creating a
                        Your Broker Journey account, and you agree to Your Broker Journey
                        <a href="/terms_conditions" target="_blank" class="link signup-link">Terms of Use
                        </a> and
                        <a href="/privacy_policy" target="_blank" class="link signup-link">Privacy
                            Policy
                        </a>.
                    </small>
                </div>

            </form>

            {{-- <form id="mortgageProfessionalForm" method="POST" action="{{ route('register') }}"
                style="display: none">
                @csrf
                <input type="hidden" name="formNumber" value="3">
                <input type="hidden" name="registerPage_url" value="{{ $_SERVER['REQUEST_URI'] }}" />
                <div class="text-left form-group">
                    <label for="firstName">{{ __('First Name') }}</label>
                    <input type="text" class="form-control @error('firstName') is-invalid @enderror"
                        value="{{ old('firstName') }}" required autocomplete="firstName" autofocus name="firstName"
                        id="firstName" placeholder="">
                    @error('firstName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="text-left form-group">
                    <label for="lastName">{{ __('Last Name') }}</label>
                    <input type="text" class="form-control @error('lastName') is-invalid @enderror"
                        value="{{ old('lastName') }}" required autocomplete="lastName" name="lastName" id="lastName"
                        placeholder="">
                    @error('lastName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group text-left">
                    <label for="province">{{ __('Province') }}</label>
                    <select id="province" name="province" class="form-control @error('province') is-invalid @enderror"
                        value="{{ old('province') }}" required>
                        <option>Alberta</option>
                        <option>British Columbia</option>
                        <option>Manitoba</option>
                        <option>New Brunswick</option>
                        <option>Newfoundland and Labrador</option>
                        <option>Northwest Territories</option>
                        <option>Nova Scotia</option>
                        <option>Nunavut</option>
                        <option>Ontario</option>
                        <option>Prince Edward Island</option>
                        <option>Quebec</option>
                        <option>Saskatchewan</option>
                        <option>Yukon</option>
                    </select>
                    @error('province')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="text-left form-group">
                    <label>{{ __('Select From Below Options') }}</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" onchange="checkCompanyNameRadioBtn_MP()"
                            name="selectRadioForCompayName_MP" id="compayNameFromAdmin_MP" checked>
                        <label class="form-check-label" for="compayNameFromAdmin_MP">
                            Admin Company
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" onchange="checkCompanyNameRadioBtn_MP()"
                            name="selectRadioForCompayName_MP" id="compayNameCustom_MP">
                        <label class="form-check-label" for="compayNameCustom_MP">
                            Custom Company
                        </label>
                    </div>
                </div>

                <div class="text-left form-group">
                    <div id="adminCompany_MP">
                        <input type="text" readonly
                            class="form-control @error('company_name_admin__MP') is-invalid @enderror"
                            value="{{ $adminData[0]->company_name }}" required autocomplete="company_name_admin__MP"
                            name="company_name_admin__MP" id="company_name_admin__MP" placeholder="">
                        @error('company_name_admin__MP')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div id="customCompany_MP" style="display: none;">
                        <input type="text" class="form-control @error('company_name_custom_MP') is-invalid @enderror"
                            value="" required autocomplete="company_name_custom_MP" name="company_name_custom_MP"
                            id="company_name_custom_MP" placeholder="">
                        @error('company_name_custom_MP')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="text-left form-group">
                    <label for="broker_house">{{ __('Broker House') }}</label>
                    <input type="text" class="form-control @error('broker_house') is-invalid @enderror" required
                        autocomplete="broker_house" name="broker_house" id="broker_house" placeholder="">
                    @error('broker_house')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="text-left form-group">
                    <label for="email">{{ __('Email') }} </label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}" required name="email" id="email" placeholder="">
                    @error('province')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="text-left" style="margin-top: -10px">
                    <small class="text-left">We do not share email address’ with any third-party
                        vendors. To learn more, please read our <a href="/privacy_policy" target="_blank"
                            class="link signup-link">Privacy
                            Policy.</a>
                    </small>
                </div>
                <div class="text-left form-group mt-4">
                    <label for="password">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" required
                        name="password" id="password" placeholder="">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="text-left row validation-list-row">
                    <div class="col">
                        <ul class="validation-list">
                            <li class="">8 characters minimum</li>
                            <li class="">One lowercase character</li>
                            <li class="">One uppercase character</li>
                        </ul>
                    </div>
                    <div class="col">
                        <ul class="validation-list">
                            <li class="">One number</li>
                            <li class="">One special character</li>
                        </ul>
                    </div>
                </div>

                <div class="text-left form-group mt-2">
                    <label for="confirmPassword">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required autocomplete="new-password" placeholder="Enter Confirm Password" />
                </div>

                <div class="form-group mt-5">
                    <button style="border: 1px solid #d5d1d1" type="submit" class="btn btn-dark btn-block">
                        {{ __('Sign Up Now') }}
                    </button>
                </div>
                <div class="text-left" style="margin-top: -10px">
                    <small>
                        By clicking the "Sign up" button, you are creating a
                        Your Broker Journey account, and you agree to Your Broker Journey
                        <a href="/terms_conditions" target="_blank" class="link signup-link">Terms of Use
                        </a> and
                        <a href="/privacy_policy" target="_blank" class="link signup-link">Privacy
                            Policy
                        </a>.
                    </small>
                </div>
            </form> --}}

        </div>
    </div>
@endsection


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/js/bootstrap.min.js"
        integrity="sha512-UR25UO94eTnCVwjbXozyeVd6ZqpaAE9naiEUBK/A+QDbfSTQFhPGj5lOR6d8tsgbBk84Ggb5A3EkjsOgPRPcKA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function displayFieldsOfButton(idOfBtn) {
            if (idOfBtn == 'homeBuyerBtn_RegForm') {
                $('#homeBuyerForm').show()
                $('#realStateAgentForm').hide()
                $('#mortgageProfessionalForm').hide()
                document.getElementById('homeBuyerBtn_RegForm').style.borderBottom =
                    '2px solid #dbac28';
                document.getElementById('realStateAgentBtn_RegForm').style.borderBottom =
                    '0px solid black';
                document.getElementById('mortgageProfessionalBtn_RegForm').style.borderBottom =
                    '0px solid black';

            } else if (idOfBtn == 'realStateAgentBtn_RegForm') {
                $('#realStateAgentForm').show()
                $('#homeBuyerForm').hide()
                $('#mortgageProfessionalForm').hide()
                document.getElementById('homeBuyerBtn_RegForm').style.borderBottom =
                    '0px solid black';
                document.getElementById('realStateAgentBtn_RegForm').style.borderBottom =
                    '2px solid #dbac28';
                document.getElementById('mortgageProfessionalBtn_RegForm').style.borderBottom =
                    '0px solid black';
            } else {
                $('#mortgageProfessionalForm').show()
                $('#homeBuyerForm').hide()
                $('#realStateAgentForm').hide()
                document.getElementById('homeBuyerBtn_RegForm').style.borderBottom =
                    '0px solid black';
                document.getElementById('realStateAgentBtn_RegForm').style.borderBottom =
                    '0px solid black';
                document.getElementById('mortgageProfessionalBtn_RegForm').style.borderBottom =
                    '2px solid #dbac28';
            }
        }
    </script>
    <script>
        function checkCompanyNameRadioBtn_RS() {
            if (document.getElementsByName('selectRadioForCompayName_RS')[0].checked) {
                document.getElementById('adminCompany_RS').style.display = '';
                document.getElementById('customCompany_RS').style.display = 'none';
                document.getElementById('company_name_custom_RS').value = '';
            } else {
                document.getElementById('adminCompany_RS').style.display = 'none';
                document.getElementById('customCompany_RS').style.display = '';
            }
        }

        function checkCompanyNameRadioBtn_MP() {
            if (document.getElementsByName('selectRadioForCompayName_MP')[0].checked) {
                document.getElementById('adminCompany_MP').style.display = '';
                document.getElementById('customCompany_MP').style.display = 'none';
                document.getElementById('company_name_custom_MP').value = '';
            } else {
                document.getElementById('adminCompany_MP').style.display = 'none';
                document.getElementById('customCompany_MP').style.display = '';
            }
        }
    </script>
    <script>
        function registerAgent_RS() {
            var nameOfInputs = ['firstName', 'lastName', 'province', 'company_name_custom_RS', 'broker_house', 'email',
                'password',
            ]
            for (let index = 0; index < nameOfInputs.length; index++) {
                document.getElementById(nameOfInputs[index]).classList.remove('is-invalid')
            }
            if (document.getElementsByName('selectRadioForCompayName_RS')[0].checked) {
                companyName = document.getElementById('company_name_admin__RS').value
            } else {
                companyName = document.getElementById('company_name_custom_RS').value
            }
            axios.post("{{ route('registerAgent') }}", {
                    firstName: document.getElementById('firstName').value,
                    lastName: document.getElementById('lastName').value,
                    province: document.getElementById('province').value,
                    companyName: companyName,
                    broker_house: document.getElementById('broker_house').value,
                    email: document.getElementById('email').value,
                    password: document.getElementById('password').value,
                    confirmPassword: document.getElementById('confirmPassword').value,
                })
                .then(function(response) {
                    console.log(response.data);
                })
                .catch(function(error) {
                    if (error.response.data.message == 'The given data was invalid.') {
                        document.getElementById('errorBox').style.display = '';
                        document.getElementById('errorBox').innerHTML =
                            Object.values(error.response.data['errors'])[0];
                        let idOfError = Object.keys(error.response.data['errors'])[0];
                        document.getElementById(idOfError).classList.add('is-invalid')
                    }
                    console.log(error.response);
                });
        }
    </script>
@endsection


{{-- $.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
}); --}}
