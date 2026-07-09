<?php
require_once 'header.php';
?>
<div class="alert alert-info alert-dismissible fade show" role="alert" style="width:100%" id='notempty'>
    <strong>Info!</strong> If problem is not related to the order then order id = 0	
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
</div>
<style>
    .btn-danger-gradiant {
        background: linear-gradient(to right, #ff4d7e 0%, #ff6a5b 100%);
    }

    .btn-danger-gradiant:hover {
        background: linear-gradient(to right, #ff6a5b 0%, #ff4d7e 100%);
    }
</style>
<div style="margin-right: 32px;display: table;margin-left: auto;">
<button type="button" class="btn btn-danger-gradiant text-white border-0 py-2 px-3 mx-2" data-toggle="modal" data-target="#history"><span> HISTORY <i class="ti-arrow-right"></i></span></button>
</div>
<div class="page-wrapper">
        <div class="content">
	<div class="row">
		<div class="card col-lg-12">
			<div class="card-body">
				<table class="table-striped table-bordered col-md-12 text-center">
                    <thead style="background-color: rgb(111 202 203);">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone No</th>
                            <th>Service</th>
                            <th>Message</th>
                            <th>Datetime</th>
                            <th>Reply</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM contact"; 
                            $result = mysqli_query($conn, $sql);
                            $count = 0;
                            while($row=mysqli_fetch_assoc($result)) {
                                $Id = $row['id'];
                                $name = $row['name'];
                                $email = $row['email'];
                                $phone = $row['phone'];
                                $service = $row['service'];
                                $message = $row['message'];
                                $created_at = $row['created_at'];
                                $count++;

                                echo '<tr>
                                        <td>' .$Id. '</td>
                                        <td>' .$name. '</td>
                                        <td>' .$email. '</td>
                                        <td>' .$phone. '</td>
                                        <td>' .$service. '</td>
                                        <td>' .$message. '</td>
                                        <td>' .$created_at. '</td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#reply' .$Id. '">Reply</button>
                                        </td>
                                    </tr>';
                            }
                            if($count==0) {
                              ?><script> document.getElementById("notempty").innerHTML = '<div class="alert alert-info alert-dismissible fade show" role="alert" style="width:100%"> You have not recieve any message!	</div>';
                              document.getElementById("empty").innerHTML = '';
                              </script> <?php
                            }
                        ?>
                        
                    </tbody>
		        </table>
			</div>
		</div>
	</div>
</div>
</div>
    <?php 
        $contactsql = "SELECT * FROM `contact`";
        $contactResult = mysqli_query($conn, $contactsql);
        while($contactRow = mysqli_fetch_assoc($contactResult)){
            $contactId = $contactRow['id'];
            $Id = $contactRow['user_id'];
    ?>

    <!-- Reply Modal -->
    <div class="modal fade" id="reply<?php echo $contactId; ?>" tabindex="-1" role="dialog" aria-labelledby="reply<?php echo $contactId; ?>" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color: rgb(111 202 203);">
            <h5 class="modal-title" id="reply<?php echo $contactId; ?>">Reply</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="partials/_contactManage.php" method="post">
                <div class="text-left my-2">
                    <b><label for="message">Message: </label></b>
                    <textarea class="form-control" id="message" name="message" rows="2" required minlength="5"></textarea>
                </div>
                <input type="hidden" id="contactId" name="contactId" value="<?php echo $contactId; ?>">
                <input type="hidden" id="userId" name="userId" value="<?php echo $Id; ?>">
                <button type="submit" class="btn btn-success" name="contactReply">Reply</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <?php
        }
    ?>

    <!-- history Modal -->
    <div class="modal fade" id="history" tabindex="-1" role="dialog" aria-labelledby="history" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(187 188 189);">
              <h5 class="modal-title" id="history">Your Sent Message</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="notReply">
            <table class="table-striped table-bordered col-md-12 text-center">
                <thead style="background-color: rgb(111 202 203);">
                    <tr>
                        <th>Contact Id</th>
                        <th>Reply Message</th>
                        <th>datetime</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $sql = "SELECT * FROM `contactreply`"; 
                    $result = mysqli_query($conn, $sql);
                    $totalReply = 0;
                    while($row=mysqli_fetch_assoc($result)) {
                        $contactId = $row['contactId'];
                        $message = $row['message'];
                        $datetime = $row['datetime'];
                        $totalReply++;

                        echo '<tr>
                                <td>' .$contactId. '</td>
                                <td>' .$message. '</td>
                                <td>' .$datetime. '</td>
                              </tr>';
                    }    

                    if($totalReply==0) {
                      ?><script> document.getElementById("notReply").innerHTML = '<div class="alert alert-info alert-dismissible fade show" role="alert" style="width:100%"> You have not Reply any message!	</div>';</script> <?php
                    }   

                ?>
                </tbody>
		    </table>
            </div>
          </div>
        </div>
    </div>
<?php
require_once 'footer.php'; 
?>   