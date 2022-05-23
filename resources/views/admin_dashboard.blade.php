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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h1 class="card-header text-center">{{ __('Admin Dashboard') }}
                    </h1>

                    <div class="card-body">
                        <h3>Change Password</h3>
                        <div class="form-group mt-4">
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
    <script>
        $(document).ready(function() {

            // $(".nav_list")[0].children[index].addClass('active');
            $(".nav_link").removeClass("active");
            $(".nav_link:nth-child(1)").addClass("active");
        });
    </script>

    <script>
        function changePasswordFunc() {
            axios.post("{{ route('changePasswordOfUser') }}", {
                    newPassword: document.getElementById('newPassword').value,
                })
                .then(function(response) {
                    if (response.data == 'Password Updated Successfully') {
                        // $('#outputOfPasswordChanged').val = response.data;
                        document.getElementById('outputOfPasswordChanged').innerHTML = response.data;
                        document.getElementById('outputOfPasswordChanged').style.display = "";
                        setTimeout(function() {
                            document.getElementById('outputOfPasswordChanged').style.display = "none";
                            document.getElementById('newPassword').value = "";

                        }, 1500);
                    }
                    console.log(response);
                    // update_search_list(response);
                })
                .catch(function(error) {
                    console.log(error.response);
                });
        }
    </script>
    <!-- Scripts -->
@endsection
