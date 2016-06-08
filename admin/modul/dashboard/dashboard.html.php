<?php
$option = $_GET['option'];
class HTML_dashboard {
	function showDashboard( $option, $task ) { 
		?>
		<script type="text/javascript" src="js/clock.js"></script>
			<div class="content-module-heading cf">
				<h3 class="fl">HOME</h3>
			</div>
			<div class="content-module-main">
				<div class="clock">
					<div id="Date"></div>
					<ul>
						<li id="hours"></li>
						<li id="point">:</li>
						<li id="min"></li>
						<li id="point">:</li>
						<li id="sec"></li>
					</ul>
				</div>
			</div>
		<?php
	}
}
?>