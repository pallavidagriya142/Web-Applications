<?php 
 session_start();
?>
<?php include 'header.php';?>

<style type="text/css">
.main_divs{
  margin-top: 9%;
  padding-bottom: 32px;
  }

.fix_divs {
  height: 100vh;
  overflow-x: auto;
  }

body{
  font-size: 15px;
  color: #343d44;
  font-family: "segoe-ui", "open-sans", tahoma, arial;
}

table {
  margin: auto;
  font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
  font-size: 12px;
}

h3 {
  margin: 25px auto 0;
  text-align: center;
  text-transform: uppercase;
  font-size: 27px;
}

table td {
  transition: all .5s;
}
    
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

.data-table thead th {
  background-color:   #228B22;
  color: #FFFFFF;
  border-color: #6ea1cc !important;
  text-transform: uppercase;
}

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

.data-table tfoot th {
  background-color: #e5f5ff;
  text-align: right;
}

.data-table tfoot th:first-child {
  text-align: left;
}

</style>


<div class="main_divs">
  <h3>MY HISTORY</h3>
  <table class="data-table">
    <thead>
      <tr>
        <th>NO</th>
        <th>PLANTS-NAME</th>
        <th>AMOUNT</th>
        <th>DATE</th>
      </tr>
    </thead>
      <tbody>  
<?php

   $conn = mysqli_connect('localhost', 'root', '', 'project');
   if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $user_id = $_SESSION['user_id'];

    $sql = "SELECT * FROM orders where user_id='$user_id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          
          $no = 1;
    
?>

    
         <tr>
          <td><?php echo $no;?></td>
          <td><?php echo $row["plant_name"];?></td>
          <td><?php echo $row["amount"];?></td>         
          <td><?php echo $row["date"];?></td>
        </tr>;
    
  <?php
}
$no++;}
    ?>
</tbody>
  </table>
</div>
</body>
</html>


<?php include 'footer.php';?>