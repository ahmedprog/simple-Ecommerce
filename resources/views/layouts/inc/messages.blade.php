@if(count($errors)>0)
    @foreach($errors->all() as $error)
        
        <div class="alert alert-danger">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong>Danger!  </strong> {{$error}}
        </div>
    @endforeach
@endif

@if(session('success'))
<div class="alert alert-success alert-dismissable">
 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <strong>Success!  </strong> {{session('success')}}.
</div>
@endif
 
 

@if(session('error'))
<div class="alert alert-danger alert-dismissable">
 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <strong>Danger!  </strong> {{session('error')}}
</div>
    
@endif


