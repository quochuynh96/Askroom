<?php
include_once __DIR__ . '/databaseAccessObject/entity/room.php';
include_once __DIR__ . '/databaseAccessObject/roomDAO.php';
class roomBO
{
    /**
     * __construct function
     */
    public function __construct()
    {

    }
    /**
     * getRoom_byCode function
     *
     * @param [string] $code
     * @return $string_title
     */
    public function getTitle_byCode($code)
    {
        $roomDAO = new roomDAO();
        return $roomDAO->getTitle_byCode($code);
    }

    /**
     * getRoomPass_byCode function
     *
     * @param [string] $code
     * @return $string_pass
     */
    //public function getRoomPass_byCode($code)
    //{

    //}

    /**
     * getRoom_byCode function
     *
     * @param [string] $code
     * @return $room_object
     */
    public function getRoom_byCode($code)
    {
        $roomDAO = new roomDAO();
        return $roomDAO->getRoom_byCode($code);
    }
}
?>