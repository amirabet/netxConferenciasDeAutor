<?php
/**************************************************************/
/*
/* PÀGINA D'ESTADÍSQTIQUES DE GOOGLE ANALYTICS
* TO DO:
Condicional per garantir que no están buides les configuracions
/*
/**************************************************************/
//
// Variables Configuracio *******************************
$analtytics = get_option('stats_analytics');
$ga_email = $analytics['user'];
$ga_password = $analytics['pass'];
$ga_profile_id = $analytics['code'];
if (isset ($analytics['hostname'])){ $hostname = $analytics['hostname'];}else{$hostname = '';}
if (isset ($analytics['color_graph1']) && $analytics['color_graph1'] != ''){ $ga_color_graph1 = $analytics['color_graph1'];}else{$ga_color_graph1 = '#058dc7';};
if (isset ($analytics['color_graph2']) && $analytics['color_graph2'] != ''){ $ga_color_graph2 = $analytics['color_graph2'];}else{$ga_color_graph2 = '#ed561b';};
if (isset ($analytics['color_map1']) && $analytics['color_map1'] != ''){ $ga_color_map1 = $analytics['color_map1'];}else{$ga_color_map1 = '#e4f2f8';};
if (isset ($analytics['color_map2']) && $analytics['color_map2'] != ''){ $ga_color_map2 = $analytics['color_map2'];}else{$ga_color_map2 = '#058dc7';};
//
// Ga:pi  **********************************************
require 'gapi-1.3/gapi.class.php';
$ga = new gapi($ga_email,$ga_password);
//
// FUNCIONS *********************************************
//
// FUNCIO PER CALCULAR PERCENTATGES
function percent($num_amount, $num_total) {
	$count1 = $num_amount / $num_total;
	$count2 = $count1 * 100;
	$count = number_format($count2, 0);
echo $count;
}
function amount_percent($num_amount, $num_total) {
    echo number_format((1 - $num_amount / $num_total) * 100, 2); // yields 0.76
}
// FUNCIO PER MOSTRAR ELS RESULTATS EN MINTUS : SEGONS
function secondMinute($seconds) {
    $minResult = floor($seconds/60);
    if($minResult < 10){$minResult = 0 . $minResult;}
    $secResult = ($seconds/60 - $minResult)*60;
	$secResult = round($secResult);
    if($secResult < 10){$secResult = 0 . $secResult;}
    return $minResult.":".$secResult;
}
// FUNCIO PER MOSTRAR EL NOM DELS DIES DE LA SETMANA
function dayoftheWeek($day) {
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			if ($day == 1){$day = 'Lunes';}elseif ($day == 2){$day = 'Martes';}elseif ($day == 3){$day = 'Miércoles';}elseif ($day == 4){$day = 'Jueves';}elseif ($day == 5){$day = 'Viernes';}elseif ($day == 6){$day = 'Sábado';}elseif ($day == 0){$day = 'Domingo';} return $day;  
		}elseif( qtrans_getLanguage() == 'ca' ){
			if ($day == 1){$day = 'Dilluns';}elseif ($day == 2){$day = 'Dimarts';}elseif ($day == 3){$day = 'Dimecres';}elseif ($day == 4){$day = 'Dijous';}elseif ($day == 5){$day = 'Divendres';}elseif ($day == 6){$day = 'Dissabte';}elseif ($day == 0){$day = 'Diumenge';} return $day;  
		}else{
			if ($day == 0){$day = 'Sunday';}elseif ($day == 1){$day = 'Monday';}elseif ($day == 2){$day = 'Tuesday';}elseif ($day == 3){$day = 'Wednesday';}elseif ($day == 4){$day = 'Thursday';}elseif ($day == 5){$day = 'Friday';}elseif ($day == 6){$day = 'Saturday';} return $day;  
		}
	}else{//Not activeQtrans 
    	if ($day == 1){$day = 'Lunes';}elseif ($day == 2){$day = 'Martes';}elseif ($day == 3){$day = 'Miércoles';}elseif ($day == 4){$day = 'Jueves';}elseif ($day == 5){$day = 'Viernes';}elseif ($day == 6){$day = 'Sábado';}elseif ($day == 0){$day = 'Domingo';} return $day;
	}
}
// FUNCIO PER MOSTRAR DIRECT ENLLOC DE NONE AL MEDIUM
function mediumpretty($medium) {
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			if ($medium == '(none)'){$medium = 'Directo';}elseif ($medium == 'organic'){$medium = 'Buscador';}elseif ($medium == 'referral'){$medium = 'Enlace';}return $medium; 
		}elseif( qtrans_getLanguage() == 'ca' ){
			if ($medium == '(none)'){$medium = 'Directe';}elseif ($medium == 'organic'){$medium = 'Cercador';}elseif ($medium == 'referral'){$medium = 'Enllaç';}return $medium; 
		}else{
			if ($medium == '(none)'){$medium = 'Direct';}elseif ($medium == 'organic'){$medium = 'Search';}elseif ($medium == 'referral'){$medium = 'Link';}return $medium; 
		}
	}else{//Not activeQtrans 
		if ($medium == '(none)'){$medium = 'Directo';}elseif ($medium == 'organic'){$medium = 'Buscador';}elseif ($medium == 'referral'){$medium = 'Enlace';}return $medium; 
	}
}
//
// Render
//
// Test Colors
//echo $ga_color_graph1;
//echo $ga_color_graph2;
//echo $ga_color_map1;
//echo $ga_color_map2;
?> 
<!-- Texte d'Introducció -->
<div style="margin-bottom: 10px;"><h4>&nbsp;&nbsp;
    <?php if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){	?>
			Se muestran los datos para los últimos 30 días y se comparan con el mes anterior.
		<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
			Es mostren les dades dels últims 30 dies i es comparen amb el mes anterior.
		<?php }else{ //english ?>
			Last 30 days are showed and compared with previous month.
		<?php } 
	}else{//Not activeQtrans ?>
    	Se muestran los datos para los últimos 30 días y se comparan con el mes anterior.
    <?php } ?>
<span id="analytics_loader"><img src="<?php echo plugin_dir_url( __FILE__ );?>img/ajax-loader.gif" width="20" height="20" style="margin-left:5px; vertical-align:middle;" alt="Loading data from Google Analytics Server" /></span></h4></div>
<div class="clear"></div>
<!-- Area Visits: Create graph -->
<div class="postbox postbox_double">
	<h3>
    	<?php if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){	?>
				Visitas Mensuales
			<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
				Visites Mensuals
			<?php }else{ //english ?>
				Monthly Hits
			<?php } 
    	}else{//Not activeQtrans ?>
        	Visitas Mensuales
        <?php } ?>
    </h3>
	<div class="inside" id="analy_month">
    </div>
    <div class="clear"></div>
