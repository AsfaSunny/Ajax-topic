<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ajax Pagination</title>
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
	</style>
</head>
<body>
	<h1>Php Ajax Pagination</h1>

	<div id="table_data" style="width:100%">
		
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){

//load table records
			function LoadTable(page_no){
				$.ajax({
					url: "ajax-load.php", 
					type: "POST", 
					data: {page_number: page_no},
					success: function(R_data){
						$("#table_data").html(R_data);
					}
				});
			}
			LoadTable(); //call of the function
		
		//pagination code
			$(document).on("click", "#pagination a", function(event){
				event.preventDefault();
				var page_id = $(this).attr("id");
				LoadTable(page_id);
			});
		});
	</script>
</body>
</html>