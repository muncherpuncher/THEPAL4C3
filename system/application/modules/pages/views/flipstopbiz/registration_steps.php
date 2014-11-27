<div class="stepwizard col-xs-10">
    <div class="">
        <?php
            $step = $_GET['step'];
        ?>
        <ul class="nav thumbnail setup-panel stepwizard-row">
            <li class="<?php echo $step == 1 ? 'active' : '';?> stepwizard-step"><a href="javascript:void(0)" class="btn-step-primary btn-circle">
                <h4 class="list-group-item-heading"> 1 </h4>
            </a>
            <p class="stepwizard-step-description"> Contact Information </p>
            </li>
            
            <li class="<?php echo $step == 2 ? 'active' : '';?> col-xs-2 stepwizard-step"><a href="javascript:void(0)" class="btn-step-primary btn-circle">
                <h4 class="list-group-item-heading"> 2 </h4>
            </a>
            <p class="stepwizard-step-description"> Identity Verification </p>
            </li>
            <li class="<?php echo $step == 3 ? 'active' : '';?> col-xs-2 stepwizard-step"><a href="javascript:void(0)" class="btn-step-primary btn-circle">
                <h4 class="list-group-item-heading"> 3 </h4>
            </a>
            <p class="stepwizard-step-description"> Add Store/Branch </p>
            </li>
            <li class="<?php echo $step == 4 ? 'active' : '';?> col-xs-2 stepwizard-step"><a href="javascript:void(0)" class="btn-step-primary btn-circle">
                <h4 class="list-group-item-heading"> 4 </h4>
            </a>
            <p class="stepwizard-step-description"> Confirmation </p>
            </li>
        </ul>
    </div>
</div>


