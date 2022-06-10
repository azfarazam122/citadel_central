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
                         <h1 class="card-header text-center">{{('Edit Admin Settings') }}</h1>
                        <div class="card-body">
                            <div class="container">
                                <form method="post" action="{{ route('updateDataOfAdminSetting') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="hiddenId" value="123" />
                                    {{-- <h3>{{ $adminSettingData[0]->license_no }}</h3> --}}
                                    <div class="form-group">
                                        <label for="">Id</label>
                                        <input type="text" readonly class="form-control" name="id_OfAdminSetting" id="id_OfAdminSetting"
                                            value="{{ $adminSettingData[0]->id }}" aria-describedby="helpId">
                                    </div>
                                    <div class="form-group">
                                        <label for="">User Id</label>
                                        <input type="text" readonly class="form-control" name="userId_OfAdminSetting" id="userId_OfAdminSetting"
                                            value="{{ $adminSettingData[0]->user_id }}" aria-describedby="helpId">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Master Admin Id</label>
                                        <input type="text" readonly class="form-control" name="masterAdminid_OfAdminSetting" id="masterAdminid_OfAdminSetting"
                                            value="{{ $adminSettingData[0]->master_admin_id }}" aria-describedby="helpId">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" readonly class="form-control" name="email_OfAdminSetting" id="email_OfAdminSetting"
                                            value="{{ $adminSettingData[0]->email }}" aria-describedby="helpId">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text"  class="form-control" name="name_OfAdminSetting" id="name_OfAdminSetting"
                                            value="{{ $adminSettingData[0]->name }}" aria-describedby="helpId">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Primary Color</label>
                                        <div class="row">
                                            <div class="col-10">
                                                <input type="text"  class="form-control" name="primaryColorOfAdminSetting"
                                                id="primaryColorOfAdminSetting" value="{{ $adminSettingData[0]->primary_color }}"
                                                aria-describedby="helpId">
                                            </div>
                                            <div class="col-2">
                                                <input type="color" class="border-0"
                                                onchange="document.getElementById('primaryColorOfAdminSetting').value = this.value"
                                                value="{{ $adminSettingData[0]->primary_color }}"
                                                style="width: 100%; height: 100%;"
                                                title="Choose your color">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="">Secondary Color</label>
                                        <div class="row">
                                            <div class="col-10">
                                            <input type="text" class="form-control" name="secondaryColorOfAdminSetting"
                                                id="secondaryColorOfAdminSetting" value="{{ $adminSettingData[0]->secondary_color }}"
                                                aria-describedby="helpId">
                                            </div>
                                            <div class="col-2">
                                                <input type="color" class="border-0"
                                                onchange="document.getElementById('secondaryColorOfAdminSetting').value = this.value"
                                                value="{{ $adminSettingData[0]->secondary_color }}"
                                                style="width: 100%; height: 100%;"
                                                title="Choose your color">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Tertiary Color</label>
                                          <div class="row">
                                            <div class="col-10">
                                            <input type="text" class="form-control" name="tertiaryColorOfAdminSetting"
                                            id="tertiaryColorOfAdminSetting" value="{{ $adminSettingData[0]->tertiary_color }}"
                                            aria-describedby="helpId">
                                            </div>
                                            <div class="col-2">
                                            <input type="color" class="border-0"
                                                onchange="document.getElementById('tertiaryColorOfAdminSetting').value = this.value"
                                                value="{{ $adminSettingData[0]->tertiary_color }}"
                                                style="width: 100%; height: 100%;"
                                                title="Choose your color">
                                            </div>

                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Primary Text Color</label>
                                        <div class="row">
                                            <div class="col-10">
                                                <input type="text" class="form-control" name="primaryTextColorOfAdminSetting"
                                                    id="primaryTextColorOfAdminSetting" value="{{ $adminSettingData[0]->primary_text_color }}"
                                                    aria-describedby="helpId" placeholder="">
                                            </div>
                                            <div class="col-2">
                                                <input type="color" class="border-0"
                                                    onchange="document.getElementById('primaryTextColorOfAdminSetting').value = this.value"
                                                    value="{{ $adminSettingData[0]->primary_text_color }}"
                                                    style="width: 100%; height: 100%;"
                                                    title="Choose your color">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Secondary Text Color</label>

                                            <div class="row">
                                                <div class="col-10">
                                                    <input type="text" class="form-control" name="secondaryTextColorOfAdminSetting"
                                                    id="secondaryTextColorOfAdminSetting" value="{{ $adminSettingData[0]->secondary_text_color }}"
                                                    aria-describedby="helpId" placeholder="">
                                                </div>
                                                <div class="col-2">
                                                    <input type="color" class="border-0"
                                                    onchange="document.getElementById('secondaryTextColorOfAdminSetting').value = this.value"
                                                    value="{{ $adminSettingData[0]->secondary_text_color }}"
                                                    style="width: 100%; height: 100%;"
                                                    title="Choose your color">
                                                </div>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="">Tertiary Text Color</label>
                                            <div class="row">
                                                <div class="col-10">
                                                    <input type="text" class="form-control" name="tertiaryTextColorOfAdminSetting"
                                                    id="tertiaryTextColorOfAdminSetting" value="{{ $adminSettingData[0]->tertiary_text_color }}"
                                                    aria-describedby="helpId" placeholder="">
                                                </div>
                                                <div class="col-2">
                                                    <input type="color" class="border-0"
                                                    onchange="document.getElementById('tertiaryTextColorOfAdminSetting').value = this.value"
                                                    value="{{ $adminSettingData[0]->tertiary_text_color }}"
                                                    style="width: 100%; height: 100%;"
                                                    title="Choose your color">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Fourth Text Color</label>
                                            <div class="row">
                                                <div class="col-10">
                                                    <input type="text" class="form-control" name="fourthTextColorOfAdminSetting"
                                                    id="fourthTextColorOfAdminSetting" value="{{ $adminSettingData[0]->fourth_text_color }}"
                                                    aria-describedby="helpId" placeholder="">
                                                </div>
                                                  <div class="col-2">
                                                    <input type="color" class="border-0"
                                                    onchange="document.getElementById('fourthTextColorOfAdminSetting').value = this.value"
                                                    value="{{ $adminSettingData[0]->fourth_text_color }}"
                                                    style="width: 100%; height: 100%;"
                                                    title="Choose your color">
                                                </div>
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
                                                value="{{ $adminSettingData[0]->logo }}" id="pathOfImage">
                                        </p>
                                        <p><img id="showSelectedImage" name="showSelectedImage"
                                                src="../../../images/adminSettingPic/{{$adminSettingData[0]->email}}/{{$adminSettingData[0]->logo}}"
                                                width="200" />
                                        </p>

                                        {{-- ___________________________ --}}

                                    </div>


                                    <div class="form-group">
                                        <input type="submit" class="btn btn-dark mt-3" value="Update" name="updateAgent"
                                            id="updateAgent" aria-describedby="helpId" placeholder="">
                                        <a class="mt-3 btn btn-primary" href="/admin_dashboard/admin">Back</a>
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
