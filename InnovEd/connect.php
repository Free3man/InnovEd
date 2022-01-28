<?
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
}?>