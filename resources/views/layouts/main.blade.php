<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
	<title>@yield('title','') | Radmin - Laravel Admin Starter</title>
	<!-- initiate head with meta tags, css and script -->
	@include('include.head')

</head>
<body id="app" >
    <div class="wrapper">
    	<!-- initiate header-->
    	@include('include.header')
    	<div class="page-wrap">
	    	<!-- initiate sidebar-->
	    	@include('include.sidebar')

	    	<div class="main-content">
	    		<!-- yeild contents here -->
	    		@yield('content')
	    	</div>


	    	<!-- initiate footer section-->
	    	@include('include.footer')

    	</div>
    </div>
    
	<!-- initiate modal menu section-->
	@include('include.modalmenu')

	<!-- initiate scripts-->
	@include('include.script')	

	<div class="pop-up" id="pop-up">
		<div class="pop-up__content">
		  <a class="pop-up__close" href="#container">x</a>
		</div>
	  </div>
		   
	  <script>
		function imageClick(url) {
		   
			url="url(\""+url+ "\")";
			$('.pop-up__content').css('backgroundImage',url);
		  }
	</script>
</body>
</html>