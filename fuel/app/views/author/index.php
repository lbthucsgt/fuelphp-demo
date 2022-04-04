<div class="author-wrapper">
    <div class="d-flex justify-content-end mt-4">
        <a href="/author/create" class="btn btn-primary">Create Author</a>
    </div>
    <table class="table table-striped table-bordered mt-4 table-sm">
        <thead style="background: #2c9676; color: white;">
            <tr>
                <th>Id</th>
                <th>Author Name</th>
                <th class="d-flex justify-content-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($authors as $author) : ?>
                <tr>
                    <td><?= $author->id ?></td>
                    <td><?= $author->name ?></td>
                    <td class="d-flex justify-content-center">
                        <a href="/author/<?= $author->id ?>/edit" class="btn btn-primary mr-2 btn-sm">Edit</a>
                        <?php if (count($author->books)) : ?>
                            <button type="button" class="btn btn-danger btn-sm disabled">Delete</button>
                        <?php else : ?>
                            <form method="post" action="/author/<?= $author->id ?>/delete">
                                <?= \Form::csrf(); ?>
                                <button type="button" class="btn btn-danger btn-sm js-delete-author" data-id="<?= $author->id ?>" data-name="<?= $author->name ?>">Delete</button>
                            </form>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-4">
        <?= Pagination::instance('author_pagination')->render(); ?>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.js-delete-author').click(function () {
            var id = $(this).attr('data-id');
            var name = $(this).attr('data-name');
            if (confirm('Are you sure to delete author: ' + name + '?')) {
                $(this).closest('form').submit();
            }
        });
    });
</script>