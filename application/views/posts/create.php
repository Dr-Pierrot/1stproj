<div class="row">
    <a href="<?php echo base_url(); ?>posts">Back</a>
    <h2><?= $title ?></h2>
</div>


<?php echo validation_errors(); ?>

<?php echo form_open('posts/create'); ?>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Do you want to save this post?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a class="text-light" href="<?php echo base_url(); ?>posts">Close</a></button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
    </div>


    <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control" name="title" placeholder="Add Title">
    </div>
    <div class="form-group">
        <label>Body</label>
        <textarea type="text" class="form-control" name="body" placeholder="Add Body"></textarea>
    </div><br>
    <button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#exampleModal">Submit</button>
</form>