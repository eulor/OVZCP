<?php
/**
* @copyright Copyright (c) ARONET GmbH (https://aronet.swiss)
* @license AGPL-3.0
*
* This code is free software: you can redistribute it and/or modify
* it under the terms of the GNU Affero General Public License, version 3,
* as published by the Free Software Foundation.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU Affero General Public License for more details.
*
* You should have received a copy of the GNU Affero General Public License, version 3,
* along with this program.  If not, see <http://www.gnu.org/licenses/>
*
*/

use Phalcon\Validation;
use Phalcon\Validation\Validator\StringLength as StringLengthValitator;
use Phalcon\Validation\Validator\Regex as RegexValidator;
use Phalcon\Validation\Validator\PresenceOf as PresenceOfValidator;
use Phalcon\Validation\Validator\Between as BetweenValidator;
use Phalcon\Mvc\Model\Message as Message;

class Dcoipobjects extends \Phalcon\Mvc\Model
{

    // IP Versions
    const VERSION_IPV4 = 4;
    const VERSION_IPV6 = 6;

    // IP Types
    const TYPE_IPADDRESS = 1;
    const TYPE_IPRANGE = 2;
    const TYPE_IPNET = 3;

    // Allocated
    const ALLOC_RESERVED = 1;
    const ALLOC_ASSIGNED = 2;
    const ALLOC_AUTOASSIGNED = 3;

    /**
    *
    * @var integer
    * @Primary
    * @Identity
    */
    protected $id;

    /**
    * @var integer
    */
    protected $version;

    /**
    * @var integer
    */
    protected $type;

    /**
    *
    * @var string
    */
    protected $value1;

    /**
    *
    * @var string
    */
    protected $value2;

    /**
    *
    * @var integer
    */
    protected $allocated;

    /**
    *
    * @var integer
    */
    protected $main;

    /**
    *
    * @var integer
    */
    protected $colocations_id;

    /**
    *
    * @var integer
    */
    protected $physical_servers_id;

    /**
    *
    * @var integer
    */
    protected $virtual_servers_id;

    /**
    *
    * @var string
    */
    protected $comment;

    /**
    * Method to set the value of field id
    *
    * @param integer $id
    * @return $this
    */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
    * Set the IP version
    *
    * @param integer $version 4 or 6
    * @return $this
    */
    public function setVersion($version)
    {
        if ($version == 4)
            $this->version = 4;
        else
            $this->version = 6;

        return $this;
    }

    /**
    * Set the DCO IP Type
    *
    * @param integer $type TYPE_IPADDRESS, TYPE_IPRANGE, TYPE_IPNET
    * @return $this
    */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
    * Method to set the value of field value1
    *
    * @param string $value1 an Ipv4 or IPv6 Address
    * @return $this
    */
    public function setValue1($value1)
    {
        $this->value1 = $value1;

        return $this;
    }

    /**
    * Method to set the value of field value2
    *
    * @param string $value2 an IP-Address, Suffix or none (depending on type)
    * @return $this
    */
    public function setValue2($value2)
    {
        $this->value2 = $value2;

        return $this;
    }

    /**
    * Set the allocated state
    *
    * @param integer $allocated ALLOC_RESERVED, ALLOC_ASSIGNED, ALLOC_AUTOASSIGNED
    * @return $this
    */
    public function setAllocated($allocated)
    {
        $this->allocated = $allocated;

        return $this;
    }

    /**
    * Method to set the value of field main
    *
    * @param integer $main
    * @return $this
    */
    public function setMain($main)
    {
        $this->main = $main;

        return $this;
    }

    /**
    * @param integer $colocations_id
    * @return $this
    */
    public function setColocationsId($colocations_id)
    {
        if(empty($colocations_id))$colocations_id = NULL;
        else $this->colocations_id = $colocations_id;

        return $this;
    }

    /**
    * @param integer $physical_servers_id
    * @return $this
    */
    public function setPhysicalServersId($physical_servers_id)
    {
        if(empty($physical_servers_id))$physical_servers_id = NULL;
        else $this->physical_servers_id = $physical_servers_id;

        return $this;
    }

