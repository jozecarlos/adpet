<div class="row no-collapse-1">
    <?php foreach ($adoptions as $adoption): ?>
        <section class="4u pet_block">
            <?= $this->Html->image("/img/uploads/".h($adoption->pet->profile_picture), [
                "alt" => h($adoption->user->name),
                "class" => "image featured",
                'url' => ['action' => 'view',  $adoption->id]
            ]); ?>
            <div class="views">Email: <?= $adoption->pet->user->email ?></div>
            <div class="box">
                <h3><strong><?= h($adoption->pet->name) ?></strong></h3>
                <p>Olá, estou no seu aguardo !!</p>
                <?php if ($this->Identity->isLoggedIn()): ?>
                <?= $this->Html->link( h('Continuar'), ['controller' => 'RequestAdoptions','action' => 'view', $adoption->id],['class' => 'button']) ?>
            </div>
        <?php endif; ?>
        </section>
    <?php endforeach; ?>
</div>


