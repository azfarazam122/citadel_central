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
                         <h1 class="card-header text-center">{{('Edit Admin Settings') }}</h1>
                        <div class="card-body">
                            <div class="container">
                                <form method="post" action="{{ route('updateAdminData') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="hiddenId" value="123" />
                                    {{-- <h3>{{ $adminData[0]->license_no }}</h3> --}}
                                    <div class="form-group">
                                        <label for="">Id</label>
                                        <input type="text" readonly class="form-control" name="id_OfAdminSetting" id="id_OfAdminSetting"
                                            value="{{ $adminData[0]->id }}" aria-describedby="helpId">
                                    </div>
                                    <div class="form-group">
                                        <label for="">User Id</label>
                                        <input type="text" readonly class="form-control" name="userId_OfAdminSetting" id="userId_OfAdminSetting"
                                            value="{{ $adminData[0]->user_id }}" aria-describedby="helpId">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Master Admin Id</label>
                                        <input type="text" readonly class="form-control" name="masterAdminid_OfAdminSetting" id="masterAdminid_OfAdminSetting"
                                            value="{{ $adminData[0]->master_admin_id }}" aria-describedby="helpId">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" readonly  class="form-control" name="email_OfAdminSetting" id="email_OfAdminSetting"
                                            value="{{ $adminData[0]->email }}" aria-describedby="helpId">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text"  class="form-control" name="name_OfAdminSetting" id="name_OfAdminSetting"
                                            value="{{ $adminData[0]->name }}" aria-describedby="helpId">
                                    </div>


                                    <div class="form-group">
                                        <label for="">Primary Color</label>
                                        <div class="row">
                                            <div class="col-10">
                                                <input type="text"  class="form-control" name="primaryColorOfAdminSetting"
                                                id="primaryColorOfAdminSetting" value="{{ $adminData[0]->primary_color }}"
                                                aria-describedby="helpId">
                                            </div>
                                            <div class="col-2">
                                                <input type="color" class="border-0"
                                                onchange="document.getElementById('primaryColorOfAdminSetting').value = this.value"
                                                value="{{ $adminData[0]->primary_color }}"
                                                style="width: 100%; height: 100%;"
                                                title="Choose your color">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="">Secondary Color</label>
                                        <div class="row">
                                            <div class="col-10">
                                            <input type="text" class="form-control" name="secondaryColorOfAdminSetting"
                                                id="secondaryColorOfAdminSetting" value="{{ $adminData[0]->secondary_color }}"
                                                aria-describedby="helpId">
                                            </div>
                                            <div class="col-2">
                                                <input type="color" class="border-0"
                                                onchange="document.getElementById('secondaryColorOfAdminSetting').value = this.value"
                                                value="{{ $adminData[0]->secondary_color }}"
                                                style="width: 100%; height: 100%;"
                                                title="Choose your color">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Tertiary Color</label>
                                          <div class="row">
                                            <div class="col-10">
                                            <input type="text" class="form-control" name="tertiaryColorOfAdminSetting"
                                            id="tertiaryColorOfAdminSetting" value="{{ $adminData[0]->tertiary_color }}"
                                            aria-describedby="helpId">
                                            </div>
                                            <div class="col-2">
                                            <input type="color" class="border-0"
                                                onchange="document.getElementById('tertiaryColorOfAdminSetting').value = this.value"
                                                value="{{ $adminData[0]->tertiary_color }}"
                                                style="width: 100%; height: 100%;"
                                                title="Choose your color">
                                            </div>

                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Primary Text Color</label>
                                        <div class="row">
                                            <div class="col-10">
                                                <input type="text" class="form-control" name="primaryTextColorOfAdminSetting"
                                                    id="primaryTextColorOfAdminSetting" value="{{ $adminData[0]->primary_text_color }}"
                                                    aria-describedby="helpId" placeholder="">
                                            </div>
                                            <div class="col-2">
                                                <input type="color" class="border-0"
                                                    onchange="document.getElementById('primaryTextColorOfAdminSetting').value = this.value"
                                                    value="{{ $adminData[0]->primary_text_color }}"
                                                    style="width: 100%; height: 100%;"
                                                    title="Choose your color">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Secondary Text Color</label>

                                            <div class="row">
                                                <div class="col-10">
                                                    <input type="text" class="form-control" name="secondaryTextColorOfAdminSetting"
                                                    id="secondaryTextColorOfAdminSetting" value="{{ $adminData[0]->secondary_text_color }}"
                                                    aria-describedby="helpId" placeholder="">
                                                </div>
                                                <div class="col-2">
                                                    <input type="color" class="border-0"
                                                    onchange="document.getElementById('secondaryTextColorOfAdminSetting').value = this.value"
                                                    value="{{ $adminData[0]->secondary_text_color }}"
                                                    style="width: 100%; height: 100%;"
                                                    title="Choose your color">
                                                </div>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="">Tertiary Text Color</label>
                                            <div class="row">
                                                <div class="col-10">
                                                    <input type="text" class="form-control" name="tertiaryTextColorOfAdminSetting"
                                                    id="tertiaryTextColorOfAdminSetting" value="{{ $adminData[0]->tertiary_text_color }}"
                                                    aria-describedby="helpId" placeholder="">
                                                </div>
                                                <div class="col-2">
                                                    <input type="color" class="border-0"
                                                    onchange="document.getElementById('tertiaryTextColorOfAdminSetting').value = this.value"
                                                    value="{{ $adminData[0]->tertiary_text_color }}"
                                                    style="width: 100%; height: 100%;"
                                                    title="Choose your color">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Fourth Text Color</label>
                                            <div class="row">
                                                <div class="col-10">
                                                    <input type="text" class="form-control" name="fourthTextColorOfAdminSetting"
                                                    id="fourthTextColorOfAdminSetting" value="{{ $adminData[0]->fourth_text_color }}"
                                                    aria-describedby="helpId" placeholder="">
                                                </div>
                                                  <div class="col-2">
                                                    <input type="color" class="border-0"
                                                    onchange="document.getElementById('fourthTextColorOfAdminSetting').value = this.value"
                                                    value="{{ $adminData[0]->fourth_text_color }}"
                                                    style="width: 100%; height: 100%;"
                                                    title="Choose your color">
                                                </div>
                                            </div>
                                    </div>

                                    <div class="form-group mt-3">
                                        <label for="">Logo</label>
                                        {{-- ___________________________ --}}
                                        <p><input type="file" accept="image/*" name="image" id="file"
                                                onchange="loadFile(event)" style="display: none;"></p>
                                        <p><label class="btn btn-primary" for="file" style="cursor: pointer;">Upload Image
                                            </label>
                                            <input style="border: 0px solid;" readonly type="text" name="pathOfImage"
                                                value="{{ $adminData[0]->logo }}" id="pathOfImage">
                                        </p>
                                        <p><img id="showSelectedImage" name="showSelectedImage"
                                                src="../../../images/adminSettingPic/{{$adminData[0]->email}}/{{$adminData[0]->logo}}"
                                                width="200" />
                                        </p>

                                        {{-- ___________________________ --}}

                                    </div>




                                    <div class="form-group">
                                        <input type="submit" class="btn btn-dark mt-3" value="Update" name="updateAgent"
                                            id="updateAgent" aria-describedby="helpId" placeholder="">
                                        <a class="mt-3 btn btn-primary" href="/admin_dashboard/admins">Back</a>
                                    </div>
                                </form>

                                    <div class="mt-5">

                                        @isset($agentData)
                                            <hr>
                                            <div class="text-center">
                                                <h1>Agents Assign To That Admin</h1>
                                            </div>
                                            <table id="agentsListTable" class="display mr-5">
                                                <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>User Id</th>
                                                        <th>Admin Id</th>
                                                        <th>Full Name</th>
                                                        <th>License No</th>
                                                        <th>Phone</th>
                                                        {{-- <th>Facebook Link</th>
                                                        <th>Linkedin Link</th> --}}
                                                        {{-- <th>Instagram Link</th>
                                                        <th>Twitter Link</th> --}}
                                                        <th>Profile Pic </th>
                                                        <th>Edit </th>
                                                    </tr>
                                                </thead>
                                                <tbody id="agentsListTableBody">
                                                    @for ($i = 0; $i < count($agentData); $i++)
                                                        <tr>
                                                            <td>{{ $agentData[$i]->id }} </td>
                                                            <td>{{ $agentData[$i]->user_id }} </td>
                                                            <td>{{ $agentData[$i]->admin_id }} </td>
                                                            <td>{{ $agentData[$i]->full_name }} </td>
                                                            <td>{{ $agentData[$i]->license_no }} </td>
                                                            <td>{{ $agentData[$i]->phone }} </td>
                                                            {{-- <td>{{ $agentData[$i]->facebook_link }} </td>
                                                            <td>{{ $agentData[$i]->linkedin_link }} </td> --}}
                                                            {{-- <td>{{ $agentData[$i]->instagram_link }} </td>
                                                            <td>{{ $agentData[$i]->twitter_link }} </td> --}}
                                                            <td>
                                                                <img style="border-radius: 50px;border: 4px solid black;" width="100px"
                                                                    src="../../../images/profile_pic/{{$agentData[$i]->email}}/{{ $agentData[$i]->profile_pic }}"
                                                                    alt="Profile Pic " srcset="">

                                                            </td>
                                                            <td class="me-5">
                                                                @php
                                                                    $masterAdminData = App\Models\MasterSetting::all();
                                                                @endphp

                                                                @if ($agentData[$i]->is_approved == 'true')
                                                                    {{-- <button type="button"  class="btn btn-success">Approved</button> --}}
                                                                    <a class="btn btn-success"
                                                                        onclick="setAgentAsUnApprovedFunc({{$agentData[$i]->id}})">Approved</a>
                                                                @else
                                                                    <a class="btn btn-primary"
                                                                        onclick="setAgentAsApprovedFunc({{$agentData[$i]->id}})">Unapproved</a>
                                                                @endif

                                                                @if ($masterAdminData[0]->default_agent_id == $agentData[$i]->id)
                                                                    <button type="button" disabled class="btn btn-success">Default Agent</button>
                                                                @else
                                                                    <a class="btn btn-primary"
                                                                        onclick="setAgentAsDefaultFunc({{$agentData[$i]->id}})">Set As Default</a>
                                                                @endif
                                                                <a disable class="btn btn-secondary"
                                                                    href="/admin_dashboard/agents/details/{{ $agentData[$i]->id }}">All
                                                                    Details</a>
                                                                <a class="mt-1 btn btn-dark"
                                                                    href="/admin_dashboard/agents/edit/{{ $agentData[$i]->id }}">Edit</a>
                                                                <a class="mt-1 btn btn-danger"
                                                                    href="/admin_dashboard/agents/delete/{{ $agentData[$i]->id }}">Delete</a>

                                                            </td>
                                                        </tr>
                                                    @endfor

                                                </tbody>
                                            </table>
                                        @endisset

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
        var path;
        var image;
        $(document).ready(function() {
                $('#agentsListTable').DataTable();
        });

        var loadFile = function(event) {
            image = document.getElementById('showSelectedImage');
            document.getElementById('pathOfImage').value = event.target.files[0].name;
            image.src = URL.createObjectURL(event.target.files[0]);
        };


        function setAgentAsDefaultFunc(admin_Id) {
            axios.post("{{ route('setAgentAsDefault') }}", {
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
         function setAgentAsApprovedFunc(agent_Id) {
            axios.post("{{ route('setAgentAsApproved') }}", {
                    id: agent_Id,
                })
                .then(function(response) {
                    console.log(response);
                    window.location.href = window.location.href
                })
                .catch(function(error) {
                    console.log(error.response);
                });
        }
        function setAgentAsUnApprovedFunc(agent_Id) {
            axios.post("{{ route('setAgentAsUnApproved') }}", {
                    id: agent_Id,
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
