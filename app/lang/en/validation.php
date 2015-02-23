<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	"accepted" => "Laukas   turi būti priimtas.",
	"active_url" => "Laukas   nėra galiojantis internetinis adresas.",
	"after" => "Laukelyje   turi būti data po :date.",
	"alpha" => "Laukas   gali turėti tik raides.",
	"alpha_dash" => "Laukas   gali turėti tik raides, skaičius ir brūkšnelius.",
	"alpha_num" => "Laukas   gali turėti tik raides ir skaičius.",
	"array" => "Laukas   turi būti masyvas.",
	"before" => "Laukas   turi būti data prieš :date.",
	"between" => array(
	"numeric" => "Lauko   reikšmė turi būti tarp :min ir :max.",
	"file" => "Failo dydis lauke   turi būti tarp :min ir :max kilobaitų.",
	"string" => "Simbolių skaičius lauke   turi būti tarp :min ir :max.",
	"array" => "Elementų skaičius lauke   turi turėti nuo :min iki :max.",
	),
	"boolean" => "Lauko reikšmė   turi būti 'taip' arba 'ne'.",
	"confirmed" => "Lauko   patvirtinimas nesutampa.",
	"date" => "Lauko   reikšmė nėra galiojanti data.",
	"date_format" => "Lauko   reikšmė neatitinka formato :format.",
	"different" => "Laukų   ir :other reikšmės turi skirtis.",
	"digits" => "Laukas   turi būti sudarytas iš :digits skaitmenų.",
	"digits_between" => "Laukas   tuti turėti nuo :min iki :max skaitmenų.",
	"email" => "Lauko   reikšmė turi būti galiojantis el. pašto adresas.",
	"exists" => "Pasirinkta negaliojanti   reikšmė.",
	"image" => "Lauko   reikšmė turi būti paveikslėlis.",
	"in" => "Pasirinkta negaliojanti   reikšmė.",
	"integer" => "Lauko   reikšmė turi būti sveikasis skaičius.",
	"ip" => "Lauko   reikšmė turi būti galiojantis IP adresas.",
	"max" => array(
	"numeric" => "Lauko   reikšmė negali būti didesnė nei :max.",
	"file" => "Failo dydis lauke   reikšmė negali būti didesnė nei :max kilobaitų.",
	"string" => "Simbolių kiekis lauke   reikšmė negali būti didesnė nei :max simbolių.",
	"array" => "Elementų kiekis lauke   negali turėti daugiau nei :max elementų.",
	),
	"mimes" => "Lauko reikšmė   turi būti failas vieno iš sekančių tipų: :values.",
	"min" => array(
	"numeric" => "Lauko   reikšmė turi būti ne mažesnė nei :min.",
	"file" => "Failo dydis lauke   turi būti ne mažesnis nei :min kilobaitų.",
	"string" => "Simbolių kiekis lauke   turi būti ne mažiau nei :min.",
	"array" => "Elementų kiekis lauke   turi būti ne mažiau nei :min.",
	),
	"not_in" => "Pasirinkta negaliojanti reikšmė  .",
	"numeric" => "Lauko   reikšmė turi būti skaičius.",
	"regex" => "Negaliojantis lauko   formatas.",
	"required" => "Privaloma užpildyti lauką  .",
	"required_if" => "Privaloma užpildyti lauką   kai :other yra :value.",
	"required_with" => "Privaloma užpildyti lauką   kai pateikta :values.",
	"required_with_all" => "Privaloma užpildyti lauką   kai pateikta :values.",
	"required_without" => "Privaloma užpildyti lauką   kai nepateikta :values.",
	"required_without_all" => "Privaloma užpildyti lauką   kai nepateikta nei viena iš reikšmių :values.",
	"same" => "Laukai   ir :other turi sutapti.",
	"size" => array(
	"numeric" => "Lauko   reikšmė turi būti :size.",
	"file" => "Failo dydis lauke   turi būti :size kilobaitai.",
	"string" => "Simbolių skaičius lauke   turi būti :size.",
	"array" => "Elementų kiekis lauke   turi būti :size.",
	),
	"unique" => "Tokia   reikšmė jau pasirinkta.",
	"url" => "Negaliojantis lauko   formatas.",
	"timezone" => "Lauko   reikšmė turi būti galiojanti laiko zona.",
	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(
		'attribute-name' => array(
			'rule-name' => 'custom-message',
		),
	),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(),

);
