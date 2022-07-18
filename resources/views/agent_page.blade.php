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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@5/dark.css" />
@endsection


@section('content')
    <div class="height-100 ">
        <div class=" secondaryTextColor">
            <div class="row overflow-auto justify-content-center me-auto ms-auto col-12">
                <div class="col-md-11">
                    <div class="">
                        <p class="text-center display-4">{{ __('Agent Pages') }}
                        </p>
                        <hr>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="display-6 text-decoration-underline">{{ $agentData->full_name }}</p>
                                </div>
                                <div class="col-md-8 text-end my-1">
                                    <img style="border-radius: 50px;border: 4px solid black;" width="100px"
                                        src="../../../images/profile_pic/{{ $agentData->email }}/{{ $agentData->profile_pic }}"
                                        alt="Profile Pic " srcset="">
                                </div>
                            </div>
                            <table id="agentEachPageDataTable" class="display mr-5">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Page Name</th>
                                        <th>Agent Id </th>
                                        <th>Status </th>
                                        <th>Action</th>
                                        <th>Reason For Disapproval </th>
                                        <th>Updated At</th>
                                        <th>View Page </th>

                                    </tr>
                                </thead>
                                <tbody id="agentEachPageDataTableBody">
                                    @for ($i = 0; $i < count($agentPagesList); $i++)
                                        <tr>
                                            <td>{{ $agentPagesList[$i]->id }} </td>
                                            @if ($agentPagesList[$i]->page_id == 1)
                                                <td> Home Page </td>
                                            @elseif ($agentPagesList[$i]->page_id == 2)
                                                <td> About Page </td>
                                            @else
                                                <td> Rates Page </td>
                                            @endif
                                            <td>{{ $agentPagesList[$i]->agent_id }} </td>
                                            @if ($agentPagesList[$i]->is_submitted_for_approval == 1)
                                                <td>
                                                    <p class="lead">Submitted For Approval</p>
                                                </td>
                                            @elseif ($agentPagesList[$i]->is_approved == 0 && $agentPagesList[$i]->is_submitted_for_approval == 0)
                                                <td>
                                                    <p class="lead">Disapproved</p>
                                                </td>
                                            @elseif ($agentPagesList[$i]->is_approved == 1 && $agentPagesList[$i]->is_submitted_for_approval == 0)
                                                <td>
                                                    <p class="lead">Approved</p>
                                                </td>
                                            @endif
                                            <td>
                                                @if ($agentPagesList[$i]->is_approved == 0 && $agentPagesList[$i]->is_submitted_for_approval == 0)
                                                    <button class="mt-1 btn btn-success " disabled>
                                                        Disapproved</button>
                                                @else
                                                    <button class="mt-1 btn btn-primary "
                                                        onclick="setAgentPageAsApprovedOrDisapprovedFunc('Disapprove', {{ $agentPagesList[$i]->page_id }} , {{ $agentPagesList[$i]->agent_id }})">
                                                        Disapprove</button>
                                                @endif

                                                @if ($agentPagesList[$i]->is_approved == 1 && $agentPagesList[$i]->is_submitted_for_approval == 0)
                                                    <button class="mt-1 btn btn-success " disabled>
                                                        Approved</button>
                                                @else
                                                    <button class="mt-1 btn btn-primary "
                                                        onclick="setAgentPageAsApprovedOrDisapprovedFunc('Approve', {{ $agentPagesList[$i]->page_id }} , {{ $agentPagesList[$i]->agent_id }})">
                                                        Approve</button>
                                                @endif

                                            </td>
                                            @if ($agentPagesList[$i]->is_approved == 1 || $agentPagesList[$i]->is_submitted_for_approval == 1)
                                                <td>__________________________</td>
                                                </td>
                                            @else
                                                <td>{{ $agentPagesList[$i]->reason_for_disapproval }} </td>
                                            @endif
                                            <td>{{ $agentPagesList[$i]->updated_at }} </td>
                                            <td>
                                                <a class="mt-1 btn btn-dark" target="blank"
                                                    href='/admin_dashboard/agent/{{ $agentPagesList[$i]->page_id }}/preview/{{ $agentData->email }}'>View
                                                    Page</a>
                                            </td>
                                        </tr>
                                    @endfor

                                </tbody>
                            </table>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#agentEachPageDataTable').DataTable();
        });

        function setAgentPageAsApprovedOrDisapprovedFunc(ApproveOrDisapprove, PageId, AgentId) {
            if (ApproveOrDisapprove == "Disapprove") {
                Swal.fire({
                    title: 'Enter the Reason of Disapproval',
                    input: 'textarea',
                    inputAttributes: {
                        autocapitalize: 'off'
                    },
                    showCancelButton: true,
                    confirmButtonText: 'Submit',
                    showLoaderOnConfirm: true,

                }).then((reason) => {
                    if (reason.isConfirmed) {
                        axios.post("{{ route('setAgentPageAsApprovedOrDisapproved') }}", {
                                adminRequest: ApproveOrDisapprove,
                                pageId: PageId,
                                agentId: AgentId,
                                reasonForDisapproval: reason.value,

                            })
                            .then(function(response) {
                                console.log(response);
                                window.location.href = window.location.href
                            })
                            .catch(function(error) {
                                console.log(error.response);
                            });
                    }
                })
            } else {
                axios.post("{{ route('setAgentPageAsApprovedOrDisapproved') }}", {
                        adminRequest: ApproveOrDisapprove,
                        pageId: PageId,
                        agentId: AgentId,
                    })
                    .then(function(response) {
                        console.log(response);
                        window.location.href = window.location.href
                    })
                    .catch(function(error) {
                        console.log(error.response);
                    });
            }

        }
    </script>
    <!-- Scripts -->
@endsection
