<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('cdn')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Employee  management system</title>
</head>
<body>
    <h2>COMPANIES LIST</h2>
<table class=" border='1'"> 
        
 <tr  class="' border='1'"><th class='mx-3'>ID</th><th>company NAME</th><th>company Logo</th> <th>EMAIL</th><th>Company Website</th></tr> 
     
@foreach($company as $r)
    
         <tr> 
         <form class='p-3 m-3' method='post' action='companyUpdate' enctype='multipart/form-data'> 
            @csrf
         <td><input class='mx-3' type='text' name='id' value=' {{ htmlspecialchars($r->id)}}'></td> 
         <td><input type='text' name='compName' value='{{ htmlspecialchars($r->compName)}}'></td> 
         
            <td>
                <img style='max-width:80px; max-height:80px;' src="{{ asset('storage/uploads/' . $r->compLogo) }}" alt="Image">
            </td>
            <td>
                <div class='dropzone fallback' id='updateDropzone{{ $r->id }}'>
                    <label name='compLogo' for='compLogo' class='fallback'></label>
                    <input id='compLog{{ $r->id }}' name='compLogo' value='{{ $r->compLogo }}' hidden>
                </div>
            </td>
         <td><input type='email' name='compEmail' value='{{ htmlspecialchars($r->compEmail)}}'></td> 
         <td><input type='url' name='compWeb' value='{{ htmlspecialchars($r->compWebsite)}}'></td> 
         <td><button class='btn btn-danger' type='submit' name='action' value='update'>update</button></td> 
         </form> 
         <form class='p-3 m-3' method='post' action='deleteCompany'>
            @csrf
            <input class='mx-3' type='hidden' name='id' value='{{$r->id}}'>
                
            <td> <button class='btn btn-danger' type='submit' name='action' value='delete'>DELETE</button></td>
          
            </form>
         </tr> 
    
         <script>
            // Dropzone configuration
            Dropzone.autoDiscover = false;
    
            // Corrected the method invocation here
            var cLogo = document.getElementById('compLog{{ $r->id }}');
            console.log(cLogo);
            var companyDropzone = new Dropzone('#updateDropzone{{ $r->id }}', {
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
      
         @endforeach
   
     </table>


    
</body>
</html>