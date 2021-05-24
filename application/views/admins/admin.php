<?php 
if(!$this->session->userdata('admin')){
    redirect(base_url());
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Admin Panel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.css"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="http://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top container-fluid" role="navigation">
      <div class="container">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
                <a class="navbar-brand">
                   Admin
                </a>
          </div>
     </div>
 </nav>
<div class="container padded">
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>"><i class="icon icon-home icon-dark"></i> Return to website</a></li>
        <li><i class="fa fa-list"></i> Admin Panel</li>
    </ol>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-24">
			<div class="">
				<div class="tabbable-line">
					<ul class="nav nav-tabs ">
						<li class="active">
							<a href="#tab_default_1" data-toggle="tab">Users <span class="badge badge-info"><?php echo count($users);?></span></a>
						</li>
						<li>
							<a href="#tab_default_2" data-toggle="tab">Ads <span class="badge badge-info"><?php echo count($annonces);?></span></a>
                        </li>
                        <li>
							<a href="#tab_default_3" data-toggle="tab">Admins <span class="badge badge-info"><?php echo count($admins);?></span></a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab_default_1">
							 <div class="container">
                                <h2>Users</h2>
                                <br/>
                                <table border="0" width="100%" cellpadding="0" cellspacing="0"  class="table table-striped table-bordered myTable">
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>City</th>
                                            <th>Phone</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($users as $row):?>
                                          <tr id="domain<?php echo $row->id;?>">
                                            <td><?php echo $row->firstname;?></td>
                                            <td><?php echo $row->lastname;?></td>
                                            <td><?php echo $row->email;?></td>
                                            <td><?php echo $row->city;?></td>
                                             <td><?php echo $row->tel;?></td>
                                            <td class="options-width">
                                                 <a class="btn btn-sm btn-danger" href="<?php echo base_url();?>user/delete/<?php echo $row->id;?>"><i class="fa fa-trash"></i> Delete</a>
                                            </td>
                                          </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
						</div>
						<div class="tab-pane" id="tab_default_2">
							 <div class="container">
                                <h2>Ads</h2>
                                <br/>
                                <table border="0" width="100%" cellpadding="0" cellspacing="0"  class="table table-striped table-bordered  myTable">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Body</th>
                                            <th>City</th>
                                            <th>Photo</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($annonces as $row):?>
                                          <tr id="domain<?php echo $row->id;?>">
                                            <td><?php echo $row->title;?></td>
                                            <td><?php echo $row->body;?></td>
                                            <td><?php echo $row->city;?></td>
                                             <td><img src="<?php echo base_url();?>assets/uploads/<?php echo $row->image;?>" height="50" width="50"></td>
                                            <td class="options-width">
                                                 <a class="btn btn-sm btn-danger" href="<?php echo base_url();?>ads/delete/<?php echo $row->id;?>"><i class="fa fa-trash"></i> Delete</a>
                                            </td>
                                          </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab_default_3">
							<div class="container">
                                <h2>Admins</h2>
                                <br/>
                                <table border="0" width="100%" cellpadding="0" cellspacing="0"  class="table table-striped table-bordered myTable">
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>City</th>
                                            <th>Phone</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($admins as $row):?>
                                          <tr id="domain<?php echo $row->id;?>">
                                            <td><?php echo $row->firstname;?></td>
                                            <td><?php echo $row->lastname;?></td>
                                            <td><?php echo $row->email;?></td>
                                            <td><?php echo $row->city;?></td>
                                             <td><?php echo $row->tel;?></td>
                                            <td class="options-width">
                                                <a class="btn btn-sm btn-primary" href="<?php echo base_url();?>admin/add"><i class="fa fa-user-plus"></i> Add</a> <a class="btn btn-sm btn-danger" href="<?php echo base_url();?>user/delete/<?php echo $row->id;?>"><i class="fa fa-trash"></i> Delete</a>
                                            </td>
                                          </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('layouts/footer');?>