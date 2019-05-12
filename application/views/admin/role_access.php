<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-md-6">
            <p>Role: <?= $role['role']; ?></p>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-8 mx-auto">
            <form action="<?= base_url('administrator/change_access') ?>" method="post">
                <input type="hidden" name="txtrole" value="<?= $role['id'] ?>">
                <?php
                    foreach ($menu as $m) {
                        # code...
                ?>
                        <div class="form-group row justify-content-around">
                            <label for="" class="col-sm-5 text-right"><?= $m['menu'] ?></label>
                            
                            <div class="col-sm-5 form-check">
                                <input type="checkbox" name="txtmenu[]" class="form-check-input" <?php check_access ($role['id'], $m['id']); ?> value="<?= $m['id']; ?>">
                                
                                <label for="txtmenu" class="form-check-label">Active</label>
                                
                                <a href="<?= base_url('administrator/delete_access/') . $m['id'] . '/' . $role['id'] ?>">
                                    <button type="button" class="close float-right mr-5" aria-label="Close" data-toggle="tooltip" data-placement="top" title="delete access to '<?= $m['menu']; ?>' menu">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </a>
                            </div>
                        </div>
                <?php
                    }
                ?>

                <div class="form-group row justify-content-around">
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-block btn-outline-primary">Save</button>
                    </div>    
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->