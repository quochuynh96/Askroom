<!DOCTYPE html>
<html>
<title>AskRoom - Giải pháp thu thập ý kiến cho hội thảo miễn phí !!!</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="assets\img\ask_room_logo.png">
<!-- Add Boostrap, Jquery,... -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link href="https://fonts.googleapis.com/css?family=Chakra+Petch" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="dist/aos.css" />
<style>
body,h1 {font-family: "Raleway", sans-serif}
body, html {height: 100%}
.bgimg {
    background-image: url('assets/img/bg1.jpg');
    min-height: 100%;
    background-position: center;
    background-size: cover;
}
</style>
<body>
  <!-- Include file Entity -->
<?php
include_once __DIR__ . '/businessObject/databaseAccessObject/entity/room.php';
include_once __DIR__ . '/businessObject/databaseAccessObject/entity/question.php';
include_once __DIR__ . '/businessObject/roomBO.php';
include_once __DIR__ . '/businessObject/questionBO.php';
session_start();
$room;
$roomBO = new roomBO();
$questionBO = new questionBO();

if (array_key_exists("loginroom", $_SESSION)) {
    $roomcode = $_SESSION["loginroom"];
    $password = $_SESSION["password"];
    $room = $roomBO->getRoom_byCode($roomcode);
    if ($room->getTitle() === "") {
        unset($_SESSION['loginroom']);
        header('Location: index');
    }
} else {
    header('Location: index');
}
?>
<script src="dist/aos.js"></script>
    <script>
      AOS.init({
        easing: 'ease-in-out-sine'
      });
    </script>
<div class="bgimg w3-animate-opacity w3-text-white">

  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6 col-6" data-aos="fade-right">

          <center>
          <a href="index"><img src="assets/img/ask_room_logo.png"></a>
          <br><b style="font-family: 'Chakra Petch', sans-serif;"> ASKROOM </b>
          </center>

      </div>
      <div class="col-md-6 col-sm-6 col-6" data-aos="fade-left">

        <center>
        <br>
        <a href="index?outcode=1"><i class="fas fa-comments"></i></a> - ADMIN PAGE
        <hr>
        <!-- Room Code -->
        <b style="font-family: 'Chakra Petch', sans-serif;">ROOM : <?php echo "" . $room->getCode() ?></b>
        <hr>
        <!-- Room Title -->
        <b style="font-family: 'Chakra Petch', sans-serif;">NAME ROOM : <?php echo "" . $room->getTitle() ?></b>
        <hr>
        <!-- Room Info -->
        <b style="font-family: 'Chakra Petch', sans-serif;">INFO : <?php echo "" . $room->getInfo() ?></b>
        <hr>
        <button class="btn btn-success" id="reload">Reload</button>
        <br>
        <script>
        $('#reload').click(function (e) {
          loadlistquestion();
        });
        </script>
        <hr>
        </center>

      </div>
    </div>
    <!-- Content Question -->
    <div class="row" data-aos="zoom-out-down">
      <div class="panel panel-primary">
      <div class="panel-heading"><b style="font-family: 'Chakra Petch', sans-serif;">Content</b></div>
      <div class="panel-body" style="overflow: scroll;width: 100%;">
        <!--Content-->
        <div id='contentQuestion'></div>
         <!--Content-->
      </div>
    </div>
    </div>

    <div class="row">
      <div class="col-md-6 col-sm-6 col-6" style="float: left;">
         Copyright © <a href="https://fb.com/qh273">Quoc Huynh</a> 2018
      </div>
      <div class="col-md-6 col-sm-6 col-6" style="float: right; display: inline;">
      <a href="index?outcode=1"><b style="font-family: 'Chakra Petch', sans-serif;color: white;">EXIT</b> <i class="fas fa-sign-out-alt"></i></a>
      </div>
    </div>
  </div>
</div>
<script>
var dataQuestion = "";
function loadlistquestion() {
    $.post("ajaxSearchRoomCode", {
        loadlistquestion : '<?php echo ($room->getCode()) ?>'
    },
        function (data, status) {
          if (data != dataQuestion) {
                dataQuestion = data;
                $('#contentQuestion').html(data);
                $("#reload").removeClass("btn-danger");
                $("#reload").addClass("btn-primary");
                document.title = "AskRoom - Giải pháp thu thập ý kiến cho hội thảo miễn phí !!!";
        }
    });
}
$(document).ready(function () {
    loadlistquestion();
});
</script>
<script language="javascript">
    setInterval(function(){
      $.post("ajaxSearchRoomCode", {
        loadlistquestion : '<?php echo ($room->getCode()) ?>'
      },
      function (data, status) {
        if (data != dataQuestion) {
                $("#reload").removeClass("btn-primary");
                $("#reload").addClass("btn-danger");
                changeTitle();
            }
    });
    }, 3000);
    function changeTitle() {
    console.log("asd");
    document.title = "(*) Có câu hỏi mới - AskRoom - Giải pháp thu thập ý kiến cho hội thảo miễn phí !!!";
    setTimeout(() => {
        document.title = "AskRoom - Giải pháp thu thập ý kiến cho hội thảo miễn phí !!!";
    }, 2000);
}
</script>
</body>
</html>