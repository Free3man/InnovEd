<?php
session_start();
//functions
function get_photo_question($img_question)
{
    $photo_question = uniqid();
    copy($_FILES['photo_of_the_question']['tmp_name'][$img_question],"./img/files_of_test/".'quest'.$photo_question.'.'.end(explode('.', $_FILES['photo_of_the_question']['name'][$img_question])));
    return 'quest'.$photo_question.'.'.end(explode('.', $_FILES['photo_of_the_question']['name'][$img_question]));
}
function get_photo_answer($img_answer)
{
    $photo_answer = uniqid();
    copy($_FILES['answer_photo']['tmp_name'][$img_answer],"./img/files_of_test/".'ans'.$photo_answer.'.'.end(explode('.', $_FILES['answer_photo']['name'][$img_answer])));
    return 'ans'.$photo_answer.'.'.end(explode('.', $_FILES['answer_photo']['name'][$img_answer]));
}
//extra variables 
$prev=0;
$img_question=0;
$img_answer=0;
$prompt_num=0;
//classes
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
    function generated_id()
    {
        $id_unique = uniqid();
        return $id_unique;
    }
}

class Test
{
    public $testname;
    public $instruction;
    public $background;
    public $form;
    public $subject;
    public $timer;
    public $teacher_email;
    function __construct($testname,$instruction,$background,$form,$subject,$timer,$teacher_email)
    {
        $this->testname=$testname;
        $this->instruction=$instruction;
        $this->background=$background;
        $this->form=$form; 
        $this->subject=$subject;
        $this->timer=$timer;
        $this->teacher_email=$teacher_email;
    }
    function test_insert() 
    {
        $dbcon = new DB_Func();
        $connection = $dbcon->connection_db();
        $test_id=$dbcon->generated_id();
        mysqli_query($connection, "INSERT INTO `test` (`id_test`,`name_test`,`instruction`,`background`,`form`,`subject`,`timer`, `teacher_email`) VALUES ('$test_id','{$this->testname}','{$this->instruction}','{$this->background}','{$this->form}','{$this->subject}','{$this->timer}','{$this->teacher_email}')");
        return $test_id;
    }
}

class Question
{
    public $question;
    public $type;
    public $mainphoto;
    public $parent_test_id;
    function __construct($question,$type,$mainphoto,$parent_test_id)
    {
        $this->question=$question;
        $this->type=$type;
        $this->mainphoto=$mainphoto;
        $this->parent_test_id=$parent_test_id;
    }
    function question_insert() 
    {
        $dbcon = new DB_Func();
        $connection = $dbcon->connection_db();
        $question_id=$dbcon->generated_id();
        mysqli_query($connection, "INSERT INTO `question`(`id_question`,`question`,`type_of`,`photo`,`parent_test`) VALUES ('$question_id','{$this->question}','{$this->type}','{$this->mainphoto}','{$this->parent_test_id}')");
        return $question_id;
    }
}

class Answer
{
    public $answer;
    public $parent_question_id;
    public $connection;
    function __construct($answer,$parent_question_id)
    {
        $this->answer=$answer;
        $this->parent_question_id=$parent_question_id;
    }
    function answer_insert() 
    {
        $dbcon = new DB_Func();
        $connection = $dbcon->connection_db();
        $answer_id=$dbcon->generated_id();
        mysqli_query($connection, "INSERT INTO `answer`(`id_answer`,`answer`,`prompt`,`photo`,`parent_question`,`checkbox`) VALUES ('$answer_id','{$this->answer}','{$this->prompt}','{$this->photoanswer}','{$this->parent_question_id}','{$this->checkbox}')");
    }
}
class RadioCheck extends Answer 
{
    public $checkbox;
    public $photoanswer;
    function __construct($answer,$parent_question_id,$checkbox,$photoanswer)
    {
        parent::__construct($answer,$parent_question_id);
        $this->checkbox=$checkbox;
        $this->photoanswer=$photoanswer;
    }
}
class BlankAnswer extends Answer
{
    function __construct($answer,$parent_question_id,$checkbox)
    {
        parent::__construct($answer,$parent_question_id);
        $this->checkbox=$checkbox;
    }
}
class Relations extends Answer
{
    public $prompt;
    function __construct($answer,$prompt,$parent_question_id)
    {
        parent::__construct($answer,$parent_question_id);
        $this->prompt=$prompt;
    }
}
class Essay extends Answer
{
    function __construct($answer,$parent_question_id)
    {
        parent::__construct($answer,$parent_question_id);
    }
}
//execution 
$test = new Test(str_replace("'","&#8217;","{$_POST['name_of_test']}"),str_replace("'","&#8217;","{$_POST['instruction']}"),"{$_POST['background_photo']}","{$_POST['form_of']}",str_replace("'","&#8217;","{$_POST['sub_of']}"),"{$_POST['timer']}","{$_SESSION['user']['email']}");
$id_test = $test->test_insert();
for($i = 0; $i<count($_POST['question']); ++$i)
{
    if($_FILES['photo_of_the_question']['name'][$img_question]!='')
    {
        $photo_question = get_photo_question($img_question);
        $question_db = new Question(str_replace("'","&#8217;","{$_POST['question'][$i]}"),"{$_POST['q_type'][$i]}","$photo_question","$id_test");
    }
    else
    {
        $question_db = new Question(str_replace("'","&#8217;","{$_POST['question'][$i]}"),"{$_POST['q_type'][$i]}","","$id_test");
    }
    $img_question++;
    $question_id = $question_db->question_insert();
    $num_of_answers = $_POST['quet_num'][$i];
    for ($k=$prev; $k<$num_of_answers+$prev; ++$k)
    {
        if(($_POST['q_type'][$i]=="Вибір з множини"))
        {
            if($_FILES['answer_photo']['name'][$img_answer]!='')
            {
                $photo_answer = get_photo_answer($img_answer);
                $answer_db = new RadioCheck(str_replace("'","&#8217;","{$_POST['answer'][$k]}"),"$question_id ","{$_POST['check_answer'][$k]}","$photo_answer");
            }
            else
            {
                $answer_db = new RadioCheck(str_replace("'","&#8217;","{$_POST['answer'][$k]}"),"$question_id ","{$_POST['check_answer'][$k]}","");
            }
            $img_answer++;
        }
        elseif($_POST['q_type'][$i]=="Відкрита відповідь")
        {
            $answer_db = new BlankAnswer(str_replace("'","&#8217;","{$_POST['answer'][$k]}"),"$question_id","true");
        }
        elseif($_POST['q_type'][$i]=="Вибір відповідності")
        {
            $answer_db = new Relations(str_replace("'","&#8217;","{$_POST['answer'][$k]}"),str_replace("'","&#8217;","{$_POST['prompt'][$prompt_num]}"),"$question_id");
            $prompt_num++;
        }
        elseif($_POST['q_type'][$i]=="Есе (відповідь з поясненнями)")
        {
            $answer_db = new Essay(str_replace("'","&#8217;","{$_POST['answer'][$k]}")  ,"$question_id");
        }
        $answer_db->answer_insert();
    }
    $prev+=$num_of_answers;
}
header("Location: test_section.php");
?>


