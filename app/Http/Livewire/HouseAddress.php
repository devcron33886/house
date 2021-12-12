<?php

namespace App\Http\Livewire;

use App\Models\Cell;
use App\Models\Sector;
use App\Models\District;
use Livewire\Component;

class HouseAddress extends Component
{
    public $districts;
    public $sectors;
    public $cities;

    public $selectedDistrict = NULL;
    public $selectedSector = NULL;
    public $selectedCell;

    public function mount()
    {
        $this->districts = District::all();
        $this->sectors = collect();
        $this->cities = collect();

    }
   
    public function render()
    {
        return view('livewire.house-address');
    }
    public function  updatedSelectedDistrict($district)
    {
        $this->sectors = Sector::where('district_id', $district)->get();
        $this->selectedSector = NULL;
    }
    public function  updatedSelectedSector($sector)
    {
        $this->cells = Cell::where('sector_id', $sector)->get();
        
    }
}
