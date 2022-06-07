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
                        <h1 class="card-header text-center">{{ __('User') }}
                        </h1>
                        <div class="card-body">
                            <div class="container">
                                <form method="post" action="{{ route('updateUserData') }}">
                                    @csrf
                                    <input type="hidden" name="hiddenId" value={{ $userData[0]->id }} />
                                    <h3>Edit User</h3>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control" name="editName" id="editName"
                                            value={{ $userData[0]->email }} aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" disabled class="btn btn-dark mt-3" value="Update"
                                            name="updateAdmin" id="updateAdmin" aria-describedby="helpId" placeholder="">
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