    /**
    * @param integer $virtual_servers_id
    * @return $this
    */
    public function setVirtualServersId($virtual_servers_id)
    {
        if(empty($virtual_servers_id))$virtual_servers_id = NULL;
        else $this->virtual_servers_id = $virtual_servers_id;

        return $this;
    }

    /**
    * Method to set the value of field comment
    *
    * @param string $comment
    * @return $this
    */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
    * Returns the value of field id
    *
    * @return integer
    */
    public function getId()
    {
        return $this->id;
    }

    /**
    * Returns the value of field version
    *
    * @return integer
    */
    public function getVersion()
    {
        return $this->version;
    }

    /**
    * Returns the value of field type
    *
    * @return integer
    */
    public function getType()
    {
        return $this->type;
    }

    /**
    * Returns the value of field value1
    *
    * @return string
    */
    public function getValue1()
    {
        return $this->value1;
    }

    /**
    * Returns the value of field value2
    *
    * @return string
    */
    public function getValue2()
    {
        return $this->value2;
    }

    /**
    * Returns the value of field allocated
    *
    * @return integer
    */
    public function getAllocated()
    {
        return $this->allocated;
    }

    /**
    * Returns the value of field main
    *
    * @return integer
    */
    public function getMain()
    {
        return $this->main;
    }

    /**
    * Returns the value of field colocations_id
    *
    * @return integer
    */
    public function getColocationsId()
    {
        return $this->colocations_id;
    }

    /**
    * Returns the value of field physical_servers_id
    *
    * @return integer
    */
    public function getPhysicalServersId()
    {
        return $this->physical_servers_id;
    }

    /**
    * Returns the value of field virtual_servers_id
    *
    * @return integer
    */
    public function getVirtualServersId()
    {
        return $this->virtual_servers_id;
    }

    /**
    * Returns the value of field comment
    *
    * @return string
    */
    public function getComment()
    {
        return $this->comment;
    }

    /**
    * Method to set the value of field dco_id
    *
    * @param integer $dco_id
    * @return $this
    */
    public function setDcoId($dco_id)
    {
        $this->dco_id = $dco_id;

        return $this;
    }

    /**
    * Returns the value of field dco_id
    *
    * @return integer
    */
    public function getDcoId()
    {
        return $this->dco_id;
    }

    /**
    * Initialize method for model.
    */
    public function initialize()
    {
        $this->belongsTo("colocations_id","Colocations","id",array("foreignKey"=>array("allowNulls"=>true)));
        $this->belongsTo("physical_servers_id","PhysicalServers","id",array("foreignKey"=>array("allowNulls"=>true)));
        $this->belongsTo("virtual_servers_id","VirtualServers","id",array("foreignKey"=>array("allowNulls"=>true)));
    }

