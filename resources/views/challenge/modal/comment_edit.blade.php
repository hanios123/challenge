<!-- Modal -->
<div class="modal fade" id="edit{{$comment->pivot->id}}" tabindex="-1" role="dialog" aria-labelledby="edit{{$comment->pivot->id}}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit{{$comment->pivot->id}}">Edit Comment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form" method="POST" action="{{route('comment.edit')}}">
        @csrf
      <div class="modal-body">
            <div class="form-group">
                <label for="title">Comment</label>
                <input type="text" class="form-control" name="content" id="content" placeholder="Write comment here" value="{{old($comment->pivot->content)}}" required>
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
