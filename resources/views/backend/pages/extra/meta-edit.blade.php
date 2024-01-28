<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="form-group row">
        <label for="" class="col-sm-2" for="input-email">Meta Title <span
                class="text-danger">*</span></label>
        <div class="col-sm-8">
            <input type="text" name="meta_title" class="form-control"
                value="{{ $selected->meta['meta_title'] ??'' }}"
                placeholder="Enter Meta Title" />
        </div>
    </div>
</div>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="form-group row">
        <label class="col-sm-2" for=" meta_keyword">Meta keyword <span
                class="text-danger">*</span></label>
        <div class="col-sm-8">
            <input type="text" name="meta_keyword" data-role="tagsinput"
                class="form-control" value="{{ $selected->meta['meta_keyword'] ??'' }}"
                placeholder="Enter Meta keyword" />
        </div>
    </div>
</div>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="form-group row">
        <label for="" class="col-sm-2" for="input-email">Meta
            Description <span class="text-danger">*</span></label>
        <div class="col-sm-8">
            <textarea name="meta_description" class="form-control" value="{{ old('meta_description') }}"
                placeholder="Enter Meta Description">{{ $selected->meta['meta_description'] ??'' }}</textarea>
        </div>
    </div>
</div>
