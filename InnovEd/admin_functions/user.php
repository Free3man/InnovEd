<?php
include "connect.php";
class User extends Connect
{
    public function get_user()
    {
        $connect = parent::connection_db();
        $get_user = mysqli_query($connect, "SELECT * FROM `users`");
        $users = array();
        for ($i=0; $i<mysqli_num_rows($get_user); $i++)
        {
            $user = mysqli_fetch_assoc($get_user);
            array_push($users, $user);
        }
        return $users;
    }
    
}
class DeleteUser extends User
{
    public $id_delete;
    public function __construct($id_delete)
    {
        $this->id_delete = $id_delete;
    }
    public function delete_user()
    {
        $connect = parent::connection_db();
        mysqli_query($connect, "DELETE FROM `users` WHERE `id` = '{$this->id_delete}'");
    }
}
class GetUserRow extends User
{
    public $id_get;
    public function __construct($id_get)
    {
        $this->id_get = $id_get;
    }
    public function get_row()
    {
        $connect = parent::connection_db();
        $get_row = mysqli_query($connect, "SELECT * FROM `users` WHERE `id` = '{$this->id_get}'");
        return mysqli_fetch_assoc($get_row);
    }
}
class SetUserRow extends User
{
    public $id_send;
    public $surname;
    public $name;
    public $patronymic;
    public $birth_date;
    public $form;
    public $email;
    public function __construct($id_send, $surname, $name, $patronymic, $birth_date, $status, $form, $email)
    {
        $this->id_send  = $id_send;
        $this->surname = $surname;
        $this->name = $name;
        $this->patronymic = $patronymic;
        $this->birth_date = $birth_date;
        $this->form = $form;
        $this->email = $email;
    }
    public function set_row()
    {
        $connect = parent::connection_db();
        mysqli_query($connect, "UPDATE `users` SET `surname` = '{$this->surname}',`name` = '{$this->name}',`patronymic` = '{$this->patronymic}',`birth_date` = '{$this->birth_date}',`form` = '{$this->form}',`email` = '{$this->email}' WHERE `id` = '{$this->id_send}'");
    }
}

    if($_POST['id_delete']!="")
    {
        $delete = new DeleteUser($_POST['id_delete']);
        $delete->delete_user();
        $table = new User();
        echo json_encode($table->get_user());    
    }
    else if($_POST['id_get']!="")
    {
        $get_r = new GetUserRow($_POST['id_get']);
        echo json_encode($get_r->get_row());     
    }
    else if($_POST['id_set']!="")
    {
        $set_r = new SetUserRow($_POST['id_set'],$_POST['surname'],$_POST['name'],$_POST['patronymic'],$_POST['birth_date'],$_POST['status'],$_POST['form'],$_POST['email']);
        $set_r->set_row();
    }
    else
    {
        $table = new User();
        echo json_encode($table->get_user());
    }
?>