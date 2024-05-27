<?php

namespace App\View\Components;

use App\Models\Contacto;
use App\Models\Logo;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component
{
    /**
     * Create a new component instance.
     */


    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $logo = Logo::all();
        $contacto = Contacto::all();
        $numeroWsp = preg_replace('/[^\d]/', '', $contacto[0]['telefono']);

        return view('components.footer', ['logo' => $logo, 'contacto' => $contacto, 'numeroWsp' => $numeroWsp]);
    }
}
