<?php
class Connect
{
    protected $server = "localhost";
    protected $login_db = "root";
    protected $password_db = "";
    protected $db = "online_school";
    public function connection_db()
    {
        $connect = mysqli_connect("{$this->server}", "{$this->login_db}", "{$this->password_db}", "{$this->db}");
        return $connect;
    }
}
class Courses extends Connect
{
    private $name_course;
    function __construct ($name_course)
    {
        $this->name_course = $name_course;
    }
    public function get_course()
    {
        $connect = parent::connection_db(); 
        $result_course = mysqli_query($connect, "SELECT * FROM `course` WHERE `name_course` LIKE '%{$this->name_course}%'");
        $courses = array();
        for ($i=0; $i<mysqli_num_rows($result_course); $i++)
        {
            $course = mysqli_fetch_assoc($result_course);
            array_push($courses, $course);
        }
        echo json_encode($courses);
    }
}
class Modules extends Connect
{
    private $id_course;
    function __construct ($id_course)
    {
        $this->id_course = $id_course;
    }
    public function get_module()
    {
        $connect = parent::connection_db(); 
        $result_module = mysqli_query($connect, "SELECT * FROM `module` WHERE `id_course` = '{$this->id_course}'");
        $modules = array();
        $topics = array();
        for ($i=0; $i<mysqli_num_rows($result_module); $i++)
        {
            $module = mysqli_fetch_assoc($result_module);
            $id_module = $module['id_module'];
            $result_topic = mysqli_query($connect, "SELECT * FROM `topic` WHERE `id_module` = '$id_module'");
            for ($k=0; $k<mysqli_num_rows($result_topic); $k++)
            {
                $topic = mysqli_fetch_assoc($result_topic);
                array_push($topics, $topic);
            }
            array_push($modules, $module);
        }
        echo json_encode(array($modules, $topics)); 
    }
}
if(isset($_POST['name_course']))
{
    $courses = new Courses($_POST['name_course']);
    $courses->get_course();
}
else
{
    $modules = new Modules($_POST['id_course']);
    $modules->get_module();
}
?>

