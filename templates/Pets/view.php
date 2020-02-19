<div id="page" class="row">

    <div id="content" class="8u skel-cell-important">
        <section>
            <header class="major">
                <h2><?= h($pet->name) ?></h2>
                <br/>
                <div class="img">
                    <?= $this->Html->image("/img/uploads/" . h($pet->profile_picture), [
                        'alt' => h($pet->name), 'width' => '368px']); ?>
                </div>
                <span class="byline">
                     <strong>Amigo:</strong> <?= h($pet->user->name) ?> <br/>
                     <strong>Raça:</strong>  <?= h($pet->breed->name) ?> <br/>
                     <strong>Idade:</strong> <?= h($pet->age) ?> anos </span>
            </header>
            <p><?= h($pet->description) ?></p>
        </section>
    </div>

    <div id="sidebar" class="4u">
        <section>
            <div align="center" style="width: 100%">
                <header class="major">
                    <h2>Perguntas</h2>
                    <br/>
                    <?php if (count($pet->messages) == 0): ?>
                        <span>Seja o primeiro a tirar suas dúvidas</span>
                    <?php endif; ?>
                </header>
            </div>

            <?php if (!empty($pet->messages)): ?>
                <table class="table comment-table">
                    <?php foreach ($pet->messages as $messages): ?>
                        <tr>
                            <td width="10%"><?= $this->Html->image("/img/user_icon.png", ['width' => '32px', 'style'=> 'padding:4px']); ?></td>
                            <td valign="top" class="message-content">
                                <span><small><strong><?php echo $messages->user->name; ?> - <?php echo $messages->created; ?></strong></small></span><br/>
                                <?php echo $messages->content; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>
        </section>


    </div>

    <div align="center" style="width: 100%">
        <?= $this->cell('ViewPets', [$pet]) ?>
    </div>
</div>

