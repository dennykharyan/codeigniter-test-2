<div class="container">
    
    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-7 col-lg-7 col-md-7">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-10 mx-auto">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                </div>

                                <form action="<?= base_url('auth/register'); ?>" method="post" class="user">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="txtname" placeholder="Full Name" value="<?= set_value('txtname'); ?>">
                                        
                                        <!-- form validation status failed -->
                                        <?= form_error('txtname', '<small class="text-danger ml-3">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="txtemail" placeholder="Email Address" value="<?= set_value('txtemail'); ?>">
                                        
                                        <!-- form validation status failed -->
                                        <?= form_error('txtemail', '<small class="text-danger ml-3">', '</small>'); ?>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user" name="txtpassword" placeholder="Password">
                                            
                                            <!-- form validation status failed -->
                                            <?= form_error('txtpassword', '<small class="text-danger ml-3">', '</small>'); ?>
                                        </div>

                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user" name="txtrepassword" placeholder="Repeat Password">
                                            
                                            <!-- form validation status failed -->
                                            <?= form_error('txtrepassword', '<small class="text-danger ml-3">', '</small>'); ?>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">Register Account</button>

                                </form>
                                
                                <hr>

                                <div class="text-center">
                                    <a class="small" href="">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth') ?>">Already have an account? Login!</a>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>