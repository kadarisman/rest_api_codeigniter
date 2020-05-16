<?php $this->load->view('templates/header');?>
        <div class="row" style="margin-bottom: 20px">
            <div class="col-md-4">
                <h2>User List</h2>
            </div>
            <div class="col-md-4 text-center">
                <div id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
				<div style="margin-top:20px;">
                <?php echo anchor(site_url('user/create'), 'Create', 'class="btn btn-primary"'); ?>
	    </div></div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Nama User</th>
		    <th>Email User</th>
		    <th>Password User</th>
		    <th width="200px">Action</th>
                </tr>
            </thead>
    <tbody>
    <?php foreach ($user as $key => $value) {
                    ?>
                    <tr>
                    <td><?php echo $key+1; ?></td>
                    <td><?php echo $value->nama_user; ?></td>
                    <td><?php echo $value->email_user ?></td>
                    <td><?php echo $value->password_user ?></td>
                    <td>
                    <a href="<?php echo site_url('user/update/'.$value->id_user); ?>" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                    <a href="<?php echo site_url('user/delete/'.$value->id_user); ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                    </td>
                    </tr>
                    <?php
                }?>
    </tbody>
        </table><?php $this->load->view('templates/footer'); ?>
        <script>
    $('#mytable').DataTable();
        </script>