</div>
<!-- Create a new chart and plot the pageviews for each day -->
<?php 
/* Area -> Visits ******************************************************************************/
/* Area -> Visits: Request */
$ga->requestReportData($ga_profile_id, array('date'),array('pageviews','visits'), 'date');    
$results = $ga->getResults();
//
?>
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart1);
  function drawChart1() {
    var data = new google.visualization.DataTable();
    <!-- Create the data table -->
    data.addColumn('string', 'Day');
    data.addColumn('number', 'Pageviews');
	data.addColumn('number', 'Visits');
    <!-- Fill the chart with the data pulled from Analtyics. Each row matches the order setup by the columns: day then pageviews -->
    data.addRows([
      <?php
      foreach($results as $result) {
          echo '["'.date('M j',strtotime($result->getDate())).'", '.$result->getPageviews().', '.$result->getVisits().'],';
      }
      ?>
    ]);
    var chart1 = new google.visualization.AreaChart(document.getElementById('analy_month'));
    chart1.draw(data, {colors:[<?php echo "'" . $ga_color_graph1 . "' , '" . $ga_color_graph2 . "'"; ?>],
	  height:144,
	  areaOpacity: 0.1,
	  hAxis: {textPosition: 'out', showTextEvery: 5, slantedText: false, textStyle: { color: '#000', fontSize: 10 } },
	  vAxis: {textPosition: 'in', showTextEvery: 10, slantedText: false, textStyle: { color: '#000', fontSize: 12 } },
	  pointSize: 4,
	  legend: { position: 'in', alignment: 'end' },
	  chartArea:{left:0,top:0,width:"100%",height:"90%"}
    });
  }
</script>
<?php
//
// Require Data ******************************************************************************************
//
/* Require -> Current Month **********************/
$ga->requestReportData($ga_profile_id, array('date'),array('visits', 'newVisits','pageviews','visitors', 'BounceRate','avgSessionDuration','goalValueAll','goalValuePerSession'), 'date');
$visits = $ga->getVisits();
$newvisits = $ga->getnewVisits();
$pageviews = $ga->getPageviews();
$visitors = $ga->getvisitors();
$bouncerate = $ga->getBounceRate();
$session = $ga->getavgSessionDuration();
$value_tot = $ga->getgoalValueAll();
$value = $ga->getgoalValuePerSession();
/* Require -> Month(Previous ) *******************/
$start= date('Y-m-d', strtotime('-60 days')); //first day in last month
$end= date('Y-m-d', strtotime('-30 days')); //last day in last month
$ga->requestReportData($ga_profile_id, array('date'),array('visits', 'newVisits','pageviews','BounceRate','avgSessionDuration','goalValueAll','goalValuePerSession'),'date','',$start, $end);
$prev_visits = $ga->getVisits();
$prev_newvisits = $ga->getnewVisits();
$prev_pageviews = $ga->getPageviews();
$prev_bouncerate = $ga->getBounceRate();
$prev_session = $ga->getavgSessionDuration();
$prev_value_tot = $ga->getgoalValueAll();
$prev_value = $ga->getgoalValuePerSession();
?>
<!-- Postbox -> Visits (Total / News) -->
<div class="postbox postbox_single">
	<h3>
    	<?php if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){	?>
				Visitas Mensuales Totales
			<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
				Visites Mensuals Totals
			<?php }else{ //english ?>
				Total Monthly Hits
			<?php }
    	}else{//Not activeQtrans ?>
        	Visitas Mensuales Totales
        <?php } ?>
    </h3>
	<div class="inside" id="analy_visits">
    	<span class="analytics_results_bigdata"><?php echo $visits; ?></span>
        <span class="analytics_results_smalldata <?php if ($visits < $prev_visits){ echo 'red">'; amount_percent($prev_visits, $visits); echo '<i>%</i>'; }elseif ($visits > $prev_visits){echo 'green">'; amount_percent($prev_visits, $visits); echo '<i>%</i>';} elseif ($visits == $prev_visits){ echo '"> - ';} ?>
        	<?php if ($visits !=0){?> <span class="text_data"><?php percent($newvisits, $visits);?><i>% <?php if (function_exists('qtrans_getLanguage')){ if( qtrans_getLanguage() == 'es' ){ ?>Nuevas<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>Noves<?php }else{ //english ?>New<?php } }else{//Not activeQtrans ?>Nuevas<?php } ?></i></span> <?php } ?>
        </span>
    </div>
    <div class="clear"></div>
</div>
<!-- Postbox -> Pageviews (Current / Last) -->
<div class="postbox postbox_single">
	<h3>
    	<?php if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){	?>
				Total de Páginas Vistas
			<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
				Total de Pàgines Vistes
			<?php }else{ //english ?>
				Total Page Views
			<?php }
    	}else{//Not activeQtrans ?>
        	Total de Páginas Vistas
        <?php } ?>
    </h3>
	<div class="inside" id="analy_pageviews">
    	<span class="analytics_results_bigdata"><?php echo $pageviews; ?></span>
        <span class="analytics_results_smalldata <?php if ($pageviews < $prev_pageviews){ echo 'red">'; amount_percent($prev_pageviews, $pageviews); echo '<i>%</i>';}elseif ($pageviews > $prev_pageviews){echo 'green">';amount_percent($prev_pageviews, $pageviews); echo '<i>%</i>';}elseif ($pageviews == $prev_pageviews){echo '"> -';} ?>
    		<span class="text_data"><?php echo $visitors;?><i> <?php if (function_exists('qtrans_getLanguage')){ if( qtrans_getLanguage() == 'es' ){	?>Usuarios<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>Usuaris<?php }else{ //english ?>Visitors<?php } }else{//Not activeQtrans ?>Usuarios<?php } ?></i></span>
        </span>
    </div>
    <div class="clear"></div>
</div>
<div class="clear"></div>
<!-- Postbox -> BounceRate (Current / Last) -->
<div class="postbox postbox_single">
	<h3>
    	<?php if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){	?>
				Porcentaje de Rebote
			<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
				Porcentatge de Rebot
			<?php }else{ //english ?>
				Bounce Rate
			<?php }
    	}else{//Not activeQtrans ?>
        	Porcentaje de Rebote
        <?php } ?>
    </h3>
	<div class="inside" id="analy_bouncerate">
    	<span class="analytics_results_bigdata"><?php echo number_format($bouncerate, 1); ?><i> %</i></span>
        <span class="analytics_results_smalldata <?php if ($bouncerate < $prev_bouncerate){ echo 'green">'; amount_percent($prev_bouncerate, $bouncerate); echo '<i>%</i>'; }elseif ($bouncerate > $prev_bouncerate){echo 'red">'; amount_percent($prev_bouncerate, $bouncerate); echo '<i>%</i>';}elseif ($bouncerate == $prev_bouncerate){echo '"> - ';}?>
            <?php  
			if ($bouncerate < 15){
				echo '<span class="rating_data"><div class="dashicons dashicons-star-filled"></div><div class="dashicons dashicons-star-filled"></div><div class="dashicons dashicons-star-filled"></div></span>';
			}elseif ($bouncerate < 30){
				echo '<span class="rating_data"><div class="dashicons dashicons-star-filled"></div><div class="dashicons dashicons-star-filled"></div><div class="dashicons dashicons-star-half"></div></span>';
			}elseif ($bouncerate < 40){
				echo '<span class="rating_data"><div class="dashicons dashicons-star-filled"></div><div class="dashicons dashicons-star-filled"></div><div class="dashicons dashicons-star-empty"></div></span>';
			}elseif ($bouncerate < 70){
				echo '<span class="rating_data"><div class="dashicons dashicons-star-filled"></div><div class="dashicons dashicons-star-empty"></div><div class="dashicons dashicons-star-empty"></div></span>';
			}elseif ($bouncerate < 80){
				echo '<span class="rating_data"><div class="dashicons dashicons-star-half"></div><div class="dashicons dashicons-star-empty"></div><div class="dashicons dashicons-star-empty"></div></span>';
			}elseif ($bouncerate > 80){
            	echo '<span class="rating_data"><div class="dashicons dashicons-star-empty"></div><div class="dashicons dashicons-star-empty"></div><div class="dashicons dashicons-star-empty"></div></span>';
			} ?>
        </span>
    </div>
    <div class="clear"></div>
</div>
<!-- Postbox -> Visit Time (Current / Last) -->
<div class="postbox postbox_single">
	<h3>
    	<?php if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){	?>
				Tiempo promedio de Visita
			<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
				Temps promig de Visita
			<?php }else{ //english ?>
				Average Visit Time
			<?php }
    	}else{//Not activeQtrans ?>
        	Tiempo promedio de Visita
        <?php } ?>
    </h3>
	<div class="inside" id="analy_visittime">
    	<span class="analytics_results_bigdata"><?php echo secondMinute($session); ?></span>
        <span class="analytics_results_smalldata <?php if ($session > $prev_session){ echo 'green">'; amount_percent($prev_session, $session); echo '<i>%</i>';}elseif ($session < $prev_session){echo 'red">'; amount_percent($prev_session, $session); echo '<i>%</i>';}elseif ($session == $prev_session){echo '"> - ';} ?>
        <?php  
			if ($session > 300){
				echo '<span class="rating_data"><div class="dashicons dashicons-star-filled"></div><div class="dashicons dashicons-star-filled"></div><div class="dashicons dashicons-star-filled"></div></span>';
			}elseif ($session > 180){
				echo '<span class="rating_data"><div class="dashicons dashicons-star-filled"></div><div class="dashicons dashicons-star-filled"></div><div class="dashicons dashicons-star-half"></div></span>';
			}elseif ($session > 120){
				echo '<span class="rating_data"><div class="dashicons dashicons-star-filled"></div><div class="dashicons dashicons-star-filled"></div><div class="dashicons dashicons-star-empty"></div></span>';
			}elseif ($session > 90){
				echo '<span class="rating_data"><div class="dashicons dashicons-star-filled"></div><div class="dashicons dashicons-star-half"></div><div class="dashicons dashicons-star-empty"></div></span>';
			}elseif ($session > 60){
				echo '<span class="rating_data"><div class="dashicons dashicons-star-filled"></div><div class="dashicons dashicons-star-empty"></div><div class="dashicons dashicons-star-empty"></div></span>';
			}elseif ($session > 30){
				echo '<span class="rating_data"><div class="dashicons dashicons-star-half"></div><div class="dashicons dashicons-star-empty"></div><div class="dashicons dashicons-star-empty"></div></span>';
			}elseif ($session < 30){
            	echo '<span class="rating_data"><div class="dashicons dashicons-star-empty"></div><div class="dashicons dashicons-star-empty"></div><div class="dashicons dashicons-star-empty"></div></span>';
			} ?>
    	</span>
    </div>
    <div class="clear"></div>
