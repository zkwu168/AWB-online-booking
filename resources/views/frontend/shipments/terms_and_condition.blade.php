@section('tc_waybill_en')
<div class="card">
                    <div class="card-body">

                    <ul class="nav nav-tabs nav-tabs-bottom ">
            <li class="nav-item"><a href="#bottom-justified-tab1" class="nav-link active" data-toggle="tab">Terms and Conditions of Waybill (UK)</a></li>
           
        </ul>
        <div class="tab-content">
			<div class="tab-pane fade active show" id="bottom-justified-tab1">
            <p>The residential surcharge will be charged according to delivery area.</p>
            <p>International Shipment Waybill Terms and Conditions (“T&C”)--Limit of SF's Liability</p>
            <p>For the consigned files, documents, bills and materials, the following limitations of liabilities are applicable to SF:</p>
            <ul>
            <li>1.SF does not undertake any indirect loss such as possible gains, loss of actual usage and business opportunities of the consignments.</li>
            <li>2.SF does not undertake the liabilities for any loss or damage due to the transportation delay.</li>
            <li>3.For loss or damage which is not applicable to Warsaw Convention or Montreal Convention, SF's liabilities shall not exceed the following, whichever is lower: USD 100/waybill or USD 20/kg or USD 9.07/lbs.</li>
            <li>4. Shipments containing items the carriage of which is prohibited or restricted by applicable laws, regulations or orders are to be refused shipping by SF. Carriage of certain items may be allowed, subject to the presentation of relevant documents upon request by SF. If relevant documents are not provided, SF has the right to refuse shipping and a shipment will be returned to sender, for which  a handling fee of £10* will be charged.
            *Amount is subject to change from time to time.</li>
            </ul>
            </div>

		</div>

                    <label class="custom-control custom-control-danger custom-checkbox mb-2">
						<input type="checkbox" class="custom-control-input" id="agreeToTerms" name="agreeToTerms">
						<span class="custom-control-label">I have confirmed that I have read and agree to the
                        "Terms and Conditions of Waybill (UK)"
                        </span>
					</label>
@endsection

@section('tc_waybill_cn')
<div class="card">
                    <div class="card-body">

                    <ul class="nav nav-tabs nav-tabs-bottom ">
                    <li class="nav-item"><a href="#bottom-justified-tab2" class="nav-link active" data-toggle="tab">《快递运单条款(英国)》</a></li>

        </ul>
        <div class="tab-content">
			<div class="tab-pane fade active show" id="bottom-justified-tab2">
            <p>住宅附加费会根据实际情况收取</p>
            <p>国际快件运单契约条款--顺丰责任限制</p>
            <p>对于托寄的文件、单证、票据、资料，顺丰适用以下责任限制：</p>
            <ul>
            <li>1.顺丰不承担您基于托寄物可能获得的收益、实际用途损失、商业机会等任何间接损失。</li>
            <li>2.顺丰不对运输延误而导致的任何损失或损害承担责任。</li>
            <li>3.对于不适用于《华沙公约》或《蒙特利尔公约》的损失或损害，顺丰的责任均不得超过以下各项中的低者：100美元/票或20美元/公斤或9.07美元/磅。</li>
            </ul>
            </div>
		</div>

                    <label class="custom-control custom-control-danger custom-checkbox mb-2">
						<input type="checkbox" class="custom-control-input" id="agreeToTerms" name="agreeToTerms">
						<span class="custom-control-label">我已确认阅读并同意《快递运单条款(英国)》
                        </span>
					</label>
@endsection

@section('dg_list_cn')

<!-- Modal -->
<div class="modal fade" id="dg-list" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header ">
        <h5 class="modal-title" id="exampleModalLongTitle">进出口件禁止/限制寄递物品</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="accept-page-popularization">
			<p>我们不寄递/有条件寄递下列物品：</p>
			<ul>
				<li>武器、仿真武器、弹药、管制器具及爆炸物品</li>
				<li>易燃烧性物品、易爆炸性物品</li>
				<li>氧化剂和过氧化物</li>
				<li>毒品及吸毒工具、非正当用途麻醉药品和精神药品、非正当用途的易制毒化学品、毒性物质</li>
				<li>生化制品、传染性、感染性物质</li>
				<li>腐蚀性物质、放射性物质</li>
				<li>各类危害国家安全和社会稳定的非法出版物、印刷品、音像制品等宣传品</li>
				<li>内容涉及国家秘密的文件、资料及其他物品</li>
				<li>间谍专用器材</li>
				<li>伪造或者变造的货币、有价证券、证件、公章等非法伪造物品</li>
				<li>货币和有价证券</li>
				<li>侵犯知识产权和假冒伪劣物品</li>
				<li>动植物尤其各类濒危野生动物植物及其制品</li>
				<li>如有碍人畜健康的、来自疫区的以及其他能传播疾病的食品、药品或者其他物品</li>
				<li>烟草和烟草制品、酒</li>
				<li>贵重物品（例如，艺术品、古董、宝石以及黄金等贵重金属）</li>
				<li>其它法律法规的违禁品</li>
			</ul>
			<p>除以上禁寄/限寄物品外，顺丰还有权拒绝寄递和/或暂停寄递以下物品：</p>
			<ul>
				<li>任何未提供寄件人和收件人的详细联络信息的包裹；</li>
				<li>在我们看来不适合寄递或未用适合寄递的方式恰当地描述、分类或包装和加标签并具备必要凭证的物品；</li>
				<li>因为产品本身或包装特性，我们基于自身判断认为可能危及运输工具及人员安全的物品；</li>
				<li>我们基于自身判断认为从经济角度或操作角度不可寄递的物品。</li>
			</ul>
			<p>
				遵守始发地国家/地区当前适用的法律法规及政府规定是寄件人的义务，因各个国家或地区规定禁止或限制寄递的物品不尽相同，除以上禁寄/限寄物品标准外，建议寄件人还需参考物品寄递目的地国家/地区的进出口禁寄/限寄物品列表。</p>
			<p class="red">温馨提示：</p>
			<p>我司已对“进出口件”收寄标准查询做如上调整，如您对您寄递的物品是否属于“禁寄/限寄”物品有疑问，可联系顺丰客服95338或点击<a
				href="https://ocs2odp.sf-express.com/app/init?orgName=sy&channelId=540&clientType=1&accountId=&ivrSentence=托寄物收寄标准明细查询"
				target="_blank">在线客服</a>咨询。</p>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('user_layout.create_order.close')}}</button>
      </div>
    </div>
  </div>
