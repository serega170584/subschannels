<?php
namespace Serega170584\Subschannels\Http\Controllers;

use App\Http\Controllers\Controller;
use Serega170584\Subschannels\Models\Subschannels;
use Serega170584\Subschannels\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

/**
 * Class SubschannelsController
 * @package Serega170584\Subschannels\Http\Controllers
 */
class SubschannelsController extends Controller
{

    /**
     * @param $userId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function index($userId)
    {
        try
        {
            $user = User::findOrFail($userId);
        } catch (ModelNotFoundException $e) {
            return abort(404);
        }

        return view(config('subschannels.views.index'), [
            'user' => $user,
            'subschannels' => Subschannels::all(),
            'action' => route('subschannels.update', $userId),
            'method' => 'PUT'
        ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param $userId
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function update(Request $request, $userId)
    {
        try
        {
            /**
             * @var \Serega170584\Subschannels\Models\User $user
             */
            $user = User::findOrFail($userId);
        } catch (ModelNotFoundException $e) {
            return abort(404);
        }

        $user->subschannels()->detach();

        if (count($request->input('subschannels'))) {
            \DB::transaction(function () use ($request, $user) {
                foreach ($request->input('subschannels') as $subschannelId) {
                    $user->subschannels()->attach($subschannelId);
                }
            });
        }

        return redirect()->route('subschannels.index', $userId);

    }


}