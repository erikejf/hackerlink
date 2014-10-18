<?php
include('include/db_class.php');
$dbObject = new DBConnect();
$dbConLink = $dbObject->conn;

	if(isset($_POST['name']) && $_POST['name']!="") {
		
	if(isset($_FILES) && $_FILES['pic']['name'] !="")
	{
		$f_type= $_FILES['pic']['type'];
		if($f_type== "image/gif" OR $f_type== "image/png" OR $f_type== "image/jpeg" OR $f_type== "image/JPEG" OR $f_type== "image/PNG" OR $f_type== "image/GIF"){
			$uploaddir = 'upload/';//<----This is all I changed
			$newfilename= time().basename($_FILES['pic']['name']);
			$uploadfile = $uploaddir.$newfilename ;
			if (move_uploaded_file($_FILES['pic']['tmp_name'], $uploadfile)) {
					
					$sql="insert into users (`name`,`link`,`email`,`pass`,`pic`,`bio`,`status`,`created_on`) VALUES ('".$_POST['name']."', '".$_POST['weblink']."', '', '','".$newfilename."','".$_POST['bio']."',1,'".date('y-m-d h:i:s')."')";
					$numrows = $dbObject->Insert($sql);
					header("Location:index.php");
			} else {
				header("Location:register.php?error=1");
			}
		}else{
			header('Location:register.php?error=2');
		}
	}	
		
		
   
}


?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Welcome to Intern for a Day</title>

    <!-- Bootstrap 3.1.1 Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/global.css" rel="stylesheet">

    <!-- Custom Fonts -->
<link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
  
</head>

<body id="page-top" class="index">

    <?php include('include/header.php'); ?>
	<!-- Header -->
    

    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Register a Member</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9 text-center col-xs-offset-2">
                    <form class="form-horizontal" action="#" name="form1" id="form1" method="post" enctype="multipart/form-data">
            <div class="control-group">
               
              <div class="control-group">
                <label class="control-label" for="firstName">Your Name:</label>
                <div class="controls">
                  <input class="textbox" type="text" id="Name" placeholder="Your Name" name="name" required="required">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="lastName">Hackathons:</label>
                <div class="controls">
                  <input class="textbox" type="url" id="weblink" placeholder="Hackathons" name="weblink" required="required">
                </div>
              </div>
             
              
              <div class="control-group">
                <label class="control-label" for="bio">Bio:</label>
                <div class="controls">
				<textarea name="bio" id="bio" required="required" class="textarea"></textarea>
                </div>
              </div>
			  <div class="control-group">
                <label class="control-label" for="confirmPassword">Upload Profile Pic:</label>
                <div class="controls">
                  <a class="file-input-wrapper btn btn-default "><span>Browse</span>
  <input type="file" data-filename-placement="inside" name="pic" required="required">
  </a>
                </div>
              </div>
			  
            </div>            
            <div class="control-group form-actions">
              <button type="submit" class="btn btn-primary" style=" margin-left:-80px;">Register</button>
              <button type="reset" class="btn btn-reset">Reset</button>
            </div>
          </form>
                     
                </div>
            
        </div>
        </div>
    </section>

    <!-- Footer -->
	<?php include('include/footer.php'); ?>
    