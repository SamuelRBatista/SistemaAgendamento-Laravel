<div class="modal fade" id="deleteAgenda{{ $cli->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
            <p> Deseja mesmo excluir esse agendamento</p>


      </div>
      <div class="modal-footer">     
        <a class="btn btn-danger" href="{{URL::to('/agenda/'.$cli->id)}}" >Delete</a>      
      </div>
    </div>
  </div>
</div>