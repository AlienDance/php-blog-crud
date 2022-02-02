<?php

include('./config/db_connection.php');

$id = $_GET['id'];

$sql = "SELECT * FROM blogs WHERE blogs.id = '$id'";

$blog = $conn->query($sql)->fetch();

if (isset($_POST['delete-blog'])) {

    $sql = "DELETE FROM blogs WHERE blogs.id = '$id'";

    $conn->query($sql);

    header('Location: index.php');
}

$conn = null;

?>

<?php include('./templates/header.php') ?>

<div class="container my-auto">
    <div class="card border-dark p-3">
        <div class="row">
            <div class="col-8 d-flex justify-content-start align-items-center">
                <span class="display-6 border-bottom border-dark pb-1" style="width: fit-content;">
                    <?php echo $blog['title'] ?>
                </span>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <a href="<?php echo "edit-blog.php?id=" . $id ?>" class="btn btn-success mx-2">Edit</a>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                    <button class="btn btn-danger" name="delete-blog">Delete</button>
                </form>
            </div>
        </div>
        <p class="my-2"><?php echo $blog['body'] ?></p>
        <div class="text-end text-muted">
            <span><?php echo $blog['updated_at'] ?></span>
        </div>
    </div>
</div>

<?php include('./templates/footer.php') ?>