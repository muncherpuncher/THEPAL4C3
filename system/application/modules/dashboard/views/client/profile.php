

  <section class="panel" style="color:#000">
  <div class="panel-heading">
    <span class="glyphicon glyphicon-user"></span> PROFILE
  </div>
  <div class="panel-body">

    <?php if($_POST):?>
    <?php $response = Modules::run('events/personal_info','update');?>
    <?php if($response == TRUE):?>

      <div class="alert alert-success alert-block fade in">
          <button data-dismiss="alert" class="close close-sm" type="button">
              <i class="icon-remove"></i>
          </button>
          <h4>
              <i class="icon-ok-sign"></i>
              Success!
          </h4>
          <p> UPDATED </p>
      </div>


    <?php endif;?>
    <?php endif;?>
         



    <form method="POST" action="" id="form-personal-info">
      <div class="form-group col-xs-12">
        <p class="pull-right">
           * Required fields
        </p>
      </div>
      <div class="form-group">
        <label for="fd_fd_last_name"> * last_name</label>
        <input style="width:300px" class="form-control" name="last_name" placeholder="" autofocus="" type="text" value="<?php echo isset($personal_info->row()->last_name) == 1 ? $personal_info->row()->last_name : '';?>"> <span class="field-status-error"></span>
      </div>
      <div class="form-group">
        <label for="fd_fd_first_name"> * first_name</label>
        <input style="width:300px" class="form-control" name="first_name" placeholder="" autofocus="" type="text" value="<?php echo isset($personal_info->row()->last_name) == 1 ? $personal_info->row()->first_name : '';?>"> <span class="field-status-error"></span>
      </div>
      <div class="form-group">
        <label for="fd_fd_title"> * Role/Title</label>
        <input style="width:300px" class="form-control" name="title_role" placeholder="" autofocus="" type="text" value="<?php echo isset($personal_info->row()->last_name) == 1 ? $personal_info->row()->title : '';?>"> <span class="field-status-error"></span>
      </div>
      <div class="form-group">
        <label for="fd_fd_address"> * address</label>
        <input style="width:300px" class="form-control" name="address" placeholder="" autofocus="" type="text" value="<?php echo isset($personal_info->row()->last_name) == 1 ? $personal_info->row()->address : '';?>"> <span class="field-status-error"></span>
      </div>
      <div class="form-group">
        <label for="fd_country"> * Country </label>
        <select style="width:300px" class="form-control" name="country" placeholder="" autofocus="" type="text">
          <option value=""> Select </option>
          <option value="Philippines" <?php echo isset($personal_info->row()->country) == 'Philippines' ? 'selected' : '';?>> Philippines </option>
          <option value="USA" <?php echo isset($personal_info->row()->country) == 'USA' ? 'selected' : '';?>> USA </option>
          <option value="Canada" <?php echo isset($personal_info->row()->country) == 'Canada' ? 'selected' : '';?>> Canada </option>
        </select>
        <span class="field-status-error"></span>
      </div>
      <div class="form-group">
        <label for="fd_fd_city"> * city</label>
        <input style="width:300px" class="form-control" name="city" placeholder="" autofocus="" type="text" value="<?php echo isset($personal_info->row()->last_name) == 1 ? $personal_info->row()->city : '';?>"> <span class="field-status-error"></span>
      </div>
      <div class="form-group">
        <label for="fd_fd_state"> * state</label>
        <input style="width:300px" class="form-control" name="state" placeholder="" autofocus="" type="text" value="<?php echo isset($personal_info->row()->last_name) == 1 ? $personal_info->row()->state : '';?>"> <span class="field-status-error"></span>
      </div>
      <div class="form-group">
        <label for="fd_fd_postal_code"> * postal_code</label>
        <input style="width:300px" class="form-control" name="postal_code" placeholder="" autofocus="" type="text" value="<?php echo isset($personal_info->row()->last_name) == 1 ? $personal_info->row()->postal_code : '';?>"> <span class="field-status-error"></span>
      </div>
      <div class="form-group">
        <label for="fd_fd_phone_number"> * phone_number</label>
        <input style="width:300px" class="form-control" name="phone_number" placeholder="" autofocus="" type="text" value="<?php echo isset($personal_info->row()->last_name) == 1 ? $personal_info->row()->phone_number : '';?>"> <span class="field-status-error"></span>
      </div>
      <input type="button" class="btn btn-primary" id="btn-submit" value="Save">
    </form>
  </div>
  </section>



<script type="text/javascript" src="<?php echo base_url();?>_assets/_js/custom/global.js"></script>
<script>
$(document).ready(function(){

    $("#btn-submit").click(function(){

        $('*').removeClass('error');
            var error = 0;
            var form_data = $(this).serialize();
            var isEmailEx = '';

            if(lastname.val() == '') {
                lastname.next().show().html('* Required');
                error = 1;
            } else {
                lastname.next().hide().html('');
            }
            if(firstname.val() == '') {
                firstname.next().show().html('* Required');
                error = 1;
            } else {
                firstname.next().hide().html('');
            }
            if(business_name.val() == '') {
                business_name.next().show().html('* Required');
                error = 1;
            } else {
                business_name.next().hide().html('');
            }
            if(title_role.val() == '') {
                title_role.next().show().html('* Required');
                error = 1;
            } else {
                title_role.next().hide().html('');
            }
            if(country.val() == '') {
                country.next().show().html('* Required');
                error = 1;
            } else {
                country.next().hide().html('');
            }
            if(address.val() == '') {
                address.next().show().html('* Required');
                error = 1;
            } else {
                address.next().hide().html('');
            }
            if(city.val() == '') {
                city.next().show().html('* Required');
                error = 1;
            } else {
                city.next().hide().html('');
            }
            if(state.val() == '') {
                state.next().show().html('* Required');
                error = 1;
            } else {
                state.next().hide().html('');
            }
            if(postal_code.val() == '') {
                postal_code.next().show().html('* Required');
                error = 1;
            } else {
                postal_code.next().hide().html('');
            }
            if(phone_number.val() == '') {
                phone_number.next().show().html('* Required');
                error = 1;
            } else {
                phone_number.next().hide().html('');
            }
            if(error == 0) {
               $("#form-personal-info").submit();
            } else {
                return false;
            }
    });
});
</script>