<!DOCTYPE html>
<html>
<head>
<title>CGU Search</title>
<meta name="ROBOTS" content="NOINDEX, NOFOLLOW" />

<!-- CSS styles for standard search box with placeholder text-->
<style type="text/css">
/*	#tfheader{
		background-color:#c3dfef;
	}*/
	#tfnewsearch{
		/*float:right;*/
		padding:20px;
	}
form    {
	background: -webkit-gradient(linear, bottom, left 175px, from(#CCCCCC), to(#EEEEEE));
	background: -moz-linear-gradient(bottom, #CCCCCC, #EEEEEE 175px);
	margin:auto;
	position:relative;
	width:50%;
	height:50%;
	font-family: Tahoma, Geneva, sans-serif;
	font-size: 14px;
	font-style: italic;
	line-height: 24px;
	font-weight: bold;
	color: #09C;
	text-decoration: none;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	border-radius: 10px;
	padding:10px;
	border: 1px solid #999;
	border: inset 1px solid #333;
	-webkit-box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
	-moz-box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
	box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
	}



	input    {
	width:80%;
	display:block;
	border: 1px solid #999;
	height: 25px;
	-webkit-box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
	-moz-box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
	box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
	}
		input.submit {
		width:100px;
		position:absolute;
		right:20px;
		bottom:20px;
		background:#09C;
		color:#fff;
		font-family: Tahoma, Geneva, sans-serif;
		height:30px;
		-webkit-border-radius: 15px;
		-moz-border-radius: 15px;
		border-radius: 15px;
		border: 1p solid #999;
		}
		input.submit:hover {
		background:#fff;
		color:#09C;
		}
	.tfclear{
		clear:both;
	}

	table.sample {
	border: 3px inset #09C;
	-moz-border-radius: 6px;
	position:absolute;
	margin-top:10%;
	margin-right:10%;
	margin-left:45%;

}
table.sample td {
	border: 1px solid black;
	padding: 0.2em 2ex 0.2em 2ex;
	color: black;
}
table.sample tr.d0 td {
	background-color: #D0D0D0 ;
}
table.sample tr.d1 td {
	background-color: #FFFFFF;
}
</style>
</head>
<body>

<?php
 phpinfo();
if (isset($_GET)) {

	$site=$_GET['search_site'];
	$searchWords= $_GET['search_word'];

} else {

	$site="";
	$searchWords= "";

}


?>



	<!-- HTML for SEARCH BAR -->
	<div id="tfheader">
		<form id="tfnewsearch" method="get" action="#">
		        <input type="text" id="search_site" class="search_site" name="search_site" size="21"  placeholder="http://" value="<?php echo $site; ?>"><br/>
		         <input type="text" id="search_word" class="search_word" name="search_word" size="21"  placeholder="Enter , to search for multiple words" 
		         			value="<?php echo $searchWords; ?>">
		         			
		          <input type="submit" id="submit" class="submit" name="submit" size="21"  value="submit">

		</form>
		<div class="tfclear"></div>
	</div>
	
	
<!-- display the text files result in a table -->
<?php if (isset($_GET['submit'])) {
echo '<table class="sample">
	<tr class="d0"><td>#</td><td>File</td></tr>	';


		include "action_2.php";


		echo '</table>';

}


?>





	
</body>
</html>
