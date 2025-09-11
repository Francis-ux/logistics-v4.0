 @props([
     'type' => 'text',
     'id' => null,
     'label' => null,
     'name' => null,
     'value' => '',
 ])

 <div class="mb-3">
     @if ($label)
         <label for="{{ $id ?? $name }}" class="form-label">{{ $label }}</label>
     @endif

     <input type="{{ $type }}" id="{{ $id ?? $name }}" name="{{ $name }}" value="{{ old($name, $value) }}"
         {{ $attributes->merge(['class' => 'form-control ' . ($errors->has($name) ? 'is-invalid' : '')]) }}>

     @error($name)
         <span class="invalid-feedback">{{ $message }}</span>
     @enderror
 </div>
