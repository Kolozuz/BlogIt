<?php 
include '../Inc/userHeader.php';
// var_dump($userinfo);
?>


<div class="container-fluid">
    <form action="<?php echo 'UsersController.php?action=update&id=' . $_SESSION['id_register'] ?>" method="post" id="form">
        <div class="row text-center my-4">
            <h2>My Profile</h2>
        </div>
        <div class="row text-dark my-4">
            <div class="col-md-4 col-sm-12 offset-md-4 form-floating">
                <input type="text" value="<?php echo $_SESSION['username_login'] //. $_REQUEST ?>" id="username_update" name="username_update" placeholder="Username" class="form-control align-self-center " disabled>
                <label for="username_update" class="px-4">Username</label>
            </div>
        </div>
        <div class="row text-dark my-4">
            <div class="col-md-4 col-sm-12 offset-md-4 form-floating">
                <input type="text" value="<?php echo $_SESSION['email_register'] ?>" id="email_update" name="email_update" placeholder="Email" class="form-control align-self-center " disabled>
                <label for="email_update" class="px-4">Email</label>
            </div>
        </div>
        <div class="row text-center my-4">
            <div class="col">
                    <button onclick="updateProfile()" class="btn btn-success" id="btn_confirm" type="button">Confirm Changes</button>
                    <button onclick="deleteProfile()" class="btn btn-danger" id="btn_delete" type="button">Delete Profile</button>
                    <button onclick="changeDisabled()" class="btn btn-warning" id="modify_btn" type="button">Modify</button>

            </div>
        </div>
    </form>
</div>

<script src="../Public/Js/sweetalert.min.js"></script>
<script>
    var username = document.getElementById('username_update');
    var email = document.getElementById('email_update');

    var btn_confirm = document.getElementById('btn_confirm');
    var btn_delete = document.getElementById('btn_delete');
    var btn_modify = document.getElementById('modify_btn');


    btn_confirm.style.display = "none";
    btn_delete.style.display = "inline";


    function changeDisabled(){
        if(btn_confirm.style.display === "none" && btn_delete.style.display === "inline"){
        username.removeAttribute('disabled');
        email.removeAttribute('disabled');
        btn_confirm.style.display = "inline";
        btn_delete.style.display = "none";
        btn_modify.textContent = "Cancel";
        // username.style.backgroundColor = "";
        // username.setAttribute('enabled','enabled');
        }
        else{
        username.setAttribute('disabled', 'disabled');
        email.setAttribute('disabled', 'disabled');
        btn_confirm.style.display = "none";
        btn_delete.style.display = "inline";
        btn_modify.textContent = "Modify";

        // username.style.backgroundColor = "";
        // username.setAttribute('enabled','enabled');
        }

    }
    
    function updateProfile(){
        swal({
        title: "You sure?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            swal("Info succesfully updated!", {
            icon: "success",
        });
        setTimeout(function () {
            document.getElementById('form').submit();}, 1500); 
        } else {
            swal("Info wasn't updated!");
        }
    });
}

    function deleteProfile(){
        swal({
        title: "You sure?",
        text: "Once deleted ALL your data will be lost, including all your blogs, comments and configurations",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            swal("Profile succesfully erased!", {
            icon: "success",
        });
        setTimeout(function () {
            location.href = 'UsersController.php?action=delete&id=' + "<?php echo $_SESSION['id_register'] ?>";}, 1500); 
        } else {swal("Profile wasn't deleted!");}
    });
}
</script>
        
<?php include_once '../Inc/userFooter.php'; ?>
