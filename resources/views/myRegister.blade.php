<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css"
        integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="">
    <title>Register</title>
</head>

<body>
    <div>
        <img src="images/logo.png" alt="" srcset="">
    </div>

    <div style="  border-bottom: 160vh solid #dbac28;
  border-left: 100vw solid transparent; position: absolute; z-index: -1;"></div>
    {{-- ____________________________ --}}
    <div class="container text-center p-5 bg-white"
        style="width: 70%;border-radius: 7px;    background: #ebe9e9 !important;">
        <div class="p-3" style="background: black;color: white; margin-left: -50px;margin-right: -50px">
            <h2>REGISTER NOW ON CITADEL CONNECT</h2>
        </div>
        <div class="row mt-5" style="justify-content: center">
            <div class="mr-2">
                <h4>I am a</h4>
            </div>
            <div>
                <button type="button" onclick="displayFieldsOfButton('homeBuyerBtn_RegForm')" name=""
                    id="homeBuyerBtn_RegForm" style="border-bottom:2px solid #dbac28;" class="btn btn-light ">
                    Homebuyer
                </button>
            </div>
            <div>
                <button type="button" onclick="displayFieldsOfButton('realStateAgentBtn_RegForm')" name=""
                    id="realStateAgentBtn_RegForm" class="btn btn-light ">
                    Real State Agent
                </button>
            </div>
            <div>
                <button type="button" onclick="displayFieldsOfButton('mortgageProfessionalBtn_RegForm')" name=""
                    id="mortgageProfessionalBtn_RegForm" class="btn btn-light ">
                    Mortgage Professional
                </button>
            </div>
        </div>
        <div class="col-md-9 mt-5 ml-auto mr-auto">
            <form id="homeBuyerForm">
                <div class="text-left form-group">
                    <label for="inputAddress">First Name</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="">
                </div>
                <div class="text-left form-group">
                    <label for="inputAddress2">Last Name</label>
                    <input type="text" class="form-control" id="inputAddress2" placeholder="">
                </div>
                <div class="form-group text-left">
                    <label for="inputState">Province</label>
                    <select id="inputState" class="form-control">
                        <option selected>Choose...</option>
                        <option>Ontario</option>
                    </select>
                </div>
                <div class="text-left form-group">
                    <label for="inputAddress2">Email</label>
                    <input type="text" class="form-control" id="inputAddress2" placeholder="">
                </div>
                <div class="text-left" style="margin-top: -10px">
                    <small class="text-left">We do not share email address’ with any third-party
                        vendors. To learn more, please read our <a href="https://www.relnks.com/privacy-policy/"
                            target="_blank" class="link signup-link">Privacy
                            Policy.</a>
                    </small>
                </div>
                <div class="text-left form-group mt-4">
                    <label for="inputAddress2">Password</label>
                    <input type="password" class="form-control" id="inputAddress2" placeholder="">
                </div>

                <div class="text-left row validation-list-row">
                    <div class="col">
                        <ul class="validation-list">
                            <li class="">8 characters minimum</li>
                            <li class="">One lowercase character</li>
                            <li class="">One uppercase character</li>
                        </ul>
                    </div>
                    <div class="col">
                        <ul class="validation-list">
                            <li class="">One number</li>
                            <li class="">One special character</li>
                        </ul>
                    </div>
                </div>

                <div class="form-group">
                    <button style="border: 1px solid #d5d1d1" type="button" class="btn btn-light btn-block">Sign Up
                    </button>
                </div>
                <div class="text-left" style="margin-top: -10px">
                    <small>
                        By clicking the "Sign up" button, you are creating a
                        RELNKS account, and you agree to RELNKS's
                        <a href="https://www.relnks.com/terms-and-conditions/" target="_blank"
                            class="link signup-link">Terms of Use
                        </a> and
                        <a href="https://www.relnks.com/privacy-policy/" target="_blank"
                            class="link signup-link">Privacy Policy
                        </a>.
                    </small>
                </div>
            </form>

            <form style="display: none" id="realStateAgentForm">

                <div class="text-left form-group">
                    <label for="inputAddress">First Name</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="">
                </div>
                <div class="text-left form-group">
                    <label for="inputAddress2">Last Name</label>
                    <input type="text" class="form-control" id="inputAddress2" placeholder="">
                </div>
                <div class="form-group text-left">
                    <label for="inputState">Province</label>
                    <select id="inputState" class="form-control">
                        <option selected>Choose...</option>
                        <option>Ontario</option>
                    </select>
                </div>

                <div class="text-left form-group">
                    <label for="inputAddress2">Name Of Brokerage</label>
                    <input type="text" class="form-control" id="inputAddress2" placeholder="">
                </div>

                <div class="text-left form-group">
                    <label for="inputAddress2">Email</label>
                    <input type="text" class="form-control" id="inputAddress2" placeholder="">
                </div>
                <div class="text-left" style="margin-top: -10px">
                    <small class="text-left">We do not share email address’ with any third-party
                        vendors. To learn more, please read our <a href="https://www.relnks.com/privacy-policy/"
                            target="_blank" class="link signup-link">Privacy
                            Policy.</a>
                    </small>
                </div>
                <div class="text-left form-group mt-4">
                    <label for="inputAddress2">Password</label>
                    <input type="password" class="form-control" id="inputAddress2" placeholder="">
                </div>

                <div class="text-left row validation-list-row">
                    <div class="col">
                        <ul class="validation-list">
                            <li class="">8 characters minimum</li>
                            <li class="">One lowercase character</li>
                            <li class="">One uppercase character</li>
                        </ul>
                    </div>
                    <div class="col">
                        <ul class="validation-list">
                            <li class="">One number</li>
                            <li class="">One special character</li>
                        </ul>
                    </div>
                </div>

                <div class="form-group">
                    <button style="border: 1px solid #d5d1d1" type="button" class="btn btn-light btn-block">Sign Up
                    </button>
                </div>

                <div class="text-left" style="margin-top: -10px">
                    <small>
                        By clicking the "Sign up" button, you are creating a
                        RELNKS account, and you agree to RELNKS's
                        <a href="https://www.relnks.com/terms-and-conditions/" target="_blank"
                            class="link signup-link">Terms of Use
                        </a> and
                        <a href="https://www.relnks.com/privacy-policy/" target="_blank"
                            class="link signup-link">Privacy Policy
                        </a>.
                    </small>
                </div>
            </form>

            <form style="display: none" id="mortgageProfessionalForm">
                <div class="text-left form-group">
                    <label for="inputAddress">First Name</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="">
                </div>
                <div class="text-left form-group">
                    <label for="inputAddress2">Last Name</label>
                    <input type="text" class="form-control" id="inputAddress2" placeholder="">
                </div>
                <div class="form-group text-left">
                    <label for="inputState">Province</label>
                    <select id="inputState" class="form-control">
                        <option selected>Choose...</option>
                        <option>Ontario</option>
                    </select>
                </div>
                <div class="row form-group">
                    <div class="col-md-6 text-left form-group">
                        <label for="inputAddress2">Company Name</label>
                        <input type="text" class="form-control" value="Citadel Mortgage" id="inputAddress2"
                            placeholder="" readonly>
                    </div>
                    <div class="col-md-6 text-left form-group">
                        <label for="inputAddress2">Broker House</label>
                        <input type="text" value="Verico" readonly class="form-control" id="inputAddress2"
                            placeholder="">
                    </div>
                </div>
                <div class="text-left form-group">
                    <label for="inputAddress2">Email</label>
                    <input type="text" class="form-control" id="inputAddress2" placeholder="">
                </div>
                <div class="text-left" style="margin-top: -10px">
                    <small class="text-left">We do not share email address’ with any third-party
                        vendors. To learn more, please read our <a href="https://www.relnks.com/privacy-policy/"
                            target="_blank" class="link signup-link">Privacy
                            Policy.</a>
                    </small>
                </div>
                <div class="text-left form-group mt-4">
                    <label for="inputAddress2">Password</label>
                    <input type="password" class="form-control" id="inputAddress2" placeholder="">
                </div>

                <div class="text-left row validation-list-row">
                    <div class="col">
                        <ul class="validation-list">
                            <li class="">8 characters minimum</li>
                            <li class="">One lowercase character</li>
                            <li class="">One uppercase character</li>
                        </ul>
                    </div>
                    <div class="col">
                        <ul class="validation-list">
                            <li class="">One number</li>
                            <li class="">One special character</li>
                        </ul>
                    </div>
                </div>

                <div class="form-group">
                    <button style="border: 1px solid #d5d1d1" type="button" class="btn btn-light btn-block">Sign Up
                    </button>
                </div>

                <div class="text-left" style="margin-top: -10px">
                    <small>
                        By clicking the "Sign up" button, you are creating a
                        RELNKS account, and you agree to RELNKS's
                        <a href="https://www.relnks.com/terms-and-conditions/" target="_blank"
                            class="link signup-link">Terms of Use
                        </a> and
                        <a href="https://www.relnks.com/privacy-policy/" target="_blank"
                            class="link signup-link">Privacy Policy
                        </a>.
                    </small>
                </div>
            </form>

        </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/js/bootstrap.min.js"
        integrity="sha512-UR25UO94eTnCVwjbXozyeVd6ZqpaAE9naiEUBK/A+QDbfSTQFhPGj5lOR6d8tsgbBk84Ggb5A3EkjsOgPRPcKA=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
    <script>
        function displayFieldsOfButton(idOfBtn) {
            if (idOfBtn == 'homeBuyerBtn_RegForm') {
                $('#homeBuyerForm').show()
                $('#realStateAgentForm').hide()
                $('#mortgageProfessionalForm').hide()
                document.getElementById('homeBuyerBtn_RegForm').style.borderBottom =
                    '2px solid #dbac28';
                document.getElementById('realStateAgentBtn_RegForm').style.borderBottom =
                    '0px solid black';
                document.getElementById('mortgageProfessionalBtn_RegForm').style.borderBottom =
                    '0px solid black';

            } else if (idOfBtn == 'realStateAgentBtn_RegForm') {
                $('#realStateAgentForm').show()
                $('#homeBuyerForm').hide()
                $('#mortgageProfessionalForm').hide()
                document.getElementById('homeBuyerBtn_RegForm').style.borderBottom =
                    '0px solid black';
                document.getElementById('realStateAgentBtn_RegForm').style.borderBottom =
                    '2px solid #dbac28';
                document.getElementById('mortgageProfessionalBtn_RegForm').style.borderBottom =
                    '0px solid black';
            } else {
                $('#mortgageProfessionalForm').show()
                $('#homeBuyerForm').hide()
                $('#realStateAgentForm').hide()
                document.getElementById('homeBuyerBtn_RegForm').style.borderBottom =
                    '0px solid black';
                document.getElementById('realStateAgentBtn_RegForm').style.borderBottom =
                    '0px solid black';
                document.getElementById('mortgageProfessionalBtn_RegForm').style.borderBottom =
                    '2px solid #dbac28';
            }
        }
    </script>
</body>

</html>
