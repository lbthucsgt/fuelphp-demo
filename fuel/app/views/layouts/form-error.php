<?php
    $error = Session::get_flash('error');
?>
<?php if ($error) : ?>
    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
        <strong><?= $error ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>