
<div class="col-lg-12" style="color:#000">
    <section class="panel">
        <header class="panel-heading">
           <span class="glyphicon glyphicon-briefcase"></span> Business Branches - <strong> <?php echo $business_info->row()->name;?> </strong>
        </header>
        <table aria-describedby="" class="tbl table table-striped border-top dataTable" id="tbl-users">
        <thead>
        <tr role="row">
          <th aria-label="" colspan="1" rowspan="1" role="columnheader" class="sorting_disabled" style="width: 13px;">
            <input class="group-checkable" data-set="#tbl-users .checkboxes" type="checkbox">
          </th>
          <th aria-label="Username: activate to sort column ascending" style="width: 153px;" colspan="1" rowspan="1" aria-controls="tbl-users" tabindex="0" role="columnheader" class="sorting"> Business Info </th>
          <th aria-label="Points: activate to sort column ascending" style="width: 101px;" colspan="1" rowspan="1" aria-controls="tbl-users" tabindex="0" role="columnheader" class="hidden-phone sorting"> Plan Details </th>
          <th aria-label=": activate to sort column ascending" style="width: 156px;" colspan="1" rowspan="1" aria-controls="tbl-users" tabindex="0" role="columnheader" class="hidden-phone sorting"> </th>
        </tr>
        </thead>
        
        <tbody aria-relevant="all" aria-live="polite" role="alert">
  
          <?php foreach ($business_branches  as $key):?>
          <?php 

            $date_today = "2014-10-10";
            $is_expired = $date_today == $key['plan']['date_expires'] ? true : false;
              

          ?>

          <tr class="gradeX odd">
            <td class=" sorting_1">
              <input class="checkboxes" value="1" type="checkbox">
            </td>
            <td class=" ">
              <h4> <?php echo $key['business_name'];?> </h4>
              <p></p>
              <div class="col-lg-12" style="color:#111111">
                Address:
                <p></p>
                <?php echo $key['street_address'];?>
                ,<?php echo $key['city'];?>
                <?php echo $key['state'];?>
                <?php echo $key['country'];?>
                <p></p>
                 Business Hours:
                <p></p>
                Monday : <?php echo strtoupper($key['business_hours']->monday);?><br>
                Tuesday : <?php echo strtoupper($key['business_hours']->tuesday);?><br>
                Wednesday : <?php echo strtoupper($key['business_hours']->wednesday);?><br>
                Thursday : <?php echo strtoupper($key['business_hours']->thursday);?><br>
                Friday : <?php echo strtoupper($key['business_hours']->friday);?><br>

                <p></p>
              </div>
            
            </td>
            <td class="hidden-phone ">
                <strong> Plan: </strong>
                <?php echo $key['plan']['description'];?>
                <p></p>
                <strong> Registered: </strong>
                <?php echo date("F j, Y",strtotime($key['plan']['date_registered']));?>
                <p></p>
                <strong> Expires: </strong>
                <?php echo date("F j, Y",strtotime($key['plan']['date_expires']));?>
                <p>  </p>
                <p> Status </p>
                <strong>

                <?php if($is_expired == TRUE):?>
                <input type="button" class="btn btn-primary" value="Upgrade">
                <?php endif;?>
                <?php if($is_expired == FALSE):?>
                <span class="label label-success">  Active </span>
                <?php endif;?>

            </td>
            <td>
              <div class="btn-group">
                  <button class="btn btn-white" type="button"> Option </button>
                  <button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button"><span class="caret"></span></button>
                  <ul role="menu" class="dropdown-menu">
                    <li> <a href="<?php echo base_url();?>dashboard/business_info?branch_id=<?php echo $key['branch_id'];?>"> Details </a> </li>
                     <li> <a href="<?php echo base_url();?>dashboard/analytics?branch_id=<?php echo $key['branch_id'];?>"> View Analytics </a> </li>
                  </ul>
              </div>
            </td>

          </tr>
          <?php endforeach;?>
         

        </tbody>

      </table>
     
    </section>
</div>

<script>

$(function(){

  $("#tbl-businesses").dataTable();

});

</script>