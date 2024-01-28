<div class="modal fade bd-example-modal-sm" id="model_button" tabindex="-1" role="dialog"
    aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="">
                Are You Sure,Want To Trash ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Cancel</button>
                <form action="{{ route('category.trash') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="adid" value="">
                    <button type="submit" class="btn btn-danger btn-sm">Trash</button>
                </form>
            </div>
        </div>
    </div>
</div>
