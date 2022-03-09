<?php
    include "header.php";
    include "connect.php";

    if (isset($_POST['register'])) {
        $firstname = htmlspecialchars($_POST['firstname']);
        $lastname = htmlspecialchars($_POST['lastname']);
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $cpassword = htmlspecialchars($_POST['cpassword']);

        $con = connect();

        if ($password !== $cpassword) {
            $disp = "<p style = color:red;'>Passwords do not match</p>";
        }else{
            $sql = 'SELECT * FROM register WHERE email = "'.$email.'" OR username = "'.$username.'"';
            $query = mysqli_query($con, $sql) or die(mysqli_error($con));
            $count = mysqli_affected_rows($con);
            if ($count > 0) {
                $disp = "<p style = color:red;'>The email or username you are trying to use already exist, please try another</p>";
            }else{
                $insert_sql = 'INSERT INTO register (firstname, lastname, username, email, password, cpassword) VALUES ("'.$firstname.'", "'.$lastname.'", "'.$username.'", "'.$email.'", "'.$password.'", "'.$cpassword.'")';
                $insert_query = mysqli_query($con, $insert_sql) or die(mysqli_error($con));
                $insert_count = mysqli_affected_rows($con);
                if ($insert_count > 0) {
                    $disp = "<p style = 'color:green;'>Your registration is successful please <a href = 'login.php'>login</a></p>";
                }else{
                    $disp = "Something went wrong";
                }

            }
        }

       
    }
?>


<section class="woocommerce single page-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-xl-7">
                
                <div class="signup-form">
                    <div class="form-header">
                        <h2 class="font-weight-bold mb-3">Sign Up</h2>
                        <p class="woocommerce-register">
                            Already have an account? <a href="login.php" class="text-decoration-underline">Log in</a>
                        </p>
                        <?php
                            if (isset($disp)) {
                                echo $disp;
                            }
                        ?>

                    </div>

                    <form method="post" class="woocommerce-form woocommerce-form-register register">
                        

                        <div class="row">
                            <div class="col-xl-6">
                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                    <label>First Name&nbsp;<span class="required">*</span></label>
                                    <input type="text" class="form-control" name="firstname" placeholder="First Name">
                                </p>
                            </div>
                            <div class="col-xl-6">
                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                    <label>Last Name&nbsp;<span class="required">*</span></label>
                                    <input type="text" class="form-control" name="lastname"  placeholder="Last Name">
                                </p>
                            </div>
                            <div class="col-xl-6">
                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                    <label>User Name&nbsp;<span class="required">*</span></label>
                                    <input type="text" class="form-control" name="username"  value="" placeholder="Username">
                                </p>
                            </div>

                            <div class="col-xl-6">
                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                    <label>Email&nbsp;<span class="required">*</span></label>
                                    <input type="email" class="form-control" name="email" value="" placeholder="Your Email">
                                </p>
                            </div>

                            <div class="col-xl-6">
                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                    <label>Password&nbsp;<span class="required">*</span></label>
                                    <input type="password" class="form-control" name="password" value="" placeholder="Password">
                                </p>
                            </div>
                            <div class="col-xl-6">
                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                    <label>Re-Enter Password&nbsp;<span class="required">*</span></label>
                                    <input type="password" class="form-control" name="cpassword" value="" placeholder="Re-Enter Password">
                                </p>
                            </div>

                            <div class="col-xl-12">
                                <div class="d-flex align-items-center justify-content-between py-2">
                                    <p class="form-row">
                                        <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__policy">
                                            <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="policy" type="checkbox" id="policy" value="forever"> <span>Accept the Terms and Privacy Policy</span>
                                        </label>
                                    </p>
            
                                    <p class="woocommerce-LostPassword lost_password">
                                        <a href="#">Forgot password?</a>
                                    </p>
                               </div>
                            </div>
                        </div>
                      
                        <p class="woocommerce-FormRow form-row">
                            <button type="submit" class="woocommerce-button button" name="register" value="Register">Register</button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--shop register end-->

<?php
    include "footer.php";
?>