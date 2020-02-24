<?php
include_once __DIR__ . '/databaseAccessObject/questionDAO.php';
class questionBO
{

    /**
     * getQuestion_byCode function
     *
     * @param [string] $question_code
     * @return $question_object
     */
    public function getQuestion_byCode($code)
    {

    }

    /**
     * getListAvailableQuestion_byRoomCode function
     *
     * @param [string] $room_code
     * @return $array_question
     */
    public function getListAvailableQuestion_byRoomCode($code)
    {
        $questionDAO = new questionDAO();
        return $questionDAO->getListAvailableQuestion_byRoomCode($code);
    }

    /**
     * getListQuestion_byRoomCode function
     *
     * @param [string] $room_code
     * @return $array_question
     */
    public function getListQuestion_byRoomCode($code)
    {
        $questionDAO = new questionDAO();
        return $questionDAO->getListQuestion_byRoomCode($code);
    }

    /**
     * getNewQuestion_byQuestionCode function
     *
     * @param [string] $last_question_code
     * @return $array_newest_question
     */
    public function getNewQuestion_byQuestionCode($code)
    {

    }

    /**
     * addNewQuestion function
     *
     * @param [string] $author
     * @param [string] $content
     * @param [string] $roomcode
     * @return $result : bool
     */
    public function addNewQuestion($author, $content, $roomcode)
    {
        $questionDAO = new questionDAO();
        return $questionDAO->addNewQuestion($author, $content, $roomcode);
    }

    /**
     * hideQuestion function
     *
     * @param [string] $hidequestion
     * @return $result : bool
     */
    public function hideQuestion($hidequestion)
    {
        $questionDAO = new questionDAO();
        return $questionDAO->hideQuestion($hidequestion);
    }

    /**
     * showQuestion function
     *
     * @param [string] $showquestion
     * @return $result : bool
     */
    public function showQuestion($showquestion)
    {
        $questionDAO = new questionDAO();
        return $questionDAO->showQuestion($showquestion);
    }
}
?>