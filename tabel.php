
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
<title>LONDINIUM - premium responsive admin template by Eugene Kopyov</title>

<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/londinium-theme.css" rel="stylesheet" type="text/css">
<link href="css/styles.css" rel="stylesheet" type="text/css">
<link href="css/icons.css" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>

<script type="text/javascript" src="js/plugins/charts/sparkline.min.js"></script>

<script type="text/javascript" src="js/plugins/forms/uniform.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/select2.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/inputmask.js"></script>
<script type="text/javascript" src="js/plugins/forms/autosize.js"></script>
<script type="text/javascript" src="js/plugins/forms/inputlimit.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/listbox.js"></script>
<script type="text/javascript" src="js/plugins/forms/multiselect.js"></script>
<script type="text/javascript" src="js/plugins/forms/validate.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/tags.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/switch.min.js"></script>

<script type="text/javascript" src="js/plugins/forms/uploader/plupload.full.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/uploader/plupload.queue.min.js"></script>

<script type="text/javascript" src="js/plugins/forms/wysihtml5/wysihtml5.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/wysihtml5/toolbar.js"></script>

<script type="text/javascript" src="js/plugins/interface/daterangepicker.js"></script>
<script type="text/javascript" src="js/plugins/interface/fancybox.min.js"></script>
<script type="text/javascript" src="js/plugins/interface/moment.js"></script>
<script type="text/javascript" src="js/plugins/interface/jgrowl.min.js"></script>
<script type="text/javascript" src="js/plugins/interface/datatables.min.js"></script>
<script type="text/javascript" src="js/plugins/interface/colorpicker.js"></script>
<script type="text/javascript" src="js/plugins/interface/fullcalendar.min.js"></script>
<script type="text/javascript" src="js/plugins/interface/timepicker.min.js"></script>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/application.js"></script>

</head>

