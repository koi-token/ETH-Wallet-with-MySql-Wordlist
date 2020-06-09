<?php
//Connect to database 
include 'conexion.php';

// Counter
$cont = 0;


$wordSQl = mysqli_query($conexion,"SELECT word FROM wordlist order by rand() limit 0,12");
           while($wordarray=mysqli_fetch_array($wordSQl)){
           			
                    if (($cont)==0) {
                    	
                    $mywordlist = $wordarray['word']. ' ';
                    $cont++;
                    } else {
                    $mywordlist .= $wordarray['word']. ' ';    
                    $cont++;
                    }
                    
                }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Creating an ETH wallet with php and MySql</title>
	
	<script src="node_modules/jquery/dist/jquery.js"></script>
	<script src="node_modules/web3/dist/web3.js"></script>
</head>
<body>
<h2>Creating ETH wallet with PHP+MYSQL word list</h2>
My wallet address: <div id="MyWallet"></div>
My words list: <?php echo $mywordlist; ?><br>
My Private Key: <div id="MyKey"></div>
</body>

<script>

 const web3 = new Web3(new Web3.providers.HttpProvider('YOUR_INFURA_ACCOUNT_INFO'));
 const newwallet = web3.eth.accounts.create('<?php echo $mywordlist; ?>');
 $("#MyWallet").append(newwallet.address);
 const myPK = newwallet.privateKey;
 $("#MyKey").append(myPK);
 

</script>
</html>