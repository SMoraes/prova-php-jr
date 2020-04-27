<?= $header ?>
<section>
    <div class="mainwrapper">
        <?= $menu ?>
        <div class="mainpanel">
            <div class="pageheader">
                <div class="media">
                    <div class="pageicon pull-left">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="media-body">
                        <ul class="breadcrumb">
                            <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                            <li><a href="#">Home</a></li>
                        </ul>
                        <h4>Listar Usuário</h4>
                    </div>
                </div>
            </div>
            <div class="contentpanel">
                <form method="post" action="" name="" class="form-horizontal form-bordered" id="" accept-charset="utf-8">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Data Nascimento</th>
                                <th>Telefone</th>
                                <th>Endereço</th>
                                <th>Estado</th>
                                <th>Role</th>
                                <th>Editar</th>
                                <th>Deletar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $data = '';
                            if (empty($usuarios)) : ?>
                                <tr>
                                    <td colspan="11" style="text-align: center; font-size: 16px; color:red;">Não existe usuário cadastrado no sistema. <br> Favor Cadastrar um usuário!</td>
                                </tr>
                                <?php else :
                                foreach ($usuarios as $usuario) :
                                ?>
                                    <tr>
                                        <td><?= $usuario->nome; ?></td>
                                        <td><?= $usuario->cpf; ?></td>
                                        <td><?= $data = implode('/', array_reverse(explode('-', $usuario->dataNascimento))); ?></td>
                                        <td><?= $usuario->telefone; ?></td>
                                        <td><?= $usuario->endereco; ?></td>
                                        <td><?= $usuario->estado; ?></td>
                                        <td><?= $usuario->role; ?></td>
                                        <td>
                                            <button type="button" data-toggle="modal" data-target=".bs-example-modal-static<?= $usuario->id_candidato ?>" data-toggle="tooltip" class="btn btn-primary btn-bordered"><i class="fa fa-pencil"></i></button>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('candidato/exluir_usuario/' . $usuario->id_candidato) ?>">
                                                <button type="button" data-toggle="tooltip" class="btn btn-danger btn-bordered"><i class="fa fa-trash-o"></i></button>
                                            </a>
                                        </td>
                                    </tr>
                            <?php
                                endforeach;
                            endif;
                            ?>
                        </tbody>
                    </table>
                </form>
                <?php
                foreach ($usuarios as $usuario) :
                ?>
                    <div class="modal fade bs-example-modal-static<?= $usuario->id_candidato ?>" tabindex="-1" role="dialog" data-backdrop="static">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                                    <h4 class="modal-title">Editar Usuário</h4>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="<?= base_url('candidato/editar_usuario'); ?>" id="form2" class="form-horizontal form-bordered">
                                        <input type="hidden" name="id_candidato" id="id_candidato" value="<?= $usuario->id_candidato; ?>">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">Formulário de edição de usuário</h4>
                                            </div>
                                            <div class="panel-body nopadding">
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Nome:</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome" value="<?= $usuario->nome; ?>" required />
                                                    </div>
                                                </div><!-- form-group -->
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">CPF:</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="cpf" class="form-control cpf" placeholder="CPF" value="<?= $usuario->cpf; ?>" required />
                                                    </div>
                                                </div><!-- form-group -->
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Data de Nascimento:</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="dataNascimento" class="form-control date" placeholder="Data de nascimento" value="<?= $data = implode('/', array_reverse(explode('-', $usuario->dataNascimento))); ?>" required />
                                                    </div>
                                                </div><!-- form-group -->
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Telefone:</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="telefone" class="form-control phone" placeholder="Telefone" value="<?= $usuario->telefone; ?>" required />
                                                    </div>
                                                </div><!-- form-group -->
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Endereço:</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="endereco" class="form-control" placeholder="Endereço" value="<?= $usuario->endereco; ?>" required />
                                                    </div>
                                                </div><!-- form-group -->
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Estado:</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="estado" class="form-control" placeholder="Estado" value="<?= $usuario->estado; ?>" required />
                                                    </div>
                                                </div><!-- form-group -->
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Cidade:</label>
                                                    <div class="col-sm-10">
                                                        <select name="cidade" data-placeholder="Choose One" class="width300 select2-offscreen select2">
                                                            <option value="<?= $usuario->cidade; ?>"><?= $usuario->cidade; ?></option>
                                                            <option value="AC">Acre</option>
                                                            <option value="AL">Alagoas</option>
                                                            <option value="AP">Amapá</option>
                                                            <option value="AM">Amazonas</option>
                                                            <option value="BA">Bahia</option>
                                                            <option value="CE">Ceará</option>
                                                            <option value="DF">Distrito Federal</option>
                                                            <option value="ES">Espírito Santo</option>
                                                            <option value="GO">Goiás</option>
                                                            <option value="MA">Maranhão</option>
                                                            <option value="MT">Mato Grosso</option>
                                                            <option value="MS">Mato Grosso do Sul</option>
                                                            <option value="MG">Minas Gerais</option>
                                                            <option value="PA">Pará</option>
                                                            <option value="PB">Paraíba</option>
                                                            <option value="PR">Paraná</option>
                                                            <option value="PE">Pernambuco</option>
                                                            <option value="PI">Piauí</option>
                                                            <option value="RJ">Rio de Janeiro</option>
                                                            <option value="RN">Rio Grande do Norte</option>
                                                            <option value="RS">Rio Grande do Sul</option>
                                                            <option value="RO">Rondônia</option>
                                                            <option value="RR">Roraima</option>
                                                            <option value="SC">Santa Catarina</option>
                                                            <option value="SP">São Paulo</option>
                                                            <option value="SE">Sergipe</option>
                                                            <option value="TO">Tocantins</option>
                                                            <option value="EX">Estrangeiro</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Role:</label>
                                                    <div class="col-sm-10">
                                                        <select name="role" data-placeholder="Choose One" class="width300 select2-offscreen select2">
                                                            <option value="<?= $usuario->role; ?>"><?= $usuario->role; ?></option>
                                                            <option value="Programador">Programador</option>
                                                            <option value="DBA">DBA</option>
                                                            <option value="HelpDesk">Help Desk</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="panel-footer">
                                                    <button class="btn btn-success btn-lg" style="float: right">Editar</button>
                                                </div><!-- panel-footer -->
                                            </div><!-- form-group -->
                                        </div><!-- panel-body -->
                                    </form>
                                </div><!-- panel -->
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
</section>
<?= $footer ?>