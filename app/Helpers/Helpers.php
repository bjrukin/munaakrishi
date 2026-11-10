<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

if (!function_exists('getMax')) {
    function getMax($table_name, $field_name)
    {
        return DB::table($table_name)->max($field_name) + 1;
    }
}

if (!function_exists('getSlug')) {
    function getSlug($table_name, $field_name, $title, $id = 0, $id_name = 'id')
    {
        $slug_name = Str::slug($title);
        $slug_name = ($slug_name) ? $slug_name : time();
        $row = DB::table($table_name)->where($id_name, '<>', $id)->where($field_name, $slug_name)->first();
        $slug = ($row) ? $slug_name . "-" . DB::table($table_name)->count() + 1 : $slug_name;
        $recheck = DB::table($table_name)->where($id_name, '<>', $id)->where($field_name, $slug)->first();
        if ($recheck) {
            $slug = $slug_name . "-" . time();
        }
        return $slug;
    }
}

if (!function_exists('timeElapsed')) {
    function timeElapsed($datetime, $full = false)
    {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
        $string = [
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        ];
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
        if (! $full) {
            $string = array_slice($string, 0, 1);
        }
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
}

if (!function_exists('youtube')) {
    function youtube($video)
    {
        $pattern = '#^(?:https?://)?(?:www\.)?(?:youtu\.be/|youtube\.com(?:/embed/|/v/|/watch\?v=|/watch\?.+&v=))([\w-]{11})(?:.+)?$#x';
        preg_match($pattern, $video, $matches);
        return (isset($matches[1])) ? $matches[1] : null;
    }
}

if (!function_exists('uniqueMultidimArray')) {
    function unique_multidim_array($array, $key)
    {
        $temp_array = [];
        $i = 0;
        $key_array = [];

        foreach ($array as $val) {
            if (! in_array($val[$key], $key_array)) {
                $key_array[$i] = $val[$key];
                array_push($temp_array, $val);
                //$temp_array[$i] = $val;
            }
            $i++;
        }
        return $temp_array;
    }
}

if (!function_exists('convertXmlToArray')) {
    function convertXmlToArray($xml, )
    {
        $xmlString = str_replace(["\r", "\n"], '', $xml);
        $xml = simplexml_load_string($xmlString, );
        $json = json_encode($xml);
        $array = json_decode($json, true);
        return $array;
    }
}

if (!function_exists('moneyFormat')) {
    function moneyFormat($floatcurr, $curr = 'NPR')
    {
        $currencies['ARS'] = [2, ',', '.'];  //  Argentine Peso
        $currencies['AMD'] = [2, '.', ','];  //  Armenian Dram
        $currencies['AWG'] = [2, '.', ','];  //  Aruban Guilder
        $currencies['AUD'] = [2, '.', ' '];  //  Australian Dollar
        $currencies['BSD'] = [2, '.', ','];  //  Bahamian Dollar
        $currencies['BHD'] = [3, '.', ','];  //  Bahraini Dinar
        $currencies['BDT'] = [2, '.', ','];  //  Bangladesh, Taka
        $currencies['BZD'] = [2, '.', ','];  //  Belize Dollar
        $currencies['BMD'] = [2, '.', ','];  //  Bermudian Dollar
        $currencies['BOB'] = [2, '.', ','];  //  Bolivia, Boliviano
        $currencies['BAM'] = [2, '.', ','];  //  Bosnia and Herzegovina, Convertible Marks
        $currencies['BWP'] = [2, '.', ','];  //  Botswana, Pula
        $currencies['BRL'] = [2, ',', '.'];  //  Brazilian Real
        $currencies['BND'] = [2, '.', ','];  //  Brunei Dollar
        $currencies['CAD'] = [2, '.', ','];  //  Canadian Dollar
        $currencies['KYD'] = [2, '.', ','];  //  Cayman Islands Dollar
        $currencies['CLP'] = [0, '', '.'];   //  Chilean Peso
        $currencies['CNY'] = [2, '.', ','];  //  China Yuan Renminbi
        $currencies['COP'] = [2, ',', '.'];  //  Colombian Peso
        $currencies['CRC'] = [2, ',', '.'];  //  Costa Rican Colon
        $currencies['HRK'] = [2, ',', '.'];  //  Croatian Kuna
        $currencies['CUC'] = [2, '.', ','];  //  Cuban Convertible Peso
        $currencies['CUP'] = [2, '.', ','];  //  Cuban Peso
        $currencies['CYP'] = [2, '.', ','];  //  Cyprus Pound
        $currencies['CZK'] = [2, '.', ','];  //  Czech Koruna
        $currencies['DKK'] = [2, ',', '.'];  //  Danish Krone
        $currencies['DOP'] = [2, '.', ','];  //  Dominican Peso
        $currencies['XCD'] = [2, '.', ','];  //  East Caribbean Dollar
        $currencies['EGP'] = [2, '.', ','];  //  Egyptian Pound
        $currencies['SVC'] = [2, '.', ','];  //  El Salvador Colon
        $currencies['ATS'] = [2, ',', '.'];  //  Euro
        $currencies['BEF'] = [2, ',', '.'];  //  Euro
        $currencies['DEM'] = [2, ',', '.'];  //  Euro
        $currencies['EEK'] = [2, ',', '.'];  //  Euro
        $currencies['ESP'] = [2, ',', '.'];  //  Euro
        $currencies['EUR'] = [2, ',', '.'];  //  Euro
        $currencies['FIM'] = [2, ',', '.'];  //  Euro
        $currencies['FRF'] = [2, ',', '.'];  //  Euro
        $currencies['GRD'] = [2, ',', '.'];  //  Euro
        $currencies['IEP'] = [2, ',', '.'];  //  Euro
        $currencies['ITL'] = [2, ',', '.'];  //  Euro
        $currencies['LUF'] = [2, ',', '.'];  //  Euro
        $currencies['NLG'] = [2, ',', '.'];  //  Euro
        $currencies['PTE'] = [2, ',', '.'];  //  Euro
        $currencies['GHC'] = [2, '.', ','];  //  Ghana, Cedi
        $currencies['GIP'] = [2, '.', ','];  //  Gibraltar Pound
        $currencies['GTQ'] = [2, '.', ','];  //  Guatemala, Quetzal
        $currencies['HNL'] = [2, '.', ','];  //  Honduras, Lempira
        $currencies['HKD'] = [2, '.', ','];  //  Hong Kong Dollar
        $currencies['HUF'] = [0, '', '.'];   //  Hungary, Forint
        $currencies['ISK'] = [0, '', '.'];   //  Iceland Krona
        $currencies['INR'] = [2, '.', ','];  //  Indian Rupee
        $currencies['IDR'] = [2, ',', '.'];  //  Indonesia, Rupiah
        $currencies['IRR'] = [2, '.', ','];  //  Iranian Rial
        $currencies['JMD'] = [2, '.', ','];  //  Jamaican Dollar
        $currencies['JPY'] = [0, '', ','];   //  Japan, Yen
        $currencies['JOD'] = [3, '.', ','];  //  Jordanian Dinar
        $currencies['KES'] = [2, '.', ','];  //  Kenyan Shilling
        $currencies['KWD'] = [3, '.', ','];  //  Kuwaiti Dinar
        $currencies['LVL'] = [2, '.', ','];  //  Latvian Lats
        $currencies['LBP'] = [0, '', ' '];   //  Lebanese Pound
        $currencies['LTL'] = [2, ',', ' '];  //  Lithuanian Litas
        $currencies['MKD'] = [2, '.', ','];  //  Macedonia, Denar
        $currencies['MYR'] = [2, '.', ','];  //  Malaysian Ringgit
        $currencies['MTL'] = [2, '.', ','];  //  Maltese Lira
        $currencies['MUR'] = [0, '', ','];   //  Mauritius Rupee
        $currencies['MXN'] = [2, '.', ','];  //  Mexican Peso
        $currencies['MZM'] = [2, ',', '.'];  //  Mozambique Metical
        $currencies['NPR'] = [2, '.', ','];  //  Nepalese Rupee
        $currencies['ANG'] = [2, '.', ','];  //  Netherlands Antillian Guilder
        $currencies['ILS'] = [2, '.', ','];  //  New Israeli Shekel
        $currencies['TRY'] = [2, '.', ','];  //  New Turkish Lira
        $currencies['NZD'] = [2, '.', ','];  //  New Zealand Dollar
        $currencies['NOK'] = [2, ',', '.'];  //  Norwegian Krone
        $currencies['PKR'] = [2, '.', ','];  //  Pakistan Rupee
        $currencies['PEN'] = [2, '.', ','];  //  Peru, Nuevo Sol
        $currencies['UYU'] = [2, ',', '.'];  //  Peso Uruguayo
        $currencies['PHP'] = [2, '.', ','];  //  Philippine Peso
        $currencies['PLN'] = [2, '.', ' '];  //  Poland, Zloty
        $currencies['GBP'] = [2, '.', ','];  //  Pound Sterling
        $currencies['OMR'] = [3, '.', ','];  //  Rial Omani
        $currencies['RON'] = [2, ',', '.'];  //  Romania, New Leu
        $currencies['ROL'] = [2, ',', '.'];  //  Romania, Old Leu
        $currencies['RUB'] = [2, ',', '.'];  //  Russian Ruble
        $currencies['SAR'] = [2, '.', ','];  //  Saudi Riyal
        $currencies['SGD'] = [2, '.', ','];  //  Singapore Dollar
        $currencies['SKK'] = [2, ',', ' '];  //  Slovak Koruna
        $currencies['SIT'] = [2, ',', '.'];  //  Slovenia, Tolar
        $currencies['ZAR'] = [2, '.', ' '];  //  South Africa, Rand
        $currencies['KRW'] = [0, '', ','];   //  South Korea, Won
        $currencies['SZL'] = [2, '.', ', ']; //  Swaziland, Lilangeni
        $currencies['SEK'] = [2, ',', '.'];  //  Swedish Krona
        $currencies['CHF'] = [2, '.', '\'']; //  Swiss Franc
        $currencies['TZS'] = [2, '.', ','];  //  Tanzanian Shilling
        $currencies['THB'] = [2, '.', ','];  //  Thailand, Baht
        $currencies['TOP'] = [2, '.', ','];  //  Tonga, Paanga
        $currencies['AED'] = [2, '.', ','];  //  UAE Dirham
        $currencies['UAH'] = [2, ',', ' '];  //  Ukraine, Hryvnia
        $currencies['USD'] = [2, '.', ','];  //  US Dollar
        $currencies['VUV'] = [0, '', ','];   //  Vanuatu, Vatu
        $currencies['VEF'] = [2, ',', '.'];  //  Venezuela Bolivares Fuertes
        $currencies['VEB'] = [2, ',', '.'];  //  Venezuela, Bolivar
        $currencies['VND'] = [0, '', '.'];   //  Viet Nam, Dong
        $currencies['ZWD'] = [2, '.', ' '];  //  Zimbabwe Dollar
                                             // custom function to generate: ##,##,###.##

        if ($curr == "INR" || $curr == "NPR") {
            return formatCrore($floatcurr);
        } else {
            return number_format($floatcurr, $currencies[$curr][0], $currencies[$curr][1], $currencies[$curr][2]);
        }
    }
}
if (!function_exists('formatCrore')) {
    function formatCrore($input)
    {

        $input = round((int) $input, 0);
        $dec = "";
        $pos = strpos($input, ".");
        if ($pos === false) {
            //no decimals
        } else {
            //decimals
            $dec = (string) substr(round(substr($input, $pos), 2), 1);
            $input = substr($input, 0, $pos);
        }
        $num = substr($input, -3);      // get the last 3 digits
        $input = substr($input, 0, -3); // omit the last 3 digits already stored in $num
                                        // loop the process - further get digits 2 by 2
        while (strlen($input) > 0) {
            $num = substr($input, -2) . "," . $num;
            $input = substr($input, 0, -2);
        }
        return ($dec) ? $num . $dec : $num;
    }
}

if (!function_exists('passwordResetOtp')) {
    function passwordResetOtp()
    {
        try {
            $token = random_int(111111, 999999);
            $check = DB::table('password_reset_tokens')
                ->where('token', $token)
                ->first();
            if ($check) {
                $token = passwordResetOtp();
            }
            return $token;
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}



if (!function_exists('getOtp')) {
    function getOtp()
    {
        try {
            $otp = random_int(111111, 999999);
            $check = DB::table('users')
                ->where('otp', $otp)
                ->first();
            if ($check) {
                $otp = getOtp();
            }
            return $otp;
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}

