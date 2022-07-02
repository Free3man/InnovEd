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
class Posts extends Connect
{
    public function get_posts()
    {
        $connect = parent::connection_db(); 
        $get_result = mysqli_query($connect, "SELECT * FROM `news`");
        return $get_result;
    }
}
$post = new Posts();
$arr_news = $post->get_posts();
?>
