<?php
namespace App\RepositoryInterface;

interface PromotionsRepositoryInterface{

    public function view();

    public function Store($request);

    public function Create();

    public function destroy($request);


}