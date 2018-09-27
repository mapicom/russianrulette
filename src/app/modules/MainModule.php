<?php
namespace app\modules;

use std, gui, framework, app;

global $timer_counter;
global $counter;

class MainModule extends AbstractModule
{
    /**
     * @event timer.action 
     */
    function doTimerAction(ScriptEvent $e = null)
    {
        if ($GLOBALS['timer_counter'] < 42) {
            $GLOBALS['timer_counter'] += 1;
            $GLOBALS['counter'] = rand(1,6);
            $this->counter->text = $GLOBALS['counter'];
            $this->timer->interval += 5;
        } else {
            $this->timer->enable = false;
            if ($GLOBALS['counter'] == $GLOBALS['a']) {
                $media = Media::open('res://.data/sound/shoot.mp3', true);
                $this->shutdown->enable = true;
                
            } else {
                $media = Media::open('res://.data/sound/click.mp3', true);
                $this->timerAlt->enable = true;
            }
        }
        
    }

    /**
     * @event timerAlt.action 
     */
    function doTimerAltAction(ScriptEvent $e = null)
    {    
        // reset values
        $GLOBALS['timer_counter'] = 0;
        $GLOBALS['counter'] = 0;
        $GLOBALS['a'] = 0;
        
        $this->edit->editable = true;
        $this->button->enabled = true;
        $this->counter->text = "0";
        $this->timer->interval = 10;
        $this->edit->text = "";
        $this->timer->enable = false;
        $this->timerAlt->enable = false;
    }
    
    /**
     * @event shutdown.action
     */
     function doShutdownAction(ScriptEvent $e = null)
     {
         app()->shutdown();
     } 

}
