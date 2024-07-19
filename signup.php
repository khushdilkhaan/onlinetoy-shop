<?php 
  $link = mysqli_connect("localhost","root","","onlinetoyshop");
?>

<?php include "header.php"; ?>

<section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                            <form method="post" enctype="multipart/form-data" action="signup.php" class="row g-3">

                                <?php
                                if (isset($_POST["Register"])) {
                                    $name = $_POST["username"];
                                    $contact = $_POST["contact"];
                                    $address = $_POST["address"];
                                    $dateofbirth = $_POST["dateofbirth"];
                                    $email = $_POST["email"];
                                    $pass = $_POST["password"];
                                    $role = $_POST["role"];
                                    $image = $_FILES["img"]["name"];
                                    $prof_image = "customer_profile/";

                                    $insertion = "INSERT INTO signup (username, contact, address, dateofbirth, email, password, role, profile_image) VALUES ('$name', '$contact', '$address', '$dateofbirth', '$email', '$pass', '$role', '$image')";

                                    if (mysqli_query($link, $insertion) && move_uploaded_file($_FILES["img"]["tmp_name"], $prof_image . $image)) {
                                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>CONGRATULATION!</strong> ACCOUNT REGISTERED SUCCESSFULLY.
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> </button>
                                        </div>';
                                    } else {
                                        echo "Error: " . mysqli_error($link);
                                    }
                                }
                                ?>

                                <div class="col-md-6">
                                    <div class="form-outline mb-4">
                                        <input type="text" id="username" name="username" class="form-control form-control-lg" />
                                        <label class="form-label" for="username">Your Full Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-outline mb-4">
                                        <input type="number" id="contact" name="contact" class="form-control form-control-lg" />
                                        <label class="form-label" for="contact">Contact</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-outline mb-4">
                                        <input type="text" id="address" name="address" class="form-control form-control-lg" />
                                        <label class="form-label" for="address">Address</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-outline mb-4">
                                        <input type="email" id="email" name="email" class="form-control form-control-lg" />
                                        <label class="form-label" for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-outline mb-4">
                                        <input type="password" id="password" name="password" class="form-control form-control-lg" />
                                        <label class="form-label" for="password">Password</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-outline mb-4">
                                        <input type="password" id="confirm_password" name="confirm_password" class="form-control form-control-lg" />
                                        <label class="form-label" for="confirm_password">Repeat your password</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">
                                        <span class="first-letter">Image</span>
                                        <span class="second-letter">*</span>
                                    </label>
                                    <p class="form-row input-required">
                                        <input type="file" id="img" name="img" class="input-text">
                                    </p>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">
                                        <span class="first-letter">Date of Birth</span>
                                        <span class="second-letter">*</span>
                                    </label>
                                    <p class="form-row form-row-first input-required">
                                        <input type="date" id="dateofbirth" name="dateofbirth" class="input-text">
                                    </p>
                                </div>

                                <!-- Add this hidden input for 'role' -->
                                <input type="hidden" name="role" value="customer">

                                <!-- Other checkbox inputs -->
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="admin" id="flexCheckDisabled" disabled>
                                        <label class="form-check-label" for="flexCheckDisabled">Admin</label>
                                 
                               
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="customer" id="flexCheckCheckedDisabled" checked disabled>
                                        <label class="form-check-label" for="flexCheckCheckedDisabled">Customer</label>
                                    </div>
                                </div>
                                </div>
                                </div>

                                <div class="col-12">
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" name="Register" id="Register" class="btn btn-primary">Register</button>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <p class="text-center text-muted mt-5 mb-0">Have already an account?
                                        <a href="login.php" class="fw-bold text-body"><u>Login here</u></a>
                                    </p>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
