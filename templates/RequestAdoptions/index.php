<div class="row no-collapse-1">

    <?php foreach ($adoptions as $adoption): ?>
        <section class="4u pet_block">
            <?php if ($adoption->user->profile_picture === NULL): ?>
                <?= $this->Html->image("/img/".($adoption->user->gender === 'M' ? "man_icon.jpg" : "woman_icon.jpg"), [
                    "alt" => h($adoption->user->name),
                    "class" => "image featured",
                    'url' => ['action' => 'view',  $adoption->id]
                ]); ?>
            <?php else: ?>
                <?= $this->Html->image("/img/uploads/".h($adoption->user->profile_picture), [
                    "alt" => h($adoption->user->name),
                    "class" => "image featured",
                    'url' => ['action' => 'view',  $adoption->id]
                ]); ?>
            <?php endif; ?>
            <div class="views">Email: <?= $adoption->user->email ?></div>
            <div class="box">
                <h3><strong><?= h($adoption->user->name) ?></strong></h3>
                <p>Olá, eu gostaria de adotar o <strong><?= h($adoption->pet->name) ?></strong></p>
                <?php if ($this->Identity->isLoggedIn()): ?>
                <?= $this->Html->link( h($adoption->user->name), ['controller' => 'RequestAdoptions','action' => 'view', $adoption->id],['class' => 'button']) ?>
               </div>
        <?php endif; ?>
        </section>
    <?php endforeach; ?>
</div>


