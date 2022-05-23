@extends('layouts.app')
@section('libraries')
    <!-- Styles -->
    <link href="{{ asset('css/masterSettings.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.css">
@endsection
@section('content')
    @include('layouts.sidebar')
    <div class="height-100 bg-light">
        <div class="">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <h1 class="card-header text-center">{{ __('Agent') }}
                        </h1>
                        <div class="card-body">
                            <div class="container">
                                <form method="post" action="{{ route('createAgent') }}">
                                    @csrf
                                    {{-- <input type="hidden" name="hiddenId" value=''  /> --}}
                                    <h3>Create Agent</h3>
                                    <div class="form-group">
                                        <label for="">Full Name</label>
                                        <input type="text"
                                            class="form-control @error('fullNameOfAgent') is-invalid @enderror"
                                            name="fullNameOfAgent" id="fullNameOfAgent"
                                            value="{{ old('fullNameOfAgent') }}" required aria-describedby="helpId"
                                            placeholder="">
                                        @error('fullNameOfAgent')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">License No</label>
                                        <input type="text"
                                            class="form-control @error('licenseNoOfAgent') is-invalid @enderror"
                                            name="licenseNoOfAgent" id="licenseNoOfAgent"
                                            value="{{ old('licenseNoOfAgent') }}" required aria-describedby="helpId"
                                            placeholder="">
                                        @error('licenseNoOfAgent')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Phone</label>
                                        <input type="text" class="form-control @error('phoneOfAgent') is-invalid @enderror"
                                            name="phoneOfAgent" id="phoneOfAgent" value="{{ old('phoneOfAgent') }}"
                                            required aria-describedby="helpId" placeholder="">
                                        @error('phoneOfAgent')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="">Facebook Link</label>
                                        <input type="text"
                                            class="form-control @error('facebookLinkOfAgent') is-invalid @enderror"
                                            name="facebookLinkOfAgent" id="facebookLinkOfAgent"
                                            value="{{ old('facebookLinkOfAgent') }}" required aria-describedby="helpId"
                                            placeholder="">
                                        @error('facebookLinkOfAgent')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Linkedin Link</label>
                                        <input type="text"
                                            class="form-control @error('linkedinLinkOfAgent') is-invalid @enderror"
                                            name="linkedinLinkOfAgent" id="linkedinLinkOfAgent"
                                            value="{{ old('linkedinLinkOfAgent') }}" required aria-describedby="helpId"
                                            placeholder="">
                                        @error('linkedinLinkOfAgent')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Instagram Link</label>
                                        <input type="text"
                                            class="form-control @error('instagramLinkOfAgent') is-invalid @enderror"
                                            name="instagramLinkOfAgent" id="instagramLinkOfAgent"
                                            value="{{ old('instagramLinkOfAgent') }}" required aria-describedby="helpId"
                                            placeholder="">
                                        @error('instagramLinkOfAgent')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Twitter Link</label>
                                        <input type="text"
                                            class="form-control @error('twitterLinkOfAgent') is-invalid @enderror"
                                            name="twitterLinkOfAgent" id="twitterLinkOfAgent"
                                            value="{{ old('twitterLinkOfAgent') }}" required aria-describedby="helpId"
                                            placeholder="">
                                        @error('twitterLinkOfAgent')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Profile Pic</label>
                                        <input type="text"
                                            class="form-control @error('profilePicOfAgent') is-invalid @enderror"
                                            name="profilePicOfAgent" id="profilePicOfAgent"
                                            value="{{ old('profilePicOfAgent') }}" required aria-describedby="helpId"
                                            placeholder="">
                                        @error('profilePicOfAgent')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input disabled type="submit" class="btn btn-dark mt-3" value="Create"
                                            name="submitBtnOfAgent" id="submitBtnOfAgent" placeholder="">
                                        <a class="mt-3 btn btn-primary" href="/admin_dashboard/agents">Back</a>
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
        $(document).ready(function() {

            // $(".nav_list")[0].children[index].addClass('active');
            $(".nav_link").removeClass("active");
            $(".nav_link:nth-child(2)").addClass("active");
        });
    </script>
    <!-- Scripts -->
@endsection