    /**
    * Validations and business logic
    *
    * @return boolean
    */
    public function validation()
    {
        // get params from session
        $session = $this->getDI()->get("session")->get("DcoipobjectsValidator");
        $op = $session['op'];

        // check DCO
        $level = 0;
        if($op == 'new'){
            if(isset($session['colocations_id']) && !empty($session['colocations_id'])){
                $this->colocations_id = $session['colocations_id'];
            }elseif(isset($session['physical_servers_id']) && !empty($session['physical_servers_id'])){
                $this->physical_servers_id = $session['physical_servers_id'];
            }elseif(isset($session['virtual_servers_id']) && !empty($session['virtual_servers_id'])){
                $this->virtual_servers_id = $session['virtual_servers_id'];
            }else{
                $message = new Message("No DCO submitted.","id");            
                $this->appendMessage($message);
                return false;        
            }
        }

        // Validator
        $validator = $this->generateValidator($op);
        if(!$this->validate($validator)) return false;

        /** 
        * Business Logic
        */

        // IPv4 or IPv6
        $this->checkVersion();

        // valid IP format in value1
        if(!$this->isValidIP($this->value1)){
            $message = new Message("Not a valid IP Address","value1");            
            $this->appendMessage($message);
            return false;        
        }

        // IP Object type
        if(empty($this->value2)){
            $this->type = Dcoipobjects::TYPE_IPADDRESS;
            $this->value2 = "255.255.255.0";
        }else {

            if($this->isValidSubnetMask($this->value2)) {
                $this->type = Dcoipobjects::TYPE_IPADDRESS;

            } elseif($this->isValidIP($this->value2)){
                $this->type = Dcoipobjects::TYPE_IPRANGE;

            } elseif($this->isValidPrefix($this->value2)) {
                $this->type = Dcoipobjects::TYPE_IPNET;

            } else {
                $message = new Message(
                    "Not a valid second value",
                    "value2"
                );            
                $this->appendMessage($message);
                return false;        

            }
        }

        // Reserved must be an IP
        if($this->allocated != Dcoipobjects::ALLOC_RESERVED && $this->type != Dcoipobjects::TYPE_IPADDRESS){
            $message = new Message(
                "Assigned IPs can't be range or net",
                "id"
            );            
            $this->appendMessage($message);
            return false;        
        }

        // Check for possible reservations
        if($this->allocated != Dcoipobjects::ALLOC_RESERVED){
            $reservations = $this->getReservations();
            if($reservations === false){
                $message = new Message("No reservations found.","id");            
                $this->appendMessage($message);
                return false;        
            }

            $ok = false;
            foreach($reservations as $reservation){
                if($this->isPartOf($reservation)) $ok = true;
            }
            if(!$ok){
                $message = new Message("IP is not part of an existing reservation.","id");            
                $this->appendMessage($message);
                return false;        
            }

            // Check for already in use
            if($op == 'new'){
                $found = Dcoipobjects::findFirst(array(
                    "id != '".$this->id."' AND value1 = '".$this->value1."' AND allocated != '".Dcoipobjects::ALLOC_RESERVED."'",
                ));

                if($found){
                    $message = new Message("IP already exists.","id");            
                    $this->appendMessage($message);
                    return false;        
                }
            }            

            // Check if there is already a main IP
            $found = Dcoipobjects::findFirst(array(
                "colocations_id ".(is_null($this->colocations_id)?"IS NULL":"=".$this->colocations_id)." ".
                "AND physical_servers_id ".(is_null($this->physical_servers_id)?"IS NULL":"=".$this->physical_servers_id)." ".
                "AND virtual_servers_id ".(is_null($this->virtual_servers_id)?"IS NULL":"=".$this->virtual_servers_id)." ".
                "AND main = 1",
            ));

            if(!$found){
                $this->main = 1;
            }
        }
    }

    /**
    * searching vor existing reservations of a DCO
    * 
    */
    protected function getReservations() {
        $searching = false;
        $reservations = NULL;

        if(!empty($this->virtual_servers_id)){
            $searching = true;
            $reservations = Dcoipobjects::find(array(
                "conditions"=>"virtual_server_id = ".$this->virtual_servers_id,
                "conditions"=>"allocated = ".Dcoipobjects::ALLOC_RESERVED,
            ));
            if($reservations) return $reservations;
        }

        if($searching || !empty($this->physical_servers_id)){
            $searching = true;
            $reservations = Dcoipobjects::find(array(
                "conditions"=>"physical_server_id = ".$this->physical_servers_id,
                "conditions"=>"allocated = ".Dcoipobjects::ALLOC_RESERVED,
            ));
            if($reservations) return $reservations;
        }            

        if($searching || !empty($this->colocations_id)){
            $searching = true;
            $reservations = Dcoipobjects::find(array(
                "conditions"=>"colocations_id = ".$this->colocations_id,
                "conditions"=>"allocated = ".Dcoipobjects::ALLOC_RESERVED,
            ));
            if($reservations) return $reservations;
        }            

        // no reservations found
        return false;        

    }


