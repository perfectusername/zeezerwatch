<?php
$platform = "pc"; //pc, psn, xbl
$country = "us"; //eu, us, jp, cn, kr
$battletag = "Patrick-14535"; //Replace # with -

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
  $mpat_level = $results['level'];
  $mpat_fulltag = str_replace("-", "#", $battletag);
  $mpat_compwin = $results['games']['competitive']['wins'];
  $mpat_comploss = $results['games']['competitive']['lost'];
  $mpat_compplayed = $results['games']['competitive']['played'];
  $mpat_mmr = $results['competitive']['rank'];
  $mpat_playericon = $results['avatar'];
  $mpat_portraitborder = $results['levelFrame'];
  $mode = "quick";
  $mpat_winpercentage = round((float)$mpat_compwin / $mpat_compplayed * 100) . '%'; //work out win percentage
  if(isset($mpat_mmr))
  {
    $mpat_mmr = $results['competitive']['rank'];
  }
  if(!isset($mpat_mmr)) //If they don't have MMR then return 0
  {
    $mpat_mmr = "0";
  }
}
?>

<?php
$platform = "pc"; //pc, psn, xbl
$country = "us"; //eu, us, jp, cn, kr
$battletag = "Patrick-14535"; //Replace # with -

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
  $mpat_elims = $stats['Eliminations-Average'];
  $mpat_objkills = $stats['ObjectiveKills-Average'];
  $mpat_dmg = $stats['DamageDone-Average'];
  $mpat_healing = $stats['HealingDone-Average'];
//Pull data from stats and define variable names for them to be saved to stats.php.  Names for use within the table will be define later.
}

?>

<?php
    $txt = "\$mpat_fulltag_tabledata = '{$mpat_fulltag}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$mpat_elims_tabledata = '{$mpat_elims}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$mpat_objkills_tabledata = '{$mpat_objkills}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$mpat_dmg_tabledata = '{$mpat_dmg}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$mpat_healing_tabledata = '{$mpat_healing}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$mpat_mmr_tabledata = '{$mpat_mmr}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$mpat_compwin_tabledata = '{$mpat_compwin}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$mpat_comploss_tabledata = '{$mpat_comploss}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$mpat_playericon_tabledata = '{$mpat_playericon}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$mpat_portraitborder_tabledata = '{$mpat_portraitborder}';\n";
    fwrite($statsfile, $txt);
//write data to stats.php
?>