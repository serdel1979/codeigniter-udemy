<section class="s-featured">
    <div class="row">
        <div class="col-full">

            <form action="<?= base_url('uploadpost'); ?>" method="post" enctype="multipart/form-data">

                <input style="background-color: lightgray;padding:10px;"  placeholder="Un título" type="text" name="slug" required>

                <textarea style="width:100%;background-color: lightgray;padding:10px;" placeholder="Ingrese el texto" name="content" required></textarea>

                <select style="background-color: lightgray;padding:10px;" name="category" required>
                    <option>Seleccionar Categoría </option>
                    <?php foreach ($categories as $cat) {
                        echo "<option value=" . $cat['id'] . ">" . $cat['name'] . "</option>";
                    } ?>
                </select>

                <input style="background-color: lightgray;padding:10px;"  placeholder="Una introducción" type="text" name="intro" required>

                <input style="background-color: lightgray;padding:10px;"  placeholder="Defina tag" type="text" name="tags" required>

                <input placeholder="Seleccione una imágen" type="file" name="banner" required><br>

                <input type="submit" name="" value="Send">

            </form>
        </div>
    </div>
</section>