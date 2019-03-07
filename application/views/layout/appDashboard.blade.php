@extends('layout.appDashboardIndex') <!-- extiende html constante no modificar costante -->





<!-- section  rol 1-->
@section('counts-alumno')
	<section class="dashboard-counts no-padding-bottom">
		<div class="container-fluid">
			<div class="row bg-white has-shadow">
				<!-- Item -->
				<div class="col-xl-3 col-sm-6">
					<div class="item d-flex align-items-center">
						<div class="icon bg-violet"><i class="icon-padnote"></i></div>
						<div class="title"><span>Creditos<br>Pensums</span>
							<div class="progress">
								<div role="progressbar" style="width: 100%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="{{$credit_numbers}}" class="progress-bar bg-violet"></div>
							</div>
						</div>
						<div class="number"><strong style="font-size: 15px;">{{$credit_numbers}}</strong></div>
					</div>
				</div>
				<!-- Item -->
				<div class="col-xl-3 col-sm-6">
					<div class="item d-flex align-items-center">
						<div class="icon bg-success"><i class="icon-padnote"></i></div>
						<div class="title"><span>Creditos<br>Aprobado</span>
							<div class="progress">
								<div role="progressbar" style="width: {{($studets_credit_numbers/$credit_numbers)*100}}%; height: 4px;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="{{$credit_numbers}}" class="progress-bar bg-red"></div>
							</div>
						</div>
						<div class="number"><strong style="font-size: 15px;">{{$studets_credit_numbers}}</strong></div>
					</div>
				</div>


				<div class="col-xl-3 col-sm-6">
					<div class="item d-flex align-items-center">
						<div class="icon bg-success"><i class="icon-padnote"></i></div>
						<div class="title"><span>Porcentaje<br>Cursado</span>
							<div class="progress">
								<div role="progressbar" style="width: {{($studets_credit_numbers/$credit_numbers)*100}}%; height: 4px;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="{{$credit_numbers}}" class="progress-bar bg-red"></div>
							</div>
						</div>
						<div class="number"><strong style="position: relative;right:15px;font-size: 15px;">{{round(($studets_credit_numbers/$credit_numbers)*100)}}%</strong></div>
					</div>
				</div>


				<div class="col-xl-3 col-sm-6">
					<div class="item d-flex align-items-center">
						<div class="icon bg-red"><i class="icon-padnote"></i></div>
						<div class="title"><span>Creditos<br>Restante</span>
							<div class="progress">
								<div role="progressbar" style="width: {{$credit_numbers-$studets_credit_numbers}}%; height: 4px;" aria-valuenow="{{$credit_numbers}}" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-orange"></div>
							</div>
						</div>
						<div class="number"><strong style="font-size: 15px;">{{$credit_numbers-$studets_credit_numbers}}</strong></div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
