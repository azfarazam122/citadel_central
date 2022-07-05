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
@endsection
@section('content')
    <div class="height-100">
        <div class="">
            <div class="row  ms-auto me-auto justify-content-center">
                <div class="col-md-11">
                    <div class="overflow-auto secondaryTextColor border">
                        <p class="display-3 text-center">{{ __('Master Settings') }}
                        </p>
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
                                        <td>{{ $masterSettingData[0]->id }}</td>
                                        <td style="background: white !important;">
                                            <img width="100px"
                                                src="../images/masterSettingPic/{{ $masterSettingData[0]->logo }}"
                                                alt="Profile Pic " srcset="">
                                        </td>
                                        <td>{{ $masterSettingData[0]->default_admin_id }}</td>
                                        <td>{{ $masterSettingData[0]->default_agent_id }}</td>
                                        <td>{{ $masterSettingData[0]->primary_color }}</td>
                                        <td>{{ $masterSettingData[0]->secondary_color }}</td>
                                        <td>{{ $masterSettingData[0]->tertiary_color }}</td>
                                        <td>{{ $masterSettingData[0]->primary_text_color }}</td>
                                        <td>{{ $masterSettingData[0]->secondary_text_color }}</td>
                                        <td>{{ $masterSettingData[0]->tertiary_text_color }}</td>
                                        <td>{{ $masterSettingData[0]->fourth_text_color }}</td>
                                        <td>{{ $masterSettingData[0]->is_super_brandnig_on }}</td>
                                        <td>
                                            <a class="btn btn-dark btn-toolbar"
                                                href="/admin_dashboard/master/edit/{{ $masterSettingData[0]->id }}">Edit</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>


                    <div class="container mt-5 mb-5">
                        <p class="text-center display-5">Terms & Conditions Page</p>
                        <textarea style="width: 100%;" class="col-md-12 mt-5" id="termsPageTemplate">
                            {{ $masterSettingData[0]->terms_data }}
                        </textarea>
                        <div class="mt-4 text-center">
                            <a class="btn col-md-4 homeButtons" style="background: var(--primary-color)"
                                onclick="saveTermsPageData()">Save Terms Page</a>
                        </div>
                    </div>

                    <div class="container mt-5 mb-5">
                        <p class="text-center display-5">Privacy Policy Page</p>
                        <h1></h1>
                        <textarea style="width: 100%;" class="col-md-12 mt-5" id="privacyPageTemplate">
                            {{ $masterSettingData[0]->privacy_data }}
                        </textarea>
                        <div class="mt-4 text-center">
                            <a class="btn col-md-4 homeButtons" style="background: var(--primary-color)"
                                onclick="savePrivacyPageData()">Save Privacy Page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script>
        var termsPageeditor;
        var privacyPageeditor;
        $(document).ready(function() {
            $('#masterSettingsTable').DataTable();
            termsPageeditor = $('#termsPageTemplate').summernote({
                height: 500,
            });
            privacyPageeditor = $('#privacyPageTemplate').summernote({
                height: 500,
            });
        });


        function saveTermsPageData() {
            axios.post("{{ route('saveTermsPageDataByMaster') }}", {
                    newData: termsPageeditor[0].innerHTML,
                })
                .then(function(response) {
                    console.log(response);
                    Swal.fire(
                        'Saved!',
                        "Content For Terms And Conditions Page Saved Successfully",
                        'success'
                    )
                })
                .catch(function(error) {
                    console.log(error.response);
                });
        }

        function savePrivacyPageData() {
            axios.post("{{ route('savePrivacyPageDataByMaster') }}", {
                    newData: privacyPageeditor[0].innerHTML,
                })
                .then(function(response) {
                    console.log(response);
                    Swal.fire(
                        'Saved!',
                        "Content For Privacy Policy Page Saved Successfully",
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
