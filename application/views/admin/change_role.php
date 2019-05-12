<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Change User Role</h1>

    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message') ?>"></div>
    <div class="flash-type" data-flashtype="<?= $this->session->flashdata('type') ?>"></div>

    <div class="row mt-3">
        <div class="col-md-7 mx-auto">
            <form action="" method="post">
                <input type="hidden" name="txtid" value="<?= $user_role['id']; ?>">

                <div class="form-group row">
                    <label for="txtname" class="col-sm-2 col-form-label">Full Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="txtname" class="form-control-plaintext" value="<?= $user_role['name']; ?>">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="txtemail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" name="txtemail" class="form-control-plaintext" value="<?= $user_role['email']; ?>">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="txtrole" class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-10">
                        <select name="txtrole" class="form-control">
                            <?php
                                $role = $this->db->get('user_role')->result_array();

                                foreach ($role as $r) {
                                    # code...
                                    if ($r['id'] == $user_role['role_id']) {
                                        # code...
                            ?>
                                        <option value="<?= $r['id'] ?>" selected><?= $r['role'] ?></option>
                            <?php
                                    }
                                    else{
                            ?>
                                        <option value="<?= $r['id'] ?>"><?= $r['role'] ?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>


                <div class="form-group form-check row">
                    <div class="col-sm-10 offset-md-2">
                        <input type="checkbox" name="txtactive" class="form-check-input" value="1">
                        <label class="form-check-label" for="txtactive">Active</label>
                    </div>
                </div>
                

                <div class="form-group row">
                    <div class="col-md-10 offset-md-2">
                        <button type="submit" class="btn btn-outline-primary">Save Change</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->