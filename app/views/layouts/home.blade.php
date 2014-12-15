<!DOCTYPE html>
<html>
  <head>
    @yield('title')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="shortcut icon" href="/images/favicon.png" type="image/png">

    <!-- Bootstrap -->
    <!-- <link href="css/bootstrap.css" rel="stylesheet"> -->

    <link rel="stylesheet" href="/css/admin.css">
    @yield('styling')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="/js/lib/modernizr.js"></script>

  </head>
  <body id="dashboard-page" class="bg-gray-light">
      	<nav class="navbar navbar-fixed-top not-collapse bg-g-ln-gray" role="navigation">
      		<div class="navbar-header">
    		    <a class="navbar-brand" href="#" class="hover-white-shade-bg">
    		    	<img src="/images/logo.png" class="logo">
    		    </a>
    		  </div>
    	  	<div id="top-nav">
    	  		<a href="/logout" type="button" class="btn btn-default navbar-btn navbar-right btn-primary m-r-30 mm-r-10">Logout</a>
    	  	</div>
    	</nav>
        @yield('sidebar')

        <div id="container" class="main-content p-30 tp-t-60 tp-lr-10">
            <div class="bg-white p-30 m-t-10 brad b-bot-2px-gray-light b-right-1px-gray-light">
                @yield('content')
            </div>
        </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://code.jquery.com/jquery.js"></script>
        @yield('footer')
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="/js/lib/bootstrap.js"></script>

        <script src="/js/lib/pushy.js"></script>

        <script src="/js/lib/moment.js"></script>

        <script src="/js/lib/jquery.timeago.js"></script>
        <script src="/js/lib/jquery.eventCalendar.js"></script>

        <script src="/js/lib/icheck.js"></script>

        <script src="/js/lib/lifestream.js"></script>

       	<script src="/js/lib/raphael.js"></script>
    	<script src="/js/lib/morris.js"></script>

    	<script src="/js/lib/easypiechart.js"></script>

    	<script src="/js/lib/sparkline.js"></script>

         <script src="/js/lib/notify.js"></script>

        <script src="/js/admin.js"></script>

        <script>
        	var url ='icons/icons.svg';
          var c=new XMLHttpRequest(); c.open('GET', url, false); c.setRequestHeader('Content-Type', 'text/xml'); c.send();
          document.body.insertBefore(c.responseXML.firstChild, document.body.firstChild)
        </script>
  </body>
</html>
