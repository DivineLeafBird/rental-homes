<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\Slider;
use App\Models\County;
use App\Models\Region;
use App\Models\Category;
use App\Models\Home;
use App\Models\Amenity;
use App\Models\AmenHome;
use App\Models\Blog;
use App\Models\Imageshome;
use App\Models\Application;
use App\Models\Schedule;
use App\Models\Tenant;
use App\Models\Message;


class AdminController extends Controller
{
    public function admlogout()
    {

        $redirectTo = '/login';



        Auth::logout();

        return Redirect::to($redirectTo);
    }


    public function view_about()
    {
        $counties = County::all();
        return view('admin.pages.about', compact('counties'));
    }

    public function view_contact()
    {
        $counties = County::all();
        return view('admin.pages.contact', compact('counties'));
    }


    // Slider Adding

    public function view_slideshow()
    {
        $imageslide = Slider::all();
        $counties = County::all();

        return view('admin.pages.slideshow', compact('imageslide', 'counties'));
    }

    public function update_slider(Request $request)
    {

        $slideshows = new Slider;
        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('slider', $imagename);
        $slideshows->image = $imagename;


        $slideshows->save();

        return redirect()->back()->with('message', 'Slider-Image Successfully Updated!');
    }

    public function delete_slider($id)
    {
        $slideshow = Slider::find($id);
        $slideshow->delete();

        return redirect()->back()->with('message', 'Slider-Image Successfully Deleted!');
    }

    // Geo Location

    public function  add_county(Request $request)
    {
        // Create a new county
        $county = new County();
        $county->name = $request->input('county_name');
        $county->latitude = $request->input('county_latitude');
        $county->longitude = $request->input('county_longitude');
        $county->save();

        return redirect()->back()->with('message', 'County Successfully Added!');
    }

    public function add_region(Request $request)
    {
        // Create a new region
        $region = new Region();
        $region->name = $request->input('region_name');
        $region->latitude = $request->input('region_latitude');
        $region->longitude = $request->input('region_longitude');
        $region->county_id = $request->input('county');

        // Calculate and save the distance
        // Retrieve source and destination points from the database
        $id_county = $request->input('county');
        $county = County::find($id_county);

        if ($county !== NULL) {
            $centerLat = $county->latitude;
            $centerLon = $county->longitude;

            $regionLat = $request->input('region_latitude');
            $regionLon = $request->input('region_longitude');

            $truncatedDistance = $region->calculateDistance($centerLat, $centerLon, $regionLat, $regionLon);

            $region->distance = $truncatedDistance;

            $region->save();

            return redirect()->back()->with('message', 'Region Successfully Added!');
        } else {
            // Handle the case when the central point is not found
            return redirect()->back()->with('error', 'Central Point Not Found!');
        }
    }

    // Adding Categories

    public function view_category()
    {
        $counties = County::all();
        $categories = Category::all();

        return view('admin.pages.category', compact('counties', 'categories',));
    }

    public function add_category(Request $request)
    {
        $category = new Category;
        $category->category_name = $request->input('category_name');
        $category->save();

        return redirect()->back()->with('message', 'Category Succefully Added!');
    }

    public function delete_category($id)
    {
        $categories = Category::find($id);
        $categories->delete();

        return redirect()->back()->with('message', 'Category Successfully Deleted!');
    }

    // Amenities Available

    public function view_amenities()
    {
        $counties = County::all();
        $amenities = Amenity::all();

        return view('admin.pages.amenities', compact('counties', 'amenities'));
    }


    public function add_amenity(Request $request)
    {
        $amenity = new Amenity;
        $amenity->name = $request->input('amenity_name');
        $amenity->save();

        return redirect()->back()->with('message', 'Amenity Succefully Added!');
    }

    public function delete_amenity($id)
    {
        $amenities = Amenity::find($id);
        $amenities->delete();

        return redirect()->back()->with('message', 'Amenity Successfully Deleted!');
    }

    // Create a Home

    public function new_home()
    {
        $counties = County::all();
        $categories = Category::all();
        $regions = Region::all();
        $amenities = Amenity::all();

        return view('admin.pages.add_home', compact('counties', 'categories', 'regions', 'amenities'));
    }

