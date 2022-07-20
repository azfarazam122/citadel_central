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
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@5/dark.css" />
    <style>
        .container {
            display: none;
        }

        .preload {
            width: 100px;
            height: 100px;
            position: fixed;
            top: 50%;
            left: 50%;
        }
    </style>
@endsection
@section('content')
    <div class="preload"><img src="../../images/loader.gif">
    </div>
    <div class="container">
        <div class="overflow-auto row justify-content-center">
            <div class="col-md-12">
                <div class=" secondaryTextColor">
                    <p class="display-3 text-center">{{ __('Home Page Editor') }}
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
                                <div>
                                    @php
                                        $widgetsData = App\Models\Widget::where('page_id', '1')->get();
                                    @endphp
                                    <table id="widgetsDataTable" class="display">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Widget Name</th>
                                                <th>Widget Type</th>
                                            </tr>
                                        </thead>
                                        <tbody id="widgetsDataTableBody">
                                            @for ($i = 0; $i < count($widgetsData); $i++)
                                                <tr>
                                                    <td>{{ $widgetsData[$i]->id }}</td>
                                                    <td>{{ $widgetsData[$i]->name }}</td>
                                                    <td class="lead">{{ $widgetsData[$i]->type }}</td>
                                                </tr>
                                            @endfor
                                        </tbody>
                                    </table>
                                </div>
                                {{-- <ol class="">
                                    <li>[[How_to_Collect_Your_Miles_Today_Button]]</li>
                                </ol> --}}
                            </div>
                            <div class="mt-4 text-center">

                            </div>
                        </div>

                        <div class="container mt-2 mb-5">
                            <p class="text-center display-5">Home Page Content</p>
                            @php
                                $agentLoggedIn = Auth::user();
                                $agentData = App\Models\Agent::where('user_id', $agentLoggedIn->id)->get();
                                $agentData[0]['email'] = $agentLoggedIn->email;
                                $agentHomePageData = App\Models\AgentPageStaging::where('agent_id', $agentData[0]->id)
                                    ->where('page_id', 1)
                                    ->first();
                            @endphp
                            <textarea style="width: 100%;" class="col-md-12 mt-2" id="homePageTemplate">
                                {{ $agentHomePageData->data }}
                            </textarea>
                            <div class="mt-4 text-center">
                                <a class="btn mt-1 homeButtons" style="background: var(--primary-color)"
                                    onclick="saveHomePageData({{ $agentHomePageData->page_id }})">Save Home Page
                                    Content</a>
                                <a class="btn mt-1 homeButtons" style="background: var(--primary-color)"
                                    onclick="submitForApprovalOfHomePage({{ $agentHomePageData->page_id }})">Submit For
                                    Approval</a>
                                <a class="btn mt-1 homeButtons btn-primary"
                                    onclick="setHomeDefaultPage({{ $agentHomePageData->page_id }})">Default Home
                                    Page</a>
                                <a class="mt-1 btn btn-dark" target="blank"
                                    href="/admin_dashboard/agent/{{ $agentHomePageData->page_id }}/view/{{ $agentData[0]->email }}">View
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
                                        <textarea class="mt-0" name="reasonForDisapprovalHomePage" id="reasonForDisapprovalHomePage" readonly rows="6"
                                            style="width: 100%; border-radius: 7px;">{{ $agentHomePageData->reason_for_disapproval }}
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
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script>
        var homePageEditor;
        $(document).ready(function() {
            $(".preload").fadeOut(2000, function() {
                $(".container").fadeIn(1000);
            });
            $('#widgetsDataTable').DataTable();
            homePageEditor = $('#homePageTemplate').summernote({
                height: 500,
            });

        });


        function saveHomePageData(page_id) {
            axios.post("{{ route('saveEditorSubPageDataByAgent') }}", {
                    newData: homePageEditor[0].value,
                    current_page_id: page_id,
                })
                .then(function(response) {
                    console.log(response);
                    if (response.data == "Saved") {
                        Swal.fire(
                            'Saved!',
                            "Content For Home Page Saved Successfully",
                            'success'
                        )
                    }
                })
                .catch(function(error) {
                    console.log(error.response);
                });
        }

        function submitForApprovalOfHomePage(page_id) {
            axios.post("{{ route('submitPagesEditorSubPageForApprovalByAgent') }}", {
                    current_page_id: page_id,
                })
                .then(function(response) {
                    console.log(response);
                    window.location.href = window.location.href
                })
                .catch(function(error) {
                    console.log(error.response);
                });
        }

        function setHomeDefaultPage(pageId) {
            axios.post("{{ route('setAsDefaultPageInPagesEditorViewByAgent') }}", {
                    current_page_id: pageId,
                })
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