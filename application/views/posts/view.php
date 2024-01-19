

<div class="row">
    <div class="col-10">
    <h2><?php echo $post['title']; ?></h2>
    </div>
    <div class="col-1">
        <?php echo form_open('/posts/delete/'.$post['id']); ?>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Do you want to delete this post?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a class="text-light" href="<?php echo base_url(); ?>posts">Close</a></button>
                <button type="submit" class="btn btn-danger">Yes</button>
            </div>
        </div>
    </div>
    </div>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button>
        <!-- <input type="submit" value="Delete" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"> -->
        </form>
    </div>

    

    <div class="col-1">
        <a  class="btn btn-primary" href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>">Edit</a>
    </div>

</div>

<small class="post-date">Posted on: <?php echo $post['created_at'];?></small><br>
<div class="post-body">
    <?php echo $post['body']; ?>
</div>