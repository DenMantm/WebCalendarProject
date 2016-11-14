<?php


//initializing connection to the database

class calendarEntity{

      
        


    
    
    public static function getCalendars(){
        
        //getting connected to db
       require("connection.php");
        
        
       $calendar= new DB\SQL\Mapper($db,'CALENDAR_ENTITY');
       $calendar->load(array('OWNER=?','Deniss'));
       
        echo $calendar->id;
        $user->skip();
       
    
        
        
        
    }
    
        public static function createCalendar($calendar_name,$owner,$is_team_calendar,$tasks){
        
        //getting connected to db
       require("connection.php");

        
       $calendar= new DB\SQL\Mapper($db,'CALENDAR_ENTITY');
       $calendar->CALENDAR_NAME = $calendar_name;
       $calendar->OWNER = $owner;
       $calendar->IS_TEAM_CALENDAR=$is_team_calendar;
       $calendar->TASKS=$tasks;
       $calendar->save();

        
    }
    
            public static function deleteCalendar($id,$owner){
        
        //getting connected to db
       require("connection.php");

       $calendar= new DB\SQL\Mapper($db,'CALENDAR_ENTITY');
       $calendar->load(array('OWNER=? AND id=?',$owner,$id));
       $calendar->erase();

    }
    
    
    


    
    
}


return new calendarEntity();


?>