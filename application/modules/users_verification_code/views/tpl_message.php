<header class="panel-heading">


        <?php  if($message['type']=="success"):?>

        <div class="alert alert-success alert-block fade in">

        <button class="close close-sm" type="button" data-dismiss="alert"></button>
        <p><?php echo $message['message'];?></p>

        </div>

       <?php endif;?>
   
       <?php  if($message['type']=="error"):?>

        <div class="alert alert-block alert-danger fade in">

        <button class="close close-sm" type="button" data-dismiss="alert"></button>
        <p><?php echo $message['message'];?></p>

        </div>
        
       <?php endif;?>


        <?php  if($message['type']=="warning"):?>

        <div class="alert alert-info fade in">

        <button class="close close-sm" type="button" data-dismiss="alert"></button>
        <p><?php echo $message['message'];?></p>

        </div>

       <?php endif;?>

        <?php if(!$redirect_url==""):?>
        <meta http-equiv='refresh' content='2;<?php echo base_url() . $redirect_url;?>' />
        <?php endif;?>



  </header>