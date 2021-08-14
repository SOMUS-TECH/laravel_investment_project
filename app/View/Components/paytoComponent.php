<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;

class paytoComponent extends Component
{
    public $payto;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        $this->payto = DB::table('matches')
                            ->where('email_g',session('email'))
                            ->where('status',0)
                            ->join('registrations','registrations.email','=','matches.email_r')
                            ->select('matches.*','registrations.fullname','registrations.bank_name','registrations.account_number','registrations.phone')
                            ->get();

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.payto-component');
    }
}