<body class="full-width">

	<!-- Navbar -->
	<div class="navbar navbar-inverse" role="navigation">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-icons">
				<span class="sr-only">Toggle right icons</span>
				<i class="icon-grid"></i>
			</button>
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
				<span class="sr-only">Toggle menu</span>
				<i class="icon-paragraph-justify2"></i>
			</button>
			<a class="navbar-brand" href="#"><img src="images/logo.png" alt="LONDINIUM"></a>
		</div>

		<ul class="nav navbar-nav collapse" id="navbar-menu">
			<li><a href="#"><i class="icon-screen2"></i> <span>Dashboard</span></a></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-paragraph-justify2"></i> <span>Forms</span> <b class="caret"></b></a>
				<ul class="dropdown-menu dropdown-menu-right">
					<li><a href="form_components.html">Form components</a></li>
					<li><a href="form_layouts.html">Form layouts</a></li>
					<li><a href="form_grid.html">Inputs grid</a></li>
					<li><a href="wysiwyg.html">WYSIWYG editor</a></li>
					<li><a href="validation.html">Validation</a></li>
					<li><a href="file_uploader.html">Multiple file uploader</a></li>
					<li><a href="form_snippets.html">Form snippets</a></li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-grid"></i> <span>Components</span> <b class="caret"></b></a>
				<ul class="dropdown-menu dropdown-menu-right">
					<li><a href="visuals.html">Visuals &amp; notifications</a></li>
					<li><a href="navs.html">Navs</a></li>
					<li><a href="panel_options.html">Panel options</a></li>
					<li><a href="navbars.html">Navbars</a></li>
					<li><a href="info_blocks.html">Info blocks</a></li>
					<li><a href="icons.html">Icons <span class="label label-danger">850+</span></a></li>
					<li><a href="buttons.html">Buttons</a></li>
					<li><a href="calendar.html">Calendar</a></li>
					<li><a href="typography.html">Typography</a></li>
					<li><a href="gallery.html">Media gallery</a></li>
					<li><a href="header_elements.html">Page header elements</a></li>
					<li><a href="content_grid.html">Content grid</a></li>
				</ul>
			</li>
			<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-copy"></i> <span>Layouts</span>  <b class="caret"></b></a>
					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="sidebar_wide_left.html">Left wide sidebar</a></li>
						<li><a href="sidebar_wide_right.html">Right wide sidebar</a></li>
						<li><a href="sidebar_narrow_left.html">Left narrow sidebar</a></li>
						<li><a href="sidebar_narrow_right.html">Right narrow sidebar</a></li>
						<li><a href="sidebar_icons_left.html">Left aligned icons</a></li>
						<li><a href="sidebar_collapsed.html">Collapsed sidebar</a></li>
						<li><a href="layout_fixed_navbar.html">Fixed navbar</a></li>
						<li class="active"><a href="horizontal_navigation.html">Horizontal navigation</a></li>
						<li><a href="horizontal_sidebar.html">Sidebar &amp; Horizontal navigation</a></li>
						<li><a href="navigation_disabled_items.html">Disabled navigation items</a></li>
					</ul>
			</li>
		</ul>

		<ul class="nav navbar-nav navbar-right collapse" id="navbar-icons">
			<li class="user dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">
					<img src="images/demo/users/face1.png" alt="">
					<span>Eugene Kopyov</span>
					<i class="caret"></i>
				</a>
				<ul class="dropdown-menu dropdown-menu-right icons-right">
					<li><a href="#"><i class="icon-user"></i> Profile</a></li>
					<li><a href="#"><i class="icon-bubble4"></i> Messages</a></li>
					<li><a href="#"><i class="icon-cog"></i> Settings</a></li>
					<li><a href="#"><i class="icon-exit"></i> Logout</a></li>
				</ul>
			</li>
		</ul>
	</div>
	<!-- /navbar -->


	<!-- Page container -->
 	<div class="page-container">


		<!-- Page content -->
	 	<div class="page-content">


			<!-- Page header -->
			<div class="page-header">
				<div class="page-title">
					<h3>Horizontal navigation <small>Horizontal navigation layout example</small></h3>
				</div>

				<div id="reportrange" class="range">
					<div class="visible-xs header-element-toggle">
						<a class="btn btn-primary btn-icon"><i class="icon-calendar"></i></a>
					</div>
					<div class="date-range"></div>
					<span class="label label-danger">9</span>
				</div>
			</div>
			<!-- /page header -->


			<!-- Breadcrumbs line -->
			<div class="breadcrumb-line">
				<ul class="breadcrumb">
					<li><a href="index.html">Home</a></li>
					<li><a href="horizontal_navigation.html">Layouts</a></li>
					<li class="active">Horizontal navigation</li>
				</ul>

				<div class="visible-xs breadcrumb-toggle">
					<a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
				</div>

				<ul class="breadcrumb-buttons collapse">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-people"></i>
							<span class="caret"></span>
						</a>
						<div class="popup dropdown-menu dropdown-menu-right">
							<div class="popup-header">
								<a href="#" class="pull-left"><i class="icon-spinner7"></i></a>
								<span>Activity</span>
								<a href="#" class="pull-right"><i class="icon-paragraph-justify"></i></a>
							</div>
			                <ul class="activity">
				                <li>
				                	<i class="icon-cart-checkout text-success"></i>
				                	<div>
					                	<a href="#">Eugene</a> ordered 2 copies of <a href="#">OEM license</a>
					                	<span>14 minutes ago</span>
				                	</div>
				                </li>
				                <li>
				                	<i class="icon-heart text-danger"></i>
				                	<div>
					                	Your <a href="#">latest post</a> was liked by <a href="#">Audrey Mall</a>
					                	<span>35 minutes ago</span>
				                	</div>
				                </li>
				                <li>
				                	<i class="icon-checkmark3 text-success"></i>
				                	<div>
					                	Mail server was updated. See <a href="#">changelog</a>
					                	<span>About 2 hours ago</span>
				                	</div>
				                </li>
				                <li>
				                	<i class="icon-paragraph-justify2 text-warning"></i>
				                	<div>
					                	There are <a href="#">6 new tasks</a> waiting for you. Don't forget!
					                	<span>About 3 hours ago</span>
				                	</div>
				                </li>
			                </ul>
		                </div>
					</li>

					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-paragraph-justify2"></i>
							<span class="caret"></span>
						</a>
						<div class="popup dropdown-menu dropdown-menu-right">
							<div class="popup-header">
								<a href="#" class="pull-left"><i class="icon-spinner7"></i></a>
								<span>Messages</span>
								<a href="#" class="pull-right"><i class="icon-new-tab"></i></a>
							</div>
							<ul class="popup-messages">
								<li class="unread">
									<a href="#">
										<img src="images/demo/users/face1.png" alt="" class="user-face">
										<strong>Eugene Kopyov <i class="icon-attachment2"></i></strong>
										<span>Aliquam interdum convallis massa...</span>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="images/demo/users/face2.png" alt="" class="user-face">
										<strong>Jason Goldsmith <i class="icon-attachment2"></i></strong>
										<span>Aliquam interdum convallis massa...</span>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="images/demo/users/face3.png" alt="" class="user-face">
										<strong>Angel Novator</strong>
										<span>Aliquam interdum convallis massa...</span>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="images/demo/users/face4.png" alt="" class="user-face">
										<strong>Monica Bloomberg</strong>
										<span>Aliquam interdum convallis massa...</span>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="images/demo/users/face5.png" alt="" class="user-face">
										<strong>Patrick Winsleur</strong>
										<span>Aliquam interdum convallis massa...</span>
									</a>
								</li>
							</ul>
						</div>
					</li>

					<li class="dropdown">
						<a data-toggle="dropdown" class="dropdown-toggle">
							<i class="icon-grid"></i>
							<span class="caret"></span>
						</a>
						<div class="popup dropdown-menu dropdown-menu-right">
							<div class="popup-header">
								<a href="#" class="pull-left"><i class="icon-spinner7"></i></a>
								<span>Tasks list</span>
								<a href="#" class="pull-right"><i class="icon-new-tab"></i></a>
							</div>
							<table class="table table-hover">
								<thead>
									<tr>
										<th>Description</th>
										<th>Category</th>
										<th class="text-center">Priority</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><span class="status status-success item-before"></span> <a href="#">Frontpage fixes</a></td>
										<td><span class="text-smaller text-semibold">Bugs</span></td>
										<td class="text-center"><span class="label label-success">87%</span></td>
									</tr>
									<tr>
										<td><span class="status status-danger item-before"></span> <a href="#">CSS compilation</a></td>
										<td><span class="text-smaller text-semibold">Bugs</span></td>
										<td class="text-center"><span class="label label-danger">18%</span></td>
									</tr>
									<tr>
										<td><span class="status status-info item-before"></span> <a href="#">Responsive layout changes</a></td>
										<td><span class="text-smaller text-semibold">Layout</span></td>
										<td class="text-center"><span class="label label-info">52%</span></td>
									</tr>
									<tr>
										<td><span class="status status-success item-before"></span> <a href="#">Add categories filter</a></td>
										<td><span class="text-smaller text-semibold">Content</span></td>
										<td class="text-center"><span class="label label-success">100%</span></td>
									</tr>
									<tr>
										<td><span class="status status-success item-before"></span> <a href="#">Media grid padding issue</a></td>
										<td><span class="text-smaller text-semibold">Bugs</span></td>
										<td class="text-center"><span class="label label-success">100%</span></td>
									</tr>
								</tbody>
							</table>
						</div>
					</li>
				</ul>
			</div>
			<!-- /breadcrumbs line -->

