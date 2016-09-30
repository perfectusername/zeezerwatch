<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script type="text/javascript" src="scripts/moment.js"></script>
    <script type="text/javascript" src="scripts/moment-timezone-with-data.js"></script>
    <script type="text/javascript" src="scripts/jstz.js"></script>
</head>

<body>
    <div class="getTime">
        <h2>GMT/UTC Time</h2>
        <?php
            $time = $_SERVER['REQUEST_TIME'];
            $epoch = 1340000000;
            $timestamp = gmdate('r', $time);
            echo $timestamp;
        ?>
        <script>
            var timeStamp = '<?php echo $timestamp; ?>';
        </script>
    </div>
    <hr>
    <?php

        echo 'event happened '.humanTiming($time).' ago';

        function humanTiming ($time)
            {

                $time = time() - $time; // to get the time since that moment
                $time = ($time<1)? 1 : $time;
                $tokens = array (
                    31536000 => 'year',
                    2592000 => 'month',
                    604800 => 'week',
                    86400 => 'day',
                    3600 => 'hour',
                    60 => 'minute',
                    1 => 'second'
            );

            foreach ($tokens as $unit => $text) {
                if ($time < $unit) continue;
                $numberOfUnits = floor($time / $unit);
                return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
            }

        }
    ?>
    
</body>

</html>