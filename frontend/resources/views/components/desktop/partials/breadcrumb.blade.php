@props(['show' => false])

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            @if ($show)
                {{ $slot }}
            @endif
        </div>
    </div>
</div>