@section('header-theme-alumno')
	<section class="dashboard-header">
		<div class="container-fluid">
			<div class="row">
				<!-- Statistics -->
				<div class="statistics col-lg-3 col-12">
					<div class="statistic d-flex align-items-center bg-white has-shadow">
						<div class="icon bg-info"><i class="fa fa-tasks"></i></div>
						<div class="text"><strong>{{$missingMatter}}</strong><br><small>Materias No Vistas</small></div>
					</div>
					<div class="statistic d-flex align-items-center bg-white has-shadow">
						<div class="icon bg-green"><i class="fa fa-tasks"></i></div>
						<div class="text"><strong>{{$matterWon}}</strong><br><small>Materias Ganadas</small></div>
					</div>
					<div class="statistic d-flex align-items-center bg-white has-shadow">
						<div class="icon bg-red"><i class="fa fa-tasks"></i></div>
						<div class="text"><strong>{{$matterLost}}</strong><br><small>Materias Perdidas</small></div>
					</div>
				</div>

				<!-- Line Chart            -->
				<div class="col-lg-8">
					<div class="bar-chart-example card">
						<div class="card-close">
							<div class="dropdown">
								<button type="button" id="closeCard6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
								<div aria-labelledby="closeCard6" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Cerrar</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
							</div>
						</div>
						<div class="card-header d-flex align-items-center">
							<h3 class="h4">Desempeño estudiantil</h3>
						</div>
						<div class="card-body">
							<canvas id="barPerformance"></canvas>
						</div>
						<div class="card-header d-flex align-items-center">
							<label class="">Promedio ponderado semestre x Materia, informacion basada semestre y materia no es la misma del vortal</label>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="dashboard-Cesh" style="display: none">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="work-amount card">
						<div class="card-close">
							<div class="dropdown">
								<button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
								<div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Cerrar</a></div>
							</div>
						</div>
						<div class="card-body">
							<h4><small>Nombre: {{$name}}</small> </h4>
							<h4><small>Documento: {{$persons->document}}</small> </h4>
							<div class="col-12">
								<div class="text-center">
									<h2 class="h2"><small>Esquema de Colores</small></h2>
								</div>
								<span class="h6 col-md-3"><a style="background-color: rgb(129, 212, 250);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><small> Materia No Vista</small></span>
								<span class="h6 col-md-3"><a style="background-color: rgb(165, 214, 167);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><small> Materia Ganada</small></span>
								<span class="h6 col-md-3"><a style="background-color: rgb(239, 154, 154);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><small> Materia Pérdida</small></span>
								<span class="h6 col-md-2"><a style="background-color: rgba(0,0,0,1);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><small> Error</small></span>
							</div>
							<hr/>
							<div class="col-12">
								<span class="h6 col-md-4"><a href="#" data-toggle="modal" onclick="return loaderCesh(1);" data-target="#modalViewCesh" class="dropdown-item"> <i class="fa fa-eye-slash"></i> Ver Pensum Actual</a></span>
								<span class="h6 col-md-4"><a href="#" data-toggle="modal" onclick="return loaderCesh(2);" data-target="#modalViewCesh" class="dropdown-item"> <i class="fa  fa-eye-slash"></i> Ver Nuevo pensum</a></span>
								<span class="h6 col-md-3"><a href="#reporte-RH" onclick="return loaderTableRH();" class="dropdown-item"> <i class="fa fa-info"></i> Ver Reporte</a></span>
							</div>
							<hr/>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="tables" id="reporte-RH" style="display: none">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="work-amount card">
						<div class="card-close">
							<div class="dropdown">
								<button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
								<div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Cerrar</a></div>
							</div>
						</div>
						<div class="card-body" id="tableRH">
							<div class="col-12">
								<div class="text-center">
									<h2 class="h2"><small>Reportes de materias Homologadas</small></h2>
									<div class="table-responsive">
										<div>
											<span class="col-md-5 bg-blue">Pensum Actual</span>
											<span class="col-md-5 bg-green">Pensum Nuevo</span>
										</div>
										<br>

										<table class="table table-striped table-hover">
											<thead align="center">
											<tr>
												<th>#</th>
												<th>Codigo Actual</th>
												<th>Nombre Materia</th>
												<th>Codigo Nuevo</th>
												<th>Nombre Materia</th>
												<!--<th>Nota</th> -->
											</tr>
											</thead>
											<tbody id="table-RH" align="center"></tbody>
										</table>
										<button class="btn btn-info btn-sm col-md-3" onclick="return tableReportH();">Imprimir reporte</button>
										<button class="btn btn-dark btn-sm col-md-3" onclick="solicitarHomologacion();">Solicitar Homologacion Online</button>
										<button class="btn btn-danger btn-sm col-md-3" onclick="$('#reporte-RH').css('display','none');">Cerrar Reporte</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@section("gestion-person")
	<section id="gestionPerson" class="dashboard-Info" style="display: none">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="work-amount card">
						<div class="card-close">
							<div class="dropdown">
								<button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
								<div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Cerrar</a></div>
							</div>
						</div>
						<div class="card-body">
							<div class="col-12">
								<div class="text-center">
									<h2 class="h2"><small>Informacion Personal</small></h2>
									<div class="card-body">
										<form id="formPersons">
											<div class="form-group row">
												<div class="form-group col-md-4">
													<input type="file" id="imgFile" name="imgFile[]" value="{{$img}}" onchange="encodeImagetoBase64(this)"/>
													<input type="hidden" id="img" name="img" value="{{$img}}">
												</div>
												<div class="form-group col-md-4">
													<img class="img-responsive img-thumbnail" style="position:relative; bottom:20px!important;" id="ViewimgPerson" width="100" src="{{$img}}">
												</div>
												<div class="form-group col-md-6">
													<label class="control-label">Documento</label>
													<input disabled="disabled" id="document" name="document" value="{{$persons->document}}" type="number" placeholder="Documento" class="form-control" required="required" maxlength="10" minlength = "8" pattern=".{8}|.{10}">
													<input type="hidden" id="user_id" name="user_id" value="{{$user_id}}">
												</div>
												<div class="form-group col-md-6">
													<label class="control-label">Correo Electronico</label>
													<input id="email" name="email" type="email" placeholder="Correo Electronico" value="{{$email}}" class="form-control" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
												</div>
												<div class="form-group col-md-6">
													<label class="control-label" >Primer Nombre</label>
													<input id="first_name" name="first_name" type="text" placeholder="Primer Nombre" value="{{ucwords($persons->first_name)}}"  class="form-control" required="required"pattern="[A-Za-z]{,10}">
												</div>
												<div class="form-group col-md-6">
													<label class="control-label" id>Segundo Nombre</label>
													<input id="second_name" name="second_name" type="text" placeholder="Segundo Nombre" value="{{ucwords($persons->second_name)}}"  class="form-control" required="required" pattern="[A-Za-z]{,10}">
												</div>
												<div class="form-group col-md-6">
													<label class="control-label">Primer Apellido</label>
													<input id="first_surname" name="first_surname" type="text" placeholder="Primer Apellido" value="{{ucwords($persons->first_surname)}}"  class="form-control" required="required" pattern="[A-Za-z]{,10}">
												</div>
												<div class="form-group col-md-6">
													<label class="control-label">Segundo Apellido</label>
													<input id="second_surname" name="second_surname"  type="text" placeholder="Segundo Apellido" value="{{ucwords($persons->second_surname)}}"  class="form-control" required="required" pattern="[A-Za-z]{,10}">
												</div>

												<div class="form-group col-md-6 text-left">
													<label class="control-label">Cambiar Contraseña?</label>
													<input type="checkbox" id="chekChangePassword" >
												</div>
												<div class="form-group col-md-6">
												</div>
												<div class="form-group col-md-6 pw">
													<label class="control-label">Contraseña </label>
													<input type="password"  disabled id="password1" name="password1" placeholder="Contraseña" class="form-control" required="required">
												</div>

												<div class="form-group col-md-6 pw">
													<label class="control-label">Repite La Contraseña </label>
													<input type="password" disabled id="password2" name="password2" placeholder="Repite La Contraseña" class="form-control" required="required" onkeydown="return validatePassword()" onchange="return validatePassword()">
												</div>

												<div class="form-group col-md-4">
													<input type="submit" value="Guardar Datos" class="form-control btn btn-info btn-sm">
												</div>

											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('modals-alumno')
	<style>
		.modal-dialog {
			width: 100%!important;
			height: 100%!important;;
			margin: 5px!important;;
			padding: 0!important;;
		}

		.modal-content {
			height: auto!important;;
			min-height: 100%!important;;
			border-radius: 0!important;;
		}
		.modal-lg{
			max-width: 100%!important;
		}
	</style>
	<div class="modal fade modal-fullscreen" id="modalViewCesh" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel"></h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<div class="semestre">
						<h6>1</h6>
						<div class="semester1"></div>

					</div>
					<div class="semestre">
						<h6>2</h6>
						<div class="semester2"></div>

					</div>
					<div class="semestre">
						<h6>3</h6>
						<div class="semester3"></div>
					</div>
					<div class="semestre">
						<h6>4</h6>
						<div class="semester4"></div>
					</div>
					<div class="semestre">
						<h6>5</h6>
						<div class="semester5"></div>
					</div>
					<div class="semestre">
						<h6>6</h6>
						<div class="semester6"></div>
					</div>
					<div class="semestre">
						<h6>7</h6>
						<div class="semester7"></div>
					</div>
					<div class="semestre">
						<h6>8</h6>
						<div class="semester8"></div>
					</div>
					<div class="semestre">
						<h6>9</h6>
						<div class="semester9"></div>
					</div>
					<div class="semestre">
						<h6>10</h6>
						<div class="semester10"></div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-primary" onclick="return printElement(document.getElementById('modalViewCesh'))">Imprimir</button>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('reporte-alumno')
	<div id="imprimir-RH"></div>
