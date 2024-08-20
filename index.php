<?php

require 'users/users.php';
$users=getUser();

include 'partials/header.php';

?>
<div class="container">
    <p>
        <a class="btn btn-success" href="create.php">Create new User </a>
    </p>
<table class="table">
      <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>phone</th>
            <th>Website</th>
            <th>Actions</th>
        </tr>
      
    </thead> 
    <tbody>
        <?php foreach($users as $user):?>
        <tr>
            <td>
                
                
            <img style="width: 120px" src="<?php echo "users/images/".$user['id'].".".$user['extention'] ; ?>" alt="<?php echo "eyad" ; ?>">

            </td>
            <td><?php echo $user['name']?></td>
            <td><?php echo $user['username']?></td>
            <td><?php echo $user['email']?></td>
            <td><?php echo $user['phone']?></td>
            <td>
                <a target="_blank" href="http://<?php echo $user['website']?>">
                <?php echo $user['website']?>
                </a>
            
            </td>
            <td>
                <a href="view.php?id=<?php echo $user['id'] ?>" class="btn btn-sm btn-outline-info">View</a>
                <a href="update.php?id=<?php echo $user['id'] ?>"class="btn btn-sm btn-outline-secondary">Update</a>
                <a href="delete.php?id=<?php echo $user['id']?>"class="btn btn-sm btn-outline-danger">Delete</a>
            </td>
        </tr>
        <?php endforeach ;?>
    </tbody>
</table>
</div>
  

</body>
</html>




