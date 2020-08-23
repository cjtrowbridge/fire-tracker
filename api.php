<?php

$CacheFilename = 'cache/'.date('Y-m-d').'.json';
$APIURL = 'https://www.fire.ca.gov/umbraco/api/IncidentApi/List?';
if(
  file_exists($CacheFilename) &&
  (filemtime ($CacheFilename)>(time()-60*60))
){
  $Data = file_get_contents($CacheFilename);
}else{
  $Data = file_get_contents($APIURL);
  file_put_contents($CacheFilename,$Data);
}

header('Content-Type: application/json');
return $CacheFilename;
