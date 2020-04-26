<div class="leftpanel">
            <div class="media profile-left">
                <a class="pull-left profile-thumb" href="profile.html">
                    <img class="img-circle" src="<?= base_url('#') ?>" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Prova | PHP</h4>
                    <small class="text-muted">Sergio Moraes</small>
                </div>
            </div><!-- media -->
            <h5 class="leftpanel-title">Navigation</h5>
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="<?= base_url('')?>"><i class="fa fa-home"></i> <span>Home</span></a></li>
                <li class="parent"><a href="#"><i class="fa fa-user"></i> <span>Usuários</span></a>
                    <ul class="children">
                        <li><a href="<?= base_url('candidato/cadastrar_usuario')?>">Cadastrar Usuários</a></li>
                        <li><a href="<?= base_url('candidato/listar_usuario')?>">Listar Usuários</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- Panel Direito -->