@endsection
<!-- section  rol 1-->

@section("reporte-general")
	<section class="dashboard-counts no-padding-bottom">
		<div class="container-fluid">
			<div class="row bg-white has-shadow">
				<!-- Item -->
				<div class="col-xl-3 col-sm-6">
					<div class="item d-flex align-items-center">
						<div class="icon bg-violet"><i class="icon-padnote"></i></div>
						<div class="title"><span>Cantidad<br>Facultades</span>
							<div class="progress">
								<div role="progressbar" style="width: 100%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="" class="progress-bar bg-violet"></div>
							</div>
						</div>
						<div class="number"><strong style="font-size: 15px;">{{$countFaculties}}</strong></div>
					</div>
				</div>
				<!-- Item -->
				<div class="col-xl-3 col-sm-6">
					<div class="item d-flex align-items-center">
						<div class="icon bg-success"><i class="icon-padnote"></i></div>
						<div class="title"><span>Cantidad<br>Pensum</span>
							<div class="progress">
								<div role="progressbar" style="width:100%; height: 4px;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="" class="progress-bar bg-red"></div>
							</div>
						</div>
						<div class="number"><strong style="font-size: 15px;">{{$countPensums}}</strong></div>
					</div>
				</div>


				<div class="col-xl-3 col-sm-6">
					<div class="item d-flex align-items-center">
						<div class="icon bg-success"><i class="icon-padnote"></i></div>
						<div class="title"><span>Cantidad<br>Materia</span>
							<div class="progress">
								<div role="progressbar" style="width:100%; height: 4px;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="" class="progress-bar bg-red"></div>
							</div>
						</div>
						<div class="number"><strong style="position: relative;right:15px;font-size: 15px;">{{$countMatters}}</strong></div>
					</div>
				</div>


				<div class="col-xl-3 col-sm-6">
					<div class="item d-flex align-items-center">
						<div class="icon bg-red"><i class="icon-padnote"></i></div>
						<div class="title"><span>Cantidad<br>Usuarios</span>
							<div class="progress">
								<div role="progressbar" style="width: 100%; height: 4px;" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-orange"></div>
							</div>
						</div>
						<div class="number"><strong style="font-size: 15px;">{{$countUsers}}</strong></div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection


