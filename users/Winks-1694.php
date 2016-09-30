<?php
$platform = "pc"; //pc, psn, xbl
$country = "us"; //eu, us, jp, cn, kr
$battletag = "Winks-1694"; //Replace # with -

$profile = curl_init();
curl_setopt($profile, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($profile, CURLOPT_RETURNTRANSFER, true);
curl_setopt($profile, CURLOPT_FAILONERROR, true);
curl_setopt($profile, CURLOPT_URL,"https://api.lootbox.eu/{$platform}/{$country}/{$battletag}/profile");
$result = curl_exec($profile); //grab API data
curl_close($profile);

$stats = json_decode($result, true); //decode JSON data

if(isset($stats['error'])) //Check for error
{
  echo $stats['error'];
} 
else 
{
  $results = $stats['data'];
  $winks_level = $results['level'];
  $winks_fulltag = str_replace("-", "#", $battletag);
  $winks_compwin = $results['games']['competitive']['wins'];
  $winks_comploss = $results['games']['competitive']['lost'];
  $winks_compplayed = $results['games']['competitive']['played'];
  $winks_mmr = $results['competitive']['rank'];
  $winks_playericon = $results['avatar'];
  $winks_portraitborder = $results['levelFrame'];
  $mode = "quick";
  $winks_winpercentage = round((float)$winks_compwin / $winks_compplayed * 100) . '%'; //work out win percentage
  if(isset($winks_mmr))
  {
    $winks_mmr = $results['competitive']['rank'];
  }
  if(!isset($winks_mmr)) //If they don't have MMR then return 0
  {
    $winks_mmr = "0";
  }
}
?>

<?php
$platform = "pc"; //pc, psn, xbl
$country = "us"; //eu, us, jp, cn, kr
$battletag = "Winks-1694"; //Replace # with -

  $allheroes = curl_init();
  curl_setopt($allheroes, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($allheroes, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($allheroes, CURLOPT_FAILONERROR, true);
  curl_setopt($allheroes, CURLOPT_URL,"https://api.lootbox.eu/{$platform}/{$country}/{$battletag}/competitive-play/allHeroes/");
  $result = curl_exec($allheroes); //grab API data
  curl_close($allheroes);

$stats = json_decode($result, true); //decode JSON data

if(isset($stats['error'])) //Check for error
{
  echo $stats['error'];
} 
else 
{
  $winks_elims = $stats['Eliminations-Average'];
  $winks_objkills = $stats['ObjectiveKills-Average'];
  $winks_dmg = $stats['DamageDone-Average'];
  $winks_healing = $stats['HealingDone-Average'];
//Pull data from stats and define variable names for them to be saved to stats.php.  Names for use within the table will be define later.
}

?>

<?php
    $txt = "\$winks_fulltag_tabledata = '{$winks_fulltag}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$winks_elims_tabledata = '{$winks_elims}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$winks_objkills_tabledata = '{$winks_objkills}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$winks_dmg_tabledata = '{$winks_dmg}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$winks_healing_tabledata = '{$winks_healing}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$winks_mmr_tabledata = '{$winks_mmr}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$winks_compwin_tabledata = '{$winks_compwin}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$winks_comploss_tabledata = '{$winks_comploss}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$winks_playericon_tabledata = '{$winks_playericon}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$winks_portraitborder_tabledata = '{$winks_portraitborder}';\n";
    fwrite($statsfile, $txt);
//write data to stats.php
?>