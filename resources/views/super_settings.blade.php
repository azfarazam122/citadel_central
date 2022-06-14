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
    <div class="height-100">
        <div class="">
            <div class="row overflow-auto justify-content-center ms-auto me-auto">
                <div class="col-md-11">
                    <div class=" secondaryTextColor">
                        <h1 class=" text-center">{{ __('Super Settings') }}
                        </h1>
                        <hr>
                         <div class="card-body">
                            {{-- <h3>Manage Users</h3> --}}
                            <table id="superSettingsTable" class="display">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Logo</th>
                                        <th>Primary Color</th>
                                        <th>Secondary Color</th>
                                        <th>Tertiary Color</th>
                                        <th>Primary Text Color</th>
                                        <th>Secondary Text Color</th>
                                        <th>Tertiary Text Color</th>
                                        <th>Fourth Text Color</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody id="superSettingsTableBody">
                                    <tr>
                                        <td>{{$superSettingData[0]->id}}</td>
                                        {{-- <td>{{$superSettingData[0]->logo}}</td> --}}
                                         <td style="background: white !important;">
                                            <img width="100px"
                                                src="../images/superSettingPic/{{$superSettingData[0]->logo}}"
                                                alt="Profile Pic " srcset="">
                                        </td>
                                        <td>{{$superSettingData[0]->primary_color}}</td>
                                        <td>{{$superSettingData[0]->secondary_color}}</td>
                                        <td>{{$superSettingData[0]->tertiary_color}}</td>
                                        <td>{{$superSettingData[0]->primary_text_color}}</td>
                                        <td>{{$superSettingData[0]->secondary_text_color}}</td>
                                        <td>{{$superSettingData[0]->tertiary_text_color}}</td>
                                        <td>{{$superSettingData[0]->fourth_text_color}}</td>
                                        <td>
                                            <a class="btn btn-dark "
                                                href="/admin_dashboard/super/edit/{{ $superSettingData[0]->id }}">Edit</a>
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
            $('#superSettingsTable').DataTable();

        });
    </script>
    <!-- Scripts -->
@endsection
