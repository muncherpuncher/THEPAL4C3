
<div class="col-lg-12" style="color:#000">
    <section class="panel">
        <header class="panel-heading">
           <span class="glyphicon glyphicon-user"></span> Users
        </header>
        <table aria-describedby="" class="tbl table table-striped border-top dataTable" id="tbl-users">
        <thead>
        <tr role="row">
          <th aria-label="" colspan="1" rowspan="1" role="columnheader" class="sorting_disabled" style="width: 13px;">
            <input class="group-checkable" data-set="#tbl-users .checkboxes" type="checkbox">
          </th>
          <th aria-label="Username: activate to sort column ascending" style="width: 153px;" colspan="1" rowspan="1" aria-controls="tbl-users" tabindex="0" role="columnheader" class="sorting">Username</th>
          <th aria-label="Points: activate to sort column ascending" style="width: 101px;" colspan="1" rowspan="1" aria-controls="tbl-users" tabindex="0" role="columnheader" class="hidden-phone sorting"> Type </th>
          <th aria-label="Joined: activate to sort column ascending" style="width: 152px;" colspan="1" rowspan="1" aria-controls="tbl-users" tabindex="0" role="columnheader" class="hidden-phone sorting"> Status </th>
          <th aria-label=": activate to sort column ascending" style="width: 156px;" colspan="1" rowspan="1" aria-controls="tbl-users" tabindex="0" role="columnheader" class="hidden-phone sorting"> Access </th>
        </tr>
        </thead>
        
        <tbody aria-relevant="all" aria-live="polite" role="alert">
      
          <?php foreach ($users->result() as $value):?>
         

          <tr class="gradeX odd">
            <td class="  sorting_1"><input class="checkboxes" value="1" type="checkbox"></td>
            <td class=" "><?php echo $value->username;?></td>
            <td class="hidden-phone ">
              <?php echo $value->type;?>
            </td>
            <td class="center hidden-phone ">

              <?php if($value->verify_flag==1):?>
              <span class="label label-success"> Verified</span>
              <?php endif;?>
              <?php if($value->verify_flag==0):?>
              <span class="label label-warning"> Not Verified </span>
              <?php endif;?>

            </td>
            <td class="hidden-phone">
             
              <input access="<?php echo $value->access_flag;?>" type="button" class="btnUserAccess" id="<?php echo $value->id;?>" value="<?php echo $value->access_flag == 0 ? 'Enable' : 'Disable';?>">
 
            </td>
          </tr>
          <?endforeach;?>

        </tbody>

      </table>
     
    </section>
</div>

<script>

$(function(){


  var isEnabled = 0;
  var userID = "";

  $("#tbl-users").dataTable();

  $(document).on('click','.btnUserAccess',function(){

    userID = $(this).attr('id');
    userAccess = $(this).attr('access');

    switch(userAccess)
    {
      case '1':
          isEnabled = 0;
          $(this).attr('value','Enable');
          $(this).attr('access','0');
        break;
      case '0':
          isEnabled = 1;
          $(this).attr('value','Disable');
          $(this).attr('access','1');
        break;
    }
  
    updateUserAccess(userID,isEnabled);

  });

  function updateUserAccess(userID,isEnabled)
  { 
        $.ajax({
            url: base_url + "users/update_access",
            type: "POST",
            data: { 
                    userID : userID,
                    isEnabled : isEnabled 
                  },
            dataType: "json",
            async: false,
            success: function(data, textStatus, jqXHR)
            {

            }, 
            error: function (jqXHR, textStatus, errorThrown)
            {
              
            }

        });
  }

 


});

</script>