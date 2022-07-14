@extends('layouts.app')
{{-- ___________________________ --}}
{{-- SIDEBAR --}}
@section('sidebar')
    @include('layouts.sidebar')
@endsection
{{-- ___________________________ --}}

@section('libraries')
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@5/dark.css" />
@endsection
@section('content')
    <div class="container">
        <div class="overflow-auto row justify-content-center">
            <div class="col-md-12">
                <div class=" secondaryTextColor">
                    <p class="display-3 text-center">{{ __('Pages Editor') }}
                    </p>
                    <hr>
                    <div class="card-body">
                        <div class="container mt-2 mb-5">
                            <p class="text-center display-5">Home Page Info <i class="fa-solid fa-circle-info"></i> </p>
                            <div class="border ">
                                <p class="lead text-center my-3">
                                    These are the Dynamic data . You Can use this data like this [[ name ]] in the Below
                                    Editable Portion
                                </p>
                                <ol class="">
                                    <li>[[LearnHowToCollectYourMilesToday_Btn]]</li>
                                </ol>
                            </div>
                            <div class="mt-4 text-center">

                            </div>
                        </div>

                        <div class="container mt-2 mb-5">
                            <p class="text-center display-5">Home Page</p>
                            @php
                                $agentLoggedIn = Auth::user();
                                $agentData = App\Models\Agent::where('user_id', $agentLoggedIn->id)->get();
                                $agentHomePageData = App\Models\AgentPage::where('agent_id', $agentData[0]->id)
                                    ->where('page_id', 1)
                                    ->first();
                                $agentAboutPageData = App\Models\AgentPage::where('agent_id', $agentData[0]->id)
                                    ->where('page_id', 2)
                                    ->first();
                                $agentRatePageData = App\Models\AgentPage::where('agent_id', $agentData[0]->id)
                                    ->where('page_id', 3)
                                    ->first();
                            @endphp
                            <textarea style="width: 100%;" class="col-md-12 mt-2" id="homePageTemplate">{{ $agentHomePageData->data }}</textarea>
                            <div class="mt-4 text-center">
                                <a class="btn mt-1 homeButtons" style="background: var(--primary-color)"
                                    onclick="saveHomePageData()">Save Home Page Content</a>
                                <a class="btn mt-1 homeButtons" style="background: var(--primary-color)"
                                    onclick="submitForApprovalOfHomePage()">Submit For Approval</a>
                                <a class="btn mt-1 homeButtons btn-primary" onclick="setHomeDefaultPage()">Set as Default
                                    Page</a>
                            </div>
                            <div class="mt-4">
                                <div class="my-1">
                                    @if ($agentHomePageData->is_approved == 1)
                                        <span class="bg-success lead p-2"
                                            style="color: white;border-radius:7px;">Approved</span>
                                    @elseif ($agentHomePageData->is_approved == 0 && $agentHomePageData->is_submitted_for_approval == 0)
                                        <span class="bg-danger lead p-2"
                                            style="color: white;border-radius:7px;">Disapproved</span>
                                        <p class="lead mb-0 mt-3">Reason For Disapproval</p>
                                        <textarea class="mt-0" name="reasonForDisapprovalHomePage" id="reasonForDisapprovalHomePage" rows="8"
                                            style="width: 100%;">Don't like the Styling of Page
                                        </textarea>
                                    @elseif ($agentHomePageData->is_approved == 0 && $agentHomePageData->is_submitted_for_approval == 1)
                                        <span class="bg-secondary lead p-2"
                                            style="color: white;border-radius:7px;">Submitted
                                            For Approval</span>
                                    @endif

                                </div>
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
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script>
        var homePageEditor;
        var aboutPageEditor;
        var ratesPageEditor;
        $(document).ready(function() {
            homePageEditor = $('#homePageTemplate').summernote({
                height: 500,
            });
            // aboutPageEditor = $('#privacyPageTemplate').summernote({
            //     height: 500,
            // });
            // ratesPageEditor = $('#privacyPageTemplate').summernote({
            //     height: 500,
            // });
        });


        function saveHomePageData() {
            axios.post("{{ route('saveHomePageDataByAgent') }}", {
                    newData: homePageEditor[0].value,
                })
                .then(function(response) {
                    console.log(response);
                    Swal.fire(
                        'Saved!',
                        "Content For Home Page Saved Successfully",
                        'success'
                    )
                })
                .catch(function(error) {
                    console.log(error.response);
                });
        }

        function submitForApprovalOfHomePage() {
            axios.post("{{ route('submitHomePageForApprovalByAgent') }}", {})
                .then(function(response) {
                    console.log(response);
                    window.location.href = window.location.href
                })
                .catch(function(error) {
                    console.log(error.response);
                });
        }

        function setHomeDefaultPage() {
            axios.post("{{ route('setHomeDefaultPageByAgent') }}", {})
                .then(function(response) {
                    console.log(response);
                    $("#homePageTemplate").summernote('code', response.data);
                    Swal.fire(
                        'Successful!',
                        "Default Page is Fetch Successfully",
                        'success'
                    )
                })
                .catch(function(error) {
                    console.log(error.response);
                });
        }
    </script>
    <!-- Scripts -->
@endsection
