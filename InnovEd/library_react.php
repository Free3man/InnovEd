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
class Books extends Connect
{
    private $bookname;
    private $author;
    private $type;
    private $photo;
    private $file;
    private $name_filter;
    private $author_filter;
    private $type_filter;

    function __construct ($name_filter, $author_filter, $type_filter)
    {
        $connect = parent::connection_db(); 
        $this->name_filter = $name_filter;
        $this->author_filter = $author_filter;
        $this->type_filter = $type_filter;
        $result_filter = mysqli_query($connect, "SELECT * FROM `library` WHERE `name_book` LIKE '%{$this->name_filter}%' AND `author` LIKE '%{$this->author_filter}%' AND `type_of` LIKE  '{$this->type_filter}%'");
        $books = array();
        for ($i=0; $i<mysqli_num_rows($result_filter); $i++)
        {
            $book = mysqli_fetch_assoc($result_filter);
            array_push($books, $book);
        }
        echo json_encode($books);
    }
}
    $books = new Books ($_POST['name_book'], $_POST['author'], $_POST['type_book']);
?>



