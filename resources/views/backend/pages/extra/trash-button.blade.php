<div class="dropdown show">
    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" width="20px"
        role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
        Bulk Action
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <button type="button" class="dropdown-item" data-toggle="modal" onclick="modalBulk(0)"
            data-target=".bd-example-modal-sm-action" href="#">Pernament Delete</button>
        <button type="button" class="dropdown-item" data-toggle="modal" onclick="modalBulk(1)"
            data-target=".bd-example-modal-sm-action" href="#"
            value="1">Restore</button>
    </div>
</div>
