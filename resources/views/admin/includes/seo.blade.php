
<div class="form-group"><label class="col-sm-2 control-label">{{__('admin.title')}}</label>
    <div class="col-sm-10">
        <input class="form-control" type="text" name = "{!! $locale . '[title]' !!}" @if(isset($item) && $item->hasTranslation($locale))value = "{{$item->translate($locale)->title}}@endif">
    </div>
</div>

<div class="form-group"><label class="col-sm-2 control-label">{{__('admin.keywords')}}</label>
    <div class="col-sm-10">
        <input class="form-control" type="text" name = "{!! $locale . '[keywords]' !!}" @if(isset($item) && $item->hasTranslation($locale))value = "{{$item->translate($locale)->keywords}}"@endif>
    </div>
</div>

<div class="form-group"><label class="col-sm-2 control-label">{{__('admin.description')}}</label>
    <div class="col-sm-10">
        <textarea class="form-control" name="{!! $locale . '[description]' !!}">@if(isset($item) && $item->hasTranslation($locale)){{$item->translate($locale)->description}}@endif</textarea>
    </div>
</div>
