<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가;


function get_cp_target($ca_id, $ca_id2, $ca_id3) {  
    $arr = array();
    $len = strlen($ca_id);
    for ($i = 2; $i <= $len; $i += 2) {
      $arr[] = "'" . substr($ca_id, 0, $i) . "'";
    }
    $len = strlen($ca_id2);
    for ($i = 2; $i <= $len; $i += 2) {
      $arr[] = "'" . substr($ca_id2, 0, $i) . "'";
    }
    $len = strlen($ca_id3);
    for ($i = 2; $i <= $len; $i += 2) {
      $arr[] = "'" . substr($ca_id3, 0, $i) . "'";
    }
    $arr = array_unique($arr);
    $str = implode(',', $arr);
    return $str;
  }