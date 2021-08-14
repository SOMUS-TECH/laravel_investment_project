<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use Illuminate\Support\Facades\DB;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash as FacadesHash;

class RegistrationController extends Controller
{
  public  function registration(Request $req){


              $req->validate(
                [
                    'fullname'=> 'required|max:20',
                    'email'=> 'required|email|unique:registrations,email',
                    'address'=> 'required',
                    'dob' => 'required',
                    'bank_name' => 'required',
                    'account_number' => 'required',
                    'phone' => 'required|min:11',
                    'password' => 'required|confirmed|string|min:8'

                ],[
                  'fullname.require'=> 'fullname is required',
                  'fullname.max' => 'maximum character is 20',
                  'email.require'=> 'email is required',
                  'email.email'=> 'Must be email',
                  'email.unique'=> 'User already exits',
                  'email.require'=> 'fullname is required',
                  'address.require'=> 'address is required',
                  'dob.require'=> 'Date of Birth is required',
                  'bank_name.require'=> 'Bank Name is required',
                  'account_number.require'=> 'Account Number is required',
                  'phone.require'=> 'Phone Number is required',
                  'password.require'=> 'password is required',
                  'password.string'=> 'Password Must be String',
                  'password.confirmed'=> 'Password inconsistency',
                  'password.min'=> 'password character must be at least 8'
                ]
                );
            
            try{

                  
                  $register = new Registration;
            
                  $register->fullname = $req->fullname;
                  $register->email = $req->email;
                  $register->gender = $req->gender;
                  $register->address = $req->address;
                  $register->dob = $req->dob;
                  $register->bank_name = $req->bank_name;
                  $register->phone = $req->phone;
                  $register->account_number = $req->account_number;
                  $register->password = Hash::make($req->password);
                  $register->save();

                  $data = $req->input('fullname');
                  $req->session()->flash('registration',$data);

                  
                  return redirect('/registration');

                  
            }
            catch(\Exception $exp){
              return $exp->getMessage();
            }
          
        
  }


          public function validatePayto()
          {
              $rec = DB::table('matches')->where('email_g',session('email'))
                                          ->where('end_date', "<" ,strtotime(date("Y-M-d")))
                                          ->where('status',0)->get();
                    
                  foreach($rec as $record ){
                      $depo_r = DB::table('deposits')->where('reff',$record->reff_r)->get();

                      $depo_g = DB::table('deposits')->where('reff',$record->reff_g)->get();

                      $reg = DB::table('registrations')->where('email',$record->email_g)
                                                            ->update(['activate'=> 2]);
                        foreach($depo_r as $d){
                          
                              $updateDepo = DB::table('deposits')->where('reff',$record->reff_r)
                                                              ->update(['amount_to_recieve'=> $d->amount_to_recieve+$record->amount_r]);
                              if($d->amount_to_recieve == 0){
                                $updateDepo2 = DB::table('deposits')->where('reff',$record->reff_r)
                                                      ->update(['matched'=> 0, 'status'=>0]);
                              }
                  
                        }

                        foreach($depo_g as $g){
                          
                          $updateDepo = DB::table('deposits')->where('reff',$record->reff_g)
                                                          ->update(['balance'=> $g->balance+$record->amount_g,'matched'=> 0, 'status'=>0]);
                          
                        }

                        $del = DB::table('matches')->where('id',$record->id)
                                                          ->delete();
                            return $del;
                      
                      
                  }

                  
          }


          public function adminvalidatePayto()
          {
              $rec = DB::table('matches')->where('end_date', "<" ,strtotime(date("Y-M-d")))
                                          ->where('status',0)->get();
                    
                  foreach($rec as $record ){
                      $depo_r = DB::table('deposits')->where('reff',$record->reff_r)->get();

                      $depo_g = DB::table('deposits')->where('reff',$record->reff_g)->get();

                      $reg = DB::table('registrations')->where('email',$record->email_g)
                                                            ->update(['activate'=> 2]);
                        foreach($depo_r as $d){
                          
                              $updateDepo = DB::table('deposits')->where('reff',$record->reff_r)
                                                              ->update(['amount_to_recieve'=> $d->amount_to_recieve+$record->amount_r]);
                              if($d->amount_to_recieve == 0){
                                $updateDepo2 = DB::table('deposits')->where('reff',$record->reff_r)
                                                      ->update(['matched'=> 0, 'status'=>0]);
                              }
                  
                        }

                        foreach($depo_g as $g){
                          
                          $updateDepo = DB::table('deposits')->where('reff',$record->reff_g)
                                                          ->update(['balance'=> $g->balance+$record->amount_g,'matched'=> 0, 'status'=>0]);
                          
                        }

                        $del = DB::table('matches')->where('id',$record->id)
                                                          ->delete();
                            return $del;
                      
                      
                  }

                  
          }




