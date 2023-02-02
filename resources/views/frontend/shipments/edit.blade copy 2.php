@extends('layouts.user')
@section('content')

<div class="container-fluid">

	<!-- Page header -->
	<div class="page-header" style="margin-top:150px">
		<div class="page-header-content header-elements-lg-inline">
			<div class="page-title d-flex">
				<h3><i class="icon-radio-checked mr-2"></i> <span class="font-weight-semibold">Edit Order</h3>
				<a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
			</div>
		</div>
	</div>
	<!-- /page header -->

</div>



	<!-- Page content -->
	<div class="page-content pt-0">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class=" container-fluid">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.shipment.title_singular') }}
                </div>

                <div class="card-body">
                    Edit function inactivated, please try again later.
                </div>
            </div>

        </div>
    </div>
</div>
<div class="m-4">
  <h1 class="display-4">Select2 examples</h1>
  <hr>
  <label for="countries" class="lead">Countries</label>
  <select class="form-control" id="countries">    
    <option value="AF" data-capital="Kabul">Afghanistan</option>
    <option value="AX" data-capital="Mariehamn">Aland Islands</option>
    <option value="AL" data-capital="Tirana">Albania</option>
    <option value="DZ" data-capital="Algiers">Algeria</option>
    <option value="AS" data-capital="Pago Pago">American Samoa</option>
    <option value="AD" data-capital="Andorra la Vella">Andorra</option>
    <option value="AO" data-capital="Luanda">Angola</option>
    <option value="AI" data-capital="The Valley">Anguilla</option>
    <option value="AG" data-capital="St. John's">Antigua and Barbuda</option>
    <option value="AR" data-capital="Buenos Aires">Argentina</option>
    <option value="AM" data-capital="Yerevan">Armenia</option>
    <option value="AW" data-capital="Oranjestad">Aruba</option>
    <option value="AU" data-capital="Canberra">Australia</option>
    <option value="AT" data-capital="Vienna">Austria</option>
    <option value="AZ" data-capital="Baku">Azerbaijan</option>
    <option value="BS" data-capital="Nassau">Bahamas</option>
    <option value="BH" data-capital="Manama">Bahrain</option>
    <option value="BD" data-capital="Dhaka">Bangladesh</option>
    <option value="BB" data-capital="Bridgetown">Barbados</option>
    <option value="BY" data-capital="Minsk">Belarus</option>
    <option value="BE" data-capital="Brussels">Belgium</option>
    <option value="BZ" data-capital="Belmopan">Belize</option>
    <option value="BJ" data-capital="Porto-Novo">Benin</option>
    <option value="BM" data-capital="Hamilton">Bermuda</option>
    <option value="BT" data-capital="Thimphu">Bhutan</option>
    <option value="BO" data-capital="Sucre">Bolivia</option>
    <option value="BA" data-capital="Sarajevo">Bosnia and Herzegovina</option>
    <option value="BW" data-capital="Gaborone">Botswana</option>
    <option value="BR" data-capital="Brasília">Brazil</option>
    <option value="IO" data-capital="Diego Garcia">British Indian Ocean Territory</option>
    <option value="BN" data-capital="Bandar Seri Begawan">Brunei Darussalam</option>
    <option value="BG" data-capital="Sofia">Bulgaria</option>
    <option value="BF" data-capital="Ouagadougou">Burkina Faso</option>
    <option value="BI" data-capital="Bujumbura">Burundi</option>
    <option value="CV" data-capital="Praia">Cabo Verde</option>
    <option value="KH" data-capital="Phnom Penh">Cambodia</option>
    <option value="CM" data-capital="Yaoundé">Cameroon</option>
    <option value="CA" data-capital="Ottawa">Canada</option>
    <option value="KY" data-capital="George Town">Cayman Islands</option>
    <option value="CF" data-capital="Bangui">Central African Republic</option>
    <option value="TD" data-capital="N'Djamena">Chad</option>
    <option value="CL" data-capital="Santiago">Chile</option>
    <option value="CN" data-capital="Beijing">China</option>
    <option value="CX" data-capital="Flying Fish Cove">Christmas Island</option>
    <option value="CC" data-capital="West Island">Cocos (Keeling) Islands</option>
    <option value="CO" data-capital="Bogotá">Colombia</option>
    <option value="KM" data-capital="Moroni">Comoros</option>
    <option value="CK" data-capital="Avarua">Cook Islands</option>
    <option value="CR" data-capital="San José">Costa Rica</option>
    <option value="HR" data-capital="Zagreb">Croatia</option>
    <option value="CU" data-capital="Havana">Cuba</option>
    <option value="CW" data-capital="Willemstad">Curaçao</option>
    <option value="CY" data-capital="Nicosia">Cyprus</option>
    <option value="CZ" data-capital="Prague">Czech Republic</option>
    <option value="CI" data-capital="Yamoussoukro">Côte d'Ivoire</option>
    <option value="CD" data-capital="Kinshasa">Democratic Republic of the Congo</option>
    <option value="DK" data-capital="Copenhagen">Denmark</option>
    <option value="DJ" data-capital="Djibouti">Djibouti</option>
    <option value="DM" data-capital="Roseau">Dominica</option>
    <option value="DO" data-capital="Santo Domingo">Dominican Republic</option>
    <option value="EC" data-capital="Quito">Ecuador</option>
    <option value="EG" data-capital="Cairo">Egypt</option>
    <option value="SV" data-capital="San Salvador">El Salvador</option>
    <option value="GQ" data-capital="Malabo">Equatorial Guinea</option>
    <option value="ER" data-capital="Asmara">Eritrea</option>
    <option value="EE" data-capital="Tallinn">Estonia</option>
    <option value="ET" data-capital="Addis Ababa">Ethiopia</option>
    <option value="FK" data-capital="Stanley">Falkland Islands</option>
    <option value="FO" data-capital="Tórshavn">Faroe Islands</option>
    <option value="FM" data-capital="Palikir">Federated States of Micronesia</option>
    <option value="FJ" data-capital="Suva">Fiji</option>
    <option value="FI" data-capital="Helsinki">Finland</option>
    <option value="MK" data-capital="Skopje">Former Yugoslav Republic of Macedonia</option>
    <option value="FR" data-capital="Paris">France</option>
    <option value="PF" data-capital="Papeete">French Polynesia</option>
    <option value="GA" data-capital="Libreville">Gabon</option>
    <option value="GM" data-capital="Banjul">Gambia</option>
    <option value="GE" data-capital="Tbilisi">Georgia</option>
    <option value="DE" data-capital="Berlin">Germany</option>
    <option value="GH" data-capital="Accra">Ghana</option>
    <option value="GI" data-capital="Gibraltar">Gibraltar</option>
    <option value="GR" data-capital="Athens">Greece</option>
    <option value="GL" data-capital="Nuuk">Greenland</option>
    <option value="GD" data-capital="St. George's">Grenada</option>
    <option value="GU" data-capital="Hagåtña">Guam</option>
    <option value="GT" data-capital="Guatemala City">Guatemala</option>
    <option value="GG" data-capital="Saint Peter Port">Guernsey</option>
    <option value="GN" data-capital="Conakry">Guinea</option>
    <option value="GW" data-capital="Bissau">Guinea-Bissau</option>
    <option value="GY" data-capital="Georgetown">Guyana</option>
    <option value="HT" data-capital="Port-au-Prince">Haiti</option>
    <option value="VA" data-capital="Vatican City">Holy See</option>
    <option value="HN" data-capital="Tegucigalpa">Honduras</option>
    <option value="HK" data-capital="Hong Kong">Hong Kong</option>
    <option value="HU" data-capital="Budapest">Hungary</option>
    <option value="IS" data-capital="Reykjavik">Iceland</option>
    <option value="IN" data-capital="New Delhi">India</option>
    <option value="ID" data-capital="Jakarta">Indonesia</option>
    <option value="IR" data-capital="Tehran">Iran</option>
    <option value="IQ" data-capital="Baghdad">Iraq</option>
    <option value="IE" data-capital="Dublin">Ireland</option>
    <option value="IM" data-capital="Douglas">Isle of Man</option>
    <option value="IL" data-capital="Jerusalem">Israel</option>
    <option value="IT" data-capital="Rome">Italy</option>
    <option value="JM" data-capital="Kingston">Jamaica</option>
    <option value="JP" data-capital="Tokyo">Japan</option>
    <option value="JE" data-capital="Saint Helier">Jersey</option>
    <option value="JO" data-capital="Amman">Jordan</option>
    <option value="KZ" data-capital="Astana">Kazakhstan</option>
    <option value="KE" data-capital="Nairobi">Kenya</option>
    <option value="KI" data-capital="South Tarawa">Kiribati</option>
    <option value="KW" data-capital="Kuwait City">Kuwait</option>
    <option value="KG" data-capital="Bishkek">Kyrgyzstan</option>
    <option value="LA" data-capital="Vientiane">Laos</option>
    <option value="LV" data-capital="Riga">Latvia</option>
    <option value="LB" data-capital="Beirut">Lebanon</option>
    <option value="LS" data-capital="Maseru">Lesotho</option>
    <option value="LR" data-capital="Monrovia">Liberia</option>
    <option value="LY" data-capital="Tripoli">Libya</option>
    <option value="LI" data-capital="Vaduz">Liechtenstein</option>
    <option value="LT" data-capital="Vilnius">Lithuania</option>
    <option value="LU" data-capital="Luxembourg City">Luxembourg</option>
    <option value="MO" data-capital="Macau">Macau</option>
    <option value="MG" data-capital="Antananarivo">Madagascar</option>
    <option value="MW" data-capital="Lilongwe">Malawi</option>
    <option value="MY" data-capital="Kuala Lumpur">Malaysia</option>
    <option value="MV" data-capital="Malé">Maldives</option>
    <option value="ML" data-capital="Bamako">Mali</option>
    <option value="MT" data-capital="Valletta">Malta</option>
    <option value="MH" data-capital="Majuro">Marshall Islands</option>
    <option value="MQ" data-capital="Fort-de-France">Martinique</option>
    <option value="MR" data-capital="Nouakchott">Mauritania</option>
    <option value="MU" data-capital="Port Louis">Mauritius</option>
    <option value="MX" data-capital="Mexico City">Mexico</option>
    <option value="MD" data-capital="Chișinău">Moldova</option>
    <option value="MC" data-capital="Monaco">Monaco</option>
    <option value="MN" data-capital="Ulaanbaatar">Mongolia</option>
    <option value="ME" data-capital="Podgorica">Montenegro</option>
    <option value="MS" data-capital="Little Bay, Brades, Plymouth">Montserrat</option>
    <option value="MA" data-capital="Rabat">Morocco</option>
    <option value="MZ" data-capital="Maputo">Mozambique</option>
    <option value="MM" data-capital="Naypyidaw">Myanmar</option>
    <option value="NA" data-capital="Windhoek">Namibia</option>
    <option value="NR" data-capital="Yaren District">Nauru</option>
    <option value="NP" data-capital="Kathmandu">Nepal</option>
    <option value="NL" data-capital="Amsterdam">Netherlands</option>
    <option value="NZ" data-capital="Wellington">New Zealand</option>
    <option value="NI" data-capital="Managua">Nicaragua</option>
    <option value="NE" data-capital="Niamey">Niger</option>
    <option value="NG" data-capital="Abuja">Nigeria</option>
    <option value="NU" data-capital="Alofi">Niue</option>
    <option value="NF" data-capital="Kingston">Norfolk Island</option>
    <option value="KP" data-capital="Pyongyang">North Korea</option>
    <option value="MP" data-capital="Capitol Hill">Northern Mariana Islands</option>
    <option value="NO" data-capital="Oslo">Norway</option>
    <option value="OM" data-capital="Muscat">Oman</option>
    <option value="PK" data-capital="Islamabad">Pakistan</option>
    <option value="PW" data-capital="Ngerulmud">Palau</option>
    <option value="PA" data-capital="Panama City">Panama</option>
    <option value="PG" data-capital="Port Moresby">Papua New Guinea</option>
    <option value="PY" data-capital="Asunción">Paraguay</option>
    <option value="PE" data-capital="Lima">Peru</option>
    <option value="PH" data-capital="Manila">Philippines</option>
    <option value="PN" data-capital="Adamstown">Pitcairn</option>
    <option value="PL" data-capital="Warsaw">Poland</option>
    <option value="PT" data-capital="Lisbon">Portugal</option>
    <option value="PR" data-capital="San Juan">Puerto Rico</option>
    <option value="QA" data-capital="Doha">Qatar</option>
    <option value="CG" data-capital="Brazzaville">Republic of the Congo</option>
    <option value="RO" data-capital="Bucharest">Romania</option>
    <option value="RU" data-capital="Moscow">Russia</option>
    <option value="RW" data-capital="Kigali">Rwanda</option>
    <option value="BL" data-capital="Gustavia">Saint Barthélemy</option>
    <option value="KN" data-capital="Basseterre">Saint Kitts and Nevis</option>
    <option value="LC" data-capital="Castries">Saint Lucia</option>
    <option value="VC" data-capital="Kingstown">Saint Vincent and the Grenadines</option>
    <option value="WS" data-capital="Apia">Samoa</option>
    <option value="SM" data-capital="San Marino">San Marino</option>
    <option value="ST" data-capital="São Tomé">Sao Tome and Principe</option>
    <option value="SA" data-capital="Riyadh">Saudi Arabia</option>
    <option value="SN" data-capital="Dakar">Senegal</option>
    <option value="RS" data-capital="Belgrade">Serbia</option>
    <option value="SC" data-capital="Victoria">Seychelles</option>
    <option value="SL" data-capital="Freetown">Sierra Leone</option>
    <option value="SG" data-capital="Singapore">Singapore</option>
    <option value="SX" data-capital="Philipsburg">Sint Maarten</option>
    <option value="SK" data-capital="Bratislava">Slovakia</option>
    <option value="SI" data-capital="Ljubljana">Slovenia</option>
    <option value="SB" data-capital="Honiara">Solomon Islands</option>
    <option value="SO" data-capital="Mogadishu">Somalia</option>
    <option value="ZA" data-capital="Pretoria">South Africa</option>
    <option value="KR" data-capital="Seoul">South Korea</option>
    <option value="SS" data-capital="Juba">South Sudan</option>
    <option value="ES" data-capital="Madrid">Spain</option>
    <option value="LK" data-capital="Sri Jayawardenepura Kotte, Colombo">Sri Lanka</option>
    <option value="PS" data-capital="Ramallah">State of Palestine</option>
    <option value="SD" data-capital="Khartoum">Sudan</option>
    <option value="SR" data-capital="Paramaribo">Suriname</option>
    <option value="SZ" data-capital="Lobamba, Mbabane">Swaziland</option>
    <option value="SE" data-capital="Stockholm">Sweden</option>
    <option value="CH" data-capital="Bern">Switzerland</option>
    <option value="SY" data-capital="Damascus">Syrian Arab Republic</option>
    <option value="TW" data-capital="Taipei">Taiwan</option>
    <option value="TJ" data-capital="Dushanbe">Tajikistan</option>
    <option value="TZ" data-capital="Dodoma">Tanzania</option>
    <option value="TH" data-capital="Bangkok">Thailand</option>
    <option value="TL" data-capital="Dili">Timor-Leste</option>
    <option value="TG" data-capital="Lomé">Togo</option>
    <option value="TK" data-capital="Nukunonu, Atafu,Tokelau">Tokelau</option>
    <option value="TO" data-capital="Nukuʻalofa">Tonga</option>
    <option value="TT" data-capital="Port of Spain">Trinidad and Tobago</option>
    <option value="TN" data-capital="Tunis">Tunisia</option>
    <option value="TR" data-capital="Ankara">Turkey</option>
    <option value="TM" data-capital="Ashgabat">Turkmenistan</option>
    <option value="TC" data-capital="Cockburn Town">Turks and Caicos Islands</option>
    <option value="TV" data-capital="Funafuti">Tuvalu</option>
    <option value="UG" data-capital="Kampala">Uganda</option>
    <option value="UA" data-capital="Kiev">Ukraine</option>
    <option value="AE" data-capital="Abu Dhabi">United Arab Emirates</option>
    <option value="GB" data-capital="London">United Kingdom</option>
    <option value="US" data-capital="Washington, D.C.">United States of America</option>
    <option value="UY" data-capital="Montevideo">Uruguay</option>
    <option value="UZ" data-capital="Tashkent">Uzbekistan</option>
    <option value="VU" data-capital="Port Vila">Vanuatu</option>
    <option value="VE" data-capital="Caracas">Venezuela</option>
    <option value="VN" data-capital="Hanoi">Vietnam</option>
    <option value="VG" data-capital="Road Town">Virgin Islands (British)</option>
    <option value="VI" data-capital="Charlotte Amalie">Virgin Islands (U.S.)</option>
    <option value="EH" data-capital="Laayoune">Western Sahara</option>
    <option value="YE" data-capital="Sana'a">Yemen</option>
    <option value="ZM" data-capital="Lusaka">Zambia</option>
    <option value="ZW" data-capital="Harare">Zimbabwe</option>
  </select>
  <hr class="mt-4">
  <label for="us-states" class="lead">US states</label>
  <select class="form-control" id="us-states">
    <option value="AL" data-capital="Montgomery">Alabama</option>
    <option value="AK" data-capital="Juneau">Alaska</option>
    <option value="AZ" data-capital="Phoenix">Arizona</option>
    <option value="AR" data-capital="Little Rock">Arkansas</option>
    <option value="CA" data-capital="Sacramento">California</option>
    <option value="CO" data-capital="Denver">Colorado</option>
    <option value="CT" data-capital="Hartford">Connecticut</option>
    <option value="DE" data-capital="Dover">Delaware</option>
    <option value="FL" data-capital="Tallahassee">Florida</option>
    <option value="GA" data-capital="Atlanta">Georgia</option>
    <option value="HI" data-capital="Honolulu">Hawaii</option>
    <option value="ID" data-capital="Boise">Idaho</option>
    <option value="IL" data-capital="Springfield">Illinois</option>
    <option value="IN" data-capital="Indianapolis">Indiana</option>
    <option value="IA" data-capital="Des Moines">Iowa</option>
    <option value="KS" data-capital="Topeka">Kansas</option>
    <option value="KY" data-capital="Frankfort">Kentucky</option>
    <option value="LA" data-capital="Baton Rouge">Louisiana</option>
    <option value="ME" data-capital="Augusta">Maine</option>
    <option value="MD" data-capital="Annapolis">Maryland</option>
    <option value="MA" data-capital="Boston">Massachusetts</option>
    <option value="MI" data-capital="Lansing">Michigan</option>
    <option value="MN" data-capital="St. Paul">Minnesota</option>
    <option value="MS" data-capital="Jackson">Mississippi</option>
    <option value="MO" data-capital="Jefferson City">Missouri</option>
    <option value="MT" data-capital="Helena">Montana</option>
    <option value="NE" data-capital="Lincoln">Nebraska</option>
    <option value="NV" data-capital="Carson City">Nevada</option>
    <option value="NH" data-capital="Concord">New Hampshire</option>
    <option value="NJ" data-capital="Trenton">New Jersey</option>
    <option value="NM" data-capital="Santa Fe">New Mexico</option>
    <option value="NY" data-capital="Albany">New York</option>
    <option value="NC" data-capital="Raleigh">North Carolina</option>
    <option value="ND" data-capital="Bismarck">North Dakota</option>
    <option value="OH" data-capital="Columbus">Ohio</option>
    <option value="OK" data-capital="Oklahoma City">Oklahoma</option>
    <option value="OR" data-capital="Salem">Oregon</option>
    <option value="PA" data-capital="Harrisburg">Pennsylvania</option>
    <option value="RI" data-capital="Providence">Rhode Island</option>
    <option value="SC" data-capital="Columbia">South Carolina</option>
    <option value="SD" data-capital="Pierre">South Dakota</option>
    <option value="TN" data-capital="Nashville">Tennessee</option>
    <option value="TX" data-capital="Austin">Texas</option>
    <option value="UT" data-capital="Salt Lake City">Utah</option>
    <option value="VT" data-capital="Montpelier">Vermont</option>
    <option value="VA" data-capital="Richmond">Virginia</option>
    <option value="WA" data-capital="Olympia">Washington</option>
    <option value="WV" data-capital="Charleston">West Virginia</option>
    <option value="WI" data-capital="Madison">Wisconsin</option>
    <option value="WY" data-capital="Cheyenne">Wyoming</option>
  </select>
  <hr>
  <p class="lead">
    <a href="https://select2.org">Select2</a> |
    <a href="https://github.com/HatScripts/circle-flags">Country flags</a> |
    <a href="https://github.com/oxguy3/flags">State flags</a>
  </p>
</div>

</div>
			<!-- /content area -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->
@endsection