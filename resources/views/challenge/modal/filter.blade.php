<!-- Modal -->
<div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="filter" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="filter">Filter Challenge</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form" method="POST" action="{{route('challenge.store')}}">
        @csrf
      <div class="modal-body">
            <div class="form-group">
                <label for="title">KeyWord</label>
                <input type="text" class="form-control" name="keyword" id="keyword" placeholder="KeyWord" >
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" >
                    <option value="all">All</option>
                    <option value="ongoing">Ongoing</option>
                    <option value="closed">Closed</option>
                </select>
            </div>
            <div class="form-group">
                <label for="startDate">Start Date</label>
                <input type="date" class="form-control" id="startDate" name="startDate" >

                <label for="endDate">Start Date</label>
                <input type="date" class="form-control" id="endDate" name="endDate" >
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Filter</button>
      </div>
    </form>
    </div>
  </div>
</div>
