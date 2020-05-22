<?php
$banner = "\e[36;1m                                                                                 
_  _ ____ _ _    ____    ____ ____ _  _ 
|\/| |__| | |    [__     | __ |___ |\ | 
|  | |  | | |___ ___]    |__] |___ | \|                                                                                                                        
   [#] Générateur d'e-mails [#]    
                                   
   [#] Author : Mr Hacker_K [#]\n\n\e[0;1m";


	echo $banner."\n";
	$list = file_get_contents("https://pastebin.com/ZLU3byZM");
    $low = strtolower($list);
	$x = explode("\r\n", $low);
	sleep(2);
	echo ">>> Type d'emaill (ex => gmail.com): ";
	$mail = trim(fgets(STDIN));
	sleep(1);
	echo ">>> entrez le nombre de mail a généré : ";
	$jum = trim(fgets(STDIN));
	sleep(1);
	echo "Generation  des e-mails...\n";
		for ($i=1; $i <= $jum; $i++) {
			$no = "1234567890";
			$n = str_shuffle($no);
			$result = substr($n, rand(1, 3), rand(1, 3));
			//$mek = array("peter", "john", "michael", "mike", "jackson", "jerry", "marry", "alice");
			$hub = array("_", ".");
			$name = $x[array_rand($x, 1)];
			$peng = $hub[array_rand($hub, 1)];
			$pt = $name.$result."@$mail\n";
		$file = "email.txt";
		//combiner les resultats generés
		touch($file);
		$o = fopen($file, 'a');
		fwrite($o, $pt);
		fclose($o);
			}
			sleep(5);
			echo $jum." E-mail généré avec succès..\nVérifiez les résultats sur email.txt\n";
