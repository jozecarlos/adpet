<div class="row no-collapse-1">
    <section class="4u pet_block">
        <?= $this->Html->image("/img/dog_icon.png", [
            "alt" => 'Cadastro de PET',
            'width' => '368px',
            "class" => "image featured",
            'url' => ['action' => 'add']
        ]); ?>
        <div class="views"><a>&nbsp;</a></div>
        <div class="box">
            <h3><strong>Anunciar Pet</strong></h3>
            <p>Cadastre as informações do seu pet aqui, quando finalizado, ficará disponível no sistema até ser adotado.</p>
            <div class="actions">
                <?= $this->Html->link('<i class="fa fa-plus"></i>','/pet/add/', ['class' => 'button','escape' => false]) ?>
            </div>
        </div>
    </section>
    <?php foreach ($pets as $pet): ?>
        <section class="4u pet_block">
            <?= $this->Html->image("/img/uploads/".h($pet->profile_picture), [
                "alt" => h($pet->name),
                "class" => "image featured",
                'width' => '368px',
                'url' => ['action' => 'view',  $pet->id]
            ]); ?>
            <div class="views">
                <?php if ($requestAdoptionsCount > 0): ?>
                    <?= $this->Html->link('Pedidos: '.$requestAdoptionsCount,
                        ['controller' => 'RequestAdoptions', 'action' => 'index', $pet->id]) ?> -
                <?php endif; ?>
                Visualizações: <?= $pet->views ?>
            </div>
            <div class="box">
                <h3><strong><?= $this->Html->link( h($pet->name), ['action' => 'view', $pet->id]) ?></strong></h3>
                <p><?= h($pet->description) ?></p>
                 <div class="actions">
                    <?= $this->Html->link('<i class="fa fa-trash-o"></i>',
                        ['controller'=>'pets','action'=>'delete',$pet->id],
                        ['confirm'=>'Are you sure you want to delete the image?','class' => 'button','escape' => false]); ?>
                    <?= $this->Html->link('<i class="fa fa-edit"></i>','/pet/edit/'.$pet->id, ['class' => 'button','escape' => false]) ?>
                </div>
            </div>
        </section>
    <?php endforeach; ?>

</div>
