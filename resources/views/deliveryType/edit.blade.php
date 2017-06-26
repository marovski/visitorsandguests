            
   
    @extends('main')

    @section('title', '| Edit Delivery Item')

    @section('assets')
    <link rel='stylesheet' href='/css/parsley.css' />
    @endsection

    @section('content')
    
        <div class="row">

           
                    <div class="panel-heading"><span class="glyphicon glyphicon-blackboard"></span> Edit Item</div>
                    <div class="col-md-8">

                         <form  class="form-horizontal"  role="form" method="POST" action="{{route('deliveryType.update', '$item->idDeliverType')}}" data-parsley-validate="">
                         
                            {{ csrf_field() }}
              <div class="form-group{{ $errors->has('cargo') ? ' has-error' : '' }}">
              <label for="cargo" class="col-md-4 control-label">Cargo Details:</label>

              <div class="col-md-6">
                <input id="cargo" type="text" class="form-control" name="cargo" value="{{ $item->materialDetails }}" required autofocus>

                @if ($errors->has('cargo'))
                <span class="help-block">
                  <strong>{{ $errors->first('cargo') }}</strong>
                </span>
                @endif
              </div>
            </div>
            
            <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}" >
              <label for="quantity" class="col-md-4 control-label">Quantity (per unity):</label>

              <div class="col-md-6">
                <input type="number" name="quantity" value="{{ $item->quantitity}}" required="" max="20000" min="100" placeholder="">

                                          

              @if ($errors->has('quantity'))
              <span class="help-block">
                <strong>{{ $errors->first('quantity') }}</strong>
              </span>
              @endif
            </div>
          </div>

            <div class="form-group{{ $errors->has('danger') ? ' has-error' : '' }}">
              <label for="danger" class="col-md-4 control-label">Dangerous Cargo:</label>

              <div class="col-md-6" >
                <p>

                  <label class="radio-inline"><input type="radio" name="danger" value="Yes">Yes</label>
                  <label class="radio-inline"><input type="radio" name="danger" value="No">No</label>

                  @if ($errors->has('danger'))
                  <span class="help-block">
                    <strong>{{ $errors->first('danger') }}</strong>
                  </span>
                  @endif
                </p>
              </div>
            </div>

            <div class="form-group{{ $errors->has('sensitivity') ? ' has-error' : '' }}">
              <label for="sensitivity" class="col-md-4 control-label"> Sensitivity Level (select one):</label>

              <div class="col-md-6">
                <select class="form-control" id="sensitivity" name="sensitivity" >
                  <option value="Low">Low</option>
                  <option value="Medium">Medium</option>
                  <option value="High">High</option>

                </select>                               

                @if ($errors->has('sensitivity'))
                <span class="help-block">
                  <strong>{{ $errors->first('sensitivity') }}</strong>
                </span>
                @endif
              </div>
            </div>
     </div>
                       <div class="col-md-4" > 
      <div class="well">
        <dl class="dl-horizontal">
          <dt>Created At:</dt>
          <dd>{{ date('M j, Y h:ia', strtotime($item->created_at)) }}</dd>
        </dl>

        <dl class="dl-horizontal">
          <dt>Last Updated:</dt>
          <dd>{{ date('M j, Y h:ia', strtotime($item->updated_at)) }}</dd>
        </dl>
        <hr>
        <div class="row">
          <div class="col-sm-6">
            {!! Html::linkRoute('delivers.show', 'Cancel', array($item->deliver_idDeliver), array('class' => 'btn btn-danger btn-block')) !!}
          </div>
          <div class="col-sm-6">
            {{ Form::submit('Save Changes', ['class' => 'btn btn-default btn-block']) }}
          </div>
        </div>

      </div>
      </div>
            </form>
            </div>
        
    @endsection