@section("gestion-usuario")
	<style>
		p.estado-0:before{
			color: red;
			content: "Inactivo";
		}
		p.estado-1:before{
			color:green;
			content: "Activo";
		}
	</style>
	<section class="dashboard-Info" id="gestionUsers" style="display: none">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="work-amount card">
						<div class="card-close">
							<div class="dropdown">
								<button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
								<div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Cerrar</a></div>
							</div>
						</div>
						<div class="card-body">
							<div class="col-12">
								<hr><button onclick="btnRegistrar('users');" class="btn btn-success btn-sm">Registrar Usuario</button>
								<button onclick="loaderTable('users')" class="btn btn-info btn-sm">Actualizar</button><hr>
								<div class="text-center">
									<h2 class="h2"><small>Gestion Usuario</small></h2>
									<div class="card-body">

									<div id="tableU">
										<div class="form-group col-md-12">
											<label>Buscar</label><input id="searchTerm" type="text" class="form-control" onkeyup="doSearch('searchTerm','userTable')" />
										</div>
										<table id="userTable" class="table table-striped table-hover">
											<thead align="center">
											<tr>
												<th>#</th>
												<th>Usuario</th>
												<th>Correo electronico</th>
												<th>Estado</th>
												<th>Accion</th>
												<!--<th>Nota</th> -->
											</tr>
											</thead>
											<tbody  id="tableUsers" align="center">
											</tbody>
										</table>
									</div>

										<form id="formUsers" style="display: none;">
											<div class="form-group row">

												<div class="form-group col-md-6">
													<label class="control-label" >Usuario</label>
													<input id="user_id" type="hidden">
													<input type="text" id="username" name="username" class="form-control" placeholder="Usuario" required="required" minlength = "8" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$|.{8}|.{10}">
												</div>

												<div class="form-group col-md-6">
													<label class="control-label">Correo Electronico</label>
													<input id="email" name="email" type="email" placeholder="Correo Electronico" value="" class="form-control" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
												</div>

												<div class="form-group col-md-6">
													<label class="control-label">Contraseña </label>
													<input type="password"  name="password" id="password" placeholder="Contraseña" class="form-control" required="required" minlength = "5">
												</div>

												<div class="form-group col-md-6 pw">
													<label class="control-label">Rol</label>
													<select class="form-control" required="required" id="roles_id" name="roles_id">
														@foreach($roles as $row)
															<option  value="{{$row->roles_id}}">{{$row->name}}</option>
														@endforeach
													</select>
												</div>

												<div class="form-group col-md-6">
													<label class="control-label">estado</label>
													<select class="form-control" required="required" id="status" name="status">
														<option value="1">Activo</option>
														<option value="0">Inactivo</option>
													</select>
												</div>

												<div class="form-group col-md-6">
													<br>
													<input style="position: relative;top:7px;" type="submit" value="Guardar Datos" class="form-control btn btn-success btn-sm">
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection


