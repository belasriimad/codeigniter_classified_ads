<?php $this->load->view('layouts/header');
if(!$this->session->userdata('admin')){
    redirect(base_url());
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <?php echo validation_errors('<div class="alert alert-danger">','</div>');?>
            <div class="panel panel-default">
                <h4 class="panel-heading text-default" style="padding:10px;margin-top:-1px;">Add new admin</h4>
                <div class="row" style="padding:10px;">
                    <div class="col-md-8 col-md-offset-2">
                        <form action="<?php echo base_url();?>admin/store" method="post">
                            <div class="form-group">
                                <label for="name">First Name*</label>
                                <input type="text" name="nom" class="form-control" placeholder="First Name">
                            </div>
                            <div class="form-group">
                                <label for="prenom">Last Name*</label>
                                <input type="text" name="prenom" class="form-control" placeholder="Last Name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email*</label>
                                <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password*</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="city">City*</label>
                                <input type="text" name="city" class="form-control" placeholder="City">
                            </div>
                            <div class="form-group">
                                <label for="tel">Phone*</label>
                                <input type="tel" name="tel" class="form-control" placeholder="Phone">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-default" name="submit" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('layouts/footer');?>