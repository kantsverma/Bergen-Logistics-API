<?php 
/******************************************
* Function : bergenlogistics API
* Description : Used to send the order list to bergenlogistics automaticaly
* Author : devender Kumar
* Twitter : @kantsverma
******************************************/ 
?>
<html>
<head>
<title>PHP SOAP Test</title>
<style type="text/css">
body, html {font-family: Helvetica, Verdana, Arial; margin:10px; padding:0px; font-size:12px;}
div.xml {height:200px;width:100%;overflow:auto;border:solid 1px #999;}
</style>
</head>
<body>
<?php
ini_set("soap.wsdl_cache_enabled", "0");

	try {        
     $client = new SoapClient('http://sync.rex11.com/ws/v2prod/publicapiws.asmx?WSDL');
    //$client = new SoapClient('http://www.webservicex.net/country.asmx?WSDL');   
	  $functions = $client->__getFunctions(); 
    
    // uncomment to check all function inside wsdl
    /*echo '<pre>';
    print_r($functions);
    echo '<pre>'; */
    
    $params = array('WebAddress'=> 'www.drishnorthamerica.com','UserName'=> 'DRISH','Password'=> 'Bergen1');
    
  	$result = $client->AuthenticationTokenGet($params);
    
	  echo $result->AuthenticationTokenGetResult;
    //var_dump ($functions); 
    exit;
	
    /*$params = array('CountryName'=> 'Australia');
    $result = $client->GetISOCountryCodeByCountyName($params);
    echo $result->GetISOCountryCodeByCountyNameResult;*/
    
	}catch(SoapFault $fault) {		
	  echo $fault->getMessage();
	}
?>
  

</body>
</html>
