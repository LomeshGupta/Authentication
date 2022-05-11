<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title> Registration </title>
</head>
    <style>
        label.filebutton>input{
            display: none;
        }

        label.filebutton>img{
            position: relative;
            text-align: center;
            border: 0px solid grey;
            border-radius: 50%;
        }

        label.filebutton{
            position: relative;
            text-align: center;
            left: 28%;
        }

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
        #title{
            text-align: center;
        }

    </style>

<script>
    function preview() {
   img.src=URL.createObjectURL(event.target.files[0]);
    }
</script>

<body style="background-color:#F2F3F4;">
    <div class="container mt-5" >
        <div class="row justify-content-md-center">
            <div class="col-5" style="width: 40%; background-color:#ddd">
                <h2 id="title">Register User</h2>
                <?php if(isset($validation)):?>
                <div class="alert alert-warning">
                   <?= $validation->listErrors() ?>
                </div>
                <?php endif;?>
                <form enctype="multipart/form-data" action="<?php echo base_url(); ?>/SignupController/store" method="post" >
                    <?= csrf_field() ?>

                    <div class="form-group mb-3">
                         <label class="filebutton">
                            <img id="img" src="https://freesvg.org/img/abstract-user-flat-4.png" width="200" height="200">
                            <input type="file" name="file" class="form-control" accept="image/*" onchange="preview();"></label>
                        
                    </div>
                    <div class="form-group mb-3" style="text-align: center;">
                        <label>upload profile pic</label>
                    </div>

                    <div id="img" class="form-group mb-3">
                        <input type="text" name="name" placeholder="Name" value="<?= set_value('name') ?>" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" class="form-control" >
                    </div>

                    <div class="form-group mb-3">
                        <input type="password" name="password" placeholder="Password" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="confirmpassword" placeholder="Confirm Password" class="form-control" >
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark">Signup</button>
                    </div>
                </form>
                <button class="button" onclick="window.location.href = '/delete';">Already Signed up? Sign in</button>
            </div>
        </div>
    </div>
<script>
  $(function(){
    $("#file").change(function(event){
        var x = URL.createObjectURL(event.target.files[0]);
        $("#upload-img").attr("src",x);
        console.log(event);
    });
  });
</script>
</body>
</html>