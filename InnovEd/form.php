<?php
session_start();
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
class User extends Connect
{
    private $email;
    private $surname;
    private $name;
    private $patronymic;
    private $password;
    private $birth_date;
    private $status;
    private $form;
    private $photo;

    public function __construct() {
        $get_arguments       = func_get_args();
        $number_of_arguments = func_num_args();

        if (method_exists($this, $method_name = '__construct'.$number_of_arguments)) {
            call_user_func_array(array($this, $method_name), $get_arguments);
        }
    }
    // Construct for reg
    function __construct1($regestration)
    {
        $this->email=$regestration['email'];
        $this->surname=$regestration['surname'];
        $this->name=$regestration['name'];
        $this->patronymic=$regestration['patronymic']; 
        $this->password=md5($regestration['password']);
        $this->birth_date=$regestration['birth_date'];
        $this->status=$regestration['status'];
        $this->form=$regestration['form'];
        $this->photo="0.jpg";
        $exist_email = 0;
        $connect = parent::connection_db();
        if(mysqli_num_rows(mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '{$this->email}'"))!=0)
        {
            $exist_email = 1;
        }
        else
        {
            if ($regestration['form']==null)
            {
                mysqli_query($connect, "INSERT INTO `users` (`email`,`surname`,`name`,`patronymic`,`password`,`birth_date`, `status`, `form`, `photo`) VALUES ('{$this->email}','{$this->surname}','{$this->name}','{$this->patronymic}','{$this->password}','{$this->birth_date}','{$this->status}','{$this->form}','{$this->photo}')");
            }
            else
            {
                mysqli_query($connect, "INSERT INTO `users` (`email`,`surname`,`name`,`patronymic`,`password`,`birth_date`, `status`, `photo`) VALUES ('{$this->email}','{$this->surname}','{$this->name}','{$this->patronymic}','{$this->password}','{$this->birth_date}','{$this->status}','{$this->photo}')");
            }
            $_SESSION['user'] = $regestration;
            $_SESSION['user']['photo'] = $this->photo;
        }
    }
    // Construct for user
    function __construct2($email,$password)
    {
        $this->email=$email;
        $this->password=$password;
        $access_email = false;
        $access_password = false;
        $connect = parent::connection_db();    
        if(mysqli_num_rows(mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '{$this->email}'"))!=0)
        {
            $access_email = true;
            if(mysqli_num_rows(mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '{$this->email}' AND `password` = '{$this->password}'"))!=0)
            {
                $result_auth = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '{$this->email}'");
                $authentication = mysqli_fetch_assoc($result_auth);
                $_SESSION['user']= $authentication;
                $access_password = true;
            }
        }
        echo json_encode(array('email' => $access_email, 'password' => $access_password));
    }
}
if(count($_POST)==2)
{
    $user = new User ($_POST['email'], md5($_POST['password']));
}
else
{
    $user = new User ($_POST);
}
?>



