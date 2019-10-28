<div class="form-group row">
    <label for="app_endpoint" class="col-2 col-form-label">app_endpoint</label>
    <div class="col-10">
        <input type="text" class="form-control" name="app_endpoint" id="app_endpoint" value="{{ old('app_endpoint', isset($element) ? $element->app_endpoint : 'ovh-eu') }}" required />
    </div>
</div>
<div class="form-group row">
    <label for="app_key" class="col-2 col-form-label">app_key</label>
    <div class="col-10">
        <input type="text" class="form-control" name="app_key" id="app_key" value="{{ old('app_key', isset($element) ? $element->app_key : null) }}" required />
    </div>
</div>
<div class="form-group row">
    <label for="app_secret" class="col-2 col-form-label">app_secret</label>
    <div class="col-10">
        <input type="text" class="form-control" name="app_secret" id="app_secret" value="{{ old('app_secret', isset($element) ? $element->app_secret : null) }}" required />
    </div>
</div>
<div class="form-group row">
    <label for="app_conskey" class="col-2 col-form-label">app_conskey</label>
    <div class="col-10">
        <input type="text" class="form-control" name="app_conskey" id="app_conskey" value="{{ old('app_conskey', isset($element) ? $element->app_conskey : null) }}" required />
    </div>
</div>
<div class="form-group row">
    <label for="nichandle" class="col-2 col-form-label">nichandle</label>
    <div class="col-10">
        <input type="text" class="form-control" name="nichandle" id="nichandle" value="{{ old('nichandle', isset($element) ? $element->nichandle : null) }}" />
    </div>
</div>
<div class="form-group row">
    <label for="comment" class="col-2 col-form-label">{{ ucfirst(__('app.comment')) }}</label>
    <div class="col-10">
        <textarea name="comment" class="form-control" placeholder="comment">{{ old('comment', isset($element) ? $element->comment : null) }}</textarea>
    </div>
</div>
<div class="form-group row">
    <label for="active" class="col-2 col-form-label">{{ ucfirst(__('app.active')) }}</label>
    <div class="col-10">
        <input type="hidden" name="active" value="0" />
        <input type="checkbox" name="active" id="active" value="1" {{ isset($$element) ? $element->active == false ? '' : 'checked' : 'checked' }} />
    </div>
</div>
<div class="form-group row">
    <label for="tags" class="col-2 col-form-label"></label>
    <div class="col-10">
        <button type="submit" class="btn btn-primary">{{ __('app.save') }}</button>
    </div>
</div>

