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
            getAdminListFunc();
        });

        function getAdminListFunc() {
            axios.post("{{ route('manage_admin_resource.index') }}", {
                    // newPassword: document.getElementById('newPassword').value,
                })
                .then(function(response) {
                    generateAdminListTable(response.data)
                    // console.log(response);
                })
                .catch(function(error) {
                    // console.log(error.response);
                    alert(error.response.data);
                });
        }

        function generateAdminListTable(adminData) {
            var tableBody = document.getElementById('adminsListTableBody');
            tableBody.style.width = '100%';

            for (var i = 0; i < adminData.length; i++) {
                tr = document.createElement('tr');
                // for (let index = 0; index < 3; index++) {
                var td1 = document.createElement('td');
                td1.innerHTML = adminData[i][0].id
                tr.appendChild(td1);

                var td2 = document.createElement('td');
                let name = adminData[i][0].email;
                name = name.split('@');
                td2.innerHTML = name[0]
                tr.appendChild(td2);

                var td3 = document.createElement('td');
                td3.innerHTML = adminData[i][0].email
                tr.appendChild(td3);

                var td4 = document.createElement('td');
                var editButton = document.createElement('button');
                editButton.type = 'button';
                editButton.innerHTML = 'Edit';
                editButton.classList = 'btn btn-dark m-1';
                editButton.setAttribute('onclick', 'editTableRow(' + adminData[i][0].id + ')');
                // tr.appendChild();
                var deleteButton = document.createElement('button');
                deleteButton.type = 'button';
                deleteButton.innerHTML = 'Delete';
                deleteButton.classList = 'btn btn-dark m-1';
                deleteButton.setAttribute('onclick', 'deleteTableRow(' + adminData[i][0].id + ')');
                // _____________
                td4.appendChild(editButton);
                td4.appendChild(deleteButton);
                tr.appendChild(td4);



                tableBody.appendChild(tr);
            }

            $('#adminsListTable').DataTable();

        }

        function editTableRow(rowUserId) {
            // console.log(a + " " + b);
            let editAdminPageUrl = window.location.href + '/edit/' + rowUserId;
            console.log(editAdminPageUrl);
        }

        function deleteTableRow(rowUserId) {
            console.log(a + " " + b);

        }
    </script>
    <!-- Scripts -->
@endsection
