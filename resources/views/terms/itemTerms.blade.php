<ul class="nav nav-tabs nav-tabs-bottom nav-justified">

@if(app()->getLocale() == 'en')
            <li class="nav-item"><a href="#bottom-justified-tab1" class="nav-link active" data-toggle="tab"></a></li>
        </ul>
        <div class="tab-content">
			<div class="tab-pane fade active show" id="bottom-justified-tab1">
                <p>Please list the items you are sending truthfully. In accordance with the relevant legal provisions, we may inspect your shipment during the delivery process and may also inspect the shipped items. If any discrepancies are found in  in the information you have provided, we will return the shipment, and the associated costs shall be borne by you.</p>
			</div>
		</div>
@else
            <li class="nav-item"><a href="#bottom-justified-tab2" class="nav-link active" data-toggle="tab"></a></li>

        </ul>
        <div class="tab-content">
			<div class="tab-pane fade  active show" id="bottom-justified-tab2">
                <p>请据实填写寄递物品。根据相关法律规定，我们将在寄递过程中开箱检查您寄递快物品，如发现您未如实填写，我们会将快件退回，由此产生的费用由您承担。</p>
			</div>
		</div>



@endif