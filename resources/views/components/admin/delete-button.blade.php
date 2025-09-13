@props([
    'class' => '',
    'onClick' => 'return confirm("Are you sure?")',
])

<form {{ $attributes }} method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="{{ $onClick }}" class="{{ $class }}">{{ $slot }}</button>
</form>