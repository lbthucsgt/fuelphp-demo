<div class="book-wrapper mt-2">
    <h2>Edit Author</h2>
    <form method="post" enctype="multipart/form-data" data-parsley-validate>
        <div class="form-group row">
            <label class="col-3">Author Name</label>
            <div class="col-9">
                <input id="name" name="name" type="text" class="form-control" value="<?= $author->name ?>" required>
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