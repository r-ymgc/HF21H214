<?php
class ReferenceIntakes{
	private $IndexNo;
	private $Age;
	private $Gender;
	private $Energy;
	private $Protein;
	private $Fat;
	private $Carbohydrate;
	private $Calcium;
	private $Iron;
	private $VitaminA;
	private $VitaminE;
	private $VitaminB1;
	private $VitaminB2;
	private $VitaminC;
	private $Fiber;
	private $SaturatedFatAcid;
	private $Salt;
	public function getIndexNo(){ return $this->IndexNo; }
	public function setIndexNo($IndexNo){ $this->IndexNo=$IndexNo; }
	public function getAge(){ return $this->Age; }
	public function setAge($Age){ $this->Age=$Age; }
	public function getGender(){ return $this->Gender; }
	public function setGender($Gender){ $this->Gender=$Gender; }
	public function getEnergy(){ return $this->Energy; }
	public function setEnergy($Energy){ $this->Energy=$Energy; }
	public function getProtein(){ return $this->Protein; }
	public function setProtein($Protein){ $this->Protein=$Protein; }
	public function getFat(){ return $this->Fat; }
	public function setFat($Fat){ $this->Fat=$Fat; }
	public function getCarbohydrate(){ return $this->Carbohydrate; }
	public function setCarbohydrate($Carbohydrate){ $this->Carbohydrate=$Carbohydrate; }
	public function getCalcium(){ return $this->Calcium; }
	public function setCalcium($Calcium){ $this->Calcium=$Calcium; }
	public function getIron(){ return $this->Iron; }
	public function setIron($Iron){ $this->Iron=$Iron; }
	public function getVitaminA(){ return $this->VitaminA; }
	public function setVitaminA($VitaminA){ $this->VitaminA=$VitaminA; }
	public function getVitaminE(){ return $this->VitaminE; }
	public function setVitaminE($VitaminE){ $this->VitaminE=$VitaminE; }
	public function getVitaminB1(){ return $this->VitaminB1; }
	public function setVitaminB1($VitaminB1){ $this->VitaminB1=$VitaminB1; }
	public function getVitaminB2(){ return $this->VitaminB2; }
	public function setVitaminB2($VitaminB2){ $this->VitaminB2=$VitaminB2; }
	public function getVitaminC(){ return $this->VitaminC; }
	public function setVitaminC($VitaminC){ $this->VitaminC=$VitaminC; }
	public function getFiber(){ return $this->Fiber; }
	public function setFiber($Fiber){ $this->Fiber=$Fiber; }
	public function getSaturatedFatAcid(){ return $this->SaturatedFatAcid; }
	public function setSaturatedFatAcid($SaturatedFatAcid){ $this->SaturatedFatAcid=$SaturatedFatAcid; }
	public function getSalt(){ return $this->Salt; }
	public function setSalt($Salt){ $this->Salt=$Salt; }
}
?>