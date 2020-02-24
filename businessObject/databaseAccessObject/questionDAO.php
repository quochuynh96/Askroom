<?php
require_once  __DIR__ .'/entity/question.php';
class questionDAO
{
    /**
     * getListAvailableQuestion_byRoomCode function
     *
     * @param [string] $room_code
     * @return $array_question
     */
    public function getListAvailableQuestion_byRoomCode($code)
    {
        $configs = require 'config.php';
        $conn = mysqli_connect($configs['host'], $configs['username'], $configs['password'], $configs['database']) or die("Connect failed !");

        // Set charset for connection
        mysqli_set_charset($conn, "utf8");

        $sql = "SELECT * FROM question WHERE available=1 AND roomcode=?";

        if ($stmt = mysqli_prepare($conn, $sql)) {

            mysqli_stmt_bind_param($stmt, "s", $code);

            mysqli_stmt_execute($stmt);

            mysqli_stmt_bind_result($stmt, $result1, $result2, $result3, $result4, $result5);

            $i = 0;
            $result = array();

            while (mysqli_stmt_fetch($stmt)) {
                $temp = new question($result1, $result2, $result3, $result4, $result5);
                $result[$i] = $temp;
                $i = $i + 1;
            }

            return $result;

            mysqli_stmt_close($stmt);
        }

        mysqli_close($conn);
    }

    /**
     * getListQuestion_byRoomCode function
     *
     * @param [string] $room_code
     * @return $array_all_question
     */
    public function getListQuestion_byRoomCode($code)
    {
        $configs = require 'config.php';
        $conn = mysqli_connect($configs['host'], $configs['username'], $configs['password'], $configs['database']) or die("Connect failed !");

        // Set charset for connection
        mysqli_set_charset($conn, "utf8");

        $sql = "SELECT * FROM question WHERE roomcode=?";

        if ($stmt = mysqli_prepare($conn, $sql)) {

            mysqli_stmt_bind_param($stmt, "s", $code);

            mysqli_stmt_execute($stmt);

            mysqli_stmt_bind_result($stmt, $result1, $result2, $result3, $result4, $result5);

            $i = 0;
            $result = array();

            while (mysqli_stmt_fetch($stmt)) {
                $temp = new question($result1, $result2, $result3, $result4, $result5);
                $result[$i] = $temp;
                $i = $i + 1;
            }

            return $result;

            mysqli_stmt_close($stmt);
        }

        mysqli_close($conn);
    }

    public function addNewQuestion($author, $content, $roomcode)
    {
        $configs = require 'config.php';
        $conn = mysqli_connect($configs['host'], $configs['username'], $configs['password'], $configs['database']) or die("Connect failed !");

        // Set charset for connection
        mysqli_set_charset($conn, "utf8");

        $sql = "INSERT INTO `question`(`author`, `content`, `available`, `roomcode`) VALUES (?,?,0,?)";

        if ($stmt = mysqli_prepare($conn, $sql)) {

            mysqli_stmt_bind_param($stmt, "sss", $author, $content, $roomcode);

            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_affected_rows($stmt);

            mysqli_stmt_close($stmt);

            mysqli_close($conn);

            return $result;
        }

        mysqli_close($conn);
    }

    /**
     * hideQuestion function
     *
     * @param [int] $hidequestion
     * @return bool
     */
    public function hideQuestion($hidequestion)
    {
        $configs = require 'config.php';
        $conn = mysqli_connect($configs['host'], $configs['username'], $configs['password'], $configs['database']) or die("Connect failed !");

        // Set charset for connection
        mysqli_set_charset($conn, "utf8");

        $sql = "UPDATE `question` SET `available`=0 WHERE code=?";

        if ($stmt = mysqli_prepare($conn, $sql)) {

            mysqli_stmt_bind_param($stmt, "i", $hidequestion);

            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_affected_rows($stmt);

            mysqli_stmt_close($stmt);

            mysqli_close($conn);

            return $result;
        }

        mysqli_close($conn);
    }

    /**
     * showQuestion function
     *
     * @param [int] $showquestion
     * @return bool
     */
    public function showQuestion($showquestion)
    {
        $configs = require 'config.php';
        $conn = mysqli_connect($configs['host'], $configs['username'], $configs['password'], $configs['database']) or die("Connect failed !");

        // Set charset for connection
        mysqli_set_charset($conn, "utf8");

        $sql = "UPDATE `question` SET `available`=1 WHERE code=?";

        if ($stmt = mysqli_prepare($conn, $sql)) {

            mysqli_stmt_bind_param($stmt, "i", $showquestion);

            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_affected_rows($stmt);

            mysqli_stmt_close($stmt);

            mysqli_close($conn);

            return $result;
        }

        mysqli_close($conn);
    }
}
?>