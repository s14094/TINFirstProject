<?php
/**
 * Created by IntelliJ IDEA.
 * User: pawellakomiec
 * Date: 18/12/2017
 * Time: 11:25
 */
?>

<?php
session_start();
include("config.php");
include 'header.php';
?>

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
						Użytkownicy - id, username, password, email, accounttype
					</a>
				</h5>
			</div>
			<div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne"
			     data-parent="#accordion">
				<div class="card-body">

					<table class="table table-hover table-bordered table-striped table-dark">
						<thead>
						<tr>
							<th scope="col" style="width: 100px;">#id</th>
							<th scope="col">username</th>
							<th scope="col">password</th>
							<th scope="col">email</th>
							<th scope="col" style="width: 100px;">accounttype</th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<th scope="row">1</th>
							<td>Mark</td>
							<td>Otto</td>
							<td>@mdo</td>
							<td>@mdo</td>
						</tr>

                        <?php
                        // Check connection
                        if ($db->connect_error) {
                            die("Connection failed: " . $db->connect_error);
                        }

                        $sql = "SELECT id, firstname, lastname FROM MyGuests";
                        $result = $db->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                            }
                        } else {
                            echo "0 results";
                        }
                        $db->close();
                        ?>

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
						Filmy - movieId, moviename, userid
					</a>
				</h5>
			</div>
			<div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo"
			     data-parent="#accordion">
				<div class="card-body">
					<table class="table table-hover table-bordered table-striped table-dark">
						<thead>
						<tr>
							<th scope="col" style="width: 100px;">#id</th>
							<th scope="col">movie name / link</th>
							<th scope="col" style="width: 100px;">user id</th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<th scope="row">1</th>
							<td>Mark</td>
							<td>Otto</td>
						</tr>
						<tr>
							<th scope="row">2</th>
							<td>Jacob</td>
							<td>Thornton</td>
						</tr>
						<tr>
							<th scope="row">3</th>
							<td>@mdo333</td>
							<td>@mdo333</td>
						</tr>
						</tbody>
					</table>
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
