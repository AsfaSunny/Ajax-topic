<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ajax $.Get and $.Post Method</title>
	<style>
		#pagination{
  		text-align: center;
  		padding: 10px;
		}

		#pagination a{
		  background: #2980b9;
		  color: #fff;
		  text-decoration: none;
		  display: inline-block;
		  padding:5px 10px;
		  margin-right: 5px;
		  border-radius: 3px;
		}

		#pagination a.active{
		  background: orange;
		}

		.form-field{
			padding: 15px;
		}

		#response{
			width: 70%;
			margin: 15px auto;
			padding: 15px;
			border-radius: 5px;
		}

		.error-msg{
			background: #f2dedf;
			color: #9c4150;
			border: 1px solid #e7ced1;
		}

		.success-msg{
			background: #e0efda;
			color: #407a4a;
			border: 1px solid #e6dfb2;
		}

		.process-msg{
			background: #d9edf6;
			color: #377084;
			border: 1px solid #c8dce5;
		}
	</style>
</head>
<body>
	<h1>Php Ajax $.Get and $.Post Method</h1>

	<div id="table_data" style="width:100%">
		<form action="" id="submit-form">
			<div class="form-field">
				<label for="">First Name: </label>
				<input type="text" name="f_name" id="f_name">
			</div>
			<div class="form-field">
				<label for="">Last Name: </label>
				<input type="text" name="l_name" id="l_name">
			</div>

			<div class="form-field">
				<input type="button" name="submit" id="submit" value="submit">
			</div>
		</form>

		<div id="response"></div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#submit").click(function(){
				var firstname = $("#f_name").val();
				var lastname = $("#l_name").val();

				if (firstname == "" || lastname == "") {
					$("#response").fadeIn();
					$('#response').removeClass('success-msg').addClass('error-msg').html('All Field Must Required.');
				} else {
					$.post(
					"ajax-save.php",
					$('#submit-form').serialize(), // {first: firstname, last: lastname}
					function(data){
						if (data == 1) {
							$('#submit-form').trigger('reset');
							$("#response").fadeIn();
							$('#response').removeClass('error-msg').addClass('success-msg').html('Data Successfully Saved.');
							setTimeout(function(){
								$("#response").fadeOut('slow');
							}, 3000);
						}
					}
				);
				}


			});
		});
	</script>
</body>
</html>