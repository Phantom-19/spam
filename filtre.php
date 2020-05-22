<?php
error_reporting(0);

$banner = "\e[36;1m                                                                                 
____ _ _    ___ ____ ____    _  _ ____ _ _    
|___ | |     |  |__/ |___    |\/| |__| | |    
|    | |___  |  |  \ |___    |  | |  | | |___                                                                                                                                                              
[#] Flitrage de mail  [#]    
                                   
[#] Coder par : Faxel [#] \n\n\e[0;1m";

sleep(2);
echo $banner;
sleep(2);
echo "Accueil Fichier Mail :  ";
$mailist = trim(fgets(STDIN));
sleep(2);
echo "Filtreur (exemple : yahoo) : ";
$filter = trim(fgets(STDIN));
sleep(1);
echo "Filtrage des e-mails ... veuillez patienter^_^\n";
sleep(4);
$list = file_get_contents($mailist);
preg_match_all("/(.+)(@$filter)(.*+)*/ix", $list, $hasil);

foreach ($hasil[0] as $result) {

      $jumlah = count($hasil[0]);
      if ($jumlah <= 0) {
        echo "email $filter introuvable\n";
      }else{
          $file = "resultat.txt";
        //combiner les résultats du filtre ...
        touch($file);
        $o = fopen($file, 'a');
        fwrite($o, $result."\n");
        fclose($o);

        }
}

// A34ECAAF
echo $jumlah."Des emails $filter ont été trouvé..\nVérifiez les résultats sur $file\n";

?>
