<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Coming Soon Page</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Stylesheets -->
	<style>

	html, body, div, span, applet, object, iframe,
	h1, h2, h3, h4, h5, h6, p, blockquote, pre,
	a, abbr, acronym, address, big, cite, code,
	del, dfn, em, img, ins, kbd, q, s, samp,
	small, strike, strong, sub, sup, tt, var,
	b, u, i, center,
	dl, dt, dd, ol, ul, li,
	fieldset, form, label, legend,
	table, caption, tbody, tfoot, thead, tr, th, td,
	article, aside, canvas, details, embed, 
	figure, figcaption, footer, header, hgroup, 
	menu, nav, output, ruby, section, summary,
	time, mark, audio, video {
		margin: 0;
		padding: 0;
		border: 0;
		font-size: 100%;
		font: inherit;
		vertical-align: baseline;
	}
	/* HTML5 display-role reset for older browsers */
	article, aside, details, figcaption, figure, 
	footer, header, hgroup, menu, nav, section {
		display: block;
	}
	body {
		line-height: 100%;
	}

	blockquote, q {
		quotes: none;
	}
	blockquote:before, blockquote:after,
	q:before, q:after {
		content: '';
		content: none;
	}
	table {
		border-collapse: collapse;
		border-spacing: 0;
	}

	* {
	  -webkit-box-sizing: border-box;
	     -moz-box-sizing: border-box;
	          box-sizing: border-box;
	}

	a, a:hover { text-decoration: none; }

	p a { border-bottom: 1px dotted; }


	/* Page Style */

	/**********************************************************************************

	Project Name: 
	Project Description: 
	File Name:
	Author: Adi Purdila
	Author URI: http://www.adipurdila.com
	Version: 1.0.0
	
**********************************************************************************/
/* ---------- TYPOGRAPHY ---------- */
body {
  font: 1em/1.5em "Helvetica Neue", Arial, Helvetica, Geneva, sans-serif;
  color: #1f2225;
  background-color: #3C3E3F;
}
p a {
  color: #2a9ccc;
}
p a:hover {
  color: #1f2225;
}
h1,
h2 {
  font-family: Georgia, serif;
  margin-bottom: 1em;
}
h1 {
  font-size: 2em;
  line-height: 3em;
}
h2 {
  font-size: 1.2em;
  line-height: 1.5em;
}
/* ---------- LAYOUT ---------- */
.container {
  width: 100%;
  text-align: center;
  margin: 0 auto;
}
#logo img {
  margin: 2em 0;
}
.timer-area {
  background: transparent url('../images/timer-area-pattern.png') left top;
  text-align: center;
  padding-top: 2em;
  margin-bottom: 4em;
}
.timer-area h1 {
  color: white;
}
/* ---------- SIGNUP ---------- */
.form-wrapper {
  border: 1px solid #dcdee0;
  padding: .5em;
  width: 30em;
  margin: 1em auto;
  overflow: hidden;
  -webkit-border-radius: 13px;
  border-radius: 13px;
}
.form-wrapper:hover,
.form-wrapper:focus {
  border: 1px solid #c1c5c8;
}
input[type="email"] {
  border: none;
  float: left;
  font-size: 1em;
  padding: .5em;
  outline: none;
  margin-top: .7em;
  width: 19em;
}
input[type="submit"] {
  float: right;
  border: none;
  -webkit-border-radius: 5px;
  border-radius: 5px;
  background-color: #2a9ccc;
  background-image: -webkit-gradient(linear, left top, left bottom, from(#2a9ccc), to(#217ca2));
  background-image: -webkit-linear-gradient(top, #2a9ccc, #217ca2);
  background-image: -moz-linear-gradient(top, #2a9ccc, #217ca2);
  background-image: -o-linear-gradient(top, #2a9ccc, #217ca2);
  background-image: linear-gradient(to bottom, #2a9ccc, #217ca2);
  color: white;
  -webkit-box-shadow: inset 0 2px 2px #217ca2;
  box-shadow: inset 0 2px 2px #217ca2;
  padding: 1em;
  font-size: 1em;
  text-transform: uppercase;
  cursor: pointer;
}
input[type="submit"]:hover {
  background-color: #2da2d4;
  background-image: -webkit-gradient(linear, left top, left bottom, from(#2da2d4), to(#2382aa));
  background-image: -webkit-linear-gradient(top, #2da2d4, #2382aa);
  background-image: -moz-linear-gradient(top, #2da2d4, #2382aa);
  background-image: -o-linear-gradient(top, #2da2d4, #2382aa);
  background-image: linear-gradient(to bottom, #2da2d4, #2382aa);
}
/* ---------- FOOTER ---------- */
footer#disclaimer p {
  font-size: .875em;
  color: #909091;
  font-style: italic;
}
footer#disclaimer p span {
  font-size: 1.2em;
  color: #2a9ccc;
}
footer#main-footer {
  background-color: #fcfbfb;
  background-image: -webkit-gradient(linear, left top, left bottom, from(#fcfbfb), to(#ffffff));
  background-image: -webkit-linear-gradient(top, #fcfbfb, #ffffff);
  background-image: -moz-linear-gradient(top, #fcfbfb, #ffffff);
  background-image: -o-linear-gradient(top, #fcfbfb, #ffffff);
  background-image: linear-gradient(to bottom, #fcfbfb, #ffffff);
  border-top: 1px solid #dcdee0;
  -webkit-box-shadow: inset 0 2px 5px #e6dede;
  box-shadow: inset 0 2px 5px #e6dede;
  text-align: center;
  padding: 2em 0;
  margin-top: 4em;
}
footer#main-footer p {
  font-size: .875em;
  margin-bottom: 1em;
}
/* ---------- TIMER ---------- */
ul#countdown li {
  display: inline-block;
  background: transparent url('../images/timer-piece.png') no-repeat left top;
  width: 104px;
  margin-bottom: 4em;
  text-align: center;
}
ul#countdown li span {
  font-size: 3em;
  font-weight: bold;
  color: #ffffff;
  height: 108px;
  line-height: 108px;
  position: relative;
}
ul#countdown li span::before {
  content: '';
  width: 100%;
  height: 1px;
  border-top: 3px solid #3C3E3F;
  position: absolute;
  top: 31px;
}
ul#countdown li p.timeRefDays,
ul#countdown li p.timeRefHours,
ul#countdown li p.timeRefMinutes,
ul#countdown li p.timeRefSeconds {
  margin-top: 1em;
  color: #909091;
  text-transform: uppercase;
  font-size: .875em;
}

	</style>
	<link rel="stylesheet" href="css/styles.css" />



	<script type="text/javascript" src="_assets/_js/jquery/jquery-1.10.1.min.js"></script>
	<script type="text/javascript" src="_assets/_js/custom/countdown.js"></script>
	
	<script>
	
		$(document).ready(function(){
			$("#countdown").countdown({
				date: "30 october 2014 12:00:00",
				format: "on"
			},
			
			function() {
				// callback function
			});
		});
	
	</script>
</head>
<body>

	<!-- LOGO -->
	<header class="container">
		<img style="margin-top:50px" src="_assets/sites_flipstop/default/img/fs_logo_dark.jpg" alt="Coming Soon Page" />
	</header>
	
	
	<!-- TIMER -->
	<div class="timer-area">
		
		<h1> Malapit na po...</h1>
		
		<ul id="countdown">
			<li>
				<span class="days">00</span>
				<p class="timeRefDays">days</p>
			</li>
			<li>
				<span class="hours">00</span>
				<p class="timeRefHours">hours</p>
			</li>
			<li>
				<span class="minutes">00</span>
				<p class="timeRefMinutes">minutes</p>
			</li>
			<li>
				<span class="seconds">00</span>
				<p class="timeRefSeconds">seconds</p>
			</li>
		</ul>
		
	</div> <!-- end timer-area -->
	
	
	


</body>
</html>