@section("sistema")
	<section class="dashboard-Info" id="sistema" style="display: none">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="work-amount card">
						<div class="card-close">
							<div class="dropdown">
								<button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
								<div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Cerrar</a></div>
							</div>
						</div>
						<div class="card-body">
							<div class="col-md-12">
								<hr>
								<button onclick="cargarPrincipal()" class="btn btn btn-dark btn-sm">Informacion principal</button>&nbsp;&nbsp;
								<button onclick="caragarDB()" class="btn btn btn-danger btn-sm">Configurar Base de datos</button>&nbsp;&nbsp;
								<hr>

								<form id="formPrincipal" style="display: none;">
									<div class="form-group col-md-12">
										<label>Titulo del proyecto</label>
										<input type="text" id="title" name="title" value="{{$title}}" class="form-control" placeholder="Titulo proyecto" required="required">
									</div>

									<div class="form-group col-md-12">
										<label>Descripcion para el buscador</label>
										<input type="text" id="description" name="description" value="{{$description}}" class="form-control" placeholder="Descripcion para el buscador" required="required">
									</div>

									<div class="form-group col-md-12">
										<label>Favicont</label>
										<input type="file" id="imgfavicon"  onchange="ecodeImg(this);" class="form-control col-md-11">
										<input type="hidden"  id="favicon" name="title" value="{{$favicon}}" class="form-control col-md-11" required="required">
										<img id="imgFavicon" width="33" style="position: relative; bottom: 34px;left:94%" src="{{$favicon}}" class="img-responsive">
									</div>

									<div class="form-group col-md-12">
										<label>Configuracion Envio de correo electronico</label>
										<div  id="emailConfig" class="form-control text-left" contenteditable="false" style="background: #1b1e21; color: white">
											$config["email"] = array(<br>
												<pre style='display:inline'>&#09;</pre>"protocol"  => "{{$configEmail["protocol"]}}",<br>
												<pre style='display:inline'>&#09;</pre>"smtp_host" => "{{$configEmail["smtp_host"]}}",<br>
												<pre style='display:inline'>&#09;</pre>"smtp_port" => {{$configEmail["smtp_port"]}},<br>
												<pre style='display:inline'>&#09;</pre>"smtp_user" => "{{$configEmail["smtp_user"]}}",<br>
												<pre style='display:inline'>&#09;</pre>"smtp_pass" => "{{$configEmail["smtp_pass"]}}",<br>
												<pre style='display:inline'>&#09;</pre>"mailtype"  => "{{$configEmail["mailtype"]}}",<br>
												<pre style='display:inline'>&#09;</pre>"charset"   => "{{$configEmail["charset"]}}",<br>
												<pre style='display:inline'>&#09;</pre>"newline"   => {{json_encode($configEmail["newline"])}},<br>
											);
										</div>
									</div>

									<div class="form-group col-md-12">
										<label>Email</label>
										<input type="text" id="smtp_user" name="smtp_user" value="{{$configEmail["smtp_user"]}}" class="form-control" placeholder="{{$configEmail["smtp_user"]}}" required="required">
									</div>


									<div class="form-group col-md-12">
										<label>Contraseña</label>
										<input type="text" id="smtp_pass" name="smtp_pass" value="{{$configEmail["smtp_pass"]}}" class="form-control" placeholder="{{$configEmail["smtp_pass"]}}" required="required">
									</div>

									<div class="form-group col-md-12">
										<br>
										<input style="position: relative;top:7px;" type="submit" value="Guardar Datos" class="form-control btn btn-info btn-sm">
									</div>
								</form>


								<form id="formDB" style="display: none;">
									<div class="form-group col-md-12">
										<label>Configuracion base de datos</label>
										<div id="dbConfig" class="form-control text-left" contenteditable="false" style="background: #1b1e21; color: white">
											$db["default"] = array(<br>
											<pre style='display:inline'>&#09;</pre>"dsn"	=> "",<br>
											<pre style='display:inline'>&#09;</pre>"hostname" => "{{$db->hostname}}",<br>
											<pre style='display:inline'>&#09;</pre>"username" => "{{$db->username}}",<br>
											<pre style='display:inline'>&#09;</pre>"password" => "{{$db->password}}",<br>
											<pre style='display:inline'>&#09;</pre>"database" => "{{$db->database}}",<br>
											<pre style='display:inline'>&#09;</pre>"dbdriver" => "mysqli",<br>
											<pre style='display:inline'>&#09;</pre>"dbprefix" => "",<br>
											<pre style='display:inline'>&#09;</pre>"pconnect" => FALSE,<br>
											<pre style='display:inline'>&#09;</pre>"db_debug" => (ENVIRONMENT !== "production"),<br>
											<pre style='display:inline'>&#09;</pre>"cache_on" => FALSE,<br>
											<pre style='display:inline'>&#09;</pre>"cachedir" => "",<br>
											<pre style='display:inline'>&#09;</pre>"char_set" => "utf8",<br>
											<pre style='display:inline'>&#09;</pre>"dbcollat" => "utf8_general_ci",<br>
											<pre style='display:inline'>&#09;</pre>"swap_pre" => "",<br>
											<pre style='display:inline'>&#09;</pre>"encrypt" => FALSE,<br>
											<pre style='display:inline'>&#09;</pre>"compress" => FALSE,<br>
											<pre style='display:inline'>&#09;</pre>"stricton" => FALSE,<br>
											<pre style='display:inline'>&#09;</pre>"failover" => array(),<br>
											<pre style='display:inline'>&#09;</pre>"save_queries" => TRUE<br>
											);
										</div>
									</div>


									<div class="form-group col-md-12">
										<label>Hostname defualt: localhost</label>
										<input type="text" id="hostname" name="hostname" value="{{$db->hostname}}" class="form-control" placeholder="{{$db->hostname}}" required="required">
									</div>

									<div class="form-group col-md-12">
										<label>username Default: root</label>
										<input type="text" id="usernamedb" name="usernamedb" value="{{$db->username}}" class="form-control" placeholder="{{$db->username}}" required="required">
									</div>

									<div class="form-group col-md-12">
										<label>password Default: '' </label>
										<input type="text" id="passworddb" name="passworddb" value="{{$db->password}}" class="form-control" placeholder="{{$db->password}}" required="required">
									</div>

									<div class="form-group col-md-12">
										<label>database Default: proyect_pensum</label>
										<input type="text" id="database" name="database" value="{{$db->database}}" class="form-control" placeholder="{{$db->database}}" required="required">
									</div>

									<div class="form-group col-md-12">
										<br>
										<input style="position: relative;top:7px;" type="submit" value="Guardar Datos" class="form-control btn btn-info btn-sm">
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@section("gestion-facultad")
	<section class="dashboard-Info" id="gestionFacultad" style="display: none">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="work-amount card">
						<div class="card-close">
							<div class="dropdown">
								<button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
								<div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Cerrar</a></div>
							</div>
						</div>
						<div class="card-body">
							<div class="col-md-12">
								<hr>
								<button onclick="loaderTable('facultad');" class="btn btn btn-dark btn-sm">Actualizar</button>&nbsp;&nbsp;
								<button onclick="btnRegisterFacultad()" class="btn btn btn-danger btn-sm">Crear Facultad</button>&nbsp;&nbsp;
								<hr>

								<table id="tableFacultad" class="table table-striped table-hover col-md-12" style="visibility: visible">
									<thead align="center">
									<tr>
										<th>#</th>
										<th>codigo facultad</th>
										<th>Nombre</th>
										<th>Accion</th>
									</tr>
									</thead>
									<tbody id="facultadTable" align="center"></tbody>
								</table>

								<div class="modal fade" id="facultadModal" role="dialog">
									<div class="modal-dialog col-md-9">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title">Gestion Facultad</h4>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>
											<div class="modal-body">
												<form id="formFacultad">
													<div class="form-group col-md-12">
														<label>Codigo Facultdad</label>
														<input type="hidden" id="faculty_id">
														<input type="text" id="code" name="code" value="" class="form-control" placeholder="Codigo Facultdad" required="required" minlength="1" maxlength="5">
													</div>
													<div class="form-group col-md-12">
														<label>Nombre Facultdad</label>
														<input type="text" id="name" name="name" value="" class="form-control" placeholder="Nombre Faculta" required="required" minlength="10" maxlength="30">
													</div>
													<div class="form-group col-md-6">
														<input class="btn btn-sm btn-info" type="submit" value="Guardar Facultad">
													</div>
												</form>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@section("gestion-carrera")
	<section class="dashboard-Info" id="gestionCarrera" style="display: none">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="work-amount card">
						<div class="card-close">
							<div class="dropdown">
								<button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
								<div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Cerrar</a></div>
							</div>
						</div>
						<div class="card-body">
							<div class="col-md-12">
								<hr>
								<button onclick="loaderTable('carrera');" class="btn btn btn-dark btn-sm">Actualizar</button>&nbsp;&nbsp;
								<button onclick="btnRegisterCarrera()" class="btn btn btn-danger btn-sm">Crear Carrera</button>&nbsp;&nbsp;
								<hr>

								<table id="tableCerrera" class="table table-striped table-hover col-md-12" style="visibility: visible">
									<thead align="center">
									<tr>
										<th>#</th>
										<th>codigo Cerrera</th>
										<th>Nombre Carrera</th>
										<th>Nombre Facultad</th>
										<th>Accion</th>
									</tr>
									</thead>
									<tbody id="carreraTable" align="center"></tbody>
								</table>

								<div class="modal fade" id="carreraModal" role="dialog">
									<div class="modal-dialog col-md-9">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title">Gestion Carrera</h4>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>
											<div class="modal-body">
												<form id="formCarrera">
													<div class="form-group col-md-12">
														<label>Codigo Carrera</label>
														<input type="hidden" id="career_id">
														<input type="text" id="codeCareer" name="codeCareer" value="" class="form-control" minlength="4" placeholder="Nombre Carrera" required="required">
													</div>
													<div class="form-group col-md-12">
														<label>Nombre Carrera</label>
														<input type="text" id="nameCarrer" name="nameCarrer" value="" class="form-control" minlength="4" placeholder="Nombre Carrera" required="required">
													</div>

													<div class="form-group col-md-12">
														<label>Nombre Facultad</label>
														<select id="faculty" class="form-control">
															@foreach($facultad as $row)
																<option value="{{$row->faculty_id}}">{{$row->name}}</option>
															@endforeach
														</select>
													</div>

													<div class="form-group col-md-6">
														<input class="btn btn-sm btn-info" type="submit" value="Guardar Carrera">
													</div>

												</form>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection



