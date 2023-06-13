<?php

  // make sure the user is logged in
  if ( !Auth::isUserLoggedIn() ) {
    header("Location: /");
    exit;
  }

  $posts = Post::getPostEditByID();
   
  require "parts/header.php";

?>
    <div class="container mx-auto my-5" style="max-width: 700px;">
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="h1">Edit Post</h1>
      </div>
      <div class="card mb-2 p-4">
        <form
          method="POST"
          action="/posts/edit">
          <?php require "parts/error.php"; ?>
          <div class="mb-3">
            <label for="post-title" class="form-label">Title</label>
            <input
              type="text"
              class="form-control"
              name="title"
              id="post-title"
              value="<?= $posts['title']; ?>"
            />
          </div>
          <div class="mb-3">
            <label for="post-content" class="form-label">Content</label>
            <textarea class="form-control" name="content" id="post-content" rows="10"><?= $posts['content']; ?></textarea>
          </div>
          <div class="mb-3">
            <label for="post-content" class="form-label">Status</label>
            <select class="form-control" id="post-status" name="status">
            <option value="pending" <?= $posts['status'] === 'pending' ? 'selected' : ''; ?>>Pending</option>
              <option value="publish" <?=  $posts['status'] === 'publish' ? 'selected' : ''; ?>>Publish</option>
            </select>
          </div>
          <div class="mb-3">
            Last modified by: 
              <?php 
                // $sql = "SELECT * FROM users where id = :id";
                // $query = $database->prepare( $sql );
                // $query->execute([
                //   'id' => $post["modified_by"]
                // ]);
                // $user = $query->fetch();
                // echo $user["name"];

                echo $posts["name"];
              ?> 
              on ( <?= $posts["modified_at"]; ?> )
          </div>
          <div class="text-end">
          <input type="hidden" name="id" value="<?= $posts['id']; ?>" />
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
      <div class="text-center">
        <a href="/manage-post" class="btn btn-link btn-sm"
          ><i class="bi bi-arrow-left"></i> Back to Posts</a
        >
      </div>
    </div>
<?php

  require "parts/footer.php"

?>