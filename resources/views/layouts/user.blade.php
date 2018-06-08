<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Tourism Surfing Web Template</title>
	<link href="/assets/user/css/style.css" rel="stylesheet" media="all">
</head>
<body>
	<div id="header">
	</div>
	<!-- MENU SIDEBAR-->
        @include('partials.sidebar2')
        <!-- END MENU SIDEBAR-->

			<!-- MAIN CONTENT-->
            <div class="main-content">
            @yield('content')
        </div>

        <!-- FOOTER-->
        @include('partials.footer')
        <!-- END FOOTER-->
	
</body>
</html>