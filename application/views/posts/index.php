
    <div class="row">
        <div class="col-10">
        <h2><?= $title ?></h2>
        </div>
        <div class="col-2">
            <a href="posts/create" class="btn btn-success center position-absolute bottom-0 end-0">Create Post</a>
        </div>
    </div>
    <hr>
 


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
    });
</script>