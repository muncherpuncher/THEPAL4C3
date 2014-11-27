
<div class="col-lg-12" style="color:#000">
    <section class="panel">
        <header class="panel-heading">
           <span class="glyphicon glyphicon-briefcase"></span> Businesses
        </header>
        <table aria-describedby="" class="tbl table table-striped border-top dataTable" id="tbl-users">
        <thead>
        <tr role="row">
          <th aria-label="" colspan="1" rowspan="1" role="columnheader" class="sorting_disabled" style="width: 13px;">
            <input class="group-checkable" data-set="#tbl-users .checkboxes" type="checkbox">
          </th>
          <th aria-label="Username: activate to sort column ascending" style="width: 153px;" colspan="1" rowspan="1" aria-controls="tbl-users" tabindex="0" role="columnheader" class="sorting"> Name </th>
          <th aria-label="Points: activate to sort column ascending" style="width: 101px;" colspan="1" rowspan="1" aria-controls="tbl-users" tabindex="0" role="columnheader" class="hidden-phone sorting"> Owner </th>
          <th aria-label="Joined: activate to sort column ascending" style="width: 152px;" colspan="1" rowspan="1" aria-controls="tbl-users" tabindex="0" role="columnheader" class="hidden-phone sorting"> Branches </th>
          <th aria-label=": activate to sort column ascending" style="width: 156px;" colspan="1" rowspan="1" aria-controls="tbl-users" tabindex="0" role="columnheader" class="hidden-phone sorting"> Date Registered </th>
          <th aria-label=": activate to sort column ascending" style="width: 156px;" colspan="1" rowspan="1" aria-controls="tbl-users" tabindex="0" role="columnheader" class="hidden-phone sorting"> </th>
        </tr>
        </thead>
        
        <tbody aria-relevant="all" aria-live="polite" role="alert">
      
          <?php foreach ($businesses->result() as $value):?>
          <?php
            
            $user_info = $this->db->get_where('clients_personal_info',array('users_id'=>$value->users_id))->row();
            $branch_info = Modules::run('clients_business_branches/get_owned_businesses',$value->id);
            $branches = Modules::run('clients_business_branches/get_owned_businesses',$value->id);
    
          ?>
         

          <tr class="gradeX odd">
            <td class="  sorting_1"><input class="checkboxes" value="1" type="checkbox"></td>
            <td class=" ">  <?php echo $value->name;?> </td>
            <td class="hidden-phone ">
              <?php echo $user_info->last_name;?>, <?php echo $user_info->first_name;?>
            </td>
            <td class="center hidden-phone ">
              <?php echo count($branches->result());?>
            </td>
            <td>
              <?php echo $value->date_registered;?>
            </td>
            <td class="hidden-phone">
                <div class="btn-group">
                  <button class="btn btn-white" type="button"> Option </button>
                  <button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button"><span class="caret"></span></button>
                  <ul role="menu" class="dropdown-menu">
                      <li><a href="<?php echo base_url();?>dashboard/businesses?business_id=<?php echo $branch_info->row()->id;?>"> View Branches </a></li>                   
                  </ul>
                </div>
            </td>
          </tr>
      
          <?endforeach;?>

        </tbody>

      </table>
     
    </section>
</div>

<script>

$(function(){

  $("#tbl-businesses").dataTable();

});

</script>