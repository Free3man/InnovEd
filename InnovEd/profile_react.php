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
class Test_results extends Connect
{
    private $test_id;
    public function __construct($test_id)
    {
        $this->test_id = $test_id;
    }
    public function get_results()
    {
        $connect = parent::connection_db(); 
        $get_result = mysqli_query($connect, "SELECT * FROM `test_results` WHERE `id_test` = '{$this->test_id}'");
        $results = array();
        for ($i=0; $i<mysqli_num_rows($get_result); $i++)
        {
            $result = mysqli_fetch_assoc($get_result);
            $email_student = $result['email'];
            $get_information = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email_student'");
            $user = mysqli_fetch_assoc($get_information);
            $user_data['surname'] = $user['surname'];
            $user_data['name'] = $user['name'];
            $user_data['score'] = $result['score'];
            $user_data['review'] = $result['review'];
            array_push($results, $user_data);
        }
        echo json_encode($results);
    }
}   
class Book_results extends Connect
{
    private $email_user;
    public function __construct($email_user)
    {
        $this->email_user = $email_user;
    }
    public function get_books()
    {
        $connect = parent::connection_db(); 
        $get_book = mysqli_query($connect, "SELECT * FROM `library` WHERE `email` = '{$this->email_user}'");
        $books = array();
        for ($i=0; $i<mysqli_num_rows($get_book); $i++)
        {
            $book = mysqli_fetch_assoc($get_book);
            array_push($books, $book);
        }
        echo json_encode($books);
    }
}   
    if(isset($_POST['id_test']))
    {
        $test_results = new Test_results($_POST['id_test']);
        $test_results -> get_results();
    }
    else
    {
        $book_result = new Book_results($_POST['email_user']);
        $book_result -> get_books();
    }
?>