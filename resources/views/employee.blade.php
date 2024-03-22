
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include("cdn")
    <title>EMPLOYEE MANAGEMENT SYSTEM</title>
</head>
<body>
  @if(session('user')==1)

<div class="row">
    <div class="col-3"></div>
    <div class="col-6 border border='3' border-success">
   <h1 class=" border='1' "> Add Employee</h1>


    <form action="employee" method="post">

@csrf
        <label for="name">FirstName:</label>
        <input class="dropdown-item" type="text" id="empFname" name="empFname" required>
        <label for="name">LastName:</label>
        <input  class="dropdown-item" type="text" id="empLname" name="empLname" required>

        <label for="email">Email:</label>
        <input class="dropdown-item" type="email" id="compEmail" name="empEmail" required>

        <label for="phone">Phone</label>
        <input class="dropdown-item" type="phone" id="compLogo" name="empPhone" required>
        <div class="form-floating">
            
        <select class='form-control multiplechose_questionTypes' name='companyId' id='companyId'>
         <option value='' disabled selected>Select your option</option>

@foreach ($company as $r) 
 <option class="mx-3" value="{{($r->id)}}">

    {{($r->compName)}}
    </option>
  @endforeach

</select>



  </div>
      <button class=" btn btn-success"><input class="dropdown-item " type="submit"
                    value="Submit"></button>
    </form>
</ul>
<div class="col-3"></div>
</div>
</div>
</div>
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