</div>
<!-- Postbox -> Day visits -->
<div class="postbox postbox_single">
	<h3>
    	<?php if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){	?>
				Visitas por Día
			<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
				Visites per Dia
			<?php }else{ //english ?>
				Visits by Day
			<?php }
    	}else{//Not activeQtrans ?>
        	Visitas por Día
        <?php } ?>
    </h3>
	<div class="inside" id="analy_dayvisits">
    	<table class="analytics_results_tb">
		  <?php
			$ga->max_results = 7;
			$ga->requestReportData($ga_profile_id,array('dayOfWeek'),array('pageviews'),array('-pageviews'));
				foreach($ga->getResults() as $result){
					echo('<tr><td><strong>'.dayoftheWeek($result->getdayOfWeek()).'</strong></td><td>'.$result->getPageViews()).'</td></tr>';
				}
			?>
        </table>
    </div>
    <div class="clear"></div>
</div>
<!-- Postbox -> Hour Visits -->
<div class="postbox postbox_single">
	<h3>
    	<?php if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){	?>
				Visitas por Hora
			<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
				Visites per Hora
			<?php }else{ //english ?>
				Visits by Hour
			<?php }
    	}else{//Not activeQtrans ?>
        	Visitas por Hora
        <?php } ?>
    </h3>
	<div class="inside" id="analy_hourvisits">
    	<table class="analytics_results_tb">
		  <?php
			$ga->max_results = 7;
			$ga->requestReportData($ga_profile_id,array('hour'),array('pageviews'),array('-pageviews'));
				foreach($ga->getResults() as $result){
					echo'<tr><td><strong>'.$result->gethour().' h.</strong></td><td>'.$result->getPageViews().'</td></tr>';
				}
			?>
        </table>
    </div>
    <div class="clear"></div>
</div>
<div class="clear"></div>
<!-- Bloc 2: Fonts de tràfic i SEO ************************************************************** -->
<!-- Postbox -> Fonts -> Visites -->
<div class="postbox postbox_single">
	<h3>
    	<?php if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){	?>
				Fuente / Visitas
			<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
				Font / Visites
			<?php }else{ //english ?>
				Medium / Visits
			<?php }
    	}else{//Not activeQtrans ?>
        	Fuente / Visitas
        <?php } ?>
    </h3>
	<div class="inside" id="analy_mediumvisits">
    	<table class="analytics_results_tb">
		  <?php
			$ga->max_results = 10;
			$ga->requestReportData($ga_profile_id,array('Medium'),array('sessions'),array('-sessions'));
				foreach($ga->getResults() as $result){
					echo'<tr><td><strong>'.mediumpretty($result->getMedium()).'</strong></td><td>'.$result->getsessions().'</td></tr>';
				}
			?>
        </table>
    </div>
    <div class="clear"></div>
</div>
<!-- Postbox -> Fonts -> Visitants -->
<div class="postbox postbox_single">
	<h3>
    	<?php if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){	?>
				Fuente / Usuarios
			<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
				Font / Usuaris
			<?php }else{ //english ?>
				Medium / Single Users
			<?php }
    	}else{//Not activeQtrans ?>
        	Fuente / Usuarios
        <?php } ?>
    </h3>
	<div class="inside" id="analy_mediumusers">
    	<table class="analytics_results_tb">
		  <?php
			$ga->max_results = 10;
			$ga->requestReportData($ga_profile_id,array('Medium'),array('users'),array('-users'));
				foreach($ga->getResults() as $result){
					echo'<tr><td><strong>'.mediumpretty($result->getMedium()).'</strong></td><td>'.$result->getusers().'</td></tr>';
				}
			?>
        </table>
    </div>
    <div class="clear"></div>
