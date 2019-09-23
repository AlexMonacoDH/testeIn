<?php
$facts = [
  ['gabriel', 'address', 'baker street, 109', true],
  ['john', 'address', 'pine street, 88', true],
  ['john', 'phone', '91234-5555', true],
  ['gabriel', 'phone', '98888-1111', true],
  ['gabriel', 'phone', '56789-1010', true]
];
$schema = [
    ['address', 'cardinality', 'one'],
    ['phone', 'cardinality', 'many']
];
function orderNewest($facts,$schema){
	$cc = $facts;
	$dd = $facts;
	$store_1 = [];
	$result = [];
	$k = [];
	$a = 0;
	$e = 0;
	
	while($e<count($dd)-1){
		for($i=0;$i<count($dd);$i++){
			if($dd[0][0] == $dd[$i][0]){
				$store_1[] = $dd[$i];
			}
		}
		for($i=0;$i<count($store_1);$i++){
			for($p=0;$p<count($cc);$p++){
				if($store_1[$i] == $cc[$p]){
					unset($dd[$p]);
				}
			}
		}
		
		for($c=count($store_1)-1;$c>=0;$c--){
			if($schema[0][0] == $store_1[$c][1]){
				$k[] = $store_1[$c];
				break;
			}
		}
		
		for($c=count($store_1)-1;$c>=0;$c--){
			if($schema[1][0] == $store_1[$c][1]){
				$k[] = $store_1[$c];
			}
		}
		$store_1 = [];
		$e++;
	}
	echo '<pre>';
	print_r($k);
	echo '</pre>';
}

orderNewest($facts,$schema);