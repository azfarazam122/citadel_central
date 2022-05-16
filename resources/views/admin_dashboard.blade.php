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
                        <div class="form-group mt-2">
                            <input type="button" onclick="" class="btn btn-dark" value="submit" name="changePasswordBtn"
                                id="changePasswordBtn">

                            {{-- <a href="/admindashboard/changePassword/{{ $problem->id }}/edit"
                                class="btn btn-xs btn-info pull-right">Submit</a> --}}
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function name(params) {

        }
        axios.post("{{ route('/admindashboard/changePassword') }}", {
                newPassword: document.getElementById('newPassword').value,
            })
            .then(function(response) {
                console.log(response);
                // update_search_list(response);
            })
            .catch(function(error) {
                console.log(error);
            });
    </script>
@endsection
