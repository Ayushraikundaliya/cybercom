
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="Skin/Admin/css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

	<div class="header">
		<div class="ticker">
			<ul>
				<li>HELLO WORLD!</li>
				<li>HELLO GIRL!</li>
				<li>HELLO BOY!</li>
				<li>HELLO WOMEN!</li>
				<li>HELLO MAN!</li>
			</ul>
		</div>

		<h1><a href="#">A Small Store</a></h1>
		<div class="header-right">
			<a href="<?php echo $this->getUrl('grid','product',null,true); ?>"><i class="fa fa-shopping-bag"></i>Product</a>
			<a href="<?php echo $this->getUrl('grid','category',null,true); ?>"><i class="fa fa-server"></i>Category</a>
			<a href="<?php echo $this->getUrl('grid','customer',null,true); ?>"><i class="fa fa-address-book-o"></i>Customer</a>
			<a href="<?php echo $this->getUrl('grid','shipping',null,true); ?>"><i class="fa fa-shopping-bag"></i>Shipping</a>
			<a href="<?php echo $this->getUrl('grid','payment',null,true); ?>"><i class="fa fa-credit-card"></i>Payment</a>
			<a href="<?php echo $this->getUrl('grid','cms',null,true); ?>">Cms</a>

		</div>
	</div>

</body>
</html>