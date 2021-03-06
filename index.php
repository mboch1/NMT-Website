<?php

	require_once('php/db.php');
	session_start();
?>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>NMT Project Main Page</title>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	<script src="jquery/clamp.js"></script>
	<script src="jquery/moment.min.js"></script>
    <!-- Bootstrap Date-Picker Plugin -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
	<link rel="stylesheet" href="css/style.css" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <?php include("template/header.php") ?>
    <!-- carousel section -->
    <div class="container" style="height: 200px;">
        <div class="row">
            <div class="col-2"></div>
            <div class="col">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img class="d-block w-100" style='height: 100%; width: 100%; object-fit: contain' src="http://eduncovered.com/wp-content/uploads/2014/01/aberdeen-skyline.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" style='height: 100%; width: 100%; object-fit: contain' src="http://open.glasgow.gov.uk/content/uploads/2013/08/Glasgow.png" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" style='height: 100%; width: 100%; object-fit: contain' src="https://c1.staticflickr.com/2/1203/1190479097_f2ed39e1e4_b.jpg" alt="Third slide">
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
    <!-- end of carousel section  -->
    <!-- middle section -->
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col">
                <div class="row">
                    <form class="form-inline" action="#" method="post">
                        <legend>Selection Filtering: </legend>
                        <div class="form-group filter-option">
                            <label for="city" class="filter-label">Choose Location: </label>
                            <select name="city" id="city" class="form-control input-sm filter-select">
								<option value="" selected>All Locations</option>
								<?php

									// Get venues from db
									$sql = "SELECT * FROM Venue ORDER BY city ASC";
									$res = mysqli_query($con, $sql);

									// Loop through venues
									while ($row = mysqli_fetch_assoc($res)) {

										// Display venue
										echo '<option value="' . $row["id"] . '">' . $row["city"] . '</option>';

									}

								 ?>
                            </select>
                        </div>
                        <div class="form-group filter-option">
                            <label for="course" class="filter-label">Choose Course: </label>
                            <select name="course" id="course" class="form-control input-sm filter-select">
								<option value="" selected>All Courses</option>
								<?php

									// Get venues from db
									$sql = "SELECT * FROM Category ORDER BY title ASC";
									$res = mysqli_query($con, $sql);

									// Loop through venues
									while ($row = mysqli_fetch_assoc($res)) {

										// Display venue
										echo '<option value="' . $row["id"] . '">' . $row["title"] . '</option>';

									}

								 ?>
                            </select>
                        </div>
                        <div class="form-group filter-option">
                            <label class="control-label filter-label" for="date">Date</label>
                            <input class="form-control" id="date" name="date" placeholder="DD/MM/YYY" type="text"/>
                        </div>
                        <button id="filterSubmit" type="button" name="filter" class="btn btn-default" style="margin-top: 18px;">Filter Results</button>
                    </form>
                </div>
            	<div id="courseDisplay" class="row"></div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>

	<div id="paymentModal" class="modal">
		<div class="modal-content">
			<div class="modal-header">
				<h2>Booking Payment</h2>
				<span class="close">&times;</span>
			</div>
			<div class="modal-body">
				<?php include("template/creditCard.html") ?>
				<div style="width: 100%; height: 20px; border-bottom: 1px solid black; text-align: center;">
					<span style="font-size: 30px; background-color: #ffffff; padding: 0 10px;">
						OR
					</span>
				</div>
				<br>
	            <br>
	            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
	                <input type="hidden" name="cmd" value="_xclick">
	                <input type="hidden" name="business" value="nmtcoursepayments@outlook.co.uk">
	                <input type="hidden" name="lc" value="GB">
	                <input type="hidden" name="item_name" value="NMT Course Payment">
	                <input type="hidden" name="amount" value="0.01">
	                <input type="hidden" name="currency_code" value="GBP">
	                <input type="hidden" name="button_subtype" value="services">
	                <input type="hidden" name="no_note" value="0">
	                <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
	                <input type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-medium.png" style="margin: 0 auto; display: block" border="0" name="submit" alt="PayPal – The safer, easier way to pay online!">
	                <img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
	            </form>
			</div>
		</div>
	</div>
    <!--  end of middle section -->
	<?php include("template/footer.php") ?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
	<script src="jquery/creditCard.js"></script>
    <script type="text/javascript">

		var currentlyBooking;
		var modal;

	    $(document).ready(function(){
			var date_input=$('input[name="date"]'); //our date input has the name "date"
			var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
			var options={
				format: 'dd/mm/yyyy',
				container: container,
				todayHighlight: true,
				autoclose: true,
			};
			date_input.datepicker(options);
			modal = document.getElementById('paymentModal');

	  		loadCourses();

			$("#filterSubmit").click(function() {
				loadCourses();
			});

			$(document).on('click', ".book-button", function() {

				currentlyBooking = $(this);
				currentlyBooking.attr("data-content", "Attempting to create booking...");

				$.ajax({
					url: "php/checkBooking.php",
					data: "course_id=" + currentlyBooking.attr("data-id")
				}).done(function(data) {
					if (data == "Success") {

						$('input[name="amount"]').val(currentlyBooking.attr("data-price"));

						modal.style.display = "block"
					} else if (data == "Overbooked") {
						currentlyBooking.attr("data-content", "This course is fully booked.")
						currentlyBooking.popover('show');
					} else {
						currentlyBooking.attr("data-content", "Booking was unsuccessful, please try again.");
						currentlyBooking.popover('show');
						console.log(data);
					}
				}).fail(function() {
					console.log("ajax check fail");
				})

				currentlyBooking.popover({
					trigger: 'focus'
				})

			});

			$(document).on("click", "#paySubmit", function() {

				modal.style.display = "none";

				currentlyBooking.attr("data-content", "Attempting to create booking...");
				currentlyBooking.popover('show');

				$.ajax({
					url: "php/setBooking.php",
					data: "course_id=" + currentlyBooking.attr("data-id")
				}).done(function(data) {
					if (data == "Success") {
						currentlyBooking.attr("data-content", "Booking was successfully made.");
					} else if (data == "Overbooked") {
						currentlyBooking.attr("data-content", "This course is fully booked.")
					} else {
						currentlyBooking.attr("data-content", "Booking was unsuccessful, please try again.");
						console.log(data);
					}
					currentlyBooking.popover('show');
					currentlyBooking.popover({
						trigger: 'focus'
					})
				}).fail(function() {
					console.log("ajax booking fail");
				})

			})

			$(".close").on("click", function() {
				$("#paymentModal").css("display", "none");
			})

			window.onclick = function(event) {
				if (event.target == modal) {
					modal.style.display = "none";
				}
			}

			$("body").on("click", function(e) {
				if ($(e.target).data('toggle') !== 'popover'
					&& $(e.target).parents('.popover.in').length === 0) {
						$('[data-toggle="popover"]').popover('hide');
					}
			})
	  	});

		function loadCourses() {

			var date = null;

			if ($("#date").datepicker('getDate') != null) {
				var momentDate = moment($("#date").datepicker('getDate'));
				momentDate = momentDate.format("X");
				date = momentDate.toString();
			}

			<?php

				if (isset($_SESSION['username']) != "") {
					echo '$("#courseDisplay").load("template/getEvents.php?" + $.param({
						loc: $("#city").val(),
						course: $("#course").val(),
						date: date,
						loggedIn: 1}), function() {
							clampCards();
						});';
				} else {
					echo '$("#courseDisplay").load("template/getEvents.php?" + $.param({
						loc: $("#city").val(),
						course: $("#course").val(),
						date: date,
						loggedIn: 0}), function() {
							clampCards();
						});';
				}

			?>


		}

		function clampCards() {
			var cards = $("#courseDisplay").find(".card-text");
			$.each(cards, function() {
				$clamp(this, {clamp: 5});
			});
		}

    </script>
</body>
</html>
