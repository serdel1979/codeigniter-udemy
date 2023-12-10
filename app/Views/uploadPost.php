<form action="<?= base_url('/'); ?>" method="post" enctype="multipart/form-data">

    <input type="file" name="banner" required>

    <textarea name="content" required></textarea>

    <select name="category" required>
        <option>Seleccionar</option>
        <?php foreach ($categories as $cat) {
            echo "<option value=" . $cat['id'] . ">" . $cat['name'] . "</option>";
        } ?>
    </select>

    <input type="text" name="intro" required>

    <input type="text" name="tags" required>

    <input type="text" name="slug" required>

    <input type="submit" name="" value="Send">

</form>