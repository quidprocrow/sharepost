<!DOCTYPE html>
<html>
<head>
	<title>Search User</title>
	<link rel="stylesheet" href="http://bootswatch.com/cerulean/bootstrap.min.css">
	<script>
		function showSuggestion(str){
			// since this is set to run with each key press,
			// it will first check to see if there is anything there,
			// then it creates a new xml http request
			// when theat request changes state,
			// the html block changes from blank to the response text
			// otherwise, it opens a new xml request as a get request
			// to the suggestion.php page with a query string
			if(str.length == 0){
				document.getElementById('output').innerHTML = '';
				// if there isn't anything in the input, the html is set to blank
			} else {
				// AJAX REQ
				var xmlhttp = new XMLHttpRequest();
				// new xml object
				// if the request is finished and it is okay,
				// then the output should be the response text
				xmlhttp.onreadystatechange = function(){
					if(this.readyState == 4 && this.status == 200){
						document.getElementById('output').innerHTML = this.responseText;
					}
				}
				xmlhttp.open("GET", "suggest.php?g="+str, true);
				xmlhttp.send();
			}
		}
	</script>
</head>
<body>
	<div class="container">
	    <h1>Search Users</h1>
	    <form>
	    	Search User: <input type="text" class="form-control" onkeyup="showSuggestion(this.value)">
	    </form>
	    <p>Suggestions: <span id="output" style="font-weight:bold"></span></p>
</div>
</body>
</html>
