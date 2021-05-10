<?php include_once('topo.php')?>
<br/><br/><br/><br/><br/>	

<script language="javaScript">	
	var min, seg;		min = 20;		seg = 1		
	function relogio(){			
		if((min > 0) || (seg > 0)){				
			if(seg == 0){					
				seg = 59;					
				min = min - 1	
			}				
			else{					
				seg = seg - 1;				
			}				
			if(min.toString().length == 1){					
				min = "0" + min;				
			}				
			if(seg.toString().length == 1){					
				seg = "0" + seg;				
			}				
			document.getElementById('spanRelogio').innerHTML = min + ":" + seg;				
			setTimeout('relogio()', 1000);			
		}			
		else{				
			document.getElementById('spanRelogio').innerHTML = "00:00";			
		}		
	}	
    </script><button class="btn bg-primary" style="font-family:verdana;font-size:10px;" onLoad="relogio()">Chamar</button>
    <span id="spanRelogio"></span>