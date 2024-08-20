<?php

include 'partials/header.php';
require __DIR__.'/users/users.php';

$userId=$_GET['id'];

$user=getUserByID($userId);

if(!$user)
{
    include'partials/not_found.php';
    exit;
}




if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    $user = array_merge($user, $_POST);

    $file_extension = uploadImage($_FILES, $user);

    if ($file_extension) 
    {
        $user['picture'] = $user['id'] . '.' . $file_extension;
        $user['extension'] = $file_extension;
        updateUser($user, $user['id']);
    } 
    else 
    {
        updateUser($_POST, $user['id']);
    }

    header('Location: index.php');
    exit;
}


?>


<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>
                <?php if ($user['id']): ?>
                    Update user <b><?php echo $user['name'] ?></b>
                <?php else: ?>
                    Create new User
                <?php endif ?>
            </h3>
        </div>
        <div class="card-body">
        <form method="POST" enctype="multipart/form-data"
                  action="">
                <div class="form-group">
                    <label>Name</label>
                    <input name="name" value="<?php echo $user['name'] ?>"
                          class="form-control <?php echo $errors['name'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo  $errors['name'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input name="username" value="<?php echo $user['username'] ?>"
                           class="form-control <?php echo $errors['username'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo  $errors['username'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input name="email" value="<?php echo $user['email'] ?>"
                    
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input name="phone" value="<?php echo $user['phone'] ?>"
                           class="form-control  <?php echo $errors['phone'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo  $errors['phone'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Website</label>
                    <input name="website" value="<?php echo $user['website'] ?>" >
                </div>
                
                
                <div class="form-group">
                    <label>Image</label>

                    <?php 

                                            if($user['extention'] != "")
                                            {
                                                ?>
                                                   <img style="width: 400px" src="<?php echo "users/images/".$user['id'].".".$user['extention'] ; ?>" alt="<?php echo "eyad" ; ?>">

                                                <?php

                                            }
                                            else
                                            {
                                                echo "Image Not Added";
                                            }

                                        ?><br><br>

                    <input name="picture" type="file" class="form-control-file" value=""  >
                </div>
                
                <button class="btn btn-success">Submit</button>
            </form>
    </div>    
</div>