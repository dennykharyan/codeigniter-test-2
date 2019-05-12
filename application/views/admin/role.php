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
            <button class="btn btn-outline-primary" id="btn-add-menu" data-toggle="modal" data-target="#modalRole">Add New Role</button>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-8 mx-auto">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Role</th>
                        <th colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;

                        foreach ($role as $r) {
                            # code...
                    ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $r['role']; ?></td>
                                <td>
                                     <a href="" class="btn btn-outline-warning">Edit</a>   
                                </td>
                                <td>
                                     <a href="<?= base_url('administrator/role_access/') . $r['id']; ?>" class="btn btn-outline-success">Access</a>   
                                </td>
                                <td>
                                     <a href="<?php ?>" class="btn btn-outline-danger btn-delete">Delete</a>   
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


    <div class="modal fade" id="modalRole" tabindex="-1" role="dialog" aria-labelledby="modalRoleLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalRole">Add new role</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>

                <form action="<?= base_url('administrator/role'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" name="txtrole" placeholder="Type new role">
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