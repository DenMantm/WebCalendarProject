
    //REQUEST FOR LOGIN
$("#ajax_login").click(function(){
    $.post("/login_ajax",
    {
        username: $('#l_user_name_ajax').val(),
        password: $('#l_password_ajax').val()
        //alert($('#user_name_ajax').val())
    },
    function(response, status,result){
      response = JSON.parse(response);
       
        if(response.key=="pass"){
          //CODE LOGIN SUCCESFULL
            window.location = '/main';
        }
        else{
          //CODE IF LOGIN UNSUCCESFULL
          console.log(response)
          console.log(response.key)
             alert("failed to login");
        }
        
    });
});

    //REQUEST FOR REGISTER
$("#ajax_register").click(function(){
    $.post("/register_ajax",
    {
        username: $('#r_user_name_ajax').val(),
        password: $('#r_password_ajax').val(),
        email: $('#r_email_ajax').val(),
        fname: $('#r_fname_ajax').val(),
        sname: $('#r_sname_ajax').val()
        //alert($('#user_name_ajax').val())
    },
    function(response, status,result){
      console.log(response);
      response = JSON.parse(response);
       console.log(response.key);
        if(response.key=="pass"){
          //CODE REGISTER SUCCESFULL
          alert("You have succesfully registered, please log in with your new credentials!");
          $('#signup_modal').modal('toggle');
          $('#login_modal').modal('toggle');
            //window.location = '/authorised_zone';
        }
        else if(response.key=="username_exists"){
          alert("username already exists");
        }
        else if(response.key=="email_exists"){
          alert("E-mail already taken");
        }
        else if(response.key=="email_fail"){
          alert("invalid e-mail");
        }
        else{
          //CODE DATABASE ERROR

             alert(response.key);
        }
        
    });
});


//request for e-mail recovery

$("#ajax_retrieve_password").click(function(){
  console.log("Res: "+ $('#r_email_ajax').val());
    $.post("/email_retrieve_password",
    {
        email: $('#retrieve_email_ajax').val()
        //alert($('#user_name_ajax').val())
    },
    function(response, status,result){
      console.log(response);
      response = JSON.parse(response);
      
       
        if(response.key=="p_recovery_success"){
          //CODE recovery succesful
            alert("E-mail sent, please check your e-mail");
        }
        else if (response.key=="p_recovery_fail"){
                    //CODE IF wrong e-mail
          console.log(response)
          console.log(response.key)
             alert("This e-mail have not been registered");
        }
        else{
            alert(response);
        }
        
    });
});



    