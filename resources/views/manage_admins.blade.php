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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@5/dark.css" />
@endsection
@section('content')
    <div class="height-100">
        <div class="">
            <div class="row overflow-auto ms-auto me-auto justify-content-center">
                <div class="col-md-11">
                    <div class="secondaryTextColor">
                        <h1 class="text-center">{{ __('Admins') }}
                        </h1>
                        <hr>
                        <div class="card-body">
                            <h3>Manage Admins</h3>
                            <div>
                                <a href="/admin_dashboard/create/admin" class="btn btn-dark mt-3 mb-3">Create New
                                    Admin</a>
                            </div>
                            <table id="adminsListTable" class="display dt-responsive">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>User Id</th>
                                        <th>Master Admin Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody id="adminsListTableBody">
                                     {{-- {{ $adminData[0]->email }} --}}

                                    @for ($i = 0; $i < count($adminData); $i++)
                                        <tr>
                                            <td>{{ $adminData[$i]->id }} </td>
                                            <td>{{ $adminData[$i]->user_id }} </td>
                                            <td>{{ $adminData[$i]->master_admin_id }} </td>
                                            <td>{{ $adminData[$i]->name }} </td>
                                            <td>{{ $adminData[$i]->email }} </td>
                                            <td>
                                                @php
                                                    $masterAdminData = App\Models\MasterSetting::all();
                                                @endphp
                                                @if ($masterAdminData[0]['default_admin_id'] == $adminData[$i]->id)
                                                    {{-- <a class="btn btn-success"
                                                        href="/admin_dashboard/admins/edit/{{ $adminData[$i]->user_id }}">Defaulted</a> --}}
                                                    <button type="button" disabled class="btn btn-success">Default Admin</button>
                                                @else
                                                    <a class="btn btn-primary" onclick="setAdminAsDefaultFunc({{$adminData[$i]->id}})"
                                                        {{-- href="/admin_dashboard/admins/edit/{{ $adminData[$i]->user_id }}" --}}
                                                        >Set As Default</a>
                                                @endif


                                                <a class="btn btn-dark"
                                                    href="/admin_dashboard/admins/edit/{{ $adminData[$i]->user_id }}">Edit Admin & Agents</a>
                                                <span class="">
                                                    <a class="btn btn-danger" onclick="deleteAdmin({{ $adminData[$i]->id }})">Delete</a>
                                                    <a class="btn btn-danger" onclick="deleteOnlyAdminRole({{ $adminData[$i]->id }})">Remove From Admin</a>
                                                </span>

                                            </td>
                                        </tr>
                                    @endfor

                                </tbody>
                            </table>
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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script>
        $(document).ready(function() {

            $('#adminsListTable').DataTable();

        });

        function deleteAdmin(userId) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
                })
                swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
                }).then((result) => {
                if (result.isConfirmed) {

                axios.post("{{ route('deleteAllRoles') }}", {
                    id: userId,
                })
                .then(function(response) {
                    debugger;
                    console.log(response);
                    swalWithBootstrapButtons.fire(
                        'Deleted!',
                        "Admin Including All It's role has been deleted.",
                        'success'
                    )
                })
                .catch(function(error) {
                    console.log(error.response);
                });

                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Admin is safe :)',
                    'error'
                    )
                }
            })

        }

        function deleteOnlyAdminRole(userId) {

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {

                axios.post("{{ route('deleteAdminRoleOnly') }}", {
                    id: userId,
                })
                .then(function(response) {
                    if (response.data == 'Successfully Deleted') {
                         Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Admin Contains Agents!'                        })
                    }
                })
                .catch(function(error) {
                    console.log(error.response);
                });


            }
            })




        }

        function setAdminAsDefaultFunc(admin_Id) {
            axios.post("{{ route('setAdminAsDefault') }}", {
                    id: admin_Id,
                })
                .then(function(response) {
                    console.log(response);
                    window.location.href = window.location.href
                })
                .catch(function(error) {
                    console.log(error.response);
                });
        }
    </script>
    <!-- Scripts -->
@endsection
