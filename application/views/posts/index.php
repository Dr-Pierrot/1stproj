
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
    
    <div class="container border" id="create-form">
        
        
    </div>

    <br>


    <div id="show-post"></div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    

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
                        <div class="container border">
                            <h3>${data[i].title}</h3>
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
        setInterval(fetchData, 3000); // Update every 3 seconds


        // function showForm(){
        //     var form = "";

        //     form += `
        //         <form action="">
        //             <div class="form-group">
        //                 <label>Title</label>
        //                 <input type="text" class="form-control" name="title" placeholder="Add Title">
        //             </div>
        //             <div class="form-group">
        //                 <label>Body</label>
        //                 <textarea type="text" class="form-control" name="body" placeholder="Add Body"></textarea>
        //             </div><br>
        //             <div class="row">
        //                 <div class="col-10"></div>
        //                 <div class="col-2">            
        //                     <button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#exampleModal">Submit</button><br>
        //                 </div>
        //             </div>
        //         </form>
        //     `;
        //     $('#create-form').html(form);
        // }

        var flag = true;
        $(function () {
            $("#create-post").click(function (e) {
                var form = "";
                var btn = document.getElementById("create-post");
                if(flag){
                    form += `
                    <form action="">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Add Title">
                        </div>
                        <div class="form-group">
                            <label>Body</label>
                            <textarea type="text" class="form-control" name="body" placeholder="Add Body"></textarea>
                        </div><br>
                        <div class="row">
                            <div class="col-10"></div>
                            <div class="col-2">            
                                <button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#exampleModal">Submit</button><br>
                            </div>
                        </div>
                    </form>
                `;
                    btn.style.backgroundColor = "red";
                    btn.innerHTML = "Cancel";

                }else{
                    btn.style.backgroundColor = "#5cb85c";
                    btn.innerHTML = "Create Post";
                }
                flag = !flag;
                $('#create-form').html(form);
                

                e.preventDefault();
                alert('User clicked');
        });
});
    });
</script>