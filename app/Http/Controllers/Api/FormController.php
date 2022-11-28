<?php

namespace App\Http\Controllers\Api;

use App\Core\Form\Jobs\CreateFormJob;
use App\Core\Form\Query\FormQueryInterface;
use App\Core\FormEloquent\Jobs\CreateFormEloquentJob;
use App\Core\FormEloquent\Query\FormEloquentQueryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Bus\QueueingDispatcher;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class FormController extends Controller
{
    public function create(Request $request, QueueingDispatcher $dispatcher, FormQueryInterface $formQuery) : JsonResponse
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $dispatcher->dispatchToQueue(new CreateFormJob($id = Uuid::uuid4(), $request->get('name')));

        $form = $formQuery->getById($id);

        return response()->json(['id' => $form->id()], 201);
    }

    public function createEloquent(Request $request, QueueingDispatcher $dispatcher, FormEloquentQueryInterface $formQuery) : JsonResponse
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $dispatcher->dispatchToQueue(new CreateFormEloquentJob($id = Uuid::uuid4(), $request->get('name')));

        $form = $formQuery->getById($id);

        return response()->json(['id' => $form->id()], 201);
    }
}

