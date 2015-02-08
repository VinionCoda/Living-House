<?php
function getMac(){
$regex = '/([0-9a-fA-F]{2}[:-]){5}[0-9a-fA-F]{2}/';
$mac = array();

try{
$leases = fopen("/var/state/dhcp/dhcpd.leases", "r") ;


// Output one line until end-of-file
while(!feof($leases)) {
preg_match_all($regex,fgets($leases),$out);

array_push($mac, $out);
}
fclose($leases);

return $mac;
} catch (Exception $e) { echo "Cannot Load File";}


}

function getPcNames(){
$regex = '/\"([^\"]*?)\"/';
$PcNames = array();

try{
$leases = fopen("/var/state/dhcp/dhcpd.leases", "r") ;


// Output one line until end-of-file
while(!feof($leases)) {
preg_match_all($regex,fgets($leases),$out);

array_push($PcNames, $out);
}
fclose($lease);

return $PcNames;
} catch (Exception $e) { echo "Cannot Load File";}


}


?>