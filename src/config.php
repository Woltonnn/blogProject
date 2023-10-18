<?php
if(!defined("DS")) {
    define('DS', DIRECTORY_SEPARATOR);
}










// make the database variables and connect to database
if(!defined("DOM")) {
    define("DOM", "127.0.0.1");
}
if(!defined("USER")) {
    define("USER", "root");
}
if(!defined("PASS")) {
    define("PASS", "");
}
if(!defined("DB")) {
    define("DB", "blogwebsite");
}


$connection = mysqli_connect(DOM, USER, PASS, DB);

// attempt to make database connection and return errorcode if connecting didn't go well
if (mysqli_ping($connection)) {
    print('<script>console.log("Connection to server is active");</script>');
    return;
} else {
    // Whoops! seems like something went wrong ;)
    var_dump(mysqli_error_list($connection));
    echo "Connection is not active";
    return;
}

?>