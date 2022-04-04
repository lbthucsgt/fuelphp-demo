<div class="book-wrapper mt-2">
    <h2>Edit Book</h2>
    <form method="post" enctype="multipart/form-data" data-parsley-validate>
        <?= \Form::csrf(); ?>
        <div class="form-group row">
            <label class="col-3">Title</label>
            <div class="col-9">
                <input id="title" name="title" type="text" class="form-control" value="<?= $book->title ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-3">Price</label>
            <div class="col-9">
                <input id="price" name="price" type="number" class="form-control" value="<?= $book->price ?>" required data-parsley-type="number">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-3">Published at</label>
            <div class="col-9">
                <input id="datepicker" name="published_at" type="text" class="form-control" value="<?= $book->published_at ?>" required autocomplete="off">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-3">Author</label>
            <div class="col-9">
                <select id="author_id" name="author_id" class="form-control" required>
                    <option value="">Select Author</option>
                    <?php foreach ($authors as $author) : ?>
                        <?php if ($author->id == $book->author_id) : ?>
                            <option value="<?= $author->id ?>" selected><?= $author->name ?></option>
                        <?php else : ?>
                            <option value="<?= $author->id ?>"><?= $author->name ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-3">Book's Cover</label>
            <div class="col-9">
                <img class="js-cover-img-tag mb-2" src="\cover\<?=  $book->cover ?>" alt="book cover" width="200px">
                <input id="js-cover" name="cover" type="file" class="form-control-file" accept="image/*">
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

<script>
    $(document).ready(function () {
        $( "#datepicker" ).datepicker({
            dateFormat: "yy-mm-dd"
        });

        var $jsCover = $('#js-cover');
        $jsCover.on('change', function () {
            let reader = new FileReader();
            reader.onload = function() {
                $('.js-cover-img-tag').attr('src', reader.result);
            };
            return reader.readAsDataURL($jsCover[0].files[0]);
        });
    });
</script>