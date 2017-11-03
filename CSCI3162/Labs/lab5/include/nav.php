<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php">RESTFULDB</a>
		</div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="index.php">Home</a></li>
				<li><a href="docu.php">DOCUMENTATION</a></li> 
				<li><a href="dabview.php">DATABASE VIEW</a></li> 
				<li><a href="profile.php">MY ACCOUNT</a></li> 
			</ul>
			<?php if(isset($_SESSION['name'])){ ?>
				<p class="nav navbar-text navbar-right">
					Signed in as <?php echo $_SESSION['name'] ?>
				</p>
			<?php } ?>
	</div>
</nav>