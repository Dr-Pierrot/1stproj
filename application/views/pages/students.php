<?php
  if(!$this->session->userdata('user')){
    redirect(""); 
  }
?>
<h2><?= $title ?></h2>

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Student ID</th>
      <th scope="col">Full Name</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($users as $user):?>
        <tr>
            <td><?php echo $user['studentID'] ?></td>
            <td><?php echo $user['name'] ?></td>
            <td><?php echo $user['email'] ?></td>
        </tr>
            
    


    <?php endforeach?>

  </tbody>
</table>
