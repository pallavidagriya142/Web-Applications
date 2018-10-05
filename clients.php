<?php include 'index-header.php';?>
<?php
$conn = mysqli_connect('localhost', 'root', '', 'project');
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

$sql = 'SELECT * 
		FROM user';
		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
?>
<html>
<head>
	<title>Displaying MySQL Data in HTML Table</title>
	<style type="text/css">

	.fix_div{
	    margin-left: 231px;
        padding-left: 20px;
        margin-top: 20px; 
        padding-right: 50px;
	}


	 .main_divs{
              margin-top: 8%;
    padding-bottom: 16px;
   }

		body {
			font-size: 15px;
			color: #343d44;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
			padding: 0;
			margin: 0;
		}
		table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
		}

		h1 {
			margin: 25px auto 0;
			text-align: center;
			text-transform: uppercase;
			font-size: 17px;
		}

		table td {
			transition: all .5s;
		}
		
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
			background-color: 	#228B22;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
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
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: right;
		}
		.data-table tfoot th:first-child {
			text-align: left;
		}
		/*.data-table tbody td:empty
		{
			background-color: #ffcccc;
		}*/
	</style>
</head>
<body>

<div class="main_divs">
	<h1>USER</h1>
	<table class="data-table">
		<thead>
			<tr>
				<th>NO</th>
				<th>USER-FIRSTNAME</th>
				<th>USER-LASTNAME</th>
				<th>USER-EMAIL</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$no 	= 1;
		$total 	= 0;
		while ($row = mysqli_fetch_array($query))
		{
			
			echo '<tr>
					<td>'.$row['user_id'].'</td>
					<td>'.$row['firstname'].'</td>
					<td>'.$row['lastname'].'</td>					
					<td>'.$row['email'].'</td>
				</tr>';
		}?>
		</tbody>
	</table>
</div>

<?php include 'index.php';?>


