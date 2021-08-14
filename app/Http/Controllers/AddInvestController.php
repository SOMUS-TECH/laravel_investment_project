<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\deposit;
use Ramsey\Uuid\Generator\RandomLibAdapter;


class AddInvestController extends Controller
{



    public function RandomString()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < 10; $i++) {
            $randstring .= $characters[rand(4, strlen($characters))];

        }
        return $randstring;
    }

    public function investmentlevel()
    {
        $level = DB::table('investmentcounts')->where('email',session('email'))->get();
        return $level;
    }


    public function confirm_r(Request $req)
    {
        $update =  DB::table('matches')
                                ->where('id',$req->d)
                                ->update(['status'=> 1]);

        return $update;
        
    }


    public function addInvestment(Request $req) {

        if(empty($req->amount_deposit)){

            return "Please Put the Amount to Invest";
        }else{


            try{
                foreach(session('userdetails') as $Session_field){
                    $test = $Session_field->test;
                }
                $levels = $this->investmentlevel();
                $MaxAmt = deposit:: where('email',session('email'))->max('amount_deposit');

                if($levels->isEmpty()){
                        $depo = new deposit;
                        $depo->email = session('email');
                        $depo->amount_deposit = $req->amount_deposit;
                        $depo->balance = $req->amount_deposit;
                        $depo->amount_to_recieve = (50/100) * $req->amount_deposit + $req->amount_deposit;
                        $depo->date = strtotime(date("Y-M-d"));
                        $depo->reff = $this->RandomString();
                        $depo->save();
     
                        DB::table('investmentcounts')->insert([
                             'email'=>session('email'),
                             'invest_no'=> 1
                        ]);
                        return "Request Submitted Successfully";
     
                }else{
                    foreach($levels as $field){
                        $invest_no = $field->invest_no;
                        $level = $field->level;
                        
                    }
                }
                if($invest_no > 2 and $level == 1 and $test == 0){
                    return 'this is your 4th investment you need to Make a testimony About Our plateform';
                }
                elseif($invest_no > 4 and $level == 2 and $req->amount_deposit < $MaxAmt*2){
                    return 'You need to double your investment plan';
                }else{

                    if($req->amount_deposit < $MaxAmt){
                        return "you can't deposit Less than Your last Investment";
                    }else{
                        $depo = new deposit;
                        $depo->email = session('email');
                        $depo->amount_deposit = $req->amount_deposit;
                        $depo->balance = $req->amount_deposit;
                        $depo->amount_to_recieve = (50/100) * $req->amount_deposit + $req->amount_deposit;
                        $depo->date = strtotime(date("Y-M-d"));
                        $depo->reff = $this->RandomString();
                        $depo->save();
                        if($invest_no ==3 and $level==1){
                          $update =  DB::table('investmentcounts')
                                ->where('email',session('email'))
                                ->update(['invest_no'=> 4, 'level'=>2]);
                        }elseif($invest_no ==5 and $level==2){
                            $update =  DB::table('investmentcounts')
                                ->where('email',session('email'))
                                ->update(['invest_no'=> 0]);
                        }else{
                            $update =  DB::table('investmentcounts')
                                ->where('email',session('email'))
                                ->update(['invest_no'=> $invest_no+1]);
                        }
                        return "Request Submitted Successfully";
                    
                }
                    
               }
                
            }catch(\Exception $exp){
      
              return $exp->getMessage();
      
            }


        }

    }

    public function match(Request $req){

    try{

        if($req->favour_id == 0){
            $receiver = DB::table('deposits')
                        ->where('id',$req->receiver_id)
                        ->get();

        $giver = DB::table('deposits')
                        ->where('id',$req->giver_id)
                        ->get();
        }

        if($req->favour_id == 1){
            $receiver = DB::table('registrations')
                           ->where('id',$req->receiver_id)
                           ->get();

        $giver = DB::table('deposits')
                        ->where('id',$req->giver_id)
                        ->get();
        }
        

        foreach($receiver as $rec){
            $checkfavour = DB::table('registrations')
                            ->where('email',$rec->email)
                            ->get();
            foreach($checkfavour as $user){
                if($user->favour == 1){
                    foreach($giver as $give){
                        if($req->amount > $give->balance){
                            return "Amount Excess";
                        }
                        $insert = DB::table('matches')->insert([
                            'email_g'=> $give->email,
                            'email_r'=> $user->email,
                            'reff_g'=> $give->reff,
                            'reff_r'=> 'favour',
                            'amount_g'=> $req->amount,
                            'amount_r'=> $req->amount,
                            'balance_g'=> $give->balance - $req->amount,
                            'balance_r'=> 0,
                            'date'=> strtotime(date("Y-m-d")),
                            'start_date'=> strtotime(date("Y-m-d")),
                            'end_date'=> strtotime('+1 day', strtotime(date("Y-m-d"))),
                            'status'=> 0
                        ]);
                        if($give->balance - $req->amount <= 0){
                            $level = DB::table('investmentcounts')
                                            ->where('email',$give->email)->get();
                            foreach($level as $lev){
                                if($lev->invest_no == 1 and $lev->level == 1){
                                    $enddate = strtotime('+3 days', strtotime(date("Y-m-d")));
                                }else{
                                    $enddate = strtotime('+7 days', strtotime(date("Y-m-d")));
                                }
                                $update =  DB::table('deposits')
                                        ->where('id',$req->giver_id)
                                        ->update(['balance'=> 0, 'start_date'=> strtotime(date("Y-m-d")),'end_date'=> $enddate,'matched'=>1]);
                            }
                            
                            
                        }

                        if($give->balance - $req->amount != 0){
                            $update =  DB::table('deposits')
                                        ->where('id',$req->giver_id)
                                        ->update(['balance'=> $give->balance - $req->amount]);
                        }

                    }
                }else{

                    foreach($giver as $give){
                        if($req->amount > $give->balance){
                            return "Amount Excess";
                        }
                        $insert = DB::table('matches')->insert([
                            'email_g'=> $give->email,
                            'email_r'=> $rec->email,
                            'reff_g'=> $give->reff,
                            'reff_r'=> $rec->reff,
                            'amount_g'=> $req->amount,
                            'amount_r'=> $req->amount,
                            'balance_g'=> $give->balance - $req->amount,
                            'balance_r'=> $rec->amount_to_recieve - $req->amount,
                            'date'=> strtotime(date("Y-m-d")),
                            'start_date'=> strtotime(date("Y-m-d")),
                            'end_date'=> strtotime('+1 day', strtotime(date("Y-m-d"))),
                            'status'=> 0
                        ]);
                        if($give->balance - $req->amount <= 0){
                            $level = DB::table('investmentcounts')
                                            ->where('email',$give->email)->get();
                            foreach($level as $lev){
                                if($lev->invest_no == 1 and $lev->level == 1){
                                    $enddate = strtotime('+3 days', strtotime(date("Y-m-d")));
                                }else{
                                    $enddate = strtotime('+7 days', strtotime(date("Y-m-d")));
                                }
                                $update =  DB::table('deposits')
                                        ->where('id',$req->giver_id)
                                        ->update(['balance'=> 0, 'start_date'=> strtotime(date("Y-m-d")),'end_date'=> $enddate,'matched'=>1]);
                            }
                            
                        }

                        if($give->balance - $req->amount != 0){
                            $update =  DB::table('deposits')
                                        ->where('id',$req->giver_id)
                                        ->update(['balance'=> $give->balance - $req->amount]);
                        }


                        if($rec->amount_to_recieve - $req->amount <= 0){

                                $update =  DB::table('deposits')
                                        ->where('id',$req->receiver_id)
                                        ->update(['amount_to_recieve'=> 0,'matched'=>1,'status'=>1]);
                            
                        }

                        if($give->amount_to_recieve - $req->amount != 0){
                            $update =  DB::table('deposits')
                                        ->where('id',$req->receiver_id)
                                        ->update(['amount_to_recieve'=> $rec->amount_to_recieve - $req->amount]);
                        }

                    }

                }
            }
        }

        return $update;

        }catch(\Exception $exp){
        
            return $exp->getMessage();
        
        }


        
        
        
    }
}
