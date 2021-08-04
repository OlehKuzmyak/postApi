<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Http\Requests\Advertisement\AdvertisementRequest;
use App\Http\Requests\Advertisement\AdvertisementCreateRequest;
use App\Http\Requests\Advertisement\AdvertisementUpdateRequest;

class AdvertisementController extends Controller
{
    public function index(Request $request)
    {
        $advertisement = Advertisement::where('user_id', auth()->user()->id)
            ->orderby('created_at', 'desc')
            ->paginate(10);

        return Response::json($advertisement, 200);
    }

    public function create(AdvertisementCreateRequest $request, Authenticatable $user)
    {
        $validated = $request->validated();
        $validated['user_id'] = $user->id;
        Advertisement::create($validated);

        return Response::json('', 200);
    }

    public function update(AdvertisementUpdateRequest $request)
    {
        $validated = $request->validated();
        Advertisement::where('id', $validated['id'])->update($validated);

        return Response::json('', 200);
    }

    public function delete(AdvertisementRequest $request)
    {
        Advertisement::where('id', $request->input('id'))->delete();

        return Response::json('', 200);
    }

    public function setActive(AdvertisementRequest $request)
    {
        Advertisement::where('id', $request->input('id'))->setActive();
        return Response::json('', 200);
    }

    public function setInActive(AdvertisementRequest $request)
    {
        Advertisement::where('id', $request->input('id'))->setInActive();
        return Response::json('', 200);
    }
}
