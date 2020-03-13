
<div id="mySidenav{{$participant->id}}" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav(mySidenav{{$participant->id}})">&times;</a>
    <!-- Modal -->
      <form role="form" method="POST" action="{{route('challenge.edit',$participant->id)}}">
        @csrf
      <div class="modal-body">
            <div class="form-group">
               <label for="rank">Rank</label>
               <input type="number" class="form-control" name="rank" id="rank" placeholder="Rank" value="{{$participant->title}}" required>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{$participant->title}}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" placeholder="Description" required>{{$participant->description}}</textarea>
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>

</div>
