<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class test extends Controller
{


/*ProPay provides the following code "AS IS."
ProPay makes no warranties and ProPay disclaims all warranties and conditions, express, implied or statutory,
including without limitation the implied warranties of title, non-infringement, merchantability, and fitness for a particular purpose.
ProPay does not warrant that the code will be uninterrupted or error free,
nor does ProPay make any warranty as to the performance or any results that may be obtained by use of the code.
*/

/* change this to the production url for going live after testing https://api.propay.com */
private $_apiBaseUrl = 'https://xmltestapi.propay.com';
private $_certStr;
private $_termId;
/* for signups */
private $_signupData;
private $_signupInfo;
/**
* @param string $certStr
* @return $this
*/

// ////////////////////////
    private $_billerId;
    private $_authToken;

    /* for creating payer ID */
    private $_createPayerIdData;
    private $_createPayerIdInfo;

    /**
     * @param string $billerId
     * @return $this
     */
    public function setBillerId($billerId) {
        $this->_billerId = $billerId;
        return $this;
    }

    /**
     * @param string $authToken
     * @return $this
     */
    public function setAuthToken($authToken) {
        $this->_authToken = $authToken;
        return $this;
    }

    /**
     * @return string
     */
    private function _getAuth() {
        return $this->_billerId . ':' . $this->_authToken;
    }

    /**
     * @param array $payerIdData
     * @return $this
     */
    public function setCreatePayerIdData($payerIdData) {
        $this->_createPayerIdData = $payerIdData;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatePayerIdInfo() {
        return $this->_createPayerIdInfo;
    }

    /**
     * Creates a payer id
     * @return $this
     */
    public function createPayerId() {
        $data_string = json_encode($this->_createPayerIdData);

        $ch = curl_init($this->_apiBaseUrl . '/protectpay/Payers/3403362838155014/PaymentMethods/ProcessedSplitPayTransactions/');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, $this->_getAuth());
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string)
        ));

        $this->_createPayerIdInfo = curl_exec($ch);
        return $this;
    }


// /////////////////////.com//


public function setCertStr($certStr) {
$this->_certStr = $certStr;
return $this;
}
/**
* @param array $signupData
* @return $this
*/
public function setSignupData($signupData) {
$this->_signupData = $signupData;
return $this;
}
/**
* @param string $termId
* @return $this
*/
public function setTermId($termId) {
$this->_termId = $termId;
return $this;
}
/**
* @return string
*/
/**
* Processes the signup process through the rest api
* @return $this
*/
public function processSignup() {
$data_string = json_encode($this->_signupData);
//dd($data_string);
$ch = curl_init($this->_apiBaseUrl . '/ProPayAPI/Signup');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERPWD, 'a628a039b164200b3ad36e4261799a:61799a');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Content-Type: application/json',
'Content-Length: ' . strlen($data_string)
));

$this->_signupInfo = curl_exec($ch);
return $this;
}
/**
* Gets a json string of the signupInfo of the tier that was just signed up. A signed up response
* looks like
* {"AccountNumber":32299999,32526382 "Password":"$#GD!ADXv2" ,$W5gFGBK3% ,"SourceEmail":"someuser@somedomain.com" ,nauman@admin.com,"Status":"00","Tier":"Platinum" ,profile id:2482836 ,2482837 ,2482838}
* @return mixed
*/
public function getSignupInfo() {
return $this->_signupInfo;
}


public function index(){

	// dd("hello");

$data = [
"PersonalData"=>[
"FirstName"=> "Customer",
"MiddleInitial"=> "X",
"LastName"=> "Doe",
"DateOfBirth"=> "12-01-1997",
"SocialSecurityNumber"=> "123456789",
"SourceEmail"=> "nauman@admin.com",
"PhoneInformation"=> [
"DayPhone"=> "2013787777",
"EveningPhone"=> "2013787777"
],
"InternationalSignUpData"=> null,
"NotificationEmail"=> null
],
"SignupAccountData"=> [
"CurrencyCode"=> "USD",
"Tier"=> "Test"
],
"BusinessData"=>[
"BusinessLegalName"=> "Merchantile Parent, Inc.",
"DoingBusinessAs"=> "Merchantile ABC",
"EIN"=> "121232343",
"MerchantCategoryCode"=> "5999",
"WebsiteURL"=> "http://cleaning.dev505.io",
"BusinessDescription"=> "Accounting Services",
"MonthlyBankCardVolume"=> 10000,
"AverageTicket"=> 100,
"HighestTicket"=> 250
],

"Address"=> [
"ApartmentNumber"=> "1",
"Address1"=> "3400 N Ashton Blvd",
"Address2"=> "Suite 200",
"City"=> "Lehi",
"State"=> "UT",
"Country"=> "USA",
"Zip"=> "84043"
],
"MailAddress"=> [
"ApartmentNumber"=> "200",
"Address1"=> "PO Box 1234",
"Address2"=> "NW",
"City"=> "Salt Lake City",
"State"=> "UT",
"Country"=> "USA",
"Zip"=> "84001"
],
"BusinessAddress"=>[
"ApartmentNumber"=> "200",
"Address1"=> "RR 123445",
"Address2"=> "SW",
"City"=> "Tooele",
"State"=> "UT",
"Country"=> "USA",
"Zip"=> "84074"
],
"BankAccount"=> [
"AccountCountryCode"=> "USA",
"BankAccountNumber"=> "123456789",
"RoutingNumber"=> "011306829",
"AccountOwnershipType"=> "Business",
"BankName"=> "MERCHANTILE BANK UT",
"AccountType"=> "Checking",
"AccountName"=> null,
"Description"=> null
],
"BeneficialOwnerData"=> [
"OwnerCount"=> "1",
"Owners"=> [
		"FirstName"=> "First1",
		"LastName"=> "Last1",
		"SSN"=> "123456789",
		"DateOfBirth"=> "01-01-1981",
		"Email"=> "test1@qamail.com",
		"Address"=> "Address",
		"City"=> "Lehi",
		"State"=> "UT",
		"Zip"=> "84010",
		"Country"=> "USA",
		"Title"=> "CEO",
		"Percentage"=> "100"
	]
]

];

/**
 * The cert string and setTermId would normally be in a config or in your database
 * This call normally yields return json data for the account created like so
 * {"AccountNumber" => 32525883,"Password" => "N$S5p56xgk","SourceEmail" => "nauman.test.com","Status":"00","Tier":"Platinum"}
 */

//dd("hello");

$proPayAPI = new test();
$result = $proPayAPI->setBillerId('5841490254649665')
    ->setAuthToken('202add9c-0746-449a-b8bd-9861a6914997')
->setSignupData($data)
->processSignup()
->getSignupInfo();

$x = json_decode($result ,true);

dd($result);
dd($x);

}


