<?php


//initializing connection to the database

class DatabaseOutput{
    
    
    
    public function getTeamList(){
        
        require("connection.php");
        
        $calendar= new DB\SQL\Mapper($db,'Teams');
        
        
        //getting user name
        session_start();
        $user = $_SESSION['user']['username'];
        
        $teamList=$calendar->find(array('userID=? AND confirm=1',$user));
        
        
        //generating array with teamlist, removing unnecesarry columns
        $front_teamList = array();
        
        foreach($teamList as $team){
           
           $front_team = array('teamName'=> $team->teamName,
                       'teamID'=> $team->teamID,
                       'role'  => $team->role);
                       
            array_push($front_teamList,$front_team);

        }
        
        echo json_encode($front_teamList);
    }
    
    
        public function getTeamListStatic(){
        
        require("connection.php");
        
        $calendar= new DB\SQL\Mapper($db,'Teams');
        
        
        //getting user name
        session_start();
        $user = $_SESSION['user']['username'];
        
        $teamList=$calendar->find(array('username=? AND confirm=1',$user));
        
        return $teamList;
        //generating array with teamlist, removing unnecesarry columns

    }
    
    
    public function getMeetingsByParticipation(){
        
        require("connection.php");
        
                //getting user name
        session_start();
        $uID = $_SESSION['user']['uID'];
        
       
       // echo  $uID;
        
        $calendar= new DB\SQL\Mapper($db,'Participants');
        
        $meetings_ids=$calendar->find(array('participantID=?',$uID));
            
            
            //filling this one and returning to front end
            $front_meetingsList = array();
            
            foreach($meetings_ids as $meeting){
                
                $sub_calendar = new DB\SQL\Mapper($db,'Meetings');
                
                $meetings=$sub_calendar->find(array('meetingID=?',$meeting->meetingID));
                
                
          
        
            foreach($meetings as $meet){
           
            
            $front_meet = array('title'=> $meet->subject,
                      'description'=> $meet->description,
                      'start'  => $meet->start,
                      'end'  => $meet->end,
                      'color'  => $meet->color,
                      'id'  => $meet->meetingID);
                 
            array_push($front_meetingsList,$front_meet);
            
            }
                
              
            
            }
        
              echo json_encode($front_meetingsList);
        
    }
    
    
    
        public function getMeetingsByTeamId($forTeam){
        
        require("connection.php");
        
                //getting user name
        //session_start();
        //$uID = $_SESSION['user']['uID'];
        
       
       // echo  $uID;
        
        $calendar= new DB\SQL\Mapper($db,'Participants');
        
        $meetings_ids=$calendar->find(array('participantID=?',$forTeam));
            
            
            //filling this one and returning to front end
            $front_meetingsList = array();
            
            foreach($meetings_ids as $meeting){
                
                $sub_calendar = new DB\SQL\Mapper($db,'Meetings');
                
                $meetings=$sub_calendar->find(array('meetingID=?',$meeting->meetingID));
                
                
          
        
            foreach($meetings as $meet){
           
            
            $front_meet = array('title'=> $meet->subject,
                      'description'=> $meet->description,
                      'start'  => $meet->start,
                      'end'  => $meet->end,
                      'color'  => $meet->color,
                      'id'  => $meet->meetingID);
                 
            array_push($front_meetingsList,$front_meet);
            
            }
                
              
            
            }
        
              echo json_encode($front_meetingsList);
        
    }
    
    
    
    
    
    
    
    
    
    public static function getEvents($owner_calendar_id){
        
        //getting connected to db
       require("connection.php");

        $calendar= new DB\SQL\Mapper($db,'CALENDAR_TASK');

        $tasks=$calendar->find(array('owner_calendar_id=?',$owner_calendar_id));
        
        $events = array();
        
        foreach($tasks as $task){
            $event = array('title'=> $task->title,
                       'start'=> $task->start,
                       'end'  => $task->end,
                       'color'=> $task->color,
                       'owner_calendar_id'=>$task->owner_calendar_id,
                       'id'=>$task->id,
                       'allDay'=>$task->allDay,
                       'editiable'=>true);
            array_push($events,$event);
            //->title;//db mapper
        }
        echo json_encode($events);
    }
    
        public static function createEvent($EventPostObject){
        
         //converting to PHP array
         $EventPostObject = json_decode($_POST['json'],true);
        
        //getting connected to db
        require("connection.php");
        //selecting table
                     
         //deleting all tasks from this calendar                                 
        $db->exec('DELETE FROM CALENDAR_TASK WHERE owner_calendar_id = 0 ');
        
        //looping trough post result
        foreach ($EventPostObject as $key=> $event){
                                          $calendar= new DB\SQL\Mapper($db,'CALENDAR_TASK');
                                            //copying directly to database array
                                          $calendar->copyFrom($event);
       
                                          $calendar->save();
        }
        
    }
    
    
}


return new DatabaseOutput();


?>