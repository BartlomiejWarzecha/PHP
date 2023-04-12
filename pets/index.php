<?php require 'layout/header.php';
require 'lib/functions.php';
?>

    <div class="container">
        <div class="row">
            <div class="col-xs-6"><p>Home!</p></h1>
            </div>
        </div>
    </div>

    <?php $cutePet[] = getPetMYSQL(1);
        var_dump($cutePet);
        echo $cutePet[0]['id'];
?>


    <h2>
        <a href="<?php __DIR__?>show.php?id=<?php echo $cutePet[0]['id'] ?>">
            <?php echo $cutePet[0]['name']; ?>
        </a>
    </h2>

<?php
?>
<?php require 'layout/footer.php'; ?>