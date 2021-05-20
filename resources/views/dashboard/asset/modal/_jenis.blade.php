<!-- Modal -->
<div id="modalJenis" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Jenis Asset</h4>
      </div>
      <div class="modal-body">
      {!! Form::open(array('id' => 'frm-jenis', 'name' => 'frm-jenis',  'onsubmit' => "return false;")) !!}
      <input id="token-jenis" type="hidden" value="{{ csrf_token() }}">
      <!-- form -->
      <div class="alert alert-danger info-jenis" style="display:none;">
          <ul></ul>
      </div>

      <div class="form-group">
          <label>Jenis</label> <strong class="text-danger"> *</strong>
          {!! Form::text('jenis', null, ['class' => 'form-control', 'id' => 'jenis']) !!}
      </div>

      <div class="form-actions">
        <div class="row">
            <div class="col-md-12">
                  {!! Form::button('Save', array('class' => 'btn btn-primary save-jenis')) !!}
                  {!! Form::hidden('id', null, ['id' => 'id-jenis']) !!}
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
