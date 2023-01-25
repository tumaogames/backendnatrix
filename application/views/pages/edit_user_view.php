<p class="h1 text-center">Backendnatrix</p>
<?php 
if($this->session->flashdata('errors'))
{
	echo '<div class="mx-auto text-center alert alert-danger">' . $this->session->flashdata('errors') . '</div>';
}
?>
<div class="row">
    <div class="col-2 bg-dark nopadding text-white">
    	<a href="#"><p class="h5 m-3">Users</p></a>
    	<a href="#"><p class="h5 m-3">Game Data</p></a>
    	<a href="#"><p class="h5 m-3">Settings</p></a>
    </div>
    <div class="col-10">
    	<div class="col-12 text-center bg-dark text-white"><h2 class="nopadding">Edit User <?php echo $user->username ?></h2></div>
    	
				    	<div class="bg-dark bg-gradient mybox mx-auto form-group p-5 rounded">
					<?php
					$attributes = array('id'=>'login_form', 'class'=>'form_center');
					echo form_open(base_url().'users/update/' . $user->id, $attributes);

						$attributes = array('class' => 'mycustomclass m-1 mx-auto', 'style' => 'color: #FFF;');
						echo form_label('Username', 'username', $attributes);

						$data = array('class'=>'form-control mb-2 mx-auto', 'name'=>'username', 'placeholder'=>'Enter Username', 'value' => $user->username);
						echo form_input($data);

						$attributes = array('class' => 'mycustomclass1 m-1 mx-auto', 'style' => 'color: #FFF;');
						echo form_label('Password', 'password', $attributes);

						$data = array('class'=>'form-control mb-2 mx-auto', 'name'=>'password', 'placeholder'=>'Enter Password', 'value' => $user->password);
						echo form_password($data);

						$attributes = array('class' => 'mycustomclass1 m-1 mx-auto', 'style' => 'color: #FFF;');
						echo form_label('Confirm Password', 'password_again', $attributes);

						$data = array('class'=>'form-control mb-2 mx-auto', 'name'=>'password_again', 'placeholder'=>'Confirm Password', 'value' => $user->password_again);
						echo form_password($data);

						$attributes = array('class' => 'mycustomclass1 m-1 mx-auto', 'style' => 'color: #FFF;');
						echo form_label('Email', 'email', $attributes);

						$data = array('class'=>'form-control mb-2 mx-auto', 'name'=>'email', 'placeholder'=>'Enter Email', 'value' => $user->email);
						echo form_input($data);

						$attributes = array('class' => 'mycustomclass1 m-1 mx-auto', 'style' => 'color: #FFF;');
						echo form_label('Contact number', 'contact_number', $attributes);

						$data = array('class'=>'form-control mb-5 mx-auto', 'name'=>'contact_number', 'placeholder'=>'Enter Contact Number', 'value' => $user->contact_number);
						echo form_input($data);


						$data = array('class'=>'form-control bg bg-primary mx-auto text-white', 'name'=>'register', 'value'=>'Update');
						echo form_submit($data);

					echo form_close();

					?>

				</div>

    </div>
 </div>