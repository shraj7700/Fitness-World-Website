<?php
session_start();
if(!isset($_SESSION['uname']))
{
	echo "<script>window.location='index.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  
    <meta charset="utf-8">
    <title>Fitness-World | Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Muhammad Usman">

    <!-- The styles -->
    <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">

    <link href="css/charisma-app.css" rel="stylesheet">
    <link href='bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='css/jquery.noty.css' rel='stylesheet'>
    <link href='css/noty_theme_default.css' rel='stylesheet'>
    <link href='css/elfinder.min.css' rel='stylesheet'>
    <link href='css/elfinder.theme.css' rel='stylesheet'>
    <link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='css/uploadify.css' rel='stylesheet'>
    <link href='css/animate.min.css' rel='stylesheet'>

    <!-- jQuery -->
    <script src="bower_components/jquery/jquery.min.js"></script>

    <link rel="shortcut icon" href="img/favicon.ico">

</head>

<body>
   <?php include"header.php";?>

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
                <div>
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Trainer</a>
            </li>
        </ul>
    </div>

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> View Trainer</h2>

        <div class="box-icon">
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
        </div>
    </div>
    <div class="box-content">
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
	<?php
include('connect.php');
$q="SELECT * from trainer where ID='".$_GET['id']."'";
$run=mysql_query($q) or die(mysql_error());
while($row = mysql_fetch_assoc( $run ))
{
	$id=$row['ID'];
	$name=$row['name'];
	$email=$row['email'];
	$address=$row['address'];
	$gender=$row['gender'];
	$dob=$row['dob'];
	$age=$row['age'];
	$contact=$row['contact'];
	$package_id=$row['class_ID'];
	$degree=$row['degree'];
	$package_type_id=$row['class_type_ID'];
	$doj=$row['doj'];
	$image=$row['image'];
	$result1 = mysql_query("SELECT * FROM package WHERE ID=$package_id")or die(mysql_error());
				$row1 = mysql_fetch_array($result1);
				if($row1)
				{				
					$package=$row1['class'];
					$result2 = mysql_query("SELECT * FROM package_type WHERE ID=$package_type_id")or die(mysql_error());
					$row2 = mysql_fetch_array($result2);
					if($row2)
					{				
						$package_type=$row2['class_type'];
						?>	 
							<tr>
								<th>Name</th>
								<td><?php echo $name; ?></td>
							</tr>
							<tr>	
								<th>Address</th>
								<td><?php echo $address;?></td>
							</tr>
							<tr>
								<th>Gender</th>
								<td><?php echo $gender;?></td>
							</tr>
							<tr>
								 <th>Date-of-Birth</th>
								 <td><?php echo $dob;?></td>
							</tr>
							<tr>
								 <th>Age</th>
								 <td><?php echo $age;?></td>
							</tr>
							<tr>
								 <th>Eamil-Id</th>
								 <td><?php echo $email; ?></td>
								</tr>
							<tr>
								 <th>Contact-No</th>
								 <td><?php echo $contact;?></td>
							</tr>
							<tr>
								 <th>Date-Of-Joining</th>
								 <td><?php echo $doj;?></td>
							</tr>
							<tr>
								 <th>Degree</th>
								 <td><?php echo $degree;?></td>
							</tr>
							<tr>
								 <th>Package Month Duration</th>
								 <td><?php echo $package;?></td>
							</tr>
							<tr>
								 <th>Package-Type</th>
								 <td><?php echo $package_type;?></td>
							</tr>
							<tr>
								 <th>Image</th>
								 <td><img src="trainer/<?php echo $image;?>" height="100px" width="100px"/></td>
							</tr>
			  <?php }
			}
}?>   
    </tbody>
    </table>
	<form name="frm" method="post" action="manage_trainer.php">
					  <div class="form-actions">
							<button type="submit" name="back" class="btn btn-primary">BACK</button>
					   </div>          
					   </form>
    </div>
    </div>
    </div>
    <!--/span-->
    </div><!--/row-->
    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->
    <hr>
  <?php include"footer.php"; ?>
</div><!--/.fluid-container-->
<!-- external javascript -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- library for cookie management -->
<script src="js/jquery.cookie.js"></script>
<!-- calender plugin -->
<script src='bower_components/moment/min/moment.min.js'></script>
<script src='bower_components/fullcalendar/dist/fullcalendar.min.js'></script>
<!-- data table plugin -->
<script src='js/jquery.dataTables.min.js'></script>

<!-- select or dropdown enhancer -->
<script src="bower_components/chosen/chosen.jquery.min.js"></script>
<!-- plugin for gallery image view -->
<script src="bower_components/colorbox/jquery.colorbox-min.js"></script>
<!-- notification plugin -->
<script src="js/jquery.noty.js"></script>
<!-- library for making tables responsive -->
<script src="bower_components/responsive-tables/responsive-tables.js"></script>
<!-- tour plugin -->
<script src="bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
<!-- star rating plugin -->
<script src="js/jquery.raty.min.js"></script>
<!-- for iOS style toggle switch -->
<script src="js/jquery.iphone.toggle.js"></script>
<!-- autogrowing textarea plugin -->
<script src="js/jquery.autogrow-textarea.js"></script>
<!-- multiple file upload plugin -->
<script src="js/jquery.uploadify-3.1.min.js"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="js/jquery.history.js"></script>
<!-- application script for Charisma demo -->
<script src="js/charisma.js"></script>
</body>
</html>
