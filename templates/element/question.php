<div id="footer" class="wrapper style2">
    <div class="container">
        <section style="width: 100%">
            <header class="major">
                <h2>Pergunte ao Amigo do PET</h2>
                <span class="byline">Vamos, tire suas dúvidas sobre o PET</span>
            </header>
            <?php echo $this->Form->create() ?>
            <?php echo $this->Form->hidden('pet_id', ['default' => $pet->id]); ?>
            <?php echo $this->Form->hidden('owner_id', ['default' => $this->request->getAttribute('identity')->id]); ?>
            <div class="row half">
                <div class="12u">
                    <?php echo $this->Form->textarea('content') ?>
                </div>
            </div>

            <div class="row half">
                <div class="12u">
                    <ul class="actions">
                        <li>
                            <?php echo $this->Form->button('Enviar', ['class' => 'button alt']); ?>
                        </li>
                    </ul>
                </div>
            </div>
            <?php echo $this->Form->end() ?>
        </section>
    </div>
</div>
