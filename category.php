<?php include 'index-header.php';?>

<style type="text/css">
	.fix_div{
	    margin-left: 231px;
        padding-left: 20px;
        margin-top: 20px; 
        padding-right: 50px;
	}

  .container{
    margin-left: 200px;
    width: 60%;
}


	input[type=text],input[type=file],input[type=number], select{
    width: 70%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
    background-color: lightgray;
}

input[type=text]:focus, input[type=file]:focus, select:focus {
    background-color: #ddd;
    outline: none;
}

input[type=text]:hover, input[type=file]:hover, select:hover {
    background-color: #ddd;
}

.btn{
  width: 70%;
}

</style>
<div class="fix_div">
	<div class="form-group container">
        <label for="sel1">CATEGORIES:</label>
        <select class="form-control" id="sel1">
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
          <option value="<?php echo $row['category_id'];?>"><?php echo $row['category_name'];?></option>
           <?php
      }}

        ?>
        </select>
       

        <label>PLANT-NAME</label> 
        <input type="text" name="plants" id="plants">
        <span id="pntError" style="color: Red; display: none">*Enter Valid Plant-Name.</span></br>

        <label>IMAGE</label>
        <input type="file" name=image id="upfile">
        <span id="imgError" style="color: Red;"></span></br>

        <label>PRICE</label> 
        <input type="text" name="Price" id="price">
        <span id="prcError" style="color: Red; display: none">*Enter Valid Price.</span></br>

        <label>QUANTITY</label> 
        <input type="number" name="quantity" id="quantity">
        <span id="qntyError" style="color: Red; display: none">*Enter Valid quantity.</span></br>

        <label>DESCRIPTION</label></br>
        <textarea rows="5" cols="50" name="comment" id="comment">
          Enter description here...</textarea></br></br>


        <button type="submit" class="btn btn-success" id="submit">Submit</button>
    </div>
</div>
<?php include 'index.php';?>

<script type="text/javascript">
	$(document).ready(function(){
		$("#submit").click(function(){
			var data = new FormData();

            data.append('filepath', $("#upfile").val());
            
            data.append('upfile', $("#upfile")[0].files[0]);

            data.append('categories', $("#sel1").val());

            data.append('plant_name', $("#plants").val());

            data.append('description', $("#comment").val());

             data.append('price', $("#price").val());

              data.append('quantity', $("#quantity").val());


            var isValid = false;
           var char = /^[0-9a-zA-Z]+$/;
            var num = /^[0-9]+$/;
           

           if($("#upfile").val() == ""){
           document.getElementById("imgError").innerHTML= "*Enter Image.";
           }

           else if(isValid == num.test(price)){ 
            $("#prcError").css("display", !isValid ? "block" : "none").fadeOut(3000);
               return isValid;
           }

          
          else{
             $.ajax({
            url: 'save_plants.php',
            type: 'POST', 
            data : data,
            async:false,
            contentType: false,
            cache: false,
            processData:false,
            dataType: "text",                                                                    
                  success: function (jsonStr) {
                alert(jsonStr);	
                }
          });
         }
		});
	});

	
</script>