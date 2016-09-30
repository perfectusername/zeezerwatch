<?php
$platform = "pc"; //pc, psn, xbl
$country = "us"; //eu, us, jp, cn, kr
$battletag = "OhNo-1176"; //Replace # with -

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
  $ohno_level = $results['level'];
  $ohno_fulltag = str_replace("-", "#", $battletag);
  $ohno_compwin = $results['games']['competitive']['wins'];
  $ohno_comploss = $results['games']['competitive']['lost'];
  $ohno_compplayed = $results['games']['competitive']['played'];
  $ohno_mmr = $results['competitive']['rank'];
  $ohno_playericon = $results['avatar'];
  $ohno_portraitborder = $results['levelFrame'];
  $mode = "quick";
  $ohno_winpercentage = round((float)$ohno_compwin / $ohno_compplayed * 100) . '%'; //work out win percentage
  if(isset($ohno_mmr))
  {
    $ohno_mmr = $results['competitive']['rank'];
  }
  if(!isset($ohno_mmr)) //If they don't have MMR then return 0
  {
    $ohno_mmr = "0";
  }
}
?>

<?php
$platform = "pc"; //pc, psn, xbl
$country = "us"; //eu, us, jp, cn, kr
$battletag = "OhNo-1176"; //Replace # with -

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
  $ohno_elims = $stats['Eliminations-Average'];
  $ohno_objkills = $stats['ObjectiveKills-Average'];
  $ohno_dmg = $stats['DamageDone-Average'];
  $ohno_healing = $stats['HealingDone-Average'];
//Pull data from stats and define variable names for them to be saved to stats.php.  Names for use within the table will be define later.
}

?>

<?php
    $txt = "\$ohno_fulltag_tabledata = '{$ohno_fulltag}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$ohno_elims_tabledata = '{$ohno_elims}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$ohno_objkills_tabledata = '{$ohno_objkills}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$ohno_dmg_tabledata = '{$ohno_dmg}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$ohno_healing_tabledata = '{$ohno_healing}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$ohno_mmr_tabledata = '{$ohno_mmr}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$ohno_compwin_tabledata = '{$ohno_compwin}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$ohno_comploss_tabledata = '{$ohno_comploss}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$ohno_playericon_tabledata = '{$ohno_playericon}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$ohno_portraitborder_tabledata = '{$ohno_portraitborder}';\n";
    fwrite($statsfile, $txt);
//write data to stats.php
?>