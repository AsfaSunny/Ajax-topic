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
		<table id="table_item" border='1' width='100%' cellspacing='0' cellpadding='10px'>
				<tr>
					<th>Id.</th>
					<th>Name</th>
				</tr>

		</table>
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
						if (R_data) {
							$("#pagination").remove();
            				$("#table_item").append(R_data);
						} else {
							$("#pagination tr td").html('Finished');
							$("#ajaxbtn").prop("disabled", true);
						}
					}
				});
			}
			LoadTable(); //call of the function


			$(document).on("click", "#ajaxbtn", function(){
		      $("#ajaxbtn").html("Loading...");
		      var pid = $(this).data("id");
		      LoadTable(pid);
		    });

		});
	</script>
</body>
</html>