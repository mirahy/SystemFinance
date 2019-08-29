@extends('templates.master')



@section('css-view')
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="css/datatables.min.css" rel="stylesheet">
@endsection

@section('js-view')
<script src="js/sweetalert2.all.min.js"></script>
<script src="js/dataTables.bootstrap4.min.js"></script>
<script src="js/datatables.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/edit-user.js"></script>
@endsection

@section('conteudo-view')
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->      

      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Usuários</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Gerar Relatório</a>
      </div>

        <ul class="nav nav-tabs">
            <li class="nav-item active"><a class="nav-link active" href="#tab_users_active" role="tab"  data-toggle="tab">Usuários Ativos</a></li>
            <li class="nav-item"><a class="nav-link" href="#tab_users_inactive" role="tab"  data-toggle="tab">Usuários Inativos</a></li>
        </ul>

        <div class="tab-content">
            <div id="tab_users_active" class="tab-pane active">
                <div class="container-fluid">
                <h2 class="text-center"><strong>Gerenciar Usuários Ativos</strong></h2>
                <a id="btn_add_user" class="btn btn-primary"><i class="fas fa-plus ">&nbsp Adicionar Usuário</i></a>
                <table id="dt_users" class="table table striped table-bordered">
                    <thead>
                        <tr class="tableheader">
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Perfil</th>
                            <th>base</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                </div>
            </div>
            <div id="tab_users_inactive" class="tab-pane ">
            <div class="container-fluid">
                <h2 class="text-center"><strong>Gerenciar Usuários Inativos</strong></h2>
                <a id="btn_add_user_inactive" class="btn btn-primary"><i class="fas fa-plus">&nbsp Adicionar Usuário</i></a>
                <table id="dt_users" class="table table striped table-bordered">
                    <thead>
                        <tr class="tableheader">
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Perfil</th>
                            <th>base</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                </div>
            
            </div>
        </div>

      

    </div>
    <!-- /.container-fluid -->

    <div id="modal_user" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title">Usuário</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
        {!! Form::open(['class' =>'user','route' => 'user.store', 'method' => 'post']) !!}

        <div class="modal-body">

            
            
                 @include('templates.forms.input',['input' => 'id', 'attributes' => [ 'name' => 'user_id', 'hidden']])
                 
                    @include('templates.forms.input',['input' => 'text','label' => 'Nome Completo', 'attributes' => ['placeholder' => 'Nome Completo', 'required','class' => 'form-control form-control-user', 'id' => 'user_name', 'name' => 'user_name',  'maxlength' => '100']])

                    @include('templates.forms.email',['input' => 'email', 'label' => 'Email', 'attributes' => ['placeholder' => 'Email', 'required','class' => 'form-control form-control-user', 'id' => 'user_email', 'name' => 'user_email',  'maxlength' => '100']])

                    @include('templates.forms.input',['input' => 'text', 'label' => 'Perfil', 'attributes' => ['placeholder' => 'Perfil', 'required','class' => 'form-control form-control-user', 'id' => 'user_perfil', 'name' => 'user_name',  'maxlength' => '100']])

                    @include('templates.forms.input',['input' => 'text', 'label' => 'Base', 'attributes' => ['placeholder' => 'Base', 'required','class' => 'form-control form-control-user', 'id' => 'user_base', 'name' => 'user_base',  'maxlength' => '100']])

                    @include('templates.forms.input',['input' => 'text', 'label' => 'Status', 'attributes' => ['placeholder' => 'Status', 'required','class' => 'form-control form-control-user', 'id' => 'user_status', 'name' => 'user_status',  'maxlength' => '100']])


        </div>
            <div class="modal-footer">
                @include('templates.forms.button',['input' => '<i class="fa fa-save fa-fw"></i> Salvar','attributes' => ['type' => 'submit', 'class' => 'btn btn-primary', 'id' => 'btn_save_user']])
                @include('templates.forms.button',['input' => '<i class="fas fa-times fa-fw"></i> Fechar','attributes' => ['type' => 'button', 'class' => 'btn btn-secondary', 'data-dismiss' => 'modal']])
                <!--<button type="button" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
            </div>
        </div>

        {!! Form::close() !!}

    </div>
    </div>

@endsection