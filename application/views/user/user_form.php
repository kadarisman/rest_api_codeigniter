<?php $this->load->view('templates/header');?>
<div class="row" style="margin-bottom: 20px">
            <div class="col-md-4">
                <h2>User <?php echo $button ?></h2>
            </div>
            <div class="col-md-8 text-center">
                <div id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
        </div>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama User <?php echo form_error('nama_user') ?></label>
            <input type="text" class="form-control" name="nama_user" id="nama_user" placeholder="Nama User" value="<?php echo $nama_user; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email User <?php echo form_error('email_user') ?></label>
            <input type="text" class="form-control" name="email_user" id="email_user" placeholder="Email User" value="<?php echo $email_user; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Password User <?php echo form_error('password_user') ?></label>
            <input type="text" class="form-control" name="password_user" id="password_user" placeholder="Password User" value="<?php echo $password_user; ?>" />
        </div>
	    <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('user') ?>" class="btn btn-default">Cancel</a>
	</form><?php $this->load->view('templates/footer');?>