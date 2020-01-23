<?php
  require_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" type="image/x-icon" href="p.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="bootstrap.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="j.css">
<link rel="stylesheet" type="text/css" href="style1.css">
<link rel="stylesheet" type="text/css" href="login.php">

<body>

        <?php

            //$name=$email=$password=$confirmpass="";

          if(isset($_POST['submit'])){
            $name= $_POST['name'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            //$password=md5($data['password']);
            //$confirmpass=md5($data['confirmpass']);
            $confirmpass=$_POST['confirmpass'];
            if(strlen($name)<3){
              //$msg="<div class='alert alert-danger'>
              //<strong>Error!</strong>name is too short</div>";
              //return $msg;
              $error_msg['name']='<p style="color:red">name is too short</p>';
            }
            else if(strlen($password)<4){
              $error_msg['password']='<p style="color:red">password is too short</p>';
            }
            else if($password != $confirmpass){
              $error_msg['pass3']='<p style="color:red">*pass does not match</p>';
              //echo '<p style="color:red">passwords do not matched</p>';
              //$error_msg['pass3']=echo;
            }
            else{
              $sql = "INSERT INTO user
            (name, email, password, confirmpass) 
            VALUES(?,?,?,?)";
            
            $stmtinsert=$db->prepare($sql);
            $result=$stmtinsert->execute
            ([$name, $email, $password, $confirmpass]);
            }

                    
          }
        ?>



  <nav class="navbar navbar-dark navbar-expand-md fixed-top sticky">
          <div class="container">
             <div class="logo">
      <a href="index.php" class="navbar-brand"><i class="fas fa-desktop p-1"></i>
        CPGPR
      </a>
       </div>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" class="active"
            href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"
            href="index.php">about</a>
          </li>
          <!--li class="nav-item">
            <a class="nav-link"
            href="#home-section">contact</a>
          </li-->
          <li class="nav-item">
            <a class="nav-link"
            href="index.php">Explore</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"
            href="reg.php">Sign Up</a>
          </li>
        </ul>
        <form class="form-inline ml-auto">
        <input class="form-control" type="text" placeholder="Search">

        <button class="btn btn-dark">
          search
        </button>
      </form>
    </div>
      </div>
      
     
  </nav>

  
    <div class="container pt-5">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign Up</h5>
            <form class="form-signin" action="reg.php" method="post">
              <div class="form-label-group">
                <input type="name" id="inputName" name="name" class="form-control" placeholder="Name" required autofocus>
                <label for="inputName">Name</label>
                <?php
                 
                  if (isset($error_msg['name'])) {
                      echo "<div class='error'>" .$error_msg['name']. "</div>";
                  }
                  
                 ?>
              </div>
              <div class="form-label-group">
                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
                <label for="inputEmail">Email address</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
                <?php
                 
                  if (isset($error_msg['password'])) {
                      echo "<div class='error'>" .$error_msg['password']. "</div>";
                  }
                  
                 ?>
              </div>
              <div class="form-label-group">
                <input type="password" id="inputConfirmPassword" name="confirmpass" class="form-control" placeholder="Confirm Password" required>
                <label for="inputConfirmPassword">Confirm Password</label>
                <?php
                 
                  if (isset($error_msg['pass3'])) {
                      echo "<div class='error'>" .$error_msg['pass3']. "</div>";
                  }
                  
                 ?>
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" id="submit" name="submit">Sign Up</button>
              <hr class="my-4">

              <p>
                          Already a number?<a href="signin.php"> Sign in</a>
                        </p>
              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script type="text/javascript">
  $(function(){
    $('#submit').click(function(e){
      var valid = this.form.checkValidity();
      if(valid){
      var name   = $('#inputName').val();
      
      var email     = $('#inputEmail').val();
      
      var password  = $('#inputPassword').val();

      var confirmpass=$('#inputConfirmPassword').val();
      
        e.preventDefault(); 
        $.ajax({
          type: 'POST',
          url: 'process.php',
          //data: {inputName: inputName,inputEmail: inputEmail,
           // inputPassword: inputPassword,inputConfirmPassword:inputConfirmPassword},
          success: function(data){
          Swal.fire({
                'title': 'Successful',
                'text': data,
                'type': 'success'
                })
              
          },
          error: function(data){
            Swal.fire({
                'title': 'Errors',
                'text': 'There were errors while saving the data.',
                'type': 'error'
                })
          }
        });
        
      }else{
        
      }
      
    });   
    
  });
  
</script-->
</body>
</html>