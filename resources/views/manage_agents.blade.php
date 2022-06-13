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
        <div class="card secondaryTextColor">
            <div class="row justify-content-center me-auto ms-auto col-12">
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
                                                <img style="border-radius: 50px;border: 4px solid black;" width="100px"
                                                    src="../images/profile_pic/{{$agentData[$i]->email}}/{{ $agentData[$i]->profile_pic }}"
                                                    alt="Profile Pic " srcset="">

                                            </td>
                                            <td class="me-5">
                                                @php
                                                    $masterAdminData = App\Models\MasterSetting::all();
                                                @endphp

                                                @if ($masterAdminData[0]->default_agent_id == $agentData[$i]->id)
                                                    <button type="button" disabled class="btn btn-success">Default Agent</button>
                                                @else
                                                    <a class="btn btn-primary"
                                                        onclick="setAgentAsDefaultFunc({{$agentData[$i]->id}})">Set As Default</a>
                                                @endif

                                                @if ($agentData[$i]->is_approved == 'true')
                                                    {{-- <button type="button"  class="btn btn-success">Approved</button> --}}
                                                    <a class="btn btn-success"
                                                        onclick="setAgentAsUnApprovedFunc({{$agentData[$i]->id}})">Approved</a>
                                                @else
                                                    <a class="btn btn-primary"
                                                        onclick="setAgentAsApprovedFunc({{$agentData[$i]->id}})">Unapproved</a>
                                                @endif
                                                <a disable class="btn btn-secondary"
                                                    href="/admin_dashboard/agents/details/{{ $agentData[$i]->id }}">All
                                                    Details</a>
                                                <a class=" btn btn-dark"
                                                    href="/admin_dashboard/agents/edit/{{ $agentData[$i]->id }}">Edit</a>
                                                <a class=" btn btn-danger"
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


        function setAgentAsDefaultFunc(agent_Id) {
            axios.post("{{ route('setAgentAsDefault') }}", {
                    id: agent_Id,
                })
                .then(function(response) {
                    console.log(response);
                    window.location.href = window.location.href
                })
                .catch(function(error) {
                    console.log(error.response);
                });
        }

        function setAgentAsApprovedFunc(agent_Id) {
            axios.post("{{ route('setAgentAsApproved') }}", {
                    id: agent_Id,
                })
                .then(function(response) {
                    console.log(response);
                    window.location.href = window.location.href
                })
                .catch(function(error) {
                    console.log(error.response);
                });
        }

        function setAgentAsUnApprovedFunc(agent_Id) {
            axios.post("{{ route('setAgentAsUnApproved') }}", {
                    id: agent_Id,
                })
                .then(function(response) {
                    console.log(response);
                    window.location.href = window.location.href
                })
                .catch(function(error) {
                    console.log(error.response);
                });
        }
    </script>
    <!-- Scripts -->
@endsection
