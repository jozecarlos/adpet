<div class="basic_form">
    <h3>Editar Pet</h3>
    <?php

    echo $this->Form->create($petForm);
    echo    $this->Form->hidden('user_id', ['default' => $this->request->getAttribute('identity')->id]);
    echo    $this->Form->text('name',['placeholder' => 'Nome','label' => false]);
    echo    $this->Form->textarea('description', ['placeholder' => 'Fale um pouco do Pet','label' => false]);
    echo '<div class="date-picker">';
    echo    $this->Form->date('birthday', [
        'templates' => [
            'dateWidget' => '{{day}}{{month}}{{year}}',
        ],
        'meridian'=> false,
        'hour'=> false,
        'minute'=> false,
        'second'=> false,
        'label' => [ 'class' => 'pet-form-label', 'text' => 'Data de Nascimento']]);
    echo '</div>';
    echo    $this->Form->file('profile_picture', ['placeholder' => 'Foto do Pet','label' => false]);
    echo    $this->Form->select('gender', ['M' => 'Macho', 'F' => 'Fêmea'], ['placeholder' => 'Sexo','label' => false]);
    echo    $this->Form->select('breed_id', $breeds, ['placeholder' => 'Raça','label' => false]);
    echo    $this->Form->submit('Salvar',['class' =>'button large']);
    echo $this->Form->end();
    ?>
</div>

