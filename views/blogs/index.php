<?php $blogs = getblogs(); ?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>All Blogs</h1>
        <a href="index.php?page=create_blog&action=store" class="btn btn-primary">Add New Blog</a>
    </div>

    <?php if (empty($blogs)): ?>
        <div class="alert alert-info">No blogs found. Please add some blogs.</div>
    <?php else: ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($blogs as $blog): ?>
                    <tr>
                        <td><?= $blog['id'] ?></td>
                        <td><img src="<?= $blog['image'] ?>" width="200"></td>
                        <td><?= $blog['title'] ?></td>
                        <td><?= $blog['content'] ?></td>
                        <td>
            <a href="index.php?page=edit_blog&id=<?= $blog['id'] ?>" class="btn btn-sm btn-warning">
    Edit
</a>

                            <form style="display:inline;" action="index.php?page=blogs&action=delete" method="POST" onsubmit="return confirm('Are you sure?');">
                                <input type="hidden" name="id" value="<?= $blog['id'] ?>">
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>