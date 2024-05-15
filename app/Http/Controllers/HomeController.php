<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\Slider;
use App\Models\County;
use App\Models\Region;
use App\Models\AmenHome;
use App\Models\Schedule;
use App\Models\Tenant;
use App\Models\Application;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Community;
use App\Models\Home;
use App\Models\Imageshome;
use App\Models\Message;


class HomeController extends Controller
{

    public function index()
    {
        $slideshows = Slider::all();
        $homes = Home::paginate(5);

        // Randomly pick one home
        $randomHome = Home::inRandomOrder()->first();

        $amenityIcons = [
            'Free Parking' => 'bi bi-p-circle icons',
            'Top Security' => 'bi bi-shield-check icons',
            'Fresh Water' =>  'bi bi-droplet',
            'Free WiFi' =>    'bi bi-wifi icons',
            'Electricity' =>  'bi bi-lightning-charge',
            'Strong Signal' => 'bi bi-bar-chart',
            'Garden' =>        'bi bi-tree',
            'Lobby' =>         'bi bi-bricks',
            'Fan' =>           'bi bi-fan',
            'Spa' =>           'bi bi-brightness-alt-high',
            'Bar' =>           'bi bi-cup-straw',
            'Airport logistics' => 'bi bi-airplane icons',
        ];

        $amenitiesrand = [];
        $images = [];

        if ($randomHome) {
            $amenitiesrand = AmenHome::where('home_id', $randomHome->id)->get();
            $images = Imageshome::where('home_id', $randomHome->id)->get();
        }

        $amenities = [];
        foreach ($homes as $home) {
            $amenities[$home->id] = AmenHome::where('home_id', $home->id)->get();
        }

        return view('home.userpage', compact('slideshows', 'homes', 'amenityIcons', 'amenities', 'randomHome', 'amenitiesrand', 'images'));
    }


    public function redirect()
    {
        if (Auth::check()) {

            $usertype = Auth::user()->usertype;

            if ($usertype == null) {

                return redirect('/');
            } elseif ($usertype == '1') {
                $counties = County::all();

                $homes = Home::all();
                $tenants = Tenant::all();

                $pend_app = Application::Where('application_status', 'pending')->get();

                $pend_apt = Schedule::Where('application_status', 'pending')->get();

                // Fetch all unique home IDs from the Tenants table
                $uniqueHomeIds = Tenant::select('home_id')->distinct()->pluck('home_id');

                $totalRevenue = 0;

                foreach ($uniqueHomeIds as $homeId) {
                    $home = Home::find($homeId);

                    if ($home) {
                        $revenueForHome = 0;

                        $tenants = Tenant::where('home_id', $homeId)->get();

                        foreach ($tenants as $tenant) {
                            $rentalDuration = $tenant->rental_duration;
                            $monthlyPrice = $home->rent_price;
                            $revenueForHome += $rentalDuration * $monthlyPrice;
                        }

                        $totalRevenue += $revenueForHome;
                    }
                }


                return view('admin.home', compact('counties', 'homes', 'tenants', 'pend_app', 'pend_apt', 'totalRevenue'));
            } else {

                $slideshows = Slider::all();
                $homes = Home::paginate(5);

                // Randomly pick one home
                $randomHome = Home::inRandomOrder()->first();

                $amenityIcons = [
                    'Free Parking' => 'bi bi-p-circle icons',
                    'Top Security' => 'bi bi-shield-check icons',
                    'Fresh Water' =>  'bi bi-droplet',
                    'Free WiFi' =>    'bi bi-wifi icons',
                    'Electricity' =>  'bi bi-lightning-charge',
                    'Strong Signal' => 'bi bi-bar-chart',
                    'Garden' =>        'bi bi-tree',
                    'Lobby' =>         'bi bi-bricks',
                    'Fan' =>           'bi bi-fan',
                    'Spa' =>           'bi bi-brightness-alt-high',
                    'Bar' =>           'bi bi-cup-straw',
                    'Airport logistics' => 'bi bi-airplane icons',
                ];

                $amenitiesrand = [];
                $images = [];

                if ($randomHome) {
                    $amenitiesrand = AmenHome::where('home_id', $randomHome->id)->get();
                    $images = Imageshome::where('home_id', $randomHome->id)->get();
                }

                $amenities = [];
                foreach ($homes as $home) {
                    $amenities[$home->id] = AmenHome::where('home_id', $home->id)->get();
                }



                return view('home.userpage', compact('slideshows', 'homes', 'amenityIcons', 'amenities', 'randomHome', 'amenitiesrand', 'images'));
            }
        } else {
            return redirect('/login');
        }
    }