</div>
@endsection



@section('dg_list_en')
<!-- Modal -->
<div class="modal fade" id="dg-list" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header ">
        <h5 class="modal-title" id="exampleModalLongTitle">Prohibited Items</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="accept-page-popularization">
      <table class="tableHeaderData" border="0" width="100%" cellspacing="3" cellpadding="5">
   <tbody>
      <tr>
         <th class=" highlight-cell" width="120" height="23"><strong>Category</strong></th>
         <th class=" highlight-cell"><strong>Commodity</strong></th>
         <th class=" highlight-cell" width="70"><strong>Type</strong></th>
      </tr>
      <tr>
         <td height="20">Arms / Military</td>
         <td>Firearms, weaponry, ammunition and their parts, Military equipment</td>
         <td>Prohibited</td>
      </tr>
      <tr>
         <td height="20">Arms / Military</td>
         <td>Imitation (replica) firearms, weaponry, ammunition and their parts<br />Toy gun, toy pistols, toy revolvers<br /> </td>
         <td>Prohibited</td>
      </tr>
      <tr>
         <td height="20">Artworks</td>
         <td>Antiques, Cultural artifacts</td>
         <td>Prohibited</td>
      </tr>
      <tr>
         <td height="20">Biological</td>
         <td>Animal products e.g. Animal oil &amp; fats, Antibody, Bacillus, Bacon, Bacteria, Biological substance, Blood, Bone, Cell, Coliform, Feathers, Feed, Guts, Horns, Jerky, Petfood, Protein, Raw wool &amp; leather, Sausage, Semen, Serum</td>
         <td>Prohibited</td>
      </tr>
      <tr>
         <td height="20">Biological</td>
         <td>Live animals, insects, fish and birds</td>
         <td>Prohibited</td>
      </tr>
      <tr>
         <td height="20">Biological</td>
         <td>Plants, Seeds, Cotton seeds, Grain samples, Soil samples<br />Plant products e.g. Barley, Beans, Clay, Flour, Green coffee, Potpourri, Hay, Fresh / Dried fruits, Grain, Herb, Leaf, Malt, Nuts, Flowers, Rice, Seeds, Soil, Spices, Tea (excluding tea bag), tobacco, Walnut, Wheat, Wood, Vegetable</td>
         <td>Prohibited</td>
      </tr>
      <tr>
         <td height="20">Biological</td>
         <td>Tissue of livestock, Corpse (dead animals), human remains and ashes</td>
         <td>Prohibited</td>
      </tr>
      <tr>
         <td height="20">Biological &amp; Chemicals</td>
         <td>Hazardous waste - Biological and Chemical waste</td>
         <td>Prohibited</td>
      </tr>
      <tr>
         <td height="20">Chemicals</td>
         <td>Fuel samples (for analytical purposes)</td>
         <td>Prohibited</td>
      </tr>
      <tr>
         <td height="20">Chemicals</td>
         <td>Petroleum products</td>
         <td>Prohibited</td>
      </tr>
      <tr>
         <td height="20">Currency</td>
         <td>Cash (coins, currency, bank notes) and cash-like negotiable instruments such as endorsed stocks, bonds, postage stamp and cash letters.</td>
         <td>Prohibited</td>
      </tr>
      <tr>
         <td height="20">Dangerous Goods</td>
         <td>All Classes of Dangerous Goods (DG) including Battery e.g. Explosives, Gases, Flammable liquids/solids, Oxidizing agents and organic peroxides, Toxic and infectious substances, Radioactive substances, Corrosive substances</td>
         <td>Prohibited</td>
      </tr>
      <tr>
         <td height="20">Drug &amp; Medicine</td>
         <td>Drug - non-prescription, Drug - Prescription, Drug- samples</td>
         <td>Prohibited</td>
      </tr>
      <tr>
         <td height="20">Drug &amp; Medicine</td>
         <td>Hazardous waste, e.g. used syringes, hypodermic needles, and other medical waste</td>
         <td>Prohibited</td>
      </tr>
      <tr>
         <td height="20">Drug &amp; Medicine</td>
         <td>Medical equipments</td>
         <td>Prohibited</td>
      </tr>
      <tr>
         <td height="20">Electronic Products</td>
         <td>Hazardous wastes</td>
         <td>Prohibited</td>
      </tr>
      <tr>
         <td height="20">Food</td>
         <td>Perishable food (decays quickly, needs refrigeration) e.g. fruits, vegetables</td>
         <td>Prohibited</td>
      </tr>
      <tr>
         <td height="20">Leather</td>
         <td>Animal skins, Fur skin</td>
         <td>Prohibited</td>
      </tr>
      <tr>
         <td height="20">Liquor &amp; Alcoholic beverages</td>
         <td>All liquor &amp; alcoholic beverages</td>
         <td>Prohibited</td>
      </tr>
      <tr>
         <td height="20">Machinery</td>
         <td>Radar equipment</td>
         <td>Prohibited</td>
      </tr>
      <tr>
         <td height="20">Others</td>
         <td>All products in powder or liquid form</td>
         <td>Prohibited</td>
      </tr>
      <tr>
         <td height="20">Others</td>
         <td>ATA CARNET shipment</td>
         <td>Prohibited</td>
      </tr>
      <tr>
         <td height="20">Others</td>
         <td>Counterfeit products</td>
         <td>Prohibited</td>
      </tr>
      <tr>
         <td height="20">Others</td>
         <td>Gambling devices, including lottery tickets</td>
         <td>Prohibited</td>
      </tr>
      <tr>
         <td height="20">Others</td>
         <td>Perishable products and other goods that required refrigeration or other environmental control</td>
         <td>Prohibited</td>
      </tr>
      <tr>
         <td height="20">Others</td>
         <td>Pornographic and/or obscene materials</td>
         <td>Prohibited</td>
      </tr>
      <tr>
         <td height="20">Others</td>
         <td>Precious metal - Bullion, Precious stones</td>
         <td>Prohibited</td>
      </tr>
      <tr>
         <td height="20">Others</td>
         <td>Product made from endangered species including Ivory, Product made from wildlife</td>
         <td>Prohibited</td>
      </tr>
      <tr>
         <td height="20">Others</td>
         <td>Shipments to PO box (Post Office box) / APO (Army Post Office) / FPO (Fleet Post Office) / DPO (Diplomatic Post Office) addresses</td>
         <td>Prohibited</td>
      </tr>
      <tr>
         <td height="20">Tobacco</td>
         <td>Tobacco (including chewing tobacco, imitation tobacco, smokeless tobacco, electronic cigarettes)</td>
         <td>Prohibited</td>
      </tr>
      <tr>
         <td height="20">Woods &amp; Plants</td>
         <td>Coal and firewood, raw material of woods, unprocessed woods</td>
         <td>Prohibited</td>
      </tr>
      <tr>
         <td height="20">Artworks</td>
         <td>Artworks - fine, for commercial, for personal</td>
         <td>Restricted</td>
      </tr>
      <tr>
         <td height="20">Cosmetics</td>
         <td>General cosmetics - for commercial &amp; for personal</td>
         <td>Restricted</td>
      </tr>
      <tr>
         <td height="20">Currency</td>
         <td>Cheque - for business, for personal, for travellers</td>
         <td>Restricted</td>
      </tr>
      <tr>
         <td height="20">Currency</td>
         <td>Credit card</td>
         <td>Restricted</td>
      </tr>
      <tr>
         <td height="20">Electronic Products</td>
         <td>Cell phones / Mobile phones</td>
         <td>Restricted</td>
      </tr>
      <tr>
         <td height="20">Electronic Products</td>
         <td>Computer, desktop computer, notebook computer, laptop computer</td>
         <td>Restricted</td>
      </tr>
      <tr>
         <td height="20">Films</td>
         <td>Film: copies, for commercial, for entertainment, publicity and training</td>
         <td>Restricted</td>
      </tr>
      <tr>
         <td height="20">Films</td>
         <td>Microfilm, Negative, Slides</td>
         <td>Restricted</td>
      </tr>
      <tr>
         <td height="20">Others</td>
         <td>Jewellery including imitation ewellery</td>
         <td>Restricted</td>
      </tr>
      <tr>
         <td height="20">Others</td>
         <td>Watch</td>
         <td>Restricted<br /><br /></td>
      </tr>
   </tbody>
</table>
<p>The detailed information of restricted and prohibited items is subject to the local customs regulations and laws. Please contact our local customer service at <a href="mailto:SFEUCS@SF-EXPRESS.COM">SFEUCS@SF-EXPRESS.COM</a> for more information.</p>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('user_layout.create_order.close')}}</button>
      </div>
    </div>
  </div>
</div>
@endsection