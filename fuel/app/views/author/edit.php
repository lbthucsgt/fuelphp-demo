<div class="book-wrapper mt-2">
    <h2>Edit Author</h2>
    <form method="post" enctype="multipart/form-data" data-parsley-validate>
        <?= \Form::csrf(); ?>
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

    <?php if (count($author->books)) : ?>
        <h3 class="mt-5">Books of <?= $author->name ?></h3>
        <table class="table table-striped table-bordered mt-2 table-sm">
            <thead style="background: #2c9676; color: white;">
            <tr>
                <th>Id</th>
                <th>Cover</th>
                <th>Title</th>
                <th>Price</th>
                <th>Published at</th>
                <th class="d-flex justify-content-center">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($author->books as $book) : ?>
                <tr>
                    <td><?= $book->id ?></td>
                    <td><img src="/cover/<?= $book->cover ?>" width="100px"></td>
                    <td><?= $book->title ?></td>
                    <td><?= number_format($book->price) ?></td>
                    <td><?= $book->published_at ?></td>
                    <td>
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="/book/<?= $book->id ?>/edit" class="btn btn-primary mr-2 btn-sm">Edit</a>
                            <form method="post" action="/book/<?= $book->id ?>/delete">
                                <?= \Form::csrf(); ?>
                                <input type="hidden" name="redirect_url" value="/author/<?= $author->id ?>/edit"/>
                                <button type="button" class="btn btn-danger btn-sm js-delete-book" data-id="<?= $book->id ?>" data-title="<?= $book->title ?>">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <script>
            $(document).ready(function () {
                $('.js-delete-book').click(function () {
                    var id = $(this).attr('data-id');
                    var title = $(this).attr('data-title');
                    if (confirm('Are you sure to delete book: ' + title + '?')) {
                        $(this).closest('form').submit();
                    }
                });
            });
        </script>
    <?php endif; ?>
</div>