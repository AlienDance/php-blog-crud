<?php

include('./config/db_connection.php');

$sql = "SELECT * FROM blogs ORDER BY updated_at DESC";

$blogs = $conn->query($sql)->fetchAll();

$conn = null;

?>

<?php include('./templates/header.php') ?>

<div class="container my-auto">
    <?php if (!$blogs) : ?>
        <div class="text-center">
            <span class="display-6">There are no blogs...</span><br>
            <a href="create-blog.php" class="btn btn-dark my-2">Create One</a>
        </div>
    <?php endif ?>
    <?php foreach ($blogs as $blog) : ?>
        <div class="card border-dark p-3 my-2">
            <span class="lead">
                <a href="<?php echo "show-blog.php?id=" . $blog['id'] ?>" class="text-decoration-none">
                    <?php echo $blog['title'] ?>
                </a>
            </span>
            <p><?php echo substr($blog['body'], 0, 400) . '...' ?></p>
            <div class="text-end text-muted">
                <span><?php echo $blog['updated_at'] ?></span>
            </div>
        </div>
    <?php endforeach ?>
</div>

<?php include('./templates/footer.php') ?>