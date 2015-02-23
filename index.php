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
<title>Bergen Logistics</title>
<style type="text/css">
body, html {font-family: Helvetica, Verdana, Arial; margin:10px; padding:0px; font-size:12px;}
div.xml {height:200px;width:100%;overflow:auto;border:solid 1px #999;}
</style>
</head>
<body>
<?php
  
  
  // Same as error_reporting(E_ALL);
  ini_set("error_reporting", E_ALL);
  ini_set("soap.wsdl_cache_enabled", "0");

	try {
     $client = new SoapClient('http://sync.rex11.com/ws/v2prod/publicapiws.asmx?WSDL');
    //$client = new SoapClient('http://www.webservicex.net/country.asmx?WSDL');   
	  $functions = $client->__getFunctions(); 
    
    // uncomment to check all function inside wsdl
    /*echo '<pre>';
    print_r($functions);
    echo '<pre>';*/
    
    $oathParams = array('WebAddress'=> 'www.drishnorthamerica.com','UserName'=> 'DRISH','Password'=> 'Bergen1');
    
  	$result = $client->AuthenticationTokenGet($oathParams);
    
	  $auothToken =  $result->AuthenticationTokenGetResult;
    
    // check if auoth token is generation then we will go ahead 
    if($auothToken){
      
      // Pick ticket to 
      
      $auothTokenParams = array('AuthenticationString'=> $auothToken,
                                
                                'PickTicket'=> array(
                                  'PickTicketNumber'=> '23022012012557',
                                  'WareHouse'=> 'BERGEN LOGISTICS NJ',
                                  'PaymentTerms'=> 'NET', 
                                  'ShipVia'=> 'UPS',
                                  'BillingOption'=> 'PREPAID',
                                  'ShipService'=> 'UPS GROUND - COMMERCIAL',
                                  'AuthorizationNumber'=> '50130A',
                                  'BillToAddress'=> array(
                                    'FirstName'=> 'Titus',
                                    'LastName'=> 'Boss',
                                    'CompanyName'=> 'Bergen shippers',
                                    'Address1'=> '7300 Westside Ave',
                                    'City'=> 'North Bergen',
                                    'State'=> 'New Jersey', 
                                    'Zip'=> '07047',
                                    'Country'=> 'United States',
                                    //'Non_US_Region'=> '',
                                    'Phone'=> '(201) 854-1512',
                                    //'Fax'=> '', 
                                    'Email'=> 'test@test.com',
                                  ),                                
                                  'UseAccountUPS'=> '1',
                                  'ShipToAddress'=> array(
                                    'FirstName'=> 'Sergius',
                                    'LastName'=> 'McU',
                                    'CompanyName'=> 'NTSN',
                                    'Address1'=> 'addr 1',
                                    'City'=> 'Washington',
                                    'State'=> 'Washington', 
                                    'Zip'=> '20500',
                                    'Country'=> 'USA',
                                  ),

                                  'LineItem'=> array(
                                    'Season'=> 'v1',
                                    'Style'=> '34113101',
                                    'Description'=> 'DUNN 60MM WEDGE SLIDE- VI',
                                    'Color'=> '236',
                                    'Size'=> 'm',
                                    'UPC'=> '888000000000',
                                    'UnitPrice'=> 0.1, 
                                    'Quantity'=> 1,
                                    'Comments'=> 'test',
                                  )
                                ),
                                
                              );
      
      $pickTicket =  $client->PickTicketAdd($auothTokenParams);
      
      
      // print the Authentication Token
       echo '<div style="border-collapse:collapse;background-color:Wheat;color:black;"><b>Authentication Token Generated : </b> '.$auothToken.'</div><br/>';
      
      echo '<div style="border-collapse:collapse;background-color:Wheat;color:black;"><b>API Response PickTicketAdd: </b> </div><br/>';      
      
      // print response of pickticket 
      echo '<pre>';
      print_r($pickTicket);
      echo '</pre>';

    }
	}catch(SoapFault $fault) {
    
	  echo $fault->getMessage();
    
	}

?>
<br/> 
<br/>   
<div>For more detail check here : <a href="http://sync.rex11.com/ws/v2prod/publicapiws.asmx" target="_blank">http://sync.rex11.com/ws/v2prod/publicapiws.asmx</a></div>
</body>
</html>
