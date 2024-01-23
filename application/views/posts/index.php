<?php
  if(!$this->session->userdata('user')){
    redirect(""); 
  }
?>
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

    <div class="row">
        <div class="col-10">
        <h2><?= $title ?></h2>
        </div>
        <div class="col-2">
            <!-- <a href="posts/create" class="btn btn-success center position-absolute bottom-0 end-0">Create Post</a> -->
            
            <button type="button" class="btn btn-success center position-absolute bottom-0 end-0" id="create-post">Create Post</button>

        </div>
    </div>
    <hr>
    
    <div class="container border border-dark" id="create-form">

        <form method="post" id="create1">
            <div class="form-group mt-3 fs-4 fw-bolder">
                <label>Title</label>
                <input type="text" class="form-control" name="title" placeholder="Add Title">
            </div>
            <div class="form-group fs-4 fw-bolder">
                <label>Body</label>
                <textarea type="text" class="form-control" name="body" placeholder="Add Body"></textarea>
            </div><br>
            <div class="row">
                <div class="col-10"></div>
                <div class="col-2">
                    <button type="submit" class="btn btn-primary">Submit</button><br>
                </div>
            </div>
        </form>
    </div>

    <br>


    <div id="show-post"></div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <div class="col-10">

    </div>
    <div class="col-2">

    </div>

<script>

    // Ajax
    $(document).ready(function() {
        // Fetch data on page load
        fetchData();

        function fetchData() {
            $.ajax({
                url: "<?php echo base_url('api/getposts'); ?>",
                type: "GET",
                async: true,
                dataType: "json",
                success: function(data) {
                    var i;
                    var txt = "";
                    
                    for(i=0; i<data.length; i++){
                        txt += ` 
                        <div class="container border rounded">
                            <div class="row mt-3">
                                <div class="col-10">
                                    <h3>${data[i].title}</h3>
                                </div>
                                <div class="col-2">
                                    <button type="submit" class="btn btn-danger delete" id="${data[i].id}">Delete</button>
                                </div>
                            </div>
                            <small class="post-date">Posted on: ${data[i].created_at}</small>
                            <p>${data[i].body}</p>
                            <br><br>
                            <p><a class="btn btn-primary" href="posts/${data[i].slug}">Read More</a></p>
                        </div><br>
                        `;
                    

                    }
                    // document.getElementById("show-post").innerHTML = txt;
                
                    
                    $('#show-post').html(txt);
                    
                },
                error: function() {
                    alert('Error fetching data');
                }
            });
        }
        setInterval(fetchData, 1000); // Update every 3 seconds

        $('form#create1').submit(function(){
            var formData = $(this).serialize();
            var form = document.getElementById('create1');
            console.log(formData);
            $.ajax({
                url:"<?php echo base_url('api/insertposts'); ?>",
                type:"POST",
                dataType:"json",
                data:formData,
                success: function(data){
                    form.reset();
                }
            });
            return false;
        });

    
        $(document).on('click', '.delete', function(){
            var id = $(this).attr('id');
            if(confirm("Are you sure you want to delete this?"))  
            {  
                    $.ajax({  
                        url:"<?php echo base_url(); ?>api/deleteposts",  
                        method:"POST",  
                        data:{id:id},  
                        success:function(data)  
                        {  

                            // dataTable.ajax.reload();
                        }  
                    });  
            }  
            else  
            {  
                    return false;       
            }  
        }); 
    });
</script>