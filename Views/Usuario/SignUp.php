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

    <title>BlogIt <?php echo ' | Sign Up'; ?></title>
</head>
<body class="bg-dark text-light">
    <div class="container-fluid text-center my-auto">
        <div class="container">
            <form action="UsersController.php" method="post" class="needs-validation" novalidate>
                <div class="row my-4">
                    <h2>Sign Up</h2>
                </div>
                <div class="text-dark mx-5 px-5">
                    <div class="row form-floating mx-5 my-4">
                        <input type="hidden" name="action" value="signup">
                        <input type="email" id="email_signup" name="email_signup" class="form-control" placeholder="Username" required>
                        <label for="email_signup">Email</label>
                        <div class="invalid-feedback">
                            You have to type a valid e-mail
                        </div>
                        <!-- <div class="valid-feedback">That's seems right!</div> -->
                    </div>
                    <div class="row form-floating mx-5 my-4">
                        <input type="text" id="username_signup" name="username_signup" class="form-control" placeholder="Username" required>
                        <label for="username_signup">Username</label>
                        <div class="invalid-feedback">
                            You have to type a valid username
                        </div>
                        <!-- <div class="valid-feedback">That's seems right!</div> -->
                    </div>
                    <div class="row form-floating mx-5 my-4">
                        <input type="password" id="password_signup" name="password_signup" class="form-control" placeholder="Password" required>
                        <label for="password_signup">Password</label>
                        <div class="invalid-feedback">
                            You have to type a valid password
                        </div>
                        <!-- <div class="valid-feedback">That's seems right!</div> -->
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
    <script>
        // JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
                }, false)
            })
            })()
    </script>
</body>
</html>