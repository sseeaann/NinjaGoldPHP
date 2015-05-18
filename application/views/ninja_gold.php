<!DOCTYPE>
<html>
	<head>
		<title>Ninja Gold Game</title>
		<link rel="stylesheet" type="text/css" href="bootstrap-3.3.2-dist/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="bootstrap-3.3.2-dist/css/bootstrap-theme.css">
		<style type="text/css">
			.container{
				background: linear-gradient(silver, #eee, silver);
				min-height: 800px;
			}
			div {
				/*outline: 1px dotted red;*/
			}
			h1{
				text-shadow: 1px 1px 30px gray;
			}
			p{
				font-size: 20px;
			}
			span{
				color: gold;
				text-shadow: 4px 2px 5px gray;
				font-size: 30px;
				letter-spacing: 5px;
			}
			#place{
				border: 1px solid black;
				background: linear-gradient(white, gold, white);
				box-shadow: 2px 2px 3px black;
				height: 180px;
			}
			#body{
				margin-top: 10px;
			}
			#lost{
				color: red;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row" id="header">
				<div class="col-md-12">
					<h1 class="text-center">Ninja Gold Game</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<p><strong>Your Gold: <span><?= $YourGold; ?></span> </strong></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 col-sm-6" id="place">
					<h2 class="text-center">FARM</h2>
					<p class="text-center">(earns 10 - 20 gold)</p>
					<form action="/addGold" method="post">
						<input type="hidden" name="action" value="farm">
						<input class="btn btn-default center-block" type="submit" value="Find Gold!">
					</form>
				</div>
				<div class="col-md-3 col-sm-6" id="place">
					<h2 class="text-center">CAVE</h2>
					<p class="text-center">(earns 5 - 10 gold)</p>
					<form action="/addGold" method="post">
						<input type="hidden" name="action" value="cave">
						<input class="btn btn-default center-block" type="submit" value="Find Gold!">
					</form>
				</div>
				<div class="col-md-3 col-sm-6" id="place">
					<h2 class="text-center">HOUSE</h2>
					<p class="text-center">(earns 2 - 5 gold)</p>
					<form action="/addGold" method="post">
						<input type="hidden" name="action" value="house">
						<input class="btn btn-default center-block" type="submit" value="Find Gold!">
					</form>
				</div>
				<div class="col-md-3 col-sm-6" id="place">
					<h2 class="text-center">CASINO</h2>
					<p class="text-center">(earns/takes 0-ALL gold)</p>
					<form action="/addGold" method="post">
						<input type="hidden" name="action" value="casino">
						<input class="btn btn-default center-block" type="submit" value="Find Gold!">
					</form>
				</div>
			</div>
			<div class="row" id="body">
				<div class="col-md-12">
					<p><strong>Activites:</strong></p>
					<p><?= $YourMessage; ?></p>
				</div>
			</div>
		</div>
	</body>
</html>