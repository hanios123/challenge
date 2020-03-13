<!-- Modal -->
<div class="modal fade" id="decide{{$participant->id}}" tabindex="-1" role="dialog" aria-labelledby="decide{{$participant->id}}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="decide{{$participant->id}}">Decide Winner</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form" method="POST" action="{{route('participant.winner',$participant->pivot->id)}}">
        @csrf
      <div class="modal-body">
            <div class="form-group">
               <label for="rank">Rank</label>
               <input type="number" class="form-control" name="rank" id="rank" placeholder="Rank"  required>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Title"  required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" placeholder="Description" required></textarea>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Winner</button>
      </div>
    </form>
    </div>
  </div>
</div>
