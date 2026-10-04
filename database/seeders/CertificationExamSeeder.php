<?php

namespace Database\Seeders;

use App\Models\CertificationExam;
use Illuminate\Database\Seeder;

class CertificationExamSeeder extends Seeder
{
    public function run(): void
    {
        $exams = [
            ['slug' => 'aws-saa', 'title' => 'AWS Solutions Architect', 'provider' => 'Amazon', 'questions' => 65, 'minutes' => 130, 'notes' => 'Складний іспит для архітекторів AWS'],
            ['slug' => 'azure-admin', 'title' => 'Azure Administrator', 'provider' => 'Microsoft', 'questions' => 50, 'minutes' => 100, 'notes' => 'Адміністрування хмарних сервісів'],
            ['slug' => 'gcp-architect', 'title' => 'GCP Professional Architect', 'provider' => 'Google', 'questions' => 60, 'minutes' => 120, 'notes' => 'Архітектура Google Cloud'],
            ['slug' => 'cisco-ccna', 'title' => 'Cisco CCNA', 'provider' => 'Cisco', 'questions' => 100, 'minutes' => 120, 'notes' => 'Мережеві технології Cisco'],
            ['slug' => 'comptia-sec', 'title' => 'CompTIA Security+', 'provider' => 'CompTIA', 'questions' => 90, 'minutes' => 90, 'notes' => 'Основи кібербезпеки', 'urgent' => true, 'justification' => 'Потрібен для роботи вже наступного тижня'],
            ['slug' => 'pmp', 'title' => 'Project Management Professional', 'provider' => 'PMI', 'questions' => 180, 'minutes' => 230, 'notes' => 'Управління проєктами'],
            ['slug' => 'itil-foundation', 'title' => 'ITIL Foundation', 'provider' => 'AXELOS', 'questions' => 40, 'minutes' => 60, 'notes' => 'IT-сервіс менеджмент'],
            ['slug' => 'scrum-master', 'title' => 'Professional Scrum Master I', 'provider' => 'Scrum.org', 'questions' => 80, 'minutes' => 60, 'notes' => 'Scrum методологія'],
            ['slug' => 'oracle-java', 'title' => 'Oracle Java SE 11', 'provider' => 'Oracle', 'questions' => 80, 'minutes' => 180, 'notes' => 'Програмування на Java'],
        ];

        foreach ($exams as $exam) {
            CertificationExam::create($exam);
        }
    }
}
