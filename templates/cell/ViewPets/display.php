<section>
    <header class="major">
        <span>Outros bichinhos da mesma raça</span>
    </header>
    <ul class="default">
        <?php foreach ($pets as $pet): ?>
            <li><?= $this->Html->link( h($pet->name), ['action' => 'view', $pet->id]) ?> - <?= h($pet->age) ?> anos</li>
        <?php endforeach; ?>
    </ul>
</section>