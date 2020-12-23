<div id="status"></div>




<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  
  
<script>

var user_status ="";
var access_token="";
var username="";


  window.fbAsyncInit = function() {
    FB.init({
      appId      : '2188536261272510',
      cookie     : true,
      xfbml      : true,
      version    : 'v4.0'
    });
    triggerLoginCheck();
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
   
   
   
  
   
   function triggerLoginCheck() {       
       FB.getLoginStatus(function(response) {
       statusChangeCallback(response);
       console.log(response);  
       });
    }


 function statusChangeCallback(response) {
    // console.log('statusChangeCallback');
    console.log(response.status);
    user_status = response.status;
    access_token = response.accessToken;
    FB.api('/me', 'GET', {fields: 'first_name,last_name,name,id'}, function(response) {
				// console.log(response.first_name);
				username=response.first_name;
				document.getElementById('username').innerHTML = "Hi "+ response.first_name;
				
				
				var first_name = response.first_name;
				var last_name = response.last_name;
				var id = response.id;
				
				var token =access_token ;
				
				$.ajax({
                  type : 'POST',
                  url  : 'ajax_call.php',
                  data : {id:id,token:token},
                  success : function(){
                     
                   }
                });
				
				
				
				
				
			});
 }
 
 function nova_funct(){
     if(user_status == "connected"){
        //  alert('connected');
        
     }else{
         FB.login();
         
     }
 
    
 }
 
  function getInfo() {
	FB.api('/me', 'GET', {fields: 'first_name,last_name,name,id'}, function(response) {
		console.log(response);
	});
}
 

   
</script>








    <style>
    .feedback {
      background-color : #31B0D5;
      color: white;
      padding: 10px 20px;
      border-radius: 4px;
      border-color: #46b8da;
    }
    
    #mybutton {
      position: fixed;
      bottom: 12px;
      right: 10px;
      z-index:9;
    }
    </style>
    
    <div id="mybutton">
        <div style="color:#ffffff;" id="username">
            
        </div>
     <br>
        <button  onclick="nova_funct()" class="feedback">get a reminder?</button>
        
        <button  onclick="getInfo()" class="feedback">get ainfo?</button>
        
        <!--<div class="fb-login-button" data-width="" data-size="large" data-button-type="continue_with" data-auto-logout-link="false" data-use-continue-as="false"></div>-->
    </div>



</div>