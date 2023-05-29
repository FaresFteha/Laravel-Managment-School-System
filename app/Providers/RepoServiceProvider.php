<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\RepositoryInterface\GradesRepositoryInterface',
            'App\Repository\GradesRepository'
        );
        $this->app->bind(
            'App\RepositoryInterface\ClassroomsRepositoryInterface',
            'App\Repository\ClassroomsRepository'
        );

        $this->app->bind(
            'App\RepositoryInterface\SectionsRepositoryInterface',
            'App\Repository\SectionsRepository'
        );

        $this->app->bind(
            'App\RepositoryInterface\TeacherRepositoryInterface',
            'App\Repository\TeacherRepository'
        );

        //
        $this->app->bind(
            'App\RepositoryInterface\StudentsRepositoryInterface',
            'App\Repository\StudentsRepository'
        );
        //
        $this->app->bind(
            'App\RepositoryInterface\PromotionsRepositoryInterface',
            'App\Repository\PromotionsRepository'
        );

        $this->app->bind(
            'App\RepositoryInterface\GraudatedRepositoryInterface',
            'App\Repository\GraudatedRepository'
        );

        $this->app->bind(
            'App\RepositoryInterface\FeesRepositoryInterface',
            'App\Repository\FeesRepository'
        );

        
        $this->app->bind(
            'App\RepositoryInterface\FeeIncoicesRepositoryInterface',
            'App\Repository\FeeInvoicesRepository'
        );

        $this->app->bind(
            'App\RepositoryInterface\ReceiptRepositoryInterface',
            'App\Repository\ReceiptRepository'
        );
        
        $this->app->bind(
            'App\RepositoryInterface\ProccessingIncoicesRepositoryInterface',
            'App\Repository\ProccessingIncoicesRepository'
        );

             
        $this->app->bind(
            'App\RepositoryInterface\PaymentRepositoryInterface',
            'App\Repository\PaymentRepository'
        );

        $this->app->bind(
            'App\RepositoryInterface\AttendanceRepositoryInterface',
            'App\Repository\AttendanceRepository'
        );

        $this->app->bind(
            'App\RepositoryInterface\SubjectRepositoryInterface',
            'App\Repository\SubjectRepository'
        );

        $this->app->bind(
            'App\RepositoryInterface\ExamsRepositoryInterface',
            'App\Repository\ExamsRepository'
        );

        $this->app->bind(
            'App\RepositoryInterface\QuizzesRepositoryInterface',
            'App\Repository\QuizzesRepository'
        );

        $this->app->bind(
            'App\RepositoryInterface\StudentsAvaregeRepositoryInterface',
            'App\Repository\StudentsAvaregeRepository'
        );

        $this->app->bind(
            'App\RepositoryInterface\ZoomRepositoryInterface',
            'App\Repository\ZoomRepository'
        );

        $this->app->bind(
            'App\RepositoryInterface\UsersRepositoryInterface',
            'App\Repository\UsersRepository'
        );

        $this->app->bind(
            'App\RepositoryInterface\RolesRepositoryInterface',
            'App\Repository\RolesRepository'
        );

        $this->app->bind(
            'App\RepositoryInterface\AcademicyearsRepositoryInterface',
            'App\Repository\AcademicyearsRepository'
        );

        $this->app->bind(
            'App\RepositoryInterface\QuestionsRepositoryInterface',
            'App\Repository\QuestionsRepository'
        );

        $this->app->bind(
            'App\RepositoryInterface\LibraryRepositoryInterface',
            'App\Repository\LibraryRepository'
        );

     
    }



    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
