@extends('layouts.app')

@section('content')
<meta http-equiv="refresh" content="30"/>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					<div class="text-center">
						<div class="d-block mx-auto mb-3">
							<i class="fas fa-clipboard-list fa-3x"></i>
						</div>
						<h1><small>Meus Pedidos</small></h1>
					</div>
				</div>
				<div class="card-body">

				@if (!empty($pedidos[0]))
					
					@foreach ($pedidos as $p)
					<div class="card">
						<div class="card-header">
							<h4>Pedido {{$p->codigoPedido}}</h4>
							<p class="d-flex justify-content-between">
								<span>
									<b>Situação: 
										@switch($p->situacao)
											@case('A')
												Aberto
												@break
											@case('E')
												Em processo de entrega
												@break
											@case('F')
												Entregue
												@break
											@case('C')
												Cancelado
												@break
											@default
												Aberto
										@endswitch
									</b>
								</span>
								<span>
									@if ($p->updated_at == NULL)
										{{ date("d-m-Y H:i", strtotime($p->created_at)) }}
									@else
										{{ date("d-m-Y H:i", strtotime($p->updated_at)) }}
									@endif
								</span>
							</p>
						</div>
						<div class="card-body">
							<ul class="list-group list-group-flush">
								@foreach ($p->detalhes as $d)
									<li class="box-shadow list-group-item d-flex justify-content-between">
										<small class="text-muted d-none d-md-block">{{$d->quantidade}} X {{$d->produto}}</small>
										<span class="text-muted"><small>R$ {{$d->valorUnitario}}</small></span>
									</li>
								@endforeach
							</ul>
						</div>
						<div class="card-footer justify-content-between">
							<p>
								<b>Valor Total: R$ {{$p->valorTotal}}</b>
							</p>
							<p>
								@if ($p['detalhes'][0]->logradouro == NULL)
									Cliente vai retirar pedido no estabelecimento.
								@else
									<b>Endereço: </b> {{$p['detalhes'][0]->logradouro}}, Nº {{$p['detalhes'][0]->numero}}, Bairro {{$p['detalhes'][0]->bairro}}, Cidade {{$p['detalhes'][0]->cidade}}	
								@endif
								
							</p>
							<p>
								<b>Observação: </b> {{$p->observacoes}}
							</p>
						</div>
					</div>
					<br>
					@endforeach

				@else

					<h6 class="text-center">Nenhum pedido! <a href="{{ url('/') }}">Clique aqui para escolher seus produtos!</a></h6>
					
				@endif
	
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
