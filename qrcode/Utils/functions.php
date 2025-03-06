<?php
function e($message) {
    return htmlspecialchars($message, ENT_QUOTES);
}

function redirect() {
    return urlencode("?" . parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY));
}
?>