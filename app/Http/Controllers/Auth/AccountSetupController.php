<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\SetupRequest;
use App\Models\User;
use App\Repositories\EmployeeRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AccountSetupController extends Controller
{
    public function __construct(private readonly EmployeeRepository $employeeRepository)
    {
    }

    public function index()
    {
        if (auth()->user()?->is_complete) {
            return redirect()->route('home');
        } else {
            return view('account.setup', [
                'user' => User::find(auth()->user()->id),
            ]);
        }

    }

    public function store(SetupRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $user = User::find(auth()->user()->id);
            $user->password = bcrypt($request->password);
            $user->is_complete = true;
            $user->save();

            $this->employeeRepository->create([
                'email' => $request->email,
                'employee_id' => $request->employee_id,
                'first_name' => Str::upper($request->first_name),
                'middle_name' => Str::upper($request->middle_name),
                'last_name' => Str::upper($request->last_name),
                'suffix' => Str::upper($request->suffix),
                'phone_number' => $request->phone_number,
                'office' => $request->office,
                'address' => Str::upper($request->address),
                'position' => $request->position,
                'work_status' => $request->work_status,
            ]);

            return response()->json(['success' => true]);
        });
    }
}
