@extends('layouts.user')

@section('css')

@endsection


@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script>
 

// --- order form ---
$('#origin').on('change', function(e){
  console.log(this.value,
              this.options[this.selectedIndex].value,
              $(this).find("option:selected").val(),);
              $('#j_country').val(this.value);
              $('#j_country').change();
});
$('#destination').on('change', function(e){
  console.log(this.value,
              this.options[this.selectedIndex].value,
              $(this).find("option:selected").val(),);
              $('#d_country').val(this.value);
              //$('#j_country').change();
});

function getQuote(parcelWeight){
      
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $("#result").html('Please wait......');
      event.preventDefault();
      //alert( $(this).val());
      var values = {};
      values.parcelWeight = parcelWeight;
      values.volWeight = 2;
      values.shipFrom = 2;
      values.shipTo = 2;
      values.parcelLenght = 2;
      values.parcelHeight = 2;
      $.ajax({
          url: "../../freightcost.php",
          type: "post",
          data: values,
          success: function(res) {
              $("#result").html('&pound ' + res);
              $("#estimated_freight").val(res);
              //alert('Form submitted successfully...')
              //console.log(res)
          },
          error: function(xhr, status, error) {
              console.log(xhr.responseText);
          }
      });
  }

  $('#cargo_total_weight').on('input', function() {
   // if (this.value =0){
    //  $("#result").html('');
    //  return;
   // }
    if (this.value <0){
      this.value= 0;
      return;
    }
    
    if (this.value<=20){
      if(parseFloat(this.value) >= $('#vol_weight').val()){
        getQuote(parseFloat(this.value));
      } 
          
    }else{
      alert("Weight cannot be greater than 20kg");
      this.value="";
      $("#result").html('');
    }
   
  });

  $('.cargo-dim').on('input', function() {
    //var volWeight=$('#vol_weight').val();
    //alert(chargableWeight);
    var dimWeight=1;
    $('.cargo-dim').each(function()
    {
      dimWeight *= parseInt(this.value);
    });
      volWeight=(dimWeight/5000).toFixed(2);;
      if (volWeight>20){
        volWeight=20;
      }
      $('#vol_weight').val(volWeight);
      if (volWeight >  $('#cargo_total_weight').val()){
        getQuote(volWeight);
      }else{
        getQuote($('#cargo_total_weight').val());
      }
      
  });
// --- Address List  ---
$('#addressSelector').on('hidden.bs.modal', function (e) {
  $("#addressList").html('');
})
$(document).on('click', '.clickable-row', function() {
       //alert($(this).data('addr'));
       var addr=$(this).data('addr');
       $("#j_province").val(addr.county);
       $("#j_city").val(addr.town_or_city);
       $("#j_address").val(addr.line_1 + (addr.line_2 ? ', '+addr.line_2  : '')+ (addr.line_3 ? ', '+addr.line_3  : '')+
       (addr.line_4 ? ', '+addr.line_4  : ''));
       $('#addressSelector').modal('hide'); 
});

  $('#save_shipper').on('click', function() {
    if ($('#shipper_address :input, #j_country').valid()) {
            $.ajax({
                url: '{{url("/address-book/add_shipper")}}',
                type: 'POST',
                //dataType: 'json',
                data: $('#shipper_address :input').serialize()+ "&j_country=" + $('#j_country').val(),
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
                },
                success: function () {
                    alert('Shipper address save successfully');
                },
                error: function (xhr, textStatus, errorThrown) {
                    alert('Error occured');
                }
            });
        }
  });
  $('#save_receiver').on('click', function() {
    if ($('#receiver_address :input, #d_country').valid()) {
            $.ajax({
                url: '{{url("/address-book/add_receiver")}}',
                type: 'POST',
                //dataType: 'json',
                data: $('#receiver_address :input').serialize()+ "&d_country=" + $('#d_country').val(),
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
                },
                success: function () {
                    alert('Receiver address save successfully');
                },
                error: function (xhr, textStatus, errorThrown) {
                    alert('Error occured');
                }
            });
        }
  });
  $('#find_address').on('click', function() {
    if ($('#j_post_code').valid()) {
      var postcode=$('#j_post_code').val();
            $.ajax({
                url: '{{url("/find-address")}}',
                type: 'POST',
                //dataType: 'json',
                data: {postcode : postcode},
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
                },
                success: function (response) {
              console.log(response);
              $("#addressList").html(response.data);
              $("#modalTitle").html("Found " + response.addr_count + " addresses for postcode: " + response.formatedPostcode);
              $('#addressSelector').modal('show'); 
              $('#j_post_code').val(response.formatedPostcode);
                },
                error: function (xhr, textStatus, errorThrown) {
                  $("#modalTitle").html("Error!");
                  $("#addressList").html("Invalide postcode, please check or you can enter address manually.");
                  $('#addressSelector').modal('show'); 
                }
            });
        }
    //
  });


  $('#load_shipper').on('click', function() {
    event.preventDefault();
      $.ajax({
          url: '{{url("/address-book/get_shipper")}}',
          type: "get",
          headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
                },
          success: function(response) {
              var resultTable
              $.each(response.data, function(index, item) {
                console.log(item['email']);
                resultTable += '<tr>' + 
                '<td>'+item['contact']+'</td>'+
                '<td>'+item['address']+'</td>' +
                '<td>'+item['city']+' / '+item['country']+'</td>' +
                '<td>'+'<button type="button" class="btn btn-danger btn-sm addr-select" data-addr='+"'"+JSON.stringify(item)+"'"+'>Select</button>'+'</td>' +
                '</tr>';
              });
              $("#modalTitle").html("Saved Origin Addresses");
              $('#addressSelector').modal('show'); 
              
              $("#addressList").html(resultTable);
          },
          error: function(xhr, status, error) {
              console.log(xhr.responseText);
          }
      });
      
  });
  $('#load_receiver').on('click', function() {
    event.preventDefault();
      $.ajax({
          url: '{{url("/address-book/get_receiver")}}',
          type: "get",
          headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
                },
          success: function(response) {
              var resultTable
              $.each(response.data, function(index, item) {
                console.log(item['email']);
                resultTable += '<tr>' + 
                '<td>'+item['contact']+'</td>'+
                '<td>'+item['address']+'</td>' +
                '<td>'+item['city']+' / '+item['country']+'</td>' +
                '<td>'+'<button type="button" class="btn btn-danger btn-sm addr-receiver" data-addr='+"'"+JSON.stringify(item)+"'"+'>Select</button>'+'</td>' +
                '</tr>';
              });
              $("#modalTitle").html("Saved Destination Addresses");
              $('#addressSelector').modal('show'); 
              
              $("#addressList").html(resultTable);
          },
          error: function(xhr, status, error) {
              console.log(xhr.responseText);
          }
      });
      
  });
  $('#agreeToTerms').on('change', function() {
    //alert ($('#agreeToTerms').is(":checked"));
    $('.agreeToTerms').prop( 'disabled', !$(this).is(":checked"));
  });
  $('#freighTerms').on('click', function() {
    event.preventDefault();
      $.ajax({
          url: '{{url("/terms/freightTerms")}}',
          type: "get",
          headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
                },
          success: function(response) {
            $("#termsContents").html(response);
            $('#terms').modal('show'); 
          },
          error: function(xhr, status, error) {
              console.log(xhr.responseText);
          }
      });
      
  });
  $('#itemTerms').on('click', function() {
    event.preventDefault();
      $.ajax({
          url: '{{url("/terms/itemTerms")}}',
          type: "get",
          headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
                },
          success: function(response) {
            $("#termsContents").html(response);
            $('#terms').modal('show'); 
          },
          error: function(xhr, status, error) {
              console.log(xhr.responseText);
          }
      });
      
  });
  $(document).on('click', '.addr-select', function() {
    //alert($(this).data('addr').contact);
    $("#j_company").val($(this).data('addr').company);
    $("#j_contact").val($(this).data('addr').contact);
    $("#j_post_code").val($(this).data('addr').post_code);
    $("#j_province").val($(this).data('addr').province);
    $("#j_city").val($(this).data('addr').city);
    $("#j_tel").val($(this).data('addr').mobile);
    $("#j_address").val($(this).data('addr').address);
    $("#j_email").val($(this).data('addr').email);
    $('#addressSelector').modal('hide'); 
    $('#j_country').val($(this).data('addr').country);
    $('#shipper_address :input , #j_country').valid()
  });
  $(document).on('click', '.addr-receiver', function() {
    //alert($(this).data('addr').contact);
    $("#d_company").val($(this).data('addr').company);
    $("#d_contact").val($(this).data('addr').contact);
    $("#d_post_code").val($(this).data('addr').post_code);
    $("#d_province").val($(this).data('addr').province);
    $("#d_city").val($(this).data('addr').city);
    $("#d_tel").val($(this).data('addr').mobile);
    $("#d_address").val($(this).data('addr').address);
    $("#d_email").val($(this).data('addr').email);
    $('#d_country').val($(this).data('addr').country);
    $('#addressSelector').modal('hide'); 
    $('#receiver_address :input , #d_country').valid()
  });
