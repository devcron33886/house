<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Cell;
use App\Models\District;
use App\Models\House;
use App\Models\Sector;
use Livewire\Component;
use Livewire\WithPagination;

class HomeComponent extends Component
{
    use withPagination;
    public $districts;
    public $sectors;
    public $cities;

    public $byCategory = NULL;
    public $perPage = 12;

    public $selectedDistrict = NULL;
    public $selectedSector = NULL;
    public $selectedCell = NULL;
    public $search;

    public function mount()
    {
        $this->districts = District::all();
        $this->sectors = collect();
        $this->cities = collect();


    }

    public function render()
    {

        return view('livewire.home-component', ['categories' => Category::all(),
            'houses' => House::with(['categories', 'media', 'created_by'])
                ->when($this->byCategory, function ($query){
                    $query->where('category_id',$this->byCategory);
                })
                ->when($this->selectedDistrict, function ($query){
                    $query->where('district_id',$this->selectedDistrict);
                })
                ->when($this->selectedSector, function ($query){
                    $query->where('sector_id',$this->selectedSector);
                })
                ->when($this->selectedCell,function ($query){
                    $query->where('cell_id',$this->selectedCell);
                })
                ->search(trim($this->search))
                ->where('house_status', 1)
                ->orderByDesc('created_at')
                ->paginate($this->perPage)

            ]);
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
