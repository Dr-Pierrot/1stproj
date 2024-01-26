<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1stproj</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/chat-style.css">
</head>

<body>

    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary py-4 ">
        <div class="container px-5 ">
            <a class="navbar-brand font-monospace" href="<?php echo base_url(); //redirect to the homepage/dashboard ?>home">1stproj - <small >School Management System</small></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); //url for homepage/dashboard ?>home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); //url for about page  ?>about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); //url for blogs page?>posts">Blogs</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); //url for students page?>students">Students</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); //url for chats page?>chats">Chats</a></li>
                </ul>
            </div>
            <div class="position-absolute bottom-5 end-0 col-2">
                <div class="row">
                    <div class="col-6 d-flex align-items-center">
                        <h6 class="text-light font-monospace">Hi! <?php echo $_SESSION['user']['username'];  ?> </h6>
                    </div>
                    <div class="col-6">
                        <a class="text-light btn btn-danger" href="Login/logout">Sign out</a> <?php //log out button and kill session ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <br>
    <div class="container">
    

 