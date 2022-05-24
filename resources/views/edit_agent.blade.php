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
                        <h1 class="card-header text-center">{{ __('Agent') }}
                        </h1>
                        <div class="card-body">
                            <div class="container">
                                <form method="post" action="{{ route('updateAgentData') }}">
                                    @csrf
                                    <input type="hidden" name="hiddenId" value={{ $agentData[0]->id }} />
                                    <h3>Edit Agent</h3>
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control" name="editNameOfAgent" id="editNameOfAgent"
                                            value={{ $agentData[0]->full_name }} aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">License No</label>
                                        <input type="text" class="form-control" name="editLicenseNoOfAgent"
                                            id="editLicenseNoOfAgent" value={{ $agentData[0]->license_no }}
                                            aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Phone</label>
                                        <input type="text" class="form-control" name="editPhoneOfAgent"
                                            id="editPhoneOfAgent" value={{ $agentData[0]->phone }}
                                            aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Facebook Link</label>
                                        <input type="text" class="form-control" name="editFacebookLinkOfAgent"
                                            id="editFacebookLinkOfAgent" value={{ $agentData[0]->facebook_link }}
                                            aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Linked Link</label>
                                        <input type="text" class="form-control" name="editLinkedinLinkOfAgent"
                                            id="editLinkedinLinkOfAgent" value={{ $agentData[0]->linkedin_link }}
                                            aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Instagram Link</label>
                                        <input type="text" class="form-control" name="editInstagramLinkOfAgent"
                                            id="editInstagramLinkOfAgent" value={{ $agentData[0]->instagram_link }}
                                            aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Twitter Link</label>
                                        <input type="text" class="form-control" name="editTwitterLinkOfAgent"
                                            id="editTwitterLinkOfAgent" value={{ $agentData[0]->twitter_link }}
                                            aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Profile Pic</label>
                                        {{-- ___________________________ --}}
                                        <p><input type="file" accept="image/*" name="image" id="file"
                                                onchange="loadFile(event)" style="display: none;"></p>
                                        <p><label class="btn btn-primary" for="file" style="cursor: pointer;">Upload Image
                                            </label> <span id="pathOfImage"> </span> </p>
                                        <p><img id="output" width="200" />
                                        </p>
                                        {{-- ___________________________ --}}

                                    </div>
                                    <div class="form-group">
                                        <input type="submit" disabled class="btn btn-dark mt-3" value="Update"
                                            name="updateAgent" id="updateAgent" aria-describedby="helpId" placeholder="">
                                        <a class="mt-3 btn btn-primary" href="/admin_dashboard/agents">Back</a>
                                    </div>
                                </form>
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
            image = document.getElementById('output');
            path = "<?php echo $agentData[0]->profile_pic; ?>"
            image.src = "../../" + path;
            let fileName = path.split('/');
            fileName = fileName[fileName.length - 1];
            document.getElementById('pathOfImage').innerHTML = fileName;
            // $(".nav_list")[0].children[index].addClass('active');
            $(".nav_link").removeClass("active");
            $(".nav_link:nth-child(2)").addClass("active");
        });

        var loadFile = function(event) {
            debugger;
            document.getElementById('pathOfImage').innerHTML = event.target.files[0].name;
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
    <!-- Scripts -->
@endsection
