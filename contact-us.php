<?php
require_once('header.php');
?>
<section class="inner">
		<h3>Contact Us</h3>
</section>
<?php
if($loggedin){
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
            } 
        }
?>
<section class="contact">
		<div class="container">
				<div class="row">
						<div class="col-md-4 col-sm-4">
								<div class="addres">
										<h3>Mysore (Head Office)</h3>
										<ul>
												<li><i class="fa fa-location-arrow" aria-hidden="true"></i></li>
												<li>45, 5th Main Road,
Vijayanagar 2nd Stage,
Mysuru, Karnataka - 570017</li>
										</ul>
										<ul>
												<li><i class="fa fa-envelope" aria-hidden="true"></i></li>
												<li><a href="#0"> harmonyevents@gmail.com</a></li>
										</ul>
								</div>
						</div>
						<div class="col-md-4 col-sm-4">
								<div class="addres">
										<h3>Dharwad (Branch Office)</h3>
										<ul>
												<li><i class="fa fa-location-arrow" aria-hidden="true"></i></li>
												<li>Raviwar peth,Gandhi Chowk, Dharwad- 580001, India</li>
										</ul>
										<ul>
												<li><i class="fa fa-phone" aria-hidden="true"></i></li>
												<li> +91-0112234567</li>
										</ul>
										<ul>
												<li><i class="fa fa-envelope" aria-hidden="true"></i></li>
												<li><a href="#0"> harmonyevents@gmail.com</a></li>
										</ul>
								</div>
						</div>
						
				</div>
				<div class="contact_form">
						<div class="row">
								<div class="col-md-6"> <img src="img/img13.jpg" alt=""> </div>
								<div class="col-md-6">
									
										<form action="partials/_manageContactUs.php" method="post">
												<h1><span>Send A <strong>Message</strong></span></h1><?php if($loggedin){ ?>
			                          
			                            <div class="icon-badge-container mx-1" style="position: absolute; top:32px; right: 32px;">
			                              <a href="#" data-toggle="modal" data-target="#adminReply"><i class="far fa-envelope icon-badge-icon"></i></a>
			                              <div class="icon-badge"><b><span id="totalMessage">0</span></b></div>
			                            </div>
			                          
			                        <?php } ?>
												<br>
												<div class="form-group">
														<div class="input-group"> <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
																<input type="text" name="name" tabindex="1" class="form-control" placeholder="Your Name" value="<?php echo $firstName ?>"  required>
														</div>
												</div>
												<div class="form-group">
														<div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
																<input type="email" name="email" tabindex="1" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>" required>
														</div>
												</div>
												<div class="form-group">
														<div class="input-group"> <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
																<input type="text" tabindex="1" class="form-control" name="phone" placeholder="Your Phone No. " value="<?php echo $phone; ?>" required>
														</div>
												</div>
												<div class="form-group">
														<div class="input-group"> <span class="input-group-addon"><i class="fa fa-cogs" aria-hidden="true"></i></span>
																<select id="selectbasic" name="service" class="form-control" required>
																		<option value="">Select Service</option>
																		<option value="Birthday Event">Birthday Event</option>
																		<option value="Wedding Event">Wedding Event</option>
																		<option value="Corporate Event">Corporate Event</option>
																		<option value="Launch Event">Launch Event</option>
																</select>
														</div>
												</div>
												<div class="form-group">
														<div class="input-group comment"> <span class="input-group-addon"><i class="fa fa-commenting-o" aria-hidden="true"></i></span>
																<textarea id="message" name="message" placeholder="Message" rows="6" class="form-control"></textarea>
														</div>
												</div>
												<center>
														<input type="submit" tabindex="4" class=" btn-learn" value="Submit">
												</center>
										</form>
								</div>
						</div>
				</div>
		</div>
</section>
<!-- Message Modal -->
<div class="modal fade" id="adminReply" tabindex="-1" role="dialog" aria-labelledby="adminReply">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header" style="background-color: rgb(249 128 27);">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="adminReply">Admin Reply</h4>
      </div>

      <div class="modal-body" id="messagebd">
        <table class="table table-striped table-bordered text-center">
          <thead style="background-color: rgb(249 128 27); color: #fff;">
            <tr>
              <th>Contact Id</th>
              <th>Reply Message</th>
              <th>Date & Time</th>
            </tr>
          </thead>
          <tbody>
          <?php 
            $sql = "SELECT * FROM `contactreply` WHERE `userId`='$userId'"; 
            $result = mysqli_query($conn, $sql);
            $count = 0;

            while($row = mysqli_fetch_assoc($result)) {
              $contactId = $row['contactId'];
              $message = $row['message'];
              $datetime = $row['datetime'];
              $count++;

              echo '<tr>
                      <td>'.$contactId.'</td>
                      <td>'.$message.'</td>
                      <td>'.$datetime.'</td>
                    </tr>';
            }

            echo '<script>
                    document.getElementById("totalMessage").innerHTML = "'.$count.'";
                  </script>';

            if ($count == 0) {
              ?>
                <script>
                  document.getElementById("messagebd").innerHTML = 
                    '<div class="alert alert-info text-center">You have not received any message.</div>';
                </script>
              <?php
            }
          ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>

<?php
require_once('footer.php');
?>
<style>
	.icon-badge-group .icon-badge-container {
          display: inline-block;
        
        }
        .icon-badge-container {
          
          position: absolute;
        }
        .icon-badge-icon {
          font-size: 30px;
          color: rgb(0 0 0 / 50%);
          position: relative;
        }
        .icon-badge {
          background-color: #979797;;
          font-size: 10px;
          color: white;
          text-align: center;
          width: 15px;
          height: 15px;
          border-radius: 49%;
          position: relative;
          top: -35px;
          left: 17px;
        }
    </style>