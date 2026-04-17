<div class="modal fade" id="loading-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="spinner-parlay spinner-initial-parlay" style="display: none;"></div>
</div>
<div class="modal fade" id="show-banner-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content popup-background">
            <div class="modal-header banner-header" style="padding-bottom: 15px;">
                <button type="button" class="close"
                    style="padding: 1rem; position: absolute; top:2%; right:4px; font-size: 2rem;" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body banner-body" style="padding-top: 0">
                <a href="{{ $banner->link ?? '/promotion' }}">
                    <img class="img-fluid lazyload" src="https://classbet97x.space/idn/assets/img/game-slider-holder.webp"
                        data-original="/storage/{{ $banner->image }}" alt="{{ Str::title($banner->alt) }}"
                        title="{{ Str::title($banner->alt) }}" />
                </a>
                <input type="hidden" name="is_enabled_mobile" id="is-enabled-mobile" value="1">
            </div>
        </div>
    </div>
</div>
