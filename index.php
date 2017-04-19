<!DOCTYPE html>
<html>
<head>
	<title>PHP Starter Application</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="style.css" />
   <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,minimum-scale=1,user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
   <script src="https://code.jquery.com/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="page-header">
  <h1>Welcome <small>Please enter below details</small></h1>
</div>
	<div class="container">
<div class="row">

  
   <div class="form-group">
    <label for="inputName3" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputName3" placeholder="Name" name="name">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
    </div>
  </div>
 <div class="form-group">
    <label for="inputNumber3" class="col-sm-2 control-label">Number</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputNumber3" placeholder="Number" name="number">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="button" id="register" class="btn btn-default">Let's Begin</button>
    </div>
  </div>

	</div>
	</div>
</body>

  <script type="text/javascript">
$(document).ready(function(){ 
  $("#register").click(function() {	  
var postForm = { //Fetch form data
            'name'     :  $('input[name=name]').val(),
			'email'     :  $('input[name=email]').val(),
			'number'     : $('input[name=number]').val(),
        };
	console.log(postForm);
 $.ajax({
    url: 'register.php',
    type: 'POST',
	dataType  : 'json',
    data: postForm,
    success: function (response) {		
        console.log(response);
    },
    error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
});
 
});	
}); 
</script>
</html>
