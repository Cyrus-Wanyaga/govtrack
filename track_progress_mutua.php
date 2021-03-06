<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "govtrack";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $db_name);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
	$sql = "SELECT * FROM projects
			WHERE 	profileID = '2'";
    
    $query = mysqli_query($conn, $sql);
    
    if (!$query) {
        die('SQL Error: ' . mysqli_error($conn));
    }
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/earth-icon.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/earth-icon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Track Progress</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width"/>

	<!-- Bootstrap core CSS     -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/css/paper-kit.css?v=2.1.0" rel="stylesheet"/>


    <!--     Fonts and icons     -->
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet">
    <style type="text/css">
    /* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			min-width: 537px;
		}

		.data-table th, 
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
		}
		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #f5593d;
			color: #FFFFFF;
			border-color: white !important;
			text-transform: uppercase;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: right;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.data-table tbody tr:hover td {
			background-color: #0976b4;
			border-color: gray;
		}

		.data-table tfoot th:first-child {
			text-align: left;
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
        }
        </style>
</head>
<body>
    <div class="page-header" data-parallax="false" style="background-image: url('assets/img/Alfred-Mutua.jpg');">
			<div class="filter"></div>
			<div class="container">
			    <div class="motto text-center">
			        <h1>Alfred Mutua</h1>
			        <br/>
			    </div>
			</div>
    </div>
    <div class="main">
		<div class="section text-center">
            <div class="container">
	            <table class="data-table">
                    <h2 class="title">Alfred Mutua Track Progress</h2>
		            <thead>
			            <tr>
				            <th>Project Title</th>
				            <th>Project Description</th>
				            <th>Project Progress</th>
			            </tr>
		            </thead>
		            <tbody>
		                <?php
	    	                while ($row = mysqli_fetch_array($query))
		                        {
			                        echo '<tr>
					                <td>'.$row['proposedProjectTitle'].'</td>
					                <td>'.$row['proposedProjectDesc'].'</td>
					                <td>'.$row['projectProgress'].'</td>
				                    </tr>';
		                        }?>
		            </tbody>
	            </table>
			</div>
			<br/>
			<a href="profiles.html" class="btn btn-danger btn-round">Back</a>
        </div>
    </div>    
</body>
</html>