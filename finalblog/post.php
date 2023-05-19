<?php 
include 'partials/header.php';

// fetch post from database if id is set
if(isset($_GET['id'])) {
    $id=filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $post = mysqli_fetch_assoc($result);
} else {
    header('location: ' . ROOT_URL . 'blog.php');
    die();
}

?>


<section class="singlepost">
    <div class="container singlepost__container">
        <h2><?= $post['title'] ?></h2>
        <div class="post__author">
                            <div class="post__author-avatar">
                            <?php        
                            // fetch author from users table using author_id
                            $author_id =  $post['author_id'];
                            $author_query = "SELECT * FROM users WHERE id=$author_id";
                            $author_result = mysqli_query($connection, $author_query);
                            $author = mysqli_fetch_assoc($author_result);

                            ?>
                            <img src="./images/<?= $author['avatar']?>">
                            </div> 
                                <div class="-post__author-info">
                                <h5>
                                <?= "{$author['firstname']} {$author['lastname']}" ?>
                                </h5>
                                <small>
                                <?=  date("M d, Y - H:i", strtotime($post['date_time'])) ?>
                                </small>
                                </div>
                        </div>
                  
            <div class="singlepost__thumbnail">
                <img src="./images/<?= $post['thumbnail']?>">
            </div>
            <p>
            <?= $post['body']?>
            </p>
    </div>
</section>
 
<!-----------------------end of singlepost----------------------------->


<!--    <section class="featured">
        <div class="container featured_container">
            <div class="post__thumbnail">
                <img src="./images/blog1.jpg">
            </div>
            <div class="post_info">
                <a href="" class="category__button">WILD THIFT</a>
                <h2 class="post_title"><a href="post.html">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, iusto.</a></h2>
                <p class="post__body">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium quam, in ipsum ea reprehenderit expedita aspernatur ullam omnis incidunt quaerat sapiente explicabo voluptatum doloremque sunt blanditiis dicta velit molestiae a.
                </p>
                <div class="post_author">
                    <div class="post__author-avatar">
                        <img src="./images/60111.jpg">
                    </div>
                    <div class="post__author-info">
                        <h5>Jezard patalod</h5>
                        <small> march 3, 15, 2023 - 3:30am </small>
                    </div>  
                </div>
            </div>
        </div>
    </section> --->
    <!---===============================END OF FEATURED==============================================-->

 

    <?php 
include 'partials/footer.php';
?>