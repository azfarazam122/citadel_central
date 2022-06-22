@extends('layouts.app')
{{-- ___________________________ --}}
@section('libraries')
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.css">
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center bg-white p-2">
            <div class="col-md-12">
                <div class=" secondaryTextColor">
                    <div class="">
                        <p class="text-center display-5 secondaryTextColor">
                            {{ __('Terms & Conditions') }}
                        </p>
                    </div>
                    <div>
                        @php
                            $termsData = '';
                            $superBrandingOn = App\Models\MasterSetting::all('is_super_brandnig_on');
                            if ($superBrandingOn[0]->is_super_brandnig_on == 'false') {
                                # code...
                                $termsData = App\Models\MasterSetting::get('terms_data');
                            } else {
                                $termsData = App\Models\SuperSetting::get('terms_data');
                            }
                        @endphp
                        {!! $termsData[0]->terms_data !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
@endsection
@section('scripts')
    <!-- Scripts -->
    <script src="{{ asset('js/masterSettings.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            document.title = "Terms and Conditions";
        });
    </script>
    <!-- Scripts -->
@endsection
