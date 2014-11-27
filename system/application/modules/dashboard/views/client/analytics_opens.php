<?php if($_GET['branch_id']):?>
<?php

$branch_id = $_GET['branch_id'];
$analytics_inter = Modules::run('events/analytics','get','',array('type'=>'open','business_id'=>$branch_id));

$analytics_jan = Modules::run('events/analytics','get',array('month'=>'01','year'=>'2014'),$analytics_inter->result());
$analytics_feb = Modules::run('events/analytics','get',array('month'=>'02','year'=>'2014'),$analytics_inter->result());
$analytics_mar = Modules::run('events/analytics','get',array('month'=>'03','year'=>'2014'),$analytics_inter->result());
$analytics_apr = Modules::run('events/analytics','get',array('month'=>'04','year'=>'2014'),$analytics_inter->result());
$analytics_may = Modules::run('events/analytics','get',array('month'=>'05','year'=>'2014'),$analytics_inter->result());
$analytics_jun = Modules::run('events/analytics','get',array('month'=>'06','year'=>'2014'),$analytics_inter->result());
$analytics_jul = Modules::run('events/analytics','get',array('month'=>'07','year'=>'2014'),$analytics_inter->result());
$analytics_aug = Modules::run('events/analytics','get',array('month'=>'08','year'=>'2014'),$analytics_inter->result());
$analytics_sep = Modules::run('events/analytics','get',array('month'=>'09','year'=>'2014'),$analytics_inter->result());
$analytics_oct = Modules::run('events/analytics','get',array('month'=>'10','year'=>'2014'),$analytics_inter->result());
$analytics_nov = Modules::run('events/analytics','get',array('month'=>'11','year'=>'2014'),$analytics_inter->result());
$analytics_dec = Modules::run('events/analytics','get',array('month'=>'12','year'=>'2014'),$analytics_inter->result());
// $analytics_year = Modules::run('events/analytics','get',array('month'=>'01','year'=>'2014'),$analytics_inter->result());
$analytics_max = max(

						$analytics_jan,
						$analytics_feb,
						$analytics_mar,
						$analytics_apr,
						$analytics_may,
						$analytics_jun,
						$analytics_jul,
						$analytics_aug,
						$analytics_sep,
						$analytics_oct,
						$analytics_nov,
						$analytics_dec

						);




?>


<div class="chart-bar col-lg-6">
	<div class="title">  Opens </div>

	<?php for($i=1; $i <= 12; $i++):?>
	<div class="bar-bg">

		<?php

			// Bar color 

			$bar_color = "";
			$bar_value = 0;
			$month_value = 0;

			if($i==1 || $i==5 || $i==9)
			{
				$bar_color = "bar-1";
			}
			elseif($i==2 || $i==6 || $i==10)
			{
				$bar_color = "bar-2";
			}
			elseif($i==3 || $i==7 || $i==11)
			{
				$bar_color = "bar-3";
			}
			elseif($i==4 || $i==8 || $i==12)
			{
				$bar_color = "bar-4";
			}

			if(count($analytics_inter->result())>0)
			{
				// Bar value
				switch($i) {
					case '1':
						$bar_value = $analytics_jan * 100 / $analytics_max;
						$month_value = $analytics_jan;
						break;
					case '2':
						$bar_value = $analytics_feb * 100 / $analytics_max;
						$month_value = $analytics_feb;
						break;
					case '3':
						$bar_value = $analytics_mar * 100 / $analytics_max;
						$month_value = $analytics_mar;
						break;
					case '4':
						$bar_value = $analytics_apr * 100 / $analytics_max;
						$month_value = $analytics_apr;
						break;
					case '5':
						$bar_value = $analytics_may * 100 / $analytics_max;
						$month_value = $analytics_may;
						break;
					case '6':
						$bar_value = $analytics_jun * 100 / $analytics_max;
						$month_value = $analytics_jun;
						break;
					case '7':
						$bar_value = $analytics_jul * 100 / $analytics_max;
						$month_value = $analytics_jul;
						break;
					case '8':
						$bar_value = $analytics_aug * 100 / $analytics_max;
						$month_value = $analytics_aug;
						break;
					case '9':
						$bar_value = $analytics_sep * 100 / $analytics_max;
						$month_value = $analytics_sep;
						break;
					case '10':
						$bar_value = $analytics_oct * 100 / $analytics_max;
						$month_value = $analytics_oct;
						break;
					case '11':
						$bar_value = $analytics_nov * 100 / $analytics_max;
						$month_value = $analytics_nov;
						break;
					case '12':
						$bar_value = $analytics_dec * 100 / $analytics_max;
						$month_value = $analytics_dec;
						break;
					
					default:
						# code...
						break;
				}
			}

		?>
		<div class="bar <?php echo $bar_color;?> tooltips" title="<?php echo $month_value;?>" height="<?php echo $bar_value;?>" data-placement="top" data-trigger="hover">
			
		</div>
	</div>
	<?php endfor;?>

	
	<div class="chart-bar-label-x text-center">
		<?php for ($i=1; $i <= 12 ; $i++):?>
			<div class="label">
				<?php echo $i;?>
			</div>
		<?php endfor;?>
	</div>
</div>
<?php endif;?>