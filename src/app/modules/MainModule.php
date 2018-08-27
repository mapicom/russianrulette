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
                $this->timerAlt->enable = true;
                
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
        app()->shutdown();
    }

}
