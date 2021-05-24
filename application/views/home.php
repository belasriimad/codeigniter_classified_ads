<?php 
$this->load->view('layouts/header');
function tokenTruncate($string, $your_desired_width) {
    $parts = preg_split('/([\s\n\r]+)/', $string, null, PREG_SPLIT_DELIM_CAPTURE);
    $parts_count = count($parts);
    $length = 0;
    $last_part = 0;
    for (; $last_part < $parts_count; ++$last_part) {
        $length += strlen($parts[$last_part]);
        if ($length > $your_desired_width) { break; }
    }
    return implode(array_slice($parts, 0, $last_part));
} 
?>
<div class="container">
    <?php $this->load->view('layouts/jumbotron');?>
    <?php if($this->session->flashdata('registred')):?>
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('registred');?>
        </div>
    <?php endif;?>
    <?php if($this->session->flashdata('annonce_added')):?>
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('annonce_added');?>
        </div>
    <?php endif;?>
    <div class="row">
        <div class="col-md-8">
            <div class="panel">
                <h3 class="text-default" style="padding:10px;">Choose a category</h3>
                <hr>
                <div class="row" style="padding:10px;">
                    <div class="col-sm-4 col-md-4">
                        <div class="thumbnail">
                            <img src="<?php echo base_url();?>assets/uploads/informatiques.jpg" alt="...">
                            <div class="caption" align="center">
                                <p><a href="<?php echo base_url();?>ads/category/Informatique" class="btn btn-link" role="button">Informatiques</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="thumbnail">
                            <img src="<?php echo base_url();?>assets/uploads/immobilier.jpg" alt="...">
                            <div class="caption" align="center">
                                <p><a href="<?php echo base_url();?>ads/category/Immobilier" class="btn btn-link" role="button">Immobilier</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="thumbnail"> 
                            <img src="<?php echo base_url();?>assets/uploads/emplois.jpg" alt="...">
                            <div class="caption" align="center">
                                <p><a href="<?php echo base_url();?>ads/category/Jobs" class="btn btn-link" role="button">Jobs</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="thumbnail">
                            <img src="<?php echo base_url();?>assets/uploads/ventes.jpg" alt="...">
                            <div class="caption" align="center">
                                <p><a href="<?php echo base_url();?>ads/category/Divers" class="btn btn-link" role="button">Divers</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="thumbnail">
                            <img src="<?php echo base_url();?>assets/uploads/animaux.jpg" alt="...">
                            <div class="caption" align="center">
                                <p><a href="<?php echo base_url();?>ads/category/Animals" class="btn btn-link" role="button">Animals</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="thumbnail">
                            <img src="<?php echo base_url();?>assets/uploads/vehicules.jpg" alt="...">
                            <div class="caption" align="center">
                                <p><a href="<?php echo base_url();?>ads/category/Vehicules" class="btn btn-link" role="button">Vehicules</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('layouts/cities');?>
    </div>
    <div class="container" style="margin-top:50px">
    <h3 class="text-info" style="text-transform:uppercase;font-weight:700">Latest ads</h3>
    <hr>
    <div class="container">
        <div class="row">          
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <?php foreach($annonces as $annonce):?>
                            <div class="col-sm-8">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="<?php echo base_url();?>ads/view/<?php echo $annonce->id;?>">
                                            <img class="media-object thumbnail" width="237" src="<?php  echo base_url();?>/assets/uploads/<?php echo $annonce->image;?>" height="150" alt="...">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading"><?php echo $annonce->title;?></h4>
                                        <p><?php echo $annonce->body;?></p>
                                        <p><a href="<?php echo base_url();?>ads/view/<?php echo $annonce->id;?>" class="btn btn-link">Read more <i class="fa fa-arrow-right"></i></a></p>
                                    </div>
                                    <div class="media-footer" align="right">
                                        <span class="label label-success"><i class="fa fa-tag"></i><?php echo $annonce->category;?></span>
                                        <span class="label label-warning"><i class="fa fa-calendar"></i> <?php echo $annonce->created;?></span>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <?php endforeach;?>
                        </div>
                        <a href="<?php echo base_url();?>ads" class="btn btn-primary pull-right">All Ads</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->load->view('layouts/footer');?>