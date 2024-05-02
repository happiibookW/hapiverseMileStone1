<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Business;
use App\Models\BusinessHour;
use Illuminate\Support\Facades\Validator;
use App\Models\BusinessProduct;
use PhpParser\Node\Stmt\TryCatch;

class BusinessController extends Controller
{
    public function update(Request $request, $id)
    {
        $business = Business::where('businessId', $id)->first();
        $business->update($request->all());

        return response(['status' => 'Success', 'message' => 'Business information updated successfully'], 200);
    }

    public function orderStatusUpdate(Request $request)
    {

        // try {
                    dd('aa');

            $validator = Validator::make($request->all(), [
                'orderNo' => 'required',
            ]);
            if ($validator->fails()) {
                return response([
                    'status_code' => '422',
                    'status' => 'Error',
                    'message' => 'required fields are missing',
                    'error' => $validator->messages()
                ], 422);
            }
            $authUserId = Auth::user();
            dd($authUserId);
            if ($authUserId->userTypeId == 1) {
            }

            return response(['status_code' => '200', 'status' => 'Success', 'message' => 'registered successfully', 'data' => ''], 200);
        // } catch (Exception $e) {
        //     return response(['status_code' => '500', 'status' => 'Server error', 'message' => 'something went wrong'], 500);
        // }
    }

   public function delete($id)
    {
        BusinessProduct::where('productId', $id)->delete();
        return response(['status' => 'Success', 'message' => 'Get plans list successfully'], 200);
    }

    public function upload(Request $request)
    {
        try {
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                // Get the original name of the uploaded file
                $imageName = $request->file('image')->getClientOriginalName();

                // Get the current year and month
                $currentYear = date('Y');
                $currentMonth = date('m');
                $currentDate = date('d');

                // Create directory if it doesn't exist
                $currentMonth = date('m');
                $directory = public_path('postdoc') . '/' . $currentYear . '/' . $currentMonth. '/'. $currentDate. '/';
                if (!file_exists($directory)) {
                    mkdir($directory, 0755, true);
                }

                // Move the uploaded file to the desired directory
                $request->file('image')->move($directory, $imageName);

                return response()->json(['message' => 'Image uploaded successfully.','image'=>$imageName]);
            } else {
                return response()->json(['error' => 'No valid file uploaded.'], 400);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function saveProfileImages(Request $request) {
        $businessId = $request->businessId;
        $featureImageUrl = $request->featureImageUrl;
        $logoImageUrl = $request->logoImageUrl;

        // Update Feature Image
        if (!empty($featureImageUrl)) {
            if ($request->hasFile('featureImageUrl')) {
                $featureFileName = time() . '_feature.' . $request->file('featureImageUrl')->getClientOriginalExtension();
                // Move and store the feature image file
                $request->file('featureImageUrl')->move(public_path('business/profile'), $featureFileName);
                // Update the database with the new feature image URL
                Business::where('businessId', $businessId)->update([
                    'featureImageUrl' => 'business/profile/' . $featureFileName,
                ]);
            }
        }

        // Update Logo Image
        if (!empty($logoImageUrl)) {
            if ($request->hasFile('logoImageUrl')) {
                $logoFileName = time() . '_logo.' . $request->file('logoImageUrl')->getClientOriginalExtension();
                // Move and store the logo image file
                $request->file('logoImageUrl')->move(public_path('business/profile'), $logoFileName);
                // Update the database with the new logo image URL
                Business::where('businessId', $businessId)->update([
                    'logoImageUrl' => 'business/profile/' . $logoFileName,
                ]);
            }
        }

        // Respond with success message
        return response()->json(['status' => true, 'message' => 'Images updated successfully']);
    }

    public function saveBusinessProfileData(Request $request){

        $businessId = $request->businessId;
        Business::where('businessId', $businessId)->update([
            'businessName' => $request->businessName,
            'ownerName' => $request->ownerName,
            'businessContact' => $request->businessContact
        ]);

        $hoursIds = explode(",", $request->input('hoursId'));
        $days = explode(",", $request->input('day'));
        $openTimes = explode(",", $request->input('openTime'));
        $closeTimes = explode(",", $request->input('closeTime'));

        foreach ($hoursIds as $index => $hourId) {
            $businessHour = BusinessHour::where('hoursId',$hourId)->first();

            if ($businessHour) {
                $businessHour->update([
                    'day' => $days[$index],
                    'openTime' => $openTimes[$index],
                    'closeTime' => $closeTimes[$index]
                ]);
            }
        }
        return response()->json(['message' => 'Business hours updated successfully.']);
    }

    public function saveBusinessHours(Request $request){

        try {
            $businessId = $request->businessId;
            $hoursIds = explode(",", $request->input('hoursId'));
            $openTimes = explode(",", $request->input('openTime'));
            $closeTimes = explode(",", $request->input('closeTime'));
            // $days = explode(",", $request->input('day'));

            foreach ($hoursIds as $index => $hourId) {

                $businessHour = BusinessHour::where([['businessId',$businessId],['hoursId',$hourId]])->first();
                if ($businessHour) {
                    $businessHour->update([
                        // 'day' => $days[$index],
                        'openTime' => date('H:i:s', strtotime($openTimes[$index])),
                        'closeTime' => date('H:i:s', strtotime($closeTimes[$index]))
                    ]);
                }
            }
            return response()->json(['message' => 'Business hours updated successfully.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()]);
        }

    }

}
