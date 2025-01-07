<?php

namespace app\controllers;

use app\models\Resume;
use app\models\ResumeTechnology;
use app\models\ResumeSkill;
use app\models\ResumeExperience;
use app\models\ResumeEducation;
use app\models\ResumeSocial;
use app\library\View;
use app\library\Redirect;
use app\library\AuthMiddleware;

class AdminResumeController
{
    public function __construct()
    {
        AuthMiddleware::isAdmin();
    }

    public function index()
    {
        $resumes = Resume::getAll();
        View::render('admin/resumes/index', [
            'title' => 'Gerenciar Currículos',
            'resumes' => $resumes,
        ]);
    }

    public function formCreate()
    {
        View::render('admin/resumes/create', [
            'title' => 'Adicionar Currículo',
        ]);
    }

    public function formEdit()
    {
        $id = strip_tags($_GET['id']);
        $resume = Resume::where('id', $id);
        $education = ResumeEducation::where('resume_id', $id, '*', false);
        $experiences = ResumeExperience::where('resume_id', $id, '*', false);
        $technologies = ResumeTechnology::where('resume_id', $id, '*', false);
        $skills = ResumeSkill::where('resume_id', $id, '*', false);
        $socials = ResumeSocial::where('resume_id', $id, '*', false);

        View::render('admin/resumes/edit', [
            'title' => 'Editar Currículo',
            'resume' => $resume,
            'education' => $education,
            'experiences' => $experiences,
            'technologies' => $technologies,
            'skills' => $skills,
            'socials' => $socials,
        ]);
    }


    public function insert()
    {
        $resumeData = [
            'user_id' => $_SESSION['auth']->id,
            'summary' => strip_tags($_POST['summary']),
        ];

        $resumeId = Resume::insert($resumeData);

        if (!$resumeId) {
            Redirect::message('/admin/resumes', 'Erro ao criar Currículo!', 'red');
            exit;
        }

        $this->insertDetails($resumeId, $_POST);

        Redirect::message('/admin/resumes', 'Currículo Criado com sucesso!');
        exit;
    }

    private function insertDetails(int $resumeId, array $postData)
    {
        if (isset($postData['education']['degree'])) {
            foreach ($postData['education']['degree'] as $index => $degree) {
                $educationData = [
                    'resume_id' => $resumeId,
                    'degree' => strip_tags($degree),
                    'institution' => strip_tags($postData['education']['institution'][$index]),
                    'start_date' => strip_tags($postData['education']['start_date'][$index]),
                    'end_date' => strip_tags($postData['education']['end_date'][$index] ?? null),
                    'description' => strip_tags($postData['education']['description'][$index] ?? null),
                ];
                ResumeEducation::insert($educationData);
            }
        }

        if (isset($postData['experience']['job_title'])) {
            foreach ($postData['experience']['job_title'] as $index => $jobTitle) {
                $experienceData = [
                    'resume_id' => $resumeId,
                    'job_title' => strip_tags($jobTitle),
                    'company_name' => strip_tags($postData['experience']['company_name'][$index]),
                    'start_date' => strip_tags($postData['experience']['start_date'][$index]),
                    'end_date' => strip_tags($postData['experience']['end_date'][$index] ?? null),
                    'description' => strip_tags($postData['experience']['description'][$index] ?? null),
                ];
                ResumeExperience::insert($experienceData);
            }
        }

        if (isset($postData['technology']['name'])) {
            foreach ($postData['technology']['name'] as $index => $technologyName) {
                $technologyData = [
                    'resume_id' => $resumeId,
                    'name' => strip_tags($technologyName),
                    'proficiency_level' => strip_tags($postData['technology']['proficiency_level'][$index]),
                ];
                ResumeTechnology::insert($technologyData);
            }
        }

        if (isset($postData['skills']['skill_name'])) {
            foreach ($postData['skills']['skill_name'] as $index => $skillName) {
                $skillData = [
                    'resume_id' => $resumeId,
                    'skill_name' => strip_tags($skillName),
                    'skill_type' => strip_tags($postData['skills']['skill_type'][$index]),
                ];
                ResumeSkill::insert($skillData);
            }
        }

        if (isset($postData['socials']['platform'])) {
            foreach ($postData['socials']['platform'] as $index => $platform) {
                $socialData = [
                    'resume_id' => $resumeId,
                    'platform' => strip_tags($platform),
                    'url' => strip_tags($postData['socials']['url'][$index]),
                ];
                ResumeSocial::insert($socialData);
            }
        }
    }

