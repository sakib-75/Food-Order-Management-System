<?php



    $ip = $_SERVER['REMOTE_ADDR'];
    $http_client_ip = $_SERVER['$http_client_ip'];
    $http_forwarded_for = $_SERVER['$http_forwarded_for'];
    $remote_addr = $_SERVER['REMOTE_ADDR'];
    if (!empty($http_client_ip)) {
      $ipaddress = $http_client_ip;
    }
    else if (!empty($http_forwarded_for)) {
      $ipaddress = $http_forwarded_for;
    }
    else if (!empty($remote_addr)) {
      $ipaddress = $remote_addr;
    }
    echo $ipaddress;



 ?>
