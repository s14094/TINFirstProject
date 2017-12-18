<?php
/**
 * Created by IntelliJ IDEA.
 * User: pawellakomiec
 * Date: 18/12/2017
 * Time: 11:25
 */
?>

<?php include 'header.php'; ?>

<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="adminPanel.css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
	      integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
	        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
	        crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
	        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
	        crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
	        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
	        crossorigin="anonymous"></script>
</head>

<body>

<div style="padding-top: 100px;">

	<h1>ADMIN PANEL</h1>

	<div id="accordion" role="tablist">
		<div class="card">
			<div class="card-header" role="tab" id="headingOne">
				<h5 class="mb-0">
					<a class="collapsed" data-toggle="collapse" href="#collapseOne" aria-expanded="false"
					   aria-controls="collapseOne">
						Użytkownicy
					</a>
				</h5>
			</div>
			<div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne"
			     data-parent="#accordion">
				<div class="card-body">

					<table class="table table-hover table-bordered table-striped table-dark">
						<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">First Name</th>
							<th scope="col">Last Name</th>
							<th scope="col">Username</th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<th scope="row">1</th>
							<td>Mark</td>
							<td>Otto</td>
							<td>@mdo</td>
						</tr>
						<tr>
							<th scope="row">2</th>
							<td>Jacob</td>
							<td>Thornton</td>
							<td>@fat</td>
						</tr>
						<tr>
							<th scope="row">3</th>
							<td colspan="2">Larry the Bird</td>
							<td>@twitter</td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="card">
			<div class="card-header" role="tab" id="headingTwo">
				<h5 class="mb-0">
					<a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false"
					   aria-controls="collapseTwo">
						Filmy
					</a>
				</h5>
			</div>
			<div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo"
			     data-parent="#accordion">
				<div class="card-body">
					Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
					wolf
					moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
					eiusmod.
					Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
					shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente
					ea
					proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw
					denim
					aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
				</div>
			</div>
		</div>
	</div>
</div>

<div class="box">
	<form method="post">

	</form>

	<div style="font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
</div>

</body>
</html>
