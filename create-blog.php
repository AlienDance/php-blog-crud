<?php

include('./config/db_connection.php');

if (isset($_POST['create-blog'])) {

    $title = $_POST['title'];
    $body = $_POST['body'];

    $sql = "INSERT INTO blogs (title, body) VALUES ('$title', '$body')";

    $conn->query($sql);

    header('Location: index.php');
}

$conn = null;

?>

<?php include('./templates/header.php') ?>

<div class="container my-auto d-flex justify-content-center">
    <div class="card border-dark" style="width: 50rem">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" class="p-3">
            <p class="display-5 text-center border-bottom border-dark pb-1">Create Blog</p>
            <label for="title" class="form-label">Title:</label>
            <input type="text" name="title" class="form-control mb-2" required>
            <label for="body" class="form-label">Body:</label>
            <textarea name="body" cols="30" rows="10" class="form-control" required></textarea>
            <div class="text-center mt-3 mb-2">
                <button class="btn btn-dark generateDataBtn">Generate Data</button>
                <button class="btn btn-success" name="create-blog">Save Blog</button>
            </div>
        </form>
    </div>
</div>

<script src="fetchdata.js"></script>

<?php include('./templates/footer.php') ?>