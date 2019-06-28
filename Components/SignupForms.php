                <?php include_once "./Processing/register.php"; ?>
                <div style="margin: 0px !important;" class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                   <div class="form_page">
                        <h1 class="login_note">Create an account</h1>
                    <form action="" method="POST" enctype="multipart/form-data">
                       <input placeholder="First name" type="text" name="firstname" id="">
                       <p class="error-field text-danger"><?php echo $firstname_err ?></p>
                       
                       <input placeholder="Surname" type="text" name="surname" id="">
                       <p class="error-field text-danger"><?php echo $surname_err ?></p>
                       
                       <input placeholder="Company name" type="text" name="company_name" id="">
                       <p class="error-field text-danger"><?php echo $companyname_err ?> </p>
                       
                       <input placeholder="Email" type="email" name="email" id="">
                       <p class="error-field text-danger"><?php echo $email_err ?> </p>
                       
                       <input placeholder="Password" type="password" name="password" id="">
                       <p class="error-field text-danger"><?php echo $password_err ?></p>
                       
                       <input type="submit" class="btn" name="register" value="Submit">

                       <div class="bg-success" style='display='<?php $display; ?>>
                            Registration was successful
                        </div>
                       
                       <span>Are you new?</span><span> <a href="login.php"> Login</a></span>
                   </form>
                   </div>
                   
                 </div>