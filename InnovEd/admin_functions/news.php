<?php
include "connect.php";
    // $_POST['id_post'] = 7;
    // $_POST['title'] = "6 порад для самомотивації";
    // $_POST['author'] = "Микита Брязгін";
    // $_POST['theme'] = "Самоорганізація";
    // $_POST['text'] = "<p><b>Самомотивація</b> — це усвідомлення і прийняття людиною поточних завдань, з відповідальністю за результат і контролем за їх виконанням. Тобто, щоб викладатися на всі 100%, потрібно відчути необхідність майбутньої роботи, або навіть її неминучість в рамках досягнення мети.</p>";
class News extends Connect
{
    private $id_post;
    private $post_title;
    private $post_author;
    private $post_theme;
    private $post_text;
    private $post_photo;
    private $post_photo_tmp;
    public function __construct() {
        $get_arguments       = func_get_args();
        $number_of_arguments = func_num_args();

        if (method_exists($this, $method_name = '__construct'.$number_of_arguments)) {
            call_user_func_array(array($this, $method_name), $get_arguments);
        }
    }
    public function __construct6($post_title, $post_author, $post_theme, $post_text, $post_photo, $post_photo_tmp)
    {
        $this->post_title = $post_title;
        $this->post_author = $post_author;
        $this->post_theme = $post_theme;
        $this->post_text = $post_text;
        $this->post_photo = $post_photo;
        $this->post_photo_tmp = $post_photo_tmp;
    }
    public function __construct7($id_post, $post_title, $post_author, $post_theme, $post_text, $post_photo, $post_photo_tmp)
    {
        $this->id_post = $id_post;
        $this->post_title = $post_title;
        $this->post_author = $post_author;
        $this->post_theme = $post_theme;
        $this->post_text = $post_text;
        $this->post_photo = $post_photo;
        $this->post_photo_tmp = $post_photo_tmp;
    }
    public function getExtension( $filename ) 
    {
      $temp = explode( '.', $filename );
      return array_pop( $temp );
    }
    public function add_post()
    {
        $connect = parent::connection_db();
        $photo = $this->getExtension($this->post_photo);
        $key = md5(microtime(true));
        copy($this->post_photo_tmp,"../img/blog/".$key.'.'.$photo);
        $photo_name = $key.'.'.$photo;
        mysqli_query($connect, "INSERT INTO `news` (`title`, `article`, `author`, `type`, `main_image`) VALUES ('{$this->post_title}', '{$this->post_text}', '{$this->post_author}', '{$this->post_theme}', '$photo_name')");  
    }
    public function update_post()
    {
        $connect = parent::connection_db();
        if ($this->post_photo==NULL)
        {
            mysqli_query($connect, "UPDATE `news` SET `title` = '{$this->post_title}', `article` = '{$this->post_text}', `author` = '{$this->post_author}', `type` = '{$this->post_theme}' WHERE `id_post` = '{$this->id_post}'");  
        }
        else
        {
            $photo = $this->getExtension($this->post_photo);
            $key = md5(microtime(true));
            copy($this->post_photo_tmp,"../img/blog/".$key.'.'.$photo);
            $photo_name = $key.'.'.$photo;
            mysqli_query($connect, "UPDATE `news` SET `title` = '{$this->post_title}', `article` = '{$this->post_text}', `author` = '{$this->post_author}', `type` = '{$this->post_theme}', `main_image` = '$photo_name' WHERE `id_post` = '{$this->id_post}'");  
        }
    }
    public function get_post()
    {
        $connect = parent::connection_db();
        $list = mysqli_query($connect, "SELECT * FROM `news`");
        $posts = array();
        for ($i=0; $i<mysqli_num_rows($list); $i++)
        {
            $post = mysqli_fetch_assoc($list);
            array_push($posts, $post);
        }
        return json_encode($posts);
    }
}
    if(!empty($_POST))
    {
        if($_POST['id_post']=="")
        {
            $news = new News ($_POST['title'], $_POST['author'], $_POST['theme'], str_replace("'","&#8217;",$_POST['text']), $_FILES['photo']['name'], $_FILES['photo']['tmp_name']);
            $news->add_post();
        }
        else
        {
            if($_FILES['photo']!="")
            {
                $news = new News ($_POST['id_post'], $_POST['title'], $_POST['author'], $_POST['theme'], str_replace("'","&#8217;",$_POST['text']), $_FILES['photo']['name'], $_FILES['photo']['tmp_name']);
            }
            else
            {
                $news = new News ($_POST['id_post'], $_POST['title'], $_POST['author'], $_POST['theme'], str_replace("'","&#8217;",$_POST['text']), "", "");
            }
            $news->update_post();
        }

    }
    else
    {
        $post = new News();
        echo $post->get_post();
    }
?>