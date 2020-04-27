<?= $header ?>
<section>
    <div class="mainwrapper">
        <?= $menu ?>
        <div class="mainpanel">
            <div class="pageheader">
                <div class="media">
                    <div class="pageicon pull-left">
                        <i class="fa fa-pencil"></i>
                    </div>
                    <div class="media-body">
                        <ul class="breadcrumb">
                            <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                            <li><a href="#">Home</a></li>
                        </ul>
                        <h4>Dados do Usuário</h4>
                    </div>
                </div><!-- media -->
            </div><!-- pageheader -->

            <div class="contentpanel">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Formulario de cadastro -->
                        <form method="POST" action="<?= base_url('candidato/cadastrar_usuario'); ?>" id="form2" class="form-horizontal form-bordered">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Dados do Usuário</h4>
                                </div>
                                <div class="panel-body nopadding">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Nome:</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nome" class="form-control" placeholder="Nome" required title="O nome deve ser preenchido." />
                                        </div>
                                    </div><!-- form-group -->
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">CPF:</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="cpf" class="form-control cpf" placeholder="CPF" required title="O cpf deve ser preenchido." />
                                        </div>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Data de Nascimento:</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="dataNascimento" class="form-control date" placeholder="Data de Nascimento" required title="A data de nascimento deve ser preenchido." />
                                        </div>
                                    </div><!-- form-group -->
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Telefone:</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="telefone" class="form-control phone" placeholder="Telefone" required title="O telefone deve ser preenchido." />
                                        </div>
                                    </div><!-- form-group -->
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Cep</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="cep" id="cep" class="form-control cep" onblur="pesquisacep(this.value);" required title="O cep deve ser preenchido." />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Rua (Avenida, travessa, estrada)</label>
                                        <div class="col-md-8">
                                            <input type="text" name="endereco" id="rua" class="form-control rua" required title="O nome da rua deve ser preenchido." />
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" name="numero_logradouro" placeholder="N°" class="form-control numero" required title="O número da rua  deve ser preenchido." />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Complemento</label>
                                        <div class="col-md-10">
                                            <input type="text" name="logradouro" id="complemento" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Bairro / Cidade / UF</label>
                                        <div class="col-md-4">
                                            <input type="text" name="bairro" placeholder="Bairro" id="bairro" class="form-control bairro" required title="O bairro deve ser preenchido." />
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="estado" placeholder="Cidade" id="cidade" class="form-control cidade" required title="A cidade deve ser preenchida." />
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" name="cidade" placeholder="UF" id="uf" class="form-control uf" required title="A UF deve ser preenchida." />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Role:</label>
                                        <div class="col-sm-10">
                                            <select name="role" data-placeholder="Choose One" class="width300 select2-offscreen select2">
                                                <option value="">Escolha um role</option>
                                                <option value="Programador">Programador</option>
                                                <option value="DBA">DBA</option>
                                                <option value="HelpDesk">Help Desk</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- MULTIPLOS ROLES PARA USUÁRIO  -->
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Visualização</label>
                                        <div class="col-sm-8">
                                            <div class="rdio rdio-default">
                                                <input type="radio" name="role_id" value="0" id="empresa0" checked="checked" class="radio_multi_role" />
                                                <label for="empresa0">Apenas um role</label>
                                            </div>
                                            <div class="rdio rdio-primary">
                                                <input type="radio" name="role_id" value="1" id="empresa1" class="radio_multi_role" />
                                                <label for="empresa1">Multiplos roles</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group role_permissao" style="display: none">
                                        <label class="col-sm-2 control-label">Tarefas que você pode realizar</label>
                                        <div class="col-sm-10">
                                            <select id="select-multi" data-placeholder="Escolha os roles" multiple class="width300 roles_permissao_select" name="roles_multi[]">
                                                <?php if (!empty($rolesPermissao)) : ?>
                                                    <option>Selecione um roles</option>
                                                    <?php foreach ($rolesPermissao as $roles) : ?>
                                                        <option value="<?= $roles->id_role ?>"><?= $roles->nome_role ?></option>
                                                <?php endforeach;
                                                endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div><!-- panel-body -->
                                <div class="panel-footer">
                                    <button class="btn btn-success mr5 btn-lg" style="float:right">Salvar</button>
                                </div><!-- panel-footer -->
                            </div><!-- panel -->
                        </form>
                    </div><!-- col-md-6 -->
                </div><!-- row -->
            </div>
        </div>
    </div>
    </div>
    </div><!-- mainwrapper -->
    <?= $footer ?>