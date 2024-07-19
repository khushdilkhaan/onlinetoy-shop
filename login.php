<?php include "header.php"; ?>




 <!-- Form Start -->
 <div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-8 col-lg-6">
            <div class="card bg-primary text-white">
                <div class="card-body p-4">
                    <h6 class="card-title text-center mb-4">Login Form</h6>





                    <?php


if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $role = $_POST["role"];

    // Use prepared statements to prevent SQL injection
    $query = "SELECT * FROM signup WHERE email = ? AND password = ? AND role = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "sss", $email, $pass, $role);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        
        if ($role == "admin") {
            $_SESSION["da_admin_email"] = $email;
            header("location: admin/index.php");
            exit();
        } elseif ($role == "customer") {
            $_SESSION["zama_customer_email"] = $email;
            header("Location: customer/index.php");
            exit();
        }
    } else {
        echo '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Danger!</strong> EMAIL OR PASSWORD INCORRECT.
            </div>';
    }

    mysqli_stmt_close($stmt);
}
?>


          <form method="post">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="admin" name="role" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">ADMIN</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="customer" name="role" id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">CUSTOMER</label>
                            </div>
                        </div>

                        <button type="submit" value="login" name="login" class="btn btn-light">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>