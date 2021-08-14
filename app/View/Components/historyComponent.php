<?php

namespace App\View\Components;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class historyComponent extends Component
{
    public $history;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->history  = DB::table('deposits')
            ->where('email',session('email'))
            ->where('status','1')->get();

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.history-component');
    }
}
