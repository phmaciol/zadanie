<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Maszyna do cukierków</h1>

    <?php
        class Service{ 
            private $c = 0;
            private $pin_true = 1234;
            private $pin_ok = false;
            private function test($pin_get){
                $pin_ok = $this->pin_ok;
                $pin_true = $this->pin_true; 
                if ($pin_get == $pin_true){
                    $pin_ok = true;
                }
                else echo "<h1> Niepoprawne hasło</h1>";
                return $pin_ok;
            }
            public function sum($x, $y, $a){
                $xyz = $this->c;

                $pin_test = $this->test($a);
                if($pin_test){
                    if(isset($y) && is_numeric($y)){
                        $xyz = $x + $y;
                        
                    }
                    else{
                        $xyz = $x;

                    } 
                    return $xyz;
                }
                
            }
        }
        class Machine{
            public $cookies_all;
            private $b = false;
            public $open = false;

            public function cookies(){

                fopen('cookies.txt', 'r');
                $file = file('cookies.txt');
                return $file[0];
               
            } 

            public function money(){
                fopen('money.txt', 'r');
                $file = file('money.txt');
                return $file[0];
               
            }

            public function operation($x){
                $a=$this->b;
                if($x>0){
                    
                    $a = true;
                          
            }
                return $a; 
            }

            public function take_cookies($i){
                $ix = $i-1;
                return $ix;


            }

            public function give_money($i){
                $ix = $i+2;
                return $ix;


            }

            public function save($x, $m){
                $cookies_all = $x;
                $money_all = $m;
                $file = fopen('cookies.txt', 'w');
                fwrite($file, $cookies_all);
                $file_next = fopen('money.txt', 'w');
                fwrite($file_next, $money_all);
            }
        } 
        
        $w = false;
        $action = new Machine();
        $open = $action->open;
        
        $m=$action->money();
        $money_one=$action->money = $m;
        $x=$action->cookies();
        $cookies_one=$action->cookies_all = $x;
        $y=$action->operation($cookies_one);
        ?>
            <form action="index.php" method="POST">
                <button name="service">SERWIS</button>
            </form>
        <?php

            if($y && !isset($_POST['service']) ){
                
                    echo "Wrzuć monetę aby dostać Cukierka";
                    ?>
                     <form action='index.php' method="post">
                         <h3> Podanijk na monety</h3>
                         <h5>Maszyna przujmuje tylko monety dwu złotowe</h5></br>
                         <?php 
                            if(!isset($_POST['sub']) or $_POST['money']!=2){
                                ?>
                                <input  name="money"></input></br>
                                <button  name="sub"  type="submit">PODAJ</button>
                                
                                </form> 
                                
                                <?php
                            }

                   
                  
    
                    if(isset($_POST['money']) && is_numeric($_POST['money'])){
                        $money = $_POST['money'];
                        if($money == 2){
                                        
                                        $open=true;
                                      
                            ?>
                                    <h3> Przekręć żeby pobrać</h3></br>
                           <?php
                        }
                        else{
                        
                        echo "</br>";
                        echo "Wrzuć monetę o nominale 2";
                           
                        }   
                    }
                           
                    elseif (isset($_POST['sub'])) echo "Wrzuć monetę" ;
                }
               
                
                
  
            else{
                echo "Tryb Serwisowy";
                ?>
                    <form action="index.php" method='post'>
                        <h3>Podaj hasło serwisanta</h3>
            </br>       <input name="pin" type="password"></input> </br>
                        <h3> Podaj liczbę ciastek jaką chcesz dodać</h3>
            </br>       <input name='cookies' type="text"></input> </br>
                        <button name='give_cookies' type="submit">DODAJ CIASTKA</button>
                    </form>
                


                <?php
                    


                }
            if($open){
                    echo "</br><h1> OPEN </h1></br>";
                    ?>
                        <form action='index.php' method="post">
                             <button name="sube"  >Przekręć</button>
                        </form> 
                    <?php
                    $open=false;
                }
            elseif(!$open){
                    echo "</br><h1> CLOSED </h1></br>";
                    ?>
                        <form action='index.php' method="post">
                             <button>Przekręć</button>
                        </form> 
                    <?php
                }


            if(isset($_POST['sube'])) {
                    $x = $action->take_cookies($cookies_one);
                    $m = $action->give_money($money_one);
                    
                    
                }
            if(isset($_POST['give_cookies'])) {
                if(isset($_POST['cookies']) && is_numeric($_POST['cookies']))
                {   
                    $service = new Service();
                    $pin = $_POST['pin'];
                    $cookies_new = $_POST['cookies'];
                    $x= $service->sum($cookies_one, $cookies_new, $pin);
                    
                }
            }
          
            $action->save($x,$m);
            
            echo $x . " cukierków "  . $m . "zł";
            
                
    
    ?>
</body>
</html>