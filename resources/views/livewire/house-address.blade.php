<div class="col-md-12">
    <div class="row">
        <div class="form-group col-md-4">
            <label for="district" class="required">{{ __('District') }}</label>


            <select wire:model="selectedDistrict" class="form-control">
                <option value="" selected>Choose District</option>
                @foreach($districts as $district)
                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                @endforeach
            </select>

        </div>

        @if (!is_null($selectedDistrict))
            <div class="form-group col-md-4">
                <label for="sector" class="required">{{ __('Sector') }}</label>


                <select wire:model="selectedSector" class="form-control">
                    <option value="" selected>Choose Sector</option>
                    @foreach($sectors as $sector)
                        <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                    @endforeach
                </select>
            </div>
        @endif
        @if (!is_null($selectedSector))
            <div class="form-group col-md-4">
                <label for="cell" class="required">{{ __('Cell') }}</label>


                <select wire:model="selectedCell" class="form-control" name="cell_id" {{ $errors->has('cell_id') ? 'is-invalid' : '' }}>
                    <option value="" selected>Choose Cell</option>
                    @foreach($cells as $cell)
                        <option value="{{ $cell->id }}">{{ $cell->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('cell_id'))
                    <span class="text-danger">{{ $errors->first('cell_id') }}</span>
                @endif
            </div>
        @endif
    </div>


</div>
