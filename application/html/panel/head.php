<?php
    $user = "Ricardo González";
    $locations = [array("name" => "Pirineos I", 
                        "employees" => 334,
                        // DAILY ENTRIES 
                        "today_entries" => 330,
                        "today_temps_sum" => 6500, 
                        "today_low_temps" => 10,
                        "today_avg_temps" => 310,
                        "today_hi_temps" => 10,
                        // WEEKLY ENTRIES
                        "mondayN_low_temp" => 25,
                        "mondayN_avg_temp" => 50,
                        "mondayN_hi_temp" => 50,
                        "tuesdayN_low_temp" => 28,
                        "tuesdayN_avg_temp" => 37,
                        "tuesdayN_hi_temp" => 25,
                        "wednesdayN_low_temp" => 35.54,
                        "wednesdayN_avg_temp" => 35.54,
                        "wednesdayN_hi_temp" => 35.54,
                        "thursdayN_low_temp" => 37.54,
                        "thursdayN_avg_temp" => 37.54,
                        "thursdayN_hi_temp" => 37.54,
                        "fridayN_low_temp" => 35.54,
                        "fridayN_avg_temp" => 35.54,
                        "fridayN_hi_temp" => 35.54,
                        "saturdayN_low_temp" => 32.8,
                        "saturdayN_avg_temp" => 32.8,
                        "saturdayN_hi_temp" => 32.8,
                        "sundayN_low_temp" => 35.54,
                        "sundayN_avg_temp" => 35.54,
                        "sundayN_hi_temp" => 35.54),
                        
                  array("name" => "Mosusa XTD", 
                        "employees" => 225, 
                        "entries" => 220, 
                        // DAILY ENTRIES 
                        "today_entries" => 330, 
                        "today_temps_sum" => 1000, 
                        "today_low_temps" => 10,
                        "today_avg_temps" => 310,
                        "today_hi_temps" => 10,
                        // WEEKLY ENTRIES
                        "mondayN_low_temp" => 25,
                        "mondayN_avg_temp" => 50,
                        "mondayN_hi_temp" => 50,
                        "tuesdayN_low_temp" => 28,
                        "tuesdayN_avg_temp" => 37,
                        "tuesdayN_hi_temp" => 25,
                        "wednesdayN_low_temp" => 35.54,
                        "wednesdayN_avg_temp" => 35.54,
                        "wednesdayN_hi_temp" => 35.54,
                        "thursdayN_low_temp" => 37.54,
                        "thursdayN_avg_temp" => 37.54,
                        "thursdayN_hi_temp" => 37.54,
                        "fridayN_low_temp" => 35.54,
                        "fridayN_avg_temp" => 35.54,
                        "fridayN_hi_temp" => 35.54,
                        "saturdayN_low_temp" => 32.8,
                        "saturdayN_avg_temp" => 32.8,
                        "saturdayN_hi_temp" => 32.8,
                        "sundayN_low_temp" => 35.54,
                        "sundayN_avg_temp" => 35.54,
                        "sundayN_hi_temp" => 35.54)];

    $todayG_avg_temp = 0;
    $total_employees = 0;
    $today_entries = 0;
    $today_avg_temp = 0;

    $totalN_low_temps = 0;
    $totalN_avg_temps = 0;
    $totalN_hi_temps = 0;

    $todayGP_low_temps = 0;
    $todayGP_avg_temps = 0;
    $todayGP_hi_temps  = 0;

    $i = 0.0;

    foreach($locations as $location) {
        $total_employees += $location['employees'];
        $today_entries += $location['entries'];
        
        // averages
        $todayG_avg_temp += $location["today_temps_sum"];
        $monday_avg_temp += $location["monday_avg_temp"];
        $tuesday_avg_temp += $location["tuesday_avg_temp"];
        $wednesday_avg_temp += $location["wednesday_avg_temp"];
        $thursday_avg_temp += $location["thursday_avg_temp"];
        $friday_avg_temp += $location["friday_avg_temp"];
        $saturday_avg_temp += $location["saturday_avg_temp"];
        $sunday_avg_temp += $location["sunday_avg_temp"];
        // counters
        $totalN_low_temps += $location["today_low_temps"];
        $totalN_avg_temps += $location["today_avg_temps"];
        $totalN_hi_temps += $location["today_hi_temps"];
        $i++;
    }
    $todayG_avg_temp /= $today_entries;
    $todayG_avg_temp = number_format($todayG_avg_temp, 2);

    // weekly-averages
    $monday_avg_temp /= $i;
    $tuesday_avg_temp /= $i;
    $wednesday_avg_temp /= $i;
    $thursday_avg_temp /= $i;
    $friday_avg_temp /= $i;
    $saturday_avg_temp /= $i;
    $sunday_avg_temp /= $i;

    // percentages general
    $todayGP_low_temps = ($totalN_low_temps * 100.0) / ($today_entries * 1.0);
    $todayGP_avg_temps = ($totalN_avg_temps * 100.0) / ($today_entries * 1.0);
    $todayGP_hi_temps = ($totalN_hi_temps * 100.0) / ($today_entries * 1.0);

    // location percentages are calculated dynamically;


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <title>iTemp</title>
        <link rel="stylesheet" href="<?= URL?>public/css/classic.css" />
        <link rel="stylesheet" href="<?= URL?>public/css/general.css" />
        <link rel="icon" href="<?= URL?>public/img/image-naranja.png">
    </head>