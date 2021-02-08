<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 *
 */

if(isset($_GET['logout']))
{
    header('Location: ?module=login&action=logout');
}

if(isset($_POST['user']) && isset($_POST['pwd']))
{
    $connection = new Connection(
        array(
        "user"=>$_POST['user'],
        "pwd"=>$_POST['pwd']
    )
    );

    if(!isset($errors) && $connection->isValid())
    {
        $id = $manager_log->valid_connection($connection);

        // If credentials are valid
        if (false !== $id)
        {
            $connect = $manager_log->read_user_infos($id);
            // Registering infos in session variables
            $_SESSION['id'] = $id;
            $_SESSION['user'] = $connect->user();


            // Rendering confirmation template
            include_once 'views/login_ok.php';
        }
        else
        {
            $connection_errors[] = "Invalid credentials.";
            // Rendering the login form
            include_once 'views/log_in_view.php';
        }
    }
    else
    {
        $errors = $connection->errors();
        include_once 'views/log_in_view.php';
    }

}
else
{
    include_once 'views/log_in_view.php';
}