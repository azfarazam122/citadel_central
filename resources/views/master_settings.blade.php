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
            <div class="row  overflow-auto ms-auto me-auto justify-content-center">
                <div class="col-md-11">
                    <div class=" secondaryTextColor">
                        <h1 class=" text-center">{{ __('Master Settings') }}
                        </h1>
                        <hr>
                          <div class="card-body">
                            {{-- <h3>Manage Users</h3> --}}
                            <table id="masterSettingsTable" class="display">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Logo</th>
                                        <th>Default Admin Id</th>
                                        <th>Default Agent Id</th>
                                        <th>Primary Color</th>
                                        <th>Secondary Color</th>
                                        <th>Tertiary Color</th>
                                        <th>Primary Text Color</th>
                                        <th>Secondary Text Color</th>
                                        <th>Tertiary Text Color</th>
                                        <th>Fourth Text Color</th>
                                        <th>Is Super Branding On</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody id="masterSettingsTableBody">
                                    <tr>
                                        <td>{{$masterSettingData[0]->id}}</td>
                                        <td style="background: white !important;">
                                            <img  width="100px"
                                            src="../images/masterSettingPic/{{$masterSettingData[0]->logo}}"
                                            alt="Profile Pic " srcset="">
                                        </td>
                                        <td>{{$masterSettingData[0]->default_admin_id}}</td>
                                        <td>{{$masterSettingData[0]->default_agent_id}}</td>
                                        <td>{{$masterSettingData[0]->primary_color}}</td>
                                        <td>{{$masterSettingData[0]->secondary_color}}</td>
                                        <td>{{$masterSettingData[0]->tertiary_color}}</td>
                                        <td>{{$masterSettingData[0]->primary_text_color}}</td>
                                        <td>{{$masterSettingData[0]->secondary_text_color}}</td>
                                        <td>{{$masterSettingData[0]->tertiary_text_color}}</td>
                                        <td>{{$masterSettingData[0]->fourth_text_color}}</td>
                                        <td>{{$masterSettingData[0]->is_super_brandnig_on}}</td>
                                        <td>
                                            <a class="btn btn-dark btn-toolbar"
                                                href="/admin_dashboard/master/edit/{{ $masterSettingData[0]->id }}">Edit</a>
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
         $('#masterSettingsTable').DataTable();

        });
    </script>

    <!-- Scripts -->
@endsection
