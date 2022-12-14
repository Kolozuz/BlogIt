<!DOCTYPE html>
<html lang="en">
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

    <title>BlogIt <?php echo ' | Login'; ?></title>
</head>
<body class="bg-dark text-light">
    <div class="container-fluid text-center my-auto">
        <div class="container">
            <form action="UsersController.php" method="post" >
                <div class="row my-4">
                    <h2>Log In</h2>
                </div>
                <div class="text-dark mx-5 px-5">
                    <div class="row form-floating mx-5 my-4">
                        <input type="hidden" name="action" value="login">
                        <input type="text" id="username_login" name="username_login" class="form-control" placeholder="Username">
                        <label for="username_login">Username</label>
                    </div>
                    <div class="row form-floating mx-5 my-4">
                        <input type="password" id="password_login" name="password_login" class="form-control" placeholder="Password">
                        <label for="password_login">Password</label>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col">
                        <input type="submit" class="btn btn-success" value="Submit">
                        <a href="../Index.php" class="btn btn-warning">Volver</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>