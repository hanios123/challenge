<!-- Modal -->
<div class="modal fade" id="edit{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="edit{{$user->id}}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit{{$user->id}}">Edit User Auth</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form" method="POST" action="{{route('user.edit')}}">
        @csrf
      <div class="modal-body">
            <div class="form-group">
                <input type="hidden" value="{{$user->id}}" name="user_id">
                <label for="auth">Auth</label>
                <select class="form-control" name="auth" id="auth">
                    <option @if ($user->auth == 'guest') selected @endif value="guest">Guest</option>
                    <option @if ($user->auth == 'participant') selected @endif value="participant">Participant</option>
                    <option @if ($user->auth == 'organizer') selected @endif value="organizer">Organizer</option>
                    <option @if ($user->auth == 'admin') selected @endif value="admin">Admin</option>
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
