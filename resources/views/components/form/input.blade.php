@props([
    'label' => '',
    'id' => '',
    'value' => '',
    'required' => false,
    'type' => 'text',
])

@php
    $inputClasses = 'form-control';
    if ($errors->has($id)) {
        $inputClasses .= ' is-invalid';
    }
@endphp

<div class="col-md-6">
    <label for="{{ $id }}" class="form-label">{{ $label }}</label>
    <input
        type="{{$type}}"
        id="{{ $id }}"
        name="{{ $id }}"
        value="{{ old($id, $value) }}"
        {{ $required ? 'required' : '' }}
        {{ $attributes->merge(['class' => $inputClasses]) }}
    />
    
    @if ($errors->has($id))
        <div class="invalid-feedback">
            {{ $errors->first($id) }}
        </div>
    @else
        <div class="valid-feedback">Looks good!</div>
    @endif
</div>
