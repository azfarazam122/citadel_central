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
                            {{ __('Privacy Policy') }}
                        </p>
                    </div>
                    <div>
                        @php
                            $privacyData = '';
                            $superBrandingOn = App\Models\MasterSetting::all('is_super_brandnig_on');
                            if ($superBrandingOn[0]->is_super_brandnig_on == 'false') {
                                $privacyData = App\Models\MasterSetting::get('privacy_data');
                            } else {
                                $privacyData = App\Models\SuperSetting::get('privacy_data');
                            }

                        @endphp
                        {!! $privacyData[0]->privacy_data !!}
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
            document.title = "Privacy Policy";
        });
    </script>
    <!-- Scripts -->
@endsection
