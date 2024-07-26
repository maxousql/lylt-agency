<section>
    <form class="form" action="{{ route('search-properties') }}" method="GET">
        @csrf
        <div class="input-group input--large">
            <label class="label">Achat / Location</label>
            <select name="property-status" id="property-status" class="input--style-1">
                <option value="acheter" @if (isset($request) && $request->input('property-status') == 'acheter') selected @endif>Acheter</option>
                <option value="louer" @if (isset($request) && $request->input('property-status') == 'louer') selected @endif>Louer</option>
            </select>
        </div>

        <div class="input-group input--large">
            <label class="label">Mots clés</label>
            <input class="input--style-1" type="text" id="text-keywords" name="property-keywords"
                @if (isset($request)) value="{{ $request->input('property-keywords') }}" @endif />
        </div>
        <div class="input-group input--large">
            <label class="label">Ville</label>
            <input class="input--style-1" type="text" id="text-city" name="property-city"
                @if (isset($request)) value="{{ $request->input('property-city') }}" @endif />
        </div>
        <div class="input-group input--medium">
            <label class="label">Budget min.</label>
            <input class="input--style-1" type="number" id="number-min-price" name="property-min-price" step="0.10"
                @if (isset($request)) value="{{ $request->input('property-min-price') }}" @endif />
        </div>
        <div class="input-group input--medium">
            <label class="label">Budget max.</label>
            <input class="input--style-1" type="number" id="number-max-price" name="property-max-price" step="0.10"
                @if (isset($request)) value="{{ $request->input('property-max-price') }}" @endif />
        </div>
        <button class="btn-submit" type="submit" value="submit-search"><i
                class="fas fa-search"style="color: white;"></i></button>
    </form>
</section>
