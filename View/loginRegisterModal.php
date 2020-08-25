		 <div class="modal fade login" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		      <div class="modal-dialog login animated">
    		      <div class="modal-content">
    		         <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Login <!--with--></h4>
                    </div>
                    <div class="modal-body">
                        <div class="box">
                             <div class="content">
<!--                                <div class="social">
                                    <a class="circle github" href="#">
                                        <i class="fa fa-github fa-fw"></i>
                                    </a>
                                    <a id="google_login" class="circle google" href="#">
                                        <i class="fa fa-google-plus fa-fw"></i>
                                    </a>
                                    <a id="facebook_login" class="circle facebook" href="#">
                                        <i class="fa fa-facebook fa-fw"></i>
                                    </a>
                                </div>-->
                                <div class="division">
<!--                                    <div class="line l"></div>
                                      <span>or</span>
                                    <div class="line r"></div>-->
                                </div>
                                <div class="error"></div>
                                <div class="form loginBox">
                                    <form method="" action="" accept-charset="UTF-8">
 
                                    <input id="email_l" class="form-control" type="text" placeholder="Email" name="email">
                                    <input id="password_l" class="form-control" type="password" placeholder="Password" name="password">
                                    <input class="btn btn-default btn-login" type="button" value="Login" onclick="loginAjax()">
                                    </form>
                                </div>
                             </div>
                        </div>
                        <div class="box" id="RegisterModal">
                            <div class="content registerBox" style="display:none;">
                             <div class="form">
                                <form method="" html="{:multipart=>true}" data-remote="true" action="" accept-charset="UTF-8">
                                    <input type="radio" id="patient" name="patient" onclick="Ispatient()" value="patient"><?php echo " "?><strong>Patient profile</strong><br>
                                    <input type="radio" id="pharmacy" name="patient" onclick="Ispharmacy()" value="pharmacy"><?php echo " "?><strong>Pharmacy profile</strong><br>
                                        <input id="first_name" class="form-control" type="text" placeholder="First Name" name="FirstName" style="display: none">
                                    <input id="last_name" class="form-control" type="text" placeholder="Last Name" name="LastName" style="display: none">
                                    <input id="email_r" class="form-control" type="text" placeholder="Email" name="email" style="display: none">
                                    <input id="password_r" class="form-control" type="password" placeholder="Password" name="password"style="display: none">
                               <input id="pharmacyName" class="form-control" type="text" placeholder="pharmacy Name" name="pharmacyName" style="display: none">
                                    <input id="commercial_reg" class="form-control" type="text" placeholder="pharmacy's commercial register" name="commercial_reg" style="display: none">
                                    <input id="license" class="form-control" type="text" placeholder="Enter your license number" name="license" style="display: none">
                                    <input id="email_ph" class="form-control" type="text" placeholder="Email" name="email_ph" style="display: none">
                                    <input id="password_ph" class="form-control" type="password" placeholder="Password" name="password_ph"style="display: none">
                                    <input id="phone_ph" class="form-control" type="text" placeholder="phone Number" name="phone_ph"style="display: none">
                                
                        
                                <input class="btn btn-default btn-register" type="button" value="Create account" name="commit" onclick="RegisterAjax()">
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="forgot login-footer">
                            <span>Looking to
                                 <a href="javascript: showRegisterForm();">create an account</a>
                            ?</span>
                        </div>
                        <div class="forgot register-footer" style="display:none">
                             <span>Already have an account?</span>
                             <a href="javascript: showLoginForm();">Login</a>
                        </div>
                    </div>
    		      </div>
		      </div>
		  </div>
 
<!--<script type="text/javascript">
    $(document).ready(function(){
        openLoginModal();
    });
</script>-->
    
