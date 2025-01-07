<?php

namespace app\controllers;

use app\library\View;
use app\models\Resume;
use app\models\ResumeEducation;
use app\models\ResumeExperience;
use app\models\ResumeTechnology;
use app\models\ResumeSkill;
use app\models\ResumeSocial;

class ResumeController
{

  public function index()
  {
      $id=4;
      $resume = Resume::where('id', $id);
      if (!$resume) {
          Redirect::message('/home', 'Currículo não encontrado!', 'red');
          exit;
      }

      $education = ResumeEducation::where('resume_id', $id, '*', false);
      $experiences = ResumeExperience::where('resume_id', $id, '*', false);
      $technologies = ResumeTechnology::where('resume_id', $id, '*', false);
      $skills = ResumeSkill::where('resume_id', $id, '*', false);
      $socials = ResumeSocial::where('resume_id', $id, '*', false);

      View::render('resume', [
          'title' => 'Visualizar Currículo',
          'resume' => $resume,
          'education' => $education,
          'experiences' => $experiences,
          'technologies' => $technologies,
          'skills' => $skills,
          'socials' => $socials,
      ]);
  }
}
