<?php
include "connect.php";
class User extends Connect
{
    public function get_user()
    {
        $connect = parent::connection_db();
        $get_feedbacks = mysqli_query($connect, "SELECT * FROM `contact`");
        $feedbacks = array();
        for ($i=0; $i<mysqli_num_rows($get_feedbacks); $i++)
        {
            $feedback = mysqli_fetch_assoc($get_feedbacks);
            array_push($feedbacks, $feedback);
        }
        return $feedbacks;
    }
}
    $feedbacks = new User();
    echo json_encode($feedbacks->get_user());
?>