<script>
 function Ispatient(){
      var patient = document.getElementById("patient");
      var firstName = document.getElementById("first_name");
      var lastName= document.getElementById("last_name");
      var email= document.getElementById("email_r");
      var password = document.getElementById("password_r");
      var pharmacy = document.getElementById("pharmacy");
        pharmacy.checked=false;
        $("#pharmacyName").hide();
        $("#commercial_reg").hide();
        $("#license").hide();
        $("#email_ph").hide();
        $("#password_ph").hide();
        $("#phone_ph").hide();
          $("#first_name").show();
        $("#last_name").show();
        $("#email_r").show();
        $("#email_ph").show();
        $("#password_r").show();
      if(patient.checked==true){
          firstName.style.display="block";
          lastName.style.display="block";
          email.style.display="block";
          password.style.display="block";
      }
      else {
              firstName.style.display="none";
          lastName.style.display="none";
          email.style.display="none";
          password.style.display="none";
      }
      
 }
 function Ispharmacy (){
        var pharmacy = document.getElementById("pharmacy");
      var pharmName = document.getElementById("pharmacyName");
      var commercial_reg= document.getElementById("commercial_reg");
      var email= document.getElementById("email_ph");
      var password = document.getElementById("password_ph");
      var license=document.getElementById("license");
       var phone_ph=document.getElementById("phone_ph");
      
      var patient = document.getElementById("patient");
        patient.checked=false;
        $("#pharmacyName").show();
        $("#commercial_reg").show();
        $("#license").show();
        $("#email_ph").show();
        $("#password_ph").show();
        $("#phone_ph").show();
        
         $("#first_name").hide();
        $("#last_name").hide();
        $("#email_r").hide();
        $("#email_ph").hide();
        $("#password_r").hide();
      if(pharmacy.checked==true){
          pharmName.style.display="block";
         commercial_reg.style.display="block";
          password.style.display="block";
          email.style.display="block";
          license.style.display="block";
          phone_ph.style.display="block";
      }
      else {
          
          pharmName.style.display="none";
         commercial_reg.style.display="none";
          password.style.display="none";
          email.style.display="none";
          license.style.display="none";
          phone_ph.style.display="none";
      }
 }
  function loginAjax(){
      var email=$("#email_l").val();
      var password=$("#password_l").val();
      if(email=="" || password==""){
          shakeModal(); 
          return;
      }
    $.post( "loginAjax.php", {
        email:email,
        password:password
    },
         
        function( html ) {
             
            if(html == 1){
                window.location.replace("AdminRegiserRequest.php"); 
            }
             else if(html == 2){
                window.location.replace("PharmacyProducts.php"); 
             }
              else if(html == 3){
                window.location.replace("index.php"); 
             }
             else {
                 shakeModal(); 
            } 
           
        });
   


}
function shakeModal(){
    $('#loginModal .modal-dialog').addClass('shake');
             $('.error').addClass('alert alert-danger').html("Invalid email/password combination");
             $('input[type="password"]').val('');
             setTimeout( function(){ 
                $('#loginModal .modal-dialog').removeClass('shake'); 
    }, 1000 ); 
}
 function shakeRegistrationModal(){
      $('#RegisterModal .modal-dialog').addClass('shake');
             $('.error').addClass('alert alert-danger').html("Enter Valid Data");
             $('input[type="password"]').val('');
             setTimeout( function(){ 
                $('#RegisterModal .modal-dialog').removeClass('shake'); 
    }, 1000 ); 
 }
function RegisterAjax () {
    var firstName=$("#first_name").val();
    var lastName=$("#last_name").val();
    var email=$("#email_r").val();
    var password=$("#password_r").val();
    var pharmName=$("#pharmacyName").val();
    var pharm_email=$("#email_ph").val();
    var commercial_reg=$("#commercial_reg").val();
    var license=$("#license").val();
    var pharm_password=$("#pharmacyName").val();
    var pharm_phone=$("#phone_ph").val();
    //var patient= document.getElementById("patient");
//    if (patient.checked==true){
//    if (firstName==""||lastName==""||email==""||password=="") {
//      shakeRegistrationModal();
//      return;
//    }
//    }
//       var pharmacy= document.getElementById("pharmacy");
//else if (pharmacy.checked==true)
//    if(pharmName==""||pharm_email==""||pharm_password==""||commercial_reg==""||license==""){
//        shakeRegistrationModal();
//    return;
//    }
 
  var selValue = $("input[type='radio']:checked").val();
  
    if(selValue == 'patient'){
       $.post("RegisterAjax.php", {
        type:selValue,
        firstName:firstName,
        lastName:lastName,
        password:password,
        email:email
       

  },
     
       function( html ) {
             
            if(html == 1){
                window.location.replace("index.php");            
            } else {
                 shakeRegistrationModal(); 
            }
});    }
else if(selValue == 'pharmacy'){
       $.post("RegisterAjax.php", {
        type:selValue,
        pharmName:pharmName,
        pharm_email:pharm_email,
        pharm_password:pharm_password,
        commercial_reg:commercial_reg,
        license:license,
        phone_ph:pharm_phone

  },
     
       function( html ) {
             
            if(html == 1){
                window.location.replace("index.php");            
            } else {
                 shakeRegistrationModal(); 
            }
});  
    
}
    
}
 </script>
        