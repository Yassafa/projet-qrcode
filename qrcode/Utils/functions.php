<?php
function e($message) {
    return htmlspecialchars($message, ENT_QUOTES);
}

function redirect($redirect = null) {
    if($redirect){
        return urlencode($redirect);
    }
    else{
        return urlencode("?" . parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY));
    }
}
?>