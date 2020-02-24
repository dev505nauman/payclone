<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Auth;
use Response;

use App\User;

class MerchantController extends Controller
{
    /* change this to the production url for going live after testing https://api.propay.com */
        private $_apiBaseUrl = 'https://xmltestapi.propay.com';
        protected $bill_id = '5841490254649665';//'2317151170917860';
        protected $aut_tok = '202add9c-0746-449a-b8bd-9861a6914997';//'56824595-f299-44d0-9194-83b668937093';
        protected $certstr = 'a628a039b164200b3ad36e4261799a';//'c48a039bf3649f48ff56d673bedaaa';
        protected $term_id = '61799a';//'56d673';

     public function setCertStr($certStr) {
        $this->_certStr = $certStr;
        return $this;
    }

      public function setTermId($termId) {
        $this->_termId = $termId;
        return $this;
    }


     private function _getAuthsignup() {
        return $this->_certStr . ':' . $this->_termId;
    }


    public function setBillerId($billerId) {
        $this->_billerId = $billerId;
        return $this;
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function signup()
    {
        return view('admin.merchant.signup');
    }

    public function signupMerchant(Request $req)
    {
         $a = $req->dob;
    $o_dd=substr($req->dob,8,2);
    $o_mm=substr($req->dob,5,2);
    $o_yy=substr($req->dob,0,4);
    $dob_owner = '11'.'-'.'10'.'-'.'1993';
    
    $b = $req->ben_dob;
    $b_dd=substr($req->ben_dob,8,2);
    $b_mm=substr($req->ben_dob,5,2);
    $b_yy=substr($req->ben_dob,0,4);
    $dob_ben = '11'.'-'.'10'.'-'.'1993';

$bene_owner = array(
                    "FirstName"=> 'Test',
                    "LastName"=> 'user',
                    "SSN"=> '999999999',
                    "DateOfBirth"=> $dob_ben,
                    "Email"=> $req->ben_email,
                    "Address"=> 'xyz',
                    "City"=> 'LEHI',
                    "State"=> 'AK',
                    "Zip"=> '86010',
                    "Country"=> 'USA',
                    "Title"=> 'test title',
                    "Percentage"=> '100'
            );

$data = [
    
"PersonalData"=>[
"FirstName"=> 'Saad',
"MiddleInitial"=> "X",
"LastName"=> 'user',
"DateOfBirth"=> $dob_owner,
"SocialSecurityNumber"=>'999999999',
"SourceEmail"=> $req->email,
"PhoneInformation"=> [
"DayPhone"=> '1111111111',
"EveningPhone"=> '1111111111',
],
],
"SignupAccountData"=>[
"CurrencyCode"=>"USD",    
"Tier"=>Auth::user()->plan_name
 ],
"Address"=>[
"Address1"=> 'xyz',
"Address2"=> 'xyz',
"City"=> $req->city,
"State"=> $req->state,
"Country"=> $req->res_country,
"Zip"=> $req->zip,
],
"BankAccount"=>[
"AccountCountryCode"=> $req->bank_code,
"AccountName"=>$req->account_name,
"BankAccountNumber"=> $req->account,
"RoutingNumber"=> $req->routing_number,
"AccountOwnershipType"=> $req->owner,
"BankName"=> $req->bank_name,
"AccountType"=> $req->account_type
],
"BeneficialOwnerData"=> [
"OwnerCount"=> "1",
"Owners"=>[
    $bene_owner
]
]

];

//  dd($data);

 $protectPayAPI = new MerchantController();

    $result2 = $protectPayAPI->setCertStr($this->certstr)
    ->setTermId($this->term_id)
    ->processSignup($data);
//dd($result2);
 $result = json_decode($result2, true);
 dd($result);
        
     if($result['Status'] == 39){
return redirect()->back()->with('msg','Evening/Morning Phone is Invalid (Enter 10 Digit Phone Number for USA And Canada with no dashes');
     }
    
      if($result['Status'] == 40){
return redirect()->back()->with('msg','Invalid Social Security Number');
     }
     
     if($result['Status'] == 41){
return redirect()->back()->with('msg','Invalid Date Of Birth, Must be Older Than 18 Years');
     }
     
     if($result['Status'] == 46){
return redirect()->back()->with('msg','Invalid Routing Number, Cannot exceed 9 digits');
     }
     
     if($result['Status'] == 158){
return redirect()->back()->with('msg','Beneficial Owner Data Is Incorrect');
     }
     
    if($result['Status'] == 00){

 $data1 =["ProfileName"=>$req->name,
        "PaymentProcessor"=>"LegacyProPay",    
        "ProcessorData"=>[[
            "ProcessorField"=>"certStr",
            "Value"=>$this->certstr
             ],
             ["ProcessorField"=>"accountNum",
             "Value"=>$result['AccountNumber']
            ],
            ["ProcessorField"=>"termId",
            "Value"=> $this->term_id
        ]    ] ];



$protectPayAPI = new MerchantController();
$result1 = $protectPayAPI->setBillerId($this->bill_id)
->setAuthToken($this->aut_tok)
->createMerchantProfile($data1);

    $manage = json_decode($result1, true);

    dd($manage);

       //  dd($manage);

    if($manage['RequestResult']['ResultCode']==00){
        dd('successful');
        // DB::table('payment_merchant')->insert([
        //     'account_id'=>$result['AccountNumber'],
        //     'profile_id'=>$manage['ProfileId'],
        //     'user_id'=>Auth::user()->id,
        //     'role_type'=>Auth::user()->role,
        //     'merchant_name' => Auth::user()->fname.' '.Auth::user()->lname
        // ]);
        
        //  $payment = $this->payment_done($req);  //after successful completion of payer account, payment is done for the platform
        return redirect()->back()->with('msg','Account Created Successful');
        
    
}

    else  {
        dd('noat successful');

    return redirect()->back()->with('msg','Account didnot Created'); //Else Of $manage above
    }
    

    }


    else{
        dd('not successful');
        
        //account fee reverse code here /check here if the user is charged with amount for the platform
        return redirect()->back()->with('msg','Account Did Not Created'); // Else of overall function

    }



    }

     //Signup Merchant 

    public function processSignup($data) {
        $data_string = json_encode($data);

       /* $client = new Client(); //GuzzleHttp\Client
        $client->setDefaultOption('headers', array('Content-Type' => 'application/json','Content-Length' => strlen($data_string)));
        $result = $client->post($this->_apiBaseUrl . '/ProPayAPI/signup', [
            $data_string
        ]);

        dd($result);*/

        $ch = curl_init($this->_apiBaseUrl . '/ProPayAPI/signup');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, $this->_getAuthsignup());
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string)
        ));

     return curl_exec($ch);
     
        
    }

    //Create Merchant Profile

    public function createMerchantProfile($data) {
        $data_string = json_encode($data);

        $ch = curl_init($this->_apiBaseUrl . '/protectpay/MerchantProfiles/');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, $this->_getAuth());
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string)
        ));

        return curl_exec($ch);
        
    }
    
    public function viewDetails(Request $request)
    {
        $user = User::where('id',$request->id)->first();
        
        return Response::json(['data'=>$user]);
    }
    
    public function banUser(Request $request)
    {
        $banUser = User::findOrFail($request->id);
        $banUser->status = 0;
        $banUser->save();
        
        return Response::json(['status'=>'success']);
    }
    
    public function activateUser(Request $request)
    {
        $banUser = User::findOrFail($request->id);
        $banUser->status = 1;
        $banUser->save();
        
        return Response::json(['status'=>'success']);
    }
}
