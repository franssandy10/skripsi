<?php
$option = $_GET['option'];
class HTML_rekapdosen {
	function showRekapDosen( $option, $task, $data, $counter, $count ) { 
		?>
		<div class="content-module-heading cf">
			<h3 class="fl">PENILAIAN DOSEN</h3>
			<span class="fr expand-collapse-text">Click to collapse</span>
			<span class="fr expand-collapse-text initial-expand">Click to expand</span>
		</div>
		<div class="content-module-main">
			<fieldset>
				<p><label for="simple-input">Jumlah Kusioner : <?php echo $count; ?></label></p>
			</fieldset>
			<script language="JavaScript" src="js/FusionCharts.js"></script>
			<script language="JavaScript" src="js/jsont.js"></script>
			<div id="coffeeChartDiv">Chart Container</div>
			<script type="text/javascript">
			var coffeeSalesJSON = {
				<?php
				$i = 1;
				foreach( $data as $row ) {
					if($counter==$i) {$coma='';}else{$coma=',';}
					$avg1 = $row['soal1'] / $row['ttl'];
					$avg2 = $row['soal2'] / $row['ttl'];
					$avg3 = $row['soal3'] / $row['ttl'];
					$avg4 = $row['soal4'] / $row['ttl'];
					$avg5 = $row['soal5'] / $row['ttl'];
					$avg6 = $row['soal6'] / $row['ttl'];
					$avg7 = $row['soal7'] / $row['ttl'];
					$nDosen	= ($avg1 + $avg2 + $avg3 + $avg4 + $avg5 + $avg6 + $avg7) / 7;
					?>
					"<?php echo $row['nama_dosen']; ?>"	: "<?php echo number_format($nDosen,2); ?>"<?php echo $coma; ?>
					<?php
					$i++;
				}
				?>
			};
			var JSONParseRules = {
	 			"self"		: "<chart>\n {@getData(#)}</chart>", 
	 			"getData"	: function(x){ 
					var c = ""; 
					for( var i in x	) 
						c += "\n<set label='" + i + "' value='" + x[i]  + "'/>"; 
					return c;
				}
			}
			var coffeeChartStrXML = jsonT( coffeeSalesJSON, JSONParseRules );
			var coffeeChart = new FusionCharts("FusionCharts/Column3D.swf", "CoffeeChartId", "900", "400", "0", "0");
			coffeeChart.setDataXML( coffeeChartStrXML );		   
			coffeeChart.render( "coffeeChartDiv" );
			</script>
		</div>
		<?php
	}
}
?>