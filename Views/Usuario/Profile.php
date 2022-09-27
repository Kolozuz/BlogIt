<?php 
include_once '../Inc/userHeader.php';

// foreach ($userinfo as $user_u){}
?>

<div class="container-fluid text-center">
    <div class="row">
        <h2>My Profile</h2>
    </div>
    <div class="row text-dark">
        <div class="col-md-6 form-floating ">
            <input type="text" value="<?php echo $_SESSION['username_login'] ?>" id="username_u" name="username_u" placeholder="Username" class="form-control  align-self-center" disabled readonly>
            <label for="username_u">Username</label>
        </div>
        <div class="col">
            <button class="btn btn-warning">Modify</button>
        </div>
    </div>
</div>

<?php include_once '../Inc/userFooter.php' ?>
