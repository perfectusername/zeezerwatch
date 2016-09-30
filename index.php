<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-us">
<head>
	<title>zeezerwatching</title>
	<link rel="stylesheet" href="css/jq.css" type="text/css" media="print, projection, screen" />
	<link rel="stylesheet" href="themes/blue/style.css" type="text/css" media="print, projection, screen" />
	<script type="text/javascript" src="scripts/jquery-latest.js"></script>
	<script type="text/javascript" src="scripts/jquery.tablesorter.js"></script>
	<script type="text/javascript" src="scripts/chili/chili-1.8b.js"></script>
	<script type="text/javascript">
	$(function() {		
		$("#tablesorter-demo").tablesorter({
            sortList:[[0,1],[0,1]], widgets: ['zebra'],
            sortInitialOrder: "desc"
        });
		$("#options").tablesorter({
            sortList: [[1,0]]});
	     });	
	</script>
</head>
<body>
    

<div id="banner">	
	<h1>zeez<em>erwatch</em></h1>
	<h3>
    
    <?php echo 
        "rip zeez";
    ?>
    
    </h3>
    
    
<form action="fetchstats.php" method="post">
  <input type="submit" value="Update Stats v1">
</form>
    
<?php
include 'stats.php';
?>    
    
	<a href="#"></a>