  public function admin(Request $req){

          $req->validate(
            [
                'username'=> 'required',
                'password' => 'required|min:4'

            ]
            );

            try{
              $invest_update = $this->adminvalidatePayto();
              $admin = DB::table('tbladmin')->where('username',$req->username)->first();
              if(!$admin){
                $req->session()->flash('login_username_error','Wrong username');
                return view('/admin');
              }      
              
              if(!Hash::check($req->password,$admin->password)){
                $req->session()->flash('login_Pass_error','Wrong Password Encounterd');
                return view('/admin');
              }
              
              if(Hash::check($req->password,$admin->password)){
                $userDetails = DB::table('tbladmin')->where('username',$req->username)->get();
                  foreach($userDetails as $ad){
                    $req->session()->put('username',$ad->username);
                    $req->session()->put('password',$ad->password);
                    $req->session()->put('userdetails',$userDetails);
                  }
                  
                  return view('/admin_dash');
                
              }
            }
            catch(\Exception $exp){
              return $exp->getMessage();
            }

  }



  public function login(Request $req){

    $req->validate(
      [
          'email'=> 'required|email',
          'password' => 'required|min:8'

      ]
      );

      
      try{
     
      $invest_update = $this->validatePayto();
      $user = Registration::where('email','=',$req->email)->first();
      if(!$user){
        $req->session()->flash('login_Email_error','Wrong Email Address');
        return view('/login');
      }
      if(!Hash::check($req->password,$user->password)){
        $req->session()->flash('login_Pass_error','Wrong Password Encounterd');
        return view('/login');
      }
      
      if(Hash::check($req->password,$user->password)){
       $userDetails =Registration::where('email','=',$req->email)->get();
        foreach($userDetails as $feild){

          if($feild->activate == 1){
            $req->session()->put('email',$user->email);
            $req->session()->put('pass',$user->password);
            $req->session()->put('userdetails',$userDetails);

            return view('/user_dash');
           }

           if($feild->activate == 0){
            return view('/ban',['status'=> $feild->activate, 'message'=> 'Your account is inactive You have to Pay 1000 Naira Activation fee' ]);
           }

           if($feild->activate == 2){
            return view('/ban',['status'=> $feild->activate, 'message'=> 'You have been baned for not making your payment before the deadline' ]);
           }

        }

      }


      }
      catch(\Exception $exp){
        return $exp->getMessage();
      }
  }

  public function profile(Request $req){
    try{
    $req->validate(
      [
          'bank_name'=> 'required',
          'account_number' => 'required|min:10||max:10',
          'fullname' => 'required',
          'password' => 'required|confirmed',

      ],
      );

      

        $profile_updatter = DB::table('registrations')
                                ->where('email', $req->session()->get('email'))
                                ->update(['bank_name' => $req->bank_name,'account_number'=> $req->account_number,'fullname' => $req->fullname, 'password'=> Hash::make($req->password)]);

                                return $profile_updatter;
      }
      catch(\Exception $exp){
        return $exp->getMessage();
      }

    

  }

  public function addtofavour(Request $req){

    if($req->t == 1){
      $update =  DB::table('registrations')
                                ->where('id', $req->d)
                                ->update(['favour'=> 1]);
    return $update;
    }else{
      $update =  DB::table('registrations')
                                ->where('id', $req->d)
                                ->update(['favour'=> 0]);
    return $update;
    }
    

  }


  public function del(Request $req){
    $del = DB::table('registrations')->where('id',$req->d)
                              ->delete();
                          return $del;

  }

