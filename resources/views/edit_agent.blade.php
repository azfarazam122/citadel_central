@extends('layouts.app')
{{-- ___________________________ --}}
{{-- SIDEBAR --}}
@section('sidebar')
    @include('layouts.sidebar')
@endsection
{{-- ___________________________ --}}
@section('libraries')
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.css">
@endsection
@section('content')
    <div class="height-100 bg-light">
        <div class="">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card secondaryTextColor">
                        <h1 class="fw-bold card-header text-center">Agent {{ $agentData[0]->full_name }}
                        </h1>
                        <div class="card-body">
                            <div class="container">
                                <form method="post" action="{{ route('updateAgentData') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="hiddenId" value="123" />
                                    {{-- <h3>{{ $agentData[0]->license_no }}</h3> --}}
                                    <h3 class="mb-3">Edit <span class="text-capitalize text-decoration-underline">

                                        </span>
                                    </h3>
                                    <div class="form-group">
                                        <label for="">Id</label>
                                        <input type="text" readonly class="form-control" name="id_OfAgent" id="id_OfAgent"
                                            value="{{ $agentData[0]->id }}" aria-describedby="helpId">
                                    </div>
                                    <div class="form-group">
                                        <label for="">User Id</label>
                                        <input type="text" readonly class="form-control" name="userId_OfAgent"
                                            id="userId_OfAgent" value="{{ $agentData[0]->user_id }}"
                                            aria-describedby="helpId">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Admin Id</label>
                                        <input type="text" readonly class="form-control" name="adminId_OfAgent"
                                            id="adminId_OfAgent" value="{{ $agentData[0]->admin_id }}"
                                            aria-describedby="helpId">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control" name="editNameOfAgent"
                                            id="editNameOfAgent" value="{{ $agentData[0]->full_name }}"
                                            aria-describedby="helpId">
                                    </div>
                                    <div class="form-group">
                                        <input hidden type="text" class="form-control" name="emailOfAgent"
                                            id="emailOfAgent" value="{{ $agentData[0]->email }}"
                                            aria-describedby="helpId">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">License No</label>
                                        <input type="text" class="form-control" name="editLicenseNoOfAgent"
                                            id="editLicenseNoOfAgent" value="{{ $agentData[0]->license_no }}"
                                            aria-describedby="helpId">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Phone</label>
                                        <input type="text" class="form-control" name="editPhoneOfAgent"
                                            id="editPhoneOfAgent" value="{{ $agentData[0]->phone }}"
                                            aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Facebook Link</label>
                                        <input type="text" class="form-control" name="editFacebookLinkOfAgent"
                                            id="editFacebookLinkOfAgent" value="{{ $agentData[0]->facebook_link }}"
                                            aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Linked Link</label>
                                        <input type="text" class="form-control" name="editLinkedinLinkOfAgent"
                                            id="editLinkedinLinkOfAgent" value="{{ $agentData[0]->linkedin_link }}"
                                            aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Instagram Link</label>
                                        <input type="text" class="form-control" name="editInstagramLinkOfAgent"
                                            id="editInstagramLinkOfAgent" value="{{ $agentData[0]->instagram_link }}"
                                            aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Twitter Link</label>
                                        <input type="text" class="form-control" name="editTwitterLinkOfAgent"
                                            id="editTwitterLinkOfAgent" value="{{ $agentData[0]->twitter_link }}"
                                            aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Profile Pic</label>
                                        {{-- ___________________________ --}}
                                        <p><input type="file" accept="image/*" name="image" id="file"
                                                onchange="loadFile(event)" style="display: none;"></p>
                                        <p><label class="btn btn-primary" for="file" style="cursor: pointer;">Upload Image
                                            </label>
                                            <input style="border: 0px solid;" readonly type="text" name="pathOfImage"
                                                value="{{ $agentData[0]->profile_pic }}" id="pathOfImage">
                                        </p>
                                        <p><img id="showSelectedImage" name="showSelectedImage"
                                                src="../../../images/profile_pic/{{ $agentData[0]->email }}/{{ $agentData[0]->profile_pic }}"
                                                width="200" />
                                        </p>

                                        {{-- ___________________________ --}}

                                    </div>

                                    <div class="form-group mt-3">
                                        <label for="">Apply Now Link</label>
                                        <input type="text" class="form-control" name="editApplyNowLinkOfAgent"
                                            id="editApplyNowLinkOfAgent" value="{{ $agentData[0]->apply_now_link }}"
                                            aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">How to Collect Your Miles Today Link</label>
                                        <input type="text" class="form-control"
                                            name="editHowToCollectYourMilesTodayLinkOfAgent"
                                            id="editHowToCollectYourMilesTodayLinkOfAgent"
                                            value="{{ $agentData[0]->how_to_collect_your_miles_today_link }}"
                                            aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Your Financial Journey Link</label>
                                        <input type="text" class="form-control" name="editYourFinancialJourneyLinkOfAgent"
                                            id="editYourFinancialJourneyLinkOfAgent"
                                            value="{{ $agentData[0]->your_financial_journey_link }}"
                                            aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Mortgage Prequalification Link</label>
                                        <input type="text" class="form-control"
                                            name="editMortgagePrequalificationLinkOfAgent"
                                            id="editMortgagePrequalificationLinkOfAgent"
                                            value="{{ $agentData[0]->mortgage_prequalification_link }}"
                                            aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Your Home Journey Link</label>
                                        <input type="text" class="form-control" name="editYourHomeJourneyLinkOfAgent"
                                            id="editYourHomeJourneyLinkOfAgent"
                                            value="{{ $agentData[0]->your_home_journey_link }}" aria-describedby="helpId"
                                            placeholder="">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Your Mortgage Calculators Link</label>
                                        <input type="text" class="form-control"
                                            name="editYourMortgageCalculatorsLinkOfAgent"
                                            id="editYourMortgageCalculatorsLinkOfAgent"
                                            value="{{ $agentData[0]->your_mortgage_calculators_link }}"
                                            aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Calculate How You Can Be MortgageFreeSooner Link</label>
                                        <input type="text" class="form-control"
                                            name="editCalculateHowYouCanBeMortgageFreeSoonerLinkOfAgent"
                                            id="editCalculateHowYouCanBeMortgageFreeSoonerLinkOfAgent"
                                            value="{{ $agentData[0]->calculate_how_you_can_be_mortgagefreesooner_link }}"
                                            aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Get Prequalified Now Link</label>
                                        <input type="text" class="form-control" name="editGetPrequalifiedNowLinkOfAgent"
                                            id="editGetPrequalifiedNowLinkOfAgent"
                                            value="{{ $agentData[0]->get_prequalified_now_link }}"
                                            aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">About Page Bio Link</label>
                                        <input type="text" class="form-control" name="editAboutPageBioLinkOfAgent"
                                            id="editAboutPageBioLinkOfAgent"
                                            value="{{ $agentData[0]->bio_apply_now_link }}" aria-describedby="helpId"
                                            placeholder="">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">About Page Last Apply Now Link</label>
                                        <input type="text" class="form-control"
                                            name="editAboutPageLastApplyNowLinkOfAgent"
                                            id="editAboutPageLastApplyNowLinkOfAgent"
                                            value="{{ $agentData[0]->about_us_apply_now_link }}"
                                            aria-describedby="helpId" placeholder="">
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" class="btn btn-dark mt-3" value="Update" name="updateAgent"
                                            id="updateAgent" aria-describedby="helpId" placeholder="">
                                        <a class="mt-3 btn btn-primary" href="/admin_dashboard/agents">Back</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <!-- Scripts -->
    <script src="{{ asset('js/masterSettings.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.js"></script>
    <script>
        var path;
        var image;
        $(document).ready(function() {

        });

        var loadFile = function(event) {
            debugger;
            image = document.getElementById('showSelectedImage');
            document.getElementById('pathOfImage').value = event.target.files[0].name;
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
    <!-- Scripts -->
@endsection
