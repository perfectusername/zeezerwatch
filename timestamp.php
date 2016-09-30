<?php
    $servertime = $_SERVER['REQUEST_TIME'];
    $epoch = 1340000000;
//pull UTC timestamp from server & translate from unix time to readable time
    $timestamp = gmdate('r', $servertime);
?>

<?php
    echo="{$timestamp}"
?>