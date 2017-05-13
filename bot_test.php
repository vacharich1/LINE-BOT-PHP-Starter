<?php

$hoonname="aot";
$timeframe="60";
$room="1";
echo "aaaaa";
    $host= "sql6.freemysqlhosting.net";
	$db = "sql6144521";
	$CHAR_SET = "charset=utf8"; 
 
	$username = "sql6144521";    
	$password = "IAC4FPTQV2";   
	

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
	//7: ideatrade bot 1 Cb880ba168d17c69174b652045a8f8b90
	//8: ideatrade bot 2 C1970832b0d5e677dc1498442f8412be7
	//9:member2 C328035648eddea983ff6b6a3fc7622ec
	//10:group ideatrade : C9fe78b803761432902f6d506b806b354
	
	foreach ($events['events'] as $event) {
		if($event['source']['groupId'] == 'Cd3afd7bd7719ceb0822ea162b50000fb' || $event['source']['groupId'] == 'C26d889d89b336a786c06358c1e2df27c' || $event['source']['groupId'] == 'C7ab92191511e47ff839c174e7f2104c5' || $event['source']['groupId'] == 'C941fb2b8a40f9d0f400969fa848c3386' || $event['source']['groupId'] == 'C9f2b93574be7434e6e7180a7d7503601' || $event['source']['groupId'] == 'C209fd17b6508ec4786c16e775638e4ae' || $event['source']['groupId'] == 'Cb880ba168d17c69174b652045a8f8b90' || $event['source']['groupId'] == 'C1970832b0d5e677dc1498442f8412be7' || $event['source']['groupId'] == 'C328035648eddea983ff6b6a3fc7622ec' || $event['source']['userId'] == 'Uf120d9606f0eaa9bd32e18f8c85ea58f' || $event['source']['userId'] == 'Ub5f45b12f0f8f8a3a08e5b52ebbcc96b' ||$event['source']['groupId'] == 'C9fe78b803761432902f6d506b806b354' || $event['source']['groupId'] == 'C50bdba4e60f90ced6002458b6fb1aa5b' || $event['source']['groupId'] == 'C2debaa5f387f1d99d495ee1f62f25d27')
		{
			// Reply only when message sent is in 'text' format
			if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
				$text = $event['message']['text'];
				if($text == 'addgroupbyjaybotroom')
					{
							$replyToken = $event['replyToken'];
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
				// Get text sent
				
				
				$textcut = explode(" ", $text);
				$result = count($textcut);
				if($result <= 2)
				{
						$count_text_cut = strlen($textcut[0]);
						$x=0;
						$arr1 = str_split($textcut[0]);
						if($arr1[0] == "@")
						{
							$hoonname = substr($textcut[0], 1); // cut@
							if(preg_match("/^[a-zA-Z0-9]+$/", $hoonname[0]) != 1) 
							{
								$replyToken = $event['replyToken'];
								$messages556 = ['type' => 'text','text' => "รบกวนพิมอีกครั้งจ๊ะ ต้องไม่มีช่องว่าง ในชื่อหุ้น  @ aot ----> @aot type with no space"];
								// Make a POST Request to Messaging API to reply to sender
								$url = 'https://api.line.me/v2/bot/message/reply';
								$data = [
									'replyToken' => $replyToken,
									'messages' => [$messages556]
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
							else
							{
								//echo $count_text_cut;
								
								if($result == 2)
									$timeframe = $textcut[1];
								else
									$timeframe ="d";
								#echo $hoonname;
								//Cb880ba168d17c69174b652045a8f8b90
								//8: ideatrade bot 2 C1970832b0d5e677dc1498442f8412be7
								$room='1';
								if($event['source']['groupId'] == 'C941fb2b8a40f9d0f400969fa848c3386' || $event['source']['groupId'] == 'C26d889d89b336a786c06358c1e2df27c')//graph black
								{
									if($event['source']['groupId'] == 'C941fb2b8a40f9d0f400969fa848c3386')
										$room='21';
									if($event['source']['groupId'] == 'C26d889d89b336a786c06358c1e2df27c')
										$room='22';
								}
								else if($event['source']['groupId'] == 'C9f2b93574be7434e6e7180a7d7503601' || $event['source']['groupId'] == 'Cd3afd7bd7719ceb0822ea162b50000fb' || $event['source']['groupId'] == 'C7ab92191511e47ff839c174e7f2104c5' || $event['source']['groupId'] == 'C328035648eddea983ff6b6a3fc7622ec' || $event['source']['userId'] == 'Uf120d9606f0eaa9bd32e18f8c85ea58f' || $event['source']['userId'] == 'Ub5f45b12f0f8f8a3a08e5b52ebbcc96b')//graph 1
								{
									if($event['source']['groupId'] == 'C9f2b93574be7434e6e7180a7d7503601')
										$room='11';
									if($event['source']['groupId'] == 'Cd3afd7bd7719ceb0822ea162b50000fb')
										$room='12';
									if($event['source']['groupId'] == 'C7ab92191511e47ff839c174e7f2104c5')
										$room='14';
									if($event['source']['groupId'] == 'C328035648eddea983ff6b6a3fc7622ec')
										$room='15';
									if($event['source']['userId'] == 'Uf120d9606f0eaa9bd32e18f8c85ea58f' || $event['source']['userId'] == 'Ub5f45b12f0f8f8a3a08e5b52ebbcc96b')
										$room='16';
								}
								else if($event['source']['groupId'] == 'C50bdba4e60f90ced6002458b6fb1aa5b')
								{
									$room='41';
								}
								else if($event['source']['groupId'] == 'C2debaa5f387f1d99d495ee1f62f25d27')#member 300
								{
									$room='51';
								}
								else if($event['source']['groupId'] == 'C9fe78b803761432902f6d506b806b354')#group ideatrade
								{
									$room="66";	
								}
								else
								{
									if($event['source']['groupId'] == 'Cb880ba168d17c69174b652045a8f8b90')
										$room='31';
									if($event['source']['groupId'] == 'C1970832b0d5e677dc1498442f8412be7')
										$room='32';
								}
								if($event['source']['groupId'] != 'C9fe78b803761432902f6d506b806bxxx')
								{
									//Cb880ba168d17c69174b652045a8f8b90
								//8: ideatrade bot 2 C1970832b0d5e677dc1498442f8412be7
									if($event['source']['groupId'] != 'Cb880ba168d17c69174b652045a8f8b90' and $event['source']['groupId'] != 'C1970832b0d5e677dc1498442f8412be7' )
									{
										$sql = "INSERT INTO hoon_check (id, hoonname, timeframe,room)
										VALUES ('', '$hoonname', '$timeframe',$room)";
										
										if (mysqli_query($link, $sql)) {
												echo "New record created successfully";
										} 
										else {
												echo "Error: " . $sql . "<br>" . mysqli_error($link);
										}
										sleep(0.3);
										$check ="check1";
										#echo "work code";
										$sql = "INSERT INTO `check_capture`(`id`, `check1`) VALUES ('','$check')";
										if (mysqli_query($link, $sql)) {
												echo "New record created successfully";
										} 
										else {
												echo "Error: " . $sql . "<br>" . mysqli_error($link);
										}
									}
									
									$link_pic ='https://www.botbottest.club/'.$hoonname."".$timeframe."".$room.".jpg";
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
									else if($hoonname1 == 'CBG')
										$llll = "https://www.dropbox.com/s/27rocarn3wix4yc/CBG.png?dl=0";
									else if($hoonname1 == 'CCET')
										$llll = "https://www.dropbox.com/s/rginc5j4rzv7nb2/CCET.png?dl=0";
									else if($hoonname1 == 'CCN')
										$llll = "https://www.dropbox.com/s/5y4pdqu4kg2uqvt/CCN.png?dl=0";
									else if($hoonname1 == 'CCP')
										$llll = "https://www.dropbox.com/s/qqibjb6il0taydl/CCP.png?dl=0";
									else if($hoonname1 == 'CEN')
										$llll = "https://www.dropbox.com/s/h8lr77w4r3egvxz/CEN.png?dl=0";
									else if($hoonname1 == 'CENTEL')
										$llll = "https://www.dropbox.com/s/xa4e3ubcz2oye48/CENTEL.png?dl=0";
									else if($hoonname1 == 'CFRESH')
										$llll = "https://www.dropbox.com/s/jj10xrg3d35mol6/CFRESH.png?dl=0";
									else if($hoonname1 == 'CGD')
										$llll = "https://www.dropbox.com/s/v61v6v7vd2cbowq/CGD.png?dl=0";
									else if($hoonname1 == 'CGH')
										$llll = "https://www.dropbox.com/s/rewukhnxyfs0jo7/CGH.png?dl=0";
									else if($hoonname1 == 'CHARAN')
										$llll = "https://www.dropbox.com/s/dgkad9desmlsaz4/CHARAN.png?dl=0";
									else if($hoonname1 == 'CHEWA')
										$llll = "https://www.dropbox.com/s/9pms1wbmqh66m86/CHEWA.png?dl=0";
									else if($hoonname1 == 'CHG')
										$llll = "https://www.dropbox.com/s/e70c3m2oppeq4pv/CHG.png?dl=0";
									else if($hoonname1 == 'CHO')
										$llll = "https://www.dropbox.com/s/ltqdsyrilymhyn6/CHO.png?dl=0";
									else if($hoonname1 == 'CHOTI')
										$llll = "https://www.dropbox.com/s/oc21zkyw9pu6bt8/CHOTI.png?dl=0";
									else if($hoonname1 == 'CHOW')
										$llll = "https://www.dropbox.com/s/52aqymm6agewmle/CHOW.png?dl=0";
									else if($hoonname1 == 'CHUO')
										$llll = "https://www.dropbox.com/s/lzgio4z2olqb4v7/CHUO.png?dl=0";
									else if($hoonname1 == 'CI')
										$llll = "https://www.dropbox.com/s/c2bxp6cm6rg0mta/CI.png?dl=0";
									else if($hoonname1 == 'CIG')
										$llll = "https://www.dropbox.com/s/54kih987hhqznti/CIG.png?dl=0";	
									else if($hoonname1 == 'CIMBT')
										$llll = "https://www.dropbox.com/s/erwtzv8zqmotfog/CIMBT.png?dl=0";
									else if($hoonname1 == 'CITY')
										$llll = "https://www.dropbox.com/s/bme7vtx4vl215qc/CITY.png?dl=0";
									else if($hoonname1 == 'CK')
										$llll = "https://www.dropbox.com/s/amicdrcxlcfczls/CK.png?dl=0";
									else if($hoonname1 == 'CKP')
										$llll = "https://www.dropbox.com/s/k9fwqeatepj2evf/CKP.png?dl=0";
									else if($hoonname1 == 'CM')
										$llll = "https://www.dropbox.com/s/hveephpmfbbspqc/CM.png?dl=0";
									else if($hoonname1 == 'CMO')
										$llll = "https://www.dropbox.com/s/679b4pjce9xc9fp/CMO.png?dl=0";
									else if($hoonname1 == 'CMR')
										$llll = "https://www.dropbox.com/s/jw2rwhy2klh5kc8/CMR.png?dl=0";
									else if($hoonname1 == 'CNS')
										$llll = "https://www.dropbox.com/s/skl7jgjgj4mj5ea/CNS.png?dl=0";
									else if($hoonname1 == 'COL')
										$llll = "https://www.dropbox.com/s/0jyr65xem8739d3/CNT.png?dl=0";
									else if($hoonname1 == 'COLOR')
										$llll = "https://www.dropbox.com/s/kcl17w8v1kc90ks/COLOR.png?dl=0";
									else if($hoonname1 == 'CPALL')
										$llll = "https://www.dropbox.com/s/ut9lwb3qcgqui9c/CPALL.png?dl=0";
									else if($hoonname1 == 'CPF')
										$llll = "https://www.dropbox.com/s/9d482icdwnes336/CPF.png?dl=0";
									else if($hoonname1 == 'CPH')
										$llll = "https://www.dropbox.com/s/esso6enzwaubagv/CPH.png?dl=0";
									else if($hoonname1 == 'CPI')
										$llll = "https://www.dropbox.com/s/c9vx5xg39q111mf/CPI.png?dl=0";
									else if($hoonname1 == 'CPL')
										$llll = "https://www.dropbox.com/s/y08o658dhpkkjcu/CPL.png?dl=0";
									else if($hoonname1 == 'CPN')
										$llll = "https://www.dropbox.com/s/xo8y8gm65xtgjgy/CPN.png?dl=0";
									else if($hoonname1 == 'CPNCG')
										$llll = "https://www.dropbox.com/s/8smyqvdq0nfe5db/CPNCG.png?dl=0";
									else if($hoonname1 == 'CPR')
										$llll = "https://www.dropbox.com/s/jji9hn7ust2pfmj/CPR.png?dl=0";
									else if($hoonname1 == 'CPTGF')
										$llll = "https://www.dropbox.com/s/oqevqjkvhg04nm5/CPTGF.png?dl=0";
									else if($hoonname1 == 'CRANE')
										$llll = "https://www.dropbox.com/s/yv6bine63y9fgcw/CRANE.png?dl=0";
									else if($hoonname1 == 'CRYSTAL')
										$llll = "https://www.dropbox.com/s/w4guvyx3ev4fn10/CRYSTAL.png?dl=0";
									else if($hoonname1 == 'CSC')
										$llll = "https://www.dropbox.com/s/kob0uva7irq7och/CSC.png?dl=0";
									else if($hoonname1 == 'CSL')
										$llll = "https://www.dropbox.com/s/pq61mtlywrn90an/CSL.png?dl=0";
									else if($hoonname1 == 'CSP')
										$llll = "https://www.dropbox.com/s/as5ws9eb3bg2iln/CSP.png?dl=0";
									else if($hoonname1 == 'CSR')
										$llll = "https://www.dropbox.com/s/ek0z2icpqqvkyt4/CSR.png?dl=0";
									else if($hoonname1 == 'CSS')
										$llll = "https://www.dropbox.com/s/sjdcr443ynxt0xy/CSS.png?dl=0";
									else if($hoonname1 == 'CTARAF')
										$llll = "https://www.dropbox.com/s/6qr24izzstqpiwk/CTARAF.png?dl=0";
									else if($hoonname1 == 'CTW')
										$llll = "https://www.dropbox.com/s/9b9f3b9xxjrmr44/CTW.png?dl=0";	
									else if($hoonname1 == 'CWT')
										$llll = "https://www.dropbox.com/s/kgcauz64o5s3ckh/CWT.png?dl=0";
									else if($hoonname1 == 'DAII')
										$llll = "https://www.dropbox.com/s/md3ik9to3xc5jtr/DAII.png?dl=0";
									else if($hoonname1 == 'DCC')
										$llll = "https://www.dropbox.com/s/r775a0ju5etlfc4/DCC.png?dl=0";
									else if($hoonname1 == 'DCON')
										$llll = "https://www.dropbox.com/s/b4i1m412v51akz2/DCON.png?dl=0";
									else if($hoonname1 == 'DCORP')
										$llll = "https://www.dropbox.com/s/kcxwxy4lnkeu89w/DCORP.png?dl=0";
									else if($hoonname1 == 'DELTA')
										$llll = "https://www.dropbox.com/s/qdza9jcm7wolsqh/DELTA.png?dl=0";
									else if($hoonname1 == 'DEMCO')
										$llll = "https://www.dropbox.com/s/0mdbl336rjw4g27/DEMCO.png?dl=0";
									else if($hoonname1 == 'DIF')
										$llll = "https://www.dropbox.com/s/0j59tbrirkgigud/DIF.png?dl=0";
									else if($hoonname1 == 'DIMET')
										$llll = "https://www.dropbox.com/s/f1o3o9wzd1l06gf/DIMET.png?dl=0";
									else if($hoonname1 == 'DNA')
										$llll = "https://www.dropbox.com/s/k5vgx1ugt7b7m54/DNA.png?dl=0";
									else if($hoonname1 == 'DRACO')
										$llll = "https://www.dropbox.com/s/is7cvaoo3017rbl/DRACO.png?dl=0";
									else if($hoonname1 == 'DRT')
										$llll = "https://www.dropbox.com/s/ugnl7y1z8x6iwcj/DRT.png?dl=0";
									else if($hoonname1 == 'DSGT')
										$llll = "https://www.dropbox.com/s/p4pvg55vjtibmcx/DSGT.png?dl=0";
									else if($hoonname1 == 'DTAC')
										$llll = "https://www.dropbox.com/s/ofyiz5e1grglzmq/DTAC.png?dl=0";
									else if($hoonname1 == 'DTC')
										$llll = "https://www.dropbox.com/s/u84vofpl5db3wfb/DTC.png?dl=0";
									else if($hoonname1 == 'DTCI')
										$llll = "https://www.dropbox.com/s/ia6855huo27604p/DTCI.png?dl=0";
									else if($hoonname1 == 'DTCPF')
										$llll = "https://www.dropbox.com/s/4np2veco6yg0sl4/DTCPF.png?dl=0";
									else if($hoonname1 == 'EA')
										$llll = "https://www.dropbox.com/s/97s07btn84flnkp/EA.png?dl=0";	
									else if($hoonname1 == 'EARTH')
										$llll = "https://www.dropbox.com/s/vcky5dtl584d4k1/EARTH.png?dl=0";
									else if($hoonname1 == 'EASON')
										$llll = "https://www.dropbox.com/s/t3m4q0w10bxntco/EASON.png?dl=0";
									else if($hoonname1 == 'EASTW')
										$llll = "https://www.dropbox.com/s/0thhxnolu0d7zz2/EASTW.png?dl=0";
									else if($hoonname1 == 'ECF')
										$llll = "https://www.dropbox.com/s/omui729ya64nklk/ECF.png?dl=0";
									else if($hoonname1 == 'ECL')
										$llll = "https://www.dropbox.com/s/fbxu76wvqbucl9i/ECL.png?dl=0";
									else if($hoonname1 == 'EE')
										$llll = "https://www.dropbox.com/s/5clgk6y1oazr4dk/EE.png?dl=0";
									else if($hoonname1 == 'EFORL')
										$llll = "https://www.dropbox.com/s/ea47ozg0aa1xeqr/EFORL.png?dl=0";
									else if($hoonname1 == 'EGATIF')
										$llll = "https://www.dropbox.com/s/fe2owzflanfoq84/EGATIF.png?dl=0";
									else if($hoonname1 == 'EGCO')
										$llll = "https://www.dropbox.com/s/ug9n2yagy8xdr6h/EGCO.png?dl=0";
									else if($hoonname1 == 'EMC')
										$llll = "https://www.dropbox.com/s/pgwgbfd5loklcc9/EMC.png?dl=0";
									else if($hoonname1 == 'EPCO')
										$llll = "https://www.dropbox.com/s/c1v90iduxu71351/EPCO.png?dl=0";
									else if($hoonname1 == 'EPG')
										$llll = "https://www.dropbox.com/s/66b5s6uazjlnwjn/EPG.png?dl=0";
									else if($hoonname1 == 'ERW')
										$llll = "https://www.dropbox.com/s/r5hc5et4108o9ob/ERW.png?dl=0";
									else if($hoonname1 == 'ERWPF')
										$llll = "https://www.dropbox.com/s/r34two087pom9tl/ERWPF.png?dl=0";
									else if($hoonname1 == 'ESSO')
										$llll = "https://www.dropbox.com/s/h6uili5qhr15eb5/ESSO.png?dl=0";
									else if($hoonname1 == 'ESTAR')
										$llll = "https://www.dropbox.com/s/hb6g0fu113d7iz4/ESTAR.png?dl=0";
									else if($hoonname1 == 'EVER')
										$llll = "https://www.dropbox.com/s/nd3gwjzzee96h0z/EVER.png?dl=0";
									else if($hoonname1 == 'F&D')
										$llll = "https://www.dropbox.com/s/g6sxwzdbcvy4v07/F%26D.png?dl=0";
									else if($hoonname1 == 'FANCY')
										$llll = "https://www.dropbox.com/s/j7sj4wnt1k543do/FANCY.png?dl=0";
									else if($hoonname1 == 'FC')
										$llll = "https://www.dropbox.com/s/d3tkpmd6fbp3mfm/FC.png?dl=0";
									else if($hoonname1 == 'FE')
										$llll = "https://www.dropbox.com/s/9pfwa0twb01v9ya/FE.png?dl=0";
									else if($hoonname1 == 'FER')
										$llll = "https://www.dropbox.com/s/wk82jgrozdyrgzo/FER.png?dl=0";
									else if($hoonname1 == 'FIRE')
										$llll = "https://www.dropbox.com/s/eo4hbbw1g18jy1z/FIRE.png?dl=0";
									else if($hoonname1 == 'FMT')
										$llll = "https://www.dropbox.com/s/wfgym5iz4yhymb0/FMT.png?dl=0";
									else if($hoonname1 == 'FNS')
										$llll = "https://www.dropbox.com/s/qfsrj131xwizkkx/FNS.png?dl=0";
									else if($hoonname1 == 'FOCUS')
										$llll = "https://www.dropbox.com/s/2zcfg9x0rfq717d/FOCUS.png?dl=0";
									else if($hoonname1 == 'FORTH')
										$llll = "https://www.dropbox.com/s/fkl0aen7vasg51q/FORTH.png?dl=0";
									else if($hoonname1 == 'FPI')
										$llll = "https://www.dropbox.com/s/tlfivrz81omz4un/FPI.png?dl=0";
									else if($hoonname1 == 'FSMART')
										$llll = "https://www.dropbox.com/s/l11surm009yylqa/FSMART.png?dl=0";
									else if($hoonname1 == 'FSS')
										$llll = "https://www.dropbox.com/s/qjctmbivedktq8x/FSS.png?dl=0";
									else if($hoonname1 == 'FUTUREPF')
										$llll = "https://www.dropbox.com/s/ii65ha1ahtajofy/FUTUREPF.png?dl=0";
									else if($hoonname1 == 'FVC')
										$llll = "https://www.dropbox.com/s/h46qujab5z1yhmj/FVC.png?dl=0";
									else if($hoonname1 == 'GBX')
										$llll = "https://www.dropbox.com/s/tps1vtkptsjpauv/GBX.png?dl=0";
									else if($hoonname1 == 'GC')
										$llll = "https://www.dropbox.com/s/zpov3ci155fccmr/GC.png?dl=0";
									else if($hoonname1 == 'GCAP')
										$llll = "https://www.dropbox.com/s/h5d2xyufxqfio5x/GCAP.png?dl=0";
									else if($hoonname1 == 'GEL')
										$llll = "https://www.dropbox.com/s/8o8y9nwvet9wyxh/GEL.png?dl=0";
									else if($hoonname1 == 'GENCO')
										$llll = "https://www.dropbox.com/s/pajm17mv4zjgd6x/GENCO.png?dl=0";
									else if($hoonname1 == 'GFPT')
										$llll = "https://www.dropbox.com/s/z6ccgxjy3m6idle/GFPT.png?dl=0";
									else if($hoonname1 == 'GIFT')
										$llll = "https://www.dropbox.com/s/6xtr2pvty7ftkoc/GIFT.png?dl=0";
									else if($hoonname1 == 'GJS')
										$llll = "https://www.dropbox.com/s/6cwch1j5epgv72x/GJS.png?dl=0";
									else if($hoonname1 == 'GL')
										$llll = "https://www.dropbox.com/s/yh8x5wdnqnmtkgj/GL.png?dl=0";
									else if($hoonname1 == 'GLAND')
										$llll = "https://www.dropbox.com/s/9n3emph587ur9zm/GLAND.png?dl=0";
									else if($hoonname1 == 'GLOBAL')
										$llll = "https://www.dropbox.com/s/uujr40co1ib1mu4/GLOBAL.png?dl=0";
									else if($hoonname1 == 'GLOW')
										$llll = "https://www.dropbox.com/s/ksh7pjykdv5ss13/GLOW.png?dl=0";
									else if($hoonname1 == 'GOLD')
										$llll = "https://www.dropbox.com/s/1in9pkx3mrtv2zt/GOLD.png?dl=0";
									else if($hoonname1 == 'GOLDPF')
										$llll = "https://www.dropbox.com/s/vphzlf79n9n9bfw/GOLDPF.png?dl=0";
									else if($hoonname1 == 'GPSC')
										$llll = "https://www.dropbox.com/s/nu1qwmwuw2uqiu6/GPSC.png?dl=0";
									else if($hoonname1 == 'GRAMMY')
										$llll = "https://www.dropbox.com/s/4jpmqb0qetfj44s/GRAMMY.png?dl=0";
									else if($hoonname1 == 'GRAND')
										$llll = "https://www.dropbox.com/s/miqh58ap0yw9axn/GRAND.png?dl=0";
									else if($hoonname1 == 'GREEN')
										$llll = "https://www.dropbox.com/s/j65r8dmti04tcur/GREEN.png?dl=0";
									else if($hoonname1 == 'GSTEL')
										$llll = "https://www.dropbox.com/s/xwvlefk58i2qjrl/GSTEL.png?dl=0";
									else if($hoonname1 == 'GTB')
										$llll = "https://www.dropbox.com/s/q4y2dvypwd6patk/GTB.png?dl=0";
									else if($hoonname1 == 'GUNKUL')
										$llll = "https://www.dropbox.com/s/4a0wyu272x8mi99/GUNKUL.png?dl=0";
									else if($hoonname1 == 'GVREIT')
										$llll = "https://www.dropbox.com/s/q2psz62cmrc2fvg/GVREIT.png?dl=0";
									else if($hoonname1 == 'GYT')
										$llll = "https://www.dropbox.com/s/yt393n8xyylk4ea/GYT.png?dl=0";
									else if($hoonname1 == 'HANA')
										$llll = "https://www.dropbox.com/s/0liea6qudim44mn/HANA.png?dl=0";
									else if($hoonname1 == 'HFT')
										$llll = "https://www.dropbox.com/s/8x4jxmvp4ere2v9/HFT.png?dl=0";
									else if($hoonname1 == 'HMPRO')
										$llll = "https://www.dropbox.com/s/zob1wjaovi6xild/HMPRO.png?dl=0";
									else if($hoonname1 == 'HOTPOT')
										$llll = "https://www.dropbox.com/s/4hs2iwtoerz2oy3/HOTPOT.png?dl=0";
									else if($hoonname1 == 'HPF')
										$llll = "https://www.dropbox.com/s/l67l764r33gikba/HPF.png?dl=0";
									else if($hoonname1 == 'HPT')
										$llll = "https://www.dropbox.com/s/mykdcmb1kxjg2v6/HPT.png?dl=0";
									else if($hoonname1 == 'HTC')
										$llll = "https://www.dropbox.com/s/lxqljnqwgmjoe1j/HTC.png?dl=0";
									else if($hoonname1 == 'HTECH')
										$llll = "https://www.dropbox.com/s/297yqq6pm4rc20z/HTECH.png?dl=0";
									else if($hoonname1 == 'HYDRO')
										$llll = "https://www.dropbox.com/s/11440vbk00sn74s/HYDRO.png?dl=0";
									else if($hoonname1 == 'ICC')
										$llll = "https://www.dropbox.com/s/vwz9f0pj6n3r6m8/ICC.png?dl=0";
									else if($hoonname1 == 'ICHI')
										$llll = "https://www.dropbox.com/s/ibic7myfibhn2hg/ICHI.png?dl=0";
									else if($hoonname1 == 'IEC')
										$llll = "https://www.dropbox.com/s/89epr5dfzrxj5dk/IEC.png?dl=0";
									else if($hoonname1 == 'IFEC')
										$llll = "https://www.dropbox.com/s/stgc6dc3uy0lyoz/IFEC.png?dl=0";
									else if($hoonname1 == 'IFS')
										$llll = "https://www.dropbox.com/s/vb2tnkmgbkrz69b/IFS.png?dl=0";
									else if($hoonname1 == 'IHL')
										$llll = "https://www.dropbox.com/s/dwefsyn29bs3zu6/IHL.png?dl=0";
									else if($hoonname1 == 'ILINK')
										$llll = "https://www.dropbox.com/s/o3p63yy7q03kuzl/ILINK.png?dl=0";
									else if($hoonname1 == 'IMPACT')
										$llll = "https://www.dropbox.com/s/2d04yess2jvsaqp/IMPACT.png?dl=0";
									else if($hoonname1 == 'INET')
										$llll = "https://www.dropbox.com/s/g4ha8rrpc1sgbvs/INET.png?dl=0";
									else if($hoonname1 == 'INOX')
										$llll = "https://www.dropbox.com/s/z8j8oofzmq7qhzq/INOX.png?dl=0";
									else if($hoonname1 == 'INSURE')
										$llll = "https://www.dropbox.com/s/vhgm36mgkbklmw5/INSURE.png?dl=0";
									else if($hoonname1 == 'INTUCH')
										$llll = "https://www.dropbox.com/s/ena0e57xuapoe0t/INTUCH.png?dl=0";
									else if($hoonname1 == 'IRC')
										$llll = "https://www.dropbox.com/s/4cbm7doh4ly899i/IRC.png?dl=0";
									else if($hoonname1 == 'IRCP')
										$llll = "https://www.dropbox.com/s/9cknw6gfbyrp71o/IRCP.png?dl=0";
									else if($hoonname1 == 'IRPC')
										$llll = "https://www.dropbox.com/s/3ntn97eih4oce0g/IRPC.png?dl=0";
									else if($hoonname1 == 'IT')
										$llll = "https://www.dropbox.com/s/1p116ctf8x33gr9/IT.png?dl=0";
									else if($hoonname1 == 'ITD')
										$llll = "https://www.dropbox.com/s/v35066z369pnz4b/ITD.png?dl=0";
									else if($hoonname1 == 'ITEL')
										$llll = "https://www.dropbox.com/s/co63lrbsakc6fj1/ITEL.png?dl=0";
									else if($hoonname1 == 'IVL')
										$llll = "https://www.dropbox.com/s/cixm7m8uf3nww25/IVL.png?dl=0";
									else if($hoonname1 == 'J')
										$llll = "https://www.dropbox.com/s/73eldz0krduz3az/J.png?dl=0";
									else if($hoonname1 == 'JAS')
										$llll = "https://www.dropbox.com/s/hkjwaamm05vrn2a/JAS.png?dl=0";
									else if($hoonname1 == 'JASIF')
										$llll = "https://www.dropbox.com/s/8bo8em2zeo8itoo/JASIF.png?dl=0";
									else if($hoonname1 == 'JCP')
										$llll = "https://www.dropbox.com/s/wirx9ln4p69d3xw/JCP.png?dl=0";
									else if($hoonname1 == 'JCT')
										$llll = "https://www.dropbox.com/s/cl9yk0n6vythli4/JCT.png?dl=0";
									else if($hoonname1 == 'JMART')
										$llll = "https://www.dropbox.com/s/yjta1ac9cu9csn4/JMART.png?dl=0";
									else if($hoonname1 == 'JMT')
										$llll = "https://www.dropbox.com/s/3lvcunir4wc1d8q/JMT.png?dl=0";
									else if($hoonname1 == 'JSP')
										$llll = "https://www.dropbox.com/s/8v0zdiodcsox7da/JSP.png?dl=0";
									else if($hoonname1 == 'JTS')
										$llll = "https://www.dropbox.com/s/w7py7d3qlxzqw80/JTS.png?dl=0";
									else if($hoonname1 == 'JUBILE')
										$llll = "https://www.dropbox.com/s/qy54rew8j7n1e2y/JUBILE.png?dl=0";
									else if($hoonname1 == 'JUTHA')
										$llll = "https://www.dropbox.com/s/bd68mmy3cvnyis5/JUTHA.png?dl=0";
									else if($hoonname1 == 'JWD')
										$llll = "https://www.dropbox.com/s/w0ch7j8gzdmfgdz/JWD.png?dl=0";
									else if($hoonname1 == 'K')
										$llll = "https://www.dropbox.com/s/re81oz35ujgy6lp/K.png?dl=0";
									else if($hoonname1 == 'KAMART')
										$llll = "https://www.dropbox.com/s/lm3u9syodeko69s/KAMART.png?dl=0";
									else if($hoonname1 == 'KASET')
										$llll = "https://www.dropbox.com/s/41elb0l6wyills1/KASET.png?dl=0";
									else if($hoonname1 == 'KBANK')
										$llll = "https://www.dropbox.com/s/assal28jodtnt4o/KBANK.png?dl=0";
									else if($hoonname1 == 'KBS')
										$llll = "https://www.dropbox.com/s/9rhvqfexel4ic70/KBS.png?dl=0";
									else if($hoonname1 == 'KC')
										$llll = "https://www.dropbox.com/s/kdk47ff76mn8tbw/KC.png?dl=0";
									else if($hoonname1 == 'KCAR')
										$llll = "https://www.dropbox.com/s/1chbqn7sl7czx3b/KCAR.png?dl=0";
									else if($hoonname1 == 'KCE')
										$llll = "https://www.dropbox.com/s/8h9wrbxwtrv3zva/KCE.png?dl=0";
									else if($hoonname1 == 'KCM')
										$llll = "https://www.dropbox.com/s/0yz9xc8q8xhv3qu/KCM.png?dl=0";
									else if($hoonname1 == 'KDH')
										$llll = "https://www.dropbox.com/s/uewhpvn47lmrfep/KDH.png?dl=0";
									else if($hoonname1 == 'KGI')
										$llll = "https://www.dropbox.com/s/zfglmg4xw5y8eoy/KGI.png?dl=0";
									else if($hoonname1 == 'KIAT')
										$llll = "https://www.dropbox.com/s/mbbejhkv06a30z7/KIAT.png?dl=0";
									else if($hoonname1 == 'KKC')
										$llll = "https://www.dropbox.com/s/bhynlv2o565w87v/KKC.png?dl=0";
									else if($hoonname1 == 'KKP')
										$llll = "https://www.dropbox.com/s/aqcr0c4vcxuexqd/KKP.png?dl=0";
									else if($hoonname1 == 'KOOL')
										$llll = "https://www.dropbox.com/s/wky3ob3havtw2ep/KOOL.png?dl=0";
									else if($hoonname1 == 'KPNPF')
										$llll = "https://www.dropbox.com/s/0hyjes524y2fdhq/KPNPF.png?dl=0";
									else if($hoonname1 == 'KSL')
										$llll = "https://www.dropbox.com/s/fci7zp04ylivepz/KSL.png?dl=0";
									else if($hoonname1 == 'KTB')
										$llll = "https://www.dropbox.com/s/nvyvcpwdh3lqfki/KTB.png?dl=0";
									else if($hoonname1 == 'KTC')
										$llll = "https://www.dropbox.com/s/z7fespip34zsbfc/KTC.png?dl=0";
									else if($hoonname1 == 'KTECH')
										$llll = "https://www.dropbox.com/s/e4riepqrpcrh1lo/KTECH.png?dl=0";
									else if($hoonname1 == 'KTIS')
										$llll = "https://www.dropbox.com/s/qgjbv3tps801il0/KTIS.png?dl=0";
									else if($hoonname1 == 'KWC')
										$llll = "https://www.dropbox.com/s/puq94t82gaxtrar/KWC.png?dl=0";
									else if($hoonname1 == 'KWG')
										$llll = "https://www.dropbox.com/s/sgvdw9u8dlanq8r/KWG.png?dl=0";
									else if($hoonname1 == 'KYE')
										$llll = "https://www.dropbox.com/s/42sf1iy7yoxc41h/KYE.png?dl=0";
									else if($hoonname1 == 'L&E')
										$llll = "https://www.dropbox.com/s/ojokvtahc4y91hy/L%26E.png?dl=0";
									else if($hoonname1 == 'LALIN')
										$llll = "https://www.dropbox.com/s/gl53n44arso9d1y/LALIN.png?dl=0";
									else if($hoonname1 == 'LANNA')
										$llll = "https://www.dropbox.com/s/qd0rj3q29bhjmoi/LANNA.png?dl=0";
									else if($hoonname1 == 'LDC')
										$llll = "https://www.dropbox.com/s/yz0oorrkn4m17va/LDC.png?dl=0";
									else if($hoonname1 == 'LEE')
										$llll = "https://www.dropbox.com/s/xfl2hcuhqwnvtvt/LEE.png?dl=0";
									else if($hoonname1 == 'LH')
										$llll = "https://www.dropbox.com/s/d2kz0s19eco4rut/LH.png?dl=0";
									else if($hoonname1 == 'LHBANK')
										$llll = "https://www.dropbox.com/s/unipopvzwvhw6xo/LHBANK.png?dl=0";
									else if($hoonname1 == 'LHHOTEL')
										$llll = "https://www.dropbox.com/s/0fluu19cfuhtkwy/LHHOTEL.png?dl=0";
									else if($hoonname1 == 'LHK')
										$llll = "https://www.dropbox.com/s/4og1j14azke4akk/LHK.png?dl=0";
									else if($hoonname1 == 'LHPF')
										$llll = "https://www.dropbox.com/s/cihsf4nfcewtmmg/LHPF.png?dl=0";
									else if($hoonname1 == 'LHSC')
										$llll = "https://www.dropbox.com/s/kt7d4fcsytjff10/LHSC.png?dl=0";
									else if($hoonname1 == 'LIT')
										$llll = "https://www.dropbox.com/s/t7zhhyho7nyuhgg/LIT.png?dl=0";
									else if($hoonname1 == 'LOXLEY')
										$llll = "https://www.dropbox.com/s/rml7sw61a8bgu4d/LOXLEY.png?dl=0";
									else if($hoonname1 == 'LPH')
										$llll = "https://www.dropbox.com/s/3ek9u1wq5rggum7/LPH.png?dl=0";
									else if($hoonname1 == 'LPN')
										$llll = "https://www.dropbox.com/s/59a0gvod9hu2zc0/LPN.png?dl=0";
									else if($hoonname1 == 'LRH')
										$llll = "https://www.dropbox.com/s/iyffzopbpgr12yx/LRH.png?dl=0";
									else if($hoonname1 == 'LST')
										$llll = "https://www.dropbox.com/s/2e19fc1xki4m0a6/LST.png?dl=0";
									else if($hoonname1 == 'LTX')
										$llll = "https://www.dropbox.com/s/zd0zaawzvgylfxq/LTX.png?dl=0";
									else if($hoonname1 == 'LUXF')
										$llll = "https://www.dropbox.com/s/vqbtxknz51nx9st/LUXF.png?dl=0";
									else if($hoonname1 == 'LVT')
										$llll = "https://www.dropbox.com/s/0uuci9swt7vja57/LVT.png?dl=0";
									else if($hoonname1 == 'M')
										$llll = "https://www.dropbox.com/s/hcf4q48nz39os85/M.png?dl=0";
									else if($hoonname1 == 'MACO')
										$llll = "https://www.dropbox.com/s/2n9rbnfhq4bi6o5/MACO.png?dl=0";
									else if($hoonname1 == 'MAJOR')
										$llll = "https://www.dropbox.com/s/at04dzg5xq0myy8/MAJOR.png?dl=0";
									else if($hoonname1 == 'MAKRO')
										$llll = "https://www.dropbox.com/s/3e6mpj3kek2hnlf/MAKRO.png?dl=0";
									else if($hoonname1 == 'MALEE')
										$llll = "https://www.dropbox.com/s/ih7ctturbu35u0r/MALEE.png?dl=0";
									else if($hoonname1 == 'MANRIN')
										$llll = "https://www.dropbox.com/s/2ib103oixhp8boi/MANRIN.png?dl=0";
									else if($hoonname1 == 'MATCH')
										$llll = "https://www.dropbox.com/s/n3mem7uoe0oeboq/MATCH.png?dl=0";
									else if($hoonname1 == 'MATI')
										$llll = "https://www.dropbox.com/s/9a75ndq63l7ksy2/MATI.png?dl=0";
									else if($hoonname1 == 'MAX')
										$llll = "https://www.dropbox.com/s/x7saf69rfj7v8q5/MAX.png?dl=0";
									else if($hoonname1 == 'MBAX')
										$llll = "https://www.dropbox.com/s/lshwaj8hzu651qw/MBAX.png?dl=0";
									else if($hoonname1 == 'MBK')
										$llll = "https://www.dropbox.com/s/17hoxkg64bx9g5n/MBK.png?dl=0";
									else if($hoonname1 == 'MBKET')
										$llll = "https://www.dropbox.com/s/75lqgxk936flml8/MBKET.png?dl=0";
									else if($hoonname1 == 'MC')
										$llll = "https://www.dropbox.com/s/xv05wk4j00f5ora/MC.png?dl=0";
									else if($hoonname1 == 'M-CHAI')
										$llll = "https://www.dropbox.com/s/5h9t10wx9sj0hrl/M-CHAI.png?dl=0";
									else if($hoonname1 == 'MCOT')
										$llll = "https://www.dropbox.com/s/bizxxfjcejwkl46/MCOT.png?dl=0";
									else if($hoonname1 == 'MCS')
										$llll = "https://www.dropbox.com/s/38b1dr7gql5adj9/MCS.png?dl=0";
									else if($hoonname1 == 'MDX')
										$llll = "https://www.dropbox.com/s/60ldsgqswcg71yj/MDX.png?dl=0";
									else if($hoonname1 == 'MEGA')
										$llll = "https://www.dropbox.com/s/vgbcg67p49k47eo/MEGA.png?dl=0";
									else if($hoonname1 == 'METCO')
										$llll = "https://www.dropbox.com/s/yj6uwti1h9hyli0/METCO.png?dl=0";
									else if($hoonname1 == 'MFC')
										$llll = "https://www.dropbox.com/s/x8evd4grqdirsbk/MFC.png?dl=0";
									else if($hoonname1 == 'MFEC')
										$llll = "https://www.dropbox.com/s/9p6hkd3pq5zc9w7/MFEC.png?dl=0";
									else if($hoonname1 == 'MIDA')
										$llll = "https://www.dropbox.com/s/he0lhl8w5dlq64k/MIDA.png?dl=0";
									else if($hoonname1 == 'M-II')
										$llll = "https://www.dropbox.com/s/8q6pyvb3bvj6xe4/M-II.png?dl=0";
									else if($hoonname1 == 'MILL')
										$llll = "https://www.dropbox.com/s/fpes4q6o26xesas/MILL.png?dl=0";
									else if($hoonname1 == 'MINT')
										$llll = "https://www.dropbox.com/s/rppxp1nc7we1dar/MINT.png?dl=0";
									else if($hoonname1 == 'MIPF')
										$llll = "https://www.dropbox.com/s/z9g6ichtpbqhcd6/MIPF.png?dl=0";
									else if($hoonname1 == 'MIT')
										$llll = "https://www.dropbox.com/s/cwbt82a6dfrz07x/MIT.png?dl=0";
									else if($hoonname1 == 'MJD')
										$llll = "https://www.dropbox.com/s/50ez7kifji2xiq8/MJD.png?dl=0";
									else if($hoonname1 == 'MJLF')
										$llll = "https://www.dropbox.com/s/iwotsbftwnbc4u3/MJLF.png?dl=0";
									else if($hoonname1 == 'MK')
										$llll = "https://www.dropbox.com/s/65qu7knd5sr0lu6/MK.png?dl=0";
									else if($hoonname1 == 'ML')
										$llll = "https://www.dropbox.com/s/x9so4q5vytk2pyi/ML.png?dl=0";
									else if($hoonname1 == 'MNIT')
										$llll = "https://www.dropbox.com/s/fqrf506u6iwzefq/MNIT.png?dl=0";
									else if($hoonname1 == 'MNRF')
										$llll = "https://www.dropbox.com/s/5vm2nu0ef6s4ghq/MNRF.png?dl=0";
									else if($hoonname1 == 'MODERN')
										$llll = "https://www.dropbox.com/s/d6vrzfx8zj42l0l/MODERN.png?dl=0";
									else if($hoonname1 == 'MONO')
										$llll = "https://www.dropbox.com/s/hfxpxx3n51j6fr9/MONO.png?dl=0";
									else if($hoonname1 == 'MONTRI')
										$llll = "https://www.dropbox.com/s/e8sgpeumrr31uf7/MONTRI.png?dl=0";
									else if($hoonname1 == 'MOONG')
										$llll = "https://www.dropbox.com/s/4ko5zmramwkjs6m/MOONG.png?dl=0";
									else if($hoonname1 == 'M-PAT')
										$llll = "https://www.dropbox.com/s/vyylhmq0cls4gxq/M-PAT.png?dl=0";
									else if($hoonname1 == 'MPG')
										$llll = "https://www.dropbox.com/s/hu0k5ucsatnf7es/MPG.png?dl=0";
									else if($hoonname1 == 'MPIC')
										$llll = "https://www.dropbox.com/s/v8knq487hay7wqy/MPIC.png?dl=0";
									else if($hoonname1 == 'MSC')
										$llll = "https://www.dropbox.com/s/x78nebah6qjhkvo/MSC.png?dl=0";
									else if($hoonname1 == 'M-STOR')
										$llll = "https://www.dropbox.com/s/iq1dor29gopx5t5/M-STOR.png?dl=0";
									else if($hoonname1 == 'MTI')
										$llll = "https://www.dropbox.com/s/kaw8ou1vuqa7tmj/MTI.png?dl=0";
									else if($hoonname1 == 'MTLS')
										$llll = "https://www.dropbox.com/s/z4dqv4vrevk8o6f/MTLS.png?dl=0";
									else if($hoonname1 == 'NBC')
										$llll = "https://www.dropbox.com/s/jh4thhkvogwvi1t/NBC.png?dl=0";
									else if($hoonname1 == 'NC')
										$llll = "https://www.dropbox.com/s/v2npy73yeswc9lp/NC.png?dl=0";
									else if($hoonname1 == 'NCL')
										$llll = "https://www.dropbox.com/s/lghxi08zn6t5jm8/NCL.png?dl=0";
									else if($hoonname1 == 'NDR')
										$llll = "https://www.dropbox.com/s/omsnwc4x9gmpgv6/NDR.png?dl=0";
									else if($hoonname1 == 'NEP')
										$llll = "https://www.dropbox.com/s/3gxt7ed1z1e8h2g/NEP.png?dl=0";
									else if($hoonname1 == 'NETBAY')
										$llll = "https://www.dropbox.com/s/j4cq25i2gh9hvs3/NETBAY.png?dl=0";
									else if($hoonname1 == 'NEW')
										$llll = "https://www.dropbox.com/s/ano84xg70dfjktu/NEW.png?dl=0";
									else if($hoonname1 == 'NEWS')
										$llll = "https://www.dropbox.com/s/x4llxo1ne83mwta/NEWS.png?dl=0";
									else if($hoonname1 == 'NFC')
										$llll = "https://www.dropbox.com/s/o9gbkze43qm1fu7/NFC.png?dl=0";
									else if($hoonname1 == 'NINE')
										$llll = "https://www.dropbox.com/s/siqjsee0u9r1vlf/NINE.png?dl=0";
									else if($hoonname1 == 'NKI')
										$llll = "https://www.dropbox.com/s/g8pfepvvpze7stf/NKI.png?dl=0";
									else if($hoonname1 == 'NMG')
										$llll = "https://www.dropbox.com/s/de4847zctkaozp2/NMG.png?dl=0";
									else if($hoonname1 == 'NNCL')
										$llll = "https://www.dropbox.com/s/z86owoapxtvnqvv/NNCL.png?dl=0";
									else if($hoonname1 == 'NOBLE')
										$llll = "https://www.dropbox.com/s/k83td25kmb348pq/NOBLE.png?dl=0";
									else if($hoonname1 == 'NOK')
										$llll = "https://www.dropbox.com/s/cb9csgendtqw4u3/NOK.png?dl=0";
									else if($hoonname1 == 'NPK')
										$llll = "https://www.dropbox.com/s/qsn12gpqwszlbl7/NPK.png?dl=0";
									else if($hoonname1 == 'NPP')
										$llll = "https://www.dropbox.com/s/10dglwe9i59r3m9/NPP.png?dl=0";
									else if($hoonname1 == 'NSI')
										$llll = "https://www.dropbox.com/s/vghzunle0fcx3jc/NSI.png?dl=0";
									else if($hoonname1 == 'NTV')
										$llll = "https://www.dropbox.com/s/miqh0bcxcd1p19l/NTV.png?dl=0";
									else if($hoonname1 == 'NUSA')
										$llll = "https://www.dropbox.com/s/0yt3166oaxtzly1/NUSA.png?dl=0";
									else if($hoonname1 == 'NWR')
										$llll = "https://www.dropbox.com/s/eno8q0ufy81iy1o/NWR.png?dl=0";
									else if($hoonname1 == 'NYT')
										$llll = "https://www.dropbox.com/s/5ke4bgos9n8wzai/NYT.png?dl=0";
									else if($hoonname1 == 'OCC')
										$llll = "https://www.dropbox.com/s/wo6yg2z8fax8i2o/OCC.png?dl=0";
									else if($hoonname1 == 'OCEAN')
										$llll = "https://www.dropbox.com/s/lcr8itfnqw5ku9d/OCEAN.png?dl=0";
									else if($hoonname1 == 'OGC')
										$llll = "https://www.dropbox.com/s/vipt70yv2h06r1v/OGC.png?dl=0";
									else if($hoonname1 == 'OHTL')
										$llll = "https://www.dropbox.com/s/bv7q9tidnsf3p4z/OHTL.png?dl=0";
									else if($hoonname1 == 'OISHI')
										$llll = "https://www.dropbox.com/s/xd1db164e4ldt4m/OISHI.png?dl=0";
									else if($hoonname1 == 'ORI')
										$llll = "https://www.dropbox.com/s/fltj0ht2febdkmj/ORI.png?dl=0";
									else if($hoonname1 == 'OTO')
										$llll = "https://www.dropbox.com/s/2wedc2vme214l0l/OTO.png?dl=0";
									else if($hoonname1 == 'PACE')
										$llll = "https://www.dropbox.com/s/9vp77cmkhltvud1/PACE.png?dl=0";
									else if($hoonname1 == 'PAE')
										$llll = "https://www.dropbox.com/s/m9vhwmscmld5ucv/PAE.png?dl=0";
									else if($hoonname1 == 'PAF')
										$llll = "https://www.dropbox.com/s/bla900pou1u3unu/PAF.png?dl=0";
									else if($hoonname1 == 'PAP')
										$llll = "https://www.dropbox.com/s/rhyoikqwld924c9/PAP.png?dl=0";
									else if($hoonname1 == 'PATO')
										$llll = "https://www.dropbox.com/s/yozhhne5ibug4hl/PATO.png?dl=0";
									else if($hoonname1 == 'PB')
										$llll = "https://www.dropbox.com/s/ndlh0z7c85y9c82/PB.png?dl=0";
									else if($hoonname1 == 'PCA')
										$llll = "https://www.dropbox.com/s/eoxst0wx6o4y4pe/PCA.png?dl=0";
									else if($hoonname1 == 'PCSGH')
										$llll = "https://www.dropbox.com/s/o0zd9zyfdk9o0kh/PCSGH.png?dl=0";
									else if($hoonname1 == 'PDG')
										$llll = "https://www.dropbox.com/s/4hmkmutkv1qrt5g/PDG.png?dl=0";
									else if($hoonname1 == 'PDI')
										$llll = "https://www.dropbox.com/s/1zav4w4z5xvhtr8/PDI.png?dl=0";
									else if($hoonname1 == 'PE')
										$llll = "https://www.dropbox.com/s/822dyzf57nv7w2m/PE.png?dl=0";
									else if($hoonname1 == 'PERM')
										$llll = "https://www.dropbox.com/s/xkizjs012vazuch/PERM.png?dl=0";
									else if($hoonname1 == 'PF')
										$llll = "https://www.dropbox.com/s/wi9aqlla0w3owel/PF.png?dl=0";
									else if($hoonname1 == 'PG')
										$llll = "https://www.dropbox.com/s/4jg6q3j96yoegqc/PG.png?dl=0";
									else if($hoonname1 == 'PHOL')
										$llll = "https://www.dropbox.com/s/ubqouoc1h6qu8th/PHOL.png?dl=0";
									else if($hoonname1 == 'PICO')
										$llll = "https://www.dropbox.com/s/x31jejvhx4a19zd/PICO.png?dl=0";
									else if($hoonname1 == 'PIMO')
										$llll = "https://www.dropbox.com/s/r0nju7cst5fp79z/PIMO.png?dl=0";
									else if($hoonname1 == 'PJW')
										$llll = "https://www.dropbox.com/s/0373lx743fw4bjc/PJW.png?dl=0";
									else if($hoonname1 == 'PK')
										$llll = "https://www.dropbox.com/s/eku41a8hu8f2njf/PK.png?dl=0";
									else if($hoonname1 == 'PL')
										$llll = "https://www.dropbox.com/s/mx2e6bdjstxo0bv/PL.png?dl=0";
									else if($hoonname1 == 'PLANB')
										$llll = "https://www.dropbox.com/s/sgkerejz85ymreq/PLANB.png?dl=0";
									else if($hoonname1 == 'PLAT')
										$llll = "https://www.dropbox.com/s/2p91s4yydt7fu2t/PLAT.png?dl=0";
									else if($hoonname1 == 'PLE')
										$llll = "https://www.dropbox.com/s/dgt2uzzm9s9pde3/PLE.png?dl=0";
									else if($hoonname1 == 'PM')
										$llll = "https://www.dropbox.com/s/r0845v6emthim1r/PM.png?dl=0";
									else if($hoonname1 == 'PMTA')
										$llll = "https://www.dropbox.com/s/q07jwoea6je3cyq/PMTA.png?dl=0";
									else if($hoonname1 == 'POLAR')
										$llll = "https://www.dropbox.com/s/qdqz4axzuwlgh2l/POLAR.png?dl=0";
									else if($hoonname1 == 'POMPUI')
										$llll = "https://www.dropbox.com/s/v0tnthl8o16b7bw/POMPUI.png?dl=0";
									else if($hoonname1 == 'POPF')
										$llll = "https://www.dropbox.com/s/10p65mmgut1ewjf/POPF.png?dl=0";
									else if($hoonname1 == 'POST')
										$llll = "https://www.dropbox.com/s/4r86uakrovbwnz5/POST.png?dl=0";
									else if($hoonname1 == 'PPF')
										$llll = "https://www.dropbox.com/s/14u0k6a278yntdw/PPF.png?dl=0";
									else if($hoonname1 == 'PPM')
										$llll = "https://www.dropbox.com/s/thyfs97dw0chmtv/PPM.png?dl=0";
									else if($hoonname1 == 'PPS')
										$llll = "https://www.dropbox.com/s/fa76k50ep1d4xhe/PPS.png?dl=0";
									else if($hoonname1 == 'PR')
										$llll = "https://www.dropbox.com/s/3rl8mg2kmb7n8m0/PR.png?dl=0";
									else if($hoonname1 == 'PRAKIT')
										$llll = "https://www.dropbox.com/s/h7oqk21k94bzphs/PRAKIT.png?dl=0";
									else if($hoonname1 == 'PRANDA')
										$llll = "https://www.dropbox.com/s/ecazdasjjc9rkyb/PRANDA.png?dl=0";
									else if($hoonname1 == 'PREB')
										$llll = "https://www.dropbox.com/s/smkow6s7irwsx6v/PREB.png?dl=0";
									else if($hoonname1 == 'PRECHA')
										$llll = "https://www.dropbox.com/s/zuqnj9gcjulkbhg/PRECHA.png?dl=0";
									else if($hoonname1 == 'PRG')
										$llll = "https://www.dropbox.com/s/gwq7qm1v4it772b/PRG.png?dl=0";
									else if($hoonname1 == 'PRIN')
										$llll = "https://www.dropbox.com/s/lc9v1hjxhffrfok/PRIN.png?dl=0";
									else if($hoonname1 == 'PRINC')
										$llll = "https://www.dropbox.com/s/1jvqydqog1xpz02/PRINC.png?dl=0";
									else if($hoonname1 == 'PRO')
										$llll = "https://www.dropbox.com/s/3hbubk6jz60rqlr/PRO.png?dl=0";
									else if($hoonname1 == 'PS')
										$llll = "https://www.dropbox.com/s/dh0625yd6xm1khc/PS.png?dl=0";
									else if($hoonname1 == 'PSL')
										$llll = "https://www.dropbox.com/s/xqc2sm9btzd4ptd/PSL.png?dl=0";
									else if($hoonname1 == 'PSTC')
										$llll = "https://www.dropbox.com/s/4cip8cdep3c5vzf/PSTC.png?dl=0";
									else if($hoonname1 == 'PT')
										$llll = "https://www.dropbox.com/s/ko99cgdp4xsyn0s/PT.png?dl=0";
									else if($hoonname1 == 'PTG')
										$llll = "https://www.dropbox.com/s/gvhc01m16jgm06t/PTG.png?dl=0";
									else if($hoonname1 == 'PTL')
										$llll = "https://www.dropbox.com/s/ggx9x96zjl7kzo0/PTL.png?dl=0";
									else if($hoonname1 == 'PTT')
										$llll = "https://www.dropbox.com/s/fn6lno2qdm6tsjv/PTT.png?dl=0";
									else if($hoonname1 == 'PTTEP')
										$llll = "https://www.dropbox.com/s/u84u5o8vimget70/PTTEP.png?dl=0";
									else if($hoonname1 == 'PTTGC')
										$llll = "https://www.dropbox.com/s/0pa0my6i12kdoz0/PTTGC.png?dl=0";
									else if($hoonname1 == 'PYLON')
										$llll = "https://www.dropbox.com/s/b35okdlirliajaf/PYLON.png?dl=0";
									else if($hoonname1 == 'Q-CON')
										$llll = "https://www.dropbox.com/s/7uu04zryh6tww8q/Q-CON.png?dl=0";
									else if($hoonname1 == 'QH')
										$llll = "https://www.dropbox.com/s/wgpcnro0ei6inyr/QH.png?dl=0";
									else if($hoonname1 == 'QHHR')
										$llll = "https://www.dropbox.com/s/hbcf3vai7lvdfsi/QHHR.png?dl=0";
									else if($hoonname1 == 'QHOP')
										$llll = "https://www.dropbox.com/s/uwk664ezxh4rjy5/QHOP.png?dl=0";
									else if($hoonname1 == 'QHPF')
										$llll = "https://www.dropbox.com/s/rxa1ooupknwch0q/QHPF.png?dl=0";
									else if($hoonname1 == 'QLT')
										$llll = "https://www.dropbox.com/s/n6l69rcyaq71q67/QLT.png?dl=0";
									else if($hoonname1 == 'QTC')
										$llll = "https://www.dropbox.com/s/7l8lqa1rlclbl4x/QTC.png?dl=0";
									else if($hoonname1 == 'RAM')
										$llll = "https://www.dropbox.com/s/uvgqbfeo4l2so63/RAM.png?dl=0";
									else if($hoonname1 == 'RATCH')
										$llll = "https://www.dropbox.com/s/1tks0gofpl65r07/RATCH.png?dl=0";
									else if($hoonname1 == 'RCI')
										$llll = "https://www.dropbox.com/s/kpak4g9oi08tlqi/RCI.png?dl=0";
									else if($hoonname1 == 'RCL')
										$llll = "https://www.dropbox.com/s/ykw713zaqmbsfkj/RCL.png?dl=0";
									else if($hoonname1 == 'RICH')
										$llll = "https://www.dropbox.com/s/o15uczqdydfs25k/RICH.png?dl=0";
									else if($hoonname1 == 'RICHY')
										$llll = "https://www.dropbox.com/s/rdxx9jdn156bsgx/RICHY.png?dl=0";
									else if($hoonname1 == 'RJH')
										$llll = "https://www.dropbox.com/s/q5jvmrm0atpz5zp/RJH.png?dl=0";
									else if($hoonname1 == 'RML')
										$llll = "https://www.dropbox.com/s/lgiluldciz3ht0w/RML.png?dl=0";
									else if($hoonname1 == 'ROBINS')
										$llll = "https://www.dropbox.com/s/pgcelpkw01a2eio/ROBINS.png?dl=0";
									else if($hoonname1 == 'ROCK')
										$llll = "https://www.dropbox.com/s/mxw5hrjnu6eb8ac/ROCK.png?dl=0";
									else if($hoonname1 == 'ROH')
										$llll = "https://www.dropbox.com/s/ngjyxooz3iz7m7z/ROH.png?dl=0";
									else if($hoonname1 == 'ROJNA')
										$llll = "https://www.dropbox.com/s/w3b687lhjh8q8rm/ROJNA.png?dl=0";
									else if($hoonname1 == 'RP')
										$llll = "https://www.dropbox.com/s/fj7bpgnxxmeqia2/RP.png?dl=0";
									else if($hoonname1 == 'RPC')
										$llll = "https://www.dropbox.com/s/jd9igclpjjc9hgg/RPC.png?dl=0";
									else if($hoonname1 == 'RS')
										$llll = "https://www.dropbox.com/s/vmzuvhn9lkkh8af/RS.png?dl=0";
									else if($hoonname1 == 'RWI')
										$llll = "https://www.dropbox.com/s/5ujpkbvb473fx4p/RWI.png?dl=0";
									else if($hoonname1 == 'S&J')
										$llll = "https://www.dropbox.com/s/8ebfr9e58w112he/S%20%26%20J.png?dl=0";
									else if($hoonname1 == 'S')
										$llll = "https://www.dropbox.com/s/ltcfhsrumhuka37/S.png?dl=0";
									else if($hoonname1 == 'S11')
										$llll = "https://www.dropbox.com/s/p48malnl4avcxnc/S11.png?dl=0";
									else if($hoonname1 == 'SAMCO')
										$llll = "https://www.dropbox.com/s/376lehudp4nvutf/SAMCO.png?dl=0";
									else if($hoonname1 == 'SAWAD')
										$llll = "https://www.dropbox.com/s/dmt4hlh52eprbjw/SAWAD.png?dl=0";
									else if($hoonname1 == 'SCCC')
										$llll = "https://www.dropbox.com/s/1943fqloimslp28/SCCC.png?dl=0";
									else if($hoonname1 == 'SEAOIL')
										$llll = "https://www.dropbox.com/s/n0mt8m1fx0t4b14/SEAOIL.png?dl=0";
									else if($hoonname1 == 'SABINA')
										$llll = "https://www.dropbox.com/s/wt5wmm6ewr1nkja/SABINA.png?dl=0";
									else if($hoonname1 == 'SAMTEL')
										$llll = "https://www.dropbox.com/s/twt3lzzy30yhk5z/SAMTEL.png?dl=0";
									else if($hoonname1 == 'SAWANG')
										$llll = "https://www.dropbox.com/s/km8q141t19h47p7/SAWANG.png?dl=0";
									else if($hoonname1 == 'SCG')
										$llll = "https://www.dropbox.com/s/1n9h5034phezyyg/SCG.png?dl=0";
									else if($hoonname1 == 'SE-ED')
										$llll = "https://www.dropbox.com/s/wrp5zz5y6o9amkj/SE-ED.png?dl=0";
									else if($hoonname1 == 'SAFARI')
										$llll = "https://www.dropbox.com/s/ig1o9qjy1d61jv8/SAFARI.png?dl=0";
									else if($hoonname1 == 'SANKO')
										$llll = "https://www.dropbox.com/s/owgar7gieujqz8l/SANKO.png?dl=0";
									else if($hoonname1 == 'SBPF')
										$llll = "https://www.dropbox.com/s/fagw0xca4c3lue2/SBPF.png?dl=0";
									else if($hoonname1 == 'SCI')
										$llll = "https://www.dropbox.com/s/hnjn0qx1lgn6w8g/SCI.png?dl=0";
									else if($hoonname1 == 'SELIC')
										$llll = "https://www.dropbox.com/s/qi1yjug0ph6arvh/SELIC.png?dl=0";
									else if($hoonname1 == 'SALEE')
										$llll = "https://www.dropbox.com/s/b414zruh7c55fx6/SALEE.png?dl=0";
									else if($hoonname1 == 'SAPPE')
										$llll = "https://www.dropbox.com/s/q8yvfud2av2horo/SAPPE.png?dl=0";
									else if($hoonname1 == 'SC')
										$llll = "https://www.dropbox.com/s/6gjwyvmwfs4z1az/SC.png?dl=0";
									else if($hoonname1 == 'SCN')
										$llll = "https://www.dropbox.com/s/dbyn5kxon0p3lwl/SCN.png?dl=0";
									else if($hoonname1 == 'SENA')
										$llll = "https://www.dropbox.com/s/sutf97pehukv8i5/SENA.png?dl=0";
									else if($hoonname1 == 'SAM')
										$llll = "https://www.dropbox.com/s/pi6fjdd6iup9z9l/SAM.png?dl=0";
									else if($hoonname1 == 'SAT')
										$llll = "https://www.dropbox.com/s/m6zazbx7f2xcu0p/SAT.png?dl=0";
									else if($hoonname1 == 'SCB')
										$llll = "https://www.dropbox.com/s/tjf7q6kazx1hngx/SCB.png?dl=0";
									else if($hoonname1 == 'SCP')
										$llll = "https://www.dropbox.com/s/bqj3jk0dxhmpn2g/SCP.png?dl=0";
									else if($hoonname1 == 'SF')
										$llll = "https://www.dropbox.com/s/euzrtbtevt1k2rd/SF.png?dl=0";
									else if($hoonname1 == 'SAMART')
										$llll = "https://www.dropbox.com/s/a6eyvfybhmly6y5/SAMART.png?dl=0";
									else if($hoonname1 == 'SAUCE')
										$llll = "https://www.dropbox.com/s/qtvy1ju85nw4epl/SAUCE.png?dl=0";
									else if($hoonname1 == 'SCC')
										$llll = "https://www.dropbox.com/s/lwjtsy0wj90hl30/SCC.png?dl=0";
									else if($hoonname1 == 'SEAFCO')
										$llll = "https://www.dropbox.com/s/02novuaklnrske1/SEAFCO.png?dl=0";
									else if($hoonname1 == 'SFP')
										$llll = "https://www.dropbox.com/s/rnnx7fgdr5stpdo/SFP.png?dl=0";
									else if($hoonname1 == 'SGF')
										$llll = "https://www.dropbox.com/s/0sbfcecx4u0sbvd/SGF.png?dl=0";
									else if($hoonname1 == 'SGP')
										$llll = "https://www.dropbox.com/s/pwccm7fqp52hh25/SGP.png?dl=0";
									else if($hoonname1 == 'SHANG')
										$llll = "https://www.dropbox.com/s/3rnkdrihssxf70j/SHANG.png?dl=0";
									else if($hoonname1 == 'SIAM')
										$llll = "https://www.dropbox.com/s/ib23r11vsdvlb9q/SIAM.png?dl=0";
									else if($hoonname1 == 'SIM')
										$llll = "https://www.dropbox.com/s/5qmk503wzqjkrqu/SIM.png?dl=0";
									else if($hoonname1 == 'SIMAT')
										$llll = "https://www.dropbox.com/s/09odsrjpk2d4ix6/SIMAT.png?dl=0";
									else if($hoonname1 == 'SINGER')
										$llll = "https://www.dropbox.com/s/v796h2zo0h4v8o0/SINGER.png?dl=0";
									else if($hoonname1 == 'SIRI')
										$llll = "https://www.dropbox.com/s/dmhcb35kajkckrh/SIRI.png?dl=0";
									else if($hoonname1 == 'SIRIP')
										$llll = "https://www.dropbox.com/s/51qnt6mgnifajas/SIRIP.png?dl=0";
									else if($hoonname1 == 'SIS')
										$llll = "https://www.dropbox.com/s/mx5bnqd945a26f6/SIS.png?dl=0";
									else if($hoonname1 == 'SITHAI')
										$llll = "https://www.dropbox.com/s/ahhbkt9kip5wjni/SITHAI.png?dl=0";
									else if($hoonname1 == 'SKR')
										$llll = "https://www.dropbox.com/s/uubgcrgm32z0g6l/SKR.png?dl=0";
									else if($hoonname1 == 'SLP')
										$llll = "https://www.dropbox.com/s/c3bwaly9745ibm1/SLP.png?dl=0";
									else if($hoonname1 == 'SMART')
										$llll = "https://www.dropbox.com/s/9wvx0h5cs442mf6/SMART.png?dl=0";
									else if($hoonname1 == 'SMIT')
										$llll = "https://www.dropbox.com/s/r2itzmway39jq1a/SMIT.png?dl=0";
									else if($hoonname1 == 'SMK')
										$llll = "https://www.dropbox.com/s/bi0mfdzvgaxkrhz/SMK.png?dl=0";
									else if($hoonname1 == 'SMM')
										$llll = "https://www.dropbox.com/s/e4d0wp3ixw834cs/SMM.png?dl=0";
									else if($hoonname1 == 'SMPC')
										$llll = "https://www.dropbox.com/s/2o9g1qqa9i3q6v9/SMPC.png?dl=0";
									else if($hoonname1 == 'SMT')
										$llll = "https://www.dropbox.com/s/ak7rcr7e9bh8cu7/SMT.png?dl=0";
									else if($hoonname1 == 'SNP')
										$llll = "https://www.dropbox.com/s/fgkj6nucs9w7mma/SNP.png?dl=0";
									else if($hoonname1 == 'SNC')
										$llll = "https://www.dropbox.com/s/oj3sxszry2ozsrr/SNC.png?dl=0";
									else if($hoonname1 == 'SOLAR')
										$llll = "https://www.dropbox.com/s/2z3ew2tw6odsgpv/SOLAR.png?dl=0";
									else if($hoonname1 == 'SORKON')
										$llll = "https://www.dropbox.com/s/fwlvlwi4ssnhfcn/SORKON.png?dl=0";
									else if($hoonname1 == 'SPA')
										$llll = "https://www.dropbox.com/s/7ljc5m4wt5swfcl/SPA.png?dl=0";
									else if($hoonname1 == 'SPACK')
										$llll = "https://www.dropbox.com/s/dcqfzm73zo2j6cb/SPACK.png?dl=0";
									else if($hoonname1 == 'SPALI')
										$llll = "https://www.dropbox.com/s/xe5k4qtdggx28j0/SPALI.png?dl=0";
									else if($hoonname1 == 'SPC')
										$llll = "https://www.dropbox.com/s/0pqcakbv1lav61k/SPC.png?dl=0";
									else if($hoonname1 == 'SPCG')
										$llll = "https://www.dropbox.com/s/biiiobxlr8fwa0x/SPCG.png?dl=0";
									else if($hoonname1 == 'SPF')
										$llll = "https://www.dropbox.com/s/wbiknweqzd1rodn/SPF.png?dl=0";
									else if($hoonname1 == 'SPG')
										$llll = "https://www.dropbox.com/s/n96rc7gzdbx8b4m/SPG.png?dl=0";
									else if($hoonname1 == 'SPI')
										$llll = "https://www.dropbox.com/s/w3duczc8g5tsujl/SPI.png?dl=0";
									else if($hoonname1 == 'SPORT')
										$llll = "https://www.dropbox.com/s/ff9rqi46zblla7k/SPORT.png?dl=0";
									else if($hoonname1 == 'SPPT')
										$llll = "https://www.dropbox.com/s/v5lk1hzh7prr712/SPPT.png?dl=0";
									else if($hoonname1 == 'SPRC')
										$llll = "https://www.dropbox.com/s/6ic2ze91pzo1wsv/SPRC.png?dl=0";
									else if($hoonname1 == 'SPVI')
										$llll = "https://www.dropbox.com/s/h0p3ditencm25ti/SPVI.png?dl=0";
									else if($hoonname1 == 'SPWPF')
										$llll = "https://www.dropbox.com/s/t8hg3hm3uq730bv/SPWPF.png?dl=0";
									else if($hoonname1 == 'SR')
										$llll = "https://www.dropbox.com/s/djol7t6n5v40sd5/SR.png?dl=0";
									else if($hoonname1 == 'SRICHA')
										$llll = "https://www.dropbox.com/s/8dkk95xac23j9co/SRICHA.png?dl=0";
									else if($hoonname1 == 'SSC')
										$llll = "https://www.dropbox.com/s/s1dy8toycserz0k/SSC.png?dl=0";
									else if($hoonname1 == 'SSF')
										$llll = "https://www.dropbox.com/s/2fb4hlfp63vj2a7/SSF.png?dl=0";
									else if($hoonname1 == 'SSI')
										$llll = "https://www.dropbox.com/s/xl3sr7r7x1udz25/SSI.png?dl=0";
									else if($hoonname1 == 'SSPF')
										$llll = "https://www.dropbox.com/s/e1t97dztcovxmli/SSPF.png?dl=0";
									else if($hoonname1 == 'SSSC')
										$llll = "https://www.dropbox.com/s/zzxr8wgykn7jqad/SSSC.png?dl=0";
									else if($hoonname1 == 'SST')
										$llll = "https://www.dropbox.com/s/m09onwfmg3dttd8/SST.png?dl=0";
									else if($hoonname1 == 'SSTPF')
										$llll = "https://www.dropbox.com/s/w7nr8svm6vup779/SSTPF.png?dl=0";
									else if($hoonname1 == 'SSTSS')
										$llll = "https://www.dropbox.com/s/94zi6xjenheuoe7/SSTSS.png?dl=0";
									else if($hoonname1 == 'SPI')
										$llll = "https://www.dropbox.com/s/w3duczc8g5tsujl/SPI.png?dl=0";
									else if($hoonname1 == 'STANLY')
										$llll = "https://www.dropbox.com/s/6y0xuf19fmgkqjf/STANLY.png?dl=0";
									else if($hoonname1 == 'STEC')
										$llll = "https://www.dropbox.com/s/y8pteeh5yymfd5k/STEC.png?dl=0";
									else if($hoonname1 == 'STHAI')
										$llll = "https://www.dropbox.com/s/evda2snwi4pttvc/STHAI.png?dl=0";
									else if($hoonname1 == 'STPI')
										$llll = "https://www.dropbox.com/s/ikyulf4ye9kgtga/STPI.png?dl=0";
									else if($hoonname1 == 'SUC')
										$llll = "https://www.dropbox.com/s/4enp47j18uolc4q/SUC.png?dl=0";
									else if($hoonname1 == 'SUPER')
										$llll = "https://www.dropbox.com/s/x55a4hgt1jr3wwp/SUPER.png?dl=0";
									else if($hoonname1 == 'SUSCO')
										$llll = "https://www.dropbox.com/s/pvsg8fjgf8nbar4/SUSCO.png?dl=0";
									else if($hoonname1 == 'SUTHA')
										$llll = "https://www.dropbox.com/s/3u9gpee7m6k7o67/SUTHA.png?dl=0";
									else if($hoonname1 == 'SVH')
										$llll = "https://www.dropbox.com/s/er71dz27s499nai/SVH.png?dl=0";
									else if($hoonname1 == 'SVI')
										$llll = "https://www.dropbox.com/s/ng8p30o7grb434j/SVI.png?dl=0";
									else if($hoonname1 == 'SVOA')
										$llll = "https://www.dropbox.com/s/bkkeah4tehmf64y/SVOA.png?dl=0";
									else if($hoonname1 == 'SWC')
										$llll = "https://www.dropbox.com/s/9mx5ejaifglg37f/SWC.png?dl=0";
									else if($hoonname1 == 'SYMC')
										$llll = "https://www.dropbox.com/s/7hqbkuail0w5vxm/SYMC.png?dl=0";
									else if($hoonname1 == 'SYNEX')
										$llll = "https://www.dropbox.com/s/hqkj8uncyrvje6y/SYNEX.png?dl=0";
									else if($hoonname1 == 'SYNTEC')
										$llll = "https://www.dropbox.com/s/h5ocor3kj3qj2kn/SYNTEC.png?dl=0";
									else if($hoonname1 == 'T')
										$llll = "https://www.dropbox.com/s/75dvs4hszkpz8de/T.png?dl=0";
									else if($hoonname1 == 'TACC')
										$llll = "https://www.dropbox.com/s/ey3fpdq611o52qy/TACC.png?dl=0";
									else if($hoonname1 == 'TAE')
										$llll = "https://www.dropbox.com/s/jxt46s68xc2wg5j/TAE.png?dl=0";
									else if($hoonname1 == 'TAKUNI')
										$llll = "https://www.dropbox.com/s/84zn38tju1lz1gc/TAKUNI.png?dl=0";
									else if($hoonname1 == 'TAPAC')
										$llll = "https://www.dropbox.com/s/9ejv9i25pj45z6s/TAPAC.png?dl=0";
									else if($hoonname1 == 'TASCO')
										$llll = "https://www.dropbox.com/s/zkj53lyhbtsmgzd/TASCO.png?dl=0";
									else if($hoonname1 == 'TBSP')
										$llll = "https://www.dropbox.com/s/rvj32o6j6chmq1m/TBSP.png?dl=0";
									else if($hoonname1 == 'TC')
										$llll = "https://www.dropbox.com/s/80zberr8jtnggws/TC.png?dl=0";
									else if($hoonname1 == 'TCAP')
										$llll = "https://www.dropbox.com/s/4p1xej3m4lq33nq/TCAP.png?dl=0";
									else if($hoonname1 == 'TCB')
										$llll = "https://www.dropbox.com/s/tcfr9odcswehgts/TCB.png?dl=0";
									else if($hoonname1 == 'TCC')
										$llll = "https://www.dropbox.com/s/far74wtwsdokhl1/TCC.png?dl=0";
									else if($hoonname1 == 'TCCC')
										$llll = "https://www.dropbox.com/s/8p35ep57gq52j3b/TCCC.png?dl=0";
									else if($hoonname1 == 'TCIF')
										$llll = "https://www.dropbox.com/s/kjfo3vq0ez14rho/TCIF.png?dl=0";
									else if($hoonname1 == 'TCJ')
										$llll = "https://www.dropbox.com/s/riev55hks0r8xu6/TCJ.png?dl=0";
									else if($hoonname1 == 'TCMC')
										 $llll = 'https://www.dropbox.com/s/9k673bcprz9m632/TCMC.png?dl=0';
									else if($hoonname1 == 'TEAM')
										 $llll = 'https://www.dropbox.com/s/3fvp9zg1h0z83np/TEAM.png?dl=0';
									else if($hoonname1 == 'TF')
										 $llll = 'https://www.dropbox.com/s/685cdt5niso5iog/TF.png?dl=0';
									else if($hoonname1 == 'TFD')
										 $llll = 'https://www.dropbox.com/s/9j7fb05qh0qpalb/TFD.png?dl=0';
									else if($hoonname1 == 'TFG')
										 $llll = 'https://www.dropbox.com/s/fgvoyjb79s52btu/TFG.png?dl=0';
									else if($hoonname1 == 'TFI')
										 $llll = 'https://www.dropbox.com/s/m4kd4rf04lnlnbs/TFI.png?dl=0';
									else if($hoonname1 == 'TFUND')
										 $llll = 'https://www.dropbox.com/s/ywnijjpfq7wlve2/TFUND.png?dl=0';
									else if($hoonname1 == 'TGCI')
										 $llll = 'https://www.dropbox.com/s/4lpftu5owsxtq1u/TGCI.png?dl=0';
									else if($hoonname1 == 'TGPRO')
										 $llll = 'https://www.dropbox.com/s/snzzflx3zfvpb2m/TGPRO.png?dl=0';
									else if($hoonname1 == 'TGROWTH')
										 $llll = 'https://www.dropbox.com/s/l8n2jxx7kztylq5/TGROWTH.png?dl=0';
									else if($hoonname1 == 'TH')
										 $llll = 'https://www.dropbox.com/s/iq825lunm2m3hgl/TH.png?dl=0';
									else if($hoonname1 == 'THAI')
										 $llll = 'https://www.dropbox.com/s/op983y6c89otxm9/THAI.png?dl=0';
									else if($hoonname1 == 'THANA')
										 $llll = 'https://www.dropbox.com/s/xk6rvjp0qlby9lw/THANA.png?dl=0';
									else if($hoonname1 == 'THANI')
										 $llll = 'https://www.dropbox.com/s/h09km50j1a7zb0b/THANI.png?dl=0';
									else if($hoonname1 == 'THCOM')
										 $llll = 'https://www.dropbox.com/s/2xeit3y8x2whxkr/THCOM.png?dl=0';
									else if($hoonname1 == 'THE')
										 $llll = 'https://www.dropbox.com/s/wev5yy1oowi03nk/THE.png?dl=0';
									else if($hoonname1 == 'THIF')
										 $llll = 'https://www.dropbox.com/s/k9hwgrv416uko7j/THIF.png?dl=0';
									else if($hoonname1 == 'THIP')
										 $llll = 'https://www.dropbox.com/s/3e9g86cja7mhevj/THIP.png?dl=0';
									else if($hoonname1 == 'THL')
										 $llll = 'https://www.dropbox.com/s/feyq9bbbgrqc2wx/THL.png?dl=0';
									else if($hoonname1 == 'THRE')
										 $llll = 'https://www.dropbox.com/s/o1bscnvsiuzmc97/THRE.png?dl=0';
									else if($hoonname1 == 'THREL')
										 $llll = 'https://www.dropbox.com/s/tqnkucakpxo7m1w/THREL.png?dl=0';
									else if($hoonname1 == 'TIC')
										 $llll = 'https://www.dropbox.com/s/t8t57kqr1mthrjz/TIC.png?dl=0';
									else if($hoonname1 == 'TICON')
										 $llll = 'https://www.dropbox.com/s/9yn1hprprhmv7pj/TICON.png?dl=0';
									else if($hoonname1 == 'TIF1')
										 $llll = 'https://www.dropbox.com/s/itcx9hjkj6foulf/TIF1.png?dl=0';
									else if($hoonname1 == 'TIP')
										 $llll = 'https://www.dropbox.com/s/oawwu0f8dxs9q8u/TIP.png?dl=0';
									else if($hoonname1 == 'TIPCO')
										 $llll = 'https://www.dropbox.com/s/4yx6dug2ndd87iv/TIPCO.png?dl=0';
									else if($hoonname1 == 'TISCO')
										 $llll = 'https://www.dropbox.com/s/k52iys456115u6b/TISCO.png?dl=0';
									else if($hoonname1 == 'TIW')
										 $llll = 'https://www.dropbox.com/s/4ezrayse5g7om81/TIW.png?dl=0';
									else if($hoonname1 == 'TK')
										 $llll = 'https://www.dropbox.com/s/4ebj0hqnebrw4gi/TK.png?dl=0';
									else if($hoonname1 == 'TKN')
										 $llll = 'https://www.dropbox.com/s/j634wndar7hjjps/TKN.png?dl=0';
									else if($hoonname1 == 'TKS')
										 $llll = 'https://www.dropbox.com/s/icjuw8u1q9xby2m/TKS.png?dl=0';
									else if($hoonname1 == 'TKT')
										 $llll = 'https://www.dropbox.com/s/qj27zgjt2o8hlhp/TKT.png?dl=0';
									else if($hoonname1 == 'TLGF')
										 $llll = 'https://www.dropbox.com/s/uy9zgq8c34f5bgl/TLGF.png?dl=0';
									else if($hoonname1 == 'TLHPF')
										 $llll = 'https://www.dropbox.com/s/armr1diy74l28zv/TLHPF.png?dl=0';
									else if($hoonname1 == 'TLOGIS')
										 $llll = 'https://www.dropbox.com/s/lhw3fy1xzxwi1cl/TLOGIS.png?dl=0';
									else if($hoonname1 == 'TLUXE')
										 $llll = 'https://www.dropbox.com/s/f5uisd63imsjx9v/TLUXE.png?dl=0';
									else if($hoonname1 == 'TM')
										 $llll = 'https://www.dropbox.com/s/90dxei1xy87hkqq/TM.png?dl=0';
									else if($hoonname1 == 'TMB')
										 $llll = 'https://www.dropbox.com/s/5ybwdm1jxcx346v/TMB.png?dl=0';
									else if($hoonname1 == 'TMC')
										 $llll = 'https://www.dropbox.com/s/damy1qok8hdx2hi/TMC.png?dl=0';
									else if($hoonname1 == 'TMD')
										 $llll = 'https://www.dropbox.com/s/dun0rp2c2ayh4pr/TMD.png?dl=0';
									else if($hoonname1 == 'TMI')
										 $llll = 'https://www.dropbox.com/s/9v906ojzl4iuo4y/TMI.png?dl=0';
									else if($hoonname1 == 'TMILL')
										 $llll = 'https://www.dropbox.com/s/h2tuz4vuzf872h1/TMILL.png?dl=0';
									else if($hoonname1 == 'TMT')
										 $llll = 'https://www.dropbox.com/s/rz9rv0490mu4q5z/TMT.png?dl=0';
									else if($hoonname1 == 'TMW')
										 $llll = 'https://www.dropbox.com/s/t6qk8d74ym75kc7/TMW.png?dl=0';
									else if($hoonname1 == 'TNDT')
										 $llll = 'https://www.dropbox.com/s/qx5yfh8vykt40rc/TNDT.png?dl=0';
									else if($hoonname1 == 'TNH')
										 $llll = 'https://www.dropbox.com/s/g56hr1y06e641ck/TNH.png?dl=0';
									else if($hoonname1 == 'TNITY')
										 $llll = 'https://www.dropbox.com/s/kaqz44f4oz9fr9l/TNITY.png?dl=0';
									else if($hoonname1 == 'TNL')
										 $llll = 'https://www.dropbox.com/s/w1aj9y9ymvfoxql/TNL.png?dl=0';
									else if($hoonname1 == 'TNP')
										 $llll = 'https://www.dropbox.com/s/g76fqwcbr8tycug/TNP.png?dl=0';
									else if($hoonname1 == 'TNPC')
										 $llll = 'https://www.dropbox.com/s/2i3lq1de86lerjd/TNPC.png?dl=0';
									else if($hoonname1 == 'TNPF')
										 $llll = 'https://www.dropbox.com/s/jo41fjbobcs706d/TNPF.png?dl=0';
									else if($hoonname1 == 'TOG')
										 $llll = 'https://www.dropbox.com/s/hrfu36yxe8es5vx/TOG.png?dl=0';
									else if($hoonname1 == 'TOP')
										 $llll = 'https://www.dropbox.com/s/92g77dvbo3fokx9/TOP.png?dl=0';
									else if($hoonname1 == 'TOPP')
										 $llll = 'https://www.dropbox.com/s/6wj8yzwm98pvk7m/TOPP.png?dl=0';
									else if($hoonname1 == 'TPA')
										 $llll = 'https://www.dropbox.com/s/g4gf8coyoicwcbs/TPA.png?dl=0';
									else if($hoonname1 == 'TPAC')
										 $llll = 'https://www.dropbox.com/s/x6lhsazgi94c509/TPAC.png?dl=0';
									else if($hoonname1 == 'TPBI')
										 $llll = 'https://www.dropbox.com/s/yper8zsaxrv0b9x/TPBI.png?dl=0';
									else if($hoonname1 == 'TPC')
										 $llll = 'https://www.dropbox.com/s/ihexe6pklt6j7ui/TPC.png?dl=0';
									else if($hoonname1 == 'TPCH')
										 $llll = 'https://www.dropbox.com/s/2znam6pe5xgzu3l/TPCH.png?dl=0';
									else if($hoonname1 == 'TPCORP')
										 $llll = 'https://www.dropbox.com/s/lwxr3yx6rkisukb/TPCORP.png?dl=0';
									else if($hoonname1 == 'TPIPL')
										 $llll = 'https://www.dropbox.com/s/avlijv3mr9q96ig/TPIPL.png?dl=0';
									else if($hoonname1 == 'TPOLY')
										 $llll = 'https://www.dropbox.com/s/duwsflj9v31a7un/TPOLY.png?dl=0';
									else if($hoonname1 == 'TPP')
										 $llll = 'https://www.dropbox.com/s/9py24p7je0wgwcc/TPP.png?dl=0';
									else if($hoonname1 == 'TPROP')
										 $llll = 'https://www.dropbox.com/s/gsdivbne9y72xsj/TPROP.png?dl=0';
									else if($hoonname1 == 'TR')
										 $llll = 'https://www.dropbox.com/s/nicnkn7ltml6740/TR.png?dl=0';
									else if($hoonname1 == 'TRC')
										 $llll = 'https://www.dropbox.com/s/n72112c1y5sr2q4/TRC.png?dl=0';
									else if($hoonname1 == 'TREIT')
										 $llll = 'https://www.dropbox.com/s/nof11n9q6ca0l2j/TREIT.png?dl=0';
									else if($hoonname1 == 'TRIF')
										 $llll = 'https://www.dropbox.com/s/c33wzrfqud4ui2i/TRIF.png?dl=0';
									else if($hoonname1 == 'TRITN')
										 $llll = 'https://www.dropbox.com/s/b661aztrdfocj5i/TRITN.png?dl=0';
									else if($hoonname1 == 'TRT')
										 $llll = 'https://www.dropbox.com/s/asqxryghnesb8rq/TRT.png?dl=0';
									else if($hoonname1 == 'TRU')
										 $llll = 'https://www.dropbox.com/s/jiha6dqwhw0cah8/TRU.png?dl=0';
									else if($hoonname1 == 'TRUBB')
										 $llll = 'https://www.dropbox.com/s/u0guehvnuwce7zm/TRUBB.png?dl=0';
									else if($hoonname1 == 'TRUE')
										 $llll = 'https://www.dropbox.com/s/b4a2n7rtohavgs1/TRUE.png?dl=0';
									else if($hoonname1 == 'TSE')
										 $llll = 'https://www.dropbox.com/s/8wu43yqowb066aq/TSE.png?dl=0';
									else if($hoonname1 == 'TSF')
										 $llll = 'https://www.dropbox.com/s/mzmihlw6g9lf5l4/TSF.png?dl=0';
									else if($hoonname1 == 'TSI')
										 $llll = 'https://www.dropbox.com/s/60nexhl48awz0zl/TSI.png?dl=0';
									else if($hoonname1 == 'TSR')
										 $llll = 'https://www.dropbox.com/s/c9ed7hma3rs9v27/TSR.png?dl=0';
									else if($hoonname1 == 'TSTE')
										 $llll = 'https://www.dropbox.com/s/8qw0z7v1nrlxtmu/TSTE.png?dl=0';
									else if($hoonname1 == 'TSTH')
										 $llll = 'https://www.dropbox.com/s/705fq4vq6qx8i7c/TSTH.png?dl=0';
									else if($hoonname1 == 'TTA')
										 $llll = 'https://www.dropbox.com/s/hvbw3dbvrm35jdu/TTA.png?dl=0';
									else if($hoonname1 == 'TTCL')
										 $llll = 'https://www.dropbox.com/s/v9eiyspm9w2ym6z/TTCL.png?dl=0';
									else if($hoonname1 == 'TTI')
										 $llll = 'https://www.dropbox.com/s/di5vxrx2t2crj8b/TTI.png?dl=0';
									else if($hoonname1 == 'TTL')
										 $llll = 'https://www.dropbox.com/s/cpyw632mp68ulu3/TTL.png?dl=0';
									else if($hoonname1 == 'TTLPF')
										 $llll = 'https://www.dropbox.com/s/xv1v9bpx34lq0c6/TTLPF.png?dl=0';
									else if($hoonname1 == 'TTTM')
										 $llll = 'https://www.dropbox.com/s/7tyjcz1a3zxi3pz/TTTM.png?dl=0';
									else if($hoonname1 == 'TTW')
										 $llll = 'https://www.dropbox.com/s/8m8tgl288cwzgdl/TTW.png?dl=0';
									else if($hoonname1 == 'TU')
										 $llll = 'https://www.dropbox.com/s/s9t1uqj2psan5ep/TU.png?dl=0';
									else if($hoonname1 == 'TUCC')
										 $llll = 'https://www.dropbox.com/s/xtm6tfuo4lwmfbc/TUCC.png?dl=0';
									else if($hoonname1 == 'TU-PF')
										 $llll = 'https://www.dropbox.com/s/tiznfit08q77s68/TU-PF.png?dl=0';
									else if($hoonname1 == 'TVD')
										 $llll = 'https://www.dropbox.com/s/7ivw3mm0yyv0z5l/TVD.png?dl=0';
									else if($hoonname1 == 'TVI')
										 $llll = 'https://www.dropbox.com/s/aojry3huh2ni6dc/TVI.png?dl=0';
									else if($hoonname1 == 'TVO')
										 $llll = 'https://www.dropbox.com/s/k001mn06n0ur5f0/TVO.png?dl=0';
									else if($hoonname1 == 'TVT')
										 $llll = 'https://www.dropbox.com/s/ezls43sbbtcfbqu/TVT.png?dl=0';
									else if($hoonname1 == 'TWP')
										 $llll = 'https://www.dropbox.com/s/cswx2imwasr2ip7/TWP.png?dl=0';
									else if($hoonname1 == 'TWPC')
										 $llll = 'https://www.dropbox.com/s/yb8ypikjap9dt7g/TWPC.png?dl=0';
									else if($hoonname1 == 'TWZ')
										 $llll = 'https://www.dropbox.com/s/97cs8whvtglwiuj/TWZ.png?dl=0';
									else if($hoonname1 == 'TYCN')
										 $llll = 'https://www.dropbox.com/s/y4pa4zpqip3k1i6/TYCN.png?dl=0';
									else if($hoonname1 == 'U')
										 $llll = 'https://www.dropbox.com/s/vj1fo9esi1amghm/U.png?dl=0';
									else if($hoonname1 == 'UAC')
										 $llll = 'https://www.dropbox.com/s/9tbb6qnim253hdl/UAC.png?dl=0';
									else if($hoonname1 == 'UEC')
										 $llll = 'https://www.dropbox.com/s/e7dhzh5q9u5hzef/UEC.png?dl=0';
									else if($hoonname1 == 'UKEM')
										 $llll = 'https://www.dropbox.com/s/8p5jzw0ipd1pys2/UKEM.png?dl=0';
									else if($hoonname1 == 'UMI')
										 $llll = 'https://www.dropbox.com/s/6vi3cqaupq3qy39/UMI.png?dl=0';
									else if($hoonname1 == 'UMS')
										 $llll = 'https://www.dropbox.com/s/vzhmki7dfntiehb/UMS.png?dl=0';
									else if($hoonname1 == 'UNIPF')
										 $llll = 'https://www.dropbox.com/s/wqvbqyeoqg4wk9f/UNIPF.png?dl=0';
									else if($hoonname1 == 'UNIQ')
										 $llll = 'https://www.dropbox.com/s/qru9m24ylz1g82z/UNIQ.png?dl=0';
									else if($hoonname1 == 'UOBKH')
										 $llll = 'https://www.dropbox.com/s/thip5jjdcluux9m/UOBKH.png?dl=0';
									else if($hoonname1 == 'UP')
										 $llll = 'https://www.dropbox.com/s/b78epzz4ckviflm/UP.png?dl=0';
									else if($hoonname1 == 'UPA')
										 $llll = 'https://www.dropbox.com/s/sj826pqhcww8ysd/UPA.png?dl=0';
									else if($hoonname1 == 'UPF')
										 $llll = 'https://www.dropbox.com/s/vjh6l6wkhb2sym5/UPF.png?dl=0';
									else if($hoonname1 == 'UPOIC')
										 $llll = 'https://www.dropbox.com/s/vlhirvbeo6oxmzm/UPOIC.png?dl=0';
									else if($hoonname1 == 'URBNPF')
										 $llll = 'https://www.dropbox.com/s/2c5yd6bqdepjc1h/URBNPF.png?dl=0';
									else if($hoonname1 == 'UREKA')
										 $llll = 'https://www.dropbox.com/s/xsgc66cstwj1uuy/UREKA.png?dl=0';
									else if($hoonname1 == 'UT')
										 $llll = 'https://www.dropbox.com/s/w3ebkqdhkyoxewv/UT.png?dl=0';
									else if($hoonname1 == 'UTP')
										 $llll = 'https://www.dropbox.com/s/0zotzc1omznoz97/UTP.png?dl=0';
									else if($hoonname1 == 'UV')
										 $llll = 'https://www.dropbox.com/s/7v8rp54mma4nn02/UV.png?dl=0';
									else if($hoonname1 == 'UVAN')
										 $llll = 'https://www.dropbox.com/s/t6b46fpdb2b1xu3/UVAN.png?dl=0';
									else if($hoonname1 == 'UWC')
										 $llll = 'https://www.dropbox.com/s/4x7oab01vlphi8k/UWC.png?dl=0';
									else if($hoonname1 == 'VGI')
										 $llll = 'https://www.dropbox.com/s/j172wq5jk08vx79/VGI.png?dl=0';
									else if($hoonname1 == 'VI')
										 $llll = 'https://www.dropbox.com/s/nqgbm8k99veg6f2/VI.png?dl=0';
									else if($hoonname1 == 'VIBHA')
										 $llll = 'https://www.dropbox.com/s/03hwykeaj6ktehz/VIBHA.png?dl=0';
									else if($hoonname1 == 'VIH')
										 $llll = 'https://www.dropbox.com/s/jnzlmi16t9550wv/VIH.png?dl=0';
									else if($hoonname1 == 'VNG')
										 $llll = 'https://www.dropbox.com/s/wt7vw779w3z3hz0/VNG.png?dl=0';
									else if($hoonname1 == 'VNT')
										 $llll = 'https://www.dropbox.com/s/fbi3u2sh0z5xzwq/VNT.png?dl=0';
									else if($hoonname1 == 'VPO')
										 $llll = 'https://www.dropbox.com/s/ywa3p3ox6j5z27s/VPO.png?dl=0';
									else if($hoonname1 == 'VTE')
										 $llll = 'https://www.dropbox.com/s/gdf3x5rhdph9fyw/VTE.png?dl=0';
									else if($hoonname1 == 'WACOAL')
										 $llll = 'https://www.dropbox.com/s/lm1v0gw3nkn6dqr/WACOAL.png?dl=0';
									else if($hoonname1 == 'WAVE')
										 $llll = 'https://www.dropbox.com/s/rfldyizkv111a05/WAVE.png?dl=0';
									else if($hoonname1 == 'WHA')
										 $llll = 'https://www.dropbox.com/s/6cgnp0teb4kfecc/WHA.png?dl=0';
									else if($hoonname1 == 'WHABT')
										 $llll = 'https://www.dropbox.com/s/nj410j3anqpu3gb/WHABT.png?dl=0';
									else if($hoonname1 == 'WHABT')
										 $llll = 'https://www.dropbox.com/s/nj410j3anqpu3gb/WHABT.png?dl=0';
									else if($hoonname1 == 'WHAPF')
										 $llll = 'https://www.dropbox.com/s/tvaqbc6hlo3r8ex/WHAPF.png?dl=0';
									else if($hoonname1 == 'WICE')
										 $llll = 'https://www.dropbox.com/s/zmxyq79vygw2uqn/WICE.png?dl=0';
									else if($hoonname1 == 'WIIK')
										 $llll = 'https://www.dropbox.com/s/yw5k4mmx14mojqd/WIIK.png?dl=0';
									else if($hoonname1 == 'WINNER')
										 $llll = 'https://www.dropbox.com/s/x771p5hor5qxwyh/WINNER.png?dl=0';
									else if($hoonname1 == 'WIN')
										 $llll = 'https://www.dropbox.com/s/sdcguf4wqcpge35/WIN.png?dl=0';
									else if($hoonname1 == 'WORK')
										 $llll = 'https://www.dropbox.com/s/f8gjdu5prulcg1h/WORK.png?dl=0';
									else if($hoonname1 == 'WORLD')
										 $llll = 'https://www.dropbox.com/s/3fo2m1vs7eon2bb/WORLD.png?dl=0';
									else if($hoonname1 == 'WP')
										 $llll = 'https://www.dropbox.com/s/aql5o8isk2hplfu/WP.png?dl=0';
									else if($hoonname1 == 'WR')
										 $llll = 'https://www.dropbox.com/s/ahsdymk8ma7xb16/WR.png?dl=0';
									else if($hoonname1 == 'XO')
										 $llll = 'https://www.dropbox.com/s/ivippl8t89ib4jm/XO.png?dl=0';
									else if($hoonname1 == 'YCI')
										 $llll = 'https://www.dropbox.com/s/ad2rwu2hsvuc4ls/YCI.png?dl=0';
									else if($hoonname1 == 'YNP')
										 $llll = 'https://www.dropbox.com/s/1x0rc9chtimvowy/YNP.png?dl=0';
									else if($hoonname1 == 'YUASA')
										 $llll = 'https://www.dropbox.com/s/ckprv62uy6bdox8/YUASA.png?dl=0';
									else if($hoonname1 == 'S50Z16')
										 $llll = 'https://www.dropbox.com/s/zmsr7jvsc8g3cah/s50z16.png?dl=0';																																								
									else
										$llll = "https://www.dropbox.com/s/j09fwo3536hdkib/pic.png?dl=0";
									// Build message to reply back
									
									#$messages = ['type' => 'text','text' => $event['source']['roomid']];
									$messages4 = ['type' => 'text','text' => $event['source']['type']];
									
									$messages5 = ['type' => 'text','text' => $event['source']['groupId']];
									sleep(9);
									//$llll ='SORRY, OUT OF SERVICE';
									$messages3 = ['type' => 'text','text' => $hoonname];
									
									$messages1 = ['type' => 'text','text' => 'ประกาศ!!!!

เนื่องด้วย ฐานข้อมูลที่ใช้รันบอทนั้นได้เดือบเต็มแล้ว จึงต้องปรับเปลี่ยนเป็นการซื้อพื้นที่บนฐานข้อมูล จึงทำให้เกิดค่าใช้จ่าย เดียจึงขอ ปีละ 300 บาทต่อคน เพื่อเป็นฐานข้อมูลในการส่งกราฟ บอทครับ และจะทำการเปลี่ยนห้อง ไปอีกห้องเพื่อเรียกกราฟรูปแบบที่เรียกได้อยู่ทุกวันนี้ครับ

ติดต่อไลน์ dea-prop เพื่อส่งหลักฐานการโอนรายปี 300 บาทครับ'];
									
									$messages2 = ['type' => 'image',
											 'originalContentUrl' => $link_pic,
											 'previewImageUrl' => $link_pic
									];
									//1: printer Cd3afd7bd7719ceb0822ea162b50000fb
									//2:jay black graph C26d889d89b336a786c06358c1e2df27c
									//3:member_line_bot C7ab92191511e47ff839c174e7f2104c5
									//4:bot 3g 3r C941fb2b8a40f9d0f400969fa848c3386
									//5:jay 1 graph C9f2b93574be7434e6e7180a7d7503601
									//6: jay free graph C209fd17b6508ec4786c16e775638e4ae
									//7: ideatrade bot 1 Cb880ba168d17c69174b652045a8f8b90
									//8: ideatrade bot 2 C1970832b0d5e677dc1498442f8412be7
									//9:member2 C328035648eddea983ff6b6a3fc7622ec
									
									//// Make a POST Request to Messaging API to reply to sender
									if($event['source']['groupId'] == 'C328035648eddea983ff6b6a3fc7622ec' || $event['source']['groupId'] == 'C941fb2b8a40f9d0f400969fa848c3386' || $event['source']['groupId'] == 'C26d889d89b336a786c06358c1e2df27c' || $event['source']['groupId'] == 'C2debaa5f387f1d99d495ee1f62f25d27' || $event['source']['groupId'] == 'C50bdba4e60f90ced6002458b6fb1aa5b' || $event['source']['groupId'] == 'C9fe78b803761432902f6d506b806b354')
									{
										$aaa="aaa";
									}
									else
									{
										$url = 'https://api.line.me/v2/bot/message/reply';
										$data = [
											'replyToken' => $replyToken,
											'messages' => [$messages1]
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
								}
								
								
								#echo "check1";
								#sleep(10);
								#echo $result . "\r\n";
							}
						}
						else
						{
							
							$text = strtolower($text);
							
							if($text == 'ss500')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/aaaa.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/aaaa.jpg'
											];
							}
							else if($text == 'btgold50')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/2.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/2.jpg'
											];
							}
							else if($text == 'bts50')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/1.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/1.jpg'
											];
							}
							else if($text == 'btgold10')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/3.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/3.jpg'
											];
							}
							else if($text == 'btaav')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/4.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/4.jpg'
											];
							}
							else if($text == 'btadvanc')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/5.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/5.jpg'
											];
							}
							else if($text == 'btamata')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/6.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/6.jpg'
											];
							}
							else if($text == 'btaot')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/7.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/7.jpg'
											];
							}
							else if($text == 'btap')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/8.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/8.jpg'
											];
							}
							else if($text == 'btba')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/9.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/9.jpg'
											];
							}
							else if($text == 'btbanpu')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/10.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/10.jpg'
											];
							}
							else if($text == 'btbay')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/11.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/11.jpg'
											];
							}
							else if($text == 'btbbl')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/12.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/12.jpg'
											];
							}
							else if($text == 'btbch')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/13.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/13.jpg'
											];
							}
							else if($text == 'btbcp')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/14.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/14.jpg'
											];
							}
							else if($text == 'btbdms')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/15.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/15.jpg'
											];
							}
							else if($text == 'btbem')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/16.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/16.jpg'
											];
							}
							else if($text == 'btbh')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/17.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/17.jpg'
											];
							}
							else if($text == 'btbjc')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/18.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/18.jpg'
											];
							}
							else if($text == 'btbla')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/19.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/19.jpg'
											];
							}
							else if($text == 'btbland')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/20.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/20.jpg'
											];
							}
							else if($text == 'btbts')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/21.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/21.jpg'
											];
							}
							else if($text == 'btcbg')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/22.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/22.jpg'
											];
							}
							else if($text == 'btcentel')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/23.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/23.jpg'
											];
							}
							else if($text == 'btck')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/24.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/24.jpg'
											];
							}
							else if($text == 'btckp')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/25.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/25.jpg'
											];
							}
							else if($text == 'btcpall')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/26.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/26.jpg'
											];
							}
							else if($text == 'btcpf')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/27.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/27.jpg'
											];
							}
							else if($text == 'btcpn')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/28.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/28.jpg'
											];
							}
							else if($text == 'btdtac')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/29.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/29.jpg'
											];
							}
							else if($text == 'btearth')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/30.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/30.jpg'
											];
							}
							else if($text == 'bthana')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/31.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/31.jpg'
											];
							}
							else if($text == 'bthmpro')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/32.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/32.jpg'
											];
							}
							else if($text == 'btichi')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/33.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/33.jpg'
											];
							}
							else if($text == 'btintuch')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/34.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/34.jpg'
											];
							}
							else if($text == 'btirpc')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/35.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/35.jpg'
											];
							}
							else if($text == 'btitd')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/36.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/36.jpg'
											];
							}
							else if($text == 'btivl')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/37.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/37.jpg'
											];
							}
							else if($text == 'btjas')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/38.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/38.jpg'
											];
							}
							else if($text == 'btkbank')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/39.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/39.jpg'
											];
							}
							else if($text == 'btkkp')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/40.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/40.jpg'
											];
							}
							else if($text == 'btktb')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/41.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/41.jpg'
											];
							}
							else if($text == 'btlh')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/42.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/42.jpg'
											];
							}
							else if($text == 'btlpn')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/43.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/43.jpg'
											];
							}
							else if($text == 'btmajor')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/44.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/44.jpg'
											];
							}
							else if($text == 'btmint')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/45.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/45.jpg'
											];
							}
							else if($text == 'btpsh')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/46.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/46.jpg'
											];
							}
							else if($text == 'btptt')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/47.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/47.jpg'
											];
							}
							else if($text == 'btpttep')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/48.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/48.jpg'
											];
							}
							else if($text == 'btpttgc')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/49.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/49.jpg'
											];
							}
							else if($text == 'btqh')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/50.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/50.jpg'
											];
							}
							else if($text == 'btratch')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/51.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/51.jpg'
											];
							}
							else if($text == 'btrobins')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/52.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/52.jpg'
											];
							}
							else if($text == 'btsamart')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/53.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/53.jpg'
											];
							}
							else if($text == 'btsawad')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/54.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/54.jpg'
											];
							}
							else if($text == 'btscb')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/55.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/55.jpg'
											];
							}
							else if($text == 'btscc')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/56.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/56.jpg'
											];
							}
							else if($text == 'btsiri')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/57.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/57.jpg'
											];
							}
							else if($text == 'btspali')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/58.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/58.jpg'
											];
							}
							else if($text == 'btsta')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/59.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/59.jpg'
											];
							}
							else if($text == 'btstec')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/60.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/60.jpg'
											];
							}
							else if($text == 'bttcap')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/61.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/61.jpg'
											];
							}
							else if($text == 'btthai')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/62.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/62.jpg'
											];
							}
							else if($text == 'btthcom')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/63.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/63.jpg'
											];
							}
							else if($text == 'bttmb')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/64.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/64.jpg'
											];
							}
							else if($text == 'bttop')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/65.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/65.jpg'
											];
							}
							else if($text == 'bttpipl')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/66.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/66.jpg'
											];
							}
							else if($text == 'bttta')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/67.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/67.jpg'
											];
							}
							else if($text == 'btttcl')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/68.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/68.jpg'
											];
							}
							else if($text == 'bttu')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/69.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/69.jpg'
											];
							}
							else if($text == 'bttvo')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/70.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/70.jpg'
											];
							}
							else if($text == 'btvgi')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/71.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/71.jpg'
											];
							}
							else if($text == 'bttrue')
							{
									$messages55 = ['type' => 'image',
												 'originalContentUrl' => 'https://linebotjay.herokuapp.com/72.jpg',
												 'previewImageUrl' => 'https://linebotjay.herokuapp.com/72.jpg'
											];
							}
							else if(preg_match("/^[a-zA-Z]+$/", $text[0]) == 1) {
								
									$messages55 = ['type' => 'text','text' => "ลืม @ นะจ๊ะ ----> @hoonname timeframe = @aot 60"];

							}
							else
							{
								if($text == 'เป็นกราฟเปล่าครับ' || $text == 'เปนกราฟเปล่าคับ' || $text == 'เปนกราฟเปล่าๆคับ' || $text == 'เป็นกราฟเปล่าๆครับ' || $text == 'เป็นกราฟเปล่าคับ' || $text == 'เป็นกราฟเปล่าๆคับ' || $text == 'กราฟเปล่าๆคับ' || $text == 'กราฟเปล่า' || $text == 'กราฟเปล่า' || $text == 'กราฟเปล่าคับ' || $text == 'กราฟไม่ขึ้น')
								{
									$messages55 = ['type' => 'text','text' => "รบกวนส่งใหม่ครับ กราฟไม่สมบูรณ์"];
								}	
								
							}
									$replyToken = $event['replyToken'];
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
				
					}//ifresult<2
			 }//if ($event['type'] == 'message' && $event['message']['type'] == 'text')
		}//if($event['source']['groupId'] 
		else
		{
				foreach ($events['events'] as $event) {
					$text = $event['message']['text'];
			
					if($text == '@@addgroupbyjay_botroom')
					{
							$replyToken = $event['replyToken'];
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
					if($event['source']['groupId'] == 'C4338930a2a0e2f36c09c9bf91e6a3d30')
					{
						$arr = array('Cd3afd7bd7719ceb0822ea162b50000fb', 'C26d889d89b336a786c06358c1e2df27c', 'C7ab92191511e47ff839c174e7f2104c5', 'C941fb2b8a40f9d0f400969fa848c3386'
									,'C9f2b93574be7434e6e7180a7d7503601','C209fd17b6508ec4786c16e775638e4ae','Cb880ba168d17c69174b652045a8f8b90','C1970832b0d5e677dc1498442f8412be7',
									'C328035648eddea983ff6b6a3fc7622ec','Uf120d9606f0eaa9bd32e18f8c85ea58f','Ub5f45b12f0f8f8a3a08e5b52ebbcc96b','C9fe78b803761432902f6d506b806b354'
									,'C50bdba4e60f90ced6002458b6fb1aa5b','C2debaa5f387f1d99d495ee1f62f25d27');
						reset($arr);
						foreach ($arr as $USERID) {
							$format_text = [
								"type" => "text",
								"text" => $text
							];
							$post_data = [
									'to' => $USERID,
									'messages' => [$format_text]
							];
							$header = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
							echo "ssss";
					 
							$ch = curl_init('https://api.line.me/v2/bot/message/push');
							curl_setopt($ch, CURLOPT_POST, true);
							curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
							curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
					 
							$result = curl_exec($ch);
							curl_close($ch);
						}
						
					}
					
					
					
					
				}
				
		}
	}//for
}

#echo "OK11";
