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
        <div class="card">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <div class="">
                        <h1 class="card-header text-center">{{ __('Agents') }}
                        </h1>
                        <div class="card-body">
                            <h3>Manage Agents</h3>
                            <div>
                                <a href="/admin_dashboard/agents/create" class="btn btn-dark mt-3 mb-3">Create New
                                    Agent</a>
                            </div>
                            <table id="agentsListTable" class="display mr-5">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>User Id</th>
                                        <th>Admin Id</th>
                                        <th>Full Name</th>
                                        <th>License No</th>
                                        <th>Phone</th>
                                        {{-- <th>Facebook Link</th>
                                        <th>Linkedin Link</th> --}}
                                        {{-- <th>Instagram Link</th>
                                        <th>Twitter Link</th> --}}
                                        <th>Profile Pic </th>
                                        <th>Edit </th>
                                    </tr>
                                </thead>
                                <tbody id="agentsListTableBody">
                                    @for ($i = 0; $i < count($agentData); $i++)
                                        <tr>
                                            <td>{{ $agentData[$i]->id }} </td>
                                            <td>{{ $agentData[$i]->user_id }} </td>
                                            <td>{{ $agentData[$i]->admin_id }} </td>
                                            <td>{{ $agentData[$i]->full_name }} </td>
                                            <td>{{ $agentData[$i]->license_no }} </td>
                                            <td>{{ $agentData[$i]->phone }} </td>
                                            {{-- <td>{{ $agentData[$i]->facebook_link }} </td>
                                            <td>{{ $agentData[$i]->linkedin_link }} </td> --}}
                                            {{-- <td>{{ $agentData[$i]->instagram_link }} </td>
                                            <td>{{ $agentData[$i]->twitter_link }} </td> --}}
                                            <td>
                                                <img width="100px"
                                                    src="../images/profile_pic/{{ $agentData[$i]->profile_pic }}"
                                                    alt="Profile Pic " srcset="">

                                            </td>
                                            <td class="me-5">
                                                <a disable class="btn btn-secondary"
                                                    href="/admin_dashboard/agents/details/{{ $agentData[$i]->id }}">All
                                                    Details</a>
                                                <a class="mt-1 btn btn-dark"
                                                    href="/admin_dashboard/agents/edit/{{ $agentData[$i]->id }}">Edit</a>
                                                <a class="mt-1 btn btn-danger"
                                                    href="/admin_dashboard/agents/delete/{{ $agentData[$i]->id }}">Delete</a>

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
    <script>
        $(document).ready(function() {

            $('#agentsListTable').DataTable();
        });

        // function deleteTableRow(rowUserId) {
        //     let deleteAdminPageUrl = '/admin_dashboard/admins/delete/' + rowUserId;
        //     window.location.href = deleteAdminPageUrl;
        // }
    </script>
    <!-- Scripts -->
@endsection
