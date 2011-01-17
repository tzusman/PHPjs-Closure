<?

	if ( count($_POST) > 0 ) {


	}

?><!DOCTYPE html> 
<html> 
 <head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
  <meta name="viewport" content="width=940"/> 
  <title>PHPJs + Closure : by Todd Zusman</title> 
  <link rel="stylesheet" type="text/css" href="style.css" /> 
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script> 
  <script type="text/javascript" src="jquery.history.js"></script> 
  <script type="text/javascript" src="app.js"></script> 
</head> 
<body>

	<div id="wrapper">

		<h1><a href="http://phpjs.org/">PHP.JS</a> &amp; <a href="http://code.google.com/closure/compiler/">Google Closure</a></h1>
		<h3>Get optimized Javascript versions of almost any PHP function.</h3>

		<form id="function">
			<label>Enter PHP Function:</label>
			<input type="text" />
			<input type="submit" value="Do it" />
		</form>

		<textarea id="result" style="display: none;"> </textarea>

		<div id="street_cred">
			Orchestrated by <a href="http://toddzusman.com">Todd Zusman</a>
		</div>

	</div>

	<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-20788277-1']);
		_gaq.push(['_trackPageview']);
		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>

</body>
