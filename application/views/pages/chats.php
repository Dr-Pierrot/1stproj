<?php
  if(!$this->session->userdata('user')){
    redirect(""); 
  }
?>
<link rel="stylesheet" href="assets/chat-style.css">

<div class="container" >
    <div class="row clearfix"  >
        <div class="col-lg-12" >
            <div class="card chat-app"  style="max-height:700px;">
                <div id="plist" class="people-list">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Search...">
                    </div>
                    <ul class="list-unstyled chat-list mt-2 mb-0">
                        
                        <li class="clearfix active">
                            <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                            <div class="about">
                                <div class="name">Aiden Chavez</div>
                                <div class="status"> <i class="fa fa-circle online"></i> online </div>
                            </div>
                        </li>
                        
                    </ul>
                </div>
                
                <div class="chat"  style="overflow : auto;">
                    
                    <div class="chat-header clearfix bg-light" style="position:sticky; top: 0; left: 0; z-index: 999; width: 100%; height: 70px;">
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                                </a>
                                <div class="chat-about">
                                    <h6 class="m-b-0">Aiden Chavez</h6>
                                    <small>Last seen: 2 hours ago</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chat-history">
                        <ul class="m-b-0" id="chatbox">
                        </ul>
                    </div>
                    
                    <div class="chat-message clearfix position-sticky bottom-0 bg-light" >
                        <div class="input-group mb-0">
                            <!-- <input type="text" class="form-control" name="message" id="message_content" placeholder="Enter text here...">    -->
                            <textarea class="form-control" name="message" id="message_content" cols="30" rows="1" placeholder="Enter text here..."></textarea>                                 
                            <div class="input-group-prepend">
                                <button class="input-group-text" id="btnSend"><i class="fa fa-send"></i></button>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        // Fetch data on page load
        fetchData();

        function fetchData() {
            $.ajax({
                url: "<?php echo base_url('api/getchats'); ?>",
                type: "GET",
                async: true,
                dataType: "json",
                success: function(data) {
                    var chat_message = "";
                    

                    for(i=0;i<data.length;i++){
                        
                        const d = new Date(data[i].dateMessage);
                        const today = new Date();
                        var day = d.getDate();
                        var month = d.getMonth();
                        var hour = d.getHours();
                        var minute = d.getMinutes();
                        var pmam;
                        var yt;

                       

                        if(today.getDate() == day){
                            yt = "Today";
                        }else if(day < today.getDate()){
                            yt= "Yesterday";
                        }else if((today.getDate() - day) < 9){
                            yt = "A week ago";
                        }


                        if(hour>12){
                            pmam = "PM";
                        }else{
                            pmam = "AM";
                        }
                        

                        if(data[i].userId == <?php echo $_SESSION['user']['id']; ?>){
                            chat_message += `
                            <li class="clearfix">
                                <div class="message-data text-right">
                                    <small class="message-data-time">${hour}:${minute} ${pmam}, ${yt}</small>
                                    
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                                    <small class="bg-secondary rounded-circle p-1" >Me</small>
                                </div>
                                <div class="message other-message float-right rounded text-left"> ${data[i].message} </div>
                            </li>
                        `;
                        }else{
                            chat_message += `
                            <li class="clearfix">
                                <div class="message-data">
                                    <small class="message-data-time">${hour}:${minute} ${pmam}, ${yt}</small>
                                </div>
                                <div class="message my-message rounded"> ${data[i].message}</div>                                    
                            </li>
                        `;
                        }
                        
                        $('#chatbox').html(chat_message);

                        // alert(data[i].userId);
                    }
                    
                    
                },
                error: function() {
                    alert('Error fetching data');
                }
            });
        }
        setInterval(fetchData, 1000); // Update every 3 seconds

        // On button click, get value 
        // of input control 
        $("#btnSend").click(function () {
            const message = $("#message_content").val();
            $('#message_content').val('');
            $.ajax({
                url:"<?php echo base_url('api/insertchats');?>",
                method:'POST',
                data:{message:message},
                success:function(data){
                    
                }
            });
            return false;
            
        });




    }); 
</script>
