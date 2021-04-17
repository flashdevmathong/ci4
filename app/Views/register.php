<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    
   <div class="container mt-4">
   
    <div class="row justify-content-md-center">
    <div class="col-md-6">
      <h1>Sign up</h1>
          <hr>
          <?php
                if(isset($validation))
                {
                    echo '<div class="alert alert-danger">'.$validation->listErrors().'</div>';
                }
          ?>
           <form action="/register/save" method="post">
             <div class="mb-3">
              <label for="">Name</label>
              <input type="text" name="name" class="form-control" id="inputforname" value="<?= set_value('name')?>">
             </div>

             <div class="mb-3">
              <label for="">email</label>
              <input type="email" name="email" class="form-control" id="inputforemail"  value="<?= set_value('email')?>">
             </div>

             <div class="mb-3">
              <label for="">password</label>
              <input type="password" name="password" class="form-control" id="inputforpassword" >
             </div>

             <div class="mb-3">
              <label for="">Confirmpassword</label>
              <input type="password" name="confpassword" class="form-control" id="inputforconfpassword" >
             </div>

             <div class="mb-3">
              <input type="submit" value="Resgiter" class="btn btn-primary" >
             </div>
           </form>
    </div>
    </div>
   </div>


   



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
</body>
</html>