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
                    <div class="card-body">
                        <h2 class="secondaryTextColor">Part of our commitment to bringing the best possible solutions to
                            you.
                        </h2>
                        <p class="lead tertiaryTextColor">
                            Real Estate Links Inc. (“Your Broker Journey”) knows you care how information about you is used
                            and shared,
                            and we appreciate your trust that we’ll do so carefully and sensibly. This notice describes our
                            privacy policy. By visiting Your Broker Journey.com, you’re accepting the practices described in
                            this Privacy
                            Policy.
                            <br>
                            <br>
                            Your Broker Journey provides a web-based communication and services portal (referred to herein
                            as the
                            “portal”). The employees at Your Broker Journey (sometimes referred to as “we”) are committed to
                            protecting
                            your privacy and recognize the importance and sensitivity of personal information. We are
                            committed to our clients and protecting any personal information that we hold. This Privacy
                            Policy outlines how we handle your personal information to protect your privacy.
                        </p>
                        <div class="mt-5"></div>
                        <h1 class="mt-5 primaryTextColor">Privacy legislation</h1>
                        <p class="lead  tertiaryTextColor">
                            Since January 1, 2004, all organizations collecting, using or disclosing personal information in
                            Canada in the course of commercial activities have been required to comply with the Personal
                            Information Protection and Electronic Documents Act (“PIPEDA”) and any applicable “substantially
                            similar” provincial legislation.
                            <br>
                            <br>
                            The California Consumer Privacy Act of 2018 (the “CCPA”) is a California law that gives
                            California residents (“consumers”), the right to learn about and control certain aspects of how
                            a business handles the personal information that a business collects about them. Pursuant to the
                            CCPA, effective January 1, 2020, consumers whose personal information have been collected by us,
                            have certain rights, including:

                        </p>
                        <ul class="lead  tertiaryTextColor">
                            <li>The right to know the categories of personal information we’ve collected and the categories
                                of sources from which we got the information;</li>
                            <li>The right to know the business purposes for sharing personal information;</li>
                            <li>The right to know the categories of third parties with whom we’ve shared personal
                                information; and</li>
                            <li>The right to access the specific pieces of personal information we’ve collected; and</li>
                            <li>The right to delete your information.</li>
                            <li>California residents also have the right to not be discriminated against if they choose to
                                exercise their privacy rights.</li>
                        </ul>
                        <p class="lead  tertiaryTextColor">
                            To learn more about these rights, your personal information under the CCPA, or to exercise your
                            rights, you can also email us at <a
                                href="mailto:support@uat.Your Broker Journey.com">support@uat.Your Broker Journey.com</a>.
                        </p>
                        {{-- _______________________ --}}
                        <h1 class="mt-4 primaryTextColor">Personal information</h1>
                        <p class="lead  tertiaryTextColor">
                            Personal information is defined in PIPEDA as information that can identify you, or by which your
                            identity could be deduced. If we did not collect and use your personal information, we would not
                            be able to provide you with the Your Broker Journey portal’s services.
                            <br>
                            <br>
                            Under the CCPA, “Personal information” does not include publicly available information. For
                            these purposes, “publicly available” means information that is lawfully made available from
                            federal, state, or local government records, if any conditions associated with such information.
                            “Publicly available” does not mean biometric information collected by a business about a
                            consumer without the consumer’s knowledge. Information is not “publicly available” if that data
                            is used for a purpose that is not compatible with the purpose for which the data is maintained
                            and made available in the government records or for which it is publicly maintained. “Publicly
                            available” does not include consumer information that is deidentified or aggregate consumer
                            information.
                        </p>
                        {{-- _______________________ --}}
                        <h1 class="mt-4 primaryTextColor">Consent to our collection, use and disclosure of personal
                            information</h1>
                        <p class="lead  tertiaryTextColor">
                            In most cases, we obtain your consent to collect, use and disclose your personal information. If
                            you retain a law firm that uses the Your Broker Journey portal, we assume that we have your
                            implied consent
                            to our collection, use and disclosure of your personal information for the purposes of that law
                            firm providing legal services to you, your company or organization; however, at times we may ask
                            for your express consent, either verbally or in writing. By providing your personal information
                            to us, you agree that we may collect, use and disclose your personal information as outlined in
                            this Privacy Policy.
                        </p>
                        {{-- _______________________ --}}
                        <h1 class="mt-4 primaryTextColor">Collection of personal information</h1>
                        <p class="lead  tertiaryTextColor">
                            Generally, we collect your personal information directly from you at the start of or during the
                            course of your enrollment with the Your Broker Journey portal’s services. You might supply us
                            with such
                            information as your name, address, email address and telephone number. You can choose not to
                            provide certain information, but then you might not be able to take advantage of many of our
                            features. Depending on the services you use, we may also obtain personal information about you
                            from other sources, such as when securing legal or mortgage assistance: your insurance company,
                            from your financial institution; your real estate agent; from a government agency or registry;
                            your employer, if we are acting for you, at its request; or your accountant.
                            <br>
                            <br>
                            We use your personal information to facilitate your access to obtaining legal services from
                            lawyers who also use the Your Broker Journey portal, to issue invoices and to maintain our
                            database of
                            clients.
                            <br>
                            We may also use your personal information so that we may communicate with you about recent
                            developments in the housing and mortgage market, to keep you aware of Your Broker Journey news
                            and invite you
                            to Your Broker Journey events.
                        </p>
                        {{-- _______________________ --}}
                        <h1 class="mt-4 primaryTextColor">Third party sites</h1>
                        <p class="lead  tertiaryTextColor">
                            If you request more information about a certain third party product or service listed on our
                            portal you may be required to input certain further Personal Information, such as name, contact
                            information, address, and certain other information depending on the nature of the third party
                            product or service you are interested in. If you submit such a request form, we will send the
                            information contained in the form to the applicable third party offering the product or service,
                            and you hereby consent to us sharing your Personal Information with such third party. Any
                            Personal Information that we provide to third parties will be treated in accordance with the
                            terms of such third party’s own privacy policy, which you should read. Your Broker Journey will
                            not be
                            responsible in any way for how any third party treats your personal information.
                        </p>
                        {{-- _______________________ --}}
                        <h1 class="mt-4 primaryTextColor">Online tools</h1>
                        <p class="lead  tertiaryTextColor">
                            We may offer tools such as a mortgage calculator, Canada child benefit calculator, RESP
                            calculator, TFSA Room calculator, and credit card finder. If you use these tools, we collect
                            information you provide (such as your income, RESP balance, credit score, etc.) in order to
                            provide you with the features and functions of the tools. Unless you provide consent, none of
                            the information provided will be shared with any other users of the portal or our services.
                        </p>
                        {{-- _______________________ --}}
                        <h1 class="mt-4 primaryTextColor">Insurance quotes</h1>
                        <p class="lead  tertiaryTextColor">
                            If you request an insurance quote, we collect your postal code and may automatically redirect
                            you to a third party website, hosted by one of our insurance provider partners. With the
                            exception of your postal code, any information you submit in the insurance quote process will be
                            submitted directly to such third party provider, and not to Your Broker Journey. Accordingly,
                            your personal
                            information will be treated in accordance with the privacy policy of the applicable third party
                            insurance provider, and Your Broker Journey shall not be responsible for how any third party
                            provider or
                            vendor treats your Personal Information. Your Broker Journey may also offer you the ability to
                            obtain an
                            insurance quote directly from Your Broker Journey by providing more detailed information on Your
                            Broker Journey including
                            your first and last name, email address, and phone number and additional information as set out
                            below. We collect this information so that we can obtain an accurate quote from our third party
                            insurance partners, and to contact you about your quote.
                        </p>
                        <ul class="lead fw-bold  tertiaryTextColor">
                            <li>Auto Insurance: If you request a quote for auto insurance, we collect personal information
                                such as details about your vehicle (e.g. year, make, and model, number of kilometers driven
                                per year), driver-related information (e.g. date of birth, sex, marital status, job status,
                                driving history, license class, whether you are insured, name of current insurer, price of
                                current insurance per month, details regarding any accidents or insurance violations you
                                have been involved).</li>
                            <li>Home Insurance: If you request a quote for home insurance, we collect information such as
                                details regarding your property (e.g. address, type of property, occupation and rental
                                information, and mortgages on the property), occupant details (e.g. first and last name,
                                date of birth, job status, years of property insurance, email address, and damage claims
                                history), and property construction details (e.g. year property was built, type of exterior,
                                number of bathrooms, property’s estimated replacement cost, and square footage).</li>
                        </ul>
                        {{-- _______________________ --}}
                        <h1 class="mt-4 primaryTextColor">Mortgage application</h1>
                        <p class="lead  tertiaryTextColor">
                            If you complete a mortgage application form on Your Broker Journey, we collect personal
                            information including
                            your first and last name, email address, phone number, province, date of birth, address history,
                            annual income, financial institution, employment status and other employment-related
                            information, and financial assets. We will also obtain your consent for Your Broker Journey to
                            obtain your
                            credit report from a credit reporting agency. We share your credit report and other information
                            provided on your application form with potential mortgage lenders so that they can assess your
                            eligibility for a mortgage, and we may also share information with financial intermediaries and
                            mortgage insurers as necessary to provide services to you. Your credit report may include
                            information such as the types and amounts of credit advanced to you, payment histories, negative
                            banking items, collection actions, legal proceedings, previous bankruptcies and other
                            information reported by your creditors. You authorize credit reporting agencies to provide such
                            information to us. If we are unable to obtain your credit report based on your name, date of
                            birth and mailing address alone, we may request you to provide other information, such as your
                            social insurance number, on an optional basis which we will use to help us identify you with a
                            credit reporting agency.
                        </p>
                        {{-- _______________________ --}}
                        <h1 class="mt-4 primaryTextColor">Credit reports</h1>
                        <p class="lead  tertiaryTextColor">
                            In order to obtain a free credit report, you will be required to input your name, email address,
                            date of birth, income, phone number and address to the portal. We will provide this information
                            to our partner consumer credit reporting agency (Equifax). All the personal information we
                            provide to Equifax will be subject to, and treated in accordance with the Equifax Terms of Use
                            and Privacy Policy, which you should read carefully. We will update your credit report
                            regularly, and accordingly, will also use the personal information you provide in order to
                            provide updated credit reports, which you can find in your account.
                        </p>
                        {{-- _______________________ --}}
                        <h1 class="mt-4 primaryTextColor">Location information</h1>
                        <p class="lead  tertiaryTextColor">
                            Certain third party products and services are only available in certain areas, and therefore we
                            may ask for your location, either by requesting your postal code, city, and/or address.
                        </p>
                        {{-- _______________________ --}}
                        <h1 class="mt-4 primaryTextColor">Transactional notifications</h1>
                        <p class="lead  tertiaryTextColor">
                            We provide notifications for certain activities relating to your use of our Services despite
                            your indicated e-mail preferences, for example we may send you notices of any updates to our
                            Terms of Use or Privacy Policy.
                        </p>
                        {{-- _______________________ --}}
                        <h1 class="mt-4 primaryTextColor">Marketing communications and product recommendations</h1>
                        <p class="lead  tertiaryTextColor">
                            If you sign-up to receive marketing communications from us, we collect your name and email
                            address to send you information about our product and services and those of our partners that
                            may be of interest to you. We may also use the information we have about you as well as
                            information obtained from third parties in order to provide you with personalized product
                            recommendations on Your Broker Journey. You may withdraw your consent to receiving marketing
                            communications
                            or product recommendations from us at any time by following the opt-out instructions in each
                            communication, or by contacting our customer service department at
                            <a href="mailto:support@Your Broker Journey.ca">support@Your Broker Journey.ca</a>
                            .
                        </p>
                        {{-- _______________________ --}}
                        <h1 class="mt-4 primaryTextColor">Statistics</h1>
                        <p class="lead  tertiaryTextColor">
                            We also collect statistics about your use of third party products and services that you request
                            information about through the portal. This information will be kept confidential, however,
                            aggregate statistics that do not personally identify an individual will be kept by us and such
                            aggregate statistics may be made available to other members or third parties.
                        </p>
                        {{-- _______________________ --}}
                        <h1 class="mt-4 primaryTextColor">Interest-based advertising</h1>
                        <p class="lead  tertiaryTextColor">
                            Advertisements appearing on the portal may be delivered by us or one or more third-party web
                            advertisers. These third party web advertisers may set cookies or other technologies on the
                            portal. These cookies allow the advertisement server operated by that third party to recognize
                            your computer each time they send you an online advertisement. Accordingly, advertisement
                            servers may compile information about where or whether you viewed their advertisements and which
                            advertisements you clicked on. This information allows web advertisers to deliver targeted
                            advertisements that they believe will be of most interest to you.
                            <br>
                            <br>
                            We work with third-parties such as ad networks and other advertising companies that use their
                            own tracking technologies (including cookies and pixel tags) on our portal in order to provide
                            you with tailored advertisements on our portal and across the Internet. These companies may
                            collect information about your activity on our portal and third-party websites (such as web
                            pages you visit and your interaction with our advertising and other communications) and use this
                            information to make predictions about your preferences, develop personalized content and deliver
                            ads that are more relevant to you on third party websites. This information may also be used to
                            evaluate the effectiveness of our online advertising campaigns.
                            <br>
                            <br>
                            Opting-out of Interest-Based Advertising: For more information about interest-based advertising
                            and to understand your options, including how you can opt-out of receiving behavioural ads from
                            third-party advertising companies participating in the Digital Advertising Alliance of Canada,
                            please visit the Digital Advertising Alliance of Canada website at
                            <a href="http://youradchoices.ca/choices" target="_blank"
                                rel="noopener noreferrer">http://youradchoices.ca/choices</a>
                            .

                            <br>
                            <br>
                            Please note that even if you opt-out of interest-based advertising by a third party, these
                            tracking technologies may still collect data for other purposes including analytics and you will
                            still see ads from us, but the ads will not be targeted based on behavioural information about
                            you and may therefore be less relevant to you and your interests.
                            <br>
                            <br>
                            To successfully opt out, you must have cookies enabled in your web browser (see your browser’s
                            instructions for information on cookies and how to enable them). Your opt-out only applies to
                            the web browser you use so you must opt-out of each web browser on each computer you use. Once
                            you opt out, if you delete your browser’s saved cookies, you will need to opt-out again.
                            <br>
                            <br>
                            If we plan to use your Personal Information in future for any other purposes not identified
                            above, we will only do so after informing you by updating this Privacy Policy.
                        </p>
                        {{-- _______________________ --}}
                        <h1 class="mt-4 primaryTextColor">Disclosures & transfers</h1>
                        <p class="lead  tertiaryTextColor">
                            We have put in place contractual and other organizational safeguards with our agents and service
                            providers (see further below) to ensure a proper level of protection of your Personal
                            Information (see further Security below). In addition to those measures, we will not disclose or
                            transfer your Personal Information to third parties without your permission, except as specified
                            in this Privacy Policy (see further Important Exceptions below).
                            <br>
                            <br>
                            As at the date of this Privacy Policy, we share Personal Information about you in respect of the
                            portal only with service providers that provide services on our behalf. We use service providers
                            to improve our portal and provide services such as hosting our portal, providing advertising
                            services, email marketing services, cloud services, and analytics advertising services.
                            <br>
                            <br>
                            We may also share your Personal Information with third parties with your consent such as if you
                            request information about third party products or services or if you apply for products or
                            services offered by third parties through Your Broker Journey.
                            <br>
                            <br>
                            Our servers (and certain service providers) are also located in Canada and accordingly your
                            Personal Information may be available to the Canadian government or its agencies under a lawful
                            order, irrespective of the safeguards we have put in place for the protection of your Personal
                            Information.
                            <br>
                            <br>
                            From time to time we may employ third parties to help us improve the portal. These third parties
                            may have limited access to databases of user information solely for the purpose of helping us to
                            improve the portal and they will be subject to contractual restrictions prohibiting them from
                            using the information about our members for any other purpose.

                        </p>
                        {{-- _______________________ --}}
                        <h1 class="mt-4 primaryTextColor">Sharing of personal information</h1>
                        <p class="lead  tertiaryTextColor">
                            Generally, we do not disclose your personal information to third parties without your consent
                            unless permitted or required by applicable law. There are some situations in which we may
                            disclose your personal information without your consent. For example:
                        </p>
                        <ol class="lead  tertiaryTextColor">
                            <li>when we are required or authorized by law to do so, for example if a court issues a
                                subpoena;</li>
                            <li>where it is necessary to establish or collect fees;</li>
                            <li>if we engage a third party to provide administrative services to us (like computer back-up
                                services or archival file storage) and the third party is bound by our privacy policy;</li>
                        </ol>
                        <p class="lead  tertiaryTextColor">
                            In some cases, your consent will be implied. For example, when the services we are providing to
                            you require us to provide your information to a third party (such as to a lender in a real
                            estate mortgage transaction) we would rely on your implied consent to the disclosure. Lastly,
                            from time to time we may transfer your personal information to Your Broker Journey’ service
                            providers. Under
                            PIPEDA, a transfer to a service provider is not considered to be a disclosure for which your
                            consent is required; however, we will use contractual or other means to ensure that the third
                            party service provider is bound by obligations regarding privacy that are consistent with this
                            Policy and our obligations under PIPEDA. Examples of transfers to service providers would be
                            situations in which we contract with third parties to provide us with services such as archival
                            file storage or insurance. Service providers may be located in various countries, so please be
                            aware that authorized officials of governments in those countries may be lawfully able to access
                            your personal information without your knowledge or consent pursuant to the laws of such
                            countries. To the extent that we are permitted to do so by applicable law, we will notify you if
                            we are advised that this access has occurred.
                            <br>
                            <br>
                            We might share your data with third parties for business purposes or for any of these reasons:
                        </p>
                        <ul class="lead tertiaryTextColor">
                            <li>Auditing</li>
                            <li>Detecting fraud</li>
                            <li>Debugging</li>
                            <li>Providing services</li>
                            <li>Internal research</li>
                            <li>Quality control</li>
                        </ul>
                        <p class="lead tertiaryTextColor">
                            With your consent, we might share your personal information with third parties, including our
                            affiliates, mortgage partners and service providers, for these reasons:
                        </p>
                        <ul class="lead tertiaryTextColor">
                            <li>Business purposes</li>
                            <li>Marketing</li>
                            <li>Analytics</li>
                            <li>Pre-populating your information to make your experience easier</li>
                        </ul>
                        <p class="lead tertiaryTextColor">
                            To opt out of sharing your data, please contact us by email at <a
                                href="mailto:support@uat.Your Broker Journey.com">support@uat.Your Broker Journey.com</a>.
                        </p>
                        {{-- _______________________ --}}
                        <h1 class="mt-4 primaryTextColor">Accuracy of your personal information</h1>
                        <p class="lead  tertiaryTextColor">
                            It is important that the personal information that we have on file be accurate, complete and
                            up-to-date. If, during the course of any matter through which you are using the Your Broker
                            Journey portal,
                            any of your personal information changes, please inform us so that we can make any necessary
                            changes. We may also ask you from time to time whether your personal information is up-to-date.
                        </p>
                        {{-- _______________________ --}}
                        <h1 class="mt-4 primaryTextColor">Cookies and other website technologies</h1>
                        <p class="lead  tertiaryTextColor">
                            Cookies are used by us to track content usage and traffic on the Website. A cookie is a feature
                            of your web browser that consists of a text file that is placed on your hard disk by a web
                            server. The Website uses cookies to help it compile aggregate statistics about usage of this
                            Website, such as how many users visit the Website, how long users spend viewing the Website, and
                            what pages are viewed most often, and what pages Users may visit directly after leaving the
                            Website. This information is used to improve the content of the Website and to provide and
                            improve the Services. You can set your browser to notify you when you are sent a cookie. This
                            gives you the chance to decide whether or not to accept it. If you disable cookies, you may not
                            be able to take advantage of all the features of the Website. Our Website may also use a
                            technology called tracer tags, pixel tags or web beacons. This technology allows us to
                            understand which pages you visit on our Website and are used to help us optimize and tailor our
                            Website for you and other future visitors to our Website.
                            <br>
                            <br>
                            The Help feature on most browsers will tell you how to prevent your browser from accepting new
                            cookies, how to have the browser notify you when you receive a new cookie, or how to disable
                            cookies altogether. Additionally, you can disable or delete similar data used by browser
                            add-ons, such as Flash cookies, by changing the add-on’s settings or visiting the Web site of
                            its manufacturer.
                        </p>
                        {{-- _______________________ --}}
                        <h1 class="mt-4 primaryTextColor">ENTIRE AGREEMENT</h1>
                        <p class="lead  tertiaryTextColor">
                            Except for any agreement in respect of Content, this is the entire agreement between you Your
                            Broker Journey
                            relating to your access and use of the Portal and the Content herein.
                        </p>
                        {{-- _______________________ --}}
                        <h1 class="mt-4 primaryTextColor">Safeguards</h1>
                        <p class="lead  tertiaryTextColor">
                            Your Broker Journey uses various administrative and technological safeguards to ensure that your
                            personal
                            information is protected against loss, theft, misuse, unauthorized access, disclosure, copying
                            or alteration. These include: security of our physical premises; lawyer user’s professional
                            obligations; security software and firewalls to prevent unauthorized computer access or
                            “hacking”; and internal passwords that restrict access to our electronic files.
                        </p>
                        {{-- _______________________ --}}
                        <h1 class="mt-4 primaryTextColor">Retention</h1>
                        <p class="lead  tertiaryTextColor">
                            We will keep your Personal Information for as long as it remains necessary for the identified
                            purpose or as required by law, which may extend beyond the termination of our relationship with
                            you. We may retain certain data as necessary to prevent fraud or future abuse, or for legitimate
                            business purposes, such as analysis of aggregated, non-personally-identifiable data, account
                            recovery, or if required by law. All retained personal information will remain subject to the
                            terms of this Privacy Policy. If you request that your name be removed from our databases, it
                            may not be possible to completely delete all your Personal Information due to technological and
                            legal constraints.
                        </p>
                        {{-- _______________________ --}}
                        <h1 class="mt-4 primaryTextColor">Access to your personal information</h1>
                        <p class="lead  tertiaryTextColor">
                            You have a right to challenge the accuracy and completeness of your personal information and to
                            have it amended, as appropriate. You also have a right to request access to your personal
                            information and receive an accounting of how that information has been used and disclosed,
                            subject to certain exceptions prescribed by law. For example, if the requested information would
                            reveal personal information about another individual, your access may be limited or denied. If
                            your request for access is denied, Your Broker Journey will notify you in writing of the reason
                            for the
                            denial. Your Broker Journey does not use your social insurance number as a way of identifying or
                            organizing
                            the information we hold upon you.
                        </p>
                        {{-- _______________________ --}}
                        <h1 class="mt-4 primaryTextColor">Website privacy</h1>
                        <p class="lead  tertiaryTextColor">
                            Like most other organizations, we may monitor traffic patterns, site usage and related site
                            information. We may provide aggregated information to third parties, but this does not include
                            any personally identifiable information.
                        </p>
                        {{-- _______________________ --}}
                        <h1 class="mt-4 primaryTextColor">Changes to this privacy policy</h1>
                        <p class="lead  tertiaryTextColor">
                            We may change this Privacy Policy from time to time. Any changes will be posted on our website
                            at <a href="https://www.Your Broker Journey.com/" target="_blank"
                                rel="noopener noreferrer">www.Your Broker Journey.com</a>. Please check from time to time to
                            ensure you
                            are aware of our current policy.
                            This Privacy Policy is effective February, 2020.
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
            document.title = "Privacy Policy";
        });
    </script>
    <!-- Scripts -->
@endsection
