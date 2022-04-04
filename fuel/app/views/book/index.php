<div class="book-wrapper">
    <div>
        <form>
            <div class="d-flex mt-3">
                <input name="title" type="text" class="form-control mr-2" placeholder="search book">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
    </div>
    <div class="d-flex justify-content-end mt-4">
        <a href="/book/create" class="btn btn-primary">Create Book</a>
    </div>
    <table class="table table-striped table-bordered mt-4 table-sm">
        <thead style="background: #2c9676; color: white;">
            <tr>
                <th>Id</th>
                <th>Cover</th>
                <th>Title</th>
                <th>Price</th>
                <th>Published at</th>
                <th>Author</th>
                <th class="d-flex justify-content-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($books as $book) : ?>
                <tr>
                    <td><?= $book->id ?></td>
                    <td><img src="/cover/<?= $book->cover ?>" width="100px"></td>
                    <td><?= $book->title ?></td>
                    <td><?= number_format($book->price) ?></td>
                    <td><?= $book->published_at ?></td>
                    <td><?= $book->author->name ?></td>
                    <td>
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="/book/<?= $book->id ?>/edit" class="btn btn-primary mr-2 btn-sm">Edit</a>
                            <form method="post" action="/book/<?= $book->id ?>/delete">
                                <?= \Form::csrf(); ?>
                                <button type="button" class="btn btn-danger btn-sm js-delete-book" data-id="<?= $book->id ?>" data-title="<?= $book->title ?>">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-4">
        <?= Pagination::instance('mypagination')->render(); ?>
    </div>
</div>

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