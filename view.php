<?php

require __DIR__ . "/users/user.php";
include "partials/header.php";

if (!isset($_GET['id'])) {
    include "partials/404.php";
    exit;
}
$userId = $_GET['id'];

$user = getUserById($userId);
if (!$user) {
    include "partials/404.php";
    exit;
}

?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>View User: <b><?php echo $user['name'] ?></b></h3>
        </div>
        <div class="card-body">
            <a class="btn btn-success" href="update.php?id=<?php echo $user['id'] ?>">Update</a>
            <a class="btn btn-danger" href="delete.php?id=<?php echo $user['id'] ?>">Delete</a>
        </div>
        <table class="table">
            <tbody>
                <tr>
                    <th>Image:</th>
                    <td>
                        <?php if (isset($user["extension"])) : ?>
                            <img style="width:60px" src="<?php echo "users/images/{$user['id']}.{$user['extension']}"; ?>" alt="">
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th>Name:</th>
                    <td><?php echo $user['name'] ?></td>
                </tr>
                <tr>
                    <th>UserName:</th>
                    <td><?php echo $user['username'] ?></td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td><?php echo $user['email'] ?></td>
                </tr>
                <tr>
                    <th>Phone:</th>
                    <td><?php echo $user['phone'] ?></td>
                </tr>
                <tr>
                    <th>Website:</th>
                    <td>
                        <a target="_blank" href="http://<?php echo $user['website'] ?>">
                            <?php echo $user['website'] ?>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<?php include "partials/footer.php" ?>