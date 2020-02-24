@extends('layouts.admin2')

@section('pagename')
Developer Portal
@endsection

@section('content')

<div class="panel">
<div class="panel-body">
    <section class="method first-of-group" id="intro">
        <div class="MethodArea-divider"></div>
        <div class="method-area method-area-expanded">
            <div class="method-copy portal-main-div">
                <div class="method-copy-padding">
                    <div class="MethodCopyTitle">
                        <h1 class="MethodCopyTitle-anchor">General Information about the ProPay REST Interface</h1></div>
                    <p class="IntroSection-firstPara">REST combines a base URI, mapped Resource URI elements, and standard HTTP methods for many ProPay API methods.</p>
                    <p>- When using the GET or DELETE HTTP methods, the API request does not need more information passed. </p>
                    <p>- When using POST and PUT HTTP methods, information is sent in the form of JavaScript Object Notation (JSON) objects. </p>
                    <p>- The API will return a JSON object as a response to each API request regardless of which HTTP method was used. </p>
                    <p>When submitting JSON objects in an API request, the Content-Type should be set to ‘application/json’ and the Content-Length field should be set
to the length of the data.</p>
                    <p>- Developers should be prepared to handle null values. In case of a null value the ProPay API REST API may return “:null” or the element may not
be returned.</p>
                </div>
            </div>
            
        </div>
    </section>
    
    <section class="method first-of-group" id="authentication">
        <div class="MethodArea-divider"></div>
        <div class="method-area method-area-expanded">
            <div class="method-copy portal-main-div">
                <div class="method-copy-padding">
                    <div class="MethodCopyTitle">
                        <h1 class="MethodCopyTitle-anchor">API Authorization</h1></div>
                    <p>The REST interface uses Basic HTTP Authentication for API requests, with the BillerId as the username and the Authentication Token as the password.
This must be added to the HTTP header as the value of the ‘Authorization’ field. Creating the Authorization Header value requires the following steps:</p>
                    <ol type="1" class="listportal">
                        <li>Combine the CertStr, a Colon, and the termId (MyCertStr:MyTermId). If a termId has not been provided only use the CertStr without a colon
(MyCertStr).</li>
<li>
     Convert the Result of Step 1 to an ASCII Byte Array
</li>
<li>
    Base 64 Encode the Result of Step 2  
</li>
<li>
    Prepend “Basic “ to the Result of Step 3
</li>
<li>
    Add ‘Authorization’ as an HTTP header and set its value to the result of Step 4
</li>
                    </ol>
                </div>
                <div class="method-list">
                    <h5 class="method-list-title">Sample HTTP Header</h5>
                    <ul class="method-list-group">
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="MethodListItemLabelName-parentName" style="font-weight:bold;">HTTP Header Field</span> </h3>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span class="MethodListItemLabelName-parentName" style="font-weight:bold;">Value</span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name">Authorization</span> </h3>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Basic TXlUZXJtSWQ6TXlDZXJ0U3Ry</span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name">Content-Length</span> </h3>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>*Varies Depending on Length of Content submitted</span></p>
                            </div>
                        </li>
                        
                         <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name">Content-Type</span> </h3>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>application/json</span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name">Method</span> </h3>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>*Varies Depending on Method: GET, DELETE, PUT, POST</span></p>
                            </div>
                        </li>
                        
                        </ul>
                        </div>
            </div>
      
        </div>
    </section>
    
    
    <section class="method first-of-group" >
        <div class="MethodArea-divider"></div>
        <div class="method-area method-area-expanded">
            <div class="method-copy portal-main-div">
                <div class="method-copy-padding">
                    <div class="MethodCopyTitle">
                        <h1 class="MethodCopyTitle-anchor">Create a ProPay Account</h1></div>
                    <p class="IntroSection-firstPara">This section describes data required to create a ProPay merchant account. </p>
                    <p>- Upon successful creation, an account number and temporary password will be returned. If the new account holder logs into ProPay’s website,
he or she will be afforded the opportunity to change his or her password. </p>
                    <p>- Items flagged a “Best Practice” are highly recommended when boarding a new merchant. Not providing these fields may increase the
likelihood of holds being placed on production accounts. </p>
                    <p>- The API will return a JSON object as a response to each API request regardless of which HTTP method was used. </p>
                    <p>- When submitting JSON objects in an API request, the Content-Type should be set to ‘application/json’ and the Content-Length field should be set
to the length of the data.</p>
                    <p>- Developers should be prepared to handle null values. In case of a null value the ProPay API REST API may return “:null” or the element may not
be returned.</p>
<h2 class="MethodCopyTitle-anchor" style="font-weight:bold;">Identity Verification</h2>
<p>In order to comply with Industry regulations and legal requirements, ProPay must validate the identity of each merchant account created. ProPay
uses a major third-party credit reporting services to perform identity validation on the individual or business enrolling for each account. Validation will
be performed based on either:</p>
<h3 class="MethodCopyTitle-anchor">Personal Information</h3>
<p>This validation is performed using the supplied required merchant/distributor personal information. Exact requirements differ by market.</p>
<p>- In the U.S. a social security number is required and used to validate the applicant’s identity</p>
<p>- In Canada, no specific government-issued document is required</p>
<p>- In Australia and New Zealand, the Medical Insurance Number is recommended for higher approval rates</p>
<h3 class="MethodCopyTitle-anchor">Business Information</h3>
<p>ProPay can validate a business using its Tax ID number along with other required fields. Note: Business validation is not possible for card-only
accounts or, currently, outside of the U.S. Approval to perform business validation is required.</p>
<p>- Business Accounts are ineligible for ProPay MasterCards</p>
<p>- Business Accounts cannot utilize ProPay API method 4.2.2. Reset ProPay Account Password. Passwords are reset online by supplying the EIN
instead of SSN, or by contacting ProPay Customer Service</p>
<h3 class="MethodCopyTitle-anchor">ThreatMetrix Signup Validation:</h3>
<p>ProPay uses a best in class fraud prevention tool provided by ThreatMetrix. Some of our API partners may also be required to implement this solution
into their own signup flows. ThreatMetrix requires that:</p>
<p>- The partner includes an ‘iFramed’ widget on their website. Into the URL of this iFrame, the partner passes a unique ID of their own creation.</p>
<p>- The partner then includes extra data in their signup API request (Including the same unique identifier passed into the iFrame).</p>
<h3 class="MethodCopyTitle-anchor">International Signups:</h3>
<p>Designating a signup as international is accomplished by specifying a <country> tag other than USA. If <country> is not passed, USA is assumed.
Most international signups are performed for a ProPay Card-Only account that cannot process credit cards. Merchant accounts are currently
available only in the US, Canada, Australia and New Zealand. Many of the formatting rules that exist for domestic signups are relaxed for
international accounts and many of the required tags are optional for international signups. Please note that state and country are still limited to 3
characters for international signups.</p>
<br>
<p>Even though addresses outside of the United States contain values other than ‘zip code’ or ‘state’, ProPay uses these tags to define their analogous
counterparts. Please use <zip> to define any type of postal routing code, and use <state> to define a province, county, shire, prefecture, etc. </p>
<br>
<p>In the United States, state values must conform to standardized abbreviations, and zip codes must be of either 5 or 9 digit lengths without a dash.
These restrictions are not true for international signups where <state> can be longer than two characters. Formatting characters such as spaces and
dashes should be omitted, unless these are considered part of the actual state or zip in that country.</p>
<p>Similarly, in the United States, phone numbers must be standardized as ten digits while outside of the US, lengths may vary. Please omit all formatting
characters.</p>
<h3 class="MethodCopyTitle-anchor">Paying for a ProPay Account</h3>
<p>If the client program is configured in such a way that the business entity will pay for all ProPay accounts enrolled under its affiliation, or that the
individual users will pay ProPay directly when activating their account, no payment information is required to be submitted at the time of enrollment.</p>
<p>ProPay accounts must be paid for before funds can be accessed or payment transactions may be performed. If the client program involves a
direct payment for the account by the user at the time of enrollment, the optional payment information elements may be passed in the request.
International Card-Only accounts may receive commission disbursements prior to ID verification, but the user will not be able to access funds until
activation is complete.</p>
<h3 class="MethodCopyTitle-anchor">Special notes on the use of ExternalId tag:</h3>
<p>Generally the ‘ExternalId’ tag is used to store a value in ProPay that identifies the user in the client solution system. Omitting the ExternalId may
prevent users from restoring a lost password, and prevents an affiliate from performing a request for account details from ProPay using that value.</p>


