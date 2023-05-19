<?php
require'config/database.php';

if(isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // fetch post form database in order to delate thumbnail from image folder
    $query = "SELECT  * FROM posts WHERE id=$id";
    $result = mysqli_query($connection, $query);

    // make sure onyl 1 record/post was fetch
    if(mysqli_num_rows($result)==1) {
        $post = mysqli_fetch_assoc($result);
        $thumbnail_name = $post['thumbnail'];
        $thumbnail_path = '../images/' . $thumbnail_name;

        if($thumbnail_path) {
            unlink($thumbnail_path);

            // delete post from database
            $delete_posts_query = "DELETE FROM posts WHERE id=$id LIMIT 1";
            $delete_posts_result = mysqli_query($connection, $delete_posts_query);

            if(!mysqli_errno($connection)) {
                $_SESSION['delete-post-success'] = "Post deleted succesfully";
            }
        }
    }
}

header('location:' . ROOT_URL . 'admin/');
die();
?>