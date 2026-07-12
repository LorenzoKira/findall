<div>
    <div class="form-group">
        @if ($showForgot)
            <div class="flex justify-between">
                <label for="{{ $id }}">{{ $text }}</label>
                <a href="#" class="text-primary">Mot de passe oublié ?</a>
            </div>

        @else
            <label for="{{ $id }}">{{ $text }}</label>
        @endif
        <input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}">
    </div>
</div>