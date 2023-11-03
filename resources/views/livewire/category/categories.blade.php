<div class="layout-px-spacing">
    <div class="page-header">
        <div class="page-title">
            <h3>{{ $pageTitle }} | {{ $componentName }}</h3>
        </div>
    </div>

    <div class="row" id="cancel-row">
        
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="table-responsive mb-4 mt-4">
                    <table id="default-ordering-{{ $uniqueId }}" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nombre de categoria</th>
                                <th>Imagen</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $key => $category)
                                
                                <tr>
                                    <td>{{ $category->name }} ({{ $category->products->count() }})</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="usr-img-frame mr-2 rounded-circle">
                                                <img alt="avatar" style="height: 100%" class="img-fluid rounded-circle" src="{{ asset('storage/categories/'.$category->imagen) }}">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-dark btn-sm">Acciones</button>
                                            <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuReference1">
                                            <a class="dropdown-item" href="javascript:void(0)" wire:click='Edit({{ $category->id }})'>Editar</a>

                                            <div class="dropdown-divider"></div>
                                            
                                            <a class="dropdown-item" href="javascript:void(0)" onclick="Confirm({{ $category->id }}, {{ $category->products->count() }})">Eliminar</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th class="invisible"></th>
                            </tr>
                        </tfoot>
                    </table>
                    {{ $categories->links() }}
                    {{-- {{ $categories->links('vendor.pagination.custom') }} --}}
                </div>
            </div>
        </div>
    </div>
    @include('livewire.category.form')
</div>


<script>
    // document.addEventListener('DOMContentLoaded',function(){
    document.addEventListener('livewire:load',function(){

        window.livewire.on('show-modal', msg =>{
            $('#exampleModal').modal('show');
        });

        window.livewire.on('hide-modal',msg =>{
            $('#exampleModal').modal('hide');
        })
        
        window.livewire.on('hidden.bs.modal',msg =>{
            $('.er').css('display','none');
        })
        
        window.livewire.on('category-added',msg =>{
            $('#exampleModal').modal('hide');
            // noty(msg);
        })

        window.livewire.on('category-updated',msg =>{
            $('#exampleModal').modal('hide');
            // noty(msg);
        })

        window.livewire.on('category-deleted',msg =>{
            // noty(msg);
        })

        crearTabla();

        
    })

    document.addEventListener('livewire:update', function () {
        crearTabla();
    });

    

    function Confirm(id, productos) {
        if(productos>0)
        {
            swal('No se puede eliminar la categoria porque tiene productos relacionados');
            return;
        }
        swal({
            title: 'CONFIRMAR',
            text: '¿CONFIRMAS ELIMINAR EL REGISTRO?',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cerrar',
            confirmButtonText: 'Aceptar',
            colorButtonText: '#3b3f5c'
        }).then(function(result){
            if (result.value) {
                window.livewire.emit('deleteRow',id);
                swal.close();
            }
        })
    }
</script>