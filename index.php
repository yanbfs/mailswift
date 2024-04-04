<!DOCTYPE html>

<html lang="pt-BR">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MailSwift</title>
	<script src="https://kit.fontawesome.com/4d9a4abad5.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="src/css/style.css">
	<link rel="icon" href="src/img/paper-plane.svg">
</head>

<body>
	<div class="background">
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		<span></span>
	 </div>
	<div class="wrapper">
		<form action="src/php/process_shipping.php" method="post">
			<h1>MailSwift <i class="fa-regular fa-paper-plane" style="color: #ffffff;"></i> </h1>
			<div class="input-box">
				<input name="recipient-email" id="para" type="text" placeholder="E-mail do destinatário" required>
				<i class="fa-solid fa-envelope"></i>
			</div>
			<div class="input-box">
				<input name="email-subject" type="text" placeholder="Assundo do e-mail" required>
				<i class="fa-solid fa-pen"></i>
			</div>
			<div class="input-box">
				<textarea name="email-text" id="mensagem" placeholder="Escreva seu e-mail."></textarea>
			</div>
			<div class="box-btn">
				<button type="submit" class="btn">Enviar Mensagem</button>
			</div>
		</form>
	</div>
</body>

</html>