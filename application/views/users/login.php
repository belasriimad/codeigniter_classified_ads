<?php $this->load->view('layouts/header');?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <?php echo validation_errors('<div class="alert alert-danger">','</div>');?>
            <?php if($this->session->flashdata('login_failed')):?>
                <div class="alert alert-danger">
                    <?php echo $this->session->flashdata('login_failed');?>
                </div>
            <?php endif;?>
            <div class="panel panel-default">
                <h4 class="panel-heading text-default" style="padding:10px;margin-top:-1px;">Login</h4>
                <div class="row" style="padding:10px;">
                    <div class="col-md-8 col-md-offset-2">
                        <form action="#" method="post">
                            <div class="form-group">
                                <label for="email">Email*</label>
                                <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de passe*</label>
                                <input type="password" name="password" class="form-control" placeholder="Passe">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-default" name="submit" value="Valider">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('layouts/footer');?>