<?php

namespace App\DTO;

class MaterialRequestDTO
{
    public $course_id;
    public $name;
    public $yt_video_link;
    public function __construct(array $data)
    {
        $this->name = $data["name"];
        $this->yt_video_link = $data["yt_video_link"];
        $this->course_id = $data["course_id"];
    }
}
