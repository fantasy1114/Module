
<!-- BEGIN: Head-->
@include('datatrans::layouts.header')
<!-- END: Head-->
<style>
 label {
  display: block
}

.paymentForm {
  border: 0px;
  background-color: #F7F8F9;
  padding: 10px
}

#cardNumberPlaceholder {
  display: inline-block;
  width: 300px;
  height: 38px;
}

#cvvPlaceholder {
  display: inline-block;
  width: 120px;
  height: 38px;
}

#result {
  display: none;
}
    </style>
<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Content-->
    <div class="container">
     
        <div class="content-wrapper">
           
            <div class="content-body">
                <!-- Horizontal Wizard -->
                <section class="horizontal-wizard">
                    <div class="bs-stepper horizontal-wizard-example">
                        <div class="bs-stepper-header">
                            <div class="step" data-target="#service-service">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title pb-3">1. Service</span>
                                    </span>
                                </button>
                                <div class="progress-step"></div>
                            </div>
                            
                            <div class="step" data-target="#service-time">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title pb-3">2. time</span>
                                    </span>
                                </button>
                                <div class="progress-step"></div>
                            </div>
                            
                            <div class="step" data-target="#service-detail">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title pb-3">3. Details</span>
                                    </span>
                                </button>
                                <div class="progress-step"></div>
                            </div>
                
                            <div class="step" data-target="#service-payment">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title pb-3">4. Payment</span>
                                    </span>
                                </button>
                                <div class="progress-step"></div>
                            </div>
                            <div class="step" data-target="#page-done">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title pb-3">5. Done</span>
                                    </span>
                                </button>
                                <div class="progress-step"></div>
                            </div>
                        </div>
                        
                        <div class="bs-stepper-content">
                            <div id="service-service" class="content">
                                <div class="content-header">
                                    <span class="content-header-explain">Select service</span>
                                </div>
                                <form>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="form-label service-label-color" for="service">Service</label>
                                            <select class="form-select w-100" name="service_name" id="service_name" aria-label="service_name" required>
                                                <option value="">Select service</option>
                                                @foreach ($services as $service)
                                                    <option value="{{$service->title}}" class="service_name_option" data-price="{{$service->price}}" data-duration="{{$service->duration}}" data-end_day="{{$service->end_day}}" data-start_day="{{$service->start_day}}" data-start_time="{{$service->start_time}}" data-end_time="{{$service->end_time}}" data-sun="{{$service->sun}}" data-mon="{{$service->mon}}" data-tue="{{$service->tue}}" data-wed="{{$service->wed}}" data-thu="{{$service->thu}}" data-fri="{{$service->fri}}" data-sat="{{$service->sat}}">{{$service->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label service-label-color" for="Masseuse">Masseuse</label>
                                            <select class="form-select w-100" name="category_name" id="category_name" aria-label="category_name" required>
                                                <option value="">Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{$category->name}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-3 form-group">
                                            <label for="pd-default">Select date (click on it)</label>
                                            <input type="text" class="form-control pickadate" id="select_date" name="select_date" placeholder="{{ date('j. F Y') }}" value="{{date('j. F Y')}}"/>
                                        </div>
                                    </div>
                                </form>
                                
                                <div class="d-flex justify-content-between mt-4 btn-pagenation pt-4">
                                    <button class="btn btn-outline-secondary btn-prev invisible" disabled>
                                        <span class="d-sm-inline-flex d-none">Previous</span>
                                    </button>
                                    <button class="btn btn-next-bgcolor btn-next-serivce-select">
                                        <span class="d-flex align-items-center btn-next-font">Continue</span>
                                    </button>
                                </div>
                            </div>
                            <div id="service-time" class="content">
                                <div class="content-header">
                                    <span class="content-header-explain">
                                        Below is a list of the <b class="service__name"></b> time slots available .<br>
                                        Click on a time slot to proceed with the booking.
                                    </span>
                                </div>
                                <form>
                                    <div class="form-group">
                                        <select class="form-select timezone_name" name="timezone_name" id="timezone_name" aria-label="timezone_name">
                                            <optgroup label="Africa">
                                                <option value="Africa/Abidjan">(UTC + 00:00) Abidjan</option>
                                                <option value="Africa/Accra">(UTC + 00:00) Accra</option>
                                                <option value="Africa/Addis_Ababa">(UTC + 03:00) Addis Ababa</option>
                                                <option value="Africa/Algiers">(UTC + 01:00) Algiers</option>
                                                <option value="Africa/Asmara">(UTC + 03:00) Asmara</option>
                                                <option value="Africa/Bamako">(UTC + 00:00) Bamako</option>
                                                <option value="Africa/Bangui">(UTC + 01:00) Bangui</option>
                                                <option value="Africa/Banjul">(UTC + 00:00) Banjul</option>
                                                <option value="Africa/Bissau">(UTC + 00:00) Bissau</option>
                                                <option value="Africa/Blantyre">(UTC + 02:00) Blantyre</option>
                                                <option value="Africa/Brazzaville">(UTC + 01:00) Brazzaville</option>
                                                <option value="Africa/Bujumbura">(UTC + 02:00) Bujumbura</option>
                                                <option value="Africa/Cairo">(UTC + 02:00) Cairo</option>
                                                <option value="Africa/Casablanca">(UTC + 00:00) Casablanca</option>
                                                <option value="Africa/Ceuta">(UTC + 01:00) Ceuta</option>
                                                <option value="Africa/Conakry">(UTC + 00:00) Conakry</option>
                                                <option value="Africa/Dakar">(UTC + 00:00) Dakar</option>
                                                <option value="Africa/Dar_es_Salaam">(UTC + 03:00) Dar es Salaam</option>
                                                <option value="Africa/Djibouti">(UTC + 03:00) Djibouti</option>
                                                <option value="Africa/Douala">(UTC + 01:00) Douala</option>
                                                <option value="Africa/El_Aaiun">(UTC + 00:00) El Aaiun</option>
                                                <option value="Africa/Freetown">(UTC + 00:00) Freetown</option>
                                                <option value="Africa/Gaborone">(UTC + 02:00) Gaborone</option>
                                                <option value="Africa/Harare">(UTC + 02:00) Harare</option>
                                                <option value="Africa/Johannesburg">(UTC + 02:00) Johannesburg</option>
                                                <option value="Africa/Juba">(UTC + 03:00) Juba</option>
                                                <option value="Africa/Kampala">(UTC + 03:00) Kampala</option>
                                                <option value="Africa/Khartoum">(UTC + 03:00) Khartoum</option>
                                                <option value="Africa/Kigali">(UTC + 02:00) Kigali</option>
                                                <option value="Africa/Kinshasa">(UTC + 01:00) Kinshasa</option>
                                                <option value="Africa/Lagos">(UTC + 01:00) Lagos</option>
                                                <option value="Africa/Libreville">(UTC + 01:00) Libreville</option>
                                                <option value="Africa/Lome">(UTC + 00:00) Lome</option>
                                                <option value="Africa/Luanda">(UTC + 01:00) Luanda</option>
                                                <option value="Africa/Lubumbashi">(UTC + 02:00) Lubumbashi</option>
                                                <option value="Africa/Lusaka">(UTC + 02:00) Lusaka</option>
                                                <option value="Africa/Malabo">(UTC + 01:00) Malabo</option>
                                                <option value="Africa/Maputo">(UTC + 02:00) Maputo</option>
                                                <option value="Africa/Maseru">(UTC + 02:00) Maseru</option>
                                                <option value="Africa/Mbabane">(UTC + 02:00) Mbabane</option>
                                                <option value="Africa/Mogadishu">(UTC + 03:00) Mogadishu</option>
                                                <option value="Africa/Monrovia">(UTC + 00:00) Monrovia</option>
                                                <option value="Africa/Nairobi">(UTC + 03:00) Nairobi</option>
                                                <option value="Africa/Ndjamena">(UTC + 01:00) Ndjamena</option>
                                                <option value="Africa/Niamey">(UTC + 01:00) Niamey</option>
                                                <option value="Africa/Nouakchott">(UTC + 00:00) Nouakchott</option>
                                                <option value="Africa/Ouagadougou">(UTC + 00:00) Ouagadougou</option>
                                                <option value="Africa/Porto-Novo">(UTC + 01:00) Porto-Novo</option>
                                                <option value="Africa/Sao_Tome">(UTC + 00:00) Sao Tome</option>
                                                <option value="Africa/Tripoli">(UTC + 02:00) Tripoli</option>
                                                <option value="Africa/Tunis">(UTC + 01:00) Tunis</option>
                                                <option value="Africa/Windhoek">(UTC + 02:00) Windhoek</option>
                                            </optgroup>
                                            <optgroup label="America">
                                                <option value="America/Adak">(UTC - 10:00) Adak</option>
                                                <option value="America/Anchorage">(UTC - 09:00) Anchorage</option>
                                                <option value="America/Anguilla">(UTC - 04:00) Anguilla</option>
                                                <option value="America/Antigua">(UTC - 04:00) Antigua</option>
                                                <option value="America/Araguaina">(UTC - 03:00) Araguaina</option>
                                                <option value="America/Argentina/Buenos_Aires">(UTC - 03:00) Argentina/Buenos Aires</option>
                                                <option value="America/Argentina/Catamarca">(UTC - 03:00) Argentina/Catamarca</option>
                                                <option value="America/Argentina/Cordoba">(UTC - 03:00) Argentina/Cordoba</option>
                                                <option value="America/Argentina/Jujuy">(UTC - 03:00) Argentina/Jujuy</option>
                                                <option value="America/Argentina/La_Rioja">(UTC - 03:00) Argentina/La Rioja</option>
                                                <option value="America/Argentina/Mendoza">(UTC - 03:00) Argentina/Mendoza</option>
                                                <option value="America/Argentina/Rio_Gallegos">(UTC - 03:00) Argentina/Rio Gallegos</option>
                                                <option value="America/Argentina/Salta">(UTC - 03:00) Argentina/Salta</option>
                                                <option value="America/Argentina/San_Juan">(UTC - 03:00) Argentina/San Juan</option>
                                                <option value="America/Argentina/San_Luis">(UTC - 03:00) Argentina/San Luis</option>
                                                <option value="America/Argentina/Tucuman">(UTC - 03:00) Argentina/Tucuman</option>
                                                <option value="America/Argentina/Ushuaia">(UTC - 03:00) Argentina/Ushuaia</option>
                                                <option value="America/Aruba">(UTC - 04:00) Aruba</option>
                                                <option value="America/Asuncion">(UTC - 03:00) Asuncion</option>
                                                <option value="America/Atikokan">(UTC - 05:00) Atikokan</option>
                                                <option value="America/Bahia">(UTC - 03:00) Bahia</option>
                                                <option value="America/Bahia_Banderas">(UTC - 06:00) Bahia Banderas</option>
                                                <option value="America/Barbados">(UTC - 04:00) Barbados</option>
                                                <option value="America/Belem">(UTC - 03:00) Belem</option>
                                                <option value="America/Belize">(UTC - 06:00) Belize</option>
                                                <option value="America/Blanc-Sablon">(UTC - 04:00) Blanc-Sablon</option>
                                                <option value="America/Boa_Vista">(UTC - 04:00) Boa Vista</option>
                                                <option value="America/Bogota">(UTC - 05:00) Bogota</option>
                                                <option value="America/Boise">(UTC - 07:00) Boise</option>
                                                <option value="America/Cambridge_Bay">(UTC - 07:00) Cambridge Bay</option>
                                                <option value="America/Campo_Grande">(UTC - 03:00) Campo Grande</option>
                                                <option value="America/Cancun">(UTC - 05:00) Cancun</option>
                                                <option value="America/Caracas">(UTC - 04:30) Caracas</option>
                                                <option value="America/Cayenne">(UTC - 03:00) Cayenne</option>
                                                <option value="America/Cayman">(UTC - 05:00) Cayman</option>
                                                <option value="America/Chicago">(UTC - 06:00) Chicago</option>
                                                <option value="America/Chihuahua">(UTC - 07:00) Chihuahua</option>
                                                <option value="America/Costa_Rica">(UTC - 06:00) Costa Rica</option>
                                                <option value="America/Creston">(UTC - 07:00) Creston</option>
                                                <option value="America/Cuiaba">(UTC - 03:00) Cuiaba</option>
                                                <option value="America/Curacao">(UTC - 04:00) Curacao</option>
                                                <option value="America/Danmarkshavn">(UTC + 00:00) Danmarkshavn</option>
                                                <option value="America/Dawson">(UTC - 08:00) Dawson</option>
                                                <option value="America/Dawson_Creek">(UTC - 07:00) Dawson Creek</option>
                                                <option value="America/Denver">(UTC - 07:00) Denver</option>
                                                <option value="America/Detroit">(UTC - 05:00) Detroit</option>
                                                <option value="America/Dominica">(UTC - 04:00) Dominica</option>
                                                <option value="America/Edmonton">(UTC - 07:00) Edmonton</option>
                                                <option value="America/Eirunepe">(UTC - 05:00) Eirunepe</option>
                                                <option value="America/El_Salvador">(UTC - 06:00) El Salvador</option>
                                                <option value="America/Fort_Nelson">(UTC - 07:00) Fort Nelson</option>
                                                <option value="America/Fortaleza">(UTC - 03:00) Fortaleza</option>
                                                <option value="America/Glace_Bay">(UTC - 04:00) Glace Bay</option>
                                                <option value="America/Godthab">(UTC - 03:00) Godthab</option>
                                                <option value="America/Goose_Bay">(UTC - 04:00) Goose Bay</option>
                                                <option value="America/Grand_Turk">(UTC - 04:00) Grand Turk</option>
                                                <option value="America/Grenada">(UTC - 04:00) Grenada</option>
                                                <option value="America/Guadeloupe">(UTC - 04:00) Guadeloupe</option>
                                                <option value="America/Guatemala">(UTC - 06:00) Guatemala</option>
                                                <option value="America/Guayaquil">(UTC - 05:00) Guayaquil</option>
                                                <option value="America/Guyana">(UTC - 04:00) Guyana</option>
                                                <option value="America/Halifax">(UTC - 04:00) Halifax</option>
                                                <option value="America/Havana">(UTC - 05:00) Havana</option>
                                                <option value="America/Hermosillo">(UTC - 07:00) Hermosillo</option>
                                                <option value="America/Indiana/Indianapolis">(UTC - 05:00) Indiana/Indianapolis</option>
                                                <option value="America/Indiana/Knox">(UTC - 06:00) Indiana/Knox</option>
                                                <option value="America/Indiana/Marengo">(UTC - 05:00) Indiana/Marengo</option>
                                                <option value="America/Indiana/Petersburg">(UTC - 05:00) Indiana/Petersburg</option>
                                                <option value="America/Indiana/Tell_City">(UTC - 06:00) Indiana/Tell City</option>
                                                <option value="America/Indiana/Vevay">(UTC - 05:00) Indiana/Vevay</option>
                                                <option value="America/Indiana/Vincennes">(UTC - 05:00) Indiana/Vincennes</option>
                                                <option value="America/Indiana/Winamac">(UTC - 05:00) Indiana/Winamac</option>
                                                <option value="America/Inuvik">(UTC - 07:00) Inuvik</option>
                                                <option value="America/Iqaluit">(UTC - 05:00) Iqaluit</option>
                                                <option value="America/Jamaica">(UTC - 05:00) Jamaica</option>
                                                <option value="America/Juneau">(UTC - 09:00) Juneau</option>
                                                <option value="America/Kentucky/Louisville">(UTC - 05:00) Kentucky/Louisville</option>
                                                <option value="America/Kentucky/Monticello">(UTC - 05:00) Kentucky/Monticello</option>
                                                <option value="America/Kralendijk">(UTC - 04:00) Kralendijk</option>
                                                <option value="America/La_Paz">(UTC - 04:00) La Paz</option>
                                                <option value="America/Lima">(UTC - 05:00) Lima</option>
                                                <option value="America/Los_Angeles">(UTC - 08:00) Los Angeles</option>
                                                <option value="America/Lower_Princes">(UTC - 04:00) Lower Princes</option>
                                                <option value="America/Maceio">(UTC - 03:00) Maceio</option>
                                                <option value="America/Managua">(UTC - 06:00) Managua</option>
                                                <option value="America/Manaus">(UTC - 04:00) Manaus</option>
                                                <option value="America/Marigot">(UTC - 04:00) Marigot</option>
                                                <option value="America/Martinique">(UTC - 04:00) Martinique</option>
                                                <option value="America/Matamoros">(UTC - 06:00) Matamoros</option>
                                                <option value="America/Mazatlan">(UTC - 07:00) Mazatlan</option>
                                                <option value="America/Menominee">(UTC - 06:00) Menominee</option>
                                                <option value="America/Merida">(UTC - 06:00) Merida</option>
                                                <option value="America/Metlakatla">(UTC - 09:00) Metlakatla</option>
                                                <option value="America/Mexico_City">(UTC - 06:00) Mexico City</option>
                                                <option value="America/Miquelon">(UTC - 03:00) Miquelon</option>
                                                <option value="America/Moncton">(UTC - 04:00) Moncton</option>
                                                <option value="America/Monterrey">(UTC - 06:00) Monterrey</option>
                                                <option value="America/Montevideo">(UTC - 03:00) Montevideo</option>
                                                <option value="America/Montserrat">(UTC - 04:00) Montserrat</option>
                                                <option value="America/Nassau">(UTC - 05:00) Nassau</option>
                                                <option value="America/New_York">(UTC - 05:00) New York</option>
                                                <option value="America/Nipigon">(UTC - 05:00) Nipigon</option>
                                                <option value="America/Nome">(UTC - 09:00) Nome</option>
                                                <option value="America/Noronha">(UTC - 02:00) Noronha</option>
                                                <option value="America/North_Dakota/Beulah">(UTC - 06:00) North Dakota/Beulah</option>
                                                <option value="America/North_Dakota/Center">(UTC - 06:00) North Dakota/Center</option>
                                                <option value="America/North_Dakota/New_Salem">(UTC - 06:00) North Dakota/New Salem</option>
                                                <option value="America/Ojinaga">(UTC - 07:00) Ojinaga</option>
                                                <option value="America/Panama">(UTC - 05:00) Panama</option>
                                                <option value="America/Pangnirtung">(UTC - 05:00) Pangnirtung</option>
                                                <option value="America/Paramaribo">(UTC - 03:00) Paramaribo</option>
                                                <option value="America/Phoenix">(UTC - 07:00) Phoenix</option>
                                                <option value="America/Port-au-Prince">(UTC - 05:00) Port-au-Prince</option>
                                                <option value="America/Port_of_Spain">(UTC - 04:00) Port of Spain</option>
                                                <option value="America/Porto_Velho">(UTC - 04:00) Porto Velho</option>
                                                <option value="America/Puerto_Rico">(UTC - 04:00) Puerto Rico</option>
                                                <option value="America/Rainy_River">(UTC - 06:00) Rainy River</option>
                                                <option value="America/Rankin_Inlet">(UTC - 06:00) Rankin Inlet</option>
                                                <option value="America/Recife">(UTC - 03:00) Recife</option>
                                                <option value="America/Regina">(UTC - 06:00) Regina</option>
                                                <option value="America/Resolute">(UTC - 06:00) Resolute</option>
                                                <option value="America/Rio_Branco">(UTC - 05:00) Rio Branco</option>
                                                <option value="America/Santarem">(UTC - 03:00) Santarem</option>
                                                <option value="America/Santiago">(UTC - 03:00) Santiago</option>
                                                <option value="America/Santo_Domingo">(UTC - 04:00) Santo Domingo</option>
                                                <option value="America/Sao_Paulo">(UTC - 02:00) Sao Paulo</option>
                                                <option value="America/Scoresbysund">(UTC - 01:00) Scoresbysund</option>
                                                <option value="America/Sitka">(UTC - 09:00) Sitka</option>
                                                <option value="America/St_Barthelemy">(UTC - 04:00) St. Barthelemy</option>
                                                <option value="America/St_Johns">(UTC - 03:30) St. Johns</option>
                                                <option value="America/St_Kitts">(UTC - 04:00) St. Kitts</option>
                                                <option value="America/St_Lucia">(UTC - 04:00) St. Lucia</option>
                                                <option value="America/St_Thomas">(UTC - 04:00) St. Thomas</option>
                                                <option value="America/St_Vincent">(UTC - 04:00) St. Vincent</option>
                                                <option value="America/Swift_Current">(UTC - 06:00) Swift Current</option>
                                                <option value="America/Tegucigalpa">(UTC - 06:00) Tegucigalpa</option>
                                                <option value="America/Thule">(UTC - 04:00) Thule</option>
                                                <option value="America/Thunder_Bay">(UTC - 05:00) Thunder Bay</option>
                                                <option value="America/Tijuana">(UTC - 08:00) Tijuana</option>
                                                <option value="America/Toronto">(UTC - 05:00) Toronto</option>
                                                <option value="America/Tortola">(UTC - 04:00) Tortola</option>
                                                <option value="America/Vancouver">(UTC - 08:00) Vancouver</option>
                                                <option value="America/Whitehorse">(UTC - 08:00) Whitehorse</option>
                                                <option value="America/Winnipeg">(UTC - 06:00) Winnipeg</option>
                                                <option value="America/Yakutat">(UTC - 09:00) Yakutat</option>
                                                <option value="America/Yellowknife">(UTC - 07:00) Yellowknife</option>
                                            </optgroup>
                                            <optgroup label="Antarctica">
                                                <option value="Antarctica/Casey">(UTC + 08:00) Casey</option>
                                                <option value="Antarctica/Davis">(UTC + 07:00) Davis</option>
                                                <option value="Antarctica/DumontDUrville">(UTC + 10:00) DumontDUrville</option>
                                                <option value="Antarctica/Macquarie">(UTC + 11:00) Macquarie</option>
                                                <option value="Antarctica/Mawson">(UTC + 05:00) Mawson</option>
                                                <option value="Antarctica/McMurdo">(UTC + 13:00) McMurdo</option>
                                                <option value="Antarctica/Palmer">(UTC - 03:00) Palmer</option>
                                                <option value="Antarctica/Rothera">(UTC - 03:00) Rothera</option>
                                                <option value="Antarctica/Syowa">(UTC + 03:00) Syowa</option>
                                                <option value="Antarctica/Troll">(UTC + 00:00) Troll</option>
                                                <option value="Antarctica/Vostok">(UTC + 06:00) Vostok</option>
                                            </optgroup>
                                            <optgroup label="Arctic">
                                                <option value="Arctic/Longyearbyen">(UTC + 01:00) Longyearbyen</option>
                                            </optgroup>
                                            <optgroup label="Asia">
                                                <option value="Asia/Aden">(UTC + 03:00) Aden</option>
                                                <option value="Asia/Almaty">(UTC + 06:00) Almaty</option>
                                                <option value="Asia/Amman">(UTC + 02:00) Amman</option>
                                                <option value="Asia/Anadyr">(UTC + 12:00) Anadyr</option>
                                                <option value="Asia/Aqtau">(UTC + 05:00) Aqtau</option>
                                                <option value="Asia/Aqtobe">(UTC + 05:00) Aqtobe</option>
                                                <option value="Asia/Ashgabat">(UTC + 05:00) Ashgabat</option>
                                                <option value="Asia/Baghdad">(UTC + 03:00) Baghdad</option>
                                                <option value="Asia/Bahrain">(UTC + 03:00) Bahrain</option>
                                                <option value="Asia/Baku">(UTC + 04:00) Baku</option>
                                                <option value="Asia/Bangkok">(UTC + 07:00) Bangkok</option>
                                                <option value="Asia/Barnaul">(UTC + 07:00) Barnaul</option>
                                                <option value="Asia/Beirut">(UTC + 02:00) Beirut</option>
                                                <option value="Asia/Bishkek">(UTC + 06:00) Bishkek</option>
                                                <option value="Asia/Brunei">(UTC + 08:00) Brunei</option>
                                                <option value="Asia/Chita">(UTC + 09:00) Chita</option>
                                                <option value="Asia/Choibalsan">(UTC + 08:00) Choibalsan</option>
                                                <option value="Asia/Colombo">(UTC + 05:30) Colombo</option>
                                                <option value="Asia/Damascus">(UTC + 02:00) Damascus</option>
                                                <option value="Asia/Dhaka">(UTC + 06:00) Dhaka</option>
                                                <option value="Asia/Dili">(UTC + 09:00) Dili</option>
                                                <option value="Asia/Dubai">(UTC + 04:00) Dubai</option>
                                                <option value="Asia/Dushanbe">(UTC + 05:00) Dushanbe</option>
                                                <option value="Asia/Gaza">(UTC + 02:00) Gaza</option>
                                                <option value="Asia/Hebron">(UTC + 02:00) Hebron</option>
                                                <option value="Asia/Ho_Chi_Minh">(UTC + 07:00) Ho Chi Minh</option>
                                                <option value="Asia/Hong_Kong">(UTC + 08:00) Hong Kong</option>
                                                <option value="Asia/Hovd">(UTC + 07:00) Hovd</option>
                                                <option value="Asia/Irkutsk">(UTC + 08:00) Irkutsk</option>
                                                <option value="Asia/Jakarta">(UTC + 07:00) Jakarta</option>
                                                <option value="Asia/Jayapura">(UTC + 09:00) Jayapura</option>
                                                <option value="Asia/Jerusalem">(UTC + 02:00) Jerusalem</option>
                                                <option value="Asia/Kabul">(UTC + 04:30) Kabul</option>
                                                <option value="Asia/Kamchatka">(UTC + 12:00) Kamchatka</option>
                                                <option value="Asia/Karachi">(UTC + 05:00) Karachi</option>
                                                <option value="Asia/Kathmandu">(UTC + 05:45) Kathmandu</option>
                                                <option value="Asia/Khandyga">(UTC + 09:00) Khandyga</option>
                                                <option value="Asia/Kolkata">(UTC + 05:30) Kolkata</option>
                                                <option value="Asia/Krasnoyarsk">(UTC + 07:00) Krasnoyarsk</option>
                                                <option value="Asia/Kuala_Lumpur">(UTC + 08:00) Kuala Lumpur</option>
                                                <option value="Asia/Kuching">(UTC + 08:00) Kuching</option>
                                                <option value="Asia/Kuwait">(UTC + 03:00) Kuwait</option>
                                                <option value="Asia/Macau">(UTC + 08:00) Macau</option>
                                                <option value="Asia/Magadan">(UTC + 10:00) Magadan</option>
                                                <option value="Asia/Makassar">(UTC + 08:00) Makassar</option>
                                                <option value="Asia/Manila">(UTC + 08:00) Manila</option>
                                                <option value="Asia/Muscat">(UTC + 04:00) Muscat</option>
                                                <option value="Asia/Nicosia">(UTC + 02:00) Nicosia</option>
                                                <option value="Asia/Novokuznetsk">(UTC + 07:00) Novokuznetsk</option>
                                                <option value="Asia/Novosibirsk">(UTC + 06:00) Novosibirsk</option>
                                                <option value="Asia/Omsk">(UTC + 06:00) Omsk</option>
                                                <option value="Asia/Oral">(UTC + 05:00) Oral</option>
                                                <option value="Asia/Phnom_Penh">(UTC + 07:00) Phnom Penh</option>
                                                <option value="Asia/Pontianak">(UTC + 07:00) Pontianak</option>
                                                <option value="Asia/Pyongyang">(UTC + 08:30) Pyongyang</option>
                                                <option value="Asia/Qatar">(UTC + 03:00) Qatar</option>
                                                <option value="Asia/Qyzylorda">(UTC + 06:00) Qyzylorda</option>
                                                <option value="Asia/Rangoon">(UTC + 06:30) Rangoon</option>
                                                <option value="Asia/Riyadh">(UTC + 03:00) Riyadh</option>
                                                <option value="Asia/Sakhalin">(UTC + 11:00) Sakhalin</option>
                                                <option value="Asia/Samarkand">(UTC + 05:00) Samarkand</option>
                                                <option value="Asia/Seoul">(UTC + 09:00) Seoul</option>
                                                <option value="Asia/Shanghai">(UTC + 08:00) Shanghai</option>
                                                <option value="Asia/Singapore">(UTC + 08:00) Singapore</option>
                                                <option value="Asia/Srednekolymsk">(UTC + 11:00) Srednekolymsk</option>
                                                <option value="Asia/Taipei">(UTC + 08:00) Taipei</option>
                                                <option value="Asia/Tashkent">(UTC + 05:00) Tashkent</option>
                                                <option value="Asia/Tbilisi">(UTC + 04:00) Tbilisi</option>
                                                <option value="Asia/Tehran">(UTC + 03:30) Tehran</option>
                                                <option value="Asia/Thimphu">(UTC + 06:00) Thimphu</option>
                                                <option value="Asia/Tokyo">(UTC + 09:00) Tokyo</option>
                                                <option value="Asia/Ulaanbaatar">(UTC + 08:00) Ulaanbaatar</option>
                                                <option value="Asia/Urumqi">(UTC + 06:00) Urumqi</option>
                                                <option value="Asia/Ust-Nera">(UTC + 10:00) Ust-Nera</option>
                                                <option value="Asia/Vientiane">(UTC + 07:00) Vientiane</option>
                                                <option value="Asia/Vladivostok">(UTC + 10:00) Vladivostok</option>
                                                <option value="Asia/Yakutsk">(UTC + 09:00) Yakutsk</option>
                                                <option value="Asia/Yekaterinburg">(UTC + 05:00) Yekaterinburg</option>
                                                <option value="Asia/Yerevan">(UTC + 04:00) Yerevan</option>
                                            </optgroup>
                                            <optgroup label="Atlantic">
                                                <option value="Atlantic/Azores">(UTC - 01:00) Azores</option>
                                                <option value="Atlantic/Bermuda">(UTC - 04:00) Bermuda</option>
                                                <option value="Atlantic/Canary">(UTC + 00:00) Canary</option>
                                                <option value="Atlantic/Cape_Verde">(UTC - 01:00) Cape Verde</option>
                                                <option value="Atlantic/Faroe">(UTC + 00:00) Faroe</option>
                                                <option value="Atlantic/Madeira">(UTC + 00:00) Madeira</option>
                                                <option value="Atlantic/Reykjavik">(UTC + 00:00) Reykjavik</option>
                                                <option value="Atlantic/South_Georgia">(UTC - 02:00) South Georgia</option>
                                                <option value="Atlantic/St_Helena">(UTC + 00:00) St. Helena</option>
                                                <option value="Atlantic/Stanley">(UTC - 03:00) Stanley</option>
                                            </optgroup>
                                            <optgroup label="Australia">
                                                <option value="Australia/Adelaide">(UTC + 10:30) Adelaide</option>
                                                <option value="Australia/Brisbane">(UTC + 10:00) Brisbane</option>
                                                <option value="Australia/Broken_Hill">(UTC + 10:30) Broken Hill</option>
                                                <option value="Australia/Currie">(UTC + 11:00) Currie</option>
                                                <option value="Australia/Darwin">(UTC + 09:30) Darwin</option>
                                                <option value="Australia/Eucla">(UTC + 08:45) Eucla</option>
                                                <option value="Australia/Hobart">(UTC + 11:00) Hobart</option>
                                                <option value="Australia/Lindeman">(UTC + 10:00) Lindeman</option>
                                                <option value="Australia/Lord_Howe">(UTC + 11:00) Lord Howe</option>
                                                <option value="Australia/Melbourne">(UTC + 11:00) Melbourne</option>
                                                <option value="Australia/Perth">(UTC + 08:00) Perth</option>
                                                <option value="Australia/Sydney">(UTC + 11:00) Sydney</option>
                                            </optgroup>
                                            <optgroup label="Europe">
                                                <option value="Europe/Amsterdam">(UTC + 01:00) Amsterdam</option>
                                                <option value="Europe/Andorra">(UTC + 01:00) Andorra</option>
                                                <option value="Europe/Astrakhan">(UTC + 04:00) Astrakhan</option>
                                                <option value="Europe/Athens">(UTC + 02:00) Athens</option>
                                                <option value="Europe/Belgrade">(UTC + 01:00) Belgrade</option>
                                                <option value="Europe/Berlin">(UTC + 01:00) Berlin</option>
                                                <option value="Europe/Bratislava">(UTC + 01:00) Bratislava</option>
                                                <option value="Europe/Brussels">(UTC + 01:00) Brussels</option>
                                                <option value="Europe/Bucharest">(UTC + 02:00) Bucharest</option>
                                                <option value="Europe/Budapest">(UTC + 01:00) Budapest</option>
                                                <option value="Europe/Busingen">(UTC + 01:00) Busingen</option>
                                                <option value="Europe/Chisinau">(UTC + 02:00) Chisinau</option>
                                                <option value="Europe/Copenhagen">(UTC + 01:00) Copenhagen</option>
                                                <option value="Europe/Dublin">(UTC + 00:00) Dublin</option>
                                                <option value="Europe/Gibraltar">(UTC + 01:00) Gibraltar</option>
                                                <option value="Europe/Guernsey">(UTC + 00:00) Guernsey</option>
                                                <option value="Europe/Helsinki">(UTC + 02:00) Helsinki</option>
                                                <option value="Europe/Isle_of_Man">(UTC + 00:00) Isle of Man</option>
                                                <option value="Europe/Istanbul">(UTC + 02:00) Istanbul</option>
                                                <option value="Europe/Jersey">(UTC + 00:00) Jersey</option>
                                                <option value="Europe/Kaliningrad">(UTC + 02:00) Kaliningrad</option>
                                                <option value="Europe/Kiev">(UTC + 02:00) Kiev</option>
                                                <option value="Europe/Lisbon">(UTC + 00:00) Lisbon</option>
                                                <option value="Europe/Ljubljana">(UTC + 01:00) Ljubljana</option>
                                                <option value="Europe/London">(UTC + 00:00) London</option>
                                                <option value="Europe/Luxembourg">(UTC + 01:00) Luxembourg</option>
                                                <option value="Europe/Madrid">(UTC + 01:00) Madrid</option>
                                                <option value="Europe/Malta">(UTC + 01:00) Malta</option>
                                                <option value="Europe/Mariehamn">(UTC + 02:00) Mariehamn</option>
                                                <option value="Europe/Minsk">(UTC + 03:00) Minsk</option>
                                                <option value="Europe/Monaco">(UTC + 01:00) Monaco</option>
                                                <option value="Europe/Moscow">(UTC + 03:00) Moscow</option>
                                                <option value="Europe/Oslo">(UTC + 01:00) Oslo</option>
                                                <option value="Europe/Paris">(UTC + 01:00) Paris</option>
                                                <option value="Europe/Podgorica">(UTC + 01:00) Podgorica</option>
                                                <option value="Europe/Prague">(UTC + 01:00) Prague</option>
                                                <option value="Europe/Riga">(UTC + 02:00) Riga</option>
                                                <option value="Europe/Rome">(UTC + 01:00) Rome</option>
                                                <option value="Europe/Samara">(UTC + 04:00) Samara</option>
                                                <option value="Europe/San_Marino">(UTC + 01:00) San Marino</option>
                                                <option value="Europe/Sarajevo">(UTC + 01:00) Sarajevo</option>
                                                <option value="Europe/Simferopol">(UTC + 03:00) Simferopol</option>
                                                <option value="Europe/Skopje">(UTC + 01:00) Skopje</option>
                                                <option value="Europe/Sofia">(UTC + 02:00) Sofia</option>
                                                <option value="Europe/Stockholm">(UTC + 01:00) Stockholm</option>
                                                <option value="Europe/Tallinn">(UTC + 02:00) Tallinn</option>
                                                <option value="Europe/Tirane">(UTC + 01:00) Tirane</option>
                                                <option value="Europe/Ulyanovsk">(UTC + 04:00) Ulyanovsk</option>
                                                <option value="Europe/Uzhgorod">(UTC + 02:00) Uzhgorod</option>
                                                <option value="Europe/Vaduz">(UTC + 01:00) Vaduz</option>
                                                <option value="Europe/Vatican">(UTC + 01:00) Vatican</option>
                                                <option value="Europe/Vienna">(UTC + 01:00) Vienna</option>
                                                <option value="Europe/Vilnius">(UTC + 02:00) Vilnius</option>
                                                <option value="Europe/Volgograd">(UTC + 03:00) Volgograd</option>
                                                <option value="Europe/Warsaw">(UTC + 01:00) Warsaw</option>
                                                <option value="Europe/Zagreb">(UTC + 01:00) Zagreb</option>
                                                <option value="Europe/Zaporozhye">(UTC + 02:00) Zaporozhye</option>
                                                <option value="Europe/Zurich">(UTC + 01:00) Zurich</option>
                                            </optgroup>
                                            <optgroup label="Indian">
                                                <option value="Indian/Antananarivo">(UTC + 03:00) Antananarivo</option>
                                                <option value="Indian/Chagos">(UTC + 06:00) Chagos</option>
                                                <option value="Indian/Christmas">(UTC + 07:00) Christmas</option>
                                                <option value="Indian/Cocos">(UTC + 06:30) Cocos</option>
                                                <option value="Indian/Comoro">(UTC + 03:00) Comoro</option>
                                                <option value="Indian/Kerguelen">(UTC + 05:00) Kerguelen</option>
                                                <option value="Indian/Mahe">(UTC + 04:00) Mahe</option>
                                                <option value="Indian/Maldives">(UTC + 05:00) Maldives</option>
                                                <option value="Indian/Mauritius">(UTC + 04:00) Mauritius</option>
                                                <option value="Indian/Mayotte">(UTC + 03:00) Mayotte</option>
                                                <option value="Indian/Reunion">(UTC + 04:00) Reunion</option>
                                            </optgroup>
                                            <optgroup label="Pacific">
                                                <option value="Pacific/Apia">(UTC + 14:00) Apia</option>
                                                <option value="Pacific/Auckland">(UTC + 13:00) Auckland</option>
                                                <option value="Pacific/Bougainville">(UTC + 11:00) Bougainville</option>
                                                <option value="Pacific/Chatham">(UTC + 13:45) Chatham</option>
                                                <option value="Pacific/Chuuk">(UTC + 10:00) Chuuk</option>
                                                <option value="Pacific/Easter">(UTC - 05:00) Easter</option>
                                                <option value="Pacific/Efate">(UTC + 11:00) Efate</option>
                                                <option value="Pacific/Enderbury">(UTC + 13:00) Enderbury</option>
                                                <option value="Pacific/Fakaofo">(UTC + 13:00) Fakaofo</option>
                                                <option value="Pacific/Fiji">(UTC + 12:00) Fiji</option>
                                                <option value="Pacific/Funafuti">(UTC + 12:00) Funafuti</option>
                                                <option value="Pacific/Galapagos">(UTC - 06:00) Galapagos</option>
                                                <option value="Pacific/Gambier">(UTC - 09:00) Gambier</option>
                                                <option value="Pacific/Guadalcanal">(UTC + 11:00) Guadalcanal</option>
                                                <option value="Pacific/Guam">(UTC + 10:00) Guam</option>
                                                <option value="Pacific/Honolulu">(UTC - 10:00) Honolulu</option>
                                                <option value="Pacific/Johnston">(UTC - 10:00) Johnston</option>
                                                <option value="Pacific/Kiritimati">(UTC + 14:00) Kiritimati</option>
                                                <option value="Pacific/Kosrae">(UTC + 11:00) Kosrae</option>
                                                <option value="Pacific/Kwajalein">(UTC + 12:00) Kwajalein</option>
                                                <option value="Pacific/Majuro">(UTC + 12:00) Majuro</option>
                                                <option value="Pacific/Marquesas">(UTC - 09:30) Marquesas</option>
                                                <option value="Pacific/Midway">(UTC - 11:00) Midway</option>
                                                <option value="Pacific/Nauru">(UTC + 12:00) Nauru</option>
                                                <option value="Pacific/Niue">(UTC - 11:00) Niue</option>
                                                <option value="Pacific/Norfolk">(UTC + 11:00) Norfolk</option>
                                                <option value="Pacific/Noumea">(UTC + 11:00) Noumea</option>
                                                <option value="Pacific/Pago_Pago">(UTC - 11:00) Pago Pago</option>
                                                <option value="Pacific/Palau">(UTC + 09:00) Palau</option>
                                                <option value="Pacific/Pitcairn">(UTC - 08:00) Pitcairn</option>
                                                <option value="Pacific/Pohnpei">(UTC + 11:00) Pohnpei</option>
                                                <option value="Pacific/Port_Moresby">(UTC + 10:00) Port Moresby</option>
                                                <option value="Pacific/Rarotonga">(UTC - 10:00) Rarotonga</option>
                                                <option value="Pacific/Saipan">(UTC + 10:00) Saipan</option>
                                                <option value="Pacific/Tahiti">(UTC - 10:00) Tahiti</option>
                                                <option value="Pacific/Tarawa">(UTC + 12:00) Tarawa</option>
                                                <option value="Pacific/Tongatapu">(UTC + 13:00) Tongatapu</option>
                                                <option value="Pacific/Wake">(UTC + 12:00) Wake</option>
                                                <option value="Pacific/Wallis">(UTC + 12:00) Wallis</option>
                                            </optgroup>
                                            <optgroup label="UTC">
                                                <option value="UTC" selected>UTC</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="datatrans-time-step">
                                        <div class="datatrans-columnizer">
                                            <div class="datatrans-time-screen" id="datatrans_time_screen">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="d-flex justify-content-between  mt-4 btn-pagenation pt-4">
                                    <button class="btn btn-prev btn-back-bgcolor">
                                        <span class="align-middle d-flex">BACK</span>
                                    </button>
                                    <div id="pagination-container"></div>
                                </div>
                            </div>
                            <div id="service-detail" class="content">
                                <div class="content-header">
                                    <span class="content-header-explain">
                                        You have selected a booking for a neck or <b class="service__name"></b> at <b class="service__time"></b> . The price for the service is <b>CHF</b><b class="service__price"></b> .
                                        <br>Please enter your details in the form below to proceed with the booking.
                                    </span>
                                </div>
                                <form>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label class="form-label service-label-color" for="client_name">Surname</label>
                                            <input type="text" id="client_name" name="client_name" class="form-control" placeholder="" required/>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="form-label service-label-color" for="phone_num">Phone</label>
                                            <input type="tel" name="phone_num" id="phone_num" class="form-control phone_num" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="form-label service-label-color" for="client_email">E-mail</label>
                                            <input type="email" name="client_email" id="client_email" class="form-control" placeholder="" required/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label class="form-label service-label-color" for="client_comment">Comment</label>
                                            <textarea type="text" id="client_comment" name="client_comment" class="form-control" placeholder="" required></textarea>
                                        </div>
                                    </div>
                                </form>
                                <div class="d-flex justify-content-between btn-pagenation pt-4">
                                    <button class="btn btn-next-bgcolor btn-prev">
                                        <span class="align-middle d-flex">BACK</span>
                                    </button>
                                    
                                    <button class="btn btn-next-bgcolor btn-next">
                                        <span class="align-middle d-flex">BOOK</span>
                                    </button>
                                    
                                </div>
                            </div>
                            
                                    <div id="service-payment" class="content">
                                        <div class="content-header">
                                            <span class="content-header-explain">
                                                Please let us know how you would like to pay:
                                            </span>
                                        </div>
                                        <form>
                                            <div class="row">
                                                <div class="datatrans-payment-nav">
                                                    <div class="datatrans-box datatrans-list">
                                                        <label>
                                                            <input type="radio" class="datatrans-payment" name="payment_method_datatrans" id="offline_payment" value="offline" checked>
                                                            <span>I will pay on the spot</span>
                                                        </label>
                                                    </div>
                                                    <div class="datatrans-box datatrans-list">
                                                        <label>
                                                            <input type="radio" class="datatrans-payment" name="payment_method_datatrans" id="online_payment" value="online">
                                                            <span>
                                                                I will now pay with Online
                                                            </span>
                                                            
                                                            <div class="paymentForm_payment_page" style="display: none;">
                                                                  <button type="button" class="btn btn-primary mt-2" id="go_pay_button">
                                                                    Pay
                                                                  </button>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </form>
                                        <div class="d-flex justify-content-between btn-pagenation pt-4">
                                            <button class="btn btn-next-bgcolor btn-prev">
                                                <span class="align-middle d-flex">BACK</span>
                                            </button>
                                            <button class="btn btn-submit btn-next-bgcolor btn_final_submit btn_final_submit_click" data-own_id="{{$id}}">BOOK</button>
                                            {{-- <button class="btn btn-next-bgcolor btn-next">
                                                <span class="align-middle d-flex">BOOK</span>
                                            </button> --}}
                                        </div>
                                    </div>
                                
                            <div id="page-done" class="content">
                                <div class="content-header">
                                    <span class="content-header-explain">
                                        Thanks very much! Your booking is complete.
                                    </span>
                                </div>
                                <form>
                                    <div class="row">
                                        <div class="datatrans-payment-nav">
                                           
                                        </div>
                                    </div>
                                    
                                </form>
                                <div class="d-flex justify-content-between btn-pagenation pt-4">
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /Horizontal Wizard -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
        <script>
            var checkvalue = '@foreach ($orders as $order)"{{$order->service_name}}:{{$order->datatrans_day}}:{{$order->datatrans_time}}",@endforeach';
            console.log(checkvalue);
            var checkvalues = checkvalue.split(',');
        
            var calendar_events = '@foreach ($events as $event)"{{$event->start->dateTime}},{{$event->end->dateTime}}".@endforeach';
        </script>
    
    {{-- Footer --}}

    @include('datatrans::layouts.footer')

    <script>
        $('input[type=radio][name=payment_method_datatrans]').change(function() {
            if (this.value == 'offline') {
                $('.paymentForm_payment_page').css('display', 'none');
                $('.btn_final_submit_click').css('display', 'block');
            }
            else if (this.value == 'online') {
                $('.paymentForm_payment_page').css('display', 'block');
                $('.btn_final_submit_click').css('display', 'none');
            }
        });        
    </script>
   
     
    {{-- End Footer --}}

    {{-- Page --}}

    {{-- End Page --}}
</body>
<!-- END: Body-->
