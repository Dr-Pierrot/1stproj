    

    <div class="row ">
        <div class="col-10">
        <h2><?= $title ?></h2>
        </div>
        <div class="col-2">
            <a href="posts/create" class="btn btn-success center position-absolute bottom-0 end-0">Create Post</a>
        </div>
    </div>
    <hr>
 

<?php foreach($posts as $post): ?>
    <div class="container border">
        <h3><?php echo $post['title']; ?></h3>
        <small class="post-date">Posted on: <?php echo $post['created_at'];?></small><br>
        <?php echo $post['body']; ?>
        <br><br>
        <p><a class="btn btn-primary" href="<?php echo site_url('/posts/'.$post['slug']); ?>">Read More</a></p>
    </div><br>
    
<?php endforeach; ?>

    