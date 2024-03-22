<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>EMPLOYEE MANAGEMENT SYSTEM</title>
    <link rel="stylesheet" href="style.css">

    @include('cdn')
</head>
<style>
    .section1,
    .section3 {
        padding-bottom: 10%;
        background-color: #014421;
    }

    .section2,
    .section4 {
        padding-bottom: 10%;
        background-color: azure;
        color: #18461a;
    }

    .body {

        color: #eeeeff;

    }

    .currency {
        border-radius: 5px;
        border-color: white;
    }

    .portfolio {
        color: chocolate;
    }

    .container {
        padding-top: 10%;
        display: flex;
        text-align: left;
    }

    .col1 {
        margin-left: 5%;

        text-align: justify;
        padding: 20px;
        position: sticky;
        top: 0;
        height: 100%;
        overflow: auto;
        width: 50%;
        box-sizing: border-box;
    }

    .col2 {
        margin-top: 50%;
        padding: 20px;
        width: 50%;
        overflow: auto;
        box-sizing: border-box;
    }

    .header {
        font-size: 60px;
    }

    img {
        width: 100%;
        height: 100%;
    }

    strong {
        color: #ffa535;
    }

    .btn {
        color: black;
        background-color: #ffa535;
    }

    .btn {
        color: white;
    }

    .section3_heading {

        transform: translate3d(0px, 20px, 0px);
        padding-top: 10%;
        letter-spacing: 2px;
    }

    .letterspacing {
        letter-spacing: 3px;

    }

    h5,
    p {
        text-align: left;
    }

    .sticky {
        padding-bottom: 30%;
        position: sticky;
        top: 0%;
        overflow: auto;
        box-sizing: border-box;
    }

    .scrollable {
        top: 0%;
        overflow: auto;
        box-sizing: border-box;
    }

    .video {

        display: block;
        float: left;
        width: 50%;
        height: 50%;
    }

    .image_section4 {
        width: 50%;
        height: 390px;
    }

    button {
        border-radius: 70%;
    }

    .header1 {

        letter-spacing: 15px;
    }

    .section5 {
        background-color: #eeeeff;
        padding-bottom: 10%;
    }

    .section6 {
        text-align: justify;
    }

    .logo_footer {

        display: flex;
        float: left;
        overflow: hidden
    }

    .footer_img {

        width: 60px;
        height: 60px;
        padding: 5px;
    }

    .follow {
        font-size: 20px;
    }

    footer {
        font-size: smaller;
    }

    .body {}

    .model {
        position: relative;
    }
</style>

