<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FungsiForm extends Component
{
    /**
     * Create a new component instance.
     */

    public $fungsi;
    public $deskripsi;

    public function __construct($fungsi, $deskripsi)
    {
        $this->fungsi = $fungsi;
        $this->deskripsi = $deskripsi;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.fungsi-form');
    }
}
