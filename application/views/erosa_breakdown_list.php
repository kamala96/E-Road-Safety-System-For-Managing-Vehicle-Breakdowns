<?php include 'erosa_header.php';?>
<!-- The Tour Section -->
  
<div class="w3-container w3-padding" style="margin-top: 1.5em">
<?php if ((is_array($current_list) || is_object($current_list)) && !empty($current_list)) {?>
<div class="w3-panel w3-food-wine w3-card-4 w3-center">
  <h2 class="w3-padding w3-large" style="font-weight: bolder;">DRIVER BREAKDOWN LIST</h2>
  <p lass="w3-padding">[Click Delete To Remove]</p>
</div>



<table class="w3-table-all w3-card-4">
  <thead>
    <tr class="w3-text-white" style="background-color: #660033">
      <th>Plate</th>
      <th>Desc</th>
      <th>Date</th>
      <th>Action</th>
    </tr>
  </thead>
  <?php 
    foreach ($current_list as $row) { 
      $day = date(' D d M Y h i:s a',strtotime($row['break_start']));?>
    <tr id="tr">
      <td><?php echo $row['driver_plate_no'];?></td>
      <td><?php echo $row['break_type'];?></td>
      <td><?php echo $day;?></td>
      <td>
        <button class="w3-button w3-small w3-food-wine" onclick="window.location.href='<?php echo base_url('manager/deleteList?');?>break=<?php echo $row['break_id'];?>'" style="font-weight:bolder">Delete</button>
      </td>
    </tr><?php } ?>
    <tfoot>
    <tr class="w3-text-white" style="background-color: #660033">
      <th>Plate</th>
      <th>Desc</th>
      <th>Date</th>
      <th>Action</th>
    </tr>
  </tfoot>
  </table>
<?php }else{ ?>

<div class="w3-padding w3-center" style="margin-top: 10px;">
    <span class="fa-stack fa-lg">
      <i class="fa fa-exclamation-triangle" style="color:#80013f;background-color:#fff;font-size: 24px;"></i>
    </span>You have no any current breakdown.
    </div><?php } ?>
</div>


  </div>
</div>

  <?php include 'erosa_footer.php';?>



 