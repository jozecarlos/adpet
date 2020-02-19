<div id="page" class="row">
    <div id="content" class="8u skel-cell-important">
        <?php if($this->request->getAttribute('identity')->id == $adoption->user->id): ?>
            <section>
                <header class="major">
                    <h2><?= h($adoption->pet->user->name) ?></h2>
                    <br/>
                    <div class="img">
                        <?php if ($adoption->user->profile_picture === NULL): ?>
                            <?= $this->Html->image("/img/".($adoption->pet->user->gender === 'M' ? "man_icon.jpg" : "woman_icon.jpg"), [
                                "alt" => h($adoption->pet->user->name)
                            ]); ?>
                        <?php else: ?>
                            <?= $this->Html->image("/img/uploads/".h($adoption->pet->user->profile_picture), [
                                "alt" => h($adoption->pet->user->name)
                            ]); ?>
                        <?php endif; ?>
                    </div>
                    <span class="byline">
                     <strong>Email:</strong> <?= h($adoption->pet->user->email) ?> <br/>
                     <strong>Número:</strong>  <?= h($adoption->pet->user->phone) ?> <br/>
                </header>
            </section>
        <?php else: ?>
            <section>
                <header class="major">
                    <h2><?= h($adoption->user->name) ?></h2>
                    <br/>
                    <div class="img">
                        <?php if ($adoption->user->profile_picture === NULL): ?>
                            <?= $this->Html->image("/img/".($adoption->user->gender === 'M' ? "man_icon.jpg" : "woman_icon.jpg"), [
                                "alt" => h($adoption->user->name)
                            ]); ?>
                        <?php else: ?>
                            <?= $this->Html->image("/img/uploads/".h($adoption->user->profile_picture), [
                                "alt" => h($adoption->user->name)
                            ]); ?>
                        <?php endif; ?>
                    </div>
                    <span class="byline">
                     <strong>Email:</strong> <?= h($adoption->user->email) ?> <br/>
                     <strong>Número:</strong>  <?= h($adoption->user->phone) ?> <br/>
                </header>
            </section>
        <?php endif; ?>

        <hr/>
        <section>
            <header class="major">
                <h2><?= h($adoption->pet->name) ?></h2>
                <br/>
                <div class="img">
                    <?= $this->Html->image("/img/uploads/" . h($adoption->pet->profile_picture),
                        ['alt' => h($adoption->pet->name)]); ?>
                </div>
                <span class="byline">
                     <strong>Amigo:</strong> <?= h($adoption->pet->name) ?> <br/>
            </header>
            <p><?= h($adoption->pet->description) ?></p>
        </section>
    </div>
    <div id="sidebar" class="4u">
        <section>
            <div align="center" style="width: 100%">
                <header class="major">
                    <h2>Chat</h2>
                    <hr/>
                    <?php if (count($adoption->messages) == 0): ?>
                        <span>Troquem mensagens e façam um acordo que seja o melhor o pet</span>
                    <?php endif; ?>
                </header>
            </div>

            <?php if (!empty($adoption->messages)): ?>
                <table class="table comment-table">
                    <?php foreach ($adoption->messages as $messages): ?>
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
</div>

