<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule as ValidationRule;
use Illuminate\Support\Str;
use App\Models\Service;
use App\Models\Category;
use App\Models\Command;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Else_;

class AdminController extends Controller
{
    //
    public function show()
    {


        $users = DB::table('users')->count();
        $commands = DB::table('commande')->count();
        $services = DB::table('services')->count();
        // *******************services************************
        // Get the number of services from the previous week
        $previousWeekServices = Service::whereBetween('created_at', [now()->subWeek(), now()->subWeek()->endOfWeek()])->count();
        // Get the number of services from the current week
        $currentWeekServices = Service::whereBetween('created_at', [now()->startOfWeek(), now()])->count();
        // Calculate the percentage increase or decrease in the number of services
        // *******************users************************
        // Get the number of services from the previous week
        $previousWeekusers = User::whereBetween('created_at', [now()->subWeek(), now()->subWeek()->endOfWeek()])->count();
        // Get the number of services from the current week
        $currentWeekusers = User::whereBetween('created_at', [now()->startOfWeek(), now()])->count();
        // Calculate the percentage increase or decrease in the number of services

        // *******************commandes************************
        // Get the number of services from the previous week
        $previousWeekC = Command::whereBetween('created_at', [now()->subWeek(), now()->subWeek()->endOfWeek()])->count();
        // Get the number of services from the current week
        $currentWeekC = Command::whereBetween('created_at', [now()->startOfWeek(), now()])->count();

        if ($previousWeekusers == 0) {
            $percentageChangeU = 0;
        } else {
            $percentageChangeU = ($currentWeekusers - $previousWeekusers) / $previousWeekusers * 100;
        }
        if ($previousWeekServices == 0) {
            $percentageChange = 0;
        } else {
            $percentageChange = ($currentWeekServices - $previousWeekServices) / $previousWeekServices * 100;
        }
        if ($previousWeekC == 0) {
            $percentageChangeC = 0;
        } else {
            $percentageChangeC = ($currentWeekC - $previousWeekC) / $previousWeekC * 100;
        }
        //**************top 5 ville******************** */
        $top_cities = DB::table('users')
            ->join('services', 'users.id', '=', 'services.user_id')
            ->select('users.ville', DB::raw('count(*) as total'))
            ->groupBy('users.ville')
            ->orderByDesc('total')
            ->limit(5)
            ->get();
            //************top categories*********** */
            $top_categories = DB::table('services')
            ->join('categories', 'services.category_id', '=', 'categories.id')
            ->select('categories.category_title', DB::raw('count(*) as total'))
            ->groupBy('categories.category_title')
            ->orderByDesc('total')
            ->limit(5)
            ->get();
        
        return view('admin.home', compact('top_categories','top_cities', 'currentWeekC', 'previousWeekC', 'percentageChangeC', 'percentageChangeU', 'previousWeekusers', 'currentWeekusers', 'users', 'commands', 'services', 'percentageChange', 'previousWeekServices', 'currentWeekServices'));
    }

    // go to login page 
    public function index()
    {
        return view('admin.login');
    }


    public function login(Request $request)
    {
        // $u = User::where('email', 'ismail@gmail.com')->first();

        // Hash::check('123456789', $u->password);
        // return true;

        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if (auth()->user()->isAdmin) {
                return redirect()->route('admin.dashboard');
            }
        } else {
            return redirect()
                ->route('admin.login')
                ->with('error', 'Incorrect email or password!.');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
