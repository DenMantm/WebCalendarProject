<?php


//initializing connection to the database

class EventEntity{
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


return new EventEntity();


?>