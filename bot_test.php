<?php
echo "aaaaa";
$host= "sql6.freemysqlhosting.net";
	$db = "sql6141179";
	$CHAR_SET = "charset=utf8"; 
 
	$username = "sql6141179";    
	$password = "2VSm3JEfdX";   
	

	$link = mysqli_connect($host, $username, $password, $db);
	if (!$link) {
    		die('Could not connect: ' . mysqli_connect_errno());
	}
	else
	{
		echo "connect";
	}
 
	/*try {
		
	
		$db = new PDO('mysql:host='.$HOST_NAME.';dbname='.$DB_NAME.';'.$CHAR_SET,$USERNAME,$PASSWORD);

		//echo "เชื่อมต่อฐานข้อมูลสำเร็จ";
		
		$sql = "SELECT * FROM book";
	
		$query = $db->query($sql);
	
		//echo "<pre>".print_r($query->fetchAll(), true)."</pre>"; 
		
		// เปลี่ยนมาใช้ fecth()
		echo "<pre>".print_r($query->fetch(), true)."</pre>"; 
		
		// วนซ้ำ แสดงผลทั้งหมด
		while($row = $query->fetch()) {
			//echo "<pre>".print_r($row, true)."</pre>";
		}
	
		echo "connect";
	
	
	} catch (PDOException $e) {
	
		echo "connot connect".$e->getMessage();
		echo "assacc";
	
	}*/

$access_token = 'AYydB5m2TZasBEFQaZjNRTCTeC3d3oNKw77jzKd/mj3SAMlkABDK74AAJ6eN00no1+MiFoFV2N5pl1KIYZmlq8/WSmxf2b4WVhcvfjJoUH6TY6AZoQrYmAP/ny8krS0KwSMDOokFaUouicUyyIKmhQdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');

// Parse JSON
$events = json_decode($content, true);