</div>
<!-- Postbox -> Fonts -> Durada Visites -->
<div class="postbox postbox_single">
	<h3>
    	<?php if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){	?>
				Fuente / Tiempo de Visita
			<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
				Font / Temps de Visita
			<?php }else{ //english ?>
				Medium / Visit Time
			<?php }
    	}else{//Not activeQtrans ?>
        	Fuente / Tiempo de Visita
        <?php } ?>
    </h3>
	<div class="inside" id="analy_mediumduration">
    	<table class="analytics_results_tb">
		  <?php
			$ga->max_results = 10;
			$ga->requestReportData($ga_profile_id,array('Medium'),array('avgSessionDuration'),array('-avgSessionDuration'));
				foreach($ga->getResults() as $result){
					echo'<tr><td><strong>'.mediumpretty($result->getMedium()).'</strong></td><td>'.secondMinute($result->getavgSessionDuration()).'</td></tr>';
				}
			?>
        </table>
    </div>
    <div class="clear"></div>
</div>
<!-- Postbox -> Fonts -> Rebot -->
<div class="postbox postbox_single">
	<h3>
    	<?php if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){	?>
				Fuente / Rebote (%)
			<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
				Font / Rebot (%)
			<?php }else{ //english ?>
				Medium / BuenceRate (%)
			<?php }
    	}else{//Not activeQtrans ?>
        	Fuente / Rebote (%)
        <?php } ?>
    </h3>
	<div class="inside" id="analy_mediumduration">
    	<table class="analytics_results_tb">
		  <?php
			$ga->max_results = 10;
			$ga->requestReportData($ga_profile_id,array('Medium'),array('BounceRate'),array('BounceRate'));
				foreach($ga->getResults() as $result){
					echo'<tr><td><strong>'.mediumpretty($result->getMedium()).'</strong></td><td>'.floor($result->getBounceRate()).'</td></tr>';
				}
			
			?>
        </table>
    </div>
    <div class="clear"></div>
</div>
<div class="clear"></div>
<!-- Referrers -->
<div class="postbox postbox_double">
	<h3>
    	<?php if (function_exists('qtrans_getLanguage')){  
			if( qtrans_getLanguage() == 'es' ){	?>
				Páginas de Referencia
			<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
				Pàgines de Referència
			<?php }else{ //english ?>
				Referrers
			<?php }
    	}else{//Not activeQtrans ?>
        	Páginas de Referencia
        <?php } ?>
    </h3>
	<div class="inside" id="analy_referrers">
    	<table class="analytics_results_tb">
		  <?php
		  	$filter = 'fullReferrer !~ localhost && fullReferrer != (direct) && fullReferrer !~ google';
			$ga->max_results = 10;
			$ga->requestReportData($ga_profile_id,array('referralPath','fullReferrer'),array('pageviews'),array('-pageviews'),$filter);
				foreach($ga->getResults() as $result){
					echo'<tr><td><a href="http://'.$result->getfullReferrer().'" target="_blank"><div class="dashicons dashicons-welcome-view-site"></div></a> <strong>'.$result->getfullReferrer().'</strong></td><td>'.$result->getpageviews().'</td></tr>';
				}
			?>
        </table>
	</div>
    <div class="clear"></div>
</div>
<!-- Paraules Clau -> Visites -->
<div class="postbox postbox_single">
	<h3>
    	<?php if (function_exists('qtrans_getLanguage')){  
			if( qtrans_getLanguage() == 'es' ){	?>
				Palabras Clave / Visitas
			<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
				Paraules Clau / Visites
			<?php }else{ //english ?>
				KeyWords / Visits
			<?php }
    	}else{//Not activeQtrans ?>
        	Palabras Clave / Visitas
        <?php } ?>
    </h3>
	<div class="inside" id="analy_keywordsvisits">
    	<table class="analytics_results_tb">
		  <?php
		  	$filter = 'keyword != (not set) && keyword != (not provided)';
			$ga->max_results = 10;
			$ga->requestReportData($ga_profile_id,array('keyword'),array('PageViews'),array('-PageViews'),$filter);
				foreach($ga->getResults() as $result){
					echo('<tr><td><strong>'.$result->getKeyword().'</strong></td><td>'.$result->getPageViews()).'</td></tr>';
				}
			?>
        </table>
	</div>
    <div class="clear"></div>
</div>
<!-- Paraules Clau -> Rebot -->
<div class="postbox postbox_single">
	<h3>
    	<?php if (function_exists('qtrans_getLanguage')){  
			if( qtrans_getLanguage() == 'es' ){	?>
				Palabras Clave / Rebote (%)
			<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
				Paraules Clau / Rebot (%)
			<?php }else{ //english ?>
				KeyWords / Bounce (%)
			<?php }
    	}else{//Not activeQtrans ?>
        	Palabras Clave / Rebote (%)
        <?php } ?>
    </h3>
	<div class="inside" id="analy_keywordsbounce">
    	<table class="analytics_results_tb">
		  <?php
		  	$filter = 'keyword != (not set) && keyword != (not provided)';
			$ga->max_results = 10;
			$ga->requestReportData($ga_profile_id,array('keyword'),array('bounceRate'),array('bounceRate'),$filter);
				foreach($ga->getResults() as $result){
					echo('<tr><td><strong>'.$result->getKeyword().'</strong></td><td>'.$result->getbounceRate()).'</td></tr>';
				}
			?>
        </table>
	</div>
    <div class="clear"></div>
</div>
<div class="clear"></div>
<!-- Postbox -> Pagines Visitades -->
<div class="postbox postbox_double">
	<h3>
    	<?php if (function_exists('qtrans_getLanguage')){ 
			if( qtrans_getLanguage() == 'es' ){	?>
				Páginas más Visitadas
			<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
				Pàgines més Visitades
			<?php }else{ //english ?>
				Top hit Pages
			<?php }
    	}else{//Not activeQtrans ?>
        	Páginas más Visitadas
        <?php } ?>
    </h3>
	<div class="inside" id="analy_pagehits">
    	<table class="analytics_results_tb">
		  <?php
			$filter = 'Hostname =~ ' . $hostname;
			$ga->max_results = 16;
			$ga->requestReportData($ga_profile_id,array('pageTitle','Hostname','pagePath'),array('pageviews'),array('-pageviews'),$filter);
				foreach($ga->getResults() as $result){
					echo'<tr><td><a href="http://'.$result->getHostname().$result->getPagePath().'" target="_blank"><div class="dashicons dashicons-welcome-view-site"></div></a> <strong>'.$result->getPageTitle().'</strong></td><td>'.$result->getPageViews().'</td></tr>';
				}
			
			?>
        </table>
    </div>
    <div class="clear"></div>