<body class="body">
    <div>
        {{-- session to handle the authenticato --}}
        @if (session('user') == 1)
            <section class="section1">

                <nav class="navbar navbar-expand-lg   " style="color: antiquewhite;">
                    <div class="container-fluid">

                        <a class="navbar-brand col-9  fs-3 fw-bold" style="color:white;" href="ind">MANAGEMENT
                            SYSTEM</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse col-9" id="navbarNav">
                            <ul class="navbar-nav">

                                <!-- Button trigger modal -->
                                {{-- modal to add company --}}



                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal">
                                    Add Company
                                </button>

                                <!-- Modal -->
                                <div class="modal" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="ModalLabel">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="ModalLabel">Add company</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h1 class="text-dark">Add Company</h1>



                                                <form id="formData" enctype="multipart/form-data" class="dropzone"
                                                    onsubmit="addCompany(event)">
                                                    @csrf


                                                    <label id="compNameError"
                                                        class="error-message text-dark  @error('compName') is-invalid @enderror"
                                                        for="name">Name:</label>
                                                    <input placeholder=" name" class=" dropdown-item text-dark"
                                                        type="text" id="compname" name="compName" required>

                                                    <label id="compEmailError" class="text-dark"
                                                        for="email">Email:</label>
                                                    <input placeholder=" example@gmail.com"
                                                        class=" dropdown-item text-dark" type="email" id="compEmail"
                                                        name="compEmail" value="{{ old('email') }}" required>



                                                    <div name="compLogo"
                                                        class="dropdown-item dropzone @error('title') is-invalid @enderror"
                                                        id="companyDropzone">
                                                        <label id="compLogoError" class="text-dark" for="compLogo"
                                                            class="fallback">Select LOGO</label>
                                                        <input id="compLog" name="compLogo" hidden required>

                                                    </div>

                                                    <label id="compWebError" class="text-dark"
                                                        for="email">Website</label>
                                                    <input placeholder=" https://www.javatpoint.com/"
                                                        class="  dropdown-item text-dark @error('title') is-invalid @enderror"
                                                        type="url" id="compWeb" name="compWeb" required>

                                                    <button class=" btn btn-success" id="submit" class="    "
                                                        type="submit" value="Submit">submit</button>
                                                    <button class=" btn btn-success" id="modal-dismiss"
                                                        data-dismiss="modal" class="    " type="close"
                                                        value="close">close</button>

                                                </form>

                                            </div>
                                        </div>
                                    </div>






                                    {{-- ajax to show the modal of company to add company  --}}



                                    <script>
                                        function addCompany(event) {
                                            event.preventDefault();
                                            $.ajax({
                                                type: 'POST',
                                                url: 'company',
                                                data: $('#formData').serialize(), // Corrected selector for form data
                                                success: function() {
                                                    console.log("In AJAX request success callback");

                                                    $('#modal-dismiss').trigger('click');
                                                    updateData();
                                                },
                                                error: function(xhr, status, error, response) {
                                                    console.error('AJAX request failed:', status, error);
                                                    var response = xhr.responseJSON;

                                                    // Check if the response contains the "errors" key
                                                    if (response && response.errors) {
                                                        // Iterate over the errors and append them to the corresponding container
                                                        $.each(response.errors, function(key, value) {
                                                            var fieldId = key; // Assuming keys match input IDs
                                                            var errorsContainer = $('#' + fieldId + 'Error');

                                                            // Clear previous errors
                                                            errorsContainer.empty();

                                                            // Append the error message to the container
                                                            errorsContainer.append('<label class="alert alert-danger">' + value +
                                                                '</label>');

                                                        });

                                                    }
                                                },
                                                headers: {
                                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                }
                                            });
                                        }
                                    </script>
                                </div>



                                </li>

                                {{-- modal to add empoyee --}}
                                <li class="nav-item">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#Modal">
                                        Add Employee
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal text-dark" id="Modal" tabindex="-1" role="dialog"
                                        aria-labelledby="ModalLabel">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="ModalLabel">Add EMployee</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h1 class=" border='1' text-dark "> Add Employee</h1>


                                                    <form id="form2Data" enctype="multipart/form-data" method="post"
                                                        onsubmit="addEmployee(event)">

                                                        @csrf
                                                        <label class="text-dark" for="name">FirstName:</label>
                                                        <input class="dropdown-item text-dark" type="text"
                                                            id="empFname" name="empFname" required>
                                                        <label class="text-dark" for="name">LastName:</label>
                                                        <input class="dropdown-item text-dark" type="text"
                                                            id="empLname" name="empLname" required>

                                                        <label class="text-dark" for="email">Email:</label>
                                                        <input class="dropdown-item text-dark" type="email"
                                                            id="compEmail" name="empEmail" required>

                                                        <label class="text-dark" for="phone">Phone</label>
                                                        <input class="dropdown-item text-dark" type="phone"
                                                            id="compLogo" name="empPhone" required>
                                                        <div class="form-floating">

                                                            <select
                                                                class='form-control multiplechose_questionTypes text-dark'
                                                                name='companyId' id='companyId'>
                                                                <option t class="text-dark" value=''disabled
                                                                    selected>Select your option</option>

                                                                @foreach ($company as $r)
                                                                    <option class="mx-3"
                                                                        value="{{ $r->id }}">

                                                                        {{ $r->compName }}
                                                                    </option>
                                                                @endforeach

                                                            </select>

                                                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                                            <link
                                                                href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"
                                                                rel="stylesheet" />

                                                            <!-- Defer the Select2 script to ensure it's loaded before use -->
                                                            <script defer src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

                                                            <script>
                                                                $(document).ready(function() {
                                                                    // Wait until Select2 is defined
                                                                    function initSelect2() {
                                                                        $("#companyId").select2({
                                                                            maximumSelectionLength: 2,
                                                                            dropdownParent: $('#Modal') // Specify the modal as the parent
                                                                        });
                                                                    }

                                                                    // Check if Select2 is defined every 100 milliseconds
                                                                    function checkSelect2() {
                                                                        if (typeof $.fn.select2 === 'undefined') {
                                                                            setTimeout(checkSelect2, 100);
                                                                        } else {
                                                                            initSelect2();
                                                                        }
                                                                    }

                                                                    // Start checking for Select2
                                                                    checkSelect2();
                                                                });
                                                            </script>



                                                        </div>
                                                        
                                                        <div>
                                                            <button class="m-1 btn btn-success" class="dropdown-item "
                                                                type="submit" value="Submit">submit</button>
                                                        </div>
                                                    </form>

                                                    <div> <button class="m-1 btn btn-success" data-dismiss="modal"
                                                            id="modal-dismiss2" class="dropdown-item " type="close"
                                                            value="close">close</button>
                                                    </div>
                                                </div>
                                            
                           
                        </div>

                        </div>

                        {{-- ajax request to show modal dynamically --}}
                        <script>
                            function addEmployee(event) {
                                event.preventDefault();
                                $.ajax({
                                    type: 'POST',
                                    url: 'employee',
                                    data: $('#form2Data').serialize(), // Corrected selector for form data
                                    success: function(response) {

                                        console.log("In AJAX request success callback");
                                        $('#Modal input').val("");

                                        $('#modal-dismiss2').trigger('click');

                                        updateDataOfEmployee();
                                    },
                                    error: function(xhr, status, error) {
                                        console.error('AJAX request failed:', status, error);
                                    },
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                            }
                        </script>
                  


                    </ul>

                    {{-- logout request by ajax --}}
                    <div> <button class=" btn btn-danger" class="dropdown-item " type="submit" value="Log Out"
                            onclick="logout()">Log out</button>

                        <script>
                            function logout() {
                                var xhttp = new XMLHttpRequest(); // Create XMLHttpRequest object

                                xhttp.onreadystatechange = function() {

                                    if (this.readyState == 4) {
                                        if (this.status == 200) {
                                            document.open();
                                            document.write(this.responseText);
                                            document.close(); // Handle the response if needed
                                        } else {
                                            console.error('Error:', this.status);
                                            // Handle errors here
                                        }
                                    }
                                };

                                xhttp.open('GET', 'logout', true); // Specify the POST request to 'company'
                                xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                                xhttp.send(); // Send the request

                            }
                        </script>



                        {{-- MODAL to Edit the Company DATA --}}




                        {{-- AJAX request to update the company data --}}





                        {{-- code to show companies  --}}
                </div>

                </div>
                </nav>

                {{-- update company data modal to update company data --}}

                <!-- Modal -->

                <div class="modal text-dark" id="updateCompanyDataModal" tabindex="-1" role="dialog"
                    aria-labelledby="ModalLabel">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ModalLabel">update Company Data</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h1 class="text-dark">update Company Data</h1>



                                <form id="updateCompanyFormData" enctype="multipart/form-data" class="dropzone"
                                    onsubmit="updateCompanyData(event)">
                                    @csrf


                                    <label id="compNameErro" class="error-message text-dark "
                                        for="name">Name:</label>
                                    <input placeholder=" name" class=" dropdown-item text-dark" type="text"
                                        id="compId" name="id" required>

                                    <label id="compNameErro"
                                        class="error-message text-dark  @error('compName') is-invalid @enderror"
                                        for="name">Name:</label>
                                    <input placeholder=" name" class=" dropdown-item text-dark" type="text"
                                        id="compn" name="compName" required>

                                    <label id="compEmailErro" class="text-dark" for="email">Email:</label>
                                    <input placeholder=" example@gmail.com" class=" dropdown-item text-dark"
                                        type="email" id="compE" name="compEmail" required>



                                    <div name="compLogo" class="dropdown-item dropzone " id="updateCompanyDropzone">
                                        <label id="compLogoErro" class="text-dark" for="compLogo"
                                            class="fallback">Select LOGO</label>
                                        <input id="compL" name="compLogo" hidden required>

                                    </div>

                                    <label id="compWebErro" class="text-dark" for="email">Website</label>
                                    <input placeholder=" https://www.javatpoint.com/"
                                        class="  dropdown-item text-dark " type="url" id="compW"
                                        name="compWeb" required>

                                    <div> <button class=" btn btn-success" type="submit"
                                            value="Submit">submit</button>
                                    </div>
                                   
                                    <div><button class="btn btn-success" id="modal_dismiss_update"
                                            data-bs-dismiss="modal" type="button">close</button>
                                    </div>
                                </form>
                                <form class='p-3 m-3' method='post'  onsubmit="deleteCompanyData()">
                                  @csrf
                                  <input class='mx-3' type='hidden' name='id' value='{{$r->id}}'>
                                      
                                  <td> <button class='btn btn-danger' type='submit' name='action' value='delete'>DELETE</button></td>
                                
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    // Dropzone configuration
                    Dropzone.autoDiscover = false;

                    // Corrected the method invocation here
                    var cLogo = document.getElementById('compL');

                    var companyDropzone = new Dropzone("#updateCompanyDropzone", {
                        paramName: "compLogo",
                        method: "post",

                        url: "{{ route('logo') }}",

                        addRemoveLinks: true,
                        maxFilesize: 2, // MB
                        acceptedFiles: ".png, .jpg, .jpeg",
                        dictDefaultMessage: "Drop logo or click to upload",
                        dictRemoveFile: "delete",
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        init: function() {
                            var _this = this;

                            this.on("complete", function(file) {
                                // Check if the file was successfully uploaded (status 200)

                                // Set the value of the compLogo input to the URL of the uploaded file
                                cLogo.value = file.name;

                                // Remove the uploaded file from Dropzone

                            });
                        }
                    });
                </script>


                <script type="text/javascript">
                  function deleteCompanyData(){
                    event.preventDefault();
                        $.ajax({
                            type: 'POST',
                            url: 'deleteCompany',
                            data: $('#updateCompanyFormData').serialize(), // Corrected selector for form data
                            success: function() {
                                console.log("In AJAX request success callback");

                                $('#modal_dismiss_update').trigger('click');
                                updateData();
                            },
                            error: function(xhr, status, error, response) {
                                console.error('AJAX request failed:', status, error);
                                var response = xhr.responseJSON;
                            }
                              });
                          
                  }

                    function updateCompanyData(event) {
                        event.preventDefault();
                        $.ajax({
                            type: 'POST',
                            url: 'companyUpdate',
                            data: $('#updateCompanyFormData').serialize(), // Corrected selector for form data
                            success: function() {
                                console.log("In AJAX request success callback");

                                $('#modal_dismiss_update').trigger('click');
                                updateData();
                            },
                            error: function(xhr, status, error, response) {
                                console.error('AJAX request failed:', status, error);
                                var response = xhr.responseJSON;

                                // Check if the response contains the "errors" key
                                if (response && response.errors) {
                                    // Iterate over the errors and append them to the corresponding container
                                    $.each(response.errors, function(key, value) {
                                        var fieldId = key; // Assuming keys match input IDs
                                        var errorsContainer = $('#' + fieldId + 'Erro');

                                        // Clear previous errors
                                        errorsContainer.empty();

                                        // Append the error message to the container
                                        errorsContainer.append('<label class="alert alert-danger">' + value +
                                            '</label>');

                                    });

                                }
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                    }
                </script>




                {{-- MODAL to Update the Employees Data --}}


                <div class="modal text-dark" id="updateEmployeeDataModal" tabindex="-1" role="dialog"
                    aria-labelledby="ModalLabel">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ModalLabel">Update Company Data</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h1 class="text-dark">Update Company Data</h1>
                                <form id="updateEmployeeFormData" enctype="multipart/form-data" class="dropzone"
                                    onsubmit="updateEmployeeData(event)">
                                    @csrf
                                    <label class="text-dark" for="ID">ID:</label>
                                    <input id="empId" class="dropdown-item text-dark" type="text"
                                        name="id" required>

                                    <label class="text-dark" for="name">FirstName:</label>
                                    <input id="empFn" class="dropdown-item text-dark" type="text"
                                        name="empFname" required>

                                    <label class="text-dark" for="name">LastName:</label>
                                    <input class="dropdown-item text-dark" type="text" id="empLn"
                                        name="empLname" required>

                                    <label class="text-dark" for="email">Email:</label>
                                    <input class="dropdown-item text-dark" type="email" id="empE"
                                        name="empEmail" required>

                                    <label class="text-dark" for="phone">Phone:</label>
                                    <input class="dropdown-item text-dark" type="phone" id="empP"
                                        name="empPhone" required>


                                    <div class="form-floating">
                                        <select class='form-control multiplechose_questionTypes text-dark'
                                            name='companyId' id='companyIdInUpdate'>
                                            <option class="text-dark" value='' disabled selected>Select your
                                                option</option>
                                            @foreach ($company as $r)
                                                <option class="mx-3" value="{{ $r->id }}">
                                                    {{ $r->compName }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                    <link
                                        href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"
                                        rel="stylesheet" />

                                    <!-- Defer the Select2 script to ensure it's loaded before use -->
                                    <script defer src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                                    <script>
                                        $(document).ready(function() {
                                            // Wait until Select2 is defined
                                            function initSelect2() {
                                                $("#companyIdInUpdate").select2({
                                                    maximumSelectionLength: 2,
                                                    dropdownParent: $('#updateEmployeeDataModal') // Specify the modal as the parent
                                                });
                                            }

                                            // Check if Select2 is defined every 100 milliseconds
                                            function checkSelect2() {
                                                if (typeof $.fn.select2 === 'undefined') {
                                                    setTimeout(checkSelect2, 100);
                                                } else {
                                                    initSelect2();
                                                }
                                            }

                                            // Start checking for Select2
                                            checkSelect2();
                                        });
                                    </script>
                                    <div>
                                        <button class="btn btn-success" type="submit" value="Submit">Submit</button>
                                    </div>
                                    <div>
                                        <button class="btn btn-success" id="modal_dismiss_update_employee"
                                            data-bs-dismiss="modal" type="button">Close</button>
                                    </div>
                                </form>
                                    <form id="deleteEmployee" class='p-3 m-3'  onsubmit="deleteEmployeeData()">
                                        @csrf
                                       <input class='mx-3' type='hidden' id="empIdForDelete" name='id'>
                                       <div>  
                                      <td> <button class='btn btn-danger' type='submit' name='action' value='delete'>DELETE</button></td>
                                    </div>
                                      </form>
                                
                            </div>
                        </div>
                    </div>
                </div>


                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"
                    rel="stylesheet" />

                <!-- Defer the Select2 script to ensure it's loaded before use -->
                <script defer src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

                <script type="text/javascript">
                     function deleteEmployeeData(){
                    event.preventDefault();
                        $.ajax({
                            type: 'POST',
                            url: 'deleteEmployee',
                            data: $('#updateEmployeeFormData').serialize(), // Corrected selector for form data
                            success: function() {
                                console.log("In AJAX request success callback");

                                $('#modal_dismiss_update_employee').trigger('click');
                                updateDataOfEmployee();
                            },
                            error: function(xhr, status, error, response) {
                                console.error('AJAX request failed:', status, error);
                                var response = xhr.responseJSON;
                            }
                              });
                          
                  }
                    
                    function updateEmployeeData(event) {
                        event.preventDefault();
                        
                       
                        $.ajax({
                            type: 'POST',
                            url: 'employeeUpdate',
                            data: $('#updateEmployeeFormData').serialize(), // Corrected selector for form data
                            success: function() {
                                console.log("In AJAX request success callback");

                                $('#modal_dismiss_update_employee').trigger('click');
                                updateDataOfEmployee();
                            },
                            error: function(xhr, status, error, response) {
                                console.error('AJAX request failed:', status, error);
                                var response = xhr.responseJSON;

                                // Check if the response contains the "errors" key
                                if (response && response.errors) {
                                    // Iterate over the errors and append them to the corresponding container
                                    $.each(response.errors, function(key, value) {
                                        var fieldId = key; // Assuming keys match input IDs
                                        var errorsContainer = $('#' + fieldId + 'Erro');

                                        // Clear previous errors
                                        errorsContainer.empty();

                                        // Append the error message to the container
                                        errorsContainer.append('<label class="alert alert-danger">' + value +
                                            '</label>');

                                    });

                                }
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                    }
                </script>








                <div class="container text-center">
                    <div>


                        <h2>COMPANIES LIST</h2>
                        <table id="table1" class=" border='1' bg-light">
                            <thead>
                                <tr class="' border='1' text-secondary">
                                    <th class='mx-3'>ID</th>
                                    <th>company NAME</th>
                                    <th>company Logo</th>
                                    <th>EMAIL</th>
                                    <th>Company Website</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($company as $r)
                                    <tr>
                                        <form id="employeeData" class='p-3 m-3' method='post'
                                            action='updateCompanyLink' enctype='multipart/form-data'>
                                            @csrf
                                            <td><input class='mx-3' type='text' name='id' readonly></td>
                                            <td><input type='text' name='compName' readonly></td>
                                            <td>
                                                <img style='max-width:80px; max-height:80px;'
                                                    src="{{ asset('storage/uploads/' . $r->compLogo) }}"
                                                    alt="Image">
                                            </td>




                                            <td><input type='email' name='compEmail' readonly></td>
                                            <td><input type='url' name='compWeb' readonly></td>
                                            <td><button class='btn btn-danger editBtn' type='submit' name='action'
                                                    value='update'>EDIT</button></td>
                                        </form>

                                    </tr>
                                @endforeach
                            </tbody>

                            {{-- ajax to show data of companies dynamically --}}


                            {{-- //ajax request to load data after the company data when document is ready --}}
                            <script type="text/javascript">
                                var $company;

                                $(document).ready(function() {
                                    $.ajax({
                                        type: 'GET',
                                        url: '/ind',
                                        dataType: "json",
                                        success: function(response) {
                                            $('#table1 tbody').html("");

                                            $.each(response.company, function(key, $r) {
                                                var html =
                                                    '<tr>' +
                                                    '<form class="employeeForm p-3 m-3" method="post" action="updateCompanyLink" enctype="multipart/form-data">' +
                                                    '<td><input class="mx-3" type="text" name="id" value="' + $r.id +
                                                    '" readonly></td>' +
                                                    '<td><input type="text" name="compName" value="' + $r.compName +
                                                    '" readonly></td>' +
                                                    '<td><img style="max-width:80px; max-height:80px;" src="' +
                                                    "{{ asset('storage/uploads/') }}/" + $r.compLogo +
                                                    '" alt="Image"></td>' +
                                                    '<td><input type="email" name="compEmail" value="' + $r.compEmail +
                                                    '" readonly></td>' +
                                                    '<td><input type="url" name="compWeb" value="' + $r.compWebsite +
                                                    '" readonly></td>' +
                                                    '<td><button class="btn btn-danger editBtn" type="button" name="action" value="update" data-id="' +
                                                    $r.id + '"  data-compName="' + $r.compName + '" data-compLogo="' +
                                                    $r.compLogo + '" data-compEmail="' + $r.compEmail +
                                                    '" data-compWebsite="' + $r.compWebsite + '">EDIT</button></td>' +

                                                    '</form>' +
                                                    '</tr>';

                                                $('#table1').append(html);
                                            });

                                            // Event delegation for the "Edit" button
                                            $('#table1').on('click', '.editBtn', function() {
                                                // Retrieve data from the clicked row
                                                // Set the values in the modal based on the row data

                                                var id = $(this).data('id');

                                                var compName = $(this).data('compname');
                                                var compLogo = $(this).data('complogo');
                                                var compWeb = $(this).data('compwebsite');
                                                var compEmail = $(this).data('compemail');
                                                console.log("comp NAme is " + compLogo)
                                                $('#compId').val(id);
                                                $('#compn').val(compName);
                                                $('#compE').val(compEmail);
                                                $('#compW').val(compWeb);
                                                $('#compL').val(compLogo);

                                                // Trigger the modal
                                                $('#updateCompanyDataModal').modal('show');


                                            });
                                        },
                                        error: function(error) {
                                            // Handle errors here
                                            console.error('Error:', error);
                                        }
                                    });
                                });
                            </script>

                            {{-- //ajax request to load data after the company data is inserted --}}
                            <script type="text/javascript">
                                var $company;

                                function updateData() {

                                    $.ajax({
                                        type: 'GET',
                                        url: '/ind',
                                        dataType: "json",
                                        success: function(response) {
                                            $('#table1 tbody').html("");

                                            $.each(response.company, function(key, $r) {
                                                var html =
                                                    '<tr>' +
                                                    '<form class="employeeForm p-3 m-3" method="post" action="updateCompanyLink" enctype="multipart/form-data">' +
                                                    '<td><input class="mx-3" type="text" name="id" value="' + $r.id +
                                                    '" readonly></td>' +
                                                    '<td><input type="text" name="compName" value="' + $r.compName +
                                                    '" readonly></td>' +
                                                    '<td><img style="max-width:80px; max-height:80px;" src="' +
                                                    "{{ asset('storage/uploads/') }}/" + $r.compLogo + '" alt="Image"></td>' +
                                                    '<td><input type="email" name="compEmail" value="' + $r.compEmail +
                                                    '" readonly></td>' +
                                                    '<td><input type="url" name="compWeb" value="' + $r.compWebsite +
                                                    '" readonly></td>' +
                                                    '<td><button class="btn btn-danger editBtn" type="button" name="action" value="update" data-id="' +
                                                    $r.id + '"  data-compName="' + $r.compName + '" data-compLogo="' +
                                                    $r.compLogo + '" data-compEmail="' + $r.compEmail +
                                                    '" data-compWebsite="' + $r.compWebsite + '">EDIT</button></td>' +
                                                    '</form>' +
                                                    '</tr>';

                                                $('#table1').append(html);
                                            });

                                            // Event delegation for the "Edit" button
                                            $('#table1').on('click', '.editBtn', function() {
                                                // Retrieve data from the clicked row
                                                var id = $(this).data('id');

                                                var compName = $(this).data('compname');
                                                var compLogo = $(this).data('complogo');
                                                var compWeb = $(this).data('compwebsite');
                                                var compEmail = $(this).data('compemail');
                                                console.log("comp NAme is " + compLogo)
                                                $('#compId').val(id);

                                                $('#compn').val(compName);
                                                $('#compE').val(compEmail);
                                                $('#compW').val(compWeb);
                                                $('#compL').val(compLogo);

                                                // Trigger the modal
                                                $('#updateCompanyDataModal').modal('show');


                                            });
                                        },

                                        error: function(error) {
                                            // Handle errors here
                                            console.error('Error:', error);
                                        },
                                    });

                                }
                            </script>


                            {{-- //ajax request to load new page to edit company data --}}







                        </table>


                        <table id="table2" class=" border='1' text-secondary bg-light">
                            <h2>Employee Data</h2>
                            <tr class='mx-3'>
                                <th class='mx-3'>ID</th>
                                <th>FIRST NAME</th>
                                <th>LAST NAME</th>
                                <th>EMAIL</th>
                                <th>Phone</th>
                            </tr>
                            <tbody>
                                @foreach ($employee as $row)
                                    <tr>
                                        <form class='p-3 m-3' method="post" action='updateEmployeeLink'
                                            enctype='multipart/form-data'>
                                            @csrf
                                            <td><input class='mx-3' type='text' name='id'readonly></td>
                                            <td><input type='text' name='empFname'
                                                    value='{{ htmlspecialchars($row->empFname) }}'readonly></td>
                                            <td><input type='text' name='empLname'
                                                    value='{{ htmlspecialchars($row->empLname) }}'readonly></td>
                                            <td><input type='email' name='empEmail'
                                                    value='{{ htmlspecialchars($row->empEmail) }}'readonly></td>
                                            <td><input type='phone' name='empPhone'
                                                    value='{{ htmlspecialchars($row->empPhone) }}'readonly></td>
                                            <td><button class='btn btn-danger editBtn2' type='submit' name='action'
                                                    value='update'>EDIT</button></td>


                                        </form>



                                    </tr>
                                @endforeach

                            </tbody>



                            <script type="text/javascript">
                                var $company;

                                $(document).ready(function() {
                                    $.ajax({
                                        type: 'GET',
                                        url: '/ind',
                                        dataType: "json",
                                        success: function(response) {
                                            $('#table2 tbody').html("");

                                            $.each(response.employee, function(key, $row) {
                                                var html =
                                                    '<tr>' +
                                                    '<form id="employeeData" class="p-3 m-3" method="post" action="updateEmployeeLink" enctype="multipart/form-data">' +
                                                    '<td><input class="mx-3" type="text" name="id" value="' + $row.id +
                                                    '" readonly></td>' +
                                                    '<td><input class="mx-3" type="text" name="empFname" value="' + $row
                                                    .empFname + '" readonly></td>' +
                                                    '<td><input type="text" name="empLname" value="' + $row.empLname +
                                                    '" readonly></td>' +
                                                    '<td><input type="email" name="empEmail" value="' + $row.empEmail +
                                                    '" readonly></td>' +
                                                    '<td><input type="url" name="empPhone" value="' + $row.empPhone +
                                                    '" readonly></td>' +
                                                    '<td>' +
                                                    '<button class="btn btn-danger editBtn2" type="button" name="action" value="update" data-id="' +
                                                    $row.id + '"  data-empFname="' + $row.empFname +
                                                    '" data-empLname="' +
                                                    $row.empLname + '" data-empEmail="' + $row.empEmail +
                                                    '" data-empPhone="' + $row.empPhone + '">EDIT</button>' +
                                                    '</td>'


                                                '</form>' +
                                                '</tr>';

                                                $('#table2').append(html);
                                            });

                                            // Event delegation for the "Edit" button
                                            $('#table2').on('click', '.editBtn2', function() {
                                                var empId = $(this).data('id');
                                                var empFname = $(this).data('empfname');
                                                var empLname = $(this).data('emplname');
                                                var empEmail = $(this).data('empemail');
                                                var empPhone = $(this).data('empphone');
                                                console.log("comp NAme is " + empEmail);
                                                $('#empId').val(empId);
                                                $('#empIdForDelete').val(empId);
                                                $('#empFn').val(empFname);
                                                $('#empLn').val(empLname);
                                                $('#empE').val(empEmail);
                                                $('#empP').val(empPhone);
                                               
                                                // Trigger the modal
                                                $('#updateEmployeeDataModal').modal('show');

                                            });
                                        },
                                        error: function(error) {
                                            // Handle errors here
                                            console.error('Error:', error);
                                        },
                                    });
                                });
                            </script>

                        </table>

                        <script>
                            function updateDataOfEmployee() {
                                $(document).ready(function() {
                                    $.ajax({
                                        type: 'GET',
                                        url: '/ind',
                                        dataType: "json",
                                        success: function(response) {
                                            $('#table2 ').html("");
                                            $.each(response.employee, function(key, $row) {
                                                var html =
                                                    '<tr>' +
                                                    '<form id="employeeData" class="p-3 m-3" method="post" action="updateEmployeeLink" enctype="multipart/form-data">' +
                                                    '<td><input id="empId" class="mx-3" type="text" name="id" value="' + $row
                                                    .id + '" readonly></td>' +
                                                    '<td><input id="empFn" class="mx-3" type="text" name="empFname" value="' +
                                                    $row.empFname + '" readonly></td>' +
                                                    '<td><input type="text" name="empLname" value="' + $row
                                                    .empLname + '" readonly></td>' +
                                                    '<td><input type="email" name="empEmail" value="' + $row
                                                    .empEmail + '" readonly></td>' +
                                                    '<td><input type="url" name="empPhone" value="' + $row
                                                    .empPhone + '" readonly></td>' +
                                                    '<td><button class="btn btn-danger editBtn2" type="button" name="action" value="update" data-id="' +
                                                    $row.id + '">EDIT</button></td>' +
                                                    '</form>' +
                                                    '</tr>';

                                                $('#table2').append(html);


                                                // Event delegation for the "Edit" button
                                                // Event delegation for the "Edit" button
                                                $('#table2').on('click', '.editBtn2', function() {
                                                    // Retrieve data from the clicked row
                                                    var empId = $(this).data('id');
                                                var empFname = $(this).data('empFname');
                                                var empLname = $(this).data('empLname');
                                                var empEmail = $(this).data('empEmail');
                                                var empPhone = $(this).data('empPhone');
                                                console.log("comp NAme is " + empEmail);
                                                $('#empId').val(empId);
                                                $('#empFn').val(empFname);
                                                $('#empLn').val(empLname);
                                                $('#empE').val(empEmail);
                                                $('#empP').val(empPhone);

                                                // Trigger the modal
                                                $('#updateEmployeeDataModal').modal('show');

                                                    var id = $(this).data('id');
                                                });

                                            });
                                        },
                                        error: function(error) {
                                            // Handle errors here
                                            console.error('Error:', error);
                                        },
                                    });
                                });

                            }
                        </script>




            </section>
    </div>
    <Section class="section2 py-15%">

        <div class="container text-center">

            <div class="col1">

                <p style="color: coral;"> PORTFOLIO</p>
                <h1 class="header"> Partnering <br> with ambitious <br> entrepreneurs</h1>
            </div>
            <div class="col2 ">
                <div> <img
                        src="https://www.waterlandpe.com/content/uploads/2023/06/LR-Waterland-websiteca1_9303-1200x675.jpg"
                        alt="error"></div>
                <div class= "b-hero__text c-accent c-accent--top">
                    <p> Entrepreneurs come to us to turn their ambitions into reality. We are proud to say that so far,
                        we have supported over 1000 entrepreneurs, propelling their companies to the top of the market.
                        Some have grown to become market leaders in their country, Europe or even the world, while
                        others have gained the necessary experience and expertise to pass the torch on to the next
                        ambitious team.</p>

                    <p> Entrepreneurs come to us to turn their ambitions into reality. We are proud to say that so far,
                        we have supported over 1000 entrepreneurs, propelling their companies to the top of the market.
                        Some have grown to become market leaders in their country, Europe or even the world, while
                        others have gained the necessary experience and expertise to pass the torch on to the next
                        ambitious team.

                        Just taking over a company is not what we do. We create long-lasting partnerships, adding our
                        experience to a company and enriching its strategies to make it stronger. Our team members work
                        with multiple companies, giving them the proper hands-on knowledge to make waves in every
                        industry. Just taking over a company is not what we do. We create long-lasting partnerships,
                        adding our experience to a company and enriching its strategies to make it stronger. Our team
                        members work with multiple companies, giving them the proper hands-on knowledge to make waves in
                        every industry.</p>

                </div>
                <button type="button" class="btn btn-outline-success"
                    style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                    ABOUT WATERLAND
                </button>
                <button type="button" class="btn btn-warning"
                    style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                    DISCOVER ALL COMPANIES
                </button>
            </div>
    </Section>
    <section class="section3">
        <div class="section3_heading sticky">
            <p class="news text-center text-warning p-4">NEWS</p>
            <h1 class="text-center letterspacing">
                <span class="text-center ">In</span>
                <span class="text-center">the</span>
                <span class="text-center">spotlight</span>
            </h1>
        </div>

        <div class="container text-center ">

            <div class="col scrollable">

                <h5 class="p-3">A new top-class IT service provider is born: Waterland <br> portfolio companies MT
                    and <br>GOD join forces</h5>
                <p class="p-3"> Under the aegis of investment company Waterland, which already supports both
                    companies as a growth partner, MT and GOD are…</p>
                <p class="hover-zoom">Read more</p>
            </div>
            <div class="col scrollable">
                <h5 class="p-3">Montronic and Waterland enter into a growth partnership</h5>
                <p class="p-3">Waterland announces its investment in Montronic to build jointly Spain’s leading
                    electronic manufacturing services (EMS) group by means of a…</p>
                <p>Read more</p>

            </div>
            <div class="col scrollable">
                <h5 class="p-3">Waterland-backed accountancy firm, Cooper Parry, acquires Haines Watts London</h5>
                <p class="p-3">Cooper Parry – the fast growing accountancy firm – announced the acquisition of
                    Haines Watts London and its associated audit...</p>
                <p>Read more</p>
            </div>
        </div>


    </section>

    <Section class="section4 py-15%">

        <div class="container text-center">

            <div class="col1">

                <p style="color: coral;">People</p>
                <h1 class="header"> People are the <br> key to success</h1>
            </div>
            <div class="col2  ">
                <div>
                    <video class="video p-2"
                        src="https://www.waterlandpe.com/content/uploads/2023/06/Waterland-CT-Office-Stairs.mp4"></video>
                </div>
                <div> <img class="image_section4 p-2"
                        src="https://www.waterlandpe.com/content/uploads/2023/06/LR-Waterland-websiteca1_9404-1536x1022.jpg"
                        alt="error"></div>
                <div class= "b-hero__text c-accent c-accent--top">
                    <p> Without the ambition of the entrepreneur, the drive of the leadership team, and the work ethic
                        of the employees, a company cannot and will not thrive. Our team understands that and
                        facilitates an environment in which everything aligns: everyone on the same page, shooting for
                        success. Together, we accelerate growth by providing the support and expertise companies need.
                    </p>
                </div>
                <button type="button" class="btn btn-outline-dark"
                    style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                    GET KNOW THE TEAM NOW
                </button>
                <a href="https://www.waterlandpe.com/careers/" class="text-warning px-3">Career Opportunities</a>
            </div>
    </Section>

    <Section class="section5  ">

        <div class="container text-center">

            <div class="col">


                <h1 class="header1 header text-success"> Partner <br> with us</h1>
            </div>
            <div class="col  ">
                <div>

                    <div class= "b-hero__text c-accent c-accent--top">
                        <p class="text-dark"> Do you want to learn more about growth equity investments or private
                            equity investments? Or would you simply like to chat about what we do and how we do it? Feel
                            free to contact us anytime, we are happy to answer your questions!</p>
                    </div>
                    <button type="button" class="btn btn-outline-dark"
                        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                        SHARE YOUR THOUGHTS
                    </button>
                </div>
    </Section>
    <section class="section6 bg-dark p-5">
        <div class="container text-center">
            <div class="row cols-1 cols-sm-2 cols-md-5">
                <div class="col logo_footer">
                    <h5>WATERLAND</h5>
                </div>

                <div class="col-2 px-5">
                    <h6>VISION</h6>

                    <div>
                        <p> Ageing Population Outsourcing & Digitalization Leisure & Luxury Sustainability </p>
                    </div>
                    <h6>MEMBER OF </h6>
                </div>
                <div class="col-2 text-center">
                    <h6> APPROACH</h6> <br>
                    <p> Strategic & Operational
                        Methodology</p>
                </div>
                <div class="col-2 row ">
                    <h6> WATERLAND</h6>
                    <div class="col logo_footer">
                        <p> About Us <br>
                            Offices <br>
                            People <br>
                            Careers
                        </p>
                    </div>
                    <div class="col logo_footer">
                        <p> Newsroom <br>
                            Contact <br>
                            ESG <br>
                            Portfolio</p>
                    </div>
                </div>
                <div class="col-4 px-5">

                    <h6> FOR INVESTORS</h6>
                    <p> Waterland Private Equity Investments B.V. is an Alternative Investment Fund Manager with license
                        number 1500760 issued by the Netherlands Authority for Financial Markets.
                    </p>
                    <p>Sign up here to access our secure Investors Portal. If you have forgotten your login/password,
                        please send a message to
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3">

            </div>
            <div class="col-5">
                <img class="footer_img"
                    src="https://www.waterlandpe.com/content/uploads/2022/03/invest-europe-200x123.png"
                    alt="">
                <img class="footer_img"src="https://www.waterlandpe.com/content/uploads/2023/03/level20-200x193.jpg"
                    alt="">
                <img class="footer_img"src="https://www.waterlandpe.com/content/uploads/2022/03/BVCA_logo_Colour-200x83.png"
                    alt="">
                <img class="footer_img"
                    src="https://www.waterlandpe.com/content/uploads/2022/03/azg-logo-nl-200x84.png" alt="">
                <img class="footer_img"
                    src="https://www.waterlandpe.com/content/uploads/2022/03/logo-ivca-main-200x200.png"
                    alt="">

            </div>
            <div class="col-4 ">
                <h6 class="px-3">Investors portal</h6>

                <h4 class="follow">FOLLOW US</h4>
            </div>
        </div>

    </section>
    <footer class="bg-dark">
        <div class="row">
            <div class="col-3">
                <p class="all_rights"> © 2023 Waterland. All rights reserved </p>
            </div>
            <div class="col-5"></div>
            <div class="col-4">
                <p>Modern Slavery Statement
                    Disclaimer & Privacy Statement
                    Speak Up!</p>
            </div>
        </div>
    </footer>
    <script src="index.js"></script>
    @endif

    @if (session('user') == 0)
        <script>
            var xhttp = new XMLHttpRequest(); // Create XMLHttpRequest object

            xhttp.onreadystatechange = function() {

                if (this.readyState == 4) {
                    if (this.status == 200) {
                        document.open();
                        document.write(this.responseText);
                        document.close(); // Handle the response if needed
                    } else {
                        console.error('Error:', this.status);
                        // Handle errors here
                    }
                }
            };

            xhttp.open('GET', 'login', true); // Specify the POST request to 'company'
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhttp.send(); // Send the request
        </script>
    @endif
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script>
        // Dropzone configuration
        Dropzone.autoDiscover = false;

        // Corrected the method invocation here
        var cLogo = document.getElementById('compLog');

        var companyDropzone = new Dropzone("#companyDropzone", {
            paramName: "compLogo",
            method: "post",

            url: "{{ route('logo') }}",

            addRemoveLinks: true,
            maxFilesize: 2, // MB
            acceptedFiles: ".png, .jpg, .jpeg",
            dictDefaultMessage: "Drop logo or click to upload",
            dictRemoveFile: "delete",
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            init: function() {
                var _this = this;

                this.on("complete", function(file) {
                    // Check if the file was successfully uploaded (status 200)

                    // Set the value of the compLogo input to the URL of the uploaded file
                    cLogo.value = file.name;

                    // Remove the uploaded file from Dropzone
                    _this.removeFile(file);
                });
            }
        });
    </script>









    {{-- 
<script type="text/javascript">
  var $company;
  $(document).ready(function () {
    updateData();

    function updateData() {
      console.log("here in ready function");
      $(document).ready(function () {
        $.ajax({
          type: 'GET',
          url: '/ind',
          dataType: "json",
          success: function (response) {
            $company = response.company;
            displayData(); // Call the function to display data after receiving it
          },
          error: function (error) {
            // Handle errors here
            console.error('Error:', error);
          },
        });
      });
    }

    function displayData() {
      // Clear existing rows
      $('#employeeData tr:gt(0)').remove();

      // Add new rows based on the received data
      $company.forEach(function (company) {
        var newRow = "<tr>" +
          "<td><input class='mx-3' type='text' name='id' value='" + company.id + "' readonly></td>" +
          "<td><input type='text' name='compName' value='" + company.compName + "' readonly></td>" +
          "<td><img style='max-width:80px; max-height:80px;' src='" + company.compLogo + "' alt='Image'></td>" +
          "<td><input type='email' name='compEmail' value='" + company.compEmail + "' readonly></td>" +
          "<td><input type='url' name='compWeb' value='" + company.compWebsite + "' readonly></td>" +
          "<td><button class='btn btn-danger' type='button' onclick='editCompany(" + company.id + ")'>EDIT</button></td>" +
          "</tr>";
        $('#employeeData tbody').append(newRow);
      });
    }

    // Function to handle edit button click
    function editCompany(id) {
      // Implement the logic to handle edit
      console.log('Edit company with ID:', id);
    }
  });
</script> --}}









</body>

</html>
