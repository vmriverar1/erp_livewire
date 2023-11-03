            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="resetUI()" class="btn" data-dismiss="modal">
                    <i class="flaticon-cancel-12"></i> Cerrar
                </button>
                @if($selected_id < 1)
                    <button wire:click.prevent="Store()" type="button" class="btn btn-primary close-modal">Guardar</button>
                @else
                    <button wire:click.prevent="Update()" type="button" class="btn btn-primary close-modal">Editar</button>
                @endif
            </div>
        </div>
    </div>
</div>