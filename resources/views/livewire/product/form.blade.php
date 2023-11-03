@include('common.modalHead')
<div class="row">
    <div class="input-group col-sm-12">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="far fa-edit"></i>
            </span>
        </div>
        <input type="text" wire:model.lazy='name' class="form-control" placeholder="Ej. cursos">
        @error('name')
            <span class="text-danger er">{{ $message }}</span>
        @enderror
    </div>
    <div class="input-group col-sm-12 mt-3">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="far fa-edit"></i>
            </span>
        </div>
        <select wire:model.lazy='categoryid' class="form-control" >
            <option value="{{ $categoryid }}">Selecciona una Categoria</option>
            @forelse($categories as $key => $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @empty
                
            @endforelse
        </select>
       
        @error('category_id')
            <span class="text-danger er">{{ $message }}</span>
        @enderror
    </div>
    <div class="input-group col-sm-12 mt-3">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="far fa-edit"></i>
            </span>
        </div>
        <input type="number" wire:model.lazy='stock' class="form-control" placeholder="Srock en unidades Ej. 12">
        @error('stock')
            <span class="text-danger er">{{ $message }}</span>
        @enderror
    </div>
    <div class="input-group col-sm-12 mt-3">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="far fa-edit"></i>
            </span>
        </div>
        <input type="number" wire:model.lazy='cost' class="form-control" placeholder="Precio del producto para la empresa Ej. 12">
        @error('cost')
            <span class="text-danger er">{{ $message }}</span>
        @enderror
    </div>
    <div class="input-group col-sm-12 mt-3">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="far fa-edit"></i>
            </span>
        </div>
        <input type="number" wire:model.lazy='price' class="form-control" placeholder="Precio del producto para el cliente Ej. 16">
        @error('price')
            <span class="text-danger er">{{ $message }}</span>
        @enderror
    </div>
    <div class="input-group col-sm-12 mt-3">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="far fa-edit"></i>
            </span>
        </div>
        <input type="number" wire:model.lazy='alert' class="form-control" placeholder="Cantidad mínima del producto Ej. 10">
        @error('alert')
            <span class="text-danger er">{{ $message }}</span>
        @enderror
    </div>
    <div class="input-group col-sm-12 mt-3">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="far fa-edit"></i>
            </span>
        </div>
        <input type="text" wire:model.lazy='barcode' class="form-control" placeholder="Ingresa código de barras Ej.2342342d3 ">
        @error('name')
            <span class="text-danger er">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-sm-12 mt-3">
        <div class="form-group custom-file">
            <input type="file" class="custom-file-input form-control" wire:model='image' accept="image/x-png,image/gif,image/jpeg">
            <label class="custom-file-label">Imágen {{ $image }}</label>
            @error('image')
                <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>
    
</div>
@include('common.modalFooter')