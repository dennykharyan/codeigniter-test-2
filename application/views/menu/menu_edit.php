<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <div class="flash-type" data-flashtype="<?= $this->session->flashdata('type'); ?>"></div>
    

    <div class="row mt-3">
        <div class="col-md-6 mx-auto">
            <form action="" method="post">
                <input type="hidden" name="txtmenuid" value="<?= $menu['id'] ?>">
                <div class="form-group">
                    <input type="text" class="form-control" name="txtmenu" value="<?= $menu['menu'] ?>">
                    
                    <small class="text-danger"><?= form_error('txtmenu'); ?></small>
                </div>
        
                <a href="<?= base_url('menu') ?>" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->