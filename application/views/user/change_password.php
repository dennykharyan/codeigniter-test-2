<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Change Password</h1>


    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <div class="flash-type" data-flashtype="<?= $this->session->flashdata('type'); ?>"></div>


    <div class="row">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="form-group">
                    <label for="txtoldpassword">Current Password</label>
                    <input type="password" name="txtoldpassword" class="form-control">
                    <small class="text-danger"><?= form_error('txtoldpassword'); ?></small>
                </div>
                <div class="form-group">
                    <label for="txtnewpassword">New Password</label>
                    <input type="password" name="txtnewpassword" class="form-control">
                    <small class="text-danger"><?= form_error('txtnewpassword'); ?></small>
                </div>
                <div class="form-group">
                    <label for="txtnewpassword2">Retype New Password</label>
                    <input type="password" name="txtnewpassword2" class="form-control">
                    <small class="text-danger"><?= form_error('txtnewpassword2'); ?></small>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-primary">Save Change</button>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->