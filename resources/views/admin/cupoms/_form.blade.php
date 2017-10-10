
    {{-- <div class="form-group">
     {!! Form::label('User', 'Usuários', ['class'=>'col-md-2']) !!}
     {!! Form::select('user_id', $users, null, ['class'=>'form-control']) !!}      
    </div> --}}
<section id='section-register'>
    <h3>Dados do Cupom</h3>
     <div class="form-group">
     {!! Form::label('Description','Descrição',['class'=>'label-control col-md-2']) !!}
     <div class="col-md-4">
     {!! Form::text('description',null,['class'=>'form-control']) !!}      
     </div>
    </div>
    
    <div class="form-group">
     {!! Form::label('Code','Cupom',['class'=>'label-control col-md-2']) !!}
     <div class="col-md-2">
     {!! Form::text('code',null,['class'=>'form-control']) !!} 
      
    </div>
    {!! Form::button('Gerar Cupom',['class'=>'btn btn-success','id'=>'btn-code']) !!}
    </div>

    <div class="form-group">
     {!! Form::label('Validate','Validade',['class'=>'label-control col-md-2']) !!}
      <div class="col-md-2">
     {!! Form::date('validate',null,['class'=>'form-control']) !!}      
    </div>
    </div>

    <div class="form-group">
     {!! Form::label('Value','Valor',['class'=>'label-control col-md-2']) !!}
      <div class="col-md-4">
     {!! Form::text('value',null,['class'=>'form-control']) !!}      
    </div>
    </div>
   
   
    </section>

    
