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
            <div class="row overflow-auto justify-content-center">
                <div class="col-md-8">
                    <div class=" secondaryTextColor">
                        <h1 class=" text-center">{{ __('Admins') }}
                        </h1>
                        <hr>
                        <div class="card-body">
                            <div class="container">
                                <form method="post" action="{{ route('createAdmin') }}">
                                    @csrf
                                    <h3>Create Admin</h3>
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control @error('nameOfAdmin') is-invalid @enderror"
                                            name="nameOfAdmin" id="nameOfAdmin" value="{{ old('nameOfAdmin') }}" required
                                            aria-describedby="helpId" placeholder="">
                                        @error('nameOfAdmin')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control @error('emailOfAdmin') is-invalid @enderror"
                                            name="emailOfAdmin" id="emailOfAdmin" value="{{ old('emailOfAdmin') }}"
                                            required aria-describedby="helpId" placeholder="">
                                        @error('emailOfAdmin')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password"
                                            class="form-control @error('passwordOfAdmin') is-invalid @enderror"
                                            name="passwordOfAdmin" id="passwordOfAdmin"
                                            value="{{ old('passwordOfAdmin') }}" required aria-describedby="helpId"
                                            placeholder="">
                                        @error('passwordOfAdmin')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Primary Color</label>
                                        <div class="row">
                                            <div class="col-10">
                                            <input type="text"
                                                class="form-control @error('primaryColorOfAdmin') is-invalid @enderror"
                                                name="primaryColorOfAdmin" id="primaryColorOfAdmin"
                                                value="{{ old('primaryColorOfAdmin') }}" required aria-describedby="helpId"
                                                placeholder="">
                                            </div>
                                            <div class="col-2">
                                                <input type="color" class="border-0"
                                                onchange="document.getElementById('primaryColorOfAdmin').value = this.value"
                                                value=""
                                                style="width: 100%; height: 100%;"
                                                title="Choose your color">
                                            </div>
                                        </div>
                                        @error('primaryColorOfAdmin')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Secondary Color</label>
                                        <div class="row">
                                            <div class="col-10">
                                            <input type="text"
                                                class="form-control @error('secondaryColorOfAdmin') is-invalid @enderror"
                                                name="secondaryColorOfAdmin" id="secondaryColorOfAdmin"
                                                value="{{ old('secondaryColorOfAdmin') }}" required aria-describedby="helpId"
                                                placeholder="">
                                            </div>
                                            <div class="col-2">
                                                <input type="color" class="border-0"
                                                onchange="document.getElementById('secondaryColorOfAdmin').value = this.value"
                                                value=""
                                                style="width: 100%; height: 100%;"
                                                title="Choose your color">
                                            </div>
                                        </div>
                                        @error('secondaryColorOfAdmin')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="">Tertiary Color</label>
                                        <div class="row">
                                            <div class="col-10">
                                                <input type="text"
                                                    class="form-control @error('tertiaryColorOfAdmin') is-invalid @enderror"
                                                    name="tertiaryColorOfAdmin" id="tertiaryColorOfAdmin"
                                                    value="{{ old('tertiaryColorOfAdmin') }}" required aria-describedby="helpId"
                                                    placeholder="">
                                            </div>
                                            <div class="col-2">
                                                <input type="color" class="border-0"
                                                onchange="document.getElementById('tertiaryColorOfAdmin').value = this.value"
                                                value=""
                                                style="width: 100%; height: 100%;"
                                                title="Choose your color">
                                            </div>
                                        </div>
                                        @error('tertiaryColorOfAdmin')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Primary Text Color</label>
                                        <div class="row">
                                            <div class="col-10">
                                            <input type="text"
                                                class="form-control @error('primaryTextColorOfAdmin') is-invalid @enderror"
                                                name="primaryTextColorOfAdmin" id="primaryTextColorOfAdmin"
                                                value="{{ old('primaryTextColorOfAdmin') }}" required aria-describedby="helpId"
                                                placeholder="">
                                            </div>
                                            <div class="col-2">
                                                <input type="color" class="border-0"
                                                onchange="document.getElementById('primaryTextColorOfAdmin').value = this.value"
                                                value=""
                                                style="width: 100%; height: 100%;"
                                                title="Choose your color">
                                            </div>
                                        </div>
                                        @error('primaryTextColorOfAdmin')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Secondary Text Color</label>
                                        <div class="row">
                                            <div class="col-10">
                                                <input type="text"
                                                    class="form-control @error('secondaryTextColorOfAdmin') is-invalid @enderror"
                                                    name="secondaryTextColorOfAdmin" id="secondaryTextColorOfAdmin"
                                                    value="{{ old('secondaryTextColorOfAdmin') }}" required aria-describedby="helpId"
                                                    placeholder="">
                                            </div>
                                            <div class="col-2">
                                                <input type="color" class="border-0"
                                                onchange="document.getElementById('secondaryTextColorOfAdmin').value = this.value"
                                                value=""
                                                style="width: 100%; height: 100%;"
                                                title="Choose your color">
                                            </div>
                                        </div>
                                        @error('secondaryTextColorOfAdmin')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tertiary Text Color</label>
                                        <div class="row">
                                            <div class="col-10">
                                            <input type="text"
                                                class="form-control @error('tertiaryTextColorOfAdmin') is-invalid @enderror"
                                                name="tertiaryTextColorOfAdmin" id="tertiaryTextColorOfAdmin"
                                                value="{{ old('tertiaryTextColorOfAdmin') }}" required aria-describedby="helpId"
                                                placeholder="">
                                            </div>
                                            <div class="col-2">
                                                <input type="color" class="border-0"
                                                onchange="document.getElementById('tertiaryTextColorOfAdmin').value = this.value"
                                                value=""
                                                style="width: 100%; height: 100%;"
                                                title="Choose your color">
                                            </div>
                                        </div>

                                        @error('tertiaryTextColorOfAdmin')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Fourth Text Color</label>
                                        <div class="row">
                                            <div class="col-10">
                                            <input type="text"
                                                class="form-control @error('fourthTextColorOfAdmin') is-invalid @enderror"
                                                name="fourthTextColorOfAdmin" id="fourthTextColorOfAdmin"
                                                value="{{ old('fourthTextColorOfAdmin') }}" required aria-describedby="helpId"
                                                placeholder="">
                                            </div>
                                            <div class="col-2">
                                                <input type="color" class="border-0"
                                                onchange="document.getElementById('fourthTextColorOfAdmin').value = this.value"
                                                value=""
                                                style="width: 100%; height: 100%;"
                                                title="Choose your color">
                                            </div>
                                        </div>
                                        @error('fourthTextColorOfAdmin')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Upload Logo</label>
                                        <p><input type="file" accept="image/*" name="image" id="file"
                                                onchange="loadFile(event)" style="display: none;"></p>
                                        <p><label class="btn btn-primary" for="file" style="cursor: pointer;">Browse Image
                                            </label>
                                            <input style="border: 0px solid;" readonly type="text" name="pathOfImage"
                                                value="" id="pathOfImage">
                                        </p>
                                        <p><img id="showSelectedImage" name="showSelectedImage"
                                                src=""
                                                width="200" />
                                        </p>
                                        @error('passwordOfAdmin')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" disabled  class="btn btn-dark mt-3" value="Create"
                                        name="submitBtnOfAdmin" id="submitBtnOfAdmin" placeholder="">
                                        <a class="mt-3 btn btn-primary" href="/admin_dashboard/admins">Back</a>
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
