 <?php 

    //$user = "Ricardo González";
    $locationsSESSION = [array("name" => "Pirineos I", 
                        "employees" => 334,
                        // DAILY ENTRIES 
                        "today_entries" => 330,
                        "today_temps_sum" => 6500, 
                        "today_low_temps" => 10,
                        "today_norm_temps" => 310,
                        "today_hi_temps" => 10),
                        
                  array("name" => "Mosusa XTD", 
                        "employees" => 225, 
                        // DAILY ENTRIES 
                        "today_entries" => 220, 
                        "today_temps_sum" => 1000, 
                        "today_low_temps" => 10,
                        "today_norm_temps" => 310,
                        "today_hi_temps" => 10)];

    $totalN_employees = 0;
    $totalN_entries = 0;
    $totalN_low_temps = 0;
    $totalN_avg_temps = 0;
    $totalN_hi_temps = 0;

    $totalS_temps = 0;

    $i = 0;

    foreach($locationsSESSION as $location) {
        $totalN_employees += $location['employees'];
        $totalN_entries  += $location['today_entries'];
        
         // accumulators
        $totalN_low_temps += $location["today_low_temps"];
        $totalN_avg_temps += $location["today_norm_temps"];
        $totalN_hi_temps += $location["today_hi_temps"];

        $totalS_temps += $location["today_temps_sum"];

        $i++;

    }
    $todayG_avg_temp = $totalS_temps /  $totalN_entries;
    $todayG_avg_temp = number_format($todayG_avg_temp, 2);


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>iTemp</title>
        
        <link rel="stylesheet" href="<?= URL?>public/css/image-picker.css">
        <link rel="stylesheet" href="<?= URL?>public/css/general.css" />
        <link rel="stylesheet" href="<?= URL?>public/css/classic.css" />
        <link rel="icon" href="<?= URL?>public/img/image-naranja.png">
        
    </head>