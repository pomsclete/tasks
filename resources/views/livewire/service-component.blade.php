<div>
    <h1>Gestion des services</h1>
    <div class="row">

        <div class="col-md-4">
            @session('message')
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endsession
            <div class="card px-3 py-3">
                <div class="form-group">
                    <label for="titre">Titre</label>
                    <input id="titre" type="text" wire:model="titre" class="form-control">
                </div>
                @error('titre')
                    <small class="text-danger mt-1">{{ $message }}</small>
                @enderror
                @if ($editing)
                    <button wire:click="update" class="btn btn-warning mt-3">Mettre à jour</button>
                @else
                    <button wire:click="save" class="btn btn-primary mt-3">Enregistrer</button>
                @endif
            </div>

        </div>
        {{-- Tableau --}}
        <div class="col-md-8">
            <div class="card px-3 py-3">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Libellé</th>
                            <th style="width:100px;text-align:center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($services as $service)
                            <tr>
                                <td>{{ $service->libelle }}</td>
                                <td class="text-center">
                                    <button wire:click="edit({{ $service->id }})" class="btn btn-sm btn-warning"><i
                                            class="fas fa-fw fa-edit"></i></button>
                                    <button wire:click="destroy({{ $service->id }})" class="btn btn-sm btn-danger"><i
                                            class="fas fa-fw fa-trash"></i></button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="text-center">Aucun service trouvé</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