</div>
<!-- Postbox -> Pagines Llegides -->
<div class="postbox postbox_double">
	<h3>
			<?php if (function_exists('qtrans_getLanguage')){  
            if( qtrans_getLanguage() == 'es' ){	?>
                Páginas más Leídas
            <?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
                Pàgines més Llegides
            <?php }else{ //english ?>
                Top read Pages
            <?php }
    	}else{//Not activeQtrans ?>
        	Páginas más Leídas
        <?php } ?>
    </h3>
	<div class="inside" id="analy_pageread">
    	<table class="analytics_results_tb">
		  <?php
			$filter = 'pageTitle !~ No encontramos && pageTitle !~ No trobem && pageTitle !~ / && Hostname =~  ' . $hostname;
			$ga->max_results = 16;
			$ga->requestReportData($ga_profile_id,array('pageTitle','Hostname','pagePath'),array('timeOnPage','pageviews','avgTimeOnPage'),array('-avgTimeOnPage'),$filter);
				foreach($ga->getResults() as $result){
					echo'<tr><td><a href="http://'.$result->getHostname().$result->getPagePath().'" target="_blank"><div class="dashicons dashicons-welcome-view-site"></div></a> <strong>'.$result->getPageTitle().'</strong></td><td>'.secondMinute($result->getavgTimeOnPage()).'</td></tr>';
				}
			
			?>
        </table>
    </div>
    <div class="clear"></div>
</div>
<div class="clear"></div>
<!-- Bloc 3: Demografia ************************************************************** -->
<!-- Postbox -> Mapamundi -->
<?php 
/* World -> Visits ******************************************************************************/
/* World -> Visits: Request */
$ga->requestReportData($ga_profile_id, array('country'),array('visits'),array('-visits'));    
$results = $ga->getResults();
//
?>
<script type="text/javascript">
 google.load('visualization', '1', {'packages': ['geochart']});
     google.setOnLoadCallback(drawMap1);
  function drawMap1() {
    var data = new google.visualization.DataTable();
    <!-- Create the data table -->
    data.addColumn('string', 'Country');
	data.addColumn('number', 'Visits');
    <!-- Fill the chart with the data pulled from Analtyics. Each row matches the order setup by the columns: day then pageviews -->
    data.addRows([
      <?php
      foreach($results as $result) {
          echo '["'.$result->getcountry().'", '.$result->getvisits().'],';
      }
      ?>
    ]);
	var options = {minValue: 0, colors: [<?php echo "'" . $ga_color_map1 . "' , '" . $ga_color_map2 . "'"; ?>] };
    var chart = new google.visualization.GeoChart(document.getElementById('analy_world'));
    chart.draw(data, options);
  }
</script>
<div class="postbox postbox_double">
	<h3>
    	<?php if (function_exists('qtrans_getLanguage')){  
			if( qtrans_getLanguage() == 'es' ){	?>
				Audiencia Mundial
			<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
				Aundiència Mundial
			<?php }else{ //english ?>
				World Visits
			<?php }
    	}else{//Not activeQtrans ?>
        	Audiencia Mundial
        <?php } ?>
    </h3>
	<div class="inside" id="analy_world">
    </div>
    <div class="clear"></div>
</div>
<!-- Postbox -> Pais -->
<div class="postbox postbox_single">
	<h3>
    	<?php if (function_exists('qtrans_getLanguage')){  
			if( qtrans_getLanguage() == 'es' ){	?>
				Audiencia por País
			<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
				Aundiència per País
			<?php }else{ //english ?>
				Visits per Country
			<?php }
    	}else{//Not activeQtrans ?>
        	Audiencia por País
        <?php } ?>
    </h3>
	<div class="inside" id="analy_country">
    	<table class="analytics_results_tb">
		  <?php
		  	$filter = 'Country != (not set)';
			$ga->max_results = 14;
			$ga->requestReportData($ga_profile_id,array('Country'),array('visits'),array('-visits'),$filter);
				foreach($ga->getResults() as $result){
					echo'<tr><td><strong>'.$result->getCountry().'</strong></td><td>'.$result->getvisits().'</td></tr>';
				}
			
			?>
        </table>
    </div>
    <div class="clear"></div>
</div>
<!-- Postbox -> Regio -->
<div class="postbox postbox_single">
	<h3>
    	<?php  if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){	?>
				Audiencia Regional
			<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
				Aundiència Regional
			<?php }else{ //english ?>
				Visits per Region
			<?php }
    	}else{//Not activeQtrans ?>
        	Audiencia Regional
        <?php } ?>
    </h3>
	<div class="inside" id="analy_region">
    	<table class="analytics_results_tb">
		  <?php
		  	$filter = 'Region != (not set)';
			$ga->max_results = 14;
			$ga->requestReportData($ga_profile_id,array('Region'),array('visits'),array('-visits'),$filter);
				foreach($ga->getResults() as $result){
					echo'<tr><td><strong>'.$result->getRegion().'</strong></td><td>'.$result->getvisits().'</td></tr>';
				}
			
			?>
        </table>
    </div>
    <div class="clear"></div>
</div>
<div class="clear"></div>
<!-- Postbox -> Mapa d'Espanya -->
<?php 
/* Spain -> Visits ******************************************************************************/
/* Spain -> Visits: Request */
$filter = 'Country == Spain && City != (not set)';
$ga->requestReportData($ga_profile_id, array('Country','City'),array('visits'),array('-visits'),$filter);    
$results = $ga->getResults();
//
?>
<script type="text/javascript">
 google.load('visualization', '1', {'packages': ['geochart']});
    google.setOnLoadCallback(drawMap2);
  	function drawMap2() {
    var data = new google.visualization.DataTable();
    <!-- Create the data table -->
    data.addColumn('string', 'City');
	data.addColumn('number', 'Visits');
    <!-- Fill the chart with the data pulled from Analtyics. Each row matches the order setup by the columns: day then pageviews -->
    data.addRows([
      <?php
      foreach($results as $result) {
          echo '["'.$result->getCity().'", '.$result->getvisits().'],';
      }
      ?>
    ]);
	var options = {minValue: 0, displayMode: 'markers',colors: [<?php echo "'" . $ga_color_map1 . "' , '" . $ga_color_map2 . "'"; ?>], height:300, region: 'ES' };
    var chart = new google.visualization.GeoChart(document.getElementById('analy_spain'));
    chart.draw(data, options);
	google.visualization.events.addListener(chart, 'ready', myReadyHandler);
  }
  function myReadyHandler() {jQuery('#analytics_loader').html('');}
</script>
<div class="postbox postbox_double">
	<h3>
    	<?php if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){	?>
				Audiencia Nacional
			<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
				Aundiència Nacional
			<?php }else{ //english ?>
				Spanish Visits
			<?php }
    	}else{//Not activeQtrans ?>
        	Audiencia Nacional
        <?php } ?>
    </h3>
	<div class="inside" id="analy_spain">
    	
    </div>
    <div class="clear"></div>
</div>
<!-- Postbox -> Ciutat -->
<div class="postbox postbox_single">
	<h3>
    	<?php if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){	?>
				Audiencia por Ciudad
			<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
				Aundiència per Ciutat
			<?php }else{ //english ?>
				Visits per City
			<?php }
    	}else{//Not activeQtrans ?>
        	Audiencia por Ciudad
        <?php } ?>
    </h3>
	<div class="inside" id="analy_city">
    	<table class="analytics_results_tb">
		  <?php
		  	$filter = 'City != (not set)';
			$ga->max_results = 12;
			$ga->requestReportData($ga_profile_id,array('City'),array('visits'),array('-visits'),$filter);
				foreach($ga->getResults() as $result){
					echo'<tr><td><strong>'.$result->getCity().'</strong></td><td>'.$result->getvisits().'</td></tr>';
				}
			
			?>
        </table>
    </div>
    <div class="clear"></div>
