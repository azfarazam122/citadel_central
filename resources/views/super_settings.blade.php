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
        <div class="container">
            <div class="row justify-content-center ms-auto me-auto">
                <div class="col-md-11">
                    <div class="overflow-auto secondaryTextColor border">
                        <p class="display-3 text-center">{{ __('Super Settings') }}
                        </p>
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
                                        <td>{{ $superSettingData[0]->id }}</td>
                                        {{-- <td>{{$superSettingData[0]->logo}}</td> --}}
                                        <td style="background: white !important;">
                                            <img width="100px"
                                                src="../images/superSettingPic/{{ $superSettingData[0]->logo }}"
                                                alt="Profile Pic " srcset="">
                                        </td>
                                        <td>{{ $superSettingData[0]->primary_color }}</td>
                                        <td>{{ $superSettingData[0]->secondary_color }}</td>
                                        <td>{{ $superSettingData[0]->tertiary_color }}</td>
                                        <td>{{ $superSettingData[0]->primary_text_color }}</td>
                                        <td>{{ $superSettingData[0]->secondary_text_color }}</td>
                                        <td>{{ $superSettingData[0]->tertiary_text_color }}</td>
                                        <td>{{ $superSettingData[0]->fourth_text_color }}</td>
                                        <td>
                                            <a class="btn btn-dark "
                                                href="/admin_dashboard/super/edit/{{ $superSettingData[0]->id }}">Edit</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mt-5 mb-5">
                        <p class="text-center display-5">Terms & Conditions Page</p>
                        <textarea style="height: 500px;width: 100%;" class="col-md-12 mt-5" id="termsPageTemplate">
                            {{ $superSettingData[0]->terms_data }}
                        </textarea>
                        <div class="mt-4 text-center">
                            <a class="btn col-md-4 homeButtons" style="background: var(--primary-color)"
                                onclick="saveTermsPageData()">Save Terms Page</a>
                        </div>
                    </div>

                    <div class="mt-5 mb-5">
                        <p class="text-center display-5">Privacy Policy Page</p>
                        <textarea style="height: 500px;width: 100%;" class="col-md-12 mt-5" id="privacyPageTemplate">
                            {{ $superSettingData[0]->privacy_data }}
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
    <script src="{{ asset('js/masterSettings.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script>
        var termsPageeditor;
        var privacyPageeditor;
        $(document).ready(function() {
            $('#superSettingsTable').DataTable();
            termsPageeditor = $('#termsPageTemplate').summernote({
                height: 500,
            });
            privacyPageeditor = $('#privacyPageTemplate').summernote({
                height: 500,
            });
        });

        function saveTermsPageData() {
            axios.post("{{ route('saveTermsPageDataBySuper') }}", {
                    newData: termsPageeditor.getContents(),
                })
                .then(function(response) {
                    console.log(response);
                    if (response.data == 'Saved And Applied') {
                        Swal.fire(
                            'Saved And Applied!',
                            "Content For Terms And Conditions Page Saved And Applied Successfully",
                            'success'
                        )

                    } else {
                        Swal.fire(
                            'Saved But Not Applied!',
                            "Content For Terms And Conditions Page Saved Successfully But Not Applied",
                            'success'
                        )
                    }
                })
                .catch(function(error) {
                    console.log(error.response);
                });
        }

        function savePrivacyPageData() {
            axios.post("{{ route('savePrivacyPageDataBySuper') }}", {
                    newData: privacyPageeditor.getContents(),
                })
                .then(function(response) {
                    if (response.data == 'Saved And Applied') {
                        Swal.fire(
                            'Saved And Applied!',
                            "Content For Privacy Policy Page Saved And Applied Successfully",
                            'success'
                        )
                    } else {
                        Swal.fire(
                            'Saved But Not Applied!',
                            "Content For Privacy Policy Page Saved Successfully But Not Applied",
                            'success'
                        )
                    }
                })
                .catch(function(error) {
                    console.log(error.response);
                });
        }
    </script>
    <!-- Scripts -->
@endsection
