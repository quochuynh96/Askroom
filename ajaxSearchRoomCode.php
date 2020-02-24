<?php
include_once __DIR__ . '/businessObject/databaseAccessObject/entity/room.php';
include_once __DIR__ . '/businessObject/roomBO.php';
include_once __DIR__ . '/businessObject/questionBO.php';
$roomBO = new roomBO();
$questionBO = new questionBO();

/**
 * Ajax : Check roomcode and return the title !
 */
if (array_key_exists("roomcode", $_POST)) {
  $roomcode = $_POST['roomcode'];
  $result = $roomBO->getTitle_byCode($roomcode);
  $check = false;
  if ($result != null) {
    session_start();
    $_SESSION['roomcode'] = $roomcode;
    echo "Tìm thấy phòng khảo sát : <a href='inroom.php'><b style='color : red;'>" . $result . "</b></a>. Hệ thống sẽ tự chuyển trang sau 3s !";
    return;
  } else {
    echo "Không tìm thấy phòng nào phù hợp !" . $result;
  }
}

/**
 * Ajax : Return roomcode random for register
 */
if (array_key_exists("randroomcode", $_POST)) {
  $roomcode = rand(10000, 99999);
  echo ($roomcode);
  return;
}

/**
 * Ajax : Check data login
 */
if (array_key_exists("loginroom", $_POST)) {
  $roomcode = $_POST['loginroom'];
  $password = "";
  if (array_key_exists("password", $_POST)) {
    $password = $_POST['password'];
  }

  $room = $roomBO->getRoom_byCode($roomcode);
  if ($room->getTitle() != null) {
    if ($room->getCode() === $roomcode) {
      if ($room->getPassword() === $password) {
        session_start();
        $_SESSION['loginroom'] = $roomcode;
        $_SESSION['password'] = $password;
        $check = true;
        echo "Đăng nhập thành công vào phòng : <a href='manageroom.php'><b style='color : red;'>" . $room->getTitle() . "</b></a> . Tự động chuyển sang trang quản lý trong 3s !";
        return;
      } else {
        echo "Tìm thấy phòng : " . $room->getTitle() . ". Nhưng mật khẩu không đúng !";
        return;
      }
    }
  } else {
    echo "Sai mã phòng hoặc mật khẩu !";
  }
}

/**
 * Ajax : Add new Question.
 */
if (array_key_exists("author", $_POST)) {
  $author = $_POST['author'];
  $content = "";
  if (array_key_exists("content", $_POST)) {
    $content = $_POST['content'];
  }
  $roomcode = "";
  if (array_key_exists("room", $_POST)) {
    $roomcode = $_POST['room'];
  }
  $result = $questionBO->addNewQuestion($author, $content, $roomcode);
  echo ($result);
}

/**
 * Ajax : Hide and Show question.
 */
if (array_key_exists("hidequestion", $_POST)) {
  $hidequestion = $_POST['hidequestion'];

  $result = $questionBO->hideQuestion($hidequestion);
  echo ($result);
}
if (array_key_exists("showquestion", $_POST)) {
  $showquestion = $_POST['showquestion'];

  $result = $questionBO->showQuestion($showquestion);
  echo ($result);
}

/**
 * Ajax : Load list question for admin page.
 */
if (array_key_exists("loadlistquestion", $_POST)) {
  $roomcode = $_POST['loadlistquestion'];
  $listQuestion = $questionBO->getListQuestion_byRoomCode($roomcode);
  if ($listQuestion != null) {
    for ($i = 0; $i < count($listQuestion); $i++) {
      {
        echo "<div class='alert alert-info aos-init aos-animate' data-aos='zoom-out-down'>";
        echo "#" . ($i + 1) . " -- <strong>" . $listQuestion[$i]->getAuthor() . "</strong> <b style='color : red;'>:</b>" . $listQuestion[$i]->getContent();

        if ($listQuestion[$i]->getAvailable() == 0) {
          echo "<button id='show" . $listQuestion[$i]->getCode() . "' value='" . $listQuestion[$i]->getCode() . "' style='float : right' type='button' class='btn btn-primary'>Show</button>";
        } else if ($listQuestion[$i]->getAvailable() == 1) {
          echo "<button id='hide" . $listQuestion[$i]->getCode() . "' value='" . $listQuestion[$i]->getCode() . "' style='float : right' type='button' class='btn btn-secondary'>Hide</button>";
        } else {
          echo "<button id='error" . $listQuestion[$i]->getCode() . "' value='" . $listQuestion[$i]->getCode() . "' style='float : right' type='button' class='btn btn-warning'>Error</button>";
        }

        echo "<script>";
        echo "$(document).ready(function () {";
        echo "$('#show" . $listQuestion[$i]->getCode() . "').click(function (e) { ";
        echo "var showquestion = $('#show" . $listQuestion[$i]->getCode() . "').val();";
        echo "$.post('ajaxSearchRoomCode', ";
        echo "{";
        echo "showquestion : showquestion";
        echo "}, function (data, status) {";
        echo " if(data.indexOf('1') != -1)";
        echo " {";
        echo "loadlistquestion();";
        echo " } ";
        echo " else";
        echo " {";
        echo "alert('Xảy ra lỗi !');";
        echo " } ";
        echo " });";
        echo "});";
        echo "$('#hide" . $listQuestion[$i]->getCode() . "').click(function (e) { ";
        echo " var hidequestion = $('#hide" . $listQuestion[$i]->getCode() . "').val();";
        echo " $.post('ajaxSearchRoomCode', ";
        echo "{";
        echo "  hidequestion : hidequestion";
        echo "}, function (data, status) {";
        echo "  if(data.indexOf('1') != -1)";
        echo " {";
        echo "loadlistquestion();";
        echo " } ";
        echo " else";
        echo "{";
        echo "alert(' Xảy ra lỗi !');";
        echo "}         ";
        echo " });";
        echo "});";
        echo "});";
        echo " </script>";
        echo "</div>";
      }
    }
  } else {

    echo "<div class=' alert alert - info ' data-aos=' zoom - out - down '>";
    echo "#0 --< strong > Phòng chưa có câu hỏi nào !< / strong >";
    echo " < / div > ";
  }

}

/**
 * Ajax : Load list question for guest page.
 */
if (array_key_exists("loadlistavailablequestion", $_POST)) {
  $roomcode = $_POST['loadlistavailablequestion'];
  $listQuestion = $questionBO->getListAvailableQuestion_byRoomCode($roomcode);
  if ($listQuestion != null) {
    for ($i = 0; $i < count($listQuestion); $i++) {
      {
        echo "<div class='alert alert-info aos-init aos-animate' data-aos='zoom-out-down'>";
        echo "#" . ($i + 1) . " -- <strong>" . $listQuestion[$i]->getAuthor() . "</strong> <b style='color : red;'>:</b>" . $listQuestion[$i]->getContent();
        echo "</div>";
      }
    }
  } else {

    echo "<div class=' alert alert - info ' data-aos=' zoom - out - down '>";
    echo "#0 --< strong > Phòng chưa có câu hỏi nào !< / strong >";
    echo " < / div > ";
  }

}
?>