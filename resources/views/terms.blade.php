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
                    <div class="card-body">
                        <h2 class="secondaryTextColor">Terms of Use and Privacy</h2>
                        <h1 class="mt-4 primaryTextColor">ACCEPTANCE</h1>
                        <p class="lead  tertiaryTextColor">
                            This Terms of Use Agreement (“Agreement”) is a legal agreement between you and the operators of
                            this website (the “Portal”), being Your Broker Journey Ltd., a Canadian corporation, and its
                            affiliate,
                            Your Broker Journey, Inc., a Florida company (referred to individually and collectively herein,
                            as the
                            context requires, as “Your Broker Journey”). It sets out the Terms and Conditions under which
                            you may access
                            and use the Portal. By accessing and using the Portal, you are indicating your acceptance to be
                            bound by the Terms and Conditions of this Agreement. If you do not accept these Terms and
                            Conditions, you must not access or use the Portal. Your Broker Journey may revise this Agreement
                            at any time
                            by updating this posting. Use of the Portal after such changes are posted will signify your
                            acceptance of these revised terms. You should visit this page periodically to review this
                            Agreement.
                        </p>
                        {{-- _______________________ --}}
                        <h1 class="mt-4 primaryTextColor">NO LEGAL ADVICE</h1>
                        <p class="lead  tertiaryTextColor">
                            Information made available on the Portal in any form is for information purposes only. It is
                            not, does not constitute and should not be taken as legal advice. You should not rely on, or
                            take or fail to take any action, based upon this information.
                        </p>
                        {{-- _______________________ --}}
                        <h1 class="mt-4 primaryTextColor">OWNERSHIP OF CONTENT</h1>
                        <p class="lead  tertiaryTextColor">
                            All materials displayed or otherwise accessible through this Portal, including but not limited
                            to text, graphics, videos, photos, trade-marks, logos and other materials (collectively,
                            “Content”) are protected by copyright and trade-mark laws, and are owned by Your Broker Journey
                            and its
                            licensors, or the party accredited as the provider of the Content. Except as granted in the
                            limited licence herein, any use of the Content, including modification, transmission,
                            presentation, distribution, republication, or other exploitation of the Portal or of its
                            Content, whether in whole or in part, is prohibited without the express prior written consent of
                            Your Broker Journey.
                        </p>
                        {{-- _______________________ --}}
                        <h1 class="mt-4 primaryTextColor">LIMITED LICENCE</h1>
                        <p class="lead  tertiaryTextColor">
                            Subject to the Terms and Conditions of this Agreement, you are hereby granted a limited,
                            non-transferable and non-exclusive licence to access, view and use the Portal for your personal,
                            non-commercial use, and are granted the right to download, store and print single copies of
                            items comprising the Content for your personal, non-commercial use, provided that you maintain
                            all copyright and other notices contained in such Content.
                        </p>
                        {{-- _______________________ --}}
                        <h1 class="mt-4 primaryTextColor">LINKS</h1>
                        <p class="lead  tertiaryTextColor">
                            The Portal contains some /links to third-party web sites. These links are provided solely as a
                            convenience to you and not as an endorsement by Your Broker Journey of the contents of such
                            third-party
                            Portals. Your Broker Journey is not responsible for the content of any third-party web site, nor
                            does it make
                            any representation or warranty of any kind regarding any third-party website including, without
                            limitation (i) any representation or warranty regarding the legality, accuracy, reliability,
                            completeness, timeliness, security, suitability of any content on any third-party web site, (ii)
                            any representation or warranty regarding the merchantability and fitness for a particular
                            purpose of any material, content, software, goods, or services located at or made available
                            through such third-party web sites, and (iii) any representation or warranty that the operation
                            of the third-party web site will be uninterrupted or error free, that defects or errors in such
                            third-party web sites will be corrected, or that such third-party web sites will be free from
                            viruses or other harmful components.
                        </p>
                        {{-- _______________________ --}}
                        <h1 class="mt-4 primaryTextColor">Your Broker Journey FEES</h1>
                        <p class="lead  tertiaryTextColor">
                            The Portal is free for users; however, users understand and agree that Your Broker Journey may
                            receive fees
                            for submitting request forms or making referrals to certain vendors and/or our partner
                            organizations.
                        </p>
                        {{-- _______________________ --}}
                        <h1 class="mt-4 primaryTextColor">ADVERTISING</h1>
                        <p class="lead  tertiaryTextColor">
                            You acknowledge and agree that the portal may contain advertisements for vendor financial
                            products and other third party products and services. If You elect to have any business dealings
                            with a vendor or other third party whose products or services may be advertised on the portal,
                            You acknowledge and agree that such dealings are solely between you and such advertiser and you
                            further acknowledge and agree that Your Broker Journey shall not have any responsibility or
                            liability for any
                            losses or damages that You may incur as a result of any such dealings. You shall be responsible
                            for obtaining access to the portal and acknowledge that such access may involve third-party fees
                            (such as Internet service provider access or data fees). You shall be solely responsible for any
                            such fees and also for obtaining any equipment that is required to access the portal. It is your
                            responsibility to ascertain whether any information or materials downloaded from the portal are
                            free of viruses, worms, Trojan Horses, or other items of a potentially destructive nature.
                        </p>
                        {{-- _______________________ --}}
                        <h1 class="mt-4 primaryTextColor">LIMITATION OF LIABILITY</h1>
                        <p class="lead  tertiaryTextColor">
                            Subject to applicable law, in no event shall Your Broker Journey, or its principals, employees,
                            consultants,
                            agents, or licensors be liable for damages of any kind including, without limitation, any
                            direct, special, indirect, punitive, incidental or consequential damages including, without
                            limitation, any loss or damages in the nature of or relating to lost business, lost savings,
                            lost data and/or lost profits arising from your use of, reliance upon, or inability to use the
                            Portal or the Content, regardless of the cause and whether arising in contract (including
                            fundamental breach), tort (including negligence), or otherwise. The foregoing limitation shall
                            apply even if Your Broker Journey knew of or ought to have known of the possibility of such
                            damages.
                        </p>
                        {{-- _______________________ --}}
                        <h1 class="mt-4 primaryTextColor">DISCLAIMER OF WARRANTIES</h1>
                        <p class="lead  tertiaryTextColor">
                            The Portal and the Content is provided “as is” and “as available”, without warranty or condition
                            of any kind, either express or implied. Your Broker Journey expressly disclaims all warranties
                            and
                            conditions, including any implied warranties of merchantability, fitness for a particular
                            purpose, title, quiet enjoyment or non-infringement in respect to the Portal and the Content, to
                            the fullest extent permissible under applicable law. Although Your Broker Journey has taken
                            steps to provide
                            Content that is correct, accurate and timely, no representations or warranties are made
                            regarding the Portal and/or the Content including, without limitation, no representation or
                            warranty that (i) the Portal or Content will be accurate, reliable, complete, current, timely or
                            suitable for any particular purpose, (ii) that the operation of the Portal will be uninterrupted
                            or error-free, (iii) that defects or errors in the Portal or the Content will be corrected, (iv)
                            that the Portal will be free from viruses, malware, worms or other harmful components, and (v)
                            that communications to or from the Portal will be secure and/or not intercepted. You acknowledge
                            and agree that you are using the Portal and the Content, if applicable, at your own risk and
                            liability.
                        </p>
                        {{-- _______________________ --}}
                        <h1 class="mt-4 primaryTextColor">RELEASE AND INDEMNITY</h1>
                        <p class="lead  tertiaryTextColor">
                            You hereby agree to release Your Broker Journey, its principals, employees, officers, and agents
                            from any and
                            all liabilities and damages (including any direct, indirect, special, exemplary or consequential
                            damages, including lost profits) whatsoever or arising from your use of the Portal (including
                            any breach by you thereof), the Content or otherwise relating to this Agreement and you agree
                            that your sole remedy for any claim, loss, damage, costs or expenses is to cease using the
                            Portal. You will indemnify and hold Your Broker Journey harmless from and against any claims,
                            losses,
                            judgments, damages, costs and expenses (including without limitation, reasonable legal fees)
                            incurred by any of them due to or resulting from your use of the Portal, the Content or
                            otherwise relating to this Agreement (including any breach by you thereof). You will also
                            indemnify and hold Your Broker Journey harmless from and against any claims brought by third
                            parties arising
                            out of your use of Content from this Portal.
                        </p>
                        {{-- _______________________ --}}
                        <h1 class="mt-4 primaryTextColor">PRIVACY POLICY</h1>
                        <p class="lead  tertiaryTextColor">
                            The Portal is free for users; however, users understand and agree that Your Broker Journey may
                            receive fees
                            for submitting request forms or making referrals to certain vendors and/or our partner
                            organizations.
                        </p>
                        {{-- _______________________ --}}
                        <h1 class="mt-4 primaryTextColor">Your Broker Journey FEES</h1>
                        <p class="lead  tertiaryTextColor">
                            Your Broker Journey will treat any personal information that you submit through this Portal in
                            accordance
                            with its privacy policy that may be in force from time to time. You hereby consent to the use of
                            your Personal Information by Your Broker Journey in accordance with the terms and for the
                            limited purposes
                            set forth in our privacy policy and/or applicable laws.
                        </p>
                        {{-- _______________________ --}}
                        <h1 class="mt-4 primaryTextColor">SECURITY</h1>
                        <p class="lead  tertiaryTextColor">
                            Any information sent or received over the Internet is generally not secure. Your Broker Journey
                            cannot
                            guarantee security of any communication to or from the Portal. Your Broker Journey does not
                            assume any
                            responsibility or risk for your use of the Internet.
                        </p>
                        {{-- _______________________ --}}
                        <h1 class="mt-4 primaryTextColor">PASSWORDS</h1>
                        <p class="lead  tertiaryTextColor">
                            Any passwords and user ID’s used for this Portal are for individual use only. You will be
                            responsible for the security of your password and user ID (if any). You further agree not to
                            disclose your password or user ID to any other person and Your Broker Journey will not be
                            responsible for the
                            unauthorized use of your profile by any other person and are under no obligation to confirm the
                            actual identity of any password or user ID. Your Broker Journey cannot and will not be liable
                            for any loss or
                            damage arising from your failure to comply with these provisions.
                        </p>
                        {{-- _______________________ --}}
                        <h1 class="mt-4 primaryTextColor">TRADE MARKS</h1>
                        <p class="lead  tertiaryTextColor">
                            Each of the names Your Broker Journey, Ltd. and Your Broker Journey Inc. and Your Broker Journey
                            and the logo displayed on the Portal
                            are the intellectual property of Your Broker Journey. Other names, words, titles, phrases,
                            logos, designs,
                            graphics, icons and trade marks displayed on the Portal may constitute registered or
                            unregistered trade marks of Your Broker Journey or third parties.
                        </p>
                        {{-- _______________________ --}}
                        <h1 class="mt-4 primaryTextColor">GOVERNING LAW AND JURISDICTION</h1>
                        <p class="lead  tertiaryTextColor">
                            The Portal is operated by Your Broker Journey from its offices within the Province of Ontario,
                            Canada. By
                            accessing or using the Portal, you agree that all matters relating to your access to, or use of,
                            the Portal and its Content shall be governed by the laws of the Province of Ontario and the
                            federal laws of Canada, without regard to conflict of laws principles. You agree and hereby
                            submit to the non-exclusive jurisdiction of the courts of the Province of Ontario with respect
                            to all matters relating to your access to and use of the Portal.
                        </p>
                        {{-- _______________________ --}}
                        <h1 class="mt-4 primaryTextColor">TERMINATION</h1>
                        <p class="lead  tertiaryTextColor">
                            Your Broker Journey may, in its sole discretion, cancel or terminate your right to use the
                            Portal, or any
                            part of the Portal, at any time without notice. In the event of termination, you are no longer
                            authorized to access the Portal or the part of the Portal affected by such cancellation or
                            termination. The restrictions imposed on you with respect to both Content and the Portal set out
                            in this Agreement shall survive. Your Broker Journey shall not be liable to any party for such
                            termination.
                        </p>
                        {{-- _______________________ --}}
                        <h1 class="mt-4 primaryTextColor">NO LAWYER-CLIENT RELATIONSHIP</h1>
                        <p class="lead  tertiaryTextColor">
                            The presentation of information on this Portal or your use of, or reliance upon such information
                            does not establish a lawyer-client relationship between you and Your Broker Journey. Please also
                            note that
                            any information sent or received over the Internet is generally not secure. Your Broker Journey
                            cannot
                            guarantee the security or privacy of any communication (in any form) to the Portal.
                        </p>
                        {{-- _______________________ --}}
                        <h1 class="mt-4 primaryTextColor">ENTIRE AGREEMENT</h1>
                        <p class="lead  tertiaryTextColor">
                            Except for any agreement in respect of Content, this is the entire agreement between you Your
                            Broker Journey
                            relating to your access and use of the Portal and the Content herein.
                        </p>
                        {{-- _______________________ --}}
                        <h1 class="mt-4 primaryTextColor">GENERAL</h1>
                        <p class="lead  tertiaryTextColor">
                            If any term or provision of this Agreement is held by a court of competent jurisdiction to be
                            invalid, it shall be severed and the remaining provisions shall remain in full force without
                            being invalidated in any way. You may not assign, convey, subcontract or delegate your rights,
                            duties or obligations hereunder. Your Broker Journey will not be considered to have waived any
                            of its rights
                            or remedies described in this Agreement unless the waiver is in writing and signed by Your
                            Broker Journey. No
                            delay or omission by Your Broker Journey in exercising its rights or remedies will impair or be
                            construed as
                            a waiver. Any single or partial exercise of a right or remedy will not preclude further exercise
                            of any other right or remedy. Your Broker Journey’ failure to enforce the strict performance of
                            any provision
                            of this Agreement will not constitute a waiver of Your Broker Journey’ right to subsequently
                            enforce such
                            provision or any other provisions of this Agreement. The headings used in this Agreement are
                            included for convenience only and have no legal or contractual effect.
                        </p>
                        {{-- _______________________ --}}

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
