@section('styles')
  @parent
  <link rel="stylesheet" type="text/css" href="{{asset('/css/stepper.css')}}">
@endsection('styles')

<div class="md-stepper-horizontal orange">

    @foreach ($item::status as $status)
      <div class="md-step editable
        @if($item->status == $status) 
          active
        @else
          next
        @endif
      ">
        <a href="#">
          <div class="md-step-circle"><span></span></div>
          <div class="md-step-title">{{ $status }}</div>
          <div class="md-step-optional"></div>
        </a>
        <div class="md-step-bar-left"></div>
        <div class="md-step-bar-right"></div>
      </div>
    @endforeach
</div>
<div>
    @switch($item->status)
        @case('Sugestão')
            @include('processar.sugestao')
        @break

        @case('Em Cotação')
            @include('processar.cotacao')
        @break

        @case('Em Licitação')
            @include('processar.licitacao')
        @break

        @case('Em Tombamento')
            @include('processar.tombamento')
        @break

        @case('Tombado')
            @include('processar.processamento')
        @break

        @case('Em Processamento Técnico')
            @include('processar.processado')
        @break
        
        @case('Negado')
            
        @break
        
        @case('Processado')
            
        @break 

        @default
            <span>Erro no sistema, contate a Seção Técnica de Informática</span>
    @endswitch
</div>

<br>