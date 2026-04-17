@props(['active' => false, 'dataid' => false, 'position' => false, 'logo' => false])

<div class="{{ $active ? 'item active' : 'item' }}">
    <a {{ $attributes }} class="btn-provider" data-id="{{ $dataid }}" data-position="{{ $position }}"><i class="svg-{{ $logo }}"></i>
        <span style="font-size:9px">{{ $slot }}</span>
    </a>
</div>
