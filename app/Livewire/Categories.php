<?php

namespace App\Livewire;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Categories extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $name, $search, $image, $selected_id, $pageTitle, $componentName;
    private $pagination = 5;

    public function mount() 
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Categorias';
    }

    public function render()
    {
        $data = Category::orderBy('name','desc')->paginate($this->pagination);
        $uniqueId = rand();
        return view('livewire.category.categories',['categories' => $data, 'uniqueId' => $uniqueId])
                ->extends('layouts.theme.app')
                ->section('content');
    }

    public function paginationView() {
        return 'vendor.livewire.bootstrap';
    }

    public function Edit($id)
    {
        $record = Category::find($id, ['id','name','image']);
		$this->name = $record->name;
		$this->selected_id = $record->id;
		$this->image = null;

		$this->emit('show-modal', 'show modal!');
    }

    public function Store() 
    {
        $rules = [
            "name" => "required|unique:categories|min:3"
        ];
        $message = [
            'name:required' => 'Nombre de la categoria es requerido',
            'name:unique' => 'Ya existe la categoria',
            'name:min' => 'El nombre de la categoria debe tener al menos 3 caracteres'
        ];

        $this->validate($rules,$message);
        $category = Category::create([
            'name' => $this->name
        ]);

        $customFileName="";
        
        if($this->image)
        {
            $customFileName = uniqid().'_.'.$this->image->extension();
            $this->image->storeAs('public/categories',$customFileName);
            $category->image = $customFileName;
            $category->save();
        }
        
        $this->resetUI();
        $this->emit('category-added',"Categoria creada");

    }

    public function Update(){
        $rules = [
            "name" => "required|min:3|unique:categories,name,{$this->selected_id}",
        ];

        $message = [
            "name:required" => "El nombre de la categoria es requerido",
            "name:min" => "La categoria debe tener al menos 3 caracteres",
            "name:unique" => "Ta existe la categoria"
        ];

        $this->validate($rules,$message);
        $category = Category::find($this->selected_id);
        $category->update([
            "name" => $this->name
        ]);

        if($this->image)
        {
            $customFileName = uniqid().'_.'.$this->image->extension();
            $this->image->storeAs('public/categories',$customFileName);
            $imageName = $category->image;

            $category->image = $customFileName;
            $category->save();

            if($imageName != null)
            {
                if (file_exists("storage/categories".$imageName)) {
                    unlink("storage/categories".$imageName);
                }
            }
        }

        $this->resetUI();
        $this->emit("category-updated","Categoria actualizada");
    }

    public function resetUI()
    {
        $this->name = '';
        $this->image = null;
        $this->selected_id = 0;
    }

    protected $listeners = [
        'deleteRow' => 'Destroy'
    ];

    public function Destroy(Category $category)
    {
        // dd($category);
        $imageName = $category->image;
        $category->delete();

        if ($imageName != null) 
        {
            if (file_exists('storage/categories'.$imageName)) 
            {
                unlink('storage/categories'.$imageName);
            }
        }

        $this->resetUI();
        $this->emit("category-deleted","Categoria Eliminada");
    }
}
