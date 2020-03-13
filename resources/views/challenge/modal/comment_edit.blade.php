<!-- Modal -->
<div class="modal fade" id="editComment{{$comment->pivot->id}}" tabindex="-1" role="dialog" aria-labelledby="editComment{{$comment->pivot->id}}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editComment{{$comment->pivot->id}}">Edit Comment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form" method="POST" action="{{route('comment.edit',$comment->pivot->id)}}">
        @csrf
      <div class="modal-body">
            <div class="form-group">
                <label for="title">Comment</label>
                <textarea  class="form-control" name="content" id="content" placeholder="Write comment here" required>{{$comment->pivot->content}}</textarea>
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
