<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ajax in PHP</title>
	<style>
		#success_message {
			background: #def1d8;
			color: green;
			padding: 10px;
			margin: 10px;
			display: none;
			position: absolute;
			right: 15px;
			top: 15px;
		}

		#error_message {
			background: #efdcdd;
			color: red;
			padding: 10px;
			margin: 10px;
			display: none;
			position: absolute;
			right: 15px;
			top: 15px;
		}
	</style>
</head>
<body>
	<h1>Php Ajax Data Fetching</h1>
	<div id="table-form" style="background-color: limegreen; padding: 5px;">
		<form id="adding_form">
			First Name: <input type="text" id="f_name" value=""> &nbsp;&nbsp;&nbsp;
			Last Name: <input type="text" id="l_name" value="">
			<input type="button" id="save_button" value="Save Data">
		</form>
	</div>

	<table id="table_data" style="width:100%" border='1' cellspacing='0' cellpadding='10px'>
		<tr>
			<th>Id.</th>
			<th>First Name</th>
			<th>Last Name</th>
		</tr>
	</table>

	<div id="success_message"></div>
	<div id="error_message"></div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){

			function LoadTable(event){
				$.ajax({
					url: "ajax-load.php", 
					type: "POST", 
					success: function(R_data){
						$("#table_data").html(R_data);
					}
				});
			}
			LoadTable();

			$('#save_button').on('click', function(events){
				events.preventDefault();
				var firstname = $("#f_name").val();
				var lastname = $("#l_name").val();

				if (firstname == "" || lastname == "") {
					$('#error_message').html('All Fields Are Required!!').slideDown();
					$('#success_message').slideUp();
				} else {
					$.ajax({
					url: "ajax-insert.php", 
					type: "POST", 
					data: {first_name: firstname, last_name: lastname},
					success: function(Result){
							if (Result == 1) {
								LoadTable();
								$('#success_message').html('Data Inserted Successfully!!').slideDown();
								$('#error_message').slideUp();
							} else {
								$('#error_message').html('Can not be saved!!').slideDown();
								$('#success_message').slideUp();
							}
						}	
					});

				}

				
			});

		});
	</script>
</body>
</html>