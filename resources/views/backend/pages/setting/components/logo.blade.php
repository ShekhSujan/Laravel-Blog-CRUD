<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
    <form action="{{ route('setting.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row gutters">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Logo <span class="text-danger">[178 *
                            40]</span></label>
                    <input class="form-control dropify" data-bs-height="100"
                        data-default-file="{{ $selected->logo_url }}" name="logo" type="file"><br>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label for="white_logo" class="col-form-label">Footer Logo <span class="text-danger">[178 *
                            40]</span></label>
                    <input class="form-control dropify" data-bs-height="100"
                        data-default-file="{{ $selected->white_logo_url }}" name="white_logo" type="file"
                        style="background: #e4e6e7;"><br>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label for="inputSubject" class="col-form-label">Favicon</label>
                    <input class="form-control dropify" data-bs-height="100"
                        data-default-file="{{ $selected->favicon_url }}" name="favicon" type="file"><br>
                </div>
                <hr>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="form-group pl-1">
                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal"
                        data-target=".bd-example-modal-sm-update">Update
                        Setting</button>
                </div>
            </div>

        </div>
        @include('backend.pages.modal.update-modal')
    </form>
</div>
