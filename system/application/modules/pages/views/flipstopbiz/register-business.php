<?php include('registration_steps.php');?>
<?php

if(count($_GET) > 0)
{   
    $step = $_GET['step'];

    switch ($step) {
        case '1':
                // Update listing session status
                $this->session->set_userdata(array('business_reg_status'=>'open'));
                include('register-business-step-1.php');
            break;
        case '2':
                include('register-business-step-2.php');
            break;
        case '3':
                include('register-business-step-3.php');
            break;
        case '4':
             // Update listing session status
             $this->session->set_userdata(array('business_reg_status'=>'open'));
             include('register-business-step-4.php');
            break;
        default:
            # code...
            break;
    }
}
else
{
    redirect(base_url().'register-business?step=1');
}

?>