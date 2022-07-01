@extends('layouts.app')
{{-- ___________________________ --}}
{{-- SIDEBAR --}}
@section('sidebar')
    @include('layouts.sidebar')
@endsection
{{-- ___________________________ --}}

@section('libraries')
    <!-- Styles -->
@endsection
@section('content')
    <div class="container">
        <div class=" overflow-auto row justify-content-center">
            <div class="col-md-8">
                <div class="card secondaryTextColor">
                    <h1 class="text-center">{{ __('Change Password') }}
                    </h1>
                    <hr>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="newPassword">
                                New Password
                            </label>
                            <input type="password" class="form-control" name="newPassword" id="newPassword"
                                placeholder="Enter New Password">
                        </div>
                        <div>
                            <small id='outputOfPasswordChanged' style="display: none;"></small>
                        </div>
                        <div class="form-group mt-2">
                            <input type="button" onclick="changePasswordFunc()" class="btn btn-dark" value="submit"
                                name="changePasswordBtn" id="changePasswordBtn">
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
    <!-- Scripts -->
@endsection
