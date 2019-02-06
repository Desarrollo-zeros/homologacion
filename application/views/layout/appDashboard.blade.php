@extends('layout.appDashboard1') <!-- extiende html constante no modificar costante -->


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
						<div class="text"><strong>{{$matterWon}}</strong><br><small>Materias Ganadsa</small></div>
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
								<div aria-labelledby="closeCard6" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
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
								<div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a></div>
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
								<div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a></div>
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
										<button class="btn btn-info btn-sm col-md-4" onclick="return tableReportH();">Imprimir reporte</button>
										<button class="btn btn-danger btn-sm col-md-4" onclick="$('#reporte-RH').css('display','none');">Cerrar Reporte</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="dashboard-Info" style="display: none">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="work-amount card">
						<div class="card-close">
							<div class="dropdown">
								<button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
								<div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a></div>
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
													<input type="file" id="imgFile" name="imgFile[]" onchange="encodeImagetoBase64(this)"/>
													<input type="hidden" id="img" name="img">
												</div>
												<div class="form-group col-md-4">
													<img class="img-responsive img-thumbnail" style="position:relative; bottom:20px!important;" id="ViewimgPerson" width="100">
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
					<button type="button" class="btn btn-primary">Imprimir</button>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('reporte-alumno')
	<div id="imprimir-RH"></div>
@endsection
<!-- section  rol 1-->




