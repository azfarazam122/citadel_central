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
                        <h1 class="card-header text-center">{{ __('Admins') }}
                        </h1>
                        <div class="card-body">
                            <h3>Manage Admins</h3>
                            <div>
                                <a href="" class="btn btn-dark mt-3 mb-3"> Create New Admin</a>
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
                                                <a class="btn btn-dark"
                                                    href="/admin_dashboard/admins/edit/{{ $userData[$i][0]->id }}">Edit</a>
                                                <a class="btn btn-danger"
                                                    href="/admin_dashboard/admins/delete/{{ $userData[$i][0]->id }}">Delete</a>
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
    <script>
        $(document).ready(function() {

            // $(".nav_list")[0].children[index].addClass('active');
            $(".nav_link").removeClass("active");
            $(".nav_link:nth-child(2)").addClass("active");
            $('#adminsListTable').DataTable();
        });

        // function deleteTableRow(rowUserId) {
        //     let deleteAdminPageUrl = '/admin_dashboard/admins/delete/' + rowUserId;
        //     window.location.href = deleteAdminPageUrl;
        // }
    </script>
    <!-- Scripts -->
@endsection
