<!-- Modal -->
<div id="modalStatus" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Status Asset</h4>
      </div>
      <div class="modal-body">
      {!! Form::open(array('route' => 'dashboard.status.store', 'method' => 'POST', 'id' => 'frm-status', 'name' => 'frm-status')) !!}
      <input id="token-status" type="hidden" value="{{ csrf_token() }}">
      <!-- form -->
      <div class="alert alert-danger info-status" style="display:none;">
          <ul></ul>
      </div>

      <div class="form-group">
          <label>Status</label> <strong class="text-danger"> *</strong>
          {!! Form::text('status', null, ['class' => 'form-control', 'id' => 'status']) !!}
      </div>

      <div class="form-actions">
        <div class="row">
            <div class="col-md-12">
                  {!! Form::submit('Save', array('class' => 'btn btn-primary save-status')) !!}
                  {!! Form::hidden('id', 'modal', ['id' => 'id-status']) !!}
            </div>
          </div>
      </div>
      <!-- end form -->
      {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- Modal -->
