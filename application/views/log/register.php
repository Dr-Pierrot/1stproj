<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1stproj</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body>
    <div class="container">
        <div class="row main">
            <div class="panel-heading">
                <div class="panel-title text-center">
                    <h1 class="title"><?= $title ?></h1>
                    <hr/>
                </div>
                <?php echo form_open('register',['name'=>'userregistration','autocomplete'=>'off']);?>
                <div class="form-group">
                <!--success message -->
                <?php if($this->session->flashdata('success')){?>
                <p style="color:green"><?php  echo $this->session->flashdata('success');?></p>	
                <?php } ?>
                
                <!--error message -->
                <?php if($this->session->flashdata('error')){?>
                <p style="color:red"><?php  echo $this->session->flashdata('error');?></p>	
                <?php } ?>
            </div> 
            <div class="main-login main-center">
        
                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label">Your Fullname</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <!-- <input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name"/> -->
                            <?php echo form_input(['name'=>'fullname','class'=>'form-control','value'=>set_value('fullname'),'placeholder'=>'Enter First Name']);?>
                            <?php echo form_error('fullname',"<div style='color:red'>","</div>");?>
                        </div>   	
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="cols-sm-2 control-label">Your Email</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                            <!-- <input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/> -->
                            <?php echo form_input(['name'=>'emailid','class'=>'form-control','value'=>set_value('emailid'),'placeholder'=>'Enter your Email']);?>
                            <?php echo form_error('emailid',"<div style='color:red'>","</div>");?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="username" class="cols-sm-2 control-label">Username</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                            <!-- <input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Username"/> -->
                            <?php echo form_input(['name'=>'username','class'=>'form-control','value'=>set_value('username'),'placeholder'=>'Enter your Username']);?>
                            <?php echo form_error('username',"<div style='color:red'>","</div>");?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="cols-sm-2 control-label">Password</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <!-- <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/> -->
                            <?php echo form_password(['name'=>'password','class'=>'form-control','value'=>set_value('password'),'placeholder'=>'Enter your Password']);?>
                            <?php echo form_error('password',"<div style='color:red'>","</div>");?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <!-- <input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your Password"/> -->
                            <?php echo form_password(['name'=>'confirmpassword','class'=>'form-control','value'=>set_value('confirmpassword'),'placeholder'=>'Password']);?>
                            <?php echo form_error('confirmpassword',"<div style='color:red'>","</div>");?>
                        </div>
                    </div>
                </div>

                <div class="form-group ">
                    <!-- <button type="button" class="btn btn-primary btn-lg btn-block login-button">Register</button> -->
                    <?php echo form_submit(['name'=>'insert','value'=>'Register','class'=>'btn btn-primary btn-lg btn-block login-button']);?>
                </div>
                <div class="form-group">
                    <a href="<?php echo base_url(); ?>" class="btn btn-primary btn-lg btn-block login-button">Login</a>
                </div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</body>
</html>