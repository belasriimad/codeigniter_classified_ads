<?php $this->load->view('layouts/header');?>
<div class="container">
    <?php $this->load->view('layouts/jumbotron');?>
    <div class="row">
        <div class="col-md-8">
            <div class="panel">
                <h3 class="text-default" style="padding:10px;">
                    <?php 
                      if($this->uri->segment(3) == "V%C3%A9hicules"){
                          echo str_replace('%C3%A9','é',$this->uri->segment(3));
                      }else if($this->uri->segment(3) == "Vente%20Divers"){
                          echo str_replace('%20',' ',$this->uri->segment(3));
                      }else{
                          echo $this->uri->segment(3);
                      }
                    ?> 
                <span class="badge"> <?php echo count($annonces);?></span></h3>
                <hr>
                <div class="row" style="padding:10px;">
                <?php foreach($annonces as $annonce):?>
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                               <img class="media-object thumbnail" width="237" src="<?php  echo base_url();?>/assets/uploads/<?php echo $annonce->image;?>" height="150" alt="...">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo $annonce->title;?></h4>
                            <p><?php echo $annonce->body;?></p>
                            <p><a href="<?php echo base_url();?>ads/view/<?php echo $annonce->id;?>" class="btn btn-link">Read More <i class="fa fa-arrow-right"></i></a></p>
                        </div>
                        <div class="media-footer" align="right">
                            <span class="label label-success"><i class="fa fa-tag"></i><?php echo $annonce->category;?></span>
                            <span class="label label-warning"><i class="fa fa-calendar"></i> <?php echo $annonce->created;?></span>
                        </div>
                    </div>
                    <hr>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
        <?php $this->load->view('layouts/cities');?>
    </div>
</div>
<?php $this->load->view('layouts/footer');?>