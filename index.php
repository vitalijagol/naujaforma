<?php
  if($_SERVER["REQUEST_METHOD"] =='POST'){
      if(strlen($_POST['name'])<4) {
        $error = "Name must be at least 4 characters.";
      }
      if(strlen($_POST['username'])<5) {
        $error = "Username must be at least 5 characters.";
  }
      else {
      $success = "Info submitted successfully.";  
      $file = 'naujaforma.txt';
      $previousData = file_get_contents($file);
      $postData = $_POST['name']." ".$_POST['surname']." ".$_POST['username']." ".$_POST['email']." ".$_POST['streetname']." ".$_POST['city']." ".$_POST['phone']." ". "\r\n";
      file_put_contents($file, $previousData.$postData );

$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "mano_duombaze";


$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";

      $sql = "
      INSERT INTO naujaforma (name, surname, username, email, streetname, city, phone) 
      VALUES ('".$_POST['name']."', '".$_POST['surname']."', '".$_POST['username']."', '".$_POST['email']."', 
      '".$_POST['streetname']."', '".$_POST['city']."', '".$_POST['phone']."')
      ";

// echo '<br>'.$sql.'<br>';

if (mysqli_query($conn, $sql)) {
    // echo "New record created successfully";
} 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
  }
}
?>


<html>
  <head> 	
    <title>New Form</title> 	
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" 
      integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous"> 
  </head> 
  <body> 	
    <div class="container"> 		
      <H1> New Form</H1> 	
        <div class="row"> 	
     		  <div class="col-4">           
              <?php 
              if(isset($error)) {
                echo '<div class="aler alert-danger"><p style="padding: 10px">'.$error.'</p></div>';
              }     
              elseif(isset($success)) {
                echo '<div class="alert alert-success"><p styke="padding: 10px">'.$success.'</p></div>';
              }    
              ?> 	
              <form method="POST" action="">  	
    			      <div class="form-group"> 		
    	            <label for="name">Name</label>                       
                    <input name="name" type="text" class="form-control"> 				  
                </div>
                <div class="form-group"> 		
    	            <label for="surname">Surname</label>                       
                    <input name="surname" type="text" class="form-control" required> 				  
                </div>  
                <div class="form-group"> 		
    	            <label for="username">Username</label>                       
                    <input name="username" type="text" class="form-control" required> 				  
                </div>  				   				 
                <div class="form-group"> 				   
                  <label for="email">Email</label> 				    
                  <input name="email" type="email" class="form-control" id="email" required> 				  
                </div>  
                <div class="form-group"> 		
    	            <label for="streetname">Street Name</label>                       
                    <input name="streetname" type="text" class="form-control"> 				  
                </div>  
                <div class="form-group"> 		
    	            <label for="city">City</label>                       
                    <input name="city" type="text" class="form-control"> 				  
                </div>  
                <div class="form-group"> 				   
                  <label for="phone">Phone</label> 				    
                  <input name="phone" type="text" class="form-control" id="phone"> 				  
                </div> 				
            <button name="submit" type="submit" class="btn btn-primary">submit</button>  				
        </form> 			
      </div>
    </body>
</html>