<div class="method-list">
                    <!--<h5 class="method-list-title">Sample HTTP Header</h5>-->
                    <ul class="method-list-group">
                        <li class="method-list-item" style="color:#d61111;font-weight:bold;">
                            Personal Data - Required
                        </li>
                         <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>FirstName</span>    <span class="method-list-item-validation">string (Max: 20)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Merchant/Individual first name.</span></p>
                            </div>
                        </li>
                        
                          <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>MiddleInitial</span>    <span class="method-list-item-validation">string (Max: 2)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:black">
                                Optional
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Merchant/Individual middle initial.</span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>LastName</span>    <span class="method-list-item-validation">string (Max: 25)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Merchant/Individual last name.</span></p>
                            </div>
                        </li>
                        
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>DateOfBirth</span>    <span class="method-list-item-validation">string</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Merchant/Individual Date of birth. Must be in ‘mm-dd-yyyy’ format. *Individual must be 18+ to obtain an
account. </span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>SocialSecurityNumber</span>    <span class="method-list-item-validation">string (Max: 9)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:black">
                                Optional
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Merchant/Individual social security number. Must be 9 characters without dashes. *Required for USA when
using personal validation. If business validated, do not pass!</span></p>
                            </div>
                        </li>
                        
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>SourceEmail</span>    <span class="method-list-item-validation">string (Max: 55)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Merchant/Individual email address. Must be unique in ProPay system. *ProPay’s system will send automated
emails to the email address on file unless NotificationEmail is provided. *Truncated, if value provided is greater
than max value.</span></p>
                            </div>
                        </li>
                        
                         <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>PhoneInformation{DayPhone</span>    <span class="method-list-item-validation">string</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Merchant/Individual day phone number. *For USA, CAN, NZL and AUS value must be 10 characters with no
dashes</span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>PhoneInformation{EveningPhone</span>    <span class="method-list-item-validation">string</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Merchant/Individual evening phone number. *For USA, CAN, NZL and AUS value must be 10 characters with no
dashes</span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>NotificationEmail</span>    <span class="method-list-item-validation">string (Max: 55)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:black">
                                Optional
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Communication Email Address. *ProPay’s system will send automated emails to the email address on file rather
than the Source Email.</span></p>
                            </div>
                        </li>
                        
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>CurrencyCode</span>    <span class="method-list-item-validation">string (Max: 3)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:black">
                                Optional
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Required to specify the currency in which funds should be held, if other than USD. An affiliation must be
granted permission to create accounts in currencies other than USD. ISO 4217 standard 3 character currency
code.</span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>Tier</span>    <span class="method-list-item-validation">string</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:black">
                                Optional
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>One of the previously assigned merchant tiers. *If not provided, will default to cheapest available tier.</span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>ExternalId</span>    <span class="method-list-item-validation">string (Max: 20)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:black">
                                Optional
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>This is a partner’s own unique identifier. Typically used as the distributor or consultant ID.</span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>PhonePin</span>    <span class="method-list-item-validation">string (Max: 4)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:black">
                                Optional
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Numeric value which will give a user access to ProPay’s IVR system. Can also be used to reset password.</span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>UserId</span>    <span class="method-list-item-validation">string (Max: 55)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:black">
                                Optional
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>ProPay account username. Must be unique in ProPay system. *Username defaults to <sourceEmail> if userId is
not provided.</span></p>
                            </div>
                        </li>
                        
                          <li class="method-list-item" style="color:#d61111;font-weight:bold;">
                            Personal Address - Required
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>Address1</span>    <span class="method-list-item-validation">string (Max: 100)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Merchant/Individual physical street Address. PO Boxes are not allowed.</span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>Address2</span>    <span class="method-list-item-validation">string (Max: 100)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:black">
                                Optional
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Merchant/Individual physical Address. Use for 2nd Address Line</span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>City</span>    <span class="method-list-item-validation">string (Max: 30)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Merchant/Individual physical Address city</span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>State</span>    <span class="method-list-item-validation">string (Max: 3)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Merchant/Individual physical Address state. *Standard 2 character abbreviation for state, province, prefecture, etc. </span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>Zip</span>    <span class="method-list-item-validation">string</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Merchant/Individual physical Address zip/postal code. For USA: 5 or 9 characters without dash. For CAN: 6
characters postal code with a space “XXX XXX” For AUS and NZ 4 character code. </span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>Country</span>    <span class="method-list-item-validation">string</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:black">
                                Optional
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>ISO 3166 standard 3 character country codes. Required if creating an account in a country other than USA.
*Country must be an approved country to create a ProPay account.</span></p>
                            </div>
                        </li>
                        
                        
                        <li class="method-list-item" style="color:rgb(0, 128, 166);font-weight:bold;">
                            Business Data – Required for business validated accounts. May also be required for personal validated accounts by ProPay Risk Team
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>BusinessLegalName</span>    <span class="method-list-item-validation">string (Max: 255)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>The legal name of the business as registered.</span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>DoingBusinessAs</span>    <span class="method-list-item-validation">string (Max: 255)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>This field can be used to provide DBA information on an account. ProPay accounts can be
configured to display DBA on cc statements</span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>EIN</span>    <span class="method-list-item-validation">string</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Employer Identification Number can be added to a ProPay account. </span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>MerchantCategoryCode</span>    <span class="method-list-item-validation">string (Max: 4)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:black">
                                Optional
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Merchant Category Code </span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>WebsiteURL </span>    <span class="method-list-item-validation">string (Max: 255)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>The Business’ website URL</span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>BusinessDescription</span>    <span class="method-list-item-validation">string (Max: 255)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:black">
                                Optional
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>The Business’ description.</span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>MonthlyBankCardVolume</span>    <span class="method-list-item-validation">Int(64)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>The monthly volume of bank card transactions; Value representing the number of pennies in USD,
or the number of [currency] without decimals. Defaults to $1000.00 if not sent</span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>AverageTicket</span>    <span class="method-list-item-validation">Int(64)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>The average amount of an individual transaction; Value representing the number of pennies in
USD, or the number of [currency] without decimals. Defaults to $300.00 if not sent. </span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>HighestTicket</span>    <span class="method-list-item-validation">Int(64)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Merchant Category Code </span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>Address1</span>    <span class="method-list-item-validation">string (Max: 100)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Business Physical Address</span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>Address2</span>    <span class="method-list-item-validation">string (Max: 100)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:black">
                                Optional
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Business Physical Address</span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>City</span>    <span class="method-list-item-validation">string (Max: 30)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Business Physical Address City.</span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>Country</span>    <span class="method-list-item-validation">string</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Must be ISO standard 3 character country code.</span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>State</span>    <span class="method-list-item-validation">string (Max: 3)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>If domestic signup this value MUST be one of the standard 2 character abbreviations. Rule also
applies for Canadian signups. (Must be standard province abbreviation.)</span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>Zip</span>    <span class="method-list-item-validation">string</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>For USA: 5 or 9 characters without dash. For CAN: 6 characters postal code with a space “XXX
XXX”. For AUS and NZ 4 character code. </span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" style="color:rgb(0, 128, 166);font-weight:bold;">
                           International Signup Data – Frequently Required for partners who sign up international merchants
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>DocumentType</span>    <span class="method-list-item-validation">string (Max: 1)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:black">
                                Optional*
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Values 1( Driver’s license), 2(Passport), 3( Australia Medicare)</span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>InternationalId</span>    <span class="method-list-item-validation">string</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:black">
                                Optional*
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Corresponds to the document number provided by DocumentType.</span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>DocumentExpDate</span>    <span class="method-list-item-validation">string</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:black">
                                Optional*
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Corresponds to the Expiry date of the document provided by DocumentType. Should be a valid
date. mm-dd-yyyy</span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>DocumentIssuingState</span>    <span class="method-list-item-validation">string (Max: 3)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:black">
                                Optional*
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Required if the DocumentType is 1 (Driver’s license). The driver’s license issuing state.</span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>DriversLicenseVersion</span>    <span class="method-list-item-validation">string</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:black">
                                Optional*
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Required if the DocumentType is 1 (Driver’s license) and Country is NZL. This is driver’s license
version number</span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>MedicareReferenceNumber </span>    <span class="method-list-item-validation">string (Max: 1)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:black">
                                Optional*
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Required if the DocumentType is 3 (Australia Medicare) and Country is AUS. The data should be
parsed to Number.
</span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>MedicareCardColor</span>    <span class="method-list-item-validation">string</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:black">
                                Optional*
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Required if the DocumentType is 3 (Australia Medicare) and Country is AUS.
<ul style="
    padding-left: 42px;
"><li style="list-style-type: square;">Yellow</li>
<li style="list-style-type: square;">Green</li>
<li style="list-style-type: square;">Blue</li></ul>
</span></p>
                            </div>
                        </li>
                        <li class="method-list-item" style="color:rgb(0, 128, 166);font-weight:bold;">
                           Account Payment (Credit Card) Information - A payment method is required if account fee not paid by the partner
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>NameOnCard</span>    <span class="method-list-item-validation">string</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Card holder's name as it appears on card</span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>CreditCardNumber</span>    <span class="method-list-item-validation">string (Max: 16)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Must pass Luhn check. Used to pay for an account if Propay has not set account type up as free to users</span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>ExpDate</span>    <span class="method-list-item-validation">string (Max: 4)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Used to pay for an account if Propay has not set account type as free to users.Submitted as mmyy</span></p>
                            </div>
                        </li>
                        <li class="method-list-item" style="color:rgb(0, 128, 166);font-weight:bold;">
                           Account Payment (ACH) Information - A payment method is required if account fee not paid for by partner
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>AccountNumber</span>    <span class="method-list-item-validation">string</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Used to pay for an account via ACH and monthly renewal.Finanacial institution account number</span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>RoutingNumber</span>    <span class="method-list-item-validation">string</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Used to pay for an account via ACH and monthly renewal.Financial institution routing number.Must be a valid ACH routing number</span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>AccountType</span>    <span class="method-list-item-validation">string</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Used to pay for an account via ACH and monthly renewal.Valid values are:Checking,Savings,and GeneralLedger</span></p>
                            </div>
                        </li>
                        <li class="method-list-item" style="color:rgb(0, 128, 166);font-weight:bold;">
                           Account Payment (ProtectPay) Information - A payment method is required if account fee not paid for by partner
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>PaymentMethodId</span>    <span class="method-list-item-validation">string</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Used to pay for an account via a ProtectPay Payment Method ID. Valid value is a GUID.</span></p>
                            </div>
                        </li>
                        <li class="method-list-item" style="color:rgb(0, 128, 166);font-weight:bold;">
                           Mailing Address - Optional. Used if mailed correspondence from Propay should be sent to separate address
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>Address1</span>    <span class="method-list-item-validation">string (Max: 100)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:black">
                                Optional
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Merchant/Individual mailing address if different than physical address.</span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>Address2</span>    <span class="method-list-item-validation">string</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:black">
                                Optional
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Merchant/Individual mailing address if different than physical address.</span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>City</span>    <span class="method-list-item-validation">string (Max: 30)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:black">
                                Optional
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Merchant/Individual mailing city if different than physical address.</span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>State</span>    <span class="method-list-item-validation">string (Max: 3)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:black">
                                Optional
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Merchant/Individual mailing state if different than physical address.*Standard 2 character abbreviation for state,province,prefecture,etc.</span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>Country</span>    <span class="method-list-item-validation">string (Max: 3)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:black">
                                Optional
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>ISO 3166 standard 3 character country codes.Required if creating an account in a country other than USA.</span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>Zip</span>    <span class="method-list-item-validation">string</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:black">
                                Optional
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Merchant/Individual mailing zip/postal code if different than the physical address. For USA:5 or 9 characters without dash. For CAN:6 characters postal code with a space "XXX XXX" For AUS and NZ 4 character code.</span></p>
                            </div>
                        </li>
                        <li class="method-list-item" style="color:rgb(0, 128, 166);font-weight:bold;">
                           Primary Bank Account Information - Optional. Used to add a bank account to which funds can be settled
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>AccountCountryCode</span>    <span class="method-list-item-validation">string (Max: 3)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>ISO 3166 standard 3-character country code</span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>AccountName</span>    <span class="method-list-item-validation">string (Max: 32)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Merchant/Individual Name</span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>BankAccountNumber</span>    <span class="method-list-item-validation">string (Max: 25)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Financial institution account number</span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>AccountOwnershipType</span>    <span class="method-list-item-validation">string (Max: 15)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Valid values are: Personal and Business</span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>AccountType</span>    <span class="method-list-item-validation">string (Max: 1)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Valid values are: C - Checking, S - Savings, G - General Ledger</span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>BankName</span>    <span class="method-list-item-validation">string (Max: 50)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Name of financial institution</span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>RoutingNumber</span>    <span class="method-list-item-validation">string (Max: 9)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Financial institution routing number. Must be a valid ACH routing number.</span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" style="color:rgb(0, 128, 166);font-weight:bold;">
                          Secondary Bank Account Information – Optional. Used to add an account from which fees are pulled. Only works when Primary bank added
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>AccountCountryCode</span>    <span class="method-list-item-validation">string (Max: 3)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Required if adding secondary bank account. Must be ISO standard 3 character code. This will
become the account to which proceeds of transactions are sent in split sweep functionality.</span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>AccountName</span>    <span class="method-list-item-validation">string (Max: 32)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Required if adding secondary bank account info as part of the signup. This will become the
account to which proceeds of transactions are sent in split sweep functionality. </span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>BankAccountNumber</span>    <span class="method-list-item-validation">string (Max: 25)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Required if adding secondary bank account info as part of the signup. This will become the
account to which proceeds of transactions are sent in split sweep functionality.</span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>AccountOwnershipType</span>    <span class="method-list-item-validation">string (Max: 25)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Required if adding secondary account as part of the signup. Valid values are ‘Personal’ or
‘Business’ If accountType is G, then this value is always overwritten as ‘Business’ This will become
the account to which proceeds of transactions are sent in split sweep functionality.</span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>AccountType</span>    <span class="method-list-item-validation">string (Max: 1)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Required if adding secondary bank account info as part of the signup. Valid values are: C - Checking, S - Savings, G - General Ledger</span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>BankName</span>    <span class="method-list-item-validation">string (Max: 50)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Required if adding secondary bank account info as part of the signup. This will become the
account to which proceeds of transactions are sent in split sweep functionality.</span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>RoutingNumber</span>    <span class="method-list-item-validation">string (Max: 9)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Required if adding secondary bank account info as part of the signup, must be a valid Fedwire
ACH participant routing number. This will become the account to which proceeds of
transactions are sent in split sweep functionality.</span></p>
                            </div>
                        </li>
                        <li class="method-list-item" style="color:rgb(0, 128, 166);font-weight:bold;">
                          Bank Account Ownership Details – Optional.  Needed for Canadian merchants, to comply with banking rule. If missing in Canada, transfers fail.
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>FirstName</span>    <span class="method-list-item-validation">string (Max: 25)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Required if adding ownership info. </span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>LastName</span>    <span class="method-list-item-validation">string (Max: 25)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Required if adding ownership info. </span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>Address1</span>    <span class="method-list-item-validation">string (Max: 50)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Required if adding ownership info. </span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>City</span>    <span class="method-list-item-validation">string (Max: 50)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Required if adding ownership info. </span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>StateProvince</span>    <span class="method-list-item-validation">string (Max: 3)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Required if adding ownership info. 2-3 character abbreviation. </span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>PostalCode</span>    <span class="method-list-item-validation">string (Max: 10)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Required if adding ownership info. </span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>Country</span>    <span class="method-list-item-validation">string (Max: 3)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Required if adding ownership info. 3 character ISO standard country abbreviation. </span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>Phone</span>    <span class="method-list-item-validation">string (Max: 25)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Required if adding ownership info. </span></p>
                            </div>
                        </li>
                        <li class="method-list-item" style="color:rgb(0, 128, 166);font-weight:bold;">
                         Gross Billing Information – Optional. Used with prior approval to automatically bill fees to separate account
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>Address1</span>    <span class="method-list-item-validation">string (Max: 25)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:black">
                                Optional
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Gross Settle credit card billing address. </span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>City</span>    <span class="method-list-item-validation">string (Max: 25)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#black">
                                Optional
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Gross Settle credit card billing address. </span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>Country</span>    <span class="method-list-item-validation">string (Max: 3)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:black">
                                Optional
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Gross Settle credit card billing address. Must be 3 character ISO standard country code </span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>State</span>    <span class="method-list-item-validation">string (Max: 2)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:black">
                                Optional
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Gross Settle credit card billing address. Must be 3 character ISO standard country code </span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>Zip</span>    <span class="method-list-item-validation">string (Max: 9)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:black">
                                Optional*
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Gross Settle credit card billing address. For USA: 5 or 9 characters without dash. For CAN: 6
characters postal code with a space “XXX XXX” Do not use if not USA or CAN. *Required if
payment method is a credit card. </span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>CountryCode</span>    <span class="method-list-item-validation">string (Max: 3)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:black">
                                Optional*
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>ISO standard 3 character country code. *Required if payment method is a bank account.  </span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>AccountName</span>    <span class="method-list-item-validation">string</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:black">
                                Optional*
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Bank account-holder’s name. *Required if payment method is a bank account.</span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>AccountType</span>    <span class="method-list-item-validation">string (Max: 10)</span>   </h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:black">
                                Optional*
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>*Required if Gross Settle billing info is bank account. Valid values are:
                                <ul style="
    padding-left: 42px;
"><li style="list-style-type: square;">C-Checking</li>
<li style="list-style-type: square;">S-Savings</li></span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>BankAccountNumber</span>    <span class="method-list-item-validation">string (Max: 25)</span></h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:black">
                                Optional*
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Bank account number. *Required if payment method is a bank account.</span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>RoutingNumber</span>    <span class="method-list-item-validation">string (Max: 9)</span></h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:black">
                                Optional*
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Routing number of valid Fedwire ACH participant. *Required if payment method is a bank
account.</span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>CreditCardNumber</span>    <span class="method-list-item-validation">string (Max: 16)</span></h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:black">
                                Optional*
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Valid credit card number. *Required if payment method is a credit card.</span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>ExpirationDate</span>    <span class="method-list-item-validation">string (Max: 4)</span></h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:black">
                                Optional*
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Credit card expiration date. *Required if payment method is a credit card.</span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>NameOnCard</span>    <span class="method-list-item-validation">string (Max: 25)</span></h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:black">
                                Optional*
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Name on credit card. *Required if payment method is a credit card. </span></p>
                            </div>
                        </li>
                        <li class="method-list-item" style="color:rgb(0, 128, 166);font-weight:bold;">
                         Merchant Beneficiary Owner Information – May be required for some partners based on ProPay Risk decision
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>OwnerCount</span>    <span class="method-list-item-validation">string (Max: 1)</span></h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Number of Beneficiary Owners, should be maximum 5. </span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>Title</span>    <span class="method-list-item-validation">string (Max: 55)</span></h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:black">
                                Optional
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>This field contains the title. </span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>FirstName</span>    <span class="method-list-item-validation">string (Max: 20)</span></h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Owner First Name. </span></p>
                            </div>
                        </li>
                        
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>Email</span>    <span class="method-list-item-validation">string (Max: 55)</span></h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Owner Email ID. </span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>DateOfBirth</span>    <span class="method-list-item-validation">string (Max: 10)</span></h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Date of Birth of the Owner. Must be in ‘mm-dd-yyyy’ format. </span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>Percentage</span>    <span class="method-list-item-validation">string (Max: 3)</span></h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Percentage stake in company by owner. Must be whole number between 0 and 100. </span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>Address</span>    <span class="method-list-item-validation">string (Max: 100)</span></h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Street address where Owner resides. *Required if passing Merchant Beneficiary Owner
Information. </span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>SSN</span>    <span class="method-list-item-validation">string (Max: 9)</span></h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Social Security Number of the Owner. Should be 9 digits.  </span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>City</span>    <span class="method-list-item-validation">string (Max: 55)</span></h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>The name of the city where the Owner resides.  </span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>Zip</span>    <span class="method-list-item-validation">string (Max: 10)</span></h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>The postal code where the Owner resides.  </span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>State</span>    <span class="method-list-item-validation">string (Max: 3)</span></h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>The region code that corresponds to the state where the Owner resides.   </span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>Country</span>    <span class="method-list-item-validation">string (Max: 3)</span></h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>The three-character,alpha country code for where the Owner resides.   </span></p>
                            </div>
                        </li>
                        <li class="method-list-item" style="color:rgb(0, 128, 166);font-weight:bold;">
                         Significant Owner Information – May be required for some partners based on ProPay Risk decision
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>FirstName</span>    <span class="method-list-item-validation">string (Max: 20)</span></h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Seller’s Authorized Signer First Name. By default Merchant’s First name is saved*   </span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>LastName</span>    <span class="method-list-item-validation">string (Max: 25)</span></h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Seller’s Authorized Signer Last Name. By default Merchant’s Last name is saved*   </span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>Title</span>    <span class="method-list-item-validation">string (Max: 20)</span></h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:black">
                                Optional
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>This field contains the Seller’s Authorized Signer Title*. Commonly used Authorized Signer Titles
include:    </span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>FirstName</span>    <span class="method-list-item-validation">string (Max: 20)</span></h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span> For US: Seller’s Significant Owner First Name.
For CAN: Seller’s Significant Owner or Authorized Signer First Name. </span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>LastName</span>    <span class="method-list-item-validation">string (Max: 20)</span></h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>For US: Seller’s Significant Owner Last Name.
For CAN: Seller’s Significant Owner or Authorized Signer Last Name. </span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>SSN</span>    <span class="method-list-item-validation">string (Max: 9)</span></h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Social Security Number of the Seller’s Significant Owner. Should be 9 digits. </span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>DateOfBirth</span>    <span class="method-list-item-validation">date </span></h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Social Security Number of the Seller’s Significant Owner. Should be 9 digits. </span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>Address1</span>    <span class="method-list-item-validation">string (Max: 40) </span></h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Street address where Seller’s Significant Owner resides. </span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>City</span>    <span class="method-list-item-validation">string (Max: 40) </span></h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>The name of the city where the Seller’s Significant Owner resides</span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>RegionCode</span>    <span class="method-list-item-validation">string (Max: 6) </span></h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>The region code that corresponds to the state where the Seller’s Significant Owner resides.
</span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>Zip</span>    <span class="method-list-item-validation">string (Max: 9) </span></h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>The postal code for where the Seller's Significant Owner resides.</span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>CountryCode</span>    <span class="method-list-item-validation">string (Max: 2) </span></h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>The two-character, alpha country code for where the Seller's Significant Owner resides</span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>Title</span>    <span class="method-list-item-validation">string (Max: 50) </span></h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>This field contains the Seller’s Significant Signer Title.</span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>Percentage</span>    <span class="method-list-item-validation">byte  </span></h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Percentage for Significant Owner. Percentage should be in between 0 and 100.</span></p>
                            </div>
                        </li>
                        <li class="method-list-item" style="color:rgb(0, 128, 166);font-weight:bold;">
                         Threat Risk Assessment Information – May be required based on ProPay Risk Decision 
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>MerchantSourceIp</span>    <span class="method-list-item-validation">string (Max: 64) </span></h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>SourceIp of Merchant, see ProPay Fraud Detection Solutions Manual</span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>ThreatMetrixPolicy</span>    <span class="method-list-item-validation">string (Max: 32) </span></h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Threat Metrix Policy, see ProPay Fraud Detection Solutions Manual. </span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>ThreatMetrixSessionId</span>    <span class="method-list-item-validation">string (Max: 128) </span></h3>
                            <div class="method-list-item-description-and-children" style="flex:0;padding-right:20px;color:#d61111">
                                Required
                            </div>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>SessionId for Threat Metrix, see ProPay Fraud Detection Solutions Manual. </span></p>
                            </div>
                        </li>
                        <li class="method-list-item" style="color:rgb(118, 146, 60);font-weight:bold;">
                          Response Elements
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>Status</span>    <span class="method-list-item-validation">string  </span></h3>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Result of the transaction request. See ProPay Appendix B for result code definitions</span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>Password</span>    <span class="method-list-item-validation">string  </span></h3>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Temporary password</span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>AccountNumber</span>    <span class="method-list-item-validation">integer </span></h3>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Primary identifier for new ProPay account</span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>Tier</span>    <span class="method-list-item-validation">string </span></h3>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>Type of account created</span></p>
                            </div>
                        </li>
                        <li class="method-list-item" style="color:#d61111;font-weight:bold;">
                          How to call this method
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>Resource URI</span>    </h3>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>/propayapi/signup</span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>Method</span>    </h3>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>PUT</span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>Authorization</span>    </h3>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>See section 3.2.1 REST Interface</span></p>
                            </div>
                        </li>
                        
                        
                        
                        
                        </ul>
                        </div>


                </div>
            </div>
            
        </div>
    </section>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <!--<section class="method first-of-group" id="errors">
        <div class="MethodArea-divider"></div>
        <div class="method-area method-area-expanded">
            <div class="method-copy">
                <div class="method-copy-padding">
                    <div class="MethodCopyTitle">
                        <h1 class="MethodCopyTitle-anchor">Errors</h1></div>
                    <p>Stripe uses conventional HTTP response codes to indicate the success or failure of an API request. In general: Codes in the <code>2xx</code> range indicate success. Codes in the <code>4xx</code> range indicate an error that failed given the information provided (e.g., a required parameter was omitted, a charge failed, etc.). Codes in the <code>5xx</code> range indicate an error with Stripe's servers (these are rare).</p>
                    <p>Some <code>4xx</code> errors that could be handled programmatically (e.g., a card is <a href="/docs/declines">declined</a>) include an <a href="/docs/error-codes">error code</a> that briefly explains the error reported.</p>
                </div>
                <p class="csat-widget"><span class="csat-widget-text">Was this section helpful?</span><span class="csat-button csat-button-yes common-Button">Yes</span><span class="csat-button csat-button-no common-Button">No</span></p>
                <div class="method-list">
                    <h5 class="method-list-title">Attributes</h5>
                    <ul class="method-list-group">
                        <li class="method-list-item" id="errors-type">
                            <h3 class="method-list-item-label"><a href="#errors-type" class="header-anchor"><div class="SVGInline SVGInline--cleaned SVG AnchorLinkIcon MethodListItem-anchorLink SVG--color Box-root Flex-flex"><svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg AnchorLinkIcon-svg MethodListItem-anchorLink-svg SVG--color-svg" style="width: 16px;height: 16px;" width="13" height="13" viewBox="0 0 13 13" xmlns="http://www.w3.org/2000/svg"><g fill-rule="evenodd"><path d="M7.778 7.975a2.5 2.5 0 0 0 .347-3.837L6.017 2.03a2.498 2.498 0 0 0-3.542-.007 2.5 2.5 0 0 0 .006 3.543l1.153 1.15c.07-.29.154-.563.25-.773a2.46 2.46 0 0 1 .14-.25L3.18 4.85a1.496 1.496 0 0 1 .002-2.12 1.496 1.496 0 0 1 2.12 0l2.124 2.123a1.496 1.496 0 0 1-.333 2.37c.16.246.42.504.685.752z"></path><path d="M5.657 4.557a2.5 2.5 0 0 0-.347 3.837l2.108 2.108a2.498 2.498 0 0 0 3.542.007 2.5 2.5 0 0 0-.006-3.543L9.802 5.815c-.07.29-.154.565-.25.774.68a1.496 1.496 0 0 1 .332-2.372c-.16-.245-.42-.503-.685-.75z"></path></g></svg></div></a> -.036.076-.084.16-.14.25l.842.84c.585.587.59 1.532 0 2.122a1.495 1.495 0 0 1-2.12 0L6.008 7<span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>type</span>    <span class="method-list-item-validation">string</span>   </h3>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>The type of error returned. One of <code>api_connection_error</code>, <code>api_error</code>, <code>authentication_error</code>, <code>card_error</code>, <code>idempotency_error</code>, <code>invalid_request_error</code>, or <code>rate_limit_error</code></span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-charge">
                            <h3 class="method-list-item-label"><a href="#errors-charge" class="header-anchor"><div class="SVGInline SVGInline--cleaned SVG AnchorLinkIcon MethodListItem-anchorLink SVG--color Box-root Flex-flex"><svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg AnchorLinkIcon-svg MethodListItem-anchorLink-svg SVG--color-svg" style="width: 16px;height: 16px;" width="13" height="13" viewBox="0 0 13 13" xmlns="http://www.w3.org/2000/svg"><g fill-rule="evenodd"><path d="M7.778 7.975a2.5 2.5 0 0 0 .347-3.837L6.017 2.03a2.498 2.498 0 0 0-3.542-.007 2.5 2.5 0 0 0 .006 3.543l1.153 1.15c.07-.29.154-.563.25-.773a2.46 2.46 0 0 1 .14-.25L3.18 4.85a1.496 1.496 0 0 1 .002-2.12 1.496 1.496 0 0 1 2.12 0l2.124 2.123a1.496 1.496 0 0 1-.333 2.37c.16.246.42.504.685.752z"></path><path d="M5.657 4.557a2.5 2.5 0 0 0-.347 3.837l2.108 2.108a2.498 2.498 0 0 0 3.542.007 2.5 2.5 0 0 0-.006-3.543L9.802 5.815c-.07.29-.154.565-.25.774-.036.076-.084.16-.14.25l.842.84c.585.587.59 1.532 0 2.122a1.495 1.495 0 0 1-2.12 0L6.008 7.68a1.496 1.496 0 0 1 .332-2.372c-.16-.245-.42-.503-.685-.75z"></path></g></svg></div></a> <span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>charge</span>    <span class="method-list-item-validation">string</span>   </h3>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>For card errors, the ID of the failed charge.</span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-code">
                            <h3 class="method-list-item-label"><a href="#errors-code" class="header-anchor"><div class="SVGInline SVGInline--cleaned SVG AnchorLinkIcon MethodListItem-anchorLink SVG--color Box-root Flex-flex"><svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg AnchorLinkIcon-svg MethodListItem-anchorLink-svg SVG--color-svg" style="width: 16px;height: 16px;" width="13" height="13" viewBox="0 0 13 13" xmlns="http://www.w3.org/2000/svg"><g fill-rule="evenodd"><path d="M7.778 7.975a2.5 2.5 0 0 0 .347-3.837L6.017 2.03a2.498 2.498 0 0 0-3.542-.007 2.5 2.5 0 0 0 .006 3.543l1.153 1.15c.07-.29.154-.563.25-.773a2.46 2.46 0 0 1 .14-.25L3.18 4.85a1.496 1.496 0 0 1 .002-2.12 1.496 1.496 0 0 1 2.12 0l2.124 2.123a1.496 1.496 0 0 1-.333 2.37c.16.246.42.504.685.752z"></path><path d="M5.657 4.557a2.5 2.5 0 0 0-.347 3.837l2.108 2.108a2.498 2.498 0 0 0 3.542.007 2.5 2.5 0 0 0-.006-3.543L9.802 5.815c-.07.29-.154.565-.25.774-.036.076-.084.16-.14.25l.842.84c.585.587.59 1.532 0 2.122a1.495 1.495 0 0 1-2.12 0L6.008 7.68a1.496 1.496 0 0 1 .332-2.372c-.16-.245-.42-.503-.685-.75z"></path></g></svg></div></a> <span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>code</span>    <span class="method-list-item-validation">string</span>   </h3>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>For some errors that could be handled programmatically, a short string indicating the <a href="/docs/error-codes">error code</a> reported.</span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-decline_code">
                            <h3 class="method-list-item-label"><a href="#errors-decline_code" class="header-anchor"><div class="SVGInline SVGInline--cleaned SVG AnchorLinkIcon MethodListItem-anchorLink SVG--color Box-root Flex-flex"><svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg AnchorLinkIcon-svg MethodListItem-anchorLink-svg SVG--color-svg" style="width: 16px;height: 16px;" width="13" height="13" viewBox="0 0 13 13" xmlns="http://www.w3.org/2000/svg"><g fill-rule="evenodd"><path d="M7.778 7.975a2.5 2.5 0 0 0 .347-3.837L6.017 2.03a2.498 2.498 0 0 0-3.542-.007 2.5 2.5 0 0 0 .006 3.543l1.153 1.15c.07-.29.154-.563.25-.773a2.46 2.46 0 0 1 .14-.25L3.18 4.85a1.496 1.496 0 0 1 .002-2.12 1.496 1.496 0 0 1 2.12 0l2.124 2.123a1.496 1.496 0 0 1-.333 2.37c.16.246.42.504.685.752z"></path><path d="M5.657 4.557a2.5 2.5 0 0 0-.347 3.837l2.108 2.108a2.498 2.498 0 0 0 3.542.007 2.5 2.5 0 0 0-.006-3.543L9.802 5.815c-.07.29-.154.565-.25.774-.036.076-.084.16-.14.25l.842.84c.585.587.59 1.532 0 2.122a1.495 1.495 0 0 1-2.12 0L6.008 7.68a1.496 1.496 0 0 1 .332-2.372c-.16-.245-.42-.503-.685-.75z"></path></g></svg></div></a> <span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>decline_<wbr>code</span>    <span class="method-list-item-validation">string</span>   </h3>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>For card errors resulting from a card issuer decline, a short string indicating the <a href="/docs/declines#issuer-declines">card issuer’s reason for the decline</a> if they provide one.</span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-doc_url">
                            <h3 class="method-list-item-label"><a href="#errors-doc_url" class="header-anchor"><div class="SVGInline SVGInline--cleaned SVG AnchorLinkIcon MethodListItem-anchorLink SVG--color Box-root Flex-flex"><svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg AnchorLinkIcon-svg MethodListItem-anchorLink-svg SVG--color-svg" style="width: 16px;height: 16px;" width="13" height="13" viewBox="0 0 13 13" xmlns="http://www.w3.org/2000/svg"><g fill-rule="evenodd"><path d="M7.778 7.975a2.5 2.5 0 0 0 .347-3.837L6.017 2.03a2.498 2.498 0 0 0-3.542-.007 2.5 2.5 0 0 0 .006 3.543l1.153 1.15c.07-.29.154-.563.25-.773a2.46 2.46 0 0 1 .14-.25L3.18 4.85a1.496 1.496 0 0 1 .002-2.12 1.496 1.496 0 0 1 2.12 0l2.124 2.123a1.496 1.496 0 0 1-.333 2.37c.16.246.42.504.685.752z"></path><path d="M5.657 4.557a2.5 2.5 0 0 0-.347 3.837l2.108 2.108a2.498 2.498 0 0 0 3.542.007 2.5 2.5 0 0 0-.006-3.543L9.802 5.815c-.07.29-.154.565-.25.774-.036.076-.084.16-.14.25l.842.84c.585.587.59 1.532 0 2.122a1.495 1.495 0 0 1-2.12 0L6.008 7.68a1.496 1.496 0 0 1 .332-2.372c-.16-.245-.42-.503-.685-.75z"></path></g></svg></div></a> <span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>doc_<wbr>url</span>    <span class="method-list-item-validation">string</span>   </h3>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>A URL to more information about the <a href="/docs/error-codes">error code</a> reported.</span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-message">
                            <h3 class="method-list-item-label"><a href="#errors-message" class="header-anchor"><div class="SVGInline SVGInline--cleaned SVG AnchorLinkIcon MethodListItem-anchorLink SVG--color Box-root Flex-flex"><svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg AnchorLinkIcon-svg MethodListItem-anchorLink-svg SVG--color-svg" style="width: 16px;height: 16px;" width="13" height="13" viewBox="0 0 13 13" xmlns="http://www.w3.org/2000/svg"><g fill-rule="evenodd"><path d="M7.778 7.975a2.5 2.5 0 0 0 .347-3.837L6.017 2.03a2.498 2.498 0 0 0-3.542-.007 2.5 2.5 0 0 0 .006 3.543l1.153 1.15c.07-.29.154-.563.25-.773a2.46 2.46 0 0 1 .14-.25L3.18 4.85a1.496 1.496 0 0 1 .002-2.12 1.496 1.496 0 0 1 2.12 0l2.124 2.123a1.496 1.496 0 0 1-.333 2.37c.16.246.42.504.685.752z"></path><path d="M5.657 4.557a2.5 2.5 0 0 0-.347 3.837l2.108 2.108a2.498 2.498 0 0 0 3.542.007 2.5 2.5 0 0 0-.006-3.543L9.802 5.815c-.07.29-.154.565-.25.774-.036.076-.084.16-.14.25l.842.84c.585.587.59 1.532 0 2.122a1.495 1.495 0 0 1-2.12 0L6.008 7.68a1.496 1.496 0 0 1 .332-2.372c-.16-.245-.42-.503-.685-.75z"></path></g></svg></div></a> <span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>message</span>    <span class="method-list-item-validation">string</span>   </h3>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>A human-readable message providing more details about the error. For card errors, these messages can be shown to your users.</span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-param">
                            <h3 class="method-list-item-label"><a href="#errors-param" class="header-anchor"><div class="SVGInline SVGInline--cleaned SVG AnchorLinkIcon MethodListItem-anchorLink SVG--color Box-root Flex-flex"><svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg AnchorLinkIcon-svg MethodListItem-anchorLink-svg SVG--color-svg" style="width: 16px;height: 16px;" width="13" height="13" viewBox="0 0 13 13" xmlns="http://www.w3.org/2000/svg"><g fill-rule="evenodd"><path d="M7.778 7.975a2.5 2.5 0 0 0 .347-3.837L6.017 2.03a2.498 2.498 0 0 0-3.542-.007 2.5 2.5 0 0 0 .006 3.543l1.153 1.15c.07-.29.154-.563.25-.773a2.46 2.46 0 0 1 .14-.25L3.18 4.85a1.496 1.496 0 0 1 .002-2.12 1.496 1.496 0 0 1 2.12 0l2.124 2.123a1.496 1.496 0 0 1-.333 2.37c.16.246.42.504.685.752z"></path><path d="M5.657 4.557a2.5 2.5 0 0 0-.347 3.837l2.108 2.108a2.498 2.498 0 0 0 3.542.007 2.5 2.5 0 0 0-.006-3.543L9.802 5.815c-.07.29-.154.565-.25.774-.036.076-.084.16-.14.25l.842.84c.585.587.59 1.532 0 2.122a1.495 1.495 0 0 1-2.12 0L6.008 7.68a1.496 1.496 0 0 1 .332-2.372c-.16-.245-.42-.503-.685-.75z"></path></g></svg></div></a> <span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>param</span>    <span class="method-list-item-validation">string</span>   </h3>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>If the error is parameter-specific, the parameter related to the error. For example, you can use this to display a message near the correct form field.</span></p>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-payment_intent">
                            <h3 class="method-list-item-label"><a href="#errors-payment_intent" class="header-anchor"><div class="SVGInline SVGInline--cleaned SVG AnchorLinkIcon MethodListItem-anchorLink SVG--color Box-root Flex-flex"><svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg AnchorLinkIcon-svg MethodListItem-anchorLink-svg SVG--color-svg" style="width: 16px;height: 16px;" width="13" height="13" viewBox="0 0 13 13" xmlns="http://www.w3.org/2000/svg"><g fill-rule="evenodd"><path d="M7.778 7.975a2.5 2.5 0 0 0 .347-3.837L6.017 2.03a2.498 2.498 0 0 0-3.542-.007 2.5 2.5 0 0 0 .006 3.543l1.153 1.15c.07-.29.154-.563.25-.773a2.46 2.46 0 0 1 .14-.25L3.18 4.85a1.496 1.496 0 0 1 .002-2.12 1.496 1.496 0 0 1 2.12 0l2.124 2.123a1.496 1.496 0 0 1-.333 2.37c.16.246.42.504.685.752z"></path><path d="M5.657 4.557a2.5 2.5 0 0 0-.347 3.837l2.108 2.108a2.498 2.498 0 0 0 3.542.007 2.5 2.5 0 0 0-.006-3.543L9.802 5.815c-.07.29-.154.565-.25.774-.036.076-.084.16-.14.25l.842.84c.585.587.59 1.532 0 2.122a1.495 1.495 0 0 1-2.12 0L6.008 7.68a1.496 1.496 0 0 1 .332-2.372c-.16-.245-.42-.503-.685-.75z"></path></g></svg></div></a> <span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>payment_<wbr>intent</span>    <span class="method-list-item-validation">hash</span>   </h3>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>The PaymentIntent object for errors returned on a request involving a PaymentIntent.</span></p>
                                <div class="method-list-item-clearfix"></div>
                                <div class="method-list method-list-child">
                                    <h5 class="method-list-title"><span class="MethodListTitle-plus"><div class="SVGInline SVGInline--cleaned SVG AddIcon SVG--color Box-root Flex-flex"><svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg AddIcon-svg SVG--color-svg" style="width: 10px;height: 10px;" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M9 7h6a1 1 0 0 1 0 2H9v6a1 1 0 0 1-2 0V9H1a1 1 0 1 1 0-2h6V1a1 1 0 1 1 2 0z" fill-rule="evenodd"></path></svg></div></span>Show child attributes</h5></div>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-payment_method">
                            <h3 class="method-list-item-label"><a href="#errors-payment_method" class="header-anchor"><div class="SVGInline SVGInline--cleaned SVG AnchorLinkIcon MethodListItem-anchorLink SVG--color Box-root Flex-flex"><svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg AnchorLinkIcon-svg MethodListItem-anchorLink-svg SVG--color-svg" style="width: 16px;height: 16px;" width="13" height="13" viewBox="0 0 13 13" xmlns="http://www.w3.org/2000/svg"><g fill-rule="evenodd"><path d="M7.778 7.975a2.5 2.5 0 0 0 .347-3.837L6.017 2.03a2.498 2.498 0 0 0-3.542-.007 2.5 2.5 0 0 0 .006 3.543l1.153 1.15c.07-.29.154-.563.25-.773a2.46 2.46 0 0 1 .14-.25L3.18 4.85a1.496 1.496 0 0 1 .002-2.12 1.496 1.496 0 0 1 2.12 0l2.124 2.123a1.496 1.496 0 0 1-.333 2.37c.16.246.42.504.685.752z"></path><path d="M5.657 4.557a2.5 2.5 0 0 0-.347 3.837l2.108 2.108a2.498 2.498 0 0 0 3.542.007 2.5 2.5 0 0 0-.006-3.543L9.802 5.815c-.07.29-.154.565-.25.774-.036.076-.084.16-.14.25l.842.84c.585.587.59 1.532 0 2.122a1.495 1.495 0 0 1-2.12 0L6.008 7.68a1.496 1.496 0 0 1 .332-2.372c-.16-.245-.42-.503-.685-.75z"></path></g></svg></div></a> <span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>payment_<wbr>method</span>    <span class="method-list-item-validation">hash</span>   </h3>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>The PaymentMethod object for errors returned on a request involving a PaymentMethod.</span></p>
                                <div class="method-list-item-clearfix"></div>
                                <div class="method-list method-list-child">
                                    <h5 class="method-list-title"><span class="MethodListTitle-plus"><div class="SVGInline SVGInline--cleaned SVG AddIcon SVG--color Box-root Flex-flex"><svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg AddIcon-svg SVG--color-svg" style="width: 10px;height: 10px;" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M9 7h6a1 1 0 0 1 0 2H9v6a1 1 0 0 1-2 0V9H1a1 1 0 1 1 0-2h6V1a1 1 0 1 1 2 0z" fill-rule="evenodd"></path></svg></div></span>Show child attributes</h5></div>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-setup_intent">
                            <h3 class="method-list-item-label"><a href="#errors-setup_intent" class="header-anchor"><div class="SVGInline SVGInline--cleaned SVG AnchorLinkIcon MethodListItem-anchorLink SVG--color Box-root Flex-flex"><svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg AnchorLinkIcon-svg MethodListItem-anchorLink-svg SVG--color-svg" style="width: 16px;height: 16px;" width="13" height="13" viewBox="0 0 13 13" xmlns="http://www.w3.org/2000/svg"><g fill-rule="evenodd"><path d="M7.778 7.975a2.5 2.5 0 0 0 .347-3.837L6.017 2.03a2.498 2.498 0 0 0-3.542-.007 2.5 2.5 0 0 0 .006 3.543l1.153 1.15c.07-.29.154-.563.25-.773a2.46 2.46 0 0 1 .14-.25L3.18 4.85a1.496 1.496 0 0 1 .002-2.12 1.496 1.496 0 0 1 2.12 0l2.124 2.123a1.496 1.496 0 0 1-.333 2.37c.16.246.42.504.685.752z"></path><path d="M5.657 4.557a2.5 2.5 0 0 0-.347 3.837l2.108 2.108a2.498 2.498 0 0 0 3.542.007 2.5 2.5 0 0 0-.006-3.543L9.802 5.815c-.07.29-.154.565-.25.774-.036.076-.084.16-.14.25l.842.84c.585.587.59 1.532 0 2.122a1.495 1.495 0 0 1-2.12 0L6.008 7.68a1.496 1.496 0 0 1 .332-2.372c-.16-.245-.42-.503-.685-.75z"></path></g></svg></div></a> <span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>setup_<wbr>intent</span>    <span class="method-list-item-validation">hash</span>   </h3>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>The SetupIntent object for errors returned on a request involving a SetupIntent.</span></p>
                                <div class="method-list-item-clearfix"></div>
                                <div class="method-list method-list-child">
                                    <h5 class="method-list-title"><span class="MethodListTitle-plus"><div class="SVGInline SVGInline--cleaned SVG AddIcon SVG--color Box-root Flex-flex"><svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg AddIcon-svg SVG--color-svg" style="width: 10px;height: 10px;" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M9 7h6a1 1 0 0 1 0 2H9v6a1 1 0 0 1-2 0V9H1a1 1 0 1 1 0-2h6V1a1 1 0 1 1 2 0z" fill-rule="evenodd"></path></svg></div></span>Show child attributes</h5></div>
                            </div>
                        </li>
                        <li class="method-list-item" id="errors-source">
                            <h3 class="method-list-item-label"><a href="#errors-source" class="header-anchor"><div class="SVGInline SVGInline--cleaned SVG AnchorLinkIcon MethodListItem-anchorLink SVG--color Box-root Flex-flex"><svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg AnchorLinkIcon-svg MethodListItem-anchorLink-svg SVG--color-svg" style="width: 16px;height: 16px;" width="13" height="13" viewBox="0 0 13 13" xmlns="http://www.w3.org/2000/svg"><g fill-rule="evenodd"><path d="M7.778 7.975a2.5 2.5 0 0 0 .347-3.837L6.017 2.03a2.498 2.498 0 0 0-3.542-.007 2.5 2.5 0 0 0 .006 3.543l1.153 1.15c.07-.29.154-.563.25-.773a2.46 2.46 0 0 1 .14-.25L3.18 4.85a1.496 1.496 0 0 1 .002-2.12 1.496 1.496 0 0 1 2.12 0l2.124 2.123a1.496 1.496 0 0 1-.333 2.37c.16.246.42.504.685.752z"></path><path d="M5.657 4.557a2.5 2.5 0 0 0-.347 3.837l2.108 2.108a2.498 2.498 0 0 0 3.542.007 2.5 2.5 0 0 0-.006-3.543L9.802 5.815c-.07.29-.154.565-.25.774-.036.076-.084.16-.14.25l.842.84c.585.587.59 1.532 0 2.122a1.495 1.495 0 0 1-2.12 0L6.008 7.68a1.496 1.496 0 0 1 .332-2.372c-.16-.245-.42-.503-.685-.75z"></path></g></svg></div></a> <span class="method-list-item-label-name"><span class="MethodListItemLabelName-parentName"></span>source</span>    <span class="method-list-item-validation">hash</span>   </h3>
                            <div class="method-list-item-description-and-children">
                                <p class="method-list-item-description"><span>The source object for errors returned on a request involving a source.</span></p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="method-example"><span style="font-size: 0px;"></span>
                <div class="method-example-part">
                    <div class="method-example-table">
                        <div class="method-example-table-topbar">
                            <div class="method-example-table-title">HTTP status code summary</div>
                        </div>
                        <section class="table">
                            <table class="table-container">
                                <tbody>
                                    <tr id="errors-200-OK">
                                        <th class="table-row-property"><span>200 - OK</span></th>
                                        <td class="table-row-definition"><span>Everything worked as expected.</span></td>
                                    </tr>
                                    <tr id="errors-400-BadRequest">
                                        <th class="table-row-property"><span>400 - Bad Request</span></th>
                                        <td class="table-row-definition"><span>The request was unacceptable, often due to missing a required
                  parameter.</span></td>
                                    </tr>
                                    <tr id="errors-401-Unauthorized">
                                        <th class="table-row-property"><span>401 - Unauthorized</span></th>
                                        <td class="table-row-definition"><span>No valid API key provided.</span></td>
                                    </tr>
                                    <tr id="errors-402-RequestFailed">
                                        <th class="table-row-property"><span>402 - Request Failed</span></th>
                                        <td class="table-row-definition"><span>The parameters were valid but the request failed.</span></td>
                                    </tr>
                                    <tr id="errors-403-Forbidden">
                                        <th class="table-row-property"><span>403 - Forbidden</span></th>
                                        <td class="table-row-definition"><span>The API key doesn't have permissions to perform the request.</span></td>
                                    </tr>
                                    <tr id="errors-404-NotFound">
                                        <th class="table-row-property"><span>404 - Not Found</span></th>
                                        <td class="table-row-definition"><span>The requested resource doesn't exist.</span></td>
                                    </tr>
                                    <tr id="errors-409-Conflict">
                                        <th class="table-row-property"><span>409 - Conflict</span></th>
                                        <td class="table-row-definition"><span>The request conflicts with another request (perhaps due to
                  using the same idempotent key).</span></td>
                                    </tr>
                                    <tr id="errors-429-TooManyRequests">
                                        <th class="table-row-property"><span>429 - Too Many Requests</span></th>
                                        <td class="table-row-definition"><span>Too many requests hit the API too quickly. We recommend an
                  exponential backoff of your requests.</span></td>
                                    </tr>
                                    <tr id="errors-500502503504-ServerErrors">
                                        <th class="table-row-property"><span>500, 502, 503, 504 - Server Errors</span></th>
                                        <td class="table-row-definition"><span>Something went wrong on Stripe's end. (These are rare.)</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </section>
                    </div>-->
                    <!--<div class="method-example-table">
                        <div class="method-example-table-topbar">
                            <div class="method-example-table-title">Error types</div>
                        </div>
                        <section class="table">
                            <table class="table-container">
                                <tbody>
                                    <tr id="errors-api_connection_error">
                                        <th class="table-row-property"><span>api_connection_error</span></th>
                                        <td class="table-row-definition"><span>Failure to connect to Stripe's API.</span></td>
                                    </tr>
                                    <tr id="errors-api_error">
                                        <th class="table-row-property"><span>api_error</span></th>
                                        <td class="table-row-definition"><span>API errors cover any other type of problem (e.g., a temporary
                  problem with Stripe's servers), and are extremely
                  uncommon.</span></td>
                                    </tr>
                                    <tr id="errors-authentication_error">
                                        <th class="table-row-property"><span>authentication_error</span></th>
                                        <td class="table-row-definition"><span>Failure to properly authenticate yourself in the request.</span></td>
                                    </tr>
                                    <tr id="errors-card_error">
                                        <th class="table-row-property"><span>card_error</span></th>
                                        <td class="table-row-definition"><span>Card errors are the most common type of error you should
                  expect to handle. They result when the user enters a card that
                  can't be charged for some reason.</span></td>
                                    </tr>
                                    <tr id="errors-idempotency_error">
                                        <th class="table-row-property"><span>idempotency_error</span></th>
                                        <td class="table-row-definition"><span>Idempotency errors occur when an <code>Idempotency-Key</code>
                  is re-used on a request that does not match the first request's
                  API endpoint and parameters.</span></td>
                                    </tr>
                                    <tr id="errors-invalid_request_error">
                                        <th class="table-row-property"><span>invalid_request_error</span></th>
                                        <td class="table-row-definition"><span>Invalid request errors arise when your request has invalid
                  parameters.</span></td>
                                    </tr>
                                    <tr id="errors-rate_limit_error">
                                        <th class="table-row-property"><span>rate_limit_error</span></th>
                                        <td class="table-row-definition"><span>Too many requests hit the API too quickly.</span></td>
                                    </tr>
                                    <tr id="errors-validation_error">
                                        <th class="table-row-property"><span>validation_error</span></th>
                                        <td class="table-row-definition"><span>Errors triggered by our client-side libraries when failing to
                  validate fields (e.g., when a card number or expiration date
                  is invalid or incomplete).</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </section>
                    </div>-->
                </div>
            </div>
        </div>
        <!--<section class="method" id="error_handling">
            <div class="MethodArea-divider"></div>
            <div class="method-area method-area-expanded">
                <div class="method-copy">
                    <div class="method-copy-padding">
                        <div class="MethodCopyTitle MethodCopyTitle-subsection">
                            <h1 class="MethodCopyTitle-anchor">Handling errors</h1></div>
                        <p>Our Client libraries raise exceptions for many reasons, such as a failed charge, invalid parameters, authentication errors, and network unavailability. We recommend writing code that gracefully handles all possible API exceptions.</p>
                    </div>
                </div>
                <div class="method-example"><span style="font-size: 0px;"></span></div>
            </div>
        </section>-->
    </section>
    <!--<section class="method first-of-group" id="expanding_objects">
        <div class="MethodArea-divider"></div>
        <div class="method-area method-area-expanded">
            <div class="method-copy">
                <div class="method-copy-padding">
                    <div class="MethodCopyTitle">
                        <h1 class="MethodCopyTitle-anchor">Expanding Objects</h1></div>
                    <p>Many objects contain the ID of a related object in their response properties. For example, a <code>Charge</code> may have an associated <code>Customer</code> ID. Those objects can be expanded inline with the <code>expand</code> request parameter. Objects that can be expanded are noted in this documentation. This parameter is available on all API requests, and applies to the response of that request only.</p>
                    <p>You can expand recursively by specifying nested fields after a dot (<code>.</code>). For example, requesting <code>invoice.subscription</code> on a charge will expand the <code>invoice</code> property into a full Invoice object, and will then expand the <code>subscription</code> property on that invoice into a full Subscription object.</p>
                    <p>You can use the <code>expand</code> param on any endpoint which returns expandable fields, including list, create, and update endpoints.</p>
                    <p>Expansions on list requests start with the <code>data</code> property. For example, you would expand <code>data.customers</code> on a request to list charges and associated customers. Many deep expansions on list requests can be slow.</p>
                    <p>Expansions have a maximum depth of four levels (so for example, when listing charges,<code>data.invoice.subscription.default_source</code> is the deepest allowed).</p>
                    <p>You can expand multiple objects at once by identifying multiple items in the <code>expand</code> array.</p>
                </div>
                <p class="csat-widget"><span class="csat-widget-text">Was this section helpful?</span><span class="csat-button csat-button-yes common-Button">Yes</span><span class="csat-button csat-button-no common-Button">No</span></p>
            </div>
            <div class="method-example"><span style="font-size: 0px;"></span>
                <div class="method-example-part">
                    <div class="method-example-request include-prompt">
                        <div class="method-example-request-topbar">
                            <div class="method-example-request-title">Charge with expanded customer, invoice, and subscription</div>
                            <div class="LangSwitcher">
                                <div class="Pressable Pressable--focus Pressable--layer Pressable--layer--elevated Pressable--radius Pressable--radius--all Pressable--size Pressable--size--medium Pressable--width Pressable--width--auto Select bs-SelectLegacy Box-root Flex-inlineFlex">
                                    <div class="Pressable-part Pressable-background Box-root Box-background--white"></div>
                                    <div class="Pressable-part Pressable-keylines">
                                        <div class="Pressable-part Pressable-baseKeyline"></div>
                                    </div>
                                    <div class="Pressable-part Pressable-shadows">
                                        <div class="Pressable-part Pressable-focusShadow"></div>
                                        <div class="Pressable-part Pressable-hoverShadow"></div>
                                        <div class="Pressable-part Pressable-elevatedShadow"></div>
                                        <div class="Pressable-part Pressable-baseShadow"></div>
                                    </div>
                                    <div class="Pressable-children">
                                        <select>
                                            <option disabled="" value="">Select library</option>
                                            <option value="curl">cURL</option>
                                            <option value="ruby">Ruby</option>
                                            <option value="python">Python</option>
                                            <option value="php">PHP</option>
                                            <option value="java">Java</option>
                                            <option value="node">Node.js</option>
                                            <option value="go">Go</option>
                                            <option value="dotnet">.NET</option>
                                        </select>
                                        <div class="SVGInline SVGInline--cleaned SVG Select-arrows Box-root Flex-flex">
                                            <svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Select-arrows-svg" style="width: 12px;height: 12px;" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.591 9.992a1 1 0 1 1 1.416 1.415l-4.3 4.3a1 1 0 0 1-1.414 0l-4.3-4.3A1 1 0 0 1 4.41 9.992L8 13.583zm0-3.984L8 2.417 4.409 6.008a1 1 0 1 1-1.416-1.415l4.3-4.3a1 1 0 0 1 1.414 0l4.3 4.3a1 1 0 1 1-1.416 1.415z" fill-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="MethodExampleTopbarButton">
                                <div class="MethodExampleTopbarButton-spacer"></div>
                                <div class="Box-root Flex-flex">
                                    <div class="Box-root Flex-flex">
                                        <button class="ClickToCopy">
                                            <div class="SVGInline SVGInline--cleaned SVG ClipboardIcon SVG--color Box-root Flex-flex">
                                                <svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg ClipboardIcon-svg SVG--color-svg" style="width: 16px;height: 16px;" width="20" height="20" viewBox="3 2 14 14" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M14.275 4.5h.325c.22 0 .4.18.4.4v10.2a.4.4 0 0 1-.4.4H5.4a.4.4 0 0 1-.4-.4V4.9c0-.22.18-.4.4-.4h1.485c.22 0 .4.18.4.4v1.647c0 .22.179.4.4.4h4.74a.4.4 0 0 0 .4-.4V4.9a.4.4 0 0 1 .4-.4h1.05zM11.6 3.953c.22 0 .4.18.4.4V5.6a.4.4 0 0 1-.4.4H8.4a.4.4 0 0 1-.4-.4V4.353c0-.22.18-.4.4-.4h.253a.4.4 0 0 0 .4-.4V3.4c0-.22.18-.4.4-.4h1.027c.22 0 .4.18.4.4v.153c0 .221.18.4.4.4h.32zM6.5 13c0 .268.223.5.499.5h2.702a.498.498 0 0 0 .499-.5c0-.268-.223-.5-.499-.5H6.999a.498.498 0 0 0-.499.5zm0-1.75c0 .268.222.5.496.5h5.608a.496.496 0 0 0 .496-.5c0-.268-.222-.5-.496-.5H6.996a.496.496 0 0 0-.496.5zm0-1.75c0 .268.226.5.506.5h4.688c.29 0 .506-.224.506-.5 0-.268-.226-.5-.506-.5H7.006a.497.497 0 0 0-.506.5z" fill-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="method-example-request-body">
                            <div class="CodeBlock" style="min-height: 90px; max-height: calc(100vh - 202px);">
                                <div class="CodeBlock-scroll">
                                    <div class="CodeBlock-lines">
                                        <div>1</div>
                                        <div>2</div>
                                        <div>3</div>
                                        <div>4</div>
                                        <div>5</div>
                                    </div><pre class="CodeBlock-pre  language-bash"><code class="  language-bash"><span class="token function">curl</span> https://api.stripe.com/v1/charges/ch_1FJajS2eZvKYlo2CAfkgc8Su \
  <span class="token api-key"><span class="token request-flag">-u</span> sk_test_4eC39HqLyjWDarjtT1zdp7dc</span>: \
  -d <span class="token string">"expand[]=customer"</span> \
  -d <span class="token string">"expand[]=invoice.subscription"</span> \
  -G</code></pre></div>
                            </div>
                        </div>
                    </div>
                    <div class="method-example-response">
                        <div class="method-example-response-topbar">
                            <div class="method-example-response-title">Response </div>
                        </div>
                        <div class="CodeBlock" style="min-height: 90px; max-height: calc(100vh - 361px);">
                            <div class="CodeBlock-scroll"><pre class="CodeBlock-pre  language-json"><code class="  language-json"><span class="token punctuation">{</span><span class="token json-key">
  "id"</span><span class="token punctuation">:</span> <span class="token json-string">"ch_1FJajS2eZvKYlo2CAfkgc8Su"</span><span class="token punctuation">,</span><span class="token json-key">
  "object"</span><span class="token punctuation">:</span> <span class="token json-string">"charge"</span><span class="token punctuation">,</span><span class="token json-key">
  "customer"</span><span class="token punctuation">:</span> <span class="token punctuation">{</span><span class="token json-key">
    "id"</span><span class="token punctuation">:</span> <span class="token json-string">"cu_1FJaen2eZvKYlo2Cj2FzbchR"</span><span class="token punctuation">,</span><span class="token json-key">
    "object"</span><span class="token punctuation">:</span> <span class="token json-string">"customer"</span><span class="token punctuation">,</span>
    <span class="token punctuation">.</span><span class="token punctuation">.</span><span class="token punctuation">.</span>
  <span class="token punctuation">}</span><span class="token punctuation">,</span><span class="token json-key">
  "invoice"</span><span class="token punctuation">:</span> <span class="token punctuation">{</span><span class="token json-key">
    "id"</span><span class="token punctuation">:</span> <span class="token json-string">"in_19yTU92eZvKYlo2C7uDjvu6v"</span><span class="token punctuation">,</span><span class="token json-key">
    "object"</span><span class="token punctuation">:</span> <span class="token json-string">"invoice"</span><span class="token punctuation">,</span><span class="token json-key">
    "subscription"</span><span class="token punctuation">:</span> <span class="token punctuation">{</span><span class="token json-key">
      "id"</span><span class="token punctuation">:</span> <span class="token json-string">"su_18NVZi2eZvKYlo2CvZXG1Cl5"</span><span class="token punctuation">,</span><span class="token json-key">
      "object"</span><span class="token punctuation">:</span> <span class="token json-string">"subscription"</span><span class="token punctuation">,</span>
      <span class="token punctuation">.</span><span class="token punctuation">.</span><span class="token punctuation">.</span>
    <span class="token punctuation">}</span><span class="token punctuation">,</span>
    <span class="token punctuation">.</span><span class="token punctuation">.</span><span class="token punctuation">.</span>
  <span class="token punctuation">}</span><span class="token punctuation">,</span>
  <span class="token punctuation">.</span><span class="token punctuation">.</span><span class="token punctuation">.</span>
<span class="token punctuation">}</span></code></pre></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>-->
    </div>
    </div>




  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script> 
$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideToggle("slow");
  });
});
</script>


</div>


@endsection