// --- Address List End ---
$(document).on('input', '.item_qty, .item_price', function() {
    //alert($(this).val());
var subtotal = $(this).closest('tr').find('.item_qty').val() * $(this).closest('tr').find('.item_price').val();
$(this).closest('tr').find('.subtotal').val(subtotal);
calculateSum();
  });
  function calculateSum() {
      var sum = 0;
      //iterate through each textboxes and add the values
      $(".subtotal").each(function() {
        //add only if the value is number
        if(!isNaN(this.value) && this.value.length!=0) {
          sum += parseFloat(this.value);
        }
      });
      //.toFixed() method will roundoff the final sum to 2 decimal places
      $("#subtotal").val(sum.toFixed(2));
      
    } 
    $('#currency').on('change', function() {
    event.preventDefault();
    $('#unit_price').html('Unit price ('+$(this).val()+')');
    $('#item_total').html('Total ('+$(this).val()+')');
    });
  var wto;
  $('#j_post_code1').on('input', function() {
      event.preventDefault();
      // do stuff when user has been idle for 1 second
      var postCode = ($('#j_post_code').val());
      $.ajax({
            url: 'https://api.getAddress.io/find/'+postCode+'?api-key=js9Gy7DdEEqasBD8wImPfw33224',
            type: "get",
            success: function(response) {
              console.log(response);
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
      });
  });
  function format(item, state) {
  if (!item.id) {
    return item.text;
  }
  var countryUrl = "https://hatscripts.github.io/circle-flags/flags/";
  var stateUrl = "https://oxguy3.github.io/flags/svg/us/";
  var url = state ? stateUrl : countryUrl;
  var img = $("<img>", {
    class: "img-flag",
    width: 26,
    src: url + item.element.value.toLowerCase() + ".svg"
  });
  var span = $("<span>", {
    text: " " + item.text
  });
  span.prepend(img);
  return span;
}
$(document).ready(function() {
  $("#countries").select2({
    templateResult: function(item) {
      return format(item, false);
    }
  });
  $("#us-states").select2({
    templateResult: function(item) {
      return format(item, true);
    }
  });
});


        $(function() {
            var isoCountries = [
                { id: 'AF', text: 'Afghanistan'},
                { id: 'AX', text: 'Aland Islands'},
                { id: 'AL', text: 'Albania'},
                { id: 'DZ', text: 'Algeria'},
                { id: 'AS', text: 'American Samoa'},
                { id: 'AD', text: 'Andorra'},
                { id: 'AO', text: 'Angola'},
                { id: 'AI', text: 'Anguilla'},
                { id: 'AQ', text: 'Antarctica'},
                { id: 'AG', text: 'Antigua And Barbuda'},
                { id: 'AR', text: 'Argentina'},
                { id: 'AM', text: 'Armenia'},
                { id: 'AW', text: 'Aruba'},
                { id: 'AU', text: 'Australia'},
                { id: 'AT', text: 'Austria'},
                { id: 'AZ', text: 'Azerbaijan'},
                { id: 'BS', text: 'Bahamas'},
                { id: 'BH', text: 'Bahrain'},
                { id: 'BD', text: 'Bangladesh'},
                { id: 'BB', text: 'Barbados'},
                { id: 'BY', text: 'Belarus'},
                { id: 'BE', text: 'Belgium'},
                { id: 'BZ', text: 'Belize'},
                { id: 'BJ', text: 'Benin'},
                { id: 'BM', text: 'Bermuda'},
                { id: 'BT', text: 'Bhutan'},
                { id: 'BO', text: 'Bolivia'},
                { id: 'BA', text: 'Bosnia And Herzegovina'},
                { id: 'BW', text: 'Botswana'},
                { id: 'BV', text: 'Bouvet Island'},
                { id: 'BR', text: 'Brazil'},
                { id: 'IO', text: 'British Indian Ocean Territory'},
                { id: 'BN', text: 'Brunei Darussalam'},
                { id: 'BG', text: 'Bulgaria'},
                { id: 'BF', text: 'Burkina Faso'},
                { id: 'BI', text: 'Burundi'},
                { id: 'KH', text: 'Cambodia'},
                { id: 'CM', text: 'Cameroon'},
                { id: 'CA', text: 'Canada'},
                { id: 'CV', text: 'Cape Verde'},
                { id: 'KY', text: 'Cayman Islands'},
                { id: 'CF', text: 'Central African Republic'},
                { id: 'TD', text: 'Chad'},
                { id: 'CL', text: 'Chile'},
                { id: 'CN', text: 'China'},
                { id: 'CX', text: 'Christmas Island'},
                { id: 'CC', text: 'Cocos (Keeling) Islands'},
                { id: 'CO', text: 'Colombia'},
                { id: 'KM', text: 'Comoros'},
                { id: 'CG', text: 'Congo'},
                { id: 'CD', text: 'Congo}, Democratic Republic'},
                { id: 'CK', text: 'Cook Islands'},
                { id: 'CR', text: 'Costa Rica'},
                { id: 'CI', text: 'Cote D\'Ivoire'},
                { id: 'HR', text: 'Croatia'},
                { id: 'CU', text: 'Cuba'},
                { id: 'CY', text: 'Cyprus'},
                { id: 'CZ', text: 'Czech Republic'},
                { id: 'DK', text: 'Denmark'},
                { id: 'DJ', text: 'Djibouti'},
                { id: 'DM', text: 'Dominica'},
                { id: 'DO', text: 'Dominican Republic'},
                { id: 'EC', text: 'Ecuador'},
                { id: 'EG', text: 'Egypt'},
                { id: 'SV', text: 'El Salvador'},
                { id: 'GQ', text: 'Equatorial Guinea'},
                { id: 'ER', text: 'Eritrea'},
                { id: 'EE', text: 'Estonia'},
                { id: 'ET', text: 'Ethiopia'},
                { id: 'FK', text: 'Falkland Islands (Malvinas)'},
                { id: 'FO', text: 'Faroe Islands'},
                { id: 'FJ', text: 'Fiji'},
                { id: 'FI', text: 'Finland'},
                { id: 'FR', text: 'France'},
                { id: 'GF', text: 'French Guiana'},
                { id: 'PF', text: 'French Polynesia'},
                { id: 'TF', text: 'French Southern Territories'},
                { id: 'GA', text: 'Gabon'},
                { id: 'GM', text: 'Gambia'},
                { id: 'GE', text: 'Georgia'},
                { id: 'DE', text: 'Germany'},
                { id: 'GH', text: 'Ghana'},
                { id: 'GI', text: 'Gibraltar'},
                { id: 'GR', text: 'Greece'},
                { id: 'GL', text: 'Greenland'},
                { id: 'GD', text: 'Grenada'},
                { id: 'GP', text: 'Guadeloupe'},
                { id: 'GU', text: 'Guam'},
                { id: 'GT', text: 'Guatemala'},
                { id: 'GG', text: 'Guernsey'},
                { id: 'GN', text: 'Guinea'},
                { id: 'GW', text: 'Guinea-Bissau'},
                { id: 'GY', text: 'Guyana'},
                { id: 'HT', text: 'Haiti'},
                { id: 'HM', text: 'Heard Island & Mcdonald Islands'},
                { id: 'VA', text: 'Holy See (Vatican City State)'},
                { id: 'HN', text: 'Honduras'},
                { id: 'HK', text: 'Hong Kong'},
                { id: 'HU', text: 'Hungary'},
                { id: 'IS', text: 'Iceland'},
                { id: 'IN', text: 'India'},
                { id: 'ID', text: 'Indonesia'},
                { id: 'IR', text: 'Iran}, Islamic Republic Of'},
                { id: 'IQ', text: 'Iraq'},
                { id: 'IE', text: 'Ireland'},
                { id: 'IM', text: 'Isle Of Man'},
                { id: 'IL', text: 'Israel'},
                { id: 'IT', text: 'Italy'},
                { id: 'JM', text: 'Jamaica'},
                { id: 'JP', text: 'Japan'},
                { id: 'JE', text: 'Jersey'},
                { id: 'JO', text: 'Jordan'},
                { id: 'KZ', text: 'Kazakhstan'},
                { id: 'KE', text: 'Kenya'},
                { id: 'KI', text: 'Kiribati'},
                { id: 'KR', text: 'Korea'},
                { id: 'KW', text: 'Kuwait'},
                { id: 'KG', text: 'Kyrgyzstan'},
                { id: 'LA', text: 'Lao People\'s Democratic Republic'},
                { id: 'LV', text: 'Latvia'},
                { id: 'LB', text: 'Lebanon'},
                { id: 'LS', text: 'Lesotho'},
                { id: 'LR', text: 'Liberia'},
                { id: 'LY', text: 'Libyan Arab Jamahiriya'},
                { id: 'LI', text: 'Liechtenstein'},
                { id: 'LT', text: 'Lithuania'},
                { id: 'LU', text: 'Luxembourg'},
                { id: 'MO', text: 'Macao'},
                { id: 'MK', text: 'Macedonia'},
                { id: 'MG', text: 'Madagascar'},
                { id: 'MW', text: 'Malawi'},
                { id: 'MY', text: 'Malaysia'},
                { id: 'MV', text: 'Maldives'},
                { id: 'ML', text: 'Mali'},
                { id: 'MT', text: 'Malta'},
                { id: 'MH', text: 'Marshall Islands'},
                { id: 'MQ', text: 'Martinique'},
                { id: 'MR', text: 'Mauritania'},
                { id: 'MU', text: 'Mauritius'},
                { id: 'YT', text: 'Mayotte'},
                { id: 'MX', text: 'Mexico'},
                { id: 'FM', text: 'Micronesia}, Federated States Of'},
                { id: 'MD', text: 'Moldova'},
                { id: 'MC', text: 'Monaco'},
                { id: 'MN', text: 'Mongolia'},
                { id: 'ME', text: 'Montenegro'},
                { id: 'MS', text: 'Montserrat'},
                { id: 'MA', text: 'Morocco'},
                { id: 'MZ', text: 'Mozambique'},
                { id: 'MM', text: 'Myanmar'},
                { id: 'NA', text: 'Namibia'},
                { id: 'NR', text: 'Nauru'},
                { id: 'NP', text: 'Nepal'},
                { id: 'NL', text: 'Netherlands'},
                { id: 'AN', text: 'Netherlands Antilles'},
                { id: 'NC', text: 'New Caledonia'},
                { id: 'NZ', text: 'New Zealand'},
                { id: 'NI', text: 'Nicaragua'},
                { id: 'NE', text: 'Niger'},
                { id: 'NG', text: 'Nigeria'},
                { id: 'NU', text: 'Niue'},
                { id: 'NF', text: 'Norfolk Island'},
                { id: 'MP', text: 'Northern Mariana Islands'},
                { id: 'NO', text: 'Norway'},
                { id: 'OM', text: 'Oman'},
                { id: 'PK', text: 'Pakistan'},
                { id: 'PW', text: 'Palau'},
                { id: 'PS', text: 'Palestinian Territory}, Occupied'},
                { id: 'PA', text: 'Panama'},
                { id: 'PG', text: 'Papua New Guinea'},
                { id: 'PY', text: 'Paraguay'},
                { id: 'PE', text: 'Peru'},
                { id: 'PH', text: 'Philippines'},
                { id: 'PN', text: 'Pitcairn'},
                { id: 'PL', text: 'Poland'},
                { id: 'PT', text: 'Portugal'},
                { id: 'PR', text: 'Puerto Rico'},
                { id: 'QA', text: 'Qatar'},
                { id: 'RE', text: 'Reunion'},
                { id: 'RO', text: 'Romania'},
                { id: 'RU', text: 'Russian Federation'},
                { id: 'RW', text: 'Rwanda'},
                { id: 'BL', text: 'Saint Barthelemy'},
                { id: 'SH', text: 'Saint Helena'},
                { id: 'KN', text: 'Saint Kitts And Nevis'},
                { id: 'LC', text: 'Saint Lucia'},
                { id: 'MF', text: 'Saint Martin'},
                { id: 'PM', text: 'Saint Pierre And Miquelon'},
                { id: 'VC', text: 'Saint Vincent And Grenadines'},
                { id: 'WS', text: 'Samoa'},
                { id: 'SM', text: 'San Marino'},
                { id: 'ST', text: 'Sao Tome And Principe'},
                { id: 'SA', text: 'Saudi Arabia'},
                { id: 'SN', text: 'Senegal'},
                { id: 'RS', text: 'Serbia'},
                { id: 'SC', text: 'Seychelles'},
                { id: 'SL', text: 'Sierra Leone'},
                { id: 'SG', text: 'Singapore'},
                { id: 'SK', text: 'Slovakia'},
                { id: 'SI', text: 'Slovenia'},
                { id: 'SB', text: 'Solomon Islands'},
                { id: 'SO', text: 'Somalia'},
                { id: 'ZA', text: 'South Africa'},
                { id: 'GS', text: 'South Georgia And Sandwich Isl.'},
                { id: 'ES', text: 'Spain'},
                { id: 'LK', text: 'Sri Lanka'},
                { id: 'SD', text: 'Sudan'},
                { id: 'SR', text: 'Suriname'},
                { id: 'SJ', text: 'Svalbard And Jan Mayen'},
                { id: 'SZ', text: 'Swaziland'},
                { id: 'SE', text: 'Sweden'},
                { id: 'CH', text: 'Switzerland'},
                { id: 'SY', text: 'Syrian Arab Republic'},
                { id: 'TW', text: 'Taiwan'},
                { id: 'TJ', text: 'Tajikistan'},
                { id: 'TZ', text: 'Tanzania'},
                { id: 'TH', text: 'Thailand'},
                { id: 'TL', text: 'Timor-Leste'},
                { id: 'TG', text: 'Togo'},
                { id: 'TK', text: 'Tokelau'},
                { id: 'TO', text: 'Tonga'},
                { id: 'TT', text: 'Trinidad And Tobago'},
                { id: 'TN', text: 'Tunisia'},
                { id: 'TR', text: 'Turkey'},
                { id: 'TM', text: 'Turkmenistan'},
                { id: 'TC', text: 'Turks And Caicos Islands'},
                { id: 'TV', text: 'Tuvalu'},
                { id: 'UG', text: 'Uganda'},
                { id: 'UA', text: 'Ukraine'},
                { id: 'AE', text: 'United Arab Emirates'},
                { id: 'GB', text: 'United Kingdom'},
                { id: 'US', text: 'United States'},
                { id: 'UM', text: 'United States Outlying Islands'},
                { id: 'UY', text: 'Uruguay'},
                { id: 'UZ', text: 'Uzbekistan'},
                { id: 'VU', text: 'Vanuatu'},
                { id: 'VE', text: 'Venezuela'},
                { id: 'VN', text: 'Viet Nam'},
                { id: 'VG', text: 'Virgin Islands}, British'},
                { id: 'VI', text: 'Virgin Islands}, U.S.'},
                { id: 'WF', text: 'Wallis And Futuna'},
                { id: 'EH', text: 'Western Sahara'},
                { id: 'YE', text: 'Yemen'},
                { id: 'ZM', text: 'Zambia'},
                { id: 'ZW', text: 'Zimbabwe'}
            ];
            
            function formatCountry (country) {
              if (!country.id) { return country.text; }
              var $country = $(
                '<span class="flag-icon flag-icon-'+ country.id.toLowerCase() +' flag-icon-squared"></span>' +
                '<span class="flag-text">'+ country.text+"</span>"
              );
              return $country;
            };
            
            //Assuming you have a select element with name country
            // e.g. <select name="name"></select>
            
            $("[name='source_areas[]']").select2({
                placeholder: "Select a country",
                templateResult: formatCountry,
                data: isoCountries
            });
            let row_number = {{ count(old('products', [''])) }};
      var tableTr= '<td><input type="text" name="names[]" class="form-control" value="" required /></td>'+   
                  '<td><input type="number" name="counts[]" class="form-control item_qty" value="" required/></td>'+
                  '<td><input type="text" name="units[]" class="form-control" value="" required/></td>'+
                  '<td><input type="number" name="amounts[]" class="form-control item_price" value="" required/></td>'+
                  '<td><input type="number" name="total_values[]" class="form-control subtotal" value="" readonly/></td>'+
                  '<td><input type="text" name="source_areas[]" class="form-control" value="" required/></td>'+
                  '<td><input type="text" name="hs_codes[]" class="form-control" value="" /></td>'+
                  '<td><button id="delete_row" class="btn  btn-outline-danger btn-sm remove" >X</button></td>';
    
      $("#add_row").click(function(e){
        e.preventDefault();
        let row_number = $('#itemsTable tr').length-1;
        
        $('#itemsTable').append('<tr id="product' + (row_number) + '"></tr>');
        $('#product' + row_number).html(tableTr).find('td:first-child');
        //row_number++;
        $("[name='source_areas[]']").select2({
                placeholder: "Select a country",
                templateResult: formatCountry,
                data: isoCountries
        });
      });

      $(document).on('click', '.remove', function() {
        $(this).closest('tr').remove();
      });
            
});
          
  
</script>

@endsection





@section('content')
<style>
.form-control {
    height: calc(1.9rem + 2px);
}

.btn-outline-secondary {
    height: calc(1.9rem + 2px);
    line-height: 1.0rem;
    
}

.btn-outline-secondary:hover{
    background-color: #ef5350;
    border-color: #ef5350;
}


.form-group {
    margin-bottom: 0.5rem;
}

label {
    margin-bottom: .1rem;
}

.modal-header {
  background-color: #5e5e5e;
  color: #fff;
  padding: 0.5rem 1rem !important;
}

.modal-footer {
  background-color: #999;
  padding: 0.5rem 1rem !important;

}

.badge-corner {
    position: absolute;
    top: 0;
    right: 10px;
    width: 0;
    height: 0;
    border-top: 66px solid #888;
    border-top-color: rgba(0, 0, 0, 0.3);
    border-left: 66px solid transparent;
    padding: 0;
    background-color: transparent;
    border-radius: 0;
}
.badge-corner span {
    position: absolute;
    top: -68px;
    left: -34px;
    font-size: 1.8rem;
    color: #fff;
}
.badge-corner-alt {
    border-top-color: #dc1e31;
}

.custom-control-input:checked~.custom-control-label::before {
    color: #fff;
    border-color: #dc1e31;
    background-color: #dc1e31;
}
</style>
<div class="container-fluid">

	<!-- Page header -->
	<div class="page-header" style="margin-top:150px">
		<div class="page-header-content header-elements-lg-inline">
			<div class="page-title d-flex">
				<h3><i class="icon-radio-checked mr-2"></i> <span class="font-weight-semibold">Edit Order</h3>
				<a href="#" class="header-elements-toggle text-body d-lg-none" ><i class="icon-more"></i></a>
                <h4>{{ $shipment->reference_no_1 }}</h4>
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
<div class="">
@if(session('message'))
                        <div class="row mb-2">
                            <div class="col-lg-12">
                                <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                            </div>
                        </div>
                    @endif
                    @if($errors->count() > 0)
                        <div class="alert alert-danger">
                            <ul class="list-unstyled">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
<form method="POST" action="{{ route('frontend.shipments.update', [$shipment->id]) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4  class="float-left">  Parcel & Freight cost</h4> 

                    </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-9">
                                <div class="row">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                        <label class="required" for="j_country">{{ trans('cruds.shipment.fields.j_country') }}</label>
                                                        <select class="form-control" name="j_country" id="j_country" value="{{ old('j_country', $shipment->j_country) }}" required>
                                                        <option value disabled {{ old('j_country', $shipment->j_country) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                                            <option Value="GB">United Kingdom</option>
                                                        </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label class="required" for="d_country">{{ trans('cruds.shipment.fields.d_country') }}</label>
                                                    <select class="form-control" name="d_country" id="d_country" value="{{ old('d_country', $shipment->d_country) }}" required>
                                                    <option value disabled {{ old('d_country', $shipment->d_country) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                                        <option Value="CN">China</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                            <label for="pickup_type_id">{{ trans('cruds.shipment.fields.pickup_type') }}</label>
                                            <select class="form-control" name="pickup_type_id" id="pickup_type_id" >
                                                @foreach($pickup_types as $id => $entry)
                                                    <option value="{{ $id }}" {{ old('pickup_type_id',$shipment->pickup_type_id) == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                                @endforeach
                                            </select>

                                            </div>
                                        </div>


                                        <input hidden class="form-control" type="number" name="parcel_quantity" id="parcel_quantity" value="{{ old('parcel_quantity', '1') }}" step="1" required>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="required" for="cargo_total_weight">{{ trans('cruds.shipment.fields.cargo_total_weight') }}</label>
                                                <input class="form-control" type="number" name="cargo_total_weight" id="cargo_total_weight" value="{{ old('cargo_total_weight', $shipment->cargo_total_weight) }}" step="0.1" min="0.1" max="20" required>
                                                @if($errors->has('cargo_total_weight'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('cargo_total_weight') }}
                                                    </div>
                                                @endif
                                                <span class="help-block">{{ trans('cruds.shipment.fields.cargo_total_weight_helper') }}</span>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="required" for="cargo_length">{{ trans('cruds.shipment.fields.cargo_length') }}</label>
                                                <input class="form-control cargo-dim" type="number" name="cargo_length" id="cargo_length" value="{{ old('cargo_length', $shipment->cargo_length) }}" step="1"  min="1" max="200" required> 
                                                @if($errors->has('cargo_length'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('cargo_length') }}
                                                    </div>
                                                @endif
                                                <span class="help-block">{{ trans('cruds.shipment.fields.cargo_length_helper') }}</span>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="required" for="cargo_width">{{ trans('cruds.shipment.fields.cargo_width') }}</label>
                                                <input class="form-control  cargo-dim" type="number" name="cargo_width" id="cargo_width" value="{{ old('cargo_width', $shipment->cargo_width) }}" step="1"  min="1" max="70" required>
                                                @if($errors->has('cargo_width'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('cargo_width') }}
                                                    </div>
                                                @endif
                                                <span class="help-block">{{ trans('cruds.shipment.fields.cargo_width_helper') }}</span>
                                            </div>                    
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                    <label class="required" for="cargo_height">{{ trans('cruds.shipment.fields.cargo_height') }}</label>
                                                    <input class="form-control  cargo-dim" type="number" name="cargo_height" id="cargo_height" value="{{ old('cargo_height', $shipment->cargo_height) }}" step="1"  min="1" max="70" required>
                                                    @if($errors->has('cargo_height'))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('cargo_height') }}
                                                        </div>
                                                    @endif
                                                    <span class="help-block">{{ trans('cruds.shipment.fields.cargo_height_helper') }}</span>
                                                            
                                            </div>
                                        </div>
                                        <input hidden class="form-control" type="number" name="vol_weight" id="vol_weight" value="{{ old('vol_weight', $shipment->vol_weight) }}" step="0.01" min="0.1000">

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="container h-100">
                                    <div class="row align-items-center h-100" style="background-color: #ddd">
                                        <div class="mx-auto">
                                            <label for="estimated_freight">{{ trans('cruds.shipment.fields.estimated_freight') }}</label>
                                            <input hidden class="form-control" type="number" name="estimated_freight" id="estimated_freight" value="{{ old('estimated_freight', $shipment->estimated_freight) }}">
                                            <h3>
                                                <span id="result" style="font-size: 1.5em;"></span>
                                            </h3>
                                            <a href="#" class="badge-corner badge-corner-alt"  id="freighTerms">
                                            <span><i class="fas fa-info-circle"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
 
                        </div>

                    </div>


                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Origin -->
                <div class="card dcat-box origin-box">
                    <div class="box-header with-border mb-1" style="padding: .65rem 1rem">
                        <h3 class="box-title d-inline-block" style="line-height:30px">Origin</h3>
                        <button type="button" id="load_shipper" class="btn btn-danger btn-sm float-right" style="margin-bottom:0.7em;">Load</button>
                        <button type="button" id="save_shipper" class="btn btn-danger btn-sm float-right" style="margin-bottom:0.7em; margin-right:15px;">Save</button>
                    </div>
                    <div class="box-body">
                        <div class="fields-group" style="padding: .65rem 1rem">
                        <div class="mb-2">
                            <div class="customer-info" style=" none ">
                            </div>
                            <div class="origin-details"style="display:  block " id="shipper_address">
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="required" for="j_contact">{{ trans('cruds.shipment.fields.j_contact') }}</label>
                                        <input class="form-control" type="text" name="j_contact" id="j_contact" value="{{ old('j_contact',  $shipment->j_contact) }}" required>
                                        @if($errors->has('j_contact'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('j_contact') }}
                                        </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.shipment.fields.j_contact_helper') }}</span>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="j_company">{{ trans('cruds.shipment.fields.j_company') }}</label>
                                        <input class="form-control" type="text" name="j_company" id="j_company" value="{{ old('j_company', $shipment->j_company) }}">
                                        @if($errors->has('j_company'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('j_company') }}
                                        </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.shipment.fields.j_company_helper') }}</span>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="required" class="required" for="j_post_code">{{ trans('cruds.shipment.fields.j_post_code') }}</label>
                                        <div class="input-group">
                                        <input class="form-control" type="text" name="j_post_code" id="j_post_code" value="{{ old('j_post_code', $shipment->j_post_code) }}" required>
                                        <div class="input-group-append">
                                        <button id="find_address" class="btn btn-outline-secondary" type="button" ><i class="fa fa-search" aria-hidden="true"></i></button>
                                        </div>
                                        </div>
                                            @if($errors->has('j_post_code'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('j_post_code') }}
                                            </div>
                                            @endif
                                        <span class="help-block">{{ trans('cruds.shipment.fields.j_post_code_helper') }}</span>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="required" for="j_province">{{ trans('cruds.shipment.fields.j_province') }}</label>
                                        <input class="form-control" type="text" name="j_province" id="j_province" value="{{ old('j_province', $shipment->j_province) }}" required>
                                        @if($errors->has('j_province'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('j_province') }}
                                        </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.shipment.fields.j_province_helper') }}</span>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="required" for="j_city">{{ trans('cruds.shipment.fields.j_city') }}</label>
                                        <input class="form-control" type="text" name="j_city" id="j_city" value="{{ old('j_city', $shipment->j_city) }}" required>
                                        @if($errors->has('j_city'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('j_city') }}
                                        </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.shipment.fields.j_city_helper') }}</span>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="required" for="j_tel">{{ trans('cruds.shipment.fields.j_tel') }}</label>
                                        <input class="form-control" type="text" name="j_tel" id="j_tel" value="{{ old('j_tel', $shipment->j_tel) }}" required>
                                        @if($errors->has('j_tel'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('j_tel') }}
                                        </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.shipment.fields.j_tel_helper') }}</span>
                                    </div>
                                    </div>
                                    <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="required" for="j_address">{{ trans('cruds.shipment.fields.j_address') }}</label>
                                        <input class="form-control" type="text" name="j_address" id="j_address" value="{{ old('j_address', $shipment->j_address) }}" required>
                                        @if($errors->has('j_address'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('j_address') }}
                                        </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.shipment.fields.j_address_helper') }}</span>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="j_email">{{ trans('cruds.shipment.fields.j_email') }}</label>
                                        <input class="form-control" type="text" name="j_email" id="j_email" value="{{ old('j_email', $shipment->j_email) }}">
                                        @if($errors->has('j_email'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('j_email') }}
                                        </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.shipment.fields.j_email_helper') }}</span>
                                    </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label class="required control-label" for="sender_type">{{ trans('cruds.shippingType.title') }}</label>
                                            <div class="ml-4 mt-1">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="sender_type1" name="sender_type" class="custom-control-input" value="1" {{ (old('sender_type',"1") == "1") ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="sender_type1">Personal</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="sender_type2" name="sender_type" class="custom-control-input" Value="2" {{ (old('sender_type') == "2") ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="sender_type2">Commercial</label>
                                                </div>
                                            </div>    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

<!-- Modal -->
<div class="modal fade " id="terms" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="termsLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="termsLabel">Terms & Conditions</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="termsContents">




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Understood</button>
      </div>
    </div>
  </div>
</div>




            <div class="col-md-6">
                <!-- Destination -->
                <div class="card dcat-box">
                    <div class="box-header with-border mb-1" style="padding: .65rem 1rem">
                        <h3 class="box-title d-inline-block" style="line-height:30px">Destination</h3>
                        <button type="button" id='load_receiver' class="btn btn-danger btn-sm float-right" style="margin-bottom:0.7em;">Load</button>
                        <button type="button" id="save_receiver" class="btn btn-danger btn-sm float-right" style="margin-bottom:0.7em; margin-right:15px;">Save</button>
                    </div>
                    <div class="box-body" style="padding: .65rem 1rem">
                        <div class="fields-group">
                        <div class="mb-2" id="receiver_address">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="required" for="d_contact">{{ trans('cruds.shipment.fields.d_contact') }}</label>
                                    <input class="form-control" type="text" name="d_contact" id="d_contact" value="{{ old('d_contact', $shipment->d_contact) }}" required>
                                    @if($errors->has('d_contact'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('d_contact') }}
                                    </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.shipment.fields.d_contact_helper') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="d_company">{{ trans('cruds.shipment.fields.d_company') }}</label>
                                        <input class="form-control" type="text" name="d_company" id="d_company" value="{{ old('d_company', $shipment->d_company) }}">
                                        @if($errors->has('d_company'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('d_company') }}
                                        </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.shipment.fields.d_company_helper') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="required" for="d_post_code">{{ trans('cruds.shipment.fields.d_post_code') }}</label>
                                    <input class="form-control" type="text" name="d_post_code" id="d_post_code" value="{{ old('d_post_code', $shipment->d_post_code) }}" required>
                                    @if($errors->has('d_post_code'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('d_post_code') }}
                                    </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.shipment.fields.d_post_code_helper') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="required" for="d_province">{{ trans('cruds.shipment.fields.d_province') }}</label>
                                    <input class="form-control" type="text" name="d_province" id="d_province" value="{{ old('d_province', $shipment->d_province) }}" required>
                                    @if($errors->has('d_province'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('d_province') }}
                                    </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.shipment.fields.d_province_helper') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="required" for="d_city">{{ trans('cruds.shipment.fields.d_city') }}</label>
                                    <input class="form-control" type="text" name="d_city" id="d_city" value="{{ old('d_city', $shipment->d_city) }}" required>
                                    @if($errors->has('d_city'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('d_city') }}
                                    </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.shipment.fields.d_city_helper') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="j_tel">{{ trans('cruds.shipment.fields.d_tel') }}</label>
                                    <input class="form-control" type="text" name="d_tel" id="d_tel" value="{{ old('d_tel', $shipment->d_tel) }}">
                                    @if($errors->has('d_tel'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('d_tel') }}
                                    </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.shipment.fields.d_tel_helper') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label class="required" for="d_address">{{ trans('cruds.shipment.fields.d_address') }}</label>
                                    <input class="form-control" type="text" name="d_address" id="d_address" value="{{ old('d_address', $shipment->d_address) }}" required>
                                    @if($errors->has('d_address'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('d_address') }}
                                    </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.shipment.fields.d_address_helper') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="d_email">{{ trans('cruds.shipment.fields.d_email') }}</label>
                                    <input class="form-control" type="text" name="d_email" id="d_email" value="{{ old('d_email', $shipment->d_email) }}">
                                    @if($errors->has('d_email'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('d_email') }}
                                    </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.shipment.fields.d_email_helper') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="required control-label" for="receiver_type">{{ trans('cruds.shippingType.title_receiving') }}</label>
                                        <div class="ml-4 mt-1">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="receiver_type1" name="receiver_type" class="custom-control-input" value="1" {{ (old('receiver_type',"1") == "1") ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="receiver_type1">Personal</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="receiver_type2" name="receiver_type" class="custom-control-input" Value="2" {{ (old('receiver_type') == "2") ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="receiver_type2">Commercial</label>
                                            </div>
                                        </div>    
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">
                        <div class="row">    
                            <div class="col-md-3">
                                    <div class="form-group">
                                        <label>{{ trans('cruds.shipment.fields.order_cert_type') }}</label>
                                        <select class="form-control" name="order_cert_type" id="order_cert_type">
                                            
                                            @foreach(App\Models\Shipment::ORDER_CERT_TYPE_SELECT as $key => $label)
                                                <option value="{{ $key }}" {{ old('order_cert_type', $shipment->order_cert_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('order_cert_type'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('order_cert_type') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.shipment.fields.order_cert_type_helper') }}</span>
                                    </div>
                                
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="order_cert_no">{{ trans('cruds.shipment.fields.order_cert_no') }}</label>
                                    <input class="form-control" type="text" name="order_cert_no" id="order_cert_no" value="{{ old('order_cert_no', $shipment->order_cert_no) }}">
                                    @if($errors->has('order_cert_no'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('order_cert_no') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.shipment.fields.order_cert_no_helper') }}</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                        <div class="form-group">
                                                <label class="required" for="currency">{{ trans('cruds.shipment.fields.declare_currency') }}</label>
                                                <select class="form-control" name="currency" id="currency" value="{{ old('currency', $shipment->currency) }}" required>
                                                <option value disabled {{ old('currency', $shipment->currency) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                                <option Value="GBP">GBP</option>
                                                <option Value="EUR">EUR</option>
                                                <option Value="CNY">CNY</option>
                                                </select>
                                        </div>
                            </div>

                            <div class="col-md-3">
                                        <div class="form-group">
                                                <label class="required" for="declare_amount">{{ trans('cruds.shipment.fields.declare_amount') }}</label>
                                                <input type="number" id="subtotal" name="declare_amount" class="form-control" value="{{ old('declare_amount', $shipment->declare_amount) }}" disabled/>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                            <h4  class="float-left">  {{ trans('cruds.shipment.Package Content') }}</h4> 
                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">

                                    </div>
                                    <div class="col-md-6">
                                        <!-- Button trigger modal DG Goods list-->
                                        <button type="button" class="btn btn-danger btn-sm float-right" data-toggle="modal" data-target="#dg-list">
                                        DG Goods list
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                            <table class="table" id="itemsTable">
                                <thead>
                                    <tr>
                                        <th style="width: 28%">Item Description
                                            <button class="btn btn-danger"  id="itemTerms">
                                            <span><i class="fas fa-info-circle"></i></span>
                                            </button>
                                        </th>
                                        <th>Quantity</th>
                                        <th width=10%>Unit</th>
                                        <th id="unit_price"  width=10%>Unit Price</th>
                                        <th id="item_total" width=10%>Total</th>
                                        <th width=20%>Origin</th>
                                        <th style="width: 12%">HS Code</th>
                                        <th style="width: 12%"><button id="add_row" class="btn btn-danger btn-sm float-right" >+ Add</button></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $sum = 0; $i=0; ?>
                                        @foreach($shipment->shipmentCargos as $cargo)

                                        <tr id="product{{ $i }}">
                                            <td> 
                                                <input autocomplete="off" type="text" name="names[]" class="form-control" value="{{$cargo->name}}" required />   
                                            </td>
                                            <td>
                                                <input type="number" name="counts[]" class="form-control item_qty" value="{{$cargo->count}}" step="1"  min="1" required/>
                                            </td>
                                            <td>
                                                <!-- <input type="text" name="units[]" class="form-control" value="{{ old('unit.' . $i) ?? '' }}" required/> -->
                                                <div class="dropdown">
                                                    <div data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <input id='test' type="text" name="units[]" class="form-control" value="{{$cargo->unit}}" required onClick="this.setSelectionRange(0, this.value.length)"/> 
                                                    </div>

                                                    <div class="dropdown-menu unit" aria-labelledby="dropdownMenuButton">
                                                        <li class="dropdown-item">Box</li>
                                                        <li class="dropdown-item">Piece</li>
                                                        <li class="dropdown-item">Pack</li>
                                                        <li class="dropdown-item">Can</li>
                                                    </div>
                                                </div>

                                            </td>
                                            <td>
                                                <input type="number" name="amounts[]" class="form-control item_price" value="{{$cargo->amount}}"  min="1.0" required/>
                                            </td>
                                            <td>
                                                <input type="number" name="total_values[]" class="form-control subtotal" value="{{$cargo->total_value}}" readonly/>
                                            </td>
                                            <td>
                                               <!-- <input type="text" name="source_areas[]" class="form-control" value="{{ old('source_area.' . $i) ?? '' }}" required/>
                                                <select class="selectpicker countrypicker" data-flag="true" ></select>
                                            -->

                                            <input type="text" name="source_areas[]" class="form-control" value="{{$cargo->source_area}}" required/>
                                                
                                            </td>
                                            <td>
                                                <input type="text" name="hs_codes[]" class="form-control" value="{{$cargo->hs_code}}" />
                                            </td>
                                            <td>
                                                @if ($i > 0)
                                                <button id="delete_row" class="btn  btn-outline-danger btn-sm remove" >X</button>
                                                @endif
                                            </td>

                                        </tr>
                                        <?php $sum += $cargo->total_value; $i++; ?>
                                        @endforeach
                                    <!-- <tr id="product{{ count(old('products', [''])) }}"></tr> -->
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">

                    <ul class="nav nav-tabs nav-tabs-bottom ">
            <li class="nav-item"><a href="#bottom-justified-tab1" class="nav-link active" data-toggle="tab">Terms and Conditions of Waybill (UK)</a></li>
            <li class="nav-item"><a href="#bottom-justified-tab2" class="nav-link" data-toggle="tab">《快递运单条款(英国)》</a></li>

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
			<div class="tab-pane fade " id="bottom-justified-tab2">
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
						<span class="custom-control-label">I have confirmed that I have read and agree to the
"Terms and Conditions of Waybill (UK)"<br>我已确认阅读并同意《快递运单条款(英国)》
</span>
					</label>

                            <div class="form-group">
                                <button class="btn btn-danger agreeToTerms" type="submit" name="submit" value="save" disabled = true>
                                    {{ trans('global.save_for_later') }}
                                </button>
                                <button class="btn btn-danger agreeToTerms" type="submit" name="submit" value="checkout" disabled = true>
                                    {{ trans('global.checkout') }}
                                </button>
                            </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>

<!-- Modal -->
<div class="modal fade" id="addressSelector" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="modalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="">
        <table class="table table-hover table-sm">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="addressList" > 
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

      </div>
    </div>
  </div>
</div>
        </div>
			<!-- /content area -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

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
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@endsection
