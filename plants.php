 <?php include 'header.php';?>
 <style>
   .main_divs {
    margin-top: 90px;
    margin-left: 220px;
    padding-left: 20px;
    width:70%;
}

.sidenav {
    height: 87.6%;
    width: 220px;
    position: absolute;
    z-index: 1;
    top: 83px;
    left: 0;
    background-color: green;
    overflow-x: hidden;
    padding-top: 20px;
}
.main_divs{
	margin-top: 90px;
}
.sidenav a {
				padding: 6px 8px 6px 16px;
				text-decoration: none;
				font-size: 25px;
				color: #f1f1f1;
				display: block;
}
.main_divs {
    margin-top: 90px;
    margin-left: 220px;
    padding-left: 20px;
}
.sidenav a:hover {
				color: black;
}
.fix_divs {
    height: 100vh;
    overflow-x: auto;
}
</style>
  <div class="fix_divs">
   <div class="sidenav">
	<a href="about.php">About</a>
	<a href="plants.php">Add Plants</a>
	<a href="logout.php">LogOut</a>
	<a href="contact.php">Contact</a>
</div>

	<div class="main_divs">

	   <label>NO OF PLANTS:</label>
	   <input type="number" class="form-control" id="no_of_plants"></br>

       <label>CATEGORIES</label>
       <div class="form-group">
          <select class="form-control" id="category">
            <?php
                $conn = mysqli_connect('localhost', 'root', '', 'project');
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM category";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        ?>
                   <option ><?php echo $row['category_name']?></option>     
                   <?php
                   }
                } 
            ?>
            
          </select></br>
        </div> 

        <label>NAME OF PLANTS</label>
       <div class="form-group">
          <select class="form-control" id="category">
            <?php
                $conn = mysqli_connect('localhost', 'root', '', 'project');
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM category";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        ?>
                   <option ><?php echo $row['category_name']?></option>     
                   <?php
                   }
                } 
            ?>
            
          </select></br>
        </div> 

        

        <label>LOCATION</label>
        <input type="text" class="form-control" id="location" ></br></br>

        <button type="submit" class="btn btn-success" id="submit">Submit</button> 
    </div>	
</div>
        <script type="text/javascript">

		$(document).ready(function(){
			$("#submit").click(function(){
				var no_of_plants = $("#no_of_plants").val();
				var category = $("#category option:selected").text();
				var location = $("#location").val(); 

				if(no_of_plants == ""){
					alert("required");
				}

				else if(category == ""){
					alert("required");
				}

				else if(location == ""){
					alert("required");
				}

				else{
				   $.ajax({
					url : 'php/add_plants.php',
                    type: 'POST', 
                    data : {no_of_plants:no_of_plants, category:category, location:location}, 
                    success: function(data) {
                            alert(data);	
				           }
				});
			}	   
			});
		});
	</script>

<?php include 'footer.php';?> 