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
            <div class="row overflow-auto justify-content-center">
                <div class="col-md-8">
                    <div class=" secondaryTextColor">
                        <h1 class="text-center">{{ __('User') }}</h1>
                        <hr>
                        <div class="card-body">
                            <div class="container">
                                <form method="post" action="{{ route('createUser') }}">
                                    @csrf
                                    {{-- <input type="hidden" name="hiddenId" value=''  /> --}}
                                    <h3>Create User</h3>
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control @error('nameOfUser') is-invalid @enderror"
                                            name="nameOfUser" id="nameOfUser" value="{{ old('nameOfUser') }}" required
                                            aria-describedby="helpId" placeholder="">
                                        @error('nameOfUser')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control @error('emailOfUser') is-invalid @enderror"
                                            name="emailOfUser" id="emailOfUser" value="{{ old('emailOfUser') }}" required
                                            aria-describedby="helpId" placeholder="">
                                        @error('emailOfUser')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password"
                                            class="form-control @error('passwordOfUser') is-invalid @enderror"
                                            name="passwordOfUser" id="passwordOfUser" value="{{ old('passwordOfUser') }}"
                                            required aria-describedby="helpId" placeholder="">
                                        @error('passwordOfUser')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input disabled type="submit" class="btn btn-dark mt-3" value="Create"
                                            name="submitBtnOfUser" id="submitBtnOfUser" placeholder="">
                                        <a class="mt-3 btn btn-primary" href="/admin_dashboard/users">Back</a>
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
