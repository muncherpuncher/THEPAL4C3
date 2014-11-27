$(function(){

    $('#activate-step-1').on('click', function(e) {
            e.preventDefault();

            error = 0;
            var  term_agree = $("input[name='chk_bizagree']").is(":checked");
            var exp = new RegExp('(([a-z])+([0-9]))|(([0-9])+([a-z]))','i');

            // lastname = $("#form-register input[name='last_name']");
            // firstname = $("#form-register input[name='first_name']");
            // business_name = $("#form-register input[name='business_name']");
            // email = $("#form-register input[name='email']");
            // password = $("#form-register input[name='password']");
            // title_role = $("#form-register input[name='title_role']");
            // country = $("#form-register select[name='country']");
            // address = $("#form-register input[name='address']");
            // city = $("#form-register input[name='city']");
            // state = $("#form-register input[name='state']");
            // postal_code = $("#form-register input[name='postal_code']");
            // phone_number = $("#form-register input[name='phone_number']");

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

                if(email.val() == '') {
                    email.next().show().html('* Required');
                    error = 1;
                } else {
                    email.next().hide().html('');
                }

                if(isValidEmail(email.val()) == false) {
                    email.next().show().html('* Invalid Email Address');
                    error = 1;
                } else {
                    email.next().hide().html('');
                }

                // checkUserEmail(email.val());
               
                // if(isexists == 1)
                // {
                //     email.next().show().html('* Email Address taken. Specify another email');
                //     error = 1;
                // }
                // else
                // {
                //     email.next().hide().html('');
                // }

                if(password.val() == '') {
                    password.next().show().html('* Required');
                    error = 1;
                } else {
                    password.next().hide().html('');
                }

                if(password.val().length  >= 8 && exp.test(password.val()) == true ) {
                    password.next().hide().html('');
                } else {
                    password.next().show().html('* Password should be atleast 8 alphanumeric characters');
                    error = 1;
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

                if(term_agree == false ) {
                    $("input[name='chk_bizagree']").next().show().html('* Required');
                    error = 1;
                } else {
                    $("input[name='chk_bizagree']").next().hide().html('');
                }
            
                if(error==0)
                {   
                    showLoader_biz();
                   $("#form-register-business-step-1").submit();
                }
    });

    $('#activate-step-2').on('click', function(e) {
        e.preventDefault();

        error = 0;

         if(business_v_code.val() == '') {
            business_v_code.next().show().html('* Required');
            error = 1;
        } else {
            business_v_code.next().hide().html('');
        }

        if(error==0)
        {   
          showLoader_biz();
          $("#form-register-business-step-2").submit();
        }
    });

    $('#activate-step-3').on('click', function(e) {
        e.preventDefault();
            error = 0;
            
             if(business_v_code.val() == '') {
                business_v_code.next().show().html('* Required');
                error = 1;
            } else {
                business_v_code.next().hide().html('');
            }
            
            if(error==0)
            {
              showLoader_biz();
              $("#form-register-business-step-3").submit();
            }
    });
    
});