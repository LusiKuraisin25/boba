@props(['disabled' => false, 'value' => '', 'type' => 'text', 'name'])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!} value="{{ $value }}" type="{{ $type }}" name="{{ $name }}">
