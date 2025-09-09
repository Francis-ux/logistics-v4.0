@props(['class' => '', 'method' => 'DELETE', 'onClick' => 'return confirm("Are you sure?")'])

<form {{ $attributes }} method="POST">
    @csrf
    @method($method)
    <button type="submit" onclick="{{ $onClick }}" class="{{ $class }}">{{ $slot }}</button>
</form>
