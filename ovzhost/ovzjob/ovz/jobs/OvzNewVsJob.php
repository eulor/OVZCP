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

namespace RNTFOREST\OVZJOB\ovz\jobs;

/**
* ovz_new_vs    VSTYPE, UUID, NAME, OSTEMPLATE, DISTRIBUTION, HOSTNAME, CPUS, RAM, DISKSPACE, ROOTPWD
*/

class OvzNewVsJob extends AbstractOvzJob{

    public function run() {
        $this->Context->getLogger()->debug("VS create!");

        // check if uuid already exists
        $exitstatus = $this->PrlctlCommands->listVS();
        if($exitstatus > 0) return $this->commandFailed("Getting VS list failed",$exitstatus);
        foreach(json_decode($this->PrlctlCommands->getJson(),true) as $vs) {
            if($vs['uuid'] == $this->Params['UUID']){
                $this->Done = 2;
                $this->Error = "UUID (".$this->Params['UUID'].") already exists!";
                $this->Context->getLogger()->debug($this->Error);
                return;
            }
        }

        // check if OS Template already exists
        if($this->Params['VSTYPE'] == 'CT'){
            $exitstatus = $this->PrlctlCommands->ostemplatesList();
            if($exitstatus > 0) return $this->commandFailed("Getting templates failed",$exitstatus);
            $ostemplates = json_decode($this->PrlctlCommands->getJson(),true);

            $validostemplate = false;
            foreach($ostemplates as $template){
                if(is_array($template) 
                && key_exists('name',$template) 
                && $this->Params['OSTEMPLATE']==$template['name']){
                    $validostemplate = true;        
                }
            }
            if(!$validostemplate) return $this->commandFailed("OS Template not exists!",255);
        }

        // start background job
        $this->Context->getLogger()->debug("Starting background job");
        $cmd = "php JobSystemStarter.php background ".intval($this->Id)." > /dev/null";
        $exitstatus = $this->Context->getCli()->executeBackground($cmd);
        if($exitstatus > 0) return $this->commandFailed("Starting backgroundjob failed",$exitstatus);
        
        $this->Done = -1;
    }
}
