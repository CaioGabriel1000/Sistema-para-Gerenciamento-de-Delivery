@extends('layouts.gerenciamento')

@section('content')

<div class="container">

@if ($message = Session::get('success'))

<div class="alert alert-success">
	{{$message}}
</div>
	
@endif

@if ($message = Session::get('error'))

<div class="alert alert-danger">
	{{$message}}
</div>
	
@endif

@if (count($errors) > 0)

<div class="alert alert-danger">
	<ul>

		@foreach ($errors->all() as $e)

		<li>{{$e}}</li>

		@endforeach
		
	</ul>
</div>
	
@endif

<h1 class="mb-3">Cadastrar grupo de produtos</h1>
<form method="POST" enctype="multipart/form-data" action="{{ route('grupoprodutos.store') }}">

		@csrf

		<div class="form-group mb-3">
			<label for="nome">Nome</label>
			<input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome do produto..." required>
		</div>

		<div class="form-group mb-3">
			<label for="sku">SKU</label>
			<input type="text" class="form-control" id="sku" name="sku" placeholder="Digite o SKU..." required>
		</div>

		<div class="form-group mb-3">
			<label for="descricao">Descrição</label>
			<textarea class="form-control" id="descricao" name="descricao" rows="3" placeholder="Digite uma breve descrição do produto..." required></textarea>
		</div>

		<div class="form-group">
			<label for="codigoCategoria">Categoria</label>
			<select id="codigoCategoria" name="codigoCategoria" class="form-control">

				@foreach ($categorias as $c)

				<option value="{{$c->codigoCategoria}}">{{$c->nome}}</option>

				@endforeach

			</select>
		</div>

		<div class="form-group mb-3">
			<label for="sku">Imagem do produto (imagem compactada com extensão png)</label>
			<input type="file" class="form-control-file" id="imagemProduto" name="imagemProduto" required>
		</div>

		<div class="row control-group after-add-more">
			<div class="col-4">
			
				<div class="form-group">
					<label for="nomeSubtipo[]">Tamanho</label>
					<input type="text" class="form-control" id="nomeSubtipo[]" name="nomeSubtipo[]" placeholder="Digite o tamanho do produto..." required>
				</div>
			
			</div>

			<div class="col-3">
			
				<label for="preco">Preço</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">R$</span>
					</div>
					<input type="number" step=".01" class="form-control" id="valorUnitario[]" name="valorUnitario[]" placeholder="0,00" required>
				</div>
			
			</div>

			<div class="col-3">
				<div class="form-group mb-3">
					<label for="quantidadeEstoque[]">Quantidade Estoque</label>
					<input type="number" class="form-control" id="quantidadeEstoque[]" name="quantidadeEstoque[]" placeholder="Digite a quantidade de unidades no estoque..." required>
				</div>
			</div>
			
			<div class="col-2">
			
				<button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i>Adicionar</button>
			
			</div>
				
		</div>

		<button type="submit" class="btn btn-primary">Cadastrar</button>

	</form>

</div>

<!-- Copy Fields -->
<div class="copy d-none">

<div class="row control-group">

<div class="col-4">

<div class="form-group">
<label for="nomeSubtipo[]">Tamanho</label>
<input type="text" class="form-control" id="nomeSubtipo[]" name="nomeSubtipo[]" placeholder="Digite o tamanho do produto...">
</div>

</div>

<div class="col-3">

<label for="preco">Preço</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text" id="basic-addon1">R$</span>
</div>
<input type="number" step=".01" class="form-control" id="valorUnitario[]" name="valorUnitario[]" placeholder="0,00">
</div>

</div>

<div class="col-3">

<div class="form-group mb-3">
<label for="quantidadeEstoque[]">Quantidade Estoque</label>
<input type="number" class="form-control" id="quantidadeEstoque[]" name="quantidadeEstoque[]" placeholder="Digite a quantidade de unidades no estoque...">
</div>

</div>

<div class="col-2">

<button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i>Remover</button>

</div>

</div>

</div>

<script type="text/javascript">


    $(document).ready(function() {


      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });


      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });


    });


</script>

@endsection