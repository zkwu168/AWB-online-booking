<div class="row">
    <div class="col-md-6">
    Tracking No.
    <h1 class="d-inline-block">{{ $shipment->reference_no_2 }}</h1>
    </div>
    <div class="col-md-6 ">
    <div class="float-right">
        <th>
            {{ trans('cruds.shipment.fields.reference_no_1') }}
        </th>
        <td>
            {{ $shipment->reference_no_1 }}
        </td>
    </div>
    </div>
</div>
</br>
<div class="row">
   <div class="col-md-12">
    <form method="POST" action='' enctype="multipart/form-data" autocomplete="off">
            @method('POST')
            @csrf
        <label class="required control-label" for="condition">Item condition:</label>
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-warning ">
                <input type="radio" name="options" id="option1" autocomplete="off" checked> Active
            </label>
            <label class="btn btn-warning">
                <input type="radio" name="options" id="option2" autocomplete="off"> Radio
            </label>
            <label class="btn btn-warning">
                <input type="radio" name="options" id="option3" autocomplete="off"> Radio
            </label>
        </div>

        <div class="form-group">
            <label class="required control-label" for="condition">Item condition:</label>
            <div class="ml-4 mt-1">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="condition1" name="condition" class="custom-control-input" value="1" {{ (old('sender_type',"1") == "1") ? 'checked' : '' }}>
                    <label class="custom-control-label" for="condition1">Good to process</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="condition2" name="condition" class="custom-control-input" Value="2" {{ (old('sender_type') == "2") ? 'checked' : '' }}>
                    <label class="custom-control-label" for="condition2">Packaging damaged (take photo)</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="condition3" name="condition" class="custom-control-input" Value="3" {{ (old('sender_type') == "2") ? 'checked' : '' }}>
                    <label class="custom-control-label" for="condition3">Content damaged (take photo)</label>
                </div>                
            </div>
        </div>

        <div class="form-group">
            <label class="required" for="wh-bin">Put into Bin/Area:</label>
            <select class="form-control" name="wh-bin" id="wh-bin" value="" required>
                <option value disabled selected >Please select a Bin or Area</option>
                <option Value="Ready for processing">Ready for processing</option>
                <option Value="Escalation">Escalation</option>
                <option Value="Return">Return Area</option>
            </select>
        </div>



    </form>
   </div>
</div

