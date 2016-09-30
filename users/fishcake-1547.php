<?php
$platform = "pc"; //pc, psn, xbl
$country = "us"; //eu, us, jp, cn, kr
$battletag = "fishcake-1547"; //Replace # with -

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
  $fish_level = $results['level'];
  $fish_fulltag = str_replace("-", "#", $battletag);
  $fish_compwin = $results['games']['competitive']['wins'];
  $fish_comploss = $results['games']['competitive']['lost'];
  $fish_compplayed = $results['games']['competitive']['played'];
  $fish_mmr = $results['competitive']['rank'];
  $fish_playericon = $results['avatar'];
  $fish_portraitborder = $results['levelFrame'];
  $mode = "quick";
  $fish_winpercentage = round((float)$fish_compwin / $fish_compplayed * 100) . '%'; //work out win percentage
  if(isset($fish_mmr))
  {
    $fish_mmr = $results['competitive']['rank'];
  }
  if(!isset($fish_mmr)) //If they don't have MMR then return 0
  {
    $fish_mmr = "0";
  }
}
?>

<?php
$platform = "pc"; //pc, psn, xbl
$country = "us"; //eu, us, jp, cn, kr
$battletag = "fishcake-1547"; //Replace # with -

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
  $fish_elims = $stats['Eliminations-Average'];
  $fish_objkills = $stats['ObjectiveKills-Average'];
  $fish_dmg = $stats['DamageDone-Average'];
  $fish_healing = $stats['HealingDone-Average'];
//Pull data from stats and define variable names for them to be saved to stats.php.  Names for use within the table will be define later.
}

?>

<?php
    $txt = "\$fish_fulltag_tabledata = '{$fish_fulltag}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$fish_elims_tabledata = '{$fish_elims}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$fish_objkills_tabledata = '{$fish_objkills}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$fish_dmg_tabledata = '{$fish_dmg}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$fish_healing_tabledata = '{$fish_healing}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$fish_mmr_tabledata = '{$fish_mmr}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$fish_compwin_tabledata = '{$fish_compwin}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$fish_comploss_tabledata = '{$fish_comploss}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$fish_playericon_tabledata = '{$fish_playericon}';\n";
    fwrite($statsfile, $txt);
    $txt = "\$fish_portraitborder_tabledata = '{$fish_portraitborder}';\n";
    fwrite($statsfile, $txt);
//write data to stats.php
?>