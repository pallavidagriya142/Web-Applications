<?php include 'header.php'?>

<style>
   .main_divs{
           margin-top: 8%;
          padding-left: 20%;
   }

    .sidenav {
        height: 86%;
        width: 220px;
        position: absolute;
        z-index: 1;
        top: 83px;
        left: 0;
        background-color: green;
        overflow-x: hidden;
        padding-top: 20px;
    }

   .sidenav a {
        padding: 6px 8px 6px 16px;
	    text-decoration: none;
	    font-size: 25px;
	    color: #f1f1f1;
	    display: block;
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
        <a href="show.php">Search plants</a>
         <a href="order.php">My Order</a>
        <a href="logout.php">LogOut</a>

    </div> 

<div class="main_divs">
<p>rrrrrrr</p>
</div>
</div>
<?php include 'footer.php';?>