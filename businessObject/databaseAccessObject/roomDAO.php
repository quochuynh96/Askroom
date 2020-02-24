<?php
include_once  __DIR__ .'/entity/room.php';
class roomDAO
{
    /**
     * getTitle_byCode function
     *
     * @param [type] $room_code
     * @return $string_title
     */
    public function getTitle_byCode($code)
    {
        $configs = include_once('config.php');
        $conn = mysqli_connect($configs['host'], $configs['username'], $configs['password'], $configs['database']) or die("Connect failed !");
        
        // Set charset for connection
        mysqli_set_charset($conn, "utf8");

        $sql = "SELECT title FROM room WHERE code=?";

        if ($stmt = mysqli_prepare($conn, $sql)) {

            mysqli_stmt_bind_param($stmt, "s", $code);

            mysqli_stmt_execute($stmt);

            mysqli_stmt_bind_result($stmt, $result);

            mysqli_stmt_fetch($stmt);

            mysqli_stmt_close($stmt);

            mysqli_close($conn);

            return $result;
        }
        mysqli_close($conn);
    }

    public function getRoom_byCode($code)
    {
        $configs = include_once('config.php');
        $conn = mysqli_connect($configs['host'], $configs['username'], $configs['password'], $configs['database']) or die("Connect failed !");
        
        // Set charset for connection
        mysqli_set_charset($conn, "utf8");

        $sql = "SELECT * FROM room WHERE code=?";

        if ($stmt = mysqli_prepare($conn, $sql)) {

            mysqli_stmt_bind_param($stmt, "s", $code);

            mysqli_stmt_execute($stmt);

            mysqli_stmt_bind_result($stmt, $result1, $result2, $result3, $result4);

            mysqli_stmt_fetch($stmt);

            $result = new room($result1, $result2, $result3, $result4);

            mysqli_stmt_close($stmt);

            mysqli_close($conn);
            return $result;
        }
        mysqli_close($conn);
    }
}
?>