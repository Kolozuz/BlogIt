<!DOCTYPE html>
<html lang="ES">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- BootStrap Compressed CSS -->
    <link rel="stylesheet" href="../Public/Css/bootstrap.min.css" crossorigin="anonymous">

    <!-- BootStrap Compressed JavaScript -->
    <script src="../Public/Js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <!-- Custom StyleSheet -->
    <link rel="stylesheet" href="../Public/Css/style.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,700;1,300;1,400&display=swap" rel="preload" as="font">

    <title>Blog-It</title>
</head>
<body class="bg-dark text-light">
    <header class="bg-light">
        <nav class="navbar navbar-expand-sm ">
            <div class="container-fluid">
                <a href="#" class="navbar-brand ">
                    <img src="../Public/Img/light_logo.png" alt="..." width="150vh" class="d-inline-block align-text-top">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item text-light"><a class="nav-link active" aria-current="page" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">FAQ</a></li>
                        
                    </ul>
                    <span class="nav-item mx-4">
                        <select name="language" id="language" class="form-select bg-light ">
                            <option value="en">English</option>
                            <option value="es">Spanish</option>
                        </select>
                    </span>
                    <a href="UsersController.php?action=profile">
                        <img src="../Public/Img/pfpsunken+.png" alt="" class="rounded-circle" width="65vh">
                    </a>
                </div>
            </div>
        </nav>
    </header>