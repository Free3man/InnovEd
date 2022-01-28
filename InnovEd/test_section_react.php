<?php
// $_POST['subject'] = "Всі предмети";
// $_POST['form'] = 1;
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
class Test_List extends Connect
{
    private $form;
    private $subject;
    private $test_id;
    public function __construct() {
        $get_arguments = func_get_args();
        $number_of_arguments = func_num_args();
        if (method_exists($this, $method_name = '__construct'.$number_of_arguments)) {
            call_user_func_array(array($this, $method_name), $get_arguments);
        }
    }
    public function __construct1($test_id)
    {
        $connect = parent::connection_db(); 
        $this->test_id = $test_id;
        $get_list = mysqli_query($connect, "SELECT * FROM `test_list` WHERE `id_test_section` = '{$this->test_id}'");
        $test_list = mysqli_fetch_assoc($get_list);
        $special_list = mysqli_query($connect,  "SELECT * FROM `test` WHERE `subject` = '{$test_list['subject']}' AND `form` = '{$test_list['form']}'");
        $list_of_test = array();
        for ($i=0; $i<mysqli_num_rows($special_list); $i++)
        {
            $point = mysqli_fetch_assoc($special_list);
            array_push($list_of_test, $point);
        }
        echo json_encode($list_of_test);
    }
    public function __construct2($form, $subject)
    {
        $connect = parent::connection_db(); 
        $this->form = $form;
        if($subject == "Всі предмети") {$this->subject = "";}
        else {$this->subject = $subject;}
        
        $result_filter = mysqli_query($connect, "SELECT * FROM `test_list` WHERE `form` = '{$this->form}' AND `subject` LIKE '%{$this->subject}%'");
        $tests = array();
        for ($i=0; $i<mysqli_num_rows($result_filter); $i++)
        {
            $test = mysqli_fetch_assoc($result_filter);
            array_push($tests, $test);
        }
        echo json_encode($tests);
    }
}   
    if(isset($_POST['subject']) || isset($_POST['form']))
    {
        $tests = new Test_List ($_POST['form'], $_POST['subject']);
    }
    else
    {
        $tests = new Test_List ($_POST['id_test']);
    }
?>