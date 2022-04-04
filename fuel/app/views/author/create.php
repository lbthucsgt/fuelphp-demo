<div class="author-wrapper mt-2">
    <h2>Create Author</h2>
    <form method="post" enctype="multipart/form-data" data-parsley-validate>
        <?= \Form::csrf(); ?>
        <div class="form-group row">
            <label class="col-3">Author Name</label>
            <div class="col-9">
                <input id="name" name="name" type="text" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-3"></label>
            <div class="col-9">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
