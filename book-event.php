<?php
require_once('header.php');
?>
<section class="inner">
		<h3>Book Events</h3>
</section>
<section class="contact">
		<div class="container">

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
?>
<div class="contact_form">
	<div class="row">
			<div class="col-md-6"> <img src="img/img15.jpg" alt=""> </div>
			<div class="col-md-6">
					<form action="partials/_manageBooking.php" method="post">
							<h1><span>Book An <strong>Events</strong></span></h1>
							<br>
							<div class="form-group">
								<div class="input-group"> <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
										<input type="text" name="name" tabindex="1" class="form-control" placeholder="Your Name" value="<?php echo $firstName.' '.$lastName ?>" required disabled>
								</div>
							</div>
							<div class="form-group">
									<div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
											<input type="email" name="email" tabindex="1" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>" required disabled> 
									</div>
							</div>
							<div class="form-group">
									<div class="input-group"> <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
											<input type="text" name="phone" tabindex="1" class="form-control" placeholder="Your Phone No. " value="<?php echo $phone; ?>" disabled required>
									</div>
							</div>
							<div class="form-group">
									<div class="input-group"> <span class="input-group-addon"><i class="fa fa-cogs" aria-hidden="true"></i></span>
											<select id="service" name="service" class="form-control" required>
													<option value="">Select Service</option>
													<option value="Birthday Event">Birthday Event</option>
													<option value="Wedding Event">Wedding Event</option>
													<option value="Corporate Event">Corporate Event</option>
													<option value="Launch Event">Launch Event</option>
											</select>
									</div>
							</div>
							<div class="form-group">
									<div class="input-group"> <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
											<input type="text" name="no_of_people" tabindex="1" class="form-control" placeholder="Number of people" value="" required>
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
		<?php }
		else { 
				echo '<section class="contact"><div class="mt-150 mb-150"><div class="container">
		        <div class="alert alert-info my-3" style="margin-bottom: 62px;">
		            <font style="font-size:22px"><center>For Booking event. You need to <strong><a style="color:#f28123; cursor:pointer;" data-toggle="modal" data-target="#loginModal">Login</a></strong></center></font>
		        </div></div></div></section>';
		 } ?>
	
</div>
</section>
<?php
require_once('footer.php');
?>