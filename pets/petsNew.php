<?php require __DIR__.'/layout/header.php'; ?>
<?php require __DIR__.'/lib/functions.php'; ?>

    <h1>Add your Pet</h1>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (isset($_POST['name'])) {
            $name = $_POST['name'];
        } else {
            $name = 'A dog without a name';
        }
        if (isset($_POST['breed'])) {
            $breed = $_POST['breed'];
        } else {
            $breed = '';
        }
        if (isset($_POST['weight'])) {
            $weight = $_POST['weight'];
        } else {
            $weight = '';
        }
        if (isset($_POST['bio'])) {
            $bio = $_POST['bio'];
        } else {
            $bio = '';
        }

        $pets = getPetsJSON();
        $newPet = array(
            'name' => $name,
            'breed' => $breed,
            'weight' => $weight,
            'bio' => $bio,
            'image' => '',
            'age' => '',
        );

        $pets[] = $newPet;
        savePetsJSON($pets);

        $newPets = getPetsJSON();
        var_dump($newPets);

        // header('Location: /index.php');die;
    }
?>
    <form class = "perForm" action="<?php echo __DIR__?>/petsNew.php" method="POST"  -->
        <div class="form-group">
            <label for="pet-name" class="control-label">Pet Name</label>
            <input type="text" name="name" id="pet-name" class="form-control" />
        </div>
        <div class="form-group">
            <label for="pet-breed" class="control-label">Breed</label>
            <input type="text" name="breed" id="pet-breed" class="form-control" />
        </div>
        <div class="form-group">
            <label for="pet-weight" class="control-label">Weight</label>
            <input type="number" name="weight" id="pet-weight" class="form-control" />
        </div>
        <div class="form-group">
            <label for="pet-bio" class="control-label">Pet Bio</label>
            <textarea name="bio" id="pet-bio" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">
            <span class="glyphicon glyphicon-heart"></span> Add
        </button>

    </form>

<h3>
   Browser information  <?php echo $_SERVER['HTTP_SEC_CH_UA']?>
    Ip address USER, SERVER = <?php echo $_SERVER['REMOTE_ADDR']." ".$_SERVER['SERVER_ADDR']?>
</h3>

<?php require __DIR__.'/layout/footer.php'; ?>

