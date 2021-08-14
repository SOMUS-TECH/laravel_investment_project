<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;

class returnsComponent extends Component
{
    public $returns;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        $this->returns = DB::table('matches')
        ->where('email_r',session('email'))
        ->where('status',0)
        ->join('registrations','registrations.email','=','matches.email_g')
        ->select('matches.*','registrations.fullname','registrations.phone')
        ->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.returns-component');
    }
}
