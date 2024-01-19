<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1stproj</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
        <div class="container position relative position-absolute top-50 start-50 translate-middle">
            <div id="login" class="border position-absolute top-50 start-50 translate-middle shadow-lg p-3 mb-5 bg-body-tertiary rounded" style="width:30rem;">
                <br><br>
                <div class="container">
                    <div id="login-row" class="row justify-content-center align-items-center">
                        <div id="login-column" class="col-md-9">
                            <div id="login-box" class="col-md-12">
                                <?php echo isset($error) ? $error : ''; // credential errors ?>
                                <form id="login-form" class="form" action="<?php echo site_url('Login/login1'); // action?>" method="post">
                                    <h3 class="text-center text-info">Login</h3>
                                    <div class="form-group">
                                        <label for="username" class="text-info">Username:</label><br>
                                        <input type="text" name="username" id="username" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="text-info">Password:</label><br>
                                        <input type="password" name="password" id="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        
                                        <input type="submit" name="submit" class="btn btn-info btn-md" value="Login">
                                    </div>
                                    <div id="register-link" class="text-right">
                                        <a href="<?php echo site_url('register'); ?>" class="text-info">Register Here</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
   
        </div>
    </body>
</html>