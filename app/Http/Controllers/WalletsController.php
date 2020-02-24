<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gateway;
use App\bank_account;
use App\Wallet;
use App\WalletsLog;
use App\BankLog;
use App\User;
use Auth;

class WalletsController extends Controller
{
    public function index(){
        $bank = bank_account::where('user_id',Auth::user()->id)->get();
        $voucher = Wallet::where('user_id',Auth::user()->id)->get();
        $totalBank = count($bank);
        $totalVou = count($voucher);
        return view('admin.wallets.index' , compact('bank','voucher','totalBank' ,'totalVou'));
        // dd("hello");
    }
    
    public function addBank(Request $req){
        $image= $req->bankLogo;
        if($image){
            $imageName = $image->getClientOriginalName();
           // dd($imageName);
            $destinationPath = public_path('images/bank_logo/');
            $image->move($destinationPath, $imageName); 
        }else $imageName = '';
        
        if(Auth::user()->role_id == 1){
            $id=$req->name;
            $n = user::where('id',$req->name)->first();
            $name= $n['fname'];
        }
        else{
        $id=Auth::user()->id;
        $name=$req->name;
        }
       $bank_account = bank_account::where('id',$req->id)->update([
            'user_id' => $id,
            'name' => $name,
            'account' => $req->account,
            'routing'=> $req->routing,
            'address'=> $req->address,
            'city'=> $req->city,
            'state'=> $req->state,
            'zip'=> $req->zip,
            'picture'=>$imageName,
            'amount_percent'=>$req->bank_percent,
            ]);
            
        return redirect()->back()->with('message','Bank Account Inserted Successfully');
    }
    
    public function deleteBank(Request $req){
        
        $bank_account = bank_account::where('id',$req->id)->delete();
        return redirect()->back()->with('message','Bank Account Deleted Successfully');
    }
    
     public function addVoucher(Request $req){
        
        $voucher = Wallet::insert([
            'name' => $req->name,
            'voucher_nbr' => $req->voucher,
            'value'=> $req->amount,
            ]);
            
        return redirect()->back()->with('message','Reward Card Created Successfully');
    }
    
    public function accountEditPage(Request $req){
        $bank_account = bank_account::where('id',$req->id)->first();
        $voucher = Wallet::all();
        return view('admin.wallets.account-edit' ,compact('bank_account','voucher'));
    }
    
    public function amountTransferPage(Request $req){
        $bank_account = bank_account::where('id',$req->id)->first();
        $accounts = bank_account::where('id','!=',$req->id)->get();
        $voucher = Wallet::all();
        return view('admin.wallets.amount-transfer' ,compact('bank_account','voucher','accounts'));
    }
    
    public function accountEdit(Request $req){
        $old_pic = bank_account::where('id',$req->id)->select('picture')->first();
        $image= $req->bankLogo;
        if($image){
            $imageName = $image->getClientOriginalName();
           // dd($imageName);
            $destinationPath = public_path('images/bank_logo/');
            $image->move($destinationPath, $imageName); 
        }else $imageName = $old_pic['picture'];
        
        if(Auth::user()->role_id == 1)
        $id=Auth::user()->id;
        else $id=$req->name;
        
       $bank_account = bank_account::where('id',$req->id)->update([
            'user_id' => $id,
            'name' => $req->name,
            'account' => $req->account,
            'routing'=> $req->routing,
            'address'=> $req->address,
            'city'=> $req->city,
            'state'=> $req->state,
            'zip'=> $req->zip,
            'picture'=>$imageName,
            'amount_percent'=>$req->bank_percent,
            ]);
            
        return redirect('Wallets')->with('message','Bank Account Updated Successfully');
    }
    
    public function voucherTransfer(Request $req){
            $voucher = WalletsLog::insert([
                'amount' => $req->amount,
                'bank_name' => $req->bankName,
                'wallet_id' => $req->voucher,
                'date' => date('d-m-y'),
                ]);
                
        return redirect('Wallets')->with('message','Amount Transfered Successfully');
    }
    
    public function bankTransfer(Request $req){
        // dd($req->all());
            $voucher = BankLog::insert([
                'amount' => $req->amount,
                'amount_sender_id' => $req->account,
                'amount_reciever_id' => $req->bankId,
                'transfer_type' => 1,
                ]);
                
        return redirect('Wallets')->with('message','Amount Transfered Successfully');
    }
    
    public function getTransactionHistory(Request $req){
        //Recieved variable flag 2 for transfer ajax call flag 1 for delete ajax call 0 for view ajax call
         $voucher = WalletsLog::where('wallet_id',$req->id)->get();
            $countVariable = count($voucher);
                if($req->flag == 2){
                    if($countVariable !=0){
                        //transfer code here
                        dd("hello");
                    }
                 else // else code here ,no amount 
                  return response()->json(['data'=> 'success']);
                }  
                elseif($req->flag == 1 && $countVariable == 0){
                  WalletsLog::where('wallet_id',$req->id)->delete();  
                  Wallet::where('id',$req->id)->delete();  
                  return response()->json(['data'=> 'success']);
                }else{
                  $sum = WalletsLog::where('wallet_id',$req->id)->sum('amount');
                  return response()->json(['data'=> $voucher , 'value' => $sum]);  
                }
        
    }
    
    public function getTransferInformation(Request $req){
         $voucher = Wallet::where('id',$req->id)->get();
         $allVoucher = Wallet::where('id', '!=', $req->id)->get();
         $sum = WalletsLog::where('wallet_id',$req->id)->sum('amount');
         return response()->json(['myVoucher'=> $voucher , 'allVoucher' => $allVoucher , 'sum' => $sum]);  
    }
    
    public function getUserInformation(Request $req){
         $user = User::all();
         return response()->json(['user'=> $user]);  
    }
    
     public function walletAmountTransfered(Request $req){
        $sum = WalletsLog::where('wallet_id',$req->oldWallet)->sum('amount');
        $allAmount = WalletsLog::insert([
            'amount' => $sum,
            'wallet_id' => $req->newWallet,
            'bank_name' => 'W2W Transfer',
            'date' => date('d-m-y'),
            ]);
        WalletsLog::where('wallet_id',$req->oldWallet)->delete();
        return redirect()->back()->with('message','Amount Transferred Successfully'); 
        
    }
    
     public function saveWalletPercentage(Request $req){
        
         for($i=0; $i<count($req->bankPercent); $i++){
             bank_account::where('id',$req->bankId[$i])->update(['amount_percent'=>$req->bankPercent[$i]]);
         }
         
         for($i=0; $i<count($req->voucherPercent); $i++){
             Wallet::where('id',$req->voucherid[$i])->update(['value'=>$req->voucherPercent[$i]]);
         }
        
        return response()->json(['data'=> 'success']);
    }
    
    
}
