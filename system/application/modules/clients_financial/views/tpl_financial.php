
</head>
<body>
<div id="main-container">
    <header></header>
    <div id="main-wrapper">
        <div class="container">
            <h1>Financial Information</h1>
            
            <form id="reg_financial_form">
                <label>Tin Number</label>
                <input type="text" name="tin" value="" attr-name="Tin Number" />
                <div class="clr"></div>
                
                <label>Company Name</label>
                <input type="text" name="company" value="" attr-name="Company Name" />
                <div class="clr"></div>
                
                <label>Company Address</label>
                <input type="text" name="company_address" value="" attr-name="Company Address" />
                <div class="clr"></div>
                
                <label>Company Phone</label>
                <input type="text" name="company_phone" value="" attr-name="Company Phone" />
                <div class="clr"></div>
                
                <label>Company Fax</label>
                <input type="text" name="company_fax" attr-name="Company Fax" />
                <div class="clr"></div>
                
                <label>SEC Number</label>
                <input type="text" name="sec_number" attr-name="SEC Number" />
                <div class="clr"></div>
                
                <label>Company Email</label>
                <input type="text" name="company_email" attr-name="Company Email" />
                <div class="clr"></div>
                
                <input type="submit" name="submit" value="Next" />
            </form>
        </div>
    </div>
</div>
<footer></footer>

<script type="text/javascript">
$(function() {
    $('input[name="tin"], input[name="sec_number"], input[name="company_phone"], input[name="company_fax"]').ForceNumericOnly();
    
    $('input[name="submit"]').click(function() {
        $('*').removeClass('error');
        $('*').remove('.error-msg');
       
        $(inputText).each(function(n, input) {
            if($(input).val() === '') {
                $(this).addClass('error');
                $(input).after("<p class='error-msg'>The " + $(input).attr('attr-name') + " field is required.</p>");

                error = 1;
            } else if($(company_phone).val().length < 7 && $(company_phone).val() != '') {
                $(company_phone).addClass('error').next().html(" ");
                $(company_phone).after("<p class='error-msg'>The " + $(input).attr('attr-name') + " must be 7-digit</p>");
            } else if(!isValidEmail($(company_email).val()) && $(company_email).val() != '') {
                $(company_email).addClass('error').next().html(" ");
                $(company_email).after("<p class='error-msg'>The Email field must contain a valid email address.</p>");

                error = 1;
            } else {
                error = 0;
            }
        });
       
        if(error === 0) {
           $.ajax({
                url: "<?php echo base_url(); ?>clients_financial/process_financial_information",
                type: "POST",
                data: $("#reg_financial_form").serialize(),
                success: function(response){
                    var resp = jQuery.parseJSON(response);
                    if(resp.success === true) {
                        window.location.href = resp.redirect_url;
                    } else {
                        //alert(resp.success);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown){
                    //alert('error');
                }
            });
        }
        return false;
   }); 
});
</script>
</body>
</html>