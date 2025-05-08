<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;

class ServiceComponent extends Component
{
    public $titre;
    public $serviceId;
    public $editing = false;

  
    public function save(){
       // validate the input
        $this->validate([
            'titre' => 'required|string|max:255',
        ]);
        // Save the service to the database
        try {
           Service::create([
                'libelle' =>  $this->titre,
            ]);

            $this->titre = ''; 
            
            session()->flash('message', 'Service saved successfully!');

        } catch (\Throwable $th) {
           dd($th);
        }
       
    }

    public function destroy($id){
       $service = Service::find($id); 
       $service->delete();
       session()->flash('message', 'Service deleted successfully!');
    }

    public function edit($id){
        $serv = Service::findOrFail($id);
        $this->titre = $serv->libelle;
        $this->serviceId = $id;
        $this->editing = true;
    }

    public function update(){
        $this->validate([
            'titre' => 'required|string|max:255',
        ]);
        try {
            Service::find($this->serviceId)->update([
                'libelle' =>  $this->titre,
            ]);
            $this->titre = '';
            $this->editing = false;
            $this->serviceId = null;
            session()->flash('message', 'Service updated successfully!');
        } catch (\Throwable $th) {
           dd($th);
        }
        
       
    }
    public function render()
    {
        return view('livewire.service-component',[
            'services' => Service::orderBy('id', 'desc')
                                    ->paginate(10),
        ]);
    }
}
