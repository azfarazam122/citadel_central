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
            <div class="row justify-content-center ms-auto me-auto">
                <div class="col-md-11">
                    <div class="card secondaryTextColor">
                        <h1 class="card-header text-center">{{ __('Admin Settings') }}
                        </h1>
                         <div class="card-body">
                            {{-- <h3>Manage Users</h3> --}}
                            <table id="adminSettingsTable" class="display">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>User Id</th>
                                        <th>Master Admin Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Logo</th>
                                        <th>Primary Color</th>
                                        <th>Secondary Color</th>
                                        {{-- <th>Tertiary Color</th>
                                        <th>Primary Text Color</th>
                                        <th>Secondary Text Color</th>
                                        <th>Tertiary Text Color</th>
                                        <th>Fourth Text Color</th> --}}
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody id="adminSettingsTableBody">
                                    <tr>
                                        <td>{{$adminSettingData[0]->id}}</td>
                                        <td>{{$adminSettingData[0]->user_id}}</td>
                                        <td>{{$adminSettingData[0]->master_admin_id}}</td>
                                        <td>{{$adminSettingData[0]->name}}</td>
                                        <td>{{$adminSettingData[0]->email}}</td>
                                        <td style="background: white !important;">
                                            <img width="100px"
                                                src="../images/adminSettingPic/{{$adminSettingData[0]->email}}/{{$adminSettingData[0]->logo}}"
                                                alt="Admin Logo " srcset="">
                                        </td>
                                        <td>{{$adminSettingData[0]->primary_color}}</td>
                                        <td>{{$adminSettingData[0]->secondary_color}}</td>
                                        {{-- <td>{{$adminSettingData[0]->tertiary_color}}</td>
                                        <td>{{$adminSettingData[0]->primary_text_color}}</td>
                                        <td>{{$adminSettingData[0]->secondary_text_color}}</td>
                                        <td>{{$adminSettingData[0]->tertiary_text_color}}</td>
                                        <td>{{$adminSettingData[0]->fourth_text_color}}</td> --}}
                                        <td>
                                            <a class="btn btn-dark "
                                                href="/admin_dashboard/admin/detail/{{ $adminSettingData[0]->user_id }}">All Details</a>
                                            <a class="btn btn-dark "
                                                href="/admin_dashboard/admin/edit/{{ $adminSettingData[0]->user_id }}">Edit</a>
                                        </td>
                                    </tr>
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
                $('#adminSettingsTable').DataTable();
        });
    </script>
    <!-- Scripts -->
@endsection