public function merchant(){

	//dd("hello");

	$data =["ProfileName"=>"nauman@test.com",
	    "PaymentProcessor"=>"LegacyProPay",    
	    "ProcessorData"=>[[
	    	"ProcessorField"=>"certStr",
	    	"Value"=>"a628a039b164200b3ad36e4261799a"
	    	 ],
	    	 ["ProcessorField"=>"accountNum",
	    	 "Value"=>"32525883"
	    	],
	    	["ProcessorField"=>"termId",
	    	"Value"=> "61799a"
	    ]    ] ];


$proPayAPI = new test();
$result = $proPayAPI->setCertStr('a628a039b164200b3ad36e4261799a')
->setTermId('61799a')
->setSignupData($data)
->processSignup()
->getSignupInfo();

$x = json_decode($result ,true);

dd($result);
dd($x);    

}





public function payerid(){



$data = [
    "Name" => "John Smith",
    "EmailAddress" => "email@email.com",
    //"ExternalId1" => //"CustomerNumber12",
    //"ExternalId2" //.com=> "234567"]

    //external account id : 3403362838155014
];

// Create a new payer

$proPayAPI = new test();

$result = $proPayAPI->setBillerId('5841490254649665')
    ->setAuthToken('202add9c-0746-449a-b8bd-9861a6914997')
    ->setCreatePayerIdData($data)
    ->createPayerId();

    dd($result);


}




public function paymentmethod(){

//payment method id : 2d17d319-85da-4d90-9c63-e4a9d281588d

$data = [
     "PayerAccountId"=>"3403362838155014",
     "PaymentMethodType"=>"Visa",
     "AccountNumber"=>"4111111111111111",
     "ExpirationDate"=>"0819",
     "AccountCountryCode"=>"USA",
     "AccountName"=>"Janis Joplin",
     "BillingInformation"=>[
     	"Address1"=>"123 ABC St",
     	"Address2"=>"Apt. A",
     	"Address3"=>null,
     	"City"=>"Some Place",
     	"Country"=>"USA",
     	"Email"=>null,
     	"State"=>"AK",
     	"TelephoneNumber"=>null,
     	"ZipCode"=>"12345"
     	],
     "Description"=>"MyVisaCard",
     "Priority"=>0,
     "DuplicateAction"=>null,
     "Protected"=>false 
];

// Create a new payer

$proPayAPI = new test();

$result = $proPayAPI->setBillerId('5841490254649665')
    ->setAuthToken('202add9c-0746-449a-b8bd-9861a6914997')
    ->setCreatePayerIdData($data)
    ->createPayerId();

    dd($result);


}



public function splitpay(){

//payment method id : 2d17d319-85da-4d90-9c63-e4a9d281588d

$data = [
       "PaymentMethodId"=>"2d17d319-85da-4d90-9c63-e4a9d281588d",
       "SecondaryTransaction"=>[
       		"OriginatingAccountId"=>32299999,
       		"ReceivingAccountId"=>32526382,
       		"Amount"=>222
       		],
       	"CreditCardOverrides"=>null,
       	"AchOverrides"=>null,
       	"PayerOverrides"=>[
       	    "IpAddress"=>"127.0.0.1"
       	    ],
       	"MerchantProfileId"=>2482836,
       	"PayerAccountId"=>"3403362838155014",
       	"Amount"=>2000,
       	"CurrencyCode"=>"USD",
       	"Invoice"=>"Test Invoice",
       	"Comment1"=>"ProcessSplitPayTransaction Comment 1",
       	"Comment2"=>"ProcessSplitPayTransaction Comment 2",
       	"IsDebtRepayment"=>"true" 
];

// Create a new payer

$proPayAPI = new test();

$result = $proPayAPI->setBillerId('5841490254649665')
    ->setAuthToken('202add9c-0746-449a-b8bd-9861a6914997')
    ->setCreatePayerIdData($data)
    ->createPayerId();

    dd($result);


}



}

