<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="modal fade in" id="modal-default" style="display: none; padding-right: 15px;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title">Esqueci minha senha</h4>
			</div>
			<div class="modal-body text-center">
				<input type="text" name="resend_password" id="resend_password" style="width: 90%;" placeholder="Digite aqui seu e-mail">
			</div>
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn btn-danger">Fechar</button>
                <button type="button" id='submit-resend-password' class="btn btn-success" onClick="resendPassword();">Redefinir Senha</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Login') ?></legend>
        <?php
            echo $this->Form->control('EmailUser');
            echo $this->Form->control('Password', ['type' => 'password']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
    <div class="text-right">
    	<a href="#" data-toggle="modal" data-target="#modal-default">Forgot Password?</a>
    </div>
</div>

<script>
function resendPassword(){
	var email = ($('#resend_password').val());
	if(email){
		$('.modal-body').html("Enviando...");
		$.ajax({
			method: 'POST',		
			url: "<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'resendPassword']); ?>",
			data: {EmailUser: email },
		}).done(function(data){
			console.log(data);
			if(data == "1"){
				$('#submit-resend-password').hide();
				$('.modal-body').html("<span style='color:green;'>Verify your email box.</span>");
			} else{
				$('#submit-resend-password').hide();
				$('.modal-body').html("<span style='color:red;'>E-mail not found.</span>");
			}
		});
	}
}
</script>