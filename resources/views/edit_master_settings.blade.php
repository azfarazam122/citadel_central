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
                    <div class="card secondaryTextColor">
                        {{-- <h1 class="fw-bold card-header text-center">Agent {{ $masterSettingData[0]->full_name }}
                        </h1> --}}
                        <div class="card-body">
                            <div class="container">
                                <form method="post" action="{{ route('updateDataOfMasterSetting') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="hiddenId" value="123" />
                                    {{-- <h3>{{ $masterSettingData[0]->license_no }}</h3> --}}
                                    <h3 class="mb-3">Edit Master Settings<span class="text-capitalize text-decoration-underline">

                                        </span>
                                    </h3>
                                    <div class="form-group">
                                        <label for="">Id</label>
                                        <input type="text" readonly class="form-control" name="id_OfMasterSetting" id="id_OfMasterSetting"
                                            value="{{ $masterSettingData[0]->id }}" aria-describedby="helpId">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Primary Color</label>
                                        <div class="row">
                                            <div class="col-10">
                                                <input type="text"  class="form-control" name="primaryColorOfMasterSetting"
                                                id="primaryColorOfMasterSetting" value="{{ $masterSettingData[0]->primary_color }}"
                                                aria-describedby="helpId">
                                            </div>
                                            <div class="col-2">
                                                <input type="color" class="border-0"
                                                onchange="document.getElementById('primaryColorOfMasterSetting').value = this.value"
                                                value="{{ $masterSettingData[0]->primary_color }}"
                                                style="width: 100%; height: 100%;"
                                                title="Choose your color">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="">Secondary Color</label>
                                        <div class="row">
                                            <div class="col-10">
                                            <input type="text" class="form-control" name="secondaryColorOfMasterSetting"
                                                id="secondaryColorOfMasterSetting" value="{{ $masterSettingData[0]->secondary_color }}"
                                                aria-describedby="helpId">
                                            </div>
                                            <div class="col-2">
                                                <input type="color" class="border-0"
                                                onchange="document.getElementById('secondaryColorOfMasterSetting').value = this.value"
                                                value="{{ $masterSettingData[0]->secondary_color }}"
                                                style="width: 100%; height: 100%;"
                                                title="Choose your color">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Tertiary Color</label>
                                          <div class="row">
                                            <div class="col-10">
                                            <input type="text" class="form-control" name="tertiaryColorOfMasterSetting"
                                            id="tertiaryColorOfMasterSetting" value="{{ $masterSettingData[0]->tertiary_color }}"
                                            aria-describedby="helpId">
                                            </div>
                                            <div class="col-2">
                                            <input type="color" class="border-0"
                                                onchange="document.getElementById('tertiaryColorOfMasterSetting').value = this.value"
                                                value="{{ $masterSettingData[0]->tertiary_color }}"
                                                style="width: 100%; height: 100%;"
                                                title="Choose your color">
                                            </div>

                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Primary Text Color</label>
                                        <div class="row">
                                            <div class="col-10">
                                                <input type="text" class="form-control" name="primaryTextColorOfMasterSetting"
                                                    id="primaryTextColorOfMasterSetting" value="{{ $masterSettingData[0]->primary_text_color }}"
                                                    aria-describedby="helpId" placeholder="">
                                            </div>
                                            <div class="col-2">
                                                <input type="color" class="border-0"
                                                    onchange="document.getElementById('primaryTextColorOfMasterSetting').value = this.value"
                                                    value="{{ $masterSettingData[0]->primary_text_color }}"
                                                    style="width: 100%; height: 100%;"
                                                    title="Choose your color">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Secondary Text Color</label>

                                            <div class="row">
                                                <div class="col-10">
                                                    <input type="text" class="form-control" name="secondaryTextColorOfMasterSetting"
                                                    id="secondaryTextColorOfMasterSetting" value="{{ $masterSettingData[0]->secondary_text_color }}"
                                                    aria-describedby="helpId" placeholder="">
                                                </div>
                                                <div class="col-2">
                                                    <input type="color" class="border-0"
                                                    onchange="document.getElementById('secondaryTextColorOfMasterSetting').value = this.value"
                                                    value="{{ $masterSettingData[0]->secondary_text_color }}"
                                                    style="width: 100%; height: 100%;"
                                                    title="Choose your color">
                                                </div>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="">Tertiary Text Color</label>
                                            <div class="row">
                                                <div class="col-10">
                                                    <input type="text" class="form-control" name="tertiaryTextColorOfMasterSetting"
                                                    id="tertiaryTextColorOfMasterSetting" value="{{ $masterSettingData[0]->tertiary_text_color }}"
                                                    aria-describedby="helpId" placeholder="">
                                                </div>
                                                <div class="col-2">
                                                    <input type="color" class="border-0"
                                                    onchange="document.getElementById('tertiaryTextColorOfMasterSetting').value = this.value"
                                                    value="{{ $masterSettingData[0]->tertiary_text_color }}"
                                                    style="width: 100%; height: 100%;"
                                                    title="Choose your color">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Fourth Text Color</label>
                                            <div class="row">
                                                <div class="col-10">
                                                    <input type="text" class="form-control" name="fourthTextColorOfMasterSetting"
                                                    id="fourthTextColorOfMasterSetting" value="{{ $masterSettingData[0]->fourth_text_color }}"
                                                    aria-describedby="helpId" placeholder="">
                                                </div>
                                                  <div class="col-2">
                                                    <input type="color" class="border-0"
                                                    onchange="document.getElementById('fourthTextColorOfMasterSetting').value = this.value"
                                                    value="{{ $masterSettingData[0]->fourth_text_color }}"
                                                    style="width: 100%; height: 100%;"
                                                    title="Choose your color">
                                                </div>
                                            </div>
                                    </div>
                                     <div class="form-group">
                                        <div class="form-group  mt-3">
                                          <label for="isSuperBrandingOnOfMasterSetting">Is Super Branding On</label>
                                          <select class="form-control" name="isSuperBrandingOnOfMasterSetting" id="isSuperBrandingOnOfMasterSetting">
                                            @if ( strtolower($masterSettingData[0]->is_super_brandnig_on) == "true")
                                                <option value="true" selected >True</option>
                                                <option value="false">False</option>
                                            @else
                                                <option value="true">True</option>
                                                <option value="false" selected>False</option>
                                            @endif


                                          </select>
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Logo</label>
                                        {{-- ___________________________ --}}
                                        <p><input type="file" accept="image/*" name="image" id="file"
                                                onchange="loadFile(event)" style="display: none;"></p>
                                        <p><label class="btn btn-primary" for="file" style="cursor: pointer;">Upload Image
                                            </label>
                                            <input style="border: 0px solid;" readonly type="text" name="pathOfImage"
                                                value="{{ $masterSettingData[0]->logo }}" id="pathOfImage">
                                        </p>
                                        <p><img id="showSelectedImage" name="showSelectedImage"
                                                src="../../../images/masterSettingPic/{{ $masterSettingData[0]->logo }}"
                                                width="200" />
                                        </p>

                                        {{-- ___________________________ --}}

                                    </div>


                                    <div class="form-group">
                                        <input type="submit" class="btn btn-dark mt-3" value="Update" name="updateAgent"
                                            id="updateAgent" aria-describedby="helpId" placeholder="">
                                        <a class="mt-3 btn btn-primary" href="/admin_dashboard/master">Back</a>
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
            image = document.getElementById('showSelectedImage');
            document.getElementById('pathOfImage').value = event.target.files[0].name;
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
    <!-- Scripts -->
@endsection
