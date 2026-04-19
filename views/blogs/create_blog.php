<main class="mb-4">
<div class="container px-4 px-lg-5">
  <div class="row g-4 justify-content-center">
    
    <div class="col-md-8 col-lg-6 col-xl-5">
      
      <form method="POST"  enctype="multipart/form-data" action="index.php?page=store_blog&action=store" >
        
        <!-- Title -->
        <div class="form-floating mb-4">
          <input class="form-control" name="title"  type="text" placeholder="Enter title" required />
          <label for="title">Title</label>
        </div>

        <!-- Image -->
        <div class="mb-4">
          <input class="form-control" name="image" type="file" required />
          <label for="image">Image</label>
        </div>

        <!-- Content -->
        <div class="form-floating mb-4">
          <textarea class="form-control" name="content"  rows="3" placeholder="Enter content" required></textarea>
          <label for="content">Content</label>
        </div>

        <!-- Button -->
        <button class="btn btn-primary" type="submit">
    create
        </button>

      </form>
    </div>
</div>
  </div>
</div>
</main>