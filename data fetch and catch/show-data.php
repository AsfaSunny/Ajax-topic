<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ajax in PHP</title>
</head>
<body>
	<h1>Php Ajax Data Fetching</h1>
	<div style="background-color: limegreen; padding: 5px;">
		<input type="button" id="load_button" value="Load Data">
	</div>

	<table id="table_data" style="width:100%" border='1' cellspacing='0' cellpadding='10px'>
		<tr>
			<th>Id.</th>
			<th>Name</th>
			<th>city</th>
		</tr>
	</table>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){

			$("#load_button").on("click", function(event){

				$.ajax({
					url: "ajax-load.php", 
					type: "POST", 
					success: function(R_data){
						$("#table_data").html(R_data);
					}
				});
			});

		});
	</script>
</body>
</html>