<?php
abstract class Controller {
    public function __construct() {
        if (isset($_GET['action']) and method_exists($this, "action_" . $_GET["action"])) {
            $action = "action_" . $_GET["action"];
            $this->$action();
        } 
        else {
            $this->action_default();
        }
    }

    public abstract function action_default();

    protected function render($vue, $data = []) {
        extract($data);

        $file_name = "Views/view_" . $vue . '.php';
        if (file_exists($file_name)) {
            include $file_name;
        } else {
            $this->action_error("La vue " . $vue . " n'existe pas !");
        }
        die();
    }

    protected function action_error($message = '')
    {
        $data = [
            'title' => "Erreur",
            'message' => $message,
        ];
        $this->render("erreur", $data);
    }
}
?>