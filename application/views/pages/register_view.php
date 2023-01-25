<style>
	.mybox
	{
		width: 400px;
		box-shadow: 4px 4px 4px #D0D0D0;
	}
</style>

<h1 class="text-center m-3">Backendnatrix</h1>
<?php 
if($this->session->flashdata('errors'))
{
	echo '<div class="mx-auto text-center alert alert-danger">' . $this->session->flashdata('errors') . '</div>';
}
?>
<div class="bg-dark bg-gradient m-4 mybox mx-auto form-group rounded p-4">
		<p class="text-center mb-3 text-white h5">Register</p>
	<?php
	$attributes = array('id'=>'login_form', 'class'=>'form_center');
	echo form_open('users/register', $attributes);

		$attributes = array('class' => 'mycustomclass m-1 mx-auto', 'style' => 'color: #FFF;');
		echo form_label('Username', 'username', $attributes);

		$data = array('class'=>'form-control mb-2 mx-auto', 'name'=>'username', 'placeholder'=>'Enter Username');
		echo form_input($data);

		$attributes = array('class' => 'mycustomclass1 m-1 mx-auto', 'style' => 'color: #FFF;');
		echo form_label('Password', 'password', $attributes);

		$data = array('class'=>'form-control mb-2 mx-auto', 'name'=>'password', 'placeholder'=>'Enter Password');
		echo form_password($data);

		$attributes = array('class' => 'mycustomclass1 m-1 mx-auto', 'style' => 'color: #FFF;');
		echo form_label('Confirm Password', 'password_again', $attributes);

		$data = array('class'=>'form-control mb-2 mx-auto', 'name'=>'password_again', 'placeholder'=>'Confirm Password');
		echo form_password($data);

		$attributes = array('class' => 'mycustomclass1 m-1 mx-auto', 'style' => 'color: #FFF;');
		echo form_label('Email', 'email', $attributes);

		$data = array('class'=>'form-control mb-2 mx-auto', 'name'=>'email', 'placeholder'=>'Enter Email');
		echo form_input($data);

		$attributes = array('class' => 'mycustomclass1 m-1 mx-auto', 'style' => 'color: #FFF;');
		echo form_label('Contact number', 'email', $attributes);

		$data = array('class'=>'form-control mb-5 mx-auto', 'name'=>'contact_number', 'placeholder'=>'Enter Contact Number');
		echo form_input($data);


		$data = array('class'=>'form-control bg bg-primary mb-2 mx-auto text-white', 'name'=>'register', 'value'=>'Register');
		echo form_submit($data);

	echo form_close();

	?>
	<a href="<?php echo base_url();?>home/view" class="text-center mb-3 text-white ">Login</a>

</div>

