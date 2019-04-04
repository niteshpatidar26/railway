<?php 

if(session_status() == PHP_SESSION_NONE)
{
	session_start();
}

if(isset($_SESSION['tracker'])){
?>

<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>TICKET RESERVATION</title>

		
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.min.css">

	</head>
<body style="background-color: lightblue;">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Online Ticketing</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active">
      	<a href="#">Rerservation
      	<span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span>
      	</a>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="index.php"><span class="glyphicon glyphicon-backward"></span> Back To Home</a></li>
    </ul>
  </div>
</nav>


<div class="container-fluid">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<div class="panel panel-danger">
			<div class="panel-heading">
				<h3 class="panel-title">STEPS FOR BOOKING</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-3">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">1. ITINERARY
								</h3>
							</div>
							<div class="panel-body">
								SCHEDULE OF TRAVEL
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="panel panel-info">
							<div class="panel-heading">
								<h3 class="panel-title">2. ACCOMODATION
								</h3>
							</div>
							<div class="panel-body">
								ACCOMODATION TYPE
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="panel panel-success">
							<div class="panel-heading">
								<h3 class="panel-title">3. PASSENGER INFO
								</h3>
							</div>
							<div class="panel-body">
								PASSENGER DETAILS
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="panel panel-warning">
							<div class="panel-heading">
								<h3 class="panel-title">4. PAYMENT INFO
									<span class="glyphicon glyphicon-saved" aria-hidden="true"></span>
								</h3>
							</div>
							<div class="panel-body">
								TOTAL PAYMENT
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-1"></div>
</div>

<div class="container-fluid">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-body">
			 <h2>
			 	<center>PAYMENT INFO</center>
			 </h2>
			 <br />
			 <div class="container-fluid">
			 <form role="form" id="form-pay">
					  <div class="form-group">
					    <label for="">Debit Card Number:</label>
					    <input type="Number" id="debno" class="form-control" placeholder="Enter Name"
					    autofocus="" required="" autocomplete="off">
					    <br>
					    <label for="">Enter Your 4 Digit Pin:</label>
					    <input type="Number" id="pin" class="form-control" placeholder="Enter Contact" required="" autocomplete="off">
					  </div>
					  <center>
					   <button type="submit" class="btn btn-success">Proceed
					  <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
					  </button>
					  </center>
					</form>
					<br />
			</div>
				
			</div>
		</div>
	</div>
	<div class="col-md-3"></div>
</div>

<script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>


<script type="text/javascript">
  $(document).on('submit', '#form-pay', function(event) {
    event.preventDefault();
    var debno = $('#debno').val();
    var pin = $('#pin').val();
     $.ajax({
          url: 'data/paydata.php',
          type: 'post',
          dataType: 'json',
          data: {
            debno : debno,
            pin : pin
          },
          success: function (data) {
            
            if(data.valid == true){
              window.location = data.url;
            }
          },
          error: function(){
          }
    });
    alert('PAYMENT DONE SUCCESSFULLY');  
  });

</script>

</body>
</html>
<?php
}else{
	echo '<strong>';
	echo 'Page Not Exist';
	echo '</strong>';
}
 ?>