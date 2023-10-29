<!-- <style>
/* Style for the warning message */
.warning-overlay {
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	display: flex;
	justify-content: center;
	align-items: center;
	z-index: 9999;
	pointer-events: none; /* Allow user interactions on elements behind the overlay */
}

.warning-message {
	color: white;
	font-size: 24px;
	text-align: center;
	padding: 10px;
	border: 2px solid #f0f0f0;
	background-color: #ff0000a1;
	border-radius: 3px;
}
</style>


<script>
	// Show warning message on right-click or context menu
	document.addEventListener("contextmenu", function (e) {
		e.preventDefault();
		showWarning();
	});

	// Show warning message on keyboard shortcut for developer tools
	document.addEventListener("keydown", function (e) {
		if (e.key === "F12" || (e.ctrlKey && (e.key === "Shift" || e.key === "I" || e.key === "J" || e.key === "C"))) {
			e.preventDefault();
			showWarning();
		}
	});

	// Function to show the warning overlay and message
	function showWarning() {
		const overlay = document.createElement("div");
		overlay.classList.add("warning-overlay");

		const message = document.createElement("div");
		message.classList.add("warning-message");
		message.textContent = "Oops!";

		overlay.appendChild(message);
		document.body.appendChild(overlay);

		setTimeout(function () {
			overlay.remove();
		}, 3000); // Remove the overlay after 3 seconds
	}
</script> -->







<!-- ============================  Navigation Start =========================== -->
<div class="navbar navbar-inverse-blue navbar">
    <!--<div class="navbar navbar-inverse-blue navbar-fixed-top">-->
	<div class="navbar-inner navbar-inner_1">
		<div class="container">

			<a class="brand" href="index.php"><img style="width: 175px" src="images/shosurbari-logo.png" alt="logo"></a>
			<div class="pull-right">
				<nav class="navbar nav_bottom" role="navigation">

					<!-- Brand and toggle get grouped for better mobile display -->

					<div class="navbar-header nav_2">
						<a class="navbar-brand" href="#">MENU</a>
						<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
							<span class="menu-text"></span>
							<div class="close-menu" onclick="myFunction(this)">
								<div class="bar1"></div>
								<div class="bar2"></div>
								<div class="bar3"></div>
							</div>
						</button>
					</div>

					<script>
					function myFunction(x) {
					x.classList.toggle("change");
					}
					</script>

					<script>
					$(document).ready(function(){
						$(".dropdown").hover(            
							function() {
								$('.dropdown-menu', this).stop( true, true ).slideDown("fast");
								$(this).toggleClass('open');        
							},
							function() {
								$('.dropdown-menu', this).stop( true, true ).slideUp("fast");
								$(this).toggleClass('open');       
							}
						);
					});
					</script>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
						<ul class="nav navbar-nav nav_1">
							<li><a href="index.php">Home</a></li>		    		
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Search<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="search.php">Search & Find Biodata</a></li>
									<li><a href="choice_list.php">Choice List</a></li>
									<li><a href="faq.php">FAQ's</a></li>
								</ul>
							</li>
							<li><a href="about.php">About</a></li>
							<li class="last"><a href="contact.php">Contacts</a></li>
							<li>
<?php
if (function_exists('isloggedin') && isloggedin()) {
    $id = $_SESSION['id'];
    $pic1 = "";

    // Getting image filenames from db
    $sql2 = "SELECT * FROM photos WHERE user_id = $id";
    $result2 = mysqlexec($sql2);
    if ($result2) {
        $row2 = mysqli_fetch_array($result2);
        if ($row2) {
            $pic1 = $row2['pic1'];
        }
    }

    // Check if পাত্রের বায়োডাটা exists in the database
    $sql = "SELECT biodatagender FROM 1bd_personal_physical WHERE user_id = $id";
    $result = mysqlexec($sql);
    $row = mysqli_fetch_assoc($result);

    // Define the default image
    $defaultImage = "shosurbari-default-icon.png";

    if ($row) {
        // Check the value of biodatagender to determine the image
        if ($row['biodatagender'] == 'পাত্রের বায়োডাটা') {
            $defaultImage = "shosurbari-male-icon.jpg";
        } elseif ($row['biodatagender'] == 'পাত্রীর বায়োডাটা') {
            $defaultImage = "shosurbari-female-icon.png";
        }
    }

    echo "<li class=\"login-navbar-img\"><a href=\"userhome.php?id=$id\">";
    if (!empty($pic1)) {
        echo "<img class=\"img-responsive\" src=\"profile/{$id}/{$pic1}\"/>";
    } else {
        echo "<img class=\"img-responsive\" src=\"images/$defaultImage\" />";
    }
    echo "</a></li>";

    echo "<li class=\"login-navbar-icon\"><a href=\"logout.php\"><i class=\"fa fa-sign-out\" ></i></a></li>";
} else {
    echo "<li><a href=\"login.php\">Login</a></li>";
    echo "<li><a href=\"register.php\">Register</a></li>";
}
?>

							</li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</nav>
				<div id="progress-bar"></div>
			</div> <!-- end pull-right -->
			<div class="clearfix"> </div>
		</div> <!-- end container -->
	</div> <!-- end navbar-inner -->
</div> <!-- end navbar-inverse-blue -->
<!-- ============================  Navigation End ============================ -->


<script>
	function updateProgressBar(){
  const {scrollTop, scrollHeight} = document.documentElement;
  const scrollPercent = scrollTop / (scrollHeight - window.innerHeight) * 100 + '%';
  document.querySelector('#progress-bar').style.setProperty('--progress', scrollPercent);
}

document.addEventListener('scroll', updateProgressBar);
</script>

