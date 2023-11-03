<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Products extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $pageTitle, $selected_id, $componentName, $name, $barcode, $cost, $price, $stock, $image, $alert, $categoryid;
    private $pagination = 5;

    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Productos';
        $this->categoryid = "Elegir";
    }

    public function render()
    {
        $data = Product::orderBy('name','desc')->paginate($this->pagination);
        $categories = Category::orderBy('name','desc')->get();
        $uniqueId = rand();
        return view('livewire.product.products',['products' => $data, 'categories' => $categories, 'uniqueId' => $uniqueId])
            ->extends('layouts.theme.app')
            ->section('content');
    }

    public function paginationViews()
    {
        return 'vendor.livewire.bootstrap';    
    }

    public function Edit($id)
    {
        $record = Product::find($id, ['id','name','stock','price','cost','alert','barcode','category_id','image']);
        $this->selected_id = $record->id;
        $this->name = $record->name;
        $this->barcode = $record->barcode;
        $this->cost = $record->cost;
        $this->price = $record->price;
        $this->stock = $record->stock;
        $this->image = null;
        $this->alert = $record->alert;
        $this->categoryid = $record->category_id;

        $this->emit('show-modal', 'show modal!!');
    }

    public function Store() 
    {
        $rules = [
            "name" => "required|unique:products|min:3",
            "price" => "required",
            "cost" => "required",
            "stock" => "required",
            "alert" => "required",
            "categoryid" => "required|not_in:Elegir"
        ];

        $message = [
            "name:required" => "El nombre del producto es requerido",
            "name:min" => "El nombre debe tener al menos 3 caracteres",
            "name:unique" => "Ya existe el producto",
            "stock:required" => "El stock es requerido",
            "price:required" => "El precio es requerido",
            "cost:required" => "El costo es requerido",
            "cost:required" => "El costo es requerido",
            "alert:required" => "La alerta de stock es requerida",
            "category_id:required" => "La categoria es requerida",
            "categoryid:not_in" => "Debes seleccionar una categoria",
        ];

        $this->validate($rules,$message);
        $product = Product::create([
            "name" => $this->name,
            "barcode" => $this->barcode,
            "cost" => $this->cost,
            "price" => $this->price,
            "stock" => $this->stock,
            "category_id" => $this->categoryid,
            "alert" => $this->alert
        ]);

        $customeFileImage = "";

        if($this->image)
        {
            $customeFileImage = uniqid().'_.'.$this->image->extension();
            $this->image->storeAs('public/products', $customeFileImage);
            $product->image = $customeFileImage;
            $product->save();
        }

        $this->resetUI();
        $this->emit('product-added','Producto creado');
    }

    public function Update()
    {
        $rules = [
            "name" => "required|min:3|unique:products,name,{$this->selected_id}",
            "price" => "required",
            "cost" => "required",
            "stock" => "required",
            "alert" => "required",
            "categoryid" => "required|not_in:Elegir"
        ];

        $message = [
            "name:required" => "El nombre del producto es requerido",
            "name:min" => "El nombre debe tener al menos 3 caracteres",
            "name:unique" => "Ya existe el producto",
            "stock:required" => "El stock es requerido",
            "price:required" => "El precio es requerido",
            "cost:required" => "El costo es requerido",
            "cost:required" => "El costo es requerido",
            "alert:required" => "La alerta de stock es requerida",
            "category_id:required" => "La categoria es requerida",
            "categoryid:not_in" => "Debes seleccionar una categoria",
        ];

        $this->validate($rules,$message);

        $product = Product::find($this->selected_id);
        $product->update([
            "name" => $this->name,
            "barcode" => $this->barcode,
            "cost" => $this->cost,
            "price" => $this->price,
            "stock" => $this->stock,
            "category_id" => $this->categoryid,
            "alert" => $this->alert
        ]);

        if($this->image)
        {
            $customeFileImage = uniqid().'_.'.$this->image->extension();
            $this->image->storeAs('public/products',$customeFileImage);
            $imageName = $product->image;

            $product->image = $customeFileImage;
            $product->save();

            if($imageName != null)
            {
                if(file_exists("storage/products".$imageName)){
                    unlink("storage/products".$imageName);
                }
            }
        }

        $this->resetUI();
        $this->emit("product-updated","Producto actualizado");
    }

    public function resetUI() 
    {
        $this->name = "";
        $this->barcode = "";
        $this->cost = "";
        $this->price = "";
        $this->stock = "";
        $this->alert = "";
        $this->categoryid = "Elegir";
        $this->image = null;
        $this->selected_id = 0;
    }

    public $listeners = [
        "deleteRow" => 'Destroy'
    ];

    public function Destroy(Product $product){
        $imageName = $product->image;
        $product->delete();
        if ($imageName != null) {
            if (file_exists('storage/products'.$imageName)) {
                unlink('storage/products'.$imageName);
            }
        }

        $this->resetUI();
        $this->emit("product-deleted","Producto eliminado");
    } 
}
