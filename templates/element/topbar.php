<div id="header" class="skel-panels-fixed">
    <div class="container">
        <div id="logo">
            <h1><a href="/"><?php echo $this->Html->image('logo.png', ['alt' => 'AdPET']); ?></a></h1>
            <span class="tag">4.X</span>
            <?php if($this->Identity->isLoggedIn()): ?>
                <br/>
                <span class="tag">Bem vindo, <?php echo $this->Identity->get('name');  ?></span>
            <?php endif; ?>
        </div>
        <nav id="nav">
            <ul>
                <li class="active"><?= $this->Html->link('Home', '/' ); ?></li>

                <?php if(!$this->Identity->isLoggedIn()): ?>
                    <li><?= $this->Html->link('Cadastre-se', '/registration' ); ?></li>
                <?php endif; ?>

                <?php if(!$this->Identity->isLoggedIn()): ?>
                    <li><?= $this->Html->link('Login', '/login' ); ?></li>
                <?php endif; ?>

                <?php if($this->Identity->isLoggedIn()): ?>
                    <li><?= $this->Html->link('Meus Pets', '/my-pets' ); ?></li>
                <?php endif; ?>

                <?php if($this->Identity->isLoggedIn()): ?>
                    <li><?= $this->Html->link('Meus Pedidos', '/my-adoptions' ); ?></li>
                <?php endif; ?>

                <?php if($this->Identity->isLoggedIn()): ?>
                    <li><?= $this->Html->link('Logout', '/logout' ); ?></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</div>