@section("gestion-pensum")
	<section class="dashboard-Info" id="gestionPensum" style="display: none">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="work-amount card">
						<div class="card-close">
							<div class="dropdown">
								<button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
								<div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Cerrar</a></div>
							</div>
						</div>
						<div class="card-body">
							<div class="col-md-12">
								<hr>
								<button onclick="loaderTable('pensum');" class="btn btn btn-dark btn-sm">Actualizar</button>&nbsp;&nbsp;
								<button onclick="btnRegisterPensum()" class="btn btn btn-danger btn-sm">Crear Pensum</button>&nbsp;&nbsp;
								<button onclick="$('#jefeModal').modal();loaderTable('jefes')" class="btn btn btn-info btn-sm">Asignar Jefe Departamento</button>&nbsp;&nbsp;
								<hr>

								<table id="tablePensum" class="table table-striped table-hover col-md-12" style="visibility: visible">
									<thead align="center">
									<tr>
										<th>#</th>
										<th>codigo Pensum</th>
										<th>Fecha creacion</th>
										<th>Total Creditos</th>
										<th>Detalle</th>
										<th>Cerrara</th>
									</tr>
									</thead>
									<tbody id="pensumTable" align="center"></tbody>
								</table>


								<div class="modal fade" id="jefeModal" role="dialog">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title">Gestion Jefe Departamento</h4>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>
											<div class="modal-body">
												<form id="formJefe">
													<div class="form-group col-md-12">
														<label class="form-control-sm col-md-5">Nombre Usuario</label>
														<label class="form-control-sm col-md-5">Codigo pensum</label>

														<select id="jefe_id" class="form-control-sm col-md-5">
															@foreach($jefes as $row)
																@if(isset($row->namePerson))
																	<option value="{{$row->person_id}}">{{$row->namePerson}}</option>
																@else
																	<option value="{{$row->person_id}}">{{$row->email}}</option>
																@endif
															@endforeach
														</select>
														<select id="jefe_pensum_id" class="form-control-sm col-md-5">
															@foreach($pensum as $row)
																<option value="{{$row->pensum_id}}">{{$row->codePensum}}</option>
															@endforeach
														</select>
													</div>

													<div class="form-group col-md-6">
														<input class="btn btn-sm btn-info" type="submit" value="Asignar Pensum a usuario">
													</div>
												</form>


												<hr>
												<table id="tableJefes" class="table table-striped table-hover col-md-12" style="visibility: visible">
													<thead align="center">
													<tr>
														<th>#</th>
														<th>Nombre Usuario</th>
														<th>Codigo pensum</th>
														<th>Nombre Facultad</th>
														<th>Nombre Carrera</th>
														<th>Accion</th>
													</tr>
													</thead>
													<tbody id="jefesTable" align="center"></tbody>
												</table>

											</div>
										</div>
									</div>
								</div>

								<div class="modal fade" id="pensumModal" role="dialog">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title">Gestion Pensum</h4>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>
											<div class="modal-body">
												<form id="formPensum">
													<div class="form-group col-md-12">
														<label>Codigo pensum</label>
														<input type="hidden" id="pensum_id">
														<input type="text" id="codePensum" onkeyup="searhCode(this.value)" name="codePensum" value="" class="form-control" minlength="10"  style="text-transform: uppercase;" placeholder="Codigo Pensum" required="required">
													</div>
													<div class="form-group col-md-12">
														<label>Fecha Creacion</label>
														<input type="date" id="create_date" name="create_date" value="" class="form-control" minlength="4" placeholder="Fecha De Creacion" required="required">
													</div>

													<div class="form-group col-md-12">
														<label>Cantidad de Credito</label>
														<input type="number" min="100" id="credit_numbers" name="credit_numbers" value="" class="form-control" minlength="4" placeholder="Cantidad de credito" required="required">
													</div>

													<div class="form-group col-md-12">
														<label>Detalle</label>
														<div id="detail" onkeypress="divEdtiable('detail')" class="form-control text-left" contenteditable="true">
														</div>
													</div>

													<div class="form-group col-md-12">
														<label>Estado de la carrera</label>
														<select id="statusPensum" class="form-control">
															<option value="1">Antiguo</option>
															<option value="2">Nuevo</option>
															<option value="0">Inactivo</option>
														</select>
													</div>

													<div class="form-group col-md-12">
														<label>Carrera</label>
														<select id="career" class="form-control">
															@foreach($carreras as $row)
																<option value="{{$row->career_id}}">{{$row->name}}</option>
															@endforeach
														</select>
													</div>

													<div class="form-group col-md-6">
														<input class="btn btn-sm btn-info" type="submit" value="Guardar Pensum">
													</div>

												</form>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


