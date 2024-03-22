
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include("cdn")
    <title>EMPLOYEE MANAGEMENT SYSTEM</title>
</head>
<body>
    
    
    

    @if(session('user')==1)

    <div class="row"> 
<div class="col-3"></div>
<div class="col-6  border='1' border border-top border-primary">
            <h1>Add Company</h1>
               
            <form  action="company" method="post" enctype="multipart/form-data" class="dropzone" >
          @csrf
           

                <label id="nameError" class="error-message" for="name">Name:</label>
                <input placeholder=" name" class=" dropdown-item" type="text" id="compname" name="compName" required>
                
                <label for="email">Email:</label>
                <input placeholder=" example@gmail.com" class=" dropdown-item  " type="email" id="compEmail" name="compEmail" required>
          
                
                
                <div name="compLogo" class="dropdown-item dropzone" id="companyDropzone">
                    <label for="compLogo" class="fallback">Select LOGO</label>
                    <input  id="compLog" name="compLogo" hidden required >
           
                 </div>
                 
                <label for="email">Website</label>
                <input placeholder=" https://www.javatpoint.com/" class="  dropdown-item " type="url" id="compWeb" name="compWeb" required>
    
               <button class=" btn btn-success"><input class="    " type="submit" value="Submit" onclick="validate()"></button>
            
            </form>
            <div class="col-3"></div>
        </div>
    </div>
    </div>
    

    <script>
        function validate(){
            var nameError = document.getElementById("nameError");
var x=nameError.innerHTML;
            var name=document.getElementById('compname').validate;
    
    if (name==null || name==""){  
    nameError.innerHTML=x+"  required";  
    return false;  
        }}
       
      var xhttp = new XMLHttpRequest(); // Create XMLHttpRequest object
      
      xhttp.onreadystatechange = function() {
       
          if (this.readyState == 4) {
              if (this.status == 200) {
                document.open();
      document.write(this.responseText);
      document.close();  // Handle the response if needed
              } else {
                  console.error('Error:', this.status);
                  // Handle errors here
              }
          }
      };

      xhttp.open('POST', 'company', true); // Specify the POST request to 'company'
      xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhttp.send(); // Send the request
    
  

        // Dropzone configuration
        Dropzone.autoDiscover = false;

        // Corrected the method invocation here
        var cLogo = document.getElementById('compLog');
        
        var companyDropzone = new Dropzone("#companyDropzone", {
            paramName: "compLogo",
            method:"post",
            
            url: "{{route('logo')}}",
            
            addRemoveLinks: true,
            maxFilesize: 2, // MB
                acceptedFiles: ".png, .jpg, .jpeg",
            dictDefaultMessage: "Drop logo or click to upload",
            dictRemoveFile: "delete",
            headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    },
            init: function () {
                var _this = this;

                this.on("complete", function (file) {
                    // Check if the file was successfully uploaded (status 200)
                    
                    // Set the value of the compLogo input to the URL of the uploaded file
                    cLogo.value = file.name;

                    // Remove the uploaded file from Dropzone
                    _this.removeFile(file);
                });
            }
        });


        
    </script>  
        @endif
@if(session('user') == 0)
<script>
      var xhttp = new XMLHttpRequest(); // Create XMLHttpRequest object
      
      xhttp.onreadystatechange = function() {
       
          if (this.readyState == 4) {
              if (this.status == 200) {
                document.open();
      document.write(this.responseText);
      document.close();  // Handle the response if needed
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
        
</body>
</html>