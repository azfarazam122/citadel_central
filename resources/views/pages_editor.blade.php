@extends('layouts.app')
{{-- ___________________________ --}}
{{-- SIDEBAR --}}
@section('sidebar')
    @include('layouts.sidebar')
@endsection
{{-- ___________________________ --}}

@section('libraries')
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <div class="overflow-auto row justify-content-center">
            <div class="col-md-12">
                <div class=" secondaryTextColor">
                    <p class="display-3 text-center">{{ __('Pages Editor') }}
                    </p>
                    <hr>
                    <div class="card-body">
                        <div class="container mt-2 mb-5">
                            <p class="text-center display-5">Home Page</p>
                            <textarea style="width: 100%;" class="col-md-12 mt-2" id="homePageTemplate">
                            {{-- {{ $masterSettingData[0]->terms_data }} --}}
                        </textarea>
                            <div class="mt-4 text-center">
                                <a class="btn col-md-4 homeButtons" style="background: var(--primary-color)"
                                    onclick="saveHomePageData()">Save Home Page Content</a>
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
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        var homePageEditor;
        var aboutPageEditor;
        var ratesPageEditor;
        $(document).ready(function() {
            homePageEditor = $('#homePageTemplate').summernote({
                height: 500,
            });
            // aboutPageEditor = $('#privacyPageTemplate').summernote({
            //     height: 500,
            // });
            // ratesPageEditor = $('#privacyPageTemplate').summernote({
            //     height: 500,
            // });
        });


        function saveHomePageData() {
            axios.post("{{ route('saveHomePageDataByAgent') }}", {
                    newData: homePageEditor[0].innerHTML,
                })
                .then(function(response) {
                    console.log(response);
                    Swal.fire(
                        'Saved!',
                        "Content For Home Page Saved Successfully",
                        'success'
                    )
                })
                .catch(function(error) {
                    console.log(error.response);
                });
        }
    </script>
    <!-- Scripts -->
@endsection
