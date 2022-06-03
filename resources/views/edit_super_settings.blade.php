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
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        {{-- <h1 class="fw-bold card-header text-center">Agent {{ $superSettingsData[0]->full_name }}
                        </h1> --}}
                        <div class="card-body">
                            <div class="container">
                                <form method="post" action="{{ route('updateDataOfSuperSettings') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="hiddenId" value="123" />
                                    {{-- <h3>{{ $superSettingsData[0]->license_no }}</h3> --}}
                                    <h3 class="mb-3">Edit Super Settings<span class="text-capitalize text-decoration-underline">

                                        </span>
                                    </h3>
                                    <div class="form-group">
                                        <label for="">Id</label>
                                        <input type="text" readonly class="form-control" name="id_OfSuperSetting" id="id_OfSuperSetting"
                                            value="{{ $superSettingsData[0]->id }}" aria-describedby="helpId">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Primary Color</label>
                                        <input type="text"  class="form-control" name="primaryColorOfSuperSetting"
                                            id="primaryColorOfSuperSetting" value="{{ $superSettingsData[0]->primary_color }}"
                                            aria-describedby="helpId">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Secondary Color</label>
                                        <input type="text" class="form-control" name="secondaryColorOfSuperSetting"
                                            id="secondaryColorOfSuperSetting" value="{{ $superSettingsData[0]->secondary_color }}"
                                            aria-describedby="helpId">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Tertiary Color</label>
                                        <input type="text" class="form-control" name="tertiaryColorOfSuperSetting"
                                            id="tertiaryColorOfSuperSetting" value="{{ $superSettingsData[0]->tertiary_color }}"
                                            aria-describedby="helpId">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Primary Text Color</label>
                                        <input type="text" class="form-control" name="primaryTextColorOfSuperSetting"
                                            id="primaryTextColorOfSuperSetting" value="{{ $superSettingsData[0]->primary_text_color }}"
                                            aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Secondary Text Color</label>
                                        <input type="text" class="form-control" name="secondaryTextColorOfSuperSetting"
                                            id="secondaryTextColorOfSuperSetting" value="{{ $superSettingsData[0]->secondary_text_color }}"
                                            aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Logo</label>
                                        {{-- ___________________________ --}}
                                        <p><input type="file" accept="image/*" name="image" id="file"
                                                onchange="loadFile(event)" style="display: none;"></p>
                                        <p><label class="btn btn-primary" for="file" style="cursor: pointer;">Upload Image
                                            </label>
                                            <input style="border: 0px solid;" readonly type="text" name="pathOfImage"
                                                value="{{ $superSettingsData[0]->logo }}" id="pathOfImage">
                                        </p>
                                        <p><img id="showSelectedImage" name="showSelectedImage"
                                                src="../../../images/superSettingPic/{{ $superSettingsData[0]->logo }}"
                                                width="200" />
                                        </p>

                                        {{-- ___________________________ --}}

                                    </div>


                                    <div class="form-group">
                                        <input type="submit" class="btn btn-dark mt-3" value="Update" name="updateAgent"
                                            id="updateAgent" aria-describedby="helpId" placeholder="">
                                        <a class="mt-3 btn btn-primary" href="/admin_dashboard/super">Back</a>
                                    </div>
                                </form>
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
    <script>
        var path;
        var image;
        $(document).ready(function() {

        });

        var loadFile = function(event) {
            debugger;
            image = document.getElementById('showSelectedImage');
            document.getElementById('pathOfImage').value = event.target.files[0].name;
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
    <!-- Scripts -->
@endsection
