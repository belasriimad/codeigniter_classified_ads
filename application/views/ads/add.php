<?php 
if(!$this->session->userdata("logged")){
    redirect(base_url().'user/login');
} 
$this->load->view('layouts/header');
?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <?php echo validation_errors('<div class="alert alert-danger">','</div>');?>
            <?php if($this->session->flashdata('type_not_supported')):?>
                <div class="alert alert-danger">
                    <?php echo $this->session->flashdata('type_not_supported');?>
                </div>
            <?php endif;?>
            <?php if($this->session->flashdata('size_excced')):?>
                <div class="alert alert-danger">
                    <?php echo $this->session->flashdata('size_excced');?>
                </div>
            <?php endif;?>
            <div class="panel panel-default">
                <h4 class="panel-heading text-default" style="padding:10px;margin-top:-1px;">Add new ad</h4>
                <div class="row" style="padding:10px;">
                    <div class="col-md-8 col-md-offset-2">
                        <form action="#" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="cat">Category*</label>
                                <select  name="cat" class="form-control">
                                    <option selected disabled>Choose a category</option>
                                    <option value="Informatique">Informatique</option>
                                    <option value="Immobilier">Immobilier</option>
                                    <option value="Jobs">Jobs</option>
                                    <option value="Divers"> Divers</option>
                                    <option value="Animals">Animals</option>
                                    <option value="Vehicules">Vehicules</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="city">City*</label>
                                <select  name="city" class="form-control">
                                    <option selected disabled>Choose a city</option>
                                    <option value="Casablanca">Casablanca</option>
                                    <option value="Rabat">Rabat</option>
                                    <option value="Fes">Fes</option>
                                    <option value="Meknes">Meknes</option>
                                    <option value="Oujda">Oujda</option>
                                    <option value="Taza">Taza</option>
                                    <option value="Agadir">Agadir</option>
                                    <option value="Tanger">Tanger</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Title*</label>
                                <input type="text" name="title" class="form-control" placeholder="Title">
                            </div>
                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea name="body" id="" cols="30" rows="10" class="form-control" placeholder="Body"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="photo">Photo*</label>
                                <input type="file" name="photo" class="form-control">
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