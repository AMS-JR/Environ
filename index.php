<?
class AMADOU{
  private $test = getenv('TEST');
  private $API = getenv('API');
public function env(){
 echo $this->test." and ".$this->API;
}
}
echo "HELLLO AMADOU SARJO JALLOW";
$RES = new AMADOU();
$RES->env();
