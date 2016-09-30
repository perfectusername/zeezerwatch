<?php
$platform = "pc"; //pc, psn, xbl
$country = "us"; //eu, us, jp, cn, kr
$battletag = "err-1336"; //Replace # with -

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
  $err_level = $results['level'];
  $err_fulltag = str_replace("-", "#", $battletag);
  $err_compwin = $results['games']['competitive']['wins'];
  $err_comploss = $results['games']['competitive']['lost'];
  $err_compplayed = $results['games']['competitive']['played'];
  $err_mmr = $results['competitive']['rank'];
  $err_playericon = $results['avatar'];
  $err_portraitborder = $results['levelFrame'];
  $mode = "quick";
  $err_winpercentage = round((float)$err_compwin / $err_compplayed * 100) . '%'; //work out win percentage
  if(isset($err_mmr))
  {
    $err_mmr = $results['competitive']['rank'];
  }
  if(!isset($err_mmr)) //If they don't have MMR then return 0
  {
    $err_mmr = "0";
  }
}
?>

<?php
$platform = "pc"; //pc, psn, xbl
$country = "us"; //eu, us, jp, cn, kr
$battletag = "err-1336"; //Replace # with -

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
  $err_elims = $stats['Eliminations-Average'];
  $err_objkills = $stats['ObjectiveKills-Average'];
  $err_dmg = $stats['DamageDone-Average'];
  $err_healing = $stats['HealingDone-Average'];
//Pull data from stats and define variable names for them to be saved to stats.php.  Names for use within the table will be define later.
}

?>

<?php
    $txt = "\$err_fulltag_tabledata = '{$err_fulltag}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$err_elims_tabledata = '{$err_elims}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$err_objkills_tabledata = '{$err_objkills}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$err_dmg_tabledata = '{$err_dmg}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$err_healing_tabledata = '{$err_healing}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$err_mmr_tabledata = '{$err_mmr}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$err_compwin_tabledata = '{$err_compwin}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$err_comploss_tabledata = '{$err_comploss}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$err_playericon_tabledata = '{$err_playericon}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$err_portraitborder_tabledata = '{$err_portraitborder}';\n";
    fwrite($statsfile, $txt);
//write data to stats.php
?>