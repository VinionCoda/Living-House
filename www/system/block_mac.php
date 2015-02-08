<?php
function blockMac($mac){
$add_script = 'iptables -A INPUT -m mac --mac-source '.$mac.' -j DROP';
shell_exec($add_script); 


}

function unblockMac($mac){
$drop_script = 'iptables -D INPUT -m mac --mac-source '.$mac.' -j DROP';
shell_exec($drop_script); 


}

?>
