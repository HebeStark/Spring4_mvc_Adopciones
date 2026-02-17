    <div class="solicitud-form-container">
        
        <p class="solicitud-animal">
            <strong>Animal seleccionado:</strong>
            {{ $animal->nombre }} ({{ $animal->tipo }})
        </p>
        
        <form wire:submit.prevent="save" class="solicitud-form">
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" wire:model='nombre'>
                @error('nombre')
                <span class="error-message">{{ $message }}</span>                    
                @enderror
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" wire:model="email">
                @error('email')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Teléfono</label>
                <input type="text" wire:model="telefono">
                @error('telefono')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary">
                    Enviar solicitud
                </button>
           </div>
        </form>

    </div>

