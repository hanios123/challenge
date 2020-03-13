<!-- Modal -->
<div class="modal fade" id="code{{$participant->id}}" tabindex="-1" role="dialog" aria-labelledby="code{{$participant->id}}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="code{{$participant->id}}">View Code</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"  id="codeArea{{$participant->id}}">
            {{--  <div class="form-group">
                <label for="title">Code</label>
                <textarea name="code" id="codeArea{{$participant->id}}">

                </textarea>
            </div>  --}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
