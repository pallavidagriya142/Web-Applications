<?php include 'index.php';?>

<style type="text/css">
	.fix_div{
	    margin-left: 231px;
        padding-left: 20px;
        margin-top: 20px; 
        padding-right: 50px;
	}

	input[type=text],input[type=file], select{
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}

input[type=text]:focus, input[type=file]:focus, select:focus {
    background-color: #ddd;
    outline: none;
}

input[type=text]:hover, input[type=file]:hover, select:hover {
    background-color: #ddd;
}

</style>

<div class="fix_div">
	

        <label>CITY-NAME</label> 
        <input type="text" name="city" id="city">
        <span id="cityError" style="color: Red; display: none">*Enter Valid City_name.</span></br>

         <label>GARDEN-NAME</label> 
        <input type="text" name="garden" id="garden">
        <span id="garError" style="color: Red; display: none">*Enter Valid Name.</span></br>
        

         <label>ADDRESS</label> 
        <input type="text" name="address" id="address">
        <span id="addError" style="color: Red; display: none">*Enter Valid Address.</span></br>

         <label>CONTECT-NO</label> 
        <input type="text" name="contect" id="contect">
        <span id="spnError" style="color: Red; display: none">*Enter Valid Contect-no.</span></br>

        <label>IMAGE</label>
        <input type="file" name=image id="upfile" required>
        <span id="imgError" style="color: Red;"></span></br>


        <button type="submit" class="btn btn-success" id="submit">Submit</button>
    </div>
</div>


<script type="text/javascript">
	$(document).ready(function(){
		$("#submit").click(function(){
			var isValid = false;
			var data = new FormData();

            data.append('filepath', $("#upfile").val());
            
            data.append('upfile', $("#upfile")[0].files[0]);

            data.append('city', $("#city").val());

            data.append('garden', $("#garden").val());

            data.append('address', $("#address").val());

            data.append('contect', $("#contect").val());
                    
           var regex = /^\d{10}$/;
           var char = /^[a-zA-Z]+$/;
           var add = /^[0-9a-zA-Z]+$/;
     

           if(isValid == regex.test($("#contect").val())){    
           	 $("#spnError").css("display", !isValid ? "block" : "none").fadeOut(3000);
               return isValid;
           }
           

           else if(isValid == add.test($("#address").val())){
           	$("#addError").css("display", !isValid ? "block" : "none").fadeOut(3000);
               return isValid;
           }

            else if($("#upfile").val() == ""){
           	document.getElementById("imgError").innerHTML = "*Enter Image.";
               
           }
          
           else if(isValid == char.test($("#city").val())){
           	$("#cityError").css("display", !isValid ? "block" : "none").fadeOut(3000);
               return isValid;
           }
           

           else if(isValid == add.test($("#garden").val())){
           	$("#garError").css("display", !isValid ? "block" : "none").fadeOut(3000);
               return isValid;
           }
          
            else{
             $.ajax({
            url: 'save_location.php',
            type: 'POST', 
            data : data,
            async:false,
            contentType: false,
            processData:false,
                                                                                
                  success: function (data) {
                alert(data);	
                }
          });
         }
		});
	});
</script>