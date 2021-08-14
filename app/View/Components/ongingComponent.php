<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
class ongingComponent extends Component
{
    public $ongoing;
   
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        
               $this->ongoing  = DB::table('deposits')
                            ->where('email',session('email'))
                            ->where('status','0')->get();


    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        return view('components.onging-component');
    }
}
