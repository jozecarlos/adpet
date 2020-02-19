<div class="basic_form">
    <h3>Registre-se para Adotar um Pet</h3>
    <?php
         echo $this->Form->create($user);
         echo    $this->Form->hidden('role', ['default' => 'PUBLIC']);
         echo    $this->Form->text('name',['placeholder' => 'Nome','label' => true]);
         echo    $this->Form->text('email',['placeholder' => 'E-mail', 'type' => 'email','label' => false]);
         echo    $this->Form->password('password',['placeholder' => 'Senha','label' => false]);
         echo    $this->Form->submit('Finalizar Cadastro',['class' =>'button large']);
         echo $this->Form->end();
    ?>
</div>
