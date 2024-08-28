@extends('layouts.panel')

@section('content')

<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card">
            <div class="card-header">{{ __('Dashboard') }}</div>
            <div class="row">
                
  
</div>

<div class="container">
    <div id="agenda">
        calendario
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="evento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="">

            <div class="form-group">
                <label for="id">ID</label>
                <input type="text" class="form-control" id="id" placeholder="Ingresa texto">
             </div>    

            <div class="form-group">
            <label for="title">titulo</label>
            <input type="text" class="form-control" id="title" placeholder="Ingresa el titulo del evento">
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="descripcion" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="star">star</label>
                <input type="text" class="form-control" id="star" placeholder="Ingresa texto">
             </div>

             <div class="form-group">
                <label for="end">end</label>
                <input type="text" class="form-control" id="end" placeholder="Ingresa texto">
             </div>
      </form> 
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

        </div>
    </div>
</div>




@endsection

