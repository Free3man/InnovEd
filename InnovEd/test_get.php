<?php
class DB_Func
{
    protected $server = "localhost";
    protected $login = "root";
    protected $password = "";
    protected $db = "online_school";
    function connection_db()
    {
        $connect = mysqli_connect("{$this->server}", "{$this->login}", "{$this->password}", "{$this->db}");
        mysqli_select_db($connect, "Online_school");
        return $connect;
    }
}
class Test
{
    public $id_test;
    public function __construct($id_test)
    {
        $this->id_test = $id_test;
    }
    function get_blank()
    {     
        $connect = parent::connection_db();
        $get_questions = mysqli_query($connect, "SELECT * FROM `question` WHERE `parent_test` = '{$this->id_test}'");
        $questions = array();
        $answers = array();
        for ($i=0; $i<mysqli_num_rows($get_questions); $i++)
        {
            $question = mysqli_fetch_assoc($get_questions);
            $get_answers = mysqli_query($connect, "SELECT * FROM `answer` WHERE `parent_question` = '{$question['id_question']}'");
            for ($i=0; $i<mysqli_num_rows($get_questions); $i++)
            {
                $answer = mysqli_fetch_assoc($get_answers);
                array_push($answers, $answer);
            }
            array_push($questions, $question);
        }
       
        return array_push($questions, $answers);
    }
}
$test = new Test($_POST['test_id']);
$test->get_blank();
?>