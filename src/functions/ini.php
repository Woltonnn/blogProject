<?php
// ############################
//   Start & Config Session
// ############################
session_start();


if (!isset($_SESSION['lastRegeneration'])) {
    regenSessionID();
} else {
    $interval = 60 * 30;
    
    if (time() - $_SESSION['lastRegeneration'] >= $interval) {
        regenSessionID();
    }
}

function regenSessionID() {
    session_regenerate_id(true);
    $_SESSION['lastRegeneration'] = time();
}
