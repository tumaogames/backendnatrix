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
		<p class="text-center mb-3 text-white h5">Login</p>
	<?php
	$attributes = array('id'=>'login_form', 'class'=>'form_center');
	echo form_open('users/login', $attributes);

		$attributes = array('class' => 'mycustomclass m-1 mx-auto', 'style' => 'color: #FFF;');
		echo form_label('Username', 'username', $attributes);

		$data = array('class'=>'form-control mb-2 mx-auto', 'name'=>'username', 'placeholder'=>'Enter Username');
		echo form_input($data);

		$attributes = array('class' => 'mycustomclass1 m-1 mx-auto', 'style' => 'color: #FFF;');
		echo form_label('Password', 'password', $attributes);

		$data = array('class'=>'form-control mb-5 mx-auto', 'name'=>'password', 'placeholder'=>'Enter Password');
		echo form_password($data);

		$data = array('class'=>'form-control bg bg-primary mb-2 mx-auto text-white', 'name'=>'login', 'value'=>'Login');
		echo form_submit($data);

	echo form_close();

	?>
		<a href="<?php echo base_url();?>pages/register" class="text-center mb-3 text-white ">Register</a>
</div>



