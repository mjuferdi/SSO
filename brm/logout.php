<?php
require_once('brm/simplesaml/lib/_autoload.php');
$as = new SimpleSAML_Auth_Simple('brm-sp');
$as ->logout(array(
	'ReturnTo' => 'https://mariom.info/logged_out.php',
	'ReturnStateParam' => 'LogoutState',
	'ReturnStateStage' => 'MyLogoutState',
));
?>