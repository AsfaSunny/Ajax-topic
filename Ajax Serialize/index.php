<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ajax Serialize</title>
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
	<h1>Php Ajax Serialize</h1>

	<div id="table_data" style="width:100%">
		<form action="" id="submit-form">
			<div class="form-field">
				<label for="">Name</label>
				<input type="text" name="fullname" id="fullname">
			</div>
			<div class="form-field">
				<label for="">Age</label>
				<input type="text" name="age" id="age">
			</div>
			<div class="form-field">
				<label for="">Gender</label>
				<input type="radio" name="gender" value="male">Male
				<input type="radio" name="gender" value="female">Female
			</div>
			<div class="form-field">
				<label for="">Country</label>
				<select name="country">
					<option value="ind">India</option>
					<option value="pk">Pakistan</option>
					<option value="Ban">Bangladesh</option>
				</select>
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
				var name = $("#fullname").val();
				var age = $("#age").val();

				if (name == "" || age == "" || !$('input:radio[name=gender]').is(":checked")) {
					$("#response").fadeIn();
					$("#response").removeClass('success-msg').addClass('error-msg').html('All Fileds are recquired');
				} else {
					$.ajax({
						url: "ajax-load.php",
						type: "POST",
						data: $('#submit-form').serialize(),

						beforesend: function(){
							$("#response").fadeIn();
							$("#response").removeClass('success-msg error-msg').addClass('process-msg').html('Processing........');
						},
						
						success: function(data){
							$('#submit-form').trigger('reset');
							$("#response").fadeIn();
							$("#response").removeClass('error-msg').addClass('success-msg').html(data);
							setTimeout(function(){
								$("#response").fadeOut('slow');
							}, 3000);
						}
					});
				}
			});
		});
	</script>
</body>
</html>