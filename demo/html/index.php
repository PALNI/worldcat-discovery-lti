<?php

require_once('../lib/worldcat-discovery-php/vendor/autoload.php');

   use OCLC\Auth\WSKey;
   use OCLC\Auth\AccessToken;
   use WorldCat\Discovery\Bib;

   $key = 'YJhaz1kKh4g84GVYCG2lVZUUMCKcjIeI1wf83mZX6fvlLzF9IJ8LboWkYDcDq2TsxeVYQgrSekd41z69';
   $secret = 'xCsMn3vxLbGJarJHLlGYpw==';
   $options = array('services' => array('WorldCatDiscoveryAPI', 'refresh_token'));
   $wskey = new WSKey($key, $secret, $options);
   $accessToken = $wskey->getAccessTokenWithClientCredentials('996', '996');

   $bib = Bib::Find(7977212, $accessToken);

   if (is_a($bib, 'WorldCat\Discovery\Error')) {
       echo $bib->getErrorCode();
       echo $bib->getErrorMessage();
   } else {
       echo $bib->getName();
       //print_r($bib->getID());
       //echo $bib->getID();
       //print_r($bib->type());
       //echo $bib->type();
       //print_r($bib->getAuthor());
       //echo $bib->getAuthor()->getName();
       $contributors = array_map(function ($contributor) {
           return $contributor->getName();
       }, $bib->getContributors());
       print_r($contributors);
   }
?>
