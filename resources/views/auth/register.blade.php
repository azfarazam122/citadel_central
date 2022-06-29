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
                <div class="col-md-3">
                    <button type="button" onclick="displayFieldsOfButton('homeBuyerBtn_RegForm')" name=""
                        id="homeBuyerBtn_RegForm" style="border-right:1px solid; border-bottom:2px solid #dbac28;"
                        class="btn btn-light w-100">
                        Homebuyer
                    </button>
                </div>
                <div class="col-md-3">
                    <button type="button" onclick="displayFieldsOfButton('realStateAgentBtn_RegForm')" name=""
                        id="realStateAgentBtn_RegForm" style="border-right:1px solid;" class="btn btn-light w-100">
                        Real Estate Agent
                    </button>
                </div>
                <div class="col-md-3">
                    <button type="button" onclick="displayFieldsOfButton('mortgageProfessionalBtn_RegForm')" name=""
                        id="mortgageProfessionalBtn_RegForm" style="border-right:1px solid;" class="btn btn-light w-100">
                        Mortgage Professional
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-11 mt-5 ml-auto mr-auto">

            {{-- ____________________________________________ --}}
            {{-- <form method="POST" action="{{ route('register') }}">
                @csrf
                <img src="/images/projectimg/logo horizontal.png" class="responsive img-rounded" style="width: 300px" />
                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-left label">{{ __('Name') }}</label>

                    <input id="name" type="text" style="background: #eff0f6"
                        class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"
                        required autocomplete="name" autofocus placeholder="Enter Your Name" />

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-md-6 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>

                    <input id="email" type="email" style="background: #eff0f6"
                        class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                        required autocomplete="email" placeholder="Enter Your Email" />

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-left">{{ __('Password') }}</label>

                    <input id="password" type="password" style="background: #eff0f6"
                        class="form-control @error('password') is-invalid @enderror" name="password" required
                        autocomplete="new-password" placeholder="Enter Password" />

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="password-confirm"
                        class="col-md-6 col-form-label text-md-left">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" style="background: #eff0f6" class="form-control"
                        name="password_confirmation" required autocomplete="new-password"
                        placeholder="Enter Confirm Password" />
                </div>

                <div class="row mb-0">
                    <div class="col-md-12 offset-md-12">
                        <button type="submit" class="btn btn-success" style="width: 100%; background-color: #16bfa6">
                            {{ __('Sign Up Now') }}
                        </button>
                    </div>
                </div>
            </form> --}}
            {{-- ____________________________________________ --}}
            <form id="homeBuyerForm" method="POST" action="{{ route('register') }}">
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
                        <option selected>Choose...</option>
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
            </form>

            <form style="display: none" id="realStateAgentForm" method="POST" action="{{ route('register') }}">
                @csrf
                <input type="hidden" name="formNumber" value="2">
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
                        <option selected>Choose...</option>
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
                    <label for="name_of_brokerage">{{ __('Name Of Brokerage') }}</label>
                    <input type="text" class="form-control @error('name_of_brokerage') is-invalid @enderror"
                        value="{{ old('name_of_brokerage') }}" required autocomplete="name_of_brokerage"
                        name="name_of_brokerage" id="name_of_brokerage" placeholder="">
                    @error('name_of_brokerage')
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
            </form>

            <form style="display: none" id="mortgageProfessionalForm" method="POST"
                action="{{ route('register') }}">
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
                        <option selected>Choose...</option>
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

                <div class="row col-md-12">
                    <div class="text-left col-md-6  form-group">
                        <label for="company_name">{{ __('Company Name') }}</label>
                        <input type="text" class="form-control @error('company_name') is-invalid @enderror"
                            value="Citadel Mortgage" required autocomplete="company_name" name="company_name"
                            id="company_name" placeholder="">
                        @error('company_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="text-left col-md-6 form-group">
                        <label for="broker_house">{{ __('Broker House') }}</label>
                        <input type="text" class="form-control @error('broker_house') is-invalid @enderror"
                            value="Verico" required autocomplete="broker_house" name="broker_house" id="broker_house"
                            placeholder="">
                        @error('broker_house')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
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
            </form>

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
@endsection


{{-- $.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
}); --}}
