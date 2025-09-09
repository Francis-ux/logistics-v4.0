 @props([
     'type' => 'text',
     'id' => null,
     'label' => null,
     'name' => null,
     'value' => '',
     'step' => null,
     'min' => null,
     'max' => null,
     'options' => [], // for select dropdowns
 ])

 <div class="col-md-6 mb-3">
     @if ($label)
         <label for="{{ $id ?? $name }}" class="form-label">{{ $label }}</label>
     @endif

     @if ($type === 'select')
         <select id="{{ $id ?? $name }}" name="{{ $name }}"
             {{ $attributes->merge(['class' => 'form-select ' . ($errors->has($name) ? 'is-invalid' : '')]) }}>
             <option value="">-- Select {{ $label }} --</option>
             @foreach ($options as $key => $option)
                 <option value="{{ is_string($key) ? $key : $option }}"
                     {{ old($name, $value) == (is_string($key) ? $key : $option) ? 'selected' : '' }}>
                     {{ $option }}
                 </option>
             @endforeach
         </select>
     @elseif($type === 'textarea')
         <textarea id="{{ $id ?? $name }}" name="{{ $name }}"
             {{ $attributes->merge(['class' => 'form-control ' . ($errors->has($name) ? 'is-invalid' : '')]) }}>{{ old($name, $value) }}</textarea>
     @else
         <input type="{{ $type }}" id="{{ $id ?? $name }}" name="{{ $name }}"
             value="{{ old($name, $value) }}" step="{{ $step }}" min="{{ $min }}"
             max="{{ $max }}"
             {{ $attributes->merge(['class' => 'form-control ' . ($errors->has($name) ? 'is-invalid' : '')]) }}>
     @endif

     @error($name)
         <span class="invalid-feedback">{{ $message }}</span>
     @enderror
 </div>
