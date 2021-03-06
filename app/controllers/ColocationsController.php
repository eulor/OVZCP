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
 
class ColocationsController extends TableSlideBase
{
    protected function getSlideDataInfo() {
        return array(
            "controller" => "colocations",
            "action" => "slidedata",
            "slidenamefield" => "name",
            "slidenamefielddescription" => "Servername",
            "scope" => "",
            "order" => "name",
            "orderdir" => "ASC",
            "filters" => array(),
            "page" => 1,
            "limit" => 10,
        );
    }
    
    protected function filterSlideItems($items,$level) { 
        // Alle Filter abholen
        if($this->request->has('filterAll')){
            $oldfilter = $this->slideDataInfo['filters']['filterAll'];
            $this->slideDataInfo['filters']['filterAll'] = $this->request->get("filterAll", "string");
            if($oldfilter != $this->slideDataInfo['filters']['filterAll']) $this->slideDataInfo['page'] = 1;
        }

        // Filter anwenden        
        if(!empty($this->slideDataInfo['filters']['filterAll'])){ 
            $items = $items->filter(
                function($colocations){
                    if(strpos(strtolower($colocations->name),strtolower($this->slideDataInfo['filters']['filterAll']))!==false)
                        return $colocations;
                }
            );
        }
        return $items; 
    }
    
    protected function renderSlideHeader($item,$level){
        switch($level){
            case 0:
                return $item->name; 
                break;
            default:
                return "invalid level!";
        }
    }

    protected function renderSlideDetail($item,$level){
        // Slidelevel ignored because there is only one level
        $content = "";

        $this->simpleview->item = $item;
        $content .= $this->simpleview->render("colocations/slideDetail.volt");
        return $content;
    }

    /**
    * Adds an IP Object to the Server
    * 
    * @param integer $id primary key of the colocation
    * 
    */
    public function addIpObjectAction($id){

        // store in session
        $this->session->set("DcoipobjectsValidator", array(
            "op" => "new",
            "colocations_id" => intval($id),
            "origin" => array(
                'controller' => 'colocations',
                'action' => 'slidedata',
            )
        ));

        $dcoipobjectsForm = new DcoipobjectsForm(new Dcoipobjects());
        
        return $this->dispatcher->forward([
            'controller' => 'dcoipobjects',
            'action' => 'edit',
            'params' => [$dcoipobjectsForm],
        ]);
    }
    
    /**
    * Edits an IP Object on the colocation
    * 
    * @param integer $ipobject primary key of the IP Object
    * 
    */
    public function editIpObjectAction($ipobject){

        // store in session
        $this->session->set("DcoipobjectsValidator", array(
            "op" => "edit",
            "origin" => array(
                'controller' => 'colocations',
                'action' => 'slidedata',
            )
        ));

        return $this->dispatcher->forward([
            'controller' => 'dcoipobjects',
            'action' => 'edit',
            'params' => [$ipobject],
        ]);
    }
    
    /**
    * Deletes an IP Object
    * 
    * @param integer $ipobject primary key of the IP Object
    * 
    */
    public function deleteIpObjectAction($ipobject){

        // store in session
        $this->session->set("DcoipobjectsValidator", array(
            "op" => "delete",
            "origin" => array(
                'controller' => 'colocations',
                'action' => 'slidedata',
            )
        ));

        return $this->dispatcher->forward([
            'controller' => 'dcoipobjects',
            'action' => 'delete',
            'params' => [$ipobject],
        ]);
    }

    
    
}
