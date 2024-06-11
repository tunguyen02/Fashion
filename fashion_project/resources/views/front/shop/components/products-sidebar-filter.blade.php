<form action="{{ request()->segment(2) == 'products' ? 'shop' : '' }}">
    <div class="filter-widget">
        <h4 class="fw-title">Categories</h4>
        <ul class="filter-catagories">
            @foreach($categories as $category)
                <li><a href="shop/{{ $category->name }}">{{ $category->name }}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Brand</h4>
        <div class="fw-brand-check">
            @foreach($brands as $brand)
                <div class="bc-item">
                    <label for="bc-{{ $brand->id }}">
                        {{ $brand->name }}
                        <input type="checkbox"
                               name="brand[{{ $brand->id }}]"
                               id="bc-{{ $brand->id }}"
                               onchange="this.form.submit();"
                                {{ (request('brand')[$brand->id] ?? '') == 'on' ? 'checked' : '' }}>
                        <span class="checkmark"></span>
                    </label>
                </div>
            @endforeach
        </div>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Price</h4>
        <div class="filter-range-wrap">
            <div class="range-slider">
                <div class="price-input">
                    <input type="text" id="minamount" name="price_min" >
                    <input type="text" id="maxamount" name="price_max" >
                </div>
            </div>
            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                 data-min="1" data-max="99"
                 data-min-value="{{ str_replace('$', '', request('price_min')) }}"
                 data-max-value="{{ str_replace('$', '', request('price_max')) }}">
                <div class="ui-slider-range ui-corner-all ui-widget-header">
                </div>
                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
            </div>
        </div>

        <button type="submit" class="filter-btn">Filter</button>
    </div>

</form>
