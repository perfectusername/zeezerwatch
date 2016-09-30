<?php
$platform = "pc"; //pc, psn, xbl
$country = "us"; //eu, us, jp, cn, kr
$battletag = "dipwood-1224"; //Replace # with -

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
  $dip_level = $results['level'];
  $dip_fulltag = str_replace("-", "#", $battletag);
  $dip_compwin = $results['games']['competitive']['wins'];
  $dip_comploss = $results['games']['competitive']['lost'];
  $dip_compplayed = $results['games']['competitive']['played'];
  $dip_mmr = $results['competitive']['rank'];
  $dip_playericon = $results['avatar'];
  $dip_portraitborder = $results['levelFrame'];
  $mode = "quick";
  $dip_winpercentage = round((float)$dip_compwin / $dip_compplayed * 100) . '%'; //work out win percentage
  if(isset($dip_mmr))
  {
    $dip_mmr = $results['competitive']['rank'];
  }
  if(!isset($dip_mmr)) //If they don't have MMR then return 0
  {
    $dip_mmr = "0";
  }
}
?>

<?php
$platform = "pc"; //pc, psn, xbl
$country = "us"; //eu, us, jp, cn, kr
$battletag = "dipwood-1224"; //Replace # with -

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
  $dip_elims = $stats['Eliminations-Average'];
  $dip_objkills = $stats['ObjectiveKills-Average'];
  $dip_dmg = $stats['DamageDone-Average'];
  $dip_healing = $stats['HealingDone-Average'];
//Pull data from stats and define variable names for them to be saved to stats.php.  Names for use within the table will be define later.
}

?>

<?php
    $txt = "\$dip_fulltag_tabledata = '{$dip_fulltag}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$dip_elims_tabledata = '{$dip_elims}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$dip_objkills_tabledata = '{$dip_objkills}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$dip_dmg_tabledata = '{$dip_dmg}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$dip_healing_tabledata = '{$dip_healing}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$dip_mmr_tabledata = '{$dip_mmr}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$dip_compwin_tabledata = '{$dip_compwin}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$dip_comploss_tabledata = '{$dip_comploss}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$dip_playericon_tabledata = '{$dip_playericon}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$dip_portraitborder_tabledata = '{$dip_portraitborder}';\n";
    fwrite($statsfile, $txt);
//write data to stats.php
?>