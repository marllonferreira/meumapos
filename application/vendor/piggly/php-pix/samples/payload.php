<?php
use Piggly\Pix\Parser;
use Piggly\Pix\Payload;

// Sample
// User input
// -> Required
$keyType  = Parser::KEY_TYPE_RANDOM;
$keyValue = 'aae2196f-5f93-46e4-89e6-73bf4138427b';
$merchantName = 'STUDIO PIGGLY';
$merchantCity = 'Uberaba';

// -> Optional
$amount = 109.90; // Payment amount as float
$tid = '034593-09'; // Transaction id
$description = 'Pagamento 01'; // Any type of description, characters allowed 
$reusable = false;

// Create the pix payload
$pix = 
	(new Payload())
		// ->applyValidCharacters()
		// ->applyUppercase()
		// ->applyEmailWhitespace()
		->setPixKey($keyType, $keyValue)
		->setMerchantName($merchantName)
		->setMerchantCity($merchantCity)
		->setAmount($amount)
		->setTid($tid)
		->setDescription($description)
		->setAsReusable($reusable);

// Prints: 00020101021126740014br.gov.bcb.pix0136aae2196f-5f93-46e4-89e6-73bf4138427b0212Pagamento 0152040000053039865406109.905802BR5913STUDIO PIGGLY6007Uberaba62130509034593-09630444C9
echo $pix->getPixCode();

// Prints: <img style="margin:12px auto" src="data:image/png;base64,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" alt="QR Code de Pagamento" />
echo '<img style="margin:12px auto" src="'.$pix->getQRCode().'" alt="QR Code de Pagamento" />';