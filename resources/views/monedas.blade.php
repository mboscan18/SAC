@extends('layouts.principal')
  @section('page-title', 'Contactos Bancarios')

@section('titulo')  
    <h3 class="page-header"><i class="fa fa-credit-card"></i> Contactos Bancarios</h3>
@endsection
@section('lugar')
   <li><i class="fa fa-credit-card"></i> Contactos Bancarios</li>
@endsection
@section('accion')
@endsection

  @section('content')

    <p>This list contains most of the currencies being used around the world. Some countries use multiple currencies; in those cases, I listed the predominant currency.</p>
    <p>Where the symbol contains alphabetic and non-alphabetic characters, the codes in the final three columns (in most cases) represent the non-alphabetic part; for example, the East Caribbean dollar's symbol is EC&#36;. The HTML codes are for the &#36;, not the EC, since these are standard keyboard characters. If you want the HTML codes for the alphabetic (Arabic, Cyrillic, etc.) characters, right-click on the page and select "View Source."</p>
    <table border="5" cellspacing="0" cellpadding="4" id="tabla_monedas">
    <thead>  
      <tr>
        <th>Country</th>
        <th>Currency Unit</th>
        <th>Symbol</th>
        <th>ISO Code</th>
        <th>HTML Entity Code</th>
        <th>HTML Decimal Code</th>
        <th>HTML Hex Code</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Afghanistan</td>
        <td>Afghan afghani</td>
        <td>&#1547;</td>
        <td>AFN</td>
        <td>&nbsp;</td>
        <td>&amp;#1547;</td>
        <td>&amp;#x60b;</td>
      </tr>
      <tr>
        <td>Albania</td>
        <td>Albanian lek</td>
        <td>L</td>
        <td>ALL</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Algeria</td>
        <td>Algerian dinar</td>
        <td>&#1583;.&#1580;</td>
        <td>DZD</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Andorra</td>
        <td>Euro</td>
        <td>&euro;</td>
        <td>EUR</td>
        <td>&amp;euro;</td>
        <td>&amp;#8364;</td>
        <td>&amp;#x20ac;</td>
      </tr>
      <tr>
        <td>Angola</td>
        <td>Angolan kwanza</td>
        <td>Kz</td>
        <td>AOA</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Antigua and Barbuda</td>
        <td>East Caribbean dollar</td>
        <td>EC&#36;</td>
        <td>XCD</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>Argentina</td>
        <td>Argentine peso</td>
        <td>$</td>
        <td>ARS</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>Aruba</td>
        <td>Aruban florin</td>
        <td>ƒ</td>
        <td>AWG</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Australia</td>
        <td>Australian dollar</td>
        <td>A$</td>
        <td>AUD</td>
        <td>&nbsp;
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>Austria</td>
        <td>Euro</td>
        <td>€</td>
        <td>EUR</td>
        <td>&amp;euro;</td>
        <td>&amp;#8364;</td>
        <td>&amp;#x20ac;</td>
      </tr>
      <tr>
        <td>Azerbaijan</td>
        <td>Azerbaijani manat</td>
        <td>&#1084;&#1072;&#1085;</td>
        <td>AZN</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Bahamas</td>
        <td>Bahamian dollar</td>
        <td>B$</td>
        <td>BSD</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>Bahrain</td>
        <td>Bahraini dinar</td>
        <td>.&#1583;.&#1576;</td>
        <td>BHD</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Bangladesh</td>
        <td>Bangladeshi taka</td>
        <td>&#2547;</td>
        <td>BDT</td>
        <td>&nbsp;</td>
        <td>&amp;#2547;</td>
        <td>&amp;#x9f3;</td>
      </tr>
      <tr>
        <td>Barbados</td>
        <td>Barbadian dollar</td>
        <td>Bds$</td>
        <td>BBD</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>Belarus</td>
        <td>Belarusian ruble</td>
        <td>Br</td>
        <td>BYR</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Belgium</td>
        <td>Euro</td>
        <td>&euro;</td>
        <td>EUR</td>
        <td>&amp;euro;</td>
        <td>&amp;#8364;</td>
        <td>&amp;#x20ac;</td>
      </tr>
      <tr>
        <td>Belize</td>
        <td>Belizean dollar</td>
        <td>BZ$</td>
        <td>BZD</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Benin</td>
        <td>West African CFA franc</td>
        <td>CFA</td>
        <td>XOF</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Bermuda</td>
        <td>Bermudian dollar</td>
        <td>BD&#36;</td>
        <td>BMD</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>Bhutan</td>
        <td>Bhutanese ngultrum</td>
        <td>Nu.</td>
        <td>BTN</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Bolivia</td>
        <td>Bolivian boliviano</td>
        <td>Bs.</td>
        <td>BOB</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Bonaire</td>
        <td>US dollar</td>
        <td>US&#36;</td>
        <td>USD</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>Bosnia and Herzegovina</td>
        <td>Bosnia and Herzegovina convertible mark</td>
        <td>KM</td>
        <td>BAM</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Botswana</td>
        <td>Botswana pula</td>
        <td>P</td>
        <td>BWP</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
     <tr>
        <td>Brazil</td>
        <td>Brazilian real</td>
        <td>R&#36;</td>
        <td>BRL</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>British Virgin Islands</td>
        <td>US dollar</td>
        <td>US&#36;</td>
        <td>USD</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>Brunei</td>
        <td>Brunei dollar</td>
        <td>B&#36;</td>
        <td>BND</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>Bulgaria</td>
        <td>Bulgarian lev</td>
        <td>&#1083;&#1074;</td>
        <td>BGN</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Burkina Faso</td>
        <td>West African CFA franc</td>
        <td>CFA</td>
        <td>XOF</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Burma</td>
        <td>Burmese kyat</td>
        <td>K</td>
        <td>MMK</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Burundi</td>
        <td>Burundian franc</td>
        <td>FBu</td>
        <td>BIF</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Cambodia</td>
        <td>Cambodian riel</td>
        <td>&#6107;</td>
        <td>KHR</td>
        <td>&nbsp;</td>
        <td>&amp;#6107;</td>
        <td>&amp;#x17db;</td>
      </tr>
      <tr>
        <td>Cameroon</td>
        <td>Central African CFA franc</td>
        <td>CFA</td>
        <td>XAF</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Canada</td>
        <td>Canadian dollar</td>
        <td>C&#36;</td>
        <td>CAD</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>Cape Verde</td>
        <td>Cape Verdean escudo</td>
        <td>Esc</td>
        <td>CVE</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Cayman Islands</td>
        <td>Cayman Islands dollar</td>
        <td>KY&#36;</td>
        <td>KYD</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>Central African Republic</td>
        <td>Central African CFA franc</td>
        <td>CFA</td>
        <td>XAF</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Chad</td>
        <td>Central African CFA franc</td>
        <td>CFA</td>
        <td>XAF</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Chile</td>
        <td>Chilean peso</td>
        <td>&#36;</td>
        <td>CLP</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>China, People’s Republic of</td>
        <td>Chinese renminbi</td>
        <td>&yen;</td>
        <td>CNY</td>
        <td>&amp;yen;</td>     
        <td>&amp;#165;</td>
        <td>&amp;#x00a5;</td>
      </tr>
      <tr>
        <td>Cocos Islands</td>
        <td>Australian dollar</td>
        <td>A&#36;</td>
        <td>AUD</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>Colombia</td>
        <td>Colombian peso</td>
        <td>&#36;</td>
        <td>COP</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>Comoros</td>
        <td>Comorian franc</td>
        <td>CF</td>
        <td>KMF</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Congo, Democratic Republic of</td>
        <td>Congolese franc</td>
        <td>FC</td>
        <td>CDF</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Congo, Republic of the</td>
        <td>Central African CFA franc</td>
        <td>CFA</td>
        <td>XAF</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Cook Islands</td>
        <td>New Zealand dollar</td>
        <td>NZ&#36;</td>
        <td>NZD</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>Costa Rica</td>
        <td>Costa Rican colón</td>
        <td>&#8353;</td>
        <td>CRC</td>
        <td>&nbsp;</td>
        <td>&amp;#8353;</td>
        <td>&amp;#x20a1;</td>
      </tr>
      <tr>
        <td>Côte d’Iviore</td>
        <td>West African CFA franc</td>
        <td>CFA</td>
        <td>XOF</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Croatia</td>
        <td>Croatian kuna</td>
        <td>kn</td>
        <td>HRK</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Cuba</td>
        <td>Cuban peso</td>
        <td>&#8369;</td>
        <td>CUC</td>
        <td>&nbsp;</td>
        <td>&amp;#8369;</td>
        <td>&amp;#x20b1;</td>
      </tr>
      <tr>
        <td>Curaçao</td>
        <td>Netherlands Antilles guilder</td>
        <td>&#131;</td>
        <td>ANG</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Cyprus</td>
        <td>Euro</td>
        <td>&euro;</td>
        <td>EUR</td>
        <td>&amp;euro;</td>
        <td>&amp;#8364;</td>
        <td>&amp;#x20ac;</td>
      </tr>
      <tr>
        <td>Czech Republic</td>
        <td>Czech koruna</td>
        <td>K&#269;</td>
        <td>CZK</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Denmark</td>
        <td>Danish krone</td>
        <td>kr</td>
        <td>DKK</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Djibouti</td>
        <td>Djiboutian franc</td>
        <td>Fdj</td>
        <td>DJF</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Dominica</td>
        <td>East Caribbean dollar</td>
        <td>EC&#36;</td>
        <td>XCD</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>Dominican Republic</td>
        <td>Dominican peso</td>
        <td>RD&#36;</td>
        <td>DOP</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>East Timor</td>
        <td>US dollar</td>
        <td>US&#36;</td>
        <td>USD</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
     </tr>
     <tr>
        <td>Ecuador</td>
        <td>US dollar</td>
        <td>&#36;</td>
        <td>USD</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>Egypt</td>
        <td>Egyptian pound</td>
        <td>E&pound;</td>
        <td>EGP</td>
        <td>&amp;pound;</td>
        <td>&amp;#163;</td>
        <td>&amp;#x00a3;</td>
      </tr>
      <tr>
        <td>El Salvador</td>
        <td>Salvadoran colón</td>
        <td>&#8353;</td>
        <td>SVC</td>
        <td>&nbsp;</td>
        <td>&amp;#8353;</td>
        <td>&amp;#x20a1;</td>
      </tr>
      <tr>
        <td>Equatorial Guinea</td>
        <td>Central African CFA franc</td>
        <td>CFA</td>
        <td>XAF</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Eritrea</td>
        <td>Eritrean nakfa</td>
        <td>Nfa</td>
        <td>ERN</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Estonia</td>
        <td>Euro</td>
        <td>&euro;</td>
        <td>EUR</td>
        <td>&amp;euro;</td>
        <td>&amp;#8364;</td>
        <td>&amp;#x20ac;</td>
      </tr>
      <tr>
        <td>Ethiopia</td>
        <td>Ethiopian birr</td>
        <td>Br</td>
        <td>ETB</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Falkland Islands</td>
        <td>Falkland Islands pound</td>
        <td>FK&pound;</td>
        <td>FKP</td>
        <td>&amp;pound;</td>
        <td>&amp;#163;</td>
        <td>&amp;#x00a3;</td>
      </tr>
      <tr>
        <td>Fiji</td>
        <td>Fijian dollar</td>
        <td>FJ&#36;</td>
        <td>FJD</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>Finland</td>
        <td>Euro</td>
        <td>&euro;</td>
        <td>EUR</td>
        <td>&amp;euro;</td>
        <td>&amp;#8364;</td>
        <td>&amp;#x20ac;</td>
      </tr>
      <tr>
        <td>France</td>
        <td>Euro</td>
        <td>&euro;</td>
        <td>EUR</td>
        <td>&amp;euro;</td>
        <td>&amp;#8364;</td>
        <td>&amp;#x20ac;</td>
      </tr>
      <tr>
        <td>French Polynesia</td>
        <td>CFP franc</td>
        <td>F</td>
        <td>XPF</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Gabon</td>
        <td>Central African CFA franc</td>
        <td>CFA</td>
        <td>XAF</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Gambia</td>
        <td>Gambian dalasi</td>
        <td>D</td>
        <td>GMD</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Georgia</td>
        <td>Georgian lari</td>
        <td>&#4314;</td>
        <td>GEL</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>  
        <td>Germany</td>
        <td>Euro</td>
        <td>€</td>
        <td>EUR</td>
        <td>&amp;euro;</td>
        <td>&amp;#8364;</td>
        <td>&amp;#x20ac;</td>
      </tr>
      <tr>
        <td>Ghana</td>
        <td>Ghanian cedi</td>
        <td>&#8373;</td>
        <td>GHS</td>
        <td>&nbsp;</td>
        <td>&amp;#8373;</td>
        <td>&amp;#x20b5;</td>
      </tr>
      <tr>
        <td>Gibraltar</td>
        <td>Gibraltar pound</td>
        <td>&pound;</td>
        <td>GIP</td>
        <td>&amp;pound;</td>
        <td>&amp;#163;</td>
        <td>&amp;#x00a3;</td>
      </tr>
      <tr>
        <td>Greece</td>
        <td>Euro</td>
        <td>&euro;</td>
        <td>EUR</td>
        <td>&amp;euro;</td>
        <td>&amp;#8364;</td>
        <td>&amp;#x20ac;</td>
      </tr>
      <tr>
        <td>Grenada</td>
        <td>East Caribbean dollar</td>
        <td>EC&#36;</td>
        <td>XCD</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>Guatemala</td>
        <td>Guatemalan quetzal</td>
        <td>Q</td>
        <td>GTQ</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Guernsey</td>
        <td>British pound</td>
        <td>£</td>
        <td>GBP</td>
        <td>&amp;pound;</td>
        <td>&amp;#163;</td>
        <td>&amp;#x00a3;</td>
      </tr>
      <tr>
        <td>Guinea</td>
        <td>Guinean franc</td>
        <td>FG</td>
        <td>GNF</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Guinea-Bissau</td>
        <td>West African CFA franc</td>
        <td>CFA</td>
        <td>XOF</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Guyana</td>
        <td>Guyanese dollar</td>
        <td>GY&#36;</td>
        <td>GYD</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>Haiti</td>
        <td>Haitian gourde</td>
        <td>G</td>
        <td>HTG</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Honduras</td>
        <td>Honduran lempira</td>
        <td>L</td>
        <td>HNL</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Hong Kong</td>
        <td>Hong Kong dollar</td>
        <td>HK&#36;</td>
        <td>HKD</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>Hungary</td>
        <td>Hungarian forint</td>
        <td>Ft</td>
        <td>HUF</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Iceland</td>
        <td>Icelandic króna</td>
        <td>kr</td>
        <td>ISK</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Indonesia</td>
        <td>Indonesian rupiah</td>
        <td>Rp</td>
        <td>IDR</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Iran</td>
        <td>Iranian rial</td>
        <td>&#65020;</td>
        <td>IRR</td>
        <td>&nbsp;</td>
        <td>&amp;#65020;</td>
        <td>&amp;#xfdfc;</td>
      </tr>
      <tr>
        <td>Iraq</td>
        <td>Iraqi dinar</td>
        <td>&#1593;.&#1583;</td>
        <td>IQD</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Ireland</td>
        <td>Euro</td>
        <td>&euro;</td>
        <td>EUR</td>
        <td>&amp;euro;</td>
        <td>&amp;#8364;</td>
        <td>&amp;#x20ac;</td>
      </tr>
      <tr>
        <td>Isle of Man</td>
        <td>British pound</td>
        <td>&pound;</td>
        <td>GBP</td>
        <td>&amp;pound;</td>
        <td>&amp;#163;</td>
        <td>&amp;#x00a3;</td>
      </tr>
      <tr>
        <td>Israel</td>
        <td>Israeli new sheqel</td>
        <td>&#8362;</td>
        <td>ILS</td>
        <td>&nbsp;</td>
        <td>&amp;#8362;</td>
        <td>&amp;#x20aa;</td>
     </tr>
     <tr>
        <td>Italy</td>
        <td>Euro</td>
        <td>&euro;</td>
        <td>EUR</td>
        <td>&amp;euro;</td>
        <td>&amp;#8364;</td>
        <td>&amp;#x20ac;</td>
      </tr>
      <tr>
        <td>Jamaica</td>
        <td>Jamaican dollar</td>
        <td>J&#36;</td>
        <td>JMD</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>Japan</td>
        <td>Japanese yen </td>
        <td>&yen;</td>
        <td>JPY</td>
        <td>&amp;yen;</td>
        <td>&amp;#165;</td>
        <td>&amp;#x00a5;</td>
      </tr>
      <tr>
        <td>Jersey</td>
        <td>British pound</td>
        <td>&pound;</td>
        <td>GBP</td>
        <td>&amp;pound;</td>
        <td>&amp;#163;</td>
        <td>&amp;#x00a3;</td>
      </tr>
      <tr>
        <td>Jordan</td>
        <td>Jordanian dinar</td>
        <td>&#1583;.&#1575;</td>
        <td>JOD</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Kazakhstan</td>
        <td>Kazakhstani tenge</td>
        <td>&#8376;</td>
        <td>KZT</td>
        <td>&nbsp;</td>
        <td>&amp;#8376;</td>
        <td>&amp;#x20b8;</td>
      </tr>
      <tr>
        <td>Kenya</td>
        <td>Kenyan shilling</td>
        <td>KSh</td>
        <td>KES</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Korea, North</td>
        <td>North Korean won</td>
        <td>&#8361;</td>
        <td>KPW</td>
        <td>&nbsp;</td>
        <td>&amp;#8361;</td>
        <td>&amp;#x20a9;</td>
      </tr>
      <tr>
        <td>Korea, South</td>
        <td>South Korean won</td>
        <td>&#8361;</td>
        <td>KPW</td>
        <td>&nbsp;</td>
        <td>&amp;#8361;</td>
        <td>&amp;#x20a9;</td>
      </tr>
      <tr>
        <td>Kosovo</td>
        <td>Euro</td>
        <td>&euro;</td>
        <td>EUR</td>
        <td>&amp;euro;</td>
        <td>&amp;#8364;</td>
        <td>&amp;#x20ac;</td>
      </tr>
      <tr>
        <td>Kuwait</td>
        <td>Kuwaiti dinar</td>
        <td>&#1583;.&#1603;</td>
        <td>KWD</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Kyrgyzstan</td>
        <td>Kyrgyzstani som</td>
        <td>&#1083;&#1074;</td>
        <td>KGS</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Laos</td>
        <td>Lao kip</td>
        <td>&#8365;</td>
        <td>LAK</td>
        <td>&nbsp;</td>
        <td>&amp;#8365;</td>
        <td>&amp;#x20ad;</td>
      </tr>
      <tr>
        <td>Latvia</td>
        <td>Latvian lats</td>
        <td>Ls</td>
        <td>LVL</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Lebanon</td>
        <td>Lebanese pound</td>
        <td>L&pound;</td>
        <td>LBP</td>
        <td>&amp;pound;</td>
        <td>&amp;#163;</td>
        <td>&amp;#x00a3;</td>
      </tr>
      <tr>
        <td>Lesotho</td>
        <td>Lesotho loti</td>
        <td>L</td>
        <td>LSL</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Liberia</td>
        <td>Liberian dollar</td>
        <td>L&#36;</td>
        <td>LRD</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>Libya</td>
        <td>Libyan dinar</td>
        <td>&#1604;.&#1583;</td>
        <td>LD</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Liechtenstein</td>
        <td>Swiss franc</td>
        <td>Fr</td>
        <td>CHF</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Lithuania</td>
        <td>Lithuanian litas</td>
        <td>Lt</td>
        <td>LTL</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Luxembourg</td>
        <td>Euro</td>
        <td>&euro;</td>
        <td>EUR</td>
        <td>&amp;euro;</td>
        <td>&amp;#8364;</td>
        <td>&amp;#x20ac;</td>
      </tr>
      <tr>
        <td>Macau</td>
        <td>Macanese pataca</td>
        <td>P</td>
        <td>MOP</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Macedonia, Republic of</td>
        <td>Macedonian denar</td>
        <td>&#1076;&#1077;&#1085;</td>
        <td>MKD</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Madagascar</td>
        <td>Malagasy ariary</td>
        <td>Ar</td>
        <td>MGA</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Malawi</td>
        <td>Malawian kwacha</td>
        <td>MK</td>
        <td>MWK</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Malaysia</td>
        <td>Malaysian ringgit</td>
        <td>RM</td>
        <td>MYR</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Maldives</td>
        <td>Maldivian rufiyaa</td>
        <td>Rf</td>
        <td>MVR</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Mali</td>
        <td>West African CFA franc</td>
        <td>CFA</td>
        <td>XOF</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Malta</td>
        <td>Euro</td>
        <td>&euro;</td>
        <td>EUR</td>
        <td>&amp;euro;</td>
        <td>&amp;#8364;</td>
        <td>&amp;#x20ac;</td>
      </tr>
      <tr>
        <td>Marshall Islands</td>
        <td>US dollar</td>
        <td>&#36;</td>
        <td>USD</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>Mauritania</td>
        <td>Mauritanian ouguiya</td>
        <td>UM</td>
        <td>MRO</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Mauritius</td>
        <td>Mauritian rupee</td>
        <td>&#588;s</td>
        <td>MUR</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Mexico</td>
        <td>Mexican peso</td>
        <td>&#36;</td>
        <td>MXN</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>Micronesia</td>
        <td>US dollar</td>
        <td>&#36;</td>
        <td>USD</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>Moldova</td>
        <td>Moldovan leu</td>
        <td>L</td>
        <td>MDL</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Mongolia</td>
        <td>Mongolian tugrik</td>
        <td>&#8366;</td>
        <td>MNT</td>
        <td>&nbsp;</td>
        <td>&amp;#8366;</td>
        <td>&amp;#x20ae;</td>
      </tr>
      <tr>
        <td>Montenegro</td>
        <td>Euro</td>
        <td>&euro;</td>
        <td>EUR</td>
        <td>&amp;euro;</td>
        <td>&amp;#8364;</td>
        <td>&amp;#x20ac;</td>
      </tr>
      <tr>
        <td>Montserrat</td>
        <td>East Caribbean dollar</td>
        <td>EC&#36;</td>
        <td>XCD</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>Morocco</td>
        <td>Moroccan dirham</td>
        <td>&#1583;.&#1605;.</td>
        <td>MAD</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Mozambique</td>
        <td>Mozambican metical</td>
        <td>MT</td>
        <td>MZN</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Namibia</td>
        <td>Namibian dollar</td>
        <td>N&#36;</td>
        <td>NAD</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>Nauru</td>
        <td>Australian dollar</td>
        <td>A&#36;</td>
        <td>AUD</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>Nepal</td>
        <td>Nepalese rupee</td>
        <td>N&#588;s</td>
        <td>NPR</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Netherlands</td>
        <td>Euro</td>
        <td>&euro;</td>
        <td>EUR</td>
        <td>&amp;euro;</td>
        <td>&amp;#8364;</td>
        <td>&amp;#x20ac;</td>
      </tr>
      <tr>
        <td>Netherlands Antilles</td>
        <td>Netherlands Antilles guilder</td>
        <td>&#131;</td>
        <td>ANG</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>New Caledonia</td>
        <td>CFP franc</td>
        <td>F</td>
        <td>XPF</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>New Zealand</td>
        <td>New Zealand dollar</td>
        <td>NZ&#36;</td>
        <td>NZD</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>Nicaragua</td>
        <td>Nicaraguan córdoba</td>
        <td>C&#36;</td>
        <td>NIO</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Niger</td>
        <td>West African CFA franc</td>
        <td>CFA</td>
        <td>XOF</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Nigeria</td>
        <td>Nigerian naira</td>
        <td>&#8358;</td>
        <td>NGN</td>
        <td>&nbsp;</td>
        <td>&amp;#8358;</td>
        <td>&amp;#x20a6;</td>
      </tr>
      <tr>
        <td>Niue</td>
        <td>New Zealand dollar</td>
        <td>NZ&#36;</td>
        <td>NZD</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>Norway</td>
        <td>Norwegian krone</td>
        <td>kr</td>
        <td>NOK</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Oman</td>
        <td>Omani rial</td>
        <td>&#1585;.&#1593;.</td>
        <td>OMR</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Pakistan</td>
        <td>Pakistani rupee</td>
        <td>&#588;s</td>
        <td>PKR</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Palau</td>
        <td>US dollar</td>
        <td>&#36;</td>
        <td>USD</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>Panama</td>
        <td>Panamanian balboa</td>
        <td>B/.</td>
        <td>PAB</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Papua New Guinea</td>
        <td>Papua New Guinea kina</td>
        <td>K</td>
        <td>PGK</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Paraguay</td>
        <td>Paraguayan guarani</td>
        <td>&#8370;</td>
        <td>PYG</td>
        <td>&nbsp;</td>
        <td>&amp;#8370;</td>
        <td>&amp;#x20b2;</td>
      </tr>
      <tr>
        <td>Peru</td>
        <td>Peruvian nuevo sol</td>
        <td>S/.</td>
        <td>PEN</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Philippines</td>
        <td>Philippine peso</td>
        <td>&#8369;</td>
        <td>PHP</td>
        <td>&nbsp;</td>
        <td>&amp;#8369;</td>
        <td>&amp;#x20b1;</td>
      </tr>
      <tr>
        <td>Pitcairn Islands</td>
        <td>New Zealand dollar</td>
        <td>NZ&#36;</td>
        <td>NZD</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>Poland</td>
        <td>Polish zloty</td>
        <td>z&#322;</td>
        <td>PLN</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Portugal</td>
        <td>Euro</td>
        <td>&euro;</td>
        <td>EUR</td>
        <td>&amp;euro;</td>
        <td>&amp;#8364;</td>
        <td>&amp;#x20ac;</td>
      </tr>
      <tr>
        <td>Qatar</td>
        <td>Qatari riyal</td>
        <td>&#1585;.&#1602;</td>
        <td>QAR</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Romania</td>
        <td>Romanian leu</td>
        <td>L</td>
        <td>RON</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Russia</td>
        <td>Russian ruble</td>
        <td>&#1088;&#1091;&#1073;</td>
        <td>RUB</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Rwanda</td>
        <td>Rwandan franc</td>
        <td>RF</td>
        <td>RWF</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Saba</td>
        <td>US dollar</td>
        <td>&#36;</td>
        <td>USD</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>Samoa</td>
        <td>Samoan t&#257;l&#257;</td>
        <td>T</td>
        <td>WST</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>San Marino</td>
        <td>Euro</td>
        <td>&euro;</td>
        <td>EUR</td>
        <td>&amp;euro;</td>
        <td>&amp;#8364;</td>
        <td>&amp;#x20ac;</td>
      </tr>
      <tr>
        <td>São Tomé and Príncipe</td>
        <td>São Tomé and Príncipe dobra</td>
        <td>Db</td>
        <td>STD</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Saudi Arabia</td>
        <td>Saudi riyal</td>
        <td>&#1585;.&#1587;</td>
        <td>SAR</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Senegal</td>
        <td>West African CFA franc</td>
        <td>CFA</td>
        <td>XOF</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Serbia</td>
        <td>Serbian dinar</td>
        <td>&#1044;&#1080;&#1085;.</td>
        <td>RSD</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Seychelles</td>
        <td>Seychellois rupee</td>
        <td>&#588;s</td>
        <td>SCR</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Sierra Leone</td>
        <td>Sierra Leonean leone</td>
        <td>Le</td>
        <td>SLL</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Singapore</td>
        <td>Singapore dollar</td>
        <td>S&#36;</td>
        <td>SGD</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>Slovakia</td>
        <td>Euro</td>
        <td>&euro;</td>
        <td>EUR</td>
        <td>&amp;euro;</td>
        <td>&amp;#8364;</td>
        <td>&amp;#x20ac;</td>
      </tr>
      <tr>
        <td>Slovenia</td>
        <td>Euro</td>
        <td>&euro;</td>
        <td>EUR</td>
        <td>&amp;euro;</td>
        <td>&amp;#8364;</td>
        <td>&amp;#x20ac;</td>
      </tr>
      <tr>
        <td>Solomon Islands</td>
        <td>Solomon Islands dollar</td>
        <td>SI&#36;</td>
        <td>SBD</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>Somalia</td>
        <td>Somali shilling</td>
        <td>So. Sh.</td>
        <td>SOS</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Somaliland</td>
        <td>Somaliland shilling</td>
        <td>Sl. Sh.</td>
        <td>None</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>South Africa</td>
        <td>South African rand</td>
        <td>R</td>
        <td>ZAR</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>South Georgia/South Sandwich Islands</td>
        <td>British pound</td>
        <td>&pound;</td>
        <td>GBP</td>
        <td>&amp;pound;</td>
        <td>&amp;#163;</td>
        <td>&amp;#x00a3;</td>
      </tr>
      <tr>
        <td>Spain</td>
        <td>Euro</td>
        <td>&euro;</td>
        <td>EUR</td>
        <td>&amp;euro;</td>
        <td>&amp;#8364;</td>
        <td>&amp;#x20ac;</td>
      </tr>
      <tr>
        <td>Sri Lanka</td>
        <td>Sri Lankan rupee</td>
        <td>&#588;s</td>
        <td>LKR</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>St. Helena</td>
        <td>St. Helena pound</td>
        <td>&pound;</td>
        <td>SHP</td>
        <td>&amp;pound;</td>
        <td>&amp;#163;</td>
        <td>&amp;#x00a3;</td>
      </tr>
      <tr>
        <td>St. Kitts and Nevis</td>
        <td>East Caribbean dollar</td>
        <td>EC&#36;</td>
        <td>XCD</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>St. Lucia</td>
        <td>East Caribbean dollar</td>
        <td>EC&#36;</td>
        <td>XCD</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>St. Vincent and the Grenadines</td>
        <td>East Caribbean dollar</td>
        <td>EC&#36;</td>
        <td>XCD</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>Sudan</td>
        <td>Sudanese pound</td>
        <td>&pound;Sd</td>
        <td>SDG</td>
        <td>&amp;pound;</td>
        <td>&amp;#163;</td>
        <td>&amp;#x00a3;</td>
      </tr>
      <tr>
        <td>Suriname</td>
        <td>Surinamese dollar</td>
        <td>&#36;</td>
        <td>SRD</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>Swaziland</td>
        <td>Swazi lilangeni</td>
        <td>L</td>
        <td>SZL</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Sweden</td>
        <td>Swedish krona</td>
        <td>kr</td>
        <td>SEK</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Switzerland</td>
        <td>Swiss franc</td>
        <td>Fr</td>
        <td>CHF</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Syria</td>
        <td>Syrian pound</td>
        <td>S&pound;</td>
        <td>SYP</td>
        <td>&amp;pound;</td>
        <td>&amp;#163;</td>
        <td>&amp;#x00a3;</td>
      </tr>
      <tr>
        <td>Taiwan (Republic of China)</td>
        <td>New Taiwan dollar</td>
        <td>NT&#36;</td>
        <td>TWD</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>Tajikistan</td>
        <td>Tajikistani somoni</td>
        <td>SM</td>
        <td>TJS</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Tanzania</td>
        <td>Tanzanian shilling</td>
        <td>TSh</td>
        <td>TZS</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Thailand</td>
        <td>Thai baht </td>
        <td>&#3647;</td>
        <td>THB</td>
        <td>&nbsp;</td>
        <td>&amp;#3647;</td>
        <td>&amp;#x0e3f;</td>
      </tr>
      <tr>
        <td>Togo</td>
        <td>West African CFA franc</td>
        <td>CFA</td>
        <td>XOF</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Tonga</td>
        <td>Tongan pa’anga</td>
        <td>T&#36;</td>
        <td>TOP</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>Trinidad and Tobago</td>
        <td>Trinidad and Tobago dollar</td>
        <td>TT&#36;</td>
        <td>TTD</td>
        <td>&nbsp;</td>
        <td>&amp;#x0024;</td>
        <td>&amp;#36;</td>
      </tr>
      <tr>
        <td>Tunisia</td>
        <td>Tunisian dinar</td>
        <td>&#1583;.&#1578;</td>
        <td>TND</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Turkey</td>
        <td>Turkish lira</td>
        <td>TL</td>
        <td>TRY</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Turkmenistan</td>
        <td>Turkmenistani manat</td>
        <td>m</td>
        <td>TMT</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Turks and Caicos Islands</td>
        <td>US dollar</td>
        <td>&#36;</td>
        <td>USD</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>Tuvalu</td>
        <td>Australian dollar</td>
        <td>A&#36;</td>
        <td>AUD</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>Uganda</td>
        <td>Ugandan shilling</td>
        <td>USh</td>
        <td>UGX</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Ukraine</td>
        <td>Ukrainian hryvnia</td>
        <td>&#8372;</td>
        <td>UAH</td>
        <td>&nbsp;</td>
        <td>&amp;#8372;</td>
        <td>&amp;#x20b4;</td>
      </tr>
      <tr>
        <td>United Arab Emirates</td>
        <td>United Arab Emirates dirham</td>
        <td>&#1583;.&#1573;</td>
        <td>AED</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>United Kingdom</td>
        <td>British pound</td>
        <td>&#163;</td>
        <td>GBP</td>
        <td>&amp;pound;</td>
        <td>&amp;#163;</td>
        <td>&amp;#x00a3;</td>
      </tr>
      <tr>
        <td>United States</td>
        <td>US dollar</td>
        <td>US&#36;</td>
        <td>USD</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>Uruguay</td>
        <td>Uruguayan peso</td>
        <td>&#36;U</td>
        <td>UYU</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
      <tr>
        <td>Uzbekistan</td>
        <td>Uzbekistani som</td>
        <td>&#1083;&#1074;</td>
        <td>UZS</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Vanuatu</td>
        <td>Vanuatu vatu</td>
        <td>VT</td>
        <td>VUV</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Vatican City</td>
        <td>Euro</td>
        <td>&euro;</td>
        <td>EUR</td>
        <td>&amp;euro;</td>
        <td>&amp;#8364;</td>
        <td>&amp;#x20ac;</td>
      </tr>
      <tr>
        <td>Venezuela</td>
        <td>Venezuelan bolivar</td>
        <td>Bs</td>
        <td>VEF</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Vietnam</td>
        <td>Vietnamese dong</td>
        <td>&#8363;
        <td>VND</td>
        <td>&nbsp;</td>
        <td>&amp;#8363;</td>
        <td>&amp;#x20ab;</td>
      </tr>
      <tr>
        <td>Wallis and Futuna</td>
        <td>CFP franc</td>
        <td>F</td>
        <td>XPF</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Yemen</td>
        <td>Yemeni rial</td>
        <td>&#65020;</td>
        <td>YER</td>
        <td>&nbsp;</td>
        <td>&amp;#65020;</td>
        <td>&amp;#xfdfc;</td>
      </tr>
      <tr>
        <td>Zambia</td>
        <td>Zambian kwacha</td>
        <td>ZK</td>
        <td>ZMK</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Zimbabwe</td>
        <td>Zimbabwean dollar</td>
        <td>Z&#36;</td>
        <td>ZWL</td>
        <td>&nbsp;</td>
        <td>&amp;#36;</td>
        <td>&amp;#x0024;</td>
      </tr>
    </table>
    </tbody>


      @endsection

      