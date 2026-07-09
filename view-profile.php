<?php
require_once 'header.php';
require_once 'partials/_dbconnect.php';
?>
<section class="inner inner_2">
        <h3>Profile</h3>
</section>
<?php
if($loggedin) {

            $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
            $stmt->bind_param("i", $userId);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($row = $result->fetch_assoc()) {
                $username = $row['username'];
                $firstName = $row['firstName'];
                $lastName = $row['lastName'];
                $email = $row['email'];
                $phone = $row['phone'];
            } else {
                echo "User not found!";
            }
        ?>
        <section class="contact">
            <div class="container">
                <div class="contact_form">
                 <div class="row">
            <div class="col-md-6"> <img src="img/img13.jpg" alt=""> </div>
            <div class="col-md-6">
                
                    <form action="partials/_manageProfile.php" method="post">
                        <h1><span>Update <strong>Profile</strong></span></h1>
                                                <br>
                        <div class="form-group">
                             <b><label for="userName">User Name:</label></b>       
                            <input class="form-control" id="username" name="username" type="text" disabled value="<?php echo $username ?>">
                        
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                            <b><label for="firstName">First Name:</label></b>
                            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" required value="<?php echo $firstName ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <b><label for="lastName">Last Name:</label></b>
                            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last name" required value="<?php echo $lastName ?>">
                        </div>
                        </div>
                        <div class="form-group">
                            <b><label for="email">Email:</label></b>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email" disabled required value="<?php echo $email ?>">
                        </div>
                        <div class="form-row">
                            <div class="form-group  col-md-6">
                                <b><label for="phone">Phone No:</label></b>
                                <div class="input-group mb-3">
                                   
                                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter Your Phone Number" required pattern="[0-9]{10}" maxlength="10" value="<?php echo $phone ?>">
                                </div>
                            </div>
                            <div class="form-group  col-md-6">
                                <b><label for="password">Password:</label></b>    
                                <input class="form-control" id="password" name="password" placeholder="Enter Password" type="password" required minlength="4" maxlength="21" data-toggle="password">
                            </div>
                        </div>
                        <center>
                                <input type="submit" name="updateProfileDetail" tabindex="4" class=" btn-learn" value="Update">
                        </center>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
     
  
</section>
    <?php
        }
        else {
            echo '<section class="contact"><div id="notfound">
                <div class="notfound">
                    <div class="notfound-404">
                        <h1>Oops!</h1>
                    </div>
                    <h2>404 - Page not found</h2>
                    <a href="index.php">Go To Homepage</a>
                </div>
            </div></section>';
        }
    ?>
    <?php require_once 'footer.php' ?>
    
    <script>
        $('#image').change(function() {
            var i = $(this).prev('button').clone();
            var file = ($('#image')[0].files[0].name).substring(0, 5) + "..";
            $(this).prev('button').text(file);
        });
    </script>
<style>
        
        #notfound {
        position: relative;
        height: 89vh;
        background-color: aliceblue;
        }

        #notfound .notfound {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        }

        .notfound {
        max-width: 410px;
        width: 100%;
        text-align: center;
        }

        .notfound .notfound-404 {
        height: 280px;
        position: relative;
        z-index: -1;
        }

        .notfound .notfound-404 h1 {
        font-family: 'Montserrat', sans-serif;
        font-size: 230px;
        margin: 0px;
        font-weight: 900;
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        background: url('img/bg.jpg') no-repeat;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-size: cover;
        background-position: center;
        }


        .notfound h2 {
        font-family: 'Montserrat', sans-serif;
        color: #000;
        font-size: 24px;
        font-weight: 700;
        text-transform: uppercase;
        margin-top: 0;
        }


        .notfound a {
        font-family: 'Montserrat', sans-serif;
        font-size: 14px;
        text-decoration: none;
        text-transform: uppercase;
        background: #0046d5;
        display: inline-block;
        padding: 15px 30px;
        border-radius: 40px;
        color: #fff;
        font-weight: 700;
        box-shadow: 0px 4px 15px -5px #0046d5;
        }


        @media only screen and (max-width: 767px) {
            .notfound .notfound-404 {
            height: 142px;
            }
            .notfound .notfound-404 h1 {
            font-size: 112px;
            }
        }

        .upload-btn-wrapper {
        position: relative;
        overflow: hidden;
        display: inline-block;
        }

        button.btn.upload {
        border: 2px solid gray;
        background-color: #bababa;
        border-radius: 8px;
        font-size: 10px;
        font-weight: bold;
        }

        .upload-btn-wrapper input[type=file] {
        font-size: 100px;
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
        }
    </style>