  public function admin_profile(Request $req){
    try{
    $req->validate(
      [
          
          'fullname' => 'required',
          'phone' => 'required',
          'password' => 'required|confirmed',

      ]
      );

      

        $profile_updatter = DB::table('tbladmin')
                                ->where('username', $req->session()->get('username'))
                                ->update(['fullname' => $req->fullname,'phone' => $req->phone, 'password'=> Hash::make($req->password)]);
                                return $profile_updatter;
      }
      catch(\Exception $exp){
        return $exp->getMessage();
      }

    

  }


  public function awaitingMatches(Request $req){
      $display = "";
      $list = DB::table("deposits")->where('start_date',0)
                                  ->where('end_date',0)
                                  ->where('balance','!=',0)->get();
      foreach($list as $l){

        $display .= '<option value="'.$l->id.'">'.$l->email.' Balance is '.$l->balance.'</option>';
    
      }
      return $display;
  }


  public function logout(Request $req){
       $req->session()->flush();
       return redirect('/');
  }


  public function unban(Request $req){
    $update = DB::table('registrations')
                    ->where('id',$req->d)
                    ->update(['activate'=> 1]);

    return $update;
  }

  public function test(Request $req){
    $update = DB::table('registrations')
                    ->where('id',$req->d)
                    ->update(['test'=> 1]);

    return $update;
  }

public function activation(Request $req){
  $act = DB::table('activationfees')->get();

        foreach($act as $a){
          return $a->fullname;
        }
  
}

  public function activationfee(Request $req){

    $req->validate(
      [
          'fullname'=> 'required',
          'bank_name' => 'required',
          'account_number'=> 'required'

      ]
      );
      $update = DB::table('activationfees')
      ->where('id',1)
      ->update(['fullname'=> $req->fullname,'bank_name'=> $req->bank_name,'account_number'=> $req->account_number]);

      return view('/activationfee');
    
  }


  public function actreceiver(Request $req){
    $display = '';
    $act = DB::table('activationfees')->get();
  
          foreach($act as $a){
            $display .= '<a class="title" href="#">'.$a->fullname.'</a>
                              <p><strong>Acct. No </strong> '.$a->account_number.' </p>
                              <p> <strong>Bank </strong> <small>'.$a->bank_name.'</small>
                              </p>';
            
          }
          return $display;
  }


  public function countuser(Request $req){
   
    $countuser = DB::table('registrations')->count();     
          return $countuser;
  }

  public function countban(Request $req){
   
    $countban = DB::table('registrations')
                    ->where('activate','!=',1)->count();     
          return $countban;
  }


  public function countpen(Request $req){
   
    $countpen = DB::table('deposits')
                    ->where('end_date','=',0)
                    ->where('start_date','=',0)
                    ->where('matched','!=',1)->count();     
          return $countpen;
  }


  

  public function ucountuser(Request $req){
   
    $ucountuser = DB::table('deposits')
                    ->where('email',session('email'))->count();     
    return $ucountuser;
  }

  public function ucountban(Request $req){
   
    $countban = DB::table('matches')
                    ->where('email_g',session('email'))
                    ->where('status','!=',1)->count();     
          return $countban;
  }


  public function ucountpen(Request $req){
   
    $countpen = DB::table('deposits')
                    ->where('email',session('email'))
                    ->where('end_date','=',0)
                    ->where('start_date','=',0)->count();     
          return $countpen;
  }




  // public function Account_verification(Request $req){

  //             $curl = curl_init();
            
  //           curl_setopt_array($curl, array(
  //             CURLOPT_URL => "https://api.paystack.co/bank/resolve?account_number=2151014468&bank_code=033",
  //             CURLOPT_RETURNTRANSFER => true,
  //             CURLOPT_ENCODING => "",
  //             CURLOPT_MAXREDIRS => 10,
  //             CURLOPT_TIMEOUT => 30,
  //             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  //             CURLOPT_CUSTOMREQUEST => "GET",
  //             CURLOPT_HTTPHEADER => array(
  //               "Authorization: pk_live_9151c419ef7346add7adae52f8a15cd921cefbd9",
  //               "Cache-Control: no-cache",
  //             ),
  //           ));
            
  //           $response = curl_exec($curl);
  //           $err = curl_error($curl);
            
  //           curl_close($curl);
            
  //           if ($err) {
  //             echo "cURL Error #:" . $err;
  //           } else {
  //             echo $response;
  //           }
            
  // }

}
