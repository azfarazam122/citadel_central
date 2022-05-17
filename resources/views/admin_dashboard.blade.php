@extends('layouts.app')

@section('content')
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
@endsection