    public function add_home(Request $request)
    {
        $newHome = new Home();

        // save house details

        $newHome->house_name = $request->input('house_name');

        $newHome->category_id = $request->input('category_name');

        $category_id = $request->input('category_name');
        $category = Category::findOrFail($category_id);
        $newHome->category_name = $category->category_name;

        $thumbnail = $request->thumbnail;
        $thumbnail_name = time() . '.' . $thumbnail->getClientOriginalExtension();
        $request->thumbnail->move('thumbnails', $thumbnail_name);
        $newHome->thumbnail = $thumbnail_name;


        $newHome->short_desc = $request->input('short_desc');
        $newHome->description = $request->input('description');
        $newHome->inventory = $request->input('inventory');
        $newHome->rent_price = $request->input('rent_price');
        $newHome->discount = $request->input('discount');

        $newHome->county_id = $request->input('county');
        $newHome->region_id = $request->input('region');

        $county_id = $request->input('county');
        $county = County::findOrFail($county_id);
        $newHome->county = $county->name;

        $region_id = $request->input('region');
        $region = Region::findOrFail($region_id);
        $newHome->region = $region->name;

        // calculate Distance

        $id_county =  $request->input('county');
        $count = County::findOrFail($id_county);

        if ($count !== NULL) {
            $centerLat = $count->latitude;
            $centerLon = $count->longitude;

            $id_region = $request->input('region');
            $regi = Region::findOrFail($id_region);
            $regionLat = $regi->latitude;
            $regionLon = $regi->longitude;

            $truncatedDistance = $newHome->calculateDistance($centerLat, $centerLon, $regionLat, $regionLon);

            $newHome->distance_county_center = $truncatedDistance;
        }

        // save video

        $request->validate([
            'video' => 'required|mimes:mp4,ogx,oga,ogg,ogv,webm'
        ]);

        $video = $request->file('video');
        $video->move('videos', $video->getClientOriginalName());
        $filename = $video->getClientOriginalName();
        $newHome->video = $filename;

        $newHome->landlord_name = $request->input('landlord_name');
        $newHome->phone_number = $request->input('phone_number');

        $newHome->save();

        // Home Id

        $homeId = $newHome->id;

        // Amenities

        $selectedAmenities = $request->input('amenities', []);

        // Save the selected amenities for the home
        foreach ($selectedAmenities as $amenityId) {
            $amenity = Amenity::find($amenityId);

            $AmenModel =  new AmenHome();
            $AmenModel->amenity_name = $amenity->name;
            $AmenModel->amenity_id = $amenity->id;
            $AmenModel->home_name = $request->input('house_name');
            $AmenModel->home_id = $homeId;
            $newHome->amenhomes()->save($AmenModel);
        }


        // save Images


        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $image->move('homeimages', $image->getClientOriginalName());
                $ImagesModel = new Imageshome();
                $ImagesModel->home_name = $request->input('house_name');
                $ImagesModel->home_id = $homeId;
                $ImagesModel->original_name = $image->getClientOriginalName();
                $newHome->imageshomes()->save($ImagesModel);
            }
        }

        return redirect()->back()->with('message', 'Home Successfully Added!');
    }

    // Home View

    public function view_homes()
    {
        $counties = County::all();
        $home = Home::all();
        return view('admin.pages.view_homes', compact('counties', 'home'));
    }

    public function show_home($id)
    {
        $home = Home::find($id);
        $counties = County::all();
        $categories = Category::all();
        $regions = Region::all();
        $amenities = Amenity::all();

        $selectedAmenities = AmenHome::where('home_id', $id)->pluck('id')->toArray();


        return view('admin.pages.show_home', compact('home', 'counties', 'categories', 'regions', 'amenities', 'selectedAmenities'));
    }

    public function delete_home($id)
    {
        $home = Home::find($id);

        $home->delete();

        return redirect('/view_homes')->with('message', 'Home Successfully Deleted!');
    }


    // Update Home details

    public function update_home(Request $request, $home)
    {
        $homme = Home::findOrFail($home);

        $homme->house_name = $request->input('house_name');

        $homme->category_id = $request->input('category_name');

        $category_id = $request->input('category_name');
        $category = Category::findOrFail($category_id);
        $homme->category_name = $category->category_name;

        $thumbnail = $request->thumbnail;
        if ($thumbnail) {
            $thumbnail_name = time() . '.' . $thumbnail->getClientOriginalExtension();
            $request->thumbnail->move('thumbnails', $thumbnail_name);
            $homme->thumbnail = $thumbnail_name;
        }



        $homme->short_desc = $request->input('short_desc');
        $homme->description = $request->input('description');
        $homme->inventory = $request->input('inventory');
        $homme->rent_price = $request->input('rent_price');
        $homme->discount = $request->input('discount');

        $homme->county_id = $request->input('county');
        $homme->region_id = $request->input('region');

        $county_id = $request->input('county');
        $county = County::findOrFail($county_id);
        $homme->county = $county->name;

        $region_id = $request->input('region');
        $region = Region::findOrFail($region_id);
        $homme->region = $region->name;

        // calculate Distance

        $id_county =  $request->input('county');
        $count = County::findOrFail($id_county);

        if ($count !== NULL) {
            $centerLat = $count->latitude;
            $centerLon = $count->longitude;

            $id_region = $request->input('region');
            $regi = Region::findOrFail($id_region);
            $regionLat = $regi->latitude;
            $regionLon = $regi->longitude;

            $truncatedDistance = $homme->calculateDistance($centerLat, $centerLon, $regionLat, $regionLon);

            $homme->distance_county_center = $truncatedDistance;
        }


        $homme->landlord_name = $request->input('landlord_name');
        $homme->phone_number = $request->input('phone_number');

        // save Images

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('homeimages');

                $ImagesModel = new Imageshome();
                $ImagesModel->home_name = $request->input('house_name');
                $ImagesModel->original_name = $image->getClientOriginalName();
                $ImagesModel->filename = $path;
                $ImagesModel->save();
            }
        }

        // save video

        $request->validate([
            'video' => 'required|mimes:mp4,ogx,oga,ogg,ogv,webm'
        ]);

        $video = $request->file('video');
        if ($video) {
            $video->move('public/videos', $video->getClientOriginalName());
            $filename = $video->getClientOriginalName();
            $homme->video = $filename;
        }

        // Amenities

        $selectedAmenities = $request->input('amenities', []);

        // Save the selected amenities for the home
        foreach ($selectedAmenities as $amenityId) {
            $amenity = Amenity::find($amenityId);

            $AmenModel =  new AmenHome();
            $AmenModel->amenity_name = $amenity->name;
            $AmenModel->amenity_id = $amenity->id;
            $AmenModel->home_name = $request->input('house_name');

            $AmenModel->save();
        }

        $homme->save();

        return view('admin.pages.show_home')->with('message', 'Home Successfully Updated!');
    }

    public function sent_applications()
    {
        $counties = County::all();
        $applications = Application::all();

        foreach ($applications as $application) {
            $home = $application->home_id;
            $homeRecords = Home::Where('id', $home)->get();
        }

        return view('admin.pages.rent_applications', compact('counties', 'applications', 'homeRecords'));
    }

    public function approve_application($approve)
    {
        // Ensure $approve is a valid application ID.
        $application = Application::find($approve);

        if (!$application) {
            return redirect()->back()->with('message_type', 'error')->with('message', 'Application not found.');
        }

        // Check if the application is already approved.
        if ($application->application_status === 'Approved') {
            return redirect()->back()->with('message_type', 'warning')->with('message', 'Application is already approved.');
        }

        // Update the application status to 'Approved'.
        $application->application_status = 'Approved';
        $application->save();

        if ($application) {

            $newMessage = new Message();

            $admin = User::Where('usertype', 1)->first();

            $newMessage->sender_id = $admin->id;
            $newMessage->sender_name = $admin->name;

            $receipient = Application::Where('id', $approve)->first();

            $newMessage->receipient_id = $receipient->user_id;
            $newMessage->receipient_name = $receipient->name;


            $newMessage->message = 'Hello , your application has been APPROVED you can proceed to payment.';

            $newMessage->save();
        }

        return redirect()->back()->with('message_type', 'success')->with('message', 'Rent Application successfully approved!');
    }

    public function decline_application($decline)
    {
        // Ensure $decline is a valid application ID.
        $application = Application::find($decline);

        if (!$application) {
            return redirect()->back()->with('message_type', 'error')->with('message', 'Application not found.');
        }

        // Check if the application is already declined.
        if ($application->application_status === 'Declined') {
            return redirect()->back()->with('message_type', 'warning')->with('message', 'Application is already declined.');
        }

        // Update the application status to 'Declined'.
        $application->application_status = 'Declined';
        $application->save();

        if ($application) {

            $newMessage = new Message();

            $admin = User::Where('usertype', 1)->first();

            $newMessage->sender_id = $admin->id;
            $newMessage->sender_name = $admin->name;

            $receipient = Application::Where('id', $decline)->first();

            $newMessage->receipient_id = $receipient->user_id;
            $newMessage->receipient_name = $receipient->name;

            $newMessage->message = 'Hello , your application has been DECLINED. Please contact us for any queries.';

            $newMessage->save();
        }

        return redirect()->back()->with('message_type', 'success')->with('message', 'Rent Application successfully declined.');
    }

    public function sent_appointments()
    {
        $counties = County::all();
        $appointments = Schedule::all();

        foreach ($appointments as $appointment) {
            $home = $appointment->home_id;
            $homeRecords = Home::Where('id', $home)->get();
        }

        return view('admin.pages.tour_appointment', compact('counties', 'appointments', 'homeRecords'));
    }


    public function approve_appointment($approve)
    {
        // Ensure $approve is a valid application ID.
        $appointment = Schedule::find($approve);

        if (!$appointment) {
            return redirect()->back()->with('message_type', 'error')->with('message', 'Application not found.');
        }

        // Check if the application is already approved.
        if ($appointment->application_status === 'Approved') {
            return redirect()->back()->with('message_type', 'warning')->with('message', 'Application is already approved.');
        }

        // Update the application status to 'Approved'.
        $appointment->application_status = 'Approved';
        $appointment->save();

        if ($appointment) {

            $newMessage = new Message();

            $admin = User::Where('usertype', 1)->first();

            $newMessage->sender_id = $admin->id;
            $newMessage->sender_name = $admin->name;

            $receipient = Schedule::Where('id', $approve)->first();

            $newMessage->receipient_id = $receipient->user_id;
            $newMessage->receipient_name = $receipient->name;

            $newMessage->message = 'Hello, your appointment has been APPROVED. Please be punctual.';

            $newMessage->save();
        }

        return redirect()->back()->with('message_type', 'success')->with('message', 'Rent Application successfully approved!');
    }

    public function decline_appointment($decline)
    {
        // Ensure $decline is a valid application ID.
        $appointment = Schedule::find($decline);

        if (!$appointment) {
            return redirect()->back()->with('message_type', 'error')->with('message', 'Application not found.');
        }

        // Check if the application is already declined.
        if ($appointment->application_status === 'Declined') {
            return redirect()->back()->with('message_type', 'warning')->with('message', 'Application is already declined.');
        }

        // Update the application status to 'Declined'.
        $appointment->application_status = 'Declined';
        $appointment->save();

        if ($appointment) {

            $newMessage = new Message();

            $admin = User::Where('usertype', 1)->first();

            $newMessage->sender_id = $admin->id;
            $newMessage->sender_name = $admin->name;

            $receipient = Schedule::Where('id', $decline)->first();

            $newMessage->receipient_id = $receipient->user_id;
            $newMessage->receipient_name = $receipient->name;

            $newMessage->message = 'Hello , your appointment has been DECLINED. Our tour agents are fully booked please book for next week.';

            $newMessage->save();
        }

        return redirect()->back()->with('message_type', 'success')->with('message', 'Rent Application successfully declined.');
    }

    public function tenants()
    {
        $counties = County::all();

        $tenants = Tenant::with('home')->get();


        return view('admin.pages.tenants', compact('counties', 'tenants'));
    }




    public function messages()
    {
        $counties = County::all();
        $admin = User::where('name', 'Admin')->first();

        $messages = Message::where('receipient_name', 'Admin')->get();


        return view('admin.pages.messages', compact('counties', 'messages'));
    }

    public function adm_reply(Request $request, $user)
    {
        $newMessage = new Message();

        $newMessage->sender_id =  auth()->user()->id;
        $newMessage->sender_name =  auth()->user()->name;

        $newMessage->receipient_id =  $user;
        $newMessage->receipient_name = User::Where('id', $user)->value('name');

        $newMessage->message = $request->input('message');

        $newMessage->save();

        if ($newMessage) {
            // Redirect with success message
            return redirect()->back()->with('message_type', 'success')->with('message', 'Message sent successful!');
        } else {
            // Redirect back with error message
            return redirect()->back()->with('message_type', 'error')->with('message', 'An Error Occurred try again.');
        }
    }
}
