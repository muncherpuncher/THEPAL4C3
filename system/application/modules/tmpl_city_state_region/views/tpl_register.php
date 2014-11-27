
<div id="main-container">

    <div id="main-wrapper">
        <div class="container">
            <h1>Registration</h1>
            <form id="reg_supplier_form">
                <label>You are a</label>
                <select name="client_type" value="" attr-name="Clienttype" />
                    <option value="1"> Reseller </option>
                    <option value="2"> Supplier </option>
                    <option value="3"> Buyer </option>
                </select>
                <div class=""></div>
                <label>Firstname</label>
                <input type="text" name="first_name" value="" attr-name="Firstname" />
                <div class=""></div>

                <label>Lastname</label>
                <input type="text" name="last_name" value="" attr-name="Lastname" />
                <div class=""></div>

                <label>Middle Name</label>
                <input type="text" name="middle_name" value="" attr-name="Middle Name" />
                <div class=""></div>

                <label>Username</label>
                <input type="text" name="username" value="" attr-name="Username" />
                <div class=""></div>

                <label>Password</label>
                <input type="password" name="password" value="" attr-name="Password" />
                <div class=""></div>

                <label>Confirm Password</label>
                <input type="password" name="cpassword" value="" attr-name="Confirm Password" />
                <div class=""></div>

                <label>Email</label>
                <input type="text" name="email" value="" attr-name="Email" />
                <div class=""></div>

                <input type="submit" name="submit" value="submit" />
            </form>
        </div>
    </div>
</div>
<footer>
    
</footer>

<script type="text/javascript">
$(function() {

    $('input[name="submit"]').click(function() {
        $('*').removeClass('error');
        $('*').remove('.error-msg');

        $(inputText).each(function(n, input) {
            if($(input).val() == 0) {
                $(this).addClass('error');
                $(input).after("<p class='error-msg'>The " + $(input).attr('attr-name') + " field is required.</p>");

                error = 1;
            } else if(username.val().length < 5 && username.val() != '') {
                $(username).addClass('error').next().html(" ");
                $(username).after("<p class='error-msg'>The Username field must be at least 5 characters in length.</p>");
                
                error = 1;
            } else if(!isValidEmail(email.val()) && email.val() != '') {
                $(email).addClass('error');
                $(email).next().html("<p class='error-msg'>The Email field must contain a valid email address.</p>");

                error = 1;
            } else {
                 error = 0;
            }
        });

        $(inputPass).each(function(n, input) {
            if($(input).val() == 0) {
                $(this).addClass('error');
                $(input).after("<p class='error-msg'>The " + $(input).attr('attr-name') + " field is required.</p>");
                error = 1;
            } else {
                if($(cpassword).val() != $(input).val()) {
                    $(cpassword).addClass('error');
                    $(cpassword).next().html("<p class='error-msg'>The password doesn't match</p>");
                    error = 1;
                }
            }
        });

        if(error == 0) {
            //$(this).submit();
            $.ajax({
                url: "<?php echo base_url(); ?>registration/process_client_information",
                type: "POST",
                data: $("#reg_supplier_form").serialize(),
                success: function(response){
                    var resp = jQuery.parseJSON(response);
                    if(resp.success === true) {
                        window.location.href = resp.redirect_url;
                    } else {
                        //alert(resp.success);
                        //alert(resp.errors.username);
                        //alert(resp.errors.password);
                        //alert(resp.errors.email);
                        
                        /* Unique email errors */
                        $(email).addClass('error');
                        $(email).next().html("<p class='error-msg'>The Email field must contain a unique value.</p>");
                    }
                },
                error: function(jqXHR, textStatus, errorThrown){
                    alert('error');
                }
            });
        }
        return false;
   });
});
</script>
