<?php
sleep(1);
system("clear");
$banner = "\e[36;1m                                                                                 
____ ____ ____ ____ ____    ____ ____ _  _ 
|    |__/ |___ |___ |__/    [__  [__  |__| 
|___ |  \ |___ |___ |  \    ___] ___] |  | 

                                                                                                                       
[#] Créer automatiquement un compte SSH [#]   
[#] Exemple de mon compte creer[#]  

echo "Votre compte à été créé avec succès!";
echo "Nom d'utilisateur: sshssl.com-Faxel1";
echo "Mot de passe: 08127934";
echo "IP hôte: us.ssl.sshssl.com";
echo "Créé le: 23 mai 2020";
echo "Le compte expirera le 12 juin 2020.";
echo "REMARQUE: Une fois que vous avez un compte, veuillez fournir une assistance ... afin que le serveur puisse être étendu et rester allumé ..\n\n";
[#] information utile [#]    
echo "[+] https://jetssh.com/ [+]\n\n";   
echo "[+] https://www.portssh.com/create-ssh-server/2153/ssh-server-us [+]\n\n";                                    
Coder par : Faxel                  
\n\n\e[0;1m";
sleep(3);
echo $banner;
sleep(2);
echo "[+] Voici la liste des servers [+]\n\n";
echo "1. SG-1\n2. SG-2\n3. SG-3\n\n";
sleep(2);
echo "[-] Choix du server : ";
$ser = trim(fgets(STDIN));

if ($ser == 1) {
	$server = "2090";
	}else if($ser == 2) {
		$server = "2100";
		}else if($ser == 3) {
			$server = "2110";
			}
		if (!empty($server)) {
$user = array("revan", "indosec", "minicode");
$random= str_shuffle("1234");

	
	$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://www.jetssh.com/create-ssh-server-3-days/2090/ssh-server-singapore-1");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Cookie: _ga=GA1.2.542438985.1547885486; _gid=GA1.2.235482691.1547885486;  HstCfa3660500=1547885532365; HstCla3660500=1547886999254; HstCmu3660500=1547885532365; HstPn3660500=6; HstPt3660500=6; HstCnv3660500=1; HstCns3660500=1; c_ref_3660500=http%3A%2F%2Fjetssh.com%2Fssh-server-sg; create=1; _gat_gtag_UA_127762168_1=1"));
	$gas = curl_exec($ch);
		curl_close($ch);

		preg_match('|Set-Cookie: (.+) path=|', $gas, $cookie);

	$cr = curl_init();
		curl_setopt($cr, CURLOPT_URL, "http://www.jetssh.com/create-account-ssh-3-days.php");
		curl_setopt($cr, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($cr, CURLOPT_HEADER, 1);
		curl_setopt($cr, CURLOPT_HTTPHEADER, array("Content-Type: application/x-www-form-urlencoded; charset=UTF-8", "X-Requested-With: XMLHttpRequest", "Referer: http://www.jetssh.com/create-ssh-server-3-days/2090/ssh-server-singapore-1", "Cookie: _ga=GA1.2.542438985.1547885486; _gid=GA1.2.235482691.1547885486; $cookie[1] HstCfa3660500=1547885532365; HstCla3660500=1547887145135; HstCmu3660500=1547885532365; HstPn3660500=7; HstPt3660500=7; HstCnv3660500=1; HstCns3660500=1; c_ref_3660500=http%3A%2F%2Fjetssh.com%2Fssh-server-sg; create=1"));
		curl_setopt($cr, CURLOPT_POST, 1);
		curl_setopt($cr, CURLOPT_POSTFIELDS, "serverid=".$server."&username=".$user[rand(0, 2)].$random."&password=123");
	$h = curl_exec($cr);
		curl_close($cr);
		
		$d = date('d');
		$date = $d + 7;
		preg_match_all("/<br>(.*?)<br>/ix", $h, $ex);

if (!empty($ex[1][2])) {
		echo "\nReussir !!\n\nIp de l'hote : sg".$ser.".jetssh.com\n".$ex[1][1]."\nMot de passe : 123\n".$ex[1][2]."\n";
		echo "Date d'expiration: ".$date."-".date('F-y')."\n\n";
		}else{
			echo "Echec!!\nVeuillez patienter 1 minute pour créer à nouveau un compte\n";
			
			}
		
		}else{
				echo "SERVER ".$ser." Introuvable\n";
				}
