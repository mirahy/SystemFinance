@extends('templates.master')



@section('css-view')
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
@endsection

@section('js-view')
<script src="js/sweetalert2.all.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap4.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/util.js"></script>
<script src="js/launchs.js"></script>
@endsection

@section('conteudo-view')
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->      

      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Lançamentos</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Gerar Relatório</a>
      </div>

        <ul class="nav nav-tabs">
            <li class="nav-item active"><a class="nav-link active" href="#tab_launch_d" role="tab"  data-toggle="tab">Dízimos</a></li>
            <li class="nav-item"><a class="nav-link" href="#tab_launch_o" role="tab"  data-toggle="tab">Ofertas</a></li>
        </ul>

        <div class="tab-content">
            <div id="tab_launch_d" class="tab-pane active">
                <div class="container-fluid">
                    <h2 class="text-center"><strong>Dízimos</strong></h2>
                        <a id="btn_add_launch_d" class="btn btn-primary my-1"><i class="fas fa-plus ">&nbsp Lançar Dízimo</i></a>
                            <table id="dt_launch" class="table table-striped table-bordered table-hover table-responsive display nowrap" >
                                <thead>
                                    <tr >
                                        <th>Tipo</th>
                                        <th>Nome</th>
                                        <th>Valor</th>
                                        <th>Coleta</th>
                                        <th data-orderable="false" >Mês Referência</th>
                                        <th data-orderable="false" >Ano Referência</th>
                                        <th>Status</th>
                                        <th>Data lançamento</th>
                                        <th>Data Ataulização</th>
                                        <th data-orderable="false" >Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                </div>
            </div>

            <div id="tab_launch_o" class="tab-pane ">
                <div class="container-fluid">
                    <h2 class="text-center"><strong>Ofertas</strong></h2>
                        <a id="btn_add_launch_o" class="btn btn-primary my-1"><i class="fas fa-plus">&nbsp Lançar Ofertas</i></a>
                            <table id="dt_launch_o" class="table table-striped table-bordered table-hover table-responsive display nowrap">
                                <thead>
                                    <tr>
                                        <th>Tipo</th>
                                        <th>Nome</th>
                                        <th>Valor</th>
                                        <th>Coleta</th>
                                        <th data-orderable="false" >Mês Referência</th>
                                        <th data-orderable="false" >Ano Referência</th>
                                        <th>Status</th>
                                        <th>Data lançamento</th>
                                        <th>Data Ataulização</th>
                                        <th data-orderable="false" >Ações</th>
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
    <!-- Modal lançamentos -->
    <div id="modal_launch" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Lançamento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                    {!! Form::open(['class' =>'user', 'id' => 'launch_form']) !!}

                        <div class="modal-body">

            
                            <!-- Imputs hidden -->
                            @include('templates.forms.input',['input' => 'text','value' => '0', 'class' => 'd-none', 'attributes' => [ 'name' => 'idtb_launch', 'hidden', 'id' => 'idtb_launch']])
                            @include('templates.forms.input',['input' => 'text','value' => '$id_user', 'class' => 'd-none', 'attributes' => [ 'name' => 'id_user', 'hidden', 'id' => 'id_user']])

                            @include('templates.forms.input',['input' => 'text','value' => $year, 'class' => 'd-none', 'attributes' => [ 'name' => 'reference_year', 'hidden', 'id' => 'reference_year']])

                            @include('templates.forms.input',['input' => 'text','value' => $operation, 'class' => 'd-none', 'attributes' => [ 'name' => 'idtb_operation', 'hidden', 'id' => 'idtb_operation']])

                            @include('templates.forms.input',['input' => 'text','value' => $type_launch, 'class' => 'd-none', 'attributes' => [ 'name' => 'idtb_type_launch', 'hidden', 'id' => 'idtb_type_launch']])

                            @include('templates.forms.input',['input' => 'text','value' => $base, 'class' => 'd-none', 'attributes' => [ 'name' => 'idtb_base', 'hidden', 'id' => 'idtb_base']])

                            @include('templates.forms.input',['input' => 'text','value' => $closing, 'class' => 'd-none', 'attributes' => [ 'name' => 'idtb_closing', 'hidden', 'id' => 'idtb_closing']])

                            @include('templates.forms.input',['input' => 'text','value' => $status, 'class' => 'd-none', 'attributes' => [ 'name' => 'status', 'hidden', 'id' => 'status']])

                            
                            <!-- \ Imputs hidden -->

                            @include('templates.forms.input',['input' => 'text','label' => 'Nome ', 'attributes' => ['placeholder' => 'Nome','class' => 'form-control form-control-user', 'id' => 'name', 'name' => 'name',  'maxlength' => '100']])

                            @include('templates.forms.number',['input' => 'number', 'label' => 'Valor', 'attributes' => ['placeholder' => 'Valor', 'class' => 'form-control form-control-user', 'id' => 'value', 'name' => 'value',  'maxlength' => '100']])

                            @include('templates.forms.select',['select' => 'mes', 'label' => 'Mês Referência', 'data' => $data ,'attributes' => ['placeholder' => 'Mês Referência', 'class' => 'form-control form-control-user', 'id' => 'reference_month', 'name' => 'reference_month']])
                            
                            @include('templates.forms.date',['date' => 'date', 'label' => 'Data Coleta','attributes' => ['placeholder' => 'Data Coleta', 'class' => 'form-control form-control-user col-lg-5', 'id' => 'operation_date', 'name' => 'operation_date']])
                            
                                

                        </div>
                         <div class="modal-footer">
                
                            @include('templates.forms.button',['input' => '<i class="fa fa-save fa-fw"></i> Lançar','attributes' => ['type' => 'submit', 'class' => 'btn btn-primary', 'id' => 'btn_save_launch']])
                            @include('templates.forms.button',['input' => '<i class="fas fa-times fa-fw"></i> Fechar','attributes' => ['type' => 'button', 'class' => 'btn btn-secondary', 'data-dismiss' => 'modal']])
                            
                            <!--<button type="button" class="btn btn-primary">Save changes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
                        </div>
           

                    {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- /Modal users create -->

    <!-- Modal edit Create -->
    <div id="modal_user_edit" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Usuário</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        
                    {!! Form::open(['class' =>'user', 'id' => 'user_form_edit']) !!}

                        <div class="modal-body">

            
            
                            @include('templates.forms.input',['input' => 'text','value' => '0', 'attributes' => [ 'name' => 'id', 'hidden', 'id' => 'id_edit']])
                        
                            @include('templates.forms.input',['input' => 'text','label' => 'Nome Completo', 'attributes' => ['placeholder' => 'Nome Completo','class' => 'form-control form-control-user', 'id' => 'name_edit', 'name' => 'name',  'maxlength' => '100']])

                            @include('templates.forms.email',['input' => 'email', 'label' => 'Email', 'attributes' => ['placeholder' => 'Email', 'class' => 'form-control form-control-user', 'id' => 'email_edit', 'name' => 'email',  'maxlength' => '100']])

                            @include('templates.forms.select',['select' => 'Perfil', 'label' => 'Perfil', 'attributes' => [ 'class' => 'form-control form-control-user', 'id' => 'idtb_profile_edit', 'name' => 'idtb_profile']])

                            @include('templates.forms.select',['select' => 'Base', 'label' => 'Base', 'attributes' => ['class' => 'form-control form-control-user', 'id' => 'idtb_base_edit', 'name' => 'idtb_base']])

                            @include('templates.forms.select',['select' => 'Status', 'label' => 'Status', 'data' => ['1' => 'Ativo', '0' => 'Inativo'],'attributes' => ['placeholder' => 'Status', 'class' => 'form-control form-control-user', 'id' => 'status_edit', 'name' => 'status']])

                            @include('templates.forms.date',['date' => 'birth', 'label' => 'Data Nascimento','attributes' => ['placeholder' => 'Status', 'class' => 'form-control form-control-user col-lg-5', 'id' => 'birth_edit', 'name' => 'birth']])
                            
                                

                        </div>
                         <div class="modal-footer">
                
                            @include('templates.forms.button',['input' => '<i class="fa fa-save fa-fw"></i> Editar','attributes' => ['type' => 'submit', 'class' => 'btn btn-primary', 'id' => 'btn_edit_user']])
                            @include('templates.forms.button',['input' => '<i class="fas fa-times fa-fw"></i> Fechar','attributes' => ['type' => 'button', 'class' => 'btn btn-secondary', 'data-dismiss' => 'modal']])
                            
                            <!--<button type="button" class="btn btn-primary">Save changes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
                        </div>
           

                    {!! Form::close() !!}
            </div>
        </div>
    </div>
<!-- /Modal edit users -->
@endsection