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
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@5/dark.css" />
    <style>
        .container {
            display: none;
        }

        .preload {
            width: 100px;
            height: 100px;
            position: fixed;
            top: 50%;
            left: 50%;
        }

        .dynamicImagesFlexContainer {
            display: flex;
            flex-wrap: wrap;
        }

        .dynamicImagesFlexContainer>div {
            background-color: #f1f1f1;
            width: 190px;
            height: 250px;
            margin: 0px 0px 10px 10px;
            text-align: center;
            line-height: 75px;
            border-radius: 7px;
            font-size: 30px;
            border: 1px solid #e4e4e5;
        }

        .dynamicImagesFlexContainer>div:hover {
            border: 1px solid;
        }

        .swal2-popup {
            width: 750px !important;
        }

        .note-group-select-from-files {
            display: none;
        }

        input[type="file"] {
            display: none;
        }

        .custom-file-upload {
            border: 1px solid #ccc;
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
        }

        #mainDivOfEachCommonImage {
            margin: 10px;
        }
    </style>
@endsection
@section('content')
    <div class="preload"><img src="../../images/loader.gif">
    </div>
    <div class="container">
        <div class="overflow-auto row justify-content-center">
            <div class="col-md-12">
                <div class=" secondaryTextColor">
                    <p class="display-3 text-center">{{ __('Home Page Editor') }}
                    </p>
                    <hr>
                    <div class="card-body">
                        <div class="container mt-2 mb-5">
                            <p class="text-center display-5">Widgets Info <i class="fa-solid fa-circle-info"></i> </p>
                            <div class="border ">
                                <p class="lead text-center my-3">
                                    These are the Dynamic data . You Can use this data like this [[ name ]] in the Below
                                    Editable Portion
                                </p>
                                <div>
                                    @php
                                        $widgetsData = App\Models\Widget::where('page_id', '1')->get();
                                    @endphp
                                    <table id="widgetsDataTable" class="display">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Widget Name</th>
                                                <th>Widget Type</th>
                                            </tr>
                                        </thead>
                                        <tbody id="widgetsDataTableBody">
                                            @for ($i = 0; $i < count($widgetsData); $i++)
                                                <tr>
                                                    <td>{{ $widgetsData[$i]->id }}</td>
                                                    <td>{{ $widgetsData[$i]->name }}</td>
                                                    <td class="lead">{{ $widgetsData[$i]->type }}</td>
                                                </tr>
                                            @endfor
                                        </tbody>
                                    </table>
                                </div>
                                {{-- <ol class="">
                                    <li>[[How_to_Collect_Your_Miles_Today_Button]]</li>
                                </ol> --}}
                            </div>

                        </div>

                        <div class="container mt-2 mb-5">
                            <p class="text-center display-5">Common Images <i class="fa-solid fa-circle-info"></i>
                            </p>
                            <div class="border ">
                                <p class="lead  my-3">
                                    These are the Dynamic Images . You Can use these Images like this
                                </p>
                                <div class="lead">
                                    <ol>
                                        <li>Click on this Icon
                                            <span>
                                                <i style="font-size: 25px;transform: scaleX(-1);" class='bx bx-image'></i>
                                            </span>
                                            in the Editor Below
                                        </li>
                                        <li>Enter the Url from this Image in the Url Portion</li>
                                    </ol>
                                </div>

                                {{-- Common Images --}}
                                <div id="paginationMainDivForCommonImages">
                                    @include('pagination.common_images')
                                </div>
                            </div>

                        </div>

                        <div class="container mt-2 mb-5">
                            <p class="text-center display-5">Agent Custom Images <i class="fa-solid fa-circle-info"></i>
                            </p>
                            <div class="border ">
                                <p class="lead  my-3">
                                    These are the Dynamic Images . You Can use these Images like this
                                </p>
                                <div class="lead">
                                    <ol>
                                        <li>Click on this Icon
                                            <span>
                                                <i style="font-size: 25px;transform: scaleX(-1);" class='bx bx-image'></i>
                                            </span>
                                            in the Editor Below
                                        </li>
                                        <li>Enter the Url from this Image in the Url Portion</li>
                                    </ol>
                                </div>

                                {{-- Agent Custom Images --}}
                                <div id="paginationMainDivForAgentImages">
                                    @include('pagination.agent_custom_images')
                                </div>
                            </div>

                        </div>


                        <div class="container mt-2 mb-5">
                            <p class="text-center display-5"> Content</p>
                            @php
                                $agentLoggedIn = Auth::user();
                                $agentData = App\Models\Agent::where('user_id', $agentLoggedIn->id)->get();
                                $agentData[0]['email'] = $agentLoggedIn->email;
                                $agentHomePageData = App\Models\AgentPageStaging::where('agent_id', $agentData[0]->id)
                                    ->where('page_id', 1)
                                    ->first();
                            @endphp
                            <textarea style="width: 100%;" class="col-md-12 mt-2" id="homePageTemplate">
                                {{ $agentHomePageData->data }}
                            </textarea>
                            <div class="mt-4 text-center">
                                <a class="btn mt-1 homeButtons" style="background: var(--primary-color)"
                                    onclick="saveHomePageData({{ $agentHomePageData->page_id }})">Save Home Page
                                    Content</a>
                                <a class="btn mt-1 homeButtons" style="background: var(--primary-color)"
                                    onclick="submitForApprovalOfHomePage({{ $agentHomePageData->page_id }})">Submit For
                                    Approval</a>
                                <a class="btn mt-1 homeButtons btn-primary"
                                    onclick="setHomeDefaultPage({{ $agentHomePageData->page_id }})">Default Home
                                    Page</a>
                                <a class="mt-1 btn btn-dark" target="blank"
                                    href="/admin_dashboard/agent/{{ $agentHomePageData->page_id }}/view/{{ $agentData[0]->email }}">View
                                    Page</a>
                            </div>
                            <div class="mt-4">
                                <div class="my-1">
                                    @if ($agentHomePageData->is_approved == 1)
                                        <span class="bg-success lead p-2"
                                            style="color: white;border-radius:7px;">Approved</span>
                                    @elseif ($agentHomePageData->is_approved == 0 && $agentHomePageData->is_submitted_for_approval == 0)
                                        <span class="bg-danger lead p-2"
                                            style="color: white;border-radius:7px;">Disapproved</span>
                                        <p class="lead mb-0 mt-3">Reason For Disapproval</p>
                                        <textarea class="mt-0" name="reasonForDisapprovalHomePage" id="reasonForDisapprovalHomePage" readonly rows="6"
                                            style="width: 100%; border-radius: 7px;">{{ $agentHomePageData->reason_for_disapproval }}
                                        </textarea>
                                    @elseif ($agentHomePageData->is_approved == 0 && $agentHomePageData->is_submitted_for_approval == 1)
                                        <span class="bg-secondary lead p-2"
                                            style="color: white;border-radius:7px;">Submitted
                                            For Approval</span>
                                    @endif

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
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script>
        var homePageEditor;
        $(document).ready(function() {
            $(".preload").fadeOut(2000, function() {
                $(".container").fadeIn(1000);
            });
            $('#widgetsDataTable').DataTable();
            homePageEditor = $('#homePageTemplate').summernote({
                height: 500,
            });

        });


        function saveHomePageData(page_id) {
            axios.post("{{ route('saveEditorSubPageDataByAgent') }}", {
                    newData: homePageEditor[0].value,
                    current_page_id: page_id,
                })
                .then(function(response) {
                    console.log(response);
                    if (response.data == "Saved") {
                        Swal.fire(
                            'Saved!',
                            "Content For Home Page Saved Successfully",
                            'success'
                        )
                    }
                })
                .catch(function(error) {
                    console.log(error.response);
                });
        }

        function submitForApprovalOfHomePage(page_id) {
            axios.post("{{ route('submitPagesEditorSubPageForApprovalByAgent') }}", {
                    current_page_id: page_id,
                })
                .then(function(response) {
                    console.log(response);
                    window.location.href = window.location.href
                })
                .catch(function(error) {
                    console.log(error.response);
                });
        }

        function setHomeDefaultPage(pageId) {
            axios.post("{{ route('setAsDefaultPageInPagesEditorViewByAgent') }}", {
                    current_page_id: pageId,
                })
                .then(function(response) {
                    console.log(response);
                    $("#homePageTemplate").summernote('code', response.data);
                    Swal.fire(
                        'Successful!',
                        "Default Page is Fetch Successfully",
                        'success'
                    )
                })
                .catch(function(error) {
                    console.log(error.response);
                });
        }

        function showDynamicImageInPopUp(dynamicImageData, imageUrl) {
            Swal.fire({
                title: '<strong>Image Info </strong>',
                html: `<div class="text-start">
                        <p class="lead">Image :</p>
                        <div class="border border-1">
                            <img width="100%" src="` + imageUrl + "/" + dynamicImageData.file_name + `"
                                alt="">
                        </div>
                        <p class="lead">File Url :</p>
                        <input type="text" class="form-control" value="` + imageUrl + "/" + dynamicImageData
                    .file_name + `" readonly name="" id="dynamicImageUrl">
                        <button class="swal2-confirm swal2-styled" onclick="copyUrlToClipBoard()">Copy Url</button>
                    </div>`,
                showCloseButton: true,
                focusConfirm: false,
            })

        }

        function copyUrlToClipBoard() {
            /* Get the text field */
            var copyText = document.getElementById("dynamicImageUrl");

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */

            /* Copy the text inside the text field */
            navigator.clipboard.writeText(copyText.value);

        }

        $(document).on('click', '#paginationMainDivForCommonImages a', function(e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];

            fetch_data_for_common_images(page);

        });

        function fetch_data_for_common_images(page) {
            axios.post("{{ route('paginatingCommonImages') }}", {
                    page: page
                })
                .then(function(response) {
                    $('#paginationMainDivForCommonImages').html(response.data);
                    // update_search_list(response);
                })
                .catch(function(error) {
                    console.log(error.response);
                });
        }
        $(document).on('click', '#paginationMainDivForAgentImages a', function(e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];

            fetch_data_for_agent_images(page);

        });

        function fetch_data_for_agent_images(page) {
            axios.post("{{ route('paginatingAgentImages') }}", {
                    page: page
                })
                .then(function(response) {
                    $('#paginationMainDivForAgentImages').html(response.data);
                    // update_search_list(response);
                })
                .catch(function(error) {
                    console.log(error.response);
                });
        }





        function saveImageToAgentDirectory(agentEmail, agentId, elementId) {
            let myFile = document.getElementById(elementId);
            var files = myFile.files;
            if ((files[0].size / 1000000) > 4) {
                Swal.fire({
                    icon: 'error',
                    title: 'Image Size Exceeds.',
                    text: 'Please Select An Image Of Size Less Than 4-MB!'
                })
            } else {
                var formData = new FormData();
                var file = files[0];
                formData.append('agentEmail', agentEmail);
                formData.append('agentId', agentId);
                formData.append('imagefile', file);
                axios.post("{{ route('agentCustomImages') }}", formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then(function(response) {
                        if (response.data == "Not Image") {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Please Select An Image!'
                            })
                        } else {
                            console.log(response);
                            $("#paginationMainDivForAgentImages").load(window.location.href +
                                " #paginationMainDivForAgentImages");
                            Swal.fire(
                                'Successful',
                                "Image Added Successfully",
                                'success'
                            )
                        }
                    })
                    .catch(function(error) {
                        console.log(error.response);
                    });
            }
        }

        function deleteAgentImage(imageId, imageName, agentEmail) {
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
                    axios.post("{{ route('deleteAgentCustomImage') }}", {
                            image_id: imageId,
                            image_name: imageName,
                            agent_email: agentEmail,
                        })
                        .then(function(response) {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            $("#paginationMainDivForAgentImages").load(window.location.href +
                                " #paginationMainDivForAgentImages");

                        })
                        .catch(function(error) {
                            console.log(error.response);
                        });
                }
            })

        }
    </script>
    <!-- Scripts -->
@endsection
