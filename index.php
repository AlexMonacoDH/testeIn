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
	$store_1 = [];
	$result = [];
	$k = [];
	$a = 0;
	$keep = [];
	while($a<count($facts)){
		for($i=0;$i<count($facts);$i++){
			if($facts[$a][0] == $facts[$i][0]){
				$store_1[] = $facts[$i];
			}
		}
		for($i=0;$i<count($store_1);$i++){
			$keep = $store_1[$i];
			for($p=0;$p<count($facts);$p++){
				if($keep == $facts[$p]){
					unset($facts[$p]);
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
				break;
			}
		}
	$a++;
	}
	echo '<pre>';
	print_r($k);
	echo '</pre>';
}

orderNewest($facts,$schema);