<?php
session_start();

$cardtype = $_POST['cardtype'];
echo $cardnumber = $_POST['card_no'];
echo $cv = $_POST['cv'];
echo $month = $_POST['month'];
echo $year = $_POST['year'];


$user_id = $_SESSION['user_id'];

 $conn = mysqli_connect('localhost', 'root', '', 'project');
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
$sql = "SELECT firstname, lastname FROM user WHERE user_id='$user_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
         $firstname = $row["firstname"];
         $lastname = $row["lastname"];
    }
}

$sql1 = "SELECT * FROM cart WHERE user_id='$user_id'"; 
$result1 = mysqli_query($conn, $sql1);

if (mysqli_num_rows($result1) > 0) {
	$array = array();
	 while($row = mysqli_fetch_assoc($result1)) {
	 	$array[] = $row;
	 }
	}
print_r($array);

 
 /* $current_user = wp_get_current_user();

$aname = $current_user->fname;
$aid = $current_user->ID;
	 $result = $wpdb->get_results( "SELECT * FROM wallet_table  WHERE uuserid = '$aid'  ORDER BY id DESC LIMIT 1" );
  
									foreach ( $result as $print )   {

										   $current_amount = $print->current_amount;
									    
									  } */

     $amount = $_POST['amount'];

     if ($amount != '' && $cardtype != '' && $cardnumber != '' && $month != '' && $year != '' && $cv != '' ) { 

        // Set sandbox (test mode) to true/false.
	$sandbox = TRUE;
	// Set PayPal API version and credentials.
	$api_version = 108.0;
	$api_endpoint = $sandbox ? 'https://api-3t.sandbox.paypal.com/nvp' : 'https://api-3t.paypal.com/nvp';
	$api_username = $sandbox ? 'chetanpixlrit-facilitator_api1.gmail.com' : 'LIVE_USERNAME_GOES_HERE';
	$api_password = $sandbox ? 'LG8LZGGY6C9Z9EN6' : 'LIVE_PASSWORD_GOES_HERE';
	$api_signature = $sandbox ? 'AFcWxV21C7fd0v3bYYYRCpSSRl31AnrJ89yQOXjdyhtkgnx4RpP0tny.' : 'LIVE_SIGNATURE_GOES_HERE';


        $request_params = array
					(
					'METHOD' => 'SetExpressCheckout',
					'USER' => $api_username, 
					'PWD' => $api_password, 
					'SIGNATURE' => $api_signature, 
					'VERSION' => $api_version, 
					'PAYMENTACTION' => 'Sale', 
                    'CREDITCARDTYPE' => $cardtype, 
					'ACCT' => $cardnumber, 						
					'EXPDATE' => $month.$year, 			
					'CVV2' => $cv, 
					'FIRSTNAME' => $firstname, 
					'LASTNAME' => $lastname, 
					'STREET' => 'tilak nager', 
					'CITY' => 'Largo', 
					'STATE' => 'MP', 					
					'COUNTRYCODE' => 'US', 
					'ZIP' => 452001, 
					'AMT' => $amount, 
					'CURRENCYCODE' => 'BRL', 
					'DESC' => 'Add Money In Wallot', 
					'RETURNURL' => 'http://PayPalPartner.com.br/VendeFrete?return=1',
                   'CANCELURL' => 'http://PayPalPartner.com.br/CancelaFrete',

					);
									
				// Loop through $request_params array to generate the NVP string.
				$nvp_string = '';
				foreach($request_params as $var=>$val)
				{
					$nvp_string .= '&'.$var.'='.urlencode($val);	
				}

				// Send NVP string to PayPal and store response
				$curl = curl_init();
						curl_setopt($curl, CURLOPT_VERBOSE, 1);
						curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
						curl_setopt($curl, CURLOPT_TIMEOUT, 30);
						curl_setopt($curl, CURLOPT_URL, $api_endpoint);
						curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
						curl_setopt($curl, CURLOPT_POSTFIELDS, $nvp_string);

				$result = curl_exec($curl);
				//echo "nyoti"; print_r($result);
				
				curl_close($curl);
				$result_array = NVPToArray($result);

				// print_r($result_array);
				
				        //$amt=$result_array['AMT'];
						$TIMESTAMP=$result_array['TIMESTAMP'];
						$CORRELATIONID=$result_array['CORRELATIONID'];
						$ACK=$result_array['ACK'];
						$VERSION=$result_array['VERSION'];
						$BUILD=$result_array['BUILD'];
				
						/*  $CURRENCYCODE=$result_array['CURRENCYCODE'];
						$AVSCODE=$result_array['AVSCODE'];
						$CVV2MATCH=$result_array['CVV2MATCH'];
						$TRANSACTIONID=$result_array['TRANSACTIONID'];
						$L_ERRORCODE0=['L_ERRORCODE0'];
						$L_SHORTMESSAGE0=['L_SHORTMESSAGE0'];
						$L_LONGMESSAGE0=['L_LONGMESSAGE0'];
						$L_SEVERITYCODE0=['L_SEVERITYCODE0']; */
						
						
						// if ($ACK = 'success' ) {
							// echo "successful transcation";
							//)
       if($ACK == 'Success')
		 {
             
          echo "1";

           }                           

     }else {
        echo 'Required Fields Are Empty';
     }


 
 function NVPToArray($NVPString) {
	$proArray = array();
	while(strlen($NVPString))
	{
		// name
		$keypos= strpos($NVPString,'=');
		$keyval = substr($NVPString,0,$keypos);
		// value
		$valuepos = strpos($NVPString,'&') ? strpos($NVPString,'&'): strlen($NVPString);
		$valval = substr($NVPString,$keypos+1,$valuepos-$keypos-1);
		// decoding the respose
		$proArray[$keyval] = urldecode($valval);
		$NVPString = substr($NVPString,$valuepos+1,strlen($NVPString));
	}
	return $proArray;
 } 

 ?>