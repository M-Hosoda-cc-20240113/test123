<?php

namespace App\Services\Top\FetchTopData;

use Illuminate\Support\Collection;

class FetchTopResponse
{
  /**
   * @var Project[]
   * @var Skill[]
   * @var Position[]
   * @var Station[]
   */
   private $projects;
   private $skills;
   private $positions;
   private $stations;

   /**
    * Get the value of projects
    *
    * @return  Project[]
    */ 
   public function getProjects()
   {
     return $this->projects;
   }
 
   /**
    * Set the value of projects
    *
    * @param  Project[]  $projects
    *
    * @return  self
    */ 
   public function setProjects(Collection $projects)
   {
     $this->projects = $projects;
 
     return $this;
   }
   /**
    * Get the value of skills
    *
    * @return  Skill[]
    */ 
    public function getSkills()
    {
      return $this->skills;
    }
  
    /**
     * Set the value of skills
     *
     * @param  Skill[]  $skills
     *
     * @return  self
     */ 
    public function setSkills(Collection $skills)
    {
      $this->skills = $skills;
  
      return $this;
    }
    /**
    * Get the value of positions
    *
    * @return  Position[]
    */ 
   public function getPositions()
   {
     return $this->positions;
   }
 
   /**
    * Set the value of positions
    *
    * @param  Position[]  $Positions
    *
    * @return  self
    */ 
   public function setPositions(Collection $positions)
   {
     $this->positions = $positions;
 
     return $this;
   }
   /**
    * Get the value of stations
    *
    * @return  Station[]
    */ 
   public function getStations()
   {
     return $this->stations;
   }
 
   /**
    * Set the value of stations
    *
    * @param  Station[]  $stations
    *
    * @return  self
    */ 
   public function setStations(Collection $stations)
   {
     $this->stations = $stations;
 
     return $this;
   }
}