// Validate parsed JSON data
if (!is_null($events['events'])) {
// Loop through each event
	//1: printer Cd3afd7bd7719ceb0822ea162b50000fb
	//2:jay black graph C26d889d89b336a786c06358c1e2df27c
	//3:member_line_bot C7ab92191511e47ff839c174e7f2104c5
	//4:bot 3g 3r C941fb2b8a40f9d0f400969fa848c3386
	//5:jay 1 graph C9f2b93574be7434e6e7180a7d7503601
	//6: jay free graph C209fd17b6508ec4786c16e775638e4ae
	foreach ($events['events'] as $event) {
		if($event['source']['groupId'] == 'Cd3afd7bd7719ceb0822ea162b50000fb' || $event['source']['groupId'] == 'C26d889d89b336a786c06358c1e2df27c' || $event['source']['groupId'] == 'C7ab92191511e47ff839c174e7f2104c5' || $event['source']['groupId'] == 'C941fb2b8a40f9d0f400969fa848c3386' || $event['source']['groupId'] == 'C9f2b93574be7434e6e7180a7d7503601' || $event['source']['groupId'] == 'C209fd17b6508ec4786c16e775638e4ae')
		{
			// Reply only when message sent is in 'text' format
			if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
				// Get text sent
				$text = $event['message']['text'];
				
				$textcut = explode(" ", $text);
				$result = count($textcut);
				if($result <= 2)
				{
						$count_text_cut = strlen($textcut[0]);
						$x=0;
						$arr1 = str_split($textcut[0]);
						if($arr1[0] == "@")
						{
			
							//echo $count_text_cut;
							$hoonname = substr($textcut[0], 1); // cut@
							if($result == 2)
								$timeframe = $textcut[1];
							else
								$timeframe ="d";
							#echo $hoonname;
							$room='1';
							if($event['source']['groupId'] == 'C941fb2b8a40f9d0f400969fa848c3386' || $event['source']['groupId'] == 'C26d889d89b336a786c06358c1e2df27c')
								$room='2';
							else if($event['source']['groupId'] == 'C9f2b93574be7434e6e7180a7d7503601' || $event['source']['groupId'] == 'Cd3afd7bd7719ceb0822ea162b50000fb' || $event['source']['groupId'] == 'C7ab92191511e47ff839c174e7f2104c5')
								$room='1';
							else
								$room='3';
							
							$sql = "INSERT INTO hoon_check (id, hoonname, timeframe,room)
							VALUES ('', '$hoonname', '$timeframe',$room)";
							
							if (mysqli_query($link, $sql)) {
									echo "New record created successfully";
							} 
							else {
									#echo "Error: " . $sql . "<br>" . mysqli_error($link);
							}
							sleep(0.3);
							$check ="check1";
							#echo "work code";
							$sql = "INSERT INTO `check_capture`(`id`, `check`) VALUES ('','$check')";
							if (mysqli_query($link, $sql)) {
									echo "New record created successfully";
							} 
							else {
									echo "Error: " . $sql . "<br>" . mysqli_error($link);
							}
								#echo "work code";
							// Get replyToken
							$replyToken = $event['replyToken'];
							$hoonname1 = strtoupper($hoonname);
							if($hoonname1 == '2S')
								$llll = "https://www.dropbox.com/s/cov1jrkmhe8q81n/2S.png";
							else if($hoonname1 == 'A')
								$llll = "https://www.dropbox.com/s/u6vltz9l2mmtjgr/A.png?dl";
							else if($hoonname1 == 'COM7')
								$llll = "https://www.dropbox.com/s/uy5kmbt35jutf2k/AA_COM.png?dl";
							else if($hoonname1 == 'ABC')
								$llll = "https://www.dropbox.com/s/xbwsfy70kcqzak1/ABC.png?dl=0";
							else if($hoonname1 == 'ABICO')
								$llll = "https://www.dropbox.com/s/ah601q4qkt8jff5/ABICO.png?dl";
							else if($hoonname1 == 'ABPIF')
								$llll = "https://www.dropbox.com/s/kg7d273yqlq9hu8/ABPIF.png?dl=0";
							else if($hoonname1 == 'ACAP')
								$llll = "https://www.dropbox.com/s/kqr3ql5l78i4p97/ACAP.png?dl=0";
							else if($hoonname1 == 'ACC')
								$llll = "https://www.dropbox.com/s/1jotfxmvuet060a/ACC.png?dl=0";
							else if($hoonname1 == 'ADAM')
								$llll = "https://www.dropbox.com/s/wouqqrur2qj38zl/ADAM.png?dl=0";
							else if($hoonname1 == 'ADVANC')
								$llll = "https://www.dropbox.com/s/vh1lm8jso745f1c/ADVANC.png?dl=0";
							else if($hoonname1 == 'AEC')
								$llll = "https://www.dropbox.com/s/qd42g7bh9nsq0hj/AEC.png?dl=0";
							else if($hoonname1 == 'AEONTS')
								$llll = "https://www.dropbox.com/s/h8ilucjp5sgty83/AEONTS.png?dl=0";
							else if($hoonname1 == 'AF')
								$llll = "https://www.dropbox.com/s/j1ojyl479h2mk8s/AF.png?dl=0";
							else if($hoonname1 == 'AFC')
								$llll = "https://www.dropbox.com/s/72xjs41w5i3r149/AFC.png?dl=0";
							else if($hoonname1 == 'AGE')
								$llll = "https://www.dropbox.com/s/rx2w3jx4ls0biqt/AGE.png?dl=0";
							else if($hoonname1 == 'AH')
								$llll = "https://www.dropbox.com/s/q06nlwgtgq2kh0u/AH.png?dl=0";
							else if($hoonname1 == 'AHC')
								$llll = "https://www.dropbox.com/s/qoa982nf7mb1jcu/AHC.png?dl=0";
							else if($hoonname1 == 'AI')
								$llll = "https://www.dropbox.com/s/xmg9hy3ocygsu7n/AI.png?dl=0";
							else if($hoonname1 == 'AIE')
								$llll = "https://www.dropbox.com/s/7ngwuy8m4vnq8il/AIE.png?dl=0";	
							else if($hoonname1 == 'AIRA')
								$llll = "https://www.dropbox.com/s/09yd6cj8nkjq9a8/AIRA.png?dl=0";
							else if($hoonname1 == 'AIT')
								$llll = "https://www.dropbox.com/s/j28nevbbn0hodk2/AIT.png?dl=0";
							else if($hoonname1 == 'AJ')
								$llll = "https://www.dropbox.com/s/etemoa4b1fo1bh1/AJ.png?dl=0";
							else if($hoonname1 == 'AJD')
								$llll = "https://www.dropbox.com/s/9czvgb7146d7clz/AJD.png?dl=0";
							else if($hoonname1 == 'AKP')
								$llll = "https://www.dropbox.com/s/q2toeccnk82gmm5/AKP.png?dl=0";
							else if($hoonname1 == 'AKR')
								$llll = "https://www.dropbox.com/s/gc0xe9yezbnm51l/AKR.png?dl=0";
							else if($hoonname1 == 'ALT')
								$llll = "https://www.dropbox.com/s/uxvtpo9xga1t9p2/ALT.png?dl=0";
							else if($hoonname1 == 'ALUCOM')
								$llll = "https://www.dropbox.com/s/abvjvhluqb9eo3a/ALUCON.png?dl=0";
							else if($hoonname1 == 'AMANAH')
								$llll = "https://www.dropbox.com/s/ar4kkuz2nduovrv/AMANAH.png?dl=0";
							else if($hoonname1 == 'AMATA')
								$llll = "https://www.dropbox.com/s/pi26j2p0hek5ch4/AMATA.png?dl=0";
							else if($hoonname1 == 'AMATAR')
								$llll = "https://www.dropbox.com/s/eiiczqk15fq4mea/AMATAR.png?dl=0";
							else if($hoonname1 == 'AMATAV')
								$llll = "https://www.dropbox.com/s/myesxfbjxcore8x/AMATAV.png?dl=0";
							else if($hoonname1 == 'AMC')
								$llll = "https://www.dropbox.com/s/so0h1afjig620gq/AMC.png?dl=0";
							else if($hoonname1 == 'ANAN')
								$llll = "https://www.dropbox.com/s/qoq5y8yyzh3tgin/ANAN.png?dl=0";
							else if($hoonname1 == 'AOT')
								$llll = "https://www.dropbox.com/s/hnoe9b2sn5gb6sx/AOT.png?dl=0";
							else if($hoonname1 == 'AP')
								$llll = "https://www.dropbox.com/s/joxt9or3g6zlwub/AP.png?dl=0";
							else if($hoonname1 == 'APCO')
								$llll = "https://www.dropbox.com/s/2f0414r9ol80s41/APCO.png?dl=0";
							else if($hoonname1 == 'APCS')
								$llll = "https://www.dropbox.com/s/90nz1vcrpzva1i8/APCS.png?dl=0";
							else if($hoonname1 == 'APURE')
								$llll = "https://www.dropbox.com/s/1m7jskuo8nwmw6b/APURE.png?dl=0";
							else if($hoonname1 == 'APX')
								$llll = "https://www.dropbox.com/s/5uvslqjtq8qa7u1/APX.png?dl=0";
							else if($hoonname1 == 'AQ')
								$llll = "https://www.dropbox.com/s/hadngtapmdyvmd3/AQ.png?dl=0";
							else if($hoonname1 == 'AQUA')
								$llll = "https://www.dropbox.com/s/lqbs48mgvr56klr/AQUA.png?dl=0";
							else if($hoonname1 == 'ARIP')
								$llll = "https://www.dropbox.com/s/w5ku2jahhbvmgds/ARIP.png?dl=0";
							else if($hoonname1 == 'ARROW')
								$llll = "https://www.dropbox.com/s/1yhk9gear5j3ne1/ARROW.png?dl=0";
							else if($hoonname1 == 'AS')
								$llll = "https://www.dropbox.com/s/gb1vluxyerxxh91/AS.png?dl=0";
							else if($hoonname1 == 'ASEFA')
								$llll = "https://www.dropbox.com/s/vxjwrbinefp24xr/ASEFA.png?dl=0";
							else if($hoonname1 == 'ASIA')
								$llll = "https://www.dropbox.com/s/wx8z1jqm6nyogk2/ASIA.png?dl=0";
							else if($hoonname1 == 'ASIAN')
								$llll = "https://www.dropbox.com/s/lsvuj2j44ya0mo0/ASIAN.png?dl=0";
							else if($hoonname1 == 'ASIMAR')
								$llll = "https://www.dropbox.com/s/ulzxaa3bmvfeh0h/ASIMAR.png?dl=0";
							else if($hoonname1 == 'ASK')
								$llll = "https://www.dropbox.com/s/9ty4mjecrq3qmke/ASK.png?dl=0";
							else if($hoonname1 == 'ASN')
								$llll = "https://www.dropbox.com/s/93iouxbmexe0duh/ASN.png?dl=0";
							else if($hoonname1 == 'ASP')
								$llll = "https://www.dropbox.com/s/qotpl9prtmnlnh2/ASP.png?dl=0";
							else if($hoonname1 == 'ATP30')
								$llll = "https://www.dropbox.com/s/a25p27pisbudv21/ATP30.png?dl=0";
							else if($hoonname1 == 'AYUD')
								$llll = "https://www.dropbox.com/s/2199jopmgemjdrl/AYUD.png?dl=0";
							else if($hoonname1 == 'BA')
								$llll = "https://www.dropbox.com/s/g1h74rxa8n0d3as/BA.png?dl=0";
							else if($hoonname1 == 'BAFS')
								$llll = "https://www.dropbox.com/s/181wgt8wwnhi173/BAFS.png?dl=0";	
							else if($hoonname1 == 'BANPU')
								$llll = "https://www.dropbox.com/s/295u0cc5zdgdmon/BANPU.png?dl=0";
							else if($hoonname1 == 'BAT-3K')
								$llll = "https://www.dropbox.com/s/zfmnsyd94ojawi9/BAT-3K.png?dl=0";
							else if($hoonname1 == 'BAY')
								$llll = "https://www.dropbox.com/s/0cpd1h64heyrap4/BAY.png?dl=0";
							else if($hoonname1 == 'BBL')
								$llll = "https://www.dropbox.com/s/hjska86d0olhi5n/BBL.png?dl=0";
							else if($hoonname1 == 'BCH')
								$llll = "https://www.dropbox.com/s/pg6xgo3b7mytndy/BCH.png?dl=0";
							else if($hoonname1 == 'BCPG')
								$llll = "https://www.dropbox.com/s/23tjuv0p4409qf7/BCPG.png?dl=0";
							else if($hoonname1 == 'BDMS')
								$llll = "https://www.dropbox.com/s/2ddsfoafghn8hnz/BDMS.png?dl=0";
							else if($hoonname1 == 'BEAUTY')
								$llll = "https://www.dropbox.com/s/zqaa90e6un2r4og/BEAUTY.png?dl=0";
							else if($hoonname1 == 'BEC')
								$llll = "https://www.dropbox.com/s/jdsadpnnnz7x18k/BEC.png?dl=0";
							else if($hoonname1 == 'BEM')
								$llll = "https://www.dropbox.com/s/21ao87nk24ztmj5/BEM.png?dl=0";
							else if($hoonname1 == 'BFIT')
								$llll = "https://www.dropbox.com/s/2gh6y1dr44jryys/BFIT.png?dl=0";
							else if($hoonname1 == 'BGT')
								$llll = "https://www.dropbox.com/s/4oosqfxv8yvpx5d/BGT.png?dl=0";
							else if($hoonname1 == 'BH')
								$llll = "https://www.dropbox.com/s/8hace7mcvlkt8y3/BH.png?dl=0";
							else if($hoonname1 == 'BIG')
								$llll = "https://www.dropbox.com/s/768pz92ycx8055r/BIG.png?dl=0";
							else if($hoonname1 == 'BIGC')
								$llll = "https://www.dropbox.com/s/vins6bgkzglkh0n/BIGC.png?dl=0";
							else if($hoonname1 == 'BIZ')
								$llll = "https://www.dropbox.com/s/vxjsxpyytk1xajk/BIZ.png?dl=0";
							else if($hoonname1 == 'BJC')
								$llll = "https://www.dropbox.com/s/s326kq9mp1ghgj7/BJC.png?dl=0";
							else if($hoonname1 == 'BJCHI')
								$llll = "https://www.dropbox.com/s/w2vfgfp2rkydkvc/BJCHI.png?dl=0";	
							else if($hoonname1 == 'BKD')
								$llll = "https://www.dropbox.com/s/9msv3qg8xqckk92/BKD.png?dl=0";
							else if($hoonname1 == 'BKI')
								$llll = "https://www.dropbox.com/s/egdgd6ea8i4xs0k/BKI.png?dl=0";
							else if($hoonname1 == 'BKKCP')
								$llll = "https://www.dropbox.com/s/7wxffgob16e2yvu/BKKCP.png?dl=0";
							else if($hoonname1 == 'BLA')
								$llll = "https://www.dropbox.com/s/7f19uxrujnb0rmh/BLA.png?dl=0";
							else if($hoonname1 == 'BLAND')
								$llll = "https://www.dropbox.com/s/6aag6kor0v7fq49/BLAND.png?dl=0";
							else if($hoonname1 == 'BLISS')
								$llll = "https://www.dropbox.com/s/tfb5wftg5itzl7c/BLISS.png?dl=0";
							else if($hoonname1 == 'BM')
								$llll = "https://www.dropbox.com/s/ykr6c548l1jihf7/BM.png?dl=0";
							else if($hoonname1 == 'BOL')
								$llll = "https://www.dropbox.com/s/t5c7512ndr92a9v/BOL.png?dl=0";
							else if($hoonname1 == 'BR')
								$llll = "https://www.dropbox.com/s/2t5wnl34xhgl4ch/BR.png?dl=0";
							else if($hoonname1 == 'BRC')
								$llll = "https://www.dropbox.com/s/967e1we9rfjn679/BRC.png?dl=0";
							else if($hoonname1 == 'BROCK')
								$llll = "https://www.dropbox.com/s/vprdezno5si3ge6/BROCK.png?dl=0";
							else if($hoonname1 == 'BRR')
								$llll = "https://www.dropbox.com/s/vvsskxv0utv33oc/BRR.png?dl=0";
							else if($hoonname1 == 'BSBM')
								$llll = "https://www.dropbox.com/s/osfpmiqg6gbg3b8/BSBM.png?dl=0";
							else if($hoonname1 == 'BSM')
								$llll = "https://www.dropbox.com/s/aenw2pkzppoj3c0/BSM.png?dl=0";
							else if($hoonname1 == 'BTC')
								$llll = "https://www.dropbox.com/s/aiub66pu11qj36a/BTC.png?dl=0";
							else if($hoonname1 == 'BTS')
								$llll = "https://www.dropbox.com/s/fu6czgi28w5uthx/BTNC.png?dl=0";
							else if($hoonname1 == 'BTSGIF')
								$llll = "https://www.dropbox.com/s/k43qvdbbs3y0gtu/BTSGIF.png?dl=0";
							else if($hoonname1 == 'BTW')
								$llll = "https://www.dropbox.com/s/kucyup9oehmdm1o/BTW.png?dl=0";	
							else if($hoonname1 == 'BUI')
								$llll = "https://www.dropbox.com/s/rlwxvpmvhn2ghkz/BUI.png?dl=0";
							else if($hoonname1 == 'BWG')
								$llll = "https://www.dropbox.com/s/hq5bic6qhi3bcku/BWG.png?dl=0";
							else
								$llll = "https://www.dropbox.com/s/h6yztz70os1ily8/pic.png";
							// Build message to reply back
							#$messages = ['type' => 'text','text' => $event['source']['roomid']];
							$messages4 = ['type' => 'text','text' => $event['source']['type']];
							
							$messages5 = ['type' => 'text','text' => $event['source']['groupId']];
							sleep(5);
							$messages3 = ['type' => 'text','text' => $hoonname];
				
							$messages1 = ['type' => 'text','text' => $llll];
							
							$messages2 = ['type' => 'image',
									 'originalContentUrl' => 'https://www.dropbox.com/s/h6yztz70os1ily8/$hoonname.png',
									 'previewImageUrl' => 'https://www.dropbox.com/s/h6yztz70os1ily8/$hoonname.png'
							];
				
							// Make a POST Request to Messaging API to reply to sender
							$url = 'https://api.line.me/v2/bot/message/reply';
							$data = [
								'replyToken' => $replyToken,
								'messages' => [$messages3,$messages1]
							];
							$post = json_encode($data);
							$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
				
							$ch = curl_init($url);
							curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
							curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
							curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
							$result = curl_exec($ch);
							curl_close($ch);
							
							
							#echo "check1";
							#sleep(10);
							#echo $result . "\r\n";
						}
				
					}//ifresult<2
			 }//if ($event['type'] == 'message' && $event['message']['type'] == 'text')
		}//if($event['source']['groupId'] 
		else
		{
							//$replyToken = $event['replyToken'];
							$messages55 = ['type' => 'text','text' => $event['source']['groupId']];
							// Make a POST Request to Messaging API to reply to sender
							$url = 'https://api.line.me/v2/bot/message/reply';
							$data = [
								'replyToken' => $replyToken,
								'messages' => [$messages55]
							];
							$post = json_encode($data);
							$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
				
							$ch = curl_init($url);
							curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
							curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
							curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
							$result = curl_exec($ch);
							curl_close($ch);
		}
	}//for
}

#echo "OK11";