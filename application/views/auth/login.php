<div class="container">
    
    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-7 col-lg-7 col-md-7">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                    <div class="flash-type" data-flashtype="<?= $this->session->flashdata('type'); ?>"></div>

                    
                    <div class="row">
                        <div class="col-lg-10 mx-auto">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login Page</h1>
                                </div>

                                <form action="<?= base_url('auth'); ?>" method="post" class="user">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="txtemail" placeholder="Enter email address..." value="<?= set_value('txtemail'); ?>">
                                        
                                        <!-- form validation status failed -->
                                        <?= form_error('txtemail', '<small class="text-danger ml-3">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="txtpassword" placeholder="Password">

                                        <!-- form validation status failed -->
                                        <?= form_error('txtpassword', '<small class="text-danger ml-3">', '</small>'); ?>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                    
                                </form>

                                <hr>

                                <div class="text-center">
                                    <a href="" class="small">Forgot Password</a>
                                </div>
                                <div class="text-center">
                                    <a href="<?= base_url('auth/register') ?>" class="small">Create an Account</a>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>