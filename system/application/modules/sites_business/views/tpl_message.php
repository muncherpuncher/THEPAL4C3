<br><br><br><br>
<div class="col-xs-12 text-center">

          <?php $message = $this->session->userdata('page_message');?>

          <?php  if($message['type']=="success"):?>
            <h1><?php echo $message['message'];?><small></h1>
            <br />
         <?php endif;?>
     
         <?php  if($message['type']=="error"):?>
          <h1><?php echo $message['message'];?><small></h1>
          <br />
         <?php endif;?>

          <?php  if($message['type']=="warning"):?>
          <h1><?php echo $message['message'];?><small></h1>
          <br />
         <?php endif;?>

         <a href="<?php echo base_url('referbusiness');?>" class="btn btn-primary"><i class="icon-home"></i> Refer another business</a>
         <a href="<?php echo base_url();?>" class="btn btn-primary"><i class="icon-home"></i> Take Me Home</a>

</div>