    /**
    * generates validator for VirtualServer model
    * 
    * return \Phalcon\Validation $validator
    * 
    */
    public static function generateValidator($op){

        // validator
        $validator = new Validation();

        // value1
        $validator->add('value1', new PresenceOfValidator([
            'message' => 'IP Address is required'
        ]));        

        $validator->add('value1', new RegexValidator([
            'pattern' => '/^[0-9a-f:.]*$/',
            'message' => 'Wrong signs in IP Address.'
        ]));        

        // value2
        $validator->add('value2', new RegexValidator([
            'pattern' => '/^[0-9a-f:.]*$/',
            'message' => 'Wrong signs in second Value.',
            'allowEmpty' => true,
        ]));        

        // main
        $validator->add('main', new BetweenValidator([
            'minimum' => 0,
            'maximum' => 1,
            'message' => 'Main can only be 0 or 1.'
        ]));        

        // allocated
        $validator->add('allocated', new BetweenValidator([
            'minimum' => 1,
            'maximum' => 3,
            'message' => 'Please choose a correct Allocated Value.'
        ]));        

        // comment
        $validator->add('comment', new StringLengthValitator([
            'max' => 50,
            'messageMaximum' => 'comment too long (max. 50 character)',
        ]));

        return $validator;
    }

    /**
    * 
    * @return boolean
    */
    public function isMain(){
        if(empty($this->main)) return false;
        else return true;
    }

    /**
    * try to check out the IP Version 
    * 
    * @return void
    */
    public function checkVersion()
    {
        // Value 1 is always a IP Address
        if(strpos($this->value1,':') === false) $this->version = 4;
        else $this->version = 6;
    }

    /**
    * 
    * @param string $ip IP-Address as V4 or V6
    */
    public function isValidIP($ip)
    {
        if($this->version == 4){
            return $this->isValidIPv4($ip);
        } else {
            return $this->isValidIPv6($ip);
        }
    }

    /**
    * 
    * @param string $ip
    */
    public function isValidIPv4($ip)
    {
        $a = explode('.',$ip);
        if(count($a) != 4) return false;

        foreach($a as $byte){
            if(!is_numeric($byte)) return false;
            if($byte < 0 || $byte > 255) return false;
        }

        return true;
    }

    /**
    * 
    * @param string $ip
    */
    public function isValidIPv6($ip)
    {
        // ToDo: IPv6 Check
        return false;
    }

    public function isValidSubnetMask($subnetMask){
        if($this->version == 4){
            return $this->isValidSubnetMaskV4($subnetMask);
        }else {
            return $this->isValidSubnetMaskV6($subnetMask);
        }
    }
    
    public function isValidSubnetMaskV4($subnetMask){
        $long = ip2long($subnetMask);  
        $base = ip2long('255.255.255.255');  
        return $this->isValidPrefixV4(32-log(($long ^ $base)+1,2));
    }

    public function isValidSubnetMaskV6($subnetMask){
        // ToDo
        return false;
    }
    
    
    /**
    * 
    * @param mixed $prefix
    */
    public function isValidPrefix($prefix)
    {
        if($this->version == 4){
            return $this->isValidPrefixV4($prefix);
        } else {
            return $this->isValidPrefixV6($prefix);
        }
    }

    /**
    * 
    * @param mixed $prefix
    */
    public function isValidPrefixV4($prefix){
        $prefix = intval($prefix);
        if ($prefix <=0 || $prefix > 32) return false;
        return true;
    }

    /**
    * 
    * @param mixed $prefix
    */
    public function isValidPrefixV6($prefix){
        $prefix = intval($prefix);
        if ($prefix <=0 || $prefix > 128) return false;
        return true;
    }

    /**
    * Checks if this Dcoipobject is within the given Dcoipobject.
    *     
    * @param IPObject $ip
    */
    public function isPartOf(Dcoipobjects $ip)
    {
        if($this->version <> $ip->getVersion()) return false;

        if((gmp_cmp($this->getStart(),$ip->getStart())>=0 && gmp_cmp($this->getStart(),$ip->getEnd())<=0) ||
            (gmp_cmp($this->getEnd(),$ip->getStart())>=0 && gmp_cmp($this->getEnd(),$ip->getEnd())<=0))

            return true;
        else
            return false;
    }

