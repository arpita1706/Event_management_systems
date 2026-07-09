<?php 
    $itemModalSql = "SELECT * FROM `booking`";
    $itemModalResult = mysqli_query($conn, $itemModalSql);
    while($itemModalRow = mysqli_fetch_assoc($itemModalResult)){
        $orderid = $itemModalRow['id'];
        $userid = $itemModalRow['user_id'];
        $orderStatus = $itemModalRow['status'];
    
?>

<!-- Modal -->
<div class="modal fade" id="orderStatus<?php echo $orderid; ?>" tabindex="-1" role="dialog" aria-labelledby="orderStatus<?php echo $orderid; ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(111 202 203);">
        <h5 class="modal-title" id="orderStatus<?php echo $orderid; ?>">Booking Status </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="partials/_bookingManage.php" method="post" style="border-bottom: 2px solid #dee2e6;">
            <div class="text-left my-2">    
                <b><label for="name">Booking Status</label></b>
                <div class="row mx-2">
                <input class="form-control col-md-3" id="status" name="status" value="<?php echo $orderStatus; ?>" type="number" min="0" max="6" required>    
                <button type="button" class="btn btn-secondary ml-1" data-container="body" data-toggle="popover" title="User Types" data-placement="bottom" data-html="true" data-content="0=Booking Placed.<br> 1=Booking Confirmed.<br> 2=Booking Denied.<br> 3=Booking Cancelled.">
                    <i class="fa fa-info"></i>
                </button>
                </div>
            </div>
            <input type="hidden" id="orderId" name="orderId" value="<?php echo $orderid; ?>">
            <button type="submit" class="btn btn-success mb-2" name="updateStatus">Update</button>
        </form>
        
      </div>
    </div>
  </div>
</div>

<?php
    }
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $(function () {
        $('[data-toggle="popover"]').popover();
    });
</script>
