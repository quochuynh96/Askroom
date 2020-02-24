<!DOCTYPE html>
<html>
<title>AskRoom - Giải pháp thu thập ý kiến cho hội thảo miễn phí !!!</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Import lib css,jquerry,... -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link href="https://fonts.googleapis.com/css?family=Chakra+Petch" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<link rel="stylesheet" type="text/css" href="assets/css/buttonstyle.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="dist/aos.css" />

<!-- Style for aos -->
<!-- style custom for body tag -->
<style>
body,h1 {font-family: "Raleway", sans-serif}
body, html {height: 100%}
.bgimg {
    background-image: url('assets/img/bg<?php echo "".rand(1,2)?>.jpg');
    min-height: 100%;
    background-position: center;
    background-size: cover;
}
#roompass{
  background:  rgba(255, 255, 255, 0.5);
  text-align: center;
  font-family: 'Chakra Petch', sans-serif;
 }
 #roomcode{
  background:  rgba(255, 255, 255, 0.5);
  text-align: center;
  font-family: 'Chakra Petch', sans-serif;
 }
</style>
<!-- Scrip check avaiable for input tag -->
<script type="text/javascript">
    $( document ).ready(function() {
    });

  function IsEmpty2(){
  if(document.forms['modal-Form'].newroomcode.value === "")
  {
    alert("Oppp! Bạn chưa nhập mã phòng mà !");
    return false;
  }
  if(document.forms['modal-Form'].newroompass.value === "")
  {
    alert("Oppp! Bạn chưa nhập mật khẩu phòng mà !");
    return false;
  }
    return true;
  }
</script>
<!-- End of script check data -->
<body>
  <!-- Script -->
  <script src="dist/aos.js"></script>
    <script>
      AOS.init({
        easing: 'ease-in-out-sine'
      });
    </script>
<div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
  <div data-aos="fade-right" data-aos-easing="linear" data-aos-duration="1500">
  <div  id="logo" class="w3-display-topleft w3-padding-large w3-xlarge">
    <center>
      <!-- Logo  -->
    <a href="index"><img src="assets/img/ask_room_logo.png"></a>
    <br><b style="font-family: 'Chakra Petch', sans-serif;"> ASKROOM </b>
    </center>
  </div>
</div>
  <!-- Input data section -->
  <div data-aos="zoom-out-down" data-aos-easing="linear" data-aos-duration="1500">
  <div id="mid-content" class="w3-display-middle">
    <center style="margin-top:100%;"><h1 class="w3-jumbo w3-animate-top" style="font-family: 'Chakra Petch', sans-serif;">ASKROOM</h1>
    <hr class="w3-border-grey" style="margin:auto;width:40%">

    <h4 style="font-family: 'Chakra Petch', sans-serif;">Đăng nhập vào phòng : Chỉ dùng cho chủ phòng !</h4></center> 

    <p class="w3-large w3-center">ROOM CODE :</p>
   
    <center>
    <div class="input-group">
    <span class="input-group-addon"><i class="fas fa-laptop-code"></i></span> 

    <!-- roomcode input -->
    <input id="roomcode" type="number" min="1" max="99999" autocomplete="false" class="form-control">
    </div>
    <br> 
    
    <!-- password input -->
    <div class="input-group">
    <span class="input-group-addon"><i class="fas fa-key"></i></span>
    <input id="roompass" type="password" class="form-control">
    </div>
    <br>
            <input type="checkbox" onchange="document.getElementById('roompass').type = this.checked ? 'text' : 'password'">
            <b>Show password.</b>
            <br>
    <div id="notification"></div>

    <br>
    <div class="social">
    <button class="btnTran icon" id="loginRoom"><i class="fas fa-sign-in-alt"></i></button>
    <br>
    <!-- back button -->
    <a href="index"><button class="btnTran icon"><i class="fas fa-backward"></i></button></a>
    </div>
  </center>
  </div>
  </div>

  <div class="w3-display-bottomleft w3-padding-large">
    Copyright © <a href="https://fb.com/qh273">Quoc Huynh</a> - K39 - IT - HUSC 2018
  </div>
  <script>
      $(document).ready(function(){

        $(document).keypress(function(e) {
            if(e.which == 13) {
                 $('#loginRoom').click();
            }
        });

        $('#roomcode').on('input',function(e){
             $("#notification").slideUp("slow");
             $("#notification").html("");
        });
        $('#roompass').on('input',function(e){
             $("#notification").slideUp("slow");
             $("#notification").html("");
        });

        $('#loginRoom').click(function(){
          if($('#roomcode').val() === "")
          {
            alert("Oppp! Bạn chưa nhập mã phòng mà !");
            return false;
          }
          if($('#roompass').val() === "")
          {
            alert("Oppp! Bạn chưa nhập mật khẩu phòng mà !");
            return false;
          }
          else
          {
            var loginroom = $('#roomcode').val();
            var password = $('#roompass').val();
             $.post("ajaxSearchRoomCode",
              {
                  loginroom: loginroom,
                  password : password
              },
              function(data, status){
                $("#notification").html(data);
                 $("#notification").slideDown();
                  if(data.indexOf("Tự động chuyển sang") != -1)
                    setTimeout(function(){ window.location = "manageroom";}, 3000)
              });
          }
          });
      });
    </script>
</body>
</html>