    public function update()
    {
        $resumeId = strip_tags($_POST['id']);

        $resumeData = [
            'summary' => strip_tags($_POST['summary']),
        ];

        if (!Resume::update($resumeId, $resumeData)) {
            Redirect::message("/admin/resumes/edit?id={$resumeId}", 'Erro ao atualizar o Currículo!', 'red');
            exit;
        }

        $this->updateDetails($resumeId, $_POST);

        Redirect::message('/admin/resumes', 'Currículo atualizado com sucesso!');
        exit;
    }

    private function updateDetails(int $resumeId, array $postData)
    {
        if (isset($postData['education']['degree'])) {
            foreach ($postData['education']['degree'] as $index => $degree) {
                $educationData = [
                    'degree' => strip_tags($degree),
                    'institution' => strip_tags($postData['education']['institution'][$index]),
                    'start_date' => strip_tags($postData['education']['start_date'][$index]),
                    'end_date' => strip_tags($postData['education']['end_date'][$index] ?? null),
                    'description' => strip_tags($postData['education']['description'][$index] ?? null),
                ];
    
                if (isset($postData['education']['id'][$index])) {
                    ResumeEducation::update($postData['education']['id'][$index], $educationData);
                } else {
                    $educationData['resume_id'] = $resumeId;
                    ResumeEducation::insert($educationData);
                }
            }
        }
    
        if (isset($postData['experience']['job_title'])) {
            foreach ($postData['experience']['job_title'] as $index => $jobTitle) {
                $experienceData = [
                    'job_title' => strip_tags($jobTitle),
                    'company_name' => strip_tags($postData['experience']['company_name'][$index]),
                    'start_date' => strip_tags($postData['experience']['start_date'][$index]),
                    'end_date' => strip_tags($postData['experience']['end_date'][$index] ?? null),
                    'description' => strip_tags($postData['experience']['description'][$index] ?? null),
                ];
    
                if (isset($postData['experience']['id'][$index])) {
                    ResumeExperience::update($postData['experience']['id'][$index], $experienceData);
                } else {
                    $experienceData['resume_id'] = $resumeId;
                    ResumeExperience::insert($experienceData);
                }
            }
        }
    
        if (isset($postData['technology']['name'])) {
            foreach ($postData['technology']['name'] as $index => $technologyName) {
                $technologyData = [
                    'name' => strip_tags($technologyName),
                    'proficiency_level' => strip_tags($postData['technology']['proficiency_level'][$index]),
                ];
    
                if (isset($postData['technology']['id'][$index])) {
                    ResumeTechnology::update($postData['technology']['id'][$index], $technologyData);
                } else {
                    $technologyData['resume_id'] = $resumeId;
                    ResumeTechnology::insert($technologyData);
                }
            }
        }
    
        if (isset($postData['skills']['skill_name'])) {
            foreach ($postData['skills']['skill_name'] as $index => $skillName) {
                $skillData = [
                    'skill_name' => strip_tags($skillName),
                    'skill_type' => strip_tags($postData['skills']['skill_type'][$index]),
                ];
    
                if (isset($postData['skills']['id'][$index])) {
                    ResumeSkill::update($postData['skills']['id'][$index], $skillData);
                } else {
                    $skillData['resume_id'] = $resumeId;
                    ResumeSkill::insert($skillData);
                }
            }
        }
    
        if (isset($postData['socials']['platform'])) {
            foreach ($postData['socials']['platform'] as $index => $platform) {
                $socialData = [
                    'platform' => strip_tags($platform),
                    'url' => strip_tags($postData['socials']['url'][$index]),
                ];
    
                if (isset($postData['socials']['id'][$index])) {
                    ResumeSocial::update($postData['socials']['id'][$index], $socialData);
                } else {
                    $socialData['resume_id'] = $resumeId;
                    ResumeSocial::insert($socialData);
                }
            }
        }
    }
    
}
