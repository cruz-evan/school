<?php 
	session_start();
	require_once('include/config.php');
	if(!isset($_SESSION['name']))
	{
		$_SESSION['HTTP_USER_AGENT']=$_SERVER['HTTP_USER_AGENT'];
	}
	else
	{
		if($_SESSION['HTTP_USER_AGENT']!=$_SERVER['HTTP_USER_AGENT'])
		{
			session_destroy();
			header('Location: index.php?logNotice=Session has been comprimised, Re-Log');
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
			<meta charset="utf-8">
			<meta name="author" content="Evan Cruz">
			<meta name="description" content="Lab5- document page">

			<title>Lab 5 Documentation</title>

			<link rel="stylesheet" href="css/bootstrap.min.css">
			<link rel="stylesheet" href="css/basic.css">
			<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script> 
			<script type="text/javascript" src="js/bootstrap.min.js"></script>
			
    </head>
    <body>
	    <div class="container">
			<h1 class="text-center">Documentation</h1>
			<?php include('include/nav.php'); ?>
			<button type = "button" class = "btn btn-primary" data-toggle = "collapse" data-target = "#sidebar">
			   LINKS
			</button>
			<div class="row row-offcanvas row-offcanvas-right">
					<div class="col-xs-6 col-sm-3 sidebar-offcanvas">
						<div class="list-group" id="sidebar">
						  <a href="#fitem" class="list-group-item">First link</a>
						  <a href="#sitem" class="list-group-item">Second link</a>
						  <a href="#titem" class="list-group-item">Third link</a>
						  <a href="#foitem" class="list-group-item">Fourth link</a>
						  <a href="#litem" class="list-group-item">Fith link</a>
						</div>
					</div>
				<div class="col-xs-12 col-sm-8">
					<h2 id="fitem">
						ITEM 1
					</h2>
					<p>
						
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. In lectus nibh, euismod sit amet ultricies nec, vestibulum eget sapien. Mauris placerat vestibulum mi ut cursus. Proin ut diam arcu. Ut dictum felis at ligula maximus, eu aliquet enim aliquet. Donec dapibus est et venenatis posuere. Praesent diam metus, fermentum et hendrerit a, tempor id lacus. Quisque interdum turpis turpis, quis imperdiet quam aliquet at. Ut a tristique velit, sit amet laoreet metus. In hac habitasse platea dictumst. Nam laoreet mi eget rutrum sollicitudin. Fusce ut sem turpis. Nulla mollis orci massa, vel cursus orci sodales eu. Maecenas in iaculis tortor. Duis faucibus neque et elit hendrerit auctor. Fusce accumsan, metus a semper malesuada, lacus leo molestie est, ut imperdiet ex odio at libero. Nullam at pellentesque lectus, eget sollicitudin sapien.

					Nulla id ultrices dolor, sit amet rhoncus tellus. Nam lobortis eget sapien ac aliquam. Nam sed urna rutrum, eleifend diam a, condimentum elit. Ut bibendum gravida velit non ullamcorper. Praesent hendrerit vitae neque sed ullamcorper. Sed molestie risus sit amet justo pretium, in varius ante porttitor. Integer finibus enim ac posuere hendrerit. Nunc rhoncus maximus dolor, ut scelerisque turpis ultricies a. Donec tincidunt mi ut tincidunt aliquet. Etiam cursus vitae erat et efficitur. Quisque vehicula ornare pulvinar. Aliquam ac ex tincidunt, vulputate est at, blandit sapien. Morbi nec ultricies quam. Morbi id mollis augue. Sed non tortor pellentesque, suscipit magna ac, porttitor felis. Sed finibus lectus sit amet sem efficitur, et rhoncus magna tincidunt.
					</p>
					<h2 id="sitem">
						ITEM 2
					</h2>
					<p>
						
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. In lectus nibh, euismod sit amet ultricies nec, vestibulum eget sapien. Mauris placerat vestibulum mi ut cursus. Proin ut diam arcu. Ut dictum felis at ligula maximus, eu aliquet enim aliquet. Donec dapibus est et venenatis posuere. Praesent diam metus, fermentum et hendrerit a, tempor id lacus. Quisque interdum turpis turpis, quis imperdiet quam aliquet at. Ut a tristique velit, sit amet laoreet metus. In hac habitasse platea dictumst. Nam laoreet mi eget rutrum sollicitudin. Fusce ut sem turpis. Nulla mollis orci massa, vel cursus orci sodales eu. Maecenas in iaculis tortor. Duis faucibus neque et elit hendrerit auctor. Fusce accumsan, metus a semper malesuada, lacus leo molestie est, ut imperdiet ex odio at libero. Nullam at pellentesque lectus, eget sollicitudin sapien.

					Nulla id ultrices dolor, sit amet rhoncus tellus. Nam lobortis eget sapien ac aliquam. Nam sed urna rutrum, eleifend diam a, condimentum elit. Ut bibendum gravida velit non ullamcorper. Praesent hendrerit vitae neque sed ullamcorper. Sed molestie risus sit amet justo pretium, in varius ante porttitor. Integer finibus enim ac posuere hendrerit. Nunc rhoncus maximus dolor, ut scelerisque turpis ultricies a. Donec tincidunt mi ut tincidunt aliquet. Etiam cursus vitae erat et efficitur. Quisque vehicula ornare pulvinar. Aliquam ac ex tincidunt, vulputate est at, blandit sapien. Morbi nec ultricies quam. Morbi id mollis augue. Sed non tortor pellentesque, suscipit magna ac, porttitor felis. Sed finibus lectus sit amet sem efficitur, et rhoncus magna tincidunt.
					</p>
					<h2 id="titem">
						ITEM 3
					</h2>
					<p>
						
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. In lectus nibh, euismod sit amet ultricies nec, vestibulum eget sapien. Mauris placerat vestibulum mi ut cursus. Proin ut diam arcu. Ut dictum felis at ligula maximus, eu aliquet enim aliquet. Donec dapibus est et venenatis posuere. Praesent diam metus, fermentum et hendrerit a, tempor id lacus. Quisque interdum turpis turpis, quis imperdiet quam aliquet at. Ut a tristique velit, sit amet laoreet metus. In hac habitasse platea dictumst. Nam laoreet mi eget rutrum sollicitudin. Fusce ut sem turpis. Nulla mollis orci massa, vel cursus orci sodales eu. Maecenas in iaculis tortor. Duis faucibus neque et elit hendrerit auctor. Fusce accumsan, metus a semper malesuada, lacus leo molestie est, ut imperdiet ex odio at libero. Nullam at pellentesque lectus, eget sollicitudin sapien.

					Nulla id ultrices dolor, sit amet rhoncus tellus. Nam lobortis eget sapien ac aliquam. Nam sed urna rutrum, eleifend diam a, condimentum elit. Ut bibendum gravida velit non ullamcorper. Praesent hendrerit vitae neque sed ullamcorper. Sed molestie risus sit amet justo pretium, in varius ante porttitor. Integer finibus enim ac posuere hendrerit. Nunc rhoncus maximus dolor, ut scelerisque turpis ultricies a. Donec tincidunt mi ut tincidunt aliquet. Etiam cursus vitae erat et efficitur. Quisque vehicula ornare pulvinar. Aliquam ac ex tincidunt, vulputate est at, blandit sapien. Morbi nec ultricies quam. Morbi id mollis augue. Sed non tortor pellentesque, suscipit magna ac, porttitor felis. Sed finibus lectus sit amet sem efficitur, et rhoncus magna tincidunt.
					</p>
					<h2 id="foitem">
						ITEM 4
					</h2>
					<p>
						
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. In lectus nibh, euismod sit amet ultricies nec, vestibulum eget sapien. Mauris placerat vestibulum mi ut cursus. Proin ut diam arcu. Ut dictum felis at ligula maximus, eu aliquet enim aliquet. Donec dapibus est et venenatis posuere. Praesent diam metus, fermentum et hendrerit a, tempor id lacus. Quisque interdum turpis turpis, quis imperdiet quam aliquet at. Ut a tristique velit, sit amet laoreet metus. In hac habitasse platea dictumst. Nam laoreet mi eget rutrum sollicitudin. Fusce ut sem turpis. Nulla mollis orci massa, vel cursus orci sodales eu. Maecenas in iaculis tortor. Duis faucibus neque et elit hendrerit auctor. Fusce accumsan, metus a semper malesuada, lacus leo molestie est, ut imperdiet ex odio at libero. Nullam at pellentesque lectus, eget sollicitudin sapien.

					Nulla id ultrices dolor, sit amet rhoncus tellus. Nam lobortis eget sapien ac aliquam. Nam sed urna rutrum, eleifend diam a, condimentum elit. Ut bibendum gravida velit non ullamcorper. Praesent hendrerit vitae neque sed ullamcorper. Sed molestie risus sit amet justo pretium, in varius ante porttitor. Integer finibus enim ac posuere hendrerit. Nunc rhoncus maximus dolor, ut scelerisque turpis ultricies a. Donec tincidunt mi ut tincidunt aliquet. Etiam cursus vitae erat et efficitur. Quisque vehicula ornare pulvinar. Aliquam ac ex tincidunt, vulputate est at, blandit sapien. Morbi nec ultricies quam. Morbi id mollis augue. Sed non tortor pellentesque, suscipit magna ac, porttitor felis. Sed finibus lectus sit amet sem efficitur, et rhoncus magna tincidunt.
					</p>
					<h2 id="litem">
						ITEM 5
					</h2>
					<p>
						
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. In lectus nibh, euismod sit amet ultricies nec, vestibulum eget sapien. Mauris placerat vestibulum mi ut cursus. Proin ut diam arcu. Ut dictum felis at ligula maximus, eu aliquet enim aliquet. Donec dapibus est et venenatis posuere. Praesent diam metus, fermentum et hendrerit a, tempor id lacus. Quisque interdum turpis turpis, quis imperdiet quam aliquet at. Ut a tristique velit, sit amet laoreet metus. In hac habitasse platea dictumst. Nam laoreet mi eget rutrum sollicitudin. Fusce ut sem turpis. Nulla mollis orci massa, vel cursus orci sodales eu. Maecenas in iaculis tortor. Duis faucibus neque et elit hendrerit auctor. Fusce accumsan, metus a semper malesuada, lacus leo molestie est, ut imperdiet ex odio at libero. Nullam at pellentesque lectus, eget sollicitudin sapien.

					Nulla id ultrices dolor, sit amet rhoncus tellus. Nam lobortis eget sapien ac aliquam. Nam sed urna rutrum, eleifend diam a, condimentum elit. Ut bibendum gravida velit non ullamcorper. Praesent hendrerit vitae neque sed ullamcorper. Sed molestie risus sit amet justo pretium, in varius ante porttitor. Integer finibus enim ac posuere hendrerit. Nunc rhoncus maximus dolor, ut scelerisque turpis ultricies a. Donec tincidunt mi ut tincidunt aliquet. Etiam cursus vitae erat et efficitur. Quisque vehicula ornare pulvinar. Aliquam ac ex tincidunt, vulputate est at, blandit sapien. Morbi nec ultricies quam. Morbi id mollis augue. Sed non tortor pellentesque, suscipit magna ac, porttitor felis. Sed finibus lectus sit amet sem efficitur, et rhoncus magna tincidunt.
					</p>
				</div>
			</div>
		</div>
		<?php include ('include/footer.inc.php'); ?>
    </body>
</html>