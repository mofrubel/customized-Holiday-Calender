<style type="text/css" >
	.myweekend span.ui-state-default { color: red; }
	
	.Highlighted a{
	   background-color : Green !important;
	   background-image :none !important;
	   color: White !important;
	   font-weight:bold !important;
	   font-size: 12pt;
	}	
	.ui-datepicker-month{
		color: #2E3192;
	}
	.ui-datepicker-year{
		color: #2E3192;
	}
	​
</style>

<?php 	
		/* ---- choice day value between 0~6 (Sunday ~ Saturday) ----- */
		$first_weekend = "5"; //for Friday day value is 5
		$second_weekend = "6"; //for Saturday day value is 6

		/* --- Define All Holidays as you wish ---- */
		$all_holiday_dates = array(
								'0' => '2015-01-04', //4th Jan 2015 (Eid-e Miladunabih holiday)
								'0' => '2015-02-21', //21th Feb 2015 (Shahid Dibash (Language Martyrs' Day))
								'1' => '2015-04-26', // 26th March 2015 (BD Indipendance Day)
								'2' => '2015-12-16', // 16th December 2015 (BD Victory Day )
								'3' => '2015-12-25', // 25th December 2015 (Christmas day )
								);

	

?>
<label for="datepicker">Date:</label>
<input type="text" class="datepicker" id="date" placeholder="Enter Date here">


<script src="http://code.jquery.com/jquery-1.7.2.js"></script>
<script src="http://code.jquery.com/ui/1.8.18/jquery-ui.js"></script>

<!-- for weekend selector -->
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

<script>

$(function() 
    {
	    var first_weekend = "<?php echo $first_weekend;?>";
	   	var second_weekend = "<?php echo $second_weekend;?>";
	   	
	    var array = <?php echo json_encode($all_holiday_dates)?>
	   	

		$('#date').datepicker({dateFormat: 'dd/mm/yy',firstDay: 6,
		    beforeShowDay: function(date){
		        var string = jQuery.datepicker.formatDate('yy-mm-dd', date);		        
	        	var weekend = date.getDay() == first_weekend || date.getDay() == second_weekend;

	        	return [ array.indexOf(string) == -1 && !weekend, weekend ? 'myweekend' : '']	        
		        
		    }
		});	

	});

</script>
