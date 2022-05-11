<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        button {
          border: none;
          outline: 0;
          display: inline-block;
          margin: 0px;
          padding: 8px;
          color: white;
          background-color: darkred;
          text-align: center;
          cursor: pointer;
          width: 100%;
          font-size: 18px;
        }
    </style>
    <title>Login with Email/Password</title>
  </head>
  <body>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-5">
                
                <h2>Login in</h2>
                
                <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-warning">
                       <?= session()->getFlashdata('msg') ?>
                    </div>
                <?php endif;?>
                <form enctype="multipart/form-data" action="<?php echo base_url(); ?>/SigninController/loginAuth" method="post">
                    <?= csrf_field() ?>
                    <div class="form-group mb-3">
                        <input type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="password" placeholder="Password" class="form-control" >
                    </div>
                    
                    <div class="d-grid">
                         <button type="submit" class="btn btn-success">Signin</button>
                    </div>     
                </form>
                <button class="button" onclick="window.location.href = '/signup';">Not a user? SignUp</button>
                
            </div>
              
        </div>
    </div>
  </body>
</html>