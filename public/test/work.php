<?php

    $html_file="buffer.html";
    $filemtime=filemtime($html_file);

    if(file_exists($html_file) && (time()-$filemtime) < 10 ){
        echo "有缓存";echo "<br>";
        $content=file_get_contents($html_file);
        echo $content;die;
    }

    ob_start();         //开启输出缓存
    echo "11111";echo "<br>";
    echo "22222";echo "<br>";
    echo "33333";echo "<br>";
    echo "44444";echo "<br>";
    echo "44444";echo "<br>";
    $content=ob_get_contents();  //获取缓存区内容

    ob_end_clean();  //清除
    file_put_contents('buffer.html',$content);
    echo "无缓存";echo "<br>";
    echo $content;

?>
