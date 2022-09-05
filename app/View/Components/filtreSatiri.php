<?php

namespace App\View\Components;

use Illuminate\View\Component;

class filtreSatiri extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $baslik;
    public $icerik;
    public $kullanici;
    public $baslangicBitisTarihi;
    public function __construct($baslik='',$icerik='',$kullanici='',$baslangicBitisTarihi='')
    {
        $this->baslik=$baslik;
        $this->icerik=$icerik;
        $this->kullanici=$kullanici;
        $this->baslangicBitisTarihi=$baslangicBitisTarihi;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.filtre-satiri');
    }
}
