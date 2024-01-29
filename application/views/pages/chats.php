<?php
  if(!$this->session->userdata('user')){
    redirect(""); 
  }
?>


<div class="container" >
    <div class="row clearfix"  >
        <div class="col-lg-12" >
            <div class="card chat-app"  style="max-height:700px;height:700px;">
                <div id="plist" class="people-list">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Search...">
                    </div>
                    <ul class="list-unstyled chat-list mt-2 mb-0" id="userBox">
                    </ul>
                </div>
                
                <div class="chat" style="overflow: auto; display: flex; flex-direction: column; height: 700px;" id="chatView">
                    <div class="chat-header clearfix bg-light" style="height: 70px;">
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                                </a>
                                <div class="chat-about" id="userHeader">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chat-history" id="chatBoxP" style="flex: 1; overflow-y: auto; height: 100%; display: flex; flex-direction: column-reverse;">
                        <ul class="m-b-1" id="chatbox">
                        </ul>
                    </div>
                    <div class="chat-message clearfix bg-light" style="margin-top: 20px;">
                        <div class="input-group mb-0" id="chatsBox">
                            <input type="hidden" name="mateId" id="mateId">
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
<script>
    $(document).ready(function () {
        // Fetch data on page load
        fetchUsers();
        function fetchUsers(){
            $.ajax({
                url:"<?php echo base_url('api/getusers'); ?>",
                method: "GET",
                async: false,
                dataType: "json",
                success:function(data){
                    var user_list = "";
                    var user = <?php echo $_SESSION['user']['id']; ?>;

                    for(i=0;i<data.length;i++){
                        var status;
                        if(data[i].status==0){
                            status = 'offline';
                        }else{
                            status = 'online';
                        }

                        if(data[i].id != user){
                            user_list += `
                            <li class="clearfix luser" id="${data[i].id}">
                                <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                                <div class="about">
                                    <div class="name">${data[i].name}</div>
                                    <div class="status"> <i class="fa fa-circle ${status}"></i>${status} </div>
                                </div>
                            </li>
                            `;
                        }
                        
                    }

                    $('#userBox').html(user_list);
                }
            });
        }
        setInterval(fetchUsers, 1000);


        $(document).on('click', '.luser', function(){
            var header = "";
            var id = $(this).attr('id');
            var x = document.getElementById("mateId").value = id;
            fetchData();
            // $('#chatbox').html(' ');
            $.ajax({
                url:"<?php echo base_url('api/getusers'); ?>",
                method: "GET",
                dataType: "json",
                async: true,
                success: function(data){
                    
                    $('#chatbox').html('');
                    var header = "";
                    for(i=0;i<data.length;i++){
                        did = data[i].id;
                        const today = new Date();
                        const logout= new Date(data[i].logout_at);
                        const login = new Date(data[i].login_at);
                                         
                        console.log(<?php echo isset($_SESSION['user']);?>);

                        if(id == did){
                            header += `
                                <input type="hidden" id="head" value="${did}">
                                <h6 class="m-b-0">${data[i].name}</h6>
                            `;
                            if(data[i].status == 1){
                                header += `
                                    <small>Status: Online</small>
                                `;
                            }else{
                                if((logout.getDate() - login.getDate()) > 0){
                                    header += `
                                    <small>Last seen: Day/s ago</small>
                                    `;
                                }else{
                                    if(logout.getHours() > 0){
                                    header += `
                                    <small>Last seen: Hour/s ago</small>
                                    `;
                                }}
                                
                                
                            }
                        }
                    }
                    
                    $('#userHeader').html(header);
                }
            });
            
            
        });

    

        function fetchData() {
            var header = $("#head").val();
            var user = <?php echo $_SESSION['user']['id'] ?>;
            $.ajax({
                url: "<?php echo base_url('api/getchats'); ?>",
                type: "GET",
                async: true,
                data:{user: user, mate: header},
                dataType: "json",
                success: function(data) {
                    var chat_message = "";
                    
                    if(!header){
                        $('#chatbox').html('<p>Please Select a user</p>');
                    }else if(data.length === 0){
                        $('#chatbox').html('<p>Please message the user!</p>');
                    }else{
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
                    
                            if(data[i].userId == user){
                                chat_message += `
                                <li class="clearfix" >
                                    <div class="message-data text-right">
                                        <small class="message-data-time">${hour}:${minute} ${pmam}, ${yt}</small>
                                        
                                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                                        <small class="bg-secondary rounded-circle p-1" >Me</small>
                                    </div>
                                    <div class="message other-message float-right rounded text-left"> ${data[i].message} </div>
                                </li>
                                `;
                            }else if(data[i].mateId == user){
                                chat_message += `
                                <li class="clearfix">
                                    <div class="message-data">
                                        <small class="message-data-time">${hour}:${minute} ${pmam}, ${yt}</small>
                                    </div>
                                    <div class="message my-message rounded" style="max-width:500px;"> ${data[i].message}</div>                                  
                                </li>
                                `;
                            }
                            $('#chatbox').html(chat_message);
                        }
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
            var mateId = $("#mateId").val();
            const message = $("#message_content").val();
            
            if(mateId ==0){
                alert("Choose a user to message!");
                $('#message_content').val('');
            }else{
                $('#message_content').val('');
                $.ajax({
                url:"<?php echo base_url('api/insertchats');?>",
                method:'POST',
                data:{message:message, mateId:mateId},
                success:function(data){
                    
                }
                });
                return false;
            }
        });
        


    }); 
</script>

