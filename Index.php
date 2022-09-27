<!DOCTYPE html>
<html lang="ES">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- BootStrap Compressed CSS -->
    <link rel="stylesheet" href="Public/Css/bootstrap.min.css" crossorigin="anonymous">

    <!-- BootStrap Compressed JavaScript -->
    <script src="Public/Js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <!-- Custom StyleSheet -->
    <link rel="stylesheet" href="Public/Css/style.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,700;1,300;1,400&display=swap" rel="preload" as="font">

    <title>Blog-It</title>
</head>
<body class="bg-dark">
    <header class="bg-light">
        <nav class="navbar navbar-expand-sm ">
            <div class="container-fluid">
                <a href="#" class="navbar-brand ">
                    <img src="Public/Img/light_logo.png" alt="..." width="150vh" class="d-inline-block align-text-top">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item text-light"><a class="nav-link active" aria-current="page" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">FAQ</a></li>
                        
                    </ul>
                    <span class="nav-item">
                        <select name="language" id="language" class="form-select bg-light">
                            <option value="en">English</option>
                            <option value="es">Spanish</option>
                        </select>
                    </span>
                    <form action="Controllers/UsersController.php?action=login" method="post" class="mx-4">
                        <input type="submit" class="btn btn-light" value="Login" >
                    </form>
                    <form action="Controllers/UsersController.php?action=signup" method="post">
                        <input type="submit" class="btn btn-dark" value="Sign Up">
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <main class="container-fluid text-light">
        <div class="row text-center">
            <h2>Create amazing Blogs</h2>
        </div>
        <div class="row">
            <div class="col-md col-sm-12 py-4">
                <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
                    <lord-icon
                        src="https://cdn.lordicon.com/cqthgkoh.json"
                        trigger="loop"
                        colors="primary:#f0f0f0,secondary:#800080"
                        style="width:250px;height:250px">
                    </lord-icon>
            </div>
            <div class="col-md col-sm-12 py-4">
                <lord-icon
                    src="https://cdn.lordicon.com/yqgsldnq.json"
                    trigger="loop"
                    colors="primary:#f0f0f0,secondary:#800080"
                    style="width:250px;height:250px">
                </lord-icon>
            </div>
            <div class="col-md col-sm-12 py-4">
                    <lord-icon
                        src="https://cdn.lordicon.com/lupuorrc.json"
                        trigger="loop"
                        colors="primary:#f0f0f0,secondary:#800080"
                        style="width:250px;height:250px">
                    </lord-icon>
            </div>
            <div class="col-md col-sm-12 py-4">
                    <lord-icon
                        src="https://cdn.lordicon.com/tibisxye.json"
                        trigger="loop"
                        colors="primary:#f0f0f0,secondary:#800080"
                        style="width:250px;height:250px">
                    </lord-icon>
            </div>
            <div class="col-md col-sm-12 py-4">
                    <lord-icon
                    src="https://cdn.lordicon.com/fjrjpdqd.json"
                        trigger="loop"
                        colors="primary:#f0f0f0,secondary:#800080"
                        style="width:250px;height:250px">
                    </lord-icon>
            </div>
        </div>

        
    </main>
    <h6 class="text-white-50">Copyright© 2022 Juan Pablo Morales</h6>
</body>
</html>