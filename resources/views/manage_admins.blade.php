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
            <div class="row ms-auto me-auto justify-content-center">
                <div class="col-md-11">
                    <div class="card">
                        <h1 class="card-header text-center">{{ __('Admins') }}
                        </h1>
                        <div class="card-body">
                            <h3>Manage Admins</h3>
                            <div>
                                <a href="/admin_dashboard/create/admin" class="btn btn-dark mt-3 mb-3">Create New
                                    Admin</a>
                            </div>
                            <table id="adminsListTable" class="display">
                                <thead>
                                    <tr>
                                        <th>User Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody id="adminsListTableBody">
                                    {{-- {{ $adminData }} --}}
                                    {{-- {{ $userData[0][0]->id }}
                                        <br>
                                        {{ $userData[1][0]->id }} --}}
                                    @for ($i = 0; $i < count($adminData); $i++)
                                        <tr>
                                            <td>{{ $userData[$i][0]->id }} </td>
                                            <td>{{ $adminData[$i]->name }} </td>
                                            <td>{{ $userData[$i][0]->email }} </td>
                                            <td>
                                                <a class="btn btn-secondary"
                                                    href="/admin_dashboard/admins/{{ $userData[$i][0]->id }}">Details</a>
                                                <a class="btn btn-dark"
                                                    href="/admin_dashboard/admins/edit/{{ $userData[$i][0]->id }}">Edit</a>
                                                <a class="btn btn-danger" onclick="deleteAdmin({{ $userData[$i][0]->id }})">Delete</a>

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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

                axios.post("{{ route('deleteAdminData') }}", {
                    id: userId,
                })
                .then(function(response) {
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
    </script>
    <!-- Scripts -->
@endsection