@endsection

@section("info")
	<section class="dashboard-header" id="info" style="display: none">
		<div class="container-fluid">
			<div class="row">
				<!-- Statistics -->
				<!-- Line Chart            -->
				<div class="col-lg-12">
					<div class="bar-chart-example card">
						<div class="card-close">
							<div class="dropdown">
								<button type="button" id="closeCard6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
								<div aria-labelledby="closeCard6" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Cerrar</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
							</div>
						</div>
						<div class="card-header d-flex align-items-center">
							<h3 class="h4">Reportes</h3>
						</div>
						<div class="card-body">
							<hr>
							<br>
							<div class="form-group col-12">
								<label class="form-control-sm col-lg-12">Pesum</label>
								<select id="selectPensumId" class="form-control-sm form-control col-lg-12">
									@foreach($jefePensum as $row)
										<option value="{{$row->pensum_id}}">{{$row->codePensum}}</option>
									@endforeach
								</select>
								<br>
								<center>
									<label class="form-control-sm col-lg-5">Opcion 1</label>
									<label class="form-control-sm col-lg-5">Opcion 2</label>
									<select id="option1" class="form-control-sm col-lg-5">
										<option>Seleccione Una opcion</option>
										<option value="1">Materia Ponderada Vs Semestre</option>
										<option value="2">Materia Ganadas Vs Sesmtre</option>
										<option value="3">Materia Perdidas Vs Semestre</option>
										<option value="4">Materia individual Vs Semestre</option>
									</select>
									<select id="option2" class="form-control-sm col-lg-5">
										<option>Seleccione una opcion</option>
									</select>
									<hr>
									<br>
								</center>
							</div>
							<canvas id="lineal1" style="display: none"></canvas>
							<canvas id="lineal2" style="display: none"></canvas>
							<canvas id="lineal3" style="display: none"></canvas>
							<canvas id="barra1" style="display: none"></canvas>
							<canvas id="barra2" style="display: none"></canvas>
							<canvas id="barra3" style="display: none"></canvas>
							<canvas id="barra4" style="display: none"></canvas>
						</div>


						<div class="modal fade" id="pensumModal" role="dialog">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title">Seleccione pensums</h4>
										<button type="button" class="close" data-dismiss="modal">&times;</button>
									</div>
									<div class="modal-body">
										<div class="form-group col-12">
											<label class="form-control">Documento Estudiante</label>
											<input class="form-control" id="documentoEstudiante" value="" minlength="8" maxlength="10" required="required">
										</div>
										<div onclick='crearChar({"pensum_id":$("#selectPensumId").val(),"chart":"bar","tipo":"4","document":$("#documentoEstudiante").val()});' class="form-group col-12">
											<button onclick="" class="btn btn-info btn-sm">Genera Grafica</button>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="card-header d-flex align-items-center">
							<label class="">Promedio ponderado semestre x Materia, informacion basada semestre y materia no es la misma del vortal</label>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection

