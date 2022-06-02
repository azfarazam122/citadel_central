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
                        <h1 class="card-header text-center">{{ __('Admins') }}
                        </h1>
                        <div class="card-body">
                            <div class="container">
                                <form method="post" action="{{ route('createAdmin') }}">
                                    @csrf
                                    {{-- <input type="hidden" name="hiddenId" value=''  /> --}}
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
                                        <input type="submit" class="btn btn-dark mt-3" value="Create"
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
        $(document).ready(function() {

        });
    </script>
    <!-- Scripts -->
@endsection