</div>
<!-- Postbox -> Rebot / Ciutat -->
<div class="postbox postbox_single">
	<h3>
    	<?php if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){	?>
				Ciudad / Tiempo de Visita
			<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
				Ciutat / Temps de Visita
			<?php }else{ //english ?>
				City / Session Duration
			<?php }
    	}else{//Not activeQtrans ?>
        	Ciudad / Tiempo de Visita
        <?php } ?>
    </h3>
	<div class="inside" id="analy_cityduration">
    	<table class="analytics_results_tb">
		  <?php
		  	$filter = 'City != (not set)';
			$ga->max_results = 12;
			$ga->requestReportData($ga_profile_id,array('City'),array('avgSessionDuration'),array('-avgSessionDuration'),$filter);
				foreach($ga->getResults() as $result){
					echo'<tr><td><strong>'.$result->getCity().'</strong></td><td>'.secondMinute($result->getavgSessionDuration()).'</td></tr>';
				}
			
			?>
        </table>
    </div>
    <div class="clear"></div>
</div>
<div class="clear"></div>
<!-- Bloc 4: Social ************************************************************** -->
<!-- Social -> Fuentes de tráfico -->
<div class="postbox postbox_single">
	<h3>
    	<?php if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){	?>
				Social: Tráfico
			<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
				Social: Tràfic
			<?php }else{ //english ?>
				Social: Visits
			<?php }
    	}else{//Not activeQtrans ?>
        	Social: Tráfico
        <?php } ?>
    </h3>
	<div class="inside" id="analy_social_sources">
    	<table class="analytics_results_tb">
		  <?php
		  	$filter = 'source == twitter.com || source == t.co || source == hootsuite || source == tweetdeck || source == bit.ly || source == facebook.com || source == m.facebook.com || source == l.facebook.com || source == plus.url.google.com || source == plus.google.com || source == tumblr.com  || source == pinterest  || source == instagram || source == linkedin || source == youtube || source == reddit || source == digg || source == delicious || source == stumbleupon || source == ycombinator || source == flickr || source == myspace || source == popurls';
			$ga->max_results = 10;
			$ga->requestReportData($ga_profile_id,array('source'),array('pageviews'),array('-pageviews'),$filter);
				foreach($ga->getResults() as $result){
					echo('<tr><td><div class="dashicons dashicons-arrow-right"></div> <strong>'.$result->getsource().'</strong></td><td>'.$result->getPageViews()).'</td></tr>';
				}
			?>
        </table>
	</div>
    <div class="clear"></div>
</div>
<!-- Social -> Porcentaje de Rebote -->
<div class="postbox postbox_single">
	<h3>
    	<?php if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){	?>
				Social: Rebote (%)
			<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
				Social: Rebot (%)
			<?php }else{ //english ?>
				Social: Bounce (%)
			<?php }
    	}else{//Not activeQtrans ?>
        	Social: Rebote (%)
        <?php } ?>
    </h3>
	<div class="inside" id="analy_social_bounce">
    	<table class="analytics_results_tb">
		  <?php
		  	$filter = 'source == twitter.com || source == t.co || source == hootsuite || source == tweetdeck || source == bit.ly || source == facebook.com || source == m.facebook.com || source == l.facebook.com || source == plus.url.google.com || source == plus.google.com || source == tumblr.com  || source == pinterest  || source == instagram || source == linkedin || source == youtube || source == reddit || source == digg || source == delicious || source == stumbleupon || source == ycombinator || source == flickr || source == myspace || source == popurls';
			$ga->max_results = 10;
			$ga->requestReportData($ga_profile_id,array('source'),array('BounceRate'),array('BounceRate'), $filter);
				foreach($ga->getResults() as $result){
					echo('<tr><td><div class="dashicons dashicons-arrow-right"></div> <strong>'.$result->getsource().'</strong></td><td>'.$result->getBounceRate()).'</td></tr>';
				}
			
			?>
        </table>
	</div>
    <div class="clear"></div>
</div>
<!-- Social -> Dia de Visita -->
<div class="postbox postbox_single">
	<h3>
    	<?php if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){	?>
				Social: Día
			<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
				Social: Dia
			<?php }else{ //english ?>
				Social: Day
			<?php }
        }else{//Not activeQtrans ?>
        	Social: Día
        <?php } ?>
    </h3>
	<div class="inside" id="analy_social_day">
    	<table class="analytics_results_tb">
		  <?php
		  	$filter = 'source == twitter.com || source == t.co || source == hootsuite || source == tweetdeck || source == bit.ly || source == facebook.com || source == m.facebook.com || source == l.facebook.com || source == plus.url.google.com || source == plus.google.com || source == tumblr.com  || source == pinterest  || source == instagram || source == linkedin || source == youtube || source == reddit || source == digg || source == delicious || source == stumbleupon || source == ycombinator || source == flickr || source == myspace || source == popurls';
			$ga->max_results = 7;
			$ga->requestReportData($ga_profile_id,array('dayOfWeek'),array('pageviews'),array('-pageviews'), $filter);
				foreach($ga->getResults() as $result){
					echo('<tr><td><strong>'.dayoftheWeek($result->getdayOfWeek()).'</strong></td><td>'.$result->getPageViews()).'</td></tr>';
				}
			
			?>
        </table>
	</div>
    <div class="clear"></div>
</div>
<!-- Social -> Hora de Visita -->
<div class="postbox postbox_single">
	<h3>
    	<?php if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){	?>
				Social: Hora
			<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
				Social: Hora
			<?php }else{ //english ?>
				Social: Hour
			<?php }
        }else{//Not activeQtrans ?>
        	Social: Hora
        <?php } ?>
    </h3>
	<div class="inside" id="analy_social_hour">
    	<table class="analytics_results_tb">
		  <?php
		  	$filter = 'source == twitter.com || source == t.co || source == hootsuite || source == tweetdeck || source == bit.ly || source == facebook.com || source == m.facebook.com || source == l.facebook.com || source == plus.url.google.com || source == plus.google.com || source == tumblr.com  || source == pinterest  || source == instagram || source == linkedin || source == youtube || source == reddit || source == digg || source == delicious || source == stumbleupon || source == ycombinator || source == flickr || source == myspace || source == popurls';
			$ga->max_results = 7;
			$ga->requestReportData($ga_profile_id,array('hour'),array('pageviews'),array('-pageviews'), $filter);
				foreach($ga->getResults() as $result){
					echo('<tr><td><strong>'.$result->gethour().' h</strong></td><td>'.$result->getPageViews()).'</td></tr>';
				}
			
			?>
        </table>
	</div>
    <div class="clear"></div>
