<?php
$platform = "pc"; //pc, psn, xbl
$country = "us"; //eu, us, jp, cn, kr
$battletag = "ghost-1456"; //Replace # with -

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
  $ghost_level = $results['level'];
  $ghost_fulltag = str_replace("-", "#", $battletag);
  $ghost_compwin = $results['games']['competitive']['wins'];
  $ghost_comploss = $results['games']['competitive']['lost'];
  $ghost_compplayed = $results['games']['competitive']['played'];
  $ghost_mmr = $results['competitive']['rank'];
  $ghost_playericon = $results['avatar'];
  $ghost_portraitborder = $results['levelFrame'];
  $mode = "quick";
  $ghost_winpercentage = round((float)$ghost_compwin / $ghost_compplayed * 100) . '%'; //work out win percentage
  if(isset($ghost_mmr))
  {
    $ghost_mmr = $results['competitive']['rank'];
  }
  if(!isset($ghost_mmr)) //If they don't have MMR then return 0
  {
    $ghost_mmr = "0";
  }
}
?>

<?php
$platform = "pc"; //pc, psn, xbl
$country = "us"; //eu, us, jp, cn, kr
$battletag = "ghost-1456"; //Replace # with -

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
  $ghost_elims = $stats['Eliminations-Average'];
  $ghost_objkills = $stats['ObjectiveKills-Average'];
  $ghost_dmg = $stats['DamageDone-Average'];
  $ghost_healing = $stats['HealingDone-Average'];
//Pull data from stats and define variable names for them to be saved to stats.php.  Names for use within the table will be define later.
}

?>

<?php
    $txt = "\$ghost_fulltag_tabledata = '{$ghost_fulltag}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$ghost_elims_tabledata = '{$ghost_elims}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$ghost_objkills_tabledata = '{$ghost_objkills}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$ghost_dmg_tabledata = '{$ghost_dmg}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$ghost_healing_tabledata = '{$ghost_healing}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$ghost_mmr_tabledata = '{$ghost_mmr}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$ghost_compwin_tabledata = '{$ghost_compwin}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$ghost_comploss_tabledata = '{$ghost_comploss}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$ghost_playericon_tabledata = '{$ghost_playericon}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$ghost_portraitborder_tabledata = '{$ghost_portraitborder}';\n";
    fwrite($statsfile, $txt);
//write data to stats.php
?>