<!DOCTYPE html>
<html>
<title>AskRoom - Giải pháp thu thập ý kiến cho hội thảo miễn phí !!!</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="assets\img\ask_room_logo.png">
<!-- Style CSS, Boostrap,... -->
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

<!-- CSS -->
<style>
body,h1 {font-family: "Raleway", sans-serif}
body, html {height: 100%}
.bgimg {
    background-image: url('assets/img/bg<?php echo "" . rand(1, 2) ?>.jpg');
    min-height: 100%;
    background-position: center;
    background-size: cover;
}
</style>
<!-- End of CSS -->

<!-- Script check Input -->
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
<!-- End of script check Input -->
<body>
  <script src="dist/aos.js"></script>
    <script>
      AOS.init({
        easing: 'ease-in-out-sine'
      });
    </script>

  <!-- PHP Check Data Get or Post -->
<?php 
session_start();
// Open session
if (array_key_exists("outcode", $_GET)) {
  if(array_key_exists("roomcode", $_SESSION))
  {
    unset($_SESSION['roomcode']);
  }
  if(array_key_exists("loginroom", $_SESSION))
  {
    unset($_SESSION['loginroom']);
  }
  if(array_key_exists("password", $_SESSION))
  {
    unset($_SESSION['password']);
  }
  header('Location: index');
}
//Check out code data and process
//Check data of session, if have element roomcode Location to inroom
if (array_key_exists('roomcode', $_SESSION)) {
  header('Location: inroom');
}
//Check out code data and process
//Check data of session, if have element roomcode Location to inroom
if (array_key_exists('loginroom', $_SESSION)) {
  header('Location: manageroom');
}

?>
<!-- End of Data Check -->


<div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
  <div data-aos="fade-right" data-aos-easing="linear" data-aos-duration="1500">
  <div  id="logo" class="w3-display-topleft w3-padding-large w3-xlarge">
    <center>
    <a href="index"><img src="assets/img/ask_room_logo.png"></a>
    <br><b style="font-family: 'Chakra Petch', sans-serif;"> ASKROOM </b>
    </center>
  </div>
</div>
  
  <div data-aos="zoom-out-down" data-aos-easing="linear" data-aos-duration="1500">
  <div id="mid-content" class="w3-display-middle">
    <center style="margin-top:100%;"><h1 class="w3-jumbo w3-animate-top" style="font-family: 'Chakra Petch', sans-serif;">ASKROOM</h1>
    <hr class="w3-border-grey" style="margin:auto;width:40%">
    <h4 style="font-family: 'Chakra Petch', sans-serif;">Giải pháp thu thập ý kiến cho hội thảo miễn phí !!!</h4></center>
    <p class="w3-large w3-center">ROOM CODE :</p>
   
   <!-- Input roomcode element -->
    <center>
    <div class="input-group">
    <span class="input-group-addon"><i class="fas fa-laptop-code"></i></span>
    <input id="roomcode" type="number" min="1" max="99999" autocomplete="false" class="form-control" name="roomcode" style="font-family: 'Chakra Petch', sans-serif;">
    </div>
    <br>
    <!-- div tag notifi to load ajax result process -->
    <div id="notification"></div>

    <br>
    <!-- class to load animation to animation for button -->
    <div class="social">
      <!-- Button check roomcode in database -->
    <button class="btnTran icon" id="checkRoomCode"><i class="fas fa-search"></i></button>
    <!-- Button open login to login manage room -->
    <a href="login"><button class="btnTran icon" id="manageRoom"><i class="fas fa-edit"></i></button></a>
    <!-- Button to create new room -->
   <button class="btnTran icon" id="createroom" data-toggle="modal" data-target="#inputModal"><i class="fas fa-plus-circle"></i></button>
    </div>
    <br>
  </center>
  </div>
  </div>


  <div class="w3-display-bottomleft w3-padding-large">
    <!-- Footer, copyright, bla bla -->
    Copyright © <a href="https://fb.com/qh273">Quoc Huynh</a> - K39 - IT - HUSC 2018
  </div>

<!-- The Modal create new room -->
  <div class="modal fade" id="inputModal">
    <div class="modal-dialog" >
      <div class="modal-content"  style="background:  rgba(255, 255, 255, 0.9);">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" style="color: black;"><b>CREATE NEW ASKROOM</b></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" >
          <div class="input-group">
          <span class="input-group-addon"><i class="fas fa-sync" id="randRoomCode"></i></span>
          <input id="newroomcode" type="text" class="form-control" name="newroomcode" style="font-family: 'Chakra Petch', sans-serif;pointer-events:none;">
          </div>
          <!-- Script to load random code by ajax method -->
            <script>
                $(document).ready(function(){
                  $.post("ajaxSearchRoomCode",
                        {
                            randroomcode: 1
                        },
                        function(data, status){
                          $("#newroomcode").val(data);
                        });
                  $('#randRoomCode').click(function(){
                    {
                       $.post("ajaxSearchRoomCode",
                        {
                            randroomcode: 1
                        },
                        function(data, status){
                          $("#newroomcode").val(data);
                        });
                    }
                    });
                });
            </script>
            <br>
          <br>
          <!-- End of script -->
          <!-- Input new room code, lock and set default -->
          <div class="input-group">
            <span class="input-group-addon"><i class="fas fa-key"></i></span>
            <input id="newroompass" type="password" maxlength="9" class="form-control" name="newroompass" style="font-family: 'Chakra Petch', sans-serif;">
            </div> 
            <br>
            <input type="checkbox" onchange="document.getElementById('newroompass').type = this.checked ? 'text' : 'password'">
            <b style="color: black; ">Show password.</b>
            <br>
            <input style="float: right;" class="btn btn-success" id="insert" onclick="return IsEmpty2();" type="submit" value="Tạo phòng !!!" />
             <br>
             <br>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  <!-- Script to check data available -->
  <script>
      $(document).ready(function(){

        $(document).keypress(function(e) {
            if(e.which == 13) {
                 $('#checkRoomCode').click();
            }
        });

        $('#roomcode').on('input',function(e){
             $("#notification").slideUp("slow");
             $("#notification").html("");
        });

        $('#checkRoomCode').click(function(){
          if($('#roomcode').val() === "")
          {
            alert("Oppp! Bạn chưa nhập mã phòng mà !");
            return false;
          }
          else
          {
            var roomcode = $('#roomcode').val();
             $.post("ajaxSearchRoomCode",
              {
                  roomcode: roomcode
              },
              function(data, status){
                $("#notification").html(data);
                 $("#notification").slideDown();
                  if(data.indexOf("tự chuyển trang") != -1)
                    setTimeout(function(){ window.location = "index";}, 3000)
              });
          }
          });
      });
    </script>
</body>
</html>