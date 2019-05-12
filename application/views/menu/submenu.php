<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <div class="flash-type" data-flashtype="<?= $this->session->flashdata('type'); ?>"></div>

    <?php 
        if (validation_errors()) {
            # code...
    ?>
            <div class="alert text-danger alert-dismissible fade show" role="alert">
                <?= validation_errors(); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
            </div>
    <?php
        }
    ?>

    <div class="row">
        <div class="col-md-6">
            <button class="btn btn-outline-primary" id="btn-add-menu" data-toggle="modal" data-target="#ModalSubmenu">Add New Submenu</button>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md mx-auto">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Menu</th>
                        <th>Title</th>
                        <th>Url</th>
                        <th>Icon</th>
                        <th>Is Active</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;

                        foreach ($submenu as $sm) {
                            # code...
                    ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $sm['menu']; ?></td>
                                <td><?= $sm['title']; ?></td>
                                <td><?= $sm['url']; ?></td>
                                <td><?= $sm['icon']; ?></td>
                                <td>
                                    <?php
                                        if ($sm['is_active'] == 1) {
                                            # code...
                                            echo "Yes";
                                        }
                                        else{
                                            echo "No";
                                        }
                                    ?>
                                </td>
                                <td>
                                     <a href="<?= base_url('menu/submenu_edit/') . $sm['id']; ?>" class="btn btn-outline-warning">Edit</a>   
                                </td>
                                <td>
                                     <a href="<?= base_url('menu/submenu_delete/') . $sm['id']; ?>" class="btn btn-outline-danger btn-delete">Delete</a>   
                                </td>
                            </tr>
                    <?php
                            $no++;
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>


    <div class="modal fade" id="ModalSubmenu" tabindex="-1" role="dialog" aria-labelledby="ModalMenuLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalSubmenu">Add new submenu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>

                <form action="<?= base_url('menu/submenu'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" name="txttitle" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <select name="txtmenu" class="form-control">
                                <option value="null">-- Select Menu --</option>
                                <?php
                                    foreach ($menu as $row) {
                                        # code...
                                ?>
                                        <option value="<?= $row['id'] ?>"><?= $row['menu']; ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="txturl" placeholder="Url">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="txticon" placeholder="Icon">
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="txtactive" value="1">
                                <label for="txtactive" class="form-check-label">Is active?</label>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->