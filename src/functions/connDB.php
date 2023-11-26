<?php
// ############################
//     Connect to database
// ############################
$connection = mysqli_connect(DOM, USER, PASS, DB);

if (mysqli_ping($connection)) {
    print('<script>console.log("Connection to server is active");</script>');
    return;
} else {
    // Whoops! seems like something went wrong :O
    var_dump(mysqli_error_list($connection));
    echo "Connection is not active";
    return;
}

