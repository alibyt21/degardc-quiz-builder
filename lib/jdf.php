<?php

if (!function_exists('gregorian_to_jalali')) {
  function gregorian_to_jalali($gy, $gm, $gd, $mod = '')
  {
    $g_d_m = array(0, 31, 59, 90, 120, 151, 181, 212, 243, 273, 304, 334);
    if ($gy > 1600) {
      $jy = 979;
      $gy -= 1600;
    } else {
      $jy = 0;
      $gy -= 621;
    }
    $gy2 = ($gm > 2) ? ($gy + 1) : $gy;
    $days = (365 * $gy) + ((int)(($gy2 + 3) / 4)) - ((int)(($gy2 + 99) / 100)) + ((int)(($gy2 + 399) / 400)) - 80 + $gd + $g_d_m[$gm - 1];
    $jy += 33 * ((int)($days / 12053));
    $days %= 12053;
    $jy += 4 * ((int)($days / 1461));
    $days %= 1461;
    if ($days > 365) {
      $jy += (int)(($days - 1) / 365);
      $days = ($days - 1) % 365;
    }
    $jm = ($days < 186) ? 1 + (int)($days / 31) : 7 + (int)(($days - 186) / 30);
    $jd = 1 + (($days < 186) ? ($days % 31) : (($days - 186) % 30));
    $jd = str_pad($jd, 2, "0", STR_PAD_LEFT);
    $jm = str_pad($jm, 2, "0", STR_PAD_LEFT);
    return ($mod == '') ? array($jy, $jm, $jd) : $jy . $mod . $jm . $mod . $jd;
  }
}

if (!function_exists('int_time_to_jalali_date')) {
  function int_time_to_jalali_date($int_time, $time = 0)
  {
    $str = date("Y-m-d H:i", $int_time);
    sscanf($str, "%d-%d-%d %d:%d", $year, $month, $day, $hour, $minute);
    $month = str_pad($month, 2, "0", STR_PAD_LEFT);
    $day = str_pad($day, 2, "0", STR_PAD_LEFT);
    $hour = str_pad($hour, 2, "0", STR_PAD_LEFT);
    $minute = str_pad($minute, 2, "0", STR_PAD_LEFT);
    $shamsi_date_str = gregorian_to_jalali($year, $month, $day, '-');
    if ($time == 1) {
      $shamsi_date_and_time_str = "$shamsi_date_str ساعت $hour:$minute";
    } elseif ($time == 0) {
      $shamsi_date_and_time_str = "$shamsi_date_str";
    }
    return $shamsi_date_and_time_str;
  }
}
