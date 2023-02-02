<ul class="nav nav-tabs nav-tabs-bottom nav-justified">

@if(app()->getLocale() == 'en')
            <li class="nav-item"><a href="#bottom-justified-tab1" class="nav-link active" data-toggle="tab"></a></li>
        </ul>
        <div class="tab-content">
			<div class="tab-pane fade active show" id="bottom-justified-tab1">
                <p>Please fill in the actual weight and dimensions. We will check the actual weight and dimensions of your shipment during the delivery process and if we find that you have underpaid the shipping costs due to inaccurate information, we reserve the right to request you to pay the difference.</p>
			</div>
		</div>
@else
            <li class="nav-item"><a href="#bottom-justified-tab2" class="nav-link  active" data-toggle="tab"></a></li>

        </ul>
        <div class="tab-content">
			<div class="tab-pane fade  active show" id="bottom-justified-tab2">
                <p>请据实填写实际重量和三维尺寸。我们会在寄递过程中复核您寄递快件的实际重量和尺寸，如发现您填写不实导致运费低缴，我们有权要求您补缴差额。</p>
			</div>
		</div>

@endif