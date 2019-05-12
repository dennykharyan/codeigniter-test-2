<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <div class="flash-type" data-flashtype="<?= $this->session->flashdata('type'); ?>"></div>


    <div class="row mt-3">
        <div class="col-md-7 mx-auto">
            <div class="card">
                <div class="card-body">
                    <a href="<?= base_url('menu/submenu') ?>">
                        <button type="button" class="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </a>
                    
                    <h5 class="card-title text-center">Edit Submenu</h5>
                    
                    <hr>
                    
                    <form action="" method="post" class="mx-3">
                        <input type="hidden" name="txtsubmenuid" value="<?= $submenu['id'] ?>">
        
                        <div class="form-group row">
                            <label for="txtmenuid" class="col-sm-3 col-form-label">Menu Name</label>
                            <div class="col-sm-9">
                                <select name="txtmenuid" class="form-control">
                                    <option value="">-- Select Menu --</option>
                                    <?php
                                        foreach($menu as $m){
                                            if ($m['id'] == $submenu['menu_id']) {
                                                # code...
                                    ?>
                                                <option value="<?= $m['id'] ?>" selected><?= $m['menu'] ?></option>
                                    <?php
                                            }
                                            else{
                                    ?>
                                                <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                                    <?php
                                            }
                                        }
                                    ?>
                                </select>
                                
                                <small class="text-danger"><?= form_error('txtmenuid') ?></small>
                            </div>
                        </div>
        
                        <div class="form-group row">
                            <label for="txttitle" class="col-sm-3 col-form-label">Title</label>
                            <div class="col-sm-9">
                                <input type="text" name="txttitle" class="form-control" value="<?= $submenu['title']; ?>">
                                <small class="text-danger"><?= form_error('txttitle') ?></small>
                            </div>
                        </div>
        
                        <div class="form-group row">
                            <label for="txturl" class="col-sm-3 col-form-label">Url</label>
                            <div class="col-sm-9">
                                <input type="text" name="txturl" class="form-control" value="<?= $submenu['url']; ?>">
                                <small class="text-danger"><?= form_error('txturl') ?></small>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="txticon" class="col-sm-3 col-form-label">Icon</label>
                            <div class="col-sm-9">
                                <input type="text" name="txticon" class="form-control" value="<?= $submenu['icon']; ?>">
                                <small class="text-danger"><?= form_error('txticon') ?></small>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-sm-3">Active Status</div>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <?php
                                        if ($submenu['is_active'] == 1) {
                                            # code...
                                    ?>
                                            <input type="checkbox" class="form-check-input" name="txtactive" value="1" checked>
            
                                    <?php
                                        }
                                        else{
                                    ?>
                                            <input type="checkbox" class="form-check-input" name="txtactive" value="1">
                                    <?php
                                        }
                                    ?>
                                    <label for="txtactive" class="form-check-label">Is active?</label>
                                </div>
                            </div>
                        </div>
                
                        <div class="form-group-row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary float-right">Save</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->