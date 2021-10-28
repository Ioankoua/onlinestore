<div class="content-wrapper" style="width: 70vw; margin-left: 15vw;  margin-top: 20vh; background-color: #968f9c;">
    <div class="container-fluid">
        <div class="card mx-auto mt-5" style="background-color: #968f9c; border-color: #968f9c">
             <?php foreach ($cats as $prod): ?>

            <div class="my_tittle" style="margin-left: 25vw;">
                <h5>Here you can add new Category</h5>
            </div>

            <div style="margin-left: 15vw;">
                <form action="" method="post" enctype="multipart/form-data" id="ajax">

                    <input type="text" style="opacity: 0; width: 1px; height: 1px;" name="id" value="<?php echo $prod['id']; ?>">

                    <div class="form-group" style="width: 40vw; margin-top: 1vh;">
                        <label class="message_word">Edit category</label>
                        <input type="text" name="cat"class="form-control" value="<?php echo $prod['cat']; ?>">
                    </div>
                    <div class="form-group" style="width: 40vw; margin-top: 1vh;">
                        <label class="message_word">Сategory description</label>
                        <input type="text" name="catdesc"class="form-control" value="<?php echo $prod['catdesc']; ?>">
                    </div>

                    <div style="margin-top: 2vh; margin-bottom: 5vh;">
                        <button type="submit" class="btn btn-success">Edit category</button>
                    </div>

                </form>
            </div>

            <?php endforeach ?>
        </div>
    </div>
</div>