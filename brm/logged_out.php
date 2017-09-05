<html>
	<head>
		<title>Berechtigungsmanagement</title>
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	</head>
	<body>
		<div>
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-center">
						<?php 
						require_once('brm/simplesaml/lib/_autoload.php');
						try {
							if ($_REQUEST['LogoutState']) {
								$state = SimpleSAML_Auth_State::loadState((string)$_REQUEST['LogoutState'], 'MyLogoutState');
							}
							else {
								exit;
							}
						}
						catch (Exception $e) {
							echo 'Caught exception: ', $e->getMessage(), "\n";
							exit;
						}
						$ls = $state['saml:sp:LogoutStatus'];
						if ($ls['Code'] === 'urn:oasis:names:tc:SAML:2.0:status:Success' && !isset($ls['SubCode'])) {
							echo '<h2>Sie wurden erfolgreich abgemeldet.</h2>';
							echo '<a class="btn btn-primary" id="home-btn" href="https://mariom.info">Home </a>';
							echo '<a class="btn btn-primary" href="https://dc01.local.wbs-training.de/adfs/ls/idpinitiatedsignon.aspx?logintoRP=https://mariom.info"> Log in</a>';
						} else {
							echo '<h2>Logout fehlgeschlagen. Bitte schlißen Sie Ihren Browser.</h2>';
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>