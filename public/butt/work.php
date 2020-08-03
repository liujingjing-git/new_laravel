<?php
        $file_name = "buffer.html";
        $html_time = filemtime('buffer.html');
        if(file_exists($file_name) && (time() - $html_time) < 10){
            echo "有缓存";echo "</br>";
            $filecoons = file_get_contents("buffer.html");
            echo $filecoons;die;
        }


        ob_start();      //开启缓存
        echo "aaaa";echo "</br>";
        echo "bbbb";echo "</br>";
        echo "cccc";echo "</br>";
        echo "dddd";echo "</br>";

        $filecon = ob_get_contents();

        ob_end_clean();

        file_put_contents('buffer.html',$filecon);
       echo "无缓存";

//        echo $filecon;die;





?>
