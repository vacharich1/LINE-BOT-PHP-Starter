<html>
<head>
<title>ThaiCreate.Com</title>
</head>
<body>
<?php
		$client = new SoapClient("https://obscure-harbor-99516.herokuapp.com/Service1.asmx?wsdl",
			array(
			  "trace"      => 1,		// enable trace to view what is happening
			  "exceptions" => 0,		// disable exceptions
			  "cache_wsdl" => 0) 		// disable any caching on the wsdl, encase you alter the wsdl server
		  );

        $params = array(
                   'strName' => "Weerachai Nukitram"
        );

		$data = $client->HelloWorld($params);

       print_r($data);

	   echo "<hr>";
	   
	   echo $data->HelloWorldResult;

	   echo "<hr>";
 
	  // display what was sent to the server (the request)
	  echo "<p>Request :".htmlspecialchars($client->__getLastRequest()) ."</p>";

	  echo "<hr>";

	  // display the response from the server
	  echo "<p>Response:".htmlspecialchars($client->__getLastResponse())."</p>";

?>
</body>
</html>