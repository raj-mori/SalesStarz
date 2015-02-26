<?php
$week_to = date('Y-m-d', strtotime("monday this week"));
$week_from = date('Y-m-d', strtotime("sunday this week"));

$week_data = q("Select sum(total_stripe_payment)as total from customer where Date(modified_at) >= '{$week_to}' AND Date(modified_at) <= '{$week_from}'");

$month_to = date('Y-m-d', strtotime("first day of this month"));
$month_from = date('Y-m-d', strtotime("last day of this month"));

$month_data = q("Select sum(total_stripe_payment)as total from customer where Date(modified_at) >= '{$month_to}' AND Date(modified_at) <= '{$month_from}'");

$year_to = date('Y-m-d', strtotime("first day of january this year"));
$year_from = date('Y-m-d', strtotime("last day of december this year"));


$year_data = q("Select sum(total_stripe_payment)as total from customer where Date(modified_at) >= '{$year_to}' AND Date(modified_at) <= '{$year_from}'");

?>

<div style="" class="dashboardFigures">
    <div style="width:30%;float:left;height:107px;border-right:1px dotted #21789D"> 
        <h3 style="text-align:center"> $<?php print $week_data[0]['total']* 40; ?>  </h3> 
        <div style="text-align:center;font-size:large">Sales by Week</div>
    </div>
    <div style="width:30%;float:left;height:107px;border-right:1px dotted #21789D">
        <h3 style="text-align:center">$<?php print $month_data[0]['total']* 40; ?></h3>
        <div style="text-align:center;font-size:large">Sales by Month</div>
    </div>
    <div style="width:30%;float:left;height:107px">
        <h3 style="text-align:center">$<?php print $year_data[0]['total']* 40; ?></h3>
        <div style="text-align:center;font-size:large">Sales by Year</div>
    </div>
</div>
