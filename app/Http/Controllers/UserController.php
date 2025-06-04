<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Rayon;
use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\Province;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $count_user = User::count();
        if ($request->has('search')) {
            $user = User::where('username', 'LIKE', '%' . $request->search . '%')
                //   ->orwhere('rayon', 'LIKE', '%'.$request->search.'%')
                ->orwhere('name', 'LIKE', '%' . $request->search . '%')
                ->orwhere('nim', 'LIKE', '%' . $request->search . '%')
                ->paginate(25);
        } else {
            $user = User::with('rayon', 'role')->latest()->paginate(25);
        }

        $first_item = ($user instanceof \Illuminate\Pagination\LengthAwarePaginator) ? $user->firstItem() : $user->first();

        return view('admin.user.index', compact('user', 'count_user', 'first_item'));
    }

    public function list($slug, Request $request)
    {
        // Mendapatkan rayon berdasarkan slug
        $rayon = Rayon::where('slug', $slug)
            ->with(['users' => function ($query) use ($request) {
                if ($request->has('search')) {
                    $query->where('username', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('name', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('nim', 'LIKE', '%' . $request->search . '%');
                }
            }])
            ->latest()
            ->paginate(25);

        return view('admin.rayon.show', compact('rayon'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth();

        // $provinsi = Province::all()->sortBy('name')->pluck('name', 'id');
        // $route_get_kota = route('get.kota');
        // $route_get_kecamatan = route('get.kecamatan');
        // $route_get_kelurahan = route('get.kelurahan');
        $rayons = Rayon::all()->sortBy('rayon');

        return view('admin.user.create', compact('user', 'rayons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'username' => 'required|unique:users,username|alpha_dash|min:3|max:20',
            'nim' => 'required|unique:users,nim|regex:/^\d{3,12}P?$/',
            'kelamin' => 'required',
            'rayon_id' => 'required',
            'prodi' => 'required',
            'kaderisasi' => 'nullable',
            'role_id' => 'required',
            'rules' => [
                'email' => 'required|email|unique:users,email',
            ],
            'password' => 'required|min:6'
        ];

        $messages = [
            'name.required' => 'Nama wajib diisi.',
            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username sudah digunakan.',
            'username.alpha_dash' => 'Username hanya boleh berisi huruf, angka, "-" atau "_".',
            'username.min' => 'Username minimal 3 karakter.',
            'username.max' => 'Username maksimal 20 karakter.',
            'nim.required' => 'NIM/NPM wajib diisi.',
            'nim.unique' => 'NIM/NPM sudah digunakan.',
            'nim.regex' => 'NIM/NPM harus berupa angka dan boleh diakhiri dengan huruf "P".',
            'kelamin.required' => 'Jenis kelamin wajib diisi.',
            'rayon_id.required' => 'Rayon wajib diisi.',
            'prodi.required' => 'Prodi wajib diisi.',
            'role_id.required' => 'Status wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'slug' => Str::slug($request->username), // Perbaikan: Str sudah diimport
            'nim' => $request->nim,
            'kelamin' => $request->kelamin,
            'rayon_id' => $request->rayon_id,
            'prodi' => $request->prodi,
            'kaderisasi' => $request->kaderisasi,
            'role_id' => $request->role_id,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        Alert::success('Mantap IMMawan & IMMawati', 'Kader Berhasil Ditambahkan');
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, User $user)
    {
        $user = User::find($id);
        $role = Role::find($user->role_id);
        $rayon = Rayon::find($user->rayon_id);
        // $provinsi = Province::all()->sortBy('name')->pluck('name', 'id');
        // $route_get_kota = route('get.kota');
        // $route_get_kecamatan = route('get.kecamatan');
        // $route_get_kelurahan = route('get.kelurahan');
        $rayons = Rayon::all()->sortBy('rayon');

        // dd($user);
        return view('admin.user.edit', compact('user', 'role', 
        'rayon', 'rayons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $userToUpdate = User::findOrFail($id);

        $userData = $request->all();
        if ($request->img) {
            $extension = $request->img->getClientOriginalExtension();
            $newFileName = 'user' . '_' . $request->username . '-' . now()->timestamp . '.' . $extension;
            $request->file('img')->move(public_path('/storage/img'), $newFileName);
            $userData['img'] = $newFileName;
        }

        $userToUpdate->update($userData);

        Alert::success('Mantap IMMawan & IMMawati', 'User Berhasil Di Update');
        return redirect('/admin/user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id); // Menemukan user berdasarkan id atau gagal jika tidak ditemukan

        $user->delete(); // Menghapus data

        Alert::success('Mantap IMMawan & IMMawati', 'Kader berhasil dihapus');
        return redirect('/admin/user');
    }

    public function administrator(Request $request)
    {
        $administrator = User::whereIn('role_id', [1])->latest()->paginate(10);
        return view('admin.administrator.index', compact('administrator'));
    }

    public function kadermapaba(Request $request)
    {
        $kadermapaba = User::whereIn('kaderisasi', ['Mapaba', 'PKD', 'PKL', 'PKN'])->latest()->paginate(10);
        return view('admin.user.mapaba', compact('kadermapaba'));
    }

    public function kaderpkd(Request $request)
    {
        $kaderpkd = User::whereIn('kaderisasi', ['PKD', 'PKL', 'PKN'])->latest()->paginate(10);
        return view('admin.user.pkd', compact('kaderpkd'));
    }
    public function kaderpkl(Request $request)
    {
        $kaderpkl = User::whereIn('kaderisasi', ['PKL', 'PKN'])->latest()->paginate(10);
        return view('admin.user.pkl', compact('kaderpkl'));
    }
    public function kaderpkn(Request $request)
    {
        $kaderpkn = User::where('kaderisasi', 'PKN')->latest()->paginate(10);
        return view('admin.user.pkn', compact('kaderpkn'));
    }

    public function unverification(Request $request)
    {
        // data kader yang belum di verifikasi 
        $unverification = User::where('role_id', 4)->paginate(10);
        return view('admin.user.unverification', compact('unverification'));
    }
    public function bukankader(Request $request)
    {
        // data kader yang belum di verifikasi 
        $bukankader = User::where('role_id', 5)->paginate(10);
        return view('admin.user.bukankader', compact('bukankader'));
    }
}
