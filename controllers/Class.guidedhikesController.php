<?php

class guidedhikesController extends Controller
{
    public static function getGuidedHikes()
    {
        return Hike::get_guidedHikes();
    }

    function guidedhikes()
    {
        $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
        $this->vars['guidedhikes'] = Hike::get_guidedHikes();
    }
}