</div>
<div id="main">
	<a name="Demo"></a>
	<h1>zeez ranked</h1>
    <em>
        <?php

        echo 'Last updated '.humanTiming($time).' ago.';

        function humanTiming ($time)
            {
                $time = time() - $time; // to get the time since that moment
            if ($time<1)
                $time = 1;
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
    </em>

	<table id="tablesorter-demo" class="tablesorter" border="0" cellpadding="0" cellspacing="1">
		<thead>
			<tr>
				<th>Rank</th>
				<th>Battle.net ID</th>
				<th>Eliminations</th>
				<th>Objective Kills</th>
				<th>Damage</th>
				<th>Healing</th>
				<th>WR</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
                    <?php
                        echo"{$ohno_mmr_tabledata}"
                    ?>
                </td>
				<td><a href="https://playoverwatch.com/en-us/career/pc/us/OhNo-1176">OhNo</a></td>
				<td>
                    <?php
                        echo"{$ohno_elims_tabledata}"
                    ?>
                </td>
				<td>
                    <?php
                        echo"{$ohno_objkills_tabledata}"
                    ?>
                </td>
				<td>
                <?php
                        echo"{$ohno_dmg_tabledata}"
                    ?>
                </td>
				<td>
                <?php
                        echo"{$ohno_healing_tabledata}"
                    ?>
                </td>
				<td>
                    <?php
                        echo"
                            <strong>{$ohno_compwin_tabledata}</strong> - {$ohno_comploss_tabledata}
                            "
                    ?>
                </td>
			</tr>
			<tr>
				<td>
                    <?php
                        echo"{$mpat_mmr_tabledata}"
                    ?>
                </td>
				<td><a href="https://playoverwatch.com/en-us/career/pc/us/Patrick-14535">Patrick</a></td>
				<td>
                    <?php
                        echo"{$mpat_elims_tabledata}"
                    ?>
                </td>
				<td>
                    <?php
                        echo"{$mpat_objkills_tabledata}"
                    ?>
                </td>
				<td>
                <?php
                        echo"{$mpat_dmg_tabledata}"
                    ?>
                </td>
				<td>
                <?php
                        echo"{$mpat_healing_tabledata}"
                    ?>
                </td>
				<td>
                    <?php
                        echo"
                            <strong>{$mpat_compwin_tabledata}</strong> - {$mpat_comploss_tabledata}
                            "
                    ?>
                </td>
			</tr>
			<tr>
				<td>
                    <?php
                        echo"{$winks_mmr_tabledata}"
                    ?>
                </td>
				<td><a href="https://playoverwatch.com/en-us/career/pc/us/Winks-1694">Winks</a></td>
				<td>
                    <?php
                        echo"{$winks_elims_tabledata}"
                    ?>
                </td>
				<td>
                    <?php
                        echo"{$winks_objkills_tabledata}"
                    ?>
                </td>
				<td>
                <?php
                        echo"{$winks_dmg_tabledata}"
                    ?>
                </td>
				<td>
                <?php
                        echo"{$winks_healing_tabledata}"
                    ?>
                </td>
				<td>
                    <?php
                        echo"
                            <strong>{$winks_compwin_tabledata}</strong> - {$winks_comploss_tabledata}
                            "
                    ?>
                </td>
			</tr>
			<tr>
				<td>
                    <?php
                        echo"{$ral_mmr_tabledata}"
                    ?>
                </td>
				<td><a href="https://playoverwatch.com/en-us/career/pc/us/zeezRaldan-1456">zeezRaldan</a></td>
				<td>
                    <?php
                        echo"{$ral_elims_tabledata}"
                    ?>
                </td>
				<td>
                    <?php
                        echo"{$ral_objkills_tabledata}"
                    ?>
                </td>
				<td>
                <?php
                        echo"{$ral_dmg_tabledata}"
                    ?>
                </td>
				<td>
                <?php
                        echo"{$ral_healing_tabledata}"
                    ?>
                </td>
				<td>
                    <?php
                        echo"
                            <strong>{$ral_compwin_tabledata}</strong> - {$ral_comploss_tabledata}
                            "
                    ?>
                </td>
			</tr>
			<tr>
				<td>
                    <?php
                        echo"{$ghost_mmr_tabledata}"
                    ?>
                </td>
				<td><a href="https://playoverwatch.com/en-us/career/pc/us/ghost-1456">ghost</a></td>
				<td>
                    <?php
                        echo"{$ghost_elims_tabledata}"
                    ?>
                </td>
				<td>
                    <?php
                        echo"{$ghost_objkills_tabledata}"
                    ?>
                </td>
				<td>
                <?php
                        echo"{$ghost_dmg_tabledata}"
                    ?>
                </td>
				<td>
                <?php
                        echo"{$ghost_healing_tabledata}"
                    ?>
                </td>
				<td>
                    <?php
                        echo"
                            <strong>{$ghost_compwin_tabledata}</strong> - {$ghost_comploss_tabledata}
                            "
                    ?>
                </td>
			</tr>
			<tr>
				<td>
                    <?php
                        echo"{$fish_mmr_tabledata}"
                    ?>
                </td>
				<td><a href="https://playoverwatch.com/en-us/career/pc/us/fishcake-1547">fishcake</a></td>
				<td>
                    <?php
                        echo"{$fish_elims_tabledata}"
                    ?>
                </td>
				<td>
                    <?php
                        echo"{$fish_objkills_tabledata}"
                    ?>
                </td>
				<td>
                <?php
                        echo"{$fish_dmg_tabledata}"
                    ?>
                </td>
				<td>
                <?php
                        echo"{$fish_healing_tabledata}"
                    ?>
                </td>
				<td>
                    <?php
                        echo"
                            <strong>{$fish_compwin_tabledata}</strong> - {$fish_comploss_tabledata}
                            "
                    ?>
                </td>
			</tr>
			<tr>
				<td>
                    <?php
                        echo"{$err_mmr_tabledata}"
                    ?>
                </td>
				<td><a href="https://playoverwatch.com/en-us/career/pc/us/err-1336">err</a></td>
				<td>
                    <?php
                        echo"{$err_elims_tabledata}"
                    ?>
                </td>
				<td>
                    <?php
                        echo"{$err_objkills_tabledata}"
                    ?>
                </td>
				<td>
                <?php
                        echo"{$err_dmg_tabledata}"
                    ?>
                </td>
				<td>
                <?php
                        echo"{$err_healing_tabledata}"
                    ?>
                </td>
				<td>
                    <?php
                        echo"
                            <strong>{$err_compwin_tabledata}</strong> - {$err_comploss_tabledata}
                            "
                    ?>
                </td>
			</tr>
		</tbody>
	</table>
</div>
</body>
</html>

