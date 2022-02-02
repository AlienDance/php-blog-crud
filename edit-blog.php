<?php

include('./config/db_connection.php');

$id = $_GET['id'];

$sql = "SELECT * FROM blogs WHERE blogs.id = '$id'";

$blog = $conn->query($sql)->fetch();

if (isset($_POST['update-blog'])) {

    $title = $_POST['title'];
    $body = $_POST['body'];

    $sql = "UPDATE blogs SET title = '$title', body = '$body' WHERE blogs.id = '$id'";

    $conn->query($sql);

    header("Location: show-blog.php?id=" . $id);
}

$conn = null;

?>

<?php include('./templates/header.php') ?>

<div class="container my-auto d-flex justify-content-center">
    <div class="card border-dark" style="width: 50rem">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" class="p-3">
            <p class="display-5 text-center border-bottom border-dark pb-1">Edit Blog</p>
            <label for="title" class="form-label">Title:</label>
            <input type="text" name="title" value="<?php echo $blog['title'] ?>" class="form-control mb-2" required>
            <label for="body" class="form-label">Body:</label>
            <textarea name="body" cols="30" rows="10" class="form-control" required><?php echo $blog['body'] ?></textarea>
            <div class="text-center mt-3 mb-2">
                <button class="btn btn-dark generateDataBtn">Generate Data</button>
                <button class="btn btn-success" name="update-blog">Update Blog</button>
            </div>
        </form>
    </div>
</div>

<script src="fetchdata.js"></script>

<?php include('./templates/footer.php') ?>