@section("gestion-estudiantes")
	<section class="dashboard-header" id="gestionEstudiantes" style="display: none">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="bar-chart-example card">
						<div class="card-close">
							<div class="dropdown">
								<button type="button" id="closeCard6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
								<div aria-labelledby="closeCard6" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Cerrar</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
							</div>
						</div>
						<div class="card-header d-flex align-items-center">
							<h3 class="h4">Gestion Homologacion Estudiante</h3>
						</div>
						<div class="card-body">
							<div class="form-group col-md-12">
								<button class="btn btn-dark btn-sm" onclick="$('#modalStudents').modal();">Solicitar Homologacion</button>
							</div>

							<div class="form-group col-md-12">
								<label>Buscar</label><input id="searchTerm" type="text" class="form-control" onkeyup="doSearch('searchTerm','tableHomoStudents')" />
							</div>
							<table id="tableHomoStudents" class="table table-striped table-hover col-md-12">
								<thead align="center">
								<tr>
									<th>#</th>
									<th>Documento</th>
									<th>Nombre</th>
									<th>Pensum Actual</th>
									<th>Pensum Nuevo</th>
									<th>Estado</th>
									<th>Accion</th>
								</tr>
								</thead>
								<tbody id="homoStudentsTable" align="center"></tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<div class="modal fade modal-fullscreen" id="modalStudents" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Solicitud Cambio de Pensum</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<div class="col-md-12">
						<form id="formRequestChange">
							<div class="form-group" align="center">
								<img id="student_img" width="100">
							</div>
							<div class="form-group">
								<label for="documento_change">Documento Jefe Departamento</label>
								<input type="number" class="form-control" value="{{$persons->document}}" disabled="disabled" required="required" maxlength="10" minlength = "8" pattern=".{8}|.{10}" placeholder="Documento Estudiante" name="">
							</div>
							<div class="form-group">
								<p style="font-size: 10px;">escriba el documento del estudiante, depues de ingresar los 8 o 10 digites de este saldran sus datos</p>
								<label for="documento_change">Documento Estudiante</label>
								<input type="number" onkeyup="if(this.value.length==7 || this.value.length==10){searhStudent(this.value);}" class="form-control" id="documento_change"  required="required" maxlength="10" minlength = "8" pattern=".{8}|.{10}" placeholder="Documento Estudiante" name="documento_change">
								<input type="hidden" id="person_id">
								<input type="hidden" id="student_id">
							</div>
							<div class="form-group">
								<label for="current_pensum_id">Pensum Actual</label>
								<input type="text" disabled="disabled" class="form-control" id="code_current_pensum" placeholder="Pensum Actual" name="code_current_pensum">
								<input type="hidden"  class="form-control" id="current_pensum_id" placeholder="Pensum Actual" name="current_pensum_id">
							</div>

							<div class="form-group">
								<label for="code_pensum_id">Pensum Actual</label>
								<input type="text" disabled="disabled" class="form-control" id="code_new_pensum" placeholder="Nuevo pensum" name="code_new_pensum">
								<input type="hidden" class="form-control" id="new_pensum_id" placeholder="Nuevo pensum" name="new_pensum_id">
							</div>

							<div class="form-group">
								<label for="current_pensum">Estado</label>
								<select  class="form-control" id="status_change">
									<option value="0">Pendiente</option>
									<option value="1">Homologada</option>
								</select>
							</div>

							<div class="form-group">
								<input type="submit" class="btn btn-info" value="Solicitar Cambio de pensum">
								<button type="button" id="viewReport" disabled="disabled" class="btn btn-primary" onclick="$('#tableRH').css('display','block');return loaderTableRH($('#new_pensum_id').val(),$('#person_id').val());">Ver Equivalencia</button>
							</div>
						</form>

						<div class="card-body" id="tableRH" style="display: none">
							<div class="col-12">
								<div class="text-center">
									<h2 class="h2"><small>Reportes de materias Homologadas</small></h2>
									<div class="table-responsive">
										<div>
											<span class="col-md-5 bg-blue">Pensum Actual</span>
											<span class="col-md-5 bg-green">Pensum Nuevo</span>
										</div>
										<br>
										<table class="table table-striped table-hover">
											<thead align="center">
											<tr>
												<th>#</th>
												<th>Codigo Actual</th>
												<th>Nombre Materia</th>
												<th>Codigo Nuevo</th>
												<th>Nombre Materia</th>
												<!--<th>Nota</th> -->
											</tr>
											</thead>
											<tbody id="table-RH" align="center"></tbody>
										</table>
										<button class="btn btn-info btn-sm col-md-3" onclick="return tableReportH($('#new_pensum_id').val(),$('#person_id').val());">Imprimir reporte</button>
										<button class="btn btn-danger btn-sm col-md-3" onclick="$('#tableRH').css('display','none');">Cerrar Reporte</button>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>
@endsection

