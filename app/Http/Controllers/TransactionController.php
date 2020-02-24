<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
class TransactionController extends Controller
{
    public function transaction(Request $req){
        
        dd($req->all());
         $data = array(
           'name' => "nauman",
            );

           Mail::send('mail.mail', $data, function ($message) {

           $message->from('noreply@email.com', 'Payclone');

           $message->to('nauman@dev505.com')->subject('Confirmation Email');

           });  
           
           dd("mail sent successful");
    }
}
