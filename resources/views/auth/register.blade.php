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

        main {
            background-image: url("{{ asset('images/background.jpg') }}") !important;
            background-repeat: no-repeat;
            background-size: cover;
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

$allAdminsData = App\Models\Admin::all();
@endphp
@section('content')
    {{-- ____________________________ --}}
    <div class="pb-4">
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
                    <div class="col-md-5">
                        <button type="button" onclick="displayFieldsOfButton('realStateAgentBtn_RegForm')" name=""
                            id="realStateAgentBtn_RegForm" style="border-right:1px solid; border-bottom:2px solid #dbac28;"
                            class="btn btn-light w-100">
                            Real Estate Agent
                        </button>
                    </div>
                    <div class="col-md-5">
                        <button type="button" onclick="displayFieldsOfButton('mortgageProfessionalBtn_RegForm')"
                            name="" id="mortgageProfessionalBtn_RegForm" style="border-right:1px solid;"
                            class="btn btn-light w-100">
                            Mortgage Professional
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-11 mt-5 ml-auto mr-auto">

                <form id="realStateAgentForm">
                    @csrf
                    <div id="errorBox" class="h5 text-capitalize text-center py-3"
                        style="
                        display: none;
                        color: white;
                        text-align: center;
                        background: #fb5151;
                        border-radius: 5px;">
                    </div>

                    <input type="hidden" name="registerPage_url" value="{{ $_SERVER['REQUEST_URI'] }}" />
                    <div class="text-left form-group">
                        <label for="firstName">{{ __('First Name') }}</label>
                        <input type="text" class="form-control @error('firstName') is-invalid @enderror"
                            value="{{ old('firstName') }}" autocomplete="firstName" autofocus name="firstName"
                            id="firstName" placeholder="">

                    </div>
                    <div class="text-left form-group">
                        <label for="lastName">{{ __('Last Name') }}</label>
                        <input type="text" class="form-control @error('lastName') is-invalid @enderror"
                            value="{{ old('lastName') }}" autocomplete="lastName" name="lastName" id="lastName"
                            placeholder="">
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
                    </div>

                    {{-- __________________________ --}}

                    <div class="text-left form-group">
                        <label>{{ __('Select From Below Options') }}</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" onchange="checkCompanyNameRadioBtn()"
                                name="selectRadioForCompayName" id="compayNameFromAdmin" checked>
                            <label class="form-check-label" for="compayNameFromAdmin">
                                Admin Company
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" onchange="checkCompanyNameRadioBtn()"
                                name="selectRadioForCompayName" id="compayNameCustom">
                            <label class="form-check-label" for="compayNameCustom">
                                Custom Company
                            </label>
                        </div>
                    </div>

                    <div class="text-left form-group">
                        <div id="adminCompany">
                            <select id="companyNameAdmin" name="companyNameAdmin" class="form-control"
                                value="{{ old('companyNameAdmin') }}">
                                @for ($i = 0; $i < count($allAdminsData); $i++)
                                    @if ($allAdminsData[$i]['company_name'] == $adminData[0]->company_name)
                                        <option selected>{{ $allAdminsData[$i]['company_name'] }}</option>
                                    @else
                                        <option>{{ $allAdminsData[$i]['company_name'] }}</option>
                                    @endif
                                @endfor
                            </select>
                            {{-- <input type="text" readonly class="form-control" value="{{ $adminData[0]->company_name }}"
                                autocomplete="companyNameAdmin" name="companyNameAdmin" id="companyNameAdmin"
                                placeholder=""> --}}
                        </div>
                        <div id="customCompany" style="display: none;">
                            <input type="text" class="form-control @error('companyNameCustom') is-invalid @enderror"
                                value="" autocomplete="companyNameCustom" name="companyNameCustom"
                                id="companyNameCustom" placeholder="">
                        </div>
                    </div>

                    <div class="text-left form-group">
                        <label for="brokerHouse">{{ __('Broker House') }}</label>
                        <input type="text" class="form-control @error('brokerHouse') is-invalid @enderror"
                            autocomplete="brokerHouse" name="brokerHouse" id="brokerHouse" placeholder="">
                    </div>




                    <div class="text-left form-group">
                        <label for="email">{{ __('Email') }} </label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" name="email" id="email" placeholder="">
                    </div>
                    <div class="text-left" style="margin-top: -10px">
                        <small class="text-left">We do not share email address’ with any third-party
                            vendors. To learn more, please read our <a href="/privacy_policy" target="_blank"
                                class="link signup-link">Privacy
                                Policy.</a>
                        </small>
                    </div>
                    <div class="text-left form-group mt-4 mb-0">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="">
                        <div class="text-end">
                            <input type="checkbox" id="showPassword" onclick="displayPasswordEye()">
                            <span class="ml-1"> <label for="showPassword"> Show Password </label></span>
                        </div>
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

            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/js/bootstrap.min.js"
        integrity="sha512-UR25UO94eTnCVwjbXozyeVd6ZqpaAE9naiEUBK/A+QDbfSTQFhPGj5lOR6d8tsgbBk84Ggb5A3EkjsOgPRPcKA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var formNumber = '2';

        function displayFieldsOfButton(idOfBtn) {
            if (idOfBtn == 'realStateAgentBtn_RegForm') {
                formNumber = '2'
                $('#realStateAgentForm').show()
                document.getElementById('realStateAgentBtn_RegForm').style.borderBottom =
                    '2px solid #dbac28';
                document.getElementById('mortgageProfessionalBtn_RegForm').style.borderBottom =
                    '0px solid black';
            } else {
                formNumber = '3'
                $('#realStateAgentForm').show()
                document.getElementById('realStateAgentBtn_RegForm').style.borderBottom =
                    '0px solid black';
                document.getElementById('mortgageProfessionalBtn_RegForm').style.borderBottom =
                    '2px solid #dbac28';
            }
        }

        function displayPasswordEye() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
    <script>
        function checkCompanyNameRadioBtn() {

            if (document.getElementsByName('selectRadioForCompayName')[0].checked) {
                document.getElementById('adminCompany').style.display = '';
                document.getElementById('customCompany').style.display = 'none';
                document.getElementById('companyNameCustom').value = '';
            } else {
                document.getElementById('adminCompany').style.display = 'none';
                document.getElementById('customCompany').style.display = '';
            }

        }
    </script>
    <script>
        function registerAgent_RS() {
            var nameOfInputs = ['firstName', 'lastName', 'brokerHouse', 'email', 'password', 'confirmPassword', ]
            for (let index = 0; index < nameOfInputs.length; index++) {
                document.getElementById(nameOfInputs[index]).classList.remove('is-invalid')
            }
            var companyName = '';

            if (document.getElementsByName('selectRadioForCompayName')[0].checked) {
                companyName = document.getElementById('companyNameAdmin').value
            } else {
                companyName = document.getElementById('companyNameCustom').value
            }
            axios.post("{{ route('registerAgent') }}", {
                    formNumber: formNumber,
                    registerPageUrl: document.getElementsByName('registerPage_url')[0].value,
                    firstName: document.getElementById('firstName').value,
                    lastName: document.getElementById('lastName').value,
                    province: document.getElementById('province').value,
                    companyName: companyName,
                    brokerHouse: document.getElementById('brokerHouse').value,
                    email: document.getElementById('email').value,
                    password: document.getElementById('password').value,
                    confirmPassword: document.getElementById('confirmPassword').value,
                })
                .then(function(response) {
                    for (let index = 0; index < nameOfInputs.length; index++) {
                        document.getElementById(nameOfInputs[index]).classList.remove('is-invalid')
                    }
                    document.getElementById('errorBox').style.display = 'none';
                    window.location.href = response.data;
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
