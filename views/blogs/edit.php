<?php

if(isset($_GET['id'])){
    $blog = findblog($_GET['id']);
}

?>

<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">

                <form method="POST" enctype="multipart/form-data" action="index.php?page=update_blog&action=update">
                    <input type="hidden" name="id" value="<?= $blog['id'] ?>">
                    <!-- Title -->
                    <div class="form-floating">
                        <input class="form-control" name="title" type="text" value="<?= $blog['title'] ?>" />
                        <label for="title">Title</label>
                    </div>

                    <!-- Image -->
                    <div class="form-floating">
                        <input class="form-control" name="image" type="file">
                        <label for="image">Image</label>
                    </div>

                    <!-- Current Image -->
                    <img width="200" src="<?='http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . $blog['image']; ?>">

                    <!-- Content -->
                    <div class="form-floating">
                        <textarea name="content" rows="3"><?= $blog['content'] ?></textarea>
                        <label for="content">Content</label>
                    </div>

                    <button class="btn btn-primary text-uppercase mt-4" type="submit">
                        Update
                    </button>

                </form>

            </div>
        </div>
    </div>
</main>