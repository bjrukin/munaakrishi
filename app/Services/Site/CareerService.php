<?php
namespace App\Services\Site;

use App\Jobs\Site\CareerJob;
use App\Jobs\Site\CareerCvJob;
use App\Traits\StoreImageTrait;
use Illuminate\Support\Carbon;

class CareerService
{
    use StoreImageTrait;
    public function submit($request)
    {

        try {
            $cv = ($request['cv']) ? $this->StoreBase64File($request['cv'], '/cv/') : null;
            $email_data = array(
                'job_name' => $request['job_name'],
                'name' => $request['name'],
                'email' => $request['email'],
                'phone_number' => $request['phone_number'],
                'inquiry' => $request['inquiry'],
                'cv' => $cv,
                'subject' => 'Job Apply',
            );
            $jobToDispatch = (new CareerJob($email_data))->delay(Carbon::now()->addSeconds(1));
            dispatch($jobToDispatch);
            $jobToDispatch = (new CareerCvJob($email_data))->delay(Carbon::now()->addMinutes(20));
            dispatch($jobToDispatch);
            $response['message'] = "Thank you for applying.";
            $response['error'] = null;
            $response['status'] = 200;
            return response()->json($response, $response['status']);
        } catch (\Exception $e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }

    }

}
