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
                        <h1 class="card-header text-center">{{ __('Admins') }}
                        </h1>
                        <div class="card-body">
                            <div class="container">
                                <form method="put" action="{{ route('manage_admin_resource.update') }}"></form>
                                <h3>Edit Admins</h3>
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="editName" id="editName"
                                        aria-describedby="helpId" placeholder="">
                                </div>
                                <div class="form-group">
                                    <input type="button" onclick="updateAdminFunc()" class="btn btn-dark mt-3"
                                        value="Update" name="updateAdmin" id="updateAdmin" aria-describedby="helpId"
                                        placeholder="">
                                </div>
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

        function updateAdminFunc() {
            // debugger;
            // var id = 12;
            // var myStr = "{{ route('manage_admin_resource.update', '" + id + "') }}";
            // axios.put(myStr, {
            //         // newPassword: document.getElementById('newPassword').value,
            //     })
            //     .then(function(response) {
            //         // generateAdminListTable(response.data)
            //         console.log(response);
            //     })
            //     .catch(function(error) {
            //         console.log(error.response);
            //     });


        }
    </script>
    <!-- Scripts -->
@endsection
