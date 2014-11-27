
<div class="col-lg-12" style="color:#000">

    <section class="panel">
        <header class="panel-heading">
           <span class="glyphicon glyphicon-user"></span> Support Tickets
        </header>
        <table aria-describedby="" class="tbl table table-striped border-top dataTable" id="tbl-users">
        <thead>
        <tr role="row">
          <th aria-label="" colspan="1" rowspan="1" role="columnheader" class="sorting_disabled" style="width: 13px;">
            <input class="group-checkable" data-set="#tbl-users .checkboxes" type="checkbox">
          </th>
          <th aria-label="Username: activate to sort column ascending" style="width: 153px;" colspan="1" rowspan="1" aria-controls="tbl-users" tabindex="0" role="columnheader" class="sorting"> Ticket No. </th>
          <th aria-label="Points: activate to sort column ascending" style="width: 101px;" colspan="1" rowspan="1" aria-controls="tbl-users" tabindex="0" role="columnheader" class="hidden-phone sorting"> Type </th>
          <th aria-label="Joined: activate to sort column ascending" style="width: 152px;" colspan="1" rowspan="1" aria-controls="tbl-users" tabindex="0" role="columnheader" class="hidden-phone sorting"> Subject </th>
          <th aria-label=": activate to sort column ascending" style="width: 156px;" colspan="1" rowspan="1" aria-controls="tbl-users" tabindex="0" role="columnheader" class="hidden-phone sorting"> Message </th>
          <th aria-label=": activate to sort column ascending" style="width: 156px;" colspan="1" rowspan="1" aria-controls="tbl-users" tabindex="0" role="columnheader" class="hidden-phone sorting"> Details </th>
          <th aria-label=": activate to sort column ascending" style="width: 156px;" colspan="1" rowspan="1" aria-controls="tbl-users" tabindex="0" role="columnheader" class="hidden-phone sorting"> Status </th>
          <th aria-label=": activate to sort column ascending" style="width: 156px;" colspan="1" rowspan="1" aria-controls="tbl-crm" tabindex="0" role="columnheader" class="hidden-phone sorting">  </th>
        </tr>
        </thead>
        
        <tbody aria-relevant="all" aria-live="polite" role="alert">
      
          <?php foreach ($crm_messages->result() as $value):?>
          <?php

            $user_info = Modules::run('clients_personal_info/get_info',$value->users_id)->row();
            $status_info = Modules::run('tmpl_crm_statuses/get_info_by_id',$value->tpl_crm_statuses_id);
          
          ?>

          <tr class="gradeX odd">
            <td class="  sorting_1"><input class="checkboxes" value="1" type="checkbox"></td>
            <td class=" "><?php echo $value->ticket_number;?></td>
            <td class="hidden-phone ">
              <?php echo $value->type;?>
            </td>
            <td class="hidden-phone ">
              <?php echo $value->subject;?>
            </td>
            <td class="center hidden-phone ">
              <textarea><?php echo $value->message;?></textarea>
            </td>
            <td class="hidden-phone">            
             <strong> Date </strong> <p> <?php echo $value->date_created;?> </p>
             <strong> From </strong> 
             <p> <?php echo $user_info->last_name;?>, <?php echo $user_info->first_name;?> <br>
             <?php echo $user_info->email;?></p>
            </td>
            <td>
              <span class="label <?php echo strtolower($status_info->row()->name) == "close" ? 'label-success' : 'label-warning';?>"> <?php echo $status_info->row()->name;?></span>
            </td>
            <td>
              <div class="btn-group">
                  <button class="btn btn-white" type="button"> Option </button>
                  <button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button"><span class="caret"></span></button>
                  <ul role="menu" class="dropdown-menu">
                      <?php if(strtolower($status_info->row()->name) == "open") :?>
                      <li><a href="#"> Send a message </a></li>
                      <li><a href="#"> Close Ticket </a></li>
                      <?php endif;?>
                      <?php if(strtolower($status_info->row()->name) == "close") :?>
                      <li><a href="#"> Open Ticket </a></li>
                      <?php endif;?>
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
  
 $("#tbl-crm").dataTable();
 
</script>