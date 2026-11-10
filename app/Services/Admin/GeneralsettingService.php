<?php
namespace App\Services\Admin;
use App\Models\GeneralSetting;
use App\Traits\StoreImageTrait;
use Illuminate\Support\Facades\Storage;

class GeneralsettingService
{
    use StoreImageTrait;

    public function store($request)
    {
        try {
            GeneralSetting::truncate();
            $general_setting = new GeneralSetting;
            if (isset($request['og_image']) && ! empty($request['og_image']) && preg_match('#^data:image.*?base64,#', $request['og_image'])) {
                $og_image = $this->StoreBase64Image($request['og_image'], '/generalsetting/', 'og_image');
            } else {
                $og_image = ($request['og_image']) ? $request['og_image'] : (($general_setting) ? $general_setting->og_image : null);
            }
            $general_setting->company_name = $request['company_name'];
            $general_setting->established_year = $request['established_year'];
            $general_setting->email = $request['email'];
            $general_setting->address = $request['address'];
            $general_setting->phone = $request['phone'];
            $general_setting->og_image = $og_image;
            $general_setting->meta_title = $request['meta_title'];
            $general_setting->meta_description = $request['meta_description'];
            $general_setting->save();
            $response['message'] = 'General setting updated successfully.';
            $response['error'] = null;
            $response['status'] = 202;
            return response()->json($response, $response['status']);
        } catch (\Exception $e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }

    public function imageDelete($request) {
        try {
            $id = $request->id;
            $field_name = $request->field_name;
            $ras = GeneralSetting::where('id', $id)->first();
            if ($ras) {
                Storage::disk('public')->delete('/generalsetting/' . $ras->$field_name);
                $ras->$field_name = '';
                $ras->save();
            }
            $response['message'] = 'Image deleted successfully.';
            $response['error'] = null;
            $response['status'] = 200;
            return response()->json($response, $response['status']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
