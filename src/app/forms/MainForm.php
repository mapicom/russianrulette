<?php
namespace app\forms;

use std, gui, framework, app;

global $a;

class MainForm extends AbstractForm
{
    /**
     * @event button.action 
     */
    function doButtonAction(UXEvent $e = null)
    {    
        if ($this->edit->text >= 1 && $this->edit->text <= 6) {
            
            $this->edit->editable = false;
            $this->button->enabled = false;
            $GLOBALS['a'] = $this->edit->text;
            $this->timer->enable = true;
            $media = Media::open('sound/pole.mp3', true);
        }
    }


}