    public function logout()
    {


        Auth::logout();

        return Redirect::to('/');
    }

    public function users()
    {
        $data = User::all();
        return view('home.header', compact('data'));
    }

    public function category()
    {
        $homes = Home::all();
        return view('home.category', compact('homes'));
    }

    public function home_details($home)
    {
        $data = Home::findOrFail($home);
        $images = Imageshome::Where('home_id', $home)->get();

        $amenityIcons = [

            'Free Parking' => 'bi bi-p-circle icons',
            'Top Security' => 'bi bi-shield-check icons',
            'Fresh Water' =>  'bi bi-droplet',
            'Free WiFi' =>    'bi bi-wifi icons',
            'Electricity' =>  'bi bi-lightning-charge',
            'Strong Signal' => 'bi bi-bar-chart',
            'Garden' =>        'bi bi-tree',
            'Lobby' =>         'bi bi-bricks',
            'Fan' =>           'bi bi-fan',
            'Spa' =>           'bi bi-brightness-alt-high',
            'Bar' =>           'bi bi-cup-straw',
            'Airport logistics' => 'bi bi-airplane icons',
        ];

        $amenities = AmenHome::Where('home_id', $home)->get();

        return view('home.home_details', compact('data', 'images', 'amenityIcons', 'amenities'));
    }

    public function application_form($form)
    {
        if (Auth::check()) {
            $home = Home::findOrFail($form);
            return view('home.application', compact('home'));
        } else {

            return redirect::to('/login');
        }
    }

    public function rent_application(Request $request, $home_id)
    {
        $newApplication = new Application();

        $userID = auth()->user()->id;

        $newApplication->user_id = $userID;
        $newApplication->home_id = $home_id;
        $newApplication->name = $request->input('name');
        $newApplication->email = $request->input('email');
        $newApplication->phone = $request->input('phone');
        $newApplication->dob = $request->input('dob');
        $newApplication->id_number = $request->input('national_id');
        $newApplication->move_in_date = $request->input('move_in_date');
        $newApplication->rental_duration = $request->input('rental_duration');
        $newApplication->total_rent = $request->input('total_rent');
        $newApplication->more_info = $request->input('comments');

        $newApplication->save();


        $user = User::findorFail($userID);
        $user->dob = $request->input('dob');
        $user->id_number = $request->input('national_id');

        // Check if the input values are not empty and different from the current values
        if (!empty($dob) && $dob !== $user->dob) {
            $user->dob = $dob;
        }

        if (!empty($nationalId) && $nationalId !== $user->id_number) {
            $user->id_number = $nationalId;
        }


        $user->save();

        if ($newApplication) {
            $newMessage = new Message();

            $admin = User::Where('usertype', 1)->first();

            $newMessage->sender_id = $admin->id;
            $newMessage->sender_name = $admin->name;

            $newMessage->receipient_id = auth()->user()->id;
            $newMessage->receipient_name = auth()->user()->name;

            $newMessage->message = 'Hi ' . auth()->user()->name . ', we have received your application and it is currently being processed. We\'ll get back to you shortly. Thank you!';

            $newMessage->save();
        }

        return redirect()->back()->with('message', 'Application Successfully Sent!');
    }


    public function schedule_home($schedule)
    {
        if (Auth::check()) {
            $home = Home::findOrFail($schedule);

            return view('home.appointment_form', compact('home'));
        } else {
            return redirect::to('/login');
        }
    }

