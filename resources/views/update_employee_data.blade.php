<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('cdn')
    <title>Employee  management system</title>
</head>
<body>


</table> 
<table class=" border='1'">  
   <h2>Employee Data</h2>  
<tr class='mx-3'><th class='mx-3'>ID</th><th>FIRST NAME</th><th>LAST NAME</th><th>EMAIL</th><th>Phone</th></tr>  
@foreach($employee as $row) 



 <tr> 
        <form class='p-3 m-3' method="POST" action='employeeUpdate' enctype='multipart/form-data'>
                   @csrf
                  <td><input class='mx-3' type='text' name='id' value='{{htmlspecialchars($row->id)}}'></td>
                  <td><input type='text' name='empFname' value='{{htmlspecialchars($row->empFname)}}' ></td>
                  <td><input type='text' name='empLname' value='{{htmlspecialchars($row->empLname)}}' ></td>
                  <td><input type='email' name='empEmail' value='{{htmlspecialchars($row->empEmail)}}'></td>
                  <td><input type='phone' name='empPhone' value='{{htmlspecialchars($row->empPhone)}}'></td>

                  <td><button class='btn btn-danger' type='submit' name='action' value='update'>Update</button></td>
                 </form>
               <form class='p-3 m-3' method='post' action='deleteEmployee'>
                @csrf
               <input class='mx-3' type='hidden' name='id' value='{{($row->id)}}'>
               
              <td> <button class='btn btn-danger' type='submit' name='action' value='delete'>DELETE</button></td>
         
              </form>
             
              
              
              </tr>  
              
     
          @endforeach


  
    </table>   
</body>
</html>