<p class="h1 text-center">Backendnatrixart</p>
<div class="row">
    <div class="col-2 bg-dark nopadding text-white">
    	<a href="<?php echo base_url()?>pages/view"><p class="h5 m-3">Users</p></a>
    	<a href="#"><p class="h5 m-3">Game Data</p></a>
    	<a href="#"><p class="h5 m-3">Settings</p></a>
    </div>
    <div class="col-10">
    	<div class="col-12 text-center bg-dark text-white"><h2 class="nopadding">Users</h2></div>
    	<div class="row bg-dark pt-3 pb-3 text-white">
    		<div class="col-6 p-0">
    			<form class="d-flex">
        			<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        			<button class="btn btn-outline-success" type="submit">Search</button>
      			</form>

  			</div>
    		<div class="col-6 text-center"><a href="<?php echo base_url()?>users/register" type="button" class="btn btn-primary">Add User</a></div>
    	</div>
    	<table class="table table-dark table-hover table-striped table-bordered border-primary m-0">
		<tr class="text-center">
			<th>Id</th>
			<th>Username</th>
			<th>Password</th>
			<th>Email</th>
			<th>Contact Number</th>
			<th>Action</th>
		</tr>
		<?php foreach ($users as $key => $value) {
		echo 	'<tr><td>'.$value['id'].'</td>' 
				.'<td>'.$value['username'].'</td>'
				.'<td>'.$value['password'].'</td>'
				.'<td>'.$value['email'].'</td>'
				.'<td>'.$value['contact_number'].'</td>'
				.'<td class="text-center">'. '<a href="'. base_url() . 'pages/edit_user_view/'. $value['id'] . '" type="button" class="btn btn-primary m-1">Edit</a>'. '<a href="'. base_url() . 'users/delete/'. $value['id'] . '"type="button" class="btn btn-danger m-1">Delete</a>' .'</td></tr>';
		}
		?>
		</table>
		<div class="bg-dark text-white p-3 text-center mylinkdiv">
		<?php echo $this->pagination->create_links(); ?>
		</div>

    </div>
 </div>


