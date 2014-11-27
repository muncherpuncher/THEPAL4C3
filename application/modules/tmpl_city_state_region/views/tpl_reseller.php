<?php $this->load->view('templates/front_end/includes/header_view')?>
</head>
<body>
<div id="main-container">
    <header><?php $this->load->view('templates/front_end/includes/header_page_view')?></header>
    <div id="main-wrapper">
        <div class="container">
            <h1>Registration</h1>
            <form id="reg_reseller_form">
                <label>firstname</label>
                <input type="text" name="first_name" value="" />
                <div class="clr"></div>

                <label>Lastname</label>
                <input type="text" name="last_name" value="" />
                <div class="clr"></div>

                <label>Middle Name</label>
                <input type="text" name="middle_name" value="" />
                <div class="clr"></div>

                <label>Username</label>
                <input type="text" name="username" value="" />
                <div class="clr"></div>

                <label>Password</label>
                <input type="password" name="password" value="" />
                <div class="clr"></div>

                <label>Confirm Password</label>
                <input type="password" name="cpassword" value="" />
                <div class="clr"></div>

                <label>email</label>
                <input type="text" name="email" value="" />
                <div class="clr"></div>

                <input type="submit" name="submit" value="submit" />
            </form>
        </div>
    </div>
</div>
<footer><?php $this->load->view('templates/front_end/includes/footer_page_view')?></footer>
<?php $this->load->view('templates/front_end/includes/footer_view')?>
<script type="text/javascript">
$(function() {
    $('input[name="submit"]').click(function() {
        $('*').removeClass('error');
        $('*').remove('.error-msg');

        $(inputText).each(function(n, input) {
            if($(input).val() == 0) {
                $(this).addClass('error');
                $(input).after("<p class='error-msg'>Please fill the required field.</p>");

                error = 1;
            } else if($(username).val().length < 5){
                $(username).addClass('error').next().html(" ");
                $(username).after("<p class='error-msg'>Username must be 5</p>");
                
                error = 1;
            } else if(!isValidEmail($(email).val()) && $(email).val() != '') {
                email.addClass('error');
                email.next().html("<p class='error-msg'>Invalid e-mail address.</p>");

                error = 1;
            } else {
                 error = 0;
            }
        });

        $(inputPass).each(function(n, input) {
            if($(input).val() == 0) {
                $(this).addClass('error');
                $(input).after("<p class='error-msg'>Please fill the required field.</p>");
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
            $.ajax({
                url: "<?php echo base_url(); ?>registration/process_client_information",
                type: "POST",
                data: $("#reg_reseller_form").serialize(),
                success: function(response){
                    var resp = jQuery.parseJSON(response);
                    if(resp.success === true) {
                        window.location.href = resp.redirect_url;
                    } else {
                        alert(resp.success);
                        alert(resp.errors.username);
                        alert(resp.errors.password);
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
</body>
</html>