    /**
    * Translates the given IP-Address to a GMP-value.
    * 
    * @param string $ip
    * @return string
    */
    protected function toGMP($ip)
    {
        $gmp = "0";

        if($this->version == 4) {
            $a = explode('.',$ip);
            $gmp = gmp_add($gmp,gmp_mul($a[0],gmp_pow(2,24)));
            $gmp = gmp_add($gmp,gmp_mul($a[1],gmp_pow(2,16)));
            $gmp = gmp_add($gmp,gmp_mul($a[2],gmp_pow(2,8)));
            $gmp = gmp_add($gmp,$a[3]);
        } else {
            $ip = $this->expandIPv6($ip);
            $a = explode(':',$ip);
            for($i=0;$i<8;$i++){
                $gmp = gmp_add($gmp,gmp_mul($a[$i],gmp_pow(2,24)));
            } 
        }
        return gmp_strval($gmp);
    } 

    /**
    * Expands a compressed IPv6 address to its full lenght.
    *     
    * @param string $ip
    * @return string
    */
    protected function expandIPv6($ip) 
    {
        if (strpos($ip, '::') !== false)
            $ip = str_replace('::', 
                str_repeat(':0', 8 - substr_count($ip,':')).':', $ip);
        if (strpos($ip, ':') === 0) $ip = '0'.$ip;
        return $ip;
    }

    /**
    * Compares two Dcoipobjects in terms of start-address.
    * Needed for usort()
    * 
    * @param Dcoipobjects $ipo1
    * @param Dcoipobjects $ipo2
    * @return integer 0:even, -1:ipo1<ipo2, 1:ipo1>ipo2
    */
    public function cmp(Dcoipobjects $ipo1,Dcoipobjects $ipo2){
        if ($ipo1->getStart() == $ipo2->getStart()) {
            return 0;
        }
        return ($ipo1->getStart() < $ipo2->getStart()) ? -1 : 1;
    }

    /**
    * Gives the start-value of this object as an GMP-value.
    * 
    * @return GMP-Value
    */
    public function getStart(){
        switch($this->type){
            case Dcoipobjects::TYPE_IPADDRESS:
                return gmp_strval($this->toGMP($this->value1));
                break;
            case Dcoipobjects::TYPE_IPNET:
                # Netz-Maske berechnen
                $mask = gmp_xor(gmp_sub(gmp_pow(2,32),1),gmp_sub(pow(2,32-$this->value2),1));
                # Netz-Nummer berechnen (unterste IP)
                return gmp_strval(gmp_and($this->toGMP($this->value1),$mask));
                break;
            case Dcoipobjects::TYPE_IPRANGE:
                return gmp_strval($this->toGMP($this->value1));
                break;
            default:
                return "Unexpected type!";
        }

    }

    /**
    * Gives the end-value of this object as an GMP-value.
    * 
    * @return GMP-Value
    */
    public function getEnd(){
        switch($this->type){
            case Dcoipobjects::TYPE_IPADDRESS:
                return gmp_strval($this->toGMP($this->value1));
                break;
            case Dcoipobjects::TYPE_IPNET:
                # Netz-Maske berechnen
                $mask = gmp_xor(gmp_sub(gmp_pow(2,32),1),
                    gmp_sub(pow(2,32-$this->value2),1));
                # Broadcast berechnen (oberste IP)
                $bcmask = gmp_sub(gmp_pow(2,32-$this->value2),1);
                return gmp_strval(gmp_or($this->toGMP($this->value1),$bcmask));
                break;
            case Dcoipobjects::TYPE_IPRANGE:
                return gmp_strval($this->toGMP($this->value2));
                break;
            default:
                return "Unexpected type!";
        }

    }

    /**
    * Gives this object as string in one line.
    * 
    * @return string
    */
    public function toString(){
        switch($this->type){
            case Dcoipobjects::TYPE_IPADDRESS:
                return $this->value1;
                break;
            case Dcoipobjects::TYPE_IPNET:
                return $this->value1."/".$this->value2;
                break;
            case Dcoipobjects::TYPE_IPRANGE:
                return $this->value1." - ".$this->value2;
                break;
            default:
                return "Unexpected type!";
        }
    }
}
