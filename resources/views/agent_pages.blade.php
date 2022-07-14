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

@php
$adminLoggedIn = Auth::user();
$adminData = App\Models\Admin::where('user_id', $adminLoggedIn->id)->get();
$listOfAgentsOfThatAdmin = App\Models\Agent::where('admin_id', $adminData[0]->id)->get();
for ($i = 0; $i < count($listOfAgentsOfThatAdmin); $i++) {
    $agentEmail = App\Models\User::where('id', $listOfAgentsOfThatAdmin[$i]->user_id)->get('email');
    $listOfAgentsOfThatAdmin[$i]['email'] = $agentEmail[0]->email;
}
@endphp
@section('content')
    <div class="height-100 ">
        <div class=" secondaryTextColor">
            <div class="row overflow-auto justify-content-center me-auto ms-auto col-12">
                <div class="col-md-11">
                    <div class="">
                        <h1 class="text-center">{{ __('Agents') }}
                        </h1>
                        <hr>
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
                                        <th>Full Name</th>
                                        <th>Profile Pic </th>
                                        <th>Edit </th>
                                    </tr>
                                </thead>
                                <tbody id="agentsListTableBody">
                                    @for ($i = 0; $i < count($listOfAgentsOfThatAdmin); $i++)
                                        <tr>
                                            <td>{{ $listOfAgentsOfThatAdmin[$i]->id }} </td>
                                            <td>{{ $listOfAgentsOfThatAdmin[$i]->full_name }} </td>
                                            <td>
                                                <img style="border-radius: 50px;border: 4px solid black;" width="100px"
                                                    src="../../images/profile_pic/{{ $listOfAgentsOfThatAdmin[$i]->email }}/{{ $listOfAgentsOfThatAdmin[$i]->profile_pic }}"
                                                    alt="Profile Pic " srcset="">

                                            </td>
                                            <td class="me-5">
                                                <a class=" btn btn-primary col-md-4"
                                                    href="/admin_dashboard/agent/{{ $listOfAgentsOfThatAdmin[$i]->id }}/pages">Pages</a>
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
