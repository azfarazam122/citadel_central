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
                <div class="col-md-11">
                    <div class="card">
                        <h1 class="card-header text-center">{{ __('Users') }}
                        </h1>
                        <div class="card-body">
                            <h3>Manage Users</h3>
                            <div>
                                <a href="/admin_dashboard/users/create" class="btn btn-dark mt-3 mb-3">Create New
                                    User</a>
                            </div>
                            <table id="usersListTable" class="display">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody id="usersListTableBody">
                                    {{-- {{ $userData }} --}}
                                    {{-- {{ $userData[0][0]->id }}
                                        <br>
                                        {{ $userData[1][0]->id }} --}}
                                    @for ($i = 0; $i < count($userData); $i++)
                                        <tr>
                                            <td>{{ $userData[$i]->id }} </td>
                                            <td>{{ $userData[$i]->email }} </td>
                                            <td>{{ $userData[$i]->role }} </td>
                                            @if ($userData[$i]->role == 'Master Admin' || $userData[$i]->role == 'Super Admin')
                                                <td>This Specific User Can't be Edit / Delete</td>
                                            @else
                                                <td>
                                                    <a class="btn btn-secondary"
                                                        href="/admin_dashboard/users/{{ $userData[$i]->id }}">Details</a>
                                                    <a class="btn btn-dark"
                                                        href="/admin_dashboard/users/edit/{{ $userData[$i]->id }}">Edit</a>
                                                    <a class="btn btn-danger"
                                                        href="/admin_dashboard/users/delete/{{ $userData[$i]->id }}">Delete</a>

                                                </td>
                                            @endif


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
    <script>
        $(document).ready(function() {

            // $(".nav_list")[0].children[index].addClass('active');
            $(".nav_link").removeClass("active");
            $(".nav_link:nth-child(2)").addClass("active");
            $('#usersListTable').DataTable();
        });

        // function deleteTableRow(rowUserId) {
        //     let deleteAdminPageUrl = '/admin_dashboard/admins/delete/' + rowUserId;
        //     window.location.href = deleteAdminPageUrl;
        // }
    </script>
    <!-- Scripts -->
@endsection