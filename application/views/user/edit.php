<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit User</h1>

    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <div class="flash-type" data-flashtype="<?= $this->session->flashdata('type'); ?>"></div>

    <div class="row mt-3">
        <div class="col-md-7 mx-auto">
            <?= form_open_multipart('user/edit'); ?>
                <div class="form-group row">
                    <label for="txtname" class="col-sm-2 col-form-label">Full Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="txtname" class="form-control" value="<?= $user['name']; ?>">
                        <?= form_error('txtname', '<small class="text-danger ml-3">', '</small>'); ?>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="txtemail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" name="txtemail" class="form-control-plaintext" value="<?= $user['email']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-labe">Image</label>
                    <div class="col-sm-3">
                        <img src="<?= base_url() . 'assets/img/' . $user['image'] ?>" class="img-thumbnail">
                    </div>
                    <div class="col-sm-7">
                        <input type="file" name="txtimage" class="form-control-file">
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