
                    <div class="row">
                        <div class="col-md-6">
                        {{ trans('cruds.shipment.fields.mailno') }} <h4 class="d-inline-block">{{ $shipment->mailno }}</h4>    
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


                    <div class='row'>
                        <div class="col-md-4">
                            <div>
                            <h5 class="a-spacing-micro">Origin</h5>
                            </div>
                            <div>{{ $shipment->j_contact }}</div>
                            <div>{{ $shipment->j_company }}</div>
                            <div>{{ $shipment->j_address }}</div>
                            <div>{{ $shipment->j_city }}</div>
                            <div>{{ $shipment->j_province }}</div>
                            <div>{{ $shipment->j_post_code }}</div>
                            <div>{{ $shipment->j_country }}</div>
                            <div>{{ $shipment->j_tel }}</div>
                            <div>{{ $shipment->j_email }}</div>
                        </div>

                        <div class="col-md-4">
                            <div>
                            <h5 class="a-spacing-micro">Destination</h5>
                            </div>
                            <div>{{ $shipment->d_contact }}</div>
                            <div>{{ $shipment->d_company }}</div>
                            <div>{{ $shipment->d_address }}</div>
                            <div>{{ $shipment->d_city }}</div>
                            <div>{{ $shipment->d_province }}</div>
                            <div>{{ $shipment->d_post_code }}</div>
                            <div>{{ $shipment->d_country }}</div>
                            <div>{{ $shipment->d_tel }}</div>
                            <div>{{ $shipment->d_email }}</div>
                        </div>
                    </div>
                    </br>
            

                    <div class="row">
                        <div class="col-md-4">
                                    <table class='table table-bordered' width=100%>
                                        <tr>
                                                <th>{{ trans('cruds.shipment.fields.parcel_quantity') }}: </th>
                                                <td>{{ $shipment->parcel_quantity }}</td>
                                        </tr>
                                        <tr>
                                                <th>Dimension(L*W*H):</th>
                                                <td>{{ $shipment->cargo_length }}(cm) * {{ $shipment->cargo_width }}(cm) * {{ $shipment->cargo_height }}(cm)</td>
                                        </tr>
                                        <tr>
                                                <th>{{ trans('cruds.shipment.fields.cargo_total_weight') }}:</th>
                                                <td>{{ $shipment->cargo_total_weight }}</td>
                                        </tr>                                   
                                        <tr>
                                                <th>{{ trans('cruds.shipment.fields.realweightqty') }}:</th>
                                                <td>{{ $shipment->realweightqty }}</td>
                                        </tr>                                       
                                        <tr>
                                                <th>{{ trans('cruds.shipment.fields.volumeweightqty') }}:</th>
                                                <td>{{ $shipment->volumeweightqty }}</td>
                                        </tr>        
                                        <tr>
                                                <th> {{ trans('cruds.shipment.fields.meterageweightqty') }}:</th>
                                                <td> {{ $shipment->meterageweightqty }}</td>
                                        </tr>
                                    </table>

                        </div>
                        <div class="col-md-4">
                            <table class='table table-bordered' width=100%>
                                <tr>
                                    <th> {{ trans('cruds.shipment.fields.estimated_freight') }}: </th>
                                    <td>{{ $shipment->estimated_freight }}</td>
                                </tr>
                                <tr>
                                    <th> {{ trans('cruds.shipment.fields.actual_freight') }}: </th>
                                    <td>{{ $shipment->actual_freight }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('cruds.shipment.fields.paid_freight') }}: </th>
                                    <td>{{ $shipment->paid_freight }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('cruds.shipment.fields.outstanding_fee') }}:</th>
                                    <td> {{ $shipment->outstanding_fee }}</td>
                                </tr>
                            </table>                            
                        </div>
                     </div>



                    <br>

  

                    @if(1==2)
                    <div class="d-none">
                        Record Id: {{ $shipment->id }}
                        
                                {{ $shipment->j_mobile }}
                                {{ $shipment->j_area_code }}
                                {{ $shipment->d_contact_cn }}
                                {{ $shipment->d_area_code }}
                                {{ $shipment->ddp_remark }}
                                {{ $shipment->express_type }}

                        
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.trade_condition') }}
                                    </th>
                                    <td>
                                        {{ $shipment->trade_condition }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.express_reason') }}
                                    </th>
                                    <td>
                                        {{ $shipment->express_reason }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.express_reason_content') }}
                                    </th>
                                    <td>
                                        {{ $shipment->express_reason_content }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.buss_remark') }}
                                    </th>
                                    <td>
                                        {{ $shipment->buss_remark }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.custom_batch') }}
                                    </th>
                                    <td>
                                        {{ $shipment->custom_batch }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.harmonized_code') }}
                                    </th>
                                    <td>
                                        {{ $shipment->harmonized_code }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.aes_no') }}
                                    </th>
                                    <td>
                                        {{ $shipment->aes_no }}
                                    </td>
                                </tr>



                                    <th>
                                        {{ trans('cruds.shipment.fields.is_baggage') }}
                                    </th>
                                    <td>
                                        {{ $shipment->is_baggage }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.export_customer_type') }}
                                    </th>
                                    <td>
                                        {{ $shipment->export_customer_type }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.is_under_call') }}
                                    </th>
                                    <td>
                                        {{ $shipment->is_under_call }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shipment.fields.import_customer_type') }}
                                    </th>
                                    <td>
                                        {{ $shipment->import_customer_type }}
                                    </td>
                                </tr>
                    </div>

                    <div class="col-md-4">
                            <div>
                                <strong>  {{ trans('cruds.shipment.fields.pay_method') }}: </Strong>
                                {{ $shipment->pay_method }}
                            </div>
                            
                            <div>
                                <strong>  {{ trans('cruds.shipment.fields.receiver_type') }}: </Strong>
                                {{ $shipment->receiver_type }}
                            </div>

                            <div>
                                <strong>   </Strong>
                                
                            </div>
                            <div>
                                <strong>   {{ trans('cruds.shipment.fields.tracking') }}: </Strong>
                                {{ $shipment->tracking->sf_awb_url ?? '' }}
                            </div>

                            <div>
                                <strong>   {{ trans('cruds.shipment.fields.status') }}: </Strong>
                                {{ $shipment->status->name ?? '' }}
                            </div>

                            <div>
                                <strong>   {{ trans('cruds.shipment.fields.local_service_provider') }}: </Strong>
                                {{ $shipment->pickup_type->service_name ?? '' }}
                            </div>                    


                            <div>
                                <strong>   {{ trans('cruds.shipment.fields.pickup_type') }}: </Strong>
                                {{ $shipment->local_service_provider->name ?? '' }}
                            </div>    
                            <div>
                                <strong>   {{ trans('cruds.shipment.fields.sender_type') }}: </Strong>
                                {{ $shipment->sender_type }}
                            </div>  
                        </div>
                    @endif


                    <div class="">
                            <h4>Custom Info</h4>
                        </div>
                        <table class="table">
                            <thead>
                                <th> {{ trans('cruds.shipment.fields.tax_pay_type') }}:</th>
                                <th> {{ trans('cruds.shipment.fields.order_cert_type') }}:</th>
                                <th>ID</th>
                                <th>{{ trans('cruds.shipment.fields.currency') }}:</th>
                                <th></th>

                            </thead>
                            <tbody>

                                    <tr>
                                        <td>{{ App\Models\Shipment::TAX_PAY_TYPE_SELECT[$shipment->tax_pay_type] ?? '' }}</td>
                                        <td>{{ App\Models\Shipment::ORDER_CERT_TYPE_SELECT[$shipment->order_cert_type] ?? '' }}</td>
                                        <td></td>
                                        <td>{{ $shipment->currency }}</td>
                                        <td></td>

                                    </tr>

                            </tbody>
                        </table>






                        <div class="">
                            <h4>Shipment contents</h4>
                        </div>
                        <table class="table">
                            <thead>
                                <th>Item description</th>
                                <th>Quatity</th>
                                <th>Unit</th>
                                <th>Unit price</th>
                                <th>Sub-total</th>
                                <th>Origin</th>
                                <th>HS Code</th>
                            </thead>
                            <tbody>
                                @foreach($shipment->shipmentCargos as $cargo)
                                    <tr>
                                        <td>{{$cargo->name}}</td>
                                        <td>{{$cargo->count}}</td>
                                        <td>{{$cargo->unit}}</td>
                                        <td>{{$cargo->amount}}</td>
                                        <td>{{$cargo->total_value}}</td>
                                        <td>{{$cargo->source_area}}</td>
                                        <td>{{$cargo->hs_code}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                </div>


