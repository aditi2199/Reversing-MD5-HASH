<!DOCTYPE html>
<head><title>Aditi Pathak MD5 Cracker</title></head>
<body>
<h1>MD5 cracker</h1>
<p>This application takes an MD5 hash
of a two-character lower case string and 
attempts to hash all the two-character combinations to determine the original two characters.</p>
<pre>
Debuging Output:
<?php
$goodtext = "Not found";

if ( isset($_GET['md5']) ) {
    $time_pre = microtime(true);
    $md5 = $_GET['md5'];

    $show = 15;

    
    for($i=0; $i<100; $i++ ) {
        $chr1 = $i;
        if($chr1<10){
            $chr1 = "0".$chr1;
        }  
        for($j=0; $j<100; $j++ ) {
            $chr2 = $j;  
            if($chr2<10){
            $chr2 = "0".$chr2;
        } 
            $try = $chr1.$chr2;

            
            $check = hash('md5', $try);
            if ( $check == $md5 ) {
                $goodtext = $try;
                break;   
            }

            
            if ( $show > 0 ) {
                print "$check $try\n";
                $show = $show - 1;
            }
        }
    }

    $time_post = microtime(true);
    print "Elapsed time: ";
    print $time_post-$time_pre;
    print "\n";
}
?>
</pre>
<p> PIN: <?= htmlentities($goodtext);?></p>
<form>
<input type="text" name="md5" size="60" />
<input type="submit" value="Crack MD5"/>
</form>
<ul>
<li><a href="crack.php"> Reset</a></li>
<li><a href="md5.php"> MD5 Encoder</a></li>
<li><a href="codemaker.php"> MD5 Code Maker</a></li>
</ul>
</body>
</html>