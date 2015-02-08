
	
<?php
set_time_limit(0);

    function waitforchange($nof) {
		
        $lfilemod=filemtime($nof);
        while(filemtime($nof) == $lfilemod) {
         clearstatcache();   
            usleep(1000);
        }
    }

    waitforchange('blank.txt');
    sleep(5);
    echo 'done';
	

?>