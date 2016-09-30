<?php
    $time = $_SERVER['REQUEST_TIME'];
    $epoch = 1340000000;
    $timestamp = gmdate('r', $time);
//Reqeust time from server and save to $time.
//$timestamp is also saved for future use and implementation.
    $statsfile = fopen("stats.php", "c+") or die("Unable to open file!");  //Opens the file and places the cursor at the beginning of the file

    if (flock($statsfile, LOCK_EX)) {  // Acquire an exclusive lock
        ftruncate($statsfile, 0);      // Truncate file 

        $txt = "<?php\n";
        fwrite($statsfile, $txt);
        $txt = "\$timestamp = '{$timestamp}';\n";
        fwrite($statsfile, $txt);
        $txt = "\$time = '{$time}';\n";
        fwrite($statsfile, $txt);
        include 'users/OhNo-1176.php';
        include 'users/dipwood-1224.php';
        include 'users/Patrick-14535.php';
        include 'users/Winks-1694.php';
        include 'users/zeezRaldan-1456.php';
        include 'users/ghost-1456.php';
        include 'users/fishcake-1547.php';
        include 'users/err-1336.php';
    //These files should append to the stats.php
        $txt = "?>\n";
        fwrite($statsfile, $txt); //Appends closing php tag to stats.php
        
        flock($statsfile, LOCK_UN);    // Releases the lock
    } 
    else {
        echo "Unable to lock file.";
}

    fclose($statsfile);
    header('Location: index.php');// Refreshes to index
?>