<select data-placeholder="Choose a Country..." class="select-full" tabindex="2">
		                                    <option value=""></option> 
		                                    <option value="Cambodia">Cambodia</option> 
		                                    <option value="Cameroon">Cameroon</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Canada">Canada</option> 
		                                    <option value="Cape Verde">Cape Verde</option> 
		                                </select>
			<!-- Callout -->
			<div class="callout callout-info fade in">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<h5>Horizontal navigation layout</h5>
				<p>Page layout example with horizontal navigation, placed on top inside navbar.</p>
			</div>
            <!-- /callout -->


	        <!-- Invoice list -->
	        <div class="block">
	        	<h6 class="heading-hr"><i class="icon-stack"></i> Invoice list</h6>
		        <div class="datatable-invoices">
			        <table class="table table-striped table-bordered">
			        	<thead>
			        		<tr>
			        			<th class="invoice-number">Invoice #</th>
			        			<th>Description</th>
			        			<th class="invoice-amount">Amount</th>
			        			<th>Status</th>
			        			<th class="invoice-date">Issue date</th>
			        			<th class="invoice-date">Due date</th>
			        			<th class="invoice-expand text-center">View</th>
			        		</tr>
			        	</thead>
			        	<tbody>
			        		<tr>
			        			<td><a href="invoice.html"><strong>#00124</strong></a></td>
			        			<td>Integer viverra massa sit amet malesuada varius. Aliquam ut eros non lorem sagittis mattis sed vel lectus. Donec condimentum magna mauris</td>
			        			<td><h4>$30.267</h4></td>
			        			<td><span class="label label-success">Paid on 12 Jan, 2014</span></td>
			        			<td><span class="text-semibold">December 12, 2013</span></td>
			        			<td><span class="text-semibold">January 15, 2014</span></td>
			        			<td class="text-center"><a data-toggle="modal" role="button" href="#default-modal" class="btn btn-default btn-xs btn-icon"><i class="icon-file6"></i></a></td>
			        		</tr>
			        		<tr>
			        			<td><a href="invoice.html"><strong>#00123</strong></a></td>
			        			<td>Fusce orci mi, tincidunt at nibh nec, ornare feugiat dolor. Mauris sollicitudin, velit eu laoreet iaculis</td>
			        			<td><h4>$12.236</h4></td>
			        			<td><span class="label label-success">Paid on 5 Dec, 2013</span></td>
			        			<td><span class="text-semibold">November 6, 2013</span></td>
			        			<td><span class="text-semibold">December 7, 2013</span></td>
			        			<td class="text-center"><a data-toggle="modal" role="button" href="#default-modal" class="btn btn-default btn-xs btn-icon"><i class="icon-file6"></i></a></td>
			        		</tr>
			        		<tr>
			        			<td><a href="invoice.html"><strong>#00122</strong></a></td>
			        			<td>Nulla dapibus dapibus leo et vulputate. Morbi auctor et lectus sed dignissim. Vestibulum et venenatis ante</td>
			        			<td><h4>$19.940</h4></td>
			        			<td><span class="label label-danger">Unpaid</span></td>
			        			<td><span class="text-semibold">October 12, 2013</span></td>
			        			<td><span class="text-semibold">November 15, 2013</span></td>
			        			<td class="text-center"><a data-toggle="modal" role="button" href="#default-modal" class="btn btn-default btn-xs btn-icon"><i class="icon-file6"></i></a></td>
			        		</tr>
			        		<tr>
			        			<td><a href="invoice.html"><strong>#00121</strong></a></td>
			        			<td>Mauris iaculis eros id urna fermentum lacinia non vel velit. Mauris pellentesque dui id metus</td>
			        			<td><h4>$21.290</h4></td>
			        			<td><span class="label label-info">Pending</span></td>
			        			<td><span class="text-semibold">September 7, 2013</span></td>
			        			<td><span class="text-semibold">October 8, 2013</span></td>
			        			<td class="text-center"><a data-toggle="modal" role="button" href="#default-modal" class="btn btn-default btn-xs btn-icon"><i class="icon-file6"></i></a></td>
			        		</tr>
			        		<tr>
			        			<td><a href="invoice.html"><strong>#00120</strong></a></td>
			        			<td>Etiam lacinia, nunc in placerat volutpat, elit eros sagittis nulla, at lobortis est nulla ac purus</td>
			        			<td><h4>$8.800</h4></td>
			        			<td><span class="label label-info">Pending</span></td>
			        			<td><span class="text-semibold">August 24, 2013</span></td>
			        			<td><span class="text-semibold">September 25, 2013</span></td>
			        			<td class="text-center"><a data-toggle="modal" role="button" href="#default-modal" class="btn btn-default btn-xs btn-icon"><i class="icon-file6"></i></a></td>
			        		</tr>
			        		<tr>
			        			<td><a href="invoice.html"><strong>#00119</strong></a></td>
			        			<td>Aenean pulvinar sem ultricies libero bibendum rhoncus. Proin non imperdiet urna, sit amet cursus est lorem ipsum dolor sir amet</td>
			        			<td><h4>$14.209</h4></td>
			        			<td><span class="label label-info">Pending</span></td>
			        			<td><span class="text-semibold">July 12, 2013</span></td>
			        			<td><span class="text-semibold">August 15, 2013</span></td>
			        			<td class="text-center"><a data-toggle="modal" role="button" href="#default-modal" class="btn btn-default btn-xs btn-icon"><i class="icon-file6"></i></a></td>
			        		</tr>
			        		<tr>
			        			<td><a href="invoice.html"><strong>#00118</strong></a></td>
			        			<td>INunc sagittis tincidunt urna ac blandit. Maecenas rhoncus blandit convallis. Sed metus ligula, hendrerit sed porta condimentum, lacinia a neque</td>
			        			<td><h4>$6.390</h4></td>
			        			<td><span class="label label-danger">Unpaid</span></td>
			        			<td><span class="text-semibold">June 12, 2013</span></td>
			        			<td><span class="text-semibold">July 15, 2013</span></td>
			        			<td class="text-center"><a data-toggle="modal" role="button" href="#default-modal" class="btn btn-default btn-xs btn-icon"><i class="icon-file6"></i></a></td>
			        		</tr>
			        		<tr>
			        			<td><a href="invoice.html"><strong>#00117</strong></a></td>
			        			<td>Nullam aliquam velit non bibendum dapibus. Vivamus malesuada pharetra quam, convallis lacinia sapien suscipit quis</td>
			        			<td><h4>$29.900</h4></td>
			        			<td><span class="label label-success">Paid on 12 Aug, 2013</span></td>
			        			<td><span class="text-semibold">May 2, 2013</span></td>
			        			<td><span class="text-semibold">June 8, 2013</span></td>
			        			<td class="text-center"><a data-toggle="modal" role="button" href="#default-modal" class="btn btn-default btn-xs btn-icon"><i class="icon-file6"></i></a></td>
			        		</tr>
			        		<tr>
			        			<td><a href="invoice.html"><strong>#00116</strong></a></td>
			        			<td>Aenean a sapien elit. Morbi ac sapien id purus imperdiet elementum. Pellentesque suscipit pretium erat, et condimentum neque aliquam et</td>
			        			<td><h4>$20.260</h4></td>
			        			<td><span class="label label-success">Paid on 5 May, 2013</span></td>
			        			<td><span class="text-semibold">April 20, 2013</span></td>
			        			<td><span class="text-semibold">May 10, 2013</span></td>
			        			<td class="text-center"><a data-toggle="modal" role="button" href="#default-modal" class="btn btn-default btn-xs btn-icon"><i class="icon-file6"></i></a></td>
			        		</tr>
			        		<tr>
			        			<td><a href="invoice.html"><strong>#00115</strong></a></td>
			        			<td>Aliquam semper rhoncus odio, et commodo mauris semper et. Curabitur in quam non sem malesuada consequat</td>
			        			<td><h4>$31.190</h4></td>
			        			<td><span class="label label-danger">Unpaid</span></td>
			        			<td><span class="text-semibold">March 12, 2013</span></td>
			        			<td><span class="text-semibold">April 15, 2013</span></td>
			        			<td class="text-center"><a data-toggle="modal" role="button" href="#default-modal" class="btn btn-default btn-xs btn-icon"><i class="icon-file6"></i></a></td>
			        		</tr>
			        		<tr>
			        			<td><a href="invoice.html"><strong>#00114</strong></a></td>
			        			<td>Nunc varius, nunc ut tempor euismod, nisi quam tincidunt sem, at elementum nunc mauris et velit. Pellentesque consectetur odio quis enim dapibus, quis laoreet</td>
			        			<td><h4>$70.000</h4></td>
			        			<td><span class="label label-info">Pending</span></td>
			        			<td><span class="text-semibold">February 12, 2013</span></td>
			        			<td><span class="text-semibold">March 15, 2013</span></td>
			        			<td class="text-center"><a data-toggle="modal" role="button" href="#default-modal" class="btn btn-default btn-xs btn-icon"><i class="icon-file6"></i></a></td>
			        		</tr>
			        		<tr>
			        			<td><a href="invoice.html"><strong>#00113</strong></a></td>
			        			<td>Donec tempus nisl eget magna feugiat pretium. Phasellus tincidunt turpis vel luctus imperdiet. Curabitur eleifend mollis lectus sed vestibulum</td>
			        			<td><h4>$21.290</h4></td>
			        			<td><span class="label label-success">Paid on 3 Feb 2013</span></td>
			        			<td><span class="text-semibold">January 12, 2013</span></td>
			        			<td><span class="text-semibold">February 15, 2013</span></td>
			        			<td class="text-center"><a data-toggle="modal" role="button" href="#default-modal" class="btn btn-default btn-xs btn-icon"><i class="icon-file6"></i></a></td>
			        		</tr>
			        		<tr>
			        			<td><a href="invoice.html"><strong>#00112</strong></a></td>
			        			<td>Nam dolor sem, rhoncus non sagittis nec, gravida vel velit. Cras condimentum non justo vitae dapibus</td>
			        			<td><h4>$12.290</h4></td>
			        			<td><span class="label label-info">Pending</span></td>
			        			<td><span class="text-semibold">December 12, 2012</span></td>
			        			<td><span class="text-semibold">January 15, 2013</span></td>
			        			<td class="text-center"><a data-toggle="modal" role="button" href="#default-modal" class="btn btn-default btn-xs btn-icon"><i class="icon-file6"></i></a></td>
			        		</tr>	        		
			        	</tbody>
			        </table>
		        </div>
	        </div>
			<!-- /invoice list -->


            <!-- Default modal -->
			<div id="default-modal" class="modal fade" tabindex="-1" role="dialog">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Modal title</h4>
						</div>

				        <!-- New invoice template -->
				        <div class="panel">
							<div class="panel-body">

								<div class="row invoice-header">
									<div class="col-sm-6">
										<h3>The Romulan Empire</h3>
										<span>Building a Better Tomorrow Through Your Destruction</span>
									</div>

									<div class="col-sm-6">
			 							<ul class="invoice-details">
											<li>Invoice # <strong class="text-danger">4759</strong></li>
											<li>Date of Invoice: <strong>01-24-2012</strong></li>
											<li>Due Date: <strong>02-10-2012</strong></li>
										</ul>
									</div>
								</div>


								<div class="row">
									<div class="col-sm-5">
										<h6>Invoice To:</h6>
			 							<ul>
											<li><a href="#">Hiram Roth</a></li>
											<li>United Federation of Planets</li>
											<li><a href="#">president.roth@ufop.uni</a></li>
											<li>2269 Elba Lane</li>
											<li>Paris</li>
											<li>France</li>
											<li>888-555-2311</li>
										</ul>
									</div>


									<div class="col-sm-4">
										<h6>Invoice From:</h6>
			 							<ul>
											<li><a href="#">Admiral Valdore</a></li>
											<li>Romulan Empire</li>
											<li><a href="#">admiral.valdore@theempire.uni</a></li>
											<li>5151 Pardek Memorial Way</li>
											<li>Krocton Segment</li>
											<li>Romulus</li>
											<li>000-555-9988</li>
										</ul>
									</div>


									<div class="col-sm-3">
										<h6>Invoice Details:</h6>
										<ul>
											<li>Total hours spent: <strong class="pull-right">379</strong></li>
											<li>Responsible: <a href="#" class="pull-right">Eugene Kopyov</a></li>
											<li>Issued by: <a href="#" class="pull-right">Jennifer Notes</a></li>
											<li>Payment method: <strong class="pull-right">Wire transfer</strong></li>
											<li class="invoice-status"><strong>Current status: <span class="label label-danger pull-right">Unpaid</span></strong></li>
										</ul>
									</div>
								</div>

							</div>


							<div class="table-responsive">
							    <table class="table table-striped table-bordered">
							        <thead>
							            <tr>
							                <th>Product</th>
							                <th>Descrition</th>
							                <th>Discount</th>
							                <th>Total</th>
							            </tr>
							        </thead>
							        <tbody>
							            <tr>
							                <td>Concept</td>
							                <td>Creating project concept and logic</td>
							                <td>0</td>
							                <td><strong>$1,100</strong></td>
							            </tr>
							            <tr>
							                <td>General design</td>
							                <td>Design prototype</td>
							                <td>0</td>
							                <td><strong>$2,000</strong></td>
							            </tr>
							            <tr>
							                <td>Front end development</td>
							                <td>Coding and connecting front end</td>
							                <td>0</td>
							                <td><strong>$1,600</strong></td>
							            </tr>
							            <tr>
							                <td>Database</td>
							                <td>Creating and connecting database</td>
							                <td>0</td>
							                <td><strong>$890</strong></td>
							            </tr>
							        </tbody>
							    </table>
							</div>

							<div class="panel-body">
								<div class="row invoice-payment">
									<div class="col-sm-8">
										<h6>Payment method:</h6>
										<label class="radio">
											<input type="radio" name="payment-unpaid" class="styled">
											Checkout with Google
										</label>
										<label class="radio">
											<input type="radio" name="payment-unpaid" class="styled">
											Checkout with Amazon
										</label>
										<label class="radio">
											<input type="radio" name="payment-unpaid" class="styled" checked="checked">
											Wire transfer
										</label>
										<label class="radio">
											<input type="radio" name="payment-unpaid" class="styled">
											Checkout with Paypal
										</label>
										<label class="radio">
											<input type="radio" name="payment-unpaid" class="styled">
											Checkout with Skrill
										</label>
									</div>

									<div class="col-sm-4">
										<h6>Total:</h6>
										<table class="table">
											<tbody>
												<tr>
													<th>Subtotal:</th>
													<td class="text-right">$103,850</td>
												</tr>
												<tr>
													<th>Tax:</th>
													<td class="text-right">$5,192</td>
												</tr>
												<tr>
													<th>Total:</th>
													<td class="text-right text-danger"><h6>$109,042</h6></td>
												</tr>
											</tbody>
										</table>
										<div class="btn-group pull-right">
											<button type="button" class="btn btn-success"><i class="icon-checkbox-partial"></i> Confirm payment</button>
											<button type="button" class="btn btn-primary"><i class="icon-print2"></i> Print</button>
										</div>
									</div>
								</div>

								<h6>Notes &amp; Information:</h6>
								This invoice contains a incomplete list of items destroyed by the Federation ship Enterprise on Startdate 5401.6 in an unprovked attacked on a peaceful &amp; wholly scientific mission to Outpost 775.
								The Romulan people demand immediate compensation for the loss of their Warbird, Shuttle, Cloaking Device, and to a lesser extent thier troops.
							</div>
						</div>   
						<!-- /new invoice template -->

						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary">Save changes</button>
						</div>
					</div>
				</div>
			</div>
			<!-- /default modal -->


	        <!-- Footer -->
	        <div class="footer clearfix">
		        <div class="pull-left">&copy; 2013. Londinium Admin Template by <a href="http://themeforest.net/user/Kopyov">Eugene Kopyov</a></div>
	        	<div class="pull-right icons-group">
	        		<a href="#"><i class="icon-screen2"></i></a>
	        		<a href="#"><i class="icon-balance"></i></a>
	        		<a href="#"><i class="icon-cog3"></i></a>
	        	</div>
	        </div>
	        <!-- /footer -->


		</div>
		<!-- /page content -->


	</div>
	<!-- /page container -->

</body>
</html>