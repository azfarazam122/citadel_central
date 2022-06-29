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
    <div class="height-100 ">
        <div class="">
            <div class="row overflow-auto justify-content-center">
                <div class="col-md-8">
                    <div class="secondaryTextColor">
                        <h1 class="fw-bold text-center">Agent
                        </h1>
                        <hr>
                        <div class="card-body">
                            <div class="container">
                                <form method="post" action="{{ route('updateAgentData') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="hiddenId" value="123" />
                                    <h3 class="mb-3">Edit <span class="text-capitalize text-decoration-underline">

                                        </span>
                                    </h3>
                                    <div class="form-group">
                                        <label for="">Admin Id</label>
                                        <input type="text" class="form-control" name="adminId_OfAgent"
                                            id="adminId_OfAgent" aria-describedby="helpId">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control" name="editNameOfAgent"
                                            id="editNameOfAgent" aria-describedby="helpId">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="">Agent Type</label>
                                        <select class="form-control mt-1" name="editTypeOfAgent" id="editTypeOfAgent">
                                            <option value="real_state_agent">Real Estate Agent</option>
                                            <option value="mortgage_professional">Mortgage Professional</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Add your License here</label>
                                        <input type="text" class="form-control" name="editLicenseNoOfAgent"
                                            id="editLicenseNoOfAgent" aria-describedby="helpId">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Phone</label>
                                        <input type="text" class="form-control" name="editPhoneOfAgent"
                                            id="editPhoneOfAgent" aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Facebook Link</label>
                                        <input type="text" class="form-control" name="editFacebookLinkOfAgent"
                                            id="editFacebookLinkOfAgent" aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">LinkedIn Link</label>
                                        <input type="text" class="form-control" name="editLinkedinLinkOfAgent"
                                            id="editLinkedinLinkOfAgent" aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Instagram Link</label>
                                        <input type="text" class="form-control" name="editInstagramLinkOfAgent"
                                            id="editInstagramLinkOfAgent" aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Twitter Link</label>
                                        <input type="text" class="form-control" name="editTwitterLinkOfAgent"
                                            id="editTwitterLinkOfAgent" aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Profile Pic</label>
                                        {{-- ___________________________ --}}
                                        <p><input type="file" accept="image/*" name="image" id="file"
                                                onchange="loadFile(event)" style="display: none;"></p>
                                        <p><label class="btn btn-primary" for="file" style="cursor: pointer;">Upload
                                                Image
                                            </label>
                                            <input style="border: 0px solid;" readonly type="text" name="pathOfImage"
                                                id="pathOfImage">
                                        </p>
                                        <p><img id="showSelectedImage" name="showSelectedImage" src=""
                                                width="200" />
                                        </p>

                                        {{-- ___________________________ --}}

                                    </div>

                                    <div class="form-group mt-3">
                                        <label for="">Apply Now Link</label>
                                        <input type="text" class="form-control" name="editApplyNowLinkOfAgent"
                                            id="editApplyNowLinkOfAgent" aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">How to Collect Your Miles Today Link</label>
                                        <input type="text" class="form-control"
                                            name="editHowToCollectYourMilesTodayLinkOfAgent"
                                            id="editHowToCollectYourMilesTodayLinkOfAgent" aria-describedby="helpId"
                                            placeholder="">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Your Financial Journey Link</label>
                                        <input type="text" class="form-control"
                                            name="editYourFinancialJourneyLinkOfAgent"
                                            id="editYourFinancialJourneyLinkOfAgent" aria-describedby="helpId"
                                            placeholder="">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Mortgage Prequalification Link</label>
                                        <input type="text" class="form-control"
                                            name="editMortgagePrequalificationLinkOfAgent"
                                            id="editMortgagePrequalificationLinkOfAgent" aria-describedby="helpId"
                                            placeholder="">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Your Home Journey Link</label>
                                        <input type="text" class="form-control" name="editYourHomeJourneyLinkOfAgent"
                                            id="editYourHomeJourneyLinkOfAgent" aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Your Mortgage Calculators Link</label>
                                        <input type="text" class="form-control"
                                            name="editYourMortgageCalculatorsLinkOfAgent"
                                            id="editYourMortgageCalculatorsLinkOfAgent" aria-describedby="helpId"
                                            placeholder="">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Calculate How You Can Be MortgageFreeSooner Link</label>
                                        <input type="text" class="form-control"
                                            name="editCalculateHowYouCanBeMortgageFreeSoonerLinkOfAgent"
                                            id="editCalculateHowYouCanBeMortgageFreeSoonerLinkOfAgent"
                                            aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Get Prequalified Now Link</label>
                                        <input type="text" class="form-control"
                                            name="editGetPrequalifiedNowLinkOfAgent"
                                            id="editGetPrequalifiedNowLinkOfAgent" aria-describedby="helpId"
                                            placeholder="">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">About Page Bio Link</label>
                                        <input type="text" class="form-control" name="editAboutPageBioLinkOfAgent"
                                            id="editAboutPageBioLinkOfAgent" aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">About Page Last Apply Now Link</label>
                                        <input type="text" class="form-control"
                                            name="editAboutPageLastApplyNowLinkOfAgent"
                                            id="editAboutPageLastApplyNowLinkOfAgent" aria-describedby="helpId"
                                            placeholder="">
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" disabled class="btn btn-dark mt-3" value="Create"
                                            name="updateAgent" id="updateAgent" aria-describedby="helpId"
                                            placeholder="">
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
        $(document).ready(function() {

        });

        var loadFile = function(event) {
            var image = document.getElementById('showSelectedImage');
            document.getElementById('pathOfImage').innerHTML = event.target.files[0].name;
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
    <!-- Scripts -->
@endsection
