<?php

namespace App\View\Components;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class favorusersComponent extends Component
{
    public $favour;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        $this->favour = DB::table('registrations')
                             ->where('favour',1)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.favorusers-component');
    }
}
