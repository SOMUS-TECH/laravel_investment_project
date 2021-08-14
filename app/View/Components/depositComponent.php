<?php

namespace App\View\Components;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;
use Carbon\Carbon;

class depositComponent extends Component
{
    public $due_deposit;
    public $level;
    public $list;
    public $date1;
    public $date2;
    public $date3;
    public $date4;
    public  $sql;
    public  $sql2;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        $this->date1 = Carbon::now()->addDays(3);
        $this->date2 = strtotime($this->date1);
        $this->date3 = Carbon::now()->addDays(7);
        $this->date4 = strtotime($this->date3);
        $this->level = DB::table('investmentcounts')->get();
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        try{

            foreach( $this->level as $lev){
                $this->sql = DB::table('deposits')
                                ->where('email',$lev->email)->get();
               foreach($this->sql as $due){
                   if(($lev->invest_no == 1 and $this->date2 >= $due->end_date and $due->end_date != 0) or ($lev->invest_no > 1 and $this->date4 >= $due->end_date and $due->end_date != 0) and ($due->amount_to_recieve != 0) ){
                   
                        $this->sql2 = DB::table('deposits')
                                        ->where('email',$lev->email)
                                        ->where('id','!=',$due->id)
                                        ->where('matched','!=', 1)->get();
                        if(!$this->sql2->isEmpty()){
                            $this->list[] = $due;
                        }
                    
                   }
               }
            }
            return view('components.deposit-component');
        }catch(\Exception $exp){
      
            return $exp->getMessage();
    
          }
        
    }
}
