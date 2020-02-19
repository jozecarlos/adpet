<div class="row no-collapse-1">

    <?php foreach ($pets as $pet): ?>
        <section class="4u pet_block">
            <?= $this->Html->image("/img/uploads/".h($pet->profile_picture), [
                "alt" => h($pet->name),
                'width' => '368px',
                "class" => "image featured",
                'url' => ['action' => 'view',  $pet->id]
            ]); ?>
            <div class="views">Visualizações: <?= $pet->views ?></div>
            <div class="box">
                <h3><strong><?= $this->Html->link( h($pet->name), ['action' => 'view', $pet->id]) ?></strong></h3>
                <p><?= h($pet->description) ?></p>
                <?php if ($this->Identity->isLoggedIn()): ?>
                     <?=
                        $this->Form->postButton('Eu quero', [
                                'controller' => 'RequestAdoptions',
                                'action' => 'add', $pet->id],  ['class' => 'button']);
                     ?>
                <?php endif; ?>
            </div>
        </section>
    <?php endforeach; ?>

</div>
<div class="row" align="center">
        <ul class="page-buttons">
            <?php
            echo $this->Paginator->prev('« Previous');
            echo $this->Paginator->numbers();
            echo $this->Paginator->next('Next »');
            ?>
        </ul>
</div>
