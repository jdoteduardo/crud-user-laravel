<div class="card">
    <form action="{{ route('users.updateInterests', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-header">
            Interests
        </div>
        <div class="card-body">
            @foreach(['Futebol', 'Formula 1'] as $item)
            <div class="form-check">
                <input class="form-check-input @error('interests') is-invalid @enderror" type="checkbox" 
                    value="{{ $item }}"
                    @checked(in_array($item, old('interests', $user->interests->pluck('name')->toArray())))
                    name="interests[][name]">

                <label class="form-check-label">
                  {{ $item }}
                </label>

                @if ($loop->last)
                    @error('interests')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                @endif
            </div>
            @endforeach
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Edit</button>
        </div>
    </form>
</div>