    public function schedule_appointment(Request $request, $home)
    {
        $newShedule = new Schedule();

        $userID = auth()->user()->id;
        $newShedule->user_id = $userID;
        $newShedule->home_id = $home;
        $newShedule->name = $request->input('name');
        $newShedule->email = $request->input('email');
        $newShedule->phone = $request->input('phone');
        $newShedule->id_number = $request->input('national_id');
        $newShedule->tour_date = $request->input('tour_date');
        $newShedule->tour_time = $request->input('tour_time');
        $newShedule->more_info = $request->input('comments');

        $newShedule->save();

        $user = User::findorFail($userID);
        $user->id_number = $request->input('national_id');

        if (!empty($nationalId) && $nationalId !== $user->id_number) {
            $user->id_number = $nationalId;
        }

        $user->save();

        if ($newShedule) {

            $newMessage = new Message();

            $admin = User::Where('usertype', 1)->first();

            $newMessage->sender_id = $admin->id;
            $newMessage->sender_name = $admin->name;

            $newMessage->receipient_id = auth()->user()->id;
            $newMessage->receipient_name = auth()->user()->name;

            $newMessage->message = 'Hello ' . auth()->user()->name . ', we have received your appointment request and it is currently being processed. We\'ll get back to you shortly. Thank you!';

            $newMessage->save();
        }

        return redirect()->back()->with('message', 'Application Successfully Sent!');
    }


    public function application_status()
    {
        $applications = Application::with('home')
            ->where('user_id', auth()->user()->id)
            ->get();

        return view('home.application_status', compact('applications'));
    }


    public function appointment_status()
    {
        $appointments = Schedule::with('home')
            ->where('user_id', auth()->user()->id)
            ->get();

        return view('home.appointment_status', compact('appointments'));
    }

    public function delete_application($delete)
    {
        $delete_application = Application::findOrFail($delete);

        $delete_application->delete();

        return redirect()->back()->with('message_type', 'error')->with('message', ' Application Deleted Successfully! ');
    }


    public function make_payment($pay)
    {
        $payment = Application::Where('id', $pay)->first();
        return view('home.payment', compact('payment'));
    }

    public function process_payment(Request $request, $app, $total)
    {

        $application = Application::Where('id', $app)->first();

        $cardName = $request->input('name_on_card');
        $cardNumber = str_replace(' ', '', $request->input('cardNumber')); // Remove spaces from card number
        $expiry = $request->input('expiry');
        $cvv = $request->input('cvv');

        // Validate card details
        $validCard = $this->validateCardDetails($cardNumber, $expiry, $cvv);

        if ($validCard) {

            // Update the application status to 'Paid'.
            $application->application_status = 'Paid';
            $application->save();

            if ($application) {
                $home = Home::findOrFail($application->home_id);
                if ($home) {
                    $home->decrement('inventory', 1);
                    $home->save();
                }
            }

            if ($application) {

                // Get the authenticated user's ID
                $userId = auth()->user()->id;

                $newTenant = new Tenant();

                $newTenant->user_id = $userId;

                $newTenant->home_id = $application->home_id;
                $newTenant->name = $application->name;
                $newTenant->email = $application->email;
                $newTenant->dob = $application->dob;
                $newTenant->id_number = $application->id_number;
                $newTenant->phone = $application->phone;
                $newTenant->move_in_date = $application->move_in_date;
                $newTenant->rental_duration = $application->rental_duration;

                $rentDurationInMonths = $newTenant->rental_duration;

                // Calculate the lease expiry date based on the rent duration
                $expiryDate = date('Y-m-d', strtotime('+' . $rentDurationInMonths . ' months'));

                $newTenant->lease_expiry = $expiryDate;

                $newTenant->save();


                if ($newTenant) {

                    $newMessage = new Message();

                    $admin = User::Where('usertype', 1)->first();

                    $newMessage->sender_id = $admin->id;
                    $newMessage->sender_name = $admin->name;

                    $newMessage->receipient_id = auth()->user()->id;
                    $newMessage->receipient_name = auth()->user()->name;

                    $newMessage->message = 'Hello ' . auth()->user()->name . ', your payment was successful. Thank you for choosing us. Your space will be ready within 3 business days. We\'ll get back to you shortly with more details. Thank you!';

                    $newMessage->save();
                }
            }

            // Redirect with success message
            return redirect()->back()->with('message_type', 'success')->with('message', 'Payment of KES ' . $total . ' processed successfully!');
        } else {
            // Redirect back with error message
            return redirect()->back()->with('message_type', 'error')->with('message', 'Invalid card details. Please check your card information and try again.');
        }
    }

    private function validateCardDetails($cardNumber, $expiry, $cvv)
    {
        // Check if the card number is 16 digits
        $isCardNumberValid = preg_match('/^\d{16}$/', $cardNumber);

        // Check if the expiry is in MM/YY format and meets the conditions
        $expiryParts = explode('/', $expiry);
        $isExpiryValid = (count($expiryParts) === 2) && (strlen($expiryParts[0]) === 2) && (strlen($expiryParts[1]) === 2)
            && ($expiryParts[0] >= 1) && ($expiryParts[0] <= 12) && ($expiryParts[1] >= 23); // Adjust year validation as required

        // Check if the CVV is 3 digits
        $isCVVValid = preg_match('/^\d{3}$/', $cvv);

        // Return true if all conditions are met, otherwise false
        return $isCardNumberValid && $isExpiryValid && $isCVVValid;
    }

    public function membership()
    {
        $tenants = Tenant::with('home')->get();

        return view('home.membership', compact('tenants'));
    }

    public function received_messages()
    {
        $messages = Message::Where('receipient_id', auth()->user()->id)->get();

        return view('home.messages', compact('messages'));
    }

    public function message_delete($msg)
    {
        $msgDel = Message::findOrFail($msg);

        $msgDel->delete();

        if ($msgDel) {
            // Redirect with success message
            return redirect()->back()->with('message_type', 'success')->with('message', 'Message Deleted successfully!');
        } else {
            // Redirect back with error message
            return redirect()->back()->with('message_type', 'error')->with('message', 'An Error Occurred try again.');
        }
    }

    public function msg_adm(Request $request, $user)
    {
        $newMessage = new Message();

        $admin = User::Where('usertype', 1)->first();

        $newMessage->sender_id = $user;
        $newMessage->sender_name = User::Where('id', $user)->value('name');

        $newMessage->receipient_id = $admin->id;
        $newMessage->receipient_name = $admin->name;

        $newMessage->message = $request->input('message');

        $newMessage->save();

        if ($newMessage) {
            // Redirect with success message
            return redirect()->back()->with('message_type', 'success')->with('message', 'Message Sent successfully!');
        } else {
            // Redirect back with error message
            return redirect()->back()->with('message_type', 'error')->with('message', 'An Error Occurred try again.');
        }
    }


    public function search(Request $request)
    {
        $query = $request->input('query');
        $homes = Home::where('category_name', 'like', "%$query%")->orWhere('rent_price', 'like', "%$query%")->orWhere('region', 'like', "%$query%")->orWhere('county', 'like', "%$query%")->get();

        return view('home.category', compact('homes',));
    }

    public function filter(Request $request, $category)
    {
        $homes = Home::Where('category_name', $category)->get();


        return view('home.category', compact('homes',));
    }





    public function blog()
    {
        return view('home.blog');
    }

    public function blogstory()
    {
        return view('home.blog-story');
    }

    public function community()
    {
        $posts = Community::all();

        return view('home.community', compact('posts'));
    }


    public function comm_post(Request $request)
    {

        $newPost = new Community();

        $newPost->user_id = auth()->user()->id;
        $newPost->name = auth()->user()->name;
        $newPost->title = $request->input('heading');
        $newPost->message = $request->input('topic');

        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('commpstimg', $imagename);
            $newPost->image = $imagename;
        }

        $newPost->save();

        if ($newPost) {
            // Redirect with success message
            return redirect()->back()->with('message_type', 'success')->with('message', 'Post successful!');
        } else {
            // Redirect back with error message
            return redirect()->back()->with('message_type', 'error')->with('message', 'An Error Occurred try again.');
        }
    }

    public function about()
    {
        return view('home.about');
    }

    public function contact()
    {
        return view('home.contact');
    }

    public function communityreplies()
    {
        return view('home.community-replies');
    }
}
