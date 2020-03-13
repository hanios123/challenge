<!-- Modal -->
<div class="modal fade" id="edit{{$challenge->id}}" tabindex="-1" role="dialog" aria-labelledby="edit{{$challenge->id}}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit{{$challenge->id}}">Edit Challenge</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form" method="POST" action="{{route('challenge.edit',$challenge->id)}}">
        @csrf
      <div class="modal-body">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{$challenge->title}}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" placeholder="Description" required>{{$challenge->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="deadline">Dead Line</label>
                @php
                   $newDate = date('Y-m-d\TH:i', strtotime($challenge->deadline));
                @endphp
                <input type="datetime-local" class="form-control" id="deadline" name="deadline" placeholder="Dead Line" value="{{$newDate}}"  required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="status" id="status">
                    <option value="ongoing" @if($challenge->status == 'ongoing') selected @endif>Ongoing</option>
                    <option value="closed" @if($challenge->status == 'closed') selected @endif>Closed</option>
                </select>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>
