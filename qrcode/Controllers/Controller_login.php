<?php
class Controller_login extends Controller {

    public function action_default() {
        if (!isset($_SESSION["connecte"])) {
            require "Utils/login.php";
        }
        else {
            if (isset($_REQUEST['logout'])) {
                $this->action_logout();
            }
            if(isset($_GET['redirect'])) {
                header("Location: " . $_GET['redirect']);
            }
        }
    }

    public function action_logout() {
        session_unset();
        session_destroy();
        if(isset($_GET['redirect'])) {
            header("Location: " . $_GET['redirect']);
        }
    }
}
?>