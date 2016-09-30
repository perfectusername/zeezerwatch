<?php
$platform = "pc"; //pc, psn, xbl
$country = "us"; //eu, us, jp, cn, kr
$battletag = "zeezRaldan-1456"; //Replace # with -

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
  $ral_level = $results['level'];
  $ral_fulltag = str_replace("-", "#", $battletag);
  $ral_compwin = $results['games']['competitive']['wins'];
  $ral_comploss = $results['games']['competitive']['lost'];
  $ral_compplayed = $results['games']['competitive']['played'];
  $ral_mmr = $results['competitive']['rank'];
  $ral_playericon = $results['avatar'];
  $ral_portraitborder = $results['levelFrame'];
  $mode = "quick";
  $ral_winpercentage = round((float)$ral_compwin / $ral_compplayed * 100) . '%'; //work out win percentage
  if(isset($ral_mmr))
  {
    $ral_mmr = $results['competitive']['rank'];
  }
  if(!isset($ral_mmr)) //If they don't have MMR then return 0
  {
    $ral_mmr = "0";
  }
}
?>

<?php
$platform = "pc"; //pc, psn, xbl
$country = "us"; //eu, us, jp, cn, kr
$battletag = "zeezRaldan-1456"; //Replace # with -

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
  $ral_elims = $stats['Eliminations-Average'];
  $ral_objkills = $stats['ObjectiveKills-Average'];
  $ral_dmg = $stats['DamageDone-Average'];
  $ral_healing = $stats['HealingDone-Average'];
//Pull data from stats and define variable names for them to be saved to stats.php.  Names for use within the table will be define later.
}

?>

<?php
    $txt = "\$ral_fulltag_tabledata = '{$ral_fulltag}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$ral_elims_tabledata = '{$ral_elims}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$ral_objkills_tabledata = '{$ral_objkills}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$ral_dmg_tabledata = '{$ral_dmg}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$ral_healing_tabledata = '{$ral_healing}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$ral_mmr_tabledata = '{$ral_mmr}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$ral_compwin_tabledata = '{$ral_compwin}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$ral_comploss_tabledata = '{$ral_comploss}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$ral_playericon_tabledata = '{$ral_playericon}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$ral_portraitborder_tabledata = '{$ral_portraitborder}';\n";
    fwrite($statsfile, $txt);
//write data to stats.php
?>