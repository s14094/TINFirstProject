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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
							<th scope="col" style="width: 100px;">#id</th>
							<th scope="col">username</th>
							<th scope="col">password</th>
							<th scope="col">email</th>
							<th scope="col" style="width: 100px;">accounttype</th>
							<th scope="col" style="width: 100px;">delete</th>
						</tr>
						</thead>
						<tbody>

                        <?php
                        // Check connection
                        if ($db->connect_error) {
                            die("Connection failed: " . $db->connect_error);
                        }
                        $sql = "SELECT id, username, password, email, accounttype FROM users";
                        $result = $db->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr><th scope='row'> " . $row["id"] . "</th>";
                                echo "<td>" . $row["username"] . "</td>";
                                echo "<td>" . $row["password"] . "</td>";
                                echo "<td>" . $row["email"] . "</td>";
                                echo "<td>" . $row["accounttype"] . "</td> ";
                                echo "<td><a href='' style='color: #cc0000'><i class='fa fa-trash-o' style='font-size:24px'></i></a></td></tr>";
                            }
                        } else {
                            echo "pusta baza";
                        }
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
						Filmy
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
							<th scope="col" style="width: 100px;">delete</th>
						</tr>
						</thead>
						<tbody>

                        <?php
                        // Check connection
                        if ($db->connect_error) {
                            die("Connection failed: " . $db->connect_error);
                        }
                        $sql = "SELECT movieId, moviename, userid FROM testmovies";
                        $result = $db->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr><th scope='row'> " . $row["movieId"] . "</th>";
                                echo "<td><a href='" . $row["moviename"] . "'>" . $row["moviename"] . "</a></td>";
                                echo "<td>" . $row["userid"] . "</td>";
                                echo "<td><a href='' style='color: #cc0000'><i class='fa fa-trash-o' style='font-size:24px'></i></a></td></tr>";
                            }
                        } else {
                            echo "pusta baza";
                        }
                        $db->close();
                        ?>
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