</div>
<div class="clear"></div>
<!-- Social -> Interacción -> Página -->
<div class="postbox postbox_single">
	<h3>
    	<?php if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){	
				$sharedpage = 'Página Compartida ';
				$nosocial = 'No hay actividad social'; ?>
				Social: Interacción > Página
			<?php }elseif( qtrans_getLanguage() == 'ca' ){ 
				$sharedpage = 'Pàgina Compartida ';
				$nosocial = 'No hi ha activitat social'; ?>
				Social: Interacció > Pàgina
			<?php }else{ //english 
				$sharedpage = 'Shared Page ';
				$nosocial = 'No social activity'; ?>
				Social: Activity > Page
			<?php }
        }else{//Not activeQtrans 
			$nosocial = 'No hay actividad social';?>
        	Social: Interacción > Página
        <?php } ?>
    </h3>
	<div class="inside" id="analy_social_actionurl">
    	<table class="analytics_results_tb">
		  <?php
			$ga->max_results = 10;
			$ga->requestReportData($ga_profile_id,array('socialActivityContentUrl'),array('socialActivities'),array('-socialActivities'));
				if ($ga->getResults()){
					$i = 1;
					foreach($ga->getResults() as $result){
						if ($result->getsocialActivities() == 0){
							echo'<tr><td><strong><div class="dashicons dashicons-dismiss"></div> '.$nosocial.'</strong></td></tr>';	
							break;
						}else{
							echo('<tr><td><strong><a href="http://'.$result->getsocialActivityContentUrl().'" target="_blank"><div class="dashicons dashicons-welcome-view-site"></div></a> '.$sharedpage.$i.'</strong></td><td>'.$result->getsocialActivities()).'</td></tr>';
							$i++;
						}
					}
				}else{
					echo'<tr><td><strong><div class="dashicons dashicons-dismiss"></div> '.$nosocial.'</strong></td></tr>';	
				}
			?>
        </table>
	</div>
    <div class="clear"></div>
</div>
<!-- Social -> Interacción -> Usuarios -->
<div class="postbox postbox_single">
	<h3>
    	<?php if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){	
				$activeuser = 'Usuario '; 
				$nosocial = 'No hay actividad social'; ?>
				Social: Interacción > Usuarios
			<?php }elseif( qtrans_getLanguage() == 'ca' ){ 
				$activeuser = 'Usuari ';
				$nosocial = 'No hi ha activitat social'; ?>
				Social: Interacció > Usuaris
			<?php }else{ //english 
				$activeuser = 'User';
				$nosocial = 'No social activity'; ?>
				Social: Activity > Users
			<?php }
        }else{//Not activeQtrans 
			$nosocial = 'No hay actividad social';?>
        	Social: Interacción > Página
        <?php } ?>
    </h3>
	<div class="inside" id="analy_social_actionuser">
    	<table class="analytics_results_tb">
		  <?php
			$ga->max_results = 10;
			$ga->requestReportData($ga_profile_id,array('socialActivityUserProfileUrl'),array('socialActivities'),array('-socialActivities'));
				if ($ga->getResults()){
					$i = 1;
					foreach($ga->getResults() as $result){
						if ($result->getsocialActivities() == 0){
							echo'<tr><td><strong><div class="dashicons dashicons-dismiss"></div> '.$nosocial.'</strong></td></tr>';	
							break;
						}else{
							echo('<tr><td><strong><a href="http://'.$result->getsocialActivityUserProfileUrl().'" target="_blank"><div class="dashicons dashicons-admin-users"></div></a> '.$activeuser.$i.'</strong></td><td>'.$result->getsocialActivities()).'</td></tr>';
							$i++;
						}
					}
				}else{
					echo'<tr><td><strong><div class="dashicons dashicons-dismiss"></div> '.$nosocial.'</strong></td></tr>';
				}
			?>
        </table>
	</div>
    <div class="clear"></div>
</div>
<!-- Social -> Interacción -> Red -->
<div class="postbox postbox_single">
	<h3>
    	<?php if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){	
				$nosocial = 'No hay actividad social'; ?>
				Social: Interacción > Red
			<?php }elseif( qtrans_getLanguage() == 'ca' ){
				$nosocial = 'No hi ha activitat social'; ?>
				Social: Interacció > Xarxa
			<?php }else{ //english 
				$nosocial = 'No social activity'; ?>
				Social: Activity > Network
			<?php }
        }else{//Not activeQtrans 
			$nosocial = 'No hay actividad social'; ?>
        	Social: Interacción > Red
        <?php } ?>
    </h3>
	<div class="inside" id="analy_social_actionnet">
    	<table class="analytics_results_tb">
		  <?php
			$ga->max_results = 10;
			$ga->requestReportData($ga_profile_id,array('socialActivityNetworkAction'),array('socialActivities'),array('-socialActivities'));
				if ($ga->getResults()){
					foreach($ga->getResults() as $result){
						if ($result->getsocialActivities() == 0){
							echo'<tr><td><strong><div class="dashicons dashicons-dismiss"></div> '.$nosocial.'</strong></td></tr>';	
							break;
						}else{
							echo('<tr><td><strong>'.$result->getsocialActivityNetworkAction().'</strong></td><td>'.$result->getsocialActivities()).'</td></tr>';
						}
					}
				}else{
					echo'<tr><td><strong><div class="dashicons dashicons-dismiss"></div> '.$nosocial.'</strong></td></tr>';
				}
			?>
        </table>
	</div>
    <div class="clear"></div>
</div>
<!-- Social -> Interacción -> Hora -->
<div class="postbox postbox_single">
	<h3>
    	<?php if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){	
				$nosocial = 'No hay actividad social'; ?>
				Social: Interacción > Hora
			<?php }elseif( qtrans_getLanguage() == 'ca' ){ 
				$nosocial = 'No hi ha activitat social'; ?>
				Social: Interacció > Hora
			<?php }else{ //english 
				$nosocial = 'No social activity'; ?>
				Social: Activity > Time
			<?php }
        }else{//Not activeQtrans 
			$nosocial = 'No hay actividad social';?>
        	Social: Interacción > Hora
        <?php } ?>
    </h3>
	<div class="inside" id="analy_social_actiontime">
    	<table class="analytics_results_tb">
		  <?php
			$ga->max_results = 10;
			$ga->requestReportData($ga_profile_id,array('socialActivityTimestamp'),array('socialActivities'),array('-socialActivities'));
				if ($ga->getResults()){
					foreach($ga->getResults() as $result){
						if ($result->getsocialActivities() == 0){
							echo'<tr><td><strong><div class="dashicons dashicons-dismiss"></div> '.$nosocial.'</strong></td></tr>';	
							break;
						}else{
						echo('<tr><td><strong>'.$result->getsocialActivityTimestamp().'</strong></td><td>'.$result->getsocialActivities()).'</td></tr>';
						}
					}
				}else{
					echo'<tr><td><strong><div class="dashicons dashicons-dismiss"></div> '.$nosocial.'</strong></td></tr>';
				}
			?>
        </table>
	</div>
    <div class="clear"></div>
