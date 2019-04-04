<?php 

if(session_status() == PHP_SESSION_NONE)
{
	session_start();
}
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
      	</a>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="index.php"><span class="glyphicon glyphicon-backward"></span> Back To Home</a></li>
    </ul>
  </div>
</nav>


<div class="container-fluid">
  <div class="col-md-3"></div>
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-body">
       <h2>
        <center>CONTACT US</center>
       </h2>
       <br />
       <div class="container-fluid">
       <form  class="form-horizontal" role="form" id="form-con">
            <div class="form-group">
              <label for="">Enter Full Name:</label>
              <input type="text" id="name" class="form-control" placeholder="Enter Name" autofocus="" required="" autocomplete="off">
              <br>
              <label for="">Enter Email ID:</label>
              <input type="text"  id="email" class="form-control" placeholder="Enter Email" required="" autocomplete="off">
               <br>
              <label for="">Enter Phone NO.:</label>
              <input type="Number" id="phone" class="form-control" placeholder="Enter Contact" required="" autocomplete="off">
              <br>
              <label for="">Enter Your Suggestion</label>
              <textarea class="form-control"  id="message" placeholder="Your Comment..." required=""></textarea>
            </div>
            <center>
             <button type="submit" class="btn btn-success">SUBMIT
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
  $(document).on('submit', '#form-con', function(event) {
    event.preventDefault();
    var name = $('#name').val();
    var email = $('#email').val();
    var phone = $('#phone').val();
    var message = $('#message').val();

     if(phone.length != 10)
     {
      alert('Please enter correct phone number');
     }
     else
     {
      $.ajax({
          url: 'data/contactdata.php',
          type: 'post',
          dataType: 'json',
          data: {
            name : name,
            email : email,
            phone : phone,
            message : message
          },
          success: function (data) {
            
            if(data.valid == true){
              window.location = data.url;
            }
          },
          error: function(){
          }
    });
    alert('Thanks For Giving Us Feedback');
    }  
  });

</script>



</body>
</html>


<?php
 ?>