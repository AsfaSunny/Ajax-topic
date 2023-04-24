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

		.delete-btn{
			cursor: pointer;
			background: red;
			color: white;
			padding: 4px 10px;
		}

		.edit-btn{
			cursor: pointer;
			background: blue;
			color: white;
			padding: 4px 10px;
		}

		#modal{
			background: rgba(0, 0, 0, 0.7);
			position: fixed;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			z-index: 100;
			display: none;
		}

		#modal-form{
			background: #fff;
			width: 30%;
			position: relative;
			top: 20%;
			left: calc(50% - 15%);
			padding: 15px;
			border-radius: 4px;
		}

		#close-btn{
			background: red;
			color: white;
			width: 30px;
			height: 30px;
			line-height: 30px;
			text-align: center;
			border-radius: 50%;
			position: absolute;
			top: -15px;
			right: -15px;
			cursor: pointer;
		}

	</style>
</head>
<body>
	<h1>Php Ajax Data Fetching</h1>

	<div id="search-bar" style="background-color: springgreen; padding: 5px;">
		<label >Search Data: </label>
		<input type="text" id="search-box" autocomplete="off">
		<!-- <b id="search_data"></b> -->
	</div>

	<div id="table-form" style="background-color: limegreen; padding: 5px;">
		<form id="adding_form">
			First Name: <input type="text" id="f_name" value=""> &nbsp;&nbsp;&nbsp;
			Last Name: <input type="text" id="l_name" value="">
			<input type="button" id="save_button" value="Save Data">
		</form>
	</div>

	<table id="table_data" style="width:100%" border='1' cellspacing='0' cellpadding='10px'>
		
	</table>

	<div id="success_message"></div>
	<div id="error_message"></div>

	<div id="modal">
		<div id="modal-form">
			<h3>Edit Form</h3>
			<table cellpadding="10">
				
			</table>
			<div id="close-btn">X</div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){

//load table records
			function LoadTable(event){
				$.ajax({
					url: "ajax-load.php", 
					type: "POST", 
					success: function(R_data){
						$("#table_data").html(R_data);
					}
				});
			}
			LoadTable(); //call of the function

//add or inserting new records in table
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
								$("#adding_form").trigger("reset");
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

//dynamic data button delete
			$(document).on('click', '.delete-btn', function(){
				if (confirm("Are you 100% sure that you want to delete this element?")) {
					var studentID = $(this).data('id');
					var element = this;

					$.ajax({
						url: 'ajax-delete.php',
						type: 'POST',
						data: {del_ID: studentID},
						success: function(data){
							if (data == 1) {
								$(element).closest("tr").fadeOut();
								$('#success_message').html('Element Deleted!!').slideDown();
								$('#error_message').slideUp();
							} else {
								$('#error_message').html('Delete failed!!').slideDown();
								$('#success_message').slideUp();
							}
						}
					});
				}
			});


// show modal box
			$(document).on('click', '.edit-btn', function(){
				$("#modal").show();
				var updateID = $(this).data('eid');

				$.ajax({
					url: "ajax-update.php",
					type: "POST",
					data: {id: updateID},
					success: function(data){
						$("#modal-form table").html(data);
					}
				});
			});

// hide modal box
			$('#close-btn').on('click', function(){
				$("#modal").hide();
			});

//save update form modal
      $(document).on("click", "#edit", function(){
        var stuId = $("#edit_id").val();
        var fname = $("#edit_fname").val();
        var lname = $("#edit_lname").val();

        $.ajax({
          url: "update-form.php",
          type : "POST",
          data : {id: stuId, first_name: fname, last_name: lname},
          success: function(data) {
            if(data == 1){
              $("#modal").hide();
              LoadTable();
            }
          }
        });
      });
      

//live search
			$('#search-box').on('keyup', function(){
				var search_term = $(this).val();

				$.ajax({
					url: "ajax-live-search.php",
					type: "POST",
					data: {search: search_term},
					success: function(returned_data) {
						$('#table_data').html(returned_data);
					}
				});
			});
		
		});
	</script>
</body>
</html>