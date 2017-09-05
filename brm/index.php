<!DOCTYPE html>		
<?php
	/*require_once('brm/simplesaml/lib/_autoload.php');
	
	$as = new SimpleSAML_Auth_Simple('brm-sp');
	if (!$as->isAuthenticated()) {
		print('<a href="https://dc01.local.wbs-training.de/adfs/ls/idpinitiatedsignon.aspx?logintoRP=https://mariom.info">Login</a>');
	}
	$as->requireAuth(array(
		'ReturnTo' => 'https://mariom.info/info.php',
		'KeepPost' => FALSE,
	));
	$attribute = $as->getAttributes();*/
?>
<html>
	<head>
		<title>Berechtigungsmanagement</title>
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	</head>
	<body>
		<div class="bg-1">
			<div class="container">
				<div class="row">
					<div class="col-sm-4 col-sm-offset-4 text-center center">
						<h2>herzlich willkommen bei BRM-Demo</h2>
						<?php
						require_once('brm/simplesaml/lib/_autoload.php');
						$as = new SimpleSAML_Auth_Simple('brm-sp');
						if (!$as->isAuthenticated()) {
							echo '<p id="status-inf-not">You are not authorized to acces this page.</p>';
							print('<a href="https://dc01.local.wbs-training.de/adfs/ls/idpinitiatedsignon.aspx?logintoRP=https://mariom.info" class="btn btn-primary">Login</a> ');
						}
						if ($as->isAuthenticated()) {
							echo '<p id="status-inf">You are authorized user.</p>';
							echo '<div class="user-att">';
							echo '<h3>Your attribute:</h3>';
							$attribute = $as->getAttributes();
							$myEmail = $attribute['http://schemas.xmlsoap.org/ws/2005/05/identity/claims/upn'][0];
							$myId = $attribute['uid'][0]; 
							$mySurname = $attribute[sn][0];
							$myName = $attribute[givenname][0];
							echo '<h4 class="fd-in">Nachname: ' . $mySurname . '</h4>';
							echo '<h4 class="fd-in">Vorname: ' . $myName . '</h4>';
							echo '<h4 class="fd-in">Email: ' . $myEmail . '</h4>';
							echo '<h4 class="fd-in">Id: ' . $myId . '</h4>';
							#print_r($attribute);
							echo '</div>';
							echo '<a class="fd-in" href="logout.php">Logout</a>';
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</body>
	<script type="text/javascript" language="javascript">
		$('.fd-in').each(function(i) {
			$(this).hide().delay(i * 500).fadeIn(800);
		});
	</script>
</html>