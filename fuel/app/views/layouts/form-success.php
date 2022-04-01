<?php
    $success = Session::get_flash('success');
?>
<?php if ($success) : ?>
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        <strong><?= $success ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>