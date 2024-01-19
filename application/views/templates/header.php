<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1stproj</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand" href="<?php echo base_url(); //redirect to the homepage/dashboard ?>home">1stproj - <small >School Management System</small></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); //url for homepage/dashboard ?>home">Home 
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); //url for about page  ?>about">About</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); //url for blogs page?>posts">Blogs</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); //url for blogs page?>students">Students</a>
                    </li>
                </ul>
            </div>
            <div class="position-absolute bottom-5 end-0 col-1">
                <button class="btn btn-danger text-light" type="submit"><a class="text-light" href="Login/logout">Sign out</a> <?php //log out button and kill session ?></button>
            </div>
        </div>
    </nav>
    <br>
    <div class="container">

 