<?php
//https://github.com/dziunincode69
//AUTO REGIS + AUTO REDEEM + AUTO GET VOUCHER WIFI ID GO
//CREATED BY ALIP DZIKRI
//PTMISKINTERUS
$get = file_get_contents("https://api.randomuser.me");
          $j = json_decode($get, true);
	      $depan = $j['results'][0]['name']['first'];
	      $belakang = $j['results'][0]['name']['last'];
	
	    $huruf = '012345678910abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    	$angka = '';
    	for ($i = 0; $i < 124; $i++) {
        $angka .= $huruf[mt_rand(0, strlen($huruf) - 1)];
    	}
    
$device = '6cb9'.rand(1000,9999).'6a9ed176';
$pass = 'PtMiskin123';
$nomor = '08953581'.rand(1001,9999).'5';

echo "AUTO REGIS + AUTO REDEEM + AUTO GET VOUCHER WIFI ID GO \n";

echo "Created By AlipDzikri i\n";
echo "Input Your Email : ";
$email = trim(fgets(STDIN));
$register = curl('https://wigo.wifi.id/api/account/register_tmoney', 'userName='.$email.'&password='.$pass.'&accType=1&fullName='.$depan.' '.$belakang.'&phoneNo='.$nomor.'&terminal=MYWIFI&apiKey=T-MONEY_ZTRi'.$angka.'', $headers);
$jsregister = json_decode($register[0]);

if($jsregister->data->status == 1){
	echo "Sukses regis \n";
	echo "Silahkan Verif Email \n";
	echo "Udah Verif email ? Y / N ";
	$udah = trim(fgets(STDIN));
	if($udah == "N"){
		echo "Silahkan Verif email \n";
		} else {
			"Getting id T-Money .... \n";
$idmoney = $jsregister->data->idTmoney;
$tfusion = $jsregister->data->idFusion;
$tokeni = $jsregister->data->token;
echo "T-Money id ";
echo $idmoney;
echo "\n";
$login = curl('https://wigo.wifi.id/api/account/auth_tmoney', 'userName='.$email.'&password='.$pass.'&datetime=2019-09-26%2019%3A28%3A41&terminal=MYWIFI&apiKey=T-MONEY_ZTRi'.$angka.'&androidID='.$device.'&deviceUID=2019_09_26_19_26_59__com_telkom_wifiidgo_69_5_7_0__com_telkom_wifiidlibrary_'.rand(100,999).'_3_11__5_0_2__BarnesAndNoble__NOOK__Indosat_Ooredoo__5d8cae93cc'.rand(101,999).'', $headers);
$jslogin = json_decode($login[0]);
if($jslogin->message ==! "Login Berhasil"){
	print_r($jslogin);
	} else{
	
		echo "Sukses Login \n";
		echo "Points : ";
		echo $jslogin->data->points;
		echo "\n";
		$token = $jslogin->data->token;
		echo "Getting Token... \n";
		echo "Your Token \n";
		echo $token;
		echo "\n";
		echo "Process Buy Voc Wifiid \n";
		$buy = curl('https://wigo.wifi.id/api/redeem', 'idTmoney='.$idmoney.'', $headers);
		$jsbuy = json_decode($buy[0]);
		echo $jsbuy->message;
		echo "\n";
		$buy1 = curl('https://wigo.wifi.id/api/redeem', 'idTmoney='.$idmoney.'', $headers);
		$jsbuy1 = json_decode($buy1[0]);
		echo "\n";
		echo "Checking Your Inbox \n";
		$cek = curl('https://wigo.wifi.id/api/list_inbox', 'idTmoney='.$idmoney.'&idFusion='.$tfusion.'&token='.$token.'&terminal=MYWIFI&apiKey=T-MONEY_ZTRi'.$angka.'', $headers);
		$jscek = json_decode($cek[0]);
		echo "Gagal Cek Inbox Silahkan coba manual \n";
		 $livee = "akun-wifiID_Go.txt";
    $fopen = fopen($livee, "a+");
    $fwrite = fwrite($fopen, "LIVE => ".$email." | ".$pass." \n");
    fclose($fopen);
    echo "[+] List Akun Wifi ID go saved in ".$livee." \n";
    echo "Silahkan Login Akun Wifi ID Go untuk mendapatkan Voucher wifi ID \n";
		

    }
}
} else{
	echo "Gagal \n";
	}
function curl($url, $fields = null, $headers = null)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        if ($fields !== null) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        }
        if ($headers !== null) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }
        $result   = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        return array(
            $result,
            $httpcode
        );
	}	
