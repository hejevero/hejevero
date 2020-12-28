<section class="container bg-light pt-5">
	<?php
	require_once "./vendor/autoload.php";
	
	use Transbank\Webpay\Webpay;
	use Transbank\Webpay\Configuration;
	
	$transaction = (new Webpay(Configuration::forTestingWebpayPlusNormal()))
					->getNormalTransaction();
	$amount = 10000;
	$sessionId = "sesionId";
	$buyOrder = strval(rand(10000,9999999));
	$returnUrl = "http://localhost/hejevero/return.php";
	$finalUrl = "http://localhost/hejevero/final.php";
	
	$initResult = $transaction->initTransaction(
		$amount, $sessionId, $buyOrder, $returnUrl, $finalUrl
	);
	
	$formAction = $initResult->url;
	$tokenWs = $initResult->token;
	?>
	<div class="container">
		<div class="col-md-6 col-md-offset-3">
			<h2>Pago con Webpay</h2>
			<p><b>Valor</b> <?php echo $amount; ?></p>
			<p><b>Orden de compras</b> <?php echo $buyOrder; ?></p>
			
			<form action="<?php echo $formAction; ?>" method="post" class="form-inline" role="form">
				<input type="hidden" name="token_ws" value="<?php echo $tokenWs; ?>">
				<button type="submit" class="btn btn-primary">Pagar</button>
		</div>
	</div>
</section>