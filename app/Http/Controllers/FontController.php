<?php

namespace SAC\Http\Controllers;

use Illuminate\Http\Request;
use SAC\Monedas;

use SAC\Http\Requests;
use SAC\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;

class FontController extends Controller
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->middleware('auth');
        $this->middleware('supervisor',['only' => ['Supervisor']]);
        $this->middleware('administrador',['only' => ['Administrador']]);
        $this->middleware('residente',['only' => ['Residente']]);
        $this->middleware('contador',['only' => ['Contador']]);
    }


    public function Home()
    {
        if ($this->auth->user()->rol_Usuario == 'administrador') {
            return view('indexAdministrador');
        }elseif ($this->auth->user()->rol_Usuario == 'supervisor') {
            return view('indexSupervisor');
        }elseif ($this->auth->user()->rol_Usuario == 'residente') {
            return view('indexResidente');
        }elseif ($this->auth->user()->rol_Usuario == 'contador') {
            return view('indexContador');
        }
    }

	public function Residente()
    {
        return view('indexResidente');
    }
	
	public function Contador()
    {
        return view('indexContador');
    }
	
	public function Supervisor()
    {
        return view('indexSupervisor');
    }
	
	public function Administrador()
    {
     // return view('monedas');
        $j1 = '[{"country":"Afghanistan","name":"Afghan afghani","symbol":"؋","cc":"AFN"},
{"country":"Albania","name":"Albanian lek","symbol":"L","cc":"ALL"},
{"country":"Algeria","name":"Algerian dinar","symbol":"د.ج","cc":"DZD"},
{"country":"Andorra","name":"Euro","symbol":"€","cc":"EUR"},
{"country":"Angola","name":"Angolan kwanza","symbol":"Kz","cc":"AOA"},
{"country":"Antigua and Barbuda","name":"East Caribbean dollar","symbol":"EC$","cc":"XCD"},
{"country":"Argentina","name":"Argentine peso","symbol":"$","cc":"ARS"},
{"country":"Aruba","name":"Aruban florin","symbol":"ƒ","cc":"AWG"},
{"country":"Australia","name":"Australian dollar","symbol":"A$","cc":"AUD"},
{"country":"Austria","name":"Euro","symbol":"€","cc":"EUR"},
{"country":"Azerbaijan","name":"Azerbaijani manat","symbol":"ман","cc":"AZN"},
{"country":"Bahamas","name":"Bahamian dollar","symbol":"B$","cc":"BSD"},
{"country":"Bahrain","name":"Bahraini dinar","symbol":".د.ب","cc":"BHD"},
{"country":"Bangladesh","name":"Bangladeshi taka","symbol":"৳","cc":"BDT"},
{"country":"Barbados","name":"Barbadian dollar","symbol":"Bds$","cc":"BBD"},
{"country":"Belarus","name":"Belarusian ruble","symbol":"Br","cc":"BYR"},
{"country":"Belgium","name":"Euro","symbol":"€","cc":"EUR"},
{"country":"Belize","name":"Belizean dollar","symbol":"BZ$","cc":"BZD"},
{"country":"Benin","name":"West African CFA franc","symbol":"CFA","cc":"XOF"},
{"country":"Bermuda","name":"Bermudian dollar","symbol":"BD$","cc":"BMD"},
{"country":"Bhutan","name":"Bhutanese ngultrum","symbol":"Nu.","cc":"BTN"},
{"country":"Bolivia","name":"Bolivian boliviano","symbol":"Bs.","cc":"BOB"},
{"country":"Bonaire","name":"US dollar","symbol":"US$","cc":"USD"},
{"country":"Bosnia and Herzegovina","name":"Bosnia and Herzegovina convertible mark","symbol":"KM","cc":"BAM"},
{"country":"Botswana","name":"Botswana pula","symbol":"P","cc":"BWP"},
{"country":"Brazil","name":"Brazilian real","symbol":"R$","cc":"BRL"},
{"country":"British Virgin Islands","name":"US dollar","symbol":"US$","cc":"USD"},
{"country":"Brunei","name":"Brunei dollar","symbol":"B$","cc":"BND"},
{"country":"Bulgaria","name":"Bulgarian lev","symbol":"лв","cc":"BGN"},
{"country":"Burkina Faso","name":"West African CFA franc","symbol":"CFA","cc":"XOF"},
{"country":"Burma","name":"Burmese kyat","symbol":"K","cc":"MMK"},
{"country":"Burundi","name":"Burundian franc","symbol":"FBu","cc":"BIF"},
{"country":"Cambodia","name":"Cambodian riel","symbol":"៛","cc":"KHR"},
{"country":"Cameroon","name":"Central African CFA franc","symbol":"CFA","cc":"XAF"},
{"country":"Canada","name":"Canadian dollar","symbol":"C$","cc":"CAD"},
{"country":"Cape Verde","name":"Cape Verdean escudo","symbol":"Esc","cc":"CVE"},
{"country":"Cayman Islands","name":"Cayman Islands dollar","symbol":"KY$","cc":"KYD"},
{"country":"Central African Republic","name":"Central African CFA franc","symbol":"CFA","cc":"XAF"},
{"country":"Chad","name":"Central African CFA franc","symbol":"CFA","cc":"XAF"},
{"country":"Chile","name":"Chilean peso","symbol":"$","cc":"CLP"},
{"country":"China, People’s Republic of","name":"Chinese renminbi","symbol":"¥","cc":"CNY"},
{"country":"Cocos Islands","name":"Australian dollar","symbol":"A$","cc":"AUD"},
{"country":"Colombia","name":"Colombian peso","symbol":"$","cc":"COP"},
{"country":"Comoros","name":"Comorian franc","symbol":"CF","cc":"KMF"},
{"country":"Congo, Democratic Republic of","name":"Congolese franc","symbol":"FC","cc":"CDF"},
{"country":"Congo, Republic of the","name":"Central African CFA franc","symbol":"CFA","cc":"XAF"},
{"country":"Cook Islands","name":"New Zealand dollar","symbol":"NZ$","cc":"NZD"},
{"country":"Costa Rica","name":"Costa Rican colón","symbol":"₡","cc":"CRC"},
{"country":"Croatia","name":"Croatian kuna","symbol":"kn","cc":"HRK"},
{"country":"Cuba","name":"Cuban peso","symbol":"₱","cc":"CUC"},
{"country":"Curaçao","name":"Netherlands Antilles guilder","symbol":"ƒ","cc":"ANG"},
{"country":"Cyprus","name":"Euro","symbol":"€","cc":"EUR"},
{"country":"Czech Republic","name":"Czech koruna","symbol":"Kč","cc":"CZK"},
{"country":"Côte d’Iviore","name":"West African CFA franc","symbol":"CFA","cc":"XOF"},
{"country":"Denmark","name":"Danish krone","symbol":"kr","cc":"DKK"},
{"country":"Djibouti","name":"Djiboutian franc","symbol":"Fdj","cc":"DJF"},
{"country":"Dominica","name":"East Caribbean dollar","symbol":"EC$","cc":"XCD"},
{"country":"Dominican Republic","name":"Dominican peso","symbol":"RD$","cc":"DOP"},
{"country":"East Timor","name":"US dollar","symbol":"US$","cc":"USD"},
{"country":"Ecuador","name":"US dollar","symbol":"$","cc":"USD"},
{"country":"Egypt","name":"Egyptian pound","symbol":"E£","cc":"EGP"},
{"country":"El Salvador","name":"Salvadoran colón","symbol":"₡","cc":"SVC"},
{"country":"Equatorial Guinea","name":"Central African CFA franc","symbol":"CFA","cc":"XAF"},
{"country":"Eritrea","name":"Eritrean nakfa","symbol":"Nfa","cc":"ERN"},
{"country":"Estonia","name":"Euro","symbol":"€","cc":"EUR"},
{"country":"Ethiopia","name":"Ethiopian birr","symbol":"Br","cc":"ETB"},
{"country":"Falkland Islands","name":"Falkland Islands pound","symbol":"FK£","cc":"FKP"},
{"country":"Fiji","name":"Fijian dollar","symbol":"FJ$","cc":"FJD"},
{"country":"Finland","name":"Euro","symbol":"€","cc":"EUR"},
{"country":"France","name":"Euro","symbol":"€","cc":"EUR"},
{"country":"French Polynesia","name":"CFP franc","symbol":"F","cc":"XPF"},
{"country":"Gabon","name":"Central African CFA franc","symbol":"CFA","cc":"XAF"},
{"country":"Gambia","name":"Gambian dalasi","symbol":"D","cc":"GMD"},
{"country":"Georgia","name":"Georgian lari","symbol":"ლ","cc":"GEL"},
{"country":"Germany","name":"Euro","symbol":"€","cc":"EUR"},
{"country":"Ghana","name":"Ghanian cedi","symbol":"₵","cc":"GHS"},
{"country":"Gibraltar","name":"Gibraltar pound","symbol":"£","cc":"GIP"},
{"country":"Greece","name":"Euro","symbol":"€","cc":"EUR"},
{"country":"Grenada","name":"East Caribbean dollar","symbol":"EC$","cc":"XCD"},
{"country":"Guatemala","name":"Guatemalan quetzal","symbol":"Q","cc":"GTQ"},
{"country":"Guernsey","name":"British pound","symbol":"£","cc":"GBP"},
{"country":"Guinea","name":"Guinean franc","symbol":"FG","cc":"GNF"},
{"country":"Guinea-Bissau","name":"West African CFA franc","symbol":"CFA","cc":"XOF"},
{"country":"Guyana","name":"Guyanese dollar","symbol":"GY$","cc":"GYD"},
{"country":"Haiti","name":"Haitian gourde","symbol":"G","cc":"HTG"},
{"country":"Honduras","name":"Honduran lempira","symbol":"L","cc":"HNL"},
{"country":"Hong Kong","name":"Hong Kong dollar","symbol":"HK$","cc":"HKD"},
{"country":"Hungary","name":"Hungarian forint","symbol":"Ft","cc":"HUF"},
{"country":"Iceland","name":"Icelandic króna","symbol":"kr","cc":"ISK"},
{"country":"Indonesia","name":"Indonesian rupiah","symbol":"Rp","cc":"IDR"},
{"country":"Iran","name":"Iranian rial","symbol":"﷼","cc":"IRR"},
{"country":"Iraq","name":"Iraqi dinar","symbol":"ع.د","cc":"IQD"},
{"country":"Ireland","name":"Euro","symbol":"€","cc":"EUR"},
{"country":"Isle of Man","name":"British pound","symbol":"£","cc":"GBP"},
{"country":"Israel","name":"Israeli new sheqel","symbol":"₪","cc":"ILS"},
{"country":"Italy","name":"Euro","symbol":"€","cc":"EUR"},
{"country":"Jamaica","name":"Jamaican dollar","symbol":"J$","cc":"JMD"},
{"country":"Japan","name":"Japanese yen","symbol":"¥","cc":"JPY"},
{"country":"Jersey","name":"British pound","symbol":"£","cc":"GBP"},
{"country":"Jordan","name":"Jordanian dinar","symbol":"د.ا","cc":"JOD"},
{"country":"Kazakhstan","name":"Kazakhstani tenge","symbol":"₸","cc":"KZT"},
{"country":"Kenya","name":"Kenyan shilling","symbol":"KSh","cc":"KES"},
{"country":"Korea, North","name":"North Korean won","symbol":"₩","cc":"KPW"},
{"country":"Korea, South","name":"South Korean won","symbol":"₩","cc":"KPW"},
{"country":"Kosovo","name":"Euro","symbol":"€","cc":"EUR"},
{"country":"Kuwait","name":"Kuwaiti dinar","symbol":"د.ك","cc":"KWD"},
{"country":"Kyrgyzstan","name":"Kyrgyzstani som","symbol":"лв","cc":"KGS"},
{"country":"Laos","name":"Lao kip","symbol":"₭","cc":"LAK"},
{"country":"Latvia","name":"Latvian lats","symbol":"Ls","cc":"LVL"},
{"country":"Lebanon","name":"Lebanese pound","symbol":"L£","cc":"LBP"},
{"country":"Lesotho","name":"Lesotho loti","symbol":"L","cc":"LSL"},
{"country":"Liberia","name":"Liberian dollar","symbol":"L$","cc":"LRD"},
{"country":"Libya","name":"Libyan dinar","symbol":"ل.د","cc":"LD"},
{"country":"Liechtenstein","name":"Swiss franc","symbol":"Fr","cc":"CHF"},
{"country":"Lithuania","name":"Lithuanian litas","symbol":"Lt","cc":"LTL"},
{"country":"Luxembourg","name":"Euro","symbol":"€","cc":"EUR"},
{"country":"Macau","name":"Macanese pataca","symbol":"P","cc":"MOP"},
{"country":"Macedonia, Republic of","name":"Macedonian denar","symbol":"ден","cc":"MKD"},
{"country":"Madagascar","name":"Malagasy ariary","symbol":"Ar","cc":"MGA"},
{"country":"Malawi","name":"Malawian kwacha","symbol":"MK","cc":"MWK"},
{"country":"Malaysia","name":"Malaysian ringgit","symbol":"RM","cc":"MYR"},
{"country":"Maldives","name":"Maldivian rufiyaa","symbol":"Rf","cc":"MVR"},
{"country":"Mali","name":"West African CFA franc","symbol":"CFA","cc":"XOF"},
{"country":"Malta","name":"Euro","symbol":"€","cc":"EUR"},
{"country":"Marshall Islands","name":"US dollar","symbol":"$","cc":"USD"},
{"country":"Mauritania","name":"Mauritanian ouguiya","symbol":"UM","cc":"MRO"},
{"country":"Mauritius","name":"Mauritian rupee","symbol":"Ɍs","cc":"MUR"},
{"country":"Mexico","name":"Mexican peso","symbol":"$","cc":"MXN"},
{"country":"Micronesia","name":"US dollar","symbol":"$","cc":"USD"},
{"country":"Moldova","name":"Moldovan leu","symbol":"L","cc":"MDL"},
{"country":"Mongolia","name":"Mongolian tugrik","symbol":"₮","cc":"MNT"},
{"country":"Montenegro","name":"Euro","symbol":"€","cc":"EUR"},
{"country":"Montserrat","name":"East Caribbean dollar","symbol":"EC$","cc":"XCD"},
{"country":"Morocco","name":"Moroccan dirham","symbol":"د.م.","cc":"MAD"},
{"country":"Mozambique","name":"Mozambican metical","symbol":"MT","cc":"MZN"},
{"country":"Namibia","name":"Namibian dollar","symbol":"N$","cc":"NAD"},
{"country":"Nauru","name":"Australian dollar","symbol":"A$","cc":"AUD"},
{"country":"Nepal","name":"Nepalese rupee","symbol":"NɌs","cc":"NPR"},
{"country":"Netherlands","name":"Euro","symbol":"€","cc":"EUR"},
{"country":"Netherlands Antilles","name":"Netherlands Antilles guilder","symbol":"ƒ","cc":"ANG"},
{"country":"New Caledonia","name":"CFP franc","symbol":"F","cc":"XPF"},
{"country":"New Zealand","name":"New Zealand dollar","symbol":"NZ$","cc":"NZD"},
{"country":"Nicaragua","name":"Nicaraguan córdoba","symbol":"C$","cc":"NIO"},
{"country":"Niger","name":"West African CFA franc","symbol":"CFA","cc":"XOF"},
{"country":"Nigeria","name":"Nigerian naira","symbol":"₦","cc":"NGN"},
{"country":"Niue","name":"New Zealand dollar","symbol":"NZ$","cc":"NZD"},
{"country":"Norway","name":"Norwegian krone","symbol":"kr","cc":"NOK"},
{"country":"Oman","name":"Omani rial","symbol":"ر.ع.","cc":"OMR"},
{"country":"Pakistan","name":"Pakistani rupee","symbol":"Ɍs","cc":"PKR"},
{"country":"Palau","name":"US dollar","symbol":"$","cc":"USD"},
{"country":"Panama","name":"Panamanian balboa","symbol":"B/.","cc":"PAB"},
{"country":"Papua New Guinea","name":"Papua New Guinea kina","symbol":"K","cc":"PGK"},
{"country":"Paraguay","name":"Paraguayan guarani","symbol":"₲","cc":"PYG"},
{"country":"Peru","name":"Peruvian nuevo sol","symbol":"S/.","cc":"PEN"},
{"country":"Philippines","name":"Philippine peso","symbol":"₱","cc":"PHP"},
{"country":"Pitcairn Islands","name":"New Zealand dollar","symbol":"NZ$","cc":"NZD"},
{"country":"Poland","name":"Polish zloty","symbol":"zł","cc":"PLN"},
{"country":"Portugal","name":"Euro","symbol":"€","cc":"EUR"},
{"country":"Qatar","name":"Qatari riyal","symbol":"ر.ق","cc":"QAR"},
{"country":"Romania","name":"Romanian leu","symbol":"L","cc":"RON"},
{"country":"Russia","name":"Russian ruble","symbol":"руб","cc":"RUB"},
{"country":"Rwanda","name":"Rwandan franc","symbol":"RF","cc":"RWF"},
{"country":"Saba","name":"US dollar","symbol":"$","cc":"USD"},
{"country":"Samoa","name":"Samoan tālā","symbol":"T","cc":"WST"},
{"country":"San Marino","name":"Euro","symbol":"€","cc":"EUR"},
{"country":"Saudi Arabia","name":"Saudi riyal","symbol":"ر.س","cc":"SAR"},
{"country":"Senegal","name":"West African CFA franc","symbol":"CFA","cc":"XOF"},
{"country":"Serbia","name":"Serbian dinar","symbol":"Дин.","cc":"RSD"},
{"country":"Seychelles","name":"Seychellois rupee","symbol":"Ɍs","cc":"SCR"},
{"country":"Sierra Leone","name":"Sierra Leonean leone","symbol":"Le","cc":"SLL"},
{"country":"Singapore","name":"Singapore dollar","symbol":"S$","cc":"SGD"},
{"country":"Slovakia","name":"Euro","symbol":"€","cc":"EUR"},
{"country":"Slovenia","name":"Euro","symbol":"€","cc":"EUR"},
{"country":"Solomon Islands","name":"Solomon Islands dollar","symbol":"SI$","cc":"SBD"},
{"country":"Somalia","name":"Somali shilling","symbol":"So. Sh.","cc":"SOS"},
{"country":"Somaliland","name":"Somaliland shilling","symbol":"Sl. Sh.","cc":"None"},
{"country":"South Africa","name":"South African rand","symbol":"R","cc":"ZAR"},
{"country":"South Georgia/South Sandwich Islands","name":"British pound","symbol":"£","cc":"GBP"},
{"country":"Spain","name":"Euro","symbol":"€","cc":"EUR"},
{"country":"Sri Lanka","name":"Sri Lankan rupee","symbol":"Ɍs","cc":"LKR"},
{"country":"St. Helena","name":"St. Helena pound","symbol":"£","cc":"SHP"},
{"country":"St. Kitts and Nevis","name":"East Caribbean dollar","symbol":"EC$","cc":"XCD"},
{"country":"St. Lucia","name":"East Caribbean dollar","symbol":"EC$","cc":"XCD"},
{"country":"St. Vincent and the Grenadines","name":"East Caribbean dollar","symbol":"EC$","cc":"XCD"},
{"country":"Sudan","name":"Sudanese pound","symbol":"£Sd","cc":"SDG"},
{"country":"Suriname","name":"Surinamese dollar","symbol":"$","cc":"SRD"},
{"country":"Swaziland","name":"Swazi lilangeni","symbol":"L","cc":"SZL"},
{"country":"Sweden","name":"Swedish krona","symbol":"kr","cc":"SEK"},
{"country":"Switzerland","name":"Swiss franc","symbol":"Fr","cc":"CHF"},
{"country":"Syria","name":"Syrian pound","symbol":"S£","cc":"SYP"},
{"country":"São Tomé and Príncipe","name":"São Tomé and Príncipe dobra","symbol":"Db","cc":"STD"},
{"country":"Taiwan (Republic of China)","name":"New Taiwan dollar","symbol":"NT$","cc":"TWD"},
{"country":"Tajikistan","name":"Tajikistani somoni","symbol":"SM","cc":"TJS"},
{"country":"Tanzania","name":"Tanzanian shilling","symbol":"TSh","cc":"TZS"},
{"country":"Thailand","name":"Thai baht","symbol":"฿","cc":"THB"},
{"country":"Togo","name":"West African CFA franc","symbol":"CFA","cc":"XOF"},
{"country":"Tonga","name":"Tongan pa’anga","symbol":"T$","cc":"TOP"},
{"country":"Trinidad and Tobago","name":"Trinidad and Tobago dollar","symbol":"TT$","cc":"TTD"},
{"country":"Tunisia","name":"Tunisian dinar","symbol":"د.ت","cc":"TND"},
{"country":"Turkey","name":"Turkish lira","symbol":"TL","cc":"TRY"},
{"country":"Turkmenistan","name":"Turkmenistani manat","symbol":"m","cc":"TMT"},
{"country":"Turks and Caicos Islands","name":"US dollar","symbol":"$","cc":"USD"},
{"country":"Tuvalu","name":"Australian dollar","symbol":"A$","cc":"AUD"},
{"country":"Uganda","name":"Ugandan shilling","symbol":"USh","cc":"UGX"},
{"country":"Ukraine","name":"Ukrainian hryvnia","symbol":"₴","cc":"UAH"},
{"country":"United Arab Emirates","name":"United Arab Emirates dirham","symbol":"د.إ","cc":"AED"},
{"country":"United Kingdom","name":"British pound","symbol":"£","cc":"GBP"},
{"country":"United States","name":"US dollar","symbol":"US$","cc":"USD"},
{"country":"Uruguay","name":"Uruguayan peso","symbol":"$U","cc":"UYU"},
{"country":"Uzbekistan","name":"Uzbekistani som","symbol":"лв","cc":"UZS"},
{"country":"Vanuatu","name":"Vanuatu vatu","symbol":"VT","cc":"VUV"},
{"country":"Vatican City","name":"Euro","symbol":"€","cc":"EUR"},
{"country":"Venezuela","name":"Venezuelan bolivar","symbol":"Bs. F","cc":"VEF"},
{"country":"Vietnam","name":"Vietnamese dong","symbol":"₫","cc":"VND"},
{"country":"Wallis and Futuna","name":"CFP franc","symbol":"F","cc":"XPF"},
{"country":"Yemen","name":"Yemeni rial","symbol":"﷼","cc":"YER"},
{"country":"Zambia","name":"Zambian kwacha","symbol":"ZK","cc":"ZMK"},
{"country":"Zimbabwe","name":"Zimbabwean dollar","symbol":"Z$","cc":"ZWL"}]';


        $json1 = json_decode($j1); 

      /*foreach ($json1 as $key) {
          $moneda = new Monedas(); 
          $moneda->country = $key->country;
          $moneda->name = $key->name;
          $moneda->symbol = $key->symbol;
          $moneda->cc = $key->cc;
          $moneda->save();
        }*/
        return view('indexAdministrador');
    }
  
}
