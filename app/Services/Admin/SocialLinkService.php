<?php
namespace App\Services\Admin;

use App\Models\SocialLink;

class SocialLinkService
{

    public function store($request)
    {
        try {
            SocialLink::truncate();
            $sociallink = new SocialLink;
            $sociallink->facebook = $request['facebook'];
            $sociallink->instagram = $request['instagram'];
            $sociallink->youtube = $request['youtube'];
            $sociallink->pinterest = $request['pinterest'];
            $sociallink->x = $request['x'];
            $sociallink->linkedin = $request['linkedin'];
            $sociallink->whatsapp = $request['whatsapp'];
            $sociallink->save();
            $response['message'] = 'Social link updated successfully.';
            $response['error'] = null;
            $response['status'] = 202;
            return response()->json($response, $response['status']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
