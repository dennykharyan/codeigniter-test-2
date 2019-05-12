<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">User Role</h1>

    <div class="row">
        <div class="col-lg-12">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"></h6>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php
                                    $no = 1;

                                    foreach ($user_role as $ur) {
                                        # code...
                                ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $ur['name'] ?></td>
                                            <td><?= $ur['email'] ?></td>
                                            <td><?= $ur['role'] ?></td>
                                            <td>
                                                <a href="<?= base_url('administrator/change_role/') . $ur['id'] ?>">
                                                    <button type="button" class="btn btn-outline-warning">Change Role</button>
                                                </a>
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
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->