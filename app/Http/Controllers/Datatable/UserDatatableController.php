<?php

namespace App\Http\Controllers\Datatable;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Yajra\DataTables\Facades\DataTables;

class UserDatatableController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function getUsers()
    {
        $users = $this->userService->getUsers();

        return DataTables::of($users)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                if (!$row->email_verified_at) {
                    return '
                    <button class="shadcn-btn edit-btn" data-id="' . $row->id . '"><i class="fas fa-pen"></i></button>
                    <button class="shadcn-btn delete-btn" data-id="' . $row->id . '"><i class="fas fa-trash"></i></button>
                ';
                } else {
                    return 'Akun sudah aktif';
                }
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