</div>
<div class="clear"></div>
<!-- Bloc 5: Tècnics i Varis ************************************************************** -->
<!-- Postbox -> Dispositius -->
<?php 
/* Device: Request */
$ga->requestReportData($ga_profile_id, array('deviceCategory'),array('visits'),array('-visits'));    
$results = $ga->getResults();
//
?>
<div class="postbox postbox_single">
	<h3>
    	<?php if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){	?>
				Tipo de Dispositivo
			<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
				Tipus de Dispositiu
			<?php }else{ //english ?>
				Device Category
			<?php }
        }else{//Not activeQtrans ?>
        	Tipo de Dispositivo
        <?php } ?>
    </h3>
	<div class="inside" id="analy_devices">
    	<?php
		$filter = '';
		$ga->max_results = 10;
		$ga->requestReportData($ga_profile_id,array('deviceCategory'),array('visits'),array('-visits'),$filter);
			foreach($ga->getResults() as $result){
				$visits = $ga->getVisits();
				$devicevisits = $result->getvisits();
				if ($result->getdeviceCategory()=='desktop'){ echo'<span class="analytics_results_bigdata"><span><span class="device"><div class="dashicons dashicons-desktop"></div><b>'.$result->getdeviceCategory().'</b></span>'; percent($devicevisits, $visits); echo '<i>%</i></span></span><div class="clear"></div>';}
				elseif($result->getdeviceCategory()=='tablet'){  echo'<span class="analytics_results_bigdata"><span><span class="device"><div class="dashicons dashicons-tablet"></div><b>'.$result->getdeviceCategory().'</b></span>'; percent($devicevisits, $visits); echo '<i>%</i></span></span><div class="clear"></div>';}
				elseif($result->getdeviceCategory()=='mobile'){  echo'<span class="analytics_results_bigdata"><span><span class="device"><div class="dashicons dashicons-smartphone"></div><b>'.$result->getdeviceCategory().'</b></span>'; percent($devicevisits, $visits); echo '<i>%</i></span></span><div class="clear"></div>';}
			}
		?>
    </div>
    <div class="clear"></div>
</div>
<!-- Postbox -> Navegador -->
<div class="postbox postbox_single">
	<h3>
    	<?php if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){	?>
				Navegador
			<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
				Navegador
			<?php }else{ //english ?>
				Browser
			<?php }
        }else{//Not activeQtrans ?>
        	Navegador
        <?php } ?>
    </h3>
	<div class="inside" id="analy_browser">
    	<table class="analytics_results_tb">
		  <?php
		  	$filter = 'browser != (not set)';
			$ga->max_results = 10;
			$ga->requestReportData($ga_profile_id,array('browser'),array('visits'),array('-visits'),$filter);
				foreach($ga->getResults() as $result){
					echo'<tr><td><strong>'.$result->getbrowser().'</strong></td><td>'.$result->getvisits().'</td></tr>';
				}
			
			?>
        </table>
    </div>
    <div class="clear"></div>
</div>
<!-- Postbox -> Carga por Visita -->
<div class="postbox postbox_single">
	<h3>
    	<?php if (function_exists('qtrans_getLanguage')){ 
			if( qtrans_getLanguage() == 'es' ){	?>
				Valor Monetario Total
			<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
				Valor Monetari Total
			<?php }else{ //english ?>
				Total Value
			<?php }
        }else{//Not activeQtrans ?>
        	Valor Monetario Total
        <?php } ?>
    </h3>
	<div class="inside" id="analy_value">
		<?php
		$filter = '';
		echo '<span class="analytics_results_bigdata"><em>' . number_format($value_tot, 1) . '</em><i>&euro;</i></span>';?>
        <span class="analytics_results_smalldata <?php if ($prev_value_tot < $value_tot){ echo 'green">'; amount_percent($prev_value_tot, $value_tot); echo '<i>%</i>';}elseif ($prev_value_tot > $value_tot){echo 'red">';amount_percent($prev_value_tot, $value_tot); echo '<i>%</i>';}elseif ($value_tot == $prev_value_tot){echo '"> - </span>';}?>
        </span>
    </div>
    <div class="clear"></div>
</div>
<!-- Postbox -> Valor por Visita -->
<div class="postbox postbox_single">
	<h3>
    	<?php if (function_exists('qtrans_getLanguage')){ 
			if( qtrans_getLanguage() == 'es' ){	?>
				Valor Monetario por Visita
			<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
				Valor Monetari per Visita
			<?php }else{ //english ?>
				Money Visit Value
			<?php }
        }else{//Not activeQtrans ?>
        	Valor Monetario por Visita
        <?php } ?>
    </h3>
	<div class="inside" id="analy_value">
		<?php
		$filter = '';
		echo '<span class="analytics_results_bigdata">' . number_format($value, 2) . '<i>&euro;</i></span>';
        ?>
        <span class="analytics_results_smalldata <?php if ($prev_value < $value){ echo 'green">'; amount_percent($prev_value, $value); echo '<i>%</i>';}elseif ($prev_value > $value){echo 'red">';amount_percent($prev_value, $value); echo '<i>%</i>';}elseif ($value == $prev_value){echo '"> - </span>';}?>
        </span>
    </div>
    <div class="clear"></div>
</div>
<?php
//
//
//
//
/*
$ga->requestReportData($ga_profile_id, array('date'),array('pageviews', 'uniquePageviews', 'exitRate', 'avgTimeOnPage', 'entranceBounceRate', 'newVisits'), 'date');
$results = $ga->getResults();
echo '<div id="page-analtyics">';
foreach($results as $result) {
    echo '<div class="metric"><span class="label">Pageviews</span><br /><strong>'.number_format($result->getPageviews()).'</strong></div>';
    echo '<div class="metric"><span class="label">Unique pageviews</span><br /><strong>'.number_format($result->getUniquepageviews()).'</strong></div>';
    echo '<div class="metric"><span class="label">Avg time on page</span><br /><strong>'.secondMinute($result->getAvgtimeonpage()).'</strong></div>';
    echo '<div class="metric"><span class="label">Bounce rate</span><br /><strong>'.round($result->getEntrancebouncerate(), 2).'%</strong></div>';
    echo '<div class="metric"><span class="label">Exit rate</span><br /><strong>'.round($result->getExitrate(), 2).'%</strong></div>';
    echo '<div style="clear: left;"></div>';
}
echo '</div>';
//
<!-- Area Visits: Create graph -->
<div class="postbox postbox_single">
	<h3>
    	<?php 
		if( qtrans_getLanguage() == 'es' ){	?>
			Visitas Mensuales Totales
		<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
			Visites Mensuals Totals
		<?php }else{ //english ?>
			Total Monthly Hits
		<?php } ?>
    </h3>
	<div class="inside" id="analy_visits">
    	<span class="analytics_results_bigdata">50<i>%</i></span>
        <span class="analytics_results_smalldata "> + 90%</span>
    </div>
    <div class="clear"></div>
</div><!-- Create a new chart and plot the pageviews for each day -->
//
*/
?>
<div class="clear"></div>
<script type="text/javascript">
// Resizable Charts
var resizeTimer;
jQuery(window).resize(function(){
    if (resizeTimer) clearTimeout(resizeTimer);
    resizeTimer = setTimeout(function() {
		drawChart1();
		drawMap1();
		drawMap2();